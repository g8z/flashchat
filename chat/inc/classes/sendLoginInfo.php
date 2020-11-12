<?php
//added instance_id to al queries oulling from rooms table on 090706
			//Prevent login if this username/password used by another user

$fc_pref = $GLOBALS['fc_config']['db']['pref'];


			$stmt = new Statement('SELECT id, ip FROM '.$fc_pref.'connections WHERE userid=? AND id<>?',206);
			if( ($rs = $stmt->process($this->userid, $this->id)) && ($rec = $rs->next()) )
			{
				if( $rec['ip'] == $this->ip )
				{
					$conn = new Connection($rec['id']);
					$conn->doLogout('login');
				}
				else
				{
					//!!!do not delete this line
					$this->userid = null;
					//!!!do not delete this line
					return $this->sendBack(new Message('lout', null, null, 'anotherlogin'));
				}
			}

			$stmt = new Statement('SELECT COUNT(*) as cnt FROM '.$fc_pref.'connections WHERE ip=? AND userid IS NOT NULL',207);

			if(($rs = $stmt->process($this->ip)) && ($rec = $rs->next()) && $this->ip != $GLOBALS['fc_config']['bot_ip'])
			{
				if($rec['cnt'] >= $GLOBALS['fc_config']['loginsPerIP'])
				{
					$this->userid = null;
					return $this->sendBack(new Message('lout', null, null, 'iplimit'));
				}
			}

			// # Paul M - Prevent non authorised members joining # //
			// start fix for banned and non-banned user denial access
			if(
				(ChatServer::userInRole($this->userid, ROLE_NOBODY) || ChatServer::userInRole($this->userid, ROLE_ANY)) &&
				 $this->ip != $GLOBALS['fc_config']['bot_ip']
			  )
			{
			    $txt = ChatServer::userInRole($this->userid, ROLE_NOBODY)? 'banned' : 'wrongPass';
			    $this->userid = null;
			    return $this->sendBack(new Message('lout', null, null, $txt));
		    }
			// end fix

			//Prevent login from banned users/IPs
		    $stmt = new Statement('SELECT * FROM '.$fc_pref.'bans WHERE id=?',257);

		    //flash shared object
		    if ($fsoId) {
				if(($rs = $stmt->process($fsoId)) && $rs->hasNext())
				{
					$this->userid = null;
					return $this->sendBack(new Message('lout', null, null, 'banned'));
				}
		    }
			//COOKIE
		    if ($cookieId = $_COOKIE['banId']) {
				if(($rs = $stmt->process($cookieId)) && $rs->hasNext())
				{
					$this->userid = null;
					return $this->sendBack(new Message('lout', null, null, 'banned'));
				}
		    }

			$stmt = new Statement('SELECT * FROM '.$fc_pref.'bans WHERE (banneduserid=? OR ip=?) AND roomid IS NULL',252);

			if(($rs = $stmt->process($this->userid, $this->ip)) && $rs->hasNext())
			{
				$this->userid = null;
				return $this->sendBack(new Message('lout', null, null, 'banned'));
			}
			//autounban user if he was banned from room
			$stmt = new Statement('DELETE FROM '.$fc_pref.'bans WHERE banneduserid=? AND roomid IS NOT NULL',256);
			$stmt->process($this->userid);




			$user = ChatServer::getUser($this->userid);

      if (in_array($user['roles'], array(0, 1))) {
  			$disabled = explode(',', $GLOBALS['fc_config']['disabledLogins']);
	  		foreach ($disabled as $item){
	  		  $item = strtolower(trim($item));
	  		  $str = str_replace('*', '', $item);
			    $pos = strpos(strtolower($user['login']), $str);
	  		  $beg = ('*' == $item[0]);
	  		  $end = ('*' == $item[strlen($item)-1]);
          if ((false !== $pos) && (0 == $pos || $beg) && (((strlen($user['login'])-strlen($str))== $pos) || $end)) {
            return $this->sendBack(new Message('lout', null, null, 'disabledlogin'));
          }
		  	}
      }

	//All checks are over, start xml reply
			$ret = $this->doGetLanguage($this->lang);

			$this->sendBack(new Message('lin', $this->userid, $user['roles'], $this->lang));

			//Send room list to user
			$rooms = array();
			$room_pass = array();
			if($GLOBALS['fc_config']['liveSupportMode'] && (ChatServer::userInRole($this->userid, ROLE_CUSTOMER) || ChatServer::userInRole($this->userid, ROLE_USER)))
			{
				$stmt = new Statement('SELECT * FROM '.$fc_pref.'rooms WHERE name=? AND instance_id=?');

				if(($rs = $stmt->process('Support Room for '.$user['login'], $this->session_inst)) && ($rec = $rs->next()))
				{
					$this->roomid = $rec['id'];
					$this->addRoom($rec, $rooms, $room_pass);
				}
				else
				{

					$this->roomid = $this->doCreateRoom('Support Room for '.$user['login'], true);
					$stmt = new Statement('SELECT * FROM '.$fc_pref.'rooms WHERE id=?',80);
					if(($rs = $stmt->process($this->roomid)) && ($rec = $rs->next())) {
						$this->addRoom($rec, $rooms, $room_pass);
					}
				}//if(($rs = $stmt->process("Support Room for {$user['login']}")) && ($rec = $rs->next()))
			}
			else
			{//if(ChatServer::userInRole($this->userid, ROLE_CUSTOMER)) {
			//room list for ordinary users 'ROLE_USER'

				$stmt = new Statement('SELECT * FROM '.$fc_pref.'rooms WHERE ispublic IS NOT NULL AND ispermanent IS NOT NULL AND instance_id=?  ORDER BY ispermanent',53);



				if($rs = $stmt->process( $this->session_inst)) {
					while($rec = $rs->next()) {
						$this->addRoom($rec, $rooms, $room_pass);
					}
				}//if($rs = $stmt->process()) {

				// # Paul M - Load permanant, private (Staff) rooms when Chat Admin # //
				if(ChatServer::userInRole($this->userid, ROLE_ADMIN) || ChatServer::userInRole($this->userid, ROLE_MODERATOR))
				{
					$stmt = new Statement('SELECT * FROM '.$fc_pref.'rooms WHERE ispublic IS NULL AND ispermanent IS NOT NULL AND instance_id=? ORDER BY created',77);



					if($rs = $stmt->process( $this->session_inst))
					{
						while($rec = $rs->next())
						{
							$this->addRoom($rec, $rooms, $room_pass);
						}
					}
				}//if(ChatServer::userInRole($this->userid, ROLE_ADMIN) || ChatServer::userInRole($this->userid, ROLE_MODERATOR))
				//list of temporary rooms

				$stmt = new Statement('SELECT * FROM '.$fc_pref.'rooms WHERE ispublic IS NOT NULL AND ispermanent IS NULL AND instance_id=? ORDER BY created',77);



				if($rs = $stmt->process( $this->session_inst)) {
					while($rec = $rs->next()) {
						$this->addRoom($rec, $rooms, $room_pass);
					}
				}
			}////if(ChatServer::userInRole($this->userid, ROLE_CUSTOMER)) {

			//Send user list to user
			//$stmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE id<>? AND userid IS NOT NULL");
			//if($rs = $stmt->process($this->id)) {
			$stmt = new Statement('SELECT * FROM '.$fc_pref.'connections WHERE id<>? AND instance_id=? AND userid IS NOT NULL',222);



			if($rs = $stmt->process($this->id, $this->session_inst)) {//changed on 090706 for chat instances

				if($GLOBALS['fc_config']['enableBots'])
				{
					$bots = $GLOBALS['fc_config']['bot']->getBots();
				}

				while($rec = $rs->next()) {


					$user = ChatServer::getUser($rec['userid']);
					$spy = ChatServer::userInRole($rec['userid'], ROLE_SPY);
					if($user && !$spy) {
						if(!$GLOBALS['fc_config']['liveSupportMode'] || !ChatServer::userInRole($this->userid, ROLE_CUSTOMER) || ChatServer::userInRole($rec['userid'], ROLE_ADMIN)) {
							if(!isset($rooms[$rec['roomid']])) $rooms[$rec['roomid']] = 0;
							$rooms[$rec['roomid']] += 1;

							$this->sendBack(new Message('adu', $rec['userid'], $rec['roomid'], $user['login']));
							$this->sendBack(new Message('uclc', $rec['userid'], null, $rec['color']));
							$this->sendBack(new Message('ustc', $rec['userid'], null, $rec['state']));

							//send bot avatar
							if($rec['userid'] < 0)
							{
								$in_rec = array();
								$in_rec['id'] = $rec['id'];
								$conn =& ChatServer::getConnection($in_rec);
								$conn->doSendAvatar('mavt', $bots[$rec['userid']]['chat_avatar'], 0);
								$conn->doSendAvatar('ravt', $bots[$rec['userid']]['room_avatar'], 0);
							}
						}
					}
				}
			}

			$user = ChatServer::getUser($this->userid);
			if($rooms[$this->roomid] >= $GLOBALS['fc_config']['maxUsersPerRoom'])
			{
				foreach(array_keys($rooms) as $room)
				{
					if($rooms[$room] < $GLOBALS['fc_config']['maxUsersPerRoom'])
					{
						$this->roomid = $room;
						break;
					}
				}

				if($this->roomid <> $room || 1 == count($rooms))
					return $this->sendBack(new Message('lout', null, null, 'chatfull'));
			}

			//warn all users about new user
			$stmt = new Statement('SELECT `password` FROM '.$fc_pref.'rooms WHERE id=?', 84);
			if($rs = $stmt->process($this->roomid))
			{

				while($rec = $rs->next())
				{

					if($rec['password'] != '')
					{
						$this->sendBack(new Message('adu', $this->userid, $this->roomid, $user['login']));
					}
					else
					{
						$this->sendToAll(new Message('adu', $this->userid, $this->roomid, $user['login']));
					}
				}
			}
			$this->sendToAll(new Message('uclc', $this->userid, null, $this->color));
			$this->sendToAll(new Message('ustc', $this->userid, null, $this->state));

			//Update ingonre state
			$stmt = new Statement('SELECT * FROM '.$fc_pref.'ignors WHERE userid=?');
			if($rs = $stmt->process($this->userid)) {
				while($rec = $rs->next()) {
					$this->sendBack(new Message('ignu', $rec['ignoreduserid']));
				}
			}

			if($GLOBALS['fc_config']['backtimeOnLogin']) $this->doBacktime($GLOBALS['fc_config']['backtimeOnLogin']);
// fix for /welcome message

			if ($GLOBALS['fc_config']['auto_motd']) {
             require_once(INC_DIR . 'classes/doMotd.php');
			 }
            $destination = null;
  			if ($GLOBALS['fc_config']['auto_topic']) {
				require_once(INC_DIR . 'classes/doRoomEntryInfo.php');
			}

// end fix
			return $ret;
?>