<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

// integration class for WOW Bulletin Board (www.wowbb.com)
// written by Manuel Aristaran <masterson@diosmilanesa.com.ar>

$wow_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';

require_once($wow_root_path . 'config.php');
require_once($wow_root_path . 'lib.php');
require_once($wow_root_path . 'lib2.php');
require_once($wow_root_path . '/file_systems/' . FILE_SYSTEM . '/main.php');

class WOWCMS {

    function WOWCMS() {

        $this->userid = NULL;
        $this->user = NULL;

        if (isset($_COOKIE[COOKIE_NAME])) {

            $userCookie = parse_cookie();
            $user = look_up_user(0, $userCookie['user_name']);
            if ($user)
                $this->user = $user[0];
                $this->userid = $this->user['user_id'];
        }

    }

    function isLoggedIn() {
        return $this->userid;
    }

    function getRoles($user) {
//        $rv = NULL;
         $rv = ROLE_USER;

        if ($user[user_super_moderator_rights])
        {
         $rv = ROLE_MODERATOR;
        }

        if ($user[user_admin_rights])
        {
         $rv = ROLE_ADMIN;
        }

        return $rv;
    }

    function getUserProfile($userid) {

        if ($userid == SPY_USERID) $rv = NULL;

        elseif ($user = $this->getUser($userid)) {
            $rv = ($id = $this->isLoggedIn() && ($id == $userid)) ? 'http://'.$_SERVER[HTTP_HOST].BASE_DIR.'/my_account.php' : 'http://'.$_SERVER[HTTP_HOST].BASE_DIR.'/view_user.php?id='.$userid;
        }

        return $rv;
    }


    function getUser($userid) {
        $rv = NULL;

		if ($userid) {
			  $u = get_user($userid);

			  if($u) {
				  $rv['roles'] = $this->getRoles($u);
				  $rv['id'] = $u['user_id'];
				  $rv['login'] = $u['user_name'];
			  }

			}

		return $rv;
    }

    function login($login, $password) {
        $userInfo = array();
        $userInfo['user_name'] = $login;
        $userInfo['user_password'] = md5($password);

        if (!$u = validate_user($userInfo))
            return NULL;

        $cookie = parse_cookie();
        $cookie['user_name']     = $u['user_name'];
        $cookie['user_password'] = $u['user_password'];
        set_cookie($cookie);

        user_logged_in($u['user_password'], $u);

        return $u['user_id'];
    }

    function userInRole($userid, $role) {

        $rv = NULL;

        if($user = $this->getUser($userid)) {
            $rv = (($user['roles'] & $role) != 0);
        }

        return $rv;

    }

    function logout() {

    }

    function getUsers() {
        $rv = array();
        foreach(look_up_user(0,'') as $u) {
            $t['roles'] = $this->getRoles($u);
            $t['login'] = $u['user_name'];
            $t['id'] = $u['user_id'];
            $rv[] = $t;
        }
        return $rv;
    }

	function getGender($userid){
		// 'M' for Male, 'F' for Female, NULL for undefined
		return NULL;
	}
}

$GLOBALS['fc_config']['db'] = array(
                'host' => DB_HOST,
                'user' => DB_USER_NAME,
                'pass' => DB_PASSWORD,
                'base' => DB_NAME,
                'pref' => FILE_SYSTEM.'_fc_',
                );

$GLOBALS['fc_config']['cms'] = new WOWCMS();


foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
    $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>