<?php

require_once( '../FirePHPCore/fb.php');
//function fb(){}
	//-------------------------------------------------------------------------------------
	//check if flahchat is installing
	//-------------------------------------------------------------------------------------
	$fname = dirname(__FILE__).'/../temp/config.srv.php';
	if(!file_exists($fname))
	{
		Header('Location: ../install.php');
		die;
	} else {
		require_once $fname;
	}


	if($GLOBALS['fc_config']['cacheType'] != 2)
	{
		$query = 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections LIMIT 1';
		@mysql_connect($GLOBALS['fc_config']['db']['host'],$GLOBALS['fc_config']['db']['user'],$GLOBALS['fc_config']['db']['pass']);
		@mysql_select_db($GLOBALS['fc_config']['db']['base']);
		$result = @mysql_query($query);
		if($result == null)
		{
			Header('Location: ../install.php');
			die;
		}
		else
		{
			if($GLOBALS['fc_config']['cacheType'] == 1)
			{
				$i = 0;
				$files_arr = array('bans', 'configinst', 'configmain', 'connections', 'ignors', 'messages', 'users', 'tables');
				$d = dir('../temp/templates/cache/');
				while(false !== ($entry = $d->read()))
				{
					if($entry == '.' || $entry == '..' || $entry == 'index.html') continue;

					$entries = explode('_', $entry);
					if(substr($entry, -6, -5) == '_')
					{
						$check = $entries[count($entries) - 3];
					}
					else
					{
						$check = $entries[count($entries) - 2];
					}
					if(in_array($check, $files_arr))
					{
						$i++;
					}
				}
				$d->close();
				if($i<count($files_arr))
				{
					Header('Location: ../install.php');
					die;
				}
			}
		}
	} else {
		$fname = dirname(__FILE__).'/../temp/templates/cache/'.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
		if(!file_exists($fname))
		{
			Header('Location: ../install.php');
			die;
		}
	}
	//-------------------------------------------------------------------------------------
	//check if flahchat is installing
	//-------------------------------------------------------------------------------------

require_once('../inc/smartyinit.php');
$smarty->template_dir  = INC_DIR . '../templates/admin';

/*
if(!ini_get('session.use_trans_sid'))
	print ' ';

if(headers_sent())
	print 'Headers sent, remove any UTF-8 garbage characters: i»?';

if(!inSession())
	print 'Not in Session<br>';
*/

if(substr_count($GLOBALS['fc_config']['botsdata_path'], '.') < 3)
	$GLOBALS['fc_config']['botsdata_path'] = '.' . $GLOBALS['fc_config']['botsdata_path'];
// includes admin language file. artemk0
if(!isset($_COOKIE['language']))
{
	$_COOKIE['language'] = 'en';
}
$lang_dir = INC_DIR . 'langs/admin/admin_'.$_COOKIE['language'].'.php';
if(!file_exists($lang_dir))
{
	$_COOKIE['language'] = 'en';
	$lang_dir = INC_DIR . 'langs/admin/admin_'.$_COOKIE['language'].'.php';
}
ob_start();
require_once($lang_dir);
ob_end_clean();

//------------------------------------------------------------------------------------------------------------------------------//
function sort_table($by, &$a)
{
	$n = count($a);
	for ($i=0; $i < $n-1 ; $i++) {
		 for ($j=0; $j<$n-1-$i; $j++)
			 if (strnatcmp($a[$j+1][$by],$a[$j][$by]) < 0 ) {
				$tmp = $a[$j];
				$a[$j] = $a[$j+1];
				$a[$j+1] = $tmp;
		}
	}
}

function getTables()
{
	$standart_tables = array(
		$GLOBALS['fc_config']['db']['pref'].'bans',
		$GLOBALS['fc_config']['db']['pref'].'bot',
		$GLOBALS['fc_config']['db']['pref'].'bots',
		$GLOBALS['fc_config']['db']['pref'].'connections',
		$GLOBALS['fc_config']['db']['pref'].'conversationlog',
		$GLOBALS['fc_config']['db']['pref'].'dstore',
		$GLOBALS['fc_config']['db']['pref'].'gmcache',
		$GLOBALS['fc_config']['db']['pref'].'gossip',
		$GLOBALS['fc_config']['db']['pref'].'ignors',
		$GLOBALS['fc_config']['db']['pref'].'messages',
		$GLOBALS['fc_config']['db']['pref'].'patterns',
		$GLOBALS['fc_config']['db']['pref'].'rooms',
		$GLOBALS['fc_config']['db']['pref'].'templates',
		$GLOBALS['fc_config']['db']['pref'].'thatindex',
		$GLOBALS['fc_config']['db']['pref'].'thatstack',
		//WARNING $GLOBALS['fc_config']['db']['pref'].'users' !!! DON'T remove users table
	);

	$link = mysql_connect($GLOBALS['fc_config']['db']['host'], $GLOBALS['fc_config']['db']['user'], $GLOBALS['fc_config']['db']['pass']);
	mysql_select_db($GLOBALS['fc_config']['db']['base'], $link);

	$query = "SHOW TABLES FROM `{$GLOBALS['fc_config']['db']['base']}` LIKE '{$GLOBALS['fc_config']['db']['pref']}%'";
    $showcode = mysql_query($query, $link);

	$tables = array();
	if ($showcode && mysql_numrows($showcode) !== false)
	{
    	while ($rec = mysql_fetch_array($showcode, MYSQL_NUM)) $tables[] = $rec[0];
    }

	$tables = array_intersect($tables, $standart_tables);

	return $tables;
}

function isInstalled()
{
	if($GLOBALS['fc_config']['cacheType']==0)
	{
		$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections LIMIT 1' , 243 );
		$res = $stmt->process();
		if($res == null)
		{
			return false;
		}
	}
	elseif($GLOBALS['fc_config']['cacheType']==2)
	{
		$fname = dirname(__FILE__)."/../temp/templates/cache/".$GLOBALS['fc_config']['db']['pref']."config_".$GLOBALS['fc_config']['cacheFilePrefix']."_1.txt";
		if(!file_exists($fname))
		{
			return false;
		}
	}
	elseif($GLOBALS['fc_config']['cacheType']==1)
	{
		$sql = 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections LIMIT 1';
		$res = mysql_query($sql);
		if($res == null)
		{
			return false;
		}
		else
		{
			$i=0;
			$files_arr=array("bans", "configinst", "configmain", "connections", "ignors", "messages", "users", "tables");
			$d = dir(dirname(__FILE__)."/../temp/templates/cache/");
			while(false !== ($entry = $d->read()))
			{
				if($entry=="." || $entry=="..") continue;

				$entries=explode("_", $entry);
				if(substr($entry, -6, -5)=="_")
				{
					$check=$entries[count($entries)-3];
				}
				else
				{
					$check=$entries[count($entries)-2];
				}
				if(in_array($check, $files_arr))
				{
					$i++;
				}
			}
			$d->close();
			if($i<count($files_arr))
			{
				return false;
			}
		}
	}

	return true;
	//return (sizeof(getTables()) > 0);
}

function inSession()
{
	$role = (ChatServer::userInRole($_SESSION['userid'], ROLE_ADMIN) || ChatServer::userInRole($_SESSION['userid'], ROLE_MODERATOR));
	return (isset($_SESSION['userid']) && $role && isInstalled());
}

function inPermission( $tabName )
{
	if(ChatServer::userInRole($_SESSION['userid'], ROLE_MODERATOR))
	{
		return (strpos(strtolower($GLOBALS['fc_config']['modsAdminRestrictions']), $tabName) === false);
	}

	return true;
}

//--------------------------------
// highlightPage()
//--------------------------------
function highlightPage($p)
{
	$p = basename($p);
	$pages = array('index.php',
				'cnf_config.php',
				'msglist.php',
				'chatlist.php',
				'usrlist.php',
				'roomlist.php',
				'connlist.php',
				'banlist.php',
				'ignorelist.php',
				'botlist.php',
				'uninstall.php',
				'logout.php'
			);
	$pages = array_flip($pages);
	$pages['room.php'] = 5;
	$pages['user.php'] = 3;
	$pages['bot.php'] = 9;
	$bold = array('l' => '<b>', 'r' => '</b>');
	$ind = $pages[$p];
	$return []= "b$ind";
	$return []= $bold;
	return $return;
}
//------------------------------------------------------------------------------------------------------------------------------//

	// added on 090706 for chat instances
	if(isset($_SESSION['instance_id']))
	{
		$_SESSION['session_inst'] = $_SESSION['instance_id'];//this is an adjustment so that if a chat client is used with a different instance it wont clash
	}
	else
	{
		$_SESSION['session_inst'] = 1;
	}
	function fc_admin_current_chat_instance()
	{
	    $query = 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'config_instances WHERE id=? ORDER BY id';
		$stmt = new Statement($query , 4 );
		$res  = $stmt->process($_SESSION['session_inst']);
	    $row = $res->next();
		//echo $stmt->final_query;
		return $row;
	}

	if(inSession())
	{
		$row = fc_admin_current_chat_instance();
		$smarty->assign('fc_admin_chat_instance',$row['name']);
	}

  $query = 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'config_instances ORDER BY id';
	$stmt = new Statement( $query , 3 );
	$res  = $stmt->process();
	$chat_instances = array();

    while($row = $res->next())
	{
	 	$chat_instances[] = $row;
	}

	$smarty->assign('chat_instances',$chat_instances);
	$smarty->assign('langs_top', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['top.tpl']);
	$smarty->assign('instance_ID', $_SESSION['session_inst']);
	$smarty->assign('IS_ADMIN', ChatServer::userInRole($userid, ROLE_ADMIN));

// added on 090706 for chat instances ends here

?>