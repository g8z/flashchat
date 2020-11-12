<?php

//-------------------------------------------------
//output select string
//options argument indexed array
//$selected - string
//-------------------------------------------------
function html_select($name,$options,$selected, $add='',$key='')
{
	if( ! is_array( $options ) ) return '';
	if( sizeof( $options ) == 0 )return '';

	$ret = "<SELECT name=\"$name\" $add>";

	if( ! is_array($options) ) return '';

	foreach( $options as $k=>$v2)
	{
		if(is_array($v2) && $key != '') $v = $v2[$key];
		else $v = $v2;

		$sel = strcasecmp($v,$selected)==0 || strcasecmp($k,$selected)==0 ? "SELECTED" : "";
		$ret .= "<option $sel value=\"$k\"> $v";
	}

	$ret .= "</SELECT>";

	return $ret;

}

//---------------------------------------------
//---copy uploaded file to def dir, return relative path
//---------------------------------------------
function isUplImage($f)
{
	if( ($f['name']!='') && ( $f['type']!= "image/jpeg") && ($f['type']!="image/pjpeg"))//$f['type'] != "image/x-png") && ($f['type']!="image/pjpeg") &&
	{
		return false;
	}

	return true;
}

function isUplSound($f)
{
	if( ($f['name']!='') && ($f['type'] != "audio/mpeg") )
	{
		return false;
	}

	return true;
}


function copyUplFile( $f, $dir )
{

	$path = dirname(__FILE__) . '/../' . $dir . '/';
	$userfile = $f['tmp_name'];
	$userfile_name = $f['name'];

	if(!is_uploaded_file($userfile) || $f['error'] != 0) return '';

	$suff = 0;
	$path_parts = pathinfo($userfile_name);
	$ext = $path_parts['extension'];
	$name= substr($path_parts['basename'],0,strlen($path_parts['basename'])-strlen($ext)-1);

	while( file_exists($path . $userfile_name) )
	{
		$suff++;
		$userfile_name = "{$name}_{$suff}" . ($ext == '' ? '' : ".{$ext}");
	}

	$res = move_uploaded_file($userfile , $path . $userfile_name);


	if( $res )
	{
		return $userfile_name;
	}else
	{
		return '';
	}

}
//-----------------------------------------------
//set values for RULE_***
//-----------------------------------------------
function getROLE(&$value)
{
	foreach( $value as $k=>$v )
	{
		switch($v['value'])
		{
			case 1: $value[$k]['name'] = 'user';
				break;
			case 2: $value[$k]['name'] = 'admin';
				break;
			case 3: $value[$k]['name'] = 'moderator';
				break;
			case 4: $value[$k]['name'] = 'spy';
				break;
			case 8: $value[$k]['name'] = 'customer';
		} // switch
	}
}
//-------------------------------------------------
//create array of field values for sql update/insert
//-------------------------------------------------
function getPOSTfields($subj, $add=array(), $post=NULL)
{
	if( $post == NULL ) $post = $_POST;

	$len = strlen($subj);

	$flds = array();

	foreach( $add as $k=>$v )
	{
		$post[$k] = $v;
	}
	$func[] = 'NOW()';
	while( list($k,$v) = each($post) )
	{

//------------------------INSTANCES------------------------------------------------
	if ( $_REQUEST['module'] == 'instances' )
		{
		$fld = substr($k, $len);
		if( substr($k,0, $len ) != $subj ) continue;


			$fld = substr($k,strrpos($k,"_") + 1 );

			if ( substr($k,strpos($k,"_")+1,strlen("name")) == 'name')
			{
				$default = 0;
		    	$name = $v;
				continue;
			}
			if ( substr($k,strpos($k,"_")+1,strlen("box")) == 'box')
			{
		    	$activate = $v;

				list($k,$v) = each($post);

			}
			if ( substr($k,strpos($k,"_")+1,strlen("default")) == 'default')
		    	$default = $v;

			    $flds['ins'][$fld] = $name;
				$flds['err'][$fld]['name'] = $name;
				$flds['err'][$fld]['activate'] = $activate;
				$flds['err'][$fld]['default'] = $default;
				$flds['upd'][$fld] = "$fld = $name";


				if ( $default == 0 )
				{
					$name = $v;
					continue;
				}
				continue;
		}
//-----------------------------END INSTANCES---------------------------------------------------------------



		if ( $fld == 'AddName' || $fld == 'AddValue' || $fld == 'Substitute' )
			continue;
		if (substr($k,0,strpos($k,"_")) == 'type')
		{
		    $type = $v;
			continue;
		}
		if (substr($k,0,strpos($k,"_")) == 'name')
		{
		    $name = $v;
			continue;
		}
		if (substr($k,0,strpos($k,"_")) == 'field')
		{
		    $field = $v;
			continue;
		}

		if( substr($k,0, $len ) != $subj ) continue;
		$fld = substr($k, $len);
		$v2 = $v;
		if( ! in_array($v, $func) ) $v2 = "'$v2'";


		if ( $_REQUEST['module'] == 'badwords' )
		{
		    list($k1,$v1) = each($post);
			$disabled = $v1;
		}

		if ( $_REQUEST['module'] == 'modules' )
		{

			$num = substr($fld,0,strpos($fld,"_") );

			if ( isset($_REQUEST['delete']) && $_REQUEST['change'] == $num)
			{
				$flds['ins'][$fld] = '';
				$flds['err'][$fld]['value'] = '';
		 	}

			if ( $_REQUEST['change'] == $num && $_REQUEST['count'] != 1)
				continue;

		    $fld = substr($fld,strpos($fld,"_")+1);
			if ( isset($_REQUEST['delete']) && $_REQUEST['change'] == $num )
			{
			    $v2 = '';
			}
			else
				$v2 =substr($v2,1,strlen($v2)-2);

			if ( isset($flds['ins'][$fld]) )
			    $sign = ',';
			else
				$sign = '';


			$flds['ins'][$fld] = $flds['ins'][$fld].$sign.$v2;
			$flds['err'][$fld]['type'] = $type;
			$flds['err'][$fld]['name'] = $name;
			$flds['err'][$fld]['field'] = $field;
			$flds['err'][$fld]['value'] = $flds['err'][$fld]['value'].$sign.$v;
			if ( isset($disabled) )
				$flds['err'][$fld]['disabled'] = $disabled;
			$flds['upd'][$fld] = "$fld = $v2";

		}
		else
		{
		$flds['ins'][$fld] = $v2;
		$flds['err'][$fld]['type'] = $type;
		$flds['err'][$fld]['name'] = $name;
		$flds['err'][$fld]['field'] = $field;
		$flds['err'][$fld]['value'] = $v;
		if ( isset($disabled) )
			$flds['err'][$fld]['disabled'] = $disabled;
		$flds['upd'][$fld] = "$fld = $v2";
		}

	}

	if( sizeof($flds) )
	{
		$flds['key'] = implode(',', array_keys($flds['ins']));
		$flds['val'] = implode(',', array_values($flds['ins']));
		$flds['set'] = implode(',', $flds['upd']);
	}

	return $flds;

}

function getOneTypeFields($subj='fld_', $add=array(), $post=NULL, $skip_keys=array())
{
	if( $post == NULL ) $post = $_POST;

	$len = strlen($subj);

	$flds = array();

	$func[] = 'NOW()';

	$flds['ins'] = array();
	$flds['key'] = array();
	$flds['err'] = array();
	$flds['val'] = array();

	foreach( $post as $k => $v )
	{
		if( substr($k,0, $len ) != $subj ) continue;

		$fld = substr($k, $len);

		$key = substr($fld, strrpos($fld,'_')+1);
		$fld = substr($fld, 0, strlen($fld)-strlen($key)-1);

		if( in_array($fld, $skip_keys) ) continue;

		$v2 = $v;
		if( ! in_array($v, $func) ) $v2 = "'$v2'";
		foreach( $add as $k2=>$v3 )
		{
			if( isset($flds['ins'][$key][$k2]) ) break;
			$flds['ins'][$key][$k2] = "'$v3'";
			$flds['key']["`$k2`"] = true;
			$flds['err'][$key][$k2] = $v3;
			$flds['upd'][$key][] = "`$k2`='$v3'";
		}

		$flds['ins'][$key][$fld] = $v2;
		$flds['key']["`$fld`"] = true;
		$flds['err'][$key][$fld] = $v;
		$flds['upd'][$key][] = "`$fld`=$v2";

	}

	if( sizeof($flds) )
	{
		$flds['key'] = implode(',', array_keys($flds['key']));

		foreach($flds['ins'] as $k=>$v)
		{
			$s = '(' . implode(',', array_values($v)) . ')';
			$flds['val'][] = $s;
			$flds['ins_sep'][$k] = $s;
			$flds['upd'][$k] = implode(',',$flds['upd'][$k]);
		}

		$flds['val'] = implode(',', $flds['val']);
	}

	return $flds;

}



//-------------------------------------------------
//natural sort array by index
//-------------------------------------------------
function natsortArray($arr, $ind_id, $sort_fld)
{
	$res = array();
	$ind_arr = array();
	foreach( $arr as $v )
	{
		$res[$v[$ind_id]] = $v[$sort_fld];
		$ind_arr[$v[$ind_id]] = $v;
	}

	natsort($res);
	$ret = array();
	foreach( $res as $k=>$v)
	{
		$ret[] = $ind_arr[$k];
	}

	return $ret;

}

function connectdb()
{
	global $link;

	if( ! isset($link) && $GLOBALS['fc_config']['cacheType']!=2)
	{
		$dbhost = DBHOST;
		$dbuname = DBUNAME;
		$dbpass = DBPW;
		$dbname = DBNAME;
		$rcq = mysql_pconnect($dbhost, $dbuname, $dbpass);
		$link=$rcq;
		mysql_select_db($dbname, $link);
	}
	return $link;
}


function db_get_array($sql, $primary_fld='')
{
	$result = query(__FILE__, __LINE__, $sql);

	$return = array();

	while($ret = mysql_fetch_array($result,MYSQL_ASSOC))
	{

		if( $primary_fld != '' )
		{
			$return[$ret[$primary_fld]] = $ret;
		}else
		{
			$return[] = $ret;
		}

	}

	return $return;
}


function query($file, $line, $sql)
{
		$result = @mysql_query($sql) OR trigger_error("Database: query error, file: $file, line: $line<br><b>SQL - $sql</b>  ");

		if(DEBUG > 0){
			$_SESSION['querylog'][$file][$line] = $sql;
		}

		if($result)
		{
			return $result;
		} else
		{
			return false;
		}
}
function query2($sql)
{
		$result = @mysql_query($sql) OR trigger_error("Database: query error<br><b>SQL - $sql</b>");

		if($result)
		{
			return mysql_insert_id();
		} else
		{
			return false;
		}
}

// add font files from /fonts dir, and inserts to table/file
function addFontsToConfig($dbpref, $session_instance, $cacheType, $cachePath, $cacheFilePrefix)
{
	$d=dir(INC_DIR."../fonts");
	$fonts=array();
	$itm=array();
	$_order=array();
	$existed_fonts=array();
	while(false!==($entry = $d->read()))
	{
	    if(!($entry=="." || $entry==".." || strpos($entry, "_lib")!==false))
	    {
			$fonts[]=ucfirst(substr($entry, 0, -4));
		}
	}
	$d->close();
	$query="SELECT ".$dbpref."config.level_2, ".$dbpref."config._order, ".$dbpref."config_values.value
			FROM ".$dbpref."config, ".$dbpref."config_values
			WHERE ".$dbpref."config.id = ".$dbpref."config_values.config_id
			AND ".$dbpref."config.level_0 = 'text' AND ".$dbpref."config.level_1 = 'fontFamily'";
	$stmt = new Statement($query, 426);
	$result = $stmt->process();
	while($v = $result->next())
	{
		$itm[]=substr($v['level_2'], -1, 1);
		$_order[]=$v['_order'];
		$existed_fonts[]=$v['value'];
	}
	$max_itm=max($itm)+1;
	$max_order=max($_order)+1;
	// check, if file was deleted from /fonts dir. artemK0
	$fonts_delete=array_diff($existed_fonts, $fonts);
	$delete_mask=array("Georgia", "Times", "Courier", "Verdana", "Arial", "Tahoma");
	$fonts_delete=array_diff($fonts_delete, $delete_mask);
	foreach($fonts_delete as $k => $v)
	{
		$query="SELECT ".$dbpref."config.id FROM ".$dbpref."config_values, ".$dbpref."config WHERE value=? AND ".$dbpref."config_values.config_id=".$dbpref."config.id";
		$stmt = new Statement($query, 434);
		$result = $stmt->process($v);
		while($val = $result->next())
		{
			$query="DELETE FROM ".$dbpref."config WHERE id=?";
			$stmt = new Statement($query, 412);
			$f = $stmt->process($val['id']);
			$query="DELETE FROM ".$dbpref."config_values WHERE config_id=?";
			$stmt = new Statement($query, 412);
			$f = $stmt->process($val['id']);
		}
	}

	$fonts=array_diff($fonts, $existed_fonts);
	foreach($fonts as $v)
	{
		$query='INSERT INTO '.$dbpref.'config VALUES(NULL,"text","fontFamily",?,"","","string","","",?,"","font",?)';
		$stmt = new Statement($query, 427);
		$result = $stmt->process("itm".$max_itm, "text|fontFamily|itm".$max_itm, $max_order);
		// in full caching function mysql_insert_id() wont work. artemK0
		if($cacheType!=2)
		{
			$query = "SELECT MAX(id) FROM ".$dbpref."config";
			$result = mysql_query($query);
			$id = mysql_result($result, 0, "MAX(id)");
		} else {
			$id = cache_insert_id($cachePath, $dbpref, $cacheFilePrefix);
			$id--;
		}
		$query='INSERT INTO '.$dbpref.'config_values VALUES(NULL,?,?,?,?)';
		$stmt = new Statement($query, 421);
		$result = $stmt->process($session_instance, $id, $v, "1");
		$max_itm++;
		$max_order++;
	}
	// if full caching enabled, then sort config cache file by parent_page value. artemK0
	if($cacheType==2)
	{
		sortCacheFile($cachePath, $dbpref, $cacheFilePrefix);
	}
	return true;
}

// gets the max id from config file. artemK0
function cache_insert_id($cachePath, $table_prefix, $cache_prefix)
{
	$fname = $cachePath.$table_prefix."config_".$cache_prefix."_1.txt";
	$lines=file($fname);

	$max_arr=array();
	foreach($lines as $v)
	{
		$cols=explode("\t", $v);
		$max_arr[]=$cols[0];
	}
	$id=max($max_arr)+1;
	return $id;
}

// sorts config cache file by parent_page value. artemK0
function sortCacheFile($cachePath, $table_prefix, $cache_prefix)
{
	$columns=array("id", "level_0", "level_1", "level_2", "level_3", "level_4", "type", "units", "title", "comment", "info", "parent_page", "_order", "value", "disabled");
	$fname = $cachePath.$table_prefix."config_".$cache_prefix."_1.txt";
	$lines=file($fname);
	$return_lines_sort=array();
	$i=0;
	foreach($lines as $v)
	{
		$j=0;
		$cols=explode("\t", $v);
		foreach($cols as $v)
		{
			$return_lines_sort[$i][$columns[$j]]=$v;
			$j++;
		}
		$i++;
	}
	foreach($return_lines_sort as $k => $v)
	{
		$sort_arr1[$k]=$return_lines_sort[$k][$columns[11]];
		$sort_arr2[$k]=$return_lines_sort[$k][$columns[0]];
	}
	array_multisort($sort_arr1, SORT_ASC, SORT_STRING, $sort_arr2, SORT_ASC, SORT_NUMERIC, $return_lines_sort);
	$return_lines=array();
	foreach($return_lines_sort as $v)
	{
		$return_lines[]=implode("\t", $v);
	}
	$str="";
	foreach($return_lines as $v) $str.=$v;
	$f=@fopen($fname, "w");
	@fwrite($f, $str);
	@fclose($f);
	return true;
}
?>