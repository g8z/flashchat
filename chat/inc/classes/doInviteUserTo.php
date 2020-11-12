<?php
			$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id=?',80);
			if($rs = $stmt->process($toRoomID))
			{
				if($room = $rs->next())
				{
					if(!$room['ispublic'] && $this->userid != $invitedUserID)
					{
						$this->sendToUser($invitedUserID, new Message('adr', null, $room['id'], $room['name']));
						if( $room['password'] != '' ) $this->sendToUser($invitedUserID, new Message('srl', null, $room['id'], 'true'));
					}
					$this->sendToUser($invitedUserID, new Message('invu', $this->userid, $toRoomID, $txt));
				}
			}
?>