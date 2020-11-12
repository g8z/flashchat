<?php
// integration class for XMB Forum (www.xmbforum.com)
// written by Manuel Aristarán <masterson@diosmilanesa.com.ar>


$xmb_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';

include($xmb_root_path . 'config.php');

$membertable = $tablepre.'members';

class XMBCMS {

  var $userid;
  var $loginStmt;
  var $getUserStmt;
  var $getUsersStmt;

  function XMBCMS() {
    $xmb_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';
    include($xmb_root_path . 'config.php');

    $this->loginStmt = new Statement('SELECT uid as id, username AS login, password from '.$tablepre.'members WHERE username=? AND password=? LIMIT 1');
    $this->getUserStmt = new Statement('SELECT uid AS id, username AS login, status FROM '.$tablepre.'members WHERE uid=? LIMIT 1');
    $this->getUsersStmt = new Statement('SELECT uid as id, username as login FROM '.$tablepre.'members');

    $this->userid = NULL;


    if (isset($_COOKIE['xmbuid'])) {
      $this->userid = $_COOKIE['xmbuid'];
    }
    elseif (isset($_COOKIE['xmbuser']) && isset($_COOKIE['xmbpw'])) {
      $rs = $this->loginStmt->process($_COOKIE['xmbuser'],$_COOKIE['xmbpw']);
      if ($rs && ($rec = $rs->next())) {
    $this->userid = $rec['id'];
      }
    }

  }


  function isLoggedIn() {
    return $this->userid;
  }

  function getRoles($status) {
    $rv = NULL;

    if ($status == 'Super Administrator' || $status =='Administrator'){
      $rv = ROLE_ADMIN;
    }

    if ($status == 'Moderator' || $status == 'Super Moderator'){
      $rv = ROLE_MODERATOR;
    }

    if ($status == 'Member'){
      $rv = ROLE_USER;
    }
    return $rv;

  }

  function getUserProfile($userid) {

    if ($userid == SPY_USERID) $rv = NULL;

    elseif ($user = $this->getUser($userid)) {
      $rv  = $GLOBALS['full_url'];
      $rv .= ($id = $this->isLoggedIn() && ($id == $userid)) ? 'memcp.php' : 'member.php?action=viewpro&member='.$user['login'];
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
    if (($rs = $this->loginStmt->process($login,md5($password))) && ($rec = $rs->next())) {

    $this->userid = $rec['id'];
    $currtime = time() + (86400*30);
    // break XMB's $full_url setting into pieces to set cookie path and cookie domain
    $pu = parse_url($GLOBALS['full_url']);
    $cookiepath = $pu['path']; $cookiedomain = $pu['host'];

    setcookie('xmbuser', $rec['login'], $currtime, $cookiepath, $cookiedomain);
    setcookie('xmbpw',   $rec['password'], $currtime, $cookiepath, $cookiedomain);
    setcookie('xmbuid',  $rec['id'],      $currtime, $cookiepath, $cookiedomain);

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

  function getGender($userid){
	// 'M' for Male, 'F' for Female, NULL for undefined
	return NULL;
  }
}

$GLOBALS['fc_config']['db'] = array(
                 'host' => $dbhost,
                 'user' => $dbuser,
                 'pass' => $dbpw,
                 'base' => $dbname,
                 'pref' => $tablepre . 'fc_',
                 );

$GLOBALS['fc_config']['cms'] = new XMBCMS();

foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
  $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>