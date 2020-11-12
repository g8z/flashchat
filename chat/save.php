<?php
	$GLOBALS['my_file_name'] = 'save';


	require_once('inc/common.php');

	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');

	$req = array_merge($_GET, $_POST);

	// ajax skin fix. artemK0
	$isAjax = isset($_GET['notifColor']) ? true : false;
	// end of fix

	$theme = $_REQUEST['theme'];
	$conn =& ChatServer::getConnection($req);
	$mqi = $conn->process($req);

	$users = array();
	$rooms = array();

	function getLocalMessage($messageid, $lang = null)
	{
		if(!isset($lang))
			$lang = $GLOBALS['fc_config']['defaultLanguage'];

		$msg = $GLOBALS['fc_config']['languages'][$lang]['messages'][$messageid];

		if(!$msg)
			$msg = $GLOBALS['fc_config']['languages'][$GLOBALS['fc_config']['defaultLanguage']]['messages'][$messageid];

		if(!$msg)
			$msg = $GLOBALS['fc_config']['languages']['en']['messages'][$messageid];

		return $msg;
	}

	function parseMessage($msg, $userLabel, $roomLabel, $timestamp)
	{
		global $users, $rooms;

		$search = array(
			'USER_LABEL',
			'ROOM_LABEL',
			'TIMESTAMP'
		);

		$replace = array(
			$userLabel,
			$roomLabel,
			$timestamp
		);

		return str_replace($search, $replace, $msg);
	}

	function formatMessage($msg, $userLabel = '', $roomLabel = '', $timestamp = '')
	{
		// ajax skin fix. artemK0
		global $isAjax;
		$color = $isAjax ? $_GET['notifColor'] : htmlColor($GLOBALS['fc_config']['themes'][$_REQUEST['theme']]['enterRoomNotify']);
		// end of fix
		return "<font color=\"$color\">" . parseMessage($msg, $userLabel, $roomLabel, $timestamp) . '</font><br>';
	}
?>
<html>
	<head>
		<title>Chat log</title>
		<meta http-equiv=Content-Type content="text/html;  charset=UTF-8">
	</head>

	<style type="text/css">
		<!--
		BODY {
			font-family: <?php printf($req['font'])?>, Verdana, Arial, Helvetica, sans-serif;
			font-size: <?php printf($req['size'])?>px;
		}
		-->
	</style>


	<body bgcolor="<?php
						// ajax skin fix. artemK0
						$color = $isAjax ? $_GET['theme'] : htmlColor($GLOBALS['fc_config']['themes'][$theme]['publicLogBackground']);
						// end of fix
	printf($color);
	?>" onLoad="window.focus()">
		<?php
			while($mqi->hasNext()) {
				$m = $mqi->next();
//				echo '<pre>';print_r($m);
				$m->created = format_Timestamp($m->created, $conn->tzoffset);

				switch($m->command) {
					case 'msgu':
					case 'msgb':
					case 'msg':
						if ($users[$m->userid] == null) break;
						$color = ($m->command != 'msg')?htmlColor($GLOBALS['fc_config']['themes'][$theme]['enterRoomNotify']):$users[$m->userid][2];
						$login = $users[$m->userid][0];

						if($m->touserid)
							$login .= "->{$users[$m->touserid][0]}";

						printf("<font color=\"$color\">");

						$msgLabel = $GLOBALS['fc_config']['labelFormat'];
						$replace_pairs = array( 'AVATAR' => '',
												'USER' => $login,
												'TIMESTAMP' => $m->created,
											  );
						$msgLabel = strtr ( $msgLabel, $replace_pairs);
						printf($msgLabel);

						$replace_pairs = array( '&amp;apos;' => "'",
													'&lt;' => '<',
													'&gt;' => '>',
													'&amp;' => '&',
													'&nbsp;' => ' '
												  );
						$str = strtr ( $m->txt, $replace_pairs).'</font><br/>';
						$str = str_replace('<br>', '<br>'.$GLOBALS['fc_config']['linebreaktext'], $str);

						if(strpos($str, $GLOBALS['fc_config']['badWordSubstitute']) === false)
						{
							printf($str);
						}
						else
						{
							echo $str;
						}

						break;
					case 'adu':
						$stmt = new Statement('SELECT `password` FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id=?', 84);
						$users[$m->userid] = array($m->txt, $m->roomid, htmlColor($GLOBALS['fc_config']['themes'][$theme]['recommendedUserColor']));
						if($rs = $stmt->process($m->roomid))
						{
							while($rec = $rs->next())
							{
								if($rec['password'] == '')
								{
									if(isset($users[$conn->userid]) && $users[$conn->userid][1] == $m->roomid)
									{
										printf(formatMessage(getLocalMessage(($m->userid == $conn->userid)?'selfenterroom':'enterroom', $conn->lang), $users[$m->userid][0], $rooms[$m->roomid], $m->created));
									}
								}
							}
						}
						break;
					case 'uclc':

						$users[$m->userid][2] = dechex($m->txt);

						$dig_count = strlen($users[$m->userid][2]);

						if($dig_count<6)
						{
							$i=6-$dig_count;
							$to_add = '';
							while($i>0)
							{
								$to_add .= '0';
								$i--;
							}
							$users[$m->userid][2] = $to_add.$users[$m->userid][2];
						}

						break;
					case 'mvu':
						if($m->userid == $conn->userid) {
							printf(formatMessage(getLocalMessage('selfenterroom', $conn->lang), $users[$m->userid][0], $rooms[$m->roomid], $m->created));
						} else {
							if($m->roomid == $users[$conn->userid][1]) {
								printf(formatMessage(getLocalMessage('enterroom', $conn->lang), $users[$m->userid][0], $rooms[$m->roomid], $m->created));
							} else {
								printf(formatMessage(getLocalMessage('leaveroom', $conn->lang), $users[$m->userid][0], $rooms[$users[$conn->userid][1]], $m->created));
							}
						}
					    $users[$m->userid][1] = $m->roomid;
						break;
					case 'rmu':
						printf(formatMessage(getLocalMessage('leaveroom', $conn->lang), $users[$m->userid][0], $rooms[$users[$conn->userid][1]], $m->created));
						break;
					case 'adr':
						$rooms[$m->roomid] = $m->txt;
						break;
					case 'error':
						//printf(formatMessage(getLocalMessage($m->txt, $conn->lang), $users[$m->userid][0], $rooms[$users[$conn->userid][1]], $m->created));
						break;
					case 'back':
						printf(formatMessage('/back '.$m->roomid));
						break;
					case 'backt':
						printf(formatMessage('/backtime '.$m->roomid));
						break;
				}
			}

		?>
	</body>
</html>