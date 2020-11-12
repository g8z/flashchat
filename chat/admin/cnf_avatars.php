<?php

//all necessary fields on page
// process form submit
//----------

if( $_POST['submit'] )
{
	$arr=$_POST['fld_762'];
	$fld = getPOSTfields('fld_');
	if(count($arr)>0)
	{
		$fld['ins'][762]="'".implode(",", $arr)."'";
		$fld['err'][762]['value']=implode(",", $arr);
		$fld['upd'][762]="762 = '".implode(",", $arr)."'";
	} else {
		$fld['ins'][762]="','";
		$fld['err'][762]['value']=",";
		$fld['upd'][762]="762 = ','";
	}
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
	  $fld['ins'][762] = strtolower($fld['ins'][762]);
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


if ( $module == 'avatars' ) {
	if (isset($_REQUEST['avatar']))
	    $name = $_REQUEST['avatar'];
	else
		if (isset($_REQUEST['name']))
	    	$name = $_REQUEST['name'];
		else
			$name = 'user';
}


//-------------------------------
$query="SELECT ".$GLOBALS['fc_config']['db']['pref']."config.*, ".$GLOBALS['fc_config']['db']['pref']."config_values.value
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config, ".$GLOBALS['fc_config']['db']['pref']."config_values
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.parent_page = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ?
		  ORDER BY _order";
$stmt = new Statement($query, 401);
$f = $stmt->process($module, $_SESSION['session_inst']);
//-------------------------------
$query = "SELECT ".$GLOBALS['fc_config']['db']['pref']."config.level_1, ".$GLOBALS['fc_config']['db']['pref']."config.title
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config, ".$GLOBALS['fc_config']['db']['pref']."config_values
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.parent_page = 'smilies' AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.disabled = 0";
$stmt = new Statement($query, 402);
$f1 = $stmt->process($_SESSION['session_inst']);

$query="SELECT ".$GLOBALS['fc_config']['db']['pref']."config.*, ".$GLOBALS['fc_config']['db']['pref']."config_values.value, ".$GLOBALS['fc_config']['db']['pref']."config_values.disabled
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config,".$GLOBALS['fc_config']['db']['pref']."config_values
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.parent_page = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ?
		  ORDER BY _order;";
$stmt = new Statement($query, 405);
$f2 = $stmt->process("smilies", $_SESSION['session_inst']);
$sm=array();
while($v = $f2->next())
{
	$sm[$v['id']] = $v;
}
//populate array with values
$smilies = array();
while($v = $f1->next())
{
	$smilies[$v['level_1']] = substr($v['title'],0,strlen($v['title'])-1);
}
$fields = array();
$mod_only=array();
$mod_only_def=array("Smi_Admin", "Smi_Moderator");
while($v = $f->next())
{

//----populate $arators with values
	if($v['level_1']=="mod_only")
	{
		$mod_only=explode(",", $v['value']);
	}

	if ( !isset($avatars) && $v['level_1'] != 'mod_only')//
		$avatars[] = $v['level_1'];
	for($i=0;$i<count($avatars);$i++)
		if ( $avatars[$i] == $v['level_1'])
			break;
		else
			if ($i == count($avatars) - 1)
		    	$avatars[] = $v['level_1'];
			else
				continue;

	if ($v['level_1'] != $name && $v['level_1']!= 'mod_only')
		continue;

	$fields[$v['id']] = $v;
	$fields[$v['id']]['comment'] = addslashes($fields[$v['id']]['comment']);
}
if($mod_only[1]=="") $mod_only[1]=$mod_only[0];
foreach($fields as $k => $v)
{
	$lang_title = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$k]['value'];
	$lang_info = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$k]['hint'];
	if($lang_title != '') $fields[$k]['title'] = $lang_title;
	if($lang_info != '') $fields[$k]['info'] = $lang_info;
}
//--- assign Smarty values
$smarty->assign('cnf_langs',$GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_avatars']);
$smarty->assign('name',$name);
$smarty->assign('smilies', $smilies);
$smarty->assign('avatars', $avatars);
$smarty->assign('mod_only_def', $mod_only_def);
$smarty->assign('mod_only', $mod_only);
$smarty->assign('sm', $sm);
$smarty->assign('fields', $fields);
$smarty->assign('errMsg', $errMsg);
?>