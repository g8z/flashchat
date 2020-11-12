<?php
session_start();
/*
if(session_name() == '')
{
	session_name('flashchat_bot');
	session_start();
}*/

?>

<html>
<head>
<title>FlashChat <?php echo $GLOBALS['fc_config']['version'];?> Installer</title>
<META http-equiv=Content-Type content="text/html; charset=UTF-8">
<link href="../../../../../install_files/styles.css" rel="stylesheet" type="text/css" media="screen">

</head>
<body class="normal">

<TABLE  class="body_table" border="0" cellspacing="0" height="100%" cellspacing="10" cellpadding="10">
<TR>
<TD valign="top">

<?php

if( ! defined('THIS_DIR') )	define('THIS_DIR', dirname(__FILE__) . '/');



require_once THIS_DIR . "dbprefs.php";


require_once THIS_DIR . "botloaderfuncs.php";

//delete subs.inc
if( file_exists('subs.inc') ) @unlink('subs.inc');
//---
print "<b>When this script is done running you should see text that says \"DONE LOADING.\" If the script times out it is probably because your PHP is running in safe mode.</B><BR>\n";

ss_timing_start("all");

$fp = "";

$templatesinserted=0;

$depth = array();
$whaton = "";

$pattern = "";
$topic = "";
$that = "";
$template = "";

$startupwhich = "";
$splitterarray = array();
$inputarray = array();
$genderarray = array();
$personarray = array();
$person2array = array();

if(isset($_SESSION) && isset($_SESSION['files']))
	$thefiles = $_SESSION['files'];

loadstartup();
makesubscode();

print "<font color='RED'><br><b>DONE LOADING</B><BR></font>\n";
print "<font color='BLUE'><br>Inserted $templatesinserted categories into database</font>\n";

ss_timing_stop("all");
print "<BR><font color='BLACK'><br>execution time: " . sprintf("%01.0f",ss_timing_current("all")) .' seconds';
$avgts = $templatesinserted/ss_timing_current("all");
$avgts = sprintf("%01.0f", $avgts);
//$avgtm = $templatesinserted/((ss_timing_current("all"))/60);
print "<BR><font color='BLACK'><br>Templates per second: $avgts<BR>";
//print "<font color='BLACK'>Templates per minute=$avgtm<BR>";

?>
</td></tr>
<tr>
<TD align="right">
	<input type="button" name="continue" value="Continue >>" onclick="javascript:parent.document.location.href='../../../../../install.php?step=8'"><!--<?php echo $_SESSION['url'] ?> -->
</TD>
</tr>
</table>
</body>
</html>