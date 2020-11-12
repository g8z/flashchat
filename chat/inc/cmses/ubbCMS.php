<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

// integration class for UBB.Threads (www.ubbcentral.com/ubbthreads/)


$ubb_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';

require_once($ubb_root_path . 'includes/config.inc.php');

class UBBCMS {

    function UBBCMS() {

        $this->loginStmt = new Statement("SELECT U_Username, U_Laston, U_Password,U_Number,U_Language,U_TempPass,U_Approved,U_Banned,U_CoppaUser FROM   {$GLOBALS['config']['tbprefix']}Users WHERE  U_LoginName = ? LIMIT 1");
        $this->updateSessionStmt = new Statement("UPDATE {$GLOBALS['config']['tbprefix']}Users SET    U_Laston   = ?, U_SessionId = ? WHERE  U_Username = ?");
        $this->getUserStmt = new Statement("SELECT U_Username as login, U_Number as id, U_Status as status FROM {$GLOBALS['config']['tbprefix']}Users WHERE  U_Number = ? LIMIT 1");
        $this->getUsersStmt = new Statement("SELECT U_Username as login, U_Number as id FROM {$GLOBALS['config']['tbprefix']}Users");
        $this->userid = isset($_COOKIE["w3t_myid"]) ? $_COOKIE["w3t_myid"] : NULL;
    }

    function isLoggedIn() {
        return $this->userid;
    }

    function getRoles($status) {
        $rv = NULL;

        if ($status == "Administrator" || $status == "Moderator")
            $rv = ROLE_ADMIN;
        elseif ($status == "User")
            $rv = ROLE_USER;
        else
            $rv = ROLE_SPY;

        return $rv;
    }

    function getUserProfile($userid) {

        if ($userid == SPY_USERID) $rv = NULL;

        elseif ($user = $this->getUser($userid)) {
            $rv = ($id = $this->isLoggedIn() && ($id == $userid)) ? $GLOBALS["config"]["phpurl"] . "/login.php?Cat=0&myhome=1" : $GLOBALS["config"]["phpurl"] . "/showprofile.php?Cat=0&User={$userid}";
        }

        return $rv;
    }


    function getUser($userid) {

        $rs = $this->getUserStmt->process($userid);
        $rv = $rs->next();

        if($rv) {
            $rv["roles"] = $this->getRoles($rv["status"]);
        }
        return $rv;
    }

    // taken from ubbt.inc.php

    function ubbt_setcookie($name,$value="",$time=0,$cookiepath="") {

        if (!$cookiepath) {
            $cookiepath = $GLOBALS['config']['cookiepath'];
            if ($GLOBALS['config']['search_urls'] && !$cookiepath) {
                $cookiepath = "/";
            }
        }
        if (($GLOBALS['config']['tracking'] == "cookies") || ($name == "{$GLOBALS['config']['tbprefix']}ubbt_pass") || ($name == "{$GLOBALS['config']['tbprefix']}ubbt_dob")) {
            setcookie("$name","$value",$time,$cookiepath);
        }
        else {
            session_register($name);
            $name = $value;
        }

    }

    function login($login, $password) {

        $goodPassword = false;

        $rs = $this->loginStmt->process(addslashes($login));
        $rec = $rs->next();

        if ($rec) {
            // check if user is banned
            if ($rec["U_Banned"]) return NULL;

            // allow login only with permanent password. Ignore the temporary password
            if (md5($password) != $rec["U_Password"]) return NULL;

            if (!$rec["U_Laston"]) {
                $laston = time() + $GLOBALS["config"]["adjustime"] * 3600;
            }
            $this->ubbt_setcookie("{$GLOBALS['config']['cookieprefix']}w3t_myid",$rec['U_Number'],time()+$GLOBALS['config']['cookieexp']);

            $this->updateSessionStmt->process(time() + $GLOBALS["config"]["adjustime"] * 3600, md5(rand(0,32767)), addslashes($login));


            return $rec['U_Number'];

        }

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
        return $this->getUsersStmt->process();
    }

	function getGender($userid) {
        // 'M' for Male, 'F' for Female, NULL for undefined
        return NULL;
    }
}

$GLOBALS['fc_config']['db'] = array(
                'host' => $GLOBALS["config"]["dbserver"],
                'user' => $GLOBALS["config"]["dbuser"],
                'pass' => $GLOBALS["config"]["dbpass"],
                'base' => $GLOBALS["config"]["dbname"],
                'pref' => $GLOBALS["config"]["tbprefix"] . 'fc_',
                );

$GLOBALS['fc_config']['cms'] = new UBBCMS();


foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
    $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>