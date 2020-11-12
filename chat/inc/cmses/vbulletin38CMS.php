<?php
/*
$Revision: 4.1.4.8 $
$Date: 2009/10/07 00:29:26 $

Written By Paul Marsden.
This CMS file is for Flashchat integration with vBulletin 3.8
This is the standard version to be supplied with Flashchat by Tufat.com.
*/

// Usergroup Definitions //
$users = '2' ; // Allowed standard access.
$banned = '1,8' ; // Banned from any access.
$moderators = '5,7' ; // Allowed access as moderators.
$administrators = '6' ; // Allowed access as administrators.
$customers = '0' ; // Allowed access as customers (Live Support Mode only)

// Main Class //
class vBulletinCMS
{
	// Initialise CMS //
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

	// Auto Login //
	function isLoggedIn()
	{
		unset ($_SESSION['fc_users_cache'][$this->userid]);
		unset ($_SESSION['fc_roles_cache'][$this->userid]);
		return $this->userid;
	}

	// Manual Login //
	function login($login, $password)
	{
		if ($login == '_int_')
		{
			return $this->userid;
		}
		else
		{
			$userid = 0;
		}
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
				if(($rec['password'] == md5(md5(utf8_decode($password)).$rec['salt'])))
				{
					$userid = $rec['id'];
				}
			}
			else
			{
				if(($rec['password'] == md5(md5($password).$rec['salt'])))
				{
					$userid = $rec['id'];
				}
			}
		}
		unset ($_SESSION['fc_users_cache'][$userid]);
		unset ($_SESSION['fc_roles_cache'][$userid]);
		return $userid;
	}

	// Logout //
	function logout()
	{
		$_SESSION['fc_users_cache']['sessionhashid'] = '#Null#';
		return 0;
	}

	// Usergroup role lookup //
	function getRole($role,$usergroups,$type,$newrole)
	{
		foreach ($GLOBALS['vbulletin'][$type] as $group)
		{
			if (in_array($group,$usergroups))
			{
				$role = $newrole;
			}
		}
		return $role;
	}

	// Assign chat role //
	function getUserRole($usergroups)
	{
		// Check UserGroups Allowed Access
		$userrole = ROLE_ANY ;
		$groups = explode(',',$usergroups);
		$userrole = $this->getRole($userrole,$groups,'users',ROLE_USER);
		if ($GLOBALS['fc_config']['liveSupportMode'])
		{
			$userrole = $this->getRole($userrole,$groups,'customer',ROLE_CUSTOMER);
		}
		$userrole = $this->getRole($userrole,$groups,'mods',ROLE_MODERATOR);
		$userrole = $this->getRole($userrole,$groups,'admin',ROLE_ADMIN);
		$userrole = $this->getRole($userrole,$groups,'banned',ROLE_NOBODY);
		return $userrole;
	}

	// Get user details //
	function getUser($userid)
	{
		$rs = $this->getUserStmt->process($userid);
		if($rs)
		{
			$rec = $rs->next();
			$rec['usergroups'] = $rec['usergroupid'] ;
			if(intval($rec['membergroupids']))
			{
				$rec['usergroups'] .= ",".$rec['membergroupids'] ;
			}
			if(intval($rec['infractiongroupids']))
			{
				$rec['usergroups'] .= ",".$rec['infractiongroupids'] ;
			}
			$rec['roles'] = $this->getUserRole($rec['usergroups']);
			if($GLOBALS['fc_config']['loginUTF8decode'])
			{
				$tagencoded = entities_to_utf8($rec['login']);
				if(strlen($rec['login']) > strlen($tagencoded))
				{
					$rec['login'] = $tagencoded;
				}
				else
				{
					$rec['login'] = utf8_encode($rec['login']);
				}
			}
			$_SESSION['fc_users_cache'][$userid] = $rec;
			$_SESSION['fc_roles_cache'][$userid] = $rec['roles'];

			return $rec;
		}
		else
		{
			return null;
		}
	}

	// Return all existing users //
	function getUsers()
	{
		$rs = $this->getUsersStmt->process();
		if($rs)
		{
			return $rs;
		}
		else
		{
			return null;
		}
	}

	// Returns URL of user profile page //
	function getUserProfile($userid)
	{
		return ($this->userid == $userid) ? "../profile.php?do=editprofile" : "../member.php?u=$userid";
	}

	// Check if user is in role //
	function userInRole($userid, $role)
	{
		$user = $this->getUser($userid) ;
		if($role == $user['roles'])
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// Get Male or Female //
	function getGender($user)
	{
		return null;
	}

	// Get current avatar //
	// This function only works if you use the database storage method in vbulletin //
	function getPhoto($userid)
	{
		if($_SESSION['fc_users_cache'][$userid]['pid'] == $userid)
		{
			return $_SESSION['fc_users_cache'][$userid]['fpath'];
		}
		$rs = $this->getAvatar->process($userid);
		if($rs)
		{
			$rec = $rs->next();
			if($rec['filedata'] == '')
			{
				return null;
			}
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
		else
		{
			return null;
		}
	}
}

// Security check //
if (!defined('INC_DIR'))
{
	exit('Error 01 - Please consult you system administrator.');
}

// Find vbroot //
$vbroot = realpath(dirname(__FILE__)).'/../../../';

// Get vb config //
if (!include_once($vbroot.'includes/config.php'))
{
	exit('Error 02 - vbulletin config file not loaded, check you have the correct path.');
}

// Clear the moderator login message //
foreach($GLOBALS['fc_config']['languages'] as $k => $v)
{
	$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

// Get vbulletin config settings //
$GLOBALS['fc_config']['db'] = array(
	'base' => $config['Database']['dbname'],
	'user' => $config['MasterServer']['username'],
	'pass' => $config['MasterServer']['password'],
	'pref' => $GLOBALS['fc_config']['db']['pref'],
	'host' => $config['MasterServer']['servername'],
);

// Add tcp port if specified //
if($config['MasterServer']['port'])
{
	$GLOBALS['fc_config']['db']['host'] .= ':'.$config['MasterServer']['port'];
}

// vBulletin settings //
$GLOBALS['vbulletin'] = array(
	// Do not touch these //
	'users' => explode(',',$users),
	'banned' => explode(',',$banned),
	'mods' => explode(',',$moderators),
	'customer' => explode(',',$customers),
	'admin' => explode(',',$administrators),
	'cookie' => $config['Misc']['cookieprefix'],
	'prefix' => $config['Database']['tableprefix']
);

// Initiate CMS Class //
$GLOBALS['fc_config']['cms'] = new vBulletinCMS();

?>