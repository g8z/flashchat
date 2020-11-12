<?php

if ( isset( $_SESSION['forcms'] ) )
	{
		$sql = 'UPDATE '.$dbpref.'config_values,'.$dbpref.'config
			   SET '.$dbpref.'config_values.value = \''.$_SESSION['forcms'].'\'
		       WHERE '.$dbpref.'config_values.config_id = '.$dbpref.'config.id
			   AND '.$dbpref.'config.level_0 = \'CMSsystem\'';
		$res = mysql_query( $sql );
	}

	

	if( isset( $_SESSION['cache_type'] ) )
	{
		$sql = 'UPDATE '.$dbpref.'config_values,'.$dbpref.'config
				   SET '.$dbpref.'config_values.value = \''.$_SESSION['cache_type'].'\'
			       WHERE '.$dbpref.'config_values.config_id = '.$dbpref.'config.id
				   AND '.$dbpref.'config.level_0 = \'cacheType\'';
		$res = mysql_query( $sql );
	}
	if( isset( $_SESSION['forcms'] ) )
	{
		$sql = 'UPDATE '.$dbpref.'config_values,'.$dbpref.'config
				   SET '.$dbpref.'config_values.value = \''.$_SESSION['forcms'].'\'
			       WHERE '.$dbpref.'config_values.config_id = '.$dbpref.'config.id
				   AND '.$dbpref.'config.level_0 = \'CMSsystem\'';
		$res = mysql_query( $sql );
	}
	
	
	$rand = mt_rand();
	$_SESSION['rand_num'] = $rand;
	$sql = 'UPDATE '.$dbpref.'config_values,'.$dbpref.'config
			   SET '.$dbpref.'config_values.value = \''.$rand.'\'
		       WHERE '.$dbpref.'config_values.config_id = '.$dbpref.'config.id
			   AND '.$dbpref.'config.level_0 = \'cacheFilePrefix\'';
	$res = mysql_query( $sql );
	
	
	$sql = 'SELECT * FROM '.$dbpref.'config_values,'.$dbpref.'config			   
		       WHERE '.$dbpref.'config_values.config_id = '.$dbpref.'config.id
			   AND '.$dbpref.'config.level_0 = \'cachePath\'';
	$res = mysql_query( $sql );
	$array = mysql_fetch_array($res);
	
	
	
	if( isset( $array['value'] ) )
	{
		$_SESSION['chachePath'] = $array['value'];
		$appDir = dir( dirname(__FILE__).'/'.$array['value'] );
		while (false !== ($entry = $appDir->read()))
		{
			if(
				$entry == '.' ||
				$entry == '..' ||
		   		strpos($entry, '.htac')!==FALSE ||
		   		strpos($entry, '.html')!==FALSE
		   	)
			continue;
			$www = unlink( dirname(__FILE__).'./'.$array['value'].$entry );
		}
		$appDir->close();
	}
?>