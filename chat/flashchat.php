<?php
//Fix For flashchat.php To Secure From Direct Access To Script
//Fix For flashchat.php To Secure From Direct Login Via URI
// Fix Contribution By Ricky Hucklee

	define('INC_DIR', dirname(__FILE__) . '/./inc/');//for config.php
	require_once(INC_DIR.'common.php');
	define("flashchat",true);
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header("Expires: Thu, 01 Jan 1970 00:00:01 GMT");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>FlashChat v<?php echo $GLOBALS['fc_config']['version']?></title>
<?php
require_once('flashchat_inc.php');
?>
<style type="text/css">
body,html {
    margin:0px;
    padding:0px;
    height:100%;
    width:100%;
    overflow: hidden;

}

</style>
</head>
	<body marginwidth="0" marginheight="0" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" scroll="no" >
		<center>
			<div id="flashchat"></div>

            <script type="text/javascript" src="js.php"></script>

		</center>
	</body>
</html>
<?php
//End Fix For Secure flashchat.php

?>