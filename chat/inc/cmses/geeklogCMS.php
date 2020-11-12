<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

$gl_path = realpath(dirname(__FILE__) . '/../../../') . '/';
include($gl_path . 'lib-common.php');


class GeekLogCMS {
	function GeekLogCMS() {
		$this->dummy = NULL;
	}

	// See if user is logged in. Works
	function isLoggedIn() {
		//global $_USER;
		global $_CONF;

		//return $_USER ? $_USER['uid'] : null;
		return isset($_COOKIE[$_CONF['cookie_name']]) ? $_COOKIE[$_CONF['cookie_name']] : NULL;
	}


	// performs user login using provided login and password, return logged in user id, otherwise returns null

	function login($login, $password) {
		global $_USER, $_CONF, $_TABLES;
		if (COM_getPassword($login) == md5($password)) {

			DB_change($_TABLES['users'],'pwrequestid',"NULL",'username',$login);
			$_USER=SESS_getUserData($login);
			$sessid = SESS_newSession($_USER['uid'], $REMOTE_ADDR, $_CONF['session_cookie_timeout'], $_CONF['cookie_ip']);
			SESS_setSessionCookie($sessid, $_CONF['session_cookie_timeout'], $_CONF['cookie_session'], $_CONF['cookie_path'], $_CONF['cookiedomain'], $_CONF['cookiesecure']);

			if (!isset($HTTP_COOKIE_VARS[$_CONF["cookie_name"]]) || !isset($HTTP_COOKIE_VARS['password'])) {
				$cooktime = COM_getUserCookieTimeout();
				if ($cooktime > 0) {
					setcookie ($_CONF['cookie_name'], $_USER['uid'],time() + $cooktime, $_CONF['cookie_path'], $_CONF['cookiedomain'],$_CONF['cookiesecure']);
					setcookie ($_CONF['cookie_password'], md5($password),time() + $cooktime,$_CONF['cookie_path'],$_CONF['cookiedomain'], $_CONF['cookiesecure']);
				}
			} else {
				$userid = $HTTP_COOKIE_VARS[$_CONF['cookie_name']];
				if (empty ($userid) || ($userid == 'deleted')) {
					unset ($userid);
				} else {
					if ($userid) {
						$user_logged_in = 1;
						// Create new session
						$userdata = SESS_getUserDataFromId($userid);
						$_USER = $userdata;
					}
				}
			}
			setcookie ($_CONF['cookie_theme'], $_USER['theme'], time() + 31536000,$_CONF['cookie_path'], $_CONF['cookiedomain'],$_CONF['cookiesecure']);
			return $_USER['uid'];
		}
		return null;
	}

	// performs logging out for actual user, Works

	function logout(){
	}

	// returns used data for provided user id. User data is an array like:
	// array(
	//      'id' => <user id>,
	//      'login' => <user login>,
	//      'roles'=> ROLE_USER for users, ROLE_ADMIN for admins, or ROLE_USER | ROLE_ADMIN if user has both roles
	// );
	// ROLE_USER and ROLE_ADMIN are constants defined in inc/common.php
	// returns null if such user is not found

	function getUser($userid) {
		global $_TABLES;
		$u = null;

		if ($userid) {

			$u['id']=$userid;

			$u['login'] = DB_getItem($_TABLES['users'],"username","uid=".$userid);
			$u['roles'] = $GLOBALS['fc_config']['liveSupportMode']?ROLE_CUSTOMER:ROLE_USER;

			$array = explode(",",SEC_getUserPermissions('',$userid));

			foreach($array as $k => $v){
				if($v == 'user.edit'){
					$u['roles'] = ROLE_ADMIN;
					break;
				}
			}

			return $u;

		}
		return null;
	}

	function getUsers() {
		global $_TABLES;
		$stmt = new Statement("SELECT uid as id, username as login FROM ".$_TABLES['users']);
		return $stmt->process();
	}

	// returns URL of user profile page for such user id or null if user not found

	function getUserProfile($userid) {
		if($userid == SPY_USERID) return null;

		global $_CONF;
		return $_CONF['site_url'] . "/users.php?mode=profile&uid=$userid";
	}

	// checks user role

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
}

$GLOBALS['fc_config']['db'] = array(
	'host' => $_DB_host,
	'user' => $_DB_user,
	'pass' => $_DB_pass,
	'base' => $_DB_name,
	'pref' => $_DB_table_prefix . 'fc_'
);

foreach($GLOBALS['fc_config']['languages'] as $k => $v) {

$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}


$GLOBALS['fc_config']['cms'] = new GeekLogCMS();

?>