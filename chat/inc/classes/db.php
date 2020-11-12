<?php
	define('STATEMENT_SELECT', 'select');
	define('STATEMENT_INSERT', 'insert');
	define('STATEMENT_UPDATE', 'update');
	define('STATEMENT_DELETE', 'delete');

	class Statement
	{
		var $queryArray;
		var $type = STATEMENT_SELECT;
		var $conn = null;
		var $final_query = '';//added on 090706 for testing chat instances
		var $session_chat = 1;//added 180907 default id of session chat
		function Statement($queryStr, $dosplit=true)
		{
			if( !isset($GLOBALS['fc_config']['db_conn']) )
			{
				$GLOBALS['fc_config']['db_conn'] = mysql_connect($GLOBALS['fc_config']['db']['host'], $GLOBALS['fc_config']['db']['user'], $GLOBALS['fc_config']['db']['pass']);
			  mysql_query("SET NAMES utf8;");
			  mysql_query("SET character_set_database=utf8;");
			  mysql_query("SET character_set_server=utf8;");
				//mysql_query("SET NAMES utf8", $GLOBAL['fc_config']['db_conn']);
			}
			$this->conn = $GLOBALS['fc_config']['db_conn'];

			$this->queryArray = $dosplit ? explode('?', $queryStr) : array($queryStr);
			$this->type = strtolower(substr($queryStr, 0, 6));

		}

		function process(/*...*/)
		{


			if(func_num_args() > 0) {
				$params = func_get_args();
			} else {
				$params = array();
			}

			if( $this->conn )
			{
				if(mysql_select_db($GLOBALS['fc_config']['db']['base'], $this->conn))
				{
					$queryStr = '';
					for($i = 0; $i < sizeof($this->queryArray) - 1; $i++)
					{
						$val = '';
						switch(gettype($params[$i]))
						{
							case 'object':
								$val = "'" . mysql_escape_string($params[$i]->toString()) . "'";
							break;
							case 'array': $val = "'" . mysql_escape_string(join(',', $params[$i])) . "'"; break;
							case 'boolean': $val = ($params[$i]) ? -1 : 0; break;
							case 'NULL': $val = 'NULL'; break;
							default:
								if($params[$i][0] == "'" && $params[$i][strlen($params[$i]) - 1] == "'")
								{
									$params[$i] = substr($params[$i], 1, -1);
								}
								$val = "'" . mysql_escape_string($params[$i]) . "'";
							break;
						}
						$queryStr .= $this->queryArray[$i] . $val;
					}

					$queryStr .= $this->queryArray[$i];

					if ( strpos($_SERVER['REDIRECT_URL'],'admin') === false)
					if ( strpos($queryStr,$GLOBALS['fc_config']['db']['pref'].'messages') || strpos($queryStr,$GLOBALS['fc_config']['db']['pref'].'connections'))
					{
						if(!isset($_SESSION['session_chat']))
						{

							//added 180907 default id of session chat

							/*$tmpqry = 'SELECT id FROM '.$GLOBALS['fc_config']['db']['pref'].'config_chats WHERE is_default = 1';
							$result = mysql_query($tmpqry, $this->conn);
							$res = new ResultSet($result);
							$rec = $res->next();
							$_SESSION['session_chat'] = $rec['id'];*/
							$_SESSION['session_chat'] = $this->session_chat = 1;
						}
						if( $this->type == STATEMENT_SELECT )
						{
							$word = 'WHERE';
							$pos = strpos($queryStr,$word);
							$pos_chatid = strpos($queryStr, 'chatid');
					   		if ( $pos !== false && $pos_chatid === false )
							{
					   	    	$newquery = substr($queryStr,0,$pos+strlen($word)).' chatid = '.$this->session_chat.' AND '.substr($queryStr,$pos+strlen($word));
					    		$queryStr = $newquery;
					   		}
						}
					}

					$this->final_query = $queryStr;//added on 090706 for testing chat instances

					if($result = mysql_query($queryStr, $this->conn)) {
						switch($this->type) {
							case STATEMENT_SELECT: return new ResultSet($result);
							case STATEMENT_INSERT: return mysql_insert_id($this->conn);
							default: return mysql_affected_rows($this->conn);
						}
					}

				}
			}

			//trigger_error("MySQL error " . mysql_errno() . " : " . mysql_error());
			return null;
		}
	}

	class ResultSet {
		var $result;
		var $numRows = 0;
		var $currRow = 0;

		function ResultSet($result = null) {
			$this->result = $result;
			if($result) $this->numRows = mysql_num_rows($result);
		}

		function hasNext() {
			return ($this->result && $this->numRows > $this->currRow);
		}

		function next() {
			if($this->hasNext()) {
				$this->currRow++;
				return mysql_fetch_assoc($this->result);
			} else {
				return null;
			}
		}
	}
?>