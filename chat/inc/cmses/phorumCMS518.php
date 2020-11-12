<?php

// integration class for phorum 5.1.8  (http://www.phorum.org)
// written by Veronica March 2006
// tested with FlashChat 4.5.4 and phorum 5.1.8 RC2
// version 1.0

$phorum_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';
//print $phorum_root_path . 'include/db/config.php';

define( "PHORUM", "5.1.8" );
include($phorum_root_path . 'include/db/config.php');


class phorumCMS {

  var $userid;
  var $loginStmt;
  var $getUserStmt;
  var $getUsersStmt;

  function phorumCMS() {

    $this->loginStmt      = new Statement("SELECT user_id  AS id, username AS login, password FROM {$GLOBALS['db_prefix']}users WHERE username=? LIMIT 1");
    $this->getUserStmt    = new Statement("SELECT user_id  AS id, username AS login, active, admin FROM {$GLOBALS['db_prefix']}users WHERE user_id=? LIMIT 1");
    $this->getUsersStmt   = new Statement("SELECT user_id  AS id, username AS login FROM {$GLOBALS['db_prefix']}users");


    	$this->userid = NULL;
    	if(isset($_COOKIE['phorum_session_v5']))  $id = explode(':', $_COOKIE['phorum_session_v5']);
    	if($id[0] > 0) $this->userid = $id[0];

  }


  function isLoggedIn() {
    return $this->userid;
  }

  function getRoles($status1, $status2) {

    $rv = NULL;						// banned if none of these
    if($status1 == -2) return ROLE_ANY;			// not activated
    if($status1 == 1) {					// activated
	if($status2 == 0) return ROLE_USER;		// user
	if($status2 == 1) return ROLE_ADMIN;		// admin
    }

    return $rv;
  }

  function getUserProfile($userid) {

    $rv = NULL;

    return $rv;
  }


  function getUser($userid) {
    $rv = NULL;

    if(($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next())) {

      $rec['roles'] = $this->getRoles($rec['active'], $rec['admin']);
      $rv = $rec;
    }
    return $rv;
  }

  function login($login, $password) {

    $rs = $this->loginStmt->process($login);
    $this->userid = null;

    if ( ($rec = $rs->next()) &&
         !empty($rec['password']) &&
         ($rec['password'] == md5($password))) $this->userid = $rec['id'];

    return $this->userid;
  }

   function userInRole($userid, $role) {

          if($rs = $this->getUser($userid))
	  return ($this->getRoles($rs['active'], $rs['admin']) == $role);
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
                 'host' => $PHORUM['DBCONFIG']['server'],
                 'user' => $PHORUM['DBCONFIG']['user'],
                 'pass' => $PHORUM['DBCONFIG']['password'],
                 'base' => $PHORUM['DBCONFIG']['name'],
                 'pref' => $PHORUM['DBCONFIG']['table_prefix'] . "_fc_",
                 );

$GLOBALS['db_prefix'] = $PHORUM['DBCONFIG']['table_prefix'] . '_';

$GLOBALS['fc_config']['cms'] = new phorumCMS();

foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
  $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>