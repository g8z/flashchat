<?php
$this->result = array();
$cacheDir = $this->getCachDir();
$cachePath = $cacheDir->path;
$file_name = $this->getCachFileName('Connections');


//220
if( $this->code_sql==207  )//SELECT COUNT(*) as cnt FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE ip=? AND userid IS NOT NULL
{
	$content = file($file_name);
	$total = 0;
	$allUsers = array();
 	for( $i=0 ; $i < sizeof($content); $i++ )
	{
		$buffer = $content[$i];
		$array = explode("\t",$buffer);
		if( $array[9]==$params[0] && ''!=trim($array[3]) )
		{
			$total++;
		}
	}
	$allUsers[0]['cnt'] = $total;
	//return $allUsers;
	return new ResultSet1( $allUsers );
}
elseif( $this->code_sql==214 )//SELECT COUNT(*) AS numb FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid IS NOT NULL AND roomid = ? AND instance_id = ?
{
	$connections_file_name = $this->getCachFileName('Connections');
	$connections_file = file($connections_file_name);

	$total = 0;

	foreach($connections_file as $key => $val)
	{
		$line_connections = explode("\t", $val);
		if($line_connections[3] != '' && $line_connections[4] == $params[0])
		{
			$total++;
		}
	}

	$allUsers = array();
	$allUsers[0]['numb'] = $total;
	return new ResultSet1($allUsers);
}
elseif( $this->code_sql == 240 )//UPDATE '.$GLOBALS['fc_config']['db']['pref'].'connections SET updated=NOW(), roomid=? WHERE id=?
{
	$conn = $this->getCachFileName('Connections');
	$cont = file($conn);

	foreach( $cont as $key=>$val )
	{
		$buffer = $val;
		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);
		if( $array[4]==$params[0] && $array[0]==$params[1] )
		{
			$array['id'] = $array[0];
			$array = $this->unsetAll($array);
			$allUsers[] = $array;
		}
		else
			continue;
	}

	foreach( $allUsers as $key=>$val )
	{
		$file = @fopen( $GLOBALS['fc_config']['cachePath'].'update_'.$val['id'].'_.txt','w' );
		@fwrite($file, time());
		@fclose($file);
	}

	return true;
}
elseif( $this->code_sql == 205 )//UPDATE {$GLOBALS['fc_config']['db']['pref']}rooms,{$GLOBALS['fc_config']['db']['pref']}connections
{
	$connections_file_name = $this->getCachFileName('Connections');
	$rooms_file_name = $this->getCachFileName('Rooms');
	$rooms_file = file($rooms_file_name);
	$connections_file = file($connections_file_name);
	$room = array();

	if($connections_file != FALSE)
	{
		foreach($connections_file as $k => $v)
		{
			$t = explode("\t", $v);
			$bool = false;
			foreach($rooms_file as $k1 => $v1)
			{
				$t1 = explode("\t", $v1);
				if($t1[0] == $t[4] && $t1[6] == '')
				{
					$bool = true;
				}
			}
			if($bool)
			{
				$room[$t[4]] = $t[4];
			}
		}

		foreach($room as $k => $v)
		{
			$filename = $GLOBALS['fc_config']['cachePath'].'updroom_'.$v.'_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_.txt';
			$file = @fopen($filename, 'w');
			fwrite($file, time());
			fflush($file);
			fclose($file);
		}
	}
	return true;
	//$this->updateRoom();
}
elseif( $this->code_sql==215 )//SELECT lang FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE id=?
{
	$file_name = $this->getCachFileName('Connections');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while (!feof($handle))
	{
    	$buffer = fgets( $handle );
		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);
		if( $array[0]!=$params[0] )
			continue;


		$array['lang'] = $array[8];
		$array = $this->unsetAll($array);
		$allUsers[] = $array;
	}
	@fclose($handle);
	//return $allUsers;
	return new ResultSet1( $allUsers );
}
elseif( $this->code_sql==210 )//UPDATE {$GLOBALS['fc_config']['db']['pref']}connections SET updated=NOW() WHERE id=?
{
	$fname = $GLOBALS['fc_config']['cachePath'].'update_'.$params[0].'_'.$_SESSION['session_inst'].'_.txt';
	if( file_exists( $fname ) )
	{
		$fp = @fopen($fname,'w');
		@fwrite($fp,time());
		fflush($fp);
		@fclose( $fp );
		return $params[0];
	}
	$fp = @fopen($fname,'a');
	@fwrite($fp,time());
	fflush($fp);
	@fclose( $fp );

	return true;
	//$this->updateConn1( $queryParams );
}
elseif( $this->code_sql==206 )//SELECT id, ip FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE userid=? AND id<>?
{
	$file_name = $this->getCachFileName('Connections');
	$content = file($file_name);
	$allUsers = array();
	for( $i=0; $i < sizeof($content); $i++ )
	{
		$buffer = $content[$i];
		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);
		if( $array[3] == $params[0] && $array[0] != $params[1] )
		{
			$array['userid'] = 	$array[3];
			$array['id'] = 	$array[0];
			$array['ip'] = 	$array[9];

			$array = $this->unsetAll($array);

			$allUsers[] = $array;
		}
	}
	return new ResultSet1( $allUsers );
}
elseif( $this->code_sql==216 )//SELECT userid, state, color, lang, roomid FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE userid IS NOT NULL AND roomid=?
{
	$file_name = $this->getCachFileName('Connections');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while (!feof($handle))
	{
    	$buffer = fgets( $handle );
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);
		if( $array[3]!='' && $array[4]==$params[0] )
		{
			$array['userid'] = 	$array[3];
			$array['roomid'] = 	$array[4];
			$array['state'] = 	$array[5];
			$array['color'] = 	$array[6];
			$array['lang'] = 	$array[8];

			$array = $this->unsetAll($array);

			$allUsers[] = $array;
		}
	}
	@fclose($handle);
	//return $allUsers;
	return new ResultSet1( $allUsers );
}
elseif( $this->code_sql==245 )//connections WHERE userid IS NOT NULL AND userid <> ? AND chatid=?
{
	$file_name = $this->getCachFileName('Connections');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while (!feof($handle))
	{
    	$buffer = fgets( $handle );

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);
		if( $array[3]!='' && $array[3]!=$params[0] )
		{
			$array['userid'] = 	$array[3];
			$array['roomid'] = 	$array[4];
			$array['state']  = 	$array[5];
			$array['color']  = 	$array[6];
			$array['lang']   = 	$array[8];

			$array = $this->unsetAll($array);

			$allUsers[] = $array;
		}
	}
	@fclose($handle);
	//return $allUsers;
	return new ResultSet1( $allUsers );
}
elseif( $this->code_sql==217 )//SELECT userid, state, color, lang, roomid FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE userid IS NOT NULL
{
	$file_name = $this->getCachFileName('Connections');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while (!feof($handle))
	{
    	$buffer = fgets( $handle );
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);
		if( $array[3]!='' )
		{
			$array['userid'] = 	$array[3];
			$array['roomid'] = 	$array[4];
			$array['state'] = 	$array[5];
			$array['color'] = 	$array[6];
			$array['lang'] = 	$array[8];

			$array = $this->unsetAll($array);

			$allUsers[] = $array;
		}
	}
	@fclose($handle);
	return new ResultSet1($allUsers);
}

elseif( $this->code_sql==201 )//INSERT INTO {$GLOBALS['fc_config']['db']['pref']}connections (id, updated, created, userid, roomid, color, state, start, lang, ip) VALUES (?, NOW(), NOW(), ?, ?, ?, ?, ?, ?, ?)
{
	if( $file_name!= null )
	{
		$file = @fopen($file_name,'a');
		fclose($file);
	}
	else
	{
		$cacheDir = $this->getCachDir();
		$cachePath = $cacheDir->path;
		$file_name = $cachePath.$GLOBALS['fc_config']['db']['pref'].'connections_'.$GLOBALS['fc_config']['cacheFilePrefix'].'.txt';
	}

	if( $params[1]!='' )
	{
		$file = @fopen( $GLOBALS['fc_config']['cachePath'].'update_'.$params[0].'_.txt','w' );
		@fwrite($file, time());
		@fclose($file);
	}

	$today = date('Y-m-d H:i:s');//???
	$file = @fopen($file_name,'a');
	$fileRecordsCount = count($file);

	$str = $params[0]."\t".$today."\t".$today."\t".$params[1]."\t".$params[2]."\t".$params[3]."\t".$params[4]."\t".$params[5]."\t".$params[6]."\t".$params[7]."\t\t1\n";

	@fwrite($file, $str);
	fflush($file);
	@fclose($file);
	$this->result = array();
	return $params[0];
	//$this->insertConn($queryParams);
}
elseif( $this->code_sql == 213 )//SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE id=? LIMIT 1
{
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while ($buffer = fgets($handle))
	{
    	//$buffer = fgets( $handle );
		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if( $params[0]==$array[0] )
		{

			$array['id'] = 	$array[0];
			$array['updated'] = 	$array[1];
			$array['created'] = 	$array[2];

			$array['userid'] = 	$array[3];
			$array['roomid'] = 	$array[4];
			$array['state'] = 	$array[5];
			$array['color'] = 	$array[6];
			$array['start'] = 	$array[7];
			$array['lang'] = 	$array[8];
			$array['ip'] = 	$array[9];
			$array['tzoffset'] = 	$array[10];

			$array = $this->unsetAll($array);
			$allUsers[] = $array;
			break;
		}


	}

	@fclose($handle);
	//return $allUsers;
	return new ResultSet1($allUsers);
}
elseif(  $this->code_sql==243  || $this->queryStr=='SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections LIMIT 1' )
{
	return $this->selectIfConn();
}
elseif( $this->queryStr=='SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections' )
{
	$content = file($file);
	$total = '';
	$allUsers = array();

	for( $i=0 ; $i < sizeof( $content ) ; $i++ )
	{
		$buffer = $content[$i];
		$array = explode("\t",$buffer);

		$array['id'] = 			$array[0];
		$array['updated'] = 	$array[1];
		$array['created'] = 	$array[2];
		$array['userid'] = 		$array[3];
		$array['roomid'] = 		$array[4];
		$array['state'] = 		$array[5];
		$array['color'] = 		$array[6];
		$array['start'] = 		$array[7];
		$array['lang'] = 		$array[8];
		$array['ip'] = 			$array[9];
		$array['tzoffset'] =	$array[10];
		$array['instance_id'] = $_SESSION['session_inst'];

		$array = $this->unsetAll($array);

		$allUsers[] = $array;
	}

	return new ResultSet1($allUsers);
}
elseif( $this->code_sql==231 || $this->queryStr=='SELECT userid, state, color, lang, roomid FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid IS NOT NULL AND roomid = ? AND instance_id = ?' )//
{
	$connections_file_name = $this->getCachFileName('Connections');
	$connections_file = file($connections_file_name);

	$total = 0;
	$allUsers = array();

	foreach($connections_file as $key => $val)
	{
		$line_connections = explode("\t", $val);
		if($line_connections[3] != '' && $line_connections[4] == $params[0])
		{
			$array = array();
			$array['userid'] = $line_connections[3];
			$array['roomid'] = $line_connections[4];
			$array['state'] = $line_connections[5];
			$array['color'] = $line_connections[6];
			$array['lang'] = $line_connections[8];
			$allUsers[] = $array;
		}
	}

	return new ResultSet1($allUsers);
}
elseif($this->code_sql==232)
{
	$file_name = $this->getCachFileName('Connections');
	$content = file($file_name);

	$total = '';
	$allUsers = array();

	foreach( $content as $key => $val )
	{
		$buffer = $val;
		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);
		if( $array[3]!=$params[0] && $array[3]!='' )
		{
			$array['userid'] = 	$array[3];
			$array['roomid'] = 	$array[4];
			$array['state'] = 	$array[5];
			$array['color'] = 	$array[6];
			$array['lang'] = 	$array[8];
			$array = $this->unsetAll($array);
			$allUsers[] = $array;
		}
	}


	return new ResultSet1( $allUsers  );
}
elseif( $this->code_sql==234  )//$this->queryStr=='SELECT count(*) as msgnumb FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid IS NOT NULL'
{
	$connections_file_name = $this->getCachFileName('Connections');
	$connections_file = file($connections_file_name);

	$total = 0;
	$allUsers = array();

	foreach( $connections_file as $key=>$val )
	{
		$buffer = $val;

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if( $array[3]!='' )
		{
			$total++;
		}
	}


	$allUsers[0]['msgnumb'] = $total;

	return new ResultSet1($allUsers);
}
elseif( $this->code_sql==235  )//$this->queryStr=='SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid IS NOT NULL ORDER BY roomid'
{
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while ($buffer = fgets($handle))
	{
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);
		if( $array[3]!='' )
		{
			$array['userid'] = $array[3];
			$array['id'] = $array[0];
			$array['updated'] = $array[1];
			$array['created'] = $array[2];
			$array['roomid'] = $array[4];
			$array['state'] = $array[5];
			$array['color'] = $array[6];
			$array['start'] = $array[7];
			$array['ip'] = $array[9];
			$array['ip'] = $array[9];
			$array['tzoffset'] = $array[10];
			$array['instance_id'] = $_SESSION['session_inst'];

			$array = $this->unsetAll($array);
			$allUsers[] = $array;
			break;
		}
	}
	@fclose($handle);
	//return $allUsers;
	return new ResultSet1($allUsers);
}
elseif( $this->code_sql==239 )
{
	$content = file( $file_name );
	$total = '';
	$allUsers = array();
	foreach( $content as $key=>$val )
	{
		$buffer = $val;

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if( $array[3]!='' && $array[4]!=$params[0] )
		{
			$array['userid']      = $array[3];
			$array['id'] 	      = $array[0];
			$array['updated']     = $array[1];
			$array['created']     = $array[2];
			$array['roomid']      = $array[4];
			$array['state']       = $array[5];
			$array['color']   	  = $array[6];
			$array['start']       = $array[7];
			$array['ip']          = $array[9];
			$array['ip']          = $array[9];
			$array['tzoffset']    = $array[10];
			$array['instance_id'] = $_SESSION['session_inst'];

			$array = $this->unsetAll($array);

			$allUsers[] = $array;
		}
	}

	return new ResultSet1( $allUsers );
}
elseif( $this->code_sql==238  )//$this->queryStr=='SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE roomid=? AND userid IS NOT NULL'
{
	$content = file( $file_name );
	$total = '';
	$allUsers = array();
	foreach( $content as $key=>$val )
	{
		$buffer = $val;

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if( $array[3]!='' && $array[4]==$params[0] )
		{
			$array['userid']      = $array[3];
			$array['id'] 	      = $array[0];
			$array['updated']     = $array[1];
			$array['created']     = $array[2];
			$array['roomid']      = $array[4];
			$array['state']       = $array[5];
			$array['color']   	  = $array[6];
			$array['start']       = $array[7];
			$array['ip']          = $array[9];
			$array['ip']          = $array[9];
			$array['tzoffset']    = $array[10];
			$array['instance_id'] = $_SESSION['session_inst'];

			$array = $this->unsetAll($array);

			$allUsers[] = $array;
		}
	}

	return new ResultSet1( $allUsers );
}
elseif( $this->code_sql==218 || $this->queryStr=='SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid IS NOT NULL' )
{
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while ($buffer = fgets($handle))
	{
    	//$buffer = fgets( $handle );
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);
		if( $array[3]!='' )
		{
			$array['userid']      = 	$array[3];
			$array['id']          = 	$array[0];
			$array['updated']     = 	$array[1];
			$array['created']     = 	$array[2];
			$array['roomid']      = 	$array[4];
			$array['state']       = 	$array[5];
			$array['color']       = 	$array[6];
			$array['start']       = 	$array[7];
			$array['ip']          = 	$array[9];
			$array['ip']          = 	$array[9];
			$array['tzoffset']    = 	$array[10];
			$array['instance_id'] = $_SESSION['session_inst'];

			$array = $this->unsetAll($array);
			$allUsers[] = $array;
		}
	}
	@fclose($handle);
	//return $allUsers;
	return new ResultSet1( $allUsers );
}
elseif( $this->code_sql==220 )//$this->queryStr=='SELECT COUNT(*) AS CNT FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE roomid=? AND userid IS NOT NULL'
{
	$handle = @fopen($file_name, 'r');
	$total = 0;
	$allUsers = array();
	while ($buffer = fgets($handle))
	{
		//$buffer = fgets( $handle );
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);
		if( $array[3]!='' && $array[4]!=$params[0] )
			$total++;
	}
	$allUsers[0]['CNT'] = $total;
	fclose( $handle );
	return new ResultSet1($allUsers);
}
elseif( $this->code_sql==242 )//'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections where instance_id=?'
{
	$content = file( $file_name );
	$allUsers = array();

	foreach( $content as $key=>$val )
	{
		$buffer = $val;
		$array = explode("\t",$buffer);

		$array['id']      = $array[0];
		$array['updated'] = $array[1];
		$array['created'] = $array[2];
		$array['userid']  = $array[3];
		$array['roomid']  = $array[4];
		$array['color']   = $array[5];
		$array['state']   = $array[6];
		$array['start']   = $array[7];
		$array['lang']    = $array[8];
		$array['ip']      =	$array[9];
		$array['tzset']   = $array[10];

		$array = $this->unsetAll($array);

		$allUsers[] = $array;
	}

	return new ResultSet1($allUsers);

}
elseif( $this->code_sql == 221 )//SELECT id FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid=?  LIMIT 1
{
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();

	while ($buffer = fgets( $handle ))
	{
    	//$buffer = fgets( $handle );
		$array = explode("\t",$buffer);
		if( $array[3]==$params[0] )
		{
			$array['id'] = 	$array[0];
			$array = $this->unsetAll($array);
			$allUsers[] = $array;
			break;
		}
	}
	@fclose($handle);
	//return ;
	return new ResultSet1( $allUsers );
}
elseif( $this->code_sql == 241 )//SELECT roomid FROM '.$GLOBALS['fc_config']['db']['pref'].'connectionsWHERE id<>? AND userid IS NOT NULL GROUP BY roomid HAVING COUNT(*) < '.$GLOBALS['fc_config']['maxUsersPerRoom']
{
	$content = file( $file_name );
	$total = '';
	$allUsers = array();

	foreach( $content as $key=>$val )
	{
		$buffer = $val;
		$array = explode("\t",$buffer);
		if( $array[0]!=$params[0] && $array[3]!='' )
		{
			$array['roomid'] = 	$array[4];

			$array = $this->unsetAll($array);

			$allUsers[] = $array;
		}
	}

	$roomid = array();

	foreach( $allUsers as $key=>$val )
	{
		if( !isset( $roomid[$val['roomid']] ) )
		{
			$roomid[$val['roomid']] = 0;
		}
		else
			$roomid[$val['roomid']]++;
	}
	$allUsers = array();
	foreach( $roomid as $key=>$val )
	{
		if( $val < $GLOBALS['fc_config']['maxUsersPerRoom'] )
		{
			$allUsers[]['roomid'] = $key;
		}
	}

	return new ResultSet1( $allUsers );
}
elseif( $this->queryStr=='SELECT COUNT(*) as cnt FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE ip=? AND userid IS NOT NULL' )
{
	return null;
}
elseif( $this->code_sql==222 )//$this->queryStr=='SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE id<>? AND userid IS NOT NULL'
{
	$total = '';
	$allUsers = array();
	$content = file( $file_name );
	for( $i=0 ; $i<sizeof($content) ; $i++ )
	{
		$buffer = $content[$i];
		$array = explode("\t",$buffer);
		if( $array[0]!=$params[0] && ''!=trim($array[3]) )
		{
			$array['id'] = $array[0];
			$array['updated'] = $array[1];
			$array['created'] = $array[2];
			$array['userid'] = $array[3];
			$array['roomid'] = $array[4];
			$array['color'] = $array[5];
			$array['state'] = $array[6];
			$array['start'] = $array[7];
			$array['lang'] = $array[8];
			$array['ip'] = 	$array[9];
			$array['tzset'] = $array[10];
$array = $this->unsetAll($array);
			$allUsers[] = $array;
		}
	}
	//return $allUsers;
	return new ResultSet1( $allUsers );
}
elseif( $this->code_sql == 202 )//UPDATE {$GLOBALS['fc_config']['db']['pref']}connections SET updated=NOW(), userid=?, roomid=?, color=?, state=?, start=?, lang=?, ip=?, tzoffset=? WHERE id=?
{
	$handle = @fopen($file_name, 'r');
	$total = '';
	$whot='*';


	while ($buffer = fgets($handle))
	{
    	if( trim($buffer)=='' )
			continue;

		$array = explode("\t",$buffer);
		$today = date('Y-m-d H:i:s');//
		if( $array[0]==$params[8] )
		{
			$userID = $array[3];
			$total = $total.$params[8]."\t".$today."\t".$array[2]."\t".$params[0]."\t".$params[1]."\t".$params[2]."\t".$params[3]."\t".$params[4]."\t".$params[5]."\t".$params[6]."\t".$params[7]."\t1\n";
		}
		else
			$total = $total.$buffer;

	}

	@fclose($handle);


	$file = @fopen($file_name,'w');
	@fwrite($file , $total);
	fflush($file);
	@fclose($file);

	if( $params[0]!='' )
	{
		$f = $GLOBALS['fc_config']['cachePath'].'update_'.$params[8].'_'.$_SESSION['session_inst'].'_.txt';
		$fp1 = @fopen($f,'a');
		@fwrite( $fp1,time());
		fflush( $fp1 );
		@fclose( $fp1 );

	}
	else
	{
		$f = $GLOBALS['fc_config']['cachePath'].'update_'.$params[8].'_'.$_SESSION['session_inst'].'_.txt';
		if( file_exists( $f ) )
		{
			unlink($f);
		}

		$file_name = $this->getCachFileName('Users');
		$handle = @fopen($file_name,'r');
		$str = '';
		while (!feof($handle))
		{
    		$buffer = fgets($handle);
			if( $buffer=='' )
				continue;

			$array = explode("\t",$buffer);
			//if( $array[0]!=$userID )
				$str .= $buffer;
		}
		@fclose($handle);
		$file = @fopen($file_name,'w');
		@fwrite($file, $str);
		@fflush($file);
		@fclose($file);
	}


	return null;
	//$this->updateConn('*',$queryParams);

}
elseif( $this->code_sql == 233  )//UPDATE '.$GLOBALS['fc_config']['db']['pref'].'connections SET updated=NOW() WHERE userid IS NOT NULL AND ip=?
{
	$allConn = file($file_name);
	foreach( $allConn as $key=>$val )
	{
		$buffer = $val;
		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if( $array[3]!='' && $array[9]==$params[0] )
		{
			$array['id'] = $array[0];
			$allUsers[] = $array;
		}
	}

	foreach( $allUsers as $key=>$val )
	{
		$fname = $GLOBALS['fc_config']['cachePath'].'update_'.$val['id'].'_'.$_SESSION['session_inst'].'_.txt';
		if( file_exists( $fname ) )
		{
			$fp = @fopen($fname,'w');
			@fwrite($fp,time());
			fflush($fp);
			@fclose( $fp );
			return $params[0];
		}
		$fp = @fopen($fname,'a');
		@fwrite($fp,time());
		fflush($fp);
		@fclose( $fp );
	}

	return true;
}
elseif( $this->code_sql == 204 )//SELECT id FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE userid IS NOT NULL AND updated < DATE_SUB(NOW(),INTERVAL ? SECOND) AND ip <> ?
{
	$allConn = file($file_name);
	$total = '';
	$allUsers = array();
	foreach( $allConn as $key=>$val )
    {
		$buffer = $val;
		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if( $array[3]!='' && $array[9]!=$params[1]  )
		{
			if( file_exists($cachePath.'update_'.$array[0].'_'.$_SESSION['session_inst'].'_.txt') )
			{
				if( time()-filemtime($cachePath.'update_'.$array[0].'_'.$_SESSION['session_inst'].'_.txt')>$params[0]  )
				{

					$array['id'] = 	$array[0];
					$array = $this->unsetAll($array);
					$allUsers[] = $array;
				}
			}
		}
	}

	return new ResultSet1($allUsers);
}
elseif( $this->code_sql==203 )//DELETE FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE updated < DATE_SUB(NOW(),INTERVAL ? SECOND)
{
	$allConn = file($file_name);
	$total = '';

	$allUsers = array();
	foreach($allConn as $key=>$val)
	{
    	$buffer = $val;//fgets( $handle );

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);
		if( file_exists($cachePath.'update_'.$array[0].'_'.$_SESSION['session_inst'].'_.txt') )
		{
			if( (time()-filemtime($cachePath.'update_'.$array[0].'_'.$_SESSION['session_inst'].'_.txt'))>$params[0]  )
			{
				unlink($cachePath.'update_'.$array[0].'_'.$_SESSION['session_inst'].'_.txt');
			}
			else
			{
				$total .= $buffer;
			}
		}
		else
		{
			if( (time() - strtotime($array[1]))<$params[0])
			{
				$total .= $buffer;
			}
		}
	}

	//@fclose( $handle );
	$handle = @fopen( $file_name, 'w' );
	fwrite( $handle,$total );
	fflush($handle);
	fclose( $handle );
	$this->result = array();
	return true;
}
elseif( $this->code_sql==223 )//'DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE id = ?'
{
	$handle = @fopen($file_name, 'r');
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$total = '';
	$allUsers = array();
	$buffer = '';
	while ($buffer = fgets( $handle ))
	{
    	//$buffer = fgets( $handle );
		$array = explode("\t",$buffer);
		if( $array[0]!=$params[0] )
		{
			$total .= $buffer;
		}
		else
		{
			if( file_exists($cachePath.'update_'.$array[0].'_'.$_SESSION['session_inst'].'_.txt') )
			{
				unlink($cachePath.'update_'.$params[0].'_'.$_SESSION['session_inst'].'_.txt');
			}
		}
	}
	@fclose($handle);
	$handle = @fopen($file_name, 'w');
	@fwrite($handle , $total);
	fflush($handle);
	@fclose($handle);
	$this->result = array();
	return true;
}
elseif( $this->code_sql == 230 )//SELECT COUNT(*) AS numb FROM '.$GLOBALS['fc_config']['db']['pref'].'connections,'.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE userid IS NOT NULL AND userid <> (SELECT `id` FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE `roles`=?) AND ispublic IS NOT NULL AND '.$GLOBALS['fc_config']['db']['pref'].'connections.roomid = '.$GLOBALS['fc_config']['db']['pref'].'rooms.id
{
	$connections_file_name = $this->getCachFileName('Connections');
	$rooms_file_name = $this->getCachFileName('Rooms');
	$users_file_name = $this->getCachFileName('Users');
	$users_file = file($users_file_name);
	$rooms_file = file($rooms_file_name);
	$connections_file = file($connections_file_name);

	$total = 0;
	$spyid = 0;
	$allUsers = array();
	foreach($users_file as $k => $v)
	{
		$line_users = explode("\t", $v);
		if($line_users[3] == $params[0])
		{
			$spyid = $line_users[0];
		}
	}
	foreach( $connections_file as $key => $val )
	{
		$line_connections = explode("\t", $val);
		foreach($rooms_file as $k => $v)
		{
			$line_rooms = explode("\t", $v);
			if($line_connections[4] == $line_rooms[0] && $line_connections[3] != '' && $line_connections[3] != $spyid)
			{
				$total++;
			}
		}
	}

	$allUsers[0]['numb'] = $total;
	return new ResultSet1($allUsers);
}
elseif( strpos($this->queryStr, 'SELECT roomid')!==FALSE )
{
	$total = '';
	$allUsers = array();
	$content = file( $file_name );
	for( $i = 0 ; $i < sizeof($content) ;$i++ )
	{
		$buffer = $content[$i];
		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);
		if( $array[0]==$params[0] && $array[3]!='' )
		{
			$array['roomid'] = 	$array[4];
			$array = $this->unsetAll($array);
			$allUsers[] = $array;
			break;
		}
	}

	return new ResultSet1($allUsers);//$queryParams
}
?>