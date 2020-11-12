<?php

//$file_name = $this->getCachFileName('Messages');

			$cacheDir = $this->getCachDir();
			$cachePath = $cacheDir->path;

			$total = '';
			$allMsg = array();
			while (false !== ($entry = $cacheDir->read()))
			{
				if(
					strpos($entry, 'messages_stats')!==FALSE ||
					strpos($entry, $GLOBALS['fc_config']['db']['pref'].'rooms')!==FALSE ||
					strpos($entry, $GLOBALS['fc_config']['db']['pref'].'ignors')!==FALSE ||
					strpos($entry, $GLOBALS['fc_config']['db']['pref'].'connections')!==FALSE ||
					strpos($entry, $GLOBALS['fc_config']['db']['pref'].'users')!==FALSE ||
					strpos($entry, $GLOBALS['fc_config']['db']['pref'].'bans')!==FALSE ||
					strpos($entry, '.htaccess')!==FALSE ||
					strpos($entry, 'tables_id')!==FALSE ||
					strpos($entry, 'update')!==FALSE ||
					$entry == '.' ||
					$entry == '..' ||
					$entry=='index.html'
				  )
				continue;


				if( strpos($entry, $GLOBALS['fc_config']['db']['pref'].'messages')!==FALSE  )
				{
					$handle = @fopen($cachePath.$entry, 'r');

					//$total = '';
					//$allMsg = array();
					while (!feof($handle))
					{
    					$buffer = fgets($handle);

						if( $buffer=='' )
							continue;

						$array = explode("\t",$buffer);

						if(	$array[5] == 'adu' || $array[5] == 'rmu' )//|| $array[5] == 'adu' || $array[5] == 'uclc' || $array[5] == 'ustc' || $array[5] == 'ravt'|| $array[5] == 'spht'
						{
							$array['created'] = $array[1];
							$array['command'] = $array[5];
							$array['userid'] = $array[6];
							$array['roomid'] = $array[7];



							$file_name = $this->getCachFileName('Rooms');
							$arrayRoom = file( $file_name );

							$i = 0;
							while( !($arrayRoom = file($file_name)) )
							{
							//	usleep(1000);//for linux
								$i++;
								if( $i>1000  )
									break;
							}

							$toRoomStr = '';
							$fromRoomStr = '';


							foreach( $arrayRoom as $key=>$val )
							{
								$room_elems = explode("\t", $val);

								if( $room_elems[0]==$array['roomid'] )
								{
									$toRoomStr = $room_elems[3];
									break;
								}
							}

							$array['name'] = $toRoomStr;

							/*$file_name = $this->getCachFileName('Users');
							$arrayRoom = file( $file_name );

							$i = 0;
							while( !($arrayRoom = file($file_name)) )
							{
								//usleep(1000);//for linux
								$i++;
								if( $i>1000  )
									break;
							}

							$login = '';
							$roles = '';


							foreach( $arrayRoom as $key=>$val )
							{
								$room_elems = explode("\t", $val);

								if( $room_elems[0]==$array['userid'] )
								{
									$login = $room_elems[1];
									$roles = $room_elems[3];
									break;
								}
							}

							$array['login'] = $login;
							$array['roles'] = $roles;*/

							unset($array[0]);unset($array[1]);unset($array[2]);
							unset($array[3]);unset($array[4]);unset($array[5]);
							unset($array[6]);unset($array[7]);unset($array[8]);
							unset($array[9]);unset($array[10]);unset($array[11]);

							$allMsg[] = $array;
						}
					}
					@fclose($handle);
				}
			}

			$allMsg = $this->sortByIdUser( $allMsg );



			return new ResultSet1( $allMsg )
			//return $allMsg;

?>