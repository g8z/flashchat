<?php
	require_once('./inc/smartyinit.php');
	  require_once( INC_DIR . 'classes/paypal/pp_functions.php' );

	//echo "</pre>";print_r($GLOBALS['fc_config']['fc_instance']);echo "</pre>";
	// ******** Start of customization variables
	$req = array_merge($_GET, $_POST);

    // added on 090706 for chat instances
	if(isset($_GET[from]))
    {
	  require_once( INC_DIR . 'classes/paypal/ipn_cls.php');
	  require_once( INC_DIR . 'classes/paypal/process_paypal.php' );

    }//if(isset($_GET[from]))
	// added on 090706 for chat instances



	define('CRLF', "\r\n");

	$enable_reg  = false;						// Enable registration options for admin/moderators and spies if set to true, set to false to disable these options

	$ext             = array('.gif', '.jpg', '.png', '.bmp');  // limit upload to these file types only
	$ufolder         = './temp/nick_image/';			// picture upload folder
	$max_file_size   = 500*1024;                // max picture file size in bytes
	$edit_allowed    = true;					// limitation for guest chatters (only show registered users if false) if FlashChat in two instance mode
	$pictureWidth    = 180;						// picture display width limit pixels
	$thumbWidth      = 90;						// thumbnail picture display width limit in gallery pixels
	$showAllProfiles = true;					// display list of links to all active profiles at each page
	$showGallery     = true;					// when displaying all profiles: use gallery style
	$FC_owner_email  = 'xyz@your_domain.com';	// FlashChat owner email address, set as sender/reply to in password change
	$FC_owner_name   = 'FlashChat Owner name';	// FlashChat owner name (link text)
	$pics_row	     = 4;						// number of pictures per row when in showGallery mode
	$default_country = 'USA';					// default country in english at registration (must be found in /chat/inc/country.inc
	$profiles_per_page = 50;					// visible profiles per page

	require_once('./profile/en.php');			//default language is en ie english
    if ($req['lang'] == 'xx')
		require_once('./profile/xx.php');		// replace xx with your language attribute and make available this file in /chat/profile directory
												// duplicate this /profile/en.php if you need more than two languages
												// remember UTF-8 characters but not for messages t23-t27 (error messages)
	$smarty->assign('msg', $msg);

	$gender_arr = array(
		'male'   => $msg['t102'],
		'female' => $msg['t103'],
		'other'  => $msg['t104']
	);
	// ******** End of customizations

	// ******** Begin of functions
	function send_style_sheet($msg) {
		$value = array(
			'msg' => $msg,
			'showBackground' => true, // set to true if you have a nice background to add
			'bgcolor' => '#eeeeee', // text background color leave empty (=> '';) for no color (transparent)
			//'bgcolor' => htmlColor($GLOBALS['fc_config']['themes'][$GLOBALS['fc_config']['defaultTheme']]['enterRoomNotify']),
			'bkgrnd' => $GLOBALS['fc_config']['themes'][$GLOBALS['fc_config']['defaultTheme']]['backgroundImage'], // default background is the default theme
			//'bkgrnd' => 'http://www.yourdomain.com/mybackgroundfile.jpg', // uncomment this line to use your own background image
		);

		return $value;
	}

	function removeEvilAttributes($tagSource) {

		$stripAttrib = "' (style|class)=\"(.*?)\"'i";
		$tagSource = stripslashes($tagSource);
		$tagSource = preg_replace($stripAttrib, '', $tagSource);

		return $tagSource;
	}

	function removeEvilTags($source) {

   		$allowedTags =	'<a><br><b><h1><h2><h3><h4><i><img><li><ol><p><strong><table><tr><td><th><u><ul>';
		$source = strip_tags($source, $allowedTags);

		return preg_replace('/<(.*?)>/ie', "'<'.removeEvilAttributes('\\1').'>'", $source);
	}

	function htmlSelect($name, $arr, $selected, $addprop='') {
		$ret = "<SELECT name=\"$name\" $addprop>";

		foreach($arr as $k=>$v)
		{
			if($selected == $k)$sel = 'SELECTED';
			else $sel = '';

			$ret .= "<option value=\"$k\" $sel>$v";
		}

		$ret .=	"</SELECT>";

		return $ret;
	}
	// ******** End of functions

	$cmsclass = strtolower( $GLOBALS['fc_config']['CMSsystem'] );
	$manageUsers = ($cmsclass == 'defaultcms') || ($cmsclass == 'statelesscms');
	if(!$manageUsers)
	{
		die('Profiles are only supported for defaultCMS and statelessCMS');
	}

	$req['change_id'] = $req['userid'];
	if(isset($req['flashchatid']))
	{
		$req['id'] = $req['flashchatid'];
		$conn =& ChatServer::getConnection($req);
		$req['id'] = $conn->userid;
		if(!$req['id'])
			die ('<center><b>NoNo<br>You must be logged in to FlashChat to use this command</b></center>');
		$req['lang'] = $conn->lang;
		$user = ChatServer::getUser($req['id']);

		$req['roles'] = $user['roles'];

		if(isset($req['admin_user_edit']))
			$req['change_id'] = $req['cid'];
		if($req['admin_user_edit'] == 'hidden_edit')
			$req['change_id'] = $req['cid1'];
	}

	if(!isset($req['lang']) && isset($req['id']))
	{
		$langStmt = new Statement('SELECT lang FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE id=?',215);
		$rs  = $langStmt->process($req['id']);
		$rec = $rs->next();
		$req['lang'] = $rec['lang'];
	}

	$font = '<center><div class="die"><center><br>';	// some error printouts in file upload section

	$register       = false;
	$fc_std_profile = false;
	$userid 		= 0;
	$error  		= false;
	if($req['register'] == 'true')
	{
		$fc_std_profile = true;
		$register = true;
	}
	if(isset($req['save']))
	{
		$fc_std_profile = true;
	}

	if(!$fc_std_profile) // addon part
	{
		// ******** Begin of functions
		function makeRandomPassword()
		{
			$salt = 'abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ0123456789';
			srand((double)microtime()*1000000);
			$i = 0;
			while ($i <= 8) {
				$num = rand() % 56;
				$tmp = substr($salt, $num, 1);
				$pass = $pass . $tmp;
				$i++;
			}
			return $pass;
		}

		function tryagain($msg1, $msg2, $msg3, $type)
		{
			global $smarty;

			$style_sheet = send_style_sheet($msg3);
			$tryagain_data = array(
				'msg1' => $msg1,
				'msg2' => $msg2,
				'type' => $type
			);

			$smarty->assign('tryagain', true);
			$smarty->assign('tryagain_data', $tryagain_data);
			$smarty->assign('style_sheet', $style_sheet);
			$smarty->display('profile.tpl');
			die();
		}

		function showInfoLine($itm, $add='')
		{
			global $edit, $msg, $width150, $width450, $req;

			$value = '';

			if( !$msg[$itm] && !$edit ) return $value;
			$value.= $width150.$msg[$itm].$width450;
			if( $edit )
			{
				$value.= '<input type="text" name="' . $itm . '" size="60" value="' . $req[$itm] . '">';
			}
			else
			{
				$s = Message::replaceBadWord($req[$itm]);
				if( $add == 'link')
					$value.= '<a href="' . $s . '" target="_blank">' . $s . '</a>';
				else if( $add == 'mail')
					$value.= '<a href="mailto:' . $s . '">' . $s . '</a>';
				else
					$value.= $s;
			}
			$value.= '</td></tr>';

			return $value;
		}
		// ******** End of functions
		// ******** Begin of variables
		$fields = array(
			't01' => '',
			't02' => '',
			't03' => '',
			't04' => '',
			't05' => '',
			't06' => '',
			't07' => '',
			't08' => '',
			't09' => '',
			't10' => '',
			't11' => '',
			't12' => '',
			't13' => '',
			't14' => '',
			't15' => '',
			't41' => '',
			't42' => '',
			't43' => '',
			't44' => ''
		);
		// ******** End of variables
		// ******** Begin of code
			//user wants new password sent to registered email address
			if(isset($req['newpassword']))
			{
				$style_sheet = send_style_sheet($msg['t56']);

				$smarty->assign('newpassword', true);
				$smarty->assign('style_sheet', $style_sheet);
				$smarty->display('profile.tpl');
				die();
			}

			// user wants old password sent to registered email address
			if(isset($req['oldpassword']))
			{
				$style_sheet = send_style_sheet($msg['t56']);

				$smarty->assign('oldpassword', true);
				$smarty->assign('style_sheet', $style_sheet);
				$smarty->display('profile.tpl');
				die();
			}

			// send old password to registered email address
			if(isset($req['sendoldpassword']))
			{
				$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE login=?');
				$rs   = $stmt->process($req['nick']);

				if(($rec = $rs->next()) && $rec['profile'])
				{
					$profile = unserialize($rec['profile']);
				}
				else
				{
					tryagain($msg['t55'], $msg['t61'], $msg['t57'], 'oldpassword');
				}

				if(isset($profile['fullname']) && isset($profile['email']))
				{
					$profile['t05'] = $profile['email'];
				}

				if($profile['t05'] == $req['email'])
				{
					if(!preg_match('/^([0-9,a-z,A-Z]+)([.,_]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$/', $profile['t05']))
					{
						tryagain($msg['t60'] . ' <a href="mailto:' . $FC_owner_email . '">' . $FC_owner_name . '</a>', $msg['t61'], $msg['t57'], 'oldpassword');
					}

					//password encrypted generate new password
					if( $GLOBALS['fc_config']['encryptPass'] )
					{
						$newPass = makeRandomPassword();
						$rec['password'] = $newPass;
					}

			  		$headers .= "MIME-Version: 1.0\n";
			  		$headers .= "Content-type: text/plain; charset=UTF-8\n";
			  		$headers .= "X-Mailer: php\n";
			  		$headers .= "From: \"" . $FC_owner_name . "\" <" . $FC_owner_email . ">\n";

					if( mail($req['email'], $msg['t63'] . ' ' . $rec['login'], $msg['t64'] . CRLF . CRLF . $rec['password'] . CRLF . CRLF . $msg['t53'], $headers) )
					{
						//setup new password
						if( $GLOBALS['fc_config']['encryptPass'] )
						{
							$s = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET `password`=MD5(?) WHERE login=? LIMIT 1');
							$r = $s->process($newPass, $req['nick']);
						}
					}
					else
					{
						tryagain($msg['t59'], $msg['t61'], $msg['t57'], 'oldpassword');
					}
				}
				else
				{
					tryagain($msg['t55'], $msg['t61'], $msg['t57'], 'oldpassword');
				}

				$style_sheet = send_style_sheet($msg['t56']);

				$smarty->assign('sendoldpassword', true);
				$smarty->assign('style_sheet', $style_sheet);
				$smarty->display('profile.tpl');
				die();
			}

			// send new password to registered email address
			if(isset($req['sendnewpassword']))
			{
				$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE login=?');
				$rs = $stmt->process($req['nick']);

				if(($rec = $rs->next()) && $rec['profile'])
				{
					$profile = unserialize($rec['profile']);
				}
				else
				{
					tryagain($msg['t55'], $msg['t47'], $msg['t57'], 'newpassword');
				}

				if($profile['fullname'])
				{
					$profile['t05'] = $profile['email'];
				}

				if($profile['t05'] == $req['email'])
				{
					if(!preg_match('/^([0-9,a-z,A-Z]+)([.,_]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$/', $profile['t05']))
					{
						tryagain($msg['t60'] . ' <a href="mailto:' . $FC_owner_email . '">' . $FC_owner_name . '</a>', $msg['t47'], $msg['t57'], 'newpassword');
					}

					$newpassword = makeRandomPassword();
			  		$headers .= "MIME-Version: 1.0\n";
			  		$headers .= "Content-type: text/plain; charset=UTF-8\n";
			  		$headers .= "X-Mailer: php\n";
			  		$headers .= "From: \"" . $FC_owner_name . "\" <" . $FC_owner_email . ">\n";
			  		if(mail($req['email'], $msg['t51'] . ' ' . $rec['login'], $msg['t52'] . CRLF . CRLF . $newpassword . CRLF . CRLF . $msg['t53'], $headers))
					{
						$stmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET password=? WHERE id=?',125);
						if( $GLOBALS['fc_config']['encryptPass'] > 0 )
						{
							$newpassword = md5($newpassword);
						}
						$stmt->process($newpassword, $rec['id']);
					}
					else
					{
						tryagain($msg['t59'], $msg['t47'], $msg['t57'], 'newpassword');
					}
				}
				else
				{
					tryagain($msg['t55'], $msg['t47'], $msg['t57'], 'newpassword');
				}

				$style_sheet = send_style_sheet($msg['t56']);

				$smarty->assign('sendnewpassword', true);
				$smarty->assign('style_sheet', $style_sheet);
				$smarty->display('profile.tpl');
				die();
			}

			// user finished selection of file so try to upload the file now
			if(isset($req['load']))
			{
				$_FILES['img1']['name'] = strtolower($_FILES['img1']['name']);            //make sure file name is lower case.
				$_FILES['img1']['name'] = str_replace(' ', '_', $_FILES['img1']['name']); //get rid of spaces
				$_FILES['img1']['name'] = str_replace('$', '_', $_FILES['img1']['name']); //get rid of '$'
				$file_name = $_FILES['img1']['name'];                                     //take the file name, and then get all the stuff after the last '.' (the file extension)
				$file_name = strrchr($file_name, '.');

				//make sure file type is supported
				if(!in_array($file_name, $ext))
				{
					$error = $font . $msg['t23'];
					foreach( $ext as $exts )
					{
						$error .= $exts . " ";
					}
					$error .= '<br>&nbsp;<br>';
			  	}

				if(!$error)
				{
					$file_size = $_FILES['img1']['size'];		//make sure file isn't too large
					if($file_size > $max_file_size)
					{
						$error = $font . $msg['t24'] . round(($file_size/1024), 0) . $msg['t25'] . round((( $max_file_size / 1024 ) ) , 2) . ' KB'. '<br>&nbsp;';
					}
				}

				if(!$error)
				{
					//get the file type from mime types and upload file to directory
					if ($_FILES['img1'] != '')
					{
						$file_type  = '/error';
						if(!is_script($_FILES['img1']['tmp_name']))
						{
							if( $_FILES['img1']['type'] == "image/gif" )   $file_type  = '.gif';
							if( $_FILES['img1']['type'] == "image/pjpeg" ) $file_type  = '.jpg';
							if( $_FILES['img1']['type'] == "image/jpeg" )  $file_type  = '.jpg';
							if( $_FILES['img1']['type'] == "image/jpc" )   $file_type  = '.jpg';
							if( $_FILES['img1']['type'] == "image/bmp")    $file_type  = '.bmp';

							$fw = $ufolder . $req['change_id'];
							if(file_exists($fw . '.jpg')) unlink($fw . '.jpg');
							if(file_exists($fw . '.gif')) unlink($fw . '.gif');
							if(file_exists($fw . '.bmp')) unlink($fw . '.bmp');

							$newtofile  = $fw . $file_type;	//name file with user id and save in profile image directory
							copy($_FILES['img1']['tmp_name'], $newtofile) or $error = $font . $msg['t26'] . '<br>&nbsp;';
						}
						else
						{
							$error = $font . $msg['t124'] . '<br>&nbsp;';
						}
			   		}
					else
					{
						$error = $font . $msg['t27'] . '<br>&nbsp;';
					}
				}

				// Update user profile with new URL to picture
				if(!$error)
				{
					$user = ChatServer::getUser($req['change_id']);

					$stmt = new Statement('SELECT profile FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE id=?',120);
					$rs = $stmt->process($user['id']);

					if(($rec = $rs->next()) && $rec['profile'])
					{
						$profile = unserialize($rec['profile']);
					}
					else
					{
						$profile = array();
					}

					$profile['t12'] = $newtofile;
					$req = array_merge($fields, $profile, $req);

					$stmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET profile=? WHERE id=?',114);
					$stmt->process(serialize($profile), $user['id']);
				}
			}

			// user clicked for upload of picture so show that page
			if(isset($req['TCpicture']) || $error)
			{
				$user = ChatServer::getUser($req['change_id']);

				if(!$error)
				{
					// update user profile fields first
					foreach($fields as $k => $v)
					{
						$fields[$k] = $req[$k];
					}

					$stmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET profile=? WHERE id=?',114);
					$stmt->process(serialize($fields), $user['id']);
				}

				$style_sheet = send_style_sheet($msg['t32']);
				$s_ext = '';
				foreach ( $ext as $exts )
				{
					$s_ext.= $exts.' ';
				}
				$file_size = round(( $max_file_size / 1024 ) , 2);

				$smarty->assign('TCpicture', true);
				$smarty->assign('error', $error);
				$smarty->assign('req', $req);
				$smarty->assign('user', $user);
				$smarty->assign('exts', $s_ext);
				$smarty->assign('file_size', $file_size);
				$smarty->assign('style_sheet', $style_sheet);
				$smarty->display('profile.tpl');
				die();
			}


			// user want to save the text in profile set and maybe also update password
			if(isset($req['TCsave']))
			{
				$user = ChatServer::getUser($req['change_id']);

				foreach($fields as $k => $v)
				{
					$fields[$k] = $req[$k];
				}
				$pwdmsg = ''; // fix
				$fields['t14'] = trim($fields['t14']);
				$fields['t15'] = trim($fields['t15']);

				if((strlen($fields['t14']) > 0) || (strlen($fields['t15']) > 0))
				{
					if((strlen($fields['t14']) < 1) || (strlen($fields['t15']) < 1))
					{
						$pwdmsg = $msg['t40'];
					}

					// password change
					if((strlen($fields['t14']) > 0) && (strlen($fields['t15']) > 0))
					{
			  			$stmt = new Statement('SELECT password FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE id=?',120);
			  			$rs = $stmt->process($user['id']);
						$pwdmsg = $msg['t39'];
						$rec = $rs->next();
			 			if($fields['t14'] === $rec['password'] || md5($fields['t14']) === $rec['password'])
						{
							$stmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET password=? WHERE id=?',125);
							if( $GLOBALS['fc_config']['encryptPass'] > 0 )
							{
								$fields['t15'] = md5($fields['t15']);
							}
							$stmt->process($fields['t15'], $user['id']);
							$pwdmsg = $msg['t38'];
						}
						$fields['t14'] = '';
						$fields['t15'] = '';
					}
				}

				foreach($fields as $k => $v)
				{
					$fields[$k] = removeEvilTags($v);
				}

				if(strlen(trim($fields['t12'])) < 2)
				{
					$fw = $ufolder . $req['change_id'];
					if(file_exists($fw . '.jpg')) unlink($fw . '.jpg');
					if(file_exists($fw . '.gif')) unlink($fw . '.gif');
					if(file_exists($fw . '.bmp')) unlink($fw . '.bmp');
				}

				$stmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET profile=? WHERE id=?',114);
				$stmt->process(serialize($fields), $user['id']);

				//update gender of user in chat
				$gender = strtoupper(substr($fields['t43'], 0, 1));
				$conn->process(array('c' => 'sgen', 'u' => $user['id'], 't' => ($gender != 'M' && $gender != 'F')? NULL : $gender));

				//send notification to all users about new photo
				//$conn->sendToAll(new Message('spht', $conn->userid, null, (strlen(trim($fields['t12'])) < 2)? '' : $fields['t12']));
			}

			// ****************************************
			// display the user profile (default entry)
			// ****************************************

		  	$edit = (isset($req['flashchatid']) && ($req['id'] != SPY_USERID) && $req['userid'] == $req['id']);
			if($req['admin_show_profile'])
				$edit = true;
		  	if(!$edit_allowed)
				$edit = false;

			$user = ChatServer::getUser($req['change_id']);

			if(!$edit)
				$user = ChatServer::getUser($req['userid']);

		  	$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE id=?',120);
		  	$rs = $stmt->process($user['id']);

		  	if(($rec = $rs->next()) && $rec['profile'])
			{
				$test_profile = unserialize($rec['profile']);

				if( is_array($test_profile) && array_key_exists('fullname', $test_profile))
				{
					$profile['t01'] = $test_profile['fullname'];
					$profile['t04'] = $test_profile['age'];
					$profile['t05'] = $test_profile['email'];
					$profile['t06'] = $test_profile['msnm'];
					$profile['t07'] = $test_profile['site'];
					$profile['t10'] = $test_profile['icq'];
					$profile['t13'] = $test_profile['comments'];
					$profile['t41'] = $test_profile['aim'];
					$profile['t42'] = $test_profile['yim'];
					$profile['t43'] = $test_profile['gender'];
					$profile['t44'] = $test_profile['location'];
				}
				else
				{
					$profile = unserialize($rec['profile']);
					$profile['t13'] = str_replace('\\', '', $profile['t13']); // fix for those who enters multiple \
				}
		  	}
			else
			{
				$profile = array();
			}

		  	$req = array_merge($fields, $profile, $req);

			if($user)
			{
				if(!$edit)
				{
					foreach($req as $k => $v)
					{
						if(!$v) $msg[$k] = null;
					}
				}

				$htmlSelect = '';
				if($edit)
				{
					$htmlSelect = htmlSelect('t43', $gender_arr, $req['t43']);
				}
				else
				{
					$htmlSelect = Message::replaceBadWord($req['t43']);
				}

				if(substr($req['t12'], 0, 7) == 'http://' && $nick = strpos($req['t12'], 'nick_image'))
				{
					$req['t12'] = './' . substr($req['t12'], $nick);
				}

				$is_http = false;
				$is_file_exists = false;
				if(substr($req['t12'], 0, 7) == 'http://')
				{
					$is_http = true;
				}
				else if($req['t12'] && file_exists($req['t12']))
				{
					$is_file_exists = true;
					$size = getimagesize($req['t12']);
					if($size['0'] < $pictureWidth)
					{
						$pictureWidth = $size['0'];
					}
				}

				$width150 = '<tr><td  align="right" width="250">';
				$width450 = '</td><td width="450">';
				$infoLine1 = showInfoLine('t01').
							showInfoLine('t02').
							showInfoLine('t44').
							showInfoLine('t03');
				$infoLine2 = showInfoLine('t04').
							showInfoLine('t05', 'mail').
							showInfoLine('t07', 'link').
							showInfoLine('t08', 'link').
							showInfoLine('t41').
							showInfoLine('t42').
							showInfoLine('t10').
							showInfoLine('t06');
				$replaceBadWord_t13 = Message::replaceBadWord($req['t13']);
				$is_writable = is_writable($ufolder);
				$is_role_admin = ($rec['roles'] == ROLE_ADMIN);
				$is_role_user  = ($req['roles'] == ROLE_USER);
				$style_sheet = send_style_sheet('"' . $user['login'] . '"');

				// display a list of all profiles in users table
				if($showAllProfiles || $is_role_admin)
				{
					$value = '';

					//pages
					$page_num = $_REQUEST['pg'];
					if( ($page_num == '') && !is_numeric($page_num) )
						$page_num = 1;

					$page_num--;
					$stmt = new Statement('SELECT count(*) users_amount FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE profile <> \'\'',121);
					$rs = $stmt->process();
					$rec = $rs->next();
					$limit = '';
					$all_profiles = $rec['users_amount'];
					if( $all_profiles > $profiles_per_page )
					{
						$limit = ' LIMIT ' . $page_num*$profiles_per_page . ', '.$profiles_per_page;
					}
					//---
					$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE profile <> \'\' ORDER BY login '.$limit , 122 );
					$rs = $stmt->process();

					if($rs->hasNext())
					{
						$value.= '</table><center><div width=50%><h2>'.$msg['t22'].'</h2></div></center>';

						//---
						if( $all_profiles > $profiles_per_page )
						{
							$value.= '<div align=center class=pages>All profeles '.$all_profiles.' | Showing Profiles '.
							($page_num*$profiles_per_page+1). '-' . min((($page_num+1)*$profiles_per_page), $all_profiles)  .
							' | Page ';

							for($i=1; $i<=ceil($all_profiles/$profiles_per_page); $i++)
							{
								if($i == $page_num+1)
								{
									$value.= $i.' ';
									continue;
								}
								$value.= "<a href=\"profile.php?userid={$_REQUEST['userid']}&lang={$_REQUEST['lang']}&pg=$i\">$i</a>";
							}

							$value.= '</div>';
						}
						//---

						if(!$showGallery)
							$value.= '<table align=center border=0 cellpadding=5 cellspacing=0 width=30%>';
						else
							$value.= '<table align=center border=0 cellpadding=5 cellspacing=2 width=80%><tr>';

						$pics = 1;
						while($rec = $rs->next())
						{
							if(isset($rec['profile']))
							{
								$profile = unserialize($rec['profile']);
								if($showGallery)
								{
									$pict_msg = $msg['t45'];
									if(!$profile['t12'])
									{
										$profile['t12'] = 'flashChat_slogo.png';
										$pict_msg = $msg['t68'];
									}
									$profileLink  = '<td align=center valign=middle width=18%><a href="' . $profile['t12'] . '" target="_blank"><img border=0 width=' . $thumbWidth . ' border=0 src="' . $profile['t12'] . '" alt="' . $pict_msg . '"></a>';
									$profileLink .= "<br><a href=\"profile.php?pg={$_REQUEST['pg']}&userid=" . $rec['id'] . '&lang=' . $req['lang'] . '" title="' . $msg['t46'] . '" target="_self">' . $rec['login'] . '</a>';

			 						if($req['flashchatid'] && ($req['roles'] == ROLE_ADMIN))
									{
										$profileLink .= '<br><form action="profile.php" method="post" name="fc_profile">';
										$profileLink .= '<input type="hidden" name="flashchatid" value="' . $req['flashchatid'] . '">';
										$profileLink .= '<input type="hidden" name="lang" value="' . $req['lang'] . '">';
										$profileLink .= '<input type="hidden" name="userid" value="' . $req['id'] . '">';
										$profileLink .= '<input type="hidden" name="cid" value="' . $rec['id'] . '">';
										$profileLink .= '<input type="submit" name="admin_user_edit" value="Edit">';
										$profileLink .= '</form>';
									}

									$value.= $profileLink . '</td>';

									if($pics++ == $pics_row)
									{
										$pics = 1;
										$value.= '</tr><tr>';
									}

								}
								else
								{

									$profileLink = '<tr>';
									if($profile['t12'])
									{
										  $profileLink .= '<td align="right"><a href="' . $profile['t12'] . '" target="_blank"><img border=0 height=10 width=15 border=0 src="./profile/camera.gif" alt="' . $msg['t45'] . '"></a>';
									}
									else
									{
										$profileLink .= '<td></td>';
									}
									$profileLink .= '<td align="left"><a href="profile.php?userid=' . $rec['id'] . '&lang=' . $req['lang'] . '" title="' . $msg['t46'] . '">' . $rec['login'] . '</a></td></tr>';
									$value.= $profileLink;
								}
							}
						}
					}
					$smarty->assign('value', $value);
				}

				$smarty->assign('default', true);
				$smarty->assign('msg', $msg);
				$smarty->assign('user', $user);
				$smarty->assign('req', $req);
				$smarty->assign('edit', $edit);
				$smarty->assign('infoLine1', $infoLine1);
				$smarty->assign('infoLine2', $infoLine2);
				$smarty->assign('width150', $width150);
				$smarty->assign('width450', $width450);
				$smarty->assign('htmlSelect', $htmlSelect);
				$smarty->assign('is_writable', $is_writable);
				$smarty->assign('is_role_admin', $is_role_admin);
				$smarty->assign('is_role_user', $is_role_user);
				$smarty->assign('ufolder', $ufolder);
				$smarty->assign('is_http', $is_http);
				$smarty->assign('is_file_exists', $is_file_exists);
				$smarty->assign('pictureWidth', $pictureWidth);
				$smarty->assign('replaceBadWord_t13', $replaceBadWord_t13);
				$smarty->assign('pwdmsg', $pwdmsg);
				$smarty->assign('showAllProfiles', $showAllProfiles);
				$smarty->assign('style_sheet', $style_sheet);
				$smarty->display('profile.tpl');
				die();
			}
			else
			{
				$style_sheet = send_style_sheet($msg['t17'].$req['userid']);

				$smarty->assign('not_user', true);
				$smarty->assign('req', $req);
				$smarty->assign('style_sheet', $style_sheet);
				$smarty->display('profile.tpl');
				die();
			}
		// ******** End of code
	}
	else // start of FlashChat standard registration page
	{
		require_once('inc/country.inc.php');
		$req = array_merge($_GET, $_POST);

		$fields = array(
			'fullname' => '',
			'email' => '',
			'site' => '',
			'icq' => '',
			'aim' => '',
			'yim' => '',
			'msnm' => '',
			'comments' => '',
			'gender' => '',
			'age' => '',
			'location' => ''
		);


		if( isset($req['save']) )
		{
			if( $req['register'] )
			{
				//check if user existing
				//changed on 090706 for chat instances
				/*$stmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}users WHERE login=? LIMIT 1");
				$usr = $stmt->process($req['user_name']);*/

				$usrNumRows = 0;

				if($req['fc_instance_purchase'] != 1)//for new chat instaqnce purchase no need to check if a member exists since new instance to be created (added on 090706 for chat instances
				{
					$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE login=? and instance_id=? LIMIT 1',112);
				 	$usr = $stmt->process($req['user_name'], $_SESSION['session_inst']);
				 	$usrNumRows = $usr->numRows;
				}
				//changed on 090706 for chat instances ends here

				if($usrNumRows > 0 || Message::replaceBadWord($req['user_name']) != $req['user_name'])
				{
					$register_succ = false;
					$register = true;
					$errmsg = str_replace('[user_name]', $req['user_name'], $msg['t100']);
					$req['user_name'] = '';
					$userid = -1;
				} else {
					if( $usrNumRows != 0 )
					{
						$req['role'] = ROLE_USER;//always insert user
					}
				    // added on 090706 for chat instances
					if($req['is_paid'] == 1)
					{
					 	if(!isset($req['from']) )
					 	{
						  	if($req['fc_instance_purchase'] == 1)
							{
							   $PAYPAL[transaction_type]='New_Instance_Purchase';
							   $PAYPAL['business'] = $GLOBALS['fc_config']['fc_instance']['paypal_admin_bussiness_email'];
							   $PAYPAL['amount'] = $GLOBALS['fc_config']['fc_instance']['instance_value'];
							   $PAYPAL['currency_code'] = $GLOBALS['fc_config']['fc_instance']['admin_currency_type'];
							   $PAYPAL['notify'] = paypal_notify_url().'&register=1&fc_instance_purchase=1';
							}
							else //if($req['fc_instance_purchase'] == 1)
							{
							   $PAYPAL[transaction_type]='paid_registration_'+$_SESSION['session_inst_name'];
							   $PAYPAL['business'] = $GLOBALS['fc_config']['paypal_bussiness_email'];
							   $PAYPAL['amount'] = $GLOBALS['fc_config']['membership_amount'];
							   $PAYPAL['currency_code'] = $GLOBALS['fc_config']['payment_currency_type'];
							   $PAYPAL['notify'] = paypal_notify_url().'&register=1';
	  						}//if($req['fc_instance_purchase'] == 1)
							$PAYPAL['url'] = paypal_url();
                            $PAYPAL['itemname'] = $PAYPAL[transaction_type];
                            $PAYPAL['item_number'] = paypal_invoice_number();
	                      	$PAYPAL['payer_email'] = $req['email'];
                           	$PAYPAL['payer_id'] = $req['user_name'];
                            $PAYPAL['shipping'] = 0;
                            $PAYPAL['return'] = paypal_return_url();
                            $PAYPAL['cancel_return'] = paypal_cancel_url();
							//emulatepaypal();
							$smarty->assign('PAYPAL', $PAYPAL);
							$smarty->display('paypal_form.tpl');
			 				die();
	  					}//if(!isset($req['from'])
					}//if($req['is_paid'] == 1)
					// added on 090706 for chat instances ends here
					//---
					//changed on 090706 for chat instances
					/*$stmt = new Statement("INSERT INTO {$GLOBALS['fc_config']['db']['pref']}users (login,password,roles) VALUES (?,?,?)");
					if( !isset($req['role']) ) $req['role'] = ROLE_USER;
					if( $GLOBALS['fc_config']['encryptPass'] > 0 ) {$req['password'] = md5($req['password']);}

					$userid = $stmt->process($req['user_name'] , $req['password'], $req['role']);*/

					if( !isset($req['role']) ) $req['role'] = ROLE_USER;

					$req['session_inst'] = $_SESSION['session_inst'];
					//added on 090706 for chat instance
					if($req['fc_instance_purchase'] == 1)
					{
					 	$req['role'] = ROLE_MODERATOR;
					 	$stmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}config_instances WHERE is_default=1");
					 	$rs  = $stmt->process();
					  	if($GLOBALS['fc_config']['payment_options']['debug_mode']) sprintf( $stmt->final_query.'<br>' );
		             	$rec = $rs->next();
				     	$fc_default_inst = $rec['id'];

					 	//is_active,is_default,name,created_date
					 	$stmt = new Statement("INSERT INTO {$GLOBALS['fc_config']['db']['pref']}config_instances (is_active,is_default,name,created_date) VALUES ('1','0','NEW INSTANCE of {$req['user_name']}',NOW())");
					 	$req['session_inst'] = $stmt->process();

					  	if($GLOBALS['fc_config']['payment_options']['debug_mode']) sprintf( $stmt->final_query.'<br>' );
					 	$fc_new_instance_queries = array("values"=>"INSERT INTO {$GLOBALS['fc_config']['db']['pref']}config_values
                                        	                     ( instance_id,config_id,value,disabled )
			                            	                      SELECT '{$req['session_inst']}',config_id,value,disabled
			                            	                       FROM {$GLOBALS['fc_config']['db']['pref']}config_values
                        	          WHERE {$GLOBALS['fc_config']['db']['pref']}config_values.instance_id = $fc_default_inst;",
											            "rooms"=>"INSERT INTO {$GLOBALS['fc_config']['db']['pref']}rooms
			                                                   ( created,name,password,ispublic,ispermanent,instance_id )
			                             	                   SELECT NOW() ,name,password,ispublic,ispermanent,
												'{$req['session_inst']}' FROM {$GLOBALS['fc_config']['db']['pref']}rooms
			                              	     WHERE {$GLOBALS['fc_config']['db']['pref']}rooms.instance_id = $fc_default_inst"
													   );
 	                 	foreach($fc_new_instance_queries as $type=>$fc_new_instance_query)
					 	{
					  		mysql_query($fc_new_instance_query);//stmt doesnt work for subqueries
					  		if($GLOBALS['fc_config']['payment_options']['debug_mode']) sprintf( $fc_new_instance_query.'<br>' );					                     																											}//foreach($fc_new_instance_queries as $fc_new_instance_query)
					 	//admin/cnf_config.php?module=instances&method=Dublicate&ID=1
					}//if($req['fc_instance_purchase'] == 1)

					$stmt = new Statement('INSERT INTO '.$GLOBALS['fc_config']['db']['pref'].'users (login,password,roles,instance_id) VALUES (?,?,?,?)',113);
					if( $GLOBALS['fc_config']['encryptPass'] > 0 ) {$req['password'] = md5($req['password']);}
					$userid = $stmt->process($req['user_name'] , $req['password'], $req['role'], $req['session_inst']);
					if($GLOBALS['fc_config']['payment_options']['debug_mode']) sprintf($stmt->final_query);
					//changed on 090706 for chat instances ends here
					unset($req['user_name'] ,$req['password'],$req['register'], $req['role']);

					if( isset($userid) && $userid > 0 )
					{
						$register_succ = true;
					}
					//added on 090706 for chat instance
					if($req['fc_instance_purchase'] == 1)
					{
					 //create instance code
					}
					//added on 090706 for chat instance ends here
				}
			}

			if($req['gender'] == 'male')   $req['gender'] = $msg['t102'];
			if($req['gender'] == 'female') $req['gender'] = $msg['t103'];
			if($req['gender'] == 'other')  $req['gender'] = $msg['t104'];

			foreach($fields as $k => $v)
			{
				$fields[$k] = removeEvilTags($req[$k]);
			}
			$stmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET profile=? WHERE id=?', 114);
			$stmt->process(serialize($fields), $userid);

			$req['userid'] = $userid;
		}

		$edit = (isset($req['userid']) && ($req['userid'] != SPY_USERID) && ($userid == $req['userid'])) || $register;

		$user = ChatServer::getUser($req['userid']);

		$stmt = new Statement('SELECT profile FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE id=?',120);
		$rs = $stmt->process($req['userid']);

		if(($rec = $rs->next()) && $rec['profile'])
		{
			$profile = unserialize($rec['profile']);
		}
		else
		{
			$profile = array();
		}

		$req = array_merge($fields, $profile, $req);

		if( $register_succ === true )
		{
			$style_sheet = send_style_sheet($msg['t101']);
			$user_name =  stripslashes(str_replace('[user_name]', $_POST['user_name'], $msg['t106']));

			$smarty->assign('register_succ', $register_succ);
			$smarty->assign('user_name', $user_name);
			$smarty->assign('style_sheet', $style_sheet);

			$smarty->display('profile.tpl');
			die();
		}
		else if($user || $register)
		{
			if(!$register)
			{
				$msgt = 'Profile for user &quot;'.$user['login'].'&quot;';
			}
			else
			{
				$msgt =  $msg['t101'];
				$req['location'] = $default_country;
			}

			$style_sheet = send_style_sheet($msgt);

			//---check if is registered users
			$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users LIMIT 1',115);
			$rs = $stmt->process();
			$firstUser = $rs->numRows == 0;
			//---

			$is_role_user = $req['role'] == ROLE_USER || !isset($req['role']);
			$is_role_admin = ($req['role'] == ROLE_ADMIN);
			$is_role_spy = ($req['role'] == ROLE_SPY);
			$is_role_customer = ($req['role'] == ROLE_CUSTOMER);
			$is_live_support_mode = $GLOBALS['fc_config']['liveSupportMode'];

			$htmlSelect_gender = htmlSelect('gender', $gender_arr, $req['gender']);
			$gender = $gender_arr[$req['gender']];
			$htmlSelect_location = htmlSelect('location', $countries, $req['location']);
			$location = $countries[$req['location']];
			$nl2br = nl2br($req['comments']);

			$smarty->assign('req', $req);
			$smarty->assign('user_or_register', ($user || $register));
			$smarty->assign('user', $user);
			$smarty->assign('register', $register);
			$smarty->assign('firstUser', $firstUser);
			$smarty->assign('errmsg', $errmsg);
			$smarty->assign('edit', $edit);
			$smarty->assign('enable_reg', $enable_reg);
			$smarty->assign('ROLE_USER', ROLE_USER);
			$smarty->assign('ROLE_ADMIN', ROLE_ADMIN);
			$smarty->assign('ROLE_SPY', ROLE_SPY);
			$smarty->assign('ROLE_CUSTOMER', ROLE_CUSTOMER);
			$smarty->assign('is_role_user', $is_role_user);
			$smarty->assign('is_role_admin', $is_role_admin);
			$smarty->assign('is_role_spy', $is_role_spy);
			$smarty->assign('is_role_customer', $is_role_customer);
			$smarty->assign('is_live_support_mode', $is_live_support_mode);
			$smarty->assign('htmlSelect_gender', $htmlSelect_gender);
			$smarty->assign('gender', $gender);
			$smarty->assign('htmlSelect_location', $htmlSelect_location);
			$smarty->assign('location', $location);
			$smarty->assign('nl2br', $nl2br);
			$smarty->assign('style_sheet', $style_sheet);
// added on 090706 for chat instances
			if($GLOBALS['fc_config']['is_paid_chat'] ==  1 && !$firstUser && $register)
			{
			 $smarty->assign('is_paid', 1);
			 $smarty->assign('session_inst', $_SESSION['session_inst']);
			 if($req['fc_instance_purchase'] == 1)
			 {
			  $smarty->assign('fc_instance_purchase', 1);
			  $smarty->assign('fc_roles', ROLE_MODERATOR);
			 }//if($req['fc_instance_purchase'] == 1)
			 $smarty->display('profile_paid.tpl');
			 die();
			}//if($GLOBALS['fc_config']['is_paid_chat'] ==  1 && !$firstUser && $register)
// added on 090706 for chat instances ends here
			$smarty->display('profile.tpl');
			die();
		}
		else
		{
			$style_sheet = send_style_sheet($msg['t17'].$req['userid']);
			$smarty->assign('req', $req);
			$smarty->assign('style_sheet', $style_sheet);
			$smarty->display('profile.tpl');
			die();
		}
	}
?>