<?php
require_once('init.php');
if(!inSession()) {
	include('login.php');
	exit;
}
else if(!inPermission('connections'))
{
	$tabName = 'Connections';
	include('nopermit.php');
	exit;
}
//--------------------------------
// highlight page. artemK0
//--------------------------------
$bold = highlightPage(__FILE__);
$smarty->assign($bold[0], $bold[1]);
define("APPDATA_DIR",dirname(__FILE__).'/../temp/appdata/');
function removeTables($tables)
{
	$link = mysql_connect($GLOBALS['fc_config']['db']['host'], $GLOBALS['fc_config']['db']['user'], $GLOBALS['fc_config']['db']['pass']);
	mysql_select_db($GLOBALS['fc_config']['db']['base'], $link);

	foreach($tables as $table)
	{
		$query = "DROP TABLE `$table`";
	    $dropcode = mysql_query($query, $link);
	}
}

function removeDir( $dir_name )
{
	if(!file_exists($dir_name)) return;

	$d = dir( $dir_name );
	while (false !== ($entry = $d->read()))
	{
		$full_path = $d->path.'/'.$entry;
		$is_dir = is_dir($full_path) && $entry != '.' && $entry != '..' && $entry != 'admin' && $entry != 'smarty' && $entry != 'templates';
		if( $is_dir )
		{
			removeDir( $full_path );
			@rmdir( $full_path );
		}
		else if(is_file( $full_path ))
		{
			@unlink($full_path);
		}
	}
	$d->close();
}

if(!inSession()) {
	include('login.php');
	exit;
}
else if(!inPermission('uninstall'))
{
	$tabName = 'Uninstall';
	include('nopermit.php');
	exit;
}

$_REQUEST['installed'] = 1;


if(isset($_GET['action']))// && isset($_GET['type']))
{
	if($_GET['action'] == '1')
	{
		if($_GET['cacheType']==2)
		{
			$d=dir($GLOBALS['fc_config']['cachePath']);

			while(false!==($entry = $d->read()))
			{
				if(strpos($entry, "_users_")===false)
				{
					@unlink($GLOBALS['fc_config']['cachePath']."/".$entry);
				}
			}
			$d->close();
		}
		else
		{
			removeTables(getTables());
		}
		/*
		if($_GET['type'] == '0')
		{
			removeTables(getTables());
		}
		else if($_GET['type'] == '1')
		{
			removeTables($_REQUEST['tables']);
			removeDir("../");
		}
		*/
	}
//----delete file from appdata dir---------------------
if ($handle = opendir(APPDATA_DIR))
{

	while (false !== ($file = readdir($handle)))

		if ( $file != '.' && $file != '..' && substr($file,strrpos($file,".")) != '.txt')
			unlink(APPDATA_DIR.$file);//delete file with configuration



    closedir($handle);
}
//---------------------------------------
}

if($GLOBALS['fc_config']['cacheType']==2)
{
	$_REQUEST['installed'] = 4;
	$d=dir($GLOBALS['fc_config']['cachePath']);

	while(false!==($entry = $d->read()))
	{
		if($entry=="." || $entry==".." || strpos($entry, "_users_")!==false) continue;

		$_REQUEST['tables'][]=$entry;
	}
	$d->close();
	if(count($_REQUEST['tables'])==0) $_REQUEST['installed'] = 2;
}
else
{
	$_REQUEST['tables'] = getTables();
	if(sizeof($_REQUEST['tables']) == 0)
	{
		if(isset($_GET['action'])) $_REQUEST['installed'] = 2;
		else $_REQUEST['installed'] = 3;
	}
	if($GLOBALS['fc_config']['cacheType']==1)
	{
		$d=dir($GLOBALS['fc_config']['cachePath']);

	while(false!==($entry = $d->read()))
	{
		if($entry=="." || $entry==".." || strpos($entry, "_users_")!==false) continue;

		$_REQUEST['tables'][]=$entry;
		}
		$d->close();
	}
}
$smarty->assign('_REQUEST', $_REQUEST);
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['uninstall.tpl']);
$smarty->display('uninstall.tpl');
?>