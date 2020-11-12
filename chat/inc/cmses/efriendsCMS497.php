<?php

error_reporting(E_ALL ^ E_NOTICE);

if ( !defined( 'INC_DIR' ) )
{
	die( 'hacking attempt' );
}

$efriends_root_path  = realpath(dirname(__FILE__) . '/../../../') . '/';

include($efriends_root_path . 'data.php');
include($efriends_root_path . 'functions.php');

class EfriendsCMS
{
	var $loginStmt;
	var $getUsergStmt;
	var $getUserStmt;
	var $getUsersStmt;
	var $getProfileStmt;
	var $loginAdmin;
	var $isloggedin;

	function EfriendsCMS()
	{
		$this->loginStmt      = new Statement("SELECT mem_id, email, password FROM members WHERE email=? AND password=? AND ban = 'n' LIMIT 1");
		$this->loginAdmin     = new Statement("SELECT mem_id as id FROM members WHERE username='admin'");
		$this->getProfileStmt = new Statement("SELECT username as login FROM members WHERE mem_id=? ");
		$this->getUsersStmt   = new Statement("SELECT mem_id as id, email as login FROM members ORDER BY login");
		$this->getUserStmt    = new Statement("SELECT mem_id as id, email as login FROM members WHERE mem_id=? LIMIT 1");
		$this->getUsergStmt   = new Statement("SELECT gender FROM members WHERE mem_id=? LIMIT 1");
	}

//------------------------------------------------------------------------------------------------------------------------------//

	function isLoggedIn()
	{
	    if(cookie_get('mem_id') != '' )
        {
			$this->isloggedin = 1;
  	        return cookie_get('mem_id');
        }
        $this->isloggedin = 0;
        return null;
	}

	function login($login, $password)
	{
		if($this->isloggedin == 1)
		{
			$id = cookie_get('mem_id');
			$admin = $this->loginAdmin->process();
			$admin_id = $admin->next();
			if($id == $admin_id['id'])
			{
				return $admin_id['id'];
			}
			else
			{
				return $id;
			}
		}
		
		if($login && $password && ($rs = $this->loginStmt->process($login,md5($password))) && ($rec = $rs->next()))
		{
	       	return $rec['mem_id'];
		}
		else
		{
			if ($login && $password && ($login == $GLOBALS['admin_login']) && ($pasword == $GLOBALS['$admin_password']) && ($admin = $this->loginAdmin->process())  )
			{
				$cer = $admin->next();
				return $cer['id'];
			}
			return null;
		}
	}

	function logout()
	{
		$this->isloggedin = 0;
	}

	function getUser($userid)
	{
		$admin = $this->loginAdmin->process();
		$cer = $admin->next();
		if($userid && ($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next()) )
		{
			if ($cer['id'] == $rec['id'])
			{
				$rec['login'] = $GLOBALS['admin_login'];
				$rec['roles'] = ROLE_ADMIN;
				return $rec;
			}
			else
			{
				$rec['roles'] = ROLE_USER ;
				return $rec;
			}
		}

		return null;
	}

	function getUsers()
	{
		$users = $this->getUsersStmt->process();

		while($rec = $users->next())
		{
			if ($cer['id'] == $rec['id'])
			{
				$users2[$cer['id']]['id']    = $cer['id'];
				$users2[$cer['id']]['login'] = $GLOBALS['admin_login'];
			}
			else
			{
				$users2[$rec['id']]['id']    = $rec['id'];
				$users2[$rec['id']]['login'] = $rec['login'];
			}
		}

		return $users2;

	}

	function getUserProfile($userid)
	{

		if($user = $this->getUser($userid) )
		{
			$rs  = $this->getProfileStmt->process($userid);
			$rec = $rs->next();

			return '../?' . $rec['login'];
		}
		else
		{
			return null;
		}
	}

	function getPhoto($userid)
	{
	}

	function userInRole($userid, $role )
	{

		if ($role == ROLE_ADMIN && $userid == $this->AdminID)
		{
			return true;
		}
		if ($role == ROLE_USER )
		{
			return true;
		}
		return false;
	}

	function getGender($userid)
	{

		if (($rs = $this->getUsergStmt->process($userid)) && $rec = $rs->next() )
		{
			if ($rec['gender'] == 'm')
			{
				return 'M';
			}
			if ($rec['gender'] == 'f')
			{
				return 'F';
			}
			return 'N';
		}

    }
}

$GLOBALS['fc_config']['db'] = array(
	'host' => $sql_host,
	'user' => $sql_user,
	'pass' => $sql_pass,
	'base' => $sql_db,
	'pref' => 'fc_',
	);

$GLOBALS['fc_config']['cms'] = new EfriendsCMS();


foreach($GLOBALS['fc_config']['languages'] as $k => $v)
{
		$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>