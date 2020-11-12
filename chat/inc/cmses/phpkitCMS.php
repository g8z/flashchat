<?php

// integration class for PHPKIT version 1.6.1 (http://www.phpkit.de/)
// written by Veronica Feb 26, 2006
// tested with FlashChat 4.5.3
// version 1.0

	$root = realpath(dirname(__FILE__) . '/../../../');
	require_once($root . "/admin/config/inc.sql.php");

	class PHPKitCMS {

		var $userid;

		var $loginStmt;
		var $getUserStmt;
		var $getUsersStmt;
		var $getSessionStmt;

		function PHPKitCMS()
		{
			$this->loginStmt      = new Statement("SELECT user_id AS id, user_pw AS password, user_nick AS login FROM {$GLOBALS['db_prefix']}_user WHERE user_nick=?");
			$this->getUserStmt    = new Statement("SELECT user_id AS id, user_pw AS password, user_nick AS login, user_status, user_sex FROM {$GLOBALS['db_prefix']}_user WHERE user_id=?");
			$this->getUsersStmt   = new Statement("SELECT user_id AS id, user_nick AS login FROM {$GLOBALS['db_prefix']}_user ORDER BY user_nick");
			$this->getSessionStmt = new Statement("SELECT session_id FROM {$GLOBALS['db_prefix']}_session WHERE session_userid=?");
		}

		function isLoggedIn() {

			$this->userid = null;
			if(isset($_COOKIE['user_id']) && ($this->userid == null) && $_COOKIE['user_id'] != 0) $this->userid=$_COOKIE['user_id'];

			return $this->userid;
		}

		function login($login, $password) {

			$this->userid = null;

			if($login && $password) {
				//Try to find user using provided login
				if(($rs = $this->loginStmt->process($login)) && ($rec = $rs->next()))
					if($rec['password'] == md5($password)) $this->userid = $rec['id'];
			}
			return $this->userid;
		}

		function logout(){
			$this->userid = null;
		}

		function getUser($userid) {
			if($userid) {
				$rs = $this->getUserStmt->process($userid);
				$rec = $rs->next();
				$rec['roles'] = $this->getRoles($rec['user_status']);
				return $rec;
			} else {
				return null;
			}
		}

		function getUsers() {
			return 	$this->getUsersStmt->process();
		}

		function getUserProfile($userid) {
			if($userid == SPY_USERID) return null;

			if(($rs = $this->getSessionStmt->process($userid)) && ($rec = $rs->next()))
				return '../include.php?path=login/userinfo.php&id=' . $userid . '&PHPKITSID=' . $rec['session_id'];
			else return null;
		}

		function getRoles($status) {

			$rv = NULL;
									// phpkit: user_status in users table
			if($status == 'user')    $rv = ROLE_USER;	// Registered user
			if($status == 'mod')     $rv = ROLE_MODERATOR;	// Moderator
			if($status == 'admin')   $rv = ROLE_ADMIN;	// Administrator
			if($status == 'member')  $rv = ROLE_USER;	// Member = Registered user
			if($status == 'undef?')  $rv = ROLE_ANY;	// Awaiting approval ?
			if($status == 'ban')     $rv = ROLE_NOBODY;	// Banned in Forum

			return $rv;
  		}

		function userInRole($userid, $role) {
			if(($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next())) {
				return ($this->getRoles($rec['user_status']) == $role);
			}
			return false;
		}

		function getGender($userid){
			// 'M' for Male, 'F' for Female, NULL for undefined
			if($userid) {
				if(($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next())) {
					if($rec['user_sex'] == 'w') return 'F';
					if($rec['user_sex'] == 'm') return 'M';
				}
			}
        		return NULL;

		}


  		function getPhoto($userid) {

			$fileExt = explode(',', $GLOBALS['fc_config']['photoloading']['allowFileExt']);

			$oldFile = './temp/nick_image/' . $userid . '.';
			$fs = reset($fileExt);
			while($fs) {
				if(file_exists($oldFile . $fs)) return $oldFile . $fs;
				$fs = next($fileExt);
			}

 			return '';
  		}

	}

	$GLOBALS['fc_config']['db'] = array(
                 'host' => $sqlhost,
                 'user' => $sqluser,
                 'pass' => $sqlpass,
                 'base' => $database,
                 'pref' => $sqlprefix . "fc_",
                 );

	$GLOBALS['db_prefix'] = $sqlprefix;

	$GLOBALS['fc_config']['cms'] = new PHPKitCMS();

	//clear 'if moderator' message
	foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
		$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
	}
?>
