<?php
$GLOBALS['my_file_name'] = 'rename_tables';

require_once('inc/common.php');
$servername = 'localhost';

// ****** DATABASE USERNAME & PASSWORD ******
// This is the username and password you use to access MySQL.
// These must be obtained through your webhost.
$dbusername = 'root';
$dbpassword = '';

// ****** DATABASE NAME ******
// This is the name of the database where your vBulletin will be located.
// This must be created by your webhost.
$dbname = $GLOBALS['fc_config']['db']['base'];
//$tableprefix = 'vb3_';

if (!mysql_connect($servername, $dbusername,$dbpassword)) {
   echo 'Could not connect to mysql';
   exit;
}
function db_tables($dbname)
{
 $sql = "SHOW TABLES FROM $dbname";
 $result = mysql_query($sql);

 if (!$result) {
   echo "DB Error, could not list tables\n";
   echo 'MySQL Error: ' . mysql_error();
   exit;
 }

 while ($row = mysql_fetch_row($result)) {
   //echo "Table: {$row[0]}<br>\n";
   $db_tables[$row[0]]=1;
   
   //$query ="rename table $row[0] to $tableprefix$row[0]";
   //mysql_select_db($dbname);
   //mysql_query($query) or die(mysql_error());
 }
 mysql_free_result($result);
 return $db_tables;
} //function db_tables($dbname)
function add_instance_id($table)
{
 $sql = "SHOW columns FROM $table";
 $result = mysql_query($sql);

 if (!$result) {
   echo "DB Error, could not list tables\n";
   echo 'MySQL Error: ' . mysql_error();
   exit;
 }

 $row_num=0;
 while ($row = mysql_fetch_row($result)) {
  if($row[0]=="instance_id") return 0;

 }
 mysql_free_result($result);
 return 1;
}
$st_1=db_tables($dbname);
//print_r($st_1);
//$st_2=db_tables("sexytalk_db");
foreach($st_1 as $table=>$val)
{
 //echo $table."<br>";//continue;
 if(!add_instance_id($table)) continue;
 $query ="alter table $table  add instance_id int(11) default 1";
 //$query=substr($query,0,-1);
 echo $query.";<br>";
}//foreach($st_2 as $table=>$val)
//exit;

?> 