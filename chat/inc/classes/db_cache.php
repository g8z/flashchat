<?php
	define('STATEMENT_SELECT', 'select');
	define('STATEMENT_INSERT', 'insert');
	define('STATEMENT_UPDATE', 'update');
	define('STATEMENT_DELETE', 'delete');

	class Statement {
		var $queryArray;
		var $queryStr;
		var $type = STATEMENT_SELECT;
		var $conn = null;

		function Statement( $queryStr, $dosplit=true ) {
			$this->queryArray = $dosplit ? explode('?', $queryStr) : array($queryStr);
			$this->type = strtolower(substr($queryStr, 0, 6));
			$this->queryStr = $queryStr;
			/*
				Check to see if $queryStr is cached. If not
				cached, then create DB connection.
			*/
		}

		//Return max ID value from table
		function getRecordsCount($table_name)
		{
			$selResource = mysql_query('SELECT MAX(id) FROM '.$table_name, $this->conn);
			$selResult = mysql_fetch_array($selResource);
			$maxId = (int)$selResult[0];
			return $maxId;
		}

		//If admin logged, this function return :"./../".$GLOBALS['fc_config']['cachePath'];
		//If user, this function return :$GLOBALS['fc_config']['cachePath'];
		function getCachDir()
		{
			$dir = @dir($GLOBALS['fc_config']['cachePath']);
			if(strpos($dir->handle, 'Resource')!==FALSE)
				return $dir;
			else
				return dir('./../'.$GLOBALS['fc_config']['cachePath']);
		}

		//input: Rooms, Stats, Ignors
		//output: path to cach file
		function getCachFileName($input)
		{
			if( $input == '' ) return null;
			$cacheDir = $this->getCachDir();
			$cachePath = $cacheDir->path;

			$fileName = '';

			//while (false !== ($entry = $cacheDir->read()))
			//{
				switch($input)
				{
					case 'Stats':
						$fileName = $cachePath.$GLOBALS['fc_config']['db']['pref'].'messages_stats_'.$GLOBALS['fc_config']['cacheFilePrefix'].'.txt';
						break;
					case 'Rooms':
						$fileName = $cachePath.$GLOBALS['fc_config']['db']['pref'].'rooms_'.$GLOBALS['fc_config']['cacheFilePrefix'].'.txt';
						break;
					case 'Connections':
						$fileName = $cachePath.$GLOBALS['fc_config']['db']['pref'].'connections_'.$GLOBALS['fc_config']['cacheFilePrefix'].'.txt';
						break;
				}
				if( file_exists($fileName) )
				{
					return $fileName;
				}
				else
				{
					return null;
				}
		}
		//columns: id or *
		//condition: string AFTER WHERE
		// queryParams: params that passed into this->process(...)
		function roomsIsCached($columns, $condition, $queryParams )
		{
			$result = array();
			$roomsFileName = $this->getCachFileName('Rooms');
			if($roomsFileName!=null)
			{
				$rooms = file($roomsFileName);
				for($i=0;$i<count($rooms);$i++)
				{
					$roomsElems = explode("\t", $rooms[$i]);

					if($condition=='id=?')
					{
						if((int) $roomsElems[0] == (int) $queryParams[0])
						{
							if($columns=='*')
							{
								$result_elem = array('id'=>$roomsElems[0], 'updated'=>$roomsElems[1], 'created'=>$roomsElems[2], 'name'=>$roomsElems[3],'password'=>$roomsElems[4], 'ispublic'=>$roomsElems[5], 'ispermanent'=>$roomsElems[6]);
								$result[count($result)] = $result_elem;
							}
							elseif($columns=='id')
							{
								$result_elem = array('id'=>$roomsElems[0]);
								$result[count($result)] = $result_elem;
							}
						}
					}
					elseif($condition=='ispermanent IS NULL AND updated < DATE_SUB(NOW(),INTERVAL ? SECOND)')
					{
						$dateToSub = strtotime($roomsElems[1]);//some bug ???
						$today = getdate();
						$subDate = $today[0]-(int)$queryParams[0];

						if( strpos((string)$roomsElems[6], 'NULL')!==FALSE && $dateToSub<$subDate)
						{
							if($columns=='*')
							{
								$result_elem = array('id'=>$roomsElems[0], 'updated'=>$roomsElems[1], 'created'=>$roomsElems[2], 'name'=>$roomsElems[3], 'password'=>$roomsElems[4], 'ispublic'=>$roomsElems[5], 'ispermanent'=>$roomsElems[6]);
								$result[count($result)] = $result_elem;
							}
							elseif($columns=='id')
							{
								$result_elem = array('id'=>$roomsElems[0]);
								$result[count($result)] = $result_elem;
							}

						}
					}
				}

				return $result;
			}
			else
			{
				//IF rooms file not found,
				//RESTORING ROOMS in cache
				$this->saveRoomsInCache();
				return false;
			}
		}

		//checking if last messages is cached
		//input: params that passed in this->process(...)
		function messageIsCached( $queryParams )
		{
			//creating params array("param name"=>"param value", ...);
			$params = array('toconnid'=>$queryParams[0], 'touserid'=>$queryParams[1],
			        		'toroomid'=>$queryParams[2], 'id'=>$queryParams[3]);
			$stat_arr = array();
			$stats_file_name = $this->getCachFileName('Stats');
			/*
			if($stats_file_name == null)
			{
				$stat_value = $this->getRecordsCount("{$GLOBALS['fc_config']['db']['pref']}messages");
				//RESTORING message_stats file
				$this->saveStatsInCache("MESSAGES_COUNT", $stat_value);
				return false;
			}*/

			$stats_file = @fopen($stats_file_name, 'r');

			if( !$stats_file)
			{
			    $stat_value = $this->getRecordsCount($GLOBALS['fc_config']['db']['pref'].'messages');
				//RESTORING message_stats file
				$this->saveStatsInCache('MESSAGES_COUNT', $stat_value);
				return false;
			}

			while (!feof($stats_file))
			{
			    $stat = fgets($stats_file);
			    $stat_elems = explode('=', $stat);
				if($stat_elems[0] == 'MESSAGES_COUNT')
				{
					$stat_arr['MESSAGES_COUNT'] = $stat_elems[1];
				}
			}
			@fclose($stats_file);
			$params['id'] = (int) $params['id'];
			$stat_arr['MESSAGES_COUNT'] = (int) $stat_arr['MESSAGES_COUNT'];

			//checking all cached files if they have messages with id's: $params["id"] .. $stat_arr["COUNT"]
			// if only one ID not found in cach files(if database have spec. command with this id),
			// this function return's false and we select all messages from database.

			$cacheDir = $this->getCachDir();
			$cachePath = $cacheDir->path;
			$id_start = $params['id'];
			$id_end = $stat_arr['MESSAGES_COUNT'];
			$find_records = 0;
			$result = array();
			if((int) $id_start > (int) $id_end)
			{
				return $result;
			}

			while (false !== ($entry = $cacheDir->read()))
			{
				if(strpos($entry, 'messages_stats_')!==FALSE ||
				   strpos($entry, $GLOBALS['fc_config']['db']['pref'].'rooms_')!==FALSE ||
				   strpos($entry, '.')!==FALSE ||
				   strpos($entry, '..')!==FALSE ||
				   strpos($entry, 'configmain')!==FALSE ||
				   strpos($entry, 'configinst')!==FALSE ||
				   strpos($entry, 'bans')!==FALSE ||
				   strpos($entry, 'ignors')!==FALSE ||
				   strpos($entry, 'users')!==FALSE ||
				   strpos($entry, 'tables_id')!==FALSE ||
			       strpos($entry, $GLOBALS['fc_config']['db']['pref'].'connections_')!==FALSE)
				   continue;



				$entry_elems = explode('_', $entry);

				if($entry_elems[0] == 'pm')
				{
					$is_private = true;
					$userid = (int) $entry_elems[1];
					$touserid = (int) $entry_elems[2];
				}
				else
				{
					$is_private = false;
					$userid = $entry_elems[1];
					$toroomid = $entry_elems[0];
				}




				$cach_file = @file($cachePath.$entry, 'r');


				foreach($cach_file as $line_num => $line)
				{
					$line_elems = explode('#', $line);
					$id = (int) $line_elems[0];
					$created = $line_elems[1];
					$roomid = (int) $line_elems[2];

					if($id_start<=$id && $id<=$id_end)
					{
						$find_records++;
						if($is_private)
						{
							if($touserid != $params['touserid'])
								continue;
						}
						else
						{
							if($toroomid != $params['toroomid'])
								continue;
						}
						array_shift($line_elems);
						array_shift($line_elems);
						array_shift($line_elems);

						$line_elems[count($line_elems)-1] = substr($line_elems[count($line_elems)-1], 0, strlen($line_elems[count($line_elems)-1])-1);

						if($is_private)
							$result_elem = array('id'=>$id, 'created'=>$created, 'touserid'=>$touserid, 'command'=>'msg','userid'=>$userid, 'roomid'=>$roomid, 'txt'=>implode('#', $line_elems));
						else
							$result_elem = array('id'=>$id, 'created'=>$created, 'toroomid'=>$toroomid, 'command'=>'msg','userid'=>$userid, 'roomid'=>$roomid, 'txt'=>implode('#', $line_elems));
						$result[count($result)] = $result_elem;
					}
				}
			}

			//See explain at the top
			if( $stat_arr['COUNT']-$params['id']+1 == $find_records )
			{

				if( !function_exists('cmp') )
				{
					function cmp($elem1, $elem2)
					{
						if($elem1['id']<$elem2['id'])
							return -1;
						elseif($elem1['id']==$elem2['id'])
							return 0;
						elseif($elem1['id']>$elem2['id'])
							return 1;
					}
				}
				usort($result, 'cmp');

				return $result;
			}
			else
				return false;
		}

		//check if connections is cached
		function connectionsIsCached($columns, $condition, $queryParams)
		{
			$result = array();
			$connectionsFileName = $this->getCachFileName('Connections');
			if($connectionsFileName!=null)
			{
				$connections = file($connectionsFileName);
				for($i=0;$i<count($connections);$i++)
				{
					$connectionsElems = explode("\t", $connections[$i]);
					if($condition=='userid IS NOT NULL AND updated < DATE_SUB(NOW(),INTERVAL ? SECOND) AND ip <> ?')
					{
						$dateToSub = strtotime($connectionsElems[1]);//???
						$today = getdate();
						$subDate = $today[0]-(int)$queryParams[0];

						if($connectionsElems[3]!='NULL' && $dateToSub<$subDate && $connectionsElems[9]!=$queryParams[1])
						{
							if($columns=='ip')
							{
								$result_elem = array('id'=>$connectionsElems[0]);
								$result[count($result)] = $result_elem;
							}
							if($columns=='id')
							{
								$result_elem = array('id'=>$connectionsElems[0]);
								$result[count($result)] = $result_elem;
							}
						}
					}
				}
				return $result;
			}
			else
			{
				//RESTORING connections
				$params = array();
				$this->saveConnectionsInCache($params);
				return false;
			}
		}

		//queryParams: params, passed to this->process function
		function saveMessagesInCache($queryParams)
		{
			$cacheDir = $this->getCachDir();
			$cachePath = $cacheDir->path;
			if($this->queryStr=='DELETE FROM  '.$GLOBALS['fc_config']['db']['pref'].'messages WHERE created < DATE_SUB(NOW(),INTERVAL ? SECOND)')
			{
				$intervalSecond = (int)$queryParams[0];
				$deletedFiles = array();
				while (false !== ($entry = $cacheDir->read()))
				{
					if(
						strpos($entry, 'messages_stats')!==FALSE ||
						strpos($entry, $GLOBALS['fc_config']['db']['pref'].'rooms')!==FALSE ||
						strpos($entry, $GLOBALS['fc_config']['db']['pref'].'ignors')!==FALSE ||
						strpos($entry, $GLOBALS['fc_config']['db']['pref'].'connections')!==FALSE ||
						strpos($entry, '.htaccess')!==FALSE ||
						strpos($entry, 'index.htm')!==FALSE
					  )
						continue;
					//reading cache file
					$today = getdate(); //???
					$subDate = $today[0]-(int)$queryParams[0];

					$deletedRecords = array();
					$cachFile = file($cachePath.$entry);
					if(count($cachFile) == 0)
					{
						$deletedFiles[count($deletedFiles)] = $cachePath.$entry;
						continue;
					}
					//foreach ($cachFile as $line_num => $line)
					for($i=0; $i<count($cachFile); $i++)
					{
						$cachFileRecord = explode('#', $cachFile[$i]);
						$created = strtotime($cachFileRecord[1]);

						if($created < $subDate)
						{
							$deletedRecords[count($deletedRecords)] = $i;
						}
					}
					//deleting lines
					if(count($deletedRecords)>0)
						for($i=0; $i<count($deletedRecords); $i++)
						{
							unset($cachFile[$deletedRecords[$i]]);
						}
					if(count($cachFile) == 0)
					{
						$deletedFiles[count($deletedFiles)] = $cachePath.$entry;
						continue;
					}
					//write back
					$cachFileWrite = fopen($cachePath.$entry, 'w');
					for($i=0; $i<count($cachFile); $i++)
						fwrite($cachFileWrite, $cachFile[$i]);
					fclose($cachFileWrite);
				}
				if(count($deletedFiles)>0)
					for($i=0; $i<count($deletedFiles); $i++)
						unlink($deletedFiles[$i]);
			}
			else//if we INSERT new messages
			{
				$isPrivate = ($queryParams[2]!='');

				$id = mysql_insert_id($this->conn);
				$params = array('id'=>$id, 'touserid'=>$queryParams[2], 'toroomid'=>$queryParams[3], 'userid'=>$queryParams[5], 'roomid'=>$queryParams[6], 'txt'=>$queryParams[7]);

				if( $params['roomid']=='' )
					return;

				$today = date('Y-m-d G:i');
				$appended = false;

				while (false !== ($entry = $cacheDir->read()))
				{
				    //echo $entry."<br>\n";
					if((!$isPrivate)?(substr($entry, 0, strrpos($entry, '_')) == $params['toroomid'].'_'.$params['userid']):
                	          		 (substr($entry, 0, strrpos($entry, '_')) == 'pm_'.$params['userid'].'_'.$params['touserid']))
					{
						$file = @fopen($cachePath.$entry, 'a');
						@fwrite($file, $params['id'].'#'.$today.'#'.$params['roomid'].'#'.$params['txt']."\n");
						@fclose($file);
						$appended = true;
						break;
					}
				}
				if(!$appended)
				{
					$to_add = $GLOBALS['fc_config']['cacheFilePrefix'];

					if(!$isPrivate)
						$file = @fopen($cachePath.$params['toroomid'].'_'.$params['userid'].'_'.$to_add.'_1.txt', 'w');
					else
					{
						$file = @fopen($cachePath.'pm_'.$params['userid'].'_'.$params['touserid'].'_'.$to_add.'_1.txt', 'w');
					}

					@fwrite($file, $params['id'].'#'.$today.'#'.$params['roomid'].'#'.$params['txt']."\n");
					@fclose($file);
				}
				$cacheDir->close();
			}
		}
		function saveRoomUpdate()
		{
			$rooms_file_name = $this->getCachFileName('Rooms');
			$connections_file_name = $this->getCachFileName('Connections');

			$rooms_file = file($rooms_file_name);
			$connections_file = file($connections_file_name);
			$records_to_update = array();
			if($rooms_file!=FALSE && $connections_file!=FALSE)
			{
				for($i=0;$i<count($rooms_file);$i++)
				{
					$rooms_elem = explode("\t", $rooms_file[$i]);
					for($j=0;$j<count($connections_file);$j++)
					{
						$connections_elem = explode("\t", $connections_file[$j]);
						if($rooms_elem[0] == $connections_elem[4])
						{
							array_push($records_to_update, $i);
							break;
						}
					}
				}

				for($i=0; $i<count($records_to_update); $i++)
				{
					$rooms_elem = explode("\t", $rooms_file[$records_to_update[$i]]);
					$rooms_elem[1] = date('Y-m-d H:i:s');//some bug ???

					$rooms_file[$records_to_update[$i]] = implode("\t", $rooms_elem);
				}
				$file = fopen($rooms_file_name, 'w');
				for($i=0;$i<count($rooms_file);$i++)
				{
					fwrite($file, $rooms_file[$i]);
				}
				fclose($file);
			}
		}
		function saveRoomsInCache()
		{
			if($this->queryStr == 'UPDATE  '.$GLOBALS['fc_config']['db']['pref'].'rooms, '.$GLOBALS['fc_config']['db']['pref'].'connections SET  '.$GLOBALS['fc_config']['db']['pref'].'rooms.updated=NOW() WHERE  '.$GLOBALS['fc_config']['db']['pref'].'rooms.id =  '.$GLOBALS['fc_config']['db']['pref'].'connections.roomid')
			{

			}
			else
			{
				//RESTORING flashchat_rooms_ .. txt file
				if(($file_name = $this->getCachFileName('Rooms')) != null)
					$file = @fopen($file_name, 'w');
				else
				{
					$today = getdate();//???
					$cacheDir = $this->getCachDir();
					$cachePath = $cacheDir->path;
					$file = @fopen($cachePath.$GLOBALS['fc_config']['db']['pref'].'rooms_'.$GLOBALS['fc_config']['cacheFilePrefix'].'.txt', 'w');
				}
				if(!$file) return;
				if($result = mysql_query('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms', $this->conn))//$connection) )
					while($row = mysql_fetch_array($result))
						fwrite($file, $row['id']."\t".$row['updated']."\t".$row['created']."\t".$row['name']."\t".$row['password']."\t".$row['ispublic']."\t".($row['ispermanent']==NULL?'NULL':$row['ispermanent'])."\n");
				fclose($file);
			}
		}
		//update row connections
		function updateConn( $whot='*',$queryParams )//update file connection
		{
			$file_name = $this->getCachFileName('Connections');
			$handle = fopen($file_name, 'r');
			$params = $queryParams;
			$total = '';


			while (!feof($handle))
			{
    			$buffer = fgets($handle);

				if( trim($buffer)=='' )
					continue;

				$array = explode("\t",$buffer);
				$today = date('Y-m-d H:i:s');//

				if( $whot=='*' )
				{
					if( strpos($buffer,$params[8])!==false )
					{
						$total = $total.$params[8]."\t".$today."\t".$array[2]."\t".$params[0]."\t".$params[1]."\t".$params[2]."\t".$params[3]."\t".$params[4]."\t".$params[5]."\t".$params[6]."\t".$params[7]."\t1\t1\n";
					}
					else
						$total = $total.$buffer;
				}
			}

			@fclose($handle);
			if( $total!='')
			{
				$file = @fopen($file_name,'w');
				@fwrite($file , $total);
				@fclose($file);
			}
			return $params[8];

		}
		//queryParams: params, passed to this->process function
		function saveConnectionsInCache($queryParams)
		{
			$file_name = $this->getCachFileName('Connections');
			if(($file_name = $this->getCachFileName('Connections')) != null)
				$file = @file($file_name);
			else
			{
				$today = getdate();//???
				$file = array();
				$cacheDir = $this->getCachDir();
				$cachePath = $cacheDir->path;
				$file_name = $cachePath.$GLOBALS['fc_config']['db']['pref'].'connections_'.$GLOBALS['fc_config']['cacheFilePrefix'].'.txt';
			}

			$fileRecordsCount = count($file);


			if($fileRecordsCount == 0 || strpos($this->queryStr, 'INSERT')!==FALSE )
			{
				//restoring connections
				$writeFile = @fopen($file_name, 'w');
				if($result = mysql_query('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections', $this->conn))//$connection) )
					while($row = mysql_fetch_array($result))
						@fwrite($writeFile, $row['id']."\t".$row['updated']."\t".$row['created']."\t".($row['userid']==NULL?'NULL':$row['userid'])."\t".$row['roomid']."\t".$row['state']."\t".$row['color']."\t".$row['start']."\t".$row['lang']."\t".$row['ip']."\t".$row['tzoffset']."\t".$row['chatid']."\t".$row['instance_id']."\n");
				fclose($writeFile);
				$this->saveRoomsInCache();
				return;
			}
			elseif($this->queryStr=='UPDATE '.$GLOBALS['fc_config']['db']['pref'].'connections SET updated=NOW() WHERE id=?')
			{
				for($i=0; $i<$fileRecordsCount; $i++)
				{
					$fileRecord = explode("\t", $file[$i]);

					if($fileRecord[0]==$queryParams[0])
					{
						$today = date('Y-m-d G:i:s');
						$fileRecord[1] = $today;
						$file[$i] = implode("\t", $fileRecord);
						break;
					}
				}
			}
			elseif(strpos($this->queryStr, 'DELETE')!==FALSE)
			{
				$fileRecordsCount = count($file);

				$deletedElements = array();
				for($i=0; $i<$fileRecordsCount; $i++)
				{
					$fileRecord = explode("\t", $file[$i]);
					if($this->queryStr=='DELETE FROM  '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE id = ?')
					{
						if($fileRecord[0] == $queryParams[0])
						{
							unset($file[$i]);
							break;
						}
					}
					elseif($this->queryStr=='DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE updated < DATE_SUB(NOW(),INTERVAL ? SECOND)')
					{
						$dateToSub = strtotime($fileRecord[1]);
						$today = getdate();//???
						$subDate = $today[0]-(int)$queryParams[0];
						if($dateToSub<$subDate)
							array_push($deletedElements, $i);
					}
				}
				for($i=0; $i<count($deletedElements); $i++)
				{
					unset($file[$deletedElements[$i]]);
				}
			}

			$writeFile = @fopen($file_name, 'w');
			for($i=0; $i<count($file); $i++)
			{
				@fwrite($writeFile, $file[$i]);
			}
			@fclose($writeFile);
		}

		function saveStatsInCache($stat_name, $stat_value)
		{
			$fileName = $this->getCachFileName('Stats');

			if($fileName!=null)
			{
				$file = @fopen($fileName, 'r');
				$file_created = false;
			}
			else
			{
				$today = getdate();
				$cacheDir = $this->getCachDir();
				$cachePath = $cacheDir->path;
				$fileName = $cachePath.$GLOBALS['fc_config']['db']['pref'].'messages_stats_'.$GLOBALS['fc_config']['cacheFilePrefix'].'.txt';
				$file = @fopen($fileName, 'w');
				$file_created = true;
			}
			if(!$file) return;
			//$lines = file($fileName);
			$replaced = false;
			$newLines = array();
			if(!$file_created)
			while(!feof($file))
			{
				$line = fgets($file);
				if($line=='')
					continue;

				$lineElems = explode('=', $line);
				if($lineElems[0] == $stat_name)
				{
					array_push($newLines, $lineElems[0].'='.$stat_value."\n");
					$replaced = true;
				}
				else
					array_push($newLines, $lineElems[0].'='.$lineElems[1]);
			}
			fclose($file);
			if(!$replaced)
				array_push($newLines, $stat_name.'='.$stat_value."\n");

			$file = @fopen($fileName, 'w');
			if($file)
			{
				for($i=0; $i<count($newLines); $i++)
					@fwrite($file, $newLines[$i]);
				@fclose($file);
			}
		}

		function readFromDB( $queryParams )
		{
			$params = $queryParams;
			$fc_conf = $GLOBALS['fc_config'];
			if( !isset($fc_conf['db_conn']) )
			{
				$fc_conf['db_conn'] = mysql_connect($fc_conf['db']['host'], $fc_conf['db']['user'], $fc_conf['db']['pass']);
			}
			$this->conn = $fc_conf['db_conn'];
			if( $this->conn )
			{
				if(mysql_select_db($fc_conf['db']['base'], $this->conn)) {
					$queryStr = '';
					for($i = 0; $i < sizeof($this->queryArray) - 1; $i++)
					{
						$val = '';
						switch(gettype($params[$i]))
						{
							case 'object': $val = "'" . mysql_escape_string($params[$i]->toString()) . "'"; break;
							case 'array': $val = "'" . mysql_escape_string(join(',', $params[$i])) . "'"; break;
							case 'boolean': $val = ($params[$i])?-1:0; break;
							case 'NULL': $val = 'NULL'; break;
							default:
								if($params[$i][0] == "'" && $params[$i][strlen($params[$i]) - 1] == "'")
								{
									$params[$i] = substr($params[$i], 1, -1);
								}
								$val = "'" . mysql_escape_string($params[$i]) . "'";
							break;
						}

						$queryStr .= $this->queryArray[$i].$val;
					}
					$queryStr .= $this->queryArray[$i];
//echo $queryStr . '<br/>';

					if($result = mysql_query($queryStr, $this->conn))
					{
						switch($this->type)
						{
							case STATEMENT_SELECT: return new ResultSet($result);
							case STATEMENT_INSERT:
							    $insert_id = mysql_insert_id($this->conn);
								if(strpos($queryStr, 'INSERT INTO '.$fc_conf['db']['pref'].'messages')!==FALSE)
								{
								   if(strcmp($params[4], 'msg') == 0)// && "{$queryParams[3]}"!="")
								   {
								   		$this->saveMessagesInCache($queryParams);
								   }
								   $stat_value = $insert_id;//$this->getRecordsCount("{$GLOBALS['fc_config']['db']['pref']}messages");
								   $this->saveStatsInCache('MESSAGES_COUNT', $stat_value);
								}
								elseif(strpos($queryStr, $fc_conf['db']['pref'].'rooms')!==FALSE)
								{
									$this->saveRoomsInCache();
								}
								elseif(strpos($queryStr, $fc_conf['db']['pref'].'connections')!==FALSE)
								{
									$this->saveConnectionsInCache($queryParams);
								}

								return $insert_id;
							case STATEMENT_UPDATE:
								$affected_rows = mysql_affected_rows($this->conn);
								if($this->queryStr=='UPDATE '.$fc_conf['db']['pref'].'connections SET updated=NOW(), userid=?, roomid=?, color=?, state=?, start=?, lang=?, ip=?, tzoffset=? WHERE id=?')
								{
									$this->updateConn('*',$queryParams);
								}
								elseif(strpos($this->queryStr, $fc_conf['db']['pref'].'connections')!==FALSE)
								{
									if(strpos($this->queryStr, 'UPDATE '.$fc_conf['db']['pref'].'rooms,'.$GLOBALS['fc_config']['db']['pref'].'connections SET')!==FALSE)
									{
										$this->saveRoomUpdate();
									}
									else
										$this->saveConnectionsInCache($queryParams);
								}
								elseif(strpos($this->queryStr, $fc_conf['db']['pref'].'rooms')!==FALSE)
								{
									$this->saveRoomsInCache();
								}

								return $affected_rows;
							case STATEMENT_DELETE:
								$affected_rows = mysql_affected_rows($this->conn);

								if(strpos($this->queryStr, $fc_conf['db']['pref'].'messages')!==FALSE)
								{
									$this->saveMessagesInCache($queryParams);
								}
								elseif(strpos($this->queryStr, $fc_conf['db']['pref'].'connections')!==FALSE)
								{
									$this->saveConnectionsInCache($queryParams);
								}
								elseif(strpos($this->queryStr, $fc_conf['db']['pref'].'rooms')!==FALSE)
								{
									$this->saveRoomsInCache();
								}
								return $affected_rows;
							default:
								$affected_rows = mysql_affected_rows($this->conn);
								//return true;
								return $affected_rows;
						}
					}
				}
			}
			return true;
		}

		function process(/*...*/)
		{
			if(func_num_args() > 0)
			{
				$params = func_get_args();
			} else
			{
				$params = array();
			}

			$GLOBALS['query_count']++;
			if(strpos($this->queryStr, 'SELECT')!==FALSE)
			{
				$GLOBALS['select_count']++;
			}
			else
			{
			}

			//if we select messages
			if(strpos($this->queryStr, 'SELECT '.$GLOBALS['fc_config']['db']['pref'].'messages.*')!==FALSE)
			{
				if( strpos( $this->queryStr,'msg')!==false )
				{
					if( ($rows=$this->messageIsCached($params)) !== false)
					{
						return new CachedResultSet($rows);
					}
					else
					{
						return $this->readFromDB($params);
					}
				}
				else
					return $this->readFromDB($params);
			}
			elseif($this->queryStr == 'SELECT * '.$GLOBALS['fc_config']['db']['pref'].'rooms')
			{
				if( ($rows=$this->roomsIsCached('*', '', $params)) !== false)
				{
					return new CachedResultSet($rows);
				}
				else
				{
					return $this->readFromDB($params);
				}
			}
			elseif($this->queryStr == 'SELECT id FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE ispermanent IS NULL AND updated < DATE_SUB(NOW(),INTERVAL ? SECOND)')
			{
				if( ($rows=$this->roomsIsCached('id', 'ispermanent IS NULL AND updated < DATE_SUB(NOW(),INTERVAL ? SECOND)', $params)) !== false)
				{
					return new CachedResultSet($rows);
				}
				else
				{
					return $this->readFromDB($params);
				}
			}
			elseif($this->queryStr == 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id=?')
			{
				if( ($rows=$this->roomsIsCached('*', 'id=?', $params)) !== false)
				{
					return new CachedResultSet($rows);
				}
				else
				{
					return $this->readFromDB($params);
				}
			}
			elseif($this->queryStr == 'SELECT id FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid IS NOT NULL AND updated < DATE_SUB(NOW(),INTERVAL ? SECOND) AND ip <> ?')
			{
				if( ($rows=$this->connectionsIsCached('id', 'userid IS NOT NULL AND updated < DATE_SUB(NOW(),INTERVAL ? SECOND) AND ip <> ?', $params)) !== false)
				{
					return new CachedResultSet($rows);
				}
				else
				{
					return $this->readFromDB($params);
				}
			}
			else
			{
				return $this->readFromDB($params);
			}

			/*
				If "insert", then connect insert new data into
				database, and save result in cache.

				If "select", then check to see if cached data
				is present. If yes, get cached data. If not,
				then get data from database.
			*/
		}
	}

	class CachedResultSet
	{
		var $result;
		var $numRows = 0;
		var $currRow = 0;

		function CachedResultSet( $result = null )
		{
			$GLOBALS['cached_select_count']++;
			$this->result = $result;

			if ( $result )
			{
				// determine $this->numRows from cached result
				$this->numRows = count($result);
			}
		}

		function hasNext()
		{
			return ($this->result && $this->numRows > $this->currRow);
		}

		function next()
		{
			if($this->hasNext())
			{
				$this->currRow++;
				// return cached result?
				return $this->result[$this->currRow-1];
			} else {
				return null;
			}
		}
	}

	class ResultSet {
		var $result;
		var $numRows = 0;
		var $currRow = 0;

		function ResultSet($result = null)
		{
			$this->result = $result;
			if($result) $this->numRows = mysql_num_rows($result);
		}

		function hasNext()
		{
			return ($this->result && $this->numRows > $this->currRow);
		}

		function next()
		{
			if($this->hasNext())
			{
				$this->currRow++;
				return mysql_fetch_assoc($this->result);
			}
			else
			{
				return null;
			}
		}
	}
?>