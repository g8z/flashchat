<?php
	//---
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s').' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');

	// Report all errors except E_NOTICE

	$GLOBALS['my_file_name'] = 'sharefile';

	require_once('inc/smartyinit.php');
	$setTheme = $_REQUEST['theme'];
	$upldir = './temp/uploaddir/';
	//---
	delete_old_files($upldir);//delete old files
	//---
	$req = array_merge($_GET, $_POST);

	//---
	if(!$req['connid'] || !$req['userid']) die;
	//---

	//setup language
	$lang = $GLOBALS['fc_config']['languages'][$req['lang']];
	if(!isset($lang['dialog']['sharefile'])) $lang = $GLOBALS['fc_config']['languages']['en'];
	//---

	//-------------------------------------------------
	//get file
	//-------------------------------------------------
	$errmsg = '';
	$f = $_FILES['file'];

	if( $f['error'] != 0 ){ $errmsg = $lang['dialog']['common']['upl_error']; }

	if( isset($_POST['submit']) && !empty( $f['tmp_name'] ) && $errmsg == '' && strpos( strtolower( $f['name'] ), '.php') === false )//file is Uploaded
	{

		$pathinfo = pathinfo( $f['name'] );

		$alow_ext = trim(strtolower( $GLOBALS['fc_config']['filesharing']['allowFileExt']));
		$ext = explode(',', $alow_ext );

		if( $alow_ext != '' && !in_array(strtolower( $pathinfo['extension'] ), $ext) )
		{	//error not allowed extension
			$errmsg =  $lang['dialog']['common']['ext_not_allowed'];
			$errmsg = str_replace('FILE_EXT', strtoupper($pathinfo['extension']), $errmsg );
			$errmsg = str_replace('ALLOWED_EXT', strtoupper($alow_ext), $errmsg );
		}
		elseif( $f['size'] > $GLOBALS['fc_config']['filesharing']['maxFileSize'] )
		{	//file too big
			$errmsg = $lang['dialog']['common']['size_too_big'];
		}


		if($errmsg != '')
		{
			//echo "<script>alert('$errmsg');</script >";
		}
		else
		{
			$fname =  $upldir . $f['name'];

			//if( file_exists($fname) )
			$fname = $upldir . basename($pathinfo['basename'], '.'.$pathinfo['extension'] )  .'_'. time(). rand() . '.' . $pathinfo['extension'];

			//move file do upl dir
			if(move_uploaded_file($f['tmp_name'], $fname) === false)
			{
				$errmsg = $lang['dialog']['common']['upl_error'];
			}
			else
			{
				if(is_script($fname))
				{
					$message = new Message('error', $req['userid'], $req['roomid'], '');
					$message->touserid = $req['userid'];
					$message->txt = 'securityrisk';
					@unlink( $fname );
				}
				else
				{
					chmod(''.$fname, 0444);
					//---- chat part
					$message = new Message('fileshare', $req['userid'], $req['roomid'], '');

					//set target
					switch( $req['touser_id'] )
					{
					
						case -1 : $message->toconnid = null;$message->touserid = null;$message->toroomid = null;break;//send to chat
						case  0 : $message->toroomid = $req['roomid'];break;//send to room
						default : $message->touserid = $req['touser_id'];break;
					}
					$req['touser'] = $req['touser_id'];

					//set message text
					$usr = ChatServer::getUser($req['userid']);
					$usr_name = $usr['login'];
					$old_val = array('USER_LABEL','F_NAME','F_SIZE');
					$new_val = array($usr_name, $f['name'], convertSize($f['size']));
					$label = str_replace($old_val, $new_val, $lang['dialog']['sharefile']['usr_message']);

					$message->txt = $label.'!#@#!'.$fname.'!#@#!'.$req['userid'].'!#@#!'.$req['touser'];
				}

				//---send message
				if( $GLOBALS['fc_config']['enableSocketServer'] )
				{
					$service_port = $GLOBALS['fc_config']['socketServer']['port'];

					/* Get the IP address for the target host. */
					$address = gethostbyname($GLOBALS['fc_config']['socketServer']['host']);

					$socket = socket_create(AF_INET, SOCK_STREAM, 0);

					if ($socket < 0) {
					} else {
					}

					$result = socket_connect($socket, $address, $service_port);
					if ($result < 0) {
					} else {
					}

					$in = $message->toXML();

					if ($GLOBALS['fc_config']['javaSocketServer'])
					    socket_write($socket, $in."\0", strlen($in)+1);
					else
						socket_write($socket, $in, strlen($in));

					socket_close($socket);
				}
				else
				{
					$messageQueue = new MessageQueue();
					$messageQueue->addMessage( $message );
				}
				//---
				echo '<script>window.close();</script>';
				exit();
			}
		}

	}

	//---
	ChatServer::purgeExpired();//clear DB
	$usr = ChatServer::getUser($req['userid']);

	$users = array();
	if($GLOBALS['fc_config']['filesharing']['allowShareChat'] === true || $usr['roles'] == ROLE_ADMIN)
	{
		$users[-1] = $lang['dialog']['sharefile']['chat_users'];
	}
	if($GLOBALS['fc_config']['filesharing']['allowShareRoom'] === true || $usr['roles'] == ROLE_ADMIN)
	{
		$users[0] = $lang['dialog']['sharefile']['all_users'];
	}

	$users = $users + usersinroom($req['roomid']);//get users list

	if( !isset($users[$req['toid']]) )//user from other room
	{
		$usr2 = ChatServer::getUser($req['toid']);
		$users[$req['toid']] = $usr2['login'];//fix for user from other room
	}
	//---

	function usersinroom( $room = '' )
	{
		$list = array();

		if($room) {
			$stmt = new Statement('SELECT userid, state, color, lang, roomid FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid IS NOT NULL AND roomid=?' , 216);
			$rs = $stmt->process($room);
		} else {
			$stmt = new Statement('SELECT userid, state, color, lang, roomid FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid IS NOT NULL',217);
			$rs = $stmt->process();
		}

		while($rec = $rs->next()) $list[] = array_merge(ChatServer::getUser($rec['userid']), $rec);

		$ret = array();
		foreach( $list as $v=>$k ) $ret[$k['userid']] = $k['login'];

		return $ret;
	}
	//-------------------------------------------------
	//generate html combo
	//-------------------------------------------------
	function htmlSelect($name, $arr, $selected, $addprop='')
	{
		$ret = '<SELECT name="'.$name.'" '.$addprop.'>';

		foreach($arr as $k=>$v)
		{
			if($selected == $k)
				$sel = 'SELECTED';
			else
				$sel = '';

			if ( trim( $v ) )
				$ret .= "<option value=\"$k\" $sel>$v";
		}

		$ret .=	"</SELECT>";

		return $ret;
	}
	//---
	//-------------------------------------------------
	//delete old files
	//-------------------------------------------------
	function delete_old_files($dir)
	{
		$d = dir($dir);

		while (false !== ($entry = $d->read()))
		{
			$fname = $dir.$entry;
			if ($entry == '.' || $entry == '..' || !is_file($fname) || $entry == 'index.html') continue;

			$fdif = (time() - filemtime($fname))/(60*60);
			if($GLOBALS['fc_config']['filesharing']['maxFileHoursLife'] < $fdif)
			{
				@unlink($fname);
			}
		}
		$d->close();
	}

//---------------------------------------------
//---calculate max file size
//---------------------------------------------
	$post_max_size = ini_get('post_max_size') * 1024 * 1024;
	$upload_max_filesize = ini_get('upload_max_filesize') * 1024 * 1024;
	$defined_max_size = $GLOBALS['fc_config']['filesharing']['maxFileSize'];

	$maxSize =	min( $post_max_size, $upload_max_filesize, $defined_max_size ) ;

	function convertSize( $size )
	{
		if( $size < 1024) return $size.' Bytes';
		if( $size > 1024*1024) return round($size/(1024*1024),2).' MB';

		return round($size/1024, 2).' KB';
	}

	$data = array();
	$data['version'] = $GLOBALS['fc_config']['version'];
	$data['fileshare'] = $lang['usermenu']['fileshare'];
	$data['bodyText'] = htmlColor($GLOBALS['fc_config']['themes'][$setTheme]['bodyText']);
	$data['publicLogBackground'] = htmlColor($GLOBALS['fc_config']['themes'][$setTheme]['publicLogBackground']);
	$data['themebg'] = dechex($data['publicLogBackground']);
	$data['not_errmsg'] = ($errmsg != '');
	$data['errmsg'] = str_replace('MAX_SIZE', convertSize($maxSize) , $errmsg);
	$data['win_choose'] = str_replace('MAX_SIZE', convertSize($maxSize) , $lang['dialog']['common']['win_choose']);
	$data['maxSize'] = $maxSize;
	$data['file_info_size'] = str_replace('MAX_SIZE', convertSize($maxSize) , $lang['dialog']['sharefile']['file_info_size']);

	$data['file_info_ext'] = '';
	if(trim($GLOBALS['fc_config']['filesharing']['allowFileExt']) != '')
    {
		$ext = explode(',', trim($GLOBALS['fc_config']['filesharing']['allowFileExt']) );
		$ext = strtoupper( implode(', ', $ext ) );
		$data['file_info_ext'] = str_replace('ALLOWED_EXT', $ext, $lang['dialog']['sharefile']['file_info_ext']);
	}

	$data['win_share_only'] = $lang['dialog']['sharefile']['win_share_only'];
	$data['touser'] = htmlSelect('touser_id', $users, $req['toid'], '');
	$data['win_upl_btn'] = $lang['dialog']['common']['win_upl_btn'];
	$data['req'] = $req;

	$data['pls_select_file'] = $lang['dialog']['common']['pls_select_file'];
	$data['allowFileExt'] = trim(strtoupper( $GLOBALS['fc_config']['filesharing']['allowFileExt']));
	$ext = explode(',', trim($GLOBALS['fc_config']['filesharing']['allowFileExt']) );
	$ext = strtoupper( implode(', ', $ext ) );
	$data['ext_not_allowed'] = str_replace('ALLOWED_EXT', $ext, $lang['dialog']['common']['ext_not_allowed']);

	$smarty->assign('data', $data);
	$smarty->display('sharefile.tpl');

?>

