<?php

	$pach = dirname(__FILE__) . '/../sql/mysql_conf.sql';
	$handle = fopen($pach, 'r');
	if (!$handle)
	{
	    echo 'Can not open file.';
		die;
	}
	$contents = fread($handle, filesize($pach));
	splitSql_fc($insert, $contents, 30329);
	for($k = 0; $k < count($insert); $k++)
	{
		$insert[$k] = str_replace('INSERT INTO flashchat_', 'INSERT INTO ' . $dbpref, $insert[$k]);
		$r = @mysql_query($insert[$k]);
		if(!$r)
		{
			if(mysql_errno() != 1062)
			{
				echo 'Problems with database: [' . mysql_errno() . '] ' . mysql_error();
				die;
			}
		}
	}
	if(isset($_SESSION['forcms']))
	{
		$sql = 'UPDATE '.$dbpref.'config_values,
					'.$dbpref.'config
			   SET '.$dbpref.'config_values.value = \''.$_SESSION['forcms'].'\'
		       WHERE '.$dbpref.'config_values.config_id = '.$dbpref.'config.id
					AND '.$dbpref.'config.level_0 = \'CMSsystem\'';
		$res = mysql_query($sql);
	}

	fclose($handle);

	/*if( isset($_SESSION['caching']) && isset($_REQUEST['step']) )
	{
		$sql = 'UPDATE '.$dbpref.'config_values SET value= \''.$_SESSION['caching'].'\' WHERE id=2850';
		$res = mysql_query($sql);
	}
	*/

	if(isset($_SESSION['cache_type']))
	{
		$sql = 'UPDATE '.$dbpref.'config_values,'.$dbpref.'config
				   SET '.$dbpref.'config_values.value = \''.$_SESSION['cache_type'].'\'
			       WHERE '.$dbpref.'config_values.config_id = '.$dbpref.'config.id
				   AND '.$dbpref.'config.level_0 = \'cacheType\'';
		$res = mysql_query($sql);
	}
	if(isset($_SESSION['forcms']))
	{
		$sql = 'UPDATE '.$dbpref.'config_values,'.$dbpref.'config
				   SET '.$dbpref.'config_values.value = \''.$_SESSION['forcms'].'\'
			       WHERE '.$dbpref.'config_values.config_id = '.$dbpref.'config.id
				   AND '.$dbpref.'config.level_0 = \'CMSsystem\'';
		$res = mysql_query($sql);
	}

	// if enabled full caching then rand_num needs on second step. artemK0
	if($_SESSION['cache_type'] != 2)
	{
		$rand = mt_rand();
		$_SESSION['rand_num'] = $rand;
	}
	$sql = 'UPDATE '.$dbpref.'config_values,'.$dbpref.'config
			   SET '.$dbpref.'config_values.value = \''.$rand.'\'
		       WHERE '.$dbpref.'config_values.config_id = '.$dbpref.'config.id
			   AND '.$dbpref.'config.level_0 = \'cacheFilePrefix\'';
	$res = mysql_query($sql);

	$sql = 'SELECT * FROM '.$dbpref.'config_values,'.$dbpref.'config
		       WHERE '.$dbpref.'config_values.config_id = '.$dbpref.'config.id
			   AND '.$dbpref.'config.level_0 = \'cachePath\'';
	$res = mysql_query($sql);
	$array = mysql_fetch_array($res);

	if( isset( $array['value'] ) )
	{
		$_SESSION['chachePath'] = $array['value'];
		$appDir = dir(dirname(__FILE__) . '/' . $array['value']);

		while (false !== ($entry = $appDir->read()))
		{
			if(
				$entry == '.' ||
				$entry == '..' ||
		   		strpos($entry, '.htac') !== FALSE ||
		   		strpos($entry, '.html') !== FALSE
		   	)
		   	{
				continue;
			}
			// dont delete config file, because file creates by processing second step. artemK0
			if(!($_SESSION['cache_type'] == 2 && $dbpref . 'config_' . $cacheFilePrefix . '_1.txt' == $entry))
			{
				$www = unlink(dirname(__FILE__) . './' . $array['value'].$entry);
			}
		}
		$appDir->close();
	}

?>