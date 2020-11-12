<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

    //$phpnuke_root_path = realpath(dirname(__FILE__) . '/../../../../') . '/';
    $phpnuke_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';

    //ini_set('include_path', $phpnuke_root_path);

    //echo $phpnuke_root_path;
    require_once($phpnuke_root_path.'config.php');


    class PHPNukeCMS {
        var $ulinStmt = null;
        var $alinStmt = null;
        var $sdelStmt = null;
        var $bdelStmt = null;
        var $ugetStmt = null;
        var $agetStmt = null;

        var $admin = null;
        var $user = null;

        function PHPNukeCMS() {
            $this->user_prefix = $GLOBALS['fc_config']['db']['pref'] . "_";

            $this->ulinStmt = new Statement("SELECT * FROM {$this->user_prefix}users WHERE username=? AND user_password=md5(?) LIMIT 1");
            $this->alinStmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}_authors WHERE aid=? AND pwd=md5(?) LIMIT 1");
            $this->sdelStmt = new Statement("DELETE FROM {$GLOBALS['fc_config']['db']['pref']}_session WHERE uname=?");
            $this->bdelStmt = new Statement("DELETE FROM {$GLOBALS['fc_config']['db']['pref']}_bbsessions WHERE session_user_id=?");
            $this->ugetStmt = new Statement("SELECT user_id AS id, username AS login FROM {$this->user_prefix}users WHERE user_id=? LIMIT 1");
            $this->agetStmt = new Statement("SELECT aid AS id, aid AS login FROM {$GLOBALS['fc_config']['db']['pref']}_authors WHERE aid=? LIMIT 1");
            $this->getUsersStmt = new Statement("SELECT user_id AS id, username AS login FROM {$this->user_prefix}users ORDER BY username");

            if(isset($_COOKIE['admin'])) $this->admin = $_COOKIE['admin'];
            if(isset($_COOKIE['user'])) $this->user = $_COOKIE['user'];
        }

        function isLoggedIn() {
            if($this->user) {
                $u = base64_decode(urldecode($this->user));
                $u = explode(":", $u);
                return $u[0];
            }

            return null;
        }

        function login($login, $password) {
            if(($rs = $this->alinStmt->process($login, $password)) && ($u = $rs->next())) {
                $str = "{$u['aid']}:{$u['pwd']}:{$u['admlanguage']}";
                $this->admin = base64_encode($str);
                setcookie("admin", "{$this->admin}", time()+2592000, '/');
            }

            if(($rs = $this->ulinStmt->process($login, $password)) && ($u = $rs->next())) {
                $str = "{$u['user_id']}:{$u['username']}:{$u['user_password']}:{$u['storynum']}:{$u['umode']}:{$u['uorder']}:{$u['thold']}:{$u['noscore']}:{$u['ublockon']}:{$u['theme']}:{$u['commentmax']}";
                $this->user = base64_encode($str);
                setcookie("user", "{$this->user}", time()+2592000, '/');

                return $u['user_id'];
            }

            return null;
        }

        function logout(){
            /*
            if($this->user) {
                $u = base64_decode($this->user);
                $u = explode(":", $u);

                $this->sdelStmt->process($u[1]);
                $this->bdelStmt->process($u[0]);

                setcookie('user');
                $this->user = null;
            }

            if($this->admin) {
                setcookie('admin');
                $this->admin = null;
            }
            */
        }

        function getUser($userid) {
            $u = null;

            if(($rs = $this->ugetStmt->process($userid)) && ($u = $rs->next())) {
                $u['roles'] = $GLOBALS['fc_config']['liveSupportMode']?ROLE_CUSTOMER:ROLE_USER;
                if(($rs = $this->agetStmt->process($u['login'])) && ($a = $rs->next())) $u['roles'] = ROLE_ADMIN;
            }

            return $u;
        }

        function getUsers() {
            return  $this->getUsersStmt->process();
        }

        function getUserProfile($userid) {
            if($userid == SPY_USERID) return null;

            if($user = $this->getUser($userid)) {
                return (($id = $this->isLoggedIn()) && ($id == $userid))?"../../modules.php?name=Your_Account&op=edituser":"../../modules.php?name=Forums&file=profile&mode=viewprofile&u=$userid";
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

    $GLOBALS['fc_config']['cms'] = new PHPNukeCMS();

    $GLOBALS['fc_config']['base'] = 'modules/FlashChat/';

    $GLOBALS['fc_config']['db'] = array(
                         'host' => $GLOBALS['dbhost'],
                         'user' => $GLOBALS['dbuname'],
                         'pass' => $GLOBALS['dbpass'],
                         'base' => $GLOBALS['dbname'],
                         'pref' => $GLOBALS['prefix'] . 'fc_',
                     );


    //clear 'if moderator' message
    foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
        $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
    }
?>