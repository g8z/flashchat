<?php
switch($_GET[message])
{
 case "signup_return":
  $paypal_message="Thanks for signing up,you can login and access our member download area";
  break;
 case "signup_cancel":
  $paypal_message="Your signup is supended ,you can renew your member ship any time buy clicking renew link";
  break;
 case "renew_return":
  $paypal_message="Thanks for renewing membership,you can login and access our member download area";
  break;
 case "renew_cancel":
  $paypal_message="Your renewal is supended ,you can renew your member ship any time buy clicking renew link";
  break;
 case "purchase_return":
  $paypal_message="Thanks for the purchase,you can  download the template(s) with the links mailed to you";
  break;
 case "purchase_cancel":
  $paypal_message="Your purchase is supended ,you can complete purchase any time buy viewing order details";
  break; 
 case "failure":
  $paypal_message=$_GET[reason];
  break;  
}//switch($_GET[message])
?>