<?php

	if ( !defined( 'INC_DIR' ) ) {
		die( 'hacking attempt' );
	}

/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

// integration class for UBB.Threads (www.ubbcentral.com/ubbthreads/)


$ubb_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';
if( is_file($ubb_root_path . 'includes/config.inc.php') )
require_once($ubb_root_path . 'includes/config.inc.php');

class UBBCMS {
var $loginStmt;
var $updateSessionStmt;
var $getUserStmt;
var $getUsersStmt;
var $userid;
    function UBBCMS() {

        $this->loginStmt = new Statement("SELECT USER_DISPLAY_NAME, USER_MEMBERSHIP_LEVEL, USER_PASSWORD,USER_IS_APPROVED,USER_IS_BANNED,USER_ID FROM   {$GLOBALS['config']['TABLE_PREFIX']}users WHERE  USER_LOGIN_NAME = ? LIMIT 1");
        //$this->updateSessionStmt = new Statement("UPDATE {$GLOBALS['config']['TABLE_PREFIX']}users SET    U_Laston   = ?, U_SessionId = ? WHERE  USER_DISPLAY_NAME = ?");
        $this->getUserStmt = new Statement("SELECT USER_LOGIN_NAME as login, USER_MEMBERSHIP_LEVEL as status FROM {$GLOBALS['config']['TABLE_PREFIX']}users WHERE  USER_ID = ? LIMIT 1");
        $this->getUsersStmt = new Statement("SELECT USER_LOGIN_NAME as login, USER_ID as id FROM {$GLOBALS['config']['TABLE_PREFIX']}users");

		$this->userid = isset($_COOKIE["ubbt_myid"]) ? $_COOKIE["ubbt_myid"] : NULL;
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

        elseif ($user = $this->getUser($userid))
		{
			$id = $this->isLoggedIn();

			if( $id && ($id == $userid) )
			{
				$rv = $GLOBALS["config"]["FULL_URL"] . "/ubbthreads.php?ubb=showprofile&User={$userid}";
			}
			else
			{
				$rv = $GLOBALS["config"]["FULL_URL"] . "/ubbthreads.php?ubb=login";
			}

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



    function login($login, $password) {

        $goodPassword = false;

        $rs = $this->loginStmt->process(addslashes($login));
        $rec = $rs->next();

        if ($rec) {
            // check if user is banned
            if ($rec["USER_IS_BANNED"]) return NULL;

            // allow login only with permanent password. Ignore the temporary password
            if (md5($password) != $rec["USER_PASSWORD"]) return NULL;

            // $this->ubbt_setcookie("{$GLOBALS['config']['cookieprefix']}w3t_myid",$rec['U_Number'],time()+$GLOBALS['config']['cookieexp']);

           // $this->updateSessionStmt->process(time() + $GLOBALS["config"]["adjustime"] * 3600, md5(rand(0,32767)), addslashes($login));


            return $rec['USER_ID'];

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

if( is_file($ubb_root_path . 'includes/config.inc.php') )
{
$GLOBALS['fc_config']['db'] = array(
                'host' => $GLOBALS["config"]["DATABASE_SERVER"],
                'user' => $GLOBALS["config"]["DATABASE_USER"],
                'pass' => $GLOBALS["config"]["DATABASE_PASSWORD"],
                'base' => $GLOBALS["config"]["DATABASE_NAME"],
                'pref' => $GLOBALS["config"]["TABLE_PREFIX"] . 'fc_',
                );
}
else
{
		$GLOBALS['fc_config']['db'] = array(
                 'host' => "",
                 'user' => "",
                 'pass' => "",
                 'base' => "",
                 'pref' => "",
                 );
}
if( is_file($ubb_root_path . 'includes/config.inc.php') )
	$GLOBALS['fc_config']['cms'] = new UBBCMS();


foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
    $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>