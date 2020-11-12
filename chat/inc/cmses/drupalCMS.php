<?php

if ( !defined( 'INC_DIR' ) ) {
	die( 'hacking attempt' );
}

// integration class for Drupal (http://www.drupal.org/)
// written by Lophas, lophas@yahoo.com, Nov 7, 2006
// tested with FlashChat 4.7.6
// version 1.0


	if( is_file("includes/bootstrap.inc") )
	{
		$drupalroot=realpath(dirname(__FILE__)).'/../../..';
		$recentpath=dirname($_SERVER[PHP_SELF]);
		chdir($drupalroot);


		require_once("includes/bootstrap.inc");
		if(strpos($_SERVER['SCRIPT_NAME'], 'install.php') > 0)
			error_reporting(E_ALL ^ E_NOTICE);
		chdir("./$recentpath");
	}

	class drupalCMS {

		var $userid;

		var $loginStmt;
		var $getUserStmt;
		var $getUsersStmt;
		var $getSessionStmt;

		function drupalCMS()
		{
			$this->userid = $this->isLoggedIn();

			//if the session variable of the user_id exists assigns the user

			$this->loginStmt      = new Statement("SELECT uid AS id, pass AS password, name AS login FROM ".$GLOBALS['fc_config']['db']['users_table']." WHERE status=1 AND name=?");
			$this->getUserStmt    = new Statement("SELECT uid AS id, pass AS password, name AS login FROM ".$GLOBALS['fc_config']['db']['users_table']." WHERE status=1 AND uid=?");
			$this->getUsersStmt   = new Statement("SELECT uid AS id, name AS login FROM ".$GLOBALS['fc_config']['db']['users_table']." ORDER BY name");
			$this->getSessionStmt = new Statement("SELECT uid as id, sid as session_id FROM ".$GLOBALS['fc_config']['db']['sessions_table']." WHERE uid=?");
		}

		function isLoggedIn() {
			$userid=NULL;
			$this->getSessionUid = new Statement("SELECT uid as id FROM ".$GLOBALS['fc_config']['db']['sessions_table']." WHERE sid=?");
			if(($rs = $this->getSessionUid->process(session_id())) && ($rec = $rs->next()))
				if($rec['id']) $userid = $rec['id'];
			return $userid;
		}

		function login($login, $password) {

			$this->userid = null;

			if($login && $password) {
				//Try to find user using provided login
				if(($rs = $this->loginStmt->process(utf8_encode($login))) && ($rec = $rs->next()))
					if($rec['password'] == md5($password)) $this->userid = $rec['id'];
			}
			return $this->userid;
		}

		function logout(){
			$this->userid = null;
		}

		function getUser($userid) {
            		$u = null;

            		if(($rs = $this->getUserStmt->process($userid)) && ($u = $rs->next())) {
            		    $u['roles'] = $GLOBALS['fc_config']['liveSupportMode']?ROLE_CUSTOMER:ROLE_USER;
            		    if($userid==1) $u['roles'] = ROLE_ADMIN;
            		}

            		return $u;
		}

		function getUsers() {
			return 	$this->getUsersStmt->process();
		}

		function getUserProfile($userid) {
			if($userid == SPY_USERID) return null;

			if(($rs = $this->getSessionStmt->process($userid)) && ($rec = $rs->next()))
				if($rec['id']) return '../user/' . $userid ;
			return null;
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


  		function getPhoto($userid) {

			$fileExt = explode(',', $GLOBALS['fc_config']['photoloading']['allowFileExt']);

			$oldFile = './temp/nick_image/' . $userid . '.';
			$fs = reset($fileExt);
			while($fs) {
				if(file_exists($oldFile . $fs)) return $oldFile . $fs;
				$fs = next($fileExt);
			}

 			return '';
  		}

	}


$parts=parse_url($GLOBALS[db_url]);

if(is_array($GLOBALS[db_prefix])) {
$users_table=$GLOBALS[db_prefix][users]."users";
$sessions_table=$GLOBALS[db_prefix][sessions]."sessions";
$pref="fc_";
} else {
$users_table=$GLOBALS[db_prefix]."users";
$sessions_table=$GLOBALS[db_prefix]."sessions";
$pref=$GLOBALS[db_prefix]."fc_";
}

if( is_file("includes/bootstrap.inc") )
{
	$GLOBALS['fc_config']['db'] = array(
                 'host' => $parts[host],
                 'user' => $parts[user],
                 'pass' => $parts[pass],
                 'base' => substr($parts[path],1),
                 'pref' => $pref,
		 'users_table' => $users_table,
		 'sessions_table' => $sessions_table,
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
if( is_file("includes/bootstrap.inc") )
	$GLOBALS['fc_config']['cms'] = new drupalCMS();

	//clear 'if moderator' message
	foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
		$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
	}
?>