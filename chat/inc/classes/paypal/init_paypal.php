<?php
          if(($req['register'] == 1))
		  {
		     if($req['fc_instance_purchase'] == 1)
	         {
			  $required_payment_amount = $GLOBALS['fc_config']['fc_instance']['instance_value'];
			  $recepient['email'] = $GLOBALS['fc_config']['fc_instance']['paypal_admin_bussiness_email'];
			  $recepient['currency_type'] = $GLOBALS['fc_config']['fc_instance']['admin_currency_type'];
			  
			 }
			 else
			 {
			  $required_payment_amount = $GLOBALS['fc_config']['membership_amount'];
			  $recepient['email'] = $GLOBALS['fc_config']['paypal_bussiness_email'];
			  $recepient['currency_type'] = $GLOBALS['fc_config']['payment_currency_type'];
			  
			 }//if($req['fc_instance_purchase'] == 1)
			 $payer['email'] = $req['email'];
			 
			 /*//$mem_details=userdetails($_GET[ref]);;
			 echo "MEMBER RECORD";pre_array($mem_details);
			 $payer[email]=$mem_details[email];
			 $required_payment_amount=$mem_details[membership_charge];
			 $success_msg = "Thanks for paying for signing up at $ap_site_options[project_name] .";
			 $PAYPAL_SUCCESS_TOUSER[$_GET[type]."_subject"]="Signup - $ap_site_options[project_name]";
			 $PAYPAL_SUCCESS_TOUSER[$_GET[type]."_message"]="Thanks for Signing up";
			 $PAYPAL_SUCCESS_TOADMIN[$_GET[type]."_subject"]="Signup - $ap_site_options[project_name]";
			 $PAYPAL_SUCCESS_TOADMIN[$_GET[type]."_message"]="New Signup id:$_GET[ref]";
			 $PAYPAL_FAILURE_TOUSER[$_GET[type]."_subject"]="Signup ,payment pending - $ap_site_options[project_name]";
			 $PAYPAL_FAILURE_TOUSER[$_GET[type]."_message"]="Your Signup is incomplete,please complete payment via paypal";
			 $PAYPAL_FAILURE_TOADMIN[$_GET[type]."_subject"]="Signup ,payment pending - $ap_site_options[project_name]";
			 $PAYPAL_FAILURE_TOADMIN[$_GET[type]."_message"]="New Signup id:$_GET[ref],payment is spending";*/
			 
			 
		  }//if($_POST[txn_type]=="Contact Fees")
		  

?>