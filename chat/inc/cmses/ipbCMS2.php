<?php
/************************************************************************/
//!!! IMPORTANT NOTE
//!!! FlashChat 4.4.0 and higher support a new user role: ROLE_MODERATOR
//!!! Please edit the getUser and getRoles function if you need use of
//!!! the new moderator role. This change has not yet been applied.
/************************************************************************/

// integration class for Invision Power Board (www.invisionboard.com)

$curdir = getcwd();
$ipb_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';
chdir($ipb_root_path);
require_once($ipb_root_path . 'conf_global.php');
chdir($curdir);



class IPBCMS {

	var $userid;
	var $loginStmt;
	var $getUserStmt;
	var $getUsersStmt;

	function IPBCMS() {

		$this->loginStmt = new Statement("SELECT m.id, m.name AS login, m.ip_address as ip_address, m.mgroup as mgroup from ".$GLOBALS["INFO"]["sql_tbl_prefix"]."members as m INNER JOIN ".$GLOBALS["INFO"]["sql_tbl_prefix"]."members_converge AS mc ON m.id = mc.converge_id WHERE LOWER(m.name)=? AND mc.converge_pass_hash = MD5(CONCAT(MD5(mc.converge_pass_salt),MD5(?))) LIMIT 1");

		$this->getUserStmt = new Statement("SELECT id, name AS login, g.g_is_supmod AS is_admin, g.g_open_close_posts AS is_moderator FROM ".$GLOBALS["INFO"]["sql_tbl_prefix"]."members AS m INNER JOIN ".$GLOBALS["INFO"]["sql_tbl_prefix"]."groups AS g ON m.mgroup = g.g_id WHERE id=? LIMIT 1");

		$this->getUsersStmt = new Statement("SELECT id, name as login FROM ".$GLOBALS["INFO"]["sql_tbl_prefix"]."members");

		$this->userid = NULL;


		if (isset($_COOKIE['member_id'])) {
			$this->userid = $_COOKIE['member_id'];
		}

	}


	function isLoggedIn() {
		return $this->userid;
	}


	function getRoles($group) {
		$rv = NULL;

		if ($group == 1)
			$rv = ROLE_ADMIN;
		elseif ( $group == 2 )
			$rv = ROLE_MODERATOR;
		elseif ($GLOBALS['fc_config']['liveSupportMode'])
			$rv = ROLE_CUSTOMER;
		else
			$rv = ROLE_USER;

		return $rv;
	}

	function getUserProfile($userid) {

		if ($userid == SPY_USERID) $rv = NULL;

		elseif ($user = $this->getUser($userid)) {
			$rv = ($id = $this->isLoggedIn() && ($id == $userid)) ? $GLOBALS["INFO"]["board_url"] . "/index.php?act=UserCP&CODE=01" : $GLOBALS["INFO"]["board_url"]."/index.php?showuser={$user[id]}";
		}

		return $rv;
	}


	function getUser($userid) {

		$rv = NULL;

		if(($rs = $this->getUserStmt->process($userid)) && ($rec = $rs->next())) {

			if ( $rec['is_admin'] == 1 )
				$level = 1;
			elseif ( $rec['is_moderator'] == 1 )
				$level = 2;
			else
				$level = 0;

			$rec['roles'] = $this->getRoles($level);
			$rv = $rec;
		}

		return $rv;
	}

	function login($u_login, $u_password) {
		// taken from IPB's Login::do_login function
		if (($rs = $this->loginStmt->process(stripslashes(str_replace("'", "&#39;", $u_login)), $u_password)) && ($rec = $rs->next())) {

		// statements used by IPBCMS::login()
		$this->updateIPStmt = new Statement("UPDATE ".$GLOBALS["INFO"]["sql_tbl_prefix"]."members SET ip_address=? WHERE id=?");
		$this->deleteSessionStmt = new Statement("DELETE FROM ".$GLOBALS["INFO"]["sql_tbl_prefix"]."sessions WHERE ip_address=? AND id <> ?");
		$this->updateSessionStmt = new Statement("UPDATE ".$GLOBALS["INFO"]["sql_tbl_prefix"]."sessions SET member_name=?, member_id=?, running_time=?, member_group=?, login_type=? WHERE id=?");
		$this->deleteSessionIPStmt = new Statement("DELETE FROM ".$GLOBALS["INFO"]["sql_tbl_prefix"]."sessions WHERE ip_address=?");
		$this->insertSessionStmt = new Statement("INSERT INTO ".$GLOBALS["INFO"]["sql_tbl_prefix"]."sessions (id, member_name, member_id, running_time, member_group, ip_address, browser, login_type) VALUES (?,?,?,?,?,?,?,?)");



		$this->userid = $rec[id];

		$GLOBALS['INFO']['cookie_domain'] = $GLOBALS['INFO']['cookie_domain'] == "" ? ""  : $GLOBALS['INFO']['cookie_domain'];
		$GLOBALS['INFO']['cookie_path']   = $GLOBALS['INFO']['cookie_path']   == "" ? "/" : $GLOBALS['INFO']['cookie_path'];


		@setcookie("member_id", $rec[id], 0,  $GLOBALS['INFO']['cookie_path'], $GLOBALS['INFO']['cookie_domain']);
		@setcookie("pass_hash", $rec[password], 0, $GLOBALS['INFO']['cookie_path'], $GLOBALS['INFO']['cookie_domain']);


		// update profile if IP address missing
		if ($rec[ip_address] == "" || $rec[ip_address] == '127.0.0.1') {
			$this->updateIPStmt->process($_SERVER[REMOTE_ADDR], $rec[id]);
		}

		// create or update session

		$poss_session_id = isset($_COOKIE[$GLOBALS[INFO][cookie_id]."session_id"]) ? urldecode($_COOKIE[$GLOBALS[INFO][cookie_id]."session_id"]) : FALSE;

		if ($poss_session_id) {
			// delete any old session with this ipadd that doesn't match our session id
			$this->deleteSessionStmt->process($_SERVER[REMOTE_ADDR], $poss_session_id);
			$this->updateSessionStmt->process($rec[login], $rec[id], time(), $rec[mgroup], 0, $poss_session_id);
		}
		else {
			$session_id = md5(uniqid(microtime()));
			// delete any old sessions with this users ip
			$this->deleteSessionIPStmt->process($_SERVER[REMOTE_ADDR]);
			$this->insertSessionStmt->process($session_id, $rec[login], $rec[id], time(), $rec[mgroup], $_SERVER[REMOTE_ADDR], substr($HTTP_USER_AGENT,0,50), 0);
		}

		return $rec[id];
		}
	}

	function userInRole($userid, $role) {
		if($user = $this->getUser($userid)) {
			return ($user['roles'] == $role);
		}
		return false;
	}

	function logout() {

	}

	function getUsers() {

		$rv = $this->getUsersStmt->process();
		return $rv;

	}

	function getGender($userid){
		// 'M' for Male, 'F' for Female, NULL for undefined
		return NULL;
  	}
}


$GLOBALS['fc_config']['db'] = array(
	'host' => $INFO['sql_host'],
	'user' => $INFO['sql_user'],
	'pass' => $INFO['sql_pass'],
	'base' => $INFO['sql_database'],
	'pref' => $INFO['sql_tbl_prefix']."fc_",
	);

$GLOBALS['fc_config']['cms'] = new IPBCMS();


foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
	$GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}
?>