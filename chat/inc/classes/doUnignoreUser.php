<?php
			$stmt = new Statement('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'ignors WHERE userid=? AND ignoreduserid=?',305);
			$stmt->process($this->userid, $ignoredUserID);

			$this->sendToUser($ignoredUserID, new Message('nignu', $this->userid, null, $txt));
?>