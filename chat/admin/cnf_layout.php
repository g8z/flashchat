<?php
//all necessary fields on page
// process form submit
//----------

if( $_POST['submit'] )
{
	$role[]['value'] = $_REQUEST['name'];
	getROLE($role);

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
		if ( $fld['err'][$k]['type'] == 'string')
		{
			$valid_rule[$k][0] = 'alfanum';
			$valid_rule[$k][1] = 0;
			$valid_rule[$k][2] = $fld['err'][$k]['name'];
		}
	}


	$errMsg = '';
	reset($fld);
	foreach($fld['err'] as $k => $v)
		if( isset($valid_rule[$k]) )
		{
			$errMsg = value_validator($v['value'],$valid_rule[$k],$valid_rule[$k]['name']);
			if($errMsg != '')
				break;
		}
//		echo '<pre>';
//		print_r($fld['ins']);
	if( $errMsg == '' )
		foreach($fld['ins'] as $k=>$v)
		{
			$query = 'UPDATE '.$GLOBALS['fc_config']['db']['pref'].'config_values SET value=? WHERE config_id=?
					AND instance_id = ? LIMIT 1';
			$stmt = new Statement($query, 403);
			$f = $stmt->process($v, $k, $_SESSION['session_inst']);
		}
	unlink(APPDATA_DIR.$role[0]['name'].'_'.$_SESSION['session_inst'].'.php');
}



if (isset($_REQUEST['layout']))
    $name = $_REQUEST['layout'];
else
	if (isset($_REQUEST['name']))
    	$name = $_REQUEST['name'];
	else
		$name = ROLE_USER;



//-------------------------------
$query="SELECT ".$GLOBALS['fc_config']['db']['pref']."config.*, ".$GLOBALS['fc_config']['db']['pref']."config_values.value
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config, ".$GLOBALS['fc_config']['db']['pref']."config_values
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.parent_page = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.level_1 = ?
		  ORDER BY _order;";


$stmt = new Statement($query, 417);
$f = $stmt->process($module, $_SESSION['session_inst'], $name);
//------------------------------
$query="SELECT ".$GLOBALS['fc_config']['db']['pref']."config.level_1
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.parent_page = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.level_2 = 'allowBan'
		  ORDER BY _order;";
$stmt = new Statement($query, 418);
$f1 = $stmt->process($module);
while($v = $f1->next())
{
	$layouts[]['value'] = $v['level_1'];
}
getROLE($layouts);

//populate array with values
$fields = array();
$userListItems = array();
$inputBoxItems = array();
//echo '<pre>';
while($v = $f->next())
{
//	print_r($v);
	$fields[$v['id']] = $v;
	$fields[$v['id']]['comment'] = addslashes($fields[$v['id']]['comment']);
	if ( isset($_POST['submit']) && $errMsg != '' )
	    $fields[$v["id"]]['value'] = $fld['err'][$v["id"]]['value'];
	if($fields[$v['id']]['level_4'] == 'position')
	{
		if($fields[$v['id']]['level_3'] == 'userList')
		{
			$userListItems [2]= 'Left';
			$userListItems [1]= 'Right';
		}
		if($fields[$v['id']]['level_3'] == 'inputBox')
		{
			$inputBoxItems [1]= 'Bottom';
			$inputBoxItems [2]= 'Top';
		}
	}
	if($fields[$v['id']]['type'] == 'select')
	{
		//we splice field info in select
		$info = $fields[$v['id']]['info'];
		$fields[$v['id']]['options'] = explode(',', $info);

	}
}

//print_r($fields);

foreach($fields as $k => $v)
{
	$lang_title = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$k]['value'];
	$lang_info = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$k]['hint'];
	if($lang_title != '') $fields[$k]['title'] = $lang_title;
	if($lang_info != '') $fields[$k]['info'] = $lang_info;
	
	if (3000 <= $k) {
		$tmp = $fields[$k];
		unset($fields[$k]);
		array_unshift($fields, $tmp);
	}
}

//--- assign Smarty values
$smarty->assign('cnf_langs',$GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_layout']);
$smarty->assign('name',$name);
$smarty->assign('layouts', $layouts);
$smarty->assign('userListItems', $userListItems);
$smarty->assign('inputBoxItems', $inputBoxItems);
$smarty->assign('fields', $fields);
//echo "<pre>";print_r($fields);
$smarty->assign('errMsg', $errMsg);
?>