<?php
	require_once( dirname(__FILE__). '/inc/config.srv.php' );
	@mysql_connect($GLOBALS['fc_config']['db']['host'],$GLOBALS['fc_config']['db']['user'],$GLOBALS['fc_config']['db']['pass']);
	@mysql_select_db($GLOBALS['fc_config']['db']['base']);
	function fc_addslashes($row)
	{
	 foreach($row as $key=>$value)
	 {
	  $row[$key] = addslashes($value);
	 }
	 return $row;
	}//function fc_addslashes(&$row)
	
	$fc_config_tables = array("flashchat_config","flashchat_config_chats","flashchat_config_instances","flashchat_config_values");//,"flashchat_config_values");
	header("Content-type: text/plain");
	foreach($fc_config_tables as $fc_config_table)
	{
	 
	 $query ="select * from $fc_config_table";
	 $result = mysql_query($query);
?>
#
# Dumping data for table '<?php echo $fc_config_table ?>'
#	 
<?php
     echo "Truncate table $fc_config_table;\n";	
	 $fc_rownum = 1;
	 while($row=mysql_fetch_assoc($result))
	 {
	 
     // $row['id'] = $fc_rownum;$fc_rownum++;
	  $insert_sql= "INSERT INTO $fc_config_table VALUES(\"".join(fc_addslashes($row),"\",\"")."\");\n";
	  echo $insert_sql;
	 }//while($row=mysql_fetch_assoc($result);
	 mysql_free_result($result);
?>
	 
	 
<?php
	}//foreach($fc_config_tables as $fc_config_table)
	
	
?>
