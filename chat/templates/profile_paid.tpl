<html>
<title>{$style_sheet.msg}</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
<!--
{literal}
	td{
		font-family: Verdana, Arial, Helvetica, sans-serif;	
		font-size: 12px;	
		font-weight: normal; 
		background-color: {/literal}{$style_sheet.bgcolor}{literal};
		color: #000000;
	}
	tr{
		border: 1px solid #000000; 
	}
	h2{
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 16px;
		font-weight: bold;
		width: 50%;
		background-color1: {/literal}{$style_sheet.bgcolor}{literal};
		color: #000000;
	}
	h3{
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		font-weight: normal;
		width: 50%;
		background-color1: {/literal}{$style_sheet.bgcolor}{literal};
		color: #000000;
	}
	h4{
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		font-weight: normal;
		width: 50%;
		background-color1: {/literal}{$style_sheet.bgcolor}{literal};
		color: #FF0000;
	}
	.small{
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 10px;
		font-weight: normal;
	}
	.pages{
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;	
		font-weight: normal;
	}
	div.Thanks{
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		font-weight: normal;
		width: 60%;
		background-color1: {/literal}{$style_sheet.bgcolor}{literal};
		text-align: center;
		color: #000000;
	}
	div.die{
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		font-weight: bold; width: 60%;
		background-color1: {/literal}{$style_sheet.bgcolor}{literal};
		text-align: center;
		color: #000000;
	}
	.title{
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 16px;
		font-weight: bold;
	}
	input{
		font-family: Verdana, Arial, Helvetica, sans-serif;	
		font-size: 12px;
		font-weight: normal; color: #000000; 
		width: 80%;
	}
	textarea{
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		font-weight: normal;
		color: #000000;
		width: 80%;
	}
	select{
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		font-weight: normal;
		color: #000000;
		width: 80%;
	}
	A{
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		color: #0000FF;
	}
	A:hover	{
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		color: #FF0000;
	}
	.body_table{
		border: 1px solid #000000;
		background-color: {/literal}{$style_sheet.bgcolor}{literal};
	}
{/literal}
-->
</style>
<script language="Javascript">
<!--
{if $default}
{literal}
	function pwdIsValid() 
	{
		if( document.fc_profile.t15 )
		if ( document.fc_profile.t15.value != document.fc_profile.t15b.value )
		{
			alert('{/literal}{$msg.t67}{literal}');
			return false;
		}
		return true;
	}
{/literal}
{elseif $user_or_register}
{literal}
	function formIsValid() 
	{
		// check to make sure a valid username has been entered
		if ( document.userInfo.user_name.value == "" )
		{
			alert('{/literal}{$msg.t109}{literal}');
			return false;
		}
		if ( document.userInfo.password.value == "" )
		{
			alert('{/literal}{$msg.t110}{literal}');
			return false;
		}
		if ( document.userInfo.password.value != document.userInfo.password2.value )
		{
			alert('{/literal}{$msg.t111}{literal}');
			return false;
		}
	
		return true;
	}
{/literal}
{/if}
-->
</script>
</head>
	<body background="{$style_sheet.bkgrnd}">
	<!--<body bgcolor="{$style_sheet.bgcolor}">-->
	{if $errmsg != ''} <h4>{$errmsg}</h4> 
	{/if}
	<form action="profile.php" method="post" name="userInfo" onSubmit="formIsValid()">
				<input type="hidden" name="register" value="{$register}">
				<input type="hidden" name="is_paid" value="{$is_paid}">
				<input type="hidden" name="session_inst" value="{$session_inst}">
				{if $fc_instance_purchase == 1}
				<input type="hidden" name="roles" value="{$fc_roles}">
				<input type="hidden" name="fc_instance_purchase" value="{$fc_instance_purchase}">
				{/if}
				
			<table border="0" align="center" cellpadding="5" width="60%">
				{if $register}
					<tr>
						<td align="right" width="30%" nowrap>{$msg.t112}</td>
						<td>
							<input type="text" name="user_name" value="{$req.user_name}">						</td>
					</tr>
					<tr>
						<td align="right">{$msg.t113}</td>
						<td>
							<input type="password" name="password" value="">						</td>
					</tr>
					<tr>
						<td align="right" nowrap>{$msg.t114}</td>
						<td>
							<input type="password" name="password2" value="">						</td>
					</tr>
					{if $enable_reg}					{elseif $firstUser}					{elseif $is_live_support_mode}					{/if}						
				{/if}
				{if $edit}
				<tr>
                  <td align="right">{$msg.t05}</td>
				  <td> {if $edit}
				      <input type="text" name="email" value="{$req.email}">
				    {else}<a href="mailto:{$req.email}">{$req.email}</a>{/if} </td>
			  </tr>
				<tr>
					<td> Please make sure that the email you enter here is the one you use in Paypal </td>
					<td>
						<input type="submit" name="save" value="{$msg.t14}" onClick="javascript:return formIsValid();">					</td>
				</tr>
				{/if}
			</table>
	</form>
		</center>
	</body>	
</html>