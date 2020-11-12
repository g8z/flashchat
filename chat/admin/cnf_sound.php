<?php
define("SOUND_DIR",INC_DIR."../sounds/");

// process form submit
//----------
if( $_POST['submit'] )
{
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


$query="SELECT ".$GLOBALS['fc_config']['db']['pref']."config.*, ".$GLOBALS['fc_config']['db']['pref']."config_values.value
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config, ".$GLOBALS['fc_config']['db']['pref']."config_values
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.parent_page = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ?
		  ORDER BY _order";
$stmt = new Statement($query, 401);
$f = $stmt->process($module, $_SESSION['session_inst']);



//populate array with values
$fields['sound'] = array();
$fields['sound_patch'] = array();
$fields['sound_files'] = array();

$i = 0;
$j = 0;
$m = 0;

while($v = $f->next())
{
	if ( $v['level_0'] == 'sound_options')
	{
		$i ++;
	}
	else {
		$j ++;
	}
}
$m = $j-$i;
$i = $j = 0;
$f = $stmt->process($module, $_SESSION['session_inst']);

while($v = $f->next())
{
	if ( $v['level_0'] == 'sound_options')
	{
		$bool1 = true;
		$bool2 = false;
		$i++;
		$v['_order'] = $i+$m;
	    $fields['sound_patch'][$i-1] = $v;
	}
	else
	{
		$bool2 = true;
		$bool1 = false;
		$j ++;
		$v['_order'] = $j;
		$fields['sound'][$j-1] = $v;
	}
//	echo "<pre>";print_r($v);
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

			$fields['sound'][$key]['r'] = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$val['id']]['r'];
		}
	}
}

//--- assign Smarty values
$smarty->assign('cnf_langs',$GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_sound']);
$smarty->assign('fields', $fields);
$smarty->assign('errMsg', $errMsg);
?>