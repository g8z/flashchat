<?php

	if (!file_exists('chat.swf')) {
		header('location: ../flashchat.php');
		exit;
	}
	define('INC_DIR', dirname(__FILE__) . '/./inc/');//for config.php
	require_once(INC_DIR.'common.php');
	define("flashchat",true);
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header("Expires: Thu, 01 Jan 1970 00:00:01 GMT");
	include_once('inc/common.php');

	$id = 'flashchat';

	$params = array();

	if ($_GET['whatIneed']) {$_REQUEST['password'] = base64_decode($_GET['whatIneed']); }

	if(isset($_REQUEST['username']) AND $_SESSION[UserName]==$_REQUEST['username']) {
		if($_REQUEST['username'] == '__random__') $_REQUEST['username'] = 'user_' . time();
		if(!isset($_REQUEST['lang'])) $_REQUEST['lang'] = $GLOBALS['fc_config']['defaultLanguage'];
		if(!isset($_REQUEST['password'])) $_REQUEST['password'] = '';
		if(!isset($_REQUEST['room'])) $_REQUEST['room'] = 0;

		$params = array_merge($params, array(
			'login' => $_REQUEST['username'],
			'password' => $_REQUEST['password'],
			'lang'  => $_REQUEST['lang'],
			'room'  => $_REQUEST['room']
		));
	}
?>
<html>
	<head>
		<title>FlashChat v<?php echo $GLOBALS['fc_config']['version']?></title>
		<script language="JavaScript" type='text/javascript' src="javascript/ActivateFlash.js"></script>
		<script type="text/javascript">
			function showLogger() {
				win = window.open("logger.php", "logger", "width=500,height=400,left=0,top=0,location=no,menubar=no,resizable=yes,scrollbars=no,status=no,toolbar=no");
				win.focus();
			}
			<?php if($GLOBALS['fc_config']['debug']) {?>showLogger();<?php } ?>
		</script>
	</head>

	<body marginwidth="0" marginheight="0" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" scroll="no">
		<center><?php echo flashChatTag('100%', '100%', $params)?><div id="flashchat"></div></center>
	</body>
</html>