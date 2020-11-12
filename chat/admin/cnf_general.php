<?php
//-------------------------------------------------
//redirect_inst
//-------------------------------------------------

function redirect_inst($url)
{
	echo '<script language="JavaScript" type="text/javascript">
				<!--// redirect_inst
		  			window.location.href = "'.$url.'";
				//-->
			 </script>
			';

	die;
}
//all necessary fields on page
include_once('cnf_values.php');

// process form submit
//----------
if( $_POST['submit'] )
{

	$disabledIRCFor_arr=$_POST['fld_3008'];
	$disabledIRC_arr=$_POST['fld_15'];
	$mods_arr=$_POST['fld_16'];
	$mods_rest_arr=$_POST['fld_17'];

	$fld = getPOSTfields('fld_');

	if($fld['ins'][31] == "'defaultCMS'")
	{
		for($i = 0; $i < 3; $i++)
		{
			switch($i)
			{
				case 0:
					$username = 'admin';
					break;
				case 1:
					$username = 'moderator';
					break;
				case 2:
					$username = 'spy';
					break;
			}
			$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE password = ?',145);
			$rs = $stmt->process($fld['ins'][36 + $i]);
			$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE password = ?',145);
			$rsMd5 = $stmt->process(md5($fld['ins'][36 + $i]));

			if($rs->numRows <= 0 && $rsMd5->numRows <= 0)
			{
				$stmt = new Statement('INSERT INTO '.$GLOBALS['fc_config']['db']['pref'].'users (login,password,roles,instance_id) VALUES (?,?,?,?)',113);
				if($fld['ins'][33] == "'1'")
				{
					$password = md5($fld['ins'][36 + $i]);
				} else {
					$password = $fld['ins'][36 + $i];
				}
				$stmt->process($username, $password, ($i + 2), $_SESSION['session_inst']);
			} else {
				if($fld['ins'][33] == "'1'" && $_POST['encPassOld'] == '0')
				{
					if(md5($fld['ins'][36 + $i]) != $rs->result[0]['login'])
					{
						$password = md5($fld['ins'][36 + $i]);
					}
					$stmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET login=?, password=?, roles=? WHERE id=?',142);
					$stmt->process($rs->result[0]['login'], $password, $rs->result[0]['roles'], $rs->result[0]['id']);
				}
			}
		}
	}

	if(count($disabledIRCFor_arr) > 0)
	{
		$fld['ins'][3008] = "'".implode(',', $disabledIRCFor_arr)."'";
		$fld['err'][3008]['value'] = implode(',', $disabledIRCFor_arr);
		$fld['upd'][3008] = "3008 = '".implode(',', $disabledIRCFor_arr)."'";
	} else {
		$fld['ins'][3008] = "''";
		$fld['err'][3008]['value'] = '';
		$fld['upd'][3008] = "3008 = ''";
	}

	if(count($disabledIRC_arr) > 0)
	{
		$fld['ins'][15] = "'".implode(',', $disabledIRC_arr)."'";
		$fld['err'][15]['value'] = implode(',', $disabledIRC_arr);
		$fld['upd'][15] = "15 = '".implode(',', $disabledIRC_arr)."'";
	} else {
		$fld['ins'][15] = "''";
		$fld['err'][15]['value'] = '';
		$fld['upd'][15] = "15 = ''";
	}
	if(count($mods_arr) > 0)
	{
		$fld['ins'][16] = "'".implode(',', $mods_arr)."'";
		$fld['err'][16]['value'] = implode(',', $mods_arr);
		$fld['upd'][16] = "16 = '".implode(',', $mods_arr)."'";
	} else {
		$fld['ins'][16] = "''";
		$fld['err'][16]['value'] = '';
		$fld['upd'][16] = "16 = ''";
	}
	if(count($mods_rest_arr) > 0)
	{
		$fld['ins'][17] = "'".implode(',', $mods_rest_arr)."'";
		$fld['err'][17]['value'] = implode(',', $mods_rest_arr);
		$fld['upd'][17] = "17 = '".implode(',', $mods_rest_arr)."'";
	} else {
		$fld['ins'][17] = "''";
		$fld['err'][17]['value'] = '';
		$fld['upd'][17] = "17 = ''";
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
		if ( $fld['err'][$k]['type'] == 'double')
		{
			$valid_rule[$k][0] = 'float';
			$valid_rule[$k][1] = 1;
			$valid_rule[$k][2] = $fld['err'][$k]['name'];
		}
		switch($fld['err'][$k]['field'])//special rules
		{
		  case 'timeOffset':
		    $valid_rule[$k][0] = '^-{0,1}[0-9]+$';
		    $valid_rule[$k][1] = 1;
		    $valid_rule[$k][2] = $fld['err'][$k]['name'];
		    break;

			case 'version':
				$valid_rule[$k][0] = '^[0-9]+(\.[0-9]+)*$';
				$valid_rule[$k][1] = 1;
				$valid_rule[$k][2] = $fld['err'][$k]['name'];
				break;
			case 'bot_ip':
				$valid_rule[$k][0] = '^(([1-2][0-5]{0,2})|([0-9])).(([1-2][0-5]{0,2})|([0-9])).(([1-2][0-5]{0,2})|([0-9])).(([1-2][0-5]{0,2})|([0-9]))$';
				$valid_rule[$k][1] = 1;
				$valid_rule[$k][2] = $fld['err'][$k]['name'];
				break;
			case 'allowFileExt':
				$valid_rule[$k][0] = '^[a-z0-9]+(\,([a-z0-9])+)*$';
				$valid_rule[$k][1] = 1;
				$valid_rule[$k][2] = $fld['err'][$k]['name'];
				break;
			case 'anchor':
				$valid_rule[$k][0] = '(-1)|(0)|(1)|(2)|(3)|(4)';
				$valid_rule[$k][1] = 1;
				$valid_rule[$k][2] = $fld['err'][$k]['name'];
				break;
			case 'CMSsystem':
				$CMS_value = $fld['err'][$k]['value'];
				$CMS_id = $k;
				$valid_rule[$k][0] = 'CMS';
				$valid_rule[$k][1] = 0;
				$valid_rule[$k][2] = $fld['err'][$k]['name'];
				break;
		}
	}
	//--CMS----------------------------------------

	$errMsg = '';
	$selectedCms = $CMS_value;

	$f_cms = INC_DIR . 'cmses/' . $CMS_value . '.php';
	if ( $module == 'general' )
		if( !file_exists($f_cms) || !is_file($f_cms) )
		{
			$CMS_value = 'false';

			//redirect_inst('cnf_config.php?module=general&cmserr=1');
	    	die;
		}
		else
		{
			if (!('defaultUsrExtCMS' == $GLOBALS['fc_config']['CMSsystem'] && 'defaultCMS' == $selectedCms)) {
				include_once( $f_cms );
			}

			$dbname = $GLOBALS['fc_config']['db']['base'];
			$dbuser = $GLOBALS['fc_config']['db']['user'];
			$dbhost = $GLOBALS['fc_config']['db']['host'];

			if( $dbname == '' || $dbuser == '' || $dbhost == '' )
			{
				$CMS_value = 'false';
				redirect_inst('cnf_config.php?module=general&cmserr=1');
				die;
			}
		}




	//---------------------------------------------
	reset($fld);
	foreach($fld['err'] as $k => $v)
	{
		if( isset($valid_rule[$k]) )
		{
			if($errMsg != '')
				break;
			$errMsg = value_validator($v['value'],$valid_rule[$k],$valid_rule[$k]['name']);

		}
	}
	if( $errMsg == '' )
	{
		foreach($fld['ins'] as $k => $v){
		  if ('combineCMS' == $fld['err'][$k]['field'] && "'1'" == $v) {
		    require_once('../inc/tables_default.php');
		    fb('creating');
		    $str = $db_tables['users'].' AUTO_INCREMENT=1000000';
		    $str = str_replace('{dbpref}', $GLOBALS['fc_config']['db']['pref'], $str);
		    @mysql_query($str) or fb(mysql_error());
		  }
			$query = 'UPDATE '.$GLOBALS['fc_config']['db']['pref'].'config_values SET value=? WHERE config_id=?
					AND instance_id = ? LIMIT 1';
			$stmt = new Statement($query, 403);
			$stmt->process($v, $k, $_SESSION['session_inst']);
		}

	}
	@unlink(APPDATA_DIR.'config_'.$_SESSION['session_inst'].'.php');
}
//-------------------------------
$query = 'SELECT '.$GLOBALS['fc_config']['db']['pref'].'config.*, '.$GLOBALS['fc_config']['db']['pref'].'config_values.value
		  FROM '.$GLOBALS['fc_config']['db']['pref'].'config, '.$GLOBALS['fc_config']['db']['pref'].'config_values
		  WHERE '.$GLOBALS['fc_config']['db']['pref'].'config.parent_page = ? AND
		  '.$GLOBALS['fc_config']['db']['pref'].'config.id = '.$GLOBALS['fc_config']['db']['pref'].'config_values.config_id AND
		  '.$GLOBALS['fc_config']['db']['pref'].'config_values.instance_id = ?
		  ORDER BY _order';
$stmt = new Statement($query, 401);
$f = $stmt->process($module, $_SESSION['session_inst']);


//populate array with values
$fields = array();
$mods_selected=array();
$mods_rest_selected=array();
$disabledIRC_selected=array();
$disabledIRCFor_selected=array();

while($v = $f->next())
{
  if (in_array($v['level_0'], array('combineCMS', 'guestPrefix')) && $GLOBALS['fc_config']['cacheType'] == 2) {
    continue;
  }
	$fields[$v['id']] = $v;
	$fields[$v['id']]['comment'] = addslashes($fields[$v['id']]['comment']);
	$fields[$v['id']]['info'] = addslashes(htmlentities($fields[$v['id']]['info']));

	if($v['level_0']=='mods') $mods_selected=explode(",", $v['value']);
	if($v['level_0']=='modsAdminRestrictions') $mods_rest_selected=explode(",", $v['value']);
	if($v['level_0']=='disabledIRC') $disabledIRC_selected=explode(",", $v['value']);
	if($v['level_0']=='disabledIRCFor') $disabledIRCFor_selected=explode(",", $v['value']);

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


if( $_GET['cmserr'] == 1)
{
	$errMsg = "Please use CMS installed on your system.";
}


$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE  instance_id=? ORDER BY ispermanent',56);
$rs = $stmt->process($_SESSION['session_inst']);
//changed on 090706 for chat instances

$rooms = array();

while($rec = $rs->next())
{
	$value['defaultRoom'][$rec['id']] = $rec['name'];
}
$value['cacheType'][0] = 'no caching';
$value['cacheType'][1] = 'limited caching';
$value['cacheType'][2] = 'full caching';

$mod_rest = array("configuration", "messages", "chats", "users", "rooms", "connections", "bans", "ignores", "bots", "un-install");
$mods = array("addbot", "removebot", "startbot", "killbot", "kick", "alert", "showbans", "kickout", "motd", "teach");
$disabledIRC =
	array(
		'who', 'whois', 'whowas', 'showignores', 'showbans', 'rooms', 'welcome',
		'status', 'topic', 'names', 'sos', 'kickroom', 'motd', 'reban',
		'msg', 'move', 'unban', 'query', 'kickout', 'unignore', 'profile',
		'boot', 'ban', 'broadcast', 'gag', 'ungag', 'clear', 'me', 'query',
		"addbot", "removebot", "startbot", "killbot", "kick", "alert",  "teach"

	);

$mods_tmp=array();
foreach($mods_selected as $k => $v)
{
	if(in_array($v, $mods))
	{
		$key = array_search($v, $mods);
		$mods_tmp[$key] = $v;
	}
}
$mods_selected = $mods_tmp;
foreach($mods as $k => $v)
{
	if($v == $mods_selected[$k]) $mods[$k] = '#';
}
$mods_tmp = array();
foreach($mods_rest_selected as $k => $v)
{
	if(in_array($v, $mod_rest))
	{
		$key = array_search($v, $mod_rest);
		$mods_tmp[$key] = $v;
	}
}
$mods_rest_selected = $mods_tmp;
foreach($mod_rest as $k => $v)
{
	if($v == $mods_rest_selected[$k]) $mod_rest[$k] = '#';
}
$disabledIRC_tmp=array();
foreach($disabledIRC_selected as $k => $v)
{
	if(in_array($v, $disabledIRC))
	{
		$key=array_search($v, $disabledIRC);
		$disabledIRC_tmp[$key]=$v;
	}
}
$disabledIRC_selected = $disabledIRC_tmp;
foreach($disabledIRC as $k => $v)
{
	if($v == $disabledIRC_selected[$k]) $disabledIRC[$k]="#";
}
foreach($fields as $k => $v)
{
	$lang_title = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$k]['value'];
	$lang_info = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$k]['hint'];
	if($lang_title != '') $fields[$k]['title'] = $lang_title;
	if($lang_info != '') $fields[$k]['info'] = $lang_info;
}

$roles[]['value'] = 1;
$roles[]['value'] = 2;
$roles[]['value'] = 3;
$roles[]['value'] = 4;
$roles[]['value'] = 8;
getROLE($roles);
foreach ($roles as $k=>$role) {
	$roles[$k]['selected'] = (in_array($role['value'], $disabledIRCFor_selected));
}

//--- assign Smarty values
$smarty->assign('cnf_langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_list']);
$smarty->assign('cnff_langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_filesharing']);
$smarty->assign('cnfo_langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_other']);
$smarty->assign('value', $value);
$smarty->assign('fields', $fields);
$smarty->assign('errMsg', $errMsg);
$smarty->assign('mod_rest', $mod_rest);
$smarty->assign('mods', $mods);
$smarty->assign('roles', $roles);
$smarty->assign('disabledIRC', $disabledIRC);
$smarty->assign('disabledIRC_selected', $disabledIRC_selected);
$smarty->assign('mods_rest_selected', $mods_rest_selected);
$smarty->assign('mods_selected', $mods_selected);
?>