<?php
/************************************************************************/
//!!! There seems to be a problem with the logout issue, however it will be solved!!
//!!! Please try to connect with multiple users. I guess the problem is the cookies
/************************************************************************/

$pn_root_path = realpath(dirname(__FILE__) . '/../../../') . '/';
$curdir = getcwd();
chdir($pn_root_path);
include "includes/pnAPI.php";
foreach($GLOBALS as $k => $v) {
  if (substr($k, 0, 4) == 'PNSV') unset($GLOBALS[$k]);
}
pnInit();
chdir($curdir);

function pnReturnID()
{
	$dbconn =& pnDBGetConn(true);
	if (is_array($dbconn)) $dbconn = $dbconn[0];
    $pntable =& pnDBGetTables();
	$table = $pntable['session_info'];
	$column = &$pntable['session_info_column'];
	$query = "SELECT $column[uid] FROM $table LIMIT 1";
	$result =& $dbconn->Execute($query);
	list($gid) = $result->fields;
	return $gid;
}
function pnSecGetAuthInfo2($u) {

            $dbconn =& pnDBGetConn(true);
            if (is_array($dbconn)) $dbconn = $dbconn[0];
            $pntable =& pnDBGetTables();
            $userpermtable = $pntable['user_perms'];
            $userpermcolumn = &$pntable['user_perms_column'];
            $groupmembershiptable = $pntable['group_membership'];
            $groupmembershipcolumn = &$pntable['group_membership_column'];
            $grouppermtable = $pntable['group_perms'];
            $grouppermcolumn = &$pntable['group_perms_column'];
            $realmtable = $pntable['realms'];
            $realmcolumn = &$pntable['realms_column'];
            $userperms = array();
            $groupperms = array();
            //$uids = $u;
			
            //$uids = implode(",", $uids);



            // Get user permissions
            $query = "SELECT $userpermcolumn[realm],
                             $userpermcolumn[component],
                             $userpermcolumn[instance],
                             $userpermcolumn[level]
                      FROM $userpermtable
                      WHERE $userpermcolumn[uid] = ".$u."
                      ORDER by $userpermcolumn[sequence]
					  LIMIT 1";

            $result =& $dbconn->Execute($query);



            if ($dbconn->ErrorNo() != 0) {
                        return array(false,false);
            }



            $userperms=false;
            while(list($realm, $component, $instance, $level) = $result->fields) {
                $result->MoveNext();
                if ($component='.*' && // all components
                    $instance=='.*' && //all instances
                    $level==800 ) //admin level
                    $userperms=true;

            }

            $query = "SELECT $groupmembershipcolumn[gid]
                      FROM $groupmembershiptable
                      WHERE $groupmembershipcolumn[uid] = " . $u . " LIMIT 1";
            $result =& $dbconn->Execute($query);
            if ($dbconn->ErrorNo() != 0) {
                return array(false, false);
            }
            $usergroups[] = -1;
            while(list($gid) = $result->fields) {
                $result->MoveNext();



                $usergroups[] = $gid;
            }
            $usergroups = implode(",", $usergroups);



            // Get all group permissions
            $query = "SELECT $grouppermcolumn[realm],
                             $grouppermcolumn[component],
                             $grouppermcolumn[instance],
                             $grouppermcolumn[level]
                      FROM $grouppermtable
                      WHERE $grouppermcolumn[gid] IN (" . pnVarPrepForStore($usergroups) . ")
                      ORDER by $grouppermcolumn[sequence]";
            $result =& $dbconn->Execute($query);



            if ($dbconn->ErrorNo() != 0) {
                return array($userperms, $groupperms);
            }
           $groupperms=false;
            while(list($realm, $component, $instance, $level) = $result->fields) {
                $result->MoveNext();
                if ($component=='.*' && // all components
                    $instance=='.*' && //all instances
                    $level==800 ) //admin level
                $groupperms=true;
            }

            return array($userperms, $groupperms);
    }



    class PNUsersRS {
        var $result;
        var $numRows = 0;
        var $currRow = 0;
	
        function PNUsersRS($result = null) {
            $this->result = array_values($result);
            if($result) $this->numRows = sizeof($result);
        }

        function hasNext() {
            return ($this->result && ($this->numRows) > $this->currRow);
        }

        function next() {
            if($this->hasNext()) {
                return array(
                    'id' => $this->result[$this->currRow]['uid'],
                    'login' => $this->result[$this->currRow++]['uname']
                );
            } else {
                return null;
            }
        }
    }

class PostNukeCMS {
	
		function PostNukeCMS() {
		
		}

        function isLoggedIn() {
		 	if (!isset($_COOKIE['POSTNUKESID'])) 
		 	    return null;
		 	$id = pnReturnID();
			if ( !$id ) 
			    return null;
			
			return $id;
            //
        }

        function login($login, $password) {
            if(pnUserLogIn($login, $password, 0)) return pnUserGetVar('uid');

            return null;
        }

        function logout(){
            pnUserLogOut();
        }

        function getUser($userid) {
            $u = null;

            if(pnUserGetVar('uid', $userid)) {
                $u = array(
                    'id' => $userid,
                    'login' => pnUserGetVar('uname', $userid)
                );

                $u['roles'] = $GLOBALS['fc_config']['liveSupportMode']?ROLE_CUSTOMER:ROLE_USER;
                //if(pnSecAuthAction(0, 'Modules::', '::', ACCESS_ADMIN)) $u['roles'] = ROLE_ADMIN;
                $ar1 = pnSecGetAuthInfo2($userid);
                if ($ar1[1] || $ar1[2]) $u['roles'] = ROLE_ADMIN;
            }

            return $u;
        }

        function getUsers() {
            return new PNUsersRS(pnUserGetAll());
        }

        function getUserProfile($userid) {
            if($userid == SPY_USERID) return null;

            if($user = $this->getUser($userid)) {
                return (($id = $this->isLoggedIn()) && ($id == $userid))?"../user.php?op=edituser":"../user.php?op=userinfo&uname={$user['login']}";
            } else {
                return null;
            }
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
		
		function getPhoto($userid)
		{
			$dbconn =& pnDBGetConn(true);
            if (is_array($dbconn)) $dbconn = $dbconn[0];
            $pntable =& pnDBGetTables();
            $usertable = $pntable['users'];
			$usertablecolumn = &$pntable['users_column'];
			
	        // Get user avatar data
            $query = "SELECT $usertablecolumn[user_avatar]
                      FROM $usertable
                      WHERE $usertablecolumn[uid] = ".$userid."
					  LIMIT 1";

            $result =& $dbconn->Execute($query);
			$avatar = $result->fields[0];
			
			if($avatar == null || strcmp($avatar, '') == 0)
				return '';
				
			return '../images/avatar/'.$avatar; 
		}
	}
	

    $GLOBALS['fc_config']['cms'] = new PostNukeCMS();

    //$GLOBALS['fc_config']['base'] = 'modules/FlashChat/';
    $GLOBALS['fc_config']['db'] = array(
                     'host' => $GLOBALS['pnconfig']['dbhost'],
                     'user' => $GLOBALS['pnconfig']['dbuname'],
                     'pass' => $GLOBALS['pnconfig']['dbpass'],
                     'base' => $GLOBALS['pnconfig']['dbname'],
                     'pref' => $GLOBALS['pnconfig']['prefix'] . "_fc_",
                 );

    //clear 'if moderator' message
    foreach($GLOBALS['fc_config']['languages'] as $k => $v) {
        $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
    }
?>