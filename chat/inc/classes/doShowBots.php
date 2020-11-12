<?php
	$txt = $GLOBALS['fc_config']['bot']->showBots();
	$this->sendToUser(null, new Message('msg', $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
?>