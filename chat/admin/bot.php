<?php
//echo "<pre>";print_r($_POST);echo "</pre>";exit;
require_once('init.php');

if(!inSession())
{
	include('login.php');
	exit;
}
//--------------------------------
// highlight page. artemK0
//--------------------------------
$bold = highlightPage(__FILE__);
$smarty->assign($bold[0], $bold[1]);
$smarty->assign('enableBots', $GLOBALS['fc_config']['enableBots']);
if(!$GLOBALS['fc_config']['enableBots'])
{
	$smarty->display('bot.tpl');
	exit;
}

function getUsers($assoc = false)
{
	$res = ChatServer::getUsers();

	if ($res == null || !isset($res)) return array();

	return $res;
}

function getRooms()
{
	$rooms = array();
	//changed on 090706 for chat instances
	/*$stmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}rooms WHERE ispublic IS NOT NULL AND ispermanent IS NOT NULL ORDER BY ispermanent");
	if($rs = $stmt->process())*/
	$stmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}rooms WHERE ispublic IS NOT NULL AND ispermanent IS NOT NULL and instance_id= ? ORDER BY ispermanent");
	if($rs = $stmt->process($_SESSION['session_inst']))
	//changed on 090706 for chat instances ends here
	{
		while($rec = $rs->next()) $rooms[$rec['id']] = $rec['name'];
	}

	return $rooms;
}

function getSmilies()
{
	$smilies = array();
	while (list($key, $val) = each($GLOBALS['fc_config']['smiles']))
	{
		$s = explode(' ', $val);
		$smilies[$key] =  $s[0];
	}

	return $smilies;
}

//-------------------------------------------------
//redirect
//-------------------------------------------------
function redirect2($url)
{
	echo '<script language="JavaScript" type="text/javascript">
				<!--// redirect
	  				window.location.href = "'.$url.'";
				//-->
			 </script>
		';

	die;
}

function setBot($user_id, $arr, $set_bot=array())
{
	if(count($set_bot) == 0) $bot = $GLOBALS['fc_config']['bot']->getBot($user_id);
	else $bot = $set_bot;

	$rec = $GLOBALS['fc_config']['bot']->getRecord();

	if($bot == null)  $bot = $GLOBALS['fc_config']['bot']->getRecord();
	while (list($key, $val) = each($bot))
	{
		if($arr[$key] != null)
		{
			switch($key)
			{
				case 'login' :
					$bot[$key] = stripslashes($arr[$key]);
					break;
				case 'roomid' :
					$rooms = array_flip(getRooms());
					$bot[$key] = $rooms[$arr[$key]];
					break;
				case 'chat_avatar' :
				case 'room_avatar' :
					if($arr[$key] != '--none--') $bot[$key] = $arr[$key];
					else $bot[$key] = '';
					break;
				case 'active_on_supportmode' :
				case 'active_on_no_moderators' :
				case 'active_on_no_bots' :
					if($arr[$key] == 'on') $bot[$key] = true;
					break;
				case 'active_on_min_users' :
					$bot[$key] = $arr[$key];
					break;
				case 'active_on_max_users' :
					if($arr[$key] < $GLOBALS['fc_config']['maxUsersPerRoom']) $bot[$key] = $arr[$key];
					else $bot[$key] = $GLOBALS['fc_config']['maxUsersPerRoom'] - 1;
					break;
				case 'active_on_user' :
					$users = getUsers(true);
					if($arr[$key] != '--none--') $bot[$key] = $users[$arr[$key]]['id'];
					else $bot[$key] = 0;
					break;
				case 'available_rooms' :
				case 'active_time' :
				case 'active_manual' :
					break;
			};
		}
		else if($key != 'botid' && $key != 'pass') $bot[$key] = $rec[$key];
	}

	//update bot
	$GLOBALS['fc_config']['bot']->setBot($user_id, $bot);

	return $bot;
}

$id    = null;
$bot   = null;

if(isset($_REQUEST['submit']))
{
	//add bot
	if($_REQUEST['id'] == 0)
	{
		 if(strlen(trim($_REQUEST['login'])) != 0)
		 {
		 	$user_id = $GLOBALS['fc_config']['bot']->getNextId();
		 	$res = $GLOBALS['fc_config']['bot']->connectUser2Bot($user_id, $_REQUEST['login']);
		 	if($res != false) $bot = setBot($user_id, $_REQUEST, $res);
		 	$id = $user_id;
		 }
	}
	//update bot
	else
	{
		$bot = setBot($_REQUEST['id'], $_REQUEST);
		$id = $_REQUEST['id'];
	}

	redirect2('botlist.php');
	die;
}

if($id  == null) $id = $_GET['id'];
if($bot == null) $bot = $GLOBALS['fc_config']['bot']->getBot($id);
if($bot == null) $bot = $GLOBALS['fc_config']['bot']->getRecord();

$bot_name = $GLOBALS['fc_config']['bot']->getUser($id);
$users = getUsers();
$rooms = getRooms();
$smilies = getSmilies();

$_REQUEST['id']    = $id;
$_REQUEST['login'] = htmlspecialchars($bot_name['login'], ENT_QUOTES);
$_REQUEST['bot']   = $bot;
$_REQUEST['users'] = $users;
$_REQUEST['rooms'] = $rooms;
$_REQUEST['smilies'] = $smilies;

$smarty->assign('_REQUEST', $_REQUEST);
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['bot.tpl']);
$smarty->display('bot.tpl');

?>