<?php
/*
$Revision: 3.7.2.5 $  
$Date: 2009/10/07 00:29:26 $ 

Written By Paul Marsden. 
This CMS file is for Flashchat integration with vBulletin 3.7
This is the standard version to be supplied with Flashchat by Tufat.com.
*/

// Usergroup Definitions //
$users = '2' ; // Allowed standard access.
$banned = '1,8' ; // Banned from any access.
$moderators = '5,7' ; // Allowed access as moderators.
$administrators = '6' ; // Allowed access as administrators.
$customers = '0' ; // Allowed access as customers (Live Support Mode only)

class vBulletinCMS
{
	// Initialise CMS
	function vBulletinCMS()
	{
		$prefix = $GLOBALS['vbulletin']['prefix'];
		$this->loginStmt = new Statement("SELECT *, userid AS id FROM {$prefix}user WHERE username=?");
		$this->getUserStmt = new Statement("SELECT *, userid AS id, username AS login FROM {$prefix}user WHERE userid=?");
		$this->getUsersStmt = new Statement("SELECT *, userid AS id, username AS login FROM {$prefix}user");
		$this->getUserForSession = new Statement("SELECT * FROM {$prefix}session WHERE sessionhash=? ORDER BY lastactivity DESC");
		$this->getAvatar = new Statement("SELECT * FROM {$prefix}customavatar WHERE userid = ? AND visible = 1");

		$this->session = $_COOKIE[$GLOBALS['vbulletin']['cookie'] . 'sessionhash'];
		if($_SESSION['fc_users_cache']['sessionhashid'] != $this->session)
		{
			$rs = $this->getUserForSession->process($this->session);
			if($rs)
			{
				$rec = $rs->next();
				$this->userid = intval($rec['userid']);
				$_SESSION['fc_users_cache']['sessionuserid'] = $this->userid;
				$_SESSION['fc_users_cache']['sessionhashid'] = $this->session;
			}
			else
			{
				$this->userid = 0;
			}
		}
		else
		{
			$this->userid = $_SESSION['fc_users_cache']['sessionuserid'];
		}
	}

	// Auto Login
	function isLoggedIn()
	{
			$userid = $this->userid;
			if($userid > 0)
			{
				unset ($_SESSION['fc_users_cache'][$userid]);
				unset ($_SESSION['fc_roles_cache'][$userid]); 
			}
			return $userid;
	}

	// Manual Login
	function login($login, $password)
	{
			$rv = NULL;
			if ($login == '_int_') return $this->userid;
			if($GLOBALS['fc_config']['loginUTF8decode'])
			{
				$login = utf8_to_entities($login);
				$rs = $this->loginStmt->process(utf8_decode($login));
			}
			else
			{
				$rs = $this->loginStmt->process($login);
			}
			if($rs)
			{
				$rec = $rs->next();
				if($GLOBALS['fc_config']['loginUTF8decode'])
				{
					$password = utf8_to_entities($password);
					if(($rec['password'] == md5(md5(utf8_decode($password)) . $rec['salt']))) $userid = $rec['id'];
				}
				else
				{
					if(($rec['password'] == md5(md5($password) . $rec['salt']))) $userid = $rec['id'];
				}
			}
			if($userid > 0)
			{
				unset ($_SESSION['fc_users_cache'][$userid]);
				unset ($_SESSION['fc_roles_cache'][$userid]); 
			}
			return $userid;
	}

	// Logout
	function logout()
	{
		$_SESSION['fc_users_cache']['sessionhashid'] = '#';
		return NULL;
	}

	// Assign chat role
	function getRoles($usergroups)
	{
		// Check UserGroups Allowed Access
		$groups = explode(',',$usergroups);
		$userrole = ROLE_ANY ; // Default //
		foreach ($GLOBALS['vbulletin']['users'] as $group) if (in_array($group,$groups)) $userrole = ROLE_USER;
		if ($GLOBALS['fc_config']['liveSupportMode']) 
		{
			foreach ($GLOBALS['vbulletin']['customer'] as $group) if (in_array($group,$groups)) $userrole = ROLE_CUSTOMER;
		}
		foreach ($GLOBALS['vbulletin']['mods'] as $group) if (in_array($group,$groups)) $userrole = ROLE_MODERATOR;
		foreach ($GLOBALS['vbulletin']['admin'] as $group) if (in_array($group,$groups)) $userrole = ROLE_ADMIN;
		foreach ($GLOBALS['vbulletin']['banned'] as $group) if (in_array($group,$groups)) $userrole = ROLE_NOBODY; 
		return $userrole;
	}

	// Get user details
	function getUser($userid)
	{
		$rs = $this->getUserStmt->process($userid);
		if($rs)
		{
			$rec = $rs->next();
			$rec['usergroups'] = $rec['usergroupid'] ;
			if(intval($rec['membergroupids'])) $rec['usergroups'] .= ",".$rec['membergroupids'] ;
			if(intval($rec['infractiongroupids'])) $rec['usergroups'] .= ",".$rec['infractiongroupids'] ;
			$rec['roles'] = $this->getRoles($rec['usergroups']);
			if($GLOBALS['fc_config']['loginUTF8decode'])
			{
				$tagencoded = entities_to_utf8($rec['login']);
				if(strlen($rec['login']) > strlen($tagencoded)) $rec['login'] = $tagencoded;
				else $rec['login'] = utf8_encode($rec['login']);
			}
			$_SESSION['fc_users_cache'][$userid] = $rec;
			$_SESSION['fc_roles_cache'][$userid] = $rec['roles'];
			return $rec;
		}
		return null;
	}

	// Return all existing users
	function getUsers()
	{
		return $this->getUsersStmt->process();
	}

	// Returns URL of user profile page for such user id or null if user not found
	function getUserProfile($userid)
	{
		return ($this->userid == $userid) ? "../profile.php?do=editprofile" : "../member.php?u=$userid";
	}

	// Check if user is in a specific role
	function userInRole($userid, $role)
	{
		if(!intval($userid))
		{
			return false;
		}
		$user = $this->getUser($userid) ;
		if($role == $user['roles']) return true;
		return false;
	}

	// Get male or female
	function getGender($user)
	{
		return NULL;
	}

	// Get current profile picture or avatar
	// This function is only supported if you use the database storage method in vbulletin
	function getPhoto($userid)
	{
		if($_SESSION['fc_users_cache'][$userid]['pid'] == $userid)
		{
			return $_SESSION['fc_users_cache'][$userid]['fpath'];
		}
		$rs = $this->getAvatar->process($userid);
		$rec = $rs->next();
		if($rec['filedata'] == '') return '';
		$fparts = explode('.', $rec['filename']);
		$fextn  = $fparts[count($fparts)-1];
		$fname  = '$'.substr('000000'.$userid,-6).'$'.$rec['dateline'];
		$fpath  = './images/cust_img/'.$fname.'.'.$fextn;
		if(!file_exists($fpath))
		{
			$fp = fopen($fpath, 'wb');
			fwrite($fp, $rec['filedata']);
			fflush($fp);
			fclose($fp);
		}
		$_SESSION['fc_users_cache'][$userid]['pid'] = $userid;
		$_SESSION['fc_users_cache'][$userid]['fpath'] = $fpath;
		return $fpath;
	}
}

// Security check
if (!defined('INC_DIR')) 
{
	exit('Error 01 - Please consult you system administrator.');
}

// Find vbroot
$vbroot = realpath(dirname(__FILE__)).'/../../../';

// Get vb config
if (!include_once($vbroot.'includes/config.php')) 
{
	exit('Error 02 - vbulletin config file not loaded, check you have the correct path.');
}

// Clear login page moderator message 
foreach($GLOBALS['fc_config']['languages'] as $k => $v)
{
	$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

// Get vbulletin config settings
$GLOBALS['fc_config']['db'] = array(
	'base' => $config['Database']['dbname'],
	'user' => $config['MasterServer']['username'],
	'pass' => $config['MasterServer']['password'],
	'pref' => $GLOBALS['fc_config']['db']['pref'],
	'host' => $config['MasterServer']['servername'],
);

// Add tcp port if specified
if($config['MasterServer']['port'])
{
	$GLOBALS['fc_config']['db']['host'] .= ':'.$config['MasterServer']['port'];
}

// vBulletin settings
$GLOBALS['vbulletin'] = array(
	'mods' => explode(',',$moderators), 'admin' => explode(',',$administrators), 
	'cookie' => $config['Misc']['cookieprefix'], 'prefix' => $config['Database']['tableprefix'],
	'users' => explode(',',$users), 'customer' => explode(',',$customers), 'banned' => explode(',',$banned)  
);

// Initiate class
$GLOBALS['fc_config']['cms'] = new vBulletinCMS();

?>
