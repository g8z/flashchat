<?php
  //require('FirePHPCore/fb.php');
  function fb(){}

//$t=time();
//$time = microtime();
	//ob_start();
	$_REQUEST['session_inst'] = 1;

	$req = array_merge($_GET, $_POST);

	$GLOBALS['fc_config_stop'] = true;
	if($req['c'] == 'lin' || !isset($req['id']) || !$req['id'] || $req['c'] == 'tzset' || $req['c'] == 'srtbt')
		$GLOBALS['fc_config_stop'] = false;

	$GLOBALS['my_file_name'] = 'getxml';
	require_once('inc/common.php');

	$_SESSION['session_chat'] = 1;

	if($req['c'] == 'glan' && strlen($req['l']) == 2)
	{
		$in_str = 'inc/langs/'.$req['l'].'.php';
		//if(file_exists($in_str))
		require_once($in_str);
	}

	$GLOBALS['fc_config_stop'] = false;

	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');
	header('Pragma: public');
	header('Expires: 0');
	header('Content-type: text/xml');
	//header('Content-type: text/plain');

	/*if(function_exists('date_default_timezone_set'))  {
		date_default_timezone_set('America/Los_Angeles');
	}*/
	$time_start = microtime();

	$conn =& ChatServer::getConnection($req);

	$mqi = $conn->process($req);
	//echo "<pre>";print_r($GLOBALS['fc_config']);echo "</pre>";
	$time_end = microtime();


	$mytime =  $time_end - $time_start;

	ChatServer::purgeExpired();

	if ($_POST['c'] == 'lin' && $GLOBALS['fc_config']['cacheType'] != 2) {
		$limit = $GLOBALS['fc_config']['maxMessageCount'];
		$pref = $GLOBALS['fc_config']['db']['pref'];
		$sqlLastMessages = "SELECT * FROM {$pref}messages WHERE command = 'msg' ORDER BY id DESC LIMIT $limit";
		$result = mysql_query($sqlLastMessages) or die(mysql_error());
		$cnt = 1;
		$last = 1;
		while ($row = mysql_fetch_object($result)) {
			if (++$cnt > $limit) {
				$last = $row->id;
				break;
			}
		}
		if ($last > 1) {
			$sqlClear = "DELETE FROM {$pref}messages WHERE id < $last;";
			$result = mysql_query($sqlClear) or die(mysql_error());
		}

	}

	//for debugging

  while($mqi->hasNext()) {
    $tmp = $mqi->next();
    $messages .= $tmp->toXML($conn->tzoffset, 2 == $conn->userRole);
  }
  if ($messages) {
    fb($messages);
  }

?>
<response id="<?php echo $conn->id?>"><?php
		echo $conn->lngMsg;
		echo $messages;
		if($req['c'] == 'msg' && $GLOBALS['fc_config']['enableBots'])
		{
			$GLOBALS['fc_config']['bot']->processMessages();
		}
	?></response>
<?php
	//ob_end_flush();
?>