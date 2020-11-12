<?php
			if($numb)
			{
				if (($GLOBALS['fc_config']['backMax'] != 0) && ($numb > $GLOBALS['fc_config']['backMax']))
				$numb = $GLOBALS['fc_config']['backMax'];
				$lastid = $this->sendBack(new Message('back', null, $numb));

				$stmt = new Statement('SELECT SQL_CACHE count(*) AS numb FROM '.$GLOBALS['fc_config']['db']['pref'].'messages WHERE command=\'msg\' AND toroomid=?',164);
				if(($rs = $stmt->process($this->roomid)) && ($rec = $rs->next())) $numb = min($numb, $rec['numb']);

				$numb--;

				$stmt = new Statement('SELECT SQL_CACHE id FROM '.$GLOBALS['fc_config']['db']['pref'].'messages WHERE command=\'msg\' AND toroomid=? ORDER BY id DESC LIMIT '.$numb.', 1',155);
				if(($rs = $stmt->process($this->roomid)) && ($rec = $rs->next()))
				{
					$firstid = $rec['id'];
					$stmt = new Statement('SELECT SQL_CACHE * FROM '.$GLOBALS['fc_config']['db']['pref'].'messages WHERE command=\'msg\' AND id>=? AND id<=? AND toroomid=? ORDER BY id',156);
					if($rs = $stmt->process($firstid, $lastid, $this->roomid))
					{
						while($rec = $rs->next())
						{
							$msg = new Message('msgb');
							$msg->created = $rec['created'];
							$msg->userid = $rec['userid'];
							$msg->roomid = $rec['roomid'];
							$msg->txt = $rec['txt'];
							$this->sendBack($msg);
						}
					}
				}
			}
?>