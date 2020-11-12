<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

// for e107 version 0.617

// try to save globals. upon inclusion of class2.php, e107 will erase every global except for _GET, _POST, etc
// we save it in the _GET global array, e107 wont touch it
// dirty, yes.

$_GET['gback'] = array();


while (list($global) = each($GLOBALS)){
	if (!preg_match('/^(_POST|_GET|_COOKIE|_SERVER|_FILES|GLOBALS|HTTP.*|_REQUEST)$/', $global)){
		if ($global <> 'PHP_SELF' && $global <> 'SCRIPT_FILENAME') {
			$_GET['gback'][$global] = $$global;
		}
	}
}


$e107path = realpath(dirname(__FILE__) . '/../../../') . '/';
require_once($e107path . 'class2.php');

// restore globals

foreach ($_GET['gback'] as $k => $v) {
  $GLOBALS[$k] = $v;
}


class E107CMS {
    var $user = null;
    var $userid = null;

    var $getE107UserInfoStmt;
    var $getUserStmt;
    var $getUsersStmt;

    function E107CMS() {

        $this->getE107UserInfoStmt = new Statement('SELECT user_id as id, user_loginname AS login, user_admin, user_password as password FROM ' . MPREFIX . 'user WHERE user_loginname=? LIMIT 1');
        $this->getUserStmt = new Statement('SELECT user_id as id, user_loginname AS login, user_admin, user_password as password FROM ' . MPREFIX . 'user WHERE user_id=? LIMIT 1');
        $this->getUsersStmt = new Statement('SELECT user_id as id, user_loginname AS login, user_admin, user_password as password FROM ' . MPREFIX . 'user ORDER BY user_loginname');
    }

    function isLoggedIn() {
        return (USER ? USERID : null);
    }

    function login($login, $password) {

      $rv = null;

      if(($rs = $this->getE107UserInfoStmt->process($login)) && ($rec = $rs->next()) && ($rec['password'] == md5($password))) {

		$this->user = array(
						    'id' => $rec['id'],
						    'login' => $rec['login'],
						    'roles' => isAdmin($rec['user_admin'])
						    );
		$rv = $rec['id'];
      }

      return $rv;
    } // ends function

    function logout(){
        //$this->user = null;
    }

    function getUser($userid) {
            if($userid) {
                $rs = $this->getUserStmt->process($userid);
                if ($rs->hasNext()) {
                    $rec = $rs->next();
                    $rec['roles'] = isAdmin($rec['user_admin']);
                    return $rec;
                }

            } else {
                return null;
            }
    }

    function getUsers() {
        if ($rs = $this->getUsersStmt->process()) {
            return $rs->next();
        }
        else {
            return null;
        }
    }

    function getUserProfile($userid)
	{
        return('http://'.$_SERVER['HTTP_HOST'] . e_HTTP . 'user.php?id.' . $userid);
    }

	function userInRole($userid, $role) {
		if($user = $this->getUser($userid)) {
			return ($user['roles'] == $role);
		}
		return false;
	}

	function getGender($userid){
		// 'M' for Male, 'F' for Female, NULL for undefined
		return NULL;
  	}
}

function isAdmin($admin)
{
    switch($admin)  {
        case 0: $roles = ROLE_USER; break;
        case 1: $roles = ROLE_ADMIN; break;
        default: $roles = ROLE_USER; break;
    } // end switch
    return $roles;
}

$GLOBALS['fc_config']['db'] = array(
	'host' => $mySQLserver,
	'user' => $mySQLuser,
	'pass' => $mySQLpassword,
	'base' => $mySQLdefaultdb,
	'pref' => MPREFIX . 'flashchat'
);

foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
    $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] =
'';
}


$GLOBALS['fc_config']['cms'] = new E107CMS();

?>