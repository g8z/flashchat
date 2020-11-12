<?php

$columns=array('id', 'level_0', 'level_1', 'level_2', 'level_3', 'level_4', 'type', 'units', 'title', 'comment', 'info', 'parent_page', '_order', 'value', 'disabled');
define('TAB_CHAR', "\t");
define('CRLF_CHAR', "\n");

if($this->code_sql==401) // SELECT {$TABLE_PREF}config.*,{$TABLE_PREF}config_values.value FROM {$TABLE_PREF}config,{$TABLE_PREF}config_values WHERE {$TABLE_PREF}config.parent_page = '$module' AND {$TABLE_PREF}config.id = {$TABLE_PREF}config_values.config_id AND {$TABLE_PREF}config_values.instance_id = {$_SESSION['session_inst']} ORDER BY _order;
{
	$module=$params[0];
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';

	$lines=file($fname);
	$i=0;
	$current_module='';
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[11]==$module)
		{
			$current_module=$module;
			foreach($cols as $val)
			{
				if($j==14 || $j==15)
				{
					$return_lines[$i][$columns[$j]]='';
				} else {
					$return_lines[$i][$columns[$j]]=$val;
				}
				$j++;
			}
			$i++;
		} else {
			if($current_module==$module) break;
		}
	}
	foreach($return_lines as $k => $v)
	{
	//	$sort_arr[$k]=$return_lines[$k][$columns[12]];
	}
	array_multisort($sort_arr, SORT_ASC, SORT_NUMERIC, $return_lines);
	return new ResultSet1($return_lines);
} elseif($this->code_sql==402) // SELECT {$TABLE_PREF}config.level_1,{$TABLE_PREF}config.title FROM {$TABLE_PREF}config,{$TABLE_PREF}config_values WHERE {$TABLE_PREF}config.parent_page = 'smilies' AND {$TABLE_PREF}config.id = {$TABLE_PREF}config_values.config_id AND {$TABLE_PREF}config_values.instance_id = {$_SESSION['session_inst']} AND {$TABLE_PREF}config_values.disabled = 0
{
	$module='smilies';
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';

	$lines=file($fname);
	$i=0;
	$current_module='';
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[11]==$module && $cols[14]==0)
		{
			$current_module=$module;
			foreach($cols as $val)
			{
				if(!($j==2 || $j==8))
				{
					$return_lines[$i][$columns[$j]]='';
				} else {
					$return_lines[$i][$columns[$j]]=$val;
				}
				$j++;
			}
			$i++;
		} else {
			if($current_module==$module) break;
		}
	}
	return new ResultSet1($return_lines);
} elseif($this->code_sql==403) // UPDATE {$TABLE_PREF}config_values SET value=$v WHERE config_id='$k' AND instance_id = {$_SESSION['session_inst']} LIMIT 1
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);

	for($i=0; $i<count($lines); $i++)
	{
		$cols=explode(TAB_CHAR, $lines[$i]);
		if($cols[0]==$params[1])
		{
			$cols[13]=$params[0];
			$lines[$i]=implode(TAB_CHAR, $cols);
			break;
		}
	}
	$f=@fopen($fname, 'w');
	foreach($lines as $str)
	{
		@fwrite($f, $str);
	}
	@fclose($f);
	return true;
} elseif($this->code_sql==404) // SELECT {$TABLE_PREF}config_values.value,{$TABLE_PREF}config.type FROM {$TABLE_PREF}config,{$TABLE_PREF}config_values WHERE {$TABLE_PREF}config.id = {$TABLE_PREF}config_values.config_id AND {$TABLE_PREF}config.level_0 = 'text' AND ({$TABLE_PREF}config.level_1 = 'fontFamily' OR {$TABLE_PREF}config.level_1 = 'fontSize') AND {$TABLE_PREF}config_values.instance_id = {$_SESSION['session_inst']} ORDER BY _order
{
	$module='preloader';
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);
	$i=0;
	$current_module='';
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[1]=='text' && ($cols[2]=='fontSize' || $cols[2]=='fontFamily'))
		{
			$current_module=$module;
			foreach($cols as $val)
			{
				if(!($j==13 || $j==6 || $j==12))
				{
					$return_lines[$i][$columns[$j]]='';
				} else {
					$return_lines[$i][$columns[$j]]=$val;
				}
				$j++;
			}
			$i++;
		} else {
			if($current_module==$module) break;
		}
	}
	foreach($return_lines as $k => $v)
	{
		$sort_arr[$k]=$return_lines[$k][$columns[12]];
	}
	array_multisort($sort_arr, SORT_ASC, SORT_NUMERIC, $return_lines);
	for($i=0; $i<count($return_lines); $i++)
	{
		for($j=0; $j<count($return_lines[$i]); $j++)
		{
			if($j==12)
			{
				$return_lines[$i][$columns[$j]]='';
			}
		}
	}
	return new ResultSet1($return_lines);
} elseif($this->code_sql==405) // SELECT {$TABLE_PREF}config.*,{$TABLE_PREF}config_values.value,{$TABLE_PREF}config_values.disabled FROM {$TABLE_PREF}config,{$TABLE_PREF}config_values WHERE {$TABLE_PREF}config.parent_page = '$module' AND {$TABLE_PREF}config.id = {$TABLE_PREF}config_values.config_id AND {$TABLE_PREF}config_values.instance_id = {$_SESSION['session_inst']} ORDER BY _order;
{
	$module=$params[0];
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);
	$i=0;
	$current_module='';
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[11]==$module)
		{
			$current_module=$module;
			foreach($cols as $val)
			{
				if($j==15)
				{
					$return_lines[$i][$columns[$j]]='';
				} else {
					$return_lines[$i][$columns[$j]]=$val;
				}
				$j++;
			}
			$i++;
		} else {
			if($current_module==$module) break;
		}
	}
	foreach($return_lines as $k => $v)
	{
		$sort_arr[$k]=$return_lines[$k][$columns[12]];
	}
	array_multisort($sort_arr, SORT_ASC, SORT_NUMERIC, $return_lines);
	return new ResultSet1($return_lines);
} elseif($this->code_sql==406) // UPDATE {$TABLE_PREF}config_values SET value=$val,disabled=$v WHERE config_id='".substr($k,strpos($k,"_")+1)."' AND instance_id = {$_SESSION['session_inst']} LIMIT 1
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);
	for($i=0; $i<count($lines); $i++)
	{
		$cols=explode(TAB_CHAR, $lines[$i]);
		if($cols[0]==$params[2])
		{
			$cols[13]=$params[0];
			$cols[14]=$params[1];
			$lines[$i]=implode(TAB_CHAR, $cols);
			break;
		}
	}
	$f=@fopen($fname, 'w');
	foreach($lines as $str)
	{
		@fwrite($f, $str);
	}
	@fclose($f);
	return true;
} elseif($this->code_sql==407) // SELECT {$TABLE_PREF}config_values.value,{$TABLE_PREF}config_values.config_id FROM {$TABLE_PREF}config_values,{$TABLE_PREF}config WHERE {$TABLE_PREF}config.level_0 = 'badWordSubstitute' AND {$TABLE_PREF}config.id = {$TABLE_PREF}config_values.config_id AND {$TABLE_PREF}config_values.instance_id = {$_SESSION['session_inst']} AND {$TABLE_PREF}config.id = {$TABLE_PREF}config_values.config_id
{
	$module='badWordSubstitute';
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);
	$i=0;
	$current_module='';
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[1]==$module)
		{
			$current_module=$module;
			foreach($cols as $val)
			{
				if(!($j==0 || $j==13))
				{
					$return_lines[$i][$columns[$j]]='';
				} else {
					$return_lines[$i][$columns[$j]]=$val;
				}
				$j++;
			}
			$i++;
		} else {
			if($current_module==$module) break;
		}
	}
	return new ResultSet1($return_lines);
} elseif($this->code_sql==408) // UPDATE {$TABLE_PREF}config_values SET value='{$substitute}' WHERE config_id={$id} AND instance_id = {$_SESSION['session_inst']} LIMIT 1;
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);

	for($i=0; $i<count($lines); $i++)
	{
		$cols=explode(TAB_CHAR, $lines[$i]);
		if($cols[0]==$params[1])
		{
			$cols[13]=$params[0];
			$lines[$i]=implode(TAB_CHAR, $cols);
			break;
		}
	}
	$f=@fopen($fname, 'w');
	foreach($lines as $str)
	{
		@fwrite($f, $str);
	}
	@fclose($f);
	return true;
} elseif($this->code_sql==409) // UPDATE {$TABLE_PREF}config SET level_1='{$v['name']}', title='{$v['name']}' WHERE id=$k LIMIT 1;
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);

	for($i=0; $i<count($lines); $i++)
	{
		$cols=explode(TAB_CHAR, $lines[$i]);
		if($cols[0]==$params[2])
		{
			$cols[2]=$params[0];
			$cols[8]=$params[1];
			$lines[$i]=implode(TAB_CHAR, $cols);
			break;
		}
	}
	$f=@fopen($fname, 'w');
	foreach($lines as $str)
	{
		@fwrite($f, $str);
	}
	@fclose($f);
} elseif($this->code_sql==410) // SELECT {$TABLE_PREF}config.id,{$TABLE_PREF}config.level_1 FROM {$TABLE_PREF}config WHERE {$TABLE_PREF}config.level_0 ='text' AND ({$TABLE_PREF}config.level_1 = 'fontSize' OR {$TABLE_PREF}config.level_1 = 'fontFamily') ORDER BY _order;
{
	$module='font';
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);
	$i=0;
	$current_module='';
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[1]=='text' && ($cols[2]=='fontSize' || $cols[2]=='fontFamily'))
		{
			$current_module=$module;
			foreach($cols as $val)
			{
				if(!($j==0 || $j==2 || $j==12))
				{
					$return_lines[$i][$columns[$j]]='';
				} else {
					$return_lines[$i][$columns[$j]]=$val;
				}
				$j++;
			}
			$i++;
		} else {
			if($current_module==$module) break;
		}
	}
	foreach($return_lines as $k => $v)
	{
		$sort_arr[$k]=$return_lines[$k][$columns[12]];
		$sort_arr2[$k]=$return_lines[$k][$columns[2]];
	}
	array_multisort($sort_arr, SORT_ASC, SORT_NUMERIC, $sort_arr2, SORT_ASC, SORT_STRING, $return_lines);
	for($i=0; $i<count($return_lines); $i++)
	{
		for($j=0; $j<count($return_lines[$i]); $j++)
		{
			if($j==12)
			{
				$return_lines[$i][$columns[$j]]='';
			}
		}
	}
	return new ResultSet1($return_lines);
} elseif($this->code_sql==411) // UPDATE {$TABLE_PREF}config SET _order='{$order}' WHERE id='{$SizeSQL[$i]}' LIMIT 1;
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);

	for($i=0; $i<count($lines); $i++)
	{
		$cols=explode(TAB_CHAR, $lines[$i]);
		if($cols[0]==$params[1])
		{
			$cols[12]=$params[0];
			$lines[$i]=implode(TAB_CHAR, $cols);
			break;
		}
	}
	$f=@fopen($fname, 'w');
	foreach($lines as $str)
	{
		@fwrite($f, $str);
	}
	@fclose($f);
	return true;
} elseif($this->code_sql==412) // DELETE FROM {$TABLE_PREF}config WHERE id='{$SizeSQL[$i]}' DELETE FROM {$TABLE_PREF}config_values WHERE config_id='{$SizeSQL[$i]}'
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);

	for($i=0; $i<count($lines); $i++)
	{
		$cols=explode(TAB_CHAR, $lines[$i]);
		if($cols[0]==$params[0])
		{
			unset($lines[$i]);
			break;
		}
	}
	$f=@fopen($fname, 'w');
	foreach($lines as $str)
	{
		if(isset($str)) @fwrite($f, $str);
	}
	@fclose($f);
	return true;
} elseif($this->code_sql==413) // SELECT {$TABLE_PREF}config.level_1 FROM {$TABLE_PREF}config,{$TABLE_PREF}config_values WHERE {$TABLE_PREF}config.parent_page = '$module' AND {$TABLE_PREF}config.id = {$TABLE_PREF}config_values.config_id AND {$TABLE_PREF}config_values.instance_id = {$_SESSION['session_inst']} AND {$TABLE_PREF}config.level_2 = 'name';
{
	$module=$params[0];
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);
	$i=0;
	$current_module='';
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[11]==$module)
		{
			$current_module=$module;
			if($cols[3]=='name')
			{
				foreach($cols as $val)
				{
					if(!($j==2))
					{
						$return_lines[$i][$columns[$j]]='';
					} else {
						$return_lines[$i][$columns[$j]]=$val;
					}
					$j++;
				}
				$i++;
			}
		} else {
			if($current_module==$module) break;
		}
	}
	return new ResultSet1($return_lines);
} elseif($this->code_sql==414) // SELECT {$TABLE_PREF}config.*,{$TABLE_PREF}config_values.value,{$TABLE_PREF}config_values.disabled FROM {$TABLE_PREF}config,{$TABLE_PREF}config_values WHERE {$TABLE_PREF}config.parent_page = '$module' AND {$TABLE_PREF}config.id = {$TABLE_PREF}config_values.config_id AND {$TABLE_PREF}config_values.instance_id = {$_SESSION['session_inst']} AND {$TABLE_PREF}config.level_1 = '$name' ORDER BY _order;
{
	$module=$params[0];
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);
	$i=0;
	$current_module='';
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[11]==$module)
		{
			$current_module=$module;
			if($cols[2]==$params[2])
			{
				foreach($cols as $val)
				{
					if($j==15)
					{
						$return_lines[$i][$columns[$j]]='';
					} else {
						$return_lines[$i][$columns[$j]]=$val;
					}
					$j++;
				}
				$i++;
			}
		} else {
			if($current_module==$module) break;
		}
	}
	foreach($return_lines as $k => $v)
	{
		$sort_arr[$k]=$return_lines[$k][$columns[12]];
	}
	array_multisort($sort_arr, SORT_ASC, SORT_NUMERIC, $return_lines);
	return new ResultSet1($return_lines);
} elseif($this->code_sql==415) // SELECT {$TABLE_PREF}config_values.value,{$TABLE_PREF}config.level_1 FROM {$TABLE_PREF}config,{$TABLE_PREF}config_values WHERE {$TABLE_PREF}config.level_0 = 'avatarbgloading' AND {$TABLE_PREF}config.id = {$TABLE_PREF}config_values.config_id AND {$TABLE_PREF}config_values.instance_id = {$_SESSION['session_inst']} ORDER BY _order;
{
	$module='theme';
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);
	$i=0;
	$current_module='';
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[1]=='avatarbgloading')
		{
			$current_module=$module;
			foreach($cols as $val)
			{
				if(!($j==13 || $j==2))
				{
					$return_lines[$i][$columns[$j]]='';
				} else {
					$return_lines[$i][$columns[$j]]=$val;
				}
				$j++;
			}
			$i++;
		} else {
			if($current_module==$module) break;
		}
	}
	foreach($return_lines as $k => $v)
	{
		$sort_arr[$k]=$return_lines[$k][$columns[12]];
	}
	array_multisort($sort_arr, SORT_ASC, SORT_NUMERIC, $return_lines);
	for($i=0; $i<count($return_lines); $i++)
	{
		for($j=0; $j<count($return_lines[$columns[$i]]); $j++)
		{
			if($j==12)
			{
				$return_lines[$i][$columns[$j]]='';
			}
		}
	}
	return new ResultSet1($return_lines);
} elseif($this->code_sql==416) // UPDATE {$TABLE_PREF}config_values SET disabled='$disabled' WHERE config_id='$k' AND instance_id = {$_SESSION['session_inst']} LIMIT 1
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);

	for($i=0; $i<count($lines); $i++)
	{
		$cols=explode(TAB_CHAR, $lines[$i]);
		if($cols[0]==$params[1])
		{
			$cols[14]=$params[0];
			$lines[$i]=implode(TAB_CHAR, $cols);
			break;
		}
	}
	$f=@fopen($fname, 'w');
	foreach($lines as $str)
	{
		@fwrite($f, $str);
	}
	@fclose($f);
	return true;
} elseif($this->code_sql==417) // SELECT {$TABLE_PREF}config.*,{$TABLE_PREF}config_values.value FROM {$TABLE_PREF}config,{$TABLE_PREF}config_values WHERE {$TABLE_PREF}config.parent_page = '$module' AND {$TABLE_PREF}config.id = {$TABLE_PREF}config_values.config_id AND {$TABLE_PREF}config_values.instance_id = {$_SESSION['session_inst']} AND {$TABLE_PREF}config.level_1 = '$name' ORDER BY _order;
{
	$module=$params[0];
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);
	$i=0;
	$current_module='';
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[11]==$module)
		{
			$current_module=$module;
			if($cols[2]==$params[2])
			{
				foreach($cols as $val)
				{
					if($j==14 || $j==15)
					{
						$return_lines[$i][$columns[$j]]='';
					} else {
						$return_lines[$i][$columns[$j]]=$val;
					}
					$j++;
				}
				$i++;
			}
		} else {
			if($current_module==$module) break;
		}
	}
	foreach($return_lines as $k => $v)
	{
		$sort_arr[$k]=$return_lines[$k][$columns[12]];
	}
	array_multisort($sort_arr, SORT_ASC, SORT_NUMERIC, $return_lines);
	return new ResultSet1($return_lines);
} elseif($this->code_sql==418) // SELECT {$TABLE_PREF}config.level_1 FROM {$TABLE_PREF}config WHERE {$TABLE_PREF}config.parent_page = '$module' AND {$TABLE_PREF}config.level_2 = 'allowBan' ORDER BY _order;
{
	$module=$params[0];
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);
	$i=0;
	$current_module='';
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[11]==$module)
		{
			$current_module=$module;
			if($cols[3]=='allowBan')
			{
				foreach($cols as $val)
				{
					if($j!=2)
					{
						$return_lines[$i][$columns[$j]]='';
					} else {
						$return_lines[$i][$columns[$j]]=$val;
					}
					$j++;
				}
				$i++;
			}
		} else {
			if($current_module==$module) break;
		}
	}
	foreach($return_lines as $k => $v)
	{
		$sort_arr[$k]=$return_lines[$k][$columns[12]];
	}
	array_multisort($sort_arr, SORT_ASC, SORT_NUMERIC, $return_lines);
	return new ResultSet1($return_lines);
} elseif($this->code_sql==419) // SELECT '.$TABLE_PREF.'config_instances.* FROM '.$TABLE_PREF.'config_instances WHERE '.$TABLE_PREF.'config_instances.is_active = 1 OR '.$TABLE_PREF.'config_instances.is_default = 1 ORDER BY id
/*******************************
* returns table config_instances manually, because table dont exist at config file. artemK0
/*******************************/
{
	// generate the value 'created_date'
	$created_date=date("Y-m-d H:i:s", time());
	$return_lines=array(0 => array('id' => '1',
						'is_active' => '1',
						'is_default' => '1',
						'name' => 'Default',
						'created_date' => $created_date)
					);
	return new ResultSet1($return_lines);
} elseif($this->code_sql==420) // INSERT INTO {$TABLE_PREF}config VALUES(NULL,'badWords','$name','','','','string','','$name','BadWords|$name','','badwords','1')
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);

	$id=cache_insert_id($cachePath, $GLOBALS['fc_config']['db']['pref'], $GLOBALS['fc_config']['cacheFilePrefix']);
	$out_arr=array($id, 'badWords', $params[0], '', '', '', 'string', '', $params[0], 'badWords|'.$params[0], '', 'badwords', '1');
	$str=implode(TAB_CHAR, $out_arr).TAB_CHAR.CRLF_CHAR;
	foreach($lines as $v)
	{
		$cols=explode(TAB_CHAR, $v);
		if($cols[0]!=$id)
		{
			$f=@fopen($fname, 'a');
			@fwrite($f, $str);
			@fclose($f);
			break;
		}
	}
	return true;
} elseif($this->code_sql==421) // INSERT INTO {$TABLE_PREF}config_values VALUES (NULL,'{$_SESSION['session_inst']}','$id','$value','0')
// INSERT INTO {$TABLE_PREF}config_values VALUES (NULL,'{$_SESSION['session_inst']}','$id','{$fld['err'][$k]['value']}','0')
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);

	for($i=0; $i<count($lines); $i++)
	{
		$cols=explode(TAB_CHAR, $lines[$i]);
		if($cols[0]==$params[1])
		{
			$cols[13]=$params[2];
			$cols[14]=$params[3];
			$lines[$i]=implode(TAB_CHAR, $cols).TAB_CHAR.CRLF_CHAR;
			break;
		}
	}
	$f=@fopen($fname, 'w');
	foreach($lines as $str)
	{
		@fwrite($f, $str);
	}
	@fclose($f);
	return true;
} elseif($this->code_sql==422) // INSERT INTO {$TABLE_PREF}config VALUES(NULL,'themes','{$_REQUEST['Name']}','{$fld['err'][$k]['field']}','','','{$fld['err'][$k]['type']}','','{$fld['err'][$k]['name']}','themes|".$_REQUEST['Name']."|".$fld['err'][$k]['field']."','','theme',1)
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);

	$id=cache_insert_id($cachePath, $GLOBALS['fc_config']['db']['pref'], $GLOBALS['fc_config']['cacheFilePrefix']);
	$out_arr=array($id,'themes',$params[0],$params[1],'','',$params[2],'',$params[3],'themes|'.$params[4].'|'.$params[5],'','theme',1);
	$str=implode(TAB_CHAR, $out_arr).TAB_CHAR.CRLF_CHAR;
	foreach($lines as $v)
	{
		$cols=explode(TAB_CHAR, $v);
		if($cols[0]!=$id)
		{
			$f=@fopen($fname, 'a');
			@fwrite($f, $str);
			@fclose($f);
			break;
		}
	}
	return true;
} elseif($this->code_sql==423) // SELECT * FROM '.$conf_pref.'config,'.$conf_pref.'config_values WHERE '.$conf_pref.'config_values.instance_id = '.$_SESSION['session_inst'].' AND '.$conf_pref.'config.id = '.$conf_pref.'config_values.config_id AND '.$conf_pref.'config_values.disabled = 0 AND level_0='themes' AND level_1='".$GLOBALS['filename']."' ORDER BY '.$conf_pref.'config_values.id';
{
	if(isset($GLOBALS['fc_config']['cachePath_sm']))
	{
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath_sm'];
	} else {
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath'];
	}
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';

	$return_lines = array();
	$lines=file($fname);
	$i=0;
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[1]==$params[1] && $cols[2]==$params[2] && $cols[14]==0)
		{
			foreach($cols as $val)
			{
				$return_lines[$i][$columns[$j]]=$val;
				$j++;
			}
			$i++;
		}
	}

	$sort_arr = array();

	foreach($return_lines as $k => $v)
	{
		$sort_arr[$k]=$return_lines[$k][$columns[0]];
	}
	array_multisort($sort_arr, SORT_ASC, SORT_NUMERIC, $return_lines);
	return new ResultSet1($return_lines);
} elseif($this->code_sql==424) // SELECT * FROM '.$conf_pref.'config,'.$conf_pref.'config_values WHERE '.$conf_pref.'config_values.instance_id = '.$_SESSION['session_inst'].' AND '.$conf_pref.'config.id = '.$conf_pref.'config_values.config_id AND '.$conf_pref.'config_values.disabled = 0 AND (level_0='badWords' OR level_0='badWordSubstitute') ORDER BY '.$conf_pref.'config_values.id';
{
	if(isset($GLOBALS['fc_config']['cachePath_sm']))
	{
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath_sm'];
	} else {
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath'];
	}
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';

	$lines=file($fname);
	$i=0;
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if(($cols[1]=='badWords' || $cols[1]=='badWordSubstitute') && $cols[14]==0)
		{
			foreach($cols as $val)
			{
				$return_lines[$i][$columns[$j]]=$val;
				$j++;
			}
			$i++;
		}
	}
	foreach($return_lines as $k => $v)
	{
		$sort_arr[$k]=$return_lines[$k][$columns[0]];
	}
	array_multisort($sort_arr, SORT_ASC, SORT_NUMERIC, $return_lines);
	return new ResultSet1($return_lines);
} elseif($this->code_sql==425) // SELECT * FROM '.$conf_pref.'config,'.$conf_pref.'config_values WHERE '.$conf_pref.'config_values.instance_id = '.$_SESSION['session_inst'].' AND '.$conf_pref.'config.id = '.$conf_pref.'config_values.config_id AND '.$conf_pref.'config_values.disabled = 0 AND NOT(level_0='badWords' OR level_0='badWordSubstitute' OR level_0='layouts' OR level_0='skin' OR level_0='themes') ORDER BY '.$conf_pref.'config_values.id';
{
	if(isset($GLOBALS['fc_config']['cachePath_sm']))
	{
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath_sm'];
	} else {
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath'];
	}
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';

	$lines=file($fname);
	$i=0;
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[14]==0 && !($cols[1]=='badWords' || $cols[1]=='badWordSubstitute' || $cols[1]=='layouts' || $cols[1]=='skin' || $cols[1]=='themes'))
		{
			foreach($cols as $val)
			{
				$return_lines[$i][$columns[$j]]=$val;
				$j++;
			}
			$i++;
		}
	}
	foreach($return_lines as $k => $v)
	{
		$sort_arr[$k]=$return_lines[$k][$columns[0]];
	}
	array_multisort($sort_arr, SORT_ASC, SORT_NUMERIC, $return_lines);
	return new ResultSet1($return_lines);
} elseif($this->code_sql==426) // SELECT '.$dbpref."config.level_2, ".$dbpref."config._order FROM ".$dbpref."config, ".$dbpref."config_values WHERE ".$dbpref."config.id = ".$dbpref."config_values.config_id AND ".$dbpref."config.level_0 = 'text' AND ".$dbpref."config.level_1 = 'fontFamily';
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);
	$i=0;
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[1]=='text' && $cols[2]=='fontFamily')
		{
			foreach($cols as $val)
			{
				if(!($j==3 || $j==12 || $j==13))
				{
					$return_lines[$i][$columns[$j]]='';
				} else {
					$return_lines[$i][$columns[$j]]=$val;
				}
				$j++;
			}
			$i++;
		}
	}
	return new ResultSet1($return_lines);
} elseif($this->code_sql==427) // INSERT INTO '.$dbpref.'_config VALUES(NULL,"text","fontFamily","itm3","","","string","","","text|fontFamily|itm3","","font",?)
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);

	$id=cache_insert_id($cachePath, $GLOBALS['fc_config']['db']['pref'], $GLOBALS['fc_config']['cacheFilePrefix']);
	$out_arr=array($id, 'text', 'fontFamily', $params[0], '', '', 'string', '', '', $params[1], '', 'font', $params[2]);
	$str=implode(TAB_CHAR, $out_arr).TAB_CHAR.CRLF_CHAR;
	foreach($lines as $v)
	{
		$cols=explode(TAB_CHAR, $v);
		if($cols[0]!=$id)
		{
			$f=@fopen($fname, 'a');
			@fwrite($f, $str);
			@fclose($f);
			break;
		}
	}
	return true;
} elseif($this->code_sql==428) // UPDATE '.$dbpref.'config_values SET value= \''.$_REQUEST['stt_adminpass'].'\' WHERE config_id=(SELECT id FROM '.$dbpref.'config WHERE level_0=\'adminPassword\')
{
	if(isset($GLOBALS['fc_config']['cachePath_sm']))
	{
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath_sm'];
	} else {
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath'];
	}
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';

	$lines=file($fname);

	foreach($lines as $v)
	{
		$cols=explode(TAB_CHAR, $v);
		if($cols[1]=='adminPassword')
		{
			$return_id=$cols[0];
		}
	}

	for($i=0; $i<count($lines); $i++)
	{
		$cols=explode(TAB_CHAR, $lines[$i]);
		if($cols[0]==$return_id)
		{
			$cols[13]=$params[0];
			$lines[$i]=implode(TAB_CHAR, $cols);
			break;
		}
	}
	$f=@fopen($fname, 'w');
	foreach($lines as $str)
	{
		@fwrite($f, $str);
	}
	@fclose($f);
	return true;
} elseif($this->code_sql==429) // UPDATE '.$dbpref.'config_values SET value= \''.$_REQUEST['stt_moderatorpass'].'\' WHERE config_id=(SELECT id FROM '.$dbpref.'config WHERE level_0=\'moderatorPassword\')'
{
	if(isset($GLOBALS['fc_config']['cachePath_sm']))
	{
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath_sm'];
	} else {
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath'];
	}
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);
	foreach($lines as $v)
	{
		$cols=explode(TAB_CHAR, $v);
		if($cols[1]=='moderatorPassword')
		{
			$return_id=$cols[0];
		}
	}

	for($i=0; $i<count($lines); $i++)
	{
		$cols=explode(TAB_CHAR, $lines[$i]);
		if($cols[0]==$return_id)
		{
			$cols[13]=$params[0];
			$lines[$i]=implode(TAB_CHAR, $cols);
			break;
		}
	}
	$f=@fopen($fname, 'w');
	foreach($lines as $str)
	{
		@fwrite($f, $str);
	}
	@fclose($f);
	return true;
} elseif($this->code_sql==430) // UPDATE '.$dbpref.'config_values SET value= \''.$_REQUEST['stt_spypass'].'\' WHERE config_id=(SELECT id FROM '.$dbpref.'config WHERE level_0=\'spyPassword\')
{
	if(isset($GLOBALS['fc_config']['cachePath_sm']))
	{
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath_sm'];
	} else {
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath'];
	}
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);
	foreach($lines as $v)
	{
		$cols=explode(TAB_CHAR, $v);
		if($cols[1]=='spyPassword')
		{
			$return_id=$cols[0];
		}
	}

	for($i=0; $i<count($lines); $i++)
	{
		$cols=explode(TAB_CHAR, $lines[$i]);
		if($cols[0]==$return_id)
		{
			$cols[13]=$params[0];
			$lines[$i]=implode(TAB_CHAR, $cols);
			break;
		}
	}
	$f=@fopen($fname, 'w');
	foreach($lines as $str)
	{
		@fwrite($f, $str);
	}
	@fclose($f);
	return true;
} elseif($this->code_sql==431) // UPDATE '.$dbpref.'config_values,'.$dbpref.'config SET '.$dbpref.'config_values.value = \''.$_SESSION['forcms'].'\' WHERE '.$dbpref.'config_values.config_id = '.$dbpref.'config.id AND '.$dbpref.'config.level_0 = \'CMSsystem\'
{
	if(isset($GLOBALS['fc_config']['cachePath_sm']))
	{
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath_sm'];
	} else {
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath'];
	}
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);

	for($i=0; $i<count($lines); $i++)
	{
		$cols=explode(TAB_CHAR, $lines[$i]);
		if($cols[1]=='CMSsystem')
		{
			$cols[13]=$params[0];
			$lines[$i]=implode(TAB_CHAR, $cols);
			break;
		}
	}
	$f=@fopen($fname, 'w');
	foreach($lines as $str)
	{
		@fwrite($f, $str);
	}
	@fclose($f);
	return true;
} elseif($this->code_sql==432) // UPDATE '.$dbpref.'config_values,'.$dbpref.'config SET '.$dbpref.'config_values.value = \''.$repl['liveSupportMode'].'\' WHERE '.$dbpref.'config_values.config_id = '.$dbpref.'config.id AND '.$dbpref.'config.level_0 = \'liveSupportMode\''
{
	if(isset($GLOBALS['fc_config']['cachePath_sm']))
	{
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath_sm'];
	} else {
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath'];
	}
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);

	for($i=0; $i<count($lines); $i++)
	{
		$cols=explode(TAB_CHAR, $lines[$i]);
		if($cols[1]==$params[1])
		{
			$cols[13]=$params[0];
			$lines[$i]=implode(TAB_CHAR, $cols);
			break;
		}
	}
	$f=@fopen($fname, 'w');
	foreach($lines as $str)
	{
		@fwrite($f, $str);
	}
	@fclose($f);
	return true;
} elseif($this->code_sql==433) // SELECT * FROM '.$dbpref.'config_main
{
	$fname = INC_DIR . '../temp/tmp_main.txt';
	$lines = file($fname);
	$i=0;
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		foreach($cols as $val)
		{
			$return_lines[$i][$columns[$j]]=$val;
			$j++;
		}
		$i++;
	}
	@unlink($fname);
	return new ResultSet1($return_lines);
} elseif($this->code_sql==434) // SELECT config.id FROM ".$dbpref."config_values WHERE value=?
{
	$module='font';
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';

	$lines=file($fname);
	$i=0;
	$current_module='';
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[11]==$module && $cols[13]==$params[0])
		{
			$current_module=$module;
			foreach($cols as $val)
			{
				if(!($j==0))
				{
					$return_lines[$i][$columns[$j]]='';
				} else {
					$return_lines[$i][$columns[$j]]=$val;
				}
				$j++;
			}
			$i++;
		} else {
			if($current_module==$module) break;
		}
	}
	return new ResultSet1($return_lines);
} elseif($this->code_sql==435) // SELECT {$TABLE_PREF}config_values.value,{$TABLE_PREF}config.type FROM {$TABLE_PREF}config,{$TABLE_PREF}config_values WHERE {$TABLE_PREF}config.id = {$TABLE_PREF}config_values.config_id AND {$TABLE_PREF}config.level_0 = 'text' AND ({$TABLE_PREF}config.level_1 = 'fontFamily' OR {$TABLE_PREF}config.level_1 = 'fontSize') AND {$TABLE_PREF}config_values.disabled==0 AND {$TABLE_PREF}config_values.instance_id = {$_SESSION['session_inst']} ORDER BY _order
{
	$module='preloader';
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);
	$i=0;
	$current_module='';
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[14]=='0' && $cols[1]=='text' && ($cols[2]=='fontSize' || $cols[2]=='fontFamily'))
		{
			$current_module=$module;
			foreach($cols as $val)
			{
				if(!($j==13 || $j==6 || $j==12))
				{
					$return_lines[$i][$columns[$j]]='';
				} else {
					$return_lines[$i][$columns[$j]]=$val;
				}
				$j++;
			}
			$i++;
		} else {
			if($current_module==$module) break;
		}
	}
	foreach($return_lines as $k => $v)
	{
		$sort_arr[$k]=$return_lines[$k][$columns[12]];
	}
	array_multisort($sort_arr, SORT_ASC, SORT_NUMERIC, $return_lines);
	for($i=0; $i<count($return_lines); $i++)
	{
		for($j=0; $j<count($return_lines[$i]); $j++)
		{
			if($j==12)
			{
				$return_lines[$i][$columns[$j]]='';
			}
		}
	}
	return new ResultSet1($return_lines);
} elseif($this->code_sql==440) // INSERT INTO '.$GLOBALS['fc_config']['db']['pref'].'config VALUES(NULL,"text","fontSize",?,"","","integer","","",?,"","font",?)
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);

	$id = cache_insert_id($cachePath, $GLOBALS['fc_config']['db']['pref'], $GLOBALS['fc_config']['cacheFilePrefix']);
	$out_arr = array($id, 'text', 'fontSize', $params[0], '', '', 'integer', '', '', $params[1], '', 'font', $params[2], '', '0');
	$str = implode(TAB_CHAR, $out_arr).TAB_CHAR.CRLF_CHAR;
	foreach($lines as $v)
	{
		$cols = explode(TAB_CHAR, $v);
		if($cols[0] != $id)
		{
			$f=@fopen($fname, 'a');
			@fwrite($f, $str);
			@fclose($f);
			break;
		}
	}
	return true;
} elseif($this->code_sql==441) // INSERT INTO '.$GLOBALS['fc_config']['db']['pref'].'config_values VALUES(NULL,?,?,?,"0")
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);

	for($i=0; $i<count($lines); $i++)
	{
		$cols = explode(TAB_CHAR, $lines[$i]);
		if($cols[0] == $params[1])
		{
			$cols[13] = $params[2];
			$lines[$i]=implode(TAB_CHAR, $cols);
			break;
		}
	}
	$f=@fopen($fname, 'w');
	foreach($lines as $str)
	{
		@fwrite($f, $str);
	}
	@fclose($f);
	return true;
} elseif($this->code_sql==442) // UPDATE '.$dbpref.'config_values SET value= \''.$_REQUEST['enc_pass'].'\' WHERE config_id=(SELECT id FROM '.$dbpref.'config WHERE level_0=\'encryptPass\')'
{
	if(isset($GLOBALS['fc_config']['cachePath_sm']))
	{
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath_sm'];
	} else {
		$cachePath=INC_DIR.$GLOBALS['fc_config']['cachePath'];
	}
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines=file($fname);
	foreach($lines as $v)
	{
		$cols=explode(TAB_CHAR, $v);
		if($cols[1] == 'encryptPass')
		{
			$return_id = $cols[0];
		}
	}

	for($i=0; $i<count($lines); $i++)
	{
		$cols=explode(TAB_CHAR, $lines[$i]);
		if($cols[0]==$return_id)
		{
			$cols[13]=$params[0];
			$lines[$i]=implode(TAB_CHAR, $cols);
			break;
		}
	}
	$f=@fopen($fname, 'w');
	foreach($lines as $str)
	{
		@fwrite($f, $str);
	}
	@fclose($f);
	return true;
}
elseif($this->code_sql == 436) // SELECT `value` FROM `flashchat_config_values` WHERE `config_id` = (SELECT `id` FROM `flashchat_config` WHERE `level_0` = 'CMSSystem')
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';

	$lines = file($fname);
	$return = '';
	foreach($lines as $v)
	{
		$cols = explode(TAB_CHAR, $v);
		if($cols[1] == 'CMSsystem')
		{
			$return = $cols[13];
		}
	}
	return new ResultSet1($return);
}
elseif($this->code_sql == 437) // SELECT value FROM '.$GLOBALS['fc_config']['db']['pref'].'config config, '.$GLOBALS['fc_config']['db']['pref'].'config_values vals WHERE (config.id = vals.config_id AND config.level_0 IN ("adminPassword", "moderatorPassword", "spyPassword"))
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';

	$lines = file($fname);
	$return = array();
	foreach($lines as $v)
	{
		$cols = explode(TAB_CHAR, $v);
		if($cols[1] == 'adminPassword' || $cols[1] == 'moderatorPassword' || $cols[1] == 'spyPassword')
		{
			if(!($cols[13] == 'adminpass' || $cols[13] == 'modpass' || $cols[13] == 'spypass'))
			{
				$return []= $cols[13];
			}
		}
	}
	return new ResultSet1($return);
}
elseif($this->code_sql == 438) // SELECT value FROM '.$GLOBALS['fc_config']['db']['pref'].'config config, '.$GLOBALS['fc_config']['db']['pref'].'config_values vals WHERE config.id = vals.config_id AND config.level_0 = "encryptPass"
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';

	$lines = file($fname);
	$return = array();
	foreach($lines as $v)
	{
		$cols = explode(TAB_CHAR, $v);
		if($cols[1] == 'encryptPass')
		{
			$return []= $cols[13];
		}
	}
	return new ResultSet1($return);
} elseif($this->code_sql==439) // UPDATE {$GLOBALS['fc_config']['db']['pref']}config SET _order = ? WHERE id = ? AND instance_id = ? LIMIT 1
{
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';
	$lines = file($fname);
	for($i = 0; $i < count($lines); $i++)
	{
		$cols = explode(TAB_CHAR, $lines[$i]);
		if($cols[0] == $params[1])
		{
			$cols[12] = $params[0];
			$lines[$i] = implode(TAB_CHAR, $cols);
			break;
		}
	}
	$f = @fopen($fname, 'w');
	foreach($lines as $str)
	{
		@fwrite($f, $str);
	}
	@fclose($f);
	return true;
}
elseif($this->code_sql==449) {
	$name = $params[0];
	$cacheDir = $this->getCachDir();
	$cachePath = $cacheDir->path;
	$fname = $cachePath.$GLOBALS['fc_config']['db']['pref'].'config_'.$GLOBALS['fc_config']['cacheFilePrefix'].'_1.txt';

	$lines=file($fname);
	$i=0;
	$current_name='';
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode(TAB_CHAR, $v);
		if($cols[1]==$name)
		{
			$current_name=$name;
			foreach($cols as $val)
			{
//				if($j==14 || $j==15)
//				{
//					$return_lines[$i][$columns[$j]]='';
//				} else {
					$return_lines[$i][$columns[$j]]=$val;
//				}
				$j++;
			}
			$i++;
		} else {
			if($current_name==$name) break;
		}
	}
	foreach($return_lines as $k => $v)
	{
		$sort_arr[$k]=$return_lines[$k][$columns[12]];
	}
	array_multisort($sort_arr, SORT_ASC, SORT_NUMERIC, $return_lines);
	return new ResultSet1($return_lines);
}
?>