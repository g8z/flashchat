<?php
	if($GLOBALS['fc_config']['bot']->teach($userName, $args))
	{
		$txt = '<b>Bot \''.$userName.'\' has been taught.</b> $args';
		$this->sendToUser(null, new Message('msg', $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
	}
	else
	{
		$txt = '<b>Bot \''.$userName'\' has not been taught.</b>';
		$this->sendToUser(null, new Message('msg', $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
	}
?>