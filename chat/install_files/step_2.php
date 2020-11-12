<?php
define('CURRENT_VERSION', '6.0.8');

require_once './inc/config.srv.php';

// added by Pavel 24.10.09
require_once($_REQUEST['useMemory'] ? './inc/tables_memory.php' : './inc/tables_default.php');
//

$useCMS = isset($_SESSION['forcms']) ? $_SESSION['forcms'] : false;

if( isset($useCMS) && $useCMS )
{
	include('./inc/common.php');
	chatServer::prepare();
}
$cacheType = $_SESSION['cache_type'];
$rand = mt_rand();
$_SESSION['rand_num'] = $rand;
$cacheFilePrefix = $_SESSION['rand_num'];
$cachePath = $GLOBALS['fc_config']['cachePath'];
if( isset($_POST['name']) )
{
	//$dbname = $_POST['name'] ? $_POST['name'] : $GLOBALS['fc_config']['db']['base'];
	$dbname = $_POST['name'];
}
else
{
	$dbname = $GLOBALS['fc_config']['db']['base'];
}
if( isset($_POST['user']) )
{
	//$dbuser = $_POST['user'] ? $_POST['user'] : $GLOBALS['fc_config']['db']['user'];
	$dbuser = $_POST['user'];
}
else
{
	$dbuser = $GLOBALS['fc_config']['db']['user'];
}
if( isset($_POST['password']) )
{
	//$dbpass = $_POST['password'] ? $_POST['password'] : $GLOBALS['fc_config']['db']['pass'];
	$dbpass = $_POST['password'];
}
else
{
	$dbpass = $GLOBALS['fc_config']['db']['pass'];
}
if( isset($_POST['host']) )
{
	//$dbhost = $_POST['host'] ? $_POST['host'] : ($GLOBALS['fc_config']['db']['host'] ? $GLOBALS['fc_config']['db']['host'] :(!$useCMS ? 'localhost' : ''));
	$dbhost = $_POST['host'];
}
else
{
	if( isset($GLOBALS['fc_config']['db']['host']) )
		$dbhost = $GLOBALS['fc_config']['db']['host'] ? $GLOBALS['fc_config']['db']['host'] :(!$useCMS ? 'localhost' : '');
}
if( isset($_POST['dbPrefix']) )
{
	//$dbpref = $_POST['dbPrefix'] ? $_POST['dbPrefix'] : ($GLOBALS['fc_config']['db']['pref'] ? $GLOBALS['fc_config']['db']['pref'] : 'flashchat_');
	$dbpref = $_POST['dbPrefix'];
}
else
{
	if( isset($GLOBALS['fc_config']['db']['pref']) )
		$dbpref = $GLOBALS['fc_config']['db']['pref'] ? $GLOBALS['fc_config']['db']['pref'] : 'flashchat_';
}


$errmsg = '';

if( isset($_POST['rooms']) )
{
	//$rooms = $_POST['rooms'] ? $_POST['rooms'] : CHAT_ROOMS;
	$rooms = $_POST['rooms'];
}
else
{
	$rooms = CHAT_ROOMS;
}

$cmsError = false;
if( $useCMS )
{
	if( $dbname == '' || $dbuser == '' || $dbhost == '' ) $cmsError = true;
}

if( isset($_POST['submit_no_update']) && $_POST['submit_no_update'] )
{
	redirect_inst('install.php?step=1');
	exit;
}

if( isset($_POST['submit_update']) && $_POST['submit_update'] )
{

///////////////////////////////////////////////////////////////////////////////////////////////////////
	$errmsg = createTables(true);

	if($useCMS && $errmsg == '')
	{
		//create
		$errmsg = createRooms();
		//---
	}

	//---ROOMS UPDATE
	@mysql_query("ALTER TABLE `{$dbpref}rooms` ADD `password` VARCHAR(32)  NOT NULL AFTER name");
	//---
	// Pavel 22.10.09
	//versioin
	$query = "UPDATE {$dbpref}config as c, {$dbpref}config_values as v SET v.value = '".CURRENT_VERSION."' WHERE c.id = v.id AND c.level_0 = 'version'";
	//$result = mysql_query($query) or die(mysql_error());
	@mysql_query($query);


  $queriesString = '
    INSERT INTO flashchat_config VALUES("2998","pageTitle","","","","","string","","Page title: ","pageTitle","Page title","general","1");
    INSERT INTO flashchat_config VALUES("2999","layouts","1","allowUndock","","","boolean","","Allow \'un-docking\' of the panels:","layouts|1|allowUndock","","layout","2999");
    INSERT INTO flashchat_config VALUES("3000","layouts","2","allowUndock","","","boolean","","Allow \'un-docking\' of the panels:","layouts|2|allowUndock","","layout","3000");
    INSERT INTO flashchat_config VALUES("3001","layouts","8","allowUndock","","","boolean","","Allow \'un-docking\' of the panels:","layouts|8|allowUndock","","layout","3001");
    INSERT INTO flashchat_config VALUES("3002","layouts","3","allowUndock","","","boolean","","Allow \'un-docking\' of the panels:","layouts|3|allowUndock","","layout","3002");
    INSERT INTO flashchat_config VALUES("3003","layouts","4","allowUndock","","","boolean","","Allow \'un-docking\' of the panels:","layouts|4|allowUndock","","layout","3003");
    INSERT INTO flashchat_config VALUES("3004","maxUserNameLength","","","","","integer","","Max User Name Length:","maxUserNameLength","max username length","general","55");
    INSERT INTO flashchat_config VALUES("3005","maxUserPasswordLength","","","","","integer","","Max User Password Length:","maxUserPasswordLength","max user password length","general","56");
    INSERT INTO flashchat_config VALUES("3006","combineCMS","","","","","boolean","","Allow guests login:","combineCMS","allow guests login to your CMS","general","31");
    INSERT INTO flashchat_config VALUES("3007","logEnabled","","","","","boolean","","Enable log feature:","logEnabled","","general","9");
    INSERT INTO flashchat_config VALUES("3008","disabledIRCFor","","","","","string","","Disable these commands for:","disabledIRCFor","specify which user group to disable the commands for","general","15");
    INSERT INTO flashchat_config VALUES("3009","bellTime","","","","","integer","","Bell time: ","bellTime","","general","9");
    INSERT INTO flashchat_config VALUES("3011","disabledLogins","","","","","string","","Disabled values for guests login: ","disabledLogins","Disabled values for guests login (* = any symbols)","general","31");
    INSERT INTO flashchat_config VALUES("3012","labelFormatAdmin","","","","","string","","Label format for admin:","labelFormatAdmin","possible values are any combinations of IP, AVATAR, USER and TIMESTAMP","general","12");

    INSERT INTO flashchat_config_values VALUES("2998","1","3012","FlashChat","0");
    INSERT INTO flashchat_config_values VALUES("2999","1","2999","0","0");
    INSERT INTO flashchat_config_values VALUES("3000","1","3000","0","0");
    INSERT INTO flashchat_config_values VALUES("3001","1","3001","0","0");
    INSERT INTO flashchat_config_values VALUES("3002","1","3002","0","0");
    INSERT INTO flashchat_config_values VALUES("3003","1","3003","0","0");
    INSERT INTO flashchat_config_values VALUES("3004","1","3004","15","0");
    INSERT INTO flashchat_config_values VALUES("3005","1","3005","15","0");
    INSERT INTO flashchat_config_values VALUES("3006","1","3006","0","0");
    INSERT INTO flashchat_config_values VALUES("3007","1","3007","0","0");
    INSERT INTO flashchat_config_values VALUES("3008","1","3008","1","0");
    INSERT INTO flashchat_config_values VALUES("3009","1","3009","180","0");
    INSERT INTO flashchat_config_values VALUES("3011","1","3011","*admin*,Moderator","0");
    INSERT INTO flashchat_config_values VALUES("3012","1","3012","AVATAR[USER] TIMESTAMP [IP]: ","0");
  ';
  $queries = explode(';', $queriesString);

  foreach ($queries as $query){

    $query = trim(str_replace('flashchat_', $dbpref, $query));
    //echo('<br>>>>'.$query.'<br>');
    mysql_query($query) or fb(mysql_error());
  }


	//showIP = false
	$query = "
		UPDATE {$dbpref}config as c, {$dbpref}config_values as v SET v.value = '0'
		WHERE c.id = v.id AND c.level_1 = 'showIP'";
	//$result = mysql_query($query) or die(mysql_error());
	@mysql_query($query);

	//layout
	$query = "
		UPDATE {$dbpref}config as c, {$dbpref}config_values as v
		SET v.value = '25' WHERE c.id = v.id
		AND c.level_3 = 'inputBox'
		AND c.level_4 = 'relHeight'";
	@mysql_query($query);

	//preloader
	//sounds
	$query = "
		UPDATE {$dbpref}config as c
		SET
		c.level_2 = 'sounds',
		c.title = 'Sounds Text:'
		WHERE
		c.level_0 = 'preloader'
		AND c.level_2 = 'settings'
		limit 1";
	@mysql_query($query);
	$query = "
		UPDATE {$dbpref}config as c, {$dbpref}config_values as v
		SET v.value = 'Loading sounds...' WHERE c.id = v.id
		AND c.level_2 = 'sounds'
		AND c.level_0 = 'preloader'";
	@mysql_query($query);
	//skin
	$query = "
		UPDATE {$dbpref}config as c
		SET
		c.level_2 = 'skin',
		c.title = 'Skin Text:'
		WHERE
		c.level_0 = 'preloader'
		AND c.level_2 = 'smilies'
		limit 1";
	@mysql_query($query);
	$query = "
		UPDATE {$dbpref}config as c, {$dbpref}config_values as v
		SET v.value = 'Loading skin...' WHERE c.id = v.id
		AND c.level_2 = 'skin'
		AND c.level_0 = 'preloader'";
	@mysql_query($query);

  $query = "
		UPDATE {$dbpref}config as c, {$dbpref}config_values as v
		SET v.value = '0xCCDAE5' WHERE c.id = v.id
		AND c.level_1 = 'fontColor'
		AND c.level_0 = 'preloader'";
  @mysql_query($query);
  $query = "
		UPDATE {$dbpref}config as c, {$dbpref}config_values as v
		SET v.value = '0x4E72AF' WHERE c.id = v.id
		AND c.level_1 = 'BGColor'
		AND c.level_0 = 'preloader'";
  @mysql_query($query);
  $query = "
		UPDATE {$dbpref}config as c, {$dbpref}config_values as v
		SET v.value = '0x29539B' WHERE c.id = v.id
		AND c.level_1 = 'barColor'
		AND c.level_0 = 'preloader'";
  @mysql_query($query);

	//ban structure (id AI)
	$query = "ALTER TABLE {$dbpref}bans ADD id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY;";
	@mysql_query($query);

	if ($_REQUEST['useMemory']) {
		echo 'Updating...';
		//MEMORY engine
		$query = "UPDATE {$dbpref}config as c, {$dbpref}config_values as v SET v.value = '50'
			WHERE c.id = v.id AND c.level_0 = 'maxMessageCount'";
		//$result = mysql_query($query) or die(mysql_error());
		@mysql_query($query);


		$query = "ALTER TABLE {$dbpref}messages MODIFY txt varchar(255);";
		$result = mysql_query($query) or die(mysql_error());

		$query = "ALTER TABLE {$dbpref}messages ENGINE=MEMORY;";
		$result = mysql_query($query) or die(mysql_error());

		$query = "ALTER TABLE {$dbpref}users MODIFY profile varchar(255);";
		$result = mysql_query($query) or die(mysql_error());

		$query = "ALTER TABLE {$dbpref}users ENGINE=MEMORY;";
		$result = mysql_query($query) or die(mysql_error());

		$query = "ALTER TABLE {$dbpref}connections ENGINE=MEMORY;";
		$result = mysql_query($query) or die(mysql_error());
		//
	}
}


if( isset($_POST['submit']) && $_POST['submit'] )
{
	$appDir = dir(dirname(__FILE__).'/../temp/appdata/');
	while (false !== ($entry = $appDir->read()))
	{
		if(
			$entry == '.' ||
			$entry == '..' ||
			strpos($entry, '.htac')!==FALSE ||
	   		strpos($entry, '.htac')!==FALSE ||
	   		strpos($entry, 'index')!==FALSE ||
	   		strpos($entry, '.txt')!==FALSE
	   	)
		continue;
		$www = unlink(dirname(__FILE__).'/../temp/appdata/'.$entry);
	}
	$appDir->close();

	//---check for existing tables
	$res = checkForUpdate();

	if( is_string( $res ) ) $errmsg = $res;
	elseif( is_array($res) && sizeof($res) != 0)
	{
		$duplicated_tables = $res;
		$show_update = true;

	}
	else
	{
		$errmsg = createTables();

		if($useCMS && $errmsg == '')
		{
			//create
			$errmsg = createRooms();
			//---
		}
		// Pavel 22.10.09
		//versioin
		$query = "UPDATE {$dbpref}config as c, {$dbpref}config_values as v SET v.value = '".CURRENT_VERSION."' WHERE c.id = v.id AND c.level_0 = 'version'";
		@mysql_query($query);
		//
		if ($_REQUEST['useMemory']) {
			$query = "UPDATE {$dbpref}config as c, {$dbpref}config_values as v SET v.value = '50'
				WHERE c.id = v.id AND c.level_0 = 'maxMessageCount'";
			//$result = mysql_query($query) or die(mysql_error());
			@mysql_query($query);
		}
	}
	//---

}

function checkForUpdate()
{
	global $dbname, $dbuser, $dbpass, $dbhost, $dbpref, $useCMS, $db_tables;

	$errMsg = connectToDB($dbname, $dbuser, $dbpass, $dbhost, $dbpref);
	if($errMsg != '') return $errMsg;

	$tables = db_get_array('SHOW TABLE STATUS', 'Name');

	$res_tables = array();

	foreach( $db_tables as $k=>$v )
	{
		$tables2[$dbpref . $k] = $v;
		if( isset( $tables[$dbpref . $k] ) ) $res_tables[] = $dbpref . $k;
	}

	return $res_tables;

}

function createTables($update=false)
{
	global $dbname, $dbuser, $dbpass, $dbhost, $dbpref, $useCMS, $db_tables, $cacheType, $cachePath, $cacheFilePrefix;

	$errMsg = connectToDB($dbname, $dbuser, $dbpass, $dbhost, $dbpref);

	if($errMsg != '') return $errMsg;

		//Write the system configuration
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

		foreach($db_tables as $k=>$str)
		{
			if ( $useCMS && $k == "users" )//skip this table
				continue;

			$str = str_replace('{dbpref}', $dbpref, $str);
			if(@mysql_query($str) === false && $update != true)
			{
				return "<b>Could not create DB table '{$dbpref}$k' </b><br>" . mysql_error();
			}

		}
	 return '';
}

function createRooms()
{
	global $dbpref, $rooms;
	//save rooms
	$rms = preg_split('/,\W*/', $rooms);
	$dbpref = '';
	$errmsg = connectToDB('','','','', $dbpref);

	if($errmsg == '')
	{
		for($i = 0; $i < sizeof($rms); $i++)
		{
				$rms[$i] = trim($rms[$i]);
				if($rms[$i]=='') continue;//skip if the name is blank

				//check if room exists
				$res = mysql_query("SELECT * FROM {$dbpref}rooms WHERE name='{$rms[$i]}'");
				if( mysql_num_rows($res) ) continue;
				//---

				if(!mysql_query("INSERT INTO {$dbpref}rooms (created, name, ispublic, ispermanent) VALUES (NOW(), '{$rms[$i]}', 'y', '" . ($i + 1) . "')"))
				{
					return "<b>Could not create room '{$rms[$i]}'</b><br>";
					break;
				}
		}
	}

	return $errmsg;

}

if( !isset($show_update) )
	$show_update = false;


if( ((isset($_POST['submit']) && $_POST['submit']) || (isset($_POST['submit_update']) && $_POST['submit_update'])) && $errmsg=='' && $useCMS && !$show_update)
{
	//redirect_inst to step 3
	include_once('step_insert.php');
	redirect_inst('install.php?step=3');//&caching='.$_SESSION['caching']
}

if( ((isset($_POST['submit']) && $_POST['submit']) || (isset($_POST['submit_update']) && $_POST['submit_update'])) && $errmsg=='' && !$show_update)
{
	//redirect_inst to step 3
	include_once('step_insert.php');
	redirect_inst('install.php?step=3');//&caching='.$_SESSION['caching']
}
include INST_DIR . 'header.php';
/*connectToDB($dbname, $dbuser, $dbpass, $dbhost, $dbpref);
$query="DROP DATABASE `fc_fullcache`";
mysql_query($query);
$query="CREATE DATABASE `fc_fullcache`";
mysql_query($query);*/
?>


<TR>
	<TD colspan="2">
	</TD>
</TR>
<TR>
	<TD colspan="2" class="subtitle">Step 2: Database Configuration
	</TD>
</TR>

<TR>
	<TD colspan="2" class="normal">The FlashChat installer needs some information about your database to finish the installation. If you do not know this information, then please contact your website host or administrator. Please note that this is probably NOT the same as your FTP login information!

	<?php
	if( $useCMS )
	{
	?>
	<p>
	You have indicated that you wish to integrate FlashChat with <b><?php echo $cmss[$useCMS];?></b>. Please refer to the full integration instructions located
	in the <a href="http://www.tufat.com/wiki/" target="_blank">TUFaT.com Wiki</a>. There are additional steps to complete after this installer is finished.
	</p>

	<?php if( ! $cmsError ) { ?>

	<p>
	The correct login values for your MySQL server should be auto-entered into the form below. If they are not, then you should check to ensure that FlashChat
	is uploaded to the correct location on your server, and that you are using a supported version of the CMS system or bulletin board.
	</p>

	<?php } else { ?>

	<p>
	<FONT color="#FF0000">
		<b>Configuration Error!</b><br><br>
		FlashChat was unable to detect your MySQL login setting from the <b><?php echo $cmss[$useCMS];?></b> configuration file. You must correct this before FlashChat can finish its installation.
		Please refer to the integration Instructions in the <a href="http://www.tufat.com/wiki/" target="_blank">TUFaT.com Wiki</a> to ensure that the FlashChat files were correctly uploaded to your server.
		<br><br>
		Possible Reasons for this error may include:<br><br>

		1) FlashChat was uploaded to an incorrect server location.<br>
		2) The CMS system that you are using is unsupported by FlashChat.<br>
		3) Your server has incompatible settings which may have been undetected in Step 1 of the FlashChat installer. For example, specific security restrictions which are not typical of most PHP/MySQL setups.
	</FONT>
	</p>

	<?php
		}
	}
	?>
	</TD>
</TR>


<?php if($errmsg != '') echo '<tr><td colspan="2" class="error_border"><font color="red">' . @$errmsg . '</font></td></tr>'; ?>

<FORM action="install.php?step=2" method="post" align="center" name="installInfo">
	<TR>
		<TD>&nbsp;
		</TD>
		<TD align="right">
			<INPUT type="submit" name="submit" <?php if($cmsError) echo 'disabled'; ?> value="Continue >>" onClick="javascript:return fieldsAreValid('password dbPrefix');">
			<INPUT type="hidden" name="forcms" value="<?php echo $useCMS;?>">
		</TD>
	</TR>
	<?php if(isset($show_update) && $show_update){ ?>
	<tr>
		<td colspan="2">
			<TABLE width="100%" class="body_table" cellspacing="10">
			<TR><TD>
			<p>The FlashChat installer has detected that the following database tables already exist.<br>
			Based on the information that you inputted, these are likely to be FlashChat tables.
			</p>
			<p>
			<font color="blue">
				<?php  foreach($duplicated_tables as $v) echo $v . '<br>'; ?>
			</font>
			</p>
			<p>
			Would you like to upgrade your current FlashChat installation? This action will add fields that are missing from the the existing tables, and
			add any missing tables. Tables and fields are not removed during this process, and existing data is not removed. Thus, your current chat rooms,
			users, bots, and messages will be preserved.
			</p>
			<p>
			If you are unsure whether these tables are related to FlashChat, then you are advised to check with your website administrator, or use a MySQL access
			tool like phpFlashMyadmin to backup the table contents before continuing.
			</p>

			<INPUT type="submit" name="submit_update" <?php if($cmsError) echo 'disabled'; ?> value="Yes, Continue" onClick="javascript:return fieldsAreValid('password dbPrefix');">
			&nbsp;&nbsp;&nbsp;<INPUT type="submit" name="submit_no_update" value="No, Do Not Continue" >

			</TD>
			</tr>
			</table>

		</td>
	</tr>

	<?php } ?>
	<TR>
		<TD colspan="2">
			<TABLE width="100%" class="body_table" cellspacing="10">

				<TR>
					<TD width="30%" align="right">Database Name:
					</TD>
					<TD>
						<INPUT type="text" size="40" name="name" value="<?php echo $dbname ?>" <?php if($useCMS) echo 'disabled';?>>
					</TD>
				</TR>
				<TR>
					<TD align="right">						Database User:
					</TD>
					<TD>
						<INPUT type="text" size="40" name="user" value="<?php echo $dbuser ?>" <?php if($useCMS) echo 'disabled';?>>
					</TD>
				</TR>
				<TR>
					<TD nowrap align="right">						Database Password:
					</TD>
					<TD valign="top">
						<INPUT type="password" size="40" name="password" value="<?php echo $dbpass ?>" <?php if($useCMS) echo 'disabled';?>>
					</TD>
				</TR>
				<TR>
					<TD align="right">						Database Host:
					</TD>
					<TD>
						<INPUT type="text" size="40" name="host" value="<?php echo $dbhost ?>" <?php if($useCMS) echo 'disabled';?>>
					</TD>
				</TR>

				<TR>
					<TD align="right">						Table Prefix:
					</TD>
					<TD valign="top">
						<INPUT type="text" size="40" name="dbPrefix" value="<?php echo $dbpref ?>" <?php if($useCMS) echo 'disabled';?>>
					</TD>
				</TR>
				<TR>
					<TD colspan="2">This prefix will be prepended to any table names that the FlashChat installer creates. <?php if(! $useCMS ){?> You may leave this blank if desired. <?php }?>
					</TD>
				</TR>

				<?php if( $useCMS ) :?>

				<TR>
					<TD align="right">	Room List (separated by commas):
					</TD>
					<TD valign="top">
						<INPUT type="text"  size="80" name="rooms" value="<?php echo $rooms ?>">
					</TD>
				</TR>

				<?php else : ?>

				<TR>
					<TD align="right">
						<INPUT type="checkbox" name="useMemory" value="1" id="useMemory" <?php if ($_REQUEST['useMemory']) echo 'checked';?>></td>
					</TD>
					<TD valign="top">
						<label for="useMemory">Check here if you wish to to use MEMORY engine for tabes: users, messages, connections. It is recommended to improve performance if large amout of users is expected.</a>
						</label>
					</TD>
				</TR>
				<?php endif; ?>

		</TD>
	</TR>
</TABLE>
	<TR>
		<TD>&nbsp;
		</TD>
		<TD align="right">
			<INPUT type="submit" name="submit" <?php if($cmsError) echo 'disabled'; ?> value="Continue >>" onClick="javascript:return fieldsAreValid('password dbPrefix');">
			<INPUT type="hidden" name="forcms" value="<?php echo $useCMS;?>">
		</TD>
	</TR>

<?php
include INST_DIR . 'footer.php';
?>