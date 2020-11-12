<?php
define('INC_DIR', 'inc/') ;
define("SOUND_DIR",INC_DIR."../sounds/");
define("APPDATA_DIR",INC_DIR.'../temp/appdata/');
//for form validation
define("LANG_VALUE_REQUIRED", 'Please insert data. Value <b>%s</b> is required');
define("LANG_VALUE_INCORRECT",'Please insert correct value for field <b>%s</b>');

require_once(INC_DIR.'smartyinit.php');
require_once(INC_DIR.'common.php');
include_once(INC_DIR.'../admin/cnf_functions.php');
include_once(INC_DIR.'../admin/cnf_validators.php');
include_once(INC_DIR.'../admin/cnf_general.php');
//all necessary fields on page
include_once(INC_DIR.'../admin/cnf_values.php');

$smarty->template_dir  =  INC_DIR.'../templates/admin';

if(!isset($_COOKIE['language']))
{
	$_COOKIE['language'] = 'en';
}
$lang_dir = INC_DIR.'langs/admin/admin_'.$_COOKIE['language'].'.php';
if(!file_exists($lang_dir))
{
	$_COOKIE['language'] = 'en';
	$lang_dir = INC_DIR.'langs/admin/admin_'.$_COOKIE['language'].'.php';
}
require_once($lang_dir);

// process form submit
//----------
if( $_POST['submit']) {
	$fld = getPOSTfields('fld_');

	//validator rule
	//greate array $valid_rule
	$valid_rule = array();

	foreach($fld['err'] as $k => $v)
	{
		if ( $fld['err'][$k]['type'] == 'integer')
		{
			$valid_rule[$k][0] = 'number';
			$valid_rule[$k][1] = 1;
			$valid_rule[$k][2] = $fld['err'][$k]['name'];
		}
		switch($fld['err'][$k]['field'])
		{
			case 'pan':
				$valid_rule[$k][0] = '^((\-{1})|())(((100){1})|([0-9]{1,2}))$';
				$valid_rule[$k][1] = 1;
				$valid_rule[$k][2] = $fld['err'][$k]['name'];
				break;
			case 'volume':
				$valid_rule[$k][0] = '(^[0-9]{1,2}$)|^(100){1}$';
				$valid_rule[$k][1] = 1;
				$valid_rule[$k][2] = $fld['err'][$k]['name'];
				break;
		}
	}

	$errMsg = '';
	reset($fld);
	foreach($fld['err'] as $k => $v)
	{
		if( isset($valid_rule[$k]) )
		{
			$errMsg .= value_validator($v['value'],$valid_rule[$k],$valid_rule[$k]['name']);
			if($errMsg != '')
			{
			//	break;
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

		@unlink(APPDATA_DIR.'config'.'_'.$_SESSION['session_inst'].'.php');
	}
	
	
}

$configs = array(
	'maxMessageSize', 'maxMessageCount', 'userTitleFormat', 'labelFormat', 'defaultRoom', 'roomTitleFormat', 'defaultTheme', 'defaultSkin');
$fields = array();
foreach($configs as $conf) {
	$query = 'SELECT '.$GLOBALS['fc_config']['db']['pref'].'config.*, '.$GLOBALS['fc_config']['db']['pref'].'config_values.value
			  FROM '.$GLOBALS['fc_config']['db']['pref'].'config, '.$GLOBALS['fc_config']['db']['pref'].'config_values
			  WHERE '.$GLOBALS['fc_config']['db']['pref'].'config.level_0 = ? AND
			  '.$GLOBALS['fc_config']['db']['pref'].'config.id = '.$GLOBALS['fc_config']['db']['pref'].'config_values.config_id AND
			  '.$GLOBALS['fc_config']['db']['pref'].'config_values.instance_id = ?
			  ORDER BY _order';
	
	$stmt = new Statement($query,449);
	$f = $stmt->process($conf, $_SESSION['session_inst']);

	//populate array with values
	while($v = $f->next())
	{
		$fields[$v['id']] = $v;
		$fields[$v['id']]['comment'] = addslashes($fields[$v['id']]['comment']);
		$fields[$v['id']]['info'] = addslashes(htmlentities($fields[$v['id']]['info']));
		
		if ( $_POST['submit'] && $errMsg != '' )
		{
			$fields[$v["id"]]['value'] = $_REQUEST['val_'.$v["id"]];
	
	
			if( isset($_SESSION['error_name']) && $_SESSION['error_name']==$_REQUEST['name_'.$v["id"]] )
			{
				$fields[$v["id"]]['value'] = '';
				unset($_SESSION['error_name']);
			}
		}
	}
}


//Assign Smarty variables and load the admin template
$smarty->assign('errMsg', $errMsg);
$smarty->assign('value', $value);
$smarty->assign('fields', $fields);
$smarty->assign('cnf_langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_list']);
$smarty->assign('cnff_langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_filesharing']);
$smarty->assign('cnfo_langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_other']);
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['admin_index.tpl']);
$smarty->display('install_header.tpl');
$smarty->display('cnf_list.tpl');
//show error msgs only at the top
$smarty->assign('errMsg', null);








//font
$query = 
	'SELECT '.$GLOBALS['fc_config']['db']['pref'].'config.*, '.$GLOBALS['fc_config']['db']['pref'].'config_values.value
	FROM '.$GLOBALS['fc_config']['db']['pref'].'config, '.$GLOBALS['fc_config']['db']['pref'].'config_values
	WHERE '.$GLOBALS['fc_config']['db']['pref'].'config.level_0 = ? AND
	'.$GLOBALS['fc_config']['db']['pref'].'config.id = '.$GLOBALS['fc_config']['db']['pref'].'config_values.config_id AND
	'.$GLOBALS['fc_config']['db']['pref'].'config_values.instance_id = ?
	ORDER BY _order';
$stmt = new Statement($query,449);
$f = $stmt->process('text', $_SESSION['session_inst']);
unset($size);
unset($family);


//populate array with values
$fields = array();
$family=array();
$i=0;
while($v = $f->next())
{
	//----------------------------------------------------------------
	if ( $v['level_1'] == 'fontSize' )//greate string size
	{
		if ( !isset($size) )
		$size = $v['value'];
		else
		$size = $size.",".$v['value'];
		continue;
	}

	if ( $v['level_1'] == 'fontFamily' )//greate string family
	{
		$family[$i]['name']=$v['value'];
		$family[$i]['id']=$v['id'];
		$family[$i]['disabled']=$v['disabled'];
		$i++;
		continue;
	}
	//-----------------------------------------------------------------

	$fields[$v['id']] = $v;
	$fields[$v['id']]['comment'] = addslashes($fields[$v['id']]['comment']);
	if ( isset($_POST['submit']) && $errMsg != '' )
	$fields[$v["id"]]['value'] = $fld['err'][$v["id"]]['value'];
}
foreach($family as $k => $v)
{
	$sort_arr[$k]=$family[$k]['name'];
}
array_multisort($sort_arr, SORT_ASC, SORT_STRING, $family);
//echo '<pre>'; print_r($fields); echo '</pre>';
foreach($fields as $k => $v)
{
	$lang_title = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$k]['value'];
	$lang_info = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$k]['hint'];
	if($lang_title != '') $fields[$k]['title'] = $lang_title;
	if($lang_info != '') $fields[$k]['info'] = $lang_info;
}
//------------
//--- assign Smarty values
$smarty->assign('cnf_langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_font']);
$smarty->assign('size', $size);
$smarty->assign('family', $family);
$smarty->assign('showFamilies', false);
$smarty->assign('fields', $fields);
$smarty->display('cnf_font.tpl');











//sounds
$query="SELECT ".$GLOBALS['fc_config']['db']['pref']."config.*, ".$GLOBALS['fc_config']['db']['pref']."config_values.value
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config, ".$GLOBALS['fc_config']['db']['pref']."config_values
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.parent_page = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ?
		  ORDER BY _order";
$stmt = new Statement($query, 401);
$f = $stmt->process(sound, $_SESSION['session_inst']);
//populate array with values
$fields['sound'] = array();
$fields['sound_patch'] = array();
$fields['sound_files'] = array();

$i = 0;
$j = 0;
while($v = $f->next())
{
	if ( $v['level_0'] == 'sound_options')
	{
		$bool1 = true;
		$bool2 = false;
	    $fields['sound_patch'][$i++] = $v;
	}
	else
	{
		$bool2 = true;
		$bool1 = false;
		$fields['sound'][$j++] = $v;
	}

	if ( $_POST['submit'] && $errMsg != '')//
		if ( $bool1 )
		    $fields['sound_patch'][$i-1]['value'] = $fld['err'][$v['id']]['value'];
		else
			$fields['sound'][$j-1]['value'] = $fld['err'][$v['id']]['value'];
}

//---read all files from directory ../sounds/
if ($handle = opendir(SOUND_DIR)) {

	while (false !== ($file = readdir($handle))) {
        $fields['sound_files'][] = $file;
    }
    closedir($handle);
}
foreach($fields as $k => $v)
{
	if($k == 'sound_patch')
	{
		foreach($v as $key => $val)
		{
			$lang_title = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$val['id']]['value'];
			$lang_info = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$val['id']]['hint'];

			if($lang_title != '') $fields['sound_patch'][$key]['title'] = $lang_title;
			if($lang_info != '') $fields['sound_patch'][$key]['info'] = $lang_info;

			$fields['sound_patch'][$key]['r'] = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$val['id']]['r'];
		}
	}
	elseif($k == 'sound')
	{
		foreach($v as $key => $val)
		{
			$lang_title = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$val['id']]['value'];
			$lang_info = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$val['id']]['hint'];
			toLog('$lang_info', $lang_info);
			if($lang_title != '') $fields['sound'][$key]['title'] = $lang_title;
			if($lang_info != '') $fields['sound'][$key]['info'] = $lang_info;
			
			$fields['sound'][$key]['info'] = addslashes(htmlentities($fields['sound'][$key]['info']));

			
			$fields['sound'][$key]['r'] = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$val['id']]['r'];
		}
	}
}

//--- assign Smarty values
$smarty->assign('cnf_langs',$GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_sound']);
$smarty->assign('fields', $fields);
$smarty->display('cnf_sound.tpl');
$smarty->display('install_footer.tpl');
?>
