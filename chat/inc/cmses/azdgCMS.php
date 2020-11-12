<?php

//if(strpos(getcwd(), 'flashchat')) 		$azdg_root_path = '../'; // chat
//if(strpos(getcwd(), 'members')) 		$azdg_root_path = '../'; // chat
//if(strpos(getcwd(), 'admin')) 		$azdg_root_path = '../'; // chat
//if(strpos(getcwd(), 'flashchat/admin')) 	$azdg_root_path = '../../'; // admin
$azdg_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';


require_once($azdg_root_path . 'include/config.inc.php');
require_once($azdg_root_path . 'include/functions.inc.php');
require_once($azdg_root_path . 'include/security.inc.php');
require_once($azdg_root_path . 'include/options.inc.php');

class AZDGDatingCMS {

    var $azdgLite;

    var $userid;
    var $adminUser;

    var $loginIDStmt;
    var $loginEmailStmt;
    var $getUserStmt;
    var $getUsersStmt;


    function AZDGDatingCMS() {

      // first thing to do: check which version of AZDG we're in
      $this->azdgLite = !function_exists('get_info');


      $this->userid = NULL;

      $this->getUserStmt = new Statement("SELECT id, fname AS login FROM ".C_MYSQL_MEMBERS." WHERE id = ? LIMIT 1");
      $this->getUserPlatinumStmt  = new Statement("SELECT id, username AS login FROM ".C_MYSQL_MEMBERS." WHERE id = ? LIMIT 1");

      $this->getUsersStmt = new Statement("SELECT id, fname AS login FROM ".C_MYSQL_MEMBERS);

      $this->loginIDStmt = new Statement("SELECT id, password, fname, lname,gender, req FROM ".C_MYSQL_MEMBERS." WHERE id=? AND (status >= '7') LIMIT 1" );
      $this->loginEmailStmt = new Statement("SELECT id, password, fname,lname, gender, req FROM ".C_MYSQL_MEMBERS." WHERE email=? AND (status >='7') LIMIT 1");
      $this->loginUsernameStmt = new Statement("SELECT id, username, fname,lname, password, gender, req FROM ".C_MYSQL_MEMBERS." WHERE username=? AND(status >= '7') LIMIT 1");
      $this->getUsername = new Statement("SELECT username FROM".C_MYSQL_MEMBERS." WHERE id = ? LIMIT 1");

      // see if there's an already established session
      if ($this->azdgLite) {
          @session_start();
          if (isset($_SESSION['m'])) {
            $this->userid = intval($_SESSION['m']); // 'normal' user
          }
          elseif (isset($_SESSION['adminlogin'])) {
            $this->userid = $this->genAdminID(C_ADMINL);
            $this->adminUser = true;
          }
      }
      else { //
        if (is_numeric(get_info('m')))
            $this->userid = intval(get_info('m'));
        else {
            if (C_AUTH) {
                @session_start();
                if (isset($_SESSION['adminlogin'])) {
                    $this->adminUser = true;
                    $this->userid = $this->genAdminID(C_ADMINL);
                }
            }
            else { // working on cookies
                if (md5(C_ADMINL) == get_info('adminlogin')) {
                    $this->adminUser = true;
                    $this->userid = $this->genAdminID(C_ADMINL);
                }
            }
        }
      }

    }

    function isLoggedIn() {
      return $this->userid;
    }

    function getRoles() {

      $rv = ROLE_USER;

//      if ($GLOBALS['fc_config']['liveSupportMode'])
//        $rv = ROLE_CUSTOMER;
//      elseif ($this->adminUser)
//        $rv = ROLE_ADMIN;
//      else
//        $rv = ROLE_USER;

      return $rv;

    }

    function getUserProfile($userid) {


      if ($userid == SPY_USERID) return NULL;

      elseif ($userid == $this->genAdminID(C_ADMINL)) {
        return C_URL;
      }

      elseif ($user = $this->getUser($userid))
        return ($userid == $this->isLoggedIn()) ? C_URL ."/members/index.php?l=&a=c" : C_URL . "/view.php?id=" . $userid;

      else return NULL;
    }


    function getUser($userid) {
      $rv = NULL;


      if(
         ($rs = ($this->azdgLite ? $this->getUserStmt->process($userid) : $this->getUserPlatinumStmt->process($userid))) &&
         ($rec = $rs->next())
        ) {

        $rec['roles'] = ROLE_USER;
        $rec['id'] = intval($rec['id']);


// ADD CASE # LINES BELOW TO ADD MORE ADMINS OR MODERATORS WHERE # = USER NUMBER
// moderator example foir user 5:     case 5: $rec['roles'] = ROLE_MODERATOR; break;

    switch($rec['id']) {
    case 1: $rec['roles'] = ROLE_ADMIN; break;
    default: $roles = ROLE_USER; break;
    }




//        if ($rec['id'] == 1)
//         {
//        $rec['roles'] = ROLE_ADMIN;
//         }
//        if ($rec['id'] == 2)
//         {
//        $rec['roles'] = ROLE_MODERATOR;
//         }

        $rv = $rec;
      }
      elseif ($userid == $this->genAdminID(C_ADMINL)) {
        $rec = array();
        $rec['login'] = C_ADMINL;
        $rec['roles'] = ROLE_ADMIN;
        $rec['id'] = $userid;
        $rv = $rec;
      }

      return $rv;
    }

    function login($login, $password) {

      $rv = NULL;

      //fwrite($GLOBALS['fp'], "intento de login con l/p:".$login."/".$password);

      if ($login == C_ADMINL && $password == C_ADMINP) {

        if ($this->azdgLite || (defined('C_AUTH') && C_AUTH)) {
            @session_destroy();
            @session_start();

            $_SESSION['adminlogin'] = md5(C_ADMINL);
            $_SESSION['adminpass'] = md5(C_ADMINP);
            $_SESSION['adminip'] = md5(ip());
        }
        else {
            set_login('adminlogin',md5(C_ADMINL));
            set_login('adminpass',md5(C_ADMINP));
            set_login('adminip',md5(ip()));
        }

        return $this->genAdminID(C_ADMINL);
      }


      if (C_ID == '0') {
        // login with username. only for platinum version.
        $rs = $this->loginUsernameStmt->process(cb($login));
      }
      elseif (C_ID == '2') { // login by email
            $rs = $this->loginEmailStmt->process(cbmail($login));
      }
      else { // login by numeric id
            $rs = $this->loginIDStmt->process($id);
      }

      if ($rs->hasNext() && ($rec = $rs->next()) && ($rec['password'] == $password)) {

        if ($this->azdgLite) {
            @session_destroy();
            @session_start();

            $_SESSION['m'] = $rec['id'];
            $_SESSION['o'] = md5(agent());
            $_SESSION['s'] = md5(ip());

            return intval($rec['id']);
        }
        else { // Platinum version

            if (!isset($rec['username'])) {
                $rsu = $this->getUsername($rec['id']);
                $recu = $rsu->next();
                $un = $recu['username'];
            }

            else $un = $rec['username'];

            MakeLogin($rec['id'], $un, $rec['fname'], $rec['lname'],$rec['gender'], $rec['req']);
            return $rec['id'];
        }
      }

    }

    function genAdminID($adminName) {

      // really simple hashing function
      // AzDGDating admins have no numeric ID

      $r = 0;

      for ($i = 0; $i < strlen($adminName); $i++) {
        $r = 131 * $r + ord($adminName[$i]);
      }


      // it seems the number is too big for Flash.
      // returning half of it should be still safe
      return intval($r / 2);

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
    'host' => C_HOST,
    'user' => C_USER,
    'pass' => C_PASS,
    'base' => C_BASE,
    'pref' => "fc_",
    );

$GLOBALS['fc_config']['cms'] = new AZDGDatingCMS();


foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
    $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] ='';
}

?>