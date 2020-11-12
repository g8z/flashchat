<style type="text/css">
.tdTitle {
 text-align: right;
}
</style>
<?php
if( isset($_POST['rooms']) )
{
	//$rooms = $_POST['rooms'] ? $_POST['rooms'] : CHAT_ROOMS;
	$rooms = $_POST['rooms'];
}
else
{

	$rooms = CHAT_ROOMS;
	if (2 != $_SESSION['cache_type']) {
		include './inc/config.srv.php';
		$dbpref = $GLOBALS['fc_config']['db']['pref'];
		$sql="SELECT * FROM {$dbpref}rooms";
		$res = mysql_query($sql);
		while ($room = mysql_fetch_object($res)) {
			$roomsTmp[] = $room->name;
		}
		if (count($roomsTmp)) {
			$rooms = implode(', ', $roomsTmp);
		}
	}
}

//for form validation
define("LANG_VALUE_REQUIRED", 'Please insert data. Value <b>%s</b> is required');
define("LANG_VALUE_INCORRECT",'Please insert correct value for field <b>%s</b>');
define("SOUND_DIR",INC_DIR."../sounds/");
define("APPDATA_DIR",INC_DIR.'../temp/appdata/');

require_once(INC_DIR.'smartyinit.php');
//require_once(INC_DIR.'common.php');
include_once(INC_DIR.'../admin/cnf_validators.php');
//all necessary fields on page
include_once(INC_DIR.'../admin/cnf_values.php');
include_once(INC_DIR.'config.php');
$smarty->template_dir  =  INC_DIR.'../templates/admin';

$errMsg = '';
	//------------------------------------------------------------------------------------------
	// process form submit (additional options)
	//----------
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


		reset($fld);
		foreach($fld['err'] as $k => $v)
		{



			if( isset($valid_rule[$k]) )
			{
				$curMsg = value_validator($v['value'],$valid_rule[$k],$valid_rule[$k]['name']);
				if ($curMsg) {
					$errMsg .= $curMsg.'<br>';
				}
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

		  $subst = $substitute;
		  $substitute = $_REQUEST['Substitute'];

		  $query="UPDATE ".$GLOBALS['fc_config']['db']['pref']."config_values SET value=? WHERE config_id=?
			AND instance_id = ? LIMIT 1;";
		  $stmt = new Statement($query, 408);
		  $f = $stmt->process($substitute, $id, $_SESSION['session_inst']);
		  foreach($fld['err'] as $k => $v)
		  {
		    if (isset($_POST['disabled_'.$k])) {
		      $v['disabled'] = $_POST['disabled_'.$k];

  		    $query="UPDATE ".$GLOBALS['fc_config']['db']['pref']."config SET level_1=?, title=? WHERE id=?
  					LIMIT 1;";
  		    $stmt = new Statement($query, 409);
  		    $f = $stmt->process($v['name'], $v['name'], $k);
  		    $val = $v['value'];
  		    if ( $val == $subst )
  		      $val = "";

  		    $disabled = $v['disabled'];
  		    $query="UPDATE ".$GLOBALS['fc_config']['db']['pref']."config_values SET value=?, disabled=?
  			        WHERE config_id=? AND instance_id = ? LIMIT 1;";
  		    $stmt = new Statement($query, 406);
  		    $f = $stmt->process($val, $disabled, $k, $_SESSION['session_inst']);
		    }
		  }



			@unlink(APPDATA_DIR.'config'.'_'.$_SESSION['session_inst'].'.php');
		}


	}
	//------------------------------------------------------------------------------------------



if( isset($_REQUEST['conf_msgRequestInterval']) && $_REQUEST['conf_msgRequestInterval'] != '' )
{
	if( ! is_numeric($_POST['conf_msgRequestInterval']) || strpos($_POST['conf_msgRequestInterval'],'.') !== false ) $errMsg .= 'Incorrect <b>Request interval</b> value<br>';
}

$lang_tmp = $GLOBALS['fc_config']['languages'];
if($_SESSION['cache_type'] == 2)
{
	$lang_tmp = $GLOBALS['fc_config']['languages'];
	if(isset($GLOBALS['fc_config']['cachePath_sm']))
	{
		$cachePath = INC_DIR . $GLOBALS['fc_config']['cachePath_sm'];
	} else {
		$cachePath = INC_DIR . $GLOBALS['fc_config']['cachePath'];
	}
	$fname = $cachePath . $GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines = file($fname);
	foreach($lines as $v)
	{
		$cols=explode("\t", $v);
		if($cols[1] == 'msgRequestInterval')
		{
			$GLOBALS['fc_config']['msgRequestInterval'] = $cols[13];
		}
	}
}
// search in db admin, moderator, spy users, if set existing table. artemK0
$stmt = new Statement('SELECT value FROM '.$GLOBALS['fc_config']['db']['pref'].'config_values vals, '.$GLOBALS['fc_config']['db']['pref'].'config config WHERE (vals.config_id = config.id AND config.level_0 = "CMSSystem")', 436);

$res = $stmt->process();

$isStateless = true;
while($rec = $res->next())
{
	if($rec['value'] == 'defaultCMS')
	{
		$isStateless = false;
	}
	elseif($rec['value'] == 'statelessCMS')
	{
		$isStateless = true;
	}
}
$def_users = array();

//$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE  instance_id=? ORDER BY ispermanent',56);
//$f = $stmt->process($_SESSION['session_inst']);
for($i = 2; $i < 5; $i++)
{
	if(!$isStateless)
	{
		$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE roles = ? LIMIT 1', 148);
		$res = $stmt->process($i);
		while($rec = $res->next())
		{
			$tmp['login'] = $rec['login'];
			$tmp['password'] = $rec['password'];
			$tmp['id'] = $rec['id'];
		}
		$def_users[$i] = $tmp;
	}
	else
	{
		$stmt = new Statement('SELECT value FROM '.$GLOBALS['fc_config']['db']['pref'].'config config, '.$GLOBALS['fc_config']['db']['pref'].'config_values vals WHERE config.id = vals.config_id AND config.level_0 IN ("adminPassword", "moderatorPassword", "spyPassword") AND vals.value NOT IN ("adminpass", "modpass", "spypass")', 437);
		$res = $stmt->process();
		$j = 5;
		while($rec = $res->next())
		{
			$def_users[$j++] = $rec['value'];
		}
		break;
	}
}
if($_SESSION['cache_type'] == 0)
{
	$stmt = new Statement('SELECT value FROM '.$GLOBALS['fc_config']['db']['pref'].'config config, '.$GLOBALS['fc_config']['db']['pref'].'config_values vals WHERE config.id = vals.config_id AND config.level_0 = "encryptPass"', 438);
	$res = $stmt->process();
	$rec = $res->next();
	$prevEncPass = $rec['value'];
	if($prevEncPass != '1')
	{
		$prevEncPass = '0';
	}
}

if(isset($_POST['submit']) && $_POST['submit'] && $errMsg == '')
{

	if ('' !== $_POST['cache_type']) {
		$_SESSION['cache_type']=$_POST['cache_type'];
	}
	//save rooms
	$rms = preg_split('/,\W*/', $rooms);
	$dbpref = '';

	if($errMsg == '')
	{
		include './inc/config.srv.php';
		$dbpref = $GLOBALS['fc_config']['db']['pref'];

		if( isset($_REQUEST['cms']) && $_REQUEST['cms'] == 'statelessCMS' )
		{
			//set password
			$query="UPDATE ".$dbpref."config_values SET value= ? WHERE config_id=(
					SELECT id FROM ".$dbpref."config WHERE level_0='adminPassword')";
			$stmt = new Statement($query, 428);
			$f = $stmt->process($_REQUEST['stt_adminpass']);

			$query="UPDATE ".$dbpref."config_values SET value= ? WHERE config_id=(
					SELECT id FROM ".$dbpref."config WHERE level_0='moderatorPassword')";
			$stmt = new Statement($query, 429);
			$f = $stmt->process($_REQUEST['stt_moderatorpass']);

			$query="UPDATE ".$dbpref."config_values SET value= ? WHERE config_id=(
					SELECT id FROM ".$dbpref."config WHERE level_0='spyPassword')";
			$stmt = new Statement($query, 430);
			$f = $stmt->process($_REQUEST['stt_spypass']);

			$query = 'UPDATE '.$dbpref.'config_values SET value = ? WHERE config_id = (
					SELECT id FROM '.$dbpref.'config WHERE level_0 = "encryptPass")';
			$stmt = new Statement($query, 442);
			$f = $stmt->process('0');
		}


		if( isset($_REQUEST['cms']) )
		{
			$_SESSION['forcms'] = $_REQUEST['cms'];
			$query="UPDATE ".$dbpref."config_values,".$dbpref."config
				    SET ".$dbpref."config_values.value = ?
		       		WHERE ".$dbpref."config_values.config_id = ".$dbpref."config.id
			   		AND ".$dbpref."config.level_0 = 'CMSsystem'";
			$stmt = new Statement($query, 431);
			$f = $stmt->process($_SESSION['forcms']);
		}

		//change config.php
		if( isset($_POST['conf_defaultLanguage']) )
			$repl['defaultLanguage']    = $_POST['conf_defaultLanguage'].'';



		if( isset($_POST['conf_liveSupportMode']) && $_POST['conf_liveSupportMode'] )
			$repl['liveSupportMode']    = 1;
		else
			$repl['liveSupportMode']    = 0;


		if( isset($_POST['conf_msgRequestInterval']) )
			$repl['msgRequestInterval']    = $_POST['conf_msgRequestInterval'];


		if( isset($_POST['login_utf'])  )
			$repl['loginUTF8decode']    = $_POST['login_utf'];

		$query="UPDATE ".$dbpref."config_values,".$dbpref."config
				    SET ".$dbpref."config_values.value = ?
		       		WHERE ".$dbpref."config_values.config_id = ".$dbpref."config.id
			   		AND ".$dbpref."config.level_0 = ?";
		$stmt = new Statement($query, 432);
		$f = $stmt->process($repl['liveSupportMode'], "liveSupportMode");


		$query="UPDATE ".$dbpref."config_values,".$dbpref."config
				    SET ".$dbpref."config_values.value = ?
		       		WHERE ".$dbpref."config_values.config_id = ".$dbpref."config.id
			   		AND ".$dbpref."config.level_0 = ?";
		$stmt = new Statement($query, 432);
		$f = $stmt->process($repl['defaultLanguage'], "defaultLanguage");

		$query="UPDATE ".$dbpref."config_values,".$dbpref."config
				    SET ".$dbpref."config_values.value = ?
		       		WHERE ".$dbpref."config_values.config_id = ".$dbpref."config.id
			   		AND ".$dbpref."config.level_0 = ?";
		$stmt = new Statement($query, 432);
		$f = $stmt->process($repl['msgRequestInterval'], "msgRequestInterval");

		$query="UPDATE ".$dbpref."config_values,".$dbpref."config
				    SET ".$dbpref."config_values.value = ?
		       		WHERE ".$dbpref."config_values.config_id = ".$dbpref."config.id
			   		AND ".$dbpref."config.level_0 = ?";
		$stmt = new Statement($query, 432);
		$f = $stmt->process($repl['loginUTF8decode'], "loginUTF8decode");



		@unlink(dirname(__FILE__).'/../temp/appdata/config_1.php');
		include_once(dirname(__FILE__).'/../inc/config.php');
		for($i = 0; $i < sizeof($rms); $i++)
		{
				$rms[$i] = trim($rms[$i]);
				if($rms[$i]=="") continue;//skip if the name is blank

				if( $_SESSION['cache_type'] != 2 )
				{
					//check if room exists
					$sql="SELECT * FROM {$dbpref}rooms WHERE name='{$rms[$i]}'";
					$res = mysql_query($sql);
					if( mysql_num_rows($res) ) continue;
					//---

					if(!mysql_query("INSERT INTO {$dbpref}rooms (created, name, ispublic, ispermanent) VALUES (NOW(), '{$rms[$i]}', 'y', '" . ($i + 1) . "')"))
					{
						$errMsg .= "<b>Could not create room '{$rms[$i]}'<br>" . mysql_error() . "</b><br>";
						break;
					}
				}
				else
				{
					$file = @fopen($GLOBALS['fc_config']['cachePath'].$dbpref.'rooms_'.$_SESSION['rand_num'].'_1.txt', 'a');

					if(!$file) return;

					fwrite($file, ($i + 1)."\t".date("Y-m-d H:i:s")."\t".date("Y-m-d H:i:s")."\t".$rms[$i]."\t\t".'y'."\t".($i + 1)."\t".""."\n");
					fclose($file);
				}
		}
		if( $_SESSION['cache_type'] != 0 )
		{
			$file = @fopen($GLOBALS['fc_config']['cachePath'].$dbpref.'configinst_'.$_SESSION['rand_num'].'.txt', 'w');

			$query="SELECT * FROM ".$dbpref."config_instances";
			$stmt = new Statement($query, 419);
			$result = $stmt->process();

			while($ret = $result->next())
			{
				$str = '';
				foreach( $ret as $key=>$val )
				{
					$str .= $val."\t";
				}

				fwrite($file,$str."\n");
			}
			fclose($file);

			$file = @fopen($GLOBALS['fc_config']['cachePath'].$dbpref.'configmain_'.$_SESSION['rand_num'].'.txt', 'w');

			$query="SELECT * FROM ".$dbpref."config_main";
			$stmt = new Statement($query, 433);
			$result = $stmt->process();
			$bool = false;
			while($ret = $result->next())
			{
				$str = '';

				foreach( $ret as $key=>$val )
				{
					$str = $str."\t".$val;
				}
				$str=substr($str, 1);
				fwrite($file, $str);
			}
			fclose($file);

			$old_prefix="";
			$d=dir("./temp/templates/cache");
			while(false!==($entry = $d->read()))
			{
				if(strpos($entry, "_users_")!==false)
				{
					$old_prefix_arr=explode("_", $entry);
					$old_prefix=$old_prefix_arr[count($old_prefix_arr)-2];
					break;
				}
			}
			$d->close();
			$file = @fopen($GLOBALS['fc_config']['cachePath'].$dbpref.'bans_'.$_SESSION['rand_num'].'_1.txt', 'w');
			fclose($file);
			if($old_prefix!="")
			{
				rename($GLOBALS['fc_config']['cachePath'].$dbpref."users_".$old_prefix."_1.txt", $GLOBALS['fc_config']['cachePath'].$dbpref."users_".$_SESSION['rand_num']."_1.txt");
			}
			else
			{
				$file = @fopen($GLOBALS['fc_config']['cachePath'].$dbpref.'users_'.$_SESSION['rand_num'].'_1.txt', 'w');
				fclose($file);
			}
			$file = @fopen($GLOBALS['fc_config']['cachePath'].$dbpref.'ignors_'.$_SESSION['rand_num'].'_1.txt', 'w');
			fclose($file);
			$file = @fopen($GLOBALS['fc_config']['cachePath'].$dbpref.'connections_'.$_SESSION['rand_num'].'_1.txt', 'w');
			fclose($file);
			$file = @fopen($GLOBALS['fc_config']['cachePath'].$dbpref.'messages_'.$_SESSION['rand_num'].'_1.txt', 'w');
			fclose($file);

			$fname = $GLOBALS['fc_config']['cachePath'].'tables_id_1.txt';
			$fp = @fopen($fname,"w+");
			@fwrite($fp, '0#0#0#0#0#0#0#0#4#0');
			@fclose( $fp );
		}
		if( isset($_REQUEST['cms']) && $_REQUEST['cms']=='defaultCMS' )
		{
			$query = 'UPDATE '.$dbpref.'config_values SET value = ? WHERE config_id = (
					SELECT id FROM '.$dbpref.'config WHERE level_0 = "encryptPass")';
			$stmt = new Statement($query, 442);
			$f = $stmt->process($_REQUEST['enc_pass']);
			//set password

			$password = $_REQUEST['def_adminpass'];
			if($_REQUEST['enc_pass'] && ($_REQUEST['prevEncPass'] == '0' || ($_REQUEST['prevEncPass'] == '1' && $_REQUEST['prevAdminPass'] != $password)))
			{
				$password = md5($password);
			}
			if($_SESSION['cache_type'] != 1)
			{
				$query="UPDATE ".$dbpref."config_values SET value= ? WHERE config_id=(
						SELECT id FROM ".$dbpref."config WHERE level_0='adminPassword')";
				$stmt = new Statement($query, 428);
				$f = $stmt->process($password);
			}
			else
			{
				$sql = "UPDATE ".$dbpref."config_values SET value= '{$password}' WHERE config_id=(
						SELECT id FROM ".$dbpref."config WHERE level_0='adminPassword')";
				$res = mysql_query($sql);
			}

			$password = $_REQUEST['def_moderatorpass'];
			if($_REQUEST['enc_pass'] && ($_REQUEST['prevEncPass'] == '0' || ($_REQUEST['prevEncPass'] == '1' && $_REQUEST['prevModeratorPass'] != $password)))
			{
				$password = md5($password);
			}
			if($_SESSION['cache_type'] != 1)
			{
				$query="UPDATE ".$dbpref."config_values SET value= ? WHERE config_id=(
						SELECT id FROM ".$dbpref."config WHERE level_0='moderatorPassword')";
				$stmt = new Statement($query, 429);
				$f = $stmt->process($password);
			}
			else
			{
				$sql = "UPDATE ".$dbpref."config_values SET value= '{$password}' WHERE config_id=(
						SELECT id FROM ".$dbpref."config WHERE level_0='moderatorPassword')";
				$res = mysql_query($sql);
			}

			$password = $_REQUEST['def_spypass'];
			if($_REQUEST['enc_pass'] && ($_REQUEST['prevEncPass'] == '0' || ($_REQUEST['prevEncPass'] == '1' && $_REQUEST['prevSpyPass'] != $password)))
			{
				$password = md5($password);
			}
			if($_SESSION['cache_type'] != 1)
			{
				$query="UPDATE ".$dbpref."config_values SET value= ? WHERE config_id=(
						SELECT id FROM ".$dbpref."config WHERE level_0='spyPassword')";
				$stmt = new Statement($query, 430);
				$f = $stmt->process($password);
			}
			else
			{
				$sql = "UPDATE ".$dbpref."config_values SET value= '{$password}' WHERE config_id=(
						SELECT id FROM ".$dbpref."config WHERE level_0='spyPassword')";
				$res = mysql_query( $sql );
			}
			//set login

			if( $_SESSION['cache_type'] == 0 || $_SESSION['cache_type'] == 1 )
			{
				$password = $_REQUEST['def_adminpass'];
				if($_REQUEST['enc_pass'] && ($_REQUEST['prevEncPass'] == '0' || ($_REQUEST['prevEncPass'] == '1' && $_REQUEST['prevAdminPass'] != $password)))
				{
					$password = md5($password);
				}
				if(!isset($def_users[2]['login']))
				{
					$stmt = new Statement('INSERT INTO '.$GLOBALS['fc_config']['db']['pref'].'users (login,password,roles,instance_id) VALUES (?,?,?,?)',113);
					$res = $stmt->process($_REQUEST['def_adminlogin'], $password, '2', 1);
				}
				else
				{
					$stmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET login = ?, password = ?, roles = ? WHERE id = ?', 142);
					$res = $stmt->process($_REQUEST['def_adminlogin'], $password, 2, $def_users[2]['id']);
				}

				$password = $_REQUEST['def_moderatorpass'];
				if($_REQUEST['enc_pass'] && ($_REQUEST['prevEncPass'] == '0' || ($_REQUEST['prevEncPass'] == '1' && $_REQUEST['prevModeratorPass'] != $password)))
				{
					$password = md5($password);
				}
				if(!isset($def_users[3]['login']))
				{
					$stmt = new Statement('INSERT INTO '.$GLOBALS['fc_config']['db']['pref'].'users (login,password,roles,instance_id) VALUES (?,?,?,?)',113);
					$res = $stmt->process($_REQUEST['def_moderatorlogin'], $password, '3', 1);
				}
				else
				{
					$stmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET login = ?, password = ?, roles = ? WHERE id = ?', 142);
					$res = $stmt->process($_REQUEST['def_moderatorlogin'], $password, 3, $def_users[3]['id']);
				}

				$password = $_REQUEST['def_spypass'];
				if($_REQUEST['enc_pass'] && ($_REQUEST['prevEncPass'] == '0' || ($_REQUEST['prevEncPass'] == '1' && $_REQUEST['prevSpyPass'] != $password)))
				{
					$password = md5($password);
				}
				if(!isset($def_users[4]['login']))
				{
					$stmt = new Statement('INSERT INTO '.$GLOBALS['fc_config']['db']['pref'].'users (login,password,roles,instance_id) VALUES (?,?,?,?)',113);
					$res = $stmt->process($_REQUEST['def_spylogin'], $password, '4', 1);
				}
				else
				{
					$stmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET login = ?, password = ?, roles = ? WHERE id = ?', 142);
					$res = $stmt->process($_REQUEST['def_spylogin'], $password, 4, $def_users[4]['id']);
				}
			}
			if($_SESSION['cache_type'] == 1 || $_SESSION['cache_type'] == 2)
			{
				if($old_prefix != '')
				{
					$lines_tmp = file($GLOBALS['fc_config']['cachePath'].$dbpref.'users_'.$_SESSION['rand_num'].'_1.txt');
					$file_tmp = @fopen($GLOBALS['fc_config']['cachePath'].$dbpref.'users_'.$_SESSION['rand_num'].'_1.txt', 'w');
					foreach($lines_tmp as $k => $v)
					{
						if($k>2)
						{
							if($v!="")
							{
								@fwrite($file_tmp, $v);
							}
						}
					}
					@fclose($file_tmp);

					$file = @fopen($GLOBALS['fc_config']['cachePath'].$dbpref.'users_'.$_SESSION['rand_num'].'_1.txt', 'a');
				}
				else
				{
					$file = @fopen($GLOBALS['fc_config']['cachePath'].$dbpref.'users_'.$_SESSION['rand_num'].'_1.txt', 'w');
				}

				if( isset($_REQUEST['enc_pass']) && $_REQUEST['enc_pass'] )
				{
					if( isset($_REQUEST['def_adminlogin']) && isset($_REQUEST['def_adminpass']) )
						$str = "1\t".$_REQUEST['def_adminlogin']."\t".md5($_REQUEST['def_adminpass'])."\t2\t\t\n";

					if( isset($_REQUEST['def_moderatorlogin']) && isset($_REQUEST['def_moderatorpass']) )
						$str = $str."2\t".$_REQUEST['def_moderatorlogin']."\t".md5($_REQUEST['def_moderatorpass'])."\t3\t\t\n";

					if( isset($_REQUEST['def_spylogin']) && isset($_REQUEST['def_spypass']) )
						$str = $str."3\t".$_REQUEST['def_spylogin']."\t".md5($_REQUEST['def_spypass'])."\t4\t\t\n";
				}
				else
				{
					if( isset($_REQUEST['def_adminlogin']) && isset($_REQUEST['def_adminpass']) )
						$str = "1\t".$_REQUEST['def_adminlogin']."\t".$_REQUEST['def_adminpass']."\t2\t\t\n";

					if( isset($_REQUEST['def_moderatorlogin']) && isset($_REQUEST['def_moderatorpass']) )
						$str = $str."2\t".$_REQUEST['def_moderatorlogin']."\t".$_REQUEST['def_moderatorpass']."\t3\t\t\n";

					if( isset($_REQUEST['def_spylogin']) && isset($_REQUEST['def_spypass']) )
						$str = $str."3\t".$_REQUEST['def_spylogin']."\t".$_REQUEST['def_spypass']."\t4\t\t\n";
				}
				@fwrite($file, $str);
				fflush($file);
			}
		}
		// inserts files from /fonts to config file/table. artemK0
		addFontsToConfig($GLOBALS['fc_config']['db']['pref'], $_SESSION['session_inst'], $GLOBALS['fc_config']['cacheType'], $GLOBALS['fc_config']['cachePath'], $GLOBALS['fc_config']['cacheFilePrefix']);
	}
	//---

	//if( isset($useCMS) )
	if( !isset($useCMS) ) $repl['CMSsystem'] = "'".$_REQUEST['cms']."'";

	if( isset($all_lang) )
	$GLOBALS['fc_config']['languages'] = $all_lang;
	//finish step
	$step = 6;

	if( isset($_SESSION['forcms']) && $_SESSION['forcms'])
		$step = 6;

	$_SESSION['forcms'] = $_REQUEST['cms'];




	// found modules. if dir is not empty, then redirect to step 3.5
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
			}
		}
		$entry_d->close();
		$i++;
	}
	$d->close();
	if(count($all_modules) > 0)
	{
		$step = '3.5';
	}
	else
	{
		if($_SESSION['cache_type'] == 2)
		{
			$step = '8';
		}
		else
		{
			$step = '6';
		}
	}

	redirect_inst('install.php?step='.$step);
	//echo 'redirected to '.$step;
}

include INST_DIR . 'header.php';
?>



<TR>
	<TD colspan="2"></TD>
</TR>
<TR>
	<TD colspan="2" class="subtitle">Step 3: Chat Configuration</TD>
</TR>
<TR>
	<TD colspan="2" class="normal">	To help you configure FlashChat for the first time, input some information about how you would like the chat to operate. This step will write some configuration data to the configuration file.
	</TD>
</TR>

<td>
<?php if($errMsg != '') echo '<tr><td colspan="2" class="error_border"><font color="red">' . @$errMsg . '</font></td></tr>'; ?>
<FORM action="install.php?step=3" method="post" name="installInfo" onSubmit="javascript:return checkEqual();">
<table width="100%">
	<TR>
		<TD>&nbsp;</TD>
		<TD align="right">
			<INPUT type="submit" name="submit" value="Continue >>" >
			<br>
			<br>
		</TD>
	</TR>
	<TR>
		<TD colspan="2">

			<TABLE width="100%" class="body_table" cellspacing="10" border="0">
			<?php if(!isset($_SESSION['usecms'])) { ?>
				<TR>
					<TD width="30%" align="right" valign=top>
						How would you like to use FlashChat?
					</td>
					<td>

					<table width="100%" class="normal">
					<tr>
						<td valign="top"><INPUT type="radio" name="cms" value="statelessCMS" <?php if($isStateless) echo 'CHECKED'; ?> onclick="javascript:setLogin('1');" ></td>
						<td>As a free-for-all chatroom, where users can chat without registering or creating a profile (so-called "stateless CMS")</td>
					</tr>
					<tr>
						<td valign="top"><INPUT type="radio" name="cms" value="defaultCMS" <?php if(!$isStateless) echo 'CHECKED'; ?> onclick="javascript:setLogin('0');" ></td>
						<td>As a registered users-only chatroom. Users must register and create a profile before being allowed to chat (so-called "default CMS")</td>
					</tr>


					<!--
					<tr>
						<td valign="top"><INPUT type="radio" name="cms" value=""></td>
						<td>I have a content-management system (CMS), like phpNuke, Mambo, phpBB, or other system, that I want to integrate with FlashChat</td>
					</tr>
					-->
					</table>

					</TD>

				</TR>
				<TR>
					<TD width="30%" align="right" valign=top>
					</TD>
					<TD >
						<DIV style="display:<?php if($isStateless) echo 'block'; else echo 'none'; ?>;" name="stateless" id="stateless" >
							<TABLE style="font-size:12px;" border="0" >
								<TR>
									<TD align="left" style="width:100px;"><div style="white-space: nowrap;">Administrator&nbsp;Password:</div></TD>
									<TD valign="top" align="left" >
										<input type="text" name="stt_adminpass" id="stt_adminpass" maxlength="20" <?php if(isset($def_users[5])) echo 'value="'.$def_users[5].'"';?>>&nbsp;&nbsp;(required)
									</TD>
								</TR>
								<TR>
									<TD align="left" style="width:130px"><div style="white-space: nowrap;">Moderator Password:</div></TD>
									<TD valign="top" align="left" >
										<input type="text" name="stt_moderatorpass" id="stt_moderatorpass" maxlength="20" <?php if(isset($def_users[6])) echo 'value="'.$def_users[6].'"';?>>&nbsp;&nbsp;(required)
									</TD>
								</TR>
								<TR>
									<TD align="left" nowrap style="width:130px"><div style="white-space: nowrap;">Spy Password:</div></TD>
									<TD valign="top" align="left" >
										<input type="text" name="stt_spypass" id="stt_spypass" maxlength="20" <?php if(isset($def_users[7])) echo 'value="'.$def_users[7].'"';?>>&nbsp;&nbsp;(required)
									</TD>
								</TR>
							</TABLE>
							<TABLE  style="font-size:12px;" border="0" width="100%">
								<TR>
									<TD align="left" >
										When using FlashChat in "free-for-all" mode, the administrator, moderator, or spy may</br> login with ANY username, but they must input the password above to be assigned the</br> administrator, moderator, or spy roles, respectively.
									</TD>
								</TR>
							</table>
						</DIV>
						<DIV style="display:<?php if(!$isStateless) echo 'block'; else echo 'none'; ?>;" name="default" id="default" >
							<TABLE style="font-size:12px;">
								<TR>
									<TD align="left"  style="width:100px;"><div style="white-space: nowrap;">Administrator Login:</div></TD>
									<TD valign="top" align="left" >
										<input type="text" name="def_adminlogin" id="def_adminlogin" maxlength="20" <?php if(isset($def_users[2]['login'])) echo 'value="'.$def_users[2]['login'].'"';?>>
									</TD>
								</TR>
								<TR>
									<TD align="left"  style="width:100px;"><div style="white-space: nowrap;">Administrator Password:</div></TD>
									<TD valign="top" align="left" >
										<input type="text" name="def_adminpass" id="def_adminpass" maxlength="20" <?php if(isset($def_users[2]['password'])) echo 'value="'.$def_users[2]['password'].'"';?>>
										<input type="hidden" name="prevAdminPass" <?php if(isset($def_users[2]['password'])) echo 'value="'.$def_users[2]['password'].'"';?> >
									</TD>
								</TR>
								<tr><td>&nbsp; </td><td>&nbsp; </td></tr>
								<TR>
									<TD align="left"  style="width:100px;"><div style="white-space: nowrap;">Moderator Login:</div>
									</TD>
									<TD valign="top" align="left" >
										<input type="text" name="def_moderatorlogin" id="def_moderatorlogin" maxlength="20" <?php if(isset($def_users[3]['login'])) echo 'value="'.$def_users[3]['login'].'"';?>>
									</TD>
								</TR>
								<TR>
									<TD align="left" nowrap   style="width:100px;"><div style="white-space: nowrap;">Moderator Password:</div></TD>
									<TD valign="top" align="left" >
										<input type="text" name="def_moderatorpass" id="def_moderatorpass" maxlength="20" <?php if(isset($def_users[3]['password'])) echo 'value="'.$def_users[3]['password'].'"';?>>
										<input type="hidden" name="prevModeratorPass" <?php if(isset($def_users[3]['password'])) echo 'value="'.$def_users[3]['password'].'"';?> >
									</TD>
								</TR>
								<tr><td>&nbsp; </td><td>&nbsp; </td></tr>
								<TR>
									<TD align="left" nowrap  style="width:100px;"><div style="white-space: nowrap;">Spy Login:</div>
									</TD>
									<TD valign="top" align="left" >
										<input type="text" name="def_spylogin" id="def_spylogin" maxlength="20" <?php if(isset($def_users[4]['login'])) echo 'value="'.$def_users[4]['login'].'"';?>>
									</TD>
								</TR>
								<TR>
									<TD align="left" nowrap  style="width:100px;"><div style="white-space: nowrap;">Spy Password:</div></TD>
									<TD valign="top" align="left" >
										<input type="text" name="def_spypass" id="def_spypass" maxlength="20" <?php if(isset($def_users[4]['password'])) echo 'value="'.$def_users[4]['password'].'"';?>>
										<input type="hidden" name="prevSpyPass" <?php if(isset($def_users[4]['password'])) echo 'value="'.$def_users[4]['password'].'"';?> >
									</TD>
								</TR>
							</TABLE>
							<table style="font-size:12px;">
								<TR>
									<TD align="left" colspan="2">
										Inputting the username/passwords above will help you get started with FlashChat, by</br> auto-registering these 3 users. Additional users may use the "register" link</br> on the FlashChat default page.</br></br>

									</TD>
								</TR>
								<tr><td colspan="2">Encrypt Passwords in the Database?</td></tr>
								<tr >

									<td nowrap valign="top" colspan="2"><INPUT type="radio" name="enc_pass" value="1" <?php if($prevEncPass == '1') echo 'checked'; ?> > Yes, use encryption <INPUT type="radio" name="enc_pass" value="0" <?php if($prevEncPass == '0') echo 'checked'; ?> > No, do not use encryption</td>

								</tr>
							</table>
						</DIV>
					</TD>
				</TR>
				<TR>
					<TD width="30%" align="right">Room List (comma delimited):
					</TD>
					<TD>
						<INPUT type="text"  size="100%" name="rooms" value="<?php echo $rooms ?>">
					</TD>
				</TR>

			<?php }	?>
			<TR><TD colspan="2" align="right">
			<input type="button" value="General settings" onclick="showHide('tbl0');">
			<table width="100%" class="normal" border="0" id="tbl0" style="display: none;">

				<TR>
					<TD colspan=2>Some systems use UTF-8 encoding for user names. If you are using a system with non-English character sets, you may need to enable UTF-8 decoding for user names. Would you like to enable it now?:
					</TD>
				</TR>
				<TR>
					<td></td>
					<TD>
						<table width="100%" class="normal" border=0>
							<tr>
								<td valign="top" width="2"><INPUT type="radio" name="login_utf" value="false" CHECKED></td>
								<td>No, do not enable UTF-8 at this time.</td>
							</tr>
							<tr>
								<td valign="top" width="2"><INPUT type="radio" name="login_utf" value="true"></td>
								<td>Yes, please enable UTF-8</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan=2>
								If you discover that UTF-8 conversions are needed, you can enable it later by setting the loginUTF8decode value in /inc/config.php to true.
					</td>
				</TR>

				<TR>
					<TD align="right">Live support mode:
					</TD>
					<TD>
						<INPUT type="checkbox" name="conf_liveSupportMode" value="1"
						<?php

						if( isset($_POST['conf_liveSupportMode']) && $_POST['conf_liveSupportMode'] && isset($GLOBALS['fc_config']['liveSupportMode']) &&  $GLOBALS['fc_config']['liveSupportMode'] )
						{
						 	//echo $_POST['conf_liveSupportMode']?'CHECKED': ($GLOBALS['fc_config']['liveSupportMode']?'CHECKED':'');
						 	echo 'CHECKED';
						}
						else
						{
							//echo $_POST['conf_liveSupportMode']?'CHECKED': ($GLOBALS['fc_config']['liveSupportMode']?'CHECKED':'');
						}


						?>
						> Check here to use FlashChat as a customer support system.
					</TD>
				</TR>


				<TR>
					<TD align="right" nowrap>Default language:
					</TD>
					<TD valign="top">
						<SELECT name="conf_defaultLanguage">
						<?php
							foreach($lang_tmp as $k => $v)
							{
								if($k == 'en') $sel = 'SELECTED';
								else $sel = '';

								echo "<option value=\"$k\" $sel>{$v['name']}";
							}
						?>
						</SELECT>
					</TD>
				</TR>

				<TR>
					<TD width="30%" align="right">Request interval:
					</TD>
					<TD>
						<INPUT type="hidden" size="5" name="cache_type" value="<?php echo $_SESSION['cache_type']; ?>">
						<INPUT type="hidden" name="prevEncPass" value="<?php echo $prevEncPass; ?>">
						<INPUT type="text" size="5" name="conf_msgRequestInterval" value="<?php if( isset($_POST['conf_msgRequestInterval']) )
																								{
																									echo $_POST['conf_msgRequestInterval'];
																								}
																								else
																								{
																									echo $GLOBALS['fc_config']['msgRequestInterval'];
																								}
																							?>">(seconds)
					</TD>
				</TR>


<?php

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

	$configs = array(
		'maxMessageSize', 'maxMessageCount', 'userTitleFormat', 'labelFormat', /*'defaultRoom',*/ 'roomTitleFormat', 'defaultTheme', 'defaultSkin');
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
	//changed on 090706 for chat instances
	$rooms = preg_split('/,\W*/', $rooms);
	foreach ($rooms as $id=>$name)
	{
		$value['defaultRoom'][$id] = $name;
	}

	//$smarty->assign('errMsg', $errMsg);
	$smarty->assign('value', $value);
	$smarty->assign('fields', $fields);
	$smarty->assign('cnf_langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_list']);
	$smarty->assign('cnff_langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_filesharing']);
	$smarty->assign('cnfo_langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_other']);
	$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['admin_index.tpl']);

	$blockId = 0;
	$smarty->assign('blockId', $blockId++);
	$smarty->assign('blockName', 'General settings');

	$smarty->display('install_header.tpl');
	//$smarty->display('install_block_top.tpl');
	$smarty->display('cnf_list.tpl');
	$smarty->display('install_block_bottom.tpl');
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

	$smarty->assign('blockId', $blockId++);
	$smarty->assign('blockName', 'Font settings');
	$smarty->display('install_block_top.tpl');
	$smarty->display('cnf_font.tpl');
	$smarty->display('install_block_bottom.tpl');











	//sounds
	$query="SELECT ".$GLOBALS['fc_config']['db']['pref']."config.*, ".$GLOBALS['fc_config']['db']['pref']."config_values.value
			  FROM ".$GLOBALS['fc_config']['db']['pref']."config, ".$GLOBALS['fc_config']['db']['pref']."config_values
			  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.parent_page = ? AND
			  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
			  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ?
			  ORDER BY _order";
	$stmt = new Statement($query, 401);
	$f = $stmt->process('sound', $_SESSION['session_inst']);
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
	$f = $stmt->process('sound', $_SESSION['session_inst']);

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

				$fields['sound'][$key]['info'] = addslashes(htmlentities($fields['sound'][$key]['info']));


				$fields['sound'][$key]['r'] = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$val['id']]['r'];
			}
		}
	}

	//--- assign Smarty values
	$smarty->assign('cnf_langs',$GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_sound']);
	$smarty->assign('fields', $fields);
	$smarty->assign('blockId', $blockId++);
	$smarty->assign('blockName', 'Sounds');
	$smarty->display('install_block_top.tpl');
	$smarty->display('cnf_sound.tpl');
	$smarty->display('install_block_bottom.tpl');






	//badwords
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
 $query="SELECT ".$GLOBALS['fc_config']['db']['pref']."config.*, ".$GLOBALS['fc_config']['db']['pref']."config_values.value, ".$GLOBALS['fc_config']['db']['pref']."config_values.disabled
		  FROM ".$GLOBALS['fc_config']['db']['pref']."config,".$GLOBALS['fc_config']['db']['pref']."config_values
		  WHERE ".$GLOBALS['fc_config']['db']['pref']."config.parent_page = ? AND
		  ".$GLOBALS['fc_config']['db']['pref']."config.id = ".$GLOBALS['fc_config']['db']['pref']."config_values.config_id AND
		  ".$GLOBALS['fc_config']['db']['pref']."config_values.instance_id = ?
		  ORDER BY _order;";
$stmt = new Statement($query, 405);
$f = $stmt->process('badwords', $_SESSION['session_inst']);

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
$smarty->assign('blockId', $blockId++);
$smarty->assign('blockName', 'Badwords');
$smarty->assign('isInstaller', true);
$smarty->display('install_block_top.tpl');
$smarty->display('cnf_badwords.tpl');
$smarty->display('install_block_bottom.tpl');

	?>

</TABLE>
	<TR>
		<TD>&nbsp;</TD>
		<TD align="right">
			<br/>
			<INPUT type="submit" name="submit" value="Continue >>" >
		</TD>
	</TR>
	</table>
</FORM>
</td>


	<tr><!--
	<td colspan="2">

	<p class="subtitle">More About Configuring FlashChat</p>

The options listed above are to help you get started with FlashChat. When you click Continue, some of the options in config.php will be set for you. However, you may change many more options after installation by directly editing the PHP files that come with FlashChat. Here are a few tips...

<p>
<b> Language Settings </b><br>
To disable or re-order a language, edit the /inc/config.php file. To change the text of a language, edit the appropriate langauge file in /inc/langs/
</p>

<p>
<b>Interface Layout </b><br>
To disable or re-arrange elements of the FlashChat interface, edit the /inc/layouts/ files. Use 'users.php' for general chatters, and admin.php for moderators.
</p>

<p>
<b>Colors and Themes</b><br>
To change the colors of FlashChat's 'themes', edit the files in /inc/themes. To change the background image for any theme, edit the appropriate JPG file in the /images folder. Be sure to use only non-progressive JPG files.
</p>

<p>
<b>Sounds</b><br>
You may use your own MP3 files with FlashChat by replacing any MP3 file in the /sounds folder. To set the default sound configuration, edit the appropriate options in /inc/config.php
</p>

<p>
<b>Integrating with your Database</b><br>
If you have a database of users that you would like to use with FlashChat, or if you are having difficult integrating FlashChat with an existing system like phpBB or Mambo, you may wish to edit the appropriate PHP file in the /inc/cmses folder.
</p>

<p>
<b>Other Options</b><br>
The best thing to do is simply open the /inc/config.php file and browse through the various options that are available to you. There are a lot! You will see that FlashChat is the most versatile and flexible chat room around. Be careful that you do not introduce any PHP errors when editing these PHP files.
</p>
	</td> -->
	</tr>



<?php
include INST_DIR . 'footer.php';
?>