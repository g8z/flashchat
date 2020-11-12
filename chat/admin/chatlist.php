<?php

require_once('init.php');

if(!inSession()) {
	include('login.php');
	exit;
}
else if(!inPermission('chats'))
{
	$tabName = 'Chats';
	include('nopermit.php');
	exit;
}
//--------------------------------
// highlight page. artemK0
//--------------------------------
$bold = highlightPage(__FILE__);
$smarty->assign($bold[0], $bold[1]);
ChatServer::prepare();

$cms = $GLOBALS['fc_config']['cms'];
$cmsclass = strtolower(get_class($cms));
$manageUsers = ($cmsclass == 'defaultcms') || ($cmsclass == 'statelesscms'  && (! isset($cms->constArr)));
if(!$manageUsers)
{
	$smarty->assign('manageUsers',true);
	$smarty->display('chatlist.tpl');
	exit;
}
if(!isset($_REQUEST['roomid']) || isset($_REQUEST['clear'])) $_REQUEST['roomid'] = 0;
if(!isset($_REQUEST['initiatorid']) || isset($_REQUEST['clear'])) $_REQUEST['initiatorid'] = 0;
if(!isset($_REQUEST['moderatorid']) || isset($_REQUEST['clear'])) $_REQUEST['moderatorid'] = 0;
if(!isset($_REQUEST['days']) || isset($_REQUEST['clear'])) $_REQUEST['days'] = '';
if(!isset($_REQUEST['sort']) || isset($_REQUEST['clear'])) $_REQUEST['sort'] = 'none';
if(!isset($_REQUEST['msg2show']) || isset($_REQUEST['clear'])) $_REQUEST['msg2show'] = 10;
function str2timestamp($str)
{
	return $parts = str_replace(array(' ',':','-'),'',$str);
}
function getEnters()
{
	$query = 'SELECT `userid`, `roomid`, `command`, `created`, `toconnid` '.
			'FROM `'.$GLOBALS['fc_config']['db']['pref'].'messages` '.
			'WHERE ( `roomid` IS NULL OR `roomid` IN (SELECT `id` FROM `flashchat_rooms`)) '.
			'AND ( `created` >= "'.date('Y-m-d G:i:s', 0).'" AND `created` <= "'.date('Y-m-d G:i:s', time() + 60).'" ) AND `command` IN ("adu", "rmu", "mvu") AND `toconnid` IS NULL ORDER BY `created`';
	$statement = new Statement($query, 174);
	$result_enters = $statement->process();

	$enters = array();
	while($row = $result_enters->next())
	{
		$uid = $row['userid'];
		if($row['command'] == 'rmu')
		{
			foreach($enters as $roomid => $rooms)
			{
				foreach($rooms as $u_id => $sessions)
				{
					foreach($sessions as $k => $v)
					{
						if(isset($k) && $u_id == $uid)
						{
							$enters[$roomid][$u_id][$row['created']] = '0';
						}
					}
				}
			}
		}
		elseif($row['command'] == 'mvu')
		{
			foreach($enters as $roomid => $rooms)
			{
				foreach($rooms as $u_id => $sessions)
				{
					foreach($sessions as $k => $v)
					{
						if(isset($k) && $u_id == $uid)
						{
							$enters[$roomid][$u_id][$row['created']] = '#'.$row['userid'];
							$enters[$row['roomid']][$u_id][$row['created']] = '1';
						}
					}
				}
			}
		}
		if($row['command'] == 'adu')
		{
			$enters[$row['roomid']][$uid][$row['created']] = '1';
		}
	}

	return $enters;
}
function getMessages($start, $end, $roomid)
{
	global $_REQUEST, $GLOBALS;

	if($end == 0) $end = date('Y-m-d G:i:s', time());
	$query = 'SELECT `roomid`, `userid`, `txt`, `command`, `created`, '.$GLOBALS['fc_config']['db']['pref'].'users.login '.
			'FROM `'.$GLOBALS['fc_config']['db']['pref'].'messages` LEFT JOIN `'.$GLOBALS['fc_config']['db']['pref'].'users` ON ('.$GLOBALS['fc_config']['db']['pref'].'messages.userid = '.$GLOBALS['fc_config']['db']['pref'].'users.id) '.
			'WHERE ((`roomid` = ? AND `command` IN ("msg", "adu") AND (`created` >= ? AND `created` <= ?)) OR (`roomid` IS NULL AND `command` = "rmu") AND (`created` >= ? AND `created` <= ?))';

	$statement = new Statement($query, 173);
	$result = $statement->process($roomid, $start, $end, $start, $end, $roomid);

	$res = array();
	$j = 0;
	$enters = getEnters();
	while($row = $result->next())
	{
		if($row['command'] == 'msg')
		{
			$res[$j]['name'] = $row['login'];
			$res[$j]['txt'] = $row['txt'];
		}
		if(isset($enters[$roomid][$row['userid']][$row['created']]))
		{
			if($enters[$roomid][$row['userid']][$row['created']] == '1')
			{
				$res[$j]['name'] = $row['login'];
				$res[$j]['txt'] = 'logged in';
			}
			elseif($enters[$roomid][$row['userid']][$row['created']] == '0')
			{
				$res[$j]['name'] = $row['login'];
				$res[$j]['txt'] = 'logged out';
			}
			elseif(substr($enters[$roomid][$row['userid']][$row['created']], 0, 1) == '#')
			{
				$initid = substr($enters[$roomid][$row['userid']][$row['created']], 1);
				if($row['created'] <= $start && $row['created'] <= $end)
				{
					$res[$j]['name'] = $row['login'];
					$res[$j]['txt'] = $initid;
				}
			}
		}
		$j++;
		if(count($res) >= $_REQUEST['msg2show'])
		{
			return $res;
		}
	}
	return $res;
}
$urs = ChatServer::getUsers();

$user_array = array();
if(is_array($urs))
{
	foreach($urs as $k => $rec)
	{
		$user_array[$k] = $rec;
	}
}
else
{
	while($rec = $urs->next())
	{
		$user_array[] = $rec;
	}
}

if($GLOBALS['fc_config']['enableBots'])
{
	$GLOBALS['fc_config']['bot']->getUsersIntoArray($user_array);
}
$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms', 55);
$result = $stmt->process();
$rooms_filter = array();
while($row = $result->next())
{
	$rooms_filter[$row['id']] = $row['name'];
}

$query = 'SELECT `created`, `roomid`, `userid` FROM `'.$GLOBALS['fc_config']['db']['pref'].'messages` WHERE `roomid` IN ( SELECT `id` FROM `'.$GLOBALS['fc_config']['db']['pref'].'rooms` ) AND (`command`="adu" OR `command`="mvu") AND `toconnid` IS NULL';

$sttest = new Statement($query, 171);
$result = $sttest->process();
if($result->numRows != 0)
{
while($row = $result->next())
{
	$opened_rooms[$row['created']] = $row;
	foreach($opened_rooms as $k => $v)
	{
		if($v['userid'] == $row['userid']) $opened_rooms[$row['created']]['limit']++;
	}
	$query = 'SELECT `created`, `userid` FROM `'.$GLOBALS['fc_config']['db']['pref'].'messages` WHERE `userid`=? AND (`command`="rmu" OR `command`="mvu") LIMIT '.($opened_rooms[$row['created']]['limit'] - 1).', 1';

	$sttest = new Statement($query, 172);
	$result_exit = $sttest->process($row['userid'], $opened_rooms[$row['created']]['limit'] - 1);
	while($row_exit = $result_exit->next())
	{
		if($row_exit['userid'] == $row['userid'] && strtotime($row_exit['created']) >= strtotime($row['created']))
		{
			$opened_rooms[$row['created']] ['exit'] = $row_exit['created'];
		}
	}
}
$rooms = array();
$max_date = mktime(0, 0, 0, 1, 1, 2010);

foreach($opened_rooms as $k => $v)
{
	$rooms[$v['roomid']][$v['created']][$v['userid']] = '1';
	if(!isset($v['exit']))
	{
		$max_date = $max_date - 60;
		$v['exit'] = date('Y-m-d G:i:s', $max_date);
	}
	$rooms[$v['roomid']][$v['exit']][$v['userid']] = '0';
}

$final_rooms = array();
$i = 0;
$j = 0;
$tmp = array();
foreach($rooms as $roomid => $v)
{
	$tmp []= $roomid;
}
foreach($tmp as $k => $v)
{
	ksort($rooms[$v]);
}
if(!isset($_REQUEST['from']) || isset($_REQUEST['clear']))
{
	reset($opened_rooms);
	$_REQUEST['from'] = key($opened_rooms);
}
if(!isset($_REQUEST['to']) || isset($_REQUEST['clear']))
{
	$_REQUEST['to'] = date('Y-m-d G:i:s', time());
}
foreach($rooms as $roomid => $enters)
{
	foreach($enters as $times => $uid)
	{
		if($i == 0)
		{
			$final_rooms[$roomid][$j]['initiatorid'] = key($uid);
			$final_rooms[$roomid][$j]['start'] = $times;
		}
		if($uid[key($uid)] == '1')
		{
			$i++;
		}
		elseif($uid[key($uid)] == '0')
		{
			$i--;
			if($i == 0)
			{
				$final_rooms[$roomid][$j]['end'] = $times;
				$j++;
			}
		}
	}
}
$initiators = array();
$moderators = array();
$dispchats = array();
$j = 0;
$rooms_filter = array_flip($rooms_filter);
foreach($final_rooms as $roomid => $values)
{
	if($_REQUEST['roomid'] == 0 || $_REQUEST['roomid'] == $roomid)
	{
		foreach($values as $key => $val)
		{
			if(strtotime($val['end']) >= $max_date)
			{
				$val['end'] = 0;
			}
			if(strtotime($_REQUEST['from']) <= strtotime($val['start']) && strtotime($val['end']) <= strtotime($_REQUEST['to']))
			{
				if($_REQUEST['initiatorid'] == 0 || $_REQUEST['initiatorid'] == $val['initiatorid'])
				{
					if($_REQUEST['moderatorid'] == 0)
					{
						foreach($user_array as $k => $v)
						{
							if($val['initiatorid'] == $v['id'])
							{
								$dispchats [$j]['initiatorlogin'] = $v['login'];
								if($v['roles'] == ROLE_ADMIN || $v['roles'] == ROLE_MODERATOR)
								{
									$dispchats [$j]['moderatorid'] = $v['id'];
									$dispchats [$j]['moderatorlogin'] = $v['login'];
								}
							}
						}
						$dispchats [$j]['start'] = $val['start'];
						$dispchats [$j]['initiatorid'] = $val['initiatorid'];
						$dispchats [$j]['roomid'] = $roomid;
						$dispchats [$j]['roomname'] = array_search($roomid, $rooms_filter);
						if($val['end'] == 0)
						{
							$dispchats [$j]['end'] = 'in progress...';
						}
						else
						{
							$dispchats [$j]['end'] = $val['end'];
						}
						$dispchats [$j]['messages'] = getMessages($val['start'], $val['end'], $roomid);
					}
					else
					{
						$t = false;
						foreach($user_array as $k => $v)
						{
							if($val['initiatorid'] == $v['id'])
							{
								if($v['roles'] == ROLE_ADMIN || $v['roles'] == ROLE_MODERATOR)
								{
									if($_REQUEST['moderatorid'] == $v['id'])
									{
										$dispchats [$j]['moderatorid'] = $v['id'];
										$dispchats [$j]['moderatorlogin'] = $v['login'];
										$t = true;
									}
								}
								if($t) $dispchats [$j]['initiatorlogin'] = $v['login'];
							}
						}
						if($t) $dispchats [$j]['start'] = $val['start'];
						if($t) $dispchats [$j]['initiatorid'] = $val['initiatorid'];
						if($t) $dispchats [$j]['roomid'] = $roomid;
						if($t) $dispchats [$j]['roomname'] = array_search($roomid, $rooms_filter);
						if($val['end'] == 0)
						{
							if($t) $dispchats [$j]['end'] = 'in progress...';
						}
						else
						{
							if($t) $dispchats [$j]['end'] = $val['end'];
						}
						if($t) $dispchats [$j]['messages'] = getMessages($val['start'], $val['end'], $roomid);
					}
					$j++;
				}
				foreach($user_array as $k => $v)
				{
					if($val['initiatorid'] == $v['id'])
					{
						$initiators[$v['id']] = $v['login'];
						if($v['roles'] == ROLE_ADMIN || $v['roles'] == ROLE_MODERATOR)
						{
							$moderators[$v['id']] = $v['login'];
						}
					}
				}
			}
		}
	}
}
$rooms_filter = array_flip($rooms_filter);


if ($_REQUEST['sort'] != 'none')
{
	sort_table($_REQUEST['sort'], $dispchats);
}
}
else
{
	$_REQUEST['from'] = date('Y-m-d G:i:s', time() - 86400);
	$_REQUEST['to'] = date('Y-m-d G:i:s', time());
}
$query = 'SELECT `txt`, `created`, '.$GLOBALS['fc_config']['db']['pref'].'users.login, `touserid` '.
			'FROM `'.$GLOBALS['fc_config']['db']['pref'].'messages` LEFT JOIN `'.$GLOBALS['fc_config']['db']['pref'].'users` ON ('.$GLOBALS['fc_config']['db']['pref'].'messages.userid = '.$GLOBALS['fc_config']['db']['pref'].'users.id) '.
			'WHERE `roomid` IS NULL AND `command` = "msg" ORDER BY `created`';

$statement = new Statement($query, 175);
$result = $statement->process();
$private_messages = array();
while($row = $result->next())
{
	$row['touserid'] = $user_array[$row['touserid']]['login'];
	$private_messages []= $row;
}
//Assign Smarty variables and load the admin template
$smarty->assign('rooms', $rooms_filter);
$smarty->assign('moderators',$moderators);
$smarty->assign('initiators',$initiators);
$smarty->assign('chats',$dispchats);
$smarty->assign('private',$private_messages);
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['chatlist.tpl']);
$smarty->display('chatlist.tpl');

?>