<?php
/*
 * chatserver - line 107
 */
	if ( !defined( 'INC_DIR' ) ) {
		die( 'hacking attempt' );
	}

	if( ! session_name() ) session_start();

	$phpfox_root_path  = realpath(dirname(__FILE__) . '/../../../') . '/';

//		error_reporting(E_ALL ^ E_NOTICE);
	require_once($phpfox_root_path . 'include/settings/server.sett.php');
	/*if( is_file($phpfox_root_path . 'phpfox_config.php') )
	{
		require_once($phpfox_root_path . 'phpfox_config.php');
	}*/

//$fp = fopen(realpath(dirname(__FILE__))."/debug/debug".time().".txt", "w");

class phpFoxCMS
{
	var $loginStmt;
	var $loggedinStmt;
	var $getUserStmt;
	var $getUsersStmt;
	var $userid;

	function phpFoxCMS($pref)
	{
		$this->loginStmt    = new Statement("SELECT id FROM {$pref}user WHERE `user`=? AND password=md5(?) LIMIT 1");
//		echo "SELECT id as id, user as login, type FROM {$pref}user WHERE id=? LIMIT 1";
		$this->getUserStmt  = new Statement("SELECT id as id, user as login, type FROM {$pref}user WHERE id=? LIMIT 1");
		$this->getUsersStmt = new Statement("SELECT id as id, user as login FROM {$pref}user ORDER BY login");
		$this->getPhotoStmt = new Statement("SELECT img, user as login FROM {$pref}user WHERE id=? LIMIT 1");

		$this->getUserInfo  = new Statement("SELECT * FROM {$pref}user WHERE id=? LIMIT 1");
	}

	function isLoggedIn()
	{

		$uID = null;
		if( $_SESSION['phpfox_id'] ) $uID = $_SESSION['phpfox_id'];
		elseif( $_COOKIE['phpfox_id'] ) {
			$uID = $_COOKIE['phpfox_id'];
		}
		else $uID = null;

		return  $uID;
	}

	function login($login, $password)
	{
		//$login = utf8_decode( $login ) ;//umlavta characters fix
		$rs  = $this->loginStmt->process($login,$password);
		if($rs->hasNext()) $rec = $rs->next();
		if($login && $password && $rec)
		{
			$this->userid = $rec['id'];
			return $rec['id'];
		}

		return null;
	}

	function logout()
	{
	}

	function getUser($userid)
	{
		if($userid == SPY_USERID) return null;

		$rs = $this->getUserStmt->process($userid);
		if($userid && ($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next()))
		{

			if( $rec['type'] == '' ) $rec['type'] = -1;

			switch( $rec['type'] )
			{
				case 0 : $rec['roles'] = ROLE_ADMIN;     break;
				case 5 : $rec['roles'] = ROLE_MODERATOR; break;

				default :
						if( $GLOBALS['fc_config']['liveSupportMode'] )
						{
							$rec['roles'] = ROLE_CUSTOMER;
						}
						else
						{
							$rec['roles'] = ROLE_USER;
						}
				 	break;
			}

			return $rec;
		}

		return null;
	}

	function getUsers()
	{
		return 	$this->getUsersStmt->process();
	}

	function getUserProfile($userid)
	{
		if($user = $this->getUser($userid))
		{
			return "../profile.php?id=$userid";
		}
		else
		{
			return null;
		}
	}

	function getPhoto($userid)
	{
		/*$rs = $this->getPhotoStmt->process($userid);
		if(($rec = $rs->next()) == null) return '';

		//$user = this->getUser($userid);

		$fName = '../member/i/p/' . $rec['img'] . '/' . $rec['login'] . '.jpg';

		if( file_exists($fName) && is_file($fName) ) return $fName;
*/
		return '';
	}

	function userInRole($userid, $role)
	{
		if($user = $this->getUser($userid))
		{
			return ($user['roles'] == $role);
		}
		return false;
	}

	function getGender($userid)
	{
        // 'M' for Male, 'F' for Female, NULL for undefined
		$rs = $this->getUserInfo->process($userid);
		$rs = $rs->next();

		if( $rs['gender']{0} == '' ) return NULL;

        return  strtoupper( $rs['gender']{0} );
    }
}
global $_CONF;



$GLOBALS['fc_config']['db'] = array(
	'host' => $_CONF['db']['host'],
	'user' => $_CONF['db']['user'],
	'pass' => $_CONF['db']['pass'],
	'base' => $_CONF['db']['name'],
	'pref' => $_CONF['db']['prefix'].'fc_',
	);
/*else
{
		$GLOBALS['fc_config']['db'] = array(
                 'host' => "",
                 'user' => "",
                 'pass' => "",
                 'base' => "",
                 'pref' => "",
                 );
}*/
	$GLOBALS['fc_config']['cms'] = new phpFoxCMS($_CONF['db']['prefix']);

//fwrite($GLOBALS['fp'], print_r($GLOBALS['fc_config'], true));

//clear 'if moderator' message
foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
		$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}
?>