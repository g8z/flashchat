<?php
			if(ChatServer::userInRole($this->userid, ROLE_CUSTOMER)) return;

			$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'bans WHERE banneduserid=? AND roomid=?',253);
			if(($rs = $stmt->process($this->userid, $toroomid)) && ($rec = $rs->next())) {
				$this->sendToAll(new Message('mvu', $this->userid, $this->roomid, $msg));
				$this->sendBack(new Message('error', null, null, 'banned'));
			} else {
				$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id=? AND password<>?' , 70 );
				$is_lock = ($rs = $stmt->process($toroomid, $pass)) && ($rec = $rs->next());

				if($is_lock && !$is_invite && !ChatServer::userInRole($this->userid, ROLE_ADMIN)) {
					$this->sendBack(new Message('error', $this->userid, $toroomid, 'locked'));
				}
				else
				{
					$this->roomid = $toroomid;
					$this->sendToAll(new Message('mvu', $this->userid, $this->roomid, $msg));

					if($GLOBALS['fc_config']['liveSupportMode'] && ChatServer::userInRole($this->userid, ROLE_ADMIN)) $this->doBack(1000);

					$this->save();
// fix for welcome message
					$destination = null;
					if ($GLOBALS['fc_config']['auto_topic']) {
						require_once(INC_DIR . 'classes/doRoomEntryInfo.php');
					}
// end fix
				}
			}
?>