<?php

class paypal_ipn
{
    var $spvar;
	var $paypal_post_vars;
	var $paypal_response;
	var $timeout;

	var $error_email;
	
	
	function paypal_ipn($paypal_post_vars) {
		$this->paypal_post_vars = $paypal_post_vars;
		$this->timeout = 120;
	}

	function send_response()
	{
     global $ap_site_options,$ap_paypal_options;
      /*$paypal_url[url]="https://secure.paypal.com/cgi-bin/webscr";
	  if($ap_paypal_options[test_mode]) 
	  {
	    $paypal_url[url]="https://www.sandbox.paypal.com/cgi-bin/webscr";
	  }//if($ap_paypal_options[debug_mode]) */
	 $paypal_url="http://www.paypal.com"; //ssl curl post is not working in this site
 	 if($ap_paypal_options[test_mode]) 
 	 {
	  $paypal_url="http://www.sandbox.paypal.com";//ssl curl post is not working in this site
	 }
	
		//$fp = @fsockopen("ssl://"."$paypal_url", 443, &$errno, &$errstr, 120 ); 
		/*$fp = @fsockopen("ssl://"."$paypal_url", 443, $errno, $errstr, 120 ); 

		if (!$fp) { 
			$this->error_out("PHP fsockopen() error: " . $errstr , "");
		} else {
			foreach($this->paypal_post_vars AS $key => $value) {
				if (@get_magic_quotes_gpc()) {
					$value = stripslashes($value);
				}
				$values[] = "$key" . "=" . urlencode($value);
			}

			$response = @implode("&", $values);
			$response .= "&cmd=_notify-validate";
			

			fputs( $fp, "POST /cgi-bin/webscr HTTP/1.0\r\n" ); 
			fputs( $fp, "Content-type: application/x-www-form-urlencoded\r\n" ); 
			fputs( $fp, "Content-length: " . strlen($response) . "\r\n\n" ); 
			fputs( $fp, "$response\n\r" ); 
			fputs( $fp, "\r\n" );

			$this->send_time = time();
			$this->paypal_response = ""; 

			// get response from paypal
			while (!feof($fp)) { 
				$this->paypal_response .= fgets( $fp, 1024 ); 

				if ($this->send_time < time() - $this->timeout) {
					$this->error_out("Timed out waiting for a response from PayPal. ($this->timeout seconds)" , "");
				}
			}

			fclose( $fp );
			

		}//if (!$fp) {*/
		//cmd=_notify-validate
		$this->paypal_post_vars[cmd]="_notify-validate";
        if($ap_paypal_options[debug_mode]) echo "<BR><BR> paypalurl=$paypal_url<BR><BR>";
		$this->paypal_response=$this->ipn_curl_post($paypal_url,$this->paypal_post_vars);
		//echo $this->paypal_response."DFDDFDFD<BR><BR>";
		$this->spvar= "Response url to $paypal_url is $response<BR>Response is $this->paypal_response<BR>";
         if($ap_paypal_options[debug_mode]) echo "<BR><BR> $this->spvar<BR><BR>";

	}//function send_response()
	
	function is_verified() {
		if( preg_match("/VERIFIED/", $this->paypal_response) )
			return true;
		else
			return false;
	} 

	function get_payment_status() {
	 global $ap_site_options;
	 if(!in_array($_SERVER['HTTP_HOST'],$ap_site_options[test_ips]))
	 {
		return $this->paypal_post_vars['payment_status'];
	 }	
	 else //if(!in_array($_SERVER['HTTP_HOST'],$ap_site_options[test_ips]))
	 {
	  return 'COMPLETED';
	 }//if(!in_array($_SERVER['HTTP_HOST'],$ap_site_options[test_ips]))
	}

	function get_amount_paid() {
		return $this->paypal_post_vars['payment_gross'];
	}

	function error_out($message, $em_headers)
	{

		$date = date("D M j G:i:s T Y", time());
		$message .= "\n\nThe following data was received from PayPal:\n\n";

		@reset($this->paypal_post_vars);
		while( @list($key,$value) = @each($this->paypal_post_vars)) {
			$message .= $key . ':' . " \t$value\n";
		}
		mail($this->error_email, "[$date] paypay_ipn notification", $message, $em_headers);

	}
	
	
   function ipn_curl_post($url,$data=array())
   {
    global $HTTP_USER_AGENT,$HTTP_HOST,$ap_site_options;

	$user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
    $ch = curl_init();    // initialize curl handle
    curl_setopt($ch, CURLOPT_URL,$url); // set url to post to
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
    curl_setopt($ch, CURLOPT_TIMEOUT, 4000); // times out after 4s
	curl_setopt($ch, CURLOPT_POST, 1); // POST Method
    if(count($data)>0)
	{
    // making string from $data
       foreach($data as $key=>$value)
         $values[]="$key=".urlencode($value);
       $data_string=implode("&",$values);	
	  
     curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); // add POST fields
	} //if(count($data)>0)
    $myHeader = array(
                      "MIME-Version: 1.0",
                      "Content-type: text/html; charset=iso-8859-1",
                      "Content-transfer-encoding: text",
                     );
    //curl_setopt($ch, CURLOPT_HTTPHEADER, $myHeader); //not necessary
 	
	if(!in_array($_SERVER['HTTP_HOST'],$ap_site_options[test_ips]))
	{
     if($ap_paypal_options[debug_mode]) echo "<BR><BR> executing curlto $url with $data_string <BR><BR>";
     curl_setopt($ch, CURLOPT_USERAGENT, $HTTP_USER_AGENT);//not necessary
     $result = curl_exec($ch); // run the whole process
     if($ap_paypal_options[debug_mode]) echo "<BR><BR> $result<BR><BR>";
	 //echo $result."<br>$url::";
	}
	else
	{
	 $result="VERIFIED";
	}//if(!in_array($_SERVER['HTTP_HOST'],$ap_site_options[test_ips]))
    if($ap_paypal_options[debug_mode]) echo "<BR><BR> $result<BR><BR>";
    return $result; //contains response from server
}//function ipn_curl_post($url,$XPost="")
	
	
	
} 

?>