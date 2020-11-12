<?php
	$userId = $GLOBALS['fc_config']['bot']->logout($userName);
	if($userId != null)
	{
		$GLOBALS['fc_config']['bot']->disconnectUser2Bot($userId);

		$txt = '<b>Bot \''.$userName.'\' removed succesfully.</b>';
		$this->sendToUser(null, new Message('msg', $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
	}
	else
	{
		$txt = '<b>Bot \''.$userName.'\' was not removed, or does not exist.</b>';
		$this->sendToUser(null, new Message('msg', $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
	}
?>