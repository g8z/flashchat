<?php

if ( isset($_POST['ftpHost']) && $_POST['ftpHost'] )
{
	$errmsg = '';


	@set_time_limit(150);

	include INST_DIR . 'ftp.inc.php';

	$f = new FTP;

	if ( $f->connect ( $_POST['ftpHost'] ) == false )
	{
		$errmsg =  'Unable to connect to FTP host.<br />Please check your FTP login information and click continue.' ;
	}
	elseif ( !$f->authenticate ( $_POST['ftpUser'] , $_POST['ftpPassword'] ) )
	{
		$errmsg = 'Invalid username or password.<br />Please check your FTP login information and click continue.';
	}
	elseif ( !$f->chdir ( $_POST['ftpPath'] ) )
	{
		$errmsg = 'Invalid FTP path.<br />Please check your FTP path and click continue.';
	}
	elseif ( !$f->chmod ( './inc/config.srv.php' , '0777' ) || !$f->chmod ( './temp/appdata/appTime.txt' , '0777' ) )
	{
		$errmsg = 'The FTP login information that you provided does not allow sufficient access to change the necessary file permissions.<br />Please check the file ownership settings, change the permissions manually with an FTP client, or contact your website hosting support.' ;
	}

	if( $errmsg == '')
	{   //redirect_inst to step 1
		echo '<script language="JavaScript" type="text/javascript">
			<!--// redirect_inst
	  			window.location.href = "install.php?step=1";
			//-->
		 </script>
		';

		die;
	}
}

include INST_DIR . 'header.php';

?>

<script language="javascript">
<!--
function fieldsAreValid() {
	var theForm = document.installInfo;

	if ( theForm.ftpHost.value == '' ) {
		alert( 'Please specify the FTP host' );
		theForm.ftpHost.focus();
		return false;
	}
	if ( theForm.ftpPath.value == '' ) {
		alert( 'Please specify the path to FlashChat files' );
		theForm.ftpPath.focus();
		return false;
	}

	if ( theForm.ftpUser.value == '' || theForm.ftpPassword.value == '' ) {
		alert( 'Please specify the FTP username and password' );
		theForm.ftpUser.focus();
		return false;
	}
	return true;
}
//-->
</script>

<tr><td colspan=2></td></tr>
<tr><td colspan=2 class=subtitle>FTP Settings</td></tr>

<tr><td colspan=2 class=normal>The FlashChat installer needs some information about your FTP account in order to automatically change your file permissions.<br><br>
			<!--h5-->** Please Note ** : FTP information is NOT Database information. FTP (File Transfer Protocol) is used for uploading and downloading files to and from your web server, whereas your database is used to store information raw data for database-driven scripts such as FlashChat.<!--/h5--></td></tr>

<form action="install.php?step=1.5" method="post" align="center" name="installInfo">

<?php if($errmsg != '') echo '<tr><td colspan="2" class="error_border"><font color="red">' . @$errmsg . '</font></td></tr>'; ?>

<tr><td colspan=2 class="normal"><table width="100%" class="body_table" border="0">

<tr><td width="30%" align="right" class="normal">FTP Host or IP Address: </td><td><input type=text size=20 name=ftpHost value="<?php echo @$_POST['ftpHost']; ?>"></td></tr>

<tr><td width="30%" align="right" class="normal">FTP User: </td><td valign="top"><input type=text size=20 name=ftpUser value="<?php echo @$_POST['ftpUser']; ?>"></td></tr>

<tr><td width="30%" align="right" class="normal">FTP Password: </td><td><input type=password size=20 name=ftpPassword value="<?php echo @$_POST['ftpPassword']; ?>">

<tr><td align="right" class="normal">* Path to FlashChat files: </td><td><input type=text size=20 name=ftpPath value="<?php echo @$_POST['ftpPath']; ?>"></td></tr>

<tr><td colspan=2>&nbsp;</td></tr>

<tr><td colspan=2><font size="2">* Path to FlashChat files - In order for the installer to find the files to change, you must specify path to the FlashChat files, relative to the FTP root.<br><br>
Different hosts have different FTP file paths. Here are some examples of possible paths (yours is likely to be different from any of these, however):<br><br>

/home/your_username/htdocs/FlashChat/<br>
/home/httpd/virtualhosts/www.your_domain.com/htdocs/FlashChat/<br>
/htdocs/FlashChat/<br>
/FlashChat/<br>
/<br></td></tr>

</td></tr></table>
<tr><td>&nbsp;</td><td align=right><input type=submit name=submit value="Continue >>" onclick="javascript:return fieldsAreValid();"></td></tr>

<?php
include INST_DIR . 'footer.php';
?>