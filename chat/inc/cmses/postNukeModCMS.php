<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

	$old = ini_get('include_path');

	ini_set('include_path', realpath(dirname(__FILE__) . '/../../../../'));

	include_once('includes/pnAPI.php');
	pnInit();

	ini_set('include_path', $old);

	class PNUsersRS {
		var $result;
		var $numRows = 0;
		var $currRow = 0;

		function PNUsersRS($result = null) {
			$this->result = array_values($result);
			if($result) $this->numRows = sizeof($result);
		}

		function hasNext() {
			return ($this->result && ($this->numRows) > $this->currRow);
		}

		function next() {
			if($this->hasNext()) {
				return array(
					'id' => $this->result[$this->currRow]['uid'],
					'login' => $this->result[$this->currRow++]['uname']
				);
			} else {
				return null;
			}
		}
	}

	class PostNukeCMS {
		function PostNukeCMS() {
		}

		function isLoggedIn() {
			return pnUserLoggedIn()?pnUserGetVar('uid'):null;
		}

		function login($login, $password) {
		    if(pnUserLogIn($login, $password, 0)) return pnUserGetVar('uid');

			return null;
		}

		function logout(){
			//pnUserLogOut();
		}

		function getUser($userid) {
			$u = null;

		    if(pnUserGetVar('uid', $userid)) {
				$u = array(
					'id' => $userid,
					'login' => pnUserGetVar('uname', $userid)
				);

				$u['roles'] = $GLOBALS['fc_config']['liveSupportMode']?ROLE_CUSTOMER:ROLE_USER;
			    if(pnSecAuthAction(0, 'Modules::', '::', ACCESS_ADMIN)) $u['roles'] = ROLE_ADMIN;
			}

			return $u;
		}

		function getUsers() {
			return new PNUsersRS(pnUserGetAll());
		}

		function getUserProfile($userid) {
			if($userid == SPY_USERID) return null;

			if($user = $this->getUser($userid)) {
				return (($id = $this->isLoggedIn()) && ($id == $userid))?'../../user.php?op=edituser':'../../user.php?op=userinfo&uname='.$user['login'];
			} else {
				return null;
			}
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

		function getPhoto($userid)
		{
			$dbconn =& pnDBGetConn(true);
            if (is_array($dbconn)) $dbconn = $dbconn[0];
            $pntable =& pnDBGetTables();
            $usertable = $pntable['users'];
			$usertablecolumn = &$pntable['users_column'];

	        // Get user avatar data
            $query = "SELECT $usertablecolumn[user_avatar]
                      FROM $usertable
                      WHERE $usertablecolumn[uid] = ".$userid."
					  LIMIT 1";

            $result =& $dbconn->Execute($query);
			$avatar = $result->fields[0];

			if($avatar == null || strcmp($avatar, '') == 0)
				return '';

			return '../images/avatar/'.$avatar;
		}
	}

	$GLOBALS['fc_config']['cms'] = new PostNukeCMS();

	$GLOBALS['fc_config']['base'] = 'modules/FlashChat/';

	//clear 'if moderator' message
	foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
		$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
	}
?>