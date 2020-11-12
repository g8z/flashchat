<?php
	
	$GLOBALS['my_file_name'] = 'livesupport';
	
	require_once('inc/common.php');

	$id = 'flashchat';
	$params = array();

	$open = false;

	if($GLOBALS['fc_config']['liveSupportMode'])
	{
		$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid IS NOT NULL',218);
		if($rs = $stmt->process())
		{
			while($rec = $rs->next())
			{
				if(ChatServer::userInRole($rec['userid'], ROLE_ADMIN))
				{
					$open = true;
					break;
				}
			}
		}
	}
?>
<html>
	<head>
		<title>Live Support Sample</title>
		<script type="text/javascript" src="js.php"></script>
	</head>

	<body marginwidth="0" marginheight="0" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" scroll="no" <?php if($open) { ?>onLoad="setFocus()" onUnload="doLogout()"<?php } ?>>
		<?php if($open) { ?>
			<center><?php echo flashTag($id, 'preloader.swf', '100%', '100%', $params)?></center>
		<?php } else { ?>
			<center>Sorry, we are closed</center>
		<?php } ?>
	</body>
</html>