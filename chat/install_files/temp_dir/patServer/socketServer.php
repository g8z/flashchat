<?PHP
class socketServer extends patXMLServer_Dom
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

/**
*	request by flash received
*
*	@access	private
*	@param	integer	$clientId
*	@param	string	$requestType
*	@param	array	$requestParams
*/function debug($inHead, $inMessage)
	{
		return;
		toLog($inHead, $inMessage);
	}
	function	onReceiveRequest( $clientId, $requestType, $requestParams, $xml )
	{
		echo "\nreceiving...\n";
		print_r($requestParams);
		$GLOBALS['clientId'] = $clientId;

		switch( $requestType )
		{
			case	"request":
				$conn =& ChatServer::getConnection( $requestParams, $clientId );
				$conn->process( $requestParams );

				break;
			case	"fileshare":
				$this->sendFileShare( $requestParams, $xml);
			case	"load_photo":
				$this->sendFileShare( $requestParams, $xml);
			case 	"policy-file-request":

			  //CNW - IE7 support
			  $policy_file =
			  					'<?xml version="1.0" encoding="UTF-8"?>'.
			  					'<cross-domain-policy>'.
			  				        '<allow-access-from domain="*" to-ports="*" secure="false" />'.
			  					'</cross-domain-policy>';

			  $this->sendXMLResponse( $clientId, $policy_file );
			  //CNW end

			case	"fault":
				//	error management
				break;
		}

		//do purge
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

	function onConnect( $clientId )
	{
		$data = array('clientId' => $clientId, 'ip' => $this->clientInfo[$clientId]['host']);
		$this->saveClientConnection( $clientId, $data );
	}

	function onClose( $clientId )
	{
		//echo "\nonClose...\n";
		//print_r($this->clientInfo);

		//logout
		$connection = $this->clientInfo[$clientId]['connection'];
		if( $connection['id'] != null )
		{
			$connid = $connection['id'];
			$userid = $connection['userid'];
			$roomid = $connection['roomid'];

			$GLOBALS['clientId'] = $clientId;

			$conn =& ChatServer::getConnection( $this->clientInfo[$clientId]['connection'], $clientId );
			$conn->doLogout();

			$stmt = new Statement("DELETE FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE id = ?");
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

			if( $toconn ) array_push($id, $this->clientInfo['connid'][$message->toconnid]);
			if( $touser ) array_push($id, $this->clientInfo['userid'][$message->touserid]);

			$id = array_unique( $id );
		}
		else if($message->toroomid != null) $id = $this->clientInfo['roomid'][$message->toroomid];

		//echo "\nid ".$id." msg ".$message->command." to uid ".$message->touserid." to cid ".$message->toconnid." to rid ".$message->toroomid."\n";

		$this->send4ID($id, $message, null);
	}

	function send4ID( $IDs, $message, $xml)
	{
		//for all
		$clients = $this->clientInfo['connid'];
		//for some
		if(is_array($IDs)) $clients = $IDs;

		foreach($clients as $v)
		{
			$data = ($xml == null)? $message->toXML($this->clientInfo[$v]['connection']['tzoffset']) : $xml;
			$sxml = "<response id=\"".$this->clientInfo[$v]['connection']['id']."\">".$data."</response>";
			$this->sendXMLResponse($v, $sxml);

			//echo "XML >> $sxml\n";
		}
	}

	function saveClientConnection( $clientId, $data )
	{
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
						'room_is_permanent'	=> $data['room_is_permanent']
					);
		}
		else
		{
			$this->clientInfo[$clientId]['connection'] = $data;
		}

		//create links for faster searching
		if($data['id'] != null) $this->clientInfo['connid'][$data['id']] = $data['clientId'];
		if($data['userid'] != null) $this->clientInfo['userid'][$data['userid']] = $data['clientId'];
		if($data['roomid'] != null)
		{
			if(!is_array($this->clientInfo['roomid'][$data['roomid']])) $this->clientInfo['roomid'][$data['roomid']] = array();

		  foreach ($this->clientInfo['roomid'] as $id=>$room){
		    if (in_array($data['clientId'], $room)) {
		      unset($this->clientInfo['roomid'][$id][$data['clientId']]);
		    }
		  }
		  $this->clientInfo['roomid'][$data['roomid']][$data['clientId']] = $data['clientId'];
		}

		//print_r($this->clientInfo);
	}
}
?>