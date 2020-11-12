<?php
//53
if( $this->code_sql == 78 )
{
	$file_name = $this->getCachFileName('Rooms');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allRooms = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);


		if( $array[6]!='' )
		{
			$array['id'] = $array[0];
			$array['updated'] = $array[1];
			$array['created'] = $array[2];
			$array['name'] = $array[3];
			$array['password'] = $array[4];
			$array['ispublic'] = $array[5];
			$array['ispermanent'] = $array[6];
			$array = $this->unsetAll($array);
			$allRooms[] = $array;

		}

	}
	@fclose($handle);



	if( !function_exists('cmpRoom2') )
	{
		function cmpRoom2($elem1, $elem2)
		{
			if($elem1['ispermanent']<$elem2['ispermanent'] )
				return -1;
			elseif($elem1['ispermanent']==$elem2['ispermanent'])
				return 0;
			elseif($elem1['ispermanent']>$elem2['ispermanent']  || $elem1['ispermanent']=='')
				return 1;
		}
	}

	usort($allRooms, 'cmpRoom2');	//return $allRooms;
	return new ResultSet1( $allRooms );
}
elseif( $this->code_sql==65 || $this->queryStr == 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms ORDER BY id')
{
	$file_name = $this->getCachFileName('Rooms');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allRooms = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);
		$array['id'] = $array[0];
		$array['updated'] = $array[1];
		$array['created'] = $array[2];
		$array['name'] = $array[3];
		$array['password'] = $array[4];
		$array['ispublic'] = $array[5];
		$array['ispermanent'] = $array[6];

		$array = $this->unsetAll($array);

		$allRooms[] = $array;
	}
	fclose($handle);
	//return $allRooms;
	if( !function_exists('cmpRoomId') )
	{
		function cmpRoomId($elem1, $elem2)
		{
			if($elem1['id']<$elem2['id'])
				return -1;
			elseif($elem1['id']==$elem2['id'])
				return 0;
			elseif($elem1['id']>$elem2['id'])
				return 1;
		}
	}
	usort($allRooms, 'cmpRoomId');
	return new ResultSet1( $allRooms );
}
elseif( $this->code_sql==56 )
{
	$file_name = $this->getCachFileName('Rooms');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allRooms = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);
		$array['id'] = $array[0];
		$array['updated'] = $array[1];
		$array['created'] = $array[2];
		$array['name'] = $array[3];
		$array['password'] = $array[4];
		$array['ispublic'] = $array[5];
		$array['ispermanent'] = $array[6];

		$array = $this->unsetAll($array);

		$allRooms[] = $array;
	}

	if( !function_exists('cmpRoom1') )
	{
		function cmpRoom1($elem1, $elem2)
		{
			if($elem1['ispermanent']<$elem2['ispermanent'] || $elem2['ispermanent']=='' )
				return -1;
			elseif($elem1['ispermanent']==$elem2['ispermanent'])
				return 0;
			elseif($elem1['ispermanent']>$elem2['ispermanent'] || $elem1['ispermanent']=='')
				return 1;
		}
	}

	usort($allRooms, 'cmpRoom1');
	fclose($handle);
	return new ResultSet1( $allRooms );
}
elseif( strtoupper($this->queryStr) == strtoupper('SELECT id FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE ispermanent IS NOT NULL ORDER BY ispermanent'))
{
	$file_name = $this->getCachFileName('Rooms');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allRooms = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);


		if( $array[6]!='')
		{
			$array['id'] = $array[0];
			$array['updated'] = $array[1];
			$array['created'] = $array[2];
			$array['name'] = $array[3];
			$array['password'] = $array[4];
			$array['ispublic'] = $array[5];
			$array['ispermanent'] = $array[6];

			$this->unsetAll($array);

			$allRooms[] = $array;
		}

		$array['id'] = $array[0];
		$array['updated'] = $array[1];
		$array['created'] = $array[2];
		$array['name'] = $array[3];
		$array['password'] = $array[4];
		$array['ispublic'] = $array[5];
		$array['ispermanent'] = $array[6];
		$array = $this->unsetAll($array);

		$allRooms[] = $array;

	}
	@fclose($handle);
	//return $allRooms;

	if( !function_exists('cmpRoom') )
	{
		function cmpRoom($elem1, $elem2)
		{
			if($elem1['ispermanent']<$elem2['ispermanent'])
				return -1;
			elseif($elem1['ispermanent']==$elem2['ispermanent'])
				return 0;
			elseif($elem1['ispermanent']>$elem2['ispermanent'])
				return 1;
		}
	}

	usort($allRooms, 'cmpRoom');

	return new ResultSet1( $allRooms );
}
elseif( $this->code_sql==66 )//SELECT count(*) as maxnumb FROM flashchat_rooms WHERE ispermanent IS NOT NULL AND instance_id=?
{
	$file_name = $this->getCachFileName('Rooms',$params[0]);
	$handle = @fopen($file_name, 'r');
	$count = 0;
	$allRooms = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);

		if( $array[6]!='')
		{
			$count++;
		}
	}
	@fclose($handle);
	//return $allRooms;

	$allRooms[0]['maxnumb']	= $count;

	return new ResultSet1( $allRooms );
}
elseif( $this->code_sql==67 )//'SELECT count(*) as rowcount FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id > 0 AND instance_id=?'
{
	$file_name = $this->getCachFileName('Rooms',$params[0]);
	$handle = @fopen($file_name, 'r');
	$count = 0;
	$allRooms = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);

		if( (int)$array[0] > 0)
		{
			$count++;
		}
	}
	@fclose($handle);
	//return $allRooms;

	$allRooms[0]['rowcount']	= $count;

	return new ResultSet1( $allRooms );
}
elseif( $this->code_sql==68 )//'SELECT ispermanent FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE  instance_id=? ORDER BY ispermanent'
{
	$file_name = $this->getCachFileName('Rooms',$params[0]);
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allRooms = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		$array['id'] = $array[0];
		$array['updated'] = $array[1];
		$array['created'] = $array[2];
		$array['name'] = $array[3];
		$array['password'] = $array[4];
		$array['ispublic'] = $array[5];
		$array['ispermanent'] = $array[6];
		$array['instance_id'] = $params[0];

		$array = $this->unsetAll($array);

		$allRooms[] = $array;

	}
	@fclose($handle);



	if( !function_exists('cmpRoom2') )
	{
		function cmpRoom2($elem1, $elem2)
		{
			if($elem1['ispermanent']<$elem2['ispermanent'] )
				return -1;
			elseif($elem1['ispermanent']==$elem2['ispermanent'])
				return 0;
			elseif($elem1['ispermanent']>$elem2['ispermanent']  || $elem1['ispermanent']=='')
				return 1;
		}
	}

	usort($allRooms, 'cmpRoom2');	//return $allRooms;
	return new ResultSet1( $allRooms );
}
elseif( $this->code_sql==63 )//SELECT count(*) as msgnumb FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms
{
	$file_name = $this->getCachFileName('Rooms');
	$content = file($file_name);
	$total = 0;
	$userArray = array();
	foreach( $content as $key=>$val )
	{
		if( $val=='' )
			continue;



		$total++;
	}

	$userArray[]['msgnumb'] = $total;
	return new ResultSet1( $userArray );

}
elseif( $this->code_sql==64 )//SELECT count(*) as msgnumb FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE ispublic IS NULL
{
	$file_name = $this->getCachFileName('Rooms');
	$content = file($file_name);
	$total = 0;
	$userArray = array();
	foreach( $content as $key=>$val )
	{
		if( $val=='' )
			continue;

		$array = explode("\t",$v);
		if( $array[5]=='' )
			$total++;
	}

	$userArray[]['msgnumb'] = $total;
	return new ResultSet1( $userArray );

}
elseif( $this->code_sql==55 )//$this->queryStr == "SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}rooms"
{
	return new ResultSet1($this->processRoomsAll());
}
elseif($this->code_sql == 58)//strpos($this->queryStr, 'INSERT INTO')!==FALSE
{
	//$content = $this->getContent('Rooms');

	if(($file_name = $this->getCachFileName('Rooms')) != null)
	{
		$file = @fopen($file_name, 'a');
	}
	else
	{
		$file = $this->createFile('rooms', $params[3]);
	}

	if(!$file) return;

	$id = $this->file_insert_id(8);

	if($params[3] != '1')
	{
		$file_name = $this->getCachFileName('Rooms');
		$content = file($file_name);
		$max = array();
		foreach($content as $v)
		{
			if($v == '') continue;

			$array = explode("\t", $v);

			if($array[6] != '')
			{
				$max []= $array[6];
			}
		}
		$params[3] = max($max) + 1;
	}
	else
	{
		$params[3] = null;
	}

	fwrite($file, $id."\t".date('Y-m-d H:i:s')."\t".date('Y-m-d H:i:s')."\t".$params[0]."\t".$params[1]."\t".$params[2]."\t".$params[3]."\t"."\n");
	fflush($file);
	fclose($file);

	$filename = $GLOBALS['fc_config']['cachePath'].'updroom_'.$id.'_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_.txt';
	$file = @fopen($filename, 'w');
	fwrite($file, time());
	fflush($file);
	fclose($file);

	return $id;
}
elseif( $this->code_sql==59 )
{
	$content = $this->getContent('Rooms');
	$total = '';
	$allRooms = array();


	$file_name = $this->getCachFileName('Rooms');
	$content = file( $file_name );


	foreach( $content as $key=>$val )
	{
		if( $val=='' )
			continue;

		$buffer = $val;

		$array = explode("\t",$buffer);

		if( $array[0]==$params[4] )
		{
			$array['updated'] = $array[1];
			$array['created'] = $array[2];

			//$array = $this->unsetAll($array);

			$total .= $params[4]."\t".$array[1]."\t".$array[2]."\t".$params[0]."\t".$params[1]."\t".$params[2]."\t".$params[4]."\t\n";
		}
		else
		{
			$total.=$buffer;
		}

	}

	$handle = @fopen($file_name, 'w');
	fwrite($handle,$total);
	@fclose($handle);
	return true;


}
elseif( $this->code_sql == 79 )//
{

	$first_str = substr($this->queryStr,strpos($this->queryStr,'name='),strpos($this->queryStr,' WHERE')-strpos($this->queryStr,'name='));
	$arr = explode(',',$first_str);

	foreach( $arr as $k=>$v )
	{
		$res = explode('=',$v);

		//$res[1] = str_replace("'",'',$res[1]);
		$res[1] = trim($res[1],'\'');
		$res[1] = trim($res[1]);
		$res[0] = trim($res[0]);

		if( $res[1] == 'null' || $res[1] == 'NULL' )
			$res[1]='';
		switch( $res[0] )
		{
			case 'name': $name = $res[1];
				break;
			case 'password': $password = $res[1];
				break;
			case 'ispublic': $ispublic = $res[1];
				break;
			case 'ispermanent': $ispermanent = $res[1];
				break;
		}
	}

	$id = substr( $this->queryStr,strpos($this->queryStr,'id=') + 3 );
	$password = stripslashes($password);

	$name = stripslashes($name);


	$file_name = $this->getCachFileName('Rooms');
	$allRooms = array();
	$i = 0;
	while( !($arrayRoom = file($file_name)) )
	{
		$i++;
		if( $i>1000  )
			break;
	}

	//$handle = @fopen($file_name, "r");
	$total = '';
	foreach( $arrayRoom as $key=>$val )
	{
		if( $val=='' )
			continue;

		$array = explode("\t", $val);
		if( $array[0]==$id )
		{
			$array['updated'] = $array[1];
			$array['created'] = $array[2];
			$array = $this->unsetAll($array);
			$total .= $id."\t".date('Y-m-d H:i:s')."\t".$array['created']."\t".$name."\t".$password."\t".$ispublic."\t".$ispermanent."\t\n";
		}
		else
			$total .= $val;
	}

	$handle = @fopen($file_name, 'w');
	fwrite($handle,$total);
	@fclose($handle);
	return true;
}
if( $this->code_sql==85 )//UPDATE flashchat_rooms SET ispermanent=? WHERE id=?
{
	$file_name = $this->getCachFileName('Rooms');

	$content = file( $file_name );

	$total = '';
	$allRooms = array();

	foreach( $content as $key=>$val )
	{
		if( $val=='' )
			continue;

		$buffer = $val;

		$array = explode("\t",$buffer);

		if( $array[0]==$params[1] )
		{
			$array['updated'] = $array[1];
			$array['created'] = $array[2];

			$total .= $params[1]."\t".$array[1]."\t".$array[2]."\t".$array[3]."\t".$array[4]."\t".$array[5]."\t".$params[0]."\t1\t\n";
		}
		else
		{
			$total .= $buffer;
		}

	}

	$handle = @fopen($file_name, 'w');
	fwrite($handle,$total);
	@fclose($handle);
	return true;
}
elseif( strpos($this->queryStr, 'UPDATE '.$GLOBALS['fc_config']['db']['pref'].'rooms')!==FALSE)//
{
	$first_str = substr($this->queryStr,strpos($this->queryStr,'name='),strpos($this->queryStr,' WHERE')-strpos($this->queryStr,'name='));
	$arr = explode(',',$first_str);


	foreach( $arr as $k=>$v )
	{
		$res = explode('=',$v);
		$res[1] = str_replace("'",'',$res[1]);
		$res[1] = trim($res[1]);
		$res[0] = trim($res[0]);
		if( $res[1]=='null' || $res[1]=='NULL' )
			$res[1]='';
		switch( $res[0] )
		{
			case 'name': $name = $res[1];
				break;
			case 'password': $password = $res[1];
				break;
			case 'ispublic': $ispublic = $res[1];
				break;
			case 'ispermanent': $ispermanent = $res[1];
				break;
		}
	}
	$id = substr( $this->queryStr,strpos($this->queryStr,'id=') + 3 );
	$file_name = $this->getCachFileName('Rooms');
	$allRooms = array();
	$i = 0;
	while( !($arrayRoom = file($file_name)) )
	{
		//usleep(1000);//for linux
		$i++;
		if( $i>1000  )
			break;
	}

	//$handle = @fopen($file_name, "r");
	$total = '';
	foreach( $arrayRoom as $key=>$val )
	{
		$buffer = $val;
		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);
		if( $array[0]==$id )
		{
			$array['updated'] = $array[1];
			$array['created'] = $array[2];

			//$array = $this->unsetAll($array);

			$total .= $id."\t".$array[1]."\t".$array[2]."\t".$name."\t".$password."\t".$ispublic."\t".$ispermanent."\t\n";
		}
		else
			$total .= $buffer;
	}

	$handle = @fopen($file_name, 'w');
	fwrite($handle,$total);
	@fclose($handle);
	return true;
}
elseif( $this->code_sql==53 )//SELECT * FROM flashchat_rooms WHERE ispublic IS NOT NULL AND ispermanent IS NOT NULL AND instance_id=?  ORDER BY ispermanent
{
	$file_name = $this->getCachFileName('Rooms',$params[0]);
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allRooms = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);
		if( $array[5]!='' && $array[6]!='' )
		{
			$array['id'] = $array[0];
			$array['updated'] = $array[1];
			$array['created'] = $array[2];
			$array['name'] = $array[3];
			$array['password'] = $array[4];
			$array['ispublic'] = $array[5];
			$array['ispermanent'] = $array[6];
			$array['instance_id'] = $params[0];

			$array = $this->unsetAll($array);

			$allRooms[] = $array;
		}

	}
	@fclose($handle);



	if( !function_exists('cmpRoom2') )
	{
		function cmpRoom2($elem1, $elem2)
		{
			if($elem1['ispermanent']<$elem2['ispermanent'] )
				return -1;
			elseif($elem1['ispermanent']==$elem2['ispermanent'])
				return 0;
			elseif($elem1['ispermanent']>$elem2['ispermanent']  || $elem1['ispermanent']=='')
				return 1;
		}
	}

	usort($allRooms, 'cmpRoom2');	//return $allRooms;
	return new ResultSet1( $allRooms );
}
elseif( $this->code_sql==77 || $this->queryStr == 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE ispublic IS NOT NULL AND ispermanent IS NULL ORDER BY created')
{
	return new ResultSet1($this->processRoomsAll());
}
elseif($this->queryStr == 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE ispublic IS NULL AND ispermanent IS NOT NULL ORDER BY created')
{
	$file_name = $this->getCachFileName('Rooms');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allRooms = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);


		if( $array[5]=='' && $array[6]!='' )
		{
			$array['id'] = $array[0];
			$array['updated'] = $array[1];
			$array['created'] = $array[2];
			$array['name'] = $array[3];
			$array['password'] = $array[4];
			$array['ispublic'] = $array[5];
			$array['ispermanent'] = $array[6];

			$array = $this->unsetAll($array);;

			$allRooms[] = $array;
		}

		$allRooms[] = $array;

	}
	@fclose($handle);
	//return $allRooms;
	return new ResultSet1( $allRooms );
}
elseif( $this->code_sql == 54 || $this->queryStr == 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE ispublic IS NOT NULL order by ispermanent')
{
	$file_name = $this->getCachFileName('Rooms');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allRooms = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if( $input=='' )
		{
			if( $array[5]='' && $array[6]=='')
				continue;
		}elseif( $input=='id' )
		{
			if( $array[0]==$params[0])
			{
				$array['id'] = $array[0];
				$array['updated'] = $array[1];
				$array['created'] = $array[2];
				$array['name'] = $array[3];
				$array['password'] = $array[4];
				$array['ispublic'] = $array[5];
				$array['ispermanent'] = $array[6];

				$this->unsetAll($array);
				$allRooms[] = $array;
				break;
			}
			continue;
		}

		$array['id'] = $array[0];
		$array['updated'] = $array[1];
		$array['created'] = $array[2];
		$array['name'] = $array[3];
		$array['password'] = $array[4];
		$array['ispublic'] = $array[5];
		$array['ispermanent'] = $array[6];

		$array = $this->unsetAll($array);

		$allRooms[] = $array;

	}
	@fclose($handle);



	if( !function_exists('cmpRoom2') )
	{
		function cmpRoom2($elem1, $elem2)
		{
			if($elem1['id']<$elem2['id'] )
				return -1;
			elseif($elem1['id']==$elem2['id'])
				return 0;
			elseif($elem1['id']>$elem2['id']  || $elem1['id']=='')
				return 1;
		}
	}

	usort($allRooms, 'cmpRoom2');	//return $allRooms;
	return new ResultSet1( $allRooms );
}
elseif( $this->code_sql == 52 )//SELECT id FROM {$GLOBALS['fc_config']['db']['pref']}rooms WHERE ispermanent IS NULL AND updated < DATE_SUB(NOW(),INTERVAL ? SECOND)
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$allRooms = array();
	$all = array();
	while (false !== ($entry = $cacheDir->read()))
	{
		if( strpos($entry, 'updroom')!==FALSE )
		{
			$fdif = (time() - filemtime($cachePath.$entry));

			if($params[0] < $fdif)
			{
				//unlink($fname);
				$id = explode("_",$entry);
				$allRooms[]['id'] = $id[1];
				$all[] = $id[1];

			}
		}
	}


	return new ResultSet1( $allRooms );
}
elseif( $this->code_sql == 51 )
{
	$file_name = $this->getCachFileName('Rooms');

	$content = file( $file_name );
	for( $i=0 ; $i < sizeof( $content );$i++ )
	{
		$buffer = $content[$i];

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);
		if( $array[0]=='' )
			continue;


		$array['id'] = 	$array[0];
		$array['ispermanent'] = $array[6];
	  $array['password'] = $array[4];
		$array = $this->unsetAll($array);
		$allRooms[] = $array;
	}

	//return $allRooms;
	return new ResultSet1( $allRooms );
}
elseif( $this->code_sql==62 )//$this->queryStr == 'SELECT id FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE password=\'\''
{
	$file_name = $this->getCachFileName('Rooms');
	$handle = @fopen($file_name, 'r');

	$total = '';
	$allRooms = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);

		if( $array[4]=='')
		{
			$array['id'] = $array[0];
			$array = $this->unsetAll($array);
			$allRooms[] = $array;
		}

	}
	@fclose($handle);
	//return $allRooms;
	return new ResultSet1( $allRooms );
}
elseif( $this->code_sql==61 )//$this->queryStr == 'SELECT MAX(id)+1 AS newid FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms'
{
	$file_name = $this->getCachFileName('Rooms');
	$content = file($file_name);
	$total = '';
	$allRooms = array();
	foreach( $content as $key=>$val )
	{
		if( $v=='' )
			continue;

		$array = explode( "\t" , $v );

		if( $array[0]==$params[0] )
		{
			$array['id'] = $array[0];
			$array['updated'] = $array[1];
			$array['created'] = $array[2];
			$array['name'] = $array[3];
			$array['password'] = $array[4];
			$array['ispublic'] = $array[5];
			$array['ispermanent'] = $array[6];

			$array['instance_id'] = $_SESSION['session_inst'];

			$array = $this->unsetAll($array);
			$allRooms[] = $array;
		}
	}

	return new ResultSet1( $allRooms );
}
elseif( $this->code_sql==57 )//$this->queryStr == 'SELECT MAX(id)+1 AS newid FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms'
{
	return new ResultSet1($this->getRoomsIdMax());
}
elseif( $this->code_sql==69)
{

  $id = substr($this->queryStr, strpos($this->queryStr, 'id=') + 3);
  if($id == '?')
  {
    $id = $params[0];
  }

  $cacheDir = $this->getCachDir();
  $cachePath = $cacheDir->path;
  $fname = 'updroom_'.$id.'_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_.txt';

  @unlink($cachePath . $fname);

  $file_name = $this->getCachFileName('Rooms');

  $i = 0;
  while(!($array = file($file_name)))
  {
    $i++;
    if($i > 1000)
    {
      break;
    }
  }

  $total = '';
  $allRooms = array();

  foreach($array as $k => $v)
  {
    $allRooms = explode("\t", $v);
    if($v == '')
    {
      continue;
    }
    if(!($allRooms[0] == $id))
    {
      $total .= $v;
    }
  }
  $total;
  $handle = @fopen($file_name, 'w');
  fwrite($handle, $total);
  fflush($handle);
  fclose($handle);
  //$this->deleteRoomById();
  return true;
}
elseif( $this->code_sql==60 || strpos($this->queryStr,'DELETE')!==false &&  strpos($this->queryStr,'?')!==true  )
{
	$id = substr($this->queryStr, strpos($this->queryStr, 'id=') + 3);
	if($id == '?')
	{
		$id = $params[0];
	}

	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = 'updroom_'.$id.'_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_.txt';

	@unlink($cachePath . $fname);

	$file_name = $this->getCachFileName('Rooms');

	$i = 0;
	while(!($array = file($file_name)))
	{
		$i++;
		if($i > 1000)
		{
			break;
		}
	}

	$total = '';
	$allRooms = array();

	foreach($array as $k => $v)
	{
		$allRooms = explode("\t", $v);
		if($v == '')
		{
			continue;
		}
		if(!($allRooms[0] == $id && $allRooms[6] == null))
		{
			$total .= $v;
		}
	}
  $total;
	$handle = @fopen($file_name, 'w');
	fwrite($handle, $total);
	fflush($handle);
	fclose($handle);
	//$this->deleteRoomById();
	return true;
}

elseif( $this->code_sql==70 )//SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id=? AND password<>?
{
	$file_name = $this->getCachFileName('Rooms');
	$content = file($file_name);
	$total = '';
	$allRooms = array();
	foreach( $content as $key=>$val )
	{
		if( $val=='' )
			continue;

		$array = explode("\t",$val);

		if( $params[0]==$array[0] && $params[1]!=$array[4] )
		{
			$array['id'] 			= $array[0];
			$array['updated'] 		= $array[1];
			$array['created'] 		= $array[2];
			$array['name'] 			= $array[3];
			$array['password'] 		= $array[4];
			$array['ispublic'] 		= $array[5];
			$array['ispermanent'] 	= $array[6];
			$array['instance_id'] 	= $_SESSION['session_inst'];

			$array = $this->unsetAll($array);

			$allRooms[] = $array;
		}
	}
	//return $allRooms;
	return new ResultSet1( $allRooms );
}
elseif( $this->code_sql==80 )
{
	$file_name = $this->getCachFileName('Rooms');
	$content = file($file_name);
	$total = '';
	$allRooms = array();
	foreach( $content as $key=>$val )
	{
		if( $val=='' )
			continue;

		$array = explode("\t",$val);

		if( $params[0]==$array[0] )
		{
			$array['id'] 			= $array[0];
			$array['updated'] 		= $array[1];
			$array['created'] 		= $array[2];
			$array['name'] 			= $array[3];
			$array['password'] 		= $array[4];
			$array['ispublic'] 		= $array[5];
			$array['ispermanent'] 	= $array[6];
			$array['instance_id'] 	= $_SESSION['session_inst'];

			$array = $this->unsetAll($array);

			$allRooms[] = $array;
		}
	}
	//return $allRooms;
	return new ResultSet1( $allRooms );
}
elseif( strtoupper($this->queryStr) == strtoupper('SELECT count(*) as maxnumb FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE ispermanent IS NOT NULL'))
{
	return new ResultSet1($this->processRoomsCount('maxnumb'));
}
elseif( strtoupper($this->queryStr) == strtoupper('SELECT count(*) as rowcount FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id > 0'))
{
	return new ResultSet1($this->processRoomsCount('rowcount'));
}
elseif($this->queryStr == 'SELECT * '.$GLOBALS['fc_config']['db']['pref'].'rooms')
{
	return new ResultSet1($this->processRoomsAll());
}elseif($this->code_sql == 84) //SELECT `password` FROM '.$fc_pref.'rooms WHERE id=?
{
	$file_name = $this->getCachFileName('Rooms');
	$handle = @fopen($file_name, 'r');
	$allRooms = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);


		if( $array[0] == $params[0] )
		{
			$allRooms[]['password'] = $array[4];
		}
	}
	@fclose($handle);
	//return $allRooms;
	return new ResultSet1( $allRooms );
}
?>