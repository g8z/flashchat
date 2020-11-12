<?php
define('INC_DIR', realpath(dirname(__FILE__) . '/../inc/')."/");
define('IMPORT_DIR', realpath(dirname(__FILE__) . '/../config_importer/')."/");
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
$GLOBALS['fc_config_stop'] = 1;
$pach = '../sql/mysql_conf.sql';
$config_importer['config'] = IMPORT_DIR.'config.php';
$config_importer['badwords'] = IMPORT_DIR.'badwords.php';
foreach($config_importer as $filename=>$file_path)
{
 if(!(is_file($file_path) && !is_dir($file_path)))
 {
  die("File not Found in config_importer/ folder ($filename.php) .Please upload the file and try again");
 }
 else
 {
  require_once($file_path);
 }//if(!(is_file($file_path) && !is_dir($file_path)))
}//foreach($config_importer as $filename=>$file_path) 
require_once(INC_DIR.'config.srv.php');
//$pach = dirname(__FILE__).'./sql/mysql_conf.sql';



//flashcaqt_config
//id,level_0,level_1,level_2,level_3,level_4,type,title,comment,info,parent_page,_order
//flashchat_config_values
//id,instance_id,config_id,value,disabled
//flashchat_instances
//id,is_active,is_default,name,created_date
function pre_array($array)
{
 echo "<pre>";
 print_r($array);
 echo "</pre>";
}
function fc_config_query_from_vals($table,$values)
{ //"INSERT INTO flashchat_config_values VALUES(\"".join("\",\"",$fc_config_values_current)."\");";
 return  "INSERT INTO $table VALUES(\"".join("\",\"",$values)."\");";
}//function fc_config_query_from_vals($table,$values)
 function fc_config_value($value,$type)
 {
  
  switch($type)
  {
   case "boolean":
    $out_var = $value == "true" ? 1 : 0;
    break;
   default:	
    $out_var = $value;
  }//switch($type)
  return $out_var;
  
 }//function fc_config_value($value,$type)
  
   function set_config_val_array($config_record,&$fc_config_values_current)
   { 
    //$GLOBALS['fc_config'];
	
	//pre_array($config_record); exit;
	
	//$config_fields =  array("level_0","level_1","level_2","level_3","level_4");
	$config_fields =  array(1,2,3,4,5);
	if( $config_record[1] == 'version') return;//version is current version and not as in the imported config
    foreach($config_fields as $key=>$value)
	{
	 if($config_record[$value] == '') break;
	 if($value == 1)
	 {
	  $config_array = $GLOBALS['fc_config'][$config_record[$value]];
	 }
	 else //if($value == 1)
	 {
	  //echo $value."&nbsp;$config_record[$value]&nbsp;<br>";
	  $config_array = $config_array[$config_record[$value]];
	 } //if($value == 1)
	 //echo $config_record[0].")".$config_record[$value].")$config_array<br>";
	}//foreach($config_array_key as $key=>$value)
	//replace the default query value only if there is a value in config.php,ie skip if no value set in config.php or this is a new config special to flashchat 5
	if($config_array !="")
	{
	 $fc_config_values_current[3] = fc_config_value($config_array,$config_record[6]); 
	} //if($config_array !="")
	
   }//function set_config_val_array($config_record,&$fc_config_values_current)
   

	$handle = fopen($pach, "r");
	if (!$handle)
	{
	    echo "Can not open file.";
		die;
	}
   $fc_config_sqls = array();
   $fc_config_values_current = array();	
   $fc_config_values = array();
   $fc_config_tables = array("flashchat_config","flashchat_config_values","flashchat_config_instances");
   $query_line = false;
   $lin_num = 0;
   while($sql_query = fgets($handle, filesize($pach)))
   {
    $lin_num++;
    foreach($fc_config_tables as $fc_config_table)
	{
     $query_line = false;
	 if(preg_match("/^INSERT INTO ([^\s]+) VALUES\(\"(.+)\"\);/",$sql_query,$match) && $match[1]==$fc_config_table)
	 {
	  $query_line =  true;
	  break;
	 }//if(preg_match("/^INSERT INTO ([^\s]+) VALUES/",$sql_query,$match) && $match[1]==$fc_config_table)
	}//foreach($fc_config_tables as $fc_config_table)
	
	//$fc_config_sqls[$fc_config_table]
	if($query_line  )
	{
	 $fc_config_values_current = explode(',"',$match[2]);
	 //if(!(count($fc_config_values[$fc_config_table]) <300  && ($lin_num == 42 || $fc_config_values_current[2] == 39 ))) conitnue;
	 if($fc_config_table == "flashchat_config_instances")
	 {
	  $fc_config_values_current[4] = date("Y-m-d H:i:s");
	  $sql_query = fc_config_query_from_vals("flashchat_config_instances",$fc_config_values_current);
	 }//if($fc_config_table != "flashchat_config_instances")
	 if($fc_config_table != "flashchat_config_values")
	 {
	  $fc_config_sqls[$fc_config_table][]= $sql_query;
	  $fc_config_values_index = $fc_config_values_current[0];//count($fc_config_values[$fc_config_table]);
	  //$fc_config_values[$fc_config_table][$fc_config_values_index] =  $fc_config_values_current;//$fc_config_values_current[1]
	 } 
	 else//if($fc_config_table != "flashchat_config_values")
	 {
	  $fc_config_config_id = $fc_config_values_current[2];//count($fc_config_values[$fc_config_table]);
	  //$fc_config_values_current["config_id"] = $fc_config_config_id;
	  
	  $fc_config_values_index = $fc_config_values["flashchat_config"][$fc_config_config_id][1];
	  set_config_val_array($fc_config_values["flashchat_config"][$fc_config_config_id],
						$fc_config_values_current
						);//$fc_config_values["flashchat_config"][count($fc_config_values[$fc_config_table])][1];
	  //$fc_config_values[$fc_config_table][$fc_config_config_id] =  $fc_config_values_current;//$fc_config_values_current[1]
	  $fc_config_sqls[$fc_config_table][]= fc_config_query_from_vals("flashchat_config_values",$fc_config_values_current);
	 }//if($fc_config_table != "flashchat_config_values")
	 $fc_config_values[$fc_config_table][$fc_config_values_index] =  $fc_config_values_current;//$fc_config_values_current[1]
	 //echo $sql_query."<br>"; pre_array($match); pre_array($fc_config_values);exit;
	}//if($query_line)
	
   }//while($contents = fgets($handle, filesize($pach)))
   
   
   // pre_array($fc_config_values);
	//pre_array($fc_config_sqls);
	
//flashcaqt_config
//id,level_0,level_1,level_2,level_3,level_4,type,title,comment,info,parent_page,_order
//flashchat_config_values
//id,instance_id,config_id,value,disabled
//flashchat_instances
//id,is_active,is_default,name,created_date	
mysql_connect($GLOBALS['fc_config']['db']['host'],$GLOBALS['fc_config']['db']['user'],$GLOBALS['fc_config']['db']['pass']);
$link = mysql_select_db($GLOBALS['fc_config']['db']['base']);

//=======================================================================================================================================

$fc_config_tables_create = array
(
    
	"config"	  => "CREATE TABLE {$GLOBALS['fc_config']['db']['pref']}config
							(id int(10) unsigned NOT NULL auto_increment,
  							level_0 varchar(255) NOT NULL default '',
  							level_1 varchar(255) default NULL,
			    			level_2 varchar(255) default NULL,
  							level_3 varchar(255) default NULL,
  							level_4 varchar(255) default NULL,
  							type varchar(10) default NULL,
  							title varchar(255) NOT NULL default '',
  							comment varchar(255) NOT NULL default '',
							info varchar(255) NOT NULL default '',
  							parent_page varchar(255) NOT NULL default '',
  							_order int(10) unsigned NOT NULL default '0',
  							PRIMARY KEY  (id),
  							KEY id (id))",
							
	"config_values" => "CREATE TABLE {$GLOBALS['fc_config']['db']['pref']}config_values
							(id int(3) unsigned NOT NULL auto_increment,
  							instance_id int(10) unsigned NOT NULL default '0',
  							config_id int(10) unsigned NOT NULL default '0',
  							value text NOT NULL,
  							disabled int(1) unsigned NOT NULL default '0',
  							PRIMARY KEY  (id),
  							KEY id (id))",
							
	"config_instances" => "CREATE TABLE {$GLOBALS['fc_config']['db']['pref']}config_instances
							(id int(10) unsigned NOT NULL auto_increment,
							is_active tinyint(1) unsigned NOT NULL default '1',
							is_default tinyint(1) unsigned NOT NULL default '0',
							name varchar(100) NOT NULL default '',
							created_date datetime NOT NULL default '0000-00-00 00:00:00',
							PRIMARY KEY  (id),
							KEY id (id) )"/*,
	"config_chats"  => 	    "CREATE TABLE {$GLOBALS['fc_config']['db']['pref']}config_chats (
  							id int(10) unsigned NOT NULL auto_increment,
  							name char(100) NOT NULL default '',
  							instances char(255) NOT NULL default '1',
							is_default tinyint(1) NOT NULL default '0',
  							PRIMARY KEY  (id),
  							KEY id (id))",*/

);
    
	$rs = mysql_query("show tables");
 while($rec = mysql_fetch_array($rs))
 {
  $table_names[] = $rec[0];
 }
 mysql_free_result($rs);
 foreach($fc_config_tables_create as $tablename=>$query)
 {
  if(in_array($GLOBALS['fc_config']['db']['pref'].$tablename,$table_names))
  {
   $query = "Truncate table {$GLOBALS['fc_config']['db']['pref']}$tablename";
  }//if(!in_array("".$tablename,$table_names)
   echo $query."<br>";
   mysql_query($query) or die(mysql_error().$sql);
 }//foreach($fc_config_tables_create as $tablename=>$query)
 //pre_array($table_names);exit;

foreach($fc_config_sqls as $table=>$sql_array)
{
 echo "# $table<br><br>";
 foreach($sql_array as $sql)
 {
   $sql = str_replace("INSERT INTO flashchat_","INSERT INTO {$GLOBALS['fc_config']['db']['pref']}",$sql);
   echo "$sql<br>";
   mysql_query($sql) or die(mysql_error().$sql);
   
 }  
}
?>