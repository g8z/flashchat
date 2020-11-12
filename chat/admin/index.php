<?php

require_once('init.php');

if(!inSession())
{
	include('login.php');
	exit;
}
$_SESSION['session_inst'] = 1;

//--------------------------------
// highlight page. artemK0
//--------------------------------
$bold = highlightPage(__FILE__);
$smarty->assign($bold[0], $bold[1]);

$stmt = new Statement('SELECT count(*) as msgnumb FROM '.$GLOBALS['fc_config']['db']['pref'].'messages WHERE command=\'msg\' AND (userid IS NOT NULL OR roomid IS NOT NULL)',160);

$rs = $stmt->process();
$rec = $rs->next();
$msgnumb = $rec['msgnumb'];

if($manageUsers)
{
	$stmt = new Statement('SELECT count(*) as usrnumb FROM '.$GLOBALS['fc_config']['db']['pref'].'users');
	$rs = $stmt->process();
	$rec = $rs->next();
	$usrnumb = $rec['usrnumb'];
}
else
{
	$usrnumb = 0;
}

$lang_dir = INC_DIR . 'langs/admin/admin_'.$_COOKIE['language'].'.php';
require_once($lang_dir);
//Assign Smarty variables and load the admin template
$smarty->assign('langs_top', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['top.tpl']);
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['admin_index.tpl']);
$smarty->assign('manageUsers',$manageUsers);
$smarty->assign('usrnumb',$usrnumb);
$smarty->assign('msgnumb',$msgnumb);
$smarty->display('admin_index.tpl');

?>
