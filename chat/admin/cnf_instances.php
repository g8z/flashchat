<?php
$fc_instance_tables	= array("rooms","users","connections","messages","bans","rooms","ignors");// added on 090706 for chat instances
//-----------DELETE--------------------------------------------------------

if ( $_REQUEST['method'] == 'Delete' )
{
	$query = "SELECT id,is_default
			  FROM {$TABLE_PREF}config_instances";
	$f = db_get_array($query);
	
	foreach( $f as $k=>$v )
		if ( $v['is_default'] == 1 && $v['id'] == $_REQUEST['ID'] )
		{
			reset( $f );
			list($k,$v) = each($f);
			$sql = "UPDATE {$TABLE_PREF}config_instances SET is_active='1',is_default='1'
		     	    WHERE id='{$v['id']}'
				    LIMIT 1";			
			query2($sql);
			break;
		}
	
	
    $sql = "DELETE FROM {$TABLE_PREF}config_instances
			WHERE id={$_REQUEST['ID']}";
	query2( $sql );	
		
	$sql = "DELETE FROM {$TABLE_PREF}config_values
			WHERE instance_id = {$_REQUEST['ID']}";
	query2( $sql );	
	// added on 090706 for chat instances
	foreach($fc_instance_tables as $fc_instance_table)
	{
	 $sql = "DELETE FROM {$TABLE_PREF}$fc_instance_table
			WHERE instance_id = {$_REQUEST['ID']}";
	 query2( $sql );	
	} 
	// added on 090706 for chat instances ends here	
	if ( $_REQUEST['ID'] == $_SESSION["session_inst"] )
		unset($_SESSION["session_inst"]);
	//delete all files with this instances
	if ($handle = opendir( APPDATA_DIR ))
	{
    	while (false !== ($file = readdir($handle)))
			if ( $file != '.' && $file != '..' )
				if ( substr($file,strrpos($file,"_")+1) == $_REQUEST['ID'].'.php' )
					unlink(APPDATA_DIR.$file);
      
   		closedir( $handle ); 
	}	
}
//-------------------------------------------------------------------------


if ( $_POST["submit"] )
{
    $fld = getPOSTfields('fld_');
	$errMsg == '';
	
	if( $errMsg == '' )
		foreach($fld['err'] as $k=>$v)
		{
			if ( $v['default'] == 1 )
			    $v['activate'] = 1;
			
			$sql = "UPDATE {$TABLE_PREF}config_instances 
			        SET is_active='{$v['activate']}',name='{$v['name']}',is_default='{$v['default']}'
		     	    WHERE id='$k'
				    LIMIT 1";			
			query2($sql);
		}
}


//-----------------------DUBLICATE-----------------------------------------------------
if ( $_REQUEST['method'] == 'Dublicate' )
{
	unset($f);
	$query = "SELECT {$TABLE_PREF}config_instances.name
              FROM {$TABLE_PREF}config_instances 
			  WHERE {$TABLE_PREF}config_instances.id = {$_REQUEST['ID']}
			  LIMIT 1";
	$f = db_get_array($query);
	list($key,$val) = each($f);
	$date = date("Y-m-d H:i:s");
	$sql = "INSERT INTO {$TABLE_PREF}config_instances (id, is_active, is_default, name, created_date)
			VALUES (NULL,'1','0', '{$val['name']} Copy', '{$date}')";
	query2($sql);
		
	$return_id = mysql_insert_id();
	$sql = "INSERT INTO {$TABLE_PREF}config_values
			( instance_id,config_id,value,disabled )
			SELECT '{$return_id}',config_id,value,disabled
			FROM {$TABLE_PREF}config_values
			WHERE {$TABLE_PREF}config_values.instance_id = {$_REQUEST['ID']};";
	query2($sql);
	// added on 090706 for chat instances
	//must use all $fc_instance_tables	 to complete this
	$sql = "INSERT INTO {$TABLE_PREF}rooms
			 ( created,name,password,ispublic,ispermanent,instance_id )
			 SELECT NOW() ,name,password,ispublic,ispermanent,'{$return_id}'
              FROM {$TABLE_PREF}rooms 
			  WHERE {$TABLE_PREF}rooms.instance_id = {$_REQUEST['ID']}";
	query2($sql);
	
	$sql = "update {$TABLE_PREF}config_values set value = (select id from {$TABLE_PREF}rooms where instance_id = '{$return_id}' limit 1 )  where instance_id = '{$return_id}' and config_id = 26";//defaultRoom
	query2($sql);
	// added on 090706 for chat instances ends here
}

//---------------------------------------------------------------------------------------------
unset($instances_name);	

$query = "SELECT {$TABLE_PREF}config_instances.*
	      FROM {$TABLE_PREF}config_instances ORDER BY id;";
$f = db_get_array($query);

foreach( $f as $k=>$v )
{
	$instances_session[] = $v;
	if ( $v['is_active'] == 1 OR $v['is_default'] == 1 )
	    $instances_name[$k] = $v;
}


//--- assign Smarty values
$smarty->assign( 'count_inst', count( $instances_session ));
$smarty->assign( 'instances', $instances_session );
$smarty->assign( 'errMsg', $errMsg );
?>