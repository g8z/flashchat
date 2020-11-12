<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

// integration class for WOW Bulletin Board 1.65 (www.wowbb.com)

$wow_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';
$curdir = getcwd();

//define("NO_OUTPUT_BUFFERING", 1);
chdir($wow_root_path);
require_once 'lib.php';
chdir($curdir);


class WOWCMS {

    function WOWCMS() {

      $this->uid = null;

      if (isset($_COOKIE[COOKIE_NAME])) {

	$userCookie = parse_cookie();
	if ($user = look_up_user(0, $userCookie['user_name'])) {
	  $this->uid = $user[0]['user_id'];
	}
      }

    }

    function isLoggedIn() {
      return $this->uid;
    }

    function getRoles($user) {
      $rv = NULL;

    switch($user['user_group_id']) {
    case 1: $rv = ROLE_USER; break;
    case 2: $rv = ROLE_USER; break;
    case 4: $rv = ROLE_MODERATOR; break;
    case 4: $rv = ROLE_MODERATOR; break;
    case 6: $rv = ROLE_ADMIN; break;
    default: $rv = NULL; break;
    }




//      if ($user['user_group_id'] == 6)
//       {
//	  $rv = ROLE_ADMIN;
//       }

      return $rv;
    }

    function getUserProfile($userid) {

      if ($user = $this->getUser($userid)) {
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
      $user = $this->getUser($userid);
      if ($user) {
		if($user['roles'] == $role){
			$rv = 1;
	    }
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


//foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
//  $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
//}

?>