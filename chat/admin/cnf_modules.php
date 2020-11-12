<?php

toLog('$_POST', $_POST);

//all necessary fields on page
include_once('cnf_values.php');
// process form submit
//----------
//modules/banner/banner_ad.swf
$repl = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_modules'];
$anchor_points = array('-1' => $repl['t10'],
	'0' => $repl['t11'],
	'1' => $repl['t12'],
	'2' => $repl['t13'],
	'3' => $repl['t14'],
	'4' => $repl['t15'],
	'5' => $repl['t16'],
	'6' => $repl['t17'],
	'7' => $repl['t18'],
	'8' => $repl['t19'],
	'9' => $repl['t20'],
	'10' => $repl['t21'],
	'11' => $repl['t22'],
	'12' => $repl['t23']
);
// formatting module dir name, to module name. artemK0
function performModuleName($name)
{
  //by full path. pavel
  $parts = explode('/', $name);
  $name = $parts[count($parts) - 2];

	$name = str_replace('_', ' ', $name);
	$return = '';
	for($i=0; $i<strlen($name); $i++)
	{
		if($i == 0)
		{
			$return = strtoupper($name[0]);
		}
		elseif($name[$i-1] == ' ')
		{
			$return .= strtoupper($name[$i]);
		}
		else
		{
			$return .= $name[$i];
		}
	}
	return $return;
}

if( $_POST['sub_save'] || isset($_REQUEST['delete']) || $_POST['module125'] )
{
	$tmp_post = array();
	foreach($_POST as $k => $v)
	{
		$exploded_k = explode('_', $k);
		if($exploded_k[0] == 'fld' && $v == '')
		{
			$tmp_post[$k] = '0';
			continue;
		}
		$tmp_post[$k] = $v;
		if(isset($_POST['fld_'.$exploded_k[1].'_1191']) && $exploded_k[0] == 'field')
		{
			$tmp_post['fld_'.$exploded_k[1].'_1191'] = 'true';
		}
		elseif(!isset($_POST['fld_'.$exploded_k[1].'_1191']) && $exploded_k[0] == 'field')
		{
			$tmp_post['fld_'.$exploded_k[1].'_1191'] = 'false';
		}
	}
	unset($_POST);
	$_POST = $tmp_post;

	$fld = getPOSTfields('fld_');

	//validator rule
	//greate array $valid_rule
	//validator rule
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

//-------------------------------
$query="SELECT ".$GLOBALS['fc_config']['db']['pref']."config.*, ".$GLOBALS['fc_config']['db']['pref']."config_values.value
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config, ".$GLOBALS['fc_config']['db']['pref']."config_values
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.parent_page = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ?
		  ORDER BY _order";
$stmt = new Statement($query, 401);
$f = $stmt->process($module, $_SESSION['session_inst']);

// array of installed modules. artemK0
$d = dir(INC_DIR . '../modules');
$all_modules = array();
$i = 0;
while($entry = $d->read())
{
	if($entry == '.' || $entry == '..' || $entry == 'readme.txt') continue;
	$entry_d = dir(INC_DIR . '../modules/'.$entry);
	while($mod_name = $entry_d->read())
	{
		if(strpos($mod_name, '.swf') !== false)
		{

			$all_modules[$i] []= $entry;
			$all_modules[$i] []= 'modules/'.$entry.'/'.$mod_name;
		  $i++;
		}
	}
	$entry_d->close();

}
$d->close();

if(count($all_modules) > 0)
{
	$IsModules = '1';
}
else
{
	$IsModules = '0';
}

$fields = array();
$values = array();
$enabled_buttons = array();
while($v = $f->next())
{
	$exploded = explode(',', $v['value']);
	foreach($exploded as $key => $val)
	{
		if($val == 'true')
		{
			$enabled_buttons[$key] = 'checked';
		}
		elseif($val == 'false')
		{
			$enabled_buttons[$key] = '';
		}
	}
	$fields[$v['id']] = $v;
	$fields[$v['id']]['comment'] = addslashes($fields[$v['id']]['comment']);
	if( $fields[$v['id']]['level_1'] != 'anchor' && $fields[$v['id']]['level_1'] != 'path' && $fields[$v['id']]['level_1'] != 'stretch' && $fields[$v['id']]['level_1'] != 'enabled')
	{
		$fields[$v['id']]['type'] = 'integer';
	}
	if( $fields[$v['id']]['level_1'] == 'enabled' || $fields[$v['id']]['level_1'] == 'stretch' )
	{
		$fields[$v['id']]['type'] = 'boolean';
	}
	$fields[$v['id']]['info'] = str_replace('"', "\'", $fields[$v['id']]['info']);

	//--------------------------------
	// lang fix. artemK0
	//--------------------------------
	$fields[$v['id']]['title'] = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_modules']["t{$v['id']}"]['value'];
	$fields[$v['id']]['info'] = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_modules']["t{$v['id']}"]['hint'];
}



foreach($fields as $fld => $val)
{
	foreach($all_modules as $i => $mod)
	{

		$exploded_val = explode(',', $val['value']);
		if($val['level_1'] == 'path' && $exploded_val[$i] == '')
		{
			$exploded_val[$i] = $all_modules[$i][1];
		}
		$values[$fld][$i] = $exploded_val[$i];
		if($val['type'] == 'boolean')
		{
			if($values[$fld][$i] == 'true')
			{
				$values[$fld][$i] = '1';
			}
			else
			{
				$values[$fld][$i] = '0';
			}
		}
	}
}
$return = array();


foreach($values as $k => $v)
{
	foreach($v as $key => $val)
	{
		$return[$key][$k]['value'] = $val;
		$return[$key][$k]['level_1'] = $fields[$k]['level_1'];
		$return[$key][$k]['type'] = $fields[$k]['type'];
		$return[$key][$k]['title'] = $fields[$k]['title'];
		$return[$key][$k]['info'] = $fields[$k]['info'];
		if ('path' == $fields[$k]['level_1']) {
		  $return[$key]['origName'] = $return[$key]['name'] = performModuleName($val);
		  $pathExploded = explode('/', $val);
		  $all_modules[$key][0] = $pathExploded[1];
		  $all_modules[$key][1] = $val;
    }


		if(strpos(strtolower($val), 'video') !== false || strpos(strtolower($val), 'whiteboard') !== false )
		{
			$return[$key]['name'] .= '<font color="#ff0000">*</font>';
		}
	}
}

require_once('cnf_module_xml.php');
$xml = getModuleXml($all_modules, '../');

//--- assign Smarty values
$smarty->assign('cnf_langs',$GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_modules']);
$smarty->assign( 'is_modules' , $IsModules );
$smarty->assign( 'xml' , $xml);
$smarty->assign( 'value' , $value );
$smarty->assign( 'file' , $file );
$smarty->assign( 'isAdd' , $isAdd );
$smarty->assign( 'module_names', $module_names);
$smarty->assign( 'anchors', $anchor_points);
$smarty->assign( 'values',$values );
$smarty->assign( 'count' , $count );
$smarty->assign( 'fields' , $return );
$smarty->assign( 'errMsg' , $errMsg );
//echo '<pre>';print_r($return);
?>