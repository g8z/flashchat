<?php

if((isset($_REQUEST['skipbot']) && $_REQUEST['skipbot'] == 1) || ($_SESSION['cache_type'] == 2 && isset($_SESSION['cache_type']) ))
{
	$repl['enableBots'] = 'false';

	$conf = getConfigData();
	$conf = changeConfigVariables($conf, $repl);
	//---
	writeConfig($conf);
}

$notShowHdr = true;

unlink(dirname(__FILE__).'/../temp/appdata/config_1.php');
include dirname(__FILE__).'/../inc/config.php';
include INST_DIR . 'header.php';
?>


<TR><TD colspan="2">

<div align="center">
<br>
<h2>Thank You!</h2><br>
<p class="subtitle">FlashChat was successfully installed</p>

<p align="left"><font color="red"><b>
<?php

	$cmsclass     = $GLOBALS['fc_config']['CMSsystem'];
	$is_def_cms   = ($cmsclass == 'defaultCMS');
	$is_stateless = false;//---CMS
	$f_cms = INC_DIR . 'cmses/' . $GLOBALS['fc_config']['CMSsystem'] . '.php';
	if( !file_exists($f_cms) || !is_file($f_cms) )
	{
		$is_stateless = true;
	}

	if( isset($cmss[$cmsclass]) )
		$cms_name = $cmss[$cmsclass];

	if( $is_def_cms )
	{
		if(isset($_SESSION['fc_users_cache']))
			unset($_SESSION['fc_users_cache']);
	?>
		To login, you must <a href="profile.php?register=true" target="_blank">register</a> first.
		Additional moderators can be created using the FlashChat <a href="admin.php" target="_blank">Admin Panel</a>.


	<?php
	}
	else if( $is_stateless )
	{
	?>
		Your Administration Password is "adminpass", and your Spy Password is "spypass". These can be changed by editing the /inc/config.php file
		using any good text editor.
	<?php
	}else
	{
	?>
		Your may login to FlashChat as an administrator, and access the FlashChat admin page, using your <?php if( isset($cms_name) ) echo $cms_name; ?> admin login.
		You should manage the FlashChat users using your <?php if( isset($cms_name) ) echo $cms_name; ?> admin panel, since FlashChat will draw user information from <?php if( isset($cms_name) ) echo $cms_name; ?>.
	<?php
	}
	?>
</b></font></p>

<br>
<a href="index.php">Start FlashChat</a>
</div>
<!--
<p>
Thanks for using FlashChat. You may set additional configuration options manually, by directly editing the PHP files in these
locations. Please be careful that you do not introduce PHP errors while editing. Also, you should not use Windows notepad or wordpad.
Instead, please use a more advanced text editor, like <a href="http://www.textpad.com" target="_blank">TextPad</a> or <a href="http://www.editplus.com" target="_blank">EditPlus</a>
</p>

<table class="normal" cellspacing="4">

<tr><td>color themes</td>		<td>=&gt;</td> <td>/inc/themes/</td></tr>
<tr><td>background images</td>	<td>=&gt;</td> <td>/images/</td></tr>
<tr><td>general chat</td>		<td>=&gt;</td> <td>/inc/config.php</td></tr>
<tr><td>interface layout</td> 	<td>=&gt;</td> <td>/inc/layouts/</td></tr>
<tr><td>sounds  </td>  		    <td>=&gt;</td> <td>/sounds/</td></tr>
<tr><td>interface text</td> 	<td>=&gt;</td> <td>/inc/langs/  (English = en.php)</td></tr>
<tr><td>badwords filter</td> 	<td>=&gt;</td> <td>/inc/badwords.php</td></tr>

</table>
-->
<p>
You may add additional rooms, re-order rooms, un-ban users, and perform various other administrative tasks using the <a href="admin.php" target="_blank">admin.php</a> file,
located in the FlashChat root folder. This file can be accessed with your web browser, using your moderator login.
</p>

<p align="center">(c) <a href="http://tufat.com/" target="_blank">TUFaT.com</a> </p>

</TD><TR>

<?php

include INST_DIR . 'footer.php';

?>