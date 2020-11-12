<?php
	$GLOBALS['filename'] = 'config_ln';

	if(!isset($_SESSION['session_inst'])) $_SESSION['session_inst'] = 1;
	$path = INC_DIR.'../temp/appdata/'.$GLOBALS['filename'].'_'.$_SESSION['session_inst'].'.php';

	require_once(INC_DIR . 'classes/fc_languages.php');
	$fc_lang_admin = new fc_lang_admin;

	include($path);
?>