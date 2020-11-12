<?php

//all necessary fields on page

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
			//$valid_rule[$k][1] = 1;
			$valid_rule[$k][2] = $fld['err'][$k]['name'];
		}
		if ( $fld['err'][$k]['type'] == 'string')
			{
				$valid_rule[$k][0] = 'alfanum';
				//$valid_rule[$k][1] = 1;
				$valid_rule[$k][2] = $fld['err'][$k]['name'];
			}
		if ( $fld['err'][$k]['field'] == 'fontColor' || $fld['err'][$k]['field'] == 'BGColor' || $fld['err'][$k]['field'] == 'barColor')
			{
				$fld['ins'][$k] = "'0x".substr($fld['ins'][$k],1);

				$valid_rule[$k][0] = '^[0-9A-Fa-f]{6}$';
				$valid_rule[$k][1] = 1;
				$valid_rule[$k][2] = $fld['err'][$k]['name'];
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
	@unlink(APPDATA_DIR.'config'.'_'.$_SESSION['session_inst'].'.php');//delete file with configuration
}

//-------------------------------
$query = "SELECT ".$GLOBALS['fc_config']['db']['pref']."config.*, ".$GLOBALS['fc_config']['db']['pref']."config_values.value
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config, ".$GLOBALS['fc_config']['db']['pref']."config_values
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.parent_page = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ?
		  ORDER BY _order";
$stmt = new Statement($query, 401);
$f = $stmt->process($module, $_SESSION['session_inst']);
//------------------------------
$query = "SELECT ".$GLOBALS['fc_config']['db']['pref']."config_values.value, ".$GLOBALS['fc_config']['db']['pref']."config.type
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config, ".$GLOBALS['fc_config']['db']['pref']."config_values
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.level_0 = 'text' AND
		  (".$GLOBALS['fc_config']['db']['pref']."config.level_1 = 'fontFamily' OR
		  ".$GLOBALS['fc_config']['db']['pref']."config.level_1 = 'fontSize') AND {$TABLE_PREF}config_values.disabled=0 AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ?
		  ORDER BY _order";
$stmt = new Statement($query, 435);
$array = $stmt->process($_SESSION['session_inst']);

//populate array with values
while($v = $array->next())
	if ( $v['type'] == 'integer')
		$font['fontSize'][] = $v['value'];
	else
		$font['fontFamily'][] = $v['value'];
$fields = array();
$value['alignment'] = array('left','center','right');
while($v = $f->next())
{
//delete x from color
  if (in_array($v['level_2'], array('x_field','y_field','x_label','y_label'))) continue;
	if( $v['level_1'] == 'fontColor' || $v['level_1'] == 'BGColor' || $v['level_1'] == 'barColor' )
			$v['value'] = substr($v['value'],2);

	$fields[$v['id']] = $v;
	$fields[$v['id']]['comment'] = addslashes($fields[$v['id']]['comment']);
	$fields[$v["id"]]['info']=str_replace('"', "\'", $fields[$v["id"]]['info']);
	if ( $_POST['submit'] && $errMsg != '' )
	    $fields[$v["id"]]['value'] = $fld['err'][$v["id"]]['value'];
}
sort($font['fontFamily']);
sort($font['fontSize']);
unset($font['fontFamily']);
$font['fontFamily'] = array('0' => 'Arial',
'1' => 'Courier',
'2' => 'Georgia',
'3' => 'Helvetica',
'4' => 'Times',
'5' => 'Verdana',
'6' => 'Tahoma'
);
foreach($fields as $k => $v)
{
	$lang_title = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$k]['value'];
	$lang_info = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$k]['hint'];
	if($lang_title != '') $fields[$k]['title'] = $lang_title;
	if($lang_info != '') $fields[$k]['info'] = $lang_info;
}
//--- assign Smarty values

$smarty->assign('cnf_langs',$GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_preloader']);
$smarty->assign('value',$value);
$smarty->assign('fields', $fields);
$smarty->assign('font',$font);
$smarty->assign('errMsg', $errMsg);
?>