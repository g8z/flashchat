<?php

				if($irc_cmd == '/showignores') {

					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

					$ignore_list = 'Ignored by you:';
					$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'ignors WHERE userid=?',306);
					if($rs = $stmt->process($this->userid))
					{
						if(!$rs->hasNext()) $ignore_list .= ' ---';
						while($rec = $rs->next())
						{
							$user = ChatServer::getUser($rec['ignoreduserid']);
							$ignore_list .= ' ' . $user['login'];
						}

						$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $ignore_list, $this->color));
					}

					$ignore_list = 'Ignores you:';
					$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'ignors WHERE ignoreduserid=?',309);

					if($rs = $stmt->process($this->userid))
					{
						if(!$rs->hasNext()) $ignore_list .= ' ---';
						while($rec = $rs->next())
						{
							$user = ChatServer::getUser($rec['userid']);
							$ignore_list .= ' ' . $user['login'];
						}
						$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $ignore_list, $this->color));
					}
					return 'ok';
				}

				if($irc_cmd == '/showbans' && $role_admin)
				{

					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

					$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'bans',254);
					if($rs = $stmt->process())
					{
						if($rs->hasNext())
						{
							while($rec = $rs->next())
							{
								if($rec['userid'])
								{
									$user = ChatServer::getUser($rec['userid']);
									$ban_list = 'Ban by ' . $user['login'];
								}
								if($rec['banneduserid'])
								{
									$user = ChatServer::getUser($rec['banneduserid']);
									$ban_list .= ': user ' . $user['login'];
								}
								if($rec['roomid'])
								{
									$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id=?',80);
									if($rs2 = $stmt->process($rec['roomid']))
									{
										$room = $rs2->next();
										$ban_list .= ' banned from room ' . $room['name'];
									}
								}
								else
								{
									if(!$rec['ip']) $ban_list .= ' banned from chat';
								}

								if($rec['ip'])
								{
									$ban_list .= ' banned by ip ' . $rec['ip'];
								}

								$replacements = array( '-' => '', ' ' => '', ':' => '');
								$rec['created'] = strtr($rec['created'], $replacements);

								$ban_list .= ' created at ' . substr($rec['created'], 8, 2) . ':' . substr($rec['created'], 10, 2);
								$ban_list .= ' date ' . substr($rec['created'], 4, 2) . '-' . substr($rec['created'], 6, 2);
								$deltatime = time() - mktime(substr($rec['created'], 8, 2), substr($rec['created'], 10, 2), substr($rec['created'], 12, 2), substr($rec['created'], 4, 2), substr($rec['created'], 6, 2), substr($rec['created'], 0, 4));
								$deltatime = number_format(($GLOBALS['fc_config']['autounbanAfter'] - $deltatime) / 3600, 1);
								$ban_list .= ' expires in ' . $deltatime . ' hours';

								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $ban_list, $this->color));

								if($rec['ip'])
								{
									$ban_list = 'ip=' . $rec['ip'] . ' host=' . gethostbyaddr($rec['ip']);
									$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $ban_list, $this->color));
								}
							}
							return 'ok';
						}
						$txt = 'No bans found';
						$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
						return 'ok';
					}
					return 'ok';
				}

				if($irc_cmd == '/rooms' && $role_admin)
				{

					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

					$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms' , 55 );
					$rs = $stmt->process();
					while($rec = $rs->next())
					{
						$rooms = $rec['name'] . ' is';
						if($rec['ispublic']) $rooms .= ' public'; else $rooms .= ' private';
						if(!$rec['ispermanent']) $rooms .= ' and temporary';
						$rooms .= ' room';
						$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $rooms, $this->color));
					}

					return 'ok';
				}


				if($irc_cmd == '/welcome' || $irc_cmd == '/topic')
				{
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					require_once(INC_DIR . 'classes/doRoomEntryInfo.php');
					return 'ok';
				}

				if($irc_cmd == '/status' && $role_admin)
				{
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

					$stmt = new Statement('SELECT count(*) as msgnumb FROM '.$GLOBALS['fc_config']['db']['pref'].'messages WHERE command=\'msg\' AND (userid IS NOT NULL OR roomid IS NOT NULL)',160);
					$rs = $stmt->process();
					$rec = $rs->next();
					$txt = 'Total messages: ' . $rec['msgnumb'];
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

					$stmt = new Statement('SELECT count(*) as msgnumb FROM '.$GLOBALS['fc_config']['db']['pref'].'messages WHERE command=\'msg\' AND touserid IS NOT NULL');
					$rs = $stmt->process();
					$rec = $rs->next();
					$txt = 'Private messages: ' . $rec['msgnumb'];
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

					$stmt = new Statement('SELECT count(*) as msgnumb FROM '.$GLOBALS['fc_config']['db']['pref'].'bans',272);
					$rs = $stmt->process();
					$rec = $rs->next();
					$txt = 'Bans: ' . $rec['msgnumb'];
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

					$stmt = new Statement('SELECT count(*) as msgnumb FROM '.$GLOBALS['fc_config']['db']['pref'].'ignors',310);
					$rs = $stmt->process();
					$rec = $rs->next();
					$txt = 'Ignores: ' . $rec['msgnumb'];
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

					$stmt = new Statement('SELECT count(*) as msgnumb FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid IS NOT NULL',234);
					$rs = $stmt->process();
					$rec = $rs->next();
					$txt = 'Logged in users: ' . $rec['msgnumb'];
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

					$stmt = new Statement('SELECT count(*) as msgnumb FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms',63);
					$rs = $stmt->process();
					$rec = $rs->next();
					$txt = 'Total Rooms: ' . $rec['msgnumb'];
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

					$stmt = new Statement('SELECT count(*) as msgnumb FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE ispublic IS NULL',64);
					$rs = $stmt->process();
					$rec = $rs->next();
					$txt = 'Private Rooms: ' . $rec['msgnumb'];
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

					return 'ok';
				}

				if($irc_cmd == '/names') {
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

					$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms ORDER BY id',65);
					$rs = $stmt->process();

					$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid IS NOT NULL ORDER BY roomid' , 235);
					$rs2 = $stmt->process();

					$rec = $rs2->next();
					while($room = $rs->next()) {

						$userlist = $room['name'];
						if(!$room['ispublic']) $userlist .= ' (P)';
						$userlist .= ':';
						while($rec['roomid'] == $room['id'])
						{

							$user = ChatServer::getUser($rec['userid']);
							$spy  = ChatServer::userInRole($rec['userid'], ROLE_SPY);
							if($user && !$spy) $userlist .= ' "' . $user['login'] . '"';
							$rec = $rs2->next();
						}
						if($role_admin || $room['ispublic'] || $room['id'] == $this->roomid) $this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $userlist, $this->color));
					}
					return 'ok';
				}

				if($irc_cmd == '/sos')
				{
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

					$user = ChatServer::getUser($this->userid);
					$soscall = 'SOS call from user ' . $user['login'] . ' in this Room';
					if(strlen($txt) > 4) $soscall .= '<br>User message: ' . substr($txt, 5);

					$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE roomid=? AND userid IS NOT NULL',238);

					$rs = $stmt->process($this->roomid);
					while($rec = $rs->next())
					{
						if(ChatServer::userInRole($rec['userid'], ROLE_ADMIN))
						{
							$this->sendToUser($rec['userid'], new Message('alrt', $this->userid, null, $soscall));
							return 'ok';
						}
					}

					$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id=?',80);
					$rs = $stmt->process($this->roomid);
					$rec = $rs->next();

					$soscall = 'SOS call from user ' . $user['login'] . ' in Room ' . $rec['name'];
					if(!$rec['ispublic']) $soscall .= ' (Private)';
					if(strlen($txt) > 4) $soscall .= '<br>User message: ' . substr($txt, 5);

;					$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE roomid<>? AND userid IS NOT NULL',239);
					$rs = $stmt->process($this->roomid);
					while($rec = $rs->next())
					{
						if(ChatServer::userInRole($rec['userid'], ROLE_ADMIN))
						{
							$this->sendToUser($rec['userid'], new Message('alrt', $this->userid, null, $soscall));
							return 'ok';
						}
					}
					$txt = 'No Moderators found in any Room';
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					return 'ok';
				}

				if($irc_cmd == '/kickroom' && $role_admin)
				{
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

					$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE roomid=? AND userid IS NOT NULL',238);
					if($rs = $stmt->process($this->roomid))
					{
						while($rec = $rs->next())
						{
							if(!ChatServer::userInRole($rec['userid'], ROLE_ADMIN))
							{
								$conn = new Connection($rec['id']);
								$conn->doLogout('expiredlogin');
							}
						}
					}
					return 'ok';
				}

				if(
				   $irc_cmd == '/motd' || $irc_cmd == '/move' || $irc_cmd == '/kickout' ||
				   $irc_cmd == '/reban' || $irc_cmd == '/unban' || $irc_cmd == '/unignore' ||
				   $irc_cmd == '/msg' || $irc_cmd == '/query' || $irc_cmd == '/whois' ||
				   $irc_cmd == '/whowas' || $irc_cmd == '/who' || $irc_cmd == '/profile'
				  )
				{
					$who_user = strtolower(substr($txt, $irc_len + 1));
					if(substr($who_user, 0, 6) == '&quot;')
					{
						$who_user = substr($who_user, 6, strrpos($who_user, '&quot;') - 6);
						$start_mess = strlen($who_user) + 13 + $irc_len;
					}
					else
					{
						$who_user = substr($who_user, 0, strpos($who_user . ' ', ' '));
						$start_mess = strlen($who_user) + 2 + $irc_len;
					}

					if($irc_cmd == '/unignore' || $irc_cmd == '/msg')
					{
						$msg_txt  = substr($txt, $start_mess);
					}
					else
					{
						$msg_txt = ' ';
					}

					if($irc_cmd == '/motd')
					{
						$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
						if($role_admin && $who_user == '@')
						{

							$rfile = './temp/appdata/motd.txt';

							if(file_exists($rfile) && $php_file = @fopen($rfile, 'rb'))
							{
								$contents = fread($php_file, $fz = filesize ($rfile));
								fclose ($php_file);

								$contents = str_replace( chr(13) . chr(10) , '<br>', $contents); // replace crlf with line breaks
								$contents = str_replace( chr(10) . chr(13) , '<br>', $contents); // replace lfcr with line breaks
								$rtxt = explode('<br>', $contents);

								$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms',65);
								if($rs = $stmt->process())
								{
									while($rec = $rs->next())
									{
										foreach($rtxt as $k => $v)
											$this->sendToRoom(null, new Message('msg', $this->userid, $rec['id'], $v, $this->color));
										reset($rtxt);
									}
								}
							}
							return 'ok';
						}

						if($role_admin && $who_user)
						{
							$rfile = './temp/appdata/motd.txt';

							if($php_file = @fopen($rfile, 'wb'))
							{
								fwrite($php_file, html_entity_decode(substr($txt, $irc_len + 1)));
								fclose ($php_file);
							}
						}

						require_once(INC_DIR . 'classes/doMotd.php');
						return 'ok';
					}

					if($who_user != substr($irc_cmd, 1))
					{
						if(
						    $irc_cmd == '/unignore' || $irc_cmd == '/whowas' ||
						   ($irc_cmd == '/unban' && $role_admin) || ($irc_cmd == '/reban' && $role_admin)
						  )
						{
							$who = ChatServer::getUsers();
							while(list($key, $val) = each($who))
							{
								if(strtolower($val['login']) == $who_user && $val['roles'] != ROLE_SPY) {
									$who_userid = $val['id'];
									break;
								}
							}
						}
						else
						{
							$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid IS NOT NULL',218);
							if($rs = $stmt->process())
							{
								while($rec = $rs->next())
								{
									$user = ChatServer::getUser($rec['userid']);
									$spy  = ChatServer::userInRole($rec['userid'], ROLE_SPY);

									if($user && !$spy && $who_user == strtolower($user['login']))
									{
										$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id=?',80);
										$rs = $stmt->process($rec['roomid']);
										$room = $rs->next();
										if($role_admin || $rec['userid'])// != $this->userid)
										{
											$who_userid = $rec['userid'];
											$replacements = array( '-' => '', ' ' => '', ':' => '');
											$rec['created'] = strtr($rec['created'], $replacements);
											
											// contributed by Pavel
											$ipText = ($GLOBALS['fc_config']['commands']['showIP']) ? ' ip=' . $rec['ip']. ' host=' . gethostbyaddr($rec['ip']) : '';
											$who_ip = 'User=' . $user['login'] . ' room=' . $room['name'] . ' created=' . substr($rec['created'], 8, 2) . ':' . substr($rec['created'], 10, 2) . ' lang=' . $rec['lang'] . ' tz=' . $rec['tzoffset'] 
													. $ipText ;
											$who_id = $rec['id'];
										}
										if(!$role_admin && $room['ispublic']) $who_userid = $rec['userid'];
										break;
									}
								}

							}
						}

						if(!$who_userid && $who_user != '@')
						{
							$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

							$txt = 'User "' . $who_user . '" was not found';
							if($irc_cmd != '/whowas') $txt .= ' in any Room';

							$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
							return 'ok';
						}

						if($irc_cmd == '/kickout' && $role_admin)
						{
							$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

							if($who_user == '@')
							{
								$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE userid IS NOT NULL',218);
								if($rs = $stmt->process())
								{
									while($rec = $rs->next())
									{
										if(!ChatServer::userInRole($rec['userid'], ROLE_ADMIN))
										{
											$conn = new Connection($rec['id']);
											$conn->doLogout('kickedOut');
										}
									}
								}
							} else {

								$conn = new Connection($who_id);
								$conn->doLogout('kickedOut');
							}
							return 'ok';
						}

						if($irc_cmd == '/reban' && $role_admin)
						{
							$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

							if($who_user == '@')
							{
								$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'bans',254);
								if($rs = $stmt->process())
								{
									while($rec = $rs->next())
									{
										$stmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'bans SET created=NOW() WHERE banneduserid=?',280);
										$stmt->process($rec['banneduserid']);
									}
								}
							}
							else
							{
								$stmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'bans SET created=NOW() WHERE banneduserid=?',280);
								$stmt->process($who_userid);
							}

							return 'ok';
						}

						if($irc_cmd == '/unban' && $role_admin)
						{
							$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

							$type = 'nbanu';
							$this->sendToUser($who_userid, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $msg_txt, $this->color));

							$stmt = new Statement('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'bans WHERE banneduserid=?',274);
							$stmt->process($who_userid);

							return 'ok';
						}

						if($irc_cmd == '/move' && $role_admin)
						{
							$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

							$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id=?',80);
							$rs = $stmt->process($this->roomid);
							$room = $rs->next();

							if(!$room['ispublic']) $this->sendToUser($who_userid, new Message('adr', null, $this->roomid, $room['name']));

							$this->sendToAll(new Message('mvu', $who_userid, $this->roomid, $msg));

							$stmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'connections SET updated=NOW(), roomid=? WHERE id=?',240);
							$stmt->process($this->roomid, $who_id);

							return 'ok';
						}

						if($irc_cmd == '/unignore')
						{
							$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

							$type = 'nignu';
							$this->sendToUser($who_userid, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $msg_txt, $this->color));

							$stmt = new Statement('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'ignors WHERE userid=? AND ignoreduserid=?',305);
							$stmt->process($this->userid, $who_userid);

							return 'ok';
						}

						if($irc_cmd == '/msg' || $irc_cmd == '/query')
						{
							$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));

							if($irc_cmd == '/msg') $txt = $msg_txt; else $txt = '';
							$this->sendToUser($who_userid, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
							return 'ok';
						}

						if($who_ip)
						{
							$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
							$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $who_ip, $this->color));
							if($irc_cmd == '/who') return 'ok';
						}

						if(substr($irc_cmd, 0, 4) == '/who')
						{
							if(!$who_ip) $this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
							$this->doRequestUserProfileText($who_userid);
							return 'ok';
						}
					}
				}
//start fix nr 1 for not displaying bad IRC commands and also all available IRC commands when /? or /help

         if(substr($txt, 0, 2) == '/?' || substr($txt, 0, 5) == '/help')
		 {
            if( !$role_admin || (substr($txt, 0, 5) == '/?all' || substr($txt, 0, 8) == '/helpall') )
			{
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>User Commands are:</b>';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>Announcing availability:</b>';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/away</b> Sets user as away. Typing this command again sets user as "here".';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/here</b> Sets user as here. This reverses the "away" and "busy" states.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/busy</b> Sets user as busy. Typing this command again sets user as "here".';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>Managing messages:</b>';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/back &lt;number&gt;</b> Shows the last &lt;number&gt; of entries of the rooms chat.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/backtime &lt;minutes&gt;</b> Shows the last &lt;minutes&gt; of the rooms chat.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/clear</b> Clears the chat screen. This only affects your screen, not the screen of other users.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/me &lt;action&gt;</b> Issues an IRC-like "action" to the chat.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/msg &lt;user&gt; &lt;message&gt;</b> Initiates a PM with &lt;user&gt; and fills PM box with optional &lt;message&gt;.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/query &lt;user&gt;</b> Initiates a PM with &lt;user&gt;';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>Accessing rooms:</b>';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/join &lt;room&gt;</b> Switches the user to &lt;room&gt;. For example: "/join The Lounge"';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/part</b> Logout of the chat.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/quit</b> Logout of the chat.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/logout</b> Logout of the chat.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>Managing users:</b>';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/ignore &lt;user&gt;</b> Ignores PMs from &lt;user&gt;.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/invite &lt;user&gt;</b> Invites &lt;user&gt; to the room that you are currently in.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/names</b> Shows a list of all user names in all public rooms';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/showignores</b> Shows a list of users ignored by you and which other users are ignoring you.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/sos &lt;message&gt;</b> Alerts moderator in current room or all moderators. &lt;message&gt; is optional.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/unignore &lt;user&gt; &lt;message&gt;</b> Removes your ignore of &lt;user&gt; with optional &lt;message&gt; to user.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/who &lt;user&gt;</b> Profile page popup for &lt;user&gt;. If you are &lt;user&gt; login information is added.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/whois &lt;user&gt;</b> Profile page popup for &lt;user&gt; where &lt;user&gt; must be logged in to the chat.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/whowas &lt;user&gt;</b> Profile page popup for any registered &lt;user&gt;.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>Other:</b>';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/motd</b> Displays the Message of the Day.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/topic</b> Shows the topic or welcome message for the room you are in, if any.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/version</b> Shows which version of the chat you are using.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/welcome</b> Same as /topic.';
								$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
				}

				if($role_admin)
				{
					$txt = '<b>Moderator Commands are:</b>';
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/kick</b> user <b>/boot</b> user <b>/ban</b> user <b>/banip</b> user <b>/gagX</b> user <b>/ungag</b> user <b>/broadcast</b> message';
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/alert</b> user message <b>/roomalert</b> message <b>/chatalert</b> message';
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/showbans</b>&nbsp;<b>/unban</b> user <b>/reban</b> user <b>/reban</b> @ <b>/rooms</b>&nbsp;<b>/who</b> user <b>/whois</b> user <b>/names</b>';
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/kickout</b> user <b>/kickout</b> @ <b>/kickroom</b>&nbsp;<b>/move</b> user <b>/status</b>';
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/motd</b>&nbsp;<b>/motd</b> @ <b>/motd</b> [new message] <b>/?all</b>&nbsp;<b>/helpall</b>';
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '<b>/addbot</b> botname <b>/startbot</b> botname <b>/killbot</b> botname <b>/showbots</b>';
				    $this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
  				    $txt = '<b>/teach</b> "botname" "phrase" => "response" <b>/unteach</b> "botname" "phrase"';
 				    $this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
				}

				if($GLOBALS['fc_config']['disabledIRC'])
				{
					$txt = '<b>Some IRC commands are disabled:</b>';
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
					$txt = '/' . str_replace ( ',', ' /', $GLOBALS['fc_config']['disabledIRC']);
					$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
				}

				return 'ok';
			}

			if(substr($txt, 0, 1) == '/')
			{
				$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
				$txt = 'Warning ! Only IRC subset can be used (Type /? or /help for list of IRC commands)';
				$this->sendToUser(null, new Message($type, $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
				return 'ok';
			}
?>