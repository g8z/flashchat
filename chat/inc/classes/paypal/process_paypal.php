<?php
$ap_site_options['test_ips']=array("localhost","127.0.0.1","sree","192.168.0.0.2","sreekanth");

if($GLOBALS['fc_config']['payment_options']['debug_mode'])
{
 $notify_check=($_GET[from]=="notify" || $_GET[from]=="return");
}
else
{
 $notify_check=($_GET[from]=="notify");
 //$notify_check=($_GET[from]=="notify" || $_GET[from]=="return");//should be removed and  the previous line should be uncommented
}//if($GLOBALS['fc_config']['payment_options']['debug_mode'])
if($notify_check)
{
 //echo "POST";pre_array($_POST);echo "GET";pre_array($_GET);
 $valid_txns=array("subscr_payment","web_accept");
 if($GLOBALS['fc_config']['payment_options']['debug_mode']) echo "inside notify";



 $paypal_ipn = new paypal_ipn($_POST);
 $paypal_ipn->send_response();
          //if($_POST[txn_type]=="Contact Fees")
		 require_once("init_paypal.php");
		 
 foreach ($paypal_ipn->paypal_post_vars as $key=>$value) {
	if (getType($key)=="string") {
		eval("\$$key=\$value;");//in case register globals is off
	}
	//if($GLOBALS['fc_config']['payment_options']['debug_mode']) echo "$key=$value;<BR><BR>";
	$write_date.=("$key=$value;\n");
  }
  $write_date.="GET VARS";
   foreach ($_GET as $key=>$value) {
	if (getType($key)=="string") {
		eval("\$$key=\$value;");//in case register globals is off
	}
	//if($GLOBALS['fc_config']['payment_options']['debug_mode']) echo "$key=$value;<BR><BR>";
	$write_date.=("$key=$value;\n");

    $write_date.=("**************************************************************************\n");
    $write_date.="PAYPAL RESPONSE\n********************************************************\n".$paypal_ipn->paypal_response."\n************";
    if($GLOBALS['fc_config']['payment_options']['debug_mode']) echo $write_date."<BR>".$paypal_ipn->is_verified()."<BR>";	
   }//if($_GET['from']=="notify")

   
   $paypal_ipn->error_email = $ap_site_options[admin_email];
   $paypal_comment="paypal notification";
   
   $payer_memberid=$_GET[ref];
   $payment_status=$paypal_ipn->get_payment_status();
   $paid_amount=$paypal_ipn->get_amount_paid();
   //include($folders[base_folder_for_php]."/includes/emails.php");
   if($paypal_ipn->is_verified())
	{

		if (('COMPLETED'==strtoupper($payment_status) || 'PENDING'==strtoupper($payment_status)))
		 {
		  $paypal_errors=array();
		  $query = "select count(*) as same_trans_before from {$GLOBALS['fc_config']['db']['pref']}paypal_log where txn_id='$txn_id'";
		  if($GLOBALS['fc_config']['payment_options']['debug_mode']) echo $query."<BR><BR>";
		  $stmt = new Statement($query);
		  $rs = $stmt->process($req['nick']);
		  if(($rec = $rs->next()) && $rec['same_trans_before']) 
		  {
          //$db->setquery($query);
          //$transs = $db->select();
		  //if(sizeof($transs)>0)
		  //{
	       //if(!$paypal_testmode)
           {
 		    $paypal_errors[]="txn_id : $txnId is already processed";
		   } 
		  }//if(sizeof($transs)>0) */
		  // check that receiver_email is your Primary PayPal email
		  if($_POST['receiver_email'] != $recepient['email'])
 		  {
		   $paypal_errors[]="receiver email is ".$_POST['receiver_email']." and not " .$recepient['email'];
		  }
		  if($_POST['payer_email']!=$payer[email])//$mem_details[email])//option_name1 is not received for "txn_type=subscr_payment;"
		  {
		   $paypal_errors[]="payer email is ".$_POST['payer_email']." and not " .$payer[email]." as entered in signup form";
		  }
		  if($_POST['mc_currency']!= $recepient['currency_type'])
		  {
		   $paypal_errors[]="payment currency is ".$_POST['mc_currency']." and not ". $recepient['currency_type'];
		  }
		  //check wether the user cancelled the subscription in paypal
		  if($_GET['from']=="cancel")//call from cancel
		  {
		   $paypal_errors[]="the user canceled the subscription in paypal page ";
		  }//if($_GET['from']=="cancel")//call from cancel
		  if($GLOBALS['fc_config']['payment_options']['debug_mode']) echo "AMOUNTS:($_POST[payment_gross]!=$required_payment_amount)<br>";
			 if($_POST[payment_gross]!=$required_payment_amount)
			 {
			  $paypal_errors[]="Amount is $_POST[payment_gross],actually it should be $required_payment_amount ";
			 }//if($_POST[payment_gross]!=$required_payment_amount)		  
		  if(count($paypal_errors)==0)
		  {
		   // process payment
		   if($GLOBALS['fc_config']['payment_options']['debug_mode']) echo "hello No Errors<br>";
		   //process signup and topup
		    if(in_array($txn_type,$valid_txns))// && in_array($_POST['item_name'],array("Membership Subscription","Topup Maintanence")))
			{ 
			 //$_GET['mail'] must be st before calling
			 if($GLOBALS['fc_config']['payment_options']['debug_mode']) echo "hello  before memsub<br>";
			 
			 require_once("execute_paypal.php");
				//dd_mail_from($ap_site_options[admin_email],$payer[email],$success_msg_subject,$success_msg);		
				dd_mail_from($ap_site_options[admin_email],$payer[email],$PAYPAL_SUCCESS_TOUSER[$success_msg."_subject"],$PAYPAL_SUCCESS_TOUSER[$_GET[type]."_message"]);		
				dd_mail_from($ap_site_options[admin_email],$ap_site_options[admin_email],$PAYPAL_SUCCESS_TOADMIN[$_GET[type]."_subject"],$PAYPAL_SUCCESS_TOADMIN[$_GET[type]."_message"]);		
		    }//if(in_array($txn_type,$valid_txns))
		  //process signup and topup	
		   
		  } 
		  else//if(count($paypal_errors)==0)
		  {
		   if($GLOBALS['fc_config']['payment_options']['debug_mode']) echo pre_array($paypal_errors);
		  }//if(count($paypal_errors)==0)
		 }//if (('COMPLETED'==strtoupper($payment_status) || 'PENDING'==strtoupper($payment_status)))
		 else //if (('COMPLETED'==strtoupper($payment_status) || 'PENDING'==strtoupper($payment_status)))
	     {
	     
	      // if(in_array($txn_type,$valid_txns))
		  {
           // May be Fraud Case //
		   {
					$error_message .= "Possible fraud. Error with REMOTE IP ADDRESS = $REMOTE_ADDR . The remote address of the script posting to this notify script does not match a valid PayPal data\n";
					dd_mail_from($ap_site_options[admin_email],$ap_site_options[admin_email],$PAYPAL_FAILURE_TOADMIN[$success_msg."_subject"],$PAYPAL_FAILURE_TOADMIN[$success_msg."_message"]);		
					

		   }//May be  Fraud Case //
			    //ERIC - EDIT ME
				$msg = "We have failed to locate your registration account with $ap_site_options[project_name].
						It is most likely your email address at Paypal is different from your
						registered email with us.
						
						Please contact us.";
				dd_mail_from($ap_site_options[admin_email],$payer[email],$PAYPAL_FAILURE_TOUSER[$success_msg."_subject"],$PAYPAL_FAILURE_TOUSER[$success_msg."_message"]);		
				
				
		  }//if(in_array($txn_id,$valid_txns))		
       } ////if (('COMPLETED'==strtoupper($payment_status) || 'PENDING'==strtoupper($payment_status)))  
    }   //if($paypal_ipn->is_verified())
    elseif(!$paypal_ipn->is_verified())
	{
		
		$msg = "Your registration with $ap_site_options[project_name] has failed.
				It is most likely that there is a transaction failure
				with Paypal.
						
				Please contact us.";
				
		dd_mail_from($ap_site_options[admin_email],$payer[email],"Your account has NOT been activated - $ap_site_options[project_name]",$msg);				
		
				
		
	 }//elseif(!$paypal_ipn->is_verified())
	
          if(count($paypal_errors)>0)//there is one more $paypal_errors check ( for subtype value ) in memberadd.php
		  {
		   // mail admin the errors
		   $msg="The $success_msg of ".$_GET['mail']." failed because \n\n".join($paypal_errors,"\n\n")."\n\n";
  		   dd_mail_from($ap_site_options[admin_email],$payer[email],"$success_msg failure of ".$_GET['mail']."- $ap_site_options[project_name]",$msg);		
		   dd_mail_from($ap_site_options[admin_email],$ap_site_options[admin_email],"$success_msg failure of ".$_GET['mail']."- $ap_site_options[project_name]",$msg);		
		  }//if(count($paypal_errors)>0)
 	  
		  
			   $var_array=array("memberid"=>$_GET[ref],
			                    "details"=>$write_date,   
			                    "comment"=>$error_message."\n\n".$msg,
								"test_mode"=>$GLOBALS['fc_config']['payment_test_mode'],
								"gateway"=>1);

               log_paypal($var_array);	

}//if($_GET[return]=="notify")
if($_GET['from']=="return")
{
// $mem_details=userdetails($_GET[ref]);
 $thanks_message=" is successfully done.";//$_GET[type]."_return";
 //echo "member status is $mem_details[status]";
}
if($_GET['from']=="cancel")
{
 //$mem_details=userdetails($_GET[ref]);
 $thanks_message="has failed";//$_GET[type]."_cancel";
 //echo "member status is $mem_details[status]";
}
if(isset($_GET[type])  && in_array($_GET['from'],array("return","cancel")))
{			
 if(!$GLOBALS['fc_config']['payment_options']['debug_mode'])header("location: paypal_thanks.php?message=$thanks_message&username=$_GET[username]");   
} //if(isset($_GET[type])

?>