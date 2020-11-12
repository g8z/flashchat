<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

// integration class for LunaByte (www.lunabyte.com)
// written by Manuel Aristarán <masterson@diosmilanesa.com.ar>


$lb_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';


include($lb_root_path . 'Settings.php');
include($lb_root_path . 'Sources/Load.php');
include($lb_root_path . 'Sources/Subs.php');



class LBCMS {

  var $userid;
  var $loginStmt;
  var $getUserStmt;
  var $getUsersStmt;

  function LBCMS()
  {
	$pref = $GLOBALS['db_prefix'];
    $this->loginStmt = new Statement('SELECT ID_MEMBER as id, memberName AS login, passwd from '.$pref.'members WHERE memberName=? AND passwd=? LIMIT 1');
    $this->getUserStmt = new Statement('SELECT ID_MEMBER AS id, memberName AS login, memberGroup as status FROM '.$pref.'members WHERE ID_MEMBER=? LIMIT 1');
    $this->getUsersStmt = new Statement('SELECT ID_MEMBER as id, memberName as login FROM '.$pref.'members');

    $this->userid = NULL;

    if (isset($_COOKIE[$GLOBALS['cookiename']])) {
      $cookieData = unserialize(get_magic_quotes_gpc() ? stripslashes($_COOKIE[$GLOBALS['cookiename']]) : $_COOKIE[$GLOBALS['cookiename']]);
      $this->userid = $cookieData[0];
    }

  }


  function isLoggedIn() {
    return $this->userid;
  }

  function getRoles($status) {
    $rv = NULL;

    if ($status == 'Administrator' || $status == 'Moderator' || $status == 'Global Moderator')
      $rv = ROLE_ADMIN;
    else
      $rv = ROLE_USER;

    return $rv;
  }

  function getUserProfile($userid) {

    if ($userid == SPY_USERID) $rv = NULL;

    elseif ($user = $this->getUser($userid)) {
      $rv  = $GLOBALS['boardurl'] . '/index.php?action=profile;user='.$user['login'];
    }

    return $rv;
  }


  function getUser($userid) {

    $rv = NULL;
    if(($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next())) {
      $rec['roles'] = $this->getRoles($rec['status']);
      $rv = $rec;
    }

    return $rv;
  }

  function login($login, $password) {

    $md5_password = md5_hmac($password, strtolower($login));

    $rs = $this->loginStmt->process($login,$md5_password);

    $rec = $rs->next();

    if ($rec) {

      $this->userid = $rec['id'];
      $cookiePw = md5_hmac($md5_password, $GLOBALS['pwseed']);
      $cookie = serialize(array($rec['id'], $cookiePw));
      $cookie_url = explode('<yse_sep>', url_parts());
      setCookie($GLOBALS['cookiename'], $cookie, time() + (60 * $GLOBALS['Cookie_Length']), $cookie_url[1], $cookie_url[0]);

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
   return $this->getUsersStmt->process();
  }

  function getGender($userid) {
        // 'M' for Male, 'F' for Female, NULL for undefined
        return NULL;
  }

}


$GLOBALS['fc_config']['db'] = array(
                 'host' => $db_server,
                 'user' => $db_user,
                 'pass' => $db_passwd,
                 'base' => $db_name,
                 'pref' => $db_prefix . 'fc_',
                 );

$GLOBALS['fc_config']['cms'] = new LBCMS();



foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
  $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}
?>