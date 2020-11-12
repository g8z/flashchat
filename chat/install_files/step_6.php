<?php


function processUpdate()
{
	//---
	//get files
	$ret = array();
	foreach( $_POST as $k => $v )
	{
		if( substr($k,0,4 ) != "fld_" ) continue;
		$fld = substr($k,4);
		$ret[] = $fld;
	}

	//$ret[] = 'std-65percent';
	//$ret[] = 'std-pickup';

	$ret = array_unique($ret);

	if( sizeof($ret) == 0 )
	{
		echo '<script language="JavaScript" type="text/javascript">
				<!--// redirect_inst
		  			window.location.href = "install.php?step=8";
				//-->
			 </script>
			';

			die;
	}

	//session_name('flashchat_bot');
	//session_start();
	$_SESSION['files'] = $ret;
	$_SESSION['url']   = $_SERVER['SCRIPT_NAME'];

	require_once './inc/config.srv.php';

	//Create DB tables
	$tables = array(
			"bot"  => "CREATE TABLE {$GLOBALS['fc_config']['db']['pref']}bot (  id int(11) NOT NULL auto_increment,  bot tinyint(4) NOT NULL default '0',  name varchar(255) NOT NULL default '',  value text NOT NULL,  PRIMARY KEY  (id),  KEY botname (bot,name)) TYPE=MyISAM;",
			"bots" => "CREATE TABLE {$GLOBALS['fc_config']['db']['pref']}bots ( id tinyint(3) unsigned NOT NULL auto_increment,  botname varchar(255) NOT NULL default '',  PRIMARY KEY  (botname),  KEY id (id)) TYPE=MyISAM;",
			"conversationlog" => "CREATE TABLE {$GLOBALS['fc_config']['db']['pref']}conversationlog (  bot tinyint(3) unsigned NOT NULL default '0',  id int(11) NOT NULL auto_increment,  input text,  response text,  uid varchar(255) default NULL,  enteredtime timestamp(14) NOT NULL,  PRIMARY KEY  (id),  KEY botid (bot)) TYPE=MyISAM;",
			"dstore"    => "CREATE TABLE {$GLOBALS['fc_config']['db']['pref']}dstore (  uid varchar(255) default NULL,  name text,  value text,  enteredtime timestamp(14) NOT NULL,  id int(11) NOT NULL auto_increment,  PRIMARY KEY  (id),  KEY nameidx (name(40))) TYPE=MyISAM;",
			"gmcache"   => "CREATE TABLE {$GLOBALS['fc_config']['db']['pref']}gmcache (  id int(11) NOT NULL auto_increment,  bot tinyint(3) unsigned NOT NULL default '0',  template int(11) NOT NULL default '0',  inputstarvals text,  thatstarvals text,  topicstarvals text,  patternmatched text,  inputmatched text,  combined text NOT NULL,  PRIMARY KEY  (id),  KEY combined (bot,combined(255))) TYPE=MyISAM;",
			"gossip"    => "CREATE TABLE {$GLOBALS['fc_config']['db']['pref']}gossip (  bot tinyint(3) unsigned NOT NULL default '0',  gossip text,  id int(11) NOT NULL auto_increment,  PRIMARY KEY  (id),  KEY botidx (bot)) TYPE=MyISAM;",
			"patterns"  => "CREATE TABLE {$GLOBALS['fc_config']['db']['pref']}patterns (  bot tinyint(3) unsigned NOT NULL default '0',  id int(11) NOT NULL auto_increment,  word varchar(255) default NULL,  ordera tinyint(4) NOT NULL default '0',  parent int(11) NOT NULL default '0',  isend tinyint(4) NOT NULL default '0',  PRIMARY KEY  (id),  KEY wordparent (parent,word),  KEY botid (bot)) TYPE=MyISAM;",
			"templates" => "CREATE TABLE {$GLOBALS['fc_config']['db']['pref']}templates (  bot tinyint(3) unsigned NOT NULL default '0',  id int(11) NOT NULL default '0',  template text NOT NULL,  pattern varchar(255) default NULL,  that varchar(255) default NULL,  topic varchar(255) default NULL,  PRIMARY KEY  (id),  KEY bot (id)) TYPE=MyISAM;",
			"thatindex" => "CREATE TABLE {$GLOBALS['fc_config']['db']['pref']}thatindex (  uid varchar(255) default NULL,  enteredtime timestamp(14) NOT NULL,  id int(11) NOT NULL auto_increment,  PRIMARY KEY  (id)) TYPE=MyISAM;",
			"thatstack" => "CREATE TABLE {$GLOBALS['fc_config']['db']['pref']}thatstack (  thatid int(11) NOT NULL default '0',  id int(11) NOT NULL auto_increment,  value varchar(255) default NULL,  enteredtime timestamp(14) NOT NULL,  PRIMARY KEY  (id)) TYPE=MyISAM;",
			//users to do
		);

	$dbname = $GLOBALS['fc_config']['db']['base'];
	$dbuser = $GLOBALS['fc_config']['db']['user'];
	$dbpass = $GLOBALS['fc_config']['db']['pass'];
	$dbhost = $GLOBALS['fc_config']['db']['host'];
	$dbpref = $GLOBALS['fc_config']['db']['pref'];

	$errmsg = '';

	$errmsg = connectToDB($dbname, $dbuser, $dbpass, $dbhost, $dbpref);
	if($errmsg != '') return $errmsg;

	foreach($tables as $k=>$str)
	{
		$qry = "DROP TABLE IF EXISTS {$GLOBALS['fc_config']['db']['pref']}$k";
		@mysql_query($qry);

		if(@mysql_query($str) === false)
		{
			return "<b>Could not create DB table '{$dbpref}$k' </b><br>" . mysql_error();
		}

	}

	//update config.php
	$repl['enableBots'] = '1';
	/*$conf = getConfigData();
	$conf = changeConfigVariables($conf, $repl);
	writeConfig($conf);*/
	// updates value in table, and then value will automaticaly writed to config.php. artemK0
	$query="UPDATE ".$dbpref."config_values SET value=? WHERE config_id=?
			AND instance_id = ? LIMIT 1";
	$stmt = new Statement($query, 403);
	$f = $stmt->process($repl['enableBots'], 8, $_SESSION['session_inst']);
	//---

	return '';
}


if( isset($_POST['submit_btn']) && $_POST['submit_btn'] )
{
		$step = 7;
		$errmsg = processUpdate();

		//FOR TESTING

		//if( $errmsg == '') $errmsg = '*** defaultUsrExtCMS.php updated successful plese test your chat *** only for test ***';

		//-----------
		if( $errmsg == '')
		{
			//redirect_inst to step 3
			echo '<script language="JavaScript" type="text/javascript">
				<!--// redirect_inst
		  			window.location.href = "install.php?step='. $step .'";
				//-->
			 </script>
			';

			die;
		}
}

//get bases
$learnfiles = array();
$rootdir = './temp/bot/programe/aiml';
$dir=opendir ($rootdir);
while ($file = readdir($dir))
{
	if (substr($file,strpos($file,"."))==".aiml")
	{
	            $learnfiles[] = basename($file, '.aiml');
	}
}

closedir($dir);

//----
include INST_DIR . 'header.php';
?>

<TR>
	<TD colspan="2"></TD>
</TR>
<TR>
	<TD colspan="2" class="subtitle">Step 6: Integrating an AI bot with FlashChat</TD>
</TR>
<TR>
	<TD colspan="2" class="normal">
	<p>You may chat with an artificial intelligence entity known as a "bot" in FlashChat.
In addition to the standard bot knowledge base, you may add custom bot knowledge
bases to make your bot smarter. You may read more about the technology behind this
feature at <a href="http://www.alicebot.org" target="_blank">Alicebot.org</a> . FlashChat uses a specific Alicebot variant called <a href="http://sourceforge.net/projects/programe" target="_blank">Program E</a> .
	</p>
	<p>
	After installation, you may start the bot by logging into FlashChat as a moderator, then issue the following commands in sequence:<br>
	/addbot {botname}<br>
	/startbot {botname}<br>
	/killbot {botname}<br>
	</p>
	<p>
	For example:<br>
	/addbot Alice<br>
	/startbot Alice<br>
	/killbot Alice</p>
	<p>
	Additional bot startup options can be found in the "bots" section of the FlashChat admin panel.
	</p>
	</TD>
</TR>


<?php if($errmsg != '') echo '<tr><td colspan="2" class="error_border"><font color="red">' . @$errmsg . '</font></td></tr>'; ?>


	<TR >
		<TD colspan="2" >
		<FORM  method="post" align="center" name="installInfo">
			<TABLE  class="body_table" border="0" cellspacing="10">
				<TR>
					<TD align="right" nowrap>
						<input type="button" name="continue" value="Skip this step" onclick="javascript:document.location.href='install.php?step=8&skipbot=1'">
						<INPUT type="submit" name="submit_btn" value="Continue >>">
					</TD>
				</TR>
				<TR>
					<TD width="10%" align="left" valign="top"><b>Bot knowledge bases:</b><br>Complete bot installation requires about 10 MB of database storage space.</TD>
				</tr>
				<tr>
					<TD valign="top">
					<table class="normal" border="0" cellspacing="5" width="100%">
						<?php
							for($i=0; $i<sizeof($learnfiles); $i++)
							{
								if($i % 3 == 0)echo '<tr>';
								echo "<td nowrap><INPUT type=\"checkbox\" name=\"fld_{$learnfiles[$i]}\" value=\"1\" checked>{$learnfiles[$i]}</td>";
								if(($i+1) % 3 == 0 || ($i+1>=sizeof($learnfiles)))echo '</tr>';
							}
						?>
					</table>
					</TD>
				</TR>

				<TR>
					<TD align="right" nowrap>
						<input type="button" name="continue" value="Skip this step" onclick="javascript:document.location.href='install.php?step=8&skipbot=1'">
						<INPUT type="submit" name="submit_btn" value="Continue >>">
					</TD>
				</TR>

<?php
include INST_DIR . 'footer.php';
?>