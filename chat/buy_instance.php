<?php 


	                          require_once('./inc/smartyinit.php');
							  require_once( INC_DIR . 'classes/paypal/pp_functions.php' );
							  $req = array_merge($_GET, $_POST);
							  
	if(isset($_GET[from]))
    {
      
	  require_once( INC_DIR . "classes/paypal/ipn_cls.php");
	  require_once( INC_DIR . 'classes/paypal/process_paypal.php' );
	  exit;
    }//if(isset($_GET[from]))
                              
							  $PAYPAL[transaction_type]="Purhchase of Chat Instance";
							  $PAYPAL['url'] = paypal_url();
							  $PAYPAL['business'] = $GLOBALS['fc_config']['paypal_bussiness_email'];
                              $PAYPAL['itemname'] = $PAYPAL[transaction_type];
                              $PAYPAL['item_number'] = paypal_invoice_number();
                        	  $PAYPAL['payer_email'] = $req['email'];
                           	  $PAYPAL['payer_id'] = $req['user_name'];
                              $PAYPAL['amount'] = $GLOBALS['fc_config']['membership_amount'];
                              $PAYPAL['shipping'] = 0;
                              $PAYPAL['currency_code'] = $GLOBALS['fc_config']['payment_currency_type'];
                              $PAYPAL['return'] = paypal_return_url();
                              $PAYPAL['notify'] = paypal_notify_url()."&buy_instance=1";
                              $PAYPAL['cancel_return'] = paypal_cancel_url();
							  //emulatepaypal();	         
			 $smarty->assign('PAYPAL', $PAYPAL);
			 
			 $smarty->display('paypal_form.tpl');
			         
			 die();
?>
