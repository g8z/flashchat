<?php

$fusion_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';
include($fusion_root_path . 'config.php');
class FusionCMS {

    var $userid;
    var $loginStmt;
    var $getUserStmt;
    var $getUsersStmt;

    function FusionCMS() {

      $this->loginStmt = new Statement('SELECT user_id AS id, user_name AS login, user_password, user_level FROM '.DB_PREFIX.'users WHERE user_name=? AND user_password=? LIMIT 1');
      $this->getUserStmt = new Statement('SELECT user_id AS id, user_name AS login, user_level FROM '.DB_PREFIX.'users WHERE user_id=? LIMIT 1');
      $this->getUsersStmt = new Statement('SELECT user_id AS id, user_name as login FROM '.DB_PREFIX.'users');

      $this->userid = NULL;

      if (isset($_COOKIE['fusion_user'])) {
        $cookie_vars = explode('.', $_COOKIE['fusion_user']);
	    $cookie_1 = is_numeric($cookie_vars['0']) ? $cookie_vars['0'] : NULL;
        $cookie_2 = (preg_match('/^[0-9a-z]{32}$/', $cookie_vars['1']) ? $cookie_vars['1'] : '');

        $this->userid = $cookie_1;
      }

    }


    function isLoggedIn() {
        return $this->userid;
    }

    function getRoles($group) {
        $rv = ROLE_USER;

        if ($group == 101)
        {
          $rv = ROLE_USER;
        }

        if ($GLOBALS['fc_config']['liveSupportMode'] && $group == 101)
        {
          $rv = ROLE_CUSTOMER;
        }

        if ($group == 102)
        {
          $rv = ROLE_MODERATOR;
        }

        if ($group == 103)
        {
          $rv = ROLE_ADMIN;
        }

        return $rv;

    }

    function getUserProfile($userid) {

        if ($userid == SPY_USERID) $rv = NULL;

        elseif ($user = $this->getUser($userid)) {

          $rv = ($id = $this->isLoggedIn() && ($id == $userid)) ?  '../edit_profile.php' : '../profile.php?lookup=' . $userid;

          return $rv;
        }
    }


    function getUser($userid) {

      // if ($userid == SPY_USERID) return NULL;

      $rv = NULL;

      if(($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next())) {
        $rec['roles'] = $this->getRoles($rec['user_level']);
        $rv = $rec;
      }
      return $rv;
    }

    function login($login, $password) {

      if (($rs = $this->loginStmt->process($login, md5($password))) && ($rec = $rs->next())) {

       if ($rec['user_ban']) return NULL; /* user is banned from the site */

        $cookie_value = $rec['id'] . '.' . md5($password);
        setcookie('fusion_user', $cookie_value, time() + 3600*3, '/', '', '0');

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
    'host' => $GLOBALS['db_host'],
    'user' => $GLOBALS['db_user'],
    'pass' => $GLOBALS['db_pass'],
    'base' => $GLOBALS['db_name'],
    'pref' => DB_PREFIX . 'fc_'
    );

$GLOBALS['fc_config']['cms'] = new FusionCMS();


foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
    $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>