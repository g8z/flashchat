<?php

//temp comment temp comment temp coment temp comment***************************************************************************************
if( isset($GLOBALS['fc_config']['cacheType']) && $GLOBALS['fc_config']['cacheType']==2 )
{
	$_SESSION['session_inst'] = 1;
	$fname = dirname(__FILE__).'/../temp/templates/cache/'.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	if( !file_exists($fname) )
	{
		unset($_SESSION['userid']);
		Header('Location: ../install.php');
		die;
	}
}
else
{
	mysql_connect($GLOBALS['fc_config']['db']['host'], $GLOBALS['fc_config']['db']['user'], $GLOBALS['fc_config']['db']['pass']);
	mysql_select_db($GLOBALS['fc_config']['db']['base']);
}
//$btime = microtime();
//if ( isset( $_REQUEST['instances'] ) )
//    $_SESSION["session_inst"] = $_REQUEST['instances'];// commented on 090706 for chat instances

$rec = $_REQUEST;

if ( isset( $rec['session_inst'] ) )
{
	//$_SESSION['session_inst'] = trim($rec['session_inst']);// added on 090706 for chat instances
	$_SESSION['session_inst'] = $rec['session_inst'];// added on 090706 for chat instances
}

$conf_pref = $GLOBALS['fc_config']['db']['pref'];




//$_SESSION['session_inst'] = 1;
if( !isset($_SESSION['session_inst']) )
{
	// commented because instances not use now. artemK0
	/*$query = 'SELECT '.$conf_pref.'config_instances.*
       	  	  FROM '.$conf_pref.'config_instances
		  	  WHERE '.$conf_pref.'config_instances.is_default = 1
			  LIMIT 1';


	$result = mysql_query($query);

	$row = mysql_fetch_array($result);*/

	$_SESSION['session_inst'] = 1;
	$_SESSION['session_inst_name'] = 'Default';// added on 090706 for chat instances

}


	//$_SESSION['session_inst_name'] = 'Default';
	// added on 090706 for chat instances
	if( isset($_SESSION['session_inst_name']) && $_SESSION['session_inst_name'] == '')
	{
		// commented because instances not use now. artemK0
		/*$query = 'SELECT '.$conf_pref.'config_instances.*
	       	  	  FROM '.$conf_pref.'config_instances
			  	  WHERE '.$conf_pref.'config_instances.is_default = '.$_SESSION['session_inst'].' LIMIT 1';

		$result = mysql_query($query);
		$row = mysql_fetch_array($result);*/
		$_SESSION['session_inst_name'] = 'Default';
	}



	//if($_SESSION["session_inst_name"] == "")
	// added on 090706 for chat instances ends here

$path = dirname(__FILE__).'/../temp/appdata/'.$GLOBALS['filename'].'_'. $_SESSION['session_inst'] .'.php';
file_exists($path);
if(!file_exists($path) || (isset($GLOBALS['force_config']) && $GLOBALS['force_config']))// commented on 090706 for chat instances
{

	$addlevel   = '';
	$addlevel_0 = '';
	$addwhere   = '';
	$levels = array();
	$params = array();
	$sqlCode=0;
  $GLOBALS['filename'];
	switch($GLOBALS['filename'])
	{
		case 'config':
			$addlevel = "\$GLOBALS['fc_config']";
			$addwhere = " AND NOT(level_0='badWords' OR level_0='badWordSubstitute' OR level_0='layouts' OR level_0='skin' OR level_0='themes')";
			$addorder = 'ORDER BY '.$conf_pref.'config._order';
			$sqlCode=425;
			break;
		case 'badwords':
			$levels[0]  = 'badWords';
			$addlevel_0 = "\$GLOBALS['fc_config']['badWordSubstitute']";
			$addlevel   = "\$GLOBALS['fc_config']['badWords']";
			$params []= 'badWords';
			$params []= 'badWordSubstitute';
			$addwhere   = " AND (level_0=? OR level_0=?)";
			$addorder = 'ORDER BY '.$conf_pref.'config_values.id';
			$sqlCode=424;
			break;
		case 'admin':
			$levels[0] = 'layouts';
			$levels[1] = ROLE_ADMIN;
			$addlevel = "\$GLOBALS['fc_config']['layouts'][".ROLE_ADMIN."]";
			$params[]="layouts";
			$params[]=ROLE_ADMIN;
			$addwhere   = " AND (level_0=? AND level_1=?)";
			$addorder = 'ORDER BY '.$conf_pref.'config_values.id';
			$sqlCode=423;
			break;
		case 'customer':
			$levels[0] = 'layouts';
			$levels[1] = ROLE_CUSTOMER;
			$addlevel = "\$GLOBALS['fc_config']['layouts'][".ROLE_CUSTOMER."]";
			$params[]="layouts";
			$params[]=ROLE_CUSTOMER;
			$addwhere   = " AND (level_0=? AND level_1=?)";
			$addorder = 'ORDER BY '.$conf_pref.'config_values.id';
			$sqlCode=423;
			break;
		case 'moderator':
			$levels[0] = 'layouts';
			$levels[1] = ROLE_MODERATOR;
			$addlevel = "\$GLOBALS['fc_config']['layouts'][".ROLE_MODERATOR."]";
			$params[]="layouts";
			$params[]=ROLE_MODERATOR;
			$addwhere   = " AND (level_0=? AND level_1=?)";
			$addorder = 'ORDER BY '.$conf_pref.'config_values.id';
			$sqlCode=423;
			break;
		case 'spy':
			$levels[0] = 'layouts';
			$levels[1] = ROLE_SPY;
			$addlevel = "\$GLOBALS['fc_config']['layouts'][".ROLE_SPY."]";
			$params[]="layouts";
			$params[]=ROLE_SPY;
			$addwhere   = " AND (level_0=? AND level_1=?)";
			$addorder = 'ORDER BY '.$conf_pref.'config_values.id';
			$sqlCode=423;
			break;
		case 'user':
			$levels[0] = 'layouts';
			$levels[1] = ROLE_USER;
			$addlevel = "\$GLOBALS['fc_config']['layouts'][".ROLE_USER."]";
			$params[]="layouts";
			$params[]=ROLE_USER;
			$addwhere   = " AND (level_0=? AND level_1=?)";
			$addorder = 'ORDER BY '.$conf_pref.'config_values.id';
			$sqlCode=423;
			break;
		case 'aqua_skin':
			$levels[0] = 'skin';
			$levels[1] = $GLOBALS['filename'];
			$addlevel = "\$GLOBALS['fc_config']['skin']['".$GLOBALS['filename']."']";
			$params[]="skin";
			$params[]=$GLOBALS['filename'];
			$addwhere   = " AND (level_0=? AND level_1=?)";
			$addorder = 'ORDER BY '.$conf_pref.'config_values.id';
			$sqlCode=423;
			break;
		case 'default_skin':
			$levels[0] = 'skin';
			$levels[1] = $GLOBALS['filename'];
			$addlevel = "\$GLOBALS['fc_config']['skin']['".$GLOBALS['filename']."']";
			$params[]="skin";
			$params[]=$GLOBALS['filename'];
			$addwhere   = " AND (level_0=? AND level_1=?)";
			$addorder = 'ORDER BY '.$conf_pref.'config_values.id';
			$sqlCode=423;
			break;
		case 'gradient_skin':
			$levels[0] = 'skin';
			$levels[1] = $GLOBALS['filename'];
			$addlevel = "\$GLOBALS['fc_config']['skin']['".$GLOBALS['filename']."']";
			$params[]="skin";
			$params[]=$GLOBALS['filename'];
			$addwhere   = " AND (level_0=? AND level_1=?)";
			$addorder = 'ORDER BY '.$conf_pref.'config_values.id';
			$sqlCode=423;
			break;
		case 'xp_skin':
			$levels[0] = 'skin';
			$levels[1] = $GLOBALS['filename'];
			$addlevel = "\$GLOBALS['fc_config']['skin']['".$GLOBALS['filename']."']";
			$params[]="skin";
			$params[]=$GLOBALS['filename'];
			$addwhere   = " AND (level_0=? AND level_1=?)";
			$addorder = 'ORDER BY '.$conf_pref.'config_values.id';
			$sqlCode=423;
			break;
		case $prefix == 'thm':

			$levels[0] = 'themes';
			$levels[1] = $GLOBALS['filename'];
			$addlevel = "\$GLOBALS['fc_config']['themes']['".$GLOBALS['filename']."']";
			$params[]="themes";
			$params[]=$GLOBALS['filename'];
			$addwhere   = " AND (level_0=? AND level_1=?)";
			$addorder = 'ORDER BY '.$conf_pref.'config_values.id';
			$sqlCode=423;
			break;
	}
	//---------------------------------------------------------------------------------------------------------------------------//
	$query = 'SELECT *
			  FROM '.$conf_pref.'config,'.$conf_pref.'config_values
			  WHERE '.$conf_pref.'config_values.instance_id = ? AND
			  '.$conf_pref.'config.id = '.$conf_pref.'config_values.config_id AND
  			  '.$conf_pref.'config_values.disabled = 0 '
			  .$addwhere.' '.$addorder;
	if($sqlCode == 423)
	{
		$stmt = new Statement($query, $sqlCode);
		$result = $stmt->process($_SESSION['session_inst'], $params[0], $params[1]);
	}
	elseif($sqlCode == 424)
	{
		$stmt = new Statement($query, $sqlCode);
		$result = $stmt->process($_SESSION['session_inst'], $params[0], $params[1]);
	}
	elseif($sqlCode == 425)
	{
		$stmt = new Statement($query, $sqlCode);
		$result = $stmt->process($_SESSION['session_inst']);
	}

	//---------------------------------------------------------------------------------------------------------------------------//
	$config = array();

	while( $rec = $result->next() )
	{
		scan_record($rec, $config);
	}

	$tmp_module = array();

	if(count($config['module']) > 0)
	{
		foreach($config['module'] as $k => $v)
		{
			$exploded_v = explode(',', $v);
			foreach($exploded_v as $key => $val)
			{
				$tmp_module[$key][$k] = $val;
			}
		}
		foreach($config['module'] as $k => $v)
		{
			$config['module'][$k] = '';
		}
		foreach($tmp_module as $k => $v)
		{
			if($v['enabled'] == 'true')
			{
				foreach($v as $key => $val)
				{
					$config['module'][$key] .= $val.',';
				}
			}
		}
		foreach($config['module'] as $k => $v)
		{
			$config['module'][$k] = substr($config['module'][$k], 0, -1);
		}
	}

	//---------------------------------------------------------------------------------------------------------------------------//
	if($addlevel_0 != '')
	{
		$addlevel_0 .= ' = '.var_export($config['badWordSubstitute'], true).";\n";
	}

	if(count($levels) == 1)
	{
		$config = $config[$levels[0]];
	}
	else
	{
		if(count($levels) == 2 && isset( $config[$levels[0]][$levels[1]] ) )
		{
			$config = $config[$levels[0]][$levels[1]];
		}
	}
	$config['cacheType']=$GLOBALS['fc_config']['cacheType'];
	if(isset($GLOBALS['fc_config']['cachePath_sm']))
	{
		$config['cachePath']=$GLOBALS['fc_config']['cachePath_sm'];
	}
	else
	{
		$config['cachePath']=$GLOBALS['fc_config']['cachePath'];
	}
	$config['cacheFilePrefix']=$GLOBALS['fc_config']['cacheFilePrefix'];
	$str = var_export($config, true);
	while(strpos($str,"'0x"))
	{
		$str = substr_replace($str, substr($str,strpos($str,"'0x")+1,8 ), strpos($str,"'0x"),10);
	}
	$needle = " => ''";
	if( isset($levels[0]) && $levels[0] == 'badWords' )
	{
		while( !strpos($str,$needle) === false)
		{
			$str = utf8_decode(substr_replace($str, '', strpos($str,$needle), strlen($needle)));
		}
	}

	$data = "<?php\n$addlevel_0$addlevel = ".$str.";\n?>";
	//header("Content-type: text/plain");	echo $data;exit;

	write2file($path, $data);
	//header("Content-type: text/plain");echo "$addlevel_0$addlevel = $str;";exit;
}////if(!file_exists($path) || $GLOBALS['force_config'])// commented on 090706 for chat instances

$pre_fc_config = $GLOBALS['fc_config'];

require_once($path);

//eval("$addlevel_0$addlevel = $str;");
$GLOBALS['fc_config'] = array_merge($pre_fc_config, $GLOBALS['fc_config']);
if(!isset($GLOBALS['fc_config']['cachePath_sm'])) $GLOBALS['fc_config']['cachePath_sm']=$GLOBALS['fc_config']['cachePath'];


if( strpos($GLOBALS['fc_config']['cachePath'],'inc')===false ) $GLOBALS['fc_config']['cachePath'] = INC_DIR.$GLOBALS['fc_config']['cachePath'];
?>