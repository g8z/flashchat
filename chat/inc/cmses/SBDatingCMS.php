<?php
	$easysitepath = realpath(dirname(__FILE__) . '/../../../') . '/';
//---------- myconnect.php to get the database name and host and etc. dynamically------------------	
	require_once($easysitepath . 'myconnect.php');

//-----------The two tables that we are gonna be dealing with--------------------------------------	
	define ( 'MEMBERS_TABLE', 'sbdtng_members' );
	define ( 'ADMIN_TABLE', 'sbdtng_admin' );
//-------------------------------------------------------------------------------------------------	

	class SBDatingCMS {
		var $userid = null;
		var $username = null;
		var $admincon = null;
		var $loginStmt;
		var $AdloginStmt;
		var $getUserStmt;
		var $getAdminStmt;
		var $getAdminConStmt;
		var $getUsersStmt;
		var $getUserConStmt;
		
//--------we need the constArr because there is no configuration file in softbiz-------------------		
		var $constArr;
//-------------------------------------------------------------------------------------------------	
		function SBDatingCMS()
		{

			$this->constArr = array(
					  'gender_num'  =>'sb_gender',
					  'profile_path'=>'../view_profile.php',
					  'profile_arg' =>'?id={$sb_id}',
			);
//--------if the session variable for the userid isset then it is assigned to $userid--------------			
			if(isset($_SESSION["sbdtng_userid"])) $this->userid = $_SESSION["sbdtng_userid"];
			if(isset($_SESSION["softbiz_dtng_adminid"]))
			{
				$this->userid = $_SESSION["softbiz_dtng_adminid"];
				$this->admincon = 1;
			}
			if(isset($_SESSION["sbdtng_username"])) $this->username = $_SESSION["sbdtng_username"];
			if(isset($_SESSION["softbiz_dtng_adminname"])) $this->username = $_SESSION["softbiz_dtng_adminname"];
			//if(isset($_SESSION["sbdtng_userid"])) $this->isAdmin($this->userid, $this->username);
//-------------------------------------------------------------------------------------------------
			$this->getAdminStmt = new Statement("SELECT * FROM " . ADMIN_TABLE . " WHERE sb_id=? LIMIT 1");
			$this->getAdminConStmt = new Statement ("SELECT * FROM " . ADMIN_TABLE . " WHERE sb_id=? AND sb_admin_name=? LIMIT 1");
			$this->getUserStmt  = new Statement("SELECT * FROM " . MEMBERS_TABLE . " WHERE sb_id=? LIMIT 1");
			$this->getUserConStmt = new Statement("SELECT * FROM " . MEMBERS_TABLE . " WHERE sb_id=? AND sb_usermane=? LIMIT 1");
			$this->getUsersStmt = new Statement("SELECT * FROM " . MEMBERS_TABLE . " ORDER BY sb_username");

//----------since there is no md5 encoding by default of the CMS we dont need a switch-------------
			$this->loginStmt    = new Statement("SELECT * FROM " . MEMBERS_TABLE . " WHERE sb_username=? AND sb_password=? LIMIT 1");
			$this->AdloginStmt  = new Statement("SELECT * FROM " . ADMIN_TABLE . " WHERE sb_admin_name=? AND sb_pwd=? LIMIT 1");
//-------------------------------------------------------------------------------------------------		
		}

//-------this is the key function to distinguish between the admin and normal users----------------		
		function isAdmin($pid, $pname)
		{
			$this->admincon = 0;
			if($pid && $pname)
			{
				if(($rs = $this->getAdminConStmt->process($pid,$pname)) && ($rec = $rs->next()))
				{
					$this->userid = $rec['sb_id'];
					$this->admincon = 1;
				} 
				if(($rs = $this->getUserConStmt->process($pid,$pname)) && ($rec	= $rs->next()))
				{
					$this->userid = $rec['sb_id'];
					$this->admincon = 0;
				}
			}
			return $this->admincon;
		}
		
//------we just need to return the value of userid, if set real, if not null so the login appears-		
		function isLoggedIn()
		{
			return $this->userid;
		}
//-------------------------------------------------------------------------------------------------
		function getUserProfile($userid)
		{
			$user = $this->getUser($userid);
			if($this->admincon == 1) return null;
			extract($user);
			return "{$this->constArr['profile_path']}?id={$sb_id}";
		}
//------------------------------------------------------------------------------------------------		
		function login($login, $password)
		{
			$this->userid = null;
			

			if($login && $password)
			{
				$pass = $password;
				if(($rs = $this->loginStmt->process($login,$pass)) && ($rec = $rs->next()))
				{
					$this->userid = $rec['sb_id'];
					$this->admincon = 0;
				}
				elseif(($rs2 = $this->AdloginStmt->process($login,$pass)) && ($rec2 = $rs2->next()))
				{
					$this->userid = $rec2['sb_id'];
					$this->admincon = 1;
				}
			}
			
			return $this->userid;
		}
//-------------------------------------------------------------------------------------------------		
		function logout()
		{
			$this->userid = null;
		}
//-------------------------------------------------------------------------------------------------		
		function getUser($userid)
		{
			if($userid)
			{
				if ($this->admincon == 0)
				{
					$rs = $this->getUserStmt->process($userid);
					$usr = $rs->next();
					$usr['login'] = $usr['sb_username'];
					$usr['gender'] = $usr['sb_gender'];
					$usr['roles'] = ROLE_USER;
				}
				if ($this->admincon == 1)
				{
					$rs2 = $this->getAdminStmt->process($userid);
					$usr = $rs2->next();
					$usr['login'] = $usr['sb_admin_name'];
					$usr['roles'] = ROLE_ADMIN;
				}
				return $usr;
			} else
			{
				return NULL;
			}
		}
//-------------------------------------------------------------------------------------------------
		function userInRole($userid, $role)
		{
			if($user = $this->getUser($userid))
			{
				if($role == ROLE_ADMIN)
				{
					if($user['roles'] == ROLE_ADMIN) return true;
					else return false;
				}
				
				if($role == ROLE_USER)
				{
					return true;
				}
			}
			return false;
		}
//-------------------------------------------------------------------------------------------------
		function getGender($userid) {
			$rv = NULL;
			if ($u = $this->getUser($userid)) 
			{
				if ($u['gender'] == 1) $rv = 'M';
				if ($u['gender'] == 2) $rv = 'F';
			}
			return $rv;
		}
	}
//-------Now define the globals using the variables included in the myconnect.php

	$GLOBALS['fc_config']['db'] = array(
						'host' => $servername,
						'user' => $database_username,
						'pass' => $database_password,
						'base' => $database_name,
						'pref' => "sbdtng_fc_",//DB_PREFIX
						);
	$GLOBALS['fc_config']['cms'] = new SBDatingCMS();
	foreach($GLOBALS['fc_config']['languages'] as $k => $v)
	{
		$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
	}
?>		