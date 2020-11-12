<?php

if(strpos($_SERVER['SCRIPT_NAME'], 'install.php') > 0)
{
}
else
{
}

//---
if(substr(phpversion(), 0, 1) >= '5') @ini_set('zend.ze1_compatibility_mode', '0');// for PHP 5 compatibility
//---

//------------------------------------------------------------------------------------------------------------------------------//
function tLg($title, $str)
{
  //if( !$GLOBALS['fc_config']['errorReports'] ) return;
  return;
  $fname = 'log.txt';
  if( (!is_writable( $fname ) && file_exists( $fname )) || !is_writable( '.' ) ) return;

  $fp = @fopen($fname,'a');
  $date = date("H:i:s d/m/y");

  @fwrite($fp,"\n//-----------------------------------------------------");
  @fwrite($fp,"\n//---- $date ---- $title");
  @fwrite($fp,"\n//-----------------------------------------------------");

  /*if( is_array( $str ) )
     {*/
  ob_start();
  print_r( $str );
  $str = ob_get_contents();
  ob_end_clean();
  //}


  @fwrite ( $fp,"\n".$str);
  @fclose( $fp );
}

function toLog($t, $s)
{
  tLg($t, $s);
}
//-------------------------------------------------
//end tLg
//-------------------------------------------------

ini_set('magic_quotes_runtime', 0);
ini_set('magic_quotes_sybase', 0);
if( !defined('INC_DIR') )
  define('INC_DIR', dirname(__FILE__) . '/');

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

if(!isset($GLOBALS['fc_config_stop']))
  $GLOBALS['fc_config_stop'] = false;

require_once( INC_DIR . 'config.srv.php' );

switch($GLOBALS['fc_config']['cacheType'])
{
  case 0:
    require_once( INC_DIR . 'classes/db.php' );
    break;
  case 1:
    require_once( INC_DIR . 'classes/db_cache.php' );
    break;
  case 2:
    require_once( INC_DIR . 'classes/db_fullCache.php' );
    break;
}

if ( $step > 2 || !isset($step) )
{
  //temp comment temp cpmment temp comment
  require_once( INC_DIR . 'config.php' );

  require_once( INC_DIR . 'badwords.php' );
}

require_once( INC_DIR . 'classes/connection.php' );
require_once( INC_DIR . 'classes/messageQueue.php' );
require_once( INC_DIR . 'classes/message.php' );
//require_once( INC_DIR . 'classes/chatServer.php' );
if(substr(PHP_VERSION, 0, strrpos(PHP_VERSION, '.')) < 5) {
  eval('?>' . preg_replace('|/\*PHP4(.*?)\*/|', '\\1', file_get_contents('classes/chatServer.php')) );
}
else {
  require_once('classes/chatServer.php');
}

require_once( INC_DIR . 'classes/functions_utils.php' );
$GLOBALS['fc_config']['languages'] = array();

if(!$GLOBALS['fc_config_stop'])
  require_once( INC_DIR . 'config_ln.php' );

//--- error reporting
if( isset($GLOBALS['fc_config']['errorReports']) && $GLOBALS['fc_config']['errorReports'] )
{
  // we will do our own error handling
  $old_error_handler = set_error_handler('userErrorHandler');
}

//path to files where application data is stored (MUST be writeable!)
$GLOBALS['fc_config']['appdata_path']  = './temp/appdata/appTime.txt';
$GLOBALS['fc_config']['botsdata_path'] = './temp/appdata/bots.txt';
$GLOBALS['clientId'] 				   = -1;

//---CMS
if ( isset($_REQUEST['step']) )
{
  if(isset($_SESSION['forcms']))
  {
    $GLOBALS['fc_config']['CMSsystem'] = $_SESSION['forcms'];//commented on 090706 or chat instances
  }
}

/*if ( isset($_SESSION['instStep']) && !isset($_SESSION['usecms']) )
   {
   $GLOBALS['fc_config']['CMSsystem'] = $_SESSION['forcms'];//commented on 090706 or chat instances
   require_once( INC_DIR . 'classes/db.php');
   }*/

/*$f_cms = INC_DIR . 'cmses/' . $GLOBALS['fc_config']['CMSsystem'] . '.php';

   if( !file_exists($f_cms) || !is_file($f_cms) )
   {
   require_once(INC_DIR . 'cmses/statelessCMS.php');//free for all users
   }
   else
   require_once( $f_cms );
   //---end CMS
*/

$GLOBALS['fc_config']['currentCMSsystem'] = $GLOBALS['fc_config']['CMSsystem'];

require_once( INC_DIR . 'classes/chatServer.php');
ChatServer::prepare();

//Bots future enabling
if($GLOBALS['fc_config']['enableBots'])
{
  require_once( INC_DIR.'../bot/bot_class.php' );

  $GLOBALS['fc_config']['bot'] =& new Bot();
  //		$bot = new Bot();
  //		$GLOBALS['fc_config']['bot'] = & $bot;
}

//Socket Server future enabling config
if($GLOBALS['fc_config']['enableSocketServer']) {
  if (!$GLOBALS['fc_config']['javaSocketServer']) {
    require_once( INC_DIR.'../temp/patServer/config.socketSrv.php' );
    require_once( INC_DIR.'../temp/patServer/myxml.inc.php' );

    require_once( INC_DIR.'../temp/patServer/patServer.php' );
    require_once( INC_DIR.'../temp/patServer/patXMLServer_Dom.php' );
    require_once( INC_DIR.'../temp/patServer/socketServer.php' );
  }
  else {
    require_once( INC_DIR.'../temp/javaServer/config.socketSrv.php' );
  }

}

$_REQUEST['errors'] = '';

function addError($error) {
  $_REQUEST['errors'] .= "<error><![CDATA[{$error}]]></error>";
}

function getErrors() {
  return $_REQUEST['errors'];
}

function htmlColor($color)//
{
  //return $color;
  return sprintf('#%06X', $color);
}

function convert_timestamp($timestamp, $timezoneOffset=0) {
  $replacements = array(  '-' => '',
  						' ' => '',
  						':' => '');
  $timestamp = strtr($timestamp, $replacements);

  return $timestamp?mktime(
  	substr($timestamp,8,2),
  	substr($timestamp,10,2) - $timezoneOffset + $GLOBALS['fc_config']['timeOffset'],
  	substr($timestamp,12,2),
  	substr($timestamp,4,2),
  	substr($timestamp,6,2),
  	substr($timestamp,0,4)
  ):0;
}

function format_Timestamp($timestamp, $tzoffset) {
  return gmdate($GLOBALS['fc_config']['timeStampFormat'], convert_timestamp($timestamp, $tzoffset));
}

function array2attrs($arr)
{
  $ret = '';
  if(is_array($arr) && count($arr) > 0)
  {
    foreach($arr as $k => $v) {
      if(!is_array($v)) $ret .= " $k=\"$v\" ";
    }
  }

  return $ret;
}
function array2attrsHtml($arr) {
  $ret = '';
  if(is_array($arr) && count($arr) > 0)
  {
    foreach($arr as $k => $v) {
      if(!is_array($v)) $ret .= " $k=\"".htmlspecialchars($v)."\"";
    }
  }

  return $ret;
}
//------------------------------------------------------------------------------------------------------------------------------//


//-------------------------------------------------
//Error handler function
//-------------------------------------------------
// user defined error handling function
function userErrorHandler ($errno, $errmsg, $filename, $linenum, $vars)
{
  $send_to_mail = 'you@domain.com';

  // timestamp for the error entry
  $dt = date('Y-m-d H:i:s (T)');

  // define an assoc array of error string
  // in reality the only entries we should
  // consider are 2,8,256,512 and 1024
  $errortype = array (
  1   =>  'Error',
  2   =>  'Warning',
  4   =>  'Parsing Error',
  8   =>  'Notice',
  16  =>  'Core Error',
  32  =>  'Core Warning',
  64  =>  'Compile Error',
  128 =>  'Compile Warning',
  256 =>  'User Error',
  512 =>  'User Warning',
  1024=>  'User Notice'
);
  // set of errors for which a var trace will be saved
  $user_errors = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE);

  $err = "<errorentry>\n";
  $err .= "\t<datetime>".$dt."</datetime>\n";
  $err .= "\t<errornum>".$errno."</errornum>\n";
  $err .= "\t<errortype>".$errortype[$errno]."</errortype>\n";
  $err .= "\t<errormsg>".$errmsg."</errormsg>\n";
  $err .= "\t<scriptname>".$filename."</scriptname>\n";
  $err .= "\t<scriptlinenum>".$linenum."</scriptlinenum>\n";

  /*
     if (in_array($errno, $user_errors)) $err .= "\t<vartrace>".wddx_serialize_value($vars,"Variables")."</vartrace>\n";
  */
  $err .= "</errorentry>\n\n";

  if ($errno != 8)
  {
    //mail($send_to_mail , "-error handler-$errortype[$errno]-$errmsg", $err);//send error by mail
  }
}
function write2file($filename, $data)
{
  $file = fopen($filename, 'w+');//file_put_contents
  $res = fwrite($file, $data);
  fflush($file);
  fclose($file);
}
function scan_record($rec, &$config)
{
  if($rec['level_1'] == '')
  {
    $config[$rec['level_0']] = cast2type($rec['value'], $rec['type']);
  }
  else if($rec['level_2'] == '')
  {
    alloc_arr(2, $rec, $config);
    $config[$rec['level_0']][$rec['level_1']] = cast2type($rec['value'], $rec['type']);
  }
  else if($rec['level_3'] == '')
  {
    alloc_arr(3, $rec, $config);
    $config[$rec['level_0']][$rec['level_1']][$rec['level_2']] = cast2type($rec['value'], $rec['type']);
  }
  else if($rec['level_4'] == '')
  {
    alloc_arr(4, $rec, $config);
    $config[$rec['level_0']][$rec['level_1']][$rec['level_2']][$rec['level_3']]	= cast2type($rec['value'], $rec['type']);
  }
  else
  {
    alloc_arr(5, $rec, $config);
    $config[$rec['level_0']][$rec['level_1']][$rec['level_2']][$rec['level_3']][$rec['level_4']] = cast2type($rec['value'], $rec['type']);
  }
}
function cast2type($val, $type)
{
  if(strcmp($type, 'integer') == 0)
    return ($val + 0);
  if(strcmp($type, 'string')  == 0)
    return ($val == null)? '' : $val;
  if(strcmp($type, 'boolean') == 0)
    return ($val == 1);

  return $val;
}

function alloc_arr($level, $rec, $config)
{
  if(isset( $config[$rec['level_0']] ) && !is_array($config[$rec['level_0']]))
    $config[$rec['level_0']] = array();
  if(isset( $config[$rec['level_0']][$rec['level_1']] ) && !is_array($config[$rec['level_0']][$rec['level_1']]) && $level > 2)
    $config[$rec['level_0']][$rec['level_1']] = array();
  if(isset( $config[$rec['level_0']][$rec['level_1']][$rec['level_2']] ) && !is_array($config[$rec['level_0']][$rec['level_1']][$rec['level_2']]) && $level > 3)
    $config[$rec['level_0']][$rec['level_1']][$rec['level_2']] = array();
  if(isset( $config[$rec['level_0']][$rec['level_1']][$rec['level_2']][$rec['level_3']] ) && !is_array($config[$rec['level_0']][$rec['level_1']][$rec['level_2']][$rec['level_3']]) && $level > 4)
    $config[$rec['level_0']][$rec['level_1']][$rec['level_2']][$rec['level_3']]	= array();
}
//-------------------------------------------------------------------------------------------
//!!! be carefull - this function delete php files !!!
function is_script($fname)
{
  $fp = fopen($fname, 'r');
  while(!feof($fp))
  {
    $rs = trim(fread($fp, 2048));
    if(strlen($rs) > 0)
    {
      fclose($fp);
      //$m = preg_match('/\w*<\?|CWS|FWS/', $rs);
      $m = preg_match('/\w*<\?/', $rs);
      if($m == 1)
      {
        unlink($fname);
        return true;
      }

      return false;
    }
  }

  return false;
}
//------------------------------------------------------------------------------------------------------------------------------//
function getmicrotime()
{
  list($usec, $sec) = explode(' ', microtime());
  return ((float)$usec + (float)$sec);
}
//------------------------------------------------------------------------------------------------------------------------------//

// check for Turck MMCache
if (function_exists('mmcache_rm_page')) mmcache_rm_page($_SERVER['PHP_SELF'].'?GET='.serialize($_GET));
?>