<?php
			if($GLOBALS['fc_config']['liveSupportMode'])
			{
				$this->sendToAll(new Message('rang', $this->userid));
			}
			else
			{
				$bell_limit = $GLOBALS['fc_config']['bellTime']; // seconds
				$stmt = new Statement('SELECT count(*) AS numb FROM '.$GLOBALS['fc_config']['db']['pref'].'messages WHERE command=\'rang\' AND toroomid=? AND userid=? AND created > DATE_SUB(NOW(),INTERVAL ? SECOND)');
				if(($rs = $stmt->process($this->roomid, $this->userid, $bell_limit)) && ($rec = $rs->next()) && $rec['numb'] == 0)
				{
					$this->sendToRoom($this->roomid, new Message('rang', $this->userid));
				}
				else
				{
					$txt = 'Bell limitation in effect, your bell is disabled for ' . $bell_limit . ' seconds';
					$this->sendToUser(null, new Message('msg', $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $txt, $this->color));
				}

			}

?>