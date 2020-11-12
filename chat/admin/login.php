<?php

require_once('init.php');

$error = '';

function fc_doLogin($userid)
{
	global $smarty;
	$_SESSION['userid'] = $userid;
	include('index.php');
	exit;
}

$userid = ChatServer::isLoggedIn();
if($userid != null && ChatServer::userInRole($userid, ROLE_ADMIN))
{
	fc_doLogin($userid);
}
else
{
	unset($_SESSION['userid']);
}

if(isset($_REQUEST['do']))
{

	if( ($userid = ChatServer::login($_REQUEST['login'], $_REQUEST['password'])) && (ChatServer::userInRole($userid, ROLE_ADMIN) || ChatServer::userInRole($userid, ROLE_MODERATOR)) )
	{

		setcookie('language', '', time() - 60*60*24*30);
		unset($_COOKIE['language']);
		setcookie('language', $_POST['language_select'], time() + 60*60*24*30);
		$_COOKIE['language'] = $_POST['language_select'];
		fc_doLogin($userid);
	}
	else
	{
		unset($_SESSION['userid']);
		$lang_dir = INC_DIR . 'langs/admin/admin_'.$_REQUEST['language_select'].'.php';
		if(!file_exists($lang_dir))
		{
			$_REQUEST['language_select'] = 'en';
			$lang_dir = INC_DIR . 'langs/admin/admin_'.$_REQUEST['language_select'].'.php';
		}
		ob_start();
		require_once($lang_dir);
		ob_end_clean();
		$error = $GLOBALS['fc_config']['languages_admin'][$_REQUEST['language_select']]['login.tpl']['t5'].' '.mysql_error();
		$smarty->assign('defLanguage', $_REQUEST['language_select']);
	}
}
else
{
	if(isset($_REQUEST['language_select']))
	{
		setcookie('language', '', time() - 60*60*24*30);
		unset($_COOKIE['language']);
		setcookie('language', $_REQUEST['language_select'], time() + 60*60*24*30);
		$_COOKIE['language'] = $_REQUEST['language_select'];
		$lang_dir = INC_DIR . 'langs/admin/admin_'.$_REQUEST['language_select'].'.php';
		if(!file_exists($lang_dir))
		{
			$_REQUEST['language_select'] = 'en';
			$lang_dir = INC_DIR . 'langs/admin/admin_'.$_REQUEST['language_select'].'.php';
		}
		ob_start();
		require_once($lang_dir);
		ob_end_clean();
		$smarty->assign('langs_top', $GLOBALS['fc_config']['languages_admin'][$_REQUEST['language_select']]['top.tpl']);
		$smarty->assign('defLanguage', $_REQUEST['language_select']);
	}

	unset($_SESSION['userid']);
	$_REQUEST['login'] = '';
	$_REQUEST['password'] = '';
}

$installed = isInstalled();
if( !$installed )
{
	unset($_SESSION['userid']);
	$error = $GLOBALS['fc_config']['languages_admin'][$_REQUEST['language_select']]['login.tpl']['t6'];
}

// gets all language names from langs/admin dir. artemK0
$d = dir(INC_DIR . 'langs/admin');
while(false !== ($entry = $d->read()))
{
	if($entry == '.' || $entry == '..') continue;
	//require_once(INC_DIR . 'langs/admin/' . $entry);
}
$d->close();
$lang_names = array();
foreach($GLOBALS['fc_config']['languages'] as $k => $v)
{
	if(isset($v['name']))
	{
		if(file_exists(INC_DIR . 'langs/admin/admin_' . $k . '.php'))
		{
			$lang_names[$k] = $v['name'];
		}
	}
}
if(!isset($_REQUEST['language_select']))
{
	if(!isset($_COOKIE['language']))
	{
		$_REQUEST['language_select'] = $GLOBALS['fc_config']['defaultLanguage'];
	}
	else
	{
		$_REQUEST['language_select'] = $_COOKIE['language'];
	}
	$smarty->assign('defLanguage', $GLOBALS['fc_config']['defaultLanguage']);
}

//Assign Smarty variables and load the admin template
$smarty->assign('error',$error);
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_REQUEST['language_select']]['login.tpl']);
$smarty->assign('installed',$installed);
$smarty->assign('languages', $lang_names);
$smarty->assign('fc_login',$_POST['login']);
$smarty->assign('fc_pass',$_POST['password']);
$smarty->display('login.tpl');
?>