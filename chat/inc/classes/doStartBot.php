<?php
	if(!$GLOBALS['fc_config']['bot']->login($login, $roomId, true))
	{
		$txt = '<b>Bot \''.$login.'\' does not exist.</b>';
		$this->sendToUser(null, new Message('msg', $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
	}
?>