<?php
/*require_once './inc/config.srv.php';*/
$errmsg = '';
if( isset($_POST['submit']) &&  $_POST['submit'] )
{
	if( isset($_POST['cms']) && !$_POST['cms'] ) $errmsg = "Please select your system";
	/*else $errmsg = updateConfig();*/

	if( $errmsg == '' )
	{
		$_SESSION['forcms'] = $_POST['cms'];
		$_SESSION['cache_type'] = 0;
		$_SESSION['usecms'] = true;
		redirect_inst("install.php?step=2");//&forcms={$_POST['cms']}&caching=0
	}

}

/*function updateConfig()
{
	//--- change common.php
	//$old_val = array("require_once(INC_DIR . 'cmses/statelessCMS.php');" , "//require_once(INC_DIR . 'cmses/{$_POST['cms']}.php');");
	//$new_val = array("//require_once(INC_DIR . 'cmses/statelessCMS.php');" , "require_once(INC_DIR . 'cmses/{$_POST['cms']}.php');");
	//$fname = './inc/common.php';
	$repl['CMSsystem'] = "'{$_POST['cms']}'";
	$conf = getConfigData();
	$conf = changeConfigVariables($conf,$repl);
	$res  = writeConfig($conf);
	if(!$res) return "<b>Could not write to '/inc/config.php' file</b>";
	//---

	return '';
}*/


include INST_DIR . 'header.php';
?>
<TR>
	<TD colspan="2">
	</TD>
</TR>
<TR>
	<TD colspan="2" class="subtitle">		Step 1a: Specify Your Bulletin Board or CMS System
	</TD>
</TR>
<TR>
	<TD colspan="2" class="normal">
		<p>
			You have chosen to integrate FlashChat with an existing Bulletin Board or Content Management System, which is already installed and properly configured on your server.
		</p>
		<p>
			FlashChat will now update your /inc/common.php file with the appropriate setting. FlashChat has only been tested using the default installation of specific versions of these systems,
			as described on the <a href="http://www.tufat.com/chat.php" target="_blank">FlashChat Information Page</a>. If you have a version which is unsupported, you may not be able to perform this integration,
			but you can still use FlashChat in non-integrated manner.
		</p>
	</TD>
</TR>


<?php if($errmsg != '') echo '<tr><td colspan="2" class="error_border"><font color="red">' . @$errmsg . '</font></td></tr>'; ?>

<FORM method="post" align="center" name="installInfo">
	<TR>
		<TD>			&nbsp;
		</TD>
		<TD align="right">
			<INPUT type="submit" name="submit" value="Continue >>" onClick1="javascript:return fieldsAreValid('password dbPrefix');">
		</TD>
	</TR>
	<TR>
		<TD colspan="2">
			<TABLE width="100%" class="body_table" cellspacing="10">

				<TR>
					<TD>
						<p class="subtitle">Your System: </p>

						<?php

							natcasesort ($cmss);

							foreach($cmss as $k=>$v)
							{
								echo "<INPUT type=\"radio\" name=\"cms\" value=\"$k\">$v<br>";
							}
						?>

					</TD>
					<td>

					</td>
				</TR>
			</TABLE>
	</TD>
	</TR>
	<TR>
		<TD>			&nbsp;
		</TD>
		<TD align="right">
			<INPUT type="submit" name="submit" value="Continue >>" onClick1="javascript:return fieldsAreValid('password dbPrefix');">
		</TD>
	</TR>

<?php
include INST_DIR . 'footer.php';
?>


