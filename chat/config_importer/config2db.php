<?php
$GLOBALS['my_file_name'] = 'config2db';

define('INC_DIR', dirname(__FILE__).'/');

define('SPY_USERID', -1);
define('ROLE_NOBODY', 0);
define('ROLE_USER', 1);
define('ROLE_ADMIN', 2);
define('ROLE_MODERATOR', 3);
define('ROLE_SPY', 4);
define('ROLE_CUSTOMER', 8);
define('ROLE_ANY', -1);
define('BAN_BYROOMID', 1);
define('BAN_BYUSERID', 2);
define('BAN_BYIP', 3);
define('BAN_BYPC', 4);

define('LEFT', 2);
define('RIGHT', 1);
define('TOP', 2);
define('BOTTOM', 1);


$str = "require_once(INC_DIR . 'flashChatTag.php');";

$content = file( dirname(__FILE__) .'/config.php' );
$file = fopen(dirname(__FILE__) .'/config.php','w');

foreach( $content as $key=>$val )
{
	if( strpos($val,$str)!==false )
	{
		fwrite( $file , str_replace($str,'',$val) );
	}
	else
	{
		fwrite( $file , $val );
	}
}

fclose($file);


require_once(dirname(__FILE__) .'/config.php');
require_once(dirname(__FILE__) .'/badwords.php' );
require_once(dirname(__FILE__).'/../inc/config.srv.php');

mysql_connect($GLOBALS['fc_config']['db']['host'],$GLOBALS['fc_config']['db']['user'],$GLOBALS['fc_config']['db']['pass']);
$link = mysql_select_db($GLOBALS['fc_config']['db']['base']);





$dbname = $_POST['name'] ? $_POST['name'] : $GLOBALS['fc_config']['db']['base'];
$dbuser = $_POST['user'] ? $_POST['user'] : $GLOBALS['fc_config']['db']['user'];
$dbpass = $_POST['password'] ? $_POST['password'] : $GLOBALS['fc_config']['db']['pass'];
$dbhost = $_POST['host'] ? $_POST['host'] : ($GLOBALS['fc_config']['db']['host'] ? $GLOBALS['fc_config']['db']['host'] :(!$useCMS ? 'localhost' : ''));
$dbpref = $_POST['dbPrefix'] ? $_POST['dbPrefix'] : ($GLOBALS['fc_config']['db']['pref'] ? $GLOBALS['fc_config']['db']['pref'] : 'flashchat_');
$count  = 0;
$errmsg = '';

$tables = array
(
	"config"	  => "CREATE TABLE {dbpref}config
							(id int(10) unsigned NOT NULL auto_increment,
  							level_0 varchar(255) NOT NULL default '',
  							level_1 varchar(255) default NULL,
			    			level_2 varchar(255) default NULL,
  							level_3 varchar(255) default NULL,
  							level_4 varchar(255) default NULL,
  							type varchar(10) default NULL,
							units varchar(10) NOT NULL default '',
  							title varchar(255) NOT NULL default '',
  							comment varchar(255) NOT NULL default '',
							info varchar(255) NOT NULL default '',
  							parent_page varchar(255) NOT NULL default '',
  							_order int(10) unsigned NOT NULL default '0',
  							PRIMARY KEY  (id),
  							KEY id (id))",

	"config_values" => "CREATE TABLE {dbpref}config_values
							(id int(3) unsigned NOT NULL auto_increment,
  							instance_id int(10) unsigned NOT NULL default '0',
  							config_id int(10) unsigned NOT NULL default '0',
  							value text NOT NULL,
  							disabled int(1) unsigned NOT NULL default '0',
  							PRIMARY KEY  (id),
  							KEY id (id))",

	"config_instances" => "CREATE TABLE {dbpref}config_instances
							(id int(10) unsigned NOT NULL auto_increment,
							is_active tinyint(1) unsigned NOT NULL default '1',
							is_default tinyint(1) unsigned NOT NULL default '0',
							name varchar(100) NOT NULL default '',
							created_date datetime NOT NULL default '0000-00-00 00:00:00',
							PRIMARY KEY  (id),
							KEY id (id) )",
	"config_chats"  => 	    "CREATE TABLE {dbpref}config_chats (
  							id int(10) unsigned NOT NULL auto_increment,
  							name char(100) NOT NULL default '',
  							instances char(255) NOT NULL default '1',
							is_default tinyint(1) NOT NULL default '0',
  							PRIMARY KEY  (id),
  							KEY id (id))",

);


if( $_POST['submit'] )
{
	$createTable = array();
	$query = "SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}config LIMIT 1";


	if( mysql_query($query) )
		$createTable[] = $GLOBALS['fc_config']['db']['pref'].'config';

	$query = "SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}config_values LIMIT 1";
	if( mysql_query($query) )
		$createTable[] = $GLOBALS['fc_config']['db']['pref'].'config_values';


	$query = "SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}config_instances LIMIT 1";
	if( mysql_query($query) )
		$createTable[] = $GLOBALS['fc_config']['db']['pref'].'config_instances';


	$query = "SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}config_chats LIMIT 1";
	if( mysql_query($query) )
		$createTable[] = $GLOBALS['fc_config']['db']['pref'].'config_chats';
}

if ( !isset($createTable[0]) && $_POST['submit'] )
{
    $errmsg = createTables();
	$errmsg = insertValues();


	$query = "SELECT id FROM {$GLOBALS['fc_config']['db']['pref']}config_instances
			  WHERE is_default = 1 LIMIT 1";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	scan_config($row['id'], $GLOBALS['fc_config'], $str='');



}
if( isset($_POST['submit_updates']) )
{

	$query = "SELECT id FROM {$GLOBALS['fc_config']['db']['pref']}config_instances
			  WHERE is_default = 1 LIMIT 1";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	scan_config($row['id'], $GLOBALS['fc_config'], $str='');
}

function scan_config($inst_id, $node, &$str, $node_name = array('', '', '', '', '', '', ''), $level = 0)
{
	global $count;

	while (list($key, $val) = each($node))
	{//echo "FUNCT - $inst_id<br>";
		//if ( $val == '') {
		//    $val = 0;
		//}
		//echo $key."  -  ".$val."<br>";
		if(in_array($key, array('languages', 'db', 'bot', 'cms'))) continue;

		if(is_array($val))
		{
			$node_name[$level++] = $key;
			scan_config($inst_id, $val, $str, $node_name, $level);
			$node_name[$level--] = '';
		}
		else
		{
			$node_name[$level] = $key;
			$node_name[5] = addslashes($val);
			$node_name[6] = gettype($val);
			$str = '';
			$i = 0;
			$next = false;
			for(; $i < 5; $i++)
			{


				if ( $node_name[$i] == '')
					break;
				else
				{
					if ($str != '')
						$str = $str.' AND ';
					else
						$str = $str.'';
					if ($node_name[0] == 'badWords')
					{
    					$node_name[1] = $node_name[5];
					}
					if(strpos($node_name[5],"x") === false)
					{

							if ($node_name[0] == 'themes' && ($node_name[2] != 'uiAlpha' && $node_name[2] != 'showBackgroundImagesOnLogin'&& $node_name[2] != 'showBackgroundImages'))
								if ($node_name[2] != 'name' && $node_name[2] != 'dialogBackgroundImage' && $node_name[2] != 'backgroundImage')
								{
									if( $node_name[5] < 0 )
										$next = true;

									$node_name[5] = sprintf("0x%06X",$node_name[5]);
								}

							if ($node_name[0] == 'preloader' && ($node_name[1] == 'fontColor'||$node_name[1] == 'BGColor'||$node_name[1] == 'barColor'))
							{
									if( $node_name[5] < 0 )
										$next = true;

									$node_name[5] = sprintf("0x%06X",$node_name[5]);
							}


					}
					if ( $node_name[6] == 'boolean' && $node_name[5] == '')
					    $node_name[5] = 0;

					//echo $node_name[4],$node_name[5]."<br>";
					$str = $str." level_$i='".$node_name[$i]."'";
				}
			}

			if( $next )
				continue;

//echo $key."  -  ".$val." - ".$node_name[6]."<br>";
			$query1 = "SELECT id,type FROM {$GLOBALS['fc_config']['db']['pref']}config
					  WHERE $str LIMIT 1";

			$result = mysql_query($query1);

			$row = mysql_fetch_array($result);
	    	$ID = $row['id'];
			//$type
		    //echo $query1."<br>";


			if ( $ID == '' )
			{
			    $pos = strrpos($str,"AND");
				$str = substr($str,0,$pos);
				//echo $str."<br>";
				$query1 = "SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}config
					  	   WHERE $str LIMIT 1";

				$result = mysql_query($query1);
				$row = mysql_fetch_assoc($result);
				$bool = false;
				while( list($key, $val) = each($row) )
				{
					//echo $key." - ".$val."<br>";
					if ( $key == 'id')
						$str = 'NULL';
					else
					{
						if ( substr($key,strrpos($key,"_")+1) == ($i-1) )
						    $val = $node_name[$i-1];
						if ($val == 'badWords')
							$bool = true;

						if ( $bool )
						{
							if ( $key == 'title' )
							    $val = $node_name[5];

						    if ( $key == 'comment' )
							    $val = 'BadWords|'.$node_name[5];
						}

						$str = $str.',\''.$val.'\'';
					}


				}

				$query2 = "INSERT INTO {$GLOBALS['fc_config']['db']['pref']}config VALUES($str)";
				$result = mysql_query($query2);//);
				$conf_id = mysql_insert_id();
				$query3 = "INSERT INTO {$GLOBALS['fc_config']['db']['pref']}config_values VALUES(NULL,'1','$conf_id','$node_name[5]','0')";
				$result = mysql_query($query3);

			}
			else
			{

				if ( !$inst_id )
					$query2 = "UPDATE {$GLOBALS['fc_config']['db']['pref']}config_values SET value='$node_name[5]' WHERE config_id=".$ID;
				else
					$query2 = "UPDATE {$GLOBALS['fc_config']['db']['pref']}config_values SET value='$node_name[5]' WHERE instance_id = $inst_id AND config_id=".$ID;
			$result = mysql_query($query2);
			}
		//echo $query2."<br>";

			if (!$result) {
			    echo "error<br>";
			}
			$count++;
			$node_name[$level] = '';
			$node_name[5] = '';
			$node_name[6] = '';
		}
	}
}

function splitSql_fc(&$ret, $sql, $release)
{
        $sql          = trim($sql);
        $sql_len      = strlen($sql);
        $char         = '';
        $string_start = '';
        $in_string    = FALSE;
        $time0        = time();
   // echo $sql;
        for ($i = 0; $i < $sql_len; ++$i)
		{
            $char = $sql[$i];

            // We are in a string, check for not escaped end of strings except for
            // backquotes that can't be escaped
            if ($in_string) {
                for (;;) {
                    $i         = strpos($sql, $string_start, $i);
                    // No end of string found -> add the current substring to the
                    // returned array
                    if (!$i) {
                        $ret[] = $sql;
                        return TRUE;
                    }
                    // Backquotes or no backslashes before quotes: it's indeed the
                    // end of the string -> exit the loop
                    else if ($string_start == '`' || $sql[$i-1] != '\\') {
                        $string_start      = '';
                        $in_string         = FALSE;
                        break;
                    }
                    // one or more Backslashes before the presumed end of string...
                    else {
                        // ... first checks for escaped backslashes
                        $j                     = 2;
                        $escaped_backslash     = FALSE;
                        while ($i-$j > 0 && $sql[$i-$j] == '\\') {
                            $escaped_backslash = !$escaped_backslash;
                            $j++;
                        }
                        // ... if escaped backslashes: it's really the end of the
                        // string -> exit the loop
                        if ($escaped_backslash) {
                            $string_start  = '';
                            $in_string     = FALSE;
                            break;
                        }
                        // ... else loop
                        else {
                            $i++;
                        }
                    } // end if...elseif...else
                } // end for
            } // end if (in string)

            // We are not in a string, first check for delimiter...
            else if ($char == ';') {
                // if delimiter found, add the parsed part to the returned array
                $ret[]      = substr($sql, 0, $i);
                $sql        = ltrim(substr($sql, min($i + 1, $sql_len)));
                $sql_len    = strlen($sql);
                if ($sql_len) {
                    $i      = -1;
                } else {
                    // The submited statement(s) end(s) here
                    return TRUE;
                }
            } // end else if (is delimiter)

            // ... then check for start of a string,...
            else if (($char == '"') || ($char == '\'') || ($char == '`')) {
                $in_string    = TRUE;
                $string_start = $char;
            } // end else if (is start of string)

            // ... for start of a comment (and remove this comment if found)...
            else if ($char == '#'
                     || ($char == ' ' && $i > 1 && $sql[$i-2] . $sql[$i-1] == '--')) {
                // starting position of the comment depends on the comment type
                $start_of_comment = (($sql[$i] == '#') ? $i : $i-2);
                // if no "\n" exits in the remaining string, checks for "\r"
                // (Mac eol style)
                $end_of_comment   = (strpos(' ' . $sql, "\012", $i+2))
                                  ? strpos(' ' . $sql, "\012", $i+2)
                                  : strpos(' ' . $sql, "\015", $i+2);
                if (!$end_of_comment) {
                    // no eol found after '#', add the parsed part to the returned
                    // array if required and exit
                    if ($start_of_comment > 0) {
                        $ret[]    = trim(substr($sql, 0, $start_of_comment));
                    }
                    return TRUE;
                } else {
                    $sql          = substr($sql, 0, $start_of_comment)
                                  . ltrim(substr($sql, $end_of_comment));
                    $sql_len      = strlen($sql);
                    $i--;
                } // end if...else
            } // end else if (is comment)
    		else if( $char == '/' && $sql[$i+1] == "*")//parse /* */ comment
			{
				$start_of_comment = $i;
				$i += 1;
				while( ++$i < $sql_len)
				  if( $sql[$i] == "/" && $sql[$i-1]=="*") break;

				$com_len = $i+1 - $start_of_comment;
				$sql = substr($sql, 0, $start_of_comment).ltrim(substr($sql, $i+1));
				$sql_len      = strlen($sql);

				$i -= $com_len;
			}

            // ... and finally disactivate the "/*!...*/" syntax if MySQL < 3.22.07
            /*else if ($release < 32270
                     && ($char == '!' && $i > 1  && $sql[$i-2] . $sql[$i-1] == '/*')) {
                $sql[$i] = ' ';
            } */// end else if

            // loic1: send a fake header each 30 sec. to bypass browser timeout
            /*
			$time1     = time();
            if ($time1 >= $time0 + 30) {
                $time0 = $time1;
                header('X-pmaPing: Pong');
			} // end if
			*/
        } // end for

        // add any rest to the returned array
        if (!empty($sql) && preg_match('/[^[:space:]]+/', $sql)) {
            $ret[] = $sql;
        }

        return TRUE;
} // end of the 'PMA_splitSqlFile()' function
function toLog($title, $str)
	{
		//if( !$GLOBALS['fc_config']['errorReports'] ) return;

		$fname = 'log.txt';
		if( (!is_writable( $fname ) && file_exists( $fname )) || !is_writable( '.' ) ) return;

		$fp = @fopen($fname,"a");
		@fwrite($fp,"\n//-----------------------------------------------------");
		@fwrite($fp,"\n//----$title");
		@fwrite($fp,"\n//-----------------------------------------------------");

		if( is_array( $str ) )
		{
			ob_start();
			print_r( $str );
			$str = ob_get_contents();
			ob_end_clean();
		}

		@fwrite ( $fp,"\n".$str);
		@fclose( $fp );
	}
function insertValues()
{
	global $dbname, $dbuser, $dbpass, $dbhost, $dbpref;
	$pach = dirname(__FILE__).'./sql/mysql_conf.sql';
	$handle = fopen($pach, "r");
	if (!$handle)
	{
	    echo "Can not open file.";
		die;
	}
	$contents = fread($handle, filesize($pach));
	splitSql_fc($insert, $contents, 30329);
	for($k = 0;$k < count($insert);$k++)
	{
		$insert[$k] = str_replace('INSERT INTO flashchat_', "INSERT INTO $dbpref", $insert[$k]);
		//echo $insert[$k]."<br>";
		mysql_query( $insert[$k] );
	}
	if ( isset( $_SESSION['upd_cms'] ) )
	{
		$sql = "UPDATE {$dbpref}config_values,{$dbpref}config
			   SET {$dbpref}config_values.value = '{$_SESSION['upd_cms']}'
		       WHERE {$dbpref}config_values.config_id = {$dbpref}config.id
			   AND {$dbpref}config.level_0 = 'CMSsystem'";
		$res = mysql_query( $sql );
	}
	fclose($handle);
}

function connectToDB($dbname='', $dbuser='', $dbpass='', $dbhost='', &$dbpref)
{
	if( $dbname == '' )
	{
		require_once './inc/config.srv.php';
		$dbhost = $GLOBALS['fc_config']['db']['host'];
		$dbuser = $GLOBALS['fc_config']['db']['user'];
		$dbpass = $GLOBALS['fc_config']['db']['pass'];
		$dbname = $GLOBALS['fc_config']['db']['base'];
		$dbpref = $GLOBALS['fc_config']['db']['pref'];
	}

	if($conn = @mysql_connect($dbhost, $dbuser, $dbpass))
	{
		if(! mysql_select_db($dbname, $conn))
		{
			return "<b>Could not select '$dbname' database - please make sure this database exists</b><br>" . mysql_error();
		}
	}
	else
	{
		return '<b>Could not connect to MySQL database - please check database settings</b><br>' . mysql_error();
	}

	return '';

}

function createTables($update=false)
{
	global $dbname, $dbuser, $dbpass, $dbhost, $dbpref, $useCMS, $tables;

	$errMsg = connectToDB($dbname, $dbuser, $dbpass, $dbhost, $dbpref);
	if($errMsg != '') return $errMsg;

		//Write the system configuration
		$filename = './inc/config.srv.php';
		if($handle = fopen($filename, 'w+')) {
			$str  = "<?php\n";
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


		foreach($tables as $k=>$str)
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

?>

<html>
<head>
<title>FlashChat <?php echo $GLOBALS['fc_config']['version'];?> Importer</title>
<META http-equiv=Content-Type content="text/html; charset=UTF-8">
<link href="./install_files/styles.css" rel="stylesheet" type="text/css" media="screen">
<script language="javascript" src="install_files/scripts.js"></script>

</head>
<body>
<table align="center" cellpadding=2 cellspacing=7 class=normal width=70% border="0" >
<tr>
<td colspan="2" nowrap class='title' valign="middle"><?php if( !isset($notShowHdr) ) echo 'FlashChat ' . $GLOBALS['fc_config']['version'] . ' Importer'; ?>
</td>
</tr>

<TR>
	<TD colspan="2">
	</TD>
</TR>
<TR>
	<TD colspan="2" class="subtitle">Database Configuration
	</TD>
</TR>
<?if ( $_POST['submit_updates'] || (!isset($createTable[0]) && $_POST['submit']) )
	{
	    echo "<TR><TD><br>$count variables imported successfully</TD></TR>";
	}
	else
	{
?>
<TR>
	<TD colspan="2" class="normal">The FlashChat installer needs some information about your database to finish the import. If you do not know this information, then please contact your website host or administrator. Please note that this is probably NOT the same as your FTP login information!
	</TD>
</TR>
<?
	if ( isset($createTable[0])  )
	{
	   echo '<TR><TD colspan="2" class="normal">Table:</TD></TR>';
	   foreach( $createTable as $key => $val )
	   {
		   echo '<TR><TD colspan="2" class="error_border"><font color="red">'.$val.'</font></TD></TR>';
	   }
	   echo '<TR><TD colspan="2" class="normal">is install.Update?</TD></TR>';
	}
?>

<tr><td colspan=2 class="error_border"><font color="red"><?php echo @$errmsg; ?></font></td></tr>
<?
if (!$link)
{
$errmsg = "Could not select '{$GLOBALS['fc_config']['db']['base']}' database - please make sure this database exists
           Unknown database '{$GLOBALS['fc_config']['db']['base']}'";
    ?><tr><td colspan=2 class="error_border"><font color="red"><?echo @$errmsg;?></font></td></tr><?
}
?>
<FORM action="config2db.php" method="post" align="center" name="installInfo">
	<TR>
		<TD colspan="2">
			<TABLE width="100%" class="body_table" cellspacing="10" border="0">

				<TR>
					<TD width="30%" align="right">Database Name:
					</TD>
					<TD>
						<INPUT type="text" size="40" name="name" disabled value="<?php echo $dbname ?>" <?php if($useCMS) echo 'disabled';?>>
					</TD>
				</TR>
				<TR>
					<TD align="right">						Database Host:
					</TD>
					<TD>
						<INPUT type="text" size="40" name="host" disabled value="<?php echo $dbhost ?>" <?php if($useCMS) echo 'disabled';?>>
					</TD>
				</TR>

				<TR>
					<TD align="right">						Table Prefix:
					</TD>
					<TD valign="top">
						<INPUT type="text" size="40" name="dbPrefix"  disabled value="<?php echo $dbpref ?>" <?php if($useCMS) echo 'disabled';?>>
					</TD>
				</TR>
				<TR>
					<TD colspan="2">This prefix will be prepended to any table names that the FlashChat installer creates. <?php if(! $useCMS ){?> You may leave this blank if desired. <?php }?>
					</TD>
				</TR>

		</TD>
	</TR>
</TABLE>
	<TR>
		<TD>
			&nbsp;
		</TD>
		<TD align="right">
		<?
		if ($link)
		{
			if ( isset($createTable[0]) )
		      echo '<INPUT type="submit" name="submit_updates" value="Updates">';
			else
				echo '<INPUT type="submit" name="submit" value="Import">';
		}

		?>

			<INPUT type="hidden" name="forcms" value="<?php echo $useCMS;?>">
		</TD>
	</TR>
</FORM>
<?}?>
</table>
</body>
</html>