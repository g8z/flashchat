<?php

//all necessary fields on page
// process form submit
//----------

if( $_POST['submit'] )
{
	$size = $_POST['size'];
	$family = getPOSTfields('family_');
	$disabled = getPOSTfields('disabled_');
	$fld = getPOSTfields('fld_');

	foreach($family['ins'] as $k => $v)
	{
		$query="UPDATE ".$GLOBALS['fc_config']['db']['pref']."config_values SET value=?, disabled=?
				        WHERE config_id=? AND instance_id = ? LIMIT 1;";
		$stmt = new Statement($query, 406);
		$f = $stmt->process($v, $disabled['ins'][$k], $k, $_SESSION['session_inst']);
	}

	//validator rule
	//greate array $valid_rule
	//validator rule
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

	if(!preg_match('/^[0-9]{1,2}(\,([0-9]{1,2}))*$/',$size))//rules for size string
  	{
		$errMsg = 'Please insert correct value for field Font Size:';
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


		//------insert new values into table (text->fontSize || text->fontFamily)
		$query="SELECT ".$GLOBALS['fc_config']['db']['pref']."config.id, ".$GLOBALS['fc_config']['db']['pref']."config.level_1
				  FROM ".$GLOBALS['fc_config']['db']['pref']."config
				  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.level_0 ='text' AND
				  (".$GLOBALS['fc_config']['db']['pref']."config.level_1 = 'fontSize' OR
				  ".$GLOBALS['fc_config']['db']['pref']."config.level_1 = 'fontFamily') ORDER BY
				  _order;";
		$stmt = new Statement($query, 410);
		$result = $stmt->process();

		while($value = $result->next())
		{
			if($value['level_1'] == 'fontSize')
			{
				$mas1[] = $value['id'];
			} else {
				$mas2[] = $value['id'];
			}
		}

		$name = 'fontSize';
		$type = 'integer';
		$SizeSQL = $mas1;
		$SizeArray = explode(",", $size);
		$i = 0;
		for(; $i<count($SizeSQL); $i++)
		{
			if ( $i < count($SizeArray) )
			{
 				$query = 'UPDATE '.$GLOBALS['fc_config']['db']['pref'].'config_values SET value=? WHERE config_id=?
				     	AND instance_id = ? LIMIT 1';
				$stmt = new Statement($query, 408);
				$f = $stmt->process($SizeArray[$i], $SizeSQL[$i], $_SESSION['session_inst']);
				$order = $i+1;
 				$query = 'UPDATE '.$GLOBALS['fc_config']['db']['pref'].'config SET _order=? WHERE id=?
				     	LIMIT 1';
				$stmt = new Statement($query, 411);
				$f = $stmt->process($order, $SizeSQL[$i]);
			}
			else
			{
				$query = 'DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'config WHERE id=?';
				$stmt = new Statement($query, 412);
				$f = $stmt->process($SizeSQL[$i]);
				$query = 'DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'config_values WHERE config_id=?';
				$stmt = new Statement($query, 412);
				$f = $stmt->process($SizeSQL[$i]);
			}
		}
		$num = count($SizeArray) - $i;
		for($k=0; $k<$num; $k++,$i++)
		{
			$query = 'INSERT INTO '.$GLOBALS['fc_config']['db']['pref'].'config VALUES(NULL,"text","fontSize",?,"","","integer","","",?,"","font",?)';
			$stmt = new Statement($query, 440);
			$f = $stmt->process('itm'.($i+1), 'text|fontSize|itm'.($i+1), ($i+1));

			// in full caching function mysql_insert_id() wont work. artemK0
			if($GLOBALS['fc_config']['cacheType'] != 2)
			{
				$query = 'SELECT MAX(id) FROM '.$GLOBALS['fc_config']['db']['pref'].'config';
				$result = mysql_query($query);
				$id = mysql_result($result, 0, 'MAX(id)');
			}
			else
			{
				$id = cache_insert_id($GLOBALS['fc_config']['cachePath'], $GLOBALS['fc_config']['db']['pref'], $GLOBALS['fc_config']['cacheFilePrefix']);
				$id--;
			}
			$query = 'INSERT INTO '.$GLOBALS['fc_config']['db']['pref'].'config_values VALUES(NULL,?,?,?,"0")';
			$stmt = new Statement($query, 441);
			$f = $stmt->process($_SESSION['session_inst'], $id, $SizeArray[$i]);
		}


		//------------------------------------------------------------------------
	}
unlink(APPDATA_DIR.'config'.'_'.$_SESSION['session_inst'].'.php');
}
// checks if new font files are added to the /fonts dir. artemK0
addFontsToConfig($GLOBALS['fc_config']['db']['pref'], $_SESSION['session_inst'], $GLOBALS['fc_config']['cacheType'], $GLOBALS['fc_config']['cachePath'], $GLOBALS['fc_config']['cacheFilePrefix']);
//-------------------------------
$query="SELECT ".$GLOBALS['fc_config']['db']['pref']."config.*, ".$GLOBALS['fc_config']['db']['pref']."config_values.value, ".$GLOBALS['fc_config']['db']['pref']."config_values.disabled
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config, ".$GLOBALS['fc_config']['db']['pref']."config_values
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.parent_page = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ?
		  ORDER BY _order";
$stmt = new Statement($query, 405);
$f = $stmt->process($module, $_SESSION['session_inst']);
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
foreach($family as $k => $v) {
	$sort_arr[$k]=$family[$k]['name'];
}
array_multisort($sort_arr, SORT_ASC, SORT_STRING, $family);
$off = 0;
foreach($family as $k => $v) {
  if ($tmp == $family[$k]['name']) {
    unset($family[$k]);
    $off++;
    continue;
  }
  $tmp = $family[$k]['name'];
  $fam[$k-$off] = $family[$k];
}
$family = $fam;

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
$smarty->assign('showFamilies', true);
$smarty->assign('fields', $fields);
$smarty->assign('errMsg', $errMsg);

?>