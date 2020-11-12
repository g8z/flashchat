<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/


$fusion_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';

include($fusion_root_path . 'fusion_config.php');

//$fp = fopen(realpath(dirname(__FILE__))."/debug/debug".time().".txt", "w");

class FusionCMS {

    var $userid;
    var $loginStmt;
    var $getUserStmt;
    var $getUsersStmt;

    function FusionCMS() {

      $this->loginStmt = new Statement('SELECT user_id AS id, user_name AS login, user_password, user_mod, user_ban FROM '.$GLOBALS['fusion_prefix'].'users WHERE user_name=? AND user_password=? LIMIT 1');
      $this->getUserStmt = new Statement('SELECT user_id AS id, user_name AS login, user_mod AS status FROM '.$GLOBALS['fusion_prefix'].'users WHERE user_id=? LIMIT 1');
      $this->getUsersStmt = new Statement('SELECT user_id AS id, user_name as login FROM '.$GLOBALS['fusion_prefix'].'users');

      $this->userid = NULL;

      if (isset($_COOKIE['fusion_user'])) {
        $cookieValues = explode('.', $_COOKIE['fusion_user']);
        $this->userid = $cookieValues[0];

        //      fwrite($GLOBALS['fp'], "ciikies: ". print_r($_COOKIE, true));
        //      fwrite($GLOBALS['fp'], "userid: ".$this->userid);
      }

    }


    function isLoggedIn() {
        return $this->userid;
    }

    function getRoles($group) {
        $rv = NULL;

        if ($group >= 2) /* >=2 means the user is a Moderator, an Admin or a Super Admin*/
          $rv = ROLE_ADMIN;
        elseif ($GLOBALS['fc_config']['liveSupportMode'])
          $rv = ROLE_CUSTOMER;
        else /* if we branch here, the user is at least a 'Member' (user_mod >= 1) */
          $rv = ROLE_USER;

        return $rv;

    }

    function getUserProfile($userid) {

        if ($userid == SPY_USERID) $rv = NULL;

        elseif ($user = $this->getUser($userid)) {
          //$boardURL = "http://" . $_SERVER[HTTP_HOST] . "/" . fusion_root . "/";

          $boardURL = "http://" . $_SERVER[HTTP_HOST] . fusion_root;

          $rv = ($id = $this->isLoggedIn() && ($id == $userid)) ? $boardURL . "editprofile.php" : $boardURL . "profile.php?lookup=" . $userid;

          return $rv;
        }
    }


    function getUser($userid) {

      if ($userid == SPY_USERID) return NULL;

      $rv = NULL;


      if(($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next())) {
        $rec['roles'] = $this->getRoles($rec['status']);
        $rv = $rec;
      }
      return $rv;
    }

    function login($login, $password) {

      //      fwrite($GLOBALS['fp'], "login/password: " . $login."/".$password);

      if (($rs = $this->loginStmt->process($login, md5($password))) && ($rec = $rs->next())) {


        if ($rec['user_ban']) return NULL; /* user is banned from the site */

        $cookie_value = $rec['id'] . "." . md5($password);
        setcookie("fusion_user", $cookie_value, time() + 3600*3, "/", "", "0");

        return $rec['id'];

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

        $rv = $this->getUsersStmt->process();
        return $rv;

    }

	function getGender($userid) {
        // 'M' for Male, 'F' for Female, NULL for undefined
        return NULL;
    }
}

$GLOBALS['fc_config']['db'] = array(
    'host' => $GLOBALS['dbhost'],
    'user' => $GLOBALS['dbusername'],
    'pass' => $GLOBALS['dbpassword'],
    'base' => $GLOBALS['dbname'],
    'pref' => $GLOBALS['fusion_prefix']."fc_",
    );

$GLOBALS['fc_config']['cms'] = new FusionCMS();


foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
    $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>