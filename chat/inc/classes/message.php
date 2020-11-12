<?php
	class Message {
		var $id = null;

		var $created = null;

		var $toconnid = null;
		var $touserid = null;
		var $toroomid = null;

		var $command = null;
		var $userid = null;
		var $roomid = null;
		var $txt = null;

		var $color = null;
		var $session_inst = 1;// added on 090706 for chat instances

		function Message($command, $userid = null, $roomid = null, $txt = null, $color = null)
		{
			$this->command = $command;
			$this->userid = $userid;
			$this->roomid = $roomid;
			$this->color = htmlColor($color);

			if(isset($txt))
			{
				$this->txt = $this->parse($txt);
			}
		}

		function parse($txt)
		{
			if($this->command != 'usrp')
			{
				$txt = $this->replaceBadWord(htmlspecialchars($txt));
				if($this->command == 'msg') $txt = $this->parseURL($txt);
			}
			return $txt;
		}

		function replaceBadWord($inputString)
		{

			$replace_pairs = array( '&lt;' => ' &lt;',
									'&gt;' => '&gt; '
									);
			$inputString = strtr ( $inputString, $replace_pairs);

			$pattern = array();
			$replacement = array();

			$keys = array();
			if(is_array($GLOBALS['fc_config']['badWords']))
				$keys = array_keys($GLOBALS['fc_config']['badWords']);

			for($i = 0; $i <  sizeof($keys); $i++)
			{
				/*if( is_numeric($keys[$i]) && isset($GLOBALS['fc_config']['badWords'][$keys[$i]]) )
				{
					$badword         = $GLOBALS['fc_config']['badWords'][$keys[$i]];
					$replacement[$i] = ' '.$GLOBALS['fc_config']['badWordSubstitute'].' ';
				}
				else
				*/
				{
					$badword = $keys[$i];
					$replacement[$i] = ' '.$GLOBALS['fc_config']['badWords'][$keys[$i]].' ';
				}

				//$replacement[$i] = str_replace($badword, $GLOBALS['fc_config']['badWordSubstitute'], $replacement[$i]);

				$badword = str_replace('*', '|@@@|', $badword);
				$badword = str_replace('|@@@|', '\S*', $badword);
				/*
				if(substr($badword, 0, 1) != '.') $badword = '(^|\s+)'.$badword;
				if(substr($badword, -1) != '?') $badword = $badword.'($|\s+)';
				*/
				$pattern[$i] = '/'.$badword.'/i';
			}

			$prev_str = '';
			//while(strcmp($prev_str,$inputString) != 0)
			{
				$prev_str = $inputString;
				$inputString = preg_replace($pattern, $replacement, $inputString);
			}
			$replace_pairs = array( ' &lt;' => '&lt;',
									'&gt; ' => '&gt;'
									);
			$inputString = strtr ( $inputString, $replace_pairs);

			return $inputString;
		}

		function parseURL($inputString) {
			$replace_pairs = array( '&lt;' => ' &lt;',
									'&gt;' => '&gt; '
									);
			$inputString = strtr ( $inputString, $replace_pairs);

			$inputTokens = explode(' ', $inputString);
			$input = '';
			foreach( $inputTokens as $token )
			{
				//smallest URL assumpted as a@a.us
				if(strlen($token) > 5)
				{
					// check for email address
					if (strpos($token, '@') !== false)
					{
						if(strpos($token, 'mailto:') === 0)
							$token = substr($token, 7);

						if(preg_match('/^([0-9,a-z,A-Z]+)([.,_]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$/',$token))
							$token = '<a href="mailto:'.$token.'" style="color:'.$this->color.'"><u>'.$token.'</u></a>';
					}

					// check for https://, http://
					else if((($pos = strpos($token, 'http://')) !== false) ||
							(($pos = strpos($token, 'https://')) !== false)||
							(($pos = strpos($token, 'ftp://')) !== false))
					{

						$pref = substr($token, 0, $pos);
						$link = substr($token, $pos);

						if(strlen($link) > 8) $token = $pref.'<a href="'.$link.'" target="_blank" style="color:'.$this->color.'"><u>'.$link.'</u></a>';
					}

					// check for www.
					else
						if(strpos($token, 'www.') === 0)
						{
							$token = '<a href="http://'.$token.'" target="_blank" style="color:'.$this->color.'"><u>'.$token.'</u></a>';
						}
				}

				$input .= $token.' ';
			}

			$replace_pairs = array( ' &lt;' => '&lt;',
									'&gt; ' => '&gt;'
									);
			$input = strtr ( $input, $replace_pairs);

			return trim($input);
		}

		function toXML($tzoffset = 0, $isForAdmin) {

			$xml = '<'.$this->command;
			if($this->id) $xml .= ' id="'.$this->id.'"';
		  if ($isForAdmin) {
  		  $stmt = new Statement('SELECT id, ip FROM '.$fc_pref.'connections WHERE userid=? AND id<>?',206);
  		  if( ($rs = $stmt->process($this->userid, -1)) && ($rec = $rs->next()) ) {
  		    $xml .= ' ip="'.$rec['ip'].'"';
  		  }
		  }
		  $stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'connections WHERE id=? LIMIT 1',213);
			if($this->touserid) $xml .= ' a="'.$this->touserid.'"';
			if($this->userid) $xml .= ' u="'.$this->userid.'"';
			if($this->roomid) $xml .= ' r="'.$this->roomid.'"';

			if($this->command == 'msgb') {
				$user = ChatServer::getUser($this->userid);
				$xml .= ' l="'.$user['login'].'"';
			}

			if($this->command == 'adu' || $this->command == 'lin') {
				$user = ChatServer::getUser($this->userid);
				$xml .= ' rs="'.$user['roles'].'"';
				//$xml .= " gn=\"{$user['gender']}\"";

				$gender = ChatServer::getGender($this->userid);
				$xml .= ' gn="'.$gender.'"';

				$photo = ChatServer::getPhoto($this->userid);
				$xml .= ' pt="'.$photo.'"';
			}

			if($this->created) $xml .= ' t="'. format_Timestamp($this->created, $tzoffset).'"';
			if(isset($this->txt)) {
				$xml .= '><![CDATA['.$this->txt.']]></'.$this->command.'>';
			} else {
				$xml .= '/>';
			}

			return $xml;
		}
	}
?>