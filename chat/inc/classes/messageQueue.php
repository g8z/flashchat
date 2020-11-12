<?php
	class MessageQueueIterator
	{
		var $rs = null;
		var $dropTheRest = false;

		function MessageQueueIterator($rs)
		{
			$this->rs = $rs;
		}

		function hasNext()
		{
			return !$this->dropTheRest && $this->rs->hasNext();
		}

		function next()
		{
			if($rec = $this->rs->next()) {
				$msg = new Message($rec['command']);
				$msg->id = $rec['id'];

				$msg->userid = $rec['userid'];
				$msg->roomid = $rec['roomid'];
				$msg->txt = $rec['txt'];

				$msg->toconnid = $rec['toconnid'];
				$msg->touserid = $rec['touserid'];
				$msg->toroomid = $rec['toroomid'];
				$msg->created  = $rec['created'];

				$this->dropTheRest = ($msg->command == 'lout');

				return $msg;
			} else {
				return null;
			}
		}
	}

	class MessageQueue
	{
		var $addStmt = null;

		function MessageQueue()
		{
			//$qry = 'INSERT INTO '.$GLOBALS['fc_config']['db']['pref'].'messages (created, toconnid, touserid, toroomid, command, userid, roomid, txt, chatid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, '.$_SESSION['session_chat'].')';
			if( $cmsclass != 'statelesscms' && $GLOBALS['fc_config']['loginUTF8decode'] )
			{
//          		mysql_query("SET NAMES utf8");
			}
			$qry = 'INSERT INTO '.$GLOBALS['fc_config']['db']['pref'].'messages (created, toconnid, touserid, toroomid, command, userid, roomid, txt, chatid, instance_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1, ?)';// changed on 090706 for chat instances
			$this->addStmt = new Statement( $qry ,151 );
		}

		function addMessage($message)
		{

			//$add_res = $this->addStmt->process($message->created, $message->toconnid, $message->touserid, $message->toroomid, $message->command, $message->userid, $message->roomid, $message->txt);
			//$add_res = $this->addStmt->process($message->created, $message->toconnid, $message->touserid, $message->toroomid, $message->command, $message->userid, $message->roomid, $message->txt,$message->session_inst);// changed on 090706 for chat instances
			if ($GLOBALS['fc_config']['logEnabled']) {

				$logPath = INC_DIR.'../temp/logs/';
				if (!is_dir($logPath)) {
					mkdir($logPath, 0777);
				}
				$fName = date('d_F_Y').'.log';
				$flag = (file_exists($logPath.$fName)) ? 'a' : 'w';
				$str = '';
				ob_start();

				switch ($message->command) {
					case 'msgu':
					  $usr = ChatServer::getUser($message->userid);
					  echo $usr['login'].' '.$message->txt;
					  break;
					case 'msgb':
					case 'msg':
					  //skip system messages (motd, /? results etc_)
					  if ($message->toroomid || $message->touserid) {
  						$usr = ChatServer::getUser($message->userid);
					    if ($message->touserid) {
					      $tousr = ChatServer::getUser($message->touserid);
					      echo $usr['login'].' private to '.$tousr['login'].' at ';
					    }
					    else {
					      echo '['.$usr['login'].'] ';
					    }
  						echo date('g:i a').': '.$message->txt;

					  }
						break;
					/*case 'adr':
						echo 'Room '.$message->txt.' added at '.date('g:i a');
						break;*/
					case 'adu':
						$usr = ChatServer::getUser($message->userid);
						echo $usr['login'].' has entered at '.date('g:i a');
						break;
					case 'banu':
						$usr = ChatServer::getUser($message->touserid);
						echo $usr['login'].' was banned at '.date('g:i a');
						break;
					case 'nbanu':
						$usr = ChatServer::getUser($message->touserid);
						echo $usr['login'].' was unbanned at '.date('g:i a');
						break;
					case 'rmu':
						$usr = ChatServer::getUser($message->userid);
						echo $usr['login'].' has left at '.date('g:i a');
						break;
					case 'alrt':
					case 'ralrt':
					case 'calrt':
						echo 'Alert ('.$message->command.'): ',$message->txt;
					default:
						break;
				}


				$str = ob_get_contents();
				ob_end_clean();
				if ($str) {
					$str.="\n";
					$handle = fopen($logPath.$fName, $flag);
					fwrite($handle, $str);
					fclose($handle);
				}
			}



			$add_res = $this->addStmt->process($message->created, $message->toconnid, $message->touserid, $message->toroomid, $message->command, $message->userid, $message->roomid, $message->txt, 1);//added 180907 default id of session inst

			return $add_res;
		}

		//function getMessages($connid, $userid, $roomid, $start = 0) {
		function getMessages($connid, $userid, $roomid, $start = 0, $session_inst = 1)
		{
			// changed on 090706 for chat instances
			//$chat = $_SESSION['session_chat'];
			//added 180907 default id of session chat-----------
			$chat = 1;
			$session_inst = 1;
			//---------------------------------------------------

			if($userid)
			{
				//---fixes for ignore
				$p = $GLOBALS['fc_config']['db']['pref'];
				//$getStmt = new Statement("SELECT {$p}messages.* FROM {$p}messages LEFT JOIN {$p}ignors ON ({$p}ignors.userid=$userid AND {$p}ignors.ignoreduserid={$p}messages.userid AND ({$p}messages.command = 'msg' OR {$p}messages.command = 'msgu')) WHERE (toconnid=? OR touserid=? OR toroomid=? OR (toconnid IS NULL AND touserid IS NULL AND toroomid IS NULL)) AND id>=? AND {$p}ignors.created IS NULL ORDER BY id");
				//---
				//return new MessageQueueIterator($getStmt->process($connid, $userid, $roomid, $start));
                $getStmt = new Statement('SELECT SQL_CACHE '.$p.'messages.* FROM '.$p.'messages LEFT JOIN '.$p.'ignors ON ('.$p.'ignors.userid='.$userid.' AND '.$p.'ignors.ignoreduserid='.$p.'messages.userid AND ('.$p.'messages.command = \'msg\' OR '.$p.'messages.command = \'msgu\')) WHERE (toconnid=? OR touserid=? OR toroomid=? OR (toconnid IS NULL AND touserid IS NULL AND toroomid IS NULL)) AND id>=?  and '.$p.'messages.instance_id=?  AND '.$p.'ignors.created IS NULL ORDER BY id',154);// changed on 090706 for chat instances
				//echo "SELECT {$p}messages.* FROM {$p}messages LEFT JOIN {$p}ignors ON ({$p}ignors.userid=$userid AND {$p}ignors.ignoreduserid={$p}messages.userid AND ({$p}messages.command = 'msg' OR {$p}messages.command = 'msgu')) WHERE (toconnid='$connid' OR touserid=$userid OR toroomid=$roomid OR (toconnid IS NULL AND touserid IS NULL AND toroomid IS NULL)) AND id>=$start  and {$p}messages.instance_id=$session_inst  AND {$p}ignors.created IS NULL ORDER BY id";				exit;
				//---
				$ret = new MessageQueueIterator($getStmt->process($connid, $userid, $roomid, $start, $session_inst));//// changed on 090706 for chat instances

			} else {
				//$getStmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}messages WHERE toconnid=? AND id>=? ORDER BY id");
				//return new MessageQueueIterator($getStmt->process($connid, $start));
				$getStmt = new Statement('SELECT SQL_CACHE * FROM '.$GLOBALS['fc_config']['db']['pref'].'messages WHERE toconnid=? AND id>=?   and '.$GLOBALS['fc_config']['db']['pref'].'messages.instance_id=? ORDER BY id',152);// changed on 090706 for chat instances
				$ret = new MessageQueueIterator($getStmt->process($connid, $start, $session_inst));// changed on 090706 for chat instances

			}
			return $ret;
		}
	}
?>