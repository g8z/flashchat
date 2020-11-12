<?php
require_once('init.php');
if(!inSession()) {
	include('login.php');
	exit;
}
else if(!inPermission('bots'))
{
	$tabName = 'Bots';
	include('nopermit.php');
	exit;
}
//--------------------------------
// highlight page. artemK0
//--------------------------------
$bold = highlightPage(__FILE__);
$smarty->assign($bold[0], $bold[1]);
if(!isset($_REQUEST['sort']) || isset($_REQUEST['clear'])) $_REQUEST['sort'] = 'none';

$bots = array();
$botnames = array();

if($GLOBALS['fc_config']['enableBots'])
{
	if(isset($_GET['id']))
	{
		$user = ChatServer::getUser($_GET['id']);
		$userId = $GLOBALS['fc_config']['bot']->logout($user['login']);
		$GLOBALS['fc_config']['bot']->disconnectUser2Bot($userId);
	}

	$bots  = $GLOBALS['fc_config']['bot']->getBots();

	            //added on 090706 for chat instances
				$temp_retval = $bots;
				$bots = array();
				foreach($temp_retval as $key=>$ret_attributes)
				{

				//if($ret_attributes['session_inst'] == $_SESSION['session_inst'])
				// {
				  $bots[$key] = $ret_attributes;

				// }

				}
				//added on 090706 for chat instances

	while (list($key, $val) = each($bots))
	{
		$botnames[$val['login']]['id']    = $key;
		$botnames[$val['login']]['login'] = $val['login'];

	}
}

if ($_REQUEST['sort'] != 'none') {
	ksort( $botnames );
}

//Assign Smarty variables and load the botlist template
$smarty->assign('enableBots', $GLOBALS['fc_config']['enableBots']);
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['botlist.tpl']);
$smarty->assign('botnames', $botnames);
$smarty->display('botlist.tpl');

?>