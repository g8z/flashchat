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

		var $constArr;
		//-----------------------------------------------------------------------------------------
		function DefaultCMS()
		{

			$this->constArr = array(
					  'users'       =>'%users%',
					  'login'       =>'%login%',
					  'id'          =>'%id%',
					  'password'    =>'%password%',
					  'roles'       =>'%roles%',
					  'encode_type' =>'%encode_type%',
					  'spy_fld'     =>'%spy_fld%',
					  'spy_value'   =>'%spy_value%',
					  'profile_path'=>'%profile_path%',
					  'profile_arg' =>'%profile_arg%',
					  'admin_fld'=>'%admin_fld%',
					  'admin_value'=>'%admin_value%',
					  'logoff'		=>'%logoff%',
					  'moderator_fld'=>'%moderator_fld%',
					  'moderator_value'=>'%moderator_value%',
			);

			$this->loginStmt    = new Statement("SELECT * FROM {$this->constArr['users']} WHERE {$this->constArr['login']}=? LIMIT 1");
			$this->getUserStmt  = new Statement("SELECT * FROM {$this->constArr['users']} WHERE {$this->constArr['id']}=? LIMIT 1");
			$this->addUserStmt  = new Statement("INSERT   INTO {$this->constArr['users']} ({$this->constArr['login']}, {$this->constArr['password']}) VALUES(?, ?)");
			$this->getUsersStmt = new Statement("SELECT * FROM {$this->constArr['users']} ORDER BY {$this->constArr['login']}");
			$this->delStmt      = new Statement("DELETE FROM {$this->constArr['users']} WHERE {$this->constArr['login']}=?");
		}
		//-----------------------------------------------------------------------------------------
		function isLoggedIn()
		{
			return $this->userid;
		}
		//-----------------------------------------------------------------------------------------
		function login($login, $password)
		{
			$this->userid = null;

			if($login && $password)
			{
				$encode_type = $this->constArr['encode_type'];
				$pass = $password;

				switch( $encode_type )
				{
					case 'md5' : $pass = md5($password); break;
					default    : $pass = $password; break;
				}

				//Try to find user using provided login
				if(($rs = $this->loginStmt->process($login)) && ($rec = $rs->next()))
				{
					if($rec[$this->constArr['password']] == $pass)
					{
						$this->userid = $rec[$this->constArr['id']];
					}
				}
				else
				{
					//If not - autocreate user with such login and password
					if($this->autocreateUsers)
					{
						//$roles = ($password == $GLOBALS['fc_config']['adminPassword'])?ROLE_ADMIN:($GLOBALS['fc_config']['liveSupportMode']?ROLE_CUSTOMER:ROLE_USER);
						$ins = $this->addUserStmt->process($login, $pass);

						if( $ins != null && $ins == 0 )
						{	//we not know if id field is autoincrement
							$this->userid = login($login, $password);
						}
						elseif($ins != null)
						{
							$this->userid = $ins;
						}
					}
				}
			}
			return $this->userid;
		}
		//-----------------------------------------------------------------------------------------
		function logout()
		{
			if($this->constArr['logoff'] == 'true') $this->user = null;
		}
		//-----------------------------------------------------------------------------------------
		function getUser($userid)
		{
			if($userid)
			{
				$rs = $this->getUserStmt->process($userid);
				$usr = $rs->next();
				$usr['login'] = $usr[$this->constArr['login']];//important!
				//$usr['roles'] = $usr[$this->constArr['moderator_fld']] == $this->constArr['moderator_value'] ? ROLE_ADMIN : ($usr[$this->constArr['spy_fld']] == $this->constArr['spy_value'] ? ROLE_SPY : ROLE_USER);

				return $usr;
			}
			else
			{
				return null;
			}
		}
		//-----------------------------------------------------------------------------------------
		function getUsers()
		{
			$users = $this->getUsersStmt->process();
			foreach($users as $k => $v)
			{
				$users['login'] = $users[$this->constArr['login']];//important!
				//$users['roles'] = $users[$this->constArr['moderator_fld']] == $this->constArr['moderator_value'] ? ROLE_ADMIN : ($users[$this->constArr['spy_fld']] == $this->constArr['spy_value'] ? ROLE_SPY : ROLE_USER);
			}

			return $users;
		}
		//-----------------------------------------------------------------------------------------
		function getUserProfile($userid)
		{
			$spy_fld = $this->constArr['spy_fld'];
			$spy_val = $this->constArr['spy_value'];

			$user = $this->getUser($userid);

			if( $spy_fld != '' )
			{
				if( $user[$spy_fld] == $spy_val ) return null;
			}

			extract($user);

			return "{$this->constArr['profile_path']}?user={$id}";
		}
		//-----------------------------------------------------------------------------------------
		function userInRole($userid, $role)
		{
			if($user = $this->getUser($userid))
			{
				if($role == ROLE_ADMIN)
				{
					if($user[$this->constArr['admin_fld']] == $this->constArr['admin_value'])
					{
						return true;
					}
					else
					{
						return false;
					}
				}

				if($role == ROLE_MODERATOR)
				{
					if($user[$this->constArr['moderator_fld']] == $this->constArr['moderator_value'])
					{
						return true;
					}
					else
					{
						return false;
					}
				}

				if($role == ROLE_SPY)
				{
					if($user[$this->constArr['spy_fld']] == $this->constArr['spy_value'])
					{
						return true;
					}
					else
					{
						return false;
					}
				}

				if($role == ROLE_USER)
				{
					return true;//???
				}
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
			return $this->addUserStmt->process($login, $password);
		}

		function deleteUser($login){
			$this->delUserStmt->process($login);
		}
	}

	$GLOBALS['fc_config']['cms'] = new DefaultCMS();

	//clear 'if moderator' message
	foreach($GLOBALS['fc_config']['languages'] as $k => $v)
	{
		$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
	}
?>