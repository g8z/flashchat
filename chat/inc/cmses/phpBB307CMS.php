<?php
	error_reporting(E_ALL ^ E_NOTICE);

	if ( !defined( 'INC_DIR' ) ) {
		die( 'hacking attempt' );
	}

	define('IN_PHPBB', true);

	$phpbb3_root_path  = realpath(dirname(__FILE__) . '/../../../') . '/';

	include($phpbb3_root_path . 'config.php');
	include($phpbb3_root_path . 'includes/functions.php');
	include($phpbb3_root_path . 'includes/constants.php');

class PhpBB30CMS
{
	var $loginStmt;
	var $getPasswordStmt;
	var $getUserStmt;
	var $getUsersStmt;
	var $getPhotoStmt;
	var $getLoggedStmt;
	var $userid;

	function PhpBB30CMS()
	{
		$this->loginStmt 		= new Statement("SELECT user_id FROM {$GLOBALS['table_prefix']}users WHERE username=?  LIMIT 1");
		$this->getPasswordStmt	= new Statement("SELECT user_password FROM {$GLOBALS['table_prefix']}users WHERE username=?  LIMIT 1");
		$this->getUserStmt 		= new Statement("SELECT user_id as id, username as login, user_rank, user_type FROM {$GLOBALS['table_prefix']}users WHERE user_id=? LIMIT 1");
		$this->getUsersStmt 	= new Statement("SELECT user_id as id, username as login FROM {$GLOBALS['table_prefix']}users ORDER BY login");
		$this->getPhotoStmt 	= new Statement("SELECT config_value FROM {$GLOBALS['table_prefix']}config WHERE config_name='avatar_salt' LIMIT 1");
		$this->getLoggedStmt    = new Statement("SELECT config_value FROM {$GLOBALS['table_prefix']}config WHERE config_name='cookie_name' LIMIT 1");
		// select auth_role_id from *_acl_users table, which contains moderator permissions. artemK0
		$this->getModeratorStmt = new Statement("SELECT auth_role_id FROM {$GLOBALS['table_prefix']}acl_users WHERE user_id=? LIMIT 1");

	}

	function isLoggedIn()
	{
		$rs = $this->getLoggedStmt->process();
		$rl = $rs->next();
		$cookie_name = $rl['config_value'] . '_u';
		if( isset($GLOBALS['_COOKIE'][$cookie_name]) && $GLOBALS['_COOKIE'][$cookie_name] != ANONYMOUS)
		{
			return $GLOBALS['_COOKIE'][$cookie_name];
		}
		return null;
	}

	function login($username, $password)
	{
		$rp  = $this->getPasswordStmt->process($username);
		$rep = $rp->next();

		if($username && $password && ($rs = $this->loginStmt->process($username)) && ($rec = $rs->next()) && (phpbb_check_hash($password, $rep['user_password'])))
		{
			return $rec['user_id'];
		}

		return false;
	}

	function logout()
	{
	}

	function getUser($userid)
	{
		if($userid == SPY_USERID) return null;
		if($userid && ($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next()))
		{
			if ($rec['user_type'] >= 1)
			{
				if ($rec['user_type'] == 3)
				{
					$rec['roles'] = ROLE_ADMIN;
				    $rec['user_level'] = ROLE_ADMIN;
                }
				else
				{
					$rec['roles'] = ROLE_MODERATOR;
				    $rec['user_level'] = ROLE_MODERATOR;
                }

	        }
	        // [BEGIN added on 3.12.07] user_type in 3.0.RC8 is no longer contains in *_users table. Now all moderator permissions is in *_acl_users table. artemK0
	        elseif(($rec['user_type'] == 0) && ($rs_mod = $this->getModeratorStmt->process($userid)) && ($rec_mod = $rs_mod->next()))
	        {
	        	// if auth_role_id==10 it means that user have permission "Full Moderator". artemK0
	        	if($rec_mod['auth_role_id']=="10")
	        	{
	        		$rec['roles'] = ROLE_MODERATOR;
				    $rec['user_level'] = ROLE_MODERATOR;
				}
	        }
	        // [END added on 3.12.07]
			elseif ($GLOBALS['fc_config']['liveSupportMode'])
			{
				$rec['roles'] = ROLE_CUSTOMER;
				$rec['user_type'] = ROLE_CUSTOMER;
			}
			elseif ($rec['user_rank'] >= 0)
	        {
	    		$rec['roles'] = ROLE_USER ;
	            $rec['user_type'] = ROLE_USER;
	            switch($rec['user_rank'])
				{
	            	case 2: $rec['roles'] = ROLE_USER ; 		break;
	               	case 2: $rec['user_type'] = ROLE_USER; 		break;
	               	case 3: $rec['roles'] = ROLE_MODERATOR; 	break;
	               	case 3: $rec['user_type'] = ROLE_MODERATOR; break;
	               	default: $rec['roles'] = ROLE_USER ; 		break;
	            }
			}
			return $rec;
		}
		return null;

	}

	function getUsers()
	{
		return $this->getUsersStmt->process();
	}

	function getUserProfile($userid)
	{
		if($user = $this->getUser($userid))
		{
			return "../ucp.php?i=164";
			//return "../memberlist.php?mode=viewprofile&u=$userid";
		}
		return null;
	}

	function getPhoto($userid)
	{
		$rs = $this->getPhotoStmt->process();
		$rl = $rs->next();
		$name = $rl['config_value'] . '_' . $userid . '.jpg';

		return '../images/avatars/upload/' . $name;
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

$GLOBALS['fc_config']['cms'] = new PhpBB30CMS();

foreach($GLOBALS['fc_config']['languages'] as $k => $v)
{
		$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>