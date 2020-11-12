<?php
if(!isset($_GET['search'])) die;
include_once('../admin/init.php');

include_once('../admin/cnf_functions.php');
include_once('../admin/cnf_validators.php');
include_once('../admin/cnf_values.php');


$TABLE_PREF = $GLOBALS['fc_config']['db']['pref'];
define("LANG_VALUE_REQUIRED", 'Please insert data. Value <b>%s</b> is required');
define("LANG_VALUE_INCORRECT",'Please insert correct value for field <b>%s</b>');

define("DBHOST", $GLOBALS['fc_config']['db']['host']);
define("DBUNAME",$GLOBALS['fc_config']['db']['user']);
define("DBPW",   $GLOBALS['fc_config']['db']['pass']);
define("DBNAME", $GLOBALS['fc_config']['db']['base']);
define("APPDATA_DIR",dirname(__FILE__).'/../temp/appdata/');

connectdb();
/*
if( $_POST['sub_save'] ||  isset($_REQUEST['delete']))
{
	$fld = getPOSTfields('fld_');
	$valid_rule = array();
	foreach($fld['err'] as $k => $v)
	{
		if ( substr($fld['err'][$k]['field'],0,strpos($fld['err'][$k]['field'],"_")) == 'float')
		{
			$valid_rule[$k][0] = '^[0-9]+(\,([0-9])+)*$';
			$valid_rule[$k][1] = 1;
			$valid_rule[$k][2] = $fld['err'][$k]['name'];
		}
	}

	$errMsg = '';

	//---------------------------------------------


	reset($fld);
	foreach($fld['err'] as $k => $v)
	{
		if( isset($valid_rule[$k]) )
		{
			$errMsg = value_validator($v['value'],$valid_rule[$k],$valid_rule[$k]['name']);
			if($errMsg != '')
			{
				break;
			}
		}
	}

	if( $errMsg == '' )
	{
		foreach($fld['ins'] as $k=>$v)
		{
			$query="UPDATE ".$GLOBALS['fc_config']['db']['pref']."config_values SET value=? WHERE config_id=?
					AND instance_id = ? LIMIT 1";
			$stmt = new Statement($query, 403);
			$f = $stmt->process($v, $k, $_SESSION['session_inst']);
		}

	}
	unlink(APPDATA_DIR.'config'.'_'.$_SESSION['session_inst'].'.php');
}
*/
//-------------------------------
$query="SELECT ".$GLOBALS['fc_config']['db']['pref']."config.*, ".$GLOBALS['fc_config']['db']['pref']."config_values.value
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config, ".$GLOBALS['fc_config']['db']['pref']."config_values
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.parent_page = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ?
		  ORDER BY _order";
$stmt = new Statement($query, 401);
$f = $stmt->process('modules', $_SESSION['session_inst']);

//populate array with values
$fields = array();
$values = array();
$tmp_array=array();
$sign = ',';

	while($v = $f->next())
	{
		$fields[$v['id']] = $v;


		if ( $_POST['sub_save'] && $errMsg != '' )
			$values[$v['id']] = explode(',',$fld['err'][$v["id"]]['value'] );
		else
			$values[$v['id']] = explode(',',$v['value'] );


		$count = count($values[$v['id']]);
		$fields[$v['id']]['comment'] = addslashes($fields[$v['id']]['comment']);

		if ($fields[$v["id"]]['level_1'] != 'anchor' && $fields[$v["id"]]['level_1'] != 'path'&& $fields[$v["id"]]['level_1'] != 'stretch')
		    $fields[$v["id"]]['type'] = 'integer';


		if ( $fields[$v["id"]]['level_1'] == 'path' )
		{
			foreach( $values[$v['id']] as $k1=>$v1 )
			{
				$len = strrpos($v1,".") - strrpos($v1,"/") - 1;
				$values['name'][] = substr($v1,strrpos($v1,"/")+1,$len );
			}
		}
		if ( $fields[$v["id"]]['level_1'] == 'stretch' )
		{
		    $fields[$v["id"]]['type'] = 'boolean';
			foreach ( $values[$v["id"]] as $k1 => $v1)
				if ( $v1 == 'true' )
				    $values[$v["id"]][$k1] = 1;
				else
					$values[$v["id"]][$k1] = 0;
		}
		$fields[$v["id"]]['info']=str_replace('"', "\'", $fields[$v["id"]]['info']);
		if(strpos($fields[$v["id"]]['value'], ".swf")!==false) $tmp_array=explode(",", $fields[$v["id"]]['value']);
	}
list( $key,$val ) = each( $values );
if( $_POST['sub_add'] )
	if ( $val[0] == '' )
	    $count = 1;
	else
		$count++;

if ( $val[0] == '' && !$_POST['sub_add'] ) {
    $count = 0;
}
$IsModules = 0;
$file=array();
$d = dir("./../modules");
$module_names=array();
$module_fname=array();
while (false !== ($entry = $d->read()))
{
	if( strpos($entry,'.')!==false  )
		continue;
	$IsModules = 1;
	$file[]=$entry;
	$indir = dir("./../modules/".$entry);
	while (false !== ($indir_entry = $indir->read()))
	{
		if(strpos($indir_entry, ".swf")!==false)
		{
			$module_fname[]=$indir_entry;
		}
	}
	$indir->close();
}
$d->close();
foreach($module_fname as $k => $v)
{
	$out_dir=substr($d->path, 5)."/".$file[$k]."/".$v;
	$file[$k]=$out_dir;
}
$i=0;
foreach($module_fname as $v)
{
	$module_names[++$i]=ucfirst(substr($v, strrpos($v, "/")+1, -4));
}
//echo "<pre>"; echo print_r($module_names); echo "</pre>";
foreach($fields as $k => $v)
{
	$lang_title = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$k]['value'];
	$lang_info = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$k]['hint'];
	if($lang_title != '') $fields[$k]['title'] = $lang_title;
	if($lang_info != '') $fields[$k]['info'] = $lang_info;
}
require_once('../inc/smartyinit.php');
$smarty->template_dir  = INC_DIR . '../templates/admin';
$smarty->assign('cnf_langs',$GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_modules']);
$smarty->assign( 'is_modules' , $IsModules );
$smarty->assign( 'value' , $value );
$smarty->assign( 'file' , $file );
$smarty->assign( 'module_names', $module_names);
$smarty->assign( 'values',$values );
$smarty->assign( 'count' , $count );
$smarty->assign( 'fields' , $fields );
$smarty->assign( 'errMsg' , $errMsg );
$smarty->assign('title', 'FlashChat Configiguration');
$smarty->assign('module', $module);
$smarty->assign('instances_name', $instances_name);
$smarty->assign('instance_ID', $_SESSION["session_inst"]);
$smarty->assign('fc_help_url','http://www.tufat.com/docs/flashchat/index.php?config=');
$smarty->display('top.tpl');
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_REQUEST['language']]['cnf_top.tpl']);
$smarty->display('cnf_top.tpl');

$smarty->display("cnf_modules.tpl");

$smarty->display('cnf_bottom.tpl');

$smarty->display('bottom.tpl');
?>