<?php
	//---
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');

	$GLOBALS['my_file_name'] = 'loadAvatarBg';

	// Report all errors except E_NOTICE

	require_once('inc/smartyinit.php');
	$setTheme = $_REQUEST['theme'];

	$upldir = './temp/images/cust_img/';
	//---
	//delete_old_files($upldir);//delete old files
	//---
	$req = array_merge($_GET, $_POST);

	//---
	//---
	if(!$req['connid'] || !$req['userid']) die;
	//---

	//setup language
	$lang = $GLOBALS['fc_config']['languages'][$req['lang']];
	if(!isset($lang['dialog']['loadavatarbg'])) $lang = $GLOBALS['fc_config']['languages']['en'];
	//---

	//-------------------------------------------------
	//get file
	//-------------------------------------------------
	$errmsg = '';
	if( isset($_POST['submit']) && !empty( $_FILES['file']['tmp_name'] ))//file is Uploaded
	{

		$f = $_FILES['file'];
		$pathinfo = pathinfo( $f['name'] );

		$alow_ext = trim(strtolower( $GLOBALS['fc_config']['avatarbgloading']['allowFileExt']));
		$ext = explode(',', $alow_ext );

		if( $f['error'] != 0){ $errmsg = $lang['dialog']['common']['upl_error']; }
		elseif( $alow_ext != '' && !in_array(strtolower( $pathinfo['extension'] ), $ext) )
		{	//error not allowed extension
			$errmsg =  $lang['dialog']['common']['ext_not_allowed'];
			$errmsg = str_replace('FILE_EXT', strtoupper($pathinfo['extension']), $errmsg );
			$errmsg = str_replace('ALLOWED_EXT', strtoupper($alow_ext), $errmsg );
		}
		elseif( $f['size'] > $GLOBALS['fc_config']['avatarbgloading']['maxFileSize'] )
		{	//file too big
			$errmsg = $lang['dialog']['common']['size_too_big'];
		}


		if($errmsg != '')
		{
			//echo "<script>alert('$errmsg');</script>";
		}
		else
		{
			$fname =  $upldir . $f['name'];

			//if( file_exists($fname) )
			$fname = $upldir . basename($pathinfo['basename'], ".{$pathinfo['extension']}")  .'_'. time(). rand() . '.' . $pathinfo['extension'];

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
				}
				else
				{
					$message = new Message('load_av_bg', $req['userid'], null, '');

					//set target
					$message->touserid = $req['userid'];
					$message->txt = "$fname!#@#!{$_POST['RB_CHOICE']}";
				}

				//---- chat part
				$messageQueue = new MessageQueue();
				//---send message
				$messageQueue->addMessage($message);
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
			if($GLOBALS['fc_config']['avatarbgloading']['maxFileHoursLife'] < $fdif)
			{
				unlink($fname);
			}
		}
		$d->close();
	}

//---------------------------------------------
//---calculate max file size
//---------------------------------------------
	$post_max_size = ini_get('post_max_size') * 1024 * 1024;
	$upload_max_filesize = ini_get('upload_max_filesize') * 1024 * 1024;
	$defined_max_size = $GLOBALS['fc_config']['avatarbgloading']['maxFileSize'];

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
	$data['win_title'] = $lang['dialog']['loadavatarbg']['win_title'];
	$data['not_errmsg'] = ($errmsg != '');
	$data['errmsg'] = $errmsg;
	$data['win_choose'] = str_replace('MAX_SIZE', convertSize($maxSize) , $lang['dialog']['common']['win_choose']);
	$data['maxSize'] = $maxSize;
	$data['file_info'] = $lang['dialog']['loadavatarbg']['file_info'];

	if(trim($GLOBALS['fc_config']['avatarbgloading']['allowFileExt']) != '')
    {
		$ext = explode(',', trim($GLOBALS['fc_config']['avatarbgloading']['allowFileExt']) );
		$ext = strtoupper( implode(', ', $ext ) );
		$data['file_info'] = str_replace('ALLOWED_EXT', $ext, $lang['dialog']['loadavatarbg']['file_info']);
	}

	$data['use_label'] = $lang['dialog']['loadavatarbg']['use_label'];
	$data['rb_mainchat_avatar'] = $lang['dialog']['loadavatarbg']['rb_mainchat_avatar'];
	$data['rb_roomlist_avatar'] = $lang['dialog']['loadavatarbg']['rb_roomlist_avatar'];
	$data['rb_mc_rl_avatar'] = $lang['dialog']['loadavatarbg']['rb_mc_rl_avatar'];
	$data['rb_this_theme'] = $lang['dialog']['loadavatarbg']['rb_this_theme'];
	$data['rb_all_themes'] = $lang['dialog']['loadavatarbg']['rb_all_themes'];
	$data['win_upl_btn'] = $lang['dialog']['common']['win_upl_btn'];

	$data['pls_select_file'] = $lang['dialog']['common']['pls_select_file'];
	$data['allowFileExt'] = trim(strtoupper( $GLOBALS['fc_config']['avatarbgloading']['allowFileExt']));
	$ext = explode(',', trim($GLOBALS['fc_config']['avatarbgloading']['allowFileExt']) );
	$ext = strtoupper( implode(', ', $ext ) );
	$data['ext_not_allowed'] = str_replace('ALLOWED_EXT', $ext, $lang['dialog']['common']['ext_not_allowed']);

	$smarty->assign('data', $data);
	$smarty->display('load_avatar_bg.tpl');

?>