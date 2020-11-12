<?php

	if ( !defined( 'INC_DIR' ) )
	{
		die( 'hacking attempt' );
	}

// integration class for Simple Machines Forum (www.simplemachines.org)
// written by Manuel Aristarán <masterson@diosmilanesa.com.ar>
// updated with usergruops, gender and photo support Feb28, 2006 by Veronica

// Updated for SMF 2.0 July 12, 2008 by Veronica
// Update includes also /chat/admin/login.php
// No support any more in this script for pre-SMF 2 versions

error_reporting(E_ALL ^ E_NOTICE);
$smf_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';

if (!defined("SMF")) define("SMF", "1");

include($smf_root_path . 'Settings.php');
include($smf_root_path . 'Sources/Load.php');
include($smf_root_path . 'Sources/Subs-Auth.php');
include($smf_root_path . 'Sources/LogInOut.php');

class SMFCMS
{
	var $userid;
  	var $loginStmt;
  	var $getUserStmt;
  	var $getPhotoStmt;
	var $getAvatarStmt;
  	var $getUsersStmt;

  	function SMFCMS()
  	{
		$this->loginStmt     = new Statement("SELECT id_member as id, member_name AS login, passwd, is_activated from {$GLOBALS['db_prefix']}members WHERE member_name=? AND (passwd=? OR passwd=?) LIMIT 1");
    	$this->getUserStmt   = new Statement("SELECT id_member AS id, member_name AS login, id_group, gender, additional_groups FROM {$GLOBALS['db_prefix']}members WHERE id_member=? LIMIT 1");
    	$this->getPhotoStmt  = new Statement("SELECT filename FROM {$GLOBALS['db_prefix']}attachments WHERE id_member=? LIMIT 1");
    	$this->getUsersStmt  = new Statement("SELECT id_member as id, member_name as login FROM {$GLOBALS['db_prefix']}members");
		$this->getAvatarStmt = new Statement("SELECT avatar FROM {$GLOBALS['db_prefix']}members WHERE id_member=? LIMIT 1");
    	$this->userid = NULL;

    	if (isset($_COOKIE[$GLOBALS['cookiename']]))
	   	{
			$cookieData = unserialize((get_magic_quotes_gpc() ? stripslashes($_COOKIE[$GLOBALS['cookiename']]) : $_COOKIE[$GLOBALS['cookiename']])) ;
            $this->userid = $cookieData[0];
    	}
  	}

  	function isLoggedIn()
	{
    	return $this->userid;
  	}

	function getRoles($status, $additionalGroups)
	{
  		if($status == 1 || in_array(1, $additionalGroups)) return ROLE_ADMIN;

  		if($status == 2 || in_array(2, $additionalGroups)) return ROLE_MODERATOR;
  		if($status == 3 || in_array(3, $additionalGroups)) return ROLE_MODERATOR;

  		if($status == 0 || ($status > 3 && $status < 9 )) return ROLE_USER;
  		if(in_array(0, $additionalGroups)) return ROLE_USER;

  		return null;
  	}

  	function getUserProfile($userid)
	{

    	if ($userid == SPY_USERID) $rv = NULL;

    	elseif ($user = $this->getUser($userid))
		{
      		$rv  = $GLOBALS['boardurl'] . "/index.php?action=profile;u=".$userid;
    	}

    	return $rv;
  	}

 	function getUser($userid)
	{
    	$rv = NULL;

    	if(($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next()))
		{
      		$rec['roles'] = $this->getRoles($rec['id_group'], explode(',', $rec['additional_groups']));
      		$rv = $rec;
    	}

    	return $rv;
  	}

  	function login($login, $password)
	{
    	$md5_password = md5_hmac($password, strtolower($login));
        $sha1_password= sha1(strtolower($login) . $password );

    	$rs = $this->loginStmt->process($login,$md5_password, $sha1_password);

    	$rec = $rs->next();

    	if ($rec)
		{
      		// is the user activated?
      		if (empty($rec['is_activated'])) return NULL;

      		$this->userid = $rec['id'];

      		setLoginCookie(60 * $GLOBALS['modSettings']['cookieTime'], $rec['id'], $sha1_password);

      		return $rec['id'];
   		}
  	}

    function userInRole($userid, $role)
	{
		if($user = $this->getUser($userid))
		{
			return ($user['roles'] == $role);
        }
        return false;
    }

  	function logout()
	{
 	}

  	function getUsers()
	{
   		return $this->getUsersStmt->process();
  	}

  	function getGender($userid)
	{
		// 'M' for Male, 'F' for Female, NULL for undefined

		$sex = $this->getUserStmt->process($userid);
		if($gender = $sex->next())
		{
			if($gender['gender'] == '2') return 'F';
			if($gender['gender'] == '1') return 'M';
		}
        return NULL;
  	}

  	function getPhoto($userid)
	{
		$fileExt = explode(',', $GLOBALS['fc_config']['photoloading']['allowFileExt']);

		$oldFile = './nick_image/' . $userid . '.';
		$fs = reset($fileExt);
		while($fs)
		{
			if(file_exists($oldFile . $fs)) return $oldFile . $fs;
			$fs = next($fileExt);
		}

		$rs = $this->getPhotoStmt->process($userid);
		$av = $this->getAvatarStmt->process($userid);
		
		if($ava = $av->next())
		{
			if(!empty($ava['avatar']))  return '../avatars/' . $ava['avatar'];
		}
		if($rec = $rs->next())
		{
			if(!empty($rec['filename']))  return '../attachments/' . $rec['filename'];
		}
		return '';
  	}

}

$GLOBALS['fc_config']['db'] = array(
                 'host' => $db_server,
                 'user' => $db_user,
                 'pass' => $db_passwd,
                 'base' => $db_name,
                 'pref' => $db_prefix . "fc_",
                 );

$GLOBALS['fc_config']['cms'] = new SMFCMS();

foreach($GLOBALS['fc_config']['languages'] as $k => $v)
{
	$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>