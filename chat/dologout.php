<?php
	
	$GLOBALS['my_file_name'] = 'dologout';
	
	require_once('inc/common.php');

	$msg = 'Logging out from the chat...';

	$req = array(
		'id' => $_REQUEST['id'],
		'c'  => 'lout',
	);

	$conn =& ChatServer::getConnection($_REQUEST);
	$conn->process($req);

	//added
	$stmt = new Statement('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE id = ?',223);
	$stmt->process($conn->id);

	if(!$GLOBALS['fc_config']['showLogoutWindow']) {
		header('Refresh: 0; URL=images/spacer.gif');
		exit;
	} else {
?>
<html>
	<head>
		<title><?php printf($msg) ?></title>
		<script type="text/javascript">
			function autoclose() {
				setInterval('window.close()', <?php printf($GLOBALS['fc_config']['logoutWindowDisplayTime']) ?> * 1000);
			}
		</script>
	</head>

	<style type="text/css">
	<!--
	BODY {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 11px;
		font-weight: bold;
		color: <?php printf(dechex($GLOBALS['fc_config']['themes'][$GLOBALS['fc_config']['defaultTheme']]['enterRoomNotify']))?>;
	}
	-->
	</style>

	<body bgcolor="<?php printf(dechex($GLOBALS['fc_config']['themes'][$GLOBALS['fc_config']['defaultTheme']]['publicLogBackground'])) ?>" onLoad="autoclose()">
		<center><?php printf($msg) ?></center>
	</body>
</html>
<?php } ?>