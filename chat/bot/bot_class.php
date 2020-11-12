<?php
	class Bot{
		var $botId;
		var $bots;

		function Bot()
		{

		}

		function login( $login, $roomId=null, $manual=false )
		{
			$bots = $this->getBots();
			$userId = $this->getBotId( $login );
			if( $userId != null )
			{
				$bots[$userId]['active_manual'] = $manual;
				$this->setBot($userId, $bots[$userId]);
			}
			else return false;

			if($roomId == null || $bots[$userId]['roomid'] != $roomId) $roomId = $bots[$userId]['roomid'];

			$req = array(
				'bot_ip' => $GLOBALS['fc_config']['bot_ip'],
				'login'  => $login,
				'c'      => 'lin',
				'lg'	 => $login,
				'r'      => $roomId
			);

			$conn =& ChatServer::getConnection($req);
			$mqi = $conn->process($req);

			$conn->doSendAvatar('mavt', $bots[$userId]['chat_avatar'], 0);
			$conn->doSendAvatar('ravt', $bots[$userId]['room_avatar'], 0);

			return true;
		}

		function logout( $login )
		{

			$userId = $this->getBotId( $login );
			$stmt = new Statement("SELECT id FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE ip = ? AND userid = ?");
			$res  = $stmt->process($GLOBALS['fc_config']['bot_ip'], $userId);

			if(($rec = $res->next()) != null)
			{
				$bots = $this->getBots();
				$bots[$userId]['active_manual'] = false;
				$this->setBot($userId, $bots[$userId]);

				$req = array(
					'bot_ip' => $GLOBALS['fc_config']['bot_ip'],
					'login'  => $login,
					'id'     => $rec['id'],
					'c'      => 'lout'
				);

				$conn =& ChatServer::getConnection($req);
				$mqi = $conn->process($req);
			}

			return( $userId );
		}

		function connectUser2Bot( $userId, $login, $botName='Bot' )
		{
			$stmt = new Statement("SELECT id FROM {$GLOBALS['fc_config']['db']['pref']}bots WHERE botname = ?");
			$res  = $stmt->process($botName);

			if(($rec = $res->next()) != null)
			{
				$this->botId = $rec['id'];
			}

			if($this->botId == null) return false;

			$this->bots = $this->getBots();

			$rec = $this->getRecord();
			$rec['botid'] = $this->botId;
			$rec['login'] = $login;
			$this->setBot($userId, $rec);

			return $rec;
		}

		function disconnectUser2Bot( $userId )
		{
			$bots = $this->getBots();
			unset($bots[$userId]);
			$this->setBots($bots);
		}

		function processMessages()
		{
			$bots  = $this->getBots();

			if (count($bots) == 0 ) return;

			$stmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE ip = ? AND userid IS NOT NULL");
			$res  = $stmt->process($GLOBALS['fc_config']['bot_ip']);

			$messageQueue = new MessageQueue();
			$msg_arr = array(); $id_arr = array();
			$msg_cnt = 0; $start = 0;

			$users = $this->getUsers();
			while (list($key, $val) = each($bots))
			{
				$users[$key] = $this->getUser( $key );
			}
			while(($rec = $res->next()) != null)
			{
				$id_arr[] = $rec['id'];
				$start    = $rec['start'];

				$mqi = $messageQueue->getMessages($rec['id'], $rec['userid'], $rec['roomid'], $start);
				//---
				include_once( INC_DIR . '../bot/programe/src/respond.php');
				while($mqi->hasNext())
				{
					$m = $mqi->next();
					if($m->command == 'msg' && $m->userid != $rec['userid'])
					{
						$myuniqueid = md5($m->userid);
						// Here is where we get the reply.
						$botresponse = reply($this->replaceSpecial($m->txt), $myuniqueid, $bots[$rec['userid']]['botid']);
						$repl = $this->replaceSpecial($botresponse->response);
						$replace_pairs = array(
												"Program E" => $users[$rec['userid']]['login'],
												DEFAULTPREDICATEVALUE => $users[$m->userid]['login']
											   );
						$repl = strtr($repl, $replace_pairs);
						if(strlen($repl) == 0) continue;

						if($m->touserid == null)
						{
							$msg_arr[$msg_cnt] = new Message('msg', $rec['userid'], $rec['roomid'], $repl, $rec['color']);
							$msg_arr[$msg_cnt]->toroomid = $rec['roomid'];
						}
						else
						{
							$msg_arr[$msg_cnt] = new Message('msg', $rec['userid'], null, $repl, $rec['color']);
							$msg_arr[$msg_cnt]->touserid = $m->userid;
						}

						$msg_cnt++;
						$start = $m->id+$msg_cnt+1;
					}
				}
			}

			for($i = 0; $i < $msg_cnt; $i++)
			{
				if( $GLOBALS['fc_config']['enableSocketServer'] )
				{
					//sleep(1);
					$GLOBALS['socket_server']->sendMessage($msg_arr[$i]);
				}

				$messageQueue->addMessage($msg_arr[$i]);
			}

			for($i = 0; $i < count($id_arr); $i++)
			{
				$stmt = new Statement("UPDATE {$GLOBALS['fc_config']['db']['pref']}connections SET updated=NOW(), start=? WHERE id=?");
				$stmt->process($start, $id_arr[$i]);
			}
		}

		function replaceSpecial($inStr)
		{
			$replace_pairs = array(
									'<B>' => '',
									'&lt;B&gt;' => '',
									'</B>' => '',
									'&lt;/B&gt;' => '',
									'<I>' => '',
									'&lt;I&gt;' => '',
									'</I>' => '',
									'&lt;/I&gt;' => '',
									'<BR>' => '',
									'&lt;BR&gt;' => '',
									'<br>' => '',
									'&lt;br&gt;' => '',
									'<br/>' => '',
									'&lt;br/&gt;' => '',
									'&amp;' => '&',
									'&apos;' => "'",
									"\n" => ' ',
									"\r" => ' '
								  );

			//return (strtr(html_entity_decode($inStr, ENT_QUOTES), $replace_pairs));
			return (strtr($inStr, $replace_pairs));
		}

		function getUsers()
		{
			return ChatServer::getUsers();
		}

		function getBots()
		{
			$file_path = $GLOBALS['fc_config']['botsdata_path'];

			$retval = array();
			if(file_exists( $file_path ))// && filesize( $file_path ) > 0)
			{
				$file = fopen( $file_path, "r+" );
				$data = fread( $file, 100*1024);
				$retval = unserialize($data);

				if(!is_array($retval)) $retval = array();

				fclose($file);
			}

			return $retval;
		}

		function setBots($val)
		{

			$file_path = $GLOBALS['fc_config']['botsdata_path'];

			$data = serialize($val);
			$file = fopen( $file_path, "w+" );
			$res = fwrite($file, $data);

			fflush($file);
			fclose($file);
		}

		function flushbots()
		{
			$file_path = $GLOBALS['fc_config']['botsdata_path'];

			if(file_exists( $file_path ) && filesize( $file_path ) > 0)
			{
				$file = fopen( $file_path, "w+" );
				$data = fread( $file, filesize($file_path) );
				$res  = fwrite( $file, $data );

				fflush( $file );
				fclose( $file );
			}
		}

		function getBot($userId)
		{
			$bots = $this->getBots();
			return $bots[$userId];
		}

		function setBot($userId, $val)
		{
			$bots = ( count($this->bots) > 0 )? $this->bots : $this->getBots();
			$bots[$userId] = $val;
			$this->setBots($bots);
		}

		function getRecord()
		{
			$retval = array(
				'botid' => 0,
				'login' => '',
				'roomid' => $GLOBALS['fc_config']['defaultRoom'],
				'role' => ROLE_USER,
				'room_avatar' => '',
				'chat_avatar' => '',
				'active_on_supportmode' => false,//!!!
				'active_on_min_users' => '',
				'active_on_max_users' => '',
				'active_on_no_moderators' => false,
				'active_on_user' => 0,
				'available_rooms' => '',//!!!-
				'active_on_no_bots' => false,
				'active_time' => '',//!!!-
				'active_manual' => false,
			);

			return $retval;
		}

		function getNextId()
		{
			$bots = $this->getBots();
			$nextId = -2;
			while (list($key, $val) = each($bots))
			{
				if( $key <= $nextId ) $nextId = $key - 1;
			}

			return( $nextId );
		}

		function getUser( $userId )
		{
			$bot = $this->getBot($userId);
			if($bot == null) return null;

			$user = array(
							'id'       => $userId,
							'login'    => $bot['login'],
							'roles'    => $bot['role'],
							'profile'  => '',
							'roomid'   => $bot['roomid'],
						 );
			return( $user );
		}

		function getUsersIntoArray( &$arr )
		{
			$bots = $this->getBots();
			while (list($key, $val) = each($bots))
			{
				$arr[] = $this->getUser( $key );
			}
		}

		function getBotId( $login )
		{
			$bots = $this->getBots();
			while (list($key, $val) = each($bots))
			{
				if( strcasecmp( $val['login'], $login ) == 0 )
				{
					return( $key );
				}
			}

			return null;
		}

		function processOptions()
		{

			$stmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE userid IS NOT NULL");
			$res = $stmt->process();

			$conn = array();
			$room = array();
			while(($rec = $res->next()) != null)
			{
				$conn[$rec['userid']] = $rec;
				if(!isset($room[$rec['roomid']]))
				{
					$room[$rec['roomid']] = array();
					$room[$rec['roomid']]['usercnt'] = 0;
					$room[$rec['roomid']]['botcnt']  = 0;
					$room[$rec['roomid']]['admin']   = false;
				}

				$room[$rec['roomid']]['usercnt']++;
				if(strcasecmp($rec['ip'], $GLOBALS['fc_config']['bot_ip']) == 0)
				{
					$room[$rec['roomid']]['botcnt']++;
					$room[$rec['roomid']]['usercnt']--;
				}
			}

			$res = $this->getUsers();

			$users = array();
			foreach( $res as $rec )
			{
				$users[$rec['id']] = $rec;
				if($rec['roles'] == ROLE_ADMIN && $conn[$rec['id']] != null)
				{
					$room[$conn[$rec['id']]['roomid']]['admin'] = true;
				}
			}

			//bot options
			$bots = $this->getBots();

			if( is_array( $bots ) )
			while (list($key, $val) = each($bots))
			{
				$users[$key] = $this->getUser( $key );

				$logged   = ($conn[$key] != null);
				$roomid   = ($conn[$key]['roomid'] != null)? $conn[$key]['roomid'] : $val['roomid'];
				$activate = $val['active_manual'];

				if($val['active_on_min_users'] != '')
				{
					$activate = $activate || ($val['active_on_min_users'] > $room[$roomid]['usercnt']);
				}

				if($val['active_on_max_users'] != '' || $val['active_on_max_users'] > 0)
					$activate = $activate || ($val['active_on_max_users'] < $room[$roomid]['usercnt']);

				$activate = $activate || ($conn[$val['active_on_user']] != null);
				$activate = $activate || ($val['active_on_no_bots'] && ($room[$roomid]['botcnt'] == 0 || $logged));

				if($val['active_on_no_moderators'])
					$activate = !$room[$roomid]['admin'];


				if($activate && !$logged) $this->login( $users[$key]['login'], $users[$key]['roomid'] );
				if(!$activate && $logged) $this->logout( $users[$key]['login'] );
			}
		}

		function teach($userName, $inStr)
		{
			$userId = $this->getBotId( $userName );
			$bot    = $this->getBot( $userId );

			if($bot['botid'] != null)
			{
				$pattern = '';
				$template = '';
				$arr = explode('"', $inStr);

				if(trim($arr[2]) == '=>' && count($arr) == 5)
				{
					$pattern  = strtoupper($arr[1]);
					$template = $arr[3];
				}

				if(strlen(trim($pattern)) != 0 && strlen(trim($template)) != 0)
				{
					include_once('programe/src/util.php');
					$arr = normalsentences( $pattern );
					if(count($arr) > 0) $pattern = strtoupper($arr[0]);

					//remove if exists
					$this->unteach($userName, '"'.$pattern.'"', true);

					include_once('../temp/bot/programe/src/botinst/botloaderfuncs.php');
					$aimlstring = "<category><pattern>$pattern</pattern><template>$template</template></category>";
					$is_single = true;
					loadaimlstring($aimlstring, $bot['botid']);

					return true;
				}
			}

			return false;
		}

		function unteach($userName, $inStr, $is_internal=false)
		{
			// /unteach "botname" "phrase" => "response"
			$arr = explode('"', $inStr);
			$inStr = $arr[1];
			if(count($arr) > 5) return false;

			$userId = $this->getBotId( $userName );
			$bot = $this->getBot( $userId );

			if($bot['botid'] != null)
			{
				$botId = $bot['botid'];
				$stmt = new Statement("SELECT id FROM {$GLOBALS['fc_config']['db']['pref']}templates WHERE bot=? AND pattern LIKE ?");

				if(!$is_internal)
				{
					include_once('programe/src/util.php');
					$arr = normalsentences( $inStr );
					if(count($arr) > 0) $inStr = strtoupper($arr[0]);
				}

				$res = $stmt->process($botId, $inStr);

				$up_id = 0;
				if(($rec = $res->next()) != null) $up_id = $rec['id'];

				if($up_id != 0)
				{
					$stmt = new Statement("DELETE FROM {$GLOBALS['fc_config']['db']['pref']}templates WHERE bot=? AND id=?");
					$stmt->process($botId, $up_id);

					$rec = 1;
					while($rec != null)
					{
						$stmt = new Statement("SELECT parent FROM {$GLOBALS['fc_config']['db']['pref']}patterns WHERE bot=? AND id=?");
						$res = $stmt->process($botId, $up_id);
						$rec = $res->next();

						if($rec['parent'] == -1) break;

						//delete record
						$stmt = new Statement("DELETE FROM {$GLOBALS['fc_config']['db']['pref']}patterns WHERE bot=? AND id=?");
						$stmt->process($botId, $up_id);

						$up_id = $rec['parent'];
					}

					return true;
				}
			}

			return false;
		}

		function showBots()
		{
			$stmt = new Statement("SELECT c.userid, r.name AS room
								   FROM {$GLOBALS['fc_config']['db']['pref']}connections AS c,
								   		{$GLOBALS['fc_config']['db']['pref']}rooms AS r
								   WHERE c.ip = ? AND c.userid IS NOT NULL AND c.roomid = r.id");
			$res_active = $stmt->process($GLOBALS['fc_config']['bot_ip']);

			$stmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}bots");
			$res_bots = $stmt->process();

			$users = array();
			$bots_name = array();
			while(($rec = $res_bots->next()) != null)
			{
				$bots_name[$rec['id']] = $rec['botname'];
			}

			$bots = $this->getBots();

			while (list($key, $val) = each($bots))
			{
				$users[$key]= array('user' => $val['login'], 'bot' => $bots_name[$val['botid']], 'room' => '');
			}

			while(($rec = $res_active->next()) != null)
			{
				$users[$rec['userid']]['room'] = $rec['room'];
			}

			$txt= '';
			while(list($key, $val) = each($users))
			{
				if( $val['bot'] != '' )
				{
					$txt.= '<br><b>User:</b> '.$val['user'].'<b>, Bot Name:</b> '.$val['bot'];
					if($val['room'] != '')  $txt.= '<b>, Room:</b> '.$val['room'];
				}
			}

			if(strlen($txt) == 0) $txt.='<b>No bots are available.</b>';

			return $txt;
		}
	}

?>