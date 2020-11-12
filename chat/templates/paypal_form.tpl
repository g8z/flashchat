Please make sure that the email you enter here is the one you use in Paypal
<form name="checkout_confirmation" action="{$PAYPAL.url}" method="post" >
  {if $PAYPAL.recurring == 1}
      <input type="hidden" name="cmd" value="_xclick-subscriptions">
	  <input type="hidden" name="a3" value="{$PAYPAL.amount}">
      <input type="hidden" name="p3" value="{$PAYPAL.period}">
      <input type="hidden" name="t3" value="{$PAYPAL.duration}">
      <input type="hidden" name="src" value="1">
      <input type="hidden" name="sra" value="1">
  {else}
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="amount" value="{$PAYPAL.amount}">
  {/if}
  <input type="hidden" name="business" value="{$PAYPAL.business}">
  <input type="hidden" name="item_name" value="{$PAYPAL.itemname}">
  <input type="hidden" name="item_number" value="{$PAYPAL.item_number}">
   
  <input type="hidden" name="on0" value="{$PAYPAL.payer_email}">
  <input type="hidden" name="on1" value="{$PAYPAL.payer_id}">
  <input type="hidden" name="no_shipping" value="1">
  <input type="hidden" name="shipping" value="{$PAYPAL.shipping}">
  <input type="hidden" name="currency_code" value="{$PAYPAL.currency_code}">
  <input type="hidden" name="return" value="{$PAYPAL.return}">
  <input type="hidden" name="cancel_return" value="{$PAYPAL.cancel_return}">
  <input type="hidden" name="notify_url" value="{$PAYPAL.notify}">
  <INPUT type="hidden" name="rm" value="2">
  <input type="hidden" name="no_note" value="1">
  <input type="image" src="http://images.paypal.com/images/x-click-but03.gif" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!">
</form>
