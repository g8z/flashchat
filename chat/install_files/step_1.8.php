<?php

// clears the /temp dir. artemK0
clearTempDir("./temp");
// copy files from /install_files/temp_dir to /temp. artemK0
fillTempDir("./install_files/temp_dir");

if (!isset($_REQUEST['nop']) && !isset($_REQUEST['caching'])) {
	include INST_DIR . 'header.php';
?>
<TR>
	<TD colspan="2">
	</TD>
</TR>
<TR>
	<TD colspan="2" class="subtitle">		Integration
	</TD>
</TR>



<FORM action="install.php?step=1.8" method="post" name="installInfo">
	<TR>
		<TD colspan="2">
			<TABLE width="100%" class="body_table" cellspacing="10">
				<TR>
					<TD>
						<input type="hidden" name="nop" value="1">
						<table cellpadding="0" cellspacing="0" class=normal>
							<tr>
								<td valign="top"><INPUT type="checkbox" name="useCMS" value="1" id="useCMS"></td>
								<td>
									<label for="useCMS">Check here if you wish to integrate FlashChat with an existing bulletin board or content management system (CMS), like phpBB, Mambo, vBulletin, PHP-Nuke, etc.
									For a complete list of the systems that integrate with FlashChat, refer to the "Integrating FlashChat" section of <a href="http://www.tufat.com/chat.php" target="_blank">TUFaT.com</a>
									</label>
								</td>
							</tr>
						</table>
					</TD>
				</TR>
			</TABLE>
		</TD>
	</TR>
	<tr><td colspan="2" align="right"><br/><input type="submit" name="continue" value="Continue >>"></td></tr>
</FORM>
<?php 
	include INST_DIR . 'footer.php';
	die();
}
else {
	if (isset($_REQUEST['useCMS']) && $_REQUEST['useCMS']==1)	{
		redirect_inst("install.php?step=1.6");
	}
}


$errmsg = '';

require_once './inc/config.srv.php';

if( isset($_REQUEST['submit'])  && $_REQUEST['submit'] )
{
	if( isset($_REQUEST['useCMS']) && $_REQUEST['useCMS']==1 )
	{
		$_SESSION['cache_type'] = 0;
		redirect_inst("install.php?step=1.6");
	}
	else
	{
		$_SESSION['cache_type'] = $_REQUEST['caching'];
		if(isset($_REQUEST['caching']) && $_REQUEST['caching']==2)
		{
			$cacheType = $_REQUEST['caching'];
			$rand = mt_rand();
			$_SESSION['rand_num'] = $rand;
			$cacheFilePrefix = $_SESSION['rand_num'];
			$cachePath = $GLOBALS['fc_config']['cachePath'];
			$dbhost=$GLOBALS['fc_config']['db']['host'];
			$dbuser=$GLOBALS['fc_config']['db']['user'];
			$dbpass=$GLOBALS['fc_config']['db']['pass'];
			$dbname=$GLOBALS['fc_config']['db']['base'];
			$dbpref=$GLOBALS['fc_config']['db']['pref'];
			$filename = './temp/config.srv.php';

			if($handle = fopen($filename, 'w+')) {
				$str  = "<?php\n";
				$str .= "\t\$GLOBALS['fc_config'] = array(\n";
				$str .= "\t\t'cacheType' => '$cacheType',\n";
				$str .= "\t\t'cachePath' => '$cachePath',\n";
				$str .= "\t\t'cacheFilePrefix' => '$cacheFilePrefix',\n";
				$str .= "\t);\n";
				$str .= "\t\$GLOBALS['fc_config']['db'] = array(\n";
				$str .= "\t\t'host' => '$dbhost',\n";
				$str .= "\t\t'user' => '$dbuser',\n";
				$str .= "\t\t'pass' => '$dbpass',\n";
				$str .= "\t\t'base' => '$dbname',\n";
				$str .= "\t\t'pref' => '$dbpref',\n";
				$str .= "\t);\n";
				$str .= "?>";

				if(fwrite($handle, $str)) {
					fclose($handle);
				} else {
					return "<b>Could not write to '$filename' file</b>";
				}
			} else {
				return "<b>Could not open '$filename' file for writing</b>";
			}

			// creates config cache file. artemK0
			if($cacheType == 2)
			{
				$fname = dirname(__FILE__).'/../sql/mysql_conf.sql';
				$fname_out = substr($cachePath, 3) . $dbpref . 'config_' . $cacheFilePrefix . '_1.txt';
				$str = createConfigCacheFile($fname, $dbpref);
				$f = @fopen($fname_out, 'w');
				@fwrite($f, $str);
				@fclose($f);
			}

			redirect_inst("install.php?step=3");
		}
		redirect_inst("install.php?step=2");
	}
}


include INST_DIR . 'header.php';
?>
<TR>
	<TD colspan="2">
	</TD>
</TR>
<TR>
	<TD colspan="2" class="subtitle">		FlashChat Caching
	</TD>
</TR>


<?php if($errmsg != '') echo '<tr><td colspan="2" class="error_border"><font color="red">' . @$errmsg . '</font></td></tr>'; ?>

<FORM method="post" align="center" name="installInfo">
	<TR>
		<TD>			&nbsp;
		</TD>
		<TD align="right">
			<INPUT type="submit" name="submit" value="Continue >>" >
		</TD>
	</TR>
	<TR>
		<TD colspan="2">
			<TABLE width="100%" class="body_table" cellspacing="10">
				<TR>
					<TD>
						<INPUT type="radio" name="caching" value="2" checked id="caching2">
						<label for="caching2">
							Enable full caching.
						</label>
					</td>
				</TR>
				<TR>
					<td colspan="2">
						<label for="caching2">
							This option does not require a MySQL connection at all. All data is stored in files. This may slow down performance of the admin tools, and chat messages cannot be saved in long-term storage (since that would degrade performance), but if you do not have MySQL available, or if you do not wish to incur the SQL overhead of a MySQL-based chatroom, this may be a good option. The "bot" feature is not available with this option, since bot data is stored in MySQL. If you have chosen to integrate FlashChat with CMS system (like a forum or website content manager), MySQL is still required, since FlashChat must be able to read user data from the CMS database.
						</label>
					</td>
				</TR>
				<TR>
					<TD>
						<INPUT type="radio" name="caching" value="1" id="caching1">
						<label for="caching1">
							Enable limited caching.
						</label>
					</td>
				</TR>
				<TR>
					<td colspan="2">
						<label for="caching1">
							This option will use some file reading and writing to improve performance and reduce your SQL overhead. All chats are stored in MySQL, but frequently accessed data is also stored in files on the server. A MySQL connection is only established when needed ("on demand" connections), further reducing the system overhead.
						</label>
					</td>
				</TR>
				<TR>
					<TD>
						<INPUT type="radio" name="caching" value="0" id="caching0">
						<label for="caching0">
							No, do not enable caching.
						</label>
					</td>
				</TR>
			</TABLE>
	</TD>
	</TR>
	<TR>
		<TD>			&nbsp;
		</TD>
		<TD align="right">
			<INPUT type="submit" name="submit" value="Continue >>" >
		</TD>
	</TR>


<?php
include INST_DIR . 'footer.php';
?>