<?php

print "<b>When this script is done running you should see text that says \"DONE LOADING.\" </B><BR>\n";
print "<b>With a large number of aiml files you may have to scroll down to see it. </B><BR>\n";

if( ! defined('THIS_DIR') )	define('THIS_DIR', dirname(__FILE__) . '/');

require_once THIS_DIR . "dbprefs.php";

/**
* Contains the actual functions used in this file to load the AIML files into MySQL.
*/
require_once THIS_DIR . "botupdatefuncs.php";

//delete subs.inc
if( file_exists('subs.inc') ) @unlink('subs.inc');
//---

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

