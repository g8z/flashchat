<?php
//301
$this->result = array();
if( $this->code_sql==303 ||  $this->queryStr=='INSERT INTO '.$GLOBALS['fc_config']['db']['pref'].'ignors (created, userid, ignoreduserid) VALUES (NOW(), ?, ?)' )
{
	$file_name = $this->getCachFileName('Ignors');
	if( $file_name == null )
	{
		$cacheDir = $this->getCachDir();
		$cachePath = $cacheDir->path;
		$file_name = $cachePath.$GLOBALS['fc_config']['db']['pref'].'ignors_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_'.$params[2].'.txt';
	}
	
	$file = @fopen($file_name,'a');
	$str = date('Y-m-d H:i:s')."\t".$params[0]."\t".$params[1]."\t\t\n";
	@fwrite($file, $str);
	fflush($file);
	@fclose($file);
	return true;
	
	//return $this->insertIgnors( $params );
}//SELECT * FROM flashchat_ignors WHERE userid=? AND ignoreduserid=? 
elseif( $this->code_sql==302 || $this->queryStr=='SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'ignors WHERE userid=? AND ignoreduserid=?' )
{
	$file_name = $this->getCachFileName('Ignors');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		$array = explode("\t",$buffer);
		
		if( $buffer=='' )
			continue;
			
		if( $array[1]==$params[0] && $array[2]==$params[1])
		{
			$array['userid'] = $array[1];
			$array['created'] = $array[0];
			$array['ignoreduserid'] = $array[2];
			
			$array = $this->unsetAll($array);
			
			$allUsers[] = $array;
		}		
	}
	fclose($handle);
	return new ResultSet1($allUsers);
}
elseif( $this->code_sql==309 )//$this->queryStr=='SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'ignors WHERE ignoreduserid=?'
{
	$file_name = $this->getCachFileName('Ignors');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);
		
		if( $array[2]==$params[1])
		{
			$array['userid'] = $array[1];
			$array['created'] = $array[0];
			$array['ignoreduserid'] = $array[2];
			
			$array = $this->unsetAll($array);
			
			$allUsers[] = $array;
		}
	}
	fclose($handle);
	return new ResultSet1($allUsers);
}
elseif( $this->code_sql==301 )
{
	$file_name = $this->getCachFileName('Ignors',$params[0]);
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		$array = explode("\t",$buffer);
		
		if( $buffer=='' )
			continue;
				
		$array['userid'] = $array[1];
		$array['created'] = $array[0];
		$array['ignoreduserid'] = $array[2];
		$array['instance_id'] = $params[0];
		$array = $this->unsetAll($array);
		
		$allUsers[] = $array;				
	}
	fclose($handle);
	return new ResultSet1($allUsers);
}
elseif( $this->queryStr=='SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'ignors ORDER BY userid' )
{
	$file_name = $this->getCachFileName('Ignors');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		$array = explode("\t",$buffer);
		
		if( $buffer=='' )
			continue;
		
		
		$array['userid'] = $array[1];
		$array['created'] = $array[0];
		$array['ignoreduserid'] = $array[2];
		
		$array = $this->unsetAll($array);
		$allUsers[] = $array;				
	}
	fclose($handle);
	return new ResultSet1($allUsers);
}
elseif( $this->code_sql==306 || $this->queryStr=='SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'ignors WHERE userid=?' )
{
	$file_name = $this->getCachFileName('Ignors');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		
		$array = explode("\t",$buffer);
		
		if( $buffer=='' )
			continue;
		
		if( $array[1]==$params[0] )
		{
			$array['userid'] = $array[1];
			$array['created'] = $array[0];
			$array['ignoreduserid'] = $array[2];
			
			$array = $this->unsetAll($array);
			
			$allUsers[] = $array;
		}
		
		
	}
	fclose($handle);
	return new ResultSet1($allUsers);
}
elseif( $this->code_sql==305 || $this->queryStr=='DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'ignors WHERE userid=? AND ignoreduserid=?')
{
	$file_name = $this->getCachFileName('Ignors');			
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		$array = explode("\t",$buffer);
		if( $buffer=='' )
			continue;
		
		if( (int)$array[1]==(int)$params[0] && (int)$array[2]==(int)$params[1] )// && $array[2]!=$params[1] 
			continue;
		$total .= $buffer;			
	}
	@fclose($handle);
	$handle = fopen($file_name, 'w');
	fwrite($handle,$total);
	fflush($handle);
	fclose($handle);
	return true;
}
elseif( $this->code_sql==310 )//$this->queryStr=="SELECT count"
{
	$content = file($file_name);
	$total = 0;
	$allUsers = array();

	for( $i=0 ; $i < sizeof($content) ; $i++ )
	{
		$buffer = $content[$i];

		if( $buffer=='' )
			continue;

		$total++;
	}
	
	$allUsers[]['msgnumb'] = $total;
	return new ResultSet1($allUsers);
}
elseif( $this->code_sql==308 )
{
	$file_name = $this->getCachFileName('Ignors');			
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		$array = explode("\t",$buffer);
		if( $buffer=='' )
			continue;
		
		if( (int)$array[2]==(int)$params[0] )// && $array[2]!=$params[1] 
			continue;
		$total .= $buffer;			
	}
	@fclose($handle);
	$handle = fopen($file_name, 'w');
	fwrite($handle,$total);
	fflush($handle);
	fclose($handle);
	return true;
}

?>