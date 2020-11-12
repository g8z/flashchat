<?php

// integration class for punBB 1.2.10 Forum (http://www.punbb.org/)
// written by Veronica Nov 2005

//error_reporting(E_ALL);
$punbb_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';

include($punbb_root_path . 'config.php');
if (!defined('PUN')) exit;

class PUNBBCMS {

  var $userid;
  var $loginStmt;
  var $getUserStmt;
  var $getUsersStmt;

  function PUNBBCMS() {
    global $cookie_name;
    $this->loginStmt    = new Statement("SELECT id, username AS login, password from {$GLOBALS['db_prefix']}users WHERE username=? LIMIT 1");
    $this->getUserStmt  = new Statement("SELECT id, username AS login, group_id AS roles FROM {$GLOBALS['db_prefix']}users WHERE id=? LIMIT 1");
    $this->getUsersStmt = new Statement("SELECT id, username as login FROM {$GLOBALS['db_prefix']}users");

    $this->userid = NULL;
    $cookie = array('user_id' => 1, 'password_hash' => 'Guest');
    if (isset($_COOKIE[$GLOBALS['cookie_name']])) list($cookie['user_id'], $cookie['password_hash']) = unserialize(str_replace(chr(92), '', $_COOKIE[$GLOBALS['cookie_name']]));
    if ($cookie['user_id'] > 1) $this->userid = $cookie['user_id'];
  }


  function isLoggedIn() {
    return $this->userid;
  }

  function getRoles($status) {
    $rv = NULL;
    if ($status == 1) $rv = ROLE_ADMIN;
    if ($status == 2) $rv = ROLE_MODERATOR;
    if ($status == 3) $rv = NULL;
    if ($status == 4) $rv = ROLE_USER;
    return $rv;
  }

  function getUserProfile($userid) {

    if ($userid == SPY_USERID) $rv = NULL;

    elseif ($user = $this->getUser($userid)) {
      $rv  = "../profile.php?id=".$userid;
    }

    return $rv;
  }


  function getUser($userid) {
    $rv = NULL;

    if(($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next())) {
      $rec['roles'] = $this->getRoles($rec['roles']);
      $rv = $rec;
    }
    return $rv;
  }

  function login($login, $password) {

    $rs = $this->loginStmt->process($login);
    $this->userid = null;
    if (($rec = $rs->next()) && !empty($rec['password'])) {
          if      (function_exists('sha1'))   $password_hash = sha1($password);        // Only in PHP 4.3.0+
          else if (function_exists('mhash'))  $password_hash = bin2hex(mhash(MHASH_SHA1, $password));        // Only if Mhash library is loaded
               else                           $password_hash = md5($password);
          if($rec['password'] == $password_hash)  $this->userid = $rec['id'];
    }
    return $this->userid;
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
                 'host' => $db_host,
                 'user' => $db_username,
                 'pass' => $db_password,
                 'base' => $db_name,
                 'pref' => $db_prefix . "fc_",
                 );

$GLOBALS['fc_config']['cms'] = new PUNBBCMS();



foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
  $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>