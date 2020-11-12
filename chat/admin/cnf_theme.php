<?php
define('IMAGES_DIR', INC_DIR.'../images/');

//all necessary fields on page
// process form submit
//----------
//--Upload file--------------------------
if ( $_POST['sub4'] )
{

	$f = $_FILES['file'];
	$upfile = IMAGES_DIR.$f['name'];
	if( $f['size'] > $_REQUEST['MAX_FILE_SIZE'] )
		$errMsg = 'Coud not upload file (size)';
	else
	if( move_uploaded_file($f['tmp_name'], $upfile) === false )
		$errMsg = 'Coud not upload file';

}


if ( $_POST['sub2'] )
{
	$fld = getPOSTfields('fld_');
	if ( $_REQUEST['disable'] == 'Enable')
		$disabled = 0;
	else
		$disabled = 1;

    foreach($fld['ins'] as $k=>$v)
		{
			$query="UPDATE ".$GLOBALS['fc_config']['db']['pref']."config_values SET disabled=? WHERE config_id=?
					AND instance_id = ? LIMIT 1";
			$stmt = new Statement($query, 416);
			$f = $stmt->process($disabled, $k, $_SESSION['session_inst']);
		}
   	@unlink(APPDATA_DIR.$_REQUEST['name'].'_'.$_SESSION['session_inst'].'.php');//delete file with configuration

}

//-----Save setting-------------------------------------
if( $_POST['sub3'] )
{
	unset( $_REQUEST['theme'] );

  if ( !isset($_REQUEST['Add']) ) {
    unlink(APPDATA_DIR.$_REQUEST['name'].'_'.$_SESSION['session_inst'].'.php');//delete file with configuration

  }




	$fld = getPOSTfields('fld_');
	//validator rule
	//greate array $valid_rule
	$valid_rule = array();

	foreach( $fld['err'] as $k => $v )
	{

		if ( $fld['err'][$k]['field'] == 'name' || $fld['err'][$k]['field'] == 'dialogBackgroundImage' || $fld['err'][$k]['field'] == 'backgroundImage')
		{
			$valid_rule[$k][0] = 'alfanum';
			$valid_rule[$k][1] = 1;
			$valid_rule[$k][2] = $fld['err'][$k]['name'];
		}
		else
			if ( $fld['err'][$k]['type'] == 'string')
			{
				$fld['ins'][$k] = "'0x".substr($fld['ins'][$k],1);


				$valid_rule[$k][0] = '^[0-9A-Fa-f]{6}$';
				$valid_rule[$k][1] = 1;
				$valid_rule[$k][2] = $fld['err'][$k]['name'];
			}
		switch($fld['err'][$k]['field'])
		{
			case 'uiAlpha':
				$valid_rule[$k][0] = '^(100){1}|^([0-9]{1,2})$';
				$valid_rule[$k][1] = 1;
				$valid_rule[$k][2] = $fld['err'][$k]['name'];
				break;
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


	if( $errMsg == '' )
		if ( isset($_REQUEST['Add']) )
		{//--if Add new themes-------------------
			foreach( $fld['err'] as $k=>$v )
			{
				if ( $fld['err'][$k]['type'] == 'string' && ($fld['err'][$k]['field'] != 'name' && $fld['err'][$k]['field'] != 'dialogBackgroundImage' && $fld['err'][$k]['field'] != 'backgroundImage'))
					$fld['err'][$k]['value'] = '0x'.$v['value'];

				$query="INSERT INTO ".$GLOBALS['fc_config']['db']['pref']."config
				VALUES(NULL,'themes',?,?,'','',?,'',?,?,'','theme',1)";
				$stmt = new Statement($query, 422);
				$comment="themes|".$_REQUEST['Name']."|".$fld['err'][$k]['field'];
				$f = $stmt->process($_REQUEST['Name'], $fld['err'][$k]['field'], $fld['err'][$k]['type'], $fld['err'][$k]['name'], $comment);

				// in full caching function mysql_insert_id() wont work. artemK0
				if($GLOBALS['fc_config']['cacheType']!=2)
				{
					$query = "SELECT MAX(id) FROM ".$GLOBALS['fc_config']['db']['pref']."config";
					$result = mysql_query($query);

					$id = mysql_result($result, 0, "MAX(id)");
				} else {
					$id = cache_insert_id($GLOBALS['fc_config']['cachePath'], $GLOBALS['fc_config']['db']['pref'], $GLOBALS['fc_config']['cacheFilePrefix']);
					$id--;
				}
				$query="INSERT INTO ".$GLOBALS['fc_config']['db']['pref']."config_values VALUES
				(NULL,?,?,?,'0')";
				$stmt = new Statement($query, 421);

				$f = $stmt->process($_SESSION['session_inst'], $id, $fld['err'][$k]['value']);

				unset($_REQUEST['theme']);
				unset($_REQUEST['name']);
			}

			// if full caching enabled, then sort config cache file by parent_page value. artemK0
			if($GLOBALS['fc_config']['cacheType']==2)
			{
				sortCacheFile($GLOBALS['fc_config']['cachePath'], $GLOBALS['fc_config']['db']['pref'], $GLOBALS['fc_config']['cacheFilePrefix']);
			}


			$pach = dirname(__FILE__).'/../inc/themes/'.$_REQUEST['Name'].'.php';
			$str = "\$prefix = 'thm';\n\$GLOBALS['filename'] = '".$_REQUEST['Name']."';\ninclude(INC_DIR.'get_config.php');";
			//echo $str;
			$str_file = "<?php\n".$str."\n?>";
			write2file($pach, $str_file);
		}
		else
			foreach( $fld['ins'] as $k=>$v )
			{
				$query="UPDATE ".$GLOBALS['fc_config']['db']['pref']."config_values SET value=? WHERE config_id=?
						AND instance_id = ? LIMIT 1";
				$stmt = new Statement($query, 403);
				$f = $stmt->process($v, $k, $_SESSION['session_inst']);
			}



}

//-------------------------------------------------------
$query = "SELECT ".$GLOBALS['fc_config']['db']['pref']."config.level_1
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config, ".$GLOBALS['fc_config']['db']['pref']."config_values
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.parent_page = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.level_2 = 'name';";
$stmt = new Statement($query, 413);
$f1 = $stmt->process($module, $_SESSION['session_inst']);
while($v = $f1->next())
	$themes[] = $v['level_1'];
//-------------------------------------------------------

if (isset($_REQUEST['theme']))
	$name = $_REQUEST['theme'];
else
	if (isset($_REQUEST['name']))
		$name = $_REQUEST['name'];
	else
		$name = 'xp';


if ($_REQUEST['change'] == 'true')
	unset($_REQUEST['Add']);

//-------------------------------
if ( isset($_REQUEST['Add']) )
	$name = 'xp';

$query = "SELECT ".$GLOBALS['fc_config']['db']['pref']."config.*, ".$GLOBALS['fc_config']['db']['pref']."config_values.value, ".$GLOBALS['fc_config']['db']['pref']."config_values.disabled
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config, ".$GLOBALS['fc_config']['db']['pref']."config_values
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.parent_page = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.level_1 = ?
		  ORDER BY _order;";
$stmt = new Statement($query, 414);
$f = $stmt->process($module, $_SESSION['session_inst'], $name);

//---------------------------------
//populate array with values
$fields = array();
while($v = $f->next())
{
//delete x from color
	if ( $v['level_2'] != 'name' && $v['level_2'] != 'dialogBackgroundImage' && $v['level_2'] != 'backgroundImage')
		if( $v['type'] == 'string' )
			$v['value'] = substr($v['value'],2);
//----populate $themes with values
	$disabled = $v['disabled'];

	$fields[$v['id']] = $v;
	$fields[$v['id']]['comment'] = addslashes($fields[$v['id']]['comment']);
	if ( isset($_REQUEST['sub3']) && $errMsg != '' )
	    $fields[$v["id"]]['value'] = $fld['err'][$v["id"]]['value'];

}

//---read all files from directory ../images/
$img = array();
if ($handle = opendir(IMAGES_DIR)) {

	while (false !== ($file = readdir($handle)))
		if ( $file != '.' && $file != '..' && $file != 'cnf_img' && $file != 'cust_img')
			$img[] = $file;

    closedir($handle);
}



//--- assign Smarty values
if($disabled)
{
	if(!isset($GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_theme']['t12']))
	{
		$disabled = 'Enable';
	}
	else
	{
		$disabled = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_theme']['t12'];
	}
}
else
{
	if(!isset($GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_theme']['t13']))
	{
		$disabled = 'Disable';
	}
	else
	{
		$disabled = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_theme']['t13'];
	}
}

//----add new themes-----------------------
if ( $_POST['sub1'] )
{
    foreach( $fields as $k => $v)
		$fields[$k]['value'] = '000000';

	$themes[] = 'New_themes';
	$name = 0;
}




//-------Get Extensions,maxFileSize from db-------------------
$query = "SELECT ".$GLOBALS['fc_config']['db']['pref']."config_values.value, ".$GLOBALS['fc_config']['db']['pref']."config.level_1
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config, ".$GLOBALS['fc_config']['db']['pref']."config_values
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.level_0 = 'avatarbgloading' AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ?
		  ORDER BY _order;";
$stmt = new Statement($query, 415);
$f = $stmt->process($_SESSION['session_inst']);

while($v = $f->next())
{
	if ( $v['level_1'] == 'allowFileExt' )
	    $value['extens'] = $v['value'];
	if ( $v['level_1'] == 'maxFileSize' )
	    $value['maxSize'] = $v['value'];
}
$value['pls_select'] = 'Please select file';//alert
if ( $errMsg != '' )
	if ( isset($_REQUEST['Add']) )
	{
		$themes[] = strtr($_REQUEST['Name'],' ','_');
		$name = 0;
	}
//-----------------------------------------------

foreach($fields as $k => $v)
{
	$lang_title = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$k]['value'];
	$lang_info = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$k]['hint'];
	if($lang_title != '') $fields[$k]['title'] = $lang_title;
	if($lang_info != '') $fields[$k]['info'] = $lang_info;
}

$smarty->assign('cnf_langs',$GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_theme']);
$smarty->assign('value', $value);
$smarty->assign('disabled', $disabled);
$smarty->assign('name', $name);
$smarty->assign('img', $img);
$smarty->assign('themes', $themes);
$smarty->assign('fields', $fields);
$smarty->assign('errMsg', $errMsg);
?>