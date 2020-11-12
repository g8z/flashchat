<?php

require_once('init.php');

if(!inSession()) {
	include('login.php');
	exit;
}
else if(!inPermission('connections'))
{
	$tabName = 'Connections';
	include('nopermit.php');
	exit;
}
//--------------------------------
// highlight page. artemK0
//--------------------------------
$bold = highlightPage(__FILE__);
$smarty->assign($bold[0], $bold[1]);
if(!isset($_REQUEST['sort']) || isset($_REQUEST['clear'])) $_REQUEST['sort'] = 'none';

/*$stmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}connections");
$rs = $stmt->process();*/
// changed on 090706 for chat instances ends here
$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections where instance_id=?' , 242 );
$rs = $stmt->process($_SESSION['session_inst']);

// changed on 090706 for chat instances ends here
if($rs->hasNext())
{
	$connections = array();
	while($rec = $rs->next())
	{
		$temp_connection = array();

		//$temp_connection['updated'] = substr($rec['updated'], 8, 2) . ':' . substr($rec['updated'], 10, 2);
		//$temp_connection['created'] = substr($rec['created'], 8, 2) . ':' . substr($rec['created'], 10, 2);
		$temp_connection['updated'] = $rec['updated'];//substr($rec['updated'], 8, 2) . ':' . substr($rec['updated'], 10, 2);
		$temp_connection['created'] = $rec['created'];//substr($rec['created'], 8, 2) . ':' . substr($rec['created'], 10, 2);

		/*
		$up_hr  = @date("H" , strtotime($rec['updated']));
		$up_hr  = ($up_hr == '')? substr($rec['updated'], 8, 2) : $up_hr;
		$up_min = @date("i", strtotime($rec['updated']));
		$up_min  = ($up_min == '')? substr($rec['updated'], 10, 2) : $up_min;

		$cr_hr  = @date("H" , strtotime($rec['created']));
		$cr_hr  = ($cr_hr == '')? substr($rec['created'], 8, 2) : $cr_hr;
		$cr_min = @date("i", strtotime($rec['created']));
		$cr_min  = ($cr_min == '')? substr($rec['created'], 10, 2) : $cr_min;

		$temp_connection['updated'] =  $up_hr. ':' .$up_min;
		$temp_connection['created'] =  $cr_hr. ':' .$cr_min;
		*/
		//---

		$temp_connection['id'] = $rec['id'];
		$temp_connection['userid'] = $rec['userid'];
		if(isset($rec['userid'])){
			$user = ChatServer::getUser($rec['userid']);
			$temp_connection['login'] = $user['login'];
		}
		$temp_connection['roomid'] = $rec['roomid'];
		$temp_connection['state'] = $rec['state'];
		$temp_connection['color'] = $rec['color'];
		$temp_connection['start'] = $rec['start'];
		$temp_connection['lang'] = $rec['lang'];
		$temp_connection['ip'] = $rec['ip'];
		$temp_connection['tzoffset'] = $rec['tzoffset'];
		$temp_connection['host'] = @gethostbyaddr($rec['ip']);

		array_push($connections, $temp_connection);
	}
}

if ($_REQUEST['sort'] != 'none') {
	sort_table($_REQUEST['sort'], $connections);
}

//Assign Smarty variables and load the admin template
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['connlist.tpl']);
$smarty->assign('connections',$connections);
$smarty->display('connlist.tpl');

?>
