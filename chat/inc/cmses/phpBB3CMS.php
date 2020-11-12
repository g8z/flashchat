<?php

	error_reporting(E_ALL ^ E_NOTICE);

	if ( !defined( 'INC_DIR' ) ) {
		die( 'hacking attempt' );
	}

	define('IN_PHPBB', true);

	// hack for phpBB 2.0.21 when register_globals is on

	if ( @ini_get('register_globals') == '1' || strtolower(@ini_get('register_globals')) == 'on' ) {

		if ( is_array( $HTTP_GET_VARS ) ) {
			$temp = array();

			foreach( $HTTP_GET_VARS as $key => $value ) {
				if ( $value != '' ) {
					$temp[$key] = $value;
				}
			}

			$HTTP_GET_VARS = $temp;
		}
	}

	$phpbb_root_path  = realpath(dirname(__FILE__) . '/../../../') . '/';

	if( is_file($phpbb_root_path . 'config.php') )
	{
		//include($phpbb_root_path . 'extension.inc');
		//include($phpbb_root_path . 'common.'.$phpEx);
		include($phpbb_root_path . 'config.php');
	}

//$fp = fopen(realpath(dirname(__FILE__))."/debug/debug".time().".txt", "w");

class PhpBB3CMS {
	var $loginStmt;
	var $loggedinStmt;
	var $getUserStmt;
	var $getUsersStmt;
	var $userid;

	function PhpBB3CMS() {
session_id()
		$this->loginStmt = new Statement("SELECT user_id FROM {$GLOBALS['table_prefix']}users WHERE username=? AND user_password=md5(?) LIMIT 1");
		$this->loggedinStmt = new Statement("SELECT session_user_id as id FROM {$GLOBALS['table_prefix']}sessions WHERE session_id=?");
		$this->configStmt = new Statement("SELECT config_value FROM {$GLOBALS['table_prefix']}config WHERE config_name='cookie_name'");
//Geno Mod - added user_rank to getUserStmt
		$this->getUserStmt = new Statement("SELECT user_id as id, username as login, user_rank, user_type FROM {$GLOBALS['table_prefix']}users WHERE user_id=? LIMIT 1");
		$this->getUsersStmt = new Statement("SELECT user_id as id, username as login FROM {$GLOBALS['table_prefix']}users ORDER BY login");
		$this->getPhotoStmt = new Statement("SELECT user_avatar FROM {$GLOBALS['table_prefix']}users WHERE user_id=? LIMIT 1");
	}

	function isLoggedIn() {

		/*$userdata = session_pagestart($GLOBALS['user_ip'], PAGE_FAQ);*/
		if( isset($GLOBALS['_COOKIE']['phpbb3_u']) )
		{
			return $GLOBALS['_COOKIE']['phpbb3_u'];
		}
		else
			null;
	}

	function login($login, $password)
	{
		//$login = utf8_decode( $login ) ;//umlavta characters fix
			if($login && $password && ($rs = $this->loginStmt->process($login,$password)) && ($rec = $rs->next()))
			{
				//session_begin( true );
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
			if ($rec['user_type'] >= 1) {

                           if ($rec['user_type'] == 3) {
                        	$rec['roles'] = ROLE_ADMIN;
				            $rec['user_level'] = ROLE_ADMIN;
                           }else{
                        	$rec['roles'] = ROLE_MODERATOR;
				            $rec['user_level'] = ROLE_MODERATOR;
                           }

                        }
			elseif ($GLOBALS['fc_config']['liveSupportMode']) {
				$rec['roles'] = ROLE_CUSTOMER;
				$rec['user_type'] = ROLE_CUSTOMER;
			}elseif ($rec['user_rank'] >= 0)
            {
              $rec['roles'] = ROLE_USER ;
              $rec['user_type'] = ROLE_USER;
         // Geno Mod - ADD CASE # LINES [in pairs] BELOW TO ADD MORE ADMINS OR MODERATORS WHERE # = RankID NUMBER
         // USERS MUST have a rank of 2 or they'll be banned!
              switch($rec['user_rank']) {
               case 2: $rec['roles'] = ROLE_USER ; break;
               case 2: $rec['user_type'] = ROLE_USER; break;
               case 3: $rec['roles'] = ROLE_MODERATOR; break;
               case 3: $rec['user_type'] = ROLE_MODERATOR; break;
               default: $rec['roles'] = ROLE_USER ; break;
              }
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
		if($user = $this->getUser($userid))
		{
			return "../memberlist.php?mode=viewprofile&u=$userid";
		}
		else
		{
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

		return '../images/avatars/upload/'.$rec['user_avatar'];
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
if( is_file($phpbb_root_path . 'config.php') )
{
$GLOBALS['fc_config']['db'] = array(
	'host' => $dbhost,
	'user' => (isset($dbuser) ? $dbuser : $dbuname),
	'pass' => $dbpasswd,
	'base' => $dbname,
	'pref' => $table_prefix . 'fc_',
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

if( is_file($phpbb_root_path . 'config.php') )
	$GLOBALS['fc_config']['cms'] = new PhpBB3CMS();

//fwrite($GLOBALS['fp'], print_r($GLOBALS['fc_config'], true));

//clear 'if moderator' message
foreach($GLOBALS['fc_config']['languages'] as $k => $v)
{
		$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>