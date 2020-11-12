<?PHP

  function fb($data){}

	$pInfo = pathinfo(__FILE__);
	chdir( $pInfo['dirname'] );
	//---

	$GLOBALS['fc_config_stop'] = false;
	require_once('../../inc/common.php');


	$GLOBALS['fc_config']['botsdata_path'] =  INC_DIR . '.' . $GLOBALS['fc_config']['botsdata_path'];

	$server = new socketServer(
								$GLOBALS['fc_config']['socketServer']['host'],
								$GLOBALS['fc_config']['socketServer']['port']
							  );

	$GLOBALS['socket_server'] = &$server;

	$server->setMaxClients( $GLOBALS['fc_config']['socketServer']['max_clients'] );

	$server->setDebugMode( $GLOBALS['fc_config']['socketServer']['debug_mode'], $GLOBALS['fc_config']['socketServer']['log_file'] );

	$server->start();
?>