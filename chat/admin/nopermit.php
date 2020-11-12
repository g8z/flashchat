<?php
require_once('init.php');

global $tabName;

//Assign Smarty variables and load the admin template
$smarty->assign('title', $tabName); 
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['nopermit.tpl']);
$smarty->display('nopermit.tpl');
?>