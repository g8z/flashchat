<?php

define('CHATUI_MD5', '3f5a918f21c93e619c47dc7a67391d8e');

include INST_DIR . 'header.php';

?>
<tr>
<td colspan=2 class=normal>This wizard will guide you through the setup process.</td>
</tr>

<tr>
<td colspan=2 class=subtitle><b>Step 1: Your Server Environment</b></td>
</tr>

<tr colspan=2>
<td>
<p>In this step, the FlashChat installer will determine if your system meets the requirements for the server environment. To use FlashChat, you must have PHP with MySQL support, and write-permissions on certain files.
<!--<p><A href="install2.php">Click here</A> for the FlashChat "quick install". This is the old installer for
FlashChat, and can be used if you have used FlashChat before and do not need
help configuring FlashChat. Also, if you intend to integrate FlashChat with
a content-management system, like Mambo, phpBB, or phpNuke (among others)
then  you should use the quick installer, in conjunction with the specific
integration instructions for the system you are using.
</p>
-->


After installation, you may set all files to non-writable formats, EXCEPT for appdata/appTime.txt and /uploaddir/, which must remain writable.
</p>
<FORM action="install.php?step=1.8" method="post" name="installInfo">

</td></tr>

<tr><td class="body_table">

<table width="100%" cellpadding=4 cellspacing=0 >

<?php
	$canContinue = 1;

	//check PHP version
	$good = phpversion() >= '4.1.2' ? 1 : 0;
	$canContinue = $canContinue && $good;
	Message ( 'PHP version >= 4.1.2: ', $good );

	// check PHP 5 compatibility
	if(substr(phpversion(), 0, 1) >= '5')
	{
	  $good = ini_set('zend.ze1_compatibility_mode', '0') === false ? 0 : 1;
	  $canContinue = $canContinue && $good;
	  Message ( 'PHP 5 compatibility mode: ', $good );
	}

	//check PHP session support
	$ses_ok = function_exists('session_save_path');

	if( $ses_ok )
	{
		@session_start() or ($ses_ok = false);
		$_SESSION['test_fc'] = 'FlashChat';
		if( $_SESSION['test_fc'] != 'FlashChat' )$ses_ok = false;
		//@session_write_close() or ($ses_ok = false);
	}
	Message ( 'PHP session support (recommended):', $ses_ok );

	//is session writable/readable?
	/*$good = is_writable(ini_get('session.save_path')) && is_readable(ini_get('session.save_path'));
	$canContinue = $canContinue && $good;
	Message ( 'Directory used to save session data read/write:', $good );*/
	//--

	//---

	//check PHP safe mode
	/*
	$good = ! ini_get('safe_mode');
	$canContinue = $canContinue && $good;
	Message ( 'PHP no safe mode: ', $good );
	*/

	//check mySQL
	$good = function_exists( 'mysql_connect' ) ? 1 : 0;
	$canContinue = $canContinue && $good;
	Message ( 'MySQL support exists: ', $good );

	//check if file uploaded correct
	/*
	$fsize = filesize('./flashChat_slogo.png');
	$good = $fsize == NAVY_FILE_SIZE;
	$canContinue = $canContinue && $good;
	Message( 'Files uploaded in binary mode', $good );
	*/

	clearstatcache();
	$good = false;

	if( is_readable('chat.swf'))
	{
	  $calc_md5 = md5( md5file_cust('chat.swf') );

//	  echo $calc_md5;

	  if( $calc_md5 == CHATUI_MD5) $good = true;

	  //echo 'CHATUI_MD5 ' . md5($data);
	  //echo md5(md5_file('chatui.swf') . md5_file('preloader.swf') );

	}
	$canContinue = $canContinue && $good;
	Message( 'Files uploaded in binary mode (MD5 '.$calc_md5.'):', $good );

	// checks magic_quotes_runtime option. artemK0
	if(ini_get('magic_quotes_runtime') == '1')
	{
		$good = false;
	}
	elseif(ini_get('magic_quotes_runtime') == '0')
	{
		$good = true;
	}
	$canContinue = $canContinue && $good;
	Message('PHP setting <i>magic_quotes_runtime</i> is disabled:', $good);

	// checks safe_mode option. artemK0
	if(ini_get('safe_mode') == '1')
	{
		$good = false;
	}
	elseif(ini_get('safe_mode') == '0')
	{
		$good = true;
	}
	$canContinue = $canContinue && $good;
	Message('PHP setting <i>safe_mode</i> is disabled:', $good);

	// checks suhosin.post.max_vars option. artemK0
	$maxVars = ini_get('suhosin.post.max_vars');
	if(strlen($maxVars) <= 0 || $maxVars >= '400')
	{
		$good = true;
	}
	elseif($maxVars <= '400')
	{
		$good = false;
	}
	$canContinue = $canContinue && $good;
	Message('PHP setting <i>suhosin.post.max_vars</i> >= 400:', $good);

	//files is writable?
	clearstatcache();

	//is executable dir?
	/*if(
		fileperms('./bot/programe/src/botinst/') == 040755 ||
		stristr( $_SERVER['SERVER_SOFTWARE'], 'Win' ) ||
		stristr( $_SERVER['SERVER_SOFTWARE'], 'Microsoft' ) ||
		stristr( $_SERVER['OS'], 'Win' )
	  )
	{
		$good = true;
	}
	else
	{
		$good = false;
	}
	$canContinue = $canContinue && $good;*/
//	Message ( '/bot/programe/src/botinst/ is executable (chmod 755): ', $good );
	//---

//	$canContinue = isWriteable ( $canContinue, './inc/config.php',      0777, '/inc/config.php' );
//	$canContinue = isWriteable ( $canContinue, './inc/config.srv.php',  0777, '/inc/config.srv.php' );
//	$canContinue = isWriteable ( $canContinue, './inc/patServer/', 0777, '/inc/patServer/' );
//	$canContinue = isWriteable ( $canContinue, './inc/swfimageproxy/', 0777, '/inc/swfimageproxy/' );
//	$canContinue = isWriteable ( $canContinue, './inc/cmses/defaultUsrExtCMS.php', 0777, '/inc/cmses/defaultUsrExtCMS.php' );

//	$canContinue = isWriteable ( $canContinue, './appdata/', 0777, '/appdata/' );
//	$canContinue = isWriteable ( $canContinue, './appdata/appTime.txt', 0777, '/appdata/appTime.txt' );
//	$canContinue = isWriteable ( $canContinue, './appdata/bots.txt',    0777, '/appdata/bots.txt' );

//	$canContinue = isWriteable ( $canContinue, './templates/cache/', 0777, '/templates/cache/' );
//	$canContinue = isWriteable ( $canContinue, './templates/templates_c/', 0777, '/templates/templates_c/' );

	//$canContinue = isWriteable ( $canContinue, './bot/programe/src/botinst/', 0777, '/bot/programe/src/botinst/' );
//	$canContinue = isWriteable ( $canContinue, './bot/programe/aiml/', 0777, '/bot/programe/aiml/' );

	//$canContinue = isWriteable ( $canContinue, './inc/common.php',           0777, '/inc/common.php' );

//	$canContinue = isWriteable ( $canContinue, './uploaddir/', 0777, '/uploaddir/' );
//	$canContinue = isWriteable ( $canContinue, './nick_image/', 0777, '/nick_image/' );
//	$canContinue = isWriteable ( $canContinue, './images/cust_img/', 0777, '/images/cust_img/' );
	$canContinue = isWriteable ( $canContinue, './temp',  0777, '/temp' );

	//---
	if(is_writable('./temp/appdata/'))
	{
		$good = true;

		$fname = './temp/appdata/appTime.txt';
		if( is_writable($fname) )//clear appTime.txt
		{
			$fp = fopen($fname, 'w');
			fwrite($fp,'');
			fclose($fp);
		}
		//---
		/*
		$fname = './appdata/bots.txt';
		$fp = fopen($fname,"a");
		$good = fwrite($fp,"TEST STRING");
		fclose($fp);
		$fp = fopen($fname, "w");
		$good = $good && !(fwrite($fp,"") === false);
		fclose($fp);
		*/

		//check for rename
		$fname = './temp/appdata/test_rename.txt';
		$fp = fopen($fname,'a');
		$good = fwrite($fp,'TEST STRING');
		fclose($fp);

		$canContinue = $canContinue && $good;
		Message( 'File writing functions exists:', $good );

		$new_name = './temp/appdata/ren_test.txt';
		$good = @rename($fname, $new_name);
		if( file_exists($new_name) ) unlink($new_name);

		$canContinue = $canContinue && $good;
		Message( 'File rename permission:', $good );
		//---

	}

	echo '</table></td></tr>';
	if ( $canContinue)
	{
	?>
		<tr><td colspan="2" align="right"><br>Congratulations! You may continue the installation.<br><br>
		<input type="submit" name="continue" value="Continue >>" onclick1="javascript:document.location.href='install.php?step=2'">
		</td></tr>
	<?php
	} else
	{?>
		<tr><td colspan="2" ><br />The installer has detected some problems with your server environment, which will not allow FlashChat to operate correctly.<br /><br />Please correct these issues and then refresh the page to re-check your environment.<br /><br />
	<?php
		if ( function_exists ( 'ftp_connect' ) )
		{
	?>
			Some of the problems that have been detected are file permission problems. <!-- You may allow the installer to correct these problems automatically via FTP. <br/>  <br />--><!-- If you want the installer to make the necessary corrections,
			<b><a href="install.php?step=1.5">click here</a></b>. Otherwise,--> You must correct these issues manually, and then refresh this page after the corrections have been made. Most FTP programs, like <A href="http://www.ipswitch.com/" target="_blank">WS_FTP</A>, <A href="http://www.vandyke.com/" target="_blank">AbsoluteFTP</A>, and <a href="http://www.cuteftp.com/" target="_blank">CuteFTP</a>,
			allow users to change the permissions of files and folders on the server.<br /><br />
	<?php
		}
		echo '<br /><input type="button" name="continue" value="Continue >>" onclick="javascript:alert(\'Please correct the above problems before continuing.\')"></td></tr>';
	}

?>




<?php

include INST_DIR . 'footer.php';

?>