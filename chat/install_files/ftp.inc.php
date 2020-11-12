<?php

Class FTP {

	var $id = false;

	function FTP ( $server = 'none' ) { /* Constructor */
		if ( $server != 'none' )
			$this -> connect ( $server );
	}
	function connect ( $server ) { /* Connect toFTP server */
		$this->id = @ftp_connect ( $server );
		return ( $this->id == false ) ? false : true;
	}
	function authenticate ( $user = '' , $password = '' ) { /* Authenticates login */
		if ( $user == '' || $pass = '' || $this->id == false ) /* Data validation */
			return false;

	@ftp_set_option ( $this ->id , FTP_TIMEOUT_SEC, 10 );

		$result = @ftp_login ( $this->id , $user , $password );
		return $result;
	}
	function chdir ( $dir = '' ) {
		if ( $dir == '' || $this->id == false )
			return false;
		return @ftp_chdir ( $this->id , $dir );
	}
	function chmod ( $file , $mode ) {
		if ( $file == '' || $this->id == false )
			return false;
		return @ftp_site ( $this -> id , "CHMOD $mode $file" );
	}

}
?>