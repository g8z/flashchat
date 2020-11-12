<?php

// Mambo 4.5.2

$mambo_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';

// this is kind of a hack. not sure if it works on all servers
//ini_set('include_path', ini_get('include_path') . ":" . $mambo_root_path . ":.");

$database = NULL;
define("_VALID_MOS", 1);
require_once($mambo_root_path . "globals.php");
require_once($mambo_root_path . "includes/sef.php" );
require_once($mambo_root_path . "includes/frontend.php" );
require_once($mambo_root_path . "configuration.php");

// fix for mambo 4.5.2
require_once($mambo_root_path . "includes/database.php");
require_once($mambo_root_path . "includes/mambo.php");

//$fp = fopen(realpath(dirname(__FILE__))."/debug/debug".time().".txt", "w");
//fwrite($fp, print_r("curruserid:".$GLOBALS['curruserid'], true));


class MamboCMS {

  var $user = null;
  var $userid = null;

  var $mamboDBConn = null;

  function MamboCMS() {

    $this->mamboDBConn = new database( $GLOBALS['mosConfig_host'], $GLOBALS['mosConfig_user'], $GLOBALS['mosConfig_password'], $GLOBALS['mosConfig_db'], $GLOBALS['mosConfig_dbprefix'] );

    $GLOBALS['database'] =& $this->mamboDBConn;

    $this->mainframe = new mosMainFrame( $this->mamboDBConn, "", $GLOBALS['mambo_root_path']);

    //$this->mainframe->initSession();
	//---fix
	$GLOBALS['mainframe'] =& $this->mainframe;
	$this->mainframe->initSession();
	//end fix

    if ($this->user =& $this->mainframe->getUser())
	{
      //fwrite($GLOBALS['fp'], "user object en constructor:".print_r($this->user, true));
      $this->userid = $this->user->id;
    }

  }

  function isLoggedIn() {
    return $this->userid;

  }

  function login($login, $password) {

    $acl = new gacl_api($this->mamboDBConn);

    $username = trim($login);
    $passwd = md5(trim($password));

    //fwrite($GLOBALS['fp'], "login/password".$username."/".$passwd."\n");

    $this->mamboDBConn->setQuery("SELECT id, gid, block, usertype"
			. "\nFROM #__users"
			. "\nWHERE username='$username' AND password='$passwd' AND block='0' LIMIT 1"
			);
    $row = null;
    if ($this->mamboDBConn->loadObject( $row )) {
      //fwrite($GLOBALS['fp'], print_r($row, true));
      //fwrite($GLOBALS['fp'], "acl:".print_r($acl, true));

      $grp = $acl->getAroGroup( $row->id );

      $row->gid = 1;
      if ($acl->is_group_child_of( $grp->name, 'Registered', 'ARO' ) || $acl->is_group_child_of( $grp->name, 'Administrator', 'ARO' )) {
	$row->gid = 2;
      }
      $row->usertype = $grp->name;

      $session =& $this->mainframe->_session;

      //fwrite($GLOBALS['fp'], "pete:".print_r($session, true));

      $session->guest = 0;
      $session->username = $username;
      $session->userid = intval( $row->id );
      $session->usertype = $row->usertype;
      $session->gid = intval( $row->gid );

      $session->update();

      return $session->userid;
    }
    else {
      return false;
    }

  } // ends function

  function logout(){
    //fwrite($GLOBALS['fp'], "llamada a: logout");
	    $this->user = null;
    // $this->mainframe->logout();
  }

  function getUser($userid) {
        //fwrite($GLOBALS['fp'], "llamada a: getuser");

    if ($userid == SPY_USERID) return NULL;

    $user = new mosUser($this->mamboDBConn);
    $user->load($userid);

    //fwrite($GLOBALS['fp'], "para user id ".$userid." tengo: ".print_r($rec,true));

    $rec = array("login" => $user->username, "id" => $user->id, "roles" => $this->getRoles($user->gid));
    //fwrite($GLOBALS['fp'], print_r($rec,true));
    return $rec;

  }

  function getGender($userid)
  {
	        // 'M' for Male, 'F' for Female, NULL for undefined
			return NULL;
  }

  function getUsers() {
    //fwrite($GLOBALS['fp'], "llamada a: getusers");
	$getUsersStmt = new Statement("SELECT * FROM {$GLOBALS['mosConfig_dbprefix']}users ORDER BY username");
	$users = $getUsersStmt->process();

	while($rec = $users->next()) {

		$users2[$rec['id']]['id'] = $rec['id'];
		$users2[$rec['id']]['password'] = $rec['password'];
		$users2[$rec['id']]['login'] = $rec['username'];
		$users2[$rec['id']]['roles'] = $this->getRoles($rec['gid']);
	}
	return $users2;
  }

  function getUserProfile($userid) {
        //fwrite($GLOBALS['fp'], "llamada a: getuserprofile");
    if ($userid == SPY_USERID) return NULL;

    return('../index.php?option=com_user&task=UserDetails&Itemid=' . $userid);
  }

  function getRoles($gid) {
        //fwrite($GLOBALS['fp'], "llamada a: getroles");

    switch($gid) {
    case 17: $roles = ROLE_USER; break;
    case 18: $roles = ROLE_USER; break;
    case 19: $roles = ROLE_USER; break;
    case 20: $roles = ROLE_MODERATOR; break;
    case 21: $roles = ROLE_MODERATOR; break;
    case 23: $roles = ROLE_MODERATOR; break;
    case 24: $roles = ROLE_MODERATOR; break;
    case 25: $roles = ROLE_ADMIN; break;
    case 28: $roles = ROLE_USER; break;
    case 29: $roles = ROLE_USER; break;
    case 30: $roles = ROLE_USER; break;
    default: $roles = ROLE_USER; break;
    }

	if ($GLOBALS['fc_config']['liveSupportMode'] && $roles == ROLE_USER) {

		return ROLE_CUSTOMER;
	}
    return $roles;

  }

	function userInRole($userid, $role) {
		if($user = $this->getUser($userid)) {
			return ($user['roles'] == $role);
		}
		return false;
	}
}


$GLOBALS['fc_config']['db'] = array(
	'host' => $mosConfig_host,
	'user' => $mosConfig_user,
	'pass' => $mosConfig_password,
	'base' => $mosConfig_db,
	'pref' => $mosConfig_dbprefix."fc_",
	);


$GLOBALS['fc_config']['cms'] = new MamboCMS();

	//clear 'if moderator' message
	foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
		$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
	}


?>