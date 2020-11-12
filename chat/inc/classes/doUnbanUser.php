<?php
			$stmt = new Statement('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'bans WHERE banneduserid=?',255);
			$stmt->process($bannedUserID);

			$this->sendToUser($bannedUserID, new Message('nbanu', $this->userid, null, $txt));
?>