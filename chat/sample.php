<?php
	require_once('inc/smartyinit.php');

	$data = array();
	$lin = false;

	$rec = array();
	$rec = $_REQUEST;

	if(isset($rec['username']))
	{
		if(!isset($rec['lang']))
			$rec['lang'] = $GLOBALS['fc_config']['defaultLanguage'];

		if(!isset($rec['password']))
			$rec['password'] = '';

		$params = array(
			'login' => $rec['username'],
			'password' => $rec['password'],
			'lang'  => $rec['lang']
		);

		$lin = true;

		//third parameter = width in pixels
		//fourth parameter = height in pixels
		$data['flashChatTag'] = flashChatTag('600', '500', $params);
	}
	else
	{
		$data['languages'] = $GLOBALS['fc_config']['languages'];
		$data['defaultLanguage'] = $GLOBALS['fc_config']['defaultLanguage'];
	}

	$data['lin'] = $lin;
	$smarty->assign('data', $data);
	$smarty->display('sample.tpl');
?>
