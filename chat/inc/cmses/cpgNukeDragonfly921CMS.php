<?php

$cpg_root_path = realpath(dirname(__FILE__) . '/../../../');

define('CPG_NUKE', 1);
require_once($cpg_root_path . '/includes/config.php');


class CPGNukeCMS {

	var $user_id = NULL;
	var $admin_id = NULL;
	var $getUserStmt = NULL;
	var $loginStmt = NULL;
	var $getUsersStmt = NULL;
	var $loadConfigStmt = NULL;
	var $cpgNukeConfig = array();

        function CPGNukeCMS()
		{

		  $this->getUserStmt = new Statement("SELECT user_id as id, username AS login, user_level, user_password from {$GLOBALS['user_prefix']}_users WHERE user_id=? LIMIT 1");

		  $this->loginStmt = new Statement("SELECT user_id as id, username AS login, user_password, user_level from {$GLOBALS['user_prefix']}_users WHERE username=? LIMIT 1");

		  $this->getUsersStmt = new Statement("SELECT user_id as id, username as login from {$GLOBALS['user_prefix']}_users");

		  $this->buildConfig();
		}

	function buildConfig()
	{

	  $this->loadConfigStmt = new Statement("SELECT * from {$GLOBALS['prefix']}_config_custom WHERE cfg_name = 'cookie'");

	  $rs = $this->loadConfigStmt->process();

	  while ($rec = $rs->next())
	    $this->cpgNukeConfig[$rec['cfg_name'] . "_" . $rec['cfg_field']] = $rec['cfg_value'];

	  if (empty($this->cpgNukeConfig['cookie_member'])) $this->cpgNukeConfig['cookie_member'] = 'member';
	  if (empty($this->cpgNukeConfig['cookie_admin'])) $this->cpgNukeConfig['cookie_admin'] = 'admin';

	}

    function isLoggedIn()
	{

		  if (isset($_COOKIE[$this->cpgNukeConfig['cookie_member']])) {
		    $cookieData = explode(':', base64_decode($_COOKIE[$this->cpgNukeConfig['cookie_member']]));
		  }
		  else if (isset($_COOKIE[$this->cpgNukeConfig['cookie_admin']])) {
		    $cookieData = explode(':', base64_decode($_COOKIE[$this->cpgNukeConfig['cookie_admin']]));
		  }

		  return isset($cookieData) ? $cookieData[0] : NULL;

    }

    function login($login, $password)
	{
	  $rv = NULL;
	  if (($rs = $this->loginStmt->process($login)) && ($rec = $rs->next()))
	  {
	    if ($rec['user_password'] <> md5($password)) $rv = NULL;
	    else {
	      if ($rec['user_level'] == 2)
		  { // admin
				$cookieData = base64_encode($rec['id'].":".$rec['user_password'].":0");
				$cookieName = $this->cpgNukeConfig['cookie_admin'];
	      }
	      else
		  { // user
			$cookieData = base64_encode($rec['id']."::".$rec['user_password']);
			$cookieName = $this->cpgNukeConfig['cookie_member'];
	      }
	      setcookie($cookieName, $cookieData, 0, $this->cpgNukeConfig['cookie_path'], $this->cpgNukeConfig['cookie_domain']);
	      $rv = $rec['id'];
	    }
	  }
	  else $rv = NULL;

	  return $rv;
    }

        function logout()
		{
			/*
	  		if (isset($_COOKIE[$this->cpgNukeConfig['cookie_member']]))
			{
	    		setcookie($_COOKIE[$this->cpgNukeConfig['cookie_member']], "", 0, $this->cpgNukeConfig['cookie_path'], $this->cpgNukeConfig['cookie_domain']);
	  		}

		  	if (isset($_COOKIE[$this->cpgNukeConfig['cookie_admin']]))
			{
		    	setcookie($_COOKIE[$this->cpgNukeConfig['cookie_admin']], "", 0, $this->cpgNukeConfig['cookie_path'], $this->cpgNukeConfig['cookie_domain']);
		  	}*/

	     }

        function getUser($userid)
		{
			  $rv = NULL;
			  if (($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next()))
			  {
			    $rv = array();
			    $rv['login'] = $rec['login'];
			    $rv['id'] = $rec['id'];
                            $rv['roles'] = ROLE_USER;
                             if ($rec['user_level'] == 2)
                             {
                             $rv['roles'] = ROLE_ADMIN;
                             }
                             if ($rec['user_level'] == 3)
                             {
                             $rv['roles'] = ROLE_MODERATOR;
                             }

//			    $rv['roles'] = ($rec['user_level'] == 2 ? ROLE_ADMIN : ROLE_USER);
//			    $rv['roles'] = ($rec['user_level'] == 3 ? ROLE_MODERATOR : ROLE_USER);
	          }

	  		  return $rv;
        }

		function getUsers()
		{
            return  $this->getUsersStmt->process();
        }


        function getUserProfile($userid)
		{

			  if ($userid == SPY_USERID) return NULL;

			  $user = $this->getUser($userid);

			  if ($user) {
			    $rv = $this->cpgNukeConfig['server']['nukeurl'] . "/index.php?name=Your_Account" . ((($id = $this->isLoggedIn()) && ($id == $userid)) ?  "" : "&profile=".$user['login']);

			  }
			  else {
			    $rv = NULL;
			  }

			  return $rv;

        }

		function userInRole($userid, $role) {
			if($user = $this->getUser($userid)) {
				return ($user['roles'] == $role);
			}
			return false;
		}

	    function getGender($userid)
		{
	  		return NULL;
    	}


    }

$GLOBALS['fc_config']['db'] = array(
                            'host' => $dbhost,
                            'user' => $dbuname,
			    'pass' => $dbpass,
			    'base' => $dbname,
			    'pref' => $prefix . "_fc_",
			    );

$GLOBALS['fc_config']['cms'] = new CPGNukeCMS();

//clear 'if moderator' message
foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
  $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>