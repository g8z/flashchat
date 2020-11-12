<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

define('FULL_PATH', dirname(__FILE__) . '/../../../');
$osd_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';
require_once($osd_root_path . 'temp/myconfigs/config.php');

include($osd_root_path . 'init.php');

class OSDateCMS {
	var $adminUser = false;
    var $userid;
    var $loginStmt;
    var $loginNameStmt;
    var $getUserStmt;
    var $getUsersStmt;
    var $getAdminsStmt;
    var $adminLoginStmt;
    var $adminLoginNameStmt;

    function OSDateCMS()
	{
      $this->userid = NULL;

      $this->loginStmt     = new Statement("SELECT user.* FROM " . USER_TABLE . " user, " . MEMBERSHIP_TABLE . " member " .
					   " WHERE user.id=? and user.password=md5(?) AND user.status='Active' AND user.level=member.roleid AND member.chat=1 AND member.enabled='Y' LIMIT 1");

      $this->loginNameStmt = new Statement("SELECT user.* FROM " . USER_TABLE . " user, " . MEMBERSHIP_TABLE . " member " .
					   " WHERE user.username=? and user.password=md5(?) AND user.status='Active' AND user.level=member.roleid AND member.chat=1 AND member.enabled='Y' LIMIT 1");

      $this->getUserStmt   = new Statement("SELECT user.id AS id, user.username AS login, user.gender FROM " . USER_TABLE . " user, " . MEMBERSHIP_TABLE . " member " .
					   " WHERE user.id = ? AND user.status='Active' AND user.level=member.roleid AND member.chat=1 AND member.enabled='Y' LIMIT 1");

      $this->getAdminsStmt = new Statement("SELECT admin.id AS id, admin.username AS login, admin.super_user as super_user FROM " . ADMIN_TABLE . " admin, " . ADMIN_RIGHTS_TABLE . " adminrigth " .
					   " WHERE admin.enabled='Y' AND adminrigth.chat=1 AND adminrigth.chat_mgt=1 AND adminrigth.adminid=admin.id"
					   );
      $this->getUsersStmt  = new Statement("SELECT user.id AS id, user.username AS login FROM " . USER_TABLE . " user, " . MEMBERSHIP_TABLE . " member " .
					   " WHERE user.status='Active' AND user.level=member.roleid AND member.chat=1 AND member.enabled='Y'");

      // in addition to NOT having a numeric ID, admin passwords are stored unencrypted...
      $this->adminLoginStmt = new Statement("SELECT admin.* FROM " . ADMIN_TABLE . " admin, " . ADMIN_RIGHTS_TABLE . " adminrigth " .
					    " WHERE admin.id = ? AND admin.password =md5(?) AND admin.enabled='Y' AND adminrigth.chat=1 AND adminrigth.chat_mgt=1 AND adminrigth.adminid=admin.id"
					    );
      $this->adminLoginNameStmt = new Statement("SELECT admin.* FROM " . ADMIN_TABLE . " admin, " . ADMIN_RIGHTS_TABLE . " adminrigth " .
						" WHERE admin.username = ? AND admin.password =md5(?) AND admin.enabled='Y' AND adminrigth.chat=1 AND adminrigth.chat_mgt=1 AND adminrigth.adminid=admin.id"
						);

      $this->isModeratorStmt = new Statement("SELECT admin.super_user FROM " . ADMIN_TABLE . " admin WHERE admin.id = ?");
    }

    function isLoggedIn()
    {
		if ( $_SESSION['UserId'] )
		{
			if(($rs = $this->getUserStmt->process($_SESSION['UserId'])) && ($rec = $rs->next()))
			{
	    		$this->userid = $_SESSION['UserId'];
	    	}
		}
		elseif ( $_SESSION['AdminId'] )
		{
	    	$this->userid = $_SESSION['AdminId'];
	    	$this->adminUser = true;
		}
		return $this->userid;
    }

    function getRoles()
    {
		$rv = NULL;
		if ($GLOBALS['fc_config']['liveSupportMode'])
		{
		  	$rv = ROLE_CUSTOMER;
		}
		elseif ($this->adminUser)
		{
		  	$rv = ROLE_ADMIN;
		}
		elseif ($this->moderatorUser)
		{
		 	$rv = ROLE_MODERATOR;
		}
		else
		{
			$rv = ROLE_USER;
		}
		return $rv;
    }

    function getUserProfile($userid)
    {
		if($userid == SPY_USERID)
		{
			return null;
		}
		$v = $this->getUser($userid);
		if($v['roles'] == ROLE_ADMIN)
		{
			return DOC_ROOT . 'showprofile.php?id=-1';
		}
		return DOC_ROOT . 'showprofile.php?id='.$userid;
    }


    function getUser($userid)
	{
     	$rv = NULL;
     	$isAdmin = false;

		if(($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next()))
		{
			$rec['roles'] = ROLE_USER;
			$rv = $rec;
    	}
	    elseif($rs = $this->getAdminsStmt->process())
		{
			while($rs->hasNext())
			{
				$rec = $rs->next();
				if($userid == $rec['id'])
				{
					$isAdmin = true;
					break;
				}
			}
			if($isAdmin)
			{
				$rec['roles'] = $rec['super_user'] == 'Y' ? ROLE_ADMIN : ROLE_MODERATOR;
				$rec['id'] = $rec['id'];
				$rec['login'] = $rec['login'];
				$rv = $rec;
			}
		}
    	return $rv;
    }

    function login($login, $password)
    {
		$this->userid = null;

		if($login && $password)
	  	{
	    	if(($rs = $this->loginStmt->process($login, $password )) && ($rec = $rs->next()))
	      	{
				$this->userid = $rec['id'];
	      	}
	    	else if(($rs = $this->loginNameStmt->process($login, $password )) && ($rec = $rs->next()))
			{
	      		$this->userid = $rec['id'];
	    	}
	    	else if(($rs = $this->adminLoginStmt->process($login, $password )) && ($rec = $rs->next()))
			{
	      		$this->userid = $rec['id'];
	    	}
	    	else if(($rs = $this->adminLoginNameStmt->process($login, $password )) && ($rec = $rs->next()))
			{
	      		$this->userid = $rec['id'];
	    	}
		}

		return $this->userid;
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
		$this->userid = null;
    }

    function getUsers()
	{
      	return $this->getUsersStmt->process();
    }

    function getGender($userid)
    {
		// 'M' for Male, 'F' for Female, NULL for undefined
		if(($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next()))
	  	{
    		return strtoupper( $rec['gender'] );
	  	}
		return NULL;
    }
}

$GLOBALS['fc_config']['db'] = array(
				    'host' => DB_HOST,
				    'user' => DB_USER,
				    'pass' => DB_PASS,
				    'base' => DB_NAME,
				    'pref' => DB_PREFIX . "_fc_",//DB_PREFIX
				    );

$GLOBALS['fc_config']['cms'] = new OSDateCMS();


foreach($GLOBALS['fc_config']['languages'] as $k => $v)
{
  $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}
?>