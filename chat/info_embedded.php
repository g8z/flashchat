<?php

	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');


/**
If this file is not in the FlashChat root folder, then change this
path to the location of the inc/common.php file.
*/

$GLOBALS['my_file_name'] = 'info_embedded';

require_once('inc/common.php');

ChatServer::purgeExpired();

/**
Retrieves the number of users who are chatting in any room.
Leave the $room parameter empty to return the number of users in all room.
*/
function numusers( $room = '' )
{
	if($room)
	{
		$stmt = new Statement("SELECT COUNT(*) AS numb FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE userid IS NOT NULL AND userid <> ? AND roomid=?",214);
		$rs = $stmt->process( SPY_USERID , $room );
	}
	else
	{
		$stmt = new Statement("SELECT COUNT(*) AS numb FROM {$GLOBALS['fc_config']['db']['pref']}connections,{$GLOBALS['fc_config']['db']['pref']}rooms
							  WHERE userid IS NOT NULL AND userid <> ? AND ispublic IS NOT NULL
							  AND {$GLOBALS['fc_config']['db']['pref']}connections.roomid = {$GLOBALS['fc_config']['db']['pref']}rooms.id");
		$rs = $stmt->process( SPY_USERID );
	}

	$rec = $rs->next();
	return $rec?$rec['numb']:0;
}

/**
Retrieves a list of the users (by login ID) who are in $room.
Leave the $room parameter empty to return a list of all users in all rooms.
*/
function usersinroom( $room = '' )
{
	$list = array();

	if($room) {
		$stmt = new Statement("SELECT userid, state, color, lang, roomid FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE userid IS NOT NULL AND userid <> ?  AND roomid=?");
		$rs = $stmt->process( SPY_USERID , $room);
	} else {
		$stmt = new Statement("SELECT userid, state, color, lang, roomid FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE userid IS NOT NULL AND userid <> ? ");
		$rs = $stmt->process( SPY_USERID );
	}

	while($rec = $rs->next())
	{
		$usr = ChatServer::getUser($rec['userid']);
		if($usr == null && $GLOBALS['fc_config']['enableBots']) $usr = $GLOBALS['fc_config']['bot']->getUser($rec['userid']);
		$list[] = array_merge($usr, $rec);
	}


	return $list;
}

/**
Retrieves a list of all available rooms, as an array.
*/
function roomlist()
{
	$list = array();

	// populate $list with the names of all available rooms
	$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE ispublic IS NOT NULL order by ispermanent' , 54 );
	$rs = $stmt->process();

	while($rec = $rs->next()) $list[] = $rec;

	//result will be an array of arrays like ('id' => <room id>, 'updated' = <timestamp>, 'created' => <timestamp>, 'name' => <room name>, 'ispublic' => <public flag>, 'ispermanent' => <autoclose flag>)
	return $list;
}


$rooms = roomlist();
$roomnumb = sizeof($rooms);
$usernumb = numusers();
?>

<html>
<head>
<title>Who's in the chat?</title>
<meta http-equiv=Content-Type content="text/html;  charset=UTF-8">

<style type="text/css">
<!--

body { background-color: transparent; margin: 0; padding: 0; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: normal; font-size: 10px;}
....normal {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: normal;
	margin: 0; padding: 0;
        text-align: center;
}

#roomList { margin: 0; padding: 0; }
#roomList a { color: black; text-decoration: none; } #roomList a:hover { text-decoration: underline; }
....userList { margin-left: 7px; margin-right: 0; margin-bottom: 0; margin-top: 0;  padding: 0; }

-->
</style>
<script type="text/javascript">
function toggleUserList(id) {
   if (l = document.getElementById(id)) {
      if (l.style.display == '' || l.style.display == 'block') l.style.display = 'none';
      else l.style.display = 'block';
   }
   return false;
}

</script>
</head>
<body>
<p class=normal><?php echo $usernumb ?> user<?php if ($usernumb != 1) echo "s" ?> in <?php echo $roomnumb ?> room<?php if ($roomnumb != 1) echo "s"; ?>.</p>
<ul id="roomList">
<?php if($roomnumb) { ?>
		<?php foreach($rooms as $room) { ?>
				<li><strong><a href="#" onclick="javascript:toggleUserList('room_<?php echo $room['id']?>')"><?php echo $room['name']?> (<?php echo numusers($room['id']) ?>)</a></strong>
				<?php

					$users = usersinroom($room['id']);
                                        if ($users) {
                                          echo '<ul class="userList" id="room_'.$room['id'].'">';
                                          foreach( $users as $user ) {
					    echo '<li>'.$user['login'].'</li>';					  }
                                          echo '</ul>';
                                        }

				?> </li>
		<?php } ?>
<?php } ?>
</ul>

</body>
</html>



