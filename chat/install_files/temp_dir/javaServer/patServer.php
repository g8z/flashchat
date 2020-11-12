<?PHP
/**
*	patServer
*	PHP socket server base class
*	Events that can be handled:
*	  * onStart
*	  * onConnect
*	  * onConnectionRefused
*	  * onClose
*	  * onShutdown
*	  * onReceiveData
*
*	@version	1.0.1
*	@author		Stephan Schmidt <schst@php-tools.de>
*	@package	patServer
*/
	class	patServer
{
/**
*	port to listen
*	@var	integer		$port
*/
	var	$port		=	10000;

/**
*	domain to bind to
*	@var	string	$domain
*/
	var	$domain		=	"localhost";

/**
*	maximum amount of clients
*	@var	integer	$maxClients
*/
	var	$maxClients	=	-1;

/**
*	buffer size for socket_read
*	@var	integer	$readBufferSize
*/
	var	$readBufferSize		=	512;

/**
*	end character for socket_read
*	@var	integer	$readEndCharacter
*/
	var	$readEndCharacter	=	"\n";

/**
*	maximum of backlog in queue
*	@var	integer	$maxQueue
*/
	var	$maxQueue	=	500;

/**
*	debug mode
*	@var	boolean	$debug
*/
	var	$debug		=	true;

/**
*	debug mode
*	@var	string	$debugMode
*/
	var	$debugMode	=	"text";

/**
*	debug destination (filename or stdout)
*	@var	string	$debugDest
*/
	var	$debugDest	=	"stdout";

/**
*	empty array, used for socket_select
*	@var	array	$null
*/
	var	$null		=	array();

/**
*	all file descriptors are stored here
*	@var	array	$clientFD
*/
	var	$clientFD	=	array();

/**
*	needed to store client information
*	@var	array	$clientInfo
*/
	var	$clientInfo	=	array();

/**
*	amount of clients
*	@var	integer		$clients
*/
	var	$clients	=	0;

/**
*	create a new socket server
*
*	@access	public
*	@param	string		$domain		domain to bind to
*	@param	integer		$port		port to listen to
*/
	function	patServer( $domain = "localhost", $port = 10000 )
	{
		$this->domain	=	$domain;
		$this->port		=	$port;

		set_time_limit( 0 );
	}

/**
*	set maximum amount of simultaneous connections
*
*	@access	public
*	@param	int	$maxClients
*/
	function	setMaxClients( $maxClients )
	{
		$this->maxClients	=	$maxClients;
	}
/**
*	start the server
*
*	@access	public
*	@param	int	$maxClients
*/
	function	start( $data )
	{
		//	this allows the shutdown function to check whether the server is already shut down
		$GLOBALS["_patServerStatus"]	=	"running";
	  if( method_exists( $this, "onReceiveData" ) ) {

	    $this->onReceiveData( $data );
	  }


		$_SESSION['roomid'] = $GLOBALS['socket_server']->clientInfo['roomid'];
	}

}
?>