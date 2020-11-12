<?php
	define('IN_PHPBB', true);

	$phpbb_root_path  = realpath(dirname(__FILE__) . '/../../../') . '/';

	include($phpbb_root_path . 'extension.inc');
	include($phpbb_root_path . 'common.'.$phpEx);
	include($phpbb_root_path . 'config.php');
	error_reporting(E_ALL ^ E_NOTICE);

//$fp = fopen(realpath(dirname(__FILE__))."/debug/debug".time().".txt", "w");

class PhpBB2CMS {
	var $loginStmt;
	var $loggedinStmt;
	var $getUserStmt;
	var $getUsersStmt;
	var $userid;

	function PhpBB2CMS() {

		$this->loginStmt = new Statement("SELECT user_id FROM {$GLOBALS['table_prefix']}users WHERE username=? AND user_password=md5(?) AND user_active<>0 LIMIT 1");
		$this->loggedinStmt = new Statement("SELECT session_user_id as id FROM {$GLOBALS['table_prefix']}sessions WHERE session_id=?");
		$this->configStmt = new Statement("SELECT config_value FROM {$GLOBALS['table_prefix']}config WHERE config_name='cookie_name'");
		$this->getUserStmt = new Statement("SELECT user_id as id, username as login, user_level FROM {$GLOBALS['table_prefix']}users WHERE user_id=? AND user_active<>0 LIMIT 1");
		$this->getUsersStmt = new Statement("SELECT user_id as id, username as login FROM {$GLOBALS['table_prefix']}users ORDER BY login");
		$this->getPhotoStmt = new Statement("SELECT user_avatar FROM {$GLOBALS['table_prefix']}users WHERE user_id=? AND user_active<>0 LIMIT 1");
	}

	function isLoggedIn() {
		$userdata = session_pagestart($GLOBALS['user_ip'], PAGE_FAQ);
		init_userprefs($userdata);
		return ($userdata['user_id'] > 0) ? $userdata['user_id'] : null;
	}

	function login($login, $password)
	{
		//$login = utf8_decode( $login ) ;//umlavta characters fix

		if($login && $password && ($rs = $this->loginStmt->process($login,$password)) && ($rec = $rs->next())) {
			session_begin($rec['user_id'], $GLOBALS['user_ip'], PAGE_INDEX, FALSE, FALSE);
			return $rec['user_id'];
		}

		return null;
	}

	function logout()
	{
		/*
			$userdata = session_pagestart($GLOBALS['user_ip'], PAGE_FAQ);
			session_end($userdata['session_id'], $userdata['user_id']);
		*/
	}

	function getUser($userid)
	{
		if($userid == SPY_USERID) return null;

		//fwrite($GLOBALS['fp'], "llada a getuser:".print_r($userid, true)."\n");

		if($userid && ($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next())) {
			if ($rec['user_level'] >= 1) {

                           if ($rec['user_level'] == 1) {
                        	$rec['roles'] = ROLE_ADMIN;
				$rec['user_level'] = ROLE_ADMIN;
                           }else{
                        	$rec['roles'] = ROLE_MODERATOR;
				$rec['user_level'] = ROLE_MODERATOR;
                           }

                        }
			elseif ($GLOBALS['fc_config']['liveSupportMode']) {
				$rec['roles'] = ROLE_CUSTOMER;
				$rec['user_level'] = ROLE_CUSTOMER;
			}
			else {
				$rec['roles'] = ROLE_USER;
				$rec['user_level'] = ROLE_USER;
			}
			//fwrite($GLOBALS['fp'], "rec:".print_r($rec, true)."\n");
			//$rec['login'] = utf8_encode( $rec['login'] );//umlavta characters fix
			return $rec;
		} else {
			return null;
		}
	}

	function getUsers() {
		return $this->getUsersStmt->process();
	}

	function getUserProfile($userid) {
		if($user = $this->getUser($userid)) {
			return (($id = $this->isLoggedIn()) && ($id == $userid))?"../profile.php?mode=editprofile":"../profile.php?mode=viewprofile&u=$userid";
		} else {
			return null;
		}
	}

	function getPhoto($userid)
	{
		$rs = $this->getPhotoStmt->process($userid);
		if(($rec = $rs->next()) == null) return '';

		$fileExt = explode(',', $GLOBALS['fc_config']['photoloading']['allowFileExt']);

		$oldFile = './temp/nick_image/' . $userid . '.';
		$fs = reset($fileExt);

		while($fs) {
			if(file_exists($oldFile . $fs)) return $oldFile . $fs;
			$fs = next($fileExt);
		}

		return '../images/avatars/'.$rec['user_avatar'];
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

$GLOBALS['fc_config']['db'] = array(
	'host' => $dbhost,
	'user' => (isset($dbuser) ? $dbuser : $dbuname),
	'pass' => $dbpasswd,
	'base' => $dbname,
	'pref' => $table_prefix . 'fc_',
	);

$GLOBALS['fc_config']['cms'] = new PhpBB2CMS();

//fwrite($GLOBALS['fp'], print_r($GLOBALS['fc_config'], true));

//clear 'if moderator' message
foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
		$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
	}
?>