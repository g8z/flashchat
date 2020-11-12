<?php
//156
$this->result = array();
if( $this->code_sql==164 )//SELECT id FROM {$GLOBALS['fc_config']['db']['pref']}messages WHERE command='msg' AND toroomid=? ORDER BY id DESC LIMIT
{

	$params = array( 'toroomid'=>$params[0] );
	$stat_arr = array();
	$stats_file_name = $this->getCachFileName('Stats');
	$strDesc = 'DESC LIMIT ';

	$first = substr($this->queryStr,strpos($this->queryStr,$strDesc) + strlen($strDesc),-1);
	$first = (int) substr($first,0,-1);
	$first++;

	$stats_file = @fopen($stats_file_name, 'r');

	if( !$stats_file)
	{
	    $stat_value = $this->getRecordsCount($GLOBALS['fc_config']['db']['pref'].'messages');
		//RESTORING message_stats file
		$this->saveStatsInCache('MESSAGES_COUNT', $stat_value);
		return false;
	}
	//stream_set_timeout($stats_file, 180);
	while ($stat = fgets($stats_file))
	{
	    //$stat = fgets($stats_file);
	    $stat_elems = explode('=', $stat);
		if($stat_elems[0] == 'MESSAGES_COUNT')
		{
			$stat_arr['MESSAGES_COUNT'] = $stat_elems[1];
		}
	}
	@fclose($stats_file);

	$stat_arr['MESSAGES_COUNT'] = (int) $stat_arr['MESSAGES_COUNT'];

	//checking all cached files if they have messages with id's: $params["id"] .. $stat_arr["COUNT"]
	// if only one ID not found in cach files(if database have spec. command with this id),
	// this function return's false and we select all messages from files.
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;

	$id_end = $stat_arr['MESSAGES_COUNT'];
	$id = array();
	$result = null;

	while (false !== ($entry = $cacheDir->read()))
	{
		if( $this->breakFile($entry) || strpos($entry, $GLOBALS['fc_config']['db']['pref'].'messages_')!==FALSE )
			continue;

			$entry_elems = explode('_', $entry);

			if( $entry_elems[0]!=$params['toroomid'] || $entry_elems[0] == 'pm')
				continue;

			$userid = $entry_elems[1];
			$toroomid = $entry_elems[0];

		$count=0;
		$handle = @fopen($cachePath.$entry, 'r');
		$tempArray = array();


		fseek($handle,$entry_elems[3]);
		//stream_set_timeout($handle, 180);
		while ($line = fgets($handle))
		{
			//$line = fgets($handle);
			$line_elems = explode('#', $line);
			$bit_pos = $line_elems[count($line_elems)-1];
			fseek($handle,$bit_pos);
			$line = fgets($handle);
			$line_elems = explode('#', $line);
			/*if( $count > $first )
				break;*/

			if( $count > 50 )
				break;
			fseek($handle,$bit_pos-20);

			$id[] = $line_elems[0];
			$count++;
			if( $line_elems[4]==0 )
				break;

		}

		fclose($handle);
	}

	sort($id);
	$tempAr = array();
	$tempAr[0]['numb'] = count($id);

//return $tempAr;
	return new ResultSet1( $tempAr );
}
if( $this->code_sql==155 )//SELECT id FROM {$GLOBALS['fc_config']['db']['pref']}messages WHERE command='msg' AND toroomid=? ORDER BY id DESC LIMIT
{

	$params = array( 'toroomid'=>$params[0] );
	$stat_arr = array();
	$stats_file_name = $this->getCachFileName('Stats');
	$strDesc = 'DESC LIMIT ';

	$first = substr($this->queryStr,strpos($this->queryStr,$strDesc) + strlen($strDesc),-1);
	$first = (int) substr($first,0,-1);
	$first++;

	$stats_file = @fopen($stats_file_name, 'r');

	if( !$stats_file)
	{
	    $stat_value = $this->getRecordsCount($GLOBALS['fc_config']['db']['pref'].'messages');
		//RESTORING message_stats file
		$this->saveStatsInCache('MESSAGES_COUNT', $stat_value);
		return false;
	}
	//stream_set_timeout($stats_file, 180);
	while ($stat = fgets($stats_file))
	{
	    //$stat = fgets($stats_file);
	    $stat_elems = explode('=', $stat);
		if($stat_elems[0] == 'MESSAGES_COUNT')
		{
			$stat_arr['MESSAGES_COUNT'] = $stat_elems[1];
		}
	}
	@fclose($stats_file);

	$stat_arr['MESSAGES_COUNT'] = (int) $stat_arr['MESSAGES_COUNT'];

	//checking all cached files if they have messages with id's: $params["id"] .. $stat_arr["COUNT"]
	// if only one ID not found in cach files(if database have spec. command with this id),
	// this function return's false and we select all messages from files.
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;

	$id_end = $stat_arr['MESSAGES_COUNT'];
	$id = array();
	$result = null;

	while (false !== ($entry = $cacheDir->read()))
	{
		if( $this->breakFile($entry) || strpos($entry, $GLOBALS['fc_config']['db']['pref'].'messages_')!==FALSE )
			continue;

			$entry_elems = explode('_', $entry);

			if( $entry_elems[0]!=$params['toroomid'] || $entry_elems[0] == 'pm')
				continue;

			$userid = $entry_elems[1];
			$toroomid = $entry_elems[0];

		$count=0;
		$handle = @fopen($cachePath.$entry, 'r');
		$tempArray = array();


		fseek($handle,$entry_elems[3]);
		//stream_set_timeout($handle, 180);
		while ($line = fgets($handle))
		{
			//$line = fgets($handle);
			$line_elems = explode('#', $line);
			$bit_pos = $line_elems[count($line_elems)-1];
			fseek($handle,$bit_pos);
			$line = fgets($handle);
			$line_elems = explode('#', $line);
			if( $count > $first )
				break;

			if( $count > 50 )
				break;
			fseek($handle,$bit_pos-20);

			$id[] = $line_elems[0];
			$count++;
			if( $line_elems[4]==0 )
				break;

		}

		fclose($handle);
	}


	sort($id);
	$tempAr = array();
	$tempAr[0]['id'] = $id[count($id)-$first];

//return $tempAr;
	return new ResultSet1( $tempAr );
}

if( $this->code_sql==156 )//strpos($this->queryStr,"SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}messages WHERE command='msg' AND id>=? AND id<=? AND toroomid=? ORDER BY id")!==false
{

	$params['toroomid'] = $params[2];
	$params['id'] = $params[0];
	$stat_arr = array();
	$stats_file_name = $this->getCachFileName('Stats');
	$find_records = 0;
	$stats_file = @fopen($stats_file_name, 'r');

	if( !$stats_file)
	{
	    $stat_value = $this->getRecordsCount($GLOBALS['fc_config']['db']['pref'].'messages');
		//RESTORING message_stats file
		$this->saveStatsInCache('MESSAGES_COUNT', $stat_value);
		return false;
	}

	//stream_set_timeout($stats_file, 180);
	while ($stat = fgets($stats_file))
	{
	    //$stat = fgets($stats_file);
	    $stat_elems = explode('=', $stat);
		if($stat_elems[0] == 'MESSAGES_COUNT')
		{
			$stat_arr['MESSAGES_COUNT'] = $stat_elems[1];
		}
	}
	@fclose($stats_file);
	$stat_arr['MESSAGES_COUNT'] = (int) $stat_arr['MESSAGES_COUNT'];

	//checking all cached files if they have messages with id's: $params["id"] .. $stat_arr["COUNT"]
	// if only one ID not found in cach files(if database have spec. command with this id),
	// this function return's false and we select all messages from files.

	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;

	$id_end = $stat_arr['MESSAGES_COUNT'];
	$id = array();
	$result = null;

	while (false !== ($entry = $cacheDir->read()))
	{
		if( $this->breakFile($entry) || strpos($entry, $GLOBALS['fc_config']['db']['pref'].'messages_')!==FALSE )
			continue;

		$entry_elems = explode('_', $entry);

		if( $entry_elems[0]!=$params['toroomid'] || $entry_elems[0] == 'pm')
			continue;

		$userid = $entry_elems[1];
		$toroomid = $entry_elems[0];

		$count=0;
		$handle = @fopen($cachePath.$entry, 'r');
		$tempArray = array();


		$this->setFilePos($handle,$params,$entry_elems[3]);



		if( !$is_cmd )
		{
			//stream_set_timeout($handle, 180);
			while ($line = fgets($handle))
			{
				//$line = fgets($handle);
				if( $line=='' )
					continue;
				$line_elems = explode('#', $line);

				$id = (int) $line_elems[0];
				$created = $line_elems[1];
				$roomid = (int) $line_elems[2];

				if( $id >= $params['id'] )
				{
					$txt = $line_elems[3];
					$txt = str_replace('%$$%$', '#', $txt);
					$find_records++;
					$result_elem = array('id'=>$id, 'created'=>$created, 'toroomid'=>$params['toroomid'], 'command'=>'msg','userid'=>$userid, 'roomid'=>$roomid, 'txt'=>$txt);

					$result[count($result)] = $result_elem;
				}
			}
		}

		fclose($handle);
	}

	if( count( $result ) > 0 )
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
		//return $result;
		return new ResultSet1( $result );
	}
	else
	{
		$result = array();
		return new ResultSet1( $result );
	}
}/*
if( $this->code_sql==171 )//( from chatlist )
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$FileName = $this->getCachFileName('Messages');
	$arrayId1 = array();
	$arrayFromMsg = array();
	$sql = $this->queryStr;
	//find foomid in string
	$roomid = $params[0];
	$time1 = strtotime( $params[1] );
	$time2 = strtotime( $params[2] );
	$allText = array();

	while (false !== ($entry = $cacheDir->read()))
	{
		if(
			$this->breakFile($entry) ||
			strpos($entry, 'tables_id' )!==FALSE  ||
			strpos($entry, $GLOBALS['fc_config']['db']['pref'].'messages_')!==FALSE
		)
			continue;

		$entry_elems = explode('_', $entry);

		if( $entry_elems[0] != $roomid ) continue;

		$content = file( $cachePath.$entry );
		//echo '<pre>'; print_r($content); echo '</pre>';
		foreach( $content as $key=>$val )
		{
			$line = explode("#",$val);

			$time3 = strtotime($line[1]);
			//echo '['.$line[1].']'.$time3.'>='.'['.$params[1].']'.$time1.' && '.$time3.'<='.$time2.'<br/>';
			if( $time3 >= $time1 && $time3 <= $time2 )
			{
				$arr = array();
				$arr['txt'] = html_entity_decode($line[3]);
				//$arr['txt'] = $line[3];
				$arr['userid'] = $entry_elems[1];
				$allText[] = $arr;
			}
		}
	}

	$FileName = $this->getCachFileName('Users');
	$contentUser = file( $FileName );
	foreach( $allText as $key=>$val )
	{
		$userid = $val['userid'];
		foreach( $contentUser as $k=>$v )
		{
			$arrUser = explode("\t",$v);
			if( $userid==$arrUser[0] )
			{
				$allText[$key]['login'] = $arrUser[1];
			}
		}
	}

	return new ResultSet1( $allText );
}*/
if( $this->code_sql == 171 )//SELECT `created`, `roomid`, `userid` FROM `flashchat_messages` WHERE `roomid` IN ( SELECT `id` FROM `flashchat_rooms` ) AND (`command`="adu" OR `command`="mvu") AND `toconnid` IS NULL
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$rooms_fname = $this->getCachFileName('Rooms');
	$rooms = file($rooms_fname);
	$all_rooms = array();
	$j = 0;
	foreach($rooms as $v)
	{
		$line = explode("\t", $v);
		$all_rooms[$j]['id'] = $line[0];
		$all_rooms[$j]['name'] = $line[3];
		$j++;
	}
	$allText = array();

	while (false !== ($entry = $cacheDir->read()))
	{
		if(strpos($entry, $GLOBALS['fc_config']['db']['pref'].'messages_') === FALSE) continue;

		$content = file($cachePath.$entry);

		$j = 0;
		foreach($content as $val)
		{
			$line = explode("\t", $val);
			if($line[2] == '')
			{
				if($line[5] == 'adu' || $line[5] == 'mvu')
				{
					foreach($all_rooms as $room)
					{
						if($line[7] == $room['id'])
						{
							$allText[$j]['created'] = $line[1];
							$allText[$j]['roomid'] = $line[7];
							$allText[$j]['userid'] = $line[6];
							$j++;
						}
					}
				}
			}
		}
	}

	return new ResultSet1( $allText );
}
if( $this->code_sql == 172 )//SELECT `created`, `userid` FROM `flashchat_messages` WHERE `userid`='.$row['userid'].' AND (`command`="rmu" OR `command`="mvu") LIMIT '.($opened_rooms[$row['created']]['limit'] - 1).', 1
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$allText = array();

	while (false !== ($entry = $cacheDir->read()))
	{
		if(strpos($entry, $GLOBALS['fc_config']['db']['pref'].'messages_') === FALSE) continue;

		$content = file($cachePath.$entry);

		$j = 0;
		foreach($content as $val)
		{
			$line = explode("\t", $val);
			if($line[6] == $params[0])
			{
				if($line[5] == 'rmu' || $line[5] == 'mvu')
				{
					$allText[$j]['created'] = $line[1];
					$allText[$j]['userid'] = $line[6];
					$j++;
				}
			}
		}
	}
	$returnText = array();
	foreach($allText as $k => $v)
	{
		if($k == $params[1])
		{
			$returnText[0] = $v;
			return new ResultSet1( $returnText );
		}
	}
	return new ResultSet1( $allText );
}
if( $this->code_sql == 173 )
//SELECT `userid`, `txt`, `command`, '.$GLOBALS['fc_config']['db']['pref'].'_users.login, `touserid` FROM `'.$GLOBALS['fc_config']['db']['pref'].'_messages` LEFT JOIN `'.$GLOBALS['fc_config']['db']['pref'].'_users` ON ('.$GLOBALS['fc_config']['db']['pref'].'_messages.userid = '.$GLOBALS['fc_config']['db']['pref'].'_users.id) WHERE ((`roomid` = '.$roomid.' AND (`command`="msg" OR `command`="adu")) OR (`touserid` IS NOT NULL AND `roomid` IS NULL) OR (`roomid` IS NULL AND (`command`="rmu" OR `command`="mvu"))) AND (`created` >= "'.$start.'" AND `created` <= "'.$end.'")
//SELECT `roomid`, `userid`, `txt`, `command`, `created`, '.$GLOBALS['fc_config']['db']['pref'].'users.login FROM `'.$GLOBALS['fc_config']['db']['pref'].'messages` LEFT JOIN `'.$GLOBALS['fc_config']['db']['pref'].'users` ON ('.$GLOBALS['fc_config']['db']['pref'].'messages.userid = $GLOBALS['fc_config']['db']['pref'].'users.id) WHERE ((`roomid` = ? AND `command` IN ("msg", "adu") AND (`created` >= ? AND `created` <= ?)) OR (`roomid` IS NULL AND `command` = "rmu") AND (`created` >= ? AND `created` <= ?))
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$allText = array();

	while (false !== ($entry = $cacheDir->read()))
	{
		if($this->breakFile($entry) || strpos($entry, 'tables_id' ) !== FALSE || strpos($entry, $GLOBALS['fc_config']['db']['pref'].'messages_') !== FALSE || strpos($entry, $GLOBALS['fc_config']['db']['pref'].'config_') !== FALSE) continue;

		$entry_elems = explode('_', $entry);
		if($entry_elems[0] != $params[0]) continue;

		$content = file($cachePath.$entry);

		$j = 0;
		foreach($content as $val)
		{
			$line = explode("\t", $val);
			foreach($line as $v)
			{
				$str = explode('#', $v);
				if(strtotime($str[1]) >= strtotime($params[1]))
				{
					$allText[$j]['userid'] = $entry_elems[1];
					$allText[$j]['roomid'] = $entry_elems[0];
					$allText[$j]['created'] = $str[1];
					$allText[$j]['txt'] = $str[3];
					$allText[$j]['command'] = 'msg';
					$j++;
				}
			}
		}
	}
	$FileName = $this->getCachFileName('Users');
	$contentUser = file( $FileName );
	foreach( $allText as $key=>$val )
	{
		$userid = $val['userid'];
		foreach( $contentUser as $k => $v )
		{
			$arrUser = explode("\t", $v);
			if( $userid==$arrUser[0] )
			{
				$allText[$key]['login'] = $arrUser[1];
			}
		}
	}
	//echo '<pre>'; print_r($allText); echo '</pre>';
	return new ResultSet1( $allText );
}
if( $this->code_sql == 174 )//SELECT `userid`, `roomid`, `command`, `created`, `toconnid` FROM `'.$GLOBALS['fc_config']['db']['pref'].'messages` WHERE ( `roomid` IS NULL OR `roomid` IN (SELECT `id` FROM `flashchat_rooms`)) AND ( `created` >= "'.date('Y-m-d G:i:s', 0).'" AND `created` <= "'.date('Y-m-d G:i:s', time() + 60).'" ) AND `command` IN ("adu", "rmu", "mvu") AND `toconnid` IS NULL ORDER BY `created`
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$allText = array();
	$rooms_fname = $this->getCachFileName('Rooms');
	$rooms = file($rooms_fname);
	$all_rooms = array();
	$j = 0;
	foreach($rooms as $v)
	{
		$line = explode("\t", $v);
		$all_rooms[$j]['id'] = $line[0];
		$all_rooms[$j]['name'] = $line[3];
		$j++;
	}

	while (false !== ($entry = $cacheDir->read()))
	{
		if(strpos($entry, $GLOBALS['fc_config']['db']['pref'].'messages_') === FALSE) continue;

		$content = file($cachePath.$entry);

		$tmp = array();
		foreach($content as $val)
		{
			$line = explode("\t", $val);
			if(($line[5] == 'adu' || $line[5] == 'rmu' || $line[5] == 'mvu') && $line[2] == '')
			{
				$tmp['created'] = $line[1];
				$tmp['userid'] = $line[6];
				$tmp['roomid'] = $line[7];
				$tmp['command'] = $line[5];
				$tmp['toconnid'] = $line[2];
				$allText []= $tmp;
			}
		}
	}

	return new ResultSet1( $allText );
}
if( $this->code_sql == 175 )
//SELECT `txt`, `created`, '.$GLOBALS['fc_config']['db']['pref'].'users.login, `touserid` FROM `'.$GLOBALS['fc_config']['db']['pref'].'messages` LEFT JOIN `'.$GLOBALS['fc_config']['db']['pref'].'users` ON ('.$GLOBALS['fc_config']['db']['pref'].'messages.userid = '.$GLOBALS['fc_config']['db']['pref'].'users.id) WHERE `roomid` IS NULL AND `command` = "msg" ORDER BY `created`
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$allText = array();

	while (false !== ($entry = $cacheDir->read()))
	{
		if($this->breakFile($entry) || strpos($entry, 'tables_id' ) !== FALSE || strpos($entry, $GLOBALS['fc_config']['db']['pref'].'messages_') !== FALSE || strpos($entry, $GLOBALS['fc_config']['db']['pref'].'config_') !== FALSE) continue;

		$entry_elems = explode('_', $entry);
		if($entry_elems[0] != 'pm') continue;

		$content = file($cachePath.$entry);
		foreach($content as $val)
		{
			$line = explode('#', $val);
			$tmp = array();
			$tmp['created'] = $line[1];
			$tmp['login'] = $entry_elems[1];
			$tmp['touserid'] = $entry_elems[2];
			$tmp['txt'] = $line[3];
			$allText []= $tmp;
		}
	}
	$FileName = $this->getCachFileName('Users');
	$contentUser = file( $FileName );
	foreach( $allText as $key=>$val )
	{
		$userid = $val['login'];
		foreach( $contentUser as $k => $v )
		{
			$arrUser = explode("\t", $v);
			if( $userid == $arrUser[0] )
			{
				$allText[$key]['login'] = $arrUser[1];
			}
		}
	}
	$array_sort = array();
	foreach($allText as $k => $v)
	{
		$array_sort[$k] = $v['created'];
	}
	array_multisort($array_sort, SORT_ASC, $allText);
	return new ResultSet1( $allText );
}
if( $this->code_sql==170 )//( from chatlist )
{

	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$FileName = $this->getCachFileName('Messages');
	$arrayId1 = array();
	$arrayFromMsg = array();
	while (false !== ($entry = $cacheDir->read()))
	{
		if( strpos($entry,'messages')===false )
			continue;
		$content = file( $cachePath.$entry );
		break;

	}
	$msgArrray = array();
	foreach( $content as $key => $val )
	{
		if( $val=='' )
			continue;

		$arr = explode("\t",$val);
		if( $arr[5]=='adu' || $arr[5]=='mvu' || $arr[5]=='rmu' )
		{
			$arr['created'] = $arr[1];
			$arr['command'] = $arr[5];
			$arr['userid']  = $arr[6];
			$arr['roomid']  = $arr[7];
			$arr = $this->unsetAll($arr);
			$msgArrray[] = $arr;
		}
		else
			continue;
	}

	$FileName = $this->getCachFileName('Users');
	$contentUser = file( $FileName );
	foreach( $msgArrray as $key=>$val )
	{
		$userid = $val['userid'];
		foreach( $contentUser as $k=>$v )
		{
			$arrUser = explode("\t",$v);
			if( $userid==$arrUser[0] )
			{
				$msgArrray[$key]['login'] = $arrUser[1];
				$msgArrray[$key]['roles'] = $arrUser[3];
			}
		}
	}

	$FileName = $this->getCachFileName('Rooms');
	$contentRooms = file( $FileName );
	foreach( $msgArrray as $key=>$val )
	{
		$roomid = $val['roomid'];
		foreach( $contentRooms as $k=>$v )
		{
			$arrRoom = explode("\t",$v);
			if( $roomid==$arrRoom[0] )
				$msgArrray[$key]['name'] = $arrRoom[3];
		}
	}

	return new ResultSet1( $msgArrray );
}
if( $this->code_sql==161 )//strpos($this->queryStr,'SELECT id FROM '.$GLOBALS['fc_config']['db']['pref'].'messages WHERE command=\'msg\' AND toroomid=? AND created > DATE_SUB(NOW(),')!==false
{

	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$allUsers = array();
	$arrayId1 = array();
	$arrayId = array();
	$first = 'INTERVAL';
	$second = 'MINUTE';
	$tempStr = substr($this->queryStr,strpos($this->queryStr,$first) + strlen($first),strpos($this->queryStr,$second)-(strpos($this->queryStr,$first) + strlen($first)));
	$min = trim($tempStr);
	while (false !== ($entry = $cacheDir->read()))
	{
		if( $this->breakFile($entry) || strpos($entry, $GLOBALS['fc_config']['db']['pref'].'messages_')!==FALSE )
			continue;
		$entry_elems = explode('_', $entry);
		if( $entry_elems[0] == '' )//
			continue;
		if( $entry_elems[0] != $params[0] )
			continue;
		if( (time()-$entry_elems[4])>($min*60) )
			continue;

		$handle = @fopen($cachePath.$entry, 'r');
		while (!feof( $handle ))	//strtotime($str))
		{
			$line = fgets( $handle );

			$line_elems = explode('#', $line);
			if( (time()-strtotime($line_elems[1]))>($min*60) )
				continue;
			$id = (int) $line_elems[0];
			$arrayId[$id] = $id;
		}
		fclose( $handle );
	}

	sort( $arrayId );

	if( count($arrayId)!=0 )
		$arrayId1[0]['id'] = $arrayId[0];
	else
		return null;
	//return $arrayId1;

	return new ResultSet1( $arrayId1 );
}
//'SELECT count(*) as msgnumb FROM '.$GLOBALS['fc_config']['db']['pref'].'messages WHERE command=\'msg\' AND (userid IS NOT NULL OR roomid IS NOT NULL)'
if( $this->code_sql==160 )//'SELECT id FROM '.$GLOBALS['fc_config']['db']['pref'].'messages WHERE command=\'msg\' AND toroomid=? AND created > DATE_SUB(NOW(),'
{

	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$count = 0;

	while (false !== ($entry = $cacheDir->read()))
	{
		if( $this->breakFile($entry) || strpos($entry, $GLOBALS['fc_config']['db']['pref'].'messages_')!==FALSE )
			continue;
		if( strpos($entry, 'tables_id')!==FALSE )
			continue;

		$content = file( $cachePath.$entry );
		$count += sizeof($content);
	}
	$arrayId1 = array();
	$arrayId1[]['msgnumb'] = $count;

	return new ResultSet1( $arrayId1 );
}
elseif( $this->code_sql==153 )//DELETE FROM {$GLOBALS['fc_config']['db']['pref']}messages WHERE created < DATE_SUB(NOW(),INTERVAL ? SECOND
{
	return true;
}
elseif( $this->code_sql == 151 )//insert
{

	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	if($this->queryStr=='DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'messages WHERE created < DATE_SUB(NOW(),INTERVAL ? SECOND)')
	{
		return true;
	}
	else//if we INSERT new messages
	{
		$isPrivate = ($params[2]!='');

		if( $params[4]!='msg' )
		{
			if( $params[4]=='lin' )
			{
				while (false !== ($entry = $cacheDir->read()))
				{
					if( $this->breakFile($entry) || strpos($entry, $GLOBALS['fc_config']['db']['pref'].'messages_')!==FALSE )
						continue;

					if(strpos($entry, $GLOBALS['fc_config']['db']['pref'].'config_') !== FALSE) continue;

					//$cachePath.$entry
					$element = explode('_',$entry);

					if( $element[1]==$params[5] || ($element[0]=='pm' && $element[1]==$params[5]) || ((time() - filemtime($cachePath.$entry))>3600))
					{
						unlink($cachePath.$entry);
					}
				}
			}
			return $this->insertCommand( $params );
		}
		$id = $this->file_insert_id( 7 );



		$params = array('id'=>$id, 'touserid'=>$params[2], 'toroomid'=>$params[3], 'userid'=>$params[5], 'roomid'=>$params[6], 'txt'=>$params[7], 'instance_id'=>$params[9]);
		/*if( $params['roomid']=='' )
			return;*/

		$today = date('Y-m-d G:i:s');
		//$today = time();
		$appended = false;
		$greate = false;

		$to_add = $GLOBALS['fc_config']['cacheFilePrefix'];
		while (false !== ($entry = $cacheDir->read()))
		{
			if( $this->breakFile($entry) || strpos($entry, $GLOBALS['fc_config']['db']['pref'].'messages_')!==FALSE )
			continue;

			if(!$isPrivate)
			{
				//$file = @fopen($cachePath.$params['toroomid'].'_'.$params['userid'].'_'.$to_add.'.txt', 'w');
				if( strpos($entry,$params['toroomid'].'_'.$params['userid'].'_') !== FALSE )
				{
					if( strpos($entry, $GLOBALS['fc_config']['cacheFilePrefix'].'_'.$_SESSION['session_inst'] ) !== FALSE )
					{
						$file = @fopen($cachePath.$entry, 'a');
						$greate = true;
						$file_name = $cachePath.$entry;
					}
				}
			}
			else
			{
				if( strpos($entry,'pm_'.$params['userid'].'_'.$params['touserid'].'_') !== FALSE )
				{
					if( strpos($entry, $GLOBALS['fc_config']['cacheFilePrefix'].'_'.$_SESSION['session_inst'] ) !== FALSE )
					{
						$file = @fopen($cachePath.$entry, 'a');
						$greate = true;
						$file_name = $cachePath.$entry;
					}
				}
			}
		}

		if( !$greate )
		{
			if(!$isPrivate)
			{
				$file_name = $cachePath.$params['toroomid'].'_'.$params['userid'].'_'.$id.'_0_'.time().'_'.$to_add.'_'.$_SESSION['session_inst'].'.txt';

				$file = @fopen($file_name, 'w');
			}
			else
			{
				$file_name = $cachePath.'pm_'.$params['userid'].'_'.$params['touserid'].'_'.$id.'_0_'.$to_add.'_'.$_SESSION['session_inst'].'.txt';

				$file = @fopen( $file_name , 'w' );
			}
		}

		$pos = filesize($file_name);
		$params['txt'] = ereg_replace('#', '%$$%$', $params['txt']);


		$_str = $id.'#'.$today.'#'.$params['roomid'].'#'.$params['txt'].'#'.$pos."\n";

		@fwrite($file,$_str);
		fflush($file);
		@fclose($file);
		$cacheDir->close();
		$lastrow = filesize($file_name)-$pos;

		if( $greate )
		{
			if(!$isPrivate)
			{
				rename($file_name, $cachePath.$params['toroomid'].'_'.$params['userid'].'_'.$id.'_'.$pos.'_'.time().'_'.$to_add.'_1.txt');
			}
			else
			{
				rename($file_name, $cachePath.'pm_'.$params['userid'].'_'.$params['touserid'].'_'.$id.'_'.$pos.'_'.time().'_'.$to_add.'_1.txt');
			}

		}

		return $id;
	}
	//return true;
	//return $this->saveMessagesInCache( $params );
}
elseif( $this->code_sql == 157 )//$this->queryStr=="SELECT userid FROM {$GLOBALS['fc_config']['db']['pref']}messages where command=? or command=? and userid is not null order by userid"
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;

	$total = '';
	$allMsg = array();
	while (false !== ($entry = $cacheDir->read()))
	{
		if( $this->breakFile($entry) )
			continue;


		if( strpos($entry, $GLOBALS['fc_config']['db']['pref'].'messages')!==FALSE  )
		{
			$handle = @fopen($cachePath.$entry, 'r');
			while (!feof($handle))
			{
    			$buffer = fgets($handle);
				$array = explode("\t",$buffer);
				if(
					(
						$array[5] != $params[0] &&
						$array[5] != $params[1]
					)
					&&
						$array[6] != ''
				  )
				{

					$array['userid'] = $array[6];

					$array = $this->unsetAll($array);

					$allMsg[] = $array;
				}
			}
			@fclose($handle);
		}
	}

	return new ResultSet1( $allMsg );
}
elseif( $this->code_sql==152 )//SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}messages WHERE toconnid=? AND id>=? ORDER BY id
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;

	$total = '';
	$allMsg = array();

	while (false !== ($entry = $cacheDir->read()))
	{
		if( $this->breakFile($entry) )
		continue;


		if( strpos($entry, $GLOBALS['fc_config']['db']['pref'].'messages')!==FALSE  )
		{
			$handle = @fopen($cachePath.$entry, 'r');
			$elem = explode('_',$entry);
			$params['id'] = $params[1];
			$handle = $this->setFileMsgPos($handle,$params,$elem[2]);

			//stream_set_timeout($handle, 180);
			while ($buffer = fgets($handle))
			{
    			//$buffer = fgets($handle);
				$array = explode("\t",$buffer);
				if( $array[2]==$params[0] && $array[0]>=$params[1] )// && ''!=trim($array[3])
				{
					$array['id'] = $array[0];
					$array['created'] = $array[1];
					$array['toconnid'] = $array[2];
					$array['touserid'] = $array[3];
					$array['toroomid'] = $array[4];
					$array['command'] = $array[5];
					$array['userid'] = $array[6];
					$array['roomid'] = $array[7];
					$array['txt'] = $array[8];
					$array['chatid'] = $array[9];
					$array = $this->unsetAll($array);
					$allMsg[] = $array;
				}
			}

			@fclose($handle);
		}
	}

	//return $allMsg;
	return new ResultSet1( $allMsg );
}
elseif( $this->code_sql==158 )//strpos($this->queryStr,"SELECT msgs.*, DATE_FORMAT(DATE_ADD")!==false
{
	$params = array('toconnid'=>$params[0], 'touserid'=>$params[1], 'toroomid'=>$params[2], 'id'=>$params[3]);
	$params['id'] = (int) $params['id'];

	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$result = array();
	$find_records = 0;

	while (false !== ($entry = $cacheDir->read()))
	{
		if( $this->breakFile($entry)  || strpos( $entry , 'messages_' )!==false )
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

		$str = $this->queryStr;

		if($_REQUEST['roomid'])
		{
			if( $toroomid!=$_REQUEST['roomid'] )
				continue;
		}

		if($_REQUEST['userid'])
		{
			if( $userid!=$_REQUEST['userid'] && $touserid!=$_REQUEST['userid'] )
				continue;
		}

		$handle = @fopen($cachePath.$entry, 'r');
		$tempArray = array();


		//stream_set_timeout($handle, 180);
		while ($line = fgets($handle))
		{
			//$line = fgets($handle);

			if( $line=='' )
				continue;

			$find_records++;
			$line_elems = explode('#', $line);

			$tempArray['id'] = $line_elems[0];
			$tempArray['created'] = $line_elems[1];
			$tempArray['toconnid'] = '';

			if($_REQUEST['days'])
			{
				if( strtotime($tempArray['created']) <= strtotime($_REQUEST['days']) )
					continue;
			}
			if($_REQUEST['from'])
			{
				if( strtotime($tempArray['created']) <= strtotime($_REQUEST['from']) )
					continue;
			}

			if($_REQUEST['to'])
			{
				if( strtotime($tempArray['created']) >= strtotime($_REQUEST['to']) )
					continue;
			}

			if( $is_private )
				$tempArray['touserid'] = $entry_elems[2];
			else
				$tempArray['touserid'] = '';

			$tempArray['toroomid'] = $toroomid;
			$tempArray['command'] = 'msg';
			$tempArray['userid'] = $entry_elems[1];
			$tempArray['roomid'] = $entry_elems[0];
			if($_REQUEST['keyword'])
		 	{
				if( strpos($line_elems[3],$_REQUEST['keyword'])!==true )
					continue;
			}
			$tempArray['txt'] = $line_elems[3];
			$tempArray['chatid'] = 1;
			$tempArray['sent'] = date('F j, Y, g:i a',strtotime($line_elems[1]));

			$file_name = $this->getCachFileName('Rooms');
			//$arrayRoom = file( $file_name );

			$i = 0;
			while( !($arrayRoom = file($file_name)) )
			{
				$i++;
				if( $i>1000  )
					break;
			}

			$toRoomStr = '';
			$fromRoomStr = '';


			foreach( $arrayRoom as $key=>$val )
			{
				$room_elems = explode("\t", $val);

				if( $room_elems[0]==$entry_elems[0] )
				{
					$toRoomStr = $room_elems[3];
					$fromRoomStr = $room_elems[3];
					break;
				}
			}

			$tempArray['toroom'] = $toRoomStr;
			$tempArray['fromroom'] = $fromRoomStr;

			$result[] = $tempArray;
		}
		fclose( $handle );
	}

	if( $find_records > 0 )
	{
		if( !function_exists('cmp11') )
		{
			function cmp11($elem1, $elem2)
			{
				if($elem1['id']<$elem2['id'])
					return -1;
				elseif($elem1['id']==$elem2['id'])
					return 0;
				elseif($elem1['id']>$elem2['id'])
					return 1;
			}
		}
		usort($result, 'cmp11');
		return new ResultSet1( $result );
	}
	else
	{
		$result = array();
		return new ResultSet1( $result );
	}
}
elseif( $this->code_sql==162 )//strpos($this->queryStr,"SELECT msgs.*, DATE_FORMAT(DATE_ADD")!==false
{

	$params = array('toconnid'=>$params[0], 'touserid'=>$params[1], 'toroomid'=>$params[2], 'id'=>$params[3]);
	$params['id'] = (int) $params['id'];

	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$result = array();
	$find_records = 0;

	if( isset($_REQUEST['from']) )
	{
		$date = $_REQUEST['from'].'';
		$_REQUEST['from'] = substr( $date , 0 , -3 );
	}

	if( isset($_REQUEST['to']) )
	{
		$date = $_REQUEST['to'].'';
		$_REQUEST['to'] = substr( $date , 0 , -3 );
	}

	if( isset($_REQUEST['days']) )
	{
		$date = $_REQUEST['days'].'';
		$_REQUEST['days'] = substr( $date , 0 , -3 );
	}


	while (false !== ($entry = $cacheDir->read()))
	{
		if( $this->breakFile($entry) || strpos( $entry , 'messages_' )!==false || strpos( $entry , 'tables_id' )!==false || strpos( $entry , 'config_' )!==false)//
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

		$str = $this->queryStr;

		if($_REQUEST['roomid'])
		{
			if( $toroomid!=$_REQUEST['roomid'] )
				continue;
		}

		if($_REQUEST['userid'])
		{
			if( $userid!=$_REQUEST['userid'] && $touserid!=$_REQUEST['userid'] )
				continue;
		}
		$handle = @fopen($cachePath.$entry, 'r');
		$tempArray = array();


		//stream_set_timeout($handle, 180);
		while ($line = fgets($handle))
		{
			if( $line=='' )
				continue;

			$find_records++;
			$line_elems = explode('#', $line);

			$tempArray['id'] = $line_elems[0];
			$tempArray['created'] = $line_elems[1];
			$tempArray['toconnid'] = '';

			if($_REQUEST['days'])
			{
				if( strtotime($tempArray['created']) < strtotime($_REQUEST['days']) )
					continue;
			}
			if($_REQUEST['from'])
			{
				if( strtotime($tempArray['created']) < strtotime($_REQUEST['from']) )
					continue;
			}

			if($_REQUEST['to'])
			{
				if( strtotime($tempArray['created']) > strtotime($_REQUEST['to']) )
					continue;
			}

			if( $is_private )
				$tempArray['touserid'] = $entry_elems[2];
			else
				$tempArray['touserid'] = '';

			$tempArray['toroomid'] = $toroomid;
			$tempArray['command'] = 'msg';
			$tempArray['userid'] = $entry_elems[1];
			$tempArray['roomid'] = $entry_elems[0];
			if($_REQUEST['keyword'])
		 	{
				if( strpos($line_elems[3],$_REQUEST['keyword'])===false )
					continue;
			}
			$tempArray['txt'] = html_entity_decode($line_elems[3]);
			$tempArray['chatid'] = 1;
			$tempArray['sent'] = date('F j, Y, g:i a', strtotime($line_elems[1]));

			$file_name = $this->getCachFileName('Rooms');
			//$arrayRoom = file( $file_name );

			$i = 0;
			while( !($arrayRoom = file($file_name)) )
			{
				//usleep(1000);//for linux
				$i++;
				if( $i>1000  )
					break;
			}

			$toRoomStr = '';
			$fromRoomStr = '';


			foreach( $arrayRoom as $key=>$val )
			{
				$room_elems = explode("\t", $val);

				if( $room_elems[0]==$entry_elems[0] )
				{
					$toRoomStr = $room_elems[3];
					$fromRoomStr = $room_elems[3];
					break;
				}
			}

			$tempArray['toroom'] = $toRoomStr;
			$tempArray['fromroom'] = $fromRoomStr;
			$result[] = $tempArray;
		}
		fclose( $handle );
	}

	if( $find_records > 0 )
	{
		if( !function_exists('cmp11') )
		{
			function cmp11($elem1, $elem2)
			{
				if( $elem1['id']<$elem2['id'] )
					return -1;
				elseif( $elem1['id']==$elem2['id'] )
					return 0;
				elseif( $elem1['id']>$elem2['id'] )
					return 1;
			}
		}
		usort($result, 'cmp11');
		//return $result;
		return new ResultSet1( $result );
	}
	else
	{
		$result = array();
		return new ResultSet1( $result );
	}
}
//SELECT userid,login,txt FROM flashchat_messages LEFT JOIN flashchat_users
//ON (flashchat_messages.userid = flashchat_users.id) WHERE (flashchat_messages.command = 'msg')
//AND (flashchat_messages.roomid = '1') AND (flashchat_messages.created >= 2007-09-12 17:36:42)
//AND (flashchat_messages.created <= 2007-09-12 17:37:29)
if( $this->code_sql==163 )
{
	$params = array('toconnid'=>$params[0],'touserid'=>$params[1],'toroomid'=>$params[2],'id'=>$params[3]);
	$params['id'] = (int) $params['id'];

	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$result = array();
	$find_records = 0;
	$allUsers = array();
	$userArray = array();
	while (false !== ($entry = $cacheDir->read()))
	{
		if( $this->breakFile($entry) || strpos( $entry , 'messages_' )!==false || strpos( $entry , 'tables_id' )!==false)
			continue;
		$entry_elems = explode('_', $entry);
		if( $entry_elems[0]!=$GLOBALS['tempValue']['roomid'] )
			continue;
		$content = file( $cachePath.$entry );
		foreach( $content as $key=>$val )
		{
			$find_records++;
			$line_elems = explode('#', $val);
			$values['txt'] = $line_elems[3];
			$values['room'] = $entry_elems[0];
			$values['userid'] = $entry_elems[1];
			$userArray[] = $entry_elems[1];
			$allUsers[] = $values;
		}
	}
	$allUsers = $this->sortByIdUser( $allUsers );
	return new ResultSet1( $allUsers );
}
elseif( $this->code_sql==154 )
{
	if( ($rows=$this->messageIsCached($params)) !== FALSE )
	{
		return new ResultSet1($rows);
	}
	else
	{
		$cacheDir = $this->getCachDir();
			$cachePath = $cacheDir->path;

			$total = '';
			$allMsg = array();

			while (false !== ($entry = $cacheDir->read()))
			{
				if(  $this->breakFile($entry) || strpos($entry, 'messages')!==FALSE )
				continue;


				if( strpos($entry, 'messages')!==FALSE  )
				{
					$handle = @fopen($cachePath.$entry, 'r');
					$elem = explode('_',$entry);

					$params['id'] = $params[3];
					$this->setFileMsgPos($handle,$params,$elem[2]);

					//stream_set_timeout($handle, 180);
					while ($buffer = fgets($handle))
					{
    					//$buffer = fgets($handle);
						$array = explode("\t",$buffer);
						if(
							(
								$array[2]!='msg' &&
								$array[5]!='lout' &&
								$array[2]!='msgu'
							)
							&&
							(
								$array[2]==$params[0] ||
								$array[3]==$params[1] ||
								$array[4]==$params[2] ||
								(
									$array[2]=='' &&
									$array[3]=='' &&
									$array[4]==''
								)
							)
							&&
								$array[0]>=$params[3]

						)
						{
							$array['id'] = $array[0];
							$array['created'] = $array[1];
							$array['toconnid'] = $array[2];
							$array['touserid'] = $array[3];
							$array['toroomid'] = $array[4];
							$array['command'] = $array[5];
							$array['userid'] = $array[6];
							$array['roomid'] = $array[7];
							$array['txt'] = $array[8];
							$array['chatid'] = $array[9];
							$array['instance_id'] = $_SESSION['session_inst'];

							$array = $this->unsetAll($array);

							$allMsg[] = $array;
						}
					}
					@fclose($handle);

				}
			}

		return new ResultSet1( $allMsg );
	}

}
?>