<?php

$this->result = array();
$file_name = $this->getCachFileName('configMain');

if( !file_exists($file_name) )
{

	if(strpos($GLOBALS['REQUEST_URI'], "/admin")!==false)
	{
		Header("Location:../install.php");
		die;
	}
	Header("Location:install.php");
	die;
}
$file_name_inst = $this->getCachFileName('configInstances');
//$_SESSION['code'] = $this->code_sql;
if( $this->code_sql==1 )//'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'config_main'
{


	$content = file( $file_name );
	for( $i = 0; $i <  sizeof($content) ; $i++ )
	{
		$array = explode("\t",$content[$i]);

		$array['id'] = $array[0];
		$array['level_0'] = $array[1];
		$array['level_1'] = '';
		$array['level_2'] = '';
		$array['level_3'] = '';
		$array['level_4'] = '';
		$array['value'] = $array[6];
		$array['type'] = '';
		$array['title'] = $array[8];
		$array['comment'] = $array[9];
		$array['info'] = '';
		$array['parent_page'] = '';
		$array['_order'] = $array[12];

		$array = $this->unsetAll($array);
		$allUsers[] = $array;
	}
	//return $allUsers;
	return new ResultSet1( $allUsers );
}
if( $this->code_sql==3 )//'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'config_instances'
{
	$content = file( $file_name_inst );
	for( $i = 0; $i <  sizeof($content) ; $i++ )
	{
		$array = explode("\t",$content[$i]);

		$array['id'] = $array[0];
		$array['is_active'] = $array[1];
		$array['is_default'] = $array[2];
		$array['name'] = $array[3];
		$array['created_date'] = $array[4];

		$array = $this->unsetAll($array);

		$allUsers[] = $array;
	}
	//return $allUsers;
	return new ResultSet1( $allUsers );
}
if( $this->code_sql==2 )//'WHERE is_active=1 OR is_default=1 ORDER BY id'
{
	$content = file( $file_name_inst );

	for( $i = 0; $i <  sizeof($content) ; $i++ )
	{
		$array = explode("\t",$content[$i]);


		if( (int)$array[1]==1 || (int)$array[2]==1 )
		{
			$array['id'] = $array[0];
			$array['is_active'] = $array[1];
			$array['is_default'] = $array[2];
			$array['name'] = $array[3];
			$array['created_date'] = $array[4];

			$array = $this->unsetAll($array);
		}

		$allUsers[] = $array;
	}
	//return $allUsers;

	return new ResultSet1( $allUsers );
}
if( $this->code_sql==4 )//SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'config_instances  WHERE id=?  ORDER BY id
{
	$content = file( $file_name_inst );
	$allUsers = array();
	for( $i = 0; $i <  sizeof($content) ; $i++ )
	{
		$array = explode("\t",$content[$i]);
		if( $params[0]==$array[0] )
		{
			$array['id'] = $array[0];
			$array['is_active'] = $array[1];
			$array['is_default'] = $array[2];
			$array['name'] = $array[3];
			$array['created_date'] = $array[4];

			$array = $this->unsetAll($array);
		}
		$allUsers[] = $array;
	}
	return new ResultSet1( $allUsers );
}
if( $this->code_sql == 5 )//SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'config_instances  WHERE id=?  ORDER BY id
{
	$content = file( $file_name_inst );
	$allUsers = array();
	/*for( $i = 0; $i <  sizeof($content) ; $i++ )
	{
		$array = explode("\t",$content[$i]);
		if( $params[0]==$array[0] )
		{
			$array['id'] 		   = $array[0];
			$array['is_active']    = $array[1];
			$array['is_default']   = $array[2];
			$array['name'] 		   = $array[3];
			$array['created_date'] = $array[4];

			unset( $array[0] );
			unset( $array[1] );
			unset( $array[2] );
			unset( $array[3] );
			unset( $array[4] );
		}
		$allUsers[] = $array;
	}*/
	return new ResultSet1( $allUsers );
}





?>