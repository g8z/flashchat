<?php
function paypal_invoice_number()
{
 return $_SERVER['REMOTE_ADDR'].".".time();
}//function paypal_invoice_number()
function paypal_url()
{
 //global $ap_paypal_options;
 
 
 
 return ($GLOBALS['fc_config']['payment_test_mode']?"http://www.sandbox.paypal.com/cgi-bin/webscr":"http://www.paypal.com/cgi-bin/webscr");
}
function paypal_return_url()
{
 global $PAYPAL;
  
 //echo"<pre>";print_r($_SERVER);echo "<pre/>"; echo "http://$_SERVER[HTTP_HOST]".$_SERVER[REQUEST_URI]."&from=return&type=$PAYPAL[transaction_type]&ref=$PAYPAL[payer_id]";
$return =("http://$_SERVER[HTTP_HOST]".$_SERVER[REQUEST_URI]."?from=return&type=$PAYPAL[transaction_type]&user_name=$PAYPAL[payer_id]&session_inst=$_SESSION[session_inst]");
//$return.=($PAYPAL[transaction_type]=="renew")?"&ap_m_type=$_POST[membership_type]":"";
return $return;
}//function paypal_return_url($ap_order)
function paypal_cancel_url()
{
 global $PAYPAL;
  
 $return= ("http://$_SERVER[HTTP_HOST]".$_SERVER[REQUEST_URI]."?from=cancel&type=$PAYPAL[transaction_type]&user_name=$PAYPAL[payer_id]&session_inst=$_SESSION[session_inst]");
 //$return.=($PAYPAL[transaction_type]=="renew")?"&ap_m_type=$_POST[membership_type]":"";
 return $return;
}//function paypal_cancel_url($ap_order)
function paypal_notify_url()
{
 global $PAYPAL,$req;
  
 $return= ("http://$_SERVER[HTTP_HOST]".$_SERVER[REQUEST_URI]."?from=notify&type=$PAYPAL[transaction_type]&user_name=$req[user_name]&password=$req[password]&email=$req[email]&session_inst=$_SESSION[session_inst]");
 //$return.=($PAYPAL[transaction_type]=="renew")?"&ap_m_type=$_POST[membership_type]":"";
 return $return;
}//function paypal_cancel_url($ap_order)
function log_paypal($var_array = array())
{
 global $req;
//exit is called at the end of this function so when ever the function is called,the script is terminated there
 
  
  $insert_fields = array("date","user_name","txn_id","txn_type","item_name","item_number","post_from","payer_email","details","paypal_testmode","gateway","instance_id");
  $insert_values = array(date("Y-m-d H:i:s"),  $req["user_name"],
								   $req["txn_id"],
								   $req["txn_type"],
								   $req["item_name"],
								   $req["item_number"],
								   $req["from"],
								   $req['payer_email'],
								   addslashes($var_array["details"]),
								   $var_array["test_mode"],
								   $var_array['gateway'],
								   $req['instance_id']
								   );
  //$query=insertSQL("$ap_db_options[table_prefix]paypal_log",$insert_fields,$insert_values);
  $fields = join(",",$insert_fields);
  $values = "'".join("','",$insert_values)."'";
  $query = "INSERT INTO {$GLOBALS['fc_config']['db']['pref']}paypal_log ($fields) VALUES ($values)";
  //echo "Logging".$query."<br>";
  $stmt = new Statement($query);
  $rs = $stmt->process();
   //exit;		
}//function log_paypal($from="notify")
function emulatepaypal()
{
      global $PAYPAL;
    
      /*$PAYPAL[business]=$site_options[admin_paypal_email];
      $PAYPAL[itemname]="Signup Fees";
      $PAYPAL[item_number]=invoice_number();
	  $PAYPAL[payer_email]=$_POST['email'];
	  $PAYPAL[payer_id]=mysql_insert_id();
      $PAYPAL[amount]=signup_fees($_POST[membership_type]);
      $PAYPAL[shipping]=0;
      $PAYPAL[currency_code]=$site_options[currency_code];
      $PAYPAL['return']=$_SERVER['PHP_SELF']."?from=return&ref=$PAYPAL[payer_id]";
      $PAYPAL[notify]=$_SERVER['PHP_SELF']."?from=notify&ref=$PAYPAL[payer_id]";
      $PAYPAL[cancel_return]=$_SERVER['PHP_SELF']."?from=cancel&ref=$PAYPAL[payer_id]";*/
   
     $PAYPAL_POSTVAR[txn_type]="web_accept";//"subscr_payment","web_accept"
	 $PAYPAL_POSTVAR[payment_date]=date("h:i:s M dd, Y PDT");//"02:50:24 May 14, 2005 PDT";
	 $PAYPAL_POSTVAR[subscr_id]="S-8JJ54849EX4385735";
	 $PAYPAL_POSTVAR[last_name]="test last name";
	 $PAYPAL_POSTVAR[pending_reason]="intl";
	 $PAYPAL_POSTVAR[item_name]=$PAYPAL[itemname];
	 $PAYPAL_POSTVAR[payment_gross]=number_format($PAYPAL[amount],2);
	 $PAYPAL_POSTVAR[mc_currency]=$PAYPAL[currency_code];
	 $PAYPAL_POSTVAR[business]=$PAYPAL[business];
	 $PAYPAL_POSTVAR[payment_type]="instant";
	 $PAYPAL_POSTVAR[payer_status]="verified";
	 $PAYPAL_POSTVAR[verify_sign]="AGu.hbwMxRXoqDiyy-IJNOnULnvNAghmlE6yN2SRlMFmgHncJNWhoyXS";
	 $PAYPAL_POSTVAR[test_ipn]="1";
	 $PAYPAL_POSTVAR[payer_email]=$PAYPAL[payer_email];
	 $PAYPAL_POSTVAR[txn_id]="9L8983".time();
	 $PAYPAL_POSTVAR[receiver_email]=$PAYPAL[business];
	 $PAYPAL_POSTVAR[first_name]="deva";
	 $PAYPAL_POSTVAR[payer_id]="SPXCKT7QWXJX4";
	 $PAYPAL_POSTVAR[receiver_id]="ZFJYX25VQQSMQ";
	 $PAYPAL_POSTVAR[item_number]=time();
	 $PAYPAL_POSTVAR[payment_status]="Pending";
	 $PAYPAL_POSTVAR[mc_gross]=number_format($PAYPAL[amount],2);
	 $PAYPAL_POSTVAR[notify_version]="1.7";

     $field_n=array_keys($PAYPAL_POSTVAR);
	 $field_d=array_values($PAYPAL_POSTVAR);
	//echo $PAYPAL[notify];exit;
     $x = curl_post($PAYPAL[notify], $PAYPAL_POSTVAR);
	 //$GLOBALS['fc_config']['payment_options']['debug_mode'] = 1;
	 if($GLOBALS['fc_config']['payment_options']['debug_mode'])
	 {
	  echo $x;
	 }
	 else
	 {
	  header("location:" .$PAYPAL['return']);	 exit;
	 }
 
	 
	 
	 return $x;
}
function curl_post($url,$data=array())
{
 global $HTTP_USER_AGENT,$HTTP_HOST,$CONFIG;
 
	$user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
    $ch = curl_init();    // initialize curl handle
    curl_setopt($ch, CURLOPT_URL,$url); // set url to post to
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
    curl_setopt($ch, CURLOPT_TIMEOUT, 4000); // times out after 4s
	curl_setopt($ch, CURLOPT_POST, 1); // POST Method
    if(count($data)>0)
	{
    // making string from $data
       foreach($data as $key=>$value) $values[]="$key=".urlencode($value);
       $data_string=implode("&",$values);	
	  
     curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); // add POST fields
	} //if(count($data)>0)
    $myHeader = array(
                      "MIME-Version: 1.0",
                      "Content-type: text/html; charset=iso-8859-1",
                      "Content-transfer-encoding: text",
                     );
    //curl_setopt($ch, CURLOPT_HTTPHEADER, $myHeader); //not necessary
 	curl_setopt($ch, CURLOPT_USERAGENT, $HTTP_USER_AGENT);//not necessary
     $result = curl_exec($ch); // run the whole process
	 //echo "resault:$result";exit ; 
	curl_close ($ch); // Close the connection 
    return $result; //contains response from server
}//function curl_post($url,$XPost="")
function pre_array($array)
{
 echo "<pre>";
 print_r($array);
 echo "</pre>";
}//function pre_array($array)
function dd_mail_from()
{
}
?>