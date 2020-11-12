<?php
	//---
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');

	$GLOBALS['my_file_name'] = 'load_photo';

	// Report all errors except E_NOTICE
	require_once('inc/smartyinit.php');
	$setTheme = $_REQUEST['theme'];
	$upldir = './temp/nick_image/';
	//---
	//delete_old_files($upldir);//delete old files
	//---
	$req = array_merge($_GET, $_POST);

	//---
	if( !$req['connid'] || !$req['userid'] )
		die;
	//---

	//setup language
	$lang = $GLOBALS['fc_config']['languages'][$req['lang']];
	if(!isset($lang['dialog']['loadphoto'])) $lang = $GLOBALS['fc_config']['languages']['en'];
	//---

	//-------------------------------------------------
	//get file
	//-------------------------------------------------
	$errmsg = '';
	if( isset($req['submit']) && !empty( $_FILES['file']['tmp_name'] ))//file is Uploaded
	{
		$f = $_FILES['file'];
		$pathinfo = pathinfo( $f['name'] );

		$alow_ext = trim(strtolower( $GLOBALS['fc_config']['photoloading']['allowFileExt']));
		$ext = explode(',', $alow_ext );

		if( $f['error'] != 0)
		{
			$errmsg = $lang['dialog']['common']['upl_error'];
		}
		elseif( $alow_ext != '' && !in_array(strtolower( $pathinfo['extension'] ), $ext) )
		{	//error not allowed extension
			$errmsg =  $lang['dialog']['common']['ext_not_allowed'];
			$errmsg = str_replace('FILE_EXT', strtoupper($pathinfo['extension']), $errmsg );
			$errmsg = str_replace('ALLOWED_EXT', strtoupper($alow_ext), $errmsg );
		}
		elseif( $f['size'] > $GLOBALS['fc_config']['photoloading']['maxFileSize'] )
		{	//file too big
			$errmsg = $lang['dialog']['common']['size_too_big'];
		}


		if($errmsg != '')
		{
			//echo "<script>alert('$errmsg');</script>";
		}
		else
		{
			//delete file with same name but different extention
			foreach($ext as $e)
			{
				$fname = $upldir . $req['userid']. '.' . $e;
				if(file_exists($fname))
					@unlink($fname);
			}

			$fname = $upldir . $req['userid']. '.' . $pathinfo['extension'];

			/*
			if( file_exists($fname) )
				$fname = $upldir . basename($pathinfo['basename'], ".{$pathinfo['extension']}")  .'_'. time(). '.' . $pathinfo['extension'];
			*/

			//move file do upl dir
			if( move_uploaded_file( $f['tmp_name'] , $fname ) === false )
			{
				$errmsg = $lang['dialog']['common']['upl_error'];
			}
			else
			{
				if( is_script($fname) )
				{
					$message = new Message('error', $req['userid'], $req['roomid'], '');
					$message->touserid = $req['userid'];
					$message->txt = 'securityrisk';
				}
				else
				{
					$message = new Message('load_photo', $req['userid'], null, '');

					//set target
					$message->touserid = $req['userid'];
					$message->txt = $fname;
				}


				if( $GLOBALS['fc_config']['enableSocketServer'] )
				{
					$service_port = $GLOBALS['fc_config']['socketServer']['port'];

					/* Get the IP address for the target host. */
					$address = gethostbyname($GLOBALS['fc_config']['socketServer']['host']);
					$socket = socket_create(AF_INET, SOCK_STREAM, 0);
					if ($socket < 0)
					{
					}
					else
					{
					}

					$result = socket_connect($socket, $address, $service_port);
					if ($result < 0)
					{
					}
					else
					{
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
				//---- chat part
				//$messageQueue = new MessageQueue();
				//---send message
				//$messageQueue->addMessage($message);
				//---
				echo '<script>window.close();</script>';
				exit();
			}
		}

	}

	//-------------------------------------------------
	//delete old files
	//-------------------------------------------------
	function delete_old_files($dir)
	{
		$d = dir($dir);

		while (false !== ($entry = $d->read()))
		{
			$fname = $dir.$entry;
			if ($entry == '.' || $entry == '..' || !is_file($fname) ) continue;

			$fdif = (time() - filemtime($fname))/(60*60);
			if($GLOBALS['fc_config']['photoloading']['maxFileHoursLife'] < $fdif)
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
	$defined_max_size = $GLOBALS['fc_config']['photoloading']['maxFileSize'];

	$maxSize =	min( $post_max_size, $upload_max_filesize, $defined_max_size ) ;

	function convertSize( $size )
	{
		if( $size < 1024) return $size.' Bytes';
		if( $size > 1024*1024) return round($size/(1024*1024),2).' MB';

		return round($size/1024, 2).' KB';
	}

	$data = array();

	$data['bodyText'] = htmlColor($GLOBALS['fc_config']['themes'][$setTheme]['bodyText']);
	$data['publicLogBackground'] = htmlColor($GLOBALS['fc_config']['themes'][$setTheme]['publicLogBackground']);
	$data['version'] = $GLOBALS['fc_config']['version'];
	$data['win_title'] = $lang['dialog']['loadphoto']['win_title'];
	$data['not_errmsg'] = ($errmsg != '');
	$data['errmsg'] = $errmsg;
	$data['win_choose'] = $lang['dialog']['common']['win_choose'];
	$data['maxSize'] = $maxSize;
	if($errmsg == $lang['dialog']['common']['size_too_big'])
	{
		$data['errmsg'] = str_replace('MAX_SIZE', $maxSize, $errmsg );
	}
	$data['win_upl_btn'] = $lang['dialog']['common']['win_upl_btn'];
	$data['pls_select_file'] = $lang['dialog']['common']['pls_select_file'];
	$data['allowFileExt'] = trim(strtoupper( $GLOBALS['fc_config']['photoloading']['allowFileExt']));
	$ext = explode(',', trim($GLOBALS['fc_config']['photoloading']['allowFileExt']) );
	$ext = strtoupper( implode(', ', $ext ) );
	$data['ext_not_allowed'] = str_replace('ALLOWED_EXT', $ext, $lang['dialog']['common']['ext_not_allowed']);
	$data['file_info'] = str_replace('ALLOWED_EXT', $ext, $lang['dialog']['loadphoto']['file_info']);

	$smarty->assign('data', $data);
	$smarty->display('load_photo.tpl');

?>

