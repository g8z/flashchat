<?PHP
class	socketServer extends patXMLServer_Dom
{
/**
*	end character for socket_read
*	@var	integer	$readEndCharacter
*/
	var	$readEndCharacter	=	"\0";

/**
*	time of purgening
*	@var	integer	$time
*/
	var $timer = 0;
	function onReceiveRequest( $clientId, $requestType, $requestParams, $xml )
	{

		$GLOBALS['clientId']        = $clientId; //this is the reason of one user per computer !

		//added 180907 default id of session chat
		//$_SESSION['session_chat'] = $requestParams['cid'];
		$_SESSION['session_chat'] = 1;


		$this->timer = $_SESSION['timer'];

		switch( $requestType )
		{
			case	"request":
				$conn =& ChatServer::getConnection( $requestParams,$clientId );
				$conn->process( $requestParams );

				break;
			case	"fileshare":
				$this->sendFileShare( $requestParams, $xml);
			case	"load_photo":
				$this->sendFileShare( $requestParams, $xml);
			case	"fault":
				//	error management
				break;
		}
		$this->purge();
	}

	function purge()
	{
		if((time() - $this->timer) > $GLOBALS['fc_config']['msgRequestInterval'])
		{
			$this->timer = time() + 3600;
			ChatServer::purge();
			$this->timer = time();
		}
	}

	function onStart()
	{
		$this->timer = time();

		$stmt = new Statement("DELETE FROM {$GLOBALS['fc_config']['db']['pref']}connections");
		$stmt->process();
	}

	function	acceptConnection( $c )
	{

				//if( $c == 'lin')
				$_SESSION['client']++;

				$i = $_SESSION['client'];
				$peer_host	=	"127.0.0.1";
				$peer_port	=	"9090";

				$this->clientInfo[$i]	=	array(
													"host"		=>	$peer_host,
													"port"		=>	$peer_port,
													"connectOn"	=>	time()
												);
				$_SESSION['connect'][$i] = $this->clientInfo[$i]['connectOn'];


				$this->clients++;

				if( method_exists( $this, "onConnect" ) )
					$this->onConnect( $i );


	}
	function onConnect( $clientId )
	{

		$data = array('clientId' => $clientId, 'ip' => $this->clientInfo[$clientId]['host'], 'session_chat' => $GLOBALS['fc_session_chat']);

		$this->saveClientConnection( $clientId, $data );
	}

	function onClose( $clientId )
	{

		$connection = $this->clientInfo[$clientId]['connection'];
		if( $connection['id'] != null )
		{
			$connid = $connection['id'];
			$userid = $connection['userid'];
			$roomid = $connection['roomid'];

			$GLOBALS['clientId'] = $clientId;

			$conn =& ChatServer::getConnection( $this->clientInfo[$clientId]['connection'], $clientId );
			$conn->doLogout();

			$stmt = new Statement("DELETE FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE id = ?" , 223);
			$stmt->process($connid);

			//delete links
			unset( $this->clientInfo['connid'][$connid] );
			unset( $this->clientInfo['userid'][$userid] );
			unset( $this->clientInfo['roomid'][$roomid][$clientId] );
		}
	}

	function sendFileShare( $params, $xml )
	{
		$id = -1;
		if( isset($params['a']) ) $id = array($this->clientInfo['userid'][$params['a']]);
		else if ( isset($params['r']) ) $id = $this->clientInfo['roomid'][$params['r']];

		$this->send4ID($id, null, $xml);
	}

	function sendMessage( $message )
	{

		if(!$message->created)
			$message->created = date("YmdHis");


		$message->id = 1; //on insert message get id !!!???

		$id = -1;

		$toconn = $message->toconnid != null;
		$touser = $message->touserid != null;
		if( $toconn || $touser )
		{
			$id = array();

			if( $toconn )
			{

				array_push($id, $this->clientInfo['connid'][$message->toconnid]);
			}
			if( $touser )
			{
				array_push($id, $this->clientInfo['userid'][$message->touserid]);
			}

			$id = array_unique( $id );
		}
	  else if($message->toroomid != null) {
	    $id = $this->clientInfo['roomid'][$message->toroomid];
	    print_r($this->clientInfo);
	  }



		$this->send4ID($id, $message, null);
	}

	function send4ID( $IDs, $message, $xml)
	{


		$clients = $this->clientInfo['connid'];

		//for some
		if(is_array($IDs)) $clients = $IDs;

		//get user chat id
		$chatID = $this->clientInfo[$GLOBALS['clientId']]['connection']['session_chat'];
		//---

		foreach($clients as $v)
		{
if ($message->command == 'msg') {
  //print_r($message);
}
			if( $this->clientInfo[$v]['connection']['session_chat'] != $chatID ) continue;

			$data = ($xml == null)? $message->toXML($this->clientInfo[$v]['connection']['tzoffset']) : $xml;


			if($this->clientInfo[$v]['connection']['id'] == '')
				continue;
			$sxml = "<response id=\"".$this->clientInfo[$v]['connection']['id']."\" >".$data."</response>";
			$this->sendXMLResponse($v, $sxml);


		}


	}

	function saveClientConnection( $clientId, $data )	{

	  if (!$clientId) {

  	  foreach ($this->clientInfo as $key=>$info){
  	    if (is_int($key) && $data['userid'] == $info['connection']['userid']) {
  	      $data['clientId'] = $clientId = $key;
  	    }
  	  }
	  }


	  //print_r($_SESSION['fc_connections']);
	  /*if (!$clientId) {

  	  $num = 1;
  	  if ( is_array($_SESSION['fc_connections']) )
  	    foreach( $_SESSION['fc_connections'] as $key=>$val )    {
  	      if ( $data['id'] == $key )   {
  	        $data['clientId'] = $clientId = $num;
  	      }
  	      $num++;
  	    }
	  }*/
	  /*if (!$clientId) {
	    $data['clientId'] = $clientId = 1;
	    print_r($this->clientInfo);
	  }
	  //echo '!!!'.$clientId;
*/



		if( !isset($this->clientInfo[$clientId]['connection']) )
		{
			$this->clientInfo[$clientId]['connection'] = array(
					'clientId'  => $data['clientId'],
					'id'		=> $data['id'],
					'userid'	=> $data['userid'],
					'roomid'	=> $data['roomid'],
					'color'		=> $data['color'],
					'state'		=> $data['state'],
					'start'		=> $data['start'],
					'lang'		=> $data['lang'],
					'ip' 		=> $data['ip'],
					'tzoffset'	=> $data['tzoffset'],
					'room_is_permanent'	=> $data['room_is_permanent'],
					'session_chat' => $data['session_chat'],
					'connecton' => $this->clientInfo[$clientId]['connectOn']
			);
		}
		else
		{
			$this->clientInfo[$clientId]['connection'] = $data;
		}

		//create links for faster searching
		if($data['id'] != null) $this->clientInfo['connid'][$data['id']] = $data['clientId'];
		if($data['userid'] != null) $this->clientInfo['userid'][$data['userid']] = $data['clientId'];
		/*if($data['roomid'] != null)	{
			if(!is_array($this->clientInfo['roomid'][$data['roomid']]))
				$this->clientInfo['roomid'][$data['roomid']] = array();
		  foreach ($this->clientInfo['roomid'] as $roomId=>$users){
		    unset($this->clientInfo['roomid'][$roomId][$data['clientId']]);
		  }

			$this->clientInfo['roomid'][$data['roomid']][$data['clientId']] = $data['clientId'];

		}*/
	}
}
?>