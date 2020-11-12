<?php
	define('INC_DIR', dirname(__FILE__) . '/./inc/');//for config.php
	//-------------------------------------------------------------------------------------
	//check if flahchat is installing 2. artemK0
	//-------------------------------------------------------------------------------------
	if(file_exists(dirname(__FILE__). '/temp/config.srv.php'))
	{
		require_once( dirname(__FILE__). '/inc/config.srv.php' );
	} else {
		Header('Location: install.php');
		die;
	}
	//-------------------------------------------------------------------------------------
	//check if flahchat is installing 2. artemK0
	//-------------------------------------------------------------------------------------


	//do not delete from install-----------------------------------------------
	//unset all values session for install
	//-------------------------------------------------------------------------
	unset($_SESSION['cache_type']);
	unset($_SESSION['forcms']);
	unset($_SESSION['rand_num']);
	unset($_SESSION['chachePath']);
	unset($_SESSION['usecms']);
	unset($_SESSION['instStep']);
	$_SESSION['instStep'] = null;
	//do not delete from install-----------------------------------------------
	//unset all values session for install
	//-------------------------------------------------------------------------

	//-------------------------------------------------------------------------------------
	//check if flahchat is installing
	//-------------------------------------------------------------------------------------
	if($GLOBALS['fc_config']['cacheType']!=2)
	{
		$query = 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections LIMIT 1';
		@mysql_connect($GLOBALS['fc_config']['db']['host'],$GLOBALS['fc_config']['db']['user'],$GLOBALS['fc_config']['db']['pass']);
		@mysql_select_db($GLOBALS['fc_config']['db']['base']);
		$result = @mysql_query($query);
		if($result == null)
		{
			Header('Location: install.php');
			die;
		}
		else
		{
			if($GLOBALS['fc_config']['cacheType']==1)
			{
				$i=0;
				$files_arr=array("bans", "configinst", "configmain", "connections", "ignors", "messages", "users", "tables");
				$d = dir("temp/templates/cache/");
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
					Header('Location: install.php');
					die;
				}
			}
		}
	} else {
		$fname = dirname(__FILE__)."/temp/templates/cache/".$GLOBALS['fc_config']['db']['pref']."config_".$GLOBALS['fc_config']['cacheFilePrefix']."_1.txt";
		if(!file_exists($fname))
		{
			Header('Location: install.php');
			die;
		}
	}
	//-------------------------------------------------------------------------------------
	//check if flahchat is installing
	//-------------------------------------------------------------------------------------

	include_once('inc/smartyinit.php');

	$data = array();
	$data['version'] = $GLOBALS['fc_config']['version'];
	$data['file_exists'] = file_exists('install.php') || file_exists('install_files');

	ChatServer::prepare();
	$cms = $GLOBALS['fc_config']['cms'];
	$cmsclass = strtolower(get_class($cms));
	$data['is_cms'] = ($cmsclass == 'defaultcms') && (! isset($cms->constArr) );

	$data['languages'] = ($GLOBALS['fc_config']['languages']);

  $stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE  instance_id=? ORDER BY ispermanent',56);
  $rs = $stmt->process($_SESSION['session_inst']);
  //changed on 090706 for chat instances

  $rooms = array();

  while($rec = $rs->next())
  {
    if (!$data['defaultRoom']) {
      $data['defaultRoom'] = $rec['id'];
    }
    $data['rooms'][$rec['id']] = $rec;
  }

	$data['defaultLanguage'] = $GLOBALS['fc_config']['defaultLanguage'];

	$data['is_statelesscms'] = ($cmsclass == 'statelesscms');
	$data['adminPassword']   = $GLOBALS['fc_config']['adminPassword'];
	$data['moderatorPassword'] = $GLOBALS['fc_config']['moderatorPassword'];
	$data['spyPassword']     = $GLOBALS['fc_config']['spyPassword'];

  $data['allowLanguage'] = $GLOBALS['fc_config']['allowLanguage'];
	//---chats
	//commented on 00706 for chat instances
	/*$query = "SELECT *
			  FROM {$GLOBALS['fc_config']['db']['pref']}config_chats ORDER BY id;";
	$stmt = new Statement($query);
	$res  = $stmt->process();
	$chats = array();

	while($row = $res->next()) $chats[] = $row;

	$pieces = explode(",", $chats[0]['instances']);*/
	//commented on 00706 for chat instances ends here

	//---instances
	$query = 'SELECT *
			  FROM '.$GLOBALS['fc_config']['db']['pref'].'config_instances
			  WHERE is_active=1 OR is_default=1
			  ORDER BY id;';
	$stmt = new Statement( $query , 2 );
	$res  = $stmt->process();
	$instances = array();

	while($row = $res->next())
	{
		//if ( in_array($row['id'],$pieces) )
		    $instances[] = $row;
	}


	$str_chat = '';
	/*foreach( $chats as $k=>$v )
		$str_chat = $str_chat.$v['id']."|".$v['instances'].";";
*///commented on 090706 for chat instances
	$str_inst = '';

	for( $i = 0; $i < sizeof($instances) ; $i++ )
		$str_inst = $str_inst.$instances[$i]['id'].'|'.$instances[$i]['name'].';';


	/*foreach( $instances as $k=>$v )
		$str_inst = $str_inst.$v['id'].'|'.$v['name'].';';*/


	//---

	$data['instances'] = $instances;
	$data['chats'] = $chats;

	$smarty->assign('data', $data);
	$smarty->assign('str_chat', $str_chat);
	$smarty->assign('str_inst', $str_inst);
	$smarty->display('index.tpl');
?>