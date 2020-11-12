<?php

require_once('init.php');

if(!inSession()) {
	include('login.php');
	exit;
}
//--------------------------------
// highlight page. artemK0
//--------------------------------
$bold = highlightPage(__FILE__);
$smarty->assign($bold[0], $bold[1]);
$error = '';
$notice = '';

if(!isset($_REQUEST['ispublic'])) $_REQUEST['ispublic'] = null;
if(!isset($_REQUEST['ispermanent'])) $_REQUEST['ispermanent'] = null;

if(isset($_REQUEST['add']))
{
	if(!$_REQUEST['name'])
	{
		$error = 'name cannot be empty';
	}
	else
	{
		$stmt = new Statement('SELECT MAX(id)+1 AS newid FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms',57);
		$rs = $stmt->process();
		$rec = $rs->next();
		if(!isset($rec['newid'])) $rec['newid'] = 1;

		$stmt = new Statement('INSERT INTO '.$GLOBALS['fc_config']['db']['pref'].'rooms (created, name, password, ispublic, ispermanent) VALUES (NOW(), ?, ?, ?, ?)' , 58 );
		$_REQUEST['id'] = $stmt->process($_REQUEST['name'], $_REQUEST['password'], $_REQUEST['ispublic'], $_REQUEST['ispermanent']);

		$notice = 'room added';
	}
}
else if(isset($_REQUEST['set']))
{
	if(!$_REQUEST['name'])
	{
		$error = 'name cannot be empty';
	}
	else if(!$_REQUEST['id']) {
		$error = 'wrong room id';
	} else {
		$stmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'rooms SET name=?, password=?, ispublic=?, ispermanent=? WHERE id=?', 59);
		$stmt->process($_REQUEST['name'], $_REQUEST['password'], $_REQUEST['ispublic'], $_REQUEST['ispermanent'], $_REQUEST['id']);
		$notice = 'room updated';
	}
} else if(isset($_REQUEST['del'])) {
	if(!$_REQUEST['id']) {
		$error = 'wrong room id';
	} else {
		$stmt = new Statement('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id=?' , 60 );
		$stmt->process($_REQUEST['id']);
		$notice = 'room removed';
		$_REQUEST['id'] = null;
	}
}


if(isset($_REQUEST['id'])) {
	$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id=?' , 80);
	$rs = $stmt->process($_REQUEST['id']);
	$_REQUEST = $rs->next();
} else {
	$_REQUEST['id'] = 0;
	$_REQUEST['name'] = '';
	$_REQUEST['password'] = '';
	$_REQUEST['ispublic'] = 'y';
	$_REQUEST['ispermanent'] = 'y';
}

$_REQUEST['error'] = $error;
$_REQUEST['notice'] = $notice;

//Assign Smarty variables and load the admin template
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['room.tpl']);
$smarty->display('room.tpl');

?>
