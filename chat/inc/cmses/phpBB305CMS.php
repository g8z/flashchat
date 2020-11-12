<?php

if ( !defined( 'INC_DIR' ) ) {
  die( 'hacking attempt' );
}

define('IN_PHPBB', true);
$phpbb_root_path  = realpath(dirname(__FILE__) . '/../../../') . '/';

if( is_file($phpbb_root_path . 'config.php') )
{
  include($phpbb_root_path . 'config.php');
}
//require_once('FirePHPCore/fb.php4');
$phpbb3_root_path  = realpath(dirname(__FILE__) . '/../../../') . '/';

include($phpbb3_root_path . 'config.php');
include($phpbb3_root_path . 'includes/functions.php');
include($phpbb3_root_path . 'includes/constants.php');


class PhpBB3CMS {
  var $loginStmt;
  var $loggedinStmt;
  var $getUserStmt;
  var $getUsersStmt;
  var $userid;

  function PhpBB3CMS() {
    $pref = $GLOBALS['fc_config']['db']['pref'];

    $this->loginStmt = new Statement("SELECT user_id FROM {$GLOBALS['table_prefix']}users WHERE username=? LIMIT 1");
    $this->loggedinStmt = new Statement("SELECT session_user_id as id FROM {$GLOBALS['table_prefix']}sessions WHERE session_id=?");
    $this->getPasswordStmt	= new Statement("SELECT user_password FROM {$GLOBALS['table_prefix']}users WHERE username=?  LIMIT 1");
    $this->sessionStmt = new Statement("SELECT * FROM {$GLOBALS['table_prefix']}sessions WHERE session_browser=? AND session_forwarded_for=? AND session_ip=? AND session_user_id>1 AND session_time>?");

    $this->configStmt = new Statement("SELECT config_value FROM {$GLOBALS['table_prefix']}config WHERE config_name='cookie_name'");
    //Geno Mod - added user_rank to getUserStmt
    $this->getUserStmt = new Statement("SELECT user_id as id, username as login, user_rank, user_type FROM {$GLOBALS['table_prefix']}users WHERE user_id=? LIMIT 1");
    $this->getUsersStmt = new Statement("SELECT user_id as id, username as login FROM {$GLOBALS['table_prefix']}users ORDER BY login");
    $this->getPhotoStmt = new Statement("SELECT user_avatar FROM {$GLOBALS['table_prefix']}users WHERE user_id=? LIMIT 1");
  }

  function isLoggedIn() {
    $browser	= (!empty($_SERVER['HTTP_USER_AGENT'])) ? htmlspecialchars((string) $_SERVER['HTTP_USER_AGENT']) : '';
    $browser = substr($browser, 0, 149);
    $forwarded_for = (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) ? (string) $_SERVER['HTTP_X_FORWARDED_FOR'] : '';
    $ip = (!empty($_SERVER['REMOTE_ADDR'])) ? htmlspecialchars($_SERVER['REMOTE_ADDR']) : '';
    $minTime = time() - 31536000;

    $rs = $this->sessionStmt->process($browser, $forwarded_for, $ip, $minTime);
    while ($rec = $rs -> next()) {
      return $rec['session_user_id'];
    }
  }

  function login($username, $password)
  {
    //$login = utf8_decode( $login ) ;//umlavta characters fix
    //$login=sha1($login);
    /*fb($login.'---'.$password);
       if($login && $password && ($rs = $this->loginStmt->process($login,$password)) && ($rec = $rs->next()))
       {
       //session_begin( true );
       return $rec['user_id'];
       }
       return null;
    */
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
$GLOBALS['table_prefix'] = $table_prefix;

if( is_file($phpbb_root_path . 'config.php') )
  $GLOBALS['fc_config']['cms'] = new PhpBB3CMS();

//clear 'if moderator' message
foreach($GLOBALS['fc_config']['languages'] as $k => $v)
{
  $GLOBALS['fc_config']['languages'][$k]['dialog']['login']['moderator'] = '';
}

?>