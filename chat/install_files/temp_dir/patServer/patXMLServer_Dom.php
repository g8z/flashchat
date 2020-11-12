<?PHP
/**
*	patXMLServer_Dom
*	needs domxml extension
*	PHP socket xml server base class
*	Events that can be handled:
*	  * onStart
*	  * onConnect
*	  * onConnectionRefused
*	  * onClose
*	  * onShutdown
*	  * onReceiveRequest
*
*	Methods used to send responses:
*	  * sendResponse
*	  * broadcastResponse
*
*	@version	0.1
*	@author		Stephan Schmidt <schst@php-tools.net>, Gerd Schaufelberger <gerd@php-tools.net>
*	@package	patServer
*/
	class	patXMLServer_Dom extends patServer
{
/**
*	server received data
*	decodes the request
*
*	@access	private
*	@param	integer	$clientId	id of the client that sent the data
*	@param	string	$xml		xml data
*/
	function	onReceiveData( $clientId, $inXML )
	{
		//	create dom tree
		$xmls = explode("\0", trim($inXML));
		foreach($xmls as $xml)
		{
			$xmldoc = new myXML( $xml );
			
			if ($xmldoc->last_error != '')
			{ 
				$this->sendDebugMessage( $xmldoc->last_error );
				continue;
			}
						
			//	get root element (type of request)
			$root			=	$xmldoc->root;
			$requestType	=	strtolower($root->name);
			
			//	extract request parameters
			$requestParams	=	array();
	
			if( is_array($root->children) )
			{
				foreach( $root->children as $child ) 
				{
					$requestParams[strtolower($child->name)] =	$child->getvalue('');
				}	
			}

			if( is_array($root->attributes) )
			{
				while (list($key, $val) = each($root->attributes)) 
				{	
					$requestParams[strtolower($key)] = $val;
				}
			}

			if( method_exists( $this, "onReceiveRequest" ) )
				$this->onReceiveRequest( $clientId, $requestType, $requestParams, $xml );
		}
	}	

/**
*	send a response
*
*	@access	public
*	@param	integer	$clientId	id of the client to that the response should be sent
*	@param	string	$responseType	type of response
*	@param	array	$responseParams	all params
*	@return	boolean	$success
*/
	function	sendResponse( $clientId, $responseType, $responseParams )
	{
		$xml	=	$this->encodeResponse( $responseType, $responseParams );
		$this->sendData( $clientId, $xml );
	}
	
/**
*	!!! added function !!!
* 	send pure xml
*/	
	function sendXMLResponse( $clientId, $xml)
	{
		$this->sendData( $clientId, $xml."\0" ); //!!!always \0
	}

/**
*	!!! added function !!!
* 	send pure xml
*/	
	function broadcastXMLResponse( $xml )
	{
		$this->broadcastData( $xml."\0", array() );
	}	
	
/**
*	send response to all clients
*
*	@access	public
*	@param	string	$data		data to send
*	@param	array	$exclude	client ids to exclude
*/
	function	broadcastResponse( $responseType, $responseParams, $exclude = array() )
	{
		$xml	=	$this->encodeResponse( $responseType, $responseParams );
		$this->broadcastData( $xml, $exclude );
	}
	
/**
*	encode a request
*
*	@access	public
*	@param	string	$responseType	type of response
*	@param	array	$responseParams	all params
*	@return	string	$xml	encoded reponse
*/
	function	encodeResponse( $responseType, $responseParams )
	{
		if( empty( $responseParams ) )
			return	sprintf( "<%s/>\0", $responseType );

		$xml	=	sprintf( "<%s>", $responseType );
		foreach( $responseParams as $key => $value )
		{
			if( $value == "" )
				$xml	.=	sprintf( "<%s/>", $key );
			else
				$xml	.=	sprintf( "<%s>%s</%s>", $key, $value, $key );
		}
		$xml	.=	sprintf( "</%s>\0", $responseType );

		return	$xml;
	}
}
?>