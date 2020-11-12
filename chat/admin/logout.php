<?php

require_once('init.php');
//--------------------------------
// highlight page. artemK0
//--------------------------------
$bold = highlightPage(__FILE__);
$smarty->assign($bold[0], $bold[1]);
unset( $_SESSION['userid'] );
// added on 090706 for chat instances
unset( $_SESSION['session_inst'] );
$smarty->assign('fc_admin_chat_instance','');
// added on 090706 for chat instances ends here

ChatServer::prepare();
$cms = $GLOBALS['fc_config']['cms'];
$cmsclass = strtolower(get_class($cms));
$manageUsers = ($cmsclass == 'defaultcms') || ($cmsclass == 'statelesscms'  && (! isset($cms->constArr)));

ChatServer::logout();

//Assign Smarty variables and load the admin template
$smarty->assign('manageUsers',$manageUsers);
$smarty->assign('installed',isInstalled());
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['logout.tpl']);
$smarty->display('logout.tpl');

?>