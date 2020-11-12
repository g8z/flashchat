<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

// integration class for WotLab Burning Board

// chdir hack for allowing wotlab global.php to include files
$curdir = getcwd();
$wbb_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';
chdir($wbb_root_path);
require_once($wbb_root_path . 'global.php');
include($wbb_root_path . 'acp/lib/config.inc.php');
//require_once($wbb_root_path . 'acp/lib/options.inc.php');
chdir($curdir);
// endofhack


$pu = parse_url($GLOBALS['url2board']);
$GLOBALS['cookiepath'] = $pu['path'] . '/';

class WBBCMS {

    function WBBCMS() {
        $this->userid = isset($_COOKIE['wbb2_userid']) ? $_COOKIE['wbb2_userid'] : null;
    }

    function isLoggedIn() {

        return $this->userid;
    }

    function getUserProfile($userid) {
        global $CFG;

        if ($userid == SPY_USERID) $rv = NULL;
        elseif ($this->userid == $userid)
			$rv = $GLOBALS['url2board'].'/usercp.php?sid='.$_COOKIE[$GLOBALS['cookieprefix'].'cookiehash'];
        else
			$rv = $GLOBALS['url2board'].'/profile.php?userid='.$userid;

        return $rv;
    }

    function getUser($userid) {

        $rv = NULL;

        $u = getwbbuserdata($userid);

        if ($u) {
            $rv['id'] = $u['userid'];
            $rv['login'] = $u['username'];
            $rv['roles'] = $this->getRoles($u);
        }

        return $rv;
    }

    function getRoles($userdata) {
        $rv = ROLE_USER;

        if ($userdata['a_can_users_delete']) $rv = ROLE_ADMIN;

        return $rv;
    }

    function login($login, $password) {

        global $db, $session, $sid, $n;

        $rv = NULL;

        $result = getwbbuserdata($login, 'username');
        $wbbuserpassword = $result['password'];

        if ($result['userid'] && $wbbuserpassword == md5($password)) {
            if ($result['usecookies'] == 1) {

                setcookie($GLOBALS['cookieprefix'].'userid', $result['userid'], time() + 3600 * 24 * 365, $GLOBALS['cookiepath']);
                setcookie($GLOBALS['cookieprefix'].'userpassword', $wbbuserpassword, time() + 3600 * 24 * 365, $GLOBALS['cookiepath']);


            }
            $db->unbuffered_query('DELETE FROM bb'.$n.'_sessions WHERE userid = \''.$result['userid'].'\'', 1);
            $db->unbuffered_query('UPDATE bb'.$n.'_sessions SET userid = \''.$result['userid'].'\', authentificationcode=\'\', styleid=\''.$result['styleid'].'\' WHERE sessionhash = \'$sid\'', 1);
            unset($session['authentificationcode']);

            $rv = $result['userid'];
        }

        return $rv;


    }

	function userInRole($userid, $role) {
		if($user = $this->getUser($userid)) {
			return ($user['roles'] == $role);
		}
		return false;
	}

    function logout() {

    }

    function getUsers() {

    }

	function getGender($userid){
		// 'M' for Male, 'F' for Female, NULL for undefined
		return NULL;
	}
}

$GLOBALS['fc_config']['db'] = array(
                'host' => $GLOBALS['sqlhost'],
                'user' => $GLOBALS['sqluser'],
                'pass' => $GLOBALS['sqlpassword'],
                'base' => $GLOBALS['sqldb'],
                'pref' => 'bb'.$GLOBALS['n'].'_fc_',
                );

$GLOBALS['fc_config']['cms'] = new WBBCMS();

foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
    $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>