<?php

function Message( $message, $good )
{
	if ( $good )
		$yesno = '<b><font color="green" size="2px">Yes</font></b>';
	else
		$yesno = '<b><font color="red" size="2px">No</font></b>';

	echo '<tr><td class="normal">'. $message .'</td><td>'. $yesno .'</td></tr>';
}

/**
 ** Check writeability of needed files and directories - used for step 1.
 **/

function isWriteable ( $canContinue, $file, $mode, $desc )
{
	@chmod( $file, $mode );
	$good = is_writable( $file ) ? 1 : 0;
	Message ( $desc.' is writable: ', $good );
	return ( $canContinue && $good );
}

function changeConfigVariables( $contents, $replaces )
{
	/*unlink(dirname(__FILE__).'/../appdata/config_1.php');
	foreach( $replaces as $k=>$v )
	{
		$sql = "UPDATE {$GLOBALS['fc_config']['db']['pref']}config_values,{$GLOBALS['fc_config']['db']['pref']}config
				SET {$GLOBALS['fc_config']['db']['pref']}config_values.value='{$v}'
		    	WHERE {$GLOBALS['fc_config']['db']['pref']}config_values.config_id = {$GLOBALS['fc_config']['db']['pref']}config.id
				AND {$GLOBALS['fc_config']['db']['pref']}config.level_0 = '{$k}'";
		$res = mysql_query( $sql );
	}
	return true;*/
	/*foreach( $replaces as $k=>$v)
	{
		$patterns[]     = '/\s*\''. $k .'\'\s*=>\s*\'{0,1}\w*\'{0,1}\s*,/i';
		$replacements[] = "\n\t\t'$k' => $v,";
	}
	//return $contents;
	return preg_replace($patterns, $replacements, $contents);*/
}

//-------------------------------------------------
//MD5 file
//-------------------------------------------------
function md5file_cust($fname)
{
	if( function_exists('md5_file') )
	{
	    return md5_file($fname);
	}

	$file = fopen($fname, 'rb');
	$data = fread($file, filesize($fname)) ;
	fclose($file);

	return md5($data);

}

function getConfigData($fname = '')
{
	return '';
	/*if($fname == '')
	{
		$fname = CONFIG_FILE;
	}

	$handle = fopen($fname, 'r');
	$contents = fread($handle, filesize($fname));
	fclose($handle);

	return $contents;*/
}

function writeConfig( $configData, $fname='' )
{	return true;
	/*if( $fname == '' )$fname = CONFIG_FILE;

	$fp = @fopen( $fname, 'wb' );

	if ( $fp ) {
		fwrite( $fp, $configData );
		fclose( $fp );
		return true;
	}
	else
		return false;*/
}

//-------------------------------------------------
//connect to database return Error str
//-------------------------------------------------
function connectToDB($dbname='', $dbuser='', $dbpass='', $dbhost='', &$dbpref)
{
	if( $dbname == '' )
	{
		require_once './inc/config.srv.php';
		$dbhost = $GLOBALS['fc_config']['db']['host'];
		$dbuser = $GLOBALS['fc_config']['db']['user'];
		$dbpass = $GLOBALS['fc_config']['db']['pass'];
		$dbname = $GLOBALS['fc_config']['db']['base'];
		$dbpref = $GLOBALS['fc_config']['db']['pref'];
	}

	if($conn = @mysql_connect($dbhost, $dbuser, $dbpass))
	{
		if(! mysql_select_db($dbname, $conn))
		{
			return "<b>Could not select '$dbname' database - please make sure this database exists</b><br>" . mysql_error();
		}
	}
	else
	{
		return '<b>Could not connect to MySQL database - please check database settings</b><br>' . mysql_error();
	}

	return '';

}

//return string error or result array if all ok
function db_get_array($sql, $primary_fld='')
{
	$errstr = '';
	$result = @mysql_query($sql) OR ($errstr = mysql_error()) ;

	if($errstr != '') return $errstr;

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

//-------------------------------------------------
//generate html combo
//-------------------------------------------------
function htmlSelect($name, $arr, $selected, $addprop='')
{
	$ret = "<SELECT name=\"$name\" $addprop>";

	foreach($arr as $k=>$v)
	{
		if($selected == $k)$sel = 'SELECTED';
		else $sel = '';

		$ret .= "<option value=\"$k\" $sel>$v";
	}

	$ret .=	"</SELECT>";

	return $ret;
}
//-------------------------------------------------
//redirect_inst
//-------------------------------------------------
function redirect_inst($url)
{
	echo '<script language="JavaScript" type="text/javascript">
				<!--// redirect_inst
		  			window.location.href = "'.$url.'";
				//-->
			 </script>
			';

	die;
}
//----------------------------------------------
//
//-----------------------------------------
function splitSql_fc(&$ret, $sql, $release)
{
        $sql          = trim($sql);
        $sql_len      = strlen($sql);
        $char         = '';
        $string_start = '';
        $in_string    = FALSE;
        $time0        = time();

        for ($i = 0; $i < $sql_len; ++$i) {
            $char = $sql[$i];

            // We are in a string, check for not escaped end of strings except for
            // backquotes that can't be escaped
            if ($in_string) {
                for (;;) {
                    $i         = strpos($sql, $string_start, $i);
                    // No end of string found -> add the current substring to the
                    // returned array
                    if (!$i) {
                        $ret[] = $sql;
                        return TRUE;
                    }
                    // Backquotes or no backslashes before quotes: it's indeed the
                    // end of the string -> exit the loop
                    else if ($string_start == '`' || $sql[$i-1] != '\\') {
                        $string_start      = '';
                        $in_string         = FALSE;
                        break;
                    }
                    // one or more Backslashes before the presumed end of string...
                    else {
                        // ... first checks for escaped backslashes
                        $j                     = 2;
                        $escaped_backslash     = FALSE;
                        while ($i-$j > 0 && $sql[$i-$j] == '\\') {
                            $escaped_backslash = !$escaped_backslash;
                            $j++;
                        }
                        // ... if escaped backslashes: it's really the end of the
                        // string -> exit the loop
                        if ($escaped_backslash) {
                            $string_start  = '';
                            $in_string     = FALSE;
                            break;
                        }
                        // ... else loop
                        else {
                            $i++;
                        }
                    } // end if...elseif...else
                } // end for
            } // end if (in string)

            // We are not in a string, first check for delimiter...
            else if ($char == ';') {
                // if delimiter found, add the parsed part to the returned array
                $ret[]      = substr($sql, 0, $i);
                $sql        = ltrim(substr($sql, min($i + 1, $sql_len)));
                $sql_len    = strlen($sql);
                if ($sql_len) {
                    $i      = -1;
                } else {
                    // The submited statement(s) end(s) here
                    return TRUE;
                }
            } // end else if (is delimiter)

            // ... then check for start of a string,...
            else if (($char == '"') || ($char == '\'') || ($char == '`')) {
                $in_string    = TRUE;
                $string_start = $char;
            } // end else if (is start of string)

            // ... for start of a comment (and remove this comment if found)...
            else if ($char == '#'
                     || ($char == ' ' && $i > 1 && $sql[$i-2] . $sql[$i-1] == '--')) {
                // starting position of the comment depends on the comment type
                $start_of_comment = (($sql[$i] == '#') ? $i : $i-2);
                // if no "\n" exits in the remaining string, checks for "\r"
                // (Mac eol style)
                $end_of_comment   = (strpos(' ' . $sql, "\012", $i+2))
                                  ? strpos(' ' . $sql, "\012", $i+2)
                                  : strpos(' ' . $sql, "\015", $i+2);
                if (!$end_of_comment) {
                    // no eol found after '#', add the parsed part to the returned
                    // array if required and exit
                    if ($start_of_comment > 0) {
                        $ret[]    = trim(substr($sql, 0, $start_of_comment));
                    }
                    return TRUE;
                } else {
                    $sql          = substr($sql, 0, $start_of_comment)
                                  . ltrim(substr($sql, $end_of_comment));
                    $sql_len      = strlen($sql);
                    $i--;
                } // end if...else
            } // end else if (is comment)
    		else if( $char == '/' && $sql[$i+1] == "*")//parse /* */ comment
			{
				$start_of_comment = $i;
				$i += 1;
				while( ++$i < $sql_len)
				  if( $sql[$i] == "/" && $sql[$i-1]=="*") break;

				$com_len = $i+1 - $start_of_comment;
				$sql = substr($sql, 0, $start_of_comment).ltrim(substr($sql, $i+1));
				$sql_len      = strlen($sql);

				$i -= $com_len;
			}

            // ... and finally disactivate the "/*!...*/" syntax if MySQL < 3.22.07
            /*else if ($release < 32270
                     && ($char == '!' && $i > 1  && $sql[$i-2] . $sql[$i-1] == '/*')) {
                $sql[$i] = ' ';
            } */// end else if

            // loic1: send a fake header each 30 sec. to bypass browser timeout
            /*
			$time1     = time();
            if ($time1 >= $time0 + 30) {
                $time0 = $time1;
                header('X-pmaPing: Pong');
			} // end if
			*/
        } // end for

        // add any rest to the returned array
        if (!empty($sql) && preg_match('/[^[:space:]]+/', $sql)) {
            $ret[] = $sql;
        }

        return TRUE;
} // end of the 'PMA_splitSqlFile()' function

// parse mysql_conf.sql and create config cache file. $filename - path to mysql_conf.sql. artemK0
function createConfigCacheFile($filename, $table_prefix)
{
	define('TAB', "\t");
	define('CRLF', "\n");
	define('SLASH', '\\');
	$magicQuotes = ini_get('magic_quotes_runtime');
	if($magicQuotes == 1)
	{
		$delimiter = SLASH;
		$offset = 1;
	}
	else
	{
		$delimiter = '';
		$offset = 0;
	}

	$f = fopen($filename, 'r');

	$return_lines = array();
	$return_lines_main = array();
	while(!feof($f))
	{
		$str = fgets($f);
		if(strlen($str) > 28)
		{
			$tbl_name_arr = explode(' ', $str);
			switch($tbl_name_arr[2])
			{
				case $table_prefix.'config':
					$tmp = substr($str, strpos($str, '(') + 2 + $offset, -5 - $offset);
					$tmp = str_replace($delimiter.'",'.$delimiter.'"', TAB, $tmp);
					$tmp = str_replace($delimiter.'\"', '"', $tmp);
					//fix starts. artemK0
					$tmp = str_replace(SLASH.SLASH.SLASH."'".'USD'.SLASH.SLASH.SLASH."'", "\\'USD\\'", $tmp);
					//fix ends. artemK0
					if(strlen($tmp) != 0)
					{
						$id_arr = explode(TAB, $tmp);
						$id = $id_arr[0];
						$return_lines[$id] = implode(TAB, $id_arr);
					}
					break;
				case $table_prefix.'config_values':
					$tmp = substr($str, strpos($str, '(') + $offset, -5 - $offset);
					$tmp = str_replace($delimiter.'",'.$delimiter.'"', TAB, $tmp);
					$tmp = str_replace('\"', '"', $tmp);
					if(strlen($tmp) != 0)
					{
						$id_arr = explode(TAB, $tmp);
						$id = $id_arr[2];
						unset($id_arr[0]);
						unset($id_arr[1]);
						unset($id_arr[2]);
						if(array_key_exists($id, $return_lines))
						{
							$return_lines[$id] .= TAB . implode(TAB, $id_arr);
						}
					}
					break;
				case $table_prefix.'config_main':
					$tmp = substr($str, strpos($str, '(') + 1, -2);
					$tmp = str_replace(', ', ',', $tmp);
					$tmp = str_replace(' ,', ',', $tmp);
					$tmp = str_replace($delimiter."',", ',', $tmp);
					$tmp = str_replace(",".$delimiter."'", ',', $tmp);
					$tmp = str_replace(',', TAB, $tmp);
					$tmp = str_replace(');', '', $tmp);
					if(strlen($tmp) != 0)
					{
						$return_lines_main []= $tmp;
					}
					break;
				default:
					break;
			}
		}
	}
	fclose($f);
	$return_lines_sort = array();
	$i = 0;
	foreach($return_lines as $v)
	{
		$cols = explode(TAB, $v);
		foreach($cols as $v)
		{
			$return_lines_sort[$i] []= $v;
		}
		$i++;
	}
	foreach($return_lines_sort as $k => $v)
	{
		$sort_arr[$k] = $return_lines_sort[$k][11];
	}
	array_multisort($sort_arr, SORT_ASC, SORT_STRING, $return_lines_sort);
	$return_lines = array();
	foreach($return_lines_sort as $v)
	{
		$return_lines []= implode(TAB, $v);
	}
	$str = '';
	foreach($return_lines_main as $v)
	{
		$str .= $v.CRLF;
	}
	$f = fopen(INC_DIR . '../temp/tmp_main.txt', 'w');
	fwrite($f, $str);
	fclose($f);
	$str = '';
	foreach($return_lines as $v) $str .= $v . TAB . CRLF;
	return $str;
}

// add font files from /fonts dir, and inserts to table/file
function addFontsToConfig($dbpref, $session_instance, $cacheType, $cachePath, $cacheFilePrefix)
{
	$fonts = array();
	$itm = array();
	$_order = array();
	$existed_fonts = array();

	$d = dir(INC_DIR . '../fonts');
	while(false !== ($entry = $d->read()))
	{
	    if(!($entry == '.' || $entry == '..' || strpos($entry, '_lib') !== false))
	    {
			$fonts []= ucfirst(substr($entry, 0, -4));
		}
	}
	$d->close();

	$sql = 'SELECT '.$dbpref.'config.level_2, '.$dbpref.'config._order, '.$dbpref.'config_values.value FROM '.$dbpref.'config, '.$dbpref.'config_values WHERE '.$dbpref.'config.id = '.$dbpref.'config_values.config_id AND '.$dbpref.'config.level_0 = "text" AND '.$dbpref.'config.level_1 = "fontFamily"';
	$stmt = new Statement($sql, 426);
	$result = $stmt->process();

	while($v = $result->next())
	{
		$itm []= substr($v['level_2'], -1, 1);
		$_order []= $v['_order'];
		$existed_fonts []= $v['value'];
	}

	if(count($itm) <= 0)
	{
		$max_itm = 1;
	}
	else
	{
		$max_itm = max($itm) + 1;
	}

	if(count($_order) <= 0)
	{
		$max_order = 1;
	}
	else
	{
		$max_order = max($_order) + 1;
	}

	foreach($fonts as $v)
	{
		$sql = 'INSERT INTO '.$dbpref.'config(level_0, level_1, level_2, level_3, level_4, type, units, title, comment, info, parent_page, _order) VALUES("text", "fontFamily", ?, "", "", "string", "", "", ?, "", "font", ?)';
		$stmt = new Statement($sql, 427);
		$result = $stmt->process('itm' . $max_itm, 'text|fontFamily|itm' . $max_itm, $max_order);

		// in full caching function mysql_insert_id() wont work. artemK0
		if($cacheType != 2)
		{
			$sql = 'SELECT MAX(id) FROM '.$dbpref.'config';
			$result = mysql_query($sql);
			$id = mysql_result($result, 0, 'MAX(id)');
		}
		else
		{
			$id = cache_insert_id($cachePath, $dbpref, $cacheFilePrefix);
			$id--;
		}

		$sql = 'INSERT INTO '.$dbpref.'config_values(instance_id, config_id, value, disabled) VALUES(?, ?, ?, 0)';
		$stmt = new Statement($sql, 421);
		$result = $stmt->process($session_instance, $id, $v);

		$max_itm++;
		$max_order++;
	}

	// if full caching enabled, then sort config cache file by parent_page value. artemK0
	if($cacheType == 2)
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
	if(count($max_arr) <= 0)
	{
		$id = 1;
	}
	else
	{
		$id = max($max_arr) + 1;
	}
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

// clears /temp dir. artemK0
function clearTempDir($fname)
{
	$d=dir($fname);

	while(false!==($entry = $d->read()))
	{
		if($entry=="modules" || $entry=="." || $entry==".." || strpos($entry, "_users_")!==false) continue;

		if(is_file($fname."/".$entry))
		{
			@unlink($fname."/".$entry);
		}
		elseif(is_dir($fname."/".$entry))
		{
			clearTempDir($fname."/".$entry);
		}
	}
	$remove="";
	if($d->read()===false && $fname!="./temp") $remove=$fname;
	$d->close();
	if($remove!="") @rmdir($remove);
}

// creates directories and files in /temp. artemK0
function fillTempDir($fname)
{
	$d = dir($fname);
	while(false !== ($entry = $d->read()))
	{
		if($entry == '.' || $entry == '..') continue;

		if(is_file($fname . '/' . $entry))
		{
			$new_fname = './temp' . substr($fname, strpos($fname, '/temp_dir') + 9) . '/' . $entry;
			$lines = @file($fname . '/' . $entry);
			$fw = @fopen($new_fname, 'w');
			foreach($lines as $v)
			{
				@fwrite($fw, $v);
			}
			@fclose($fw);
			chmod($new_fname, 0777);
		}
		elseif(is_dir($fname . '/' . $entry))
		{
			$new_fname = './temp' . substr($fname, strpos($fname, '/temp_dir') + 9) . '/' . $entry;
			$b = @mkdir($new_fname, 0777);
			@chmod($new_fname, 0777);
			fillTempDir($fname . '/' . $entry);
		}
	}
	$d->close();
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

// functions that operate with defaultUsrExtCMS file. artemK0
function getConfigDataEXT($fname = '')
{
	if($fname == '')
	{
		$fname = CONFIG_FILE;
	}

	$handle = fopen($fname, 'r');
	$contents = fread($handle, filesize($fname));
	fclose($handle);

	return $contents;
}

function writeConfigEXT($configData, $fname = '')
{
	if($fname == '')
	{
		$fname = CONFIG_FILE;
	}

	$fp = @fopen($fname, 'wb');

	if($fp)
	{
		fwrite($fp, $configData);
		fclose($fp);
		return true;
	}
	else
	{
		return false;
	}
}
?>