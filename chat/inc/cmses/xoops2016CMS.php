<?php
	if ( !defined( 'INC_DIR' ) ) {
		die( 'hacking attempt' );
	}

@session_destroy();


$xoops_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';

if( is_file($xoops_root_path . 'mainfile.php') )
include($xoops_root_path . 'mainfile.php');


class XoopsUsersRS {
  var $result;
  var $numRows = 0;
  var $currRow = 0;

  function XoopsUsersRS($result) {
    $this->result = array();
    foreach($result as $k => $v) {
      $this->result[] = array('id' => $k, 'login' => $v);
    }
    $this->numRows = sizeof($this->result);
  }

  function hasNext() {
    return ($this->result && ($this->numRows) > $this->currRow);
  }

  function next() {
    if($this->hasNext()) {
      return $this->result[$this->currRow++];
    } else {
      return null;
    }
  }
}

class XoopsCMS {
  var $member_handler;

  function XoopsCMS() {
    $this->member_handler =& xoops_gethandler('member');

	$str = "SELECT ".XOOPS_DB_PREFIX."_avatar.avatar_file FROM ".XOOPS_DB_PREFIX."_avatar,".XOOPS_DB_PREFIX."_avatar_user_link WHERE ".XOOPS_DB_PREFIX."_avatar_user_link.user_id=? AND ".XOOPS_DB_PREFIX."_avatar.avatar_id=".XOOPS_DB_PREFIX."_avatar_user_link.avatar_id  LIMIT 1";
	$this->getPhotoStmt = new Statement($str);
  }

  function isLoggedIn() {
    $rv = null;
    if (isset($_SESSION['xoopsUserId'])) {
      $xu = $this->member_handler->getUser($_SESSION['xoopsUserId']);
      $rv = $xu->getVar('uid');
    }

    return $rv;

  }

  function login($login, $password) {

    if($user =& $this->member_handler->loginUser($login, $password)) {
      if($user->getVar('level') == 0) return null;
      return $user->getVar('uid');
    }

    return null;
  }

  function logout(){
  }

  function getUser($userid) {
    $u = null;

    $user =& $this->member_handler->getUser($userid);

    if($user) {
      $u = array(
   'id' => $userid,
   'login' => $user->getVar('uname')
   );

      $u['roles'] = $GLOBALS['fc_config']['liveSupportMode']?ROLE_CUSTOMER:ROLE_USER;
      if($user->getVar('rank') == 6) $u['roles'] = ROLE_MODERATOR;
     if($user->isAdmin()) $u['roles'] = ROLE_ADMIN;
    }

    return $u;
  }

  function getUsers() {
    return new XoopsUsersRS($this->member_handler->getUserList());
  }

  function getUserProfile($userid) {
    if($userid == SPY_USERID) return null;

    if($user = $this->getUser($userid)) {
      return (($id = $this->isLoggedIn()) && ($id == $userid))?"../edituser.php":"../userinfo.php?uid=$userid";
    } else {
      return null;
    }
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
  function getPhoto($userid)
	{
		$rs = $this->getPhotoStmt->process($userid);

		if(($rec = $rs->next()) == null) return '';



		/*while($fs) {
			if(file_exists($oldFile . $fs)) return $oldFile . $fs;
			$fs = next($fileExt);
		}*/

		return '../uploads/'.$rec['avatar_file'];
	}
}
if( is_file($xoops_root_path . 'mainfile.php') )
{
$GLOBALS['fc_config']['db'] = array(
				    'host' => XOOPS_DB_HOST,
				    'user' => XOOPS_DB_USER,
				    'pass' => XOOPS_DB_PASS,
				    'base' => XOOPS_DB_NAME,
				    'pref' => XOOPS_DB_PREFIX . 'fc_'
				    );
}
else
{
	$GLOBALS['fc_config']['db'] = array(
    'host' => "",
    'user' => "",
    'pass' => "",
    'base' => "",
    'pref' => "",
    );
}

if( is_file($xoops_root_path . 'mainfile.php') )
$GLOBALS['fc_config']['cms'] = new XoopsCMS();

//clear 'if moderator' message
foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
  $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}
?>