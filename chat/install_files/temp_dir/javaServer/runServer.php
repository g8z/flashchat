<?PHP
	session_id("socketServer");
	@session_start();


  function fb($data){
    echo '================FireBug==============';
    print_r($data);
  }
  define('INC_DIR', dirname(__FILE__) . '/../../inc/');

	if ( isset($_REQUEST['start']) )
	{
		require_once( '../config.srv.php' );
		//unlink ( session_save_path().'\sess_socketServer' );
		session_destroy();
		mysql_connect($GLOBALS['fc_config']['db']['host'],$GLOBALS['fc_config']['db']['user'],$GLOBALS['fc_config']['db']['pass']);
		mysql_select_db($GLOBALS['fc_config']['db']['base']);
		mysql_query("DELETE FROM {$GLOBALS['fc_config']['db']['pref']}connections");
		session_id("socketServer");
		@session_start();
		$_SESSION['timer'] = time();
		exit();
	}



	//change folder to current

	$GLOBALS['my_file_name'] = 'runServer';

	require_once(INC_DIR.'common.php');

	if ( isset($_REQUEST['delete']) )
	{


		$ID = $_REQUEST['delete'];
		$connID = $_SESSION['fc_connections'][$ID]['clientId'];

		unset($_SESSION['fc_connections'][$ID]);
		unset($_SESSION ['connect'][$connID]);


		unset($_SESSION['fc_inst'][$ID]);

		$tempArray = $_SESSION['fc_gender_cache'];
		foreach( $_SESSION['fc_connections'] as $key=>$val )
		{
			if ( isset($val['userid']) )
			    unset($tempArray[$val['userid']]);

		}
		list($k,$v) = each($tempArray);

		unset($_SESSION['fc_users_cache'][$k]);//[fc_inst]
		unset($_SESSION['fc_gender_cache'][$k]);
		$stmt = new Statement("DELETE FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE id = ?",223);
		$stmt->process($ID);
		$_SESSION['client']--;
		exit();
	}
	if ( isset($_REQUEST['deleteID']) )
	{
		$_SESSION['fc_connections'][$_REQUEST['deleteID']]['userid'] = '';
		exit();
	}


	$pInfo = pathinfo(__FILE__);
	chdir( $pInfo['dirname'] );
	//---
	if (!isset($_SESSION['client']))
    	$_SESSION['client'] = -1;


	$GLOBALS['fc_config_stop'] = false;



	$GLOBALS['fc_config']['botsdata_path'] =  INC_DIR . '.' . $GLOBALS['fc_config']['botsdata_path'];

	require_once( 'myxml.inc.php');
	require_once('patServer.php');
	require_once('patXMLServer_Dom.php');
  require_once('socketServer.php');
	$server = new socketServer(
								$GLOBALS['fc_config']['socketServer']['host'],
								$GLOBALS['fc_config']['socketServer']['port']
							  );

	$GLOBALS['socket_server'] = &$server;
	$url = utf8_decode($_REQUEST['str']);

	//$url = $_REQUEST['str'];
	$url = str_replace("+" ,"^%$#@#$#" , $url);
	$url = urldecode( $url );
	$url = str_replace("^%$#@#$#" , "+" , $url);


	$server->setMaxClients( $GLOBALS['fc_config']['socketServer']['max_clients'] );
	$server->start(stripcslashes($url));
?>