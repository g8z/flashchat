<?php
			$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id=?',80);
			if($rs = $stmt->process($toRoomID)) {
				if($room = $rs->next()) {
					if(!$room['ispublic'] && $this->userid != $invitedByUserID) $this->sendBack(new Message('rmr', null, $room['id'], $room['name']));
				}
			}
			$this->sendToUser($invitedByUserID, new Message('invd', $this->userid, $toRoomID, $txt));
?>