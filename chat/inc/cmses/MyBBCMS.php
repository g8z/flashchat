<?php

// integration class for MyBB 1.0 Forum (http://www.mybboard.com)
// written by Veronica Dec 2005
// updated Jan 2006 with additional user groups support
// tested with FlashChat 4.5.4
// version 1.2

$mybb_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';

include($mybb_root_path . 'inc/config.php');

class MYBBCMS {

  var $userid;
  var $loginStmt;
  var $getUserStmt;
  var $getGenderStmt;
  var $getUsersStmt;

  function MYBBCMS() {

    $this->loginStmt      = new Statement("SELECT uid  AS id, username AS login, password, salt, loginkey FROM {$GLOBALS['db_prefix']}users WHERE username=? LIMIT 1");
    $this->getUserStmt    = new Statement("SELECT uid  AS id, username AS login, usergroup, additionalgroups, avatar, showavatars FROM {$GLOBALS['db_prefix']}users WHERE uid=? LIMIT 1");
    $this->getGenderStmt  = new Statement("SELECT ufid AS id, fid3 AS gender FROM {$GLOBALS['db_prefix']}userfields WHERE ufid=? LIMIT 1");
    $this->getUsersStmt   = new Statement("SELECT uid  AS id, username as login FROM {$GLOBALS['db_prefix']}users");

    $this->userid = NULL;

    if(isset($_COOKIE['mybbuser']))  $id = explode('_', $_COOKIE['mybbuser']);
    if(isset($_COOKIE['mybbadmin'])) $id = explode('_', $_COOKIE['mybbadmin']);
    if($id[0]) $this->userid = $id[0];

  }


  function isLoggedIn() {
    return $this->userid;
  }

  function getRoles($status1, $status2) {

    $rv = NULL;
    $groups = explode(',', ($status1 . ',' . $status2));

							// MyBB: usergroups table titles
    if(in_array(2, $groups)) $rv = ROLE_USER;		// Registered

							// Remove these lines if you have a specific FlashChat Moderator group
    if(in_array(3, $groups)) $rv = ROLE_MODERATOR;	// Super Moderators
    if(in_array(6, $groups)) $rv = ROLE_MODERATOR;	// Moderators

//  if(in_array(X, $groups)) $rv = ROLE_MODERATOR;	// FlashChat Moderators
							// Extra usergroup change X to your usergroup gid number and remove double slashes
							// First extra usergroups gid number is 8 etc

    if(in_array(4, $groups)) $rv = ROLE_ADMIN;		// Administrators
    if(in_array(1, $groups)) $rv = ROLE_ANY;		// Unregistered / Not Logged In
    if(in_array(5, $groups)) $rv = ROLE_ANY;		// Awaiting Activation
    if(in_array(7, $groups)) $rv = ROLE_NOBODY;		// Banned

    return $rv;
  }

  function getUserProfile($userid) {

    if ($userid == SPY_USERID) $rv = NULL;

    elseif ($user = $this->getUser($userid)) {
      $rv  = "../member.php?action=profile&uid=".$userid;
    }

    return $rv;
  }


  function getUser($userid) {
    $rv = NULL;

    if(($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next())) {

      $rec['roles'] = $this->getRoles($rec['usergroup'], $rec['additionalgroups']);
      $rv = $rec;
    }
    return $rv;
  }

  function login($login, $password) {

    $rs = $this->loginStmt->process($login);
    $this->userid = null;

    if ( ($rec = $rs->next()) &&
         !empty($rec['password']) &&
         ($rec['password'] == md5(md5($rec['salt']) . md5($password)))
       ) $this->userid = $rec['id'];

    return $this->userid;
  }

   function userInRole($userid, $role) {

          if($rs = $this->getUser($userid))
	  return ($this->getRoles($rs['usergroup'], $rs['additionalgroups']) == $role);
          return false;
  }

  function logout() {

  }

  function getUsers() {
   return $this->getUsersStmt->process();
  }

  function getGender($userid) {
        // 'M' for Male, 'F' for Female, NULL for undefined

	$sex = $this->getGenderStmt->process($userid);
	if($gender = $sex->next()) {
		if($gender['gender'] == 'Female') return 'F';
		if($gender['gender'] == 'Male')   return 'M';
	}
        return NULL;
  }

  function getPhoto($userid) {

	$rs = $this->getUserStmt->process($userid);
	if($rec = $rs->next()) {

		if($rec['showavatars'] == 'yes') {

			$fileExt = explode(',', $GLOBALS['fc_config']['photoloading']['allowFileExt']);

			$oldFile = './temp/nick_image/' . $userid . '.';
			$fs = reset($fileExt);
			while($fs) {
				if(file_exists($oldFile . $fs)) return $oldFile . $fs;
				$fs = next($fileExt);
			}

			if($rec['avatar']) {
				$rec['avatar'] = '../' . $rec['avatar'];
				$path_parts = pathinfo($rec['avatar']);

				if(file_exists($rec['avatar']) &&
				   is_file( $rec['avatar'])    &&
				   filesize($rec['avatar']) < $GLOBALS['fc_config']['photoloading']['maxFileSize'] &&
				   in_array($path_parts['extension'], $fileExt)) return $rec['avatar'];
			}
		}
	}
 	return '';
  }

}


$GLOBALS['fc_config']['db'] = array(
                 'host' => $config['hostname'],
                 'user' => $config['username'],
                 'pass' => $config['password'],
                 'base' => $config['database'],
                 'pref' => $config['table_prefix'] . "fc_",
                 );

$GLOBALS['db_prefix'] = $config['table_prefix'];

$GLOBALS['fc_config']['cms'] = new MYBBCMS();

foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
  $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>