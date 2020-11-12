<?php

// Mambo 4.6.5

$mambo_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';

$database = NULL;
define("_VALID_MOS", 1);

require_once($mambo_root_path . "includes/frontend.php" );
require_once($mambo_root_path . "includes/database.php" );
require_once($mambo_root_path . "includes/gacl.class.php" );
require_once($mambo_root_path . "includes/gacl_api.class.php" );
require_once($mambo_root_path . "configuration.php");
require_once($mambo_root_path . "administrator/components/com_admin/admin.admin.html.php");
require_once($mambo_root_path . "includes/core.classes.php" );
require_once($mambo_root_path . "includes/database.php");


define( "_MOS_NOTRIM", 0x0001 );
define( "_MOS_ALLOWHTML", 0x0002 );
function mosGetParam( &$arr, $name, $def=null, $mask=0 ) {
	$return = null;
	if (isset( $arr[$name] )) {
		if (is_string( $arr[$name] )) {
			if (!($mask&_MOS_NOTRIM)) {
				$arr[$name] = trim( $arr[$name] );
			}
			if (!($mask&_MOS_ALLOWHTML)) {
				$arr[$name] = strip_tags( $arr[$name] );
			}
			if (!get_magic_quotes_gpc()) {
				$arr[$name] = addslashes( $arr[$name] );
			}
		}
		return $arr[$name];
	} else {
		return $def;
	}
}


class MamboCMS {

  var $user = null;
  var $userid = null;

  var $mamboDBConn = null;

  function MamboCMS() {

    $this->mamboDBConn = new database( $GLOBALS['mosConfig_host'], $GLOBALS['mosConfig_user'], $GLOBALS['mosConfig_password'], $GLOBALS['mosConfig_db'], $GLOBALS['mosConfig_dbprefix'] );
    $GLOBALS['database'] =& $this->mamboDBConn;

    $this->mainframe = new mosMainFrame( $this->mamboDBConn, "", $GLOBALS['mambo_root_path']);
    $session =& mosSession::getCurrent();
    $my =& new mosUser();
    $my->getSessionData();
    mamboCore::set('currentUser',$my);


	$GLOBALS['mainframe'] =& $this->mainframe;

    if ($this->user =& $this->mainframe->getUser())
	{
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


    $this->mamboDBConn->setQuery("SELECT id, gid, block, usertype"
			. "\nFROM #__users"
			. "\nWHERE username='$username' AND password='$passwd' AND block='0' LIMIT 1"
			);
    $row = null;
    if ($this->mamboDBConn->loadObject( $row )) {
      $grp = $acl->getAroGroup( $row->id );

      $row->gid = 1;
      if ($acl->is_group_child_of( $grp->name, 'Registered', 'ARO' ) || $acl->is_group_child_of( $grp->name, 'Administrator', 'ARO' )) {
	$row->gid = 2;
      }
      $row->usertype = $grp->name;

      $session =& $this->mainframe->_session;

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
	    $this->user = null;
  }

  function getUser($userid) {
    if ($userid == SPY_USERID) return NULL;

    $user = new mosUser($this->mamboDBConn);
    $user->load($userid);


    $rec = array("login" => $user->username, "id" => $user->id, "roles" => $this->getRoles($user->gid));
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