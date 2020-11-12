<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

// integration class for Moodle (www.moodle.org)
// written by Manuel Aristaran <masterson@diosmilanesa.com.ar>

$config_temp = $GLOBALS['fc_config'];

$moodle_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';

include($moodle_root_path . 'config.php');

$GLOBALS['fc_config'] = $config_temp;

class MoodleCMS {

    function MoodleCMS() {

        global $USER, $fp, $moodle_root_path;
        $this->userid = !empty($USER) ? $USER->id : NULL;
        $this->user = !empty($USER) ? $USER : NULL;
    }

    function isLoggedIn() {
        global $fp;

        return $this->userid;
    }

    function getRoles($user) {
        $rv = NULL;

        if ($admins = get_records('user_admins', 'userid', $user->id))
            $rv = ROLE_ADMIN;
        else
            $rv = ROLE_USER;

        return $rv;
    }

    function getUserProfile($userid) {
        global $CFG;

        if ($userid == SPY_USERID) $rv = NULL;

        elseif ($user = $this->getUser($userid)) {
            $rv = $CFG->wwwroot.'/user/view.php?id='.$userid.'&course=1';
        }

        return $rv;
    }


    function getUser($userid) {

        global $fp;

        $rv = NULL;

        $u = get_user_info_from_db('id', $userid);

        if($u) {
            $rv['roles'] = $this->getRoles($u);
            $rv['id'] = $u->id;
            $rv['login'] = $u->username;

        }
        return $rv;
    }

    function login($login, $password) {
        $u = authenticate_user_login($login, $password);
        if ($u) {
            set_moodle_cookie($u->username);
            return $u->id;
        }
    }

	function userInRole($userid, $role) {
		if($user = $this->getUser($userid)) {
			return ($user['roles'] == $role);
		}
		return false;
	}

    function logout() {
		set_moodle_cookie('');
    }

    function getUsers() {
        $rv = array();
        foreach(get_users() as $u) {
            $t['roles'] = $this->getRoles($u);
            $t['login'] = $u->username;
            $t['id'] = $u->id;
            $rv[] = $t;
        }
        return $rv;
    }

	function getGender($userid) {
        // 'M' for Male, 'F' for Female, NULL for undefined
        return NULL;
    }
}


$GLOBALS['fc_config']['db'] = array(
                'host' => $CFG->dbhost,
                'user' => $CFG->dbuser,
                'pass' => $CFG->dbpass,
                'base' => $CFG->dbname,
                'pref' => $CFG->prefix.'fc_',
                );



$GLOBALS['fc_config']['cms'] = new MoodleCMS();


foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
    $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>