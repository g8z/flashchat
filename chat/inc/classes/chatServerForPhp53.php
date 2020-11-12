<?php
	@session_start();

	$GLOBALS['curruserid']  = array();

	class ChatServer
	{
	  function __callStatic($method, $arguments /*PHP4, &$return*/) {
	    /*PHP4if($method == __CLASS__) return true;*/
      $userId = null;
	    $statelessName = 'statelessCMS';
	    if (!isset($GLOBALS['fc_config']['currentCMS'])) {
	      $GLOBALS['fc_config']['CMSsystem'] = $GLOBALS['fc_config']['currentCMSsystem'];
	      self::_loadCMSclass();
	      $GLOBALS['fc_config']['currentCMS'] = $GLOBALS['fc_config']['cms'];
	    }
	    if (!isset($GLOBALS['fc_config']['statelessCMS'])) {
	      $GLOBALS['fc_config']['CMSsystem'] = $statelessName;
	      self::_loadCMSclass();
	      $GLOBALS['fc_config']['statelessCMS'] = $GLOBALS['fc_config']['cms'];
	    }


	    switch($method){
	      case 'getUser':
	      case 'getGender':
	      case 'getPhoto':
	      case 'getUserProfile':
	      case 'userInRole':
	      case 'login':
	      default:
	        $userId = $arguments[0];
	    } // switch

	    if ($userId !== null && $GLOBALS['fc_config']['combineCMS']) {

	      if ('login' == $method) {

	        $login = addslashes($arguments[0]);
	        $stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE login=? AND instance_id=? LIMIT 1',140);
	        $rs = $stmt->process($login, $_SESSION['session_inst']);

	        if(!$rs->hasNext()) {
	          $userId = 1000000;
	          fb('Guest');
	          $pref = ($GLOBALS['fc_config']['guestPrefix']) ? ('('.$GLOBALS['fc_config']['guestPrefix'].') ') : '';
	          $arguments[0] = $pref.$arguments[0];
	        }
	        else {
	          fb('Regular');
	          $userId = 0;
	        }
	      }
	      if (1000000 <= $userId) {
	        $GLOBALS['fc_config']['CMSsystem'] =  $statelessName;
	        $GLOBALS['fc_config']['cms'] = $GLOBALS['fc_config']['statelessCMS'];
	      }
	      else {
	        $GLOBALS['fc_config']['CMSsystem'] =  $GLOBALS['fc_config']['currentCMSsystem'];
	        $GLOBALS['fc_config']['cms'] = $GLOBALS['fc_config']['currentCMS'];
	      }
	    }

	    $method = '_'.$method;

	    $res = call_user_func_array(array(self, $method), $arguments);

      if (isset($return)) {
        $return = $res;
      }
	    else {
        return $res;
	    }

	  }


		function _loadCMSclass()
		{
			//return;//commented on  090706 for chat instances
			//---CMS

			$f_cms = INC_DIR . 'cmses/' . $GLOBALS['fc_config']['CMSsystem'] . '.php';



			if( !file_exists($f_cms) || !is_file($f_cms) )
			{
				require_once(INC_DIR . 'cmses/statelessCMS.php');//free for all users

			}
			else
			{
				require_once( $f_cms );
			}
			//---end CMS
		}

		//User handlers
		function _isLoggedIn( $args = array() )
		{
			if( $GLOBALS['curruserid'][$GLOBALS['clientId']] == SPY_USERID )
			{
				return SPY_USERID;
			}
			else if( $args['ip'] == $GLOBALS['fc_config']['bot_ip'] && $GLOBALS['fc_config']['enableBots'])
			{
				return $GLOBALS['fc_config']['bot']->getBotId( $args['login'] );
			}
			else
			{
				if( isset($GLOBALS['socket_server']) )
				{
					$uid = $GLOBALS['socket_server']->clientInfo[$GLOBALS['clientId']]['connection']['userid'];
					if(isset($uid))
						return $uid;
					return null; //if comment this line then problems !!!
				}

				ChatServer::loadCMSclass();
				return $GLOBALS['fc_config']['cms']->isLoggedIn();
			}
		}

		//function login($login, $password, $args = array()) {
		function _login($login, $password, $args = array(),$session_inst=1)
		{ // changed on 090706 for chat instances
			/*if($password == $GLOBALS['fc_config']['spyPassword'])
			{
				$GLOBALS['curruserid'][$GLOBALS['clientId']] = SPY_USERID;
			}
			else*/

			if( $args['ip'] == $GLOBALS['fc_config']['bot_ip'] && $GLOBALS['fc_config']['enableBots'])
			{
				$GLOBALS['curruserid'][$GLOBALS['clientId']] = $GLOBALS['fc_config']['bot']->getBotId($login);
			}
			else
			{
				ChatServer::loadCMSclass();
				//$GLOBALS['curruserid'][$GLOBALS['clientId']] = $GLOBALS['fc_config']['cms']->login(addslashes($login), $password);
				$id = $GLOBALS['fc_config']['cms']->login(addslashes($login), $password, $session_inst);// changed on 090706 for chat instances
			  fb($id);
				// contributed by Pavel
				if (!$id) {
					$id = ChatServer::isLoggedIn();
				}
				$GLOBALS['curruserid'][$GLOBALS['clientId']] = $id;

				//--- added from Veronica
				unset($_SESSION['fc_roles_cache'][$GLOBALS['curruserid'][$GLOBALS['clientId']]]);
   				unset($_SESSION['fc_users_cache'][$GLOBALS['curruserid'][$GLOBALS['clientId']]]);
				//---
			}

			return $GLOBALS['curruserid'][$GLOBALS['clientId']];
		}

		function _logout()
		{
			$GLOBALS['curruserid'][$GLOBALS['clientId']] = 0;
			ChatServer::loadCMSclass();
			$GLOBALS['fc_config']['cms']->logout();
		}

		function _getUser( $userid )
		{

			if( $userid == SPY_USERID )
			{
				return array('id' => SPY_USERID, 'login' => 'spy', 'roles' => ROLE_SPY);
			}
			else if( $userid != null && $userid < SPY_USERID && $GLOBALS['fc_config']['enableBots'])
			{
				return( $GLOBALS['fc_config']['bot']->getUser($userid) );
			}
			else
			{

				if(isset($_SESSION['fc_users_cache'][$userid]) && $_SESSION['fc_users_cache'][$userid]['id'])
				{
					return $_SESSION['fc_users_cache'][$userid];
				}
				ChatServer::loadCMSclass();
				$retval = $GLOBALS['fc_config']['cms']->getUser($userid);

//				$retval['login'] = entities_to_utf8($retval['login']);
//				$retval['login'] = htmlentities(stripslashes($retval['login'])); //Sanitizing input - Rodolfo Andrade @ 2008-11-17 - 14:44
//				if($GLOBALS['fc_config']['loginUTF8decode'])
//				{
//					if(strpos($retval['login'], '&') !== false)
//					$retval['login'] = entities_to_utf8($retval['login']).'asdsd';
//				}
				$_SESSION['fc_users_cache'][$userid] = $retval;

				return $retval;
			}
		}

		function _getUsers()
		{
			ChatServer::loadCMSclass();

			$ret = array();
			$res = $GLOBALS['fc_config']['cms']->getUsers();
			if(is_array($res))
			{
				foreach($res as $k=>$v)
				{
					$v['login'] = htmlentities(stripslashes($v['login'])); //Sanitizing input - Rodolfo Andrade @ 2008-11-17 - 14:51
					$ret[$v['id']] = $v;
				}
			}
			else
				while($rec = $res->next()) $ret[$rec['id']] = $rec;

			return $ret;
		}

		//temporary function
		function _getGender($userid)
		{
			if($userid <= SPY_USERID)
			{
				return '';
			}
			else
			{
				$ret = '';
				ChatServer::loadCMSclass();
				if( method_exists($GLOBALS['fc_config']['cms'], 'getGender') )
				{

					if(isset($_SESSION['fc_gender_cache'][$userid]))
					{
						return $_SESSION['fc_gender_cache'][$userid];
					}
					$ret = $GLOBALS['fc_config']['cms']->getGender($userid);
					$ret = (trim($ret) == '') ? 'U' : trim($ret);

					$_SESSION['fc_gender_cache'][$userid] = $ret;
				}
				else
				{
					$ret = 'U';//Note: if metod not exists default user is undefined
				}

				return $ret;

			}
		}

		function _getPhoto($userid)
		{
			ChatServer::loadCMSclass();
			if($userid > SPY_USERID && method_exists($GLOBALS['fc_config']['cms'], 'getPhoto'))
			{
				return $GLOBALS['fc_config']['cms']->getPhoto($userid);
			}

			return '';
		}

		//changed on 090706 for chat instances
		/*function getUserProfile($userid) {
			ChatServer::loadCMSclass();
			return $GLOBALS['fc_config']['cms']->getUserProfile($userid);
		}*/
		function _getUserProfile($userid,$session_inst = 1)
		{
			ChatServer::loadCMSclass();
			return $GLOBALS['fc_config']['cms']->getUserProfile($userid,$session_inst);
		}
        //changed on 090706 for chat instances ends here
		function _userInRole($userid, $role)
		{
			if($userid == SPY_USERID)
			{
				return (ROLE_SPY == $role);
			}
			else if( $userid != null && $userid < SPY_USERID && $GLOBALS['fc_config']['enableBots'])
			{
				$user = $GLOBALS['fc_config']['bot']->getUser($userid);
				return( $role == $user['role'] );
			}
			else
			{
				if(isset($_SESSION['fc_users_cache'][$userid]))
				{
					return($_SESSION['fc_users_cache'][$userid]['roles'] == $role);
				}
				else if(isset($_SESSION['fc_roles_cache'][$userid]))
				{
					return($_SESSION['fc_roles_cache'][$userid] == $role);
				}

				ChatServer::loadCMSclass();
				$retval = $GLOBALS['fc_config']['cms']->userInRole($userid, $role);
				if($retval) $_SESSION['fc_roles_cache'][$userid] = $role;

				return $retval;
			}
		}

		//Connecton handlers
		function &getConnection($req = array(), $clientId = null)
		{
			$args = array();
			if(!isset($req['id']) || !$req['id'])
				$req['id'] = null;
		  $args = $req;

		  if( isset($GLOBALS['socket_server']) && $clientId !== null && !($GLOBALS['fc_config']['javaSocketServer'] && 'lin' == $req['c'])) {
		    $args = array_merge($req, $GLOBALS['socket_server']->clientInfo[$clientId]['connection']);
		  }

			if( isset($req['bot_ip']) )
				$args = array_merge($args, array( 'ip' => $req['bot_ip'], 'login' => $req['login']));


			return new Connection( $req['id'], $req['session_inst'], $args );// changed on 090706 for chat instances
		}

		function _addUser($login, $password, $roles)
		{
			ChatServer::loadCMSclass();
			return $GLOBALS['fc_config']['cms']->addUser($login, $password, $roles);
		}

		function _deleteUser($login)
		{
			ChatServer::loadCMSclass();
			$GLOBALS['fc_config']['cms']->deleteUser($login);
		}

		function writeToFile($arr, $path)
		{
			$data = serialize($arr);

			$file = @fopen( $path, 'wb' );
			if ( ! $file ) return;
			if ( ! flock($file, LOCK_EX) ) return;
			$res = fwrite($file, $data);

			fflush($file);
			fclose($file);
		}

		function readFromFile($path)
		{
			$file = @fopen( $path, 'rb' );
			if ( ! $file ) return;
			$data = fread( $file, filesize( $path ) ) ;
			fclose($file);

			return (unserialize($data));
		}

		function purgeExpired() {
			$file_path = $GLOBALS['fc_config']['appdata_path'];
			$arr = array();

			if( file_exists( $file_path ) && filesize( $file_path ) > 0 )
			{
				$arr = ChatServer::readFromFile($file_path);
			}
			else
			{
				$arr['time'] = time();
				ChatServer::writeToFile($arr, $file_path);
			}

			if((time() - $arr['time']) > ($GLOBALS['fc_config']['msgRequestInterval']*3))
			{
				$arr['time'] = time() + 3600;
				ChatServer::writeToFile($arr, $file_path);

				ChatServer::purge();

				//write time to file
				$arr['time'] = time();
				ChatServer::writeToFile($arr, $file_path);
			}
		}

		function purge()
		{
			if($GLOBALS['fc_config']['enableBots'])
			{
				$stmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'connections SET updated=NOW() WHERE userid IS NOT NULL AND ip=?',233);
				$stmt->process($GLOBALS['fc_config']['bot_ip']);

				$GLOBALS['fc_config']['bot']->processOptions();
				if( $GLOBALS['fc_config']['enableSocketServer'] )
					$GLOBALS['fc_config']['bot']->processMessages();
			}

			//Do all we need
			if( !$GLOBALS['fc_config']['enableSocketServer'] )
			{
				//Close expired connection
			  fb('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE updated < DATE_SUB(NOW(),INTERVAL ? SECOND)');
				$stmt = new Statement('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE updated < DATE_SUB(NOW(),INTERVAL ? SECOND)',203);
			  fb($GLOBALS['fc_config']['autocloseAfter']);
				$stmt->process($GLOBALS['fc_config']['autocloseAfter']);
				//Logout expired users
				$stmt = new Statement('SELECT id FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid IS NOT NULL AND updated < DATE_SUB(NOW(),INTERVAL ? SECOND) AND ip <> ?' , 204 );
				if($rs = $stmt->process($GLOBALS['fc_config']['autologoutAfter'], $GLOBALS['fc_config']['bot_ip']))
				{
					while($rec = $rs->next())
					{
						$conn = new Connection($rec['id']);
						$conn->doLogout('expiredlogin');
					}
				}
			}

			//update rooms where users exists
			$updt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'rooms,'.$GLOBALS['fc_config']['db']['pref'].'connections SET '.$GLOBALS['fc_config']['db']['pref'].'rooms.updated=NOW() WHERE '.$GLOBALS['fc_config']['db']['pref'].'rooms.id = '.$GLOBALS['fc_config']['db']['pref'].'connections.roomid',205);
			$updt->process();
			//Remove expired rooms

			$stmt = new Statement('SELECT id FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE ispermanent IS NULL AND updated < DATE_SUB(NOW(),INTERVAL ? SECOND)',52);
			$rmst = new Statement('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE ispermanent IS NULL AND id=?',60);
			if($rs = $stmt->process($GLOBALS['fc_config']['autoremoveAfter']))
			{
				$messageQueue = new MessageQueue();

				while($room = $rs->next())
				{

					$msg = new Message('rmr', null, $room['id']);
					$messageQueue->addMessage( $msg );

					if( isset($GLOBALS['socket_server']) ) $GLOBALS['socket_server']->sendMessage( $msg );
					$rmst->process($room['id']);
				}
			}

			//Remove expired messages
			$rmst = new Statement('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'messages WHERE created < DATE_SUB(NOW(),INTERVAL ? SECOND)',153);
			$rmst->process($GLOBALS['fc_config']['msgRemoveAfter']);

			//Remove expired bans
			$rmst = new Statement('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'bans WHERE created < DATE_SUB(NOW(),INTERVAL ? SECOND)',251);
			$rmst->process($GLOBALS['fc_config']['autounbanAfter']);
		}
	}
?>