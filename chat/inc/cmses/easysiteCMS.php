<?php
	$easysitepath = realpath(dirname(__FILE__) . '/../../../') . '/';
	require_once($easysitepath . 'config.php');

	class easysiteCMS {
		var $userid;
		var $userrole;
		var $loginStmt;
		var $passFormat;
		var $getUserStmt;
		var $getGrpPerm;
		var $getUsersStmt;
		var $getSiteStmt;

		function easysiteCMS()
		{
			$this->userid = NULL;

			//if the session variable of the user_id exists assigns the user
			if($_SESSION['es_auth']['id'] > 0) $this->userid = $_SESSION['es_auth']['id'];

			$this->getUserStmt = new Statement('SELECT * FROM '.USERS_TABLE.' WHERE id=? LIMIT 1');
			$this->getUsersStmt = new Statement('SELECT * FROM '.USERS_TABLE.' ORDER BY login_id');

			//This statement is just used for comparing the different user groups
			$this->getGrpPerm = new Statement('SELECT * FROM '.PERMISSIONS_TABLE.' WHERE group_id=? AND resource_type=?');

			//This statement is only used for determining whether the passwords are stored in MD5 format
			$this->getSiteStmt = new Statement('SELECT * FROM '.SETTINGS_TABLE.' WHERE property=? AND value=?');

			$this->loginStmt = new Statement('SELECT * FROM '.USERS_TABLE.' WHERE login_id=? AND login_pass='.$this->getPassFormat().' LIMIT 1');
		}

		function isLoggedIn()
		{
			return $this->userid;
		}

		function login($login, $password)
		{
			$this->userid = null;

			if($login && $password)
			{
				$pass = $password;
				if(($rs = $this->loginStmt->process($login,$pass)) && ($rec = $rs->next()))
				{
					$this->userid = $rec['id'];
				}
			}
			return $this->userid;
		}

		function logout()
		{
			$this->userid = null;
		}

		function getUser($userid)
		{
			if($userid)
			{
				$rs = $this->getUserStmt->process($userid);
				$usr = $rs->next();
				$usr['login'] = $usr['login_id'];
				$usr['roles'] = $this->getRole($userid);
				return $usr;
			} else
			{
				return NULL;
			}
		}

		function getUsers()
		{
			$users = $this->getUsersStmt->process();
			if( is_array($users) )
			if( sizeof($users) > 0)
			foreach( $users as $k=>$v )
			{
				$users['login'] = $users['login_id'];
				$users['roles'] = $this->getRole($userid);
			}
			return $users;
		}

        function getPassFormat()
		{
			$property = 'use_md5';
			$value = 'yes';
			if(($rs = $this->getSiteStmt->process($property, $value)) && ($rec = $rs->next()))
			{
				$this->passFormat = 'md5(?)';
			} else
			{
				$this->passFormat = '?';
			}
			return $this->passFormat;
		}

		function getRole($userid)
		{
			if($userid)
			{
				$rt = $this->getUserStmt->process($userid);
				$usr = $rt->next();
				$grpid = $usr['group_id'];
				$disa = 'cm_backup';
				$dism = 'cm_users';
				if(($rt2 = $this->getGrpPerm->process($grpid,$disa)) && ($rec = $rt2->next()))
				{
					$this->userrole = ROLE_ADMIN;
				} else
				{
					if(($rt3 = $this->getGrpPerm->process($grpid,$dism)) && ($rec2 = $rt3->next()))
					{
						$this->userrole = ROLE_MODERATOR;
					} else
					{
						$this->userrole = ROLE_USER;
					}
				}
			}
			return $this->userrole;
		}

		function userInRole($userid, $role)
		{
			if($user = $this->getUser($userid))
			{
				if($role == ROLE_ADMIN)
				{
					if($role == $this->getRole($userid)) return true;
					else return false;
				}

				if($role == ROLE_MODERATOR)
				{
					if($role == $this->getRole($userid)) return true;
					else return false;
				}

				if($role == ROLE_USER)
				{
					return true;
				}
			}
			return false;
		}
	}

	$GLOBALS['fc_config']['db'] = array(
						'host' => DB_HOST,
						'user' => DB_USER,
						'pass' => DB_PASS,
						'base' => DB_NAME,
						'pref' => DB_PREFIX . '_fc_',//DB_PREFIX
						);
	$GLOBALS['fc_config']['cms'] = new easysiteCMS();
	foreach($GLOBALS['fc_config']['languages'] as $k => $v)
	{
		$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
	}
?>