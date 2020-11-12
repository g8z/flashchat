<?php
	if($GLOBALS['fc_config']['bot']->unteach($userName, $args))
	{
		$txt = "<b>Bot '$userName' is untaught succesfully.</b> $args";
		$this->sendToUser(null, new Message('msg', $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
	}
	else
	{
		$txt = "<b>Bot '$userName' is not untaught.</b>";
		$this->sendToUser(null, new Message('msg', $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
	}
?>