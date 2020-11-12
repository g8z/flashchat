<?php
$query = "SELECT ".$GLOBALS['fc_config']['db']['pref']."config_values.value, ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config_values, ".$GLOBALS['fc_config']['db']['pref']."config
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.level_0 = 'badWordSubstitute' AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id";
$stmt = new Statement($query, 407);
$f = $stmt->process($_SESSION['session_inst']);

while($v = $f->next())
{
	$substitute = $v['value'];
	if($GLOBALS['fc_config']['cacheType']==2)
	{
		$id = $v['id'];
	} else {
		$id = $v['config_id'];
	}
}
//all necessary fields on page
// process form submit


//----if press Add------
if( $_POST['Submit1']  )
{

	$name = $_REQUEST['AddName'];
	$value = $_REQUEST['AddValue'];
	//--validator----{$_SESSION['session_inst']}
	$valid_rule[$k][0] = 'alfanum';
	$valid_rule[$k][1] = 1;
	$valid_rule[$k][2] = 'Bad words';
	$errMsg = value_validator($name,$valid_rule[$k],'Bad words');
	//---------------
	if ( $errMsg == '' )
	{
	 	if ( $value == '' )
	    $value = $substitute;
		$query="INSERT INTO ".$GLOBALS['fc_config']['db']['pref']."config
				VALUES(NULL,'badWords',?,'','','','string','',?,?,'','badwords','1')";
		$stmt = new Statement($query, 420);
		//$name = utf8_encode($name);
		$comment="BadWords|".$name;
		$f = $stmt->process($name, $name, $comment);
		// in full caching function mysql_insert_id() wont work. artemK0
		if($GLOBALS['fc_config']['cacheType']!=2)
		{
			/*
			$query = "SELECT MAX(id) FROM ".$GLOBALS['fc_config']['db']['pref']."config";
			$result = mysql_query($query);
			$id = mysql_result($result, "MAX(id)");
			*/
		  $id = $f;

		} else {
			$id = cache_insert_id($GLOBALS['fc_config']['cachePath'], $GLOBALS['fc_config']['db']['pref'], $GLOBALS['fc_config']['cacheFilePrefix']);
			$id--;
		}

		$query="INSERT INTO ".$GLOBALS['fc_config']['db']['pref']."config_values VALUES
				(NULL,?,?,?,'0')";
		$stmt = new Statement($query, 421);
		$value = $value;
		$f = $stmt->process($_SESSION['session_inst'], $id, $value);

		// if full caching enabled, then sort config cache file by parent_page value. artemK0
		if($GLOBALS['fc_config']['cacheType']==2)
		{
			sortCacheFile($GLOBALS['fc_config']['cachePath'], $GLOBALS['fc_config']['db']['pref'], $GLOBALS['fc_config']['cacheFilePrefix']);
		}
	}
	unlink(APPDATA_DIR.'badwords'.'_'.$_SESSION['session_inst'].'.php');//delete file
}

//---------if press Save Settings-----------------
if( $_POST['Submit2'] )
{
	$fld = getPOSTfields('fld_');
	//validator rule
	//greate array $valid_rule
	//validator rule
	$valid_rule = array();
	foreach($fld['err'] as $k => $v)
	{
		if ( $fld['err'][$k]['type'] == 'string')
		{
			$valid_rule[$k][0] = 'alfanum';
			$valid_rule[$k][1] = 1;
			$valid_rule[$k][2] = $fld['err'][$k]['field'];
		}
	}

	$errMsg = '';
	reset($fld);
	foreach($fld['err'] as $k => $v)
	{

		if( isset($valid_rule[$k]) )
		{
			$errMsg = value_validator($v['name'],$valid_rule[$k],$v['field']);
			if($errMsg != '')
				break;
		}
	}

	if( $errMsg == '' )
	{
		$subst = $substitute;
		$substitute = $_REQUEST['Substitute'];

		$query="UPDATE ".$GLOBALS['fc_config']['db']['pref']."config_values SET value=? WHERE config_id=?
			AND instance_id = ? LIMIT 1;";
		$stmt = new Statement($query, 408);
		$f = $stmt->process($substitute, $id, $_SESSION['session_inst']);
		foreach($fld['err'] as $k => $v)
		{
			$query="UPDATE ".$GLOBALS['fc_config']['db']['pref']."config SET level_1=?, title=? WHERE id=?
					LIMIT 1;";
			$stmt = new Statement($query, 409);
			$f = $stmt->process($v['name'], $v['name'], $k);
			$value = $v['value'];
			if ( $value == $subst )
				$value = "";

			$disabled = $v['disabled'];
			$query="UPDATE ".$GLOBALS['fc_config']['db']['pref']."config_values SET value=?, disabled=?
			        WHERE config_id=? AND instance_id = ? LIMIT 1;";
			$stmt = new Statement($query, 406);
			$f = $stmt->process($value, $disabled, $k, $_SESSION['session_inst']);
		}
	}
	unlink(APPDATA_DIR.'badwords'.'_'.$_SESSION['session_inst'].'.php');//delete file
}

// delete badword. artemK0
if(isset($_GET['method']) && $_GET['method']=="Delete")
{
	$query="DELETE FROM ".$GLOBALS['fc_config']['db']['pref']."config WHERE id=?";
	$stmt = new Statement($query, 412);
	$f = $stmt->process($_GET['ID']);
	$query="DELETE FROM ".$GLOBALS['fc_config']['db']['pref']."config_values WHERE config_id=?";
	$stmt = new Statement($query, 412);
	$f = $stmt->process($_GET['ID']);
	unlink(APPDATA_DIR.'badwords'.'_'.$_SESSION['session_inst'].'.php');//delete file
}

//-------------------------------
$query="SELECT ".$GLOBALS['fc_config']['db']['pref']."config.*, ".$GLOBALS['fc_config']['db']['pref']."config_values.value, ".$GLOBALS['fc_config']['db']['pref']."config_values.disabled
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config,".$GLOBALS['fc_config']['db']['pref']."config_values
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.parent_page = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ?
		  ORDER BY _order;";
$stmt = new Statement($query, 405);
$f = $stmt->process($module, $_SESSION['session_inst']);

//populate array with values
$fields = array();
while($v = $f->next())
{
	if (  $v['level_0'] == 'badWordSubstitute' )
	{
	    $substitute = $v['value'];
		continue;
	}

	$fields[$v['id']] = $v;
	$fields[$v['id']]['level_1'] = $fields[$v['id']]['level_1'];
	/*if ( $_POST['Submit2'] && $errMsg != '' )
	{
		$fields[$v['id']]['level_1'] = utf8_encode($fld['err'][$v['id']]['name']);
		$fields[$v['id']]['value'] = utf8_encode($fld['err'][$v['id']]['value']);
	}*/
	$fields[$v['id']]['value'] = $fields[$v['id']]['value'];
	if ( $v['value'] == '' && $v['level_0'] != 'badWordSubstitute')
	    $fields[$v['id']]['value'] = $substitute;
}
//--- assign Smarty values

$smarty->assign('cnf_langs',$GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_badwords']);
$smarty->assign('substitute', $substitute);
$smarty->assign('fields', $fields);
$smarty->assign('errMsg', $errMsg);

?>