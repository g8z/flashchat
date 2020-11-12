<?php

require_once('init.php');

if(!inSession())
{
	include('login.php');
	exit;
}
elseif(!inPermission('users'))
{
	$tabName = 'Users';
	include('nopermit.php');
	exit;
}
//--------------------------------
// highlight page. artemK0
//--------------------------------
$bold = highlightPage(__FILE__);
$smarty->assign($bold[0], $bold[1]);
if(!isset($_REQUEST['sort']) || isset($_REQUEST['clear'])) $_REQUEST['sort'] = 'none';

ChatServer::prepare();

$cms = $GLOBALS['fc_config']['cms'];
$cmsclass = strtolower(get_class($cms));
$manageUsers = ($cmsclass == 'defaultcms') || ($cmsclass == 'statelesscms_notused' && (!isset($cms->constArr)));
if(isset($cms->constArr))
{
	$manageUsers = false;
}
if(!$manageUsers)
{
	//Assign Smarty variables and load the admin template
	if($cmsclass == 'statelesscms')
	{
		$smarty->assign('manageUsers', !$manageUsers);
	}
	else
	{
		$smarty->assign('intCms', 1);
	}
	$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['usrlist.tpl']);
	$smarty->display('usrlist.tpl');

	exit;
}

//$stmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}users");
//$rs = $stmt->process();
//changed on 090706 for chat instances
$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users where instance_id=?',106);
$rs = $stmt->process($_SESSION['session_inst']);
// changed on 090706 for chat instances ends here

function roles2str($roles)
{
	switch($roles)
	{
		case ROLE_ADMIN: return 'admin';
		case ROLE_MODERATOR: return 'moderator';
		case ROLE_USER: return 'user';
		case ROLE_CUSTOMER: return 'customer';
		case ROLE_SPY: return 'spy';
	}
}

$users = array();
if($rs != null)
{
	while($rec = $rs->next()) {
		$temp_user 		= array();
		$temp_user['id']	= $rec['id'];
		$temp_user['login']	= $rec['login'];
		$temp_user['password'] = $rec['password'];
		$temp_user['roles']	= roles2str($rec['roles']);

		array_push($users, $temp_user);
	}
}

if ($_REQUEST['sort'] != 'none') {
	sort_table($_REQUEST['sort'], $users);
}

//Assign Smarty variables and load the admin template
$smarty->assign('users',$users);
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['usrlist.tpl']);
$smarty->display('usrlist.tpl');

?>