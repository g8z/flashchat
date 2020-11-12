<?php

        if(!defined('INC_DIR')) die('hacking attempt');

// integration class for Drupal (http://www.drupal.org/)
// written by Lophas, lophas@yahoo.com, Nov 7, 2006
// tested with FlashChat 4.7.6
// version 1.1

// Updated and tested for Drupal 5.8 and 6.4 and FlashChat 4.7.12/5.0.4 August15, 2008 by Veronica
// Added Moderator and Administrator Roles configurations
// Added support for Drupal Photo feature
// Updated for non-printable characters in Drupal database password
// Updated for bugs in autologin incl when Drupal is installed en web root
// Updated for accepting any user defined name for chat directory, old code is commented
// Updated for admin/moderator links in module including installations in the web root

// Updated January 02, 2009 by Veronica
// Settings folder configuration option includes domain and error message if not found
// MySQL parameters with urlencoded support

// Updated January 19, 2009 by Veronica
// Autologin fix when Drupal installed in web root (again)
// Updated January 21, 2009 by Veronica
// Fixed another bug in the cookie code for display of Admin/Moderator Panel links
// Fixed autologin when settings use another cookie domain

    $drupalroot = realpath(dirname(__FILE__) . '/../../../') . '/';


		$settingsFolder = 'default';
    if(!file_exists($drupalroot . "sites/" . $settingsFolder . "/settings.php")) {
			$settingsFolder = $_SERVER['HTTP_HOST'];
			if(!file_exists($drupalroot . "sites/" . $settingsFolder . "/settings.php")) die ('Drupal settings.php not found');
		}

		require_once($drupalroot . "sites/" . $settingsFolder . "/settings.php");

        if(strpos($_SERVER['SCRIPT_NAME'], 'install.php') > 0) error_reporting(E_ALL ^ E_NOTICE);

        class drupalCMS {

            var $administrators = array();        // set the Drupal rid numbers that are Admins in FlashChat example (3);
            var $moderators = array();            // set the Drupal rid numbers that are Moderators in FlashChat example (4,5);
            var $userid = null;
            var $loginStmt;
            var $getUserStmt;
            var $getUsersStmt;
            var $getSessionStmt;
            var $getSessionUid;
            var $getUserRoles;

            function drupalCMS() {
                $this->loginStmt      = new Statement("SELECT uid AS id, pass AS password, name AS login FROM ".$GLOBALS['fc_config']['db']['users_table']." WHERE status=1 AND name=?");
                $this->getUserStmt    = new Statement("SELECT uid AS id, pass AS password, name AS login, picture FROM ".$GLOBALS['fc_config']['db']['users_table']." WHERE status=1 AND uid=?");
                $this->getUsersStmt   = new Statement("SELECT uid AS id, name AS login FROM ".$GLOBALS['fc_config']['db']['users_table']." ORDER BY name");
                $this->getSessionStmt = new Statement("SELECT uid AS id, sid AS session_id FROM ".$GLOBALS['fc_config']['db']['sessions_table']." WHERE uid=?");
                $this->getSessionUid  = new Statement("SELECT uid AS id FROM ".$GLOBALS['fc_config']['db']['sessions_table']." WHERE sid=?");
                $this->getUserRoles   = new Statement("SELECT uid AS id, rid FROM ".$GLOBALS['fc_config']['db']['users_roles']." WHERE uid=?");
            }

            function isLoggedIn() {
                $drupal_sid = $_COOKIE['SESS' . md5($GLOBALS['fc_config']['db']['session_name'])];
                if($drupal_sid && ($rs = $this->getSessionUid->process($drupal_sid)) && ($rec = $rs->next()) && $rec['id'] > 0) $this->userid = $rec['id'];

                return $this->userid;
            }

            function login($login, $password) {

                $this->userid = null;
                if($login && $password && ($rs = $this->loginStmt->process($login)) && ($rec = $rs->next()) && ($rec['password'] == md5($password)) && $rec['id'] > 0) $this->userid = $rec['id'];
                return $this->userid;
            }

            function logout() {
                $this->userid = null;
            }

            function getUser($userid) {
                $u = null;

                if($userid && ($rs = $this->getUserStmt->process($userid)) && ($u = $rs->next())) {
                    $u['roles'] = $GLOBALS['fc_config']['liveSupportMode'] ? ROLE_CUSTOMER : ROLE_USER;
                    if($userid == 1) $u['roles'] = ROLE_ADMIN;
                    if(($rs = $this->getUserRoles->process($userid)) && ($rs->hasNext())) {
                        while($rec = $rs->next()) {
                            if(in_array($rec['rid'], $this->moderators))     $u['roles'] = ROLE_MODERATOR;
                            if(in_array($rec['rid'], $this->administrators)) $u['roles'] = ROLE_ADMIN;
                        }
                    }
                }

                return $u;
            }

            function getUsers() {
                return $this->getUsersStmt->process();
            }

            function getUserProfile($userid) {
                if($userid == SPY_USERID) return null;

                if(($rs = $this->getSessionStmt->process($userid)) && ($rec = $rs->next()) && $rec['id']) return '../index.php?q=user/' . $userid ;
                return null;
            }

            function userInRole($userid, $role) {

                if($user = $this->getUser($userid)) return ($user['roles'] == $role);
                return false;
            }

            function getGender($userid){
                        // 'M' for Male, 'F' for Female, NULL for undefined
                return NULL;

            }

            function getPhoto($userid) {

                $user = $this->getUser($userid);

                if($user != null && $user['picture'] != '' && strpos(strtolower($user['picture']), '.jpg') && file_exists('../' . $user['picture'])) return '../' . $user['picture'];

                return '';
            }

        }

        //global $db_url, $base_path, $base_url;

        if(is_array($db_url)) $parts = parse_url($db_url['default']);
        else $parts = parse_url($db_url);

        if(is_array($GLOBALS[db_prefix])) {
                $users_table = $GLOBALS[db_prefix][users] . "users";
                $sessions_table = $GLOBALS[db_prefix][sessions] . "sessions";
                $users_roles = $GLOBALS[db_prefix][sessions] . "users_roles";
                $pref = "fc_";
        } else {
                $users_table = $db_prefix . "users";
                $sessions_table = $db_prefix . "sessions";
                $users_roles = $db_prefix . "users_roles";
                $pref = $db_prefix . "fc_";
        }

		$http_host = preg_replace('/[^a-z0-9-:._]/i', '', $_SERVER['HTTP_HOST']);

		if(isset($base_path)) {
			if($base_path == '/') $session_name = $http_host;
			else $session_name = $http_host . '/' . trim($base_path, '/');
		} else {
			$session_name = $http_host;
			$chatDir = explode('/', str_replace('/inc/', '', str_replace(chr(92), '/', INC_DIR)));
			$dir = explode('/' . $chatDir[count($chatDir)-1], trim(dirname($_SERVER['SCRIPT_NAME']), '\,/'));
			if($dir[0] != '' && count($dir) > 1) $session_name .= "/" . $dir[0];
			$session_name = trim($session_name, '.');
		}


		// Create base URL
    	$base_root = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https' : 'http';
    	$base_url = $base_root .= '://'. $_SERVER['HTTP_HOST'];

	    // $_SERVER['SCRIPT_NAME'] can, in contrast to $_SERVER['PHP_SELF'], not
	    // be modified by a visitor.
	    if ($dir = trim(dirname($_SERVER['SCRIPT_NAME']), '\,/')) {
	      $dir = substr($dir,0,strrpos($dir,'/'));
	      $base_path = "/$dir";
	      $base_url .= $base_path;
	      $base_path .= '/';
	    }
	    else {
	      $base_path = '/';
	    }

		if(isset($base_url)) {
			list( , $session_name) = explode('://', $base_url, 2);
		}
    if ('/' == substr($session_name, -1)) {
      $session_name = substr($session_name, 0, strlen($session_name)-1);
    }

        $GLOBALS['fc_config']['db'] = array(
                 'host' => rawurldecode($parts['host']),
                 'user' => urldecode($parts['user']),
                 'pass' => urldecode($parts['pass']),
                 'base' => urldecode(substr($parts['path'], 1)),
                 'pref' => $pref,
                 'users_table' => $users_table,
                 'sessions_table' => $sessions_table,
                 'users_roles' => $users_roles,
                 'session_name' => $session_name,
                 );
        $GLOBALS['fc_config']['cms'] = new drupalCMS();
        //clear 'if moderator' message
        foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
                $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
        }
?>