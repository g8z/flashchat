<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

	//The DefaultCMS implementation behaves as usual content management system - i.e. checks provided login/password against system database and uses user roles predefined in it.

	class DefaultCMS {
		var $autocreateUsers = false; //change this to false to disabe nonexisting users auto creation

		var $userid = null;

		var $loginStmt;
		var $getUserStmt;
		var $addUserStmt;
		var $getUsersStmt;

		function DefaultCMS()
		{
			/*$this->loginStmt      = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}users WHERE login=? LIMIT 1");
			$this->getUserStmt    = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}users WHERE id=? LIMIT 1");
			$this->addUserStmt    = new Statement("INSERT   INTO {$GLOBALS['fc_config']['db']['pref']}users (login, password, roles) VALUES(?, ?, ?)");
			$this->getUsersStmt   = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}users ORDER BY login");
			$this->delUserStmt    = new Statement("DELETE FROM {$GLOBALS['fc_config']['db']['pref']}users WHERE login=?");*/
			// changed on 090706 for chat instances
			$this->loginStmt      = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE login=? and (instance_id =? or roles = 2) LIMIT 1',101);//admin role 2 can login to any chat instance
			$this->getUserStmt    = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE id=? LIMIT 1' , 103 );
			$this->addUserStmt    = new Statement('INSERT   INTO '.$GLOBALS['fc_config']['db']['pref'].'users (login, password, roles, instance_id) VALUES(?, ?, ?, ?)',102);

			$this->getUsersStmt   = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users where instance_id= '.$_SESSION['session_inst'].' ORDER BY login', 104);
			$this->delUserStmt    = new Statement('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE login=? and instance_id = ?');

		}

		function isLoggedIn() {
			return $this->userid;
		}

		//function login($login, $password) {
		function login($login, $password, $session_inst) {// changed on 090706 for chat instances
			$this->userid = null;

			//$login = utf8_encode($login);// umlavta fix
			if(trim($login) == '' || trim($password) == '') return null;

			if($login && $password)
			{
				//Try to find user using provided login
				//if(($rs = $this->loginStmt->process($login)) && ($rec = $rs->next()))
				if(($rs = $this->loginStmt->process($login, $session_inst)) && ($rec = $rs->next())) // changed on 090706 for chat instances
				{
					if($rec['password'] == $password || $rec['password'] == md5($password))
						$this->userid = $rec['id'];
				}
				else
				{
					//If not - autocreate user with such login and password
					if($this->autocreateUsers)
					{
						$roles = $GLOBALS['fc_config']['liveSupportMode']? ROLE_CUSTOMER : ROLE_USER;
						//$this->userid = $this->addUser($login, $password, $roles);
						$this->userid = $this->addUser($login, $password, $roles, $session_inst);// changed on 090706 for chat instances
					}
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

		/*function getUserProfile($userid) {*/
		function getUserProfile($userid, $session_inst = 1) {//changed on 090706 for chat instances
			if($userid == SPY_USERID) return null;

			/*return "profile.php?userid=$userid";*/

			return 'profile.php?userid='.$userid.'&session_inst='.$session_inst;//changed on 090706 for chat instances
		}

		function userInRole($userid, $role) {
			if($user = $this->getUser($userid)) {
				return ($user['roles'] == $role);
			}
			return false;
		}

		function getGender($userid) {
	        // 'M' for Male, 'F' for Female, NULL for undefined
			$pr      = $this->getUser($userid);
			$profile = unserialize($pr['profile']);
			$gender  = $profile['gender'];
			if(!isset($gender)) $gender = $profile['t43'];
			$ret     = strtoupper(substr($gender, 0, 1));

			return ($ret != 'M' && $ret != 'F')? NULL : $ret;
		}


		function getPhoto($userid)
		{
			$user = $this->getUser($userid);
			if($user == null)
				return '';

			$profile = unserialize($user['profile']);
			return $profile['t12'];
		}

		//function addUser($login, $password, $roles){
		function addUser($login, $password, $roles, $session_inst = 1){ //changed on 090706 for chat instances
			//$user = $this->loginStmt->process($login);
			$user = $this->loginStmt->process($login, $session_inst);//changed on 090706 for chat instances
			if(($rec = $user->next()) != null) return $rec['id'];

			if( $GLOBALS['fc_config']['encryptPass'] > 0 ) $password = md5($password);//encrypt password

			//return $this->addUserStmt->process($login, $password, $roles);
			return $this->addUserStmt->process($login, $password, $roles, $session_inst);//changed on 090706 for chat instances
		}

		//changed on 090706 for chat instances
		/*function deleteUser($login){
			$this->delUserStmt->process($login);
		}*/
		function deleteUser($login, $session_inst = 1){
			$this->delUserStmt->process($login, $session_inst);
		}
		//changed on 090706 for chat instances ends here

	}

	$GLOBALS['fc_config']['cms'] = new DefaultCMS();

	//clear 'if moderator' message
	foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
		$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
	}

?>