<?php
	error_reporting(E_ERROR);
	ini_set('display_errors', 'on');
	$fname = 'log_out.txt';

	ob_start();
//	$fp = fopen($fname, 'a');

	if( isset($_REQUEST['id']) )
	{
		require_once('inc/common.php');
		$GLOBALS['my_file_name'] = 'dologout';
		$msg = 'Logging out from the chat...';
		$req = array(
			'id' => $_REQUEST['id'],
			'c'  => 'lout',
		);

		$conn =& ChatServer::getConnection($_REQUEST);
		$conn->process($req);

		$stmt = new Statement('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE id = ?', 223);
		$stmt->process($rec['id']);
	}
	$str = ob_get_contents();
	ob_end_clean();

//	fwrite($fp, "\n".$str);
//	fclose($fp);
?>