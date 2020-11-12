<?php

$this->result = array();
//103

if( $this->code_sql==106 )
{
	$file_name = $this->getCachFileName('Users',$params[0]);
	$content = file($file_name);

	$allUsers = array();

	for( $i = 0 ; $i < sizeof($content);$i++ )
	{
		$buffer = $content[$i];

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);
		$temp = array();


		$temp['id'] = $array[0];
		$temp['login'] = $array[1];
		$temp['password'] = $array[2];
		$temp['roles'] = $array[3];
		$temp['profile'] = $array[4];
		$temp['instance_id'] = $params[0];



		$allUsers[] = $temp;
	}
	return new ResultSet1($allUsers);


	return new ResultSet1($this->processUser('*','login',$params));
}
elseif(  $this->code_sql==140 || $this->queryStr == 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE login=? LIMIT 1' )
{
	$file_name = $this->getCachFileName('Users');
	$content = file($file_name);

	$allUsers = array();

	for( $i = 0 ; $i < sizeof($content);$i++ )
	{
		$buffer = $content[$i];

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if( $array[1]==$params[0] )
		{
			$allUsers[0]['id'] = $array[0];
			$allUsers[0]['login'] = $array[1];
			$allUsers[0]['password'] = $array[2];
			$allUsers[0]['roles'] = $array[3];
			$allUsers[0]['profile'] = $array[4];
			$allUsers[0]['instance_id'] = $params[1];
			$array = $this->unsetAll($array);
			break;
		}

	}
	return new ResultSet1($allUsers);
}
elseif( $this->code_sql==112 || $this->queryStr == 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE login=?' )
{
	$file_name = $this->getCachFileName('Users');
	$content = file($file_name);

	$allUsers = array();

	for( $i = 0 ; $i < sizeof($content);$i++ )
	{
		$buffer = $content[$i];

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if( $array[1]==$params[0] )
		{
			$array['id'] = $array[0];
			$array['login'] = $array[1];
			$array['password'] = $array[2];
			$array['roles'] = $array[3];
			$array['profile'] = $array[4];
			$array['instance_id'] = $params[1];
			$array = $this->unsetAll($array);
			$allUsers[] = $array;
		}

	}
	return new ResultSet1($allUsers);
}elseif( $this->code_sql==147 )
{
	$file_name = $this->getCachFileName('Users');
	$content = file($file_name);

	$allUsers = array();

	for( $i = 0 ; $i < sizeof($content);$i++ )
	{
		$buffer = $content[$i];

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if( $array[1]==$params[0] && $array[0]!=$params[1] )
		{
			$allUsers[0]['id'] = $array[0];
			$allUsers[0]['login'] = $array[1];
			$allUsers[0]['password'] = $array[2];
			$allUsers[0]['roles'] = $array[3];
			$allUsers[0]['profile'] = $array[4];
			$allUsers[0]['instance_id'] = $array[5];
			$array = $this->unsetAll($array);
			break;
		}

	}
	return new ResultSet1($allUsers);
}
elseif( $this->code_sql==101 )
{
	$file_name = $this->getCachFileName('Users');
	$content = file($file_name);

	$allUsers = array();

	for( $i = 0 ; $i < sizeof($content);$i++ )
	{
		$buffer = $content[$i];

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if( $array[1]==$params[0] )
		{
			$allUsers[0]['id'] = $array[0];
			$allUsers[0]['login'] = $array[1];
			$allUsers[0]['password'] = $array[2];
			$allUsers[0]['roles'] = $array[3];
			$allUsers[0]['profile'] = $array[4];
			$allUsers[0]['instance_id'] = $array[5];
			$array = $this->unsetAll($array);
			break;
		}

	}
	return new ResultSet1($allUsers);
}
elseif( $this->code_sql==141 )
{
	$file_name = $this->getCachFileName('Users');
	$content = file($file_name);

	$allUsers = array();

	for( $i = 0 ; $i < sizeof($content);$i++ )
	{
		$buffer = $content[$i];

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if( $array[1]==$params[0] && ( $array[1]==$params[0] || $array[3]==2 )  )
		{
			$allUsers[0]['id'] = $array[0];
			$allUsers[0]['login'] = $array[1];
			$allUsers[0]['password'] = $array[2];
			$allUsers[0]['roles'] = $array[3];
			$allUsers[0]['profile'] = $array[4];
			$allUsers[0]['instance_id'] = $array[5];
			$array = $this->unsetAll($array);
			break;
		}

	}
	return new ResultSet1($allUsers);
}
elseif( $this->code_sql==103 )//SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}users WHERE id=? LIMIT 1
{
	$file_name = $this->getCachFileName('Users');
	$content = file($file_name);

	$allUsers = array();

	for( $i = 0 ; $i < sizeof($content);$i++ )
	{
		$buffer = $content[$i];

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if( $array[0]==$params[0] )
		{
			$allUsers[0]['id'] = $array[0];
			$allUsers[0]['login'] = $array[1];
			$allUsers[0]['password'] = $array[2];
			$allUsers[0]['roles'] = $array[3];
			$allUsers[0]['profile'] = $array[4];
			$array = $this->unsetAll($array);
			break;
		}

	}
	return new ResultSet1($allUsers);
}//
elseif( $this->code_sql==104 )//SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users where instance_id= '.$_SESSION['session_inst'].' ORDER BY login
{
	$file_name = $this->getCachFileName('Users');
	$content = file($file_name);

	$allUsers = array();

	for( $i = 0 ; $i < sizeof($content);$i++ )
	{
		$buffer = $content[$i];

		if( $buffer=='' )
			continue;

		$array = explode("\t", $buffer);
		$tmp = array();
		$tmp['id'] = $array[0];
		$tmp['login'] = $array[1];
		$tmp['password'] = $array[2];
		$tmp['roles'] = $array[3];
		$tmp['profile'] = $array[4];
		$array = $this->unsetAll($array);
		$allUsers []= $tmp;
	}
	return new ResultSet1($allUsers);
}
elseif( $this->code_sql==115 )//SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE login=? AND id<>? AND instance_id=? LIMIT 1
{
	$file_name = $this->getCachFileName('Users');
	$content = file($file_name);

	$allUsers = array();

	for( $i = 0 ; $i < sizeof($content);$i++ )
	{
		$buffer = $content[$i];

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if( $array[1]==$params[0] && $array[0]!=$params[1] )
		{
			$allUsers[0]['id'] = $array[0];
			$allUsers[0]['login'] = $array[1];
			$allUsers[0]['password'] = $array[2];
			$allUsers[0]['roles'] = $array[3];
			$allUsers[0]['profile'] = $array[4];
			$array = $this->unsetAll($array);
			break;
		}

	}
	return new ResultSet1($allUsers);
}
elseif( $this->queryStr == 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE login=? AND id<>? LIMIT 1' )
{
	return new ResultSet1($this->processUser('*','login,id',$params));
}//SELECT * FROM flashchat_users LIMIT 1
elseif( $this->queryStr == 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users' )
{
	return new ResultSet1($this->processUser('*','',$params));
}//
elseif( $this->code_sql==115 || $this->queryStr == 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users LIMIT 1' )
{
	$file_name = $this->getCachFileName('Users');
	$content = file($file_name);

	$allUsers = array();

	for( $i = 0 ; $i < sizeof($content);$i++ )
	{
		$buffer = $content[$i];

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if( isset($array[0]) )
		{
			$allUsers[0]['id'] = $array[0];
			$allUsers[0]['login'] = $array[1];
			$allUsers[0]['password'] = $array[2];
			$allUsers[0]['roles'] = $array[3];
			$allUsers[0]['profile'] = $array[4];
			$array = $this->unsetAll($array);
			break;
		}

	}
	return new ResultSet1($allUsers);
}
elseif( $this->code_sql==120 || $this->queryStr == 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE id=?' )
{
	$file_name = $this->getCachFileName('Users');
	$content = file($file_name);

	$allUsers = array();

	for( $i = 0 ; $i < sizeof($content);$i++ )
	{
		$buffer = $content[$i];

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if( $array[0]==$params[0] )
		{
			$array['id'] = $array[0];
			$array['login'] = $array[1];
			$array['password'] = $array[2];
			$array['roles'] = $array[3];
			$array['profile'] = $array[4];
			$array = $this->unsetAll($array);
			$allUsers[] = $array;
			//break;
		}

	}
	return new ResultSet1($allUsers);
}
if( $this->code_sql==122 || strpos($this->queryStr,'profile <> \'\'') )
{
	$file_name = $this->getCachFileName('Users');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	$tempArray = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);
		if( $array[4]=='' )
			continue;
		$tempArray['id'] = $array[0];
		$tempArray['login'] = $array[1];
		$tempArray['password'] = $array[2];
		$tempArray['roles'] = $array[3];
		$tempArray['profile'] = $array[4];

		$allUsers[] = $tempArray;
	}
	fclose($handle);
	//return $allUsers;


	return new ResultSet1( $allUsers );
}
elseif( $this->code_sql==108 || $this->queryStr == 'SELECT profile FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE id=?' )
{
	$file_name = $this->getCachFileName('Users');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();

	if( $params[0]=='' || !isset($params[0]) )
		return new ResultSet1( $allUsers );

	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		$array = explode("\t",$buffer);

		if( $array[0]==$params[0] )
		{
			$allUsers[0]['profile'] = $array[4];
		}
	}
	fclose($handle);
	//return $allUsers;

	return new ResultSet1( $allUsers );
}//SELECT * FROM flashchat_users where instance_id= 1 ORDER BY login
elseif( $this->code_sql==105 )
{
	$file_name = $this->getCachFileName('Users',$params[0]);
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	$tempArray = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		$tempArray['id'] = $array[0];
		$tempArray['login'] = $array[1];
		$tempArray['password'] = $array[2];
		$tempArray['roles'] = $array[3];
		$tempArray['profile'] = $array[4];

		$allUsers[] = $tempArray;
	}
	fclose($handle);
	//return $allUsers;

	return new ResultSet1( $allUsers );
}
elseif( $this->code_sql == 102 )
{
	$file_name = $this->getCachFileName('Users');
	if(($file_name = $this->getCachFileName('Users')) == null)
	{
		$cacheDir = $this->getCachDir();
		$cachePath = $cacheDir->path;
		$file_name = $cachePath.$GLOBALS['fc_config']['db']['pref'].'users_'.$GLOBALS['fc_config']['cacheFilePrefix'].'.txt';
	}

	$_SESSION['session_inst'] = 1;
	$file = @fopen($file_name, 'a');
	//$id = $this->file_insert_id(9);
	$lines = file($file_name);
	$tmp_id = array();
	foreach($lines as $v)
	{
		$line = explode("\t", $v);
		$tmp_id []= $line[0];
	}
	if(count($tmp_id) <= 0)
	{
		$id = 1;
	} else {
		$id = max($tmp_id) + 1;
	}

	if( $params[1] == 'undefined' )
		$params[1] = '';

	$str = $id."\t".$params[0]."\t".$params[1]."\t".$params[2]."\t\t\n";

	@fwrite($file, $str);
	fflush($file);
	@fclose($file);
	return $id;
}
elseif( $this->code_sql==113 || strpos($this->queryStr,'INSERT INTO ')!==false && strpos($this->queryStr,'password')!==false  )
{
	$file_name = $this->getCachFileName('Users');
	if(($file_name = $this->getCachFileName('Users')) == null)
	{
		$cacheDir = $this->getCachDir();
		$cachePath = $cacheDir->path;
		$file_name = $cachePath.$GLOBALS['fc_config']['db']['pref'].'users_'.$GLOBALS['fc_config']['cacheFilePrefix'].'.txt';
	}

	$file = @fopen($file_name,'a');

	$lines=file($file_name);
	$tmp_id=array();
	foreach($lines as $v)
	{
		$line=explode("\t", $v);
		$tmp_id[]=$line[0];
	}
	if(count($tmp_id) <= 0)
	{
		$id = 1;
	} else {
		$id = max($tmp_id) + 1;
	}

	if( $params[2]=='undefined' )
		$params[2] = '';

	$str = $id."\t".$params[0]."\t".$params[1]."\t".$params[2]."\t\t\t\n";

	@fwrite($file, $str);
	fflush($file);
	@fclose($file);
	return $id;
}
elseif( $this->code_sql == 121 )
{
	$file_name = $this->getCachFileName('Users');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	$tempArray = array();
	$count = 0;
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);
		if( $array[4]!='' )
			$count++;
	}
	fclose($handle);
	$allUsers[0]['users_amount'] = $count;
//	return $allUsers;

	return new ResultSet1( $allUsers );
}//UPDATE flashchat_users SET `password`=MD5(?) WHERE login=? LIMIT 1
elseif( $this->queryStr == 'UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET `password`=MD5(?) WHERE login=? LIMIT 1' )
{
	$file_name = $this->getCachFileName('Users');
			$handle = @fopen($file_name, 'r');
			$total = '';
			$allUsers = array();
			while (!feof($handle))
			{
    			$buffer = fgets($handle);

				if( $buffer=='' )
					continue;

				$array = explode("\t",$buffer);

				if( $array[1]==$params[1] )
				{
					if( $params[1]=='undefined' )
						$params[1] = '';


					$total .= $array[0]."\t".$array[1]."\t".md5($params[0])."\t".$array[3]."\t".$array[4]."\t\n";
				}
				else
					$total .= $buffer;


			}

			@fclose($handle);
			$file = fopen($file_name, 'w');
			@fwrite($file, $total);
			fflush($file);
			@fclose($file);
			return true;

	//return $this->processUpdateProf11($params);
}
elseif( $this->code_sql==135 )//'UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET roles=? WHERE id=?'
{
	$file_name = $this->getCachFileName('Users');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);
		if( $array[0]==$params[1] )
		{


			$total .= $array[0]."\t".$array[1]."\t".$array[2]."\t".$params[0]."\t".$array[4]."\t\n";
		}
		else
			$total .= $buffer;
	}

	@fclose($handle);
	$file = fopen($file_name, 'w');
	@fwrite($file, $total);
	fflush($file);
	@fclose($file);
	return true;
}
elseif( $this->code_sql==125 )
{
	$file_name = $this->getCachFileName('Users');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);
		if( $array[1]==$params[1] )
		{
			$total .= $array[0]."\t".$array[1]."\t".$params[0]."\t".$array[3]."\t".$array[4]."\t\n";
		}
		else
			$total .= $buffer;
	}

	@fclose($handle);
	$file = fopen($file_name, 'w');
	@fwrite($file, $total);
	fflush($file);
	@fclose($file);
	return true;

	//return $this->processUpdateProf11($params);
}
elseif( $this->queryStr == 'UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET login=?, roles=? WHERE id=?' )
{
	$file_name = $this->getCachFileName('Users');
			$handle = @fopen($file_name, 'r');
			$total = '';
			$allUsers = array();
			while (!feof($handle))
			{
    			$buffer = fgets($handle);

				if( $buffer=='' )
					continue;

				$array = explode("\t",$buffer);

				if( $array[0]==$params[2] )
				{
					$total .= $array[0]."\t".$params[0]."\t".$array[2]."\t".$params[1]."\t".$array[4]."\t\n";
				}
				else
					$total .= $buffer;


			}

			@fclose($handle);
			$file = fopen($file_name, 'w');
			@fwrite($file, $total);
			fflush($file);
			@fclose($file);
			return true;

	//return $this->processUpdateProf11($params);
}
elseif( $this->code_sql==142 || $this->queryStr == 'UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET login=?, password=?, roles=? WHERE id=?' )
{
	$file_name = $this->getCachFileName('Users');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);
		if( $array[0]==$params[3] )
		{
			if( $params[1]=='undefined' )
				$params[1] = '';

			$total .= $array[0]."\t".$params[0]."\t".$params[1]."\t".$params[2]."\t".$array[4]."\t\n";
		}
		else
			$total .= $buffer;
	}

	@fclose($handle);
	$file = fopen($file_name, "w");
	@fwrite($file, $total);
	fflush($file);
	@fclose($file);
	return true;
}
elseif( $this->code_sql==114 || $this->queryStr == 'UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET profile=? WHERE id=?' )
{
	$file_name = $this->getCachFileName('Users');
	$handle = @fopen($file_name, 'r');
	$total = '';
	$allUsers = array();
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		$array = explode("\t", $buffer);
		if( (int)$array[0] == (int)$params[1] )
		{
			$total .= $array[0]."\t".$array[1]."\t".$array[2]."\t".$array[3]."\t".$params[0]."\t\t\n";
		} else {
			$total .= $buffer;
		}
	}

	@fclose($handle);
	$file = fopen($file_name, 'w');
	@fwrite($file, $total);
	fflush($file);
	@fclose($file);
	return true;

	//return $this->processUpdateProf($params);
}
elseif( $this->code_sql==144 || $this->queryStr == 'DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE id=?' )
{
	$file_name = $this->getCachFileName('Users');
	$handle = @fopen($file_name,'r');
	$str = '';
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);
		if( $array[0]!=$params[0] )
			$str .= $buffer;
	}
	@fclose($handle);
	$file = @fopen($file_name,'w');
	@fwrite($file, $str);
	@fflush($file);
	@fclose($file);
	return true;
}elseif( $this->code_sql==145)//SELECT * FROM users WHERE password = ?
{
	$file_name = $this->getCachFileName('Users');
	$content = file($file_name);

	$allUsers = array();

	for( $i = 0 ; $i < sizeof($content);$i++ )
	{
		$buffer = $content[$i];

		if( $buffer=='' )
			continue;

		$array = explode("\t",$buffer);

		if($array[2] == $params[0])
		{
			$array['id'] = $array[0];
			$array['login'] = $array[1];
			$array['password'] = $array[2];
			$array['roles'] = $array[3];
			$array['profile'] = $array[4];
			$array = $this->unsetAll($array);
			$allUsers[] = $array;
			break;
		}

	}
	return new ResultSet1($allUsers);
}elseif( $this->code_sql == 146)//DELETE FROM users WHERE login = ?
{
	$file_name = $this->getCachFileName('Users');
	$handle = @fopen($file_name,'r');
	$str = '';
	while (!feof($handle))
	{
    	$buffer = fgets($handle);
		if( $buffer=='' )
			continue;
		$array = explode("\t",$buffer);
		if( $array[1] != $params[0] )
			$str .= $buffer;
	}
	@fclose($handle);
	$file = @fopen($file_name,'w');
	@fwrite($file, $str);
	@fflush($file);
	@fclose($file);
	return true;
}
elseif($this->code_sql == 148)// SELECT * FROM users WHERE roles = ? LIMIT 1
{
	$file_name = $this->getCachFileName('Users');
	$content = file($file_name);

	$allUsers = array();

	for($i = 0; $i < sizeof($content); $i++)
	{
		$buffer = $content[$i];
		if($buffer == '')
		{
			continue;
		}

		$array = explode("\t", $buffer);

		if($array[3] == $params[0])
		{
			$allUsers[0]['id'] = $array[0];
			$allUsers[0]['login'] = $array[1];
			$allUsers[0]['password'] = $array[2];
			$allUsers[0]['roles'] = $array[3];
			$allUsers[0]['profile'] = $array[4];
			$allUsers[0]['instance_id'] = $params[1];
			$array = $this->unsetAll($array);
			break;
		}
	}
	return new ResultSet1($allUsers);
}
else
{
	return null;
}


?>