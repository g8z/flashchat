<?php
/*
MD-PRO 1.081
*/

$mdpro_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';
$curdir = getcwd();
chdir($mdpro_root_path);
include "includes/pnAPI.php";

//foreach($GLOBALS as $k => $v) {
//  if (substr($k, 0, 4) == 'MDSV') unset($GLOBALS[$k]);
//}
/*	if (substr($k, 0, 4) == 'MDSV') { 
		$tmpG[$k]=$g;
		unset($GLOBALS[$k]);
	}
}
//$GLOBALS = array();
pnInit();
foreach ($tmpG as $k=>$g) {
	$GLOBALS[$k]=$g;
}*/

define('ADODB_DIR', 'libs/adodb');
    require_once $mdpro_root_path.'libs/adodb/adodb.inc.php';
        // ADODB configuration
    // Temporary fix for hacking the hlpfile global || TODO - remove with pre-0.71 code
    global $hlpfile;
    $hlpfile = '';
    // Initialize and load configuration
    global $pnconfig, $pndebug;
    $pnconfig = array();
    include $mdpro_root_path.'config/md-config.php';
    // Set up multisites
    @define('WHERE_IS_PERSO', '');
    // Initialize and load pntables
    global $pntable;
    $pntable = array();
    // if a multisite has its own pntables.
    if (file_exists(WHERE_IS_PERSO . 'pntables.php')) include WHERE_IS_PERSO . 'pntables.php';
    else include 'pntables.php';
    // Decode encoded DB parameters
    if ($pnconfig['encoded']) {
        $pnconfig['dbuname'] = base64_decode($pnconfig['dbuname']);
        $pnconfig['dbpass'] = base64_decode($pnconfig['dbpass']);
        $pnconfig['encoded'] = 0;
    }
    // Connect to database
    if (!pnDBInit()) die('Database initialization failed');
    // debugger if required
    if ($pndebug['debug']) {
        include_once 'includes/lensdebug.inc.php';
        global $dbg, $debug_sqlcalls;
        $dbg = new LensDebug();
        $debug_sqlcalls = 0;
    }
	$dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();
    
    $sessioninfocolumn = &$pntable['session_info_column'];
    $sessioninfotable = $pntable['session_info'];
    $sessid = $_COOKIE['MDPROSID'];
   	$query = "SELECT {$sessioninfocolumn[uid]}
              FROM $sessioninfotable
              WHERE $sessioninfocolumn[sessid] = '" . pnVarPrepForStore($sessid) . "'";

    
    $result =& $dbconn->Execute($query);
    $userId = $result->fields[0];
    
    require_once $mdpro_root_path.'includes/pnSession.php';
	require_once $mdpro_root_path.'includes/pnMod.php';
	require_once $mdpro_root_path.'includes/pnUser.php';
	chdir($curdir);


function pnSecGetAuthInfo2($u) {
  
  $dbconn =& pnDBGetConn(true);
  if (is_array($dbconn)) $dbconn = $dbconn[0];
  $pntable =& pnDBGetTables();
  $userpermtable = $pntable['user_perms'];
  $userpermcolumn = &$pntable['user_perms_column'];
  $groupmembershiptable = $pntable['group_membership'];
  $groupmembershipcolumn = &$pntable['group_membership_column'];
  $grouppermtable = $pntable['group_perms'];
  $grouppermcolumn = &$pntable['group_perms_column'];
  $realmtable = $pntable['realms'];
  $realmcolumn = &$pntable['realms_column'];
  $userperms = array();
  $groupperms = array();
  //$uids = $u;
  //$uids = implode(",", $uids);
  
  // Get user permissions
  $query = "SELECT $userpermcolumn[realm],
                                 $userpermcolumn[component],
                                 $userpermcolumn[instance],
                                 $userpermcolumn[level]
                          FROM $userpermtable
                          WHERE $userpermcolumn[uid] = ".$u."
                          ORDER by $userpermcolumn[sequence]
						  LIMIT 1";
  
  $result =& $dbconn->Execute($query);
  
  
  
  if ($dbconn->ErrorNo() != 0) {
    return array(false,false);
  }
  
  $userperms=false;
  while(list($realm, $component, $instance, $level) = $result->fields) {
    $result->MoveNext();
    if ($component='.*' && // all components
	$instance=='.*' && //all instances
	$level==800 ) //admin level
      $userperms=true;
    
  }
  
  $query = "SELECT $groupmembershipcolumn[gid]
                          FROM $groupmembershiptable
                          WHERE $groupmembershipcolumn[uid] = " . $u . " LIMIT 1";
  $result =& $dbconn->Execute($query);
  if ($dbconn->ErrorNo() != 0) {
    return array(false, false);
  }
  $usergroups[] = -1;
  while(list($gid) = $result->fields) {
    $result->MoveNext();
    
    
    
    $usergroups[] = $gid;
  }
  $usergroups = implode(",", $usergroups);
  
  
  
  // Get all group permissions
  $query = "SELECT $grouppermcolumn[realm],
                                 $grouppermcolumn[component],
                                 $grouppermcolumn[instance],
                                 $grouppermcolumn[level]
                          FROM $grouppermtable
                          WHERE $grouppermcolumn[gid] IN (" . pnVarPrepForStore($usergroups) . ")
                          ORDER by $grouppermcolumn[sequence]";
  $result =& $dbconn->Execute($query);
  
  if ($dbconn->ErrorNo() != 0) {
    return array($userperms, $groupperms);
  }
  $groupperms=false;
  while(list($realm, $component, $instance, $level) = $result->fields) {
    $result->MoveNext();
    if ($component=='.*' && // all components
	$instance=='.*' && //all instances
	$level==800 ) //admin level
      $groupperms=true;
  }
  
  return array($userperms, $groupperms);
}




class PNUsersRS {
  var $result;
  var $numRows = 0;
  var $currRow = 0;
  
  function PNUsersRS($result = null) {
    $this->result = array_values($result);
    if($result) $this->numRows = sizeof($result);
  }
  
  function hasNext() {
    return ($this->result && ($this->numRows) > $this->currRow);
  }
  
  function next() {
    if($this->hasNext()) {
      return array(
		   'id' => $this->result[$this->currRow]['uid'],
		   'login' => $this->result[$this->currRow++]['uname']
		   );
    } else {
      return null;
    }
  }
}

class MDProCMS {
  function MDProCMS() {

  }
  
  function isLoggedIn() {
    return $this->userId;
  }
  
  function login($login, $password) {
    /*if(pnUserLogIn($login, $password, 0)) return
					    pnUserGetVar('uid');
    
    return null;*/
  	return $this->userId;
    
  }
  
  function logout(){
    //pnUserLogOut();
  }
  
  function getUser($userid) {
    $u = null;
    
    if($this->userId) {
      $u = array(
		 'id' => $userid,
		 'login' => pnUserGetVar('uname', $userid)
		 );
      
      $u['roles'] = $GLOBALS['fc_config']['liveSupportMode']?ROLE_CUSTOMER:ROLE_USER;
      $ar1 = pnSecGetAuthInfo2($userid);
      if ($ar1[1] || $ar1[2]) $u['roles'] = ROLE_ADMIN;
    }
    
    return $u;
  }
  
  
  function getUsers() {
    return new PNUsersRS(pnUserGetAll());
  }
  
  function getUserProfile($userid) {
    if($userid == SPY_USERID) return null;
    
    if($user = $this->getUser($userid)) {
      return (($id = $this->isLoggedIn()) && ($id == $userid))?"../user.php?op=edituser":"../user.php?op=userinfo&uname={$user['login']}";
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
  
  function getGender($userid) {
    // 'M' for Male, 'F' for Female, NULL for undefined
    return NULL;
  }
}

$GLOBALS['fc_config']['cms'] = new MDProCMS();
$GLOBALS['fc_config']['cms']->userId = $userId;

$GLOBALS['fc_config']['db'] = array(
				    'host' => $GLOBALS['pnconfig']['dbhost'],
				    'user' => ($GLOBALS['pnconfig']['encoded'] ? base64_decode($GLOBALS['pnconfig']['dbuname']) : $GLOBALS['pnconfig']['dbuname']),
				    'pass' => ($GLOBALS['pnconfig']['encoded'] ? base64_decode($GLOBALS['pnconfig']['dbpass']) : $GLOBALS['pnconfig']['dbpass']),
				    'base' => $GLOBALS['pnconfig']['dbname'],
				    'pref' => $GLOBALS['pnconfig']['prefix'] . "_fc_",
				    );


//clear 'if moderator' message
foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
  $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>