<?php

header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

/**
If this file is not in the FlashChat root folder, then change this
path to the location of the inc/common.php file.
*/
require_once('inc/common.php');
ChatServer::purgeExpired();

/**
Retrieves the number of users who are chatting in any room.
*/
function numusers($room, $chatid = 1)
{
	$stmt = new Statement('SELECT COUNT(*) AS numb FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid IS NOT NULL AND roomid = ? AND instance_id = ?', 214);
	$rs = $stmt->process($room, $chatid);

	$rec = $rs->next();
	return $rec ? $rec['numb'] : 0;
}

/**
Retrieves a list of the users (by login ID) who are in $room.
*/
function usersinroom($room, $chatid = 1)
{
	$list = array();

	$stmt = new Statement('SELECT userid, state, color, lang, roomid FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid IS NOT NULL AND roomid = ? AND instance_id = ?', 231);
	$rs = $stmt->process($room, $chatid);

	while($rec = $rs->next())
	{
		if(ChatServer::userInRole($rec['userid'], ROLE_SPY))
		{
			$list []['login']= '#SPY#';
			continue;
		}

		$usr = ChatServer::getUser($rec['userid']);
		if($usr == null && $GLOBALS['fc_config']['enableBots'])
		{
			$usr = $GLOBALS['fc_config']['bot']->getUser($rec['userid']);
		}
		$list []= array_merge($usr, $rec);
	}

	return $list;
}

/**
Retrieves a list of all available rooms, as an array.
*/
function roomlist($chatid)
{
	$list = array();
	// populate $list with the names of all available rooms
	$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE ispublic IS NOT NULL AND instance_id =? order by ispermanent', 54);

	$rs = $stmt->process($chatid);

	while($rec = $rs->next()) $list[] = $rec;
	//result will be an array of arrays like ('id' => <room id>, 'updated' = <timestamp>, 'created' => <timestamp>, 'name' => <room name>, 'ispublic' => <public flag>, 'ispermanent' => <autoclose flag>)
	return $list;
}

/**
Get chats
*/
function chats()
{
	$chats = array();

	// populate $chats with the names of all available rooms
	$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'config_instances', 3);
	$rs = $stmt->process();

	while($rec = $rs->next()) $chats[] = $rec;

	return $chats;
}
//$chatid   = isset($_GET['cid'])? $_GET['cid'] : 1;
//$chatid = $_SESSION['session_chat'];
$chatid = 1;//default chat id =1

$chats    = chats();
$rooms    = roomlist($chatid);

$roomnumb = sizeof($rooms);
$usrnumb = 0;
$output = array();
foreach($rooms as $key => $room)
{
	$isSpy = false;
	$users = usersinroom($room['id'], $chatid);
	foreach($users as $user)
	{
		if($user['login'] != '#SPY#')
		{
			$output[$room['id']]['users'] []= strip_tags($user['login']);
		}
		else
		{
			$isSpy = true;
		}
	}

	$output[$room['id']]['name'] = strip_tags($room['name']);
	$output[$room['id']]['numUsers'] = numusers($room['id'], $chatid);
	if($isSpy) $output[$room['id']]['numUsers']--;

	$usrnumb += $output[$room['id']]['numUsers'];
}
ksort($output);
//echo '<pre>'; print_r($output); echo '</pre>';
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Who's in the chat?</title>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">

<style type="text/css">
<!--
.normal {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: normal;
}
A {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #0000FF;
}
A:hover {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FF0000;
}
-->
</style>
<script language='Javascript'>
<!--
	function fwd(url)
	{
		window.location.href = url;
	}
-->
</script>
</head>
	<body>
		<center>
		<p class="normal">There are <?php echo $usrnumb?> users in <?php echo $roomnumb?> rooms.</p>
		<?php if(count($chats) > 1) { ?>
			<table border="0" cellpadding="1" class="normal">
				<tr>
					<td><div align="left">Chat:</div></td>
					<td>
						<select name="chatid" onchange='javascript:fwd("info.php?session_inst=" + this.value);'>
						<?php foreach($chats as $k => $v) { ?>
							<option value="<?php echo $v['id']?>" <?php if($v['id'] == $chatid) echo 'selected'?>>
								<?php echo $v['name']?>
							</option>
						<?php } ?>
						</select>
					</td>
				</tr>
				<tr></tr>
			</table>
		<?php } ?>
		<?php if($roomnumb) { ?>
			<table border="1" cellpadding="1" class="normal">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Count</th>
					<th>Users</th>
				</tr>
				<?php foreach($output as $roomId => $room) { ?>
					<tr>
						<td><?php echo $roomId?></td>
						<td><?php echo $room['name']?></td>
						<td><?php echo $room['numUsers']?></td>
						<td><?php
						if(!isset($room['users'])) continue;
						foreach($room['users'] as $user)
						{
							echo $user . '<br>';
						}

						?> </td>
					</tr>
				<?php } ?>
			</table>
		<?php } ?>

		<p><a href="javascript:window.close()">Close</a></p>
		<center>
	</body>
</html>
