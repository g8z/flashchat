<?php
		$GLOBALS['fc_config']['socketServer'] = array(
						'host' => 'localhost',  //domain to bind to (host name of your server), Note: "localhost" you can use only for local testing
						'port' => '9099',  //port to listen (> 1024, it is some big value up to 65536)  
						'max_clients' => 100,  //maximum amount of clients
						'debug_mode'  => 'text',  //type of debug mode (false, 'text' or 'html')
						'log_file'    => 'socketServer.log'  //debug destination (filename or 'stdout')
		);
?>