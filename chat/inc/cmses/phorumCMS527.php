<?php

// integration class for phorum 5.1.8  (http://www.phorum.org)
// written by Veronica March 2006
// tested with FlashChat 4.5.4 and phorum 5.1.8 RC2
// version 1.0
 
// Updated and tested with Phorum 5.2.7 June16 2008 by Veronica
// Configuration options:
// 	$moderator_group_id array default is Moderator group id=1

//error_reporting(E_ALL);

	$phorum_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';

	define( "PHORUM", "5.2.7" );
	include($phorum_root_path . 'include/db/config.php');


	class phorumCMS {

		var $userid;
		var $loginStmt;
		var $getUserStmt;
		var $getUsersStmt;
		var $getUserGroupStmt;
		var $moderator_group_id = array(1);   // modify according to your Moderator configuration setup like array(1,3,9)

		function phorumCMS() {

			$this->loginStmt      = new Statement("SELECT user_id  AS id, username AS login, password FROM {$GLOBALS['db_prefix']}users WHERE username=? LIMIT 1");
			$this->getUserStmt    = new Statement("SELECT user_id  AS id, username AS login, active, admin FROM {$GLOBALS['db_prefix']}users WHERE user_id=? LIMIT 1");
			$this->getUsersStmt   = new Statement("SELECT user_id  AS id, username AS login FROM {$GLOBALS['db_prefix']}users");
			$this->getUserGroupStmt   = new Statement("SELECT * FROM {$GLOBALS['db_prefix']}user_group_xref WHERE user_id=?");


			$this->userid = NULL;
			if(isset($_COOKIE['phorum_session_v5']))  $id = explode(':', $_COOKIE['phorum_session_v5']);
			if($id[0] > 0) $this->userid = $id[0];

		}


		function isLoggedIn() {
			return $this->userid;
		}

		function getRoles($status1, $status2, $userid) {

			$rv = NULL;									// banned if none of these roles
    
			if($status1 == -2) return ROLE_ANY;			// not activated
    
			if($status1 == 1) {							// activated
				if($status2 == 1) return ROLE_ADMIN;	// admin
				if($status2 == 0) {						// find out if a Moderator
					if(($rs = $this->getUserGroupStmt->process($userid)) && ($rec = $rs->next())) {
						if(in_array($rec['group_id'], $this->moderator_group_id)) {
							if($rec['status'] > 0)   return ROLE_MODERATOR;	// Moderator is approved or group moderator
							if($rec['status'] == -1) return ROLE_ANY;		// Moderator is suspended
						}
					}
				}
				return ROLE_USER;						// user or unapproved moderator
    		}
    		return $rv;
		}

		function getUserProfile($userid) {

			if($userid == $this->userid) $rv = '../control.php?0,panel=summary';
			else $rv = '../profile.php?' . $this->userid . ',' . $userid;
			return $rv;
		}


		function getUser($userid) {
   
			$rv = NULL;

			if(($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next())) {

				$rec['roles'] = $this->getRoles($rec['active'], $rec['admin'], $userid);
				$rv = $rec;
			}
			return $rv;
		}

		function login($login, $password) {
 
			if(!isset($_COOKIE['phorum_session_v5'])) return null;	// no cookie found ie not being logged in to Forum, reject FlashChat login too
 	
			$rs = $this->loginStmt->process($login);
			$this->userid = null;

			if(($rec = $rs->next()) && !empty($rec['password']) && ($rec['password'] == md5($password))) $this->userid = $rec['id'];
			
			$id = explode(':', $_COOKIE['phorum_session_v5']);
			if($id[0] != $this->userid) return null;			// Reject login as Forum login is not equal to FlashChat login user
			
			return $this->userid;
		}

		function userInRole($userid, $role) {

			if($rs = $this->getUser($userid)) return ($this->getRoles($rs['active'], $rs['admin'], $userid) == $role);
			return false;
		}

		function logout() {

		}

		function getUsers() {
			return $this->getUsersStmt->process();
		}

		function getGender($userid) {
        	// 'M' for Male, 'F' for Female, NULL for undefined
			// No support for gender in Phorum as of today
			return NULL;
		}

	}


	$GLOBALS['fc_config']['db'] = array(
                 'host' => $PHORUM['DBCONFIG']['server'],
                 'user' => $PHORUM['DBCONFIG']['user'],
                 'pass' => $PHORUM['DBCONFIG']['password'],
                 'base' => $PHORUM['DBCONFIG']['name'],
                 'pref' => $PHORUM['DBCONFIG']['table_prefix'] . "_fc_",
                 );

	$GLOBALS['db_prefix'] = $PHORUM['DBCONFIG']['table_prefix'] . '_';

	$GLOBALS['fc_config']['cms'] = new phorumCMS();

	foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
		$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
	}

?>