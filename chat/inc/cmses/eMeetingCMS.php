<?php
############################################################
#   		eMeeting Dating / Community Software
############################################################
	class eMeetingCMS {
		var $userid;
		var $loginStmt;
		var $getUserStmt;
		var $getUsersStmt;
		//-----------------------------------------------------------------------------------------
		function eMeetingCMS()
		{
			$this->loginStmt    = new Statement('SELECT userid, username, password FROM frm_users WHERE username=?');
			$this->getUserStmt  = new Statement('SELECT userid, username AS username, password, gender AS gender FROM frm_users WHERE userid=?');
			$this->getUsersStmt = new Statement('SELECT userid, username, password FROM frm_users ORDER BY username');
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
				if(($rs = $this->loginStmt->process($login)) && ($rec = $rs->next()))
				{
					if($rec['password'] == md5($password)) $this->userid = $rec['userid'];
				}
			}
			return $this->userid;
		}
		//-----------------------------------------------------------------------------------------
		function logout(){}
		//-----------------------------------------------------------------------------------------
		function getUser($userid)
		{
			if($userid)
			{
				$rs = $this->getUserStmt->process($userid);
				$usr = $rs->next();
				$usr['login'] = $usr['username'];
				$usr['roles'] = $usr['userid'] == 1 ? ROLE_ADMIN : ROLE_USER;
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
			$rv = $this->getUsersStmt->process();
       		return $rv;
		}
		//-----------------------------------------------------------------------------------------
		function getUserProfile($userid)
		{
			return 'http://'.$_SERVER['HTTP_HOST'].'/p.php?id='.$userid;
		}
		//-----------------------------------------------------------------------------------------
		function userInRole($userid, $role)
		{
			if($user = $this->getUser($userid))
			{
				if($role == ROLE_ADMIN)
				{
					if( $user['userid'] == 1) return true;
					else return false;
				}
				if($role == ROLE_USER)
				{
					return true;
				}
			}
			return false;
		}

		function getGender($userid) {
			$rv = NULL;
			if ($u = $this->getUser($userid)) {
				if ($u['gender'] == 1) $rv = 'M';
				else $rv = 'F';
			}
			return $rv;
	    }
	}
	$GLOBALS['fc_config']['cms'] = new eMeetingCMS();
	foreach($GLOBALS['fc_config']['languages'] as $k => $v)
	{
		$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
	}
?>

