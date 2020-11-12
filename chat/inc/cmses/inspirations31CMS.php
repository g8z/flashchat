<?php

	if ( !defined( 'INC_DIR' ) ) {
		die( 'hacking attempt' );
	}

	@session_start();
	define('IN_APP',1);
	$root_path  = realpath(dirname(__FILE__).'/../../..') . '/';


	if( is_file($root_path . 'config.php') )
		require_once($root_path . 'config.php');

	error_reporting(E_ALL ^ E_NOTICE);

class Inspirations31CMS
{
	var $loginStmt;
	var $loggedinStmt;
	var $getUserStmt;
	var $getUsersStmt;
	var $userid;

	function Inspirations31CMS()
	{
		$this->loginStmt    = new Statement("SELECT * FROM ".DB_PREFIX."users WHERE login = ? AND pass = ?");
		$this->getUserStmt  = new Statement("SELECT ID as id, login, utype as type FROM ".DB_PREFIX."users WHERE ID=? LIMIT 1");
		$this->getUsersStmt = new Statement("SELECT ID as id, login FROM ".DB_PREFIX."users ORDER BY login");
		$this->getPhotoStmt = new Statement("SELECT image_data, image_mime_type FROM ".DB_PREFIX."items WHERE ID = ?");

		//$this->getUserInfo  = new Statement("SELECT * FROM user WHERE id=? LIMIT 1");*/
		$this->userid = $_SESSION['INSP']['UID'];
	}

	function isLoggedIn()
	{
		return  $this->userid;
	}

	function login($login, $password)
	{
		//$login = utf8_decode( $login ) ;//umlavta characters fix
		$rs  = $this->loginStmt->process($login,md5($password));
		if($rs->hasNext()) $rec = $rs->next();
		if($login && $password && $rec)
		{
			$this->userid = $rec['ID'];
			return $rec['ID'];
		}

		return null;
	}

	function logout()
	{
	}

	function getUser($userid)
	{

		if($userid == SPY_USERID) return null;

		if($userid && ($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next()))
		{

			if( $rec['type'] == '' ) $rec['type'] = -1;

			switch( $rec['type'] )
			{
				case 9 : $rec['roles'] = ROLE_ADMIN;     break;
				//case 5 : $rec['roles'] = ROLE_MODERATOR; break;

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
		/*if($user = $this->getUser($userid))
		{
			return "../profile.php?id=$userid";
		}
		else
		{

		}*/
		return null;
	}

	function getPhoto($userid)
	{
		$rs = $this->getPhotoStmt->process($userid);
		if(($rec = $rs->next()) == null) return '';

		//$user = this->getUser($userid);
		if( $rec )
		{
			$exten = substr($rec['image_mime_type'],strrpos($rec['image_mime_type'],'/' )+1);
			$handle = fopen("nick_image/image_".$userid.".".$exten, "wb");
			fwrite($handle, $rec['image_data']);
			fclose( $handle );
			return "nick_image/image_".$userid.".".$exten;

		}
		else
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
        return NULL;
		// 'M' for Male, 'F' for Female, NULL for undefined
		/*$rs = $this->getUserInfo->process($userid);
		$rs = $rs->next();

		if( $rs['gender']{0} == '' ) return NULL;

        return  strtoupper( $rs['gender']{0} );*/
    }
}

if( is_file($root_path . 'config.php') )
{
	$GLOBALS['fc_config']['db'] = array(
		'host' => DB_HOST,
		'user' => DB_USER,
		'pass' => DB_PASSWORD,
		'base' => DB_NAME,
		'pref' => DB_PREFIX.'fc_',
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
if( is_file($root_path . 'config.php') )
$GLOBALS['fc_config']['cms'] = new Inspirations31CMS();

?>