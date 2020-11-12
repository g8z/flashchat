<?php

require_once('init.php');

if(!inSession()) {
	include('login.php');
	exit;
}
else if(!inPermission('bans'))
{
	$tabName = 'Bans';
	include('nopermit.php');
	exit;
}
//--------------------------------
// highlight page. artemK0
//--------------------------------
$bold = highlightPage(__FILE__);
$smarty->assign($bold[0], $bold[1]);
$req = array_merge($_GET, $_POST);

if(isset($_REQUEST['unbanid'])) {
	$stmt = new Statement('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'bans WHERE id=?' , 258 );
	$stmt->process($_REQUEST['unbanid']);
	$notice = 'ban removed';
}
if(!isset($_REQUEST['sort']) || isset($_REQUEST['clear'])) $_REQUEST['sort'] = 'none';
//changed on 090706 for chat instances
/*$stmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}bans ORDER BY userid");
$rs = $stmt->process();*/
$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'bans where instance_id = ? ORDER BY userid' , 254 );
$rs = $stmt->process($_SESSION['session_inst']);
//changed on 090706 for chat instances ends here
$bannedlist = array();
while($rec = $rs->next()) {
	$temp_ban = array();

	$user  = ChatServer::getUser($rec['userid']);
	$buser = ChatServer::getUser($rec['banneduserid']);

	$temp_ban['user']  	= $user['login'];
	$temp_ban['buser'] 	= $buser['login'];
	$temp_ban['userid']	= $rec['userid'];
	$temp_ban['banneduserid'] = $rec['banneduserid'];
	$temp_ban['roomid'] 	= $rec['roomid'];

	$temp_ban['banlevel'] = "chat";
	if ($rec['roomid']) {$temp_ban['banlevel'] = "room";}
	if ($rec['ip']) {$temp_ban['banlevel'] = "ip";}

	$temp_ban['created'] 	= $rec['created'];
	$temp_ban['roomid'] 	= $rec['roomid'];
	$temp_ban['ip'] 	= $rec['ip'];
	$temp_ban['id'] 	= $rec['id'];
	array_push($bannedlist, $temp_ban);
}

if ($_REQUEST['sort'] != 'none') {
	sort_table($_REQUEST['sort'], $bannedlist);
}

//Assign Smarty variables and load the admin template
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['banlist.tpl']);
$smarty->assign('error',$error);
$smarty->assign('notice',$notice);
$smarty->assign('bannedlist',$bannedlist);
$smarty->display('banlist.tpl');

?>