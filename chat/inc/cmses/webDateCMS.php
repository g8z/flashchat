<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

// (safe) assumption: no members table will grow longer than 65535 users
// if dt_members has > 65535 records, increase this constant
define("USERS_BIAS", 65535);

$webdate_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';
$curdir = getcwd();

chdir($webdate_root_path);
require $webdate_root_path . "engine/load_configuration.pml";
chdir($curdir);


class WebDateCMS {

    var $userid;
    var $loginStmt;
    var $getUserStmt;
    var $getUsersStmt;

    function WebDateCMS() {

      $this->loginStmt = new Statement("SELECT id, login, pswd as password FROM dt_members WHERE login=? AND pswd=?");
      $this->loginAdminStmt = new Statement("SELECT id, login, pswd AS password, admin_rights FROM webDate_bd_users WHERE login=? and pswd=?");

      $this->getUserStmt = new Statement("SELECT m.id AS id, m.login as login, m.gender as gender, p.id as profile_id FROM dt_members m LEFT JOIN dt_profile p ON m.id = p.member_id WHERE m.id=?");
      $this->getAdminUserStmt = new Statement("SELECT id, login, admin_rights FROM webDate_bd_users WHERE id=?");

      $this->getUsersStmt = new Statement("SELECT m.id AS id, m.login as login, m.gender as gender, p.id as profile_id FROM dt_members m LEFT JOIN dt_profile p ON m.id = p.member_id");
      $this->getAdminUsersStmt = new Statement("SELECT id, login FROM webDate_bd_users");


      $this->userid = NULL;

      if (isset($_COOKIE['sAuth'])) {
        $this->userid = intval($_COOKIE['sAuth']);
      }
      elseif (isset($_COOKIE["bd3Auth"]) && is_numeric($_COOKIE["bd3Auth"])) {
      	$this->userid = intval($_COOKIE["bd3Auth"]) + USERS_BIAS;
      }
      elseif (isset($_COOKIE["hcAdmin"])) {
      	$a = base64_decode(unserialize($_COOKIE["hcAdmin"]));
      	$this->userid = ($a[1] == $GLOBALS["admin_login"] && $a[2] == $GLOBALS["admin_pswd"]) ? $a[0] : NULL;
      }

    }


    function isLoggedIn() {
        return $this->userid;
    }

    function getRoles($group) {
        $rv = NULL;

        if ($group == 1)
            $rv = ROLE_ADMIN;
        elseif ($GLOBALS['fc_config']['liveSupportMode'])
          $rv = ROLE_CUSTOMER;
        else
          $rv = ROLE_USER;

        return $rv;

    }

    function getUserProfile($userid) {

		if ($userid > USERS_BIAS) return NULL;

        if ($userid == SPY_USERID) $rv = NULL;
        elseif ($user = $this->getUser($userid)) {
          if ($user == $this->isLoggedIn()) {
          	$rv = $GLOBALS['root_host'] . 'index.php?page=my_profile';
          }
          elseif ($user['profile_id']) { // $user[profile_id] might be null
          	$rv = $GLOBALS['root_host'] . 'index.php?page=view_profile&id='.$user["profile_id"];
          }
        }
        else $rv = NULL;

        return $rv;
    }


    function getUser($userid) {

      if ($userid == SPY_USERID) return NULL;

      $rv = NULL;


      if (($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next())) {
        $rec['roles'] = 0;
        $rv = $rec;
      }
      elseif ($userid > USERS_BIAS) {
      	$userid -= USERS_BIAS;
        if  (($rs = $this->getAdminUserStmt->process($userid)) && ($rec = $rs->next())) {
      		$rv = $rec;
      		$rv['roles'] = $this->getRoles($rec['admin_rights'] ? 1 : 0);
      	}
      }
      elseif ($userid == USERS_BIAS) {
      	$rv = array("id" => USERS_BIAS, "login" => $GLOBALS['admin_login'], "roles" => ROLE_ADMIN);
      }
      return $rv;
    }

    function login($login, $password) {

      $rv = NULL;

      if (($rs = $this->loginStmt->process($login, $password)) && ($rec = $rs->next())) {
        $cookie_value = $rec['id'];
        setcookie("sAuth", $cookie_value, time() + 3600*3, "/", "", "0");
        $rv = $rec['id'];
      }
      elseif (($rs = $this->loginAdminStmt->process($login, base64_encode($password))) && ($rec = $rs->next())) {
      	$cookie_value = $rec['id'];
      	setcookie("bd3Auth", $cookie_value, time() + 3600*3, "/", "", "0");
      	$rv = $rec['id'] + USERS_BIAS;
      }
      elseif($login == $GLOBALS['admin_login'] && $password == base64_decode($GLOBALS['admin_pswd'])) {
      	$cookie_value = base64_encode(serialize(array($login, $password)));
      	setcookie("hcAdmin", $cookie_value, time() + 3600*3,"/", "", "0");
      	$rv = USERS_BIAS;
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
        $rv = $this->getUsersStmt->process();
        return $rv;
    }

    function getGender($userid) {
    	$rv = NULL;
    	if ($u = $this->getUser($userid)) {
    		if ($u['gender'] == 'Male') $rv = 'M';
    		elseif ($u['gender'] == 'Female') $rv = 'F';
    	}
    	return $rv;
    }
  }




$GLOBALS['fc_config']['db'] = array(
    'host' => $GLOBALS['db_host'],
    'user' => $GLOBALS['db_login'],
    'pass' => $GLOBALS['db_pswd'],
    'base' => $GLOBALS['db_name'],
    'pref' => "fc_",
    );


$GLOBALS['fc_config']['cms'] = new WebDateCMS();


foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
    $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>