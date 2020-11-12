<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

	//The StatelessCMS implementation ignors user passwords and assign admin role for thouse users who provided admin pasword during login.

	class StatelessCMS {
		var $userid = null;

		var $loginStmt;
		var $getUserStmt;
		var $addUserStmt;
		var $setUserStmt;
		var $getUsersStmt;

		function StatelessCMS() {
			$this->loginStmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE login=? LIMIT 1');
			$this->getUserStmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE id=? LIMIT 1');
			$this->addUserStmt = new Statement('INSERT INTO '.GLOBALS['fc_config']['db']['pref'].'users (login, roles) VALUES(?, ?)');
			$this->setUserStmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET roles=? WHERE id=?');
			$this->getUsersStmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users ORDER BY login');
			$this->delUserStmt = new Statement('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE login=?');
		}

		function isLoggedIn() {
			return $this->userid;
		}

		function login($login, $password) {
			if(trim($login) == '') return null;
			if(strpos($login, ' ') === 0) return null;

			$this->userid = null;
			$roles = $GLOBALS['fc_config']['liveSupportMode']?ROLE_CUSTOMER:ROLE_USER;
			if($password)
			{
				switch($password){
					case $GLOBALS['fc_config']['adminPassword']:
						$roles = ROLE_ADMIN;
						break;
					case $GLOBALS['fc_config']['moderatorPassword']:
						$roles = ROLE_MODERATOR;
						break;
				}
			}

			if($login)
			{
				if(($rs = $this->loginStmt->process($login)) && ($rec = $rs->next()))
				{
					$this->userid = $rec['id'];
					//$stmt = new Statement("SELECT ip FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE userid=? AND ip<>?");
       				//if(($rs = $stmt->process($rec['id'], $_SERVER['REMOTE_ADDR'])) && ($rec = $rs->next())) return $this->userid;
					$this->setUserStmt->process($roles, $this->userid);
				}
				else
				{
					$this->userid = $this->addUserStmt->process($login, $roles);
				}
			}

			return $this->userid;
		}

		function logout(){
			$this->userid = null;
		}

		function getUser($userid) {
			if($userid) {
				$rs = $this->getUserStmt->process($userid);
				return $rs->next();
			} else {
				return null;
			}
		}

		function getUsers() {
			return 	$this->getUsersStmt->process();
		}

		function getUserProfile($userid) {
			return null;
		}

		function userInRole($userid, $role) {
			if($user = $this->getUser($userid)) {
				return ($user['roles'] == $role);
			}
			return false;
		}

		function getGender($userid) {
     	   // 'M' for Male, 'F' for Female, NULL for undefined
        	return NULL;
	    }

		function addUser($login, $password, $roles){
			$user = $this->loginStmt->process($login);
			if(($rec = $user->next()) != null) return $rec['id'];
			return $this->addUserStmt->process($login, $roles);
		}

		function deleteUser($login){
			$this->delUserStmt->process($login);
		}
	}

	$GLOBALS['fc_config']['cms'] = new StatelessCMS();
?>