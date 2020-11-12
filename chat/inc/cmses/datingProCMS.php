<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

$dpro_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';

include($dpro_root_path . "include/config.php");
include($dpro_root_path . "common.php");
include($dpro_root_path . "include/functions_auth.php");



$fp = fopen(realpath(dirname(__FILE__))."/debug/debug".time().".txt", "w");
function handler($errno, $errmsg, $filename, $linenum, $vars) {

    $report = "errornum: {$errno}\nerrormsg: {$errmsg}\nfilename: {$filename} ({$linenum})\n\n";
    fwrite($GLOBALS['fp'], $report);

}
set_error_handler("handler");
*/

class DatingProCMS {

  var $userid = null;

  var $loginStmt;
  var $getUserStmt;
  var $getUsersStmt;

  function DatingProCMS()  {

    $this->getUserStmt = new Statement("SELECT id, login, gender, root_user from ".USERS_TABLE." WHERE id=? LIMIT 1");
    $this->loginStmt = new Statement("SELECT id, login, gender, root_user from ".USERS_TABLE." WHERE login=? AND password=? LIMIT 1");
    $this->getUsersStmt = new Statement("SELECT id, login, gender, root_user from ".USERS_TABLE);

    $user = auth_index_user();
    //trigger_error("user: ".print_r($user, true), E_USER_NOTICE);
    if ($user[3] != 1) $this->userid = $user[0];
    else $this->userid = null;
  }

  function isLoggedIn() {
    return $this->userid;
  }

  function login($login, $password) {

    global $dbconn;

    if ($this->userid) {
      // delete old session
      $strSQL = "Delete from ".ACTIVE_SESSIONS_TABLE." where id_user='".$this->userid."' and session='".session_id()."' ";
      $rs = $dbconn->Execute($strSQL);
      $strSQL = "Delete from ".ONLINE_NOTICE_TABLE." where id_from ='".$this->userid."' and type='1' ";
      $rs = $dbconn->Execute($strSQL);
    }

    $this->userid = null;
    $_POST["login_lg"] = $login;
    $_POST["pass_lg"] = $password;


    $u = auth_user();
    if ($u[3] != 1) {
      $this->userid = $u[0];
    }
    else
      $this->userid = NULL;


    return $this->userid;
  }

  function logout(){
    $this->userid = null;

  }

  function getUser($userid) {
    $rv = NULL;

    $rs = $this->getUserStmt->process($userid);

    if ($rec = $rs->next()) {
      $rec["roles"] = $this->getRoles($rec["root_user"]);
      $rv = $rec;
    }

    return $rv;
  }

  function getUsers() {
    $rs = $this->getUsersStmt->process();
    $rv = array();
    while ($rec = $rs->next()) {
      $rec["roles"] = $this->getRoles($rec["root_user"]);
      $rv[] = $rec;
    }
    return $rv;
  }

  function getUserProfile($userid) {
    if($userid == SPY_USERID) return null;

    return $GLOBALS["config"]["site_root"] . (($userid == $this->userid) ? "/myprofile.php" : "/viewprofile.php?id=".$userid);
  }


  function getRoles($group) {
    $rv = NULL;
    if ($group == 1) {
      $rv = ROLE_ADMIN;
    }
    elseif ($GLOBALS['fc_config']['liveSupportMode']) {
      $rv = ROLE_CUSTOMER;
    }
    else
      $rv = ROLE_USER;

    return $rv;
  }

	function userInRole($userid, $role) {
		if($user = $this->getUser($userid)) {
			return ($user['roles'] == $role);
		}
		return false;
	}

  function getGender($user) {
    // 'M' for Male, 'F' for Female, NULL for undefined
    $pr = $this->getUser($user);
    if ($pr["gender"] == 1) return 'M';
    elseif ($pr["gender"] == 2) return 'F';
    else return NULL;
  }

}

$GLOBALS['fc_config']['db'] = array(
				    'host' => $config["dbhost"],
				    'user' => $config["dbuname"],
				    'pass' => $config["dbpass"],
				    'base' => $config["dbname"],
				    'pref' => $config["table_prefix"] . "fc_",
				    );


$GLOBALS['fc_config']['cms'] = new DatingProCMS();

?>