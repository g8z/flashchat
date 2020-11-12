<?php

//------------------------------------------
//
// Joomla 1.0.15 and Joomla 1.5.6 FlashChat 5 integration script rewritten by Veronica August 28, 2008
// Tested with FlashChat 5.0.7 will probably work with 4.7.12 too
// Updated with session time and user table validations during autologin by Veronica September 16, 2008
//
// Chat Owner Configurations:
//                username/name switch
//                additional Admin and Moderators based on gid numbers by adding lines to function getRoles($gid))
//                profile link based on Joomla user plugin examples are:
//          	  '../component/option,com_comprofiler/task,userProfile/user,'
//                '../index.php?option=com_comprofiler&task=userProfile&user='
//                '../index.php?option=com_user&task=UserDetails&Itemid='
//
//------------------------------------------

if(!defined('INC_DIR')) die('hacking attempt');

$joomla_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';
require_once($joomla_root_path . "configuration.php");

class JoomlaCMS {

        var $username = true;                   // set to false to use name as login name to display in chat
        var $joomlaProfilePageLink = '';        // insert your profile link here without userid number value

        var $userid = null;
        var $loginStmt;
        var $sessionStmt;
        var $getUserStmt;
        var $getUsersStmt;

        function JoomlaCMS() {

                $this->loginStmt     = new Statement("SELECT id, password FROM {$GLOBALS['fc_config']['db']['joomlaprefix']}users WHERE (username=? OR name=?) AND block=? LIMIT 1");
                $this->sessionStmt   = new Statement("SELECT userid FROM {$GLOBALS['fc_config']['db']['joomlaprefix']}session WHERE session_id=? AND time>? LIMIT 1");
                $this->getUserStmt   = new Statement("SELECT id, username AS login, name, gid FROM {$GLOBALS['fc_config']['db']['joomlaprefix']}users WHERE id=? LIMIT 1");
                $this->getUsersStmt  = new Statement("SELECT id, username AS login, name FROM {$GLOBALS['fc_config']['db']['joomlaprefix']}users");
         }

        function isLoggedIn() {

				$sessionTime = time() - $GLOBALS['fc_config']['db']['joomlaSessionTime'];
				$tempUserid = null;
				
				if(class_exists('JConfig')) {
					$session_id = md5(md5($GLOBALS['fc_config']['db']['joomlacookie']));
					if(isset($_COOKIE[$session_id]) && ($rs = $this->sessionStmt->process($_COOKIE[$session_id], $sessionTime)) && ($rec = $rs->next()) && $rec['userid']) $tempUserid = $rec['userid'];
				} else {
					global $mosConfig_live_site, $mosConfig_secret;
					if(substr($mosConfig_live_site, 0, 7) == 'http://')       $hash = md5( 'site' . substr( $mosConfig_live_site, 7 ) );
					elseif(substr($mosConfig_live_site, 0, 8) == 'https://')  $hash = md5( 'site' . substr( $mosConfig_live_site, 8 ) );
					else $hash = md5('site' . $mosConfig_live_site);

					if(isset($_COOKIE[$hash])) {
						$session_id = md5($mosConfig_secret . md5(strval($_COOKIE[$hash]) . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']));
						if(($rs = $this->sessionStmt->process($session_id, $sessionTime)) && ($rec = $rs->next()) && $rec['userid']) $tempUserid = $rec['userid'];
					}   elseif(isset($_COOKIE[md5($mosConfig_live_site)]) && ($rs = $this->sessionStmt->process(strval($_COOKIE[md5($mosConfig_live_site)]), $sessionTime)) && ($rec = $rs->next()) && $rec['userid']) $tempUserid = $rec['userid'];
				}
				if($tempUserid && ($user = $this->getUserStmt->process($tempUserid)) && ($rec = $user->next()) && $rec['login']) $this->userid = $tempUserid;

				return $this->userid;
        }

        function getRoles($gid) {

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

                if ($GLOBALS['fc_config']['liveSupportMode'] && $roles == ROLE_USER) return ROLE_CUSTOMER;

                return $roles;

        }

        function login($login, $password) {

                if(($rs = $this->loginStmt->process($login, $login, 0)) && ($rec = $rs->next()) && $rec['id']) {
                        $pwd = explode(':', $rec['password']);
                        if(md5($password . $pwd[1]) == $pwd[0]) $this->userid = $rec['id'];
                }
                return $this->userid;
        }

        function logout(){
                $this->user = null;
        }

        function getUser($userid) {

                if ($userid == SPY_USERID) return NULL;
                $rv = NULL;

                if(($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next())) {
                        $rec['roles'] = $this->getRoles($rec['gid']);
                        if(!$this->username) $rec['login'] = $rec['name'];
                        $rv = $rec;
                }
                return $rv;

        }

        function getGender($userid) {
                // 'M' for Male, 'F' for Female, NULL for undefined
                return NULL;
        }

        function getUsers() {
                return $this->getUsersStmt->process();
        }

        function getUserProfile($userid) {
                if ($userid == SPY_USERID) return NULL;
                if($this->joomlaProfilePageLink) return $this->joomlaProfilePageLink . $userid;
                return NULL;
        }

        function userInRole($userid, $role) {
                if($user = $this->getUser($userid)) return ($user['roles'] == $role);
                return false;
        }
}

if(class_exists('JConfig')) {
   $JoomlaConfig = new JConfig();
   $GLOBALS['fc_config']['db'] = array(
        'host' => $JoomlaConfig->host,
        'user' => $JoomlaConfig->user,
        'pass' => $JoomlaConfig->password,
        'base' => $JoomlaConfig->db,
        'pref' => $JoomlaConfig->dbprefix . "fc_",
        'joomlaprefix' => $JoomlaConfig->dbprefix,
        'joomlacookie' => $JoomlaConfig->secret . 'site',
        'joomlaSessionTime' => $JoomlaConfig->lifetime * 60,
        );
} else {
        $GLOBALS['fc_config']['db'] = array(
        'host' => $mosConfig_host,
        'user' => $mosConfig_user,
        'pass' => $mosConfig_password,
        'base' => $mosConfig_db,
        'pref' => $mosConfig_dbprefix . "fc_",
        'joomlaprefix' => $mosConfig_dbprefix,
        'joomlaSessionTime' => $mosConfig_lifetime,
        );
}

$GLOBALS['fc_config']['cms'] = new JoomlaCMS();

        foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
                $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
        }
?>