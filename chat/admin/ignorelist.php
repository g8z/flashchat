<?php

require_once('init.php');

if(!inSession()) {
	include('login.php');
	exit;
}
else if(!inPermission('ignores'))
{
	$tabName = 'Ignores';
	include('nopermit.php');
	exit;
}
//--------------------------------
// highlight page. artemK0
//--------------------------------
$bold = highlightPage(__FILE__);
$smarty->assign($bold[0], $bold[1]);
if(!isset($_REQUEST['sort']) || isset($_REQUEST['clear'])) $_REQUEST['sort'] = 'none';

$req = array_merge($_GET, $_POST);

if(isset($_REQUEST['unignoreid']))
{
	$stmt = new Statement('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'ignors WHERE ignoreduserid=?',308);
	$stmt->process($_REQUEST['unignoreid']);
	$notice = 'ignore removed';
}
//changed on 090706 for chat instances
/*$stmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}ignors ORDER BY userid");
$rs = $stmt->process();
*/
$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'ignors where instance_id = ? ORDER BY userid',301);
$rs = $stmt->process($_SESSION['session_inst']);
//changed on 090706 for chat instances ends here

$ignores = array();

while($rec = $rs->next())
{
	$ignores_temp = array();

	$user  = ChatServer::getUser($rec['userid']);
	$iuser = ChatServer::getUser($rec['ignoreduserid']);

	$ignores_temp['user'] = $user['login'];
	$ignores_temp['userid'] = $rec['userid'];
	$ignores_temp['iuser'] = $iuser['login'];
	$ignores_temp['iuserid'] = $rec['ignoreduserid'];
	$ignores_temp['created'] = $rec['created'];

	array_push($ignores, $ignores_temp);
}

if ($_REQUEST['sort'] != 'none')
{
	sort_table($_REQUEST['sort'], $ignores);
}

//Assign Smarty variables and load the admin template
$smarty->assign('notice',$notice);
$smarty->assign('error',$error);
$smarty->assign('ignores',$ignores);
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['ignorelist.tpl']);
$smarty->display('ignorelist.tpl');

?>
