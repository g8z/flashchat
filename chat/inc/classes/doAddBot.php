<?php
	$user_id = $GLOBALS['fc_config']['bot']->getNextId();

	if($GLOBALS['fc_config']['bot']->connectUser2Bot($user_id, $login))
	{
		$txt = '<b>Bot \''.$login.'\' was added succesfully.</b>';
		$this->sendToUser(null, new Message('msg', $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
	}
	else
	{
		$txt = '<b>Bot \''.$login.'\' was not added.</b>';
		$this->sendToUser(null, new Message('msg', $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
	}
?>