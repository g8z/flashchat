<?php

include_once('init.php');

include_once('cnf_functions.php');
include_once('cnf_validators.php');
//all necessary fields on page
include_once('cnf_values.php');


if(!inSession())
{
	include('login.php');
	exit;
}
else if(!inPermission('config'))
{
	$tabName = 'FlashChat Configuration';
	include('nopermit.php');
	exit;
}

//--------------------------------
// highlight page. artemK0
//--------------------------------
$bold = highlightPage(__FILE__);
$smarty->assign($bold[0], $bold[1]);


//set const
$TABLE_PREF = $GLOBALS['fc_config']['db']['pref'];
//for form validation
define("LANG_VALUE_REQUIRED", 'Please insert data. Value <b>%s</b> is required');
define("LANG_VALUE_INCORRECT",'Please insert correct value for field <b>%s</b>');

/* db stuff */
define("DBHOST", $GLOBALS['fc_config']['db']['host']);
define("DBUNAME",$GLOBALS['fc_config']['db']['user']);
define("DBPW",   $GLOBALS['fc_config']['db']['pass']);
define("DBNAME", $GLOBALS['fc_config']['db']['base']);
define("APPDATA_DIR",dirname(__FILE__).'/../temp/appdata/');


//connectto database
connectdb();
//---

$module = $_REQUEST['module'];

if( ! $module ) $module = 'default';


//---tempoarry instance for test
if ( isset($_REQUEST['instances']) )
{
	$_SESSION['session_inst'] = $_REQUEST['instances'];
	$_SESSION['instance_id'] = $_REQUEST['instances'];//this is an adjustment so that if a chat client is used with a different instance it wont clash
	// added on 090706 for chat instances
	$row = fc_admin_current_chat_instance();
	$smarty->assign('fc_admin_chat_instance',$row['name']);
	// added on 090706 for chat instances ends here
}
else
	if ( !isset( $_SESSION['session_inst'] ) )
		$_SESSION['session_inst'] = 1;





$instances_name = array();


$query="SELECT ".$GLOBALS['fc_config']['db']['pref']."config_instances.*
         FROM ".$GLOBALS['fc_config']['db']['pref']."config_instances
		 WHERE ".$GLOBALS['fc_config']['db']['pref']."config_instances.is_active = 1
		 OR ".$GLOBALS['fc_config']['db']['pref']."config_instances.is_default = 1
		 ORDER BY id";
$stmt = new Statement($query, 419);
$f = $stmt->process();

// added for compatibility when in config file does not exists table config_instances. artemK0
$instances_keys=array("id", "is_active", "is_default", "name", "created_date");
$i=0;
while($v = $f->next())
{
	$instances_name[$instances_keys[$i++]] = $v;
}
include_once( 'cnf_'.$module.'.php' );

$dbpref = $GLOBALS['fc_config']['db']['pref'];

//Assign Smarty variables and load the admin template
$smarty->assign('title', 'FlashChat Configuration');
$smarty->assign('module', $module);
$smarty->assign('instances_name', $instances_name);
$smarty->assign('instance_ID', $_SESSION["session_inst"]);
$smarty->assign('fc_help_url','http://www.tufat.com/docs/flashchat/index.php?config=');
$smarty->display('top.tpl');
if(!isset($_REQUEST['language']))
{
	$_REQUEST['language'] = 'en';
}
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_REQUEST['language']]['cnf_top.tpl']);
$smarty->display('cnf_top.tpl');

$path = INC_DIR.'../templates/admin/';
$fh = $path."cnf_{$module}_header.tpl";
$ff = $path."cnf_{$module}_footer.tpl";

if (file_exists($fh)) {
	$smarty->display($fh);
}
$smarty->display("cnf_{$module}.tpl");
if (file_exists($ff)) {
	$smarty->display($ff);
}

$smarty->display('cnf_bottom.tpl');

$smarty->display('bottom.tpl');

?>