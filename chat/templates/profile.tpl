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
{if $style_sheet.showBackground}
	<body background="{$style_sheet.bkgrnd}">
	<!--<body bgcolor="{$style_sheet.bgcolor}">-->
{else}
	<body>
{/if}
	{if $tryagain}
		<div align="center">
			<h3>
			<br>{$tryagain_data.msg1}
			<br>&nbsp;
			</h3>
			<br><a href="profile.php?{$tryagain_data.type}=true">{$tryagain_data.msg2}</a>
		</div>
	{elseif $newpassword}
		<div align=center>
			<h2>{$msg.t47}</h2>
			<h3>{$msg.t120}</h3>
		</div>
		<div align=center>
			<tbody>
			<tr vAlign="top">
			<center>
			<form action="profile.php" method="post">
				<table border="0" width="600">
					<tr>
						<td align="right" width="250">{$msg.t48}</td>
						<td align="left"><input type="text" name="nick" size="32" value=""></td>
					</tr>
					<tr>
						<td align="right" width="250">{$msg.t49}</td>
						<td align="left"><input type="text" name="email" size="32" value=""></td>
					</tr>
				 	<tr>
						<td></td>
						<td><input type="submit" name="sendnewpassword" value="{$msg.t50}"></td>
					</tr>
				</table>
			</form>
		</div>
	{elseif $oldpassword}
		<div align=center>
			<h2>{$msg.t61}</h2>
			<h3>{$msg.t120}</h3>
		</div>
		<div align=center>
			<tbody>
			<tr vAlign="top">
			<center>
			<form action="profile.php" method="post">
				<table border="0" width="600">
					<tr>
						<td align="right" width="250">{$msg.t48}</td>
						<td align="left"><input type="text" name="nick" size="32" value=""></td>
					</tr>
					<tr>
						<td align="right" width="250">{$msg.t49}</td>
						<td align="left"><input type="text" name="email" size="32" value=""></td>
					</tr>
			 		<tr>
						<td></td>
						<td><input type="submit" name="sendoldpassword" value="{$msg.t62}"></td>
					</tr>
				</table>
			</form>
		</div>
	{elseif $sendoldpassword}
		<div align="center">
			<h3>
				<br>{$msg.t65}
				<br>&nbsp;
			</h3>
			<br><a href="index.php">{$msg.t58}</a>
		</div>
	{elseif $sendnewpassword}
		<div align="center">
			<h3>
				<br>{$msg.t54}
				<br>&nbsp;
			</h3>
			<br><a href="index.php">{$msg.t58}</a>
		</div>
	{elseif $TCpicture}
		<div align=center>
			<b><h2>{$msg.t32}</h2>
		</div>
		{if $error}{$error}{/if}
		<div align=center>
			<table align=center border=0 cellpadding=2 cellspacing=0 width=60%>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><center>{$msg.t28}</td>
				</tr>
				<tr>
					<td>
					<center>
					<form enctype="multipart/form-data" method="post" action="profile.php?userid={$user.id}&lang={$req.lang}">
						<input type="file" name="img1" size="60">
					</td>
				</tr>
				<input type="hidden" name="flashchatid" value="{$req.flashchatid}">
				<input type="hidden" name="userid" value="{$req.id}">
				<input type="hidden" name="lang" value="{$req.lang}">
				{if $req.admin_user_edit}
					<input type="hidden" name="admin_user_edit" value="true">
					<input type="hidden" name="cid" value="{$req.change_id}">
				{/if}
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><center>{$msg.t29}{$exts}</td>
				</tr>
				<tr>
					<td><center>{$msg.t30}{$file_size} KB</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>
						<center>
						<input type="submit" name="load" value="{$msg.t31}">
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
					</form>
			</table>
		</div>
	<!--display the user profile (default entry)-->
	{elseif $default}
		{if $user.login != ''}
			<div align=center>
				<h2>{$msg.t18}&quot;{$user.login}&quot;</h2>
			</div>
		{/if}
		<tbody>
			<tr vAlign="top">
			<center>
			<table align=center border=0 cellpadding=5 cellspacing=2 width="600">
			{if $edit}
				<form action="profile.php" method="post" name="fc_profile">
					<input type="hidden" name="flashchatid" value="{$req.flashchatid}">
					<input type="hidden" name="lang" value="{$req.lang}">
					<input type="hidden" name="userid" value="{$req.id}">
					{if $req.admin_user_edit}
						<input type="hidden" name="admin_user_edit" value="hidden_edit">
						<input type="hidden" name="cid1" value="{$req.change_id}">
					{/if}
			{/if}
			{$infoLine1}
			{$width150}{$msg.t43}{$width450}
			{$htmlSelect}</td></tr>
			{$infoLine2}
			{if $req.t12 || $edit}
				{$width150}{$msg.t12}{$width450}
			{/if}
			{if $edit}
				{if $is_writable}
					<input type="text" name="t12" size="60" value="{$req.t12}">
					<br>
					<input type="submit" name="TCpicture" value="{$msg.t20}">
					<br>
					{$msg.t21}
				{elseif $is_role_admin}
					Your folder {$ufolder} is not writable. Pictures are disabled.</td></tr>
				{/if}
			{else}
				{if $is_http}
					<img src="{$req.t12}" border=0>
				{elseif $is_file_exists}
					<a href="{$req.t12}" target="_blank">
						<img border=0 src="{$req.t12}" width={$pictureWidth} alt="{$msg.t34}">
					</a>
				{/if}
			{/if}
			{if $req.t13 || $edit}
				{$width150}{$msg.t13}{$width450}
			{/if}
			{if $edit}
				<textarea name="t13" rows="6" cols="30">{$req.t13}</textarea>
			{elseif $req.t13}
				{$replaceBadWord_t13}
			{/if}
			{if $req.t13 || $edit}</tr>{/if}
			{if $edit}
				{$width150}{$width450}</tr>
				{$width150}{$width450}{$msg.t37}</tr>
				{$width150}{$width450}{$pwdmsg}</tr>
				{$width150}{$msg.t35}{$width450}<input type="password" name="t14" size="60" value=""></tr>
				{$width150}{$msg.t36}{$width450}<input type="password" name="t15" size="60" value=""></tr>
				{$width150}{$msg.t66}{$width450}<input type="password" name="t15b" size="60" value=""></tr>
				{$width150}{$width450}<input type="submit" name="TCsave" value="{$msg.t14}" onClick="javascript:return pwdIsValid();"></td></tr>
				{$width150}{$width450}<a href="profile.php?userid={$user.id}&lang={$req.lang}">{$msg.t15}</a><br>{$msg.t16}</td></tr>
			{/if}
			<!--interrupt execution for user-->
			{if $edit && $is_role_user}
			<!--show all available profiles for admin-->
			{elseif $showAllProfiles || $is_role_admin}
				<!--display a list of all profiles in users table-->
				{$value}
			{/if}
			{if $edit}</form>{/if}
			</table>
			</center>
			</tr>
			</tbody>
			<!--!!!!-->
			</div>
			</div>
	{elseif $not_user}
		<center>
			<h4>{$msg.t17} {$req.userid}</h4>
		</center>
	<!--start of FlashChat standard registration page-->
	{elseif $register_succ}
		<div align="center">
	  		<br><h2>{$msg.t105}</h2>
		</div>
	  	<center>
			<div class="Thanks">
				{$user_name}
	  			<br><br><a href="index.php">{$msg.t108}</a>
				<br>&nbsp;
			</div>
		</center>
	{elseif $user_or_register}
		<center>
			<div>
				<h2>
				{if not $register}Profile for user &quot;{$user.login}&quot;
				{else}{$msg.t101}{/if}
				</h2>
				<h3>{$msg.t119}</h3>
			</div>

			<div align=center>
			{if $errmsg != ''} <h4>{$errmsg}</h4> {/if}
			{if $edit}
				<form action="profile.php" method="post" name="userInfo">
				<input type="hidden" name="register" value="{$register}">
			{/if}
			<table border="0" align="center" cellpadding="5" width="60%">
				{if $register}
					<tr>
						<td align="right" width="30%" nowrap>{$msg.t112}</td>
						<td>
							<input type="text" name="user_name" value="{$req.user_name}">
						</td>
					</tr>
					<tr>
						<td align="right">{$msg.t113}</td>
						<td>
							<input type="password" name="password" value="">
						</td>
					</tr>
					<tr>
						<td align="right" nowrap>{$msg.t114}</td>
						<td>
							<input type="password" name="password2" value="">
						</td>
					</tr>
					{if $enable_reg}
					<tr>
						<td align="right" nowrap valign="middle">{$msg.t115}</td>
						<td align="left" nowrap>
							<INPUT type="radio" name="role" value="{$ROLE_USER}" style="width:auto"
								{if $is_role_user}CHECKED{/if}>{$msg.t116}
							<br><INPUT type="radio" name="role" value="{$ROLE_ADMIN}" style="width:auto"
								{if $is_role_admin}CHECKED{/if}>{$msg.t117}
							<br><INPUT type="radio" name="role" value="{$ROLE_SPY}" style="width:auto"
								{if $is_role_spy}CHECKED{/if}>{$msg.t118}
						</td>
					</tr>
					{elseif $is_live_support_mode}
					<tr>
						<td align="right" nowrap valign="middle">{$msg.t123}</td>
						<td align="left" nowrap>
							<INPUT CHECKED type="radio" name="role" value="{$ROLE_CUSTOMER}" style="width:auto"
								{if $is_role_customer}CHECKED{/if}>{$msg.t123}
						</td>
					</tr>
					{/if}
				{/if}
				<tr>
					<td align="right" width="30%" nowrap>{$msg.t01}</td>
					<td>
						{if $edit}<input type="text" name="fullname" value="{$req.fullname}">
						{else}{$req.fullname}{/if}
					</td>
				</tr>
				<tr>
					<td align="right">{$msg.t43}</td>
					<td>
						{if $edit}{$htmlSelect_gender}
						{else}{$gender}{/if}
					</td>
				</tr>
				<tr>
					<td align="right">{$msg.t04}</td>
					<td>
						{if $edit}<input type="text" name="age" value="{$req.age}">
						{else}{$req.age}{/if}
					</td>
				</tr>
				<tr>
					<td align="right">{$msg.t44}</td>
					<td>
						{if $edit}{$htmlSelect_location}
						{else}{$location}{/if}
					</td>
				</tr>
				<tr>
					<td align="right">{$msg.t05}</td>
					<td>
						{if $edit}<input type="text" name="email" value="{$req.email}">
						{else}<a href="mailto:{$req.email}">{$req.email}</a>{/if}
					</td>
				</tr>
				<tr>
					<td align="right">{$msg.t07}</td>
					<td>
						{if $edit}<input type="text" name="site" value="{$req.site}">
						{else}<a href="{$req.site}" target="_blank">{$req.site}</a>{/if}
					</td>
				</tr>
				<tr>
					<td align="right">{$msg.t10}</td>
					<td>
						{if $edit}<input type="text" name="icq" value="{$req.icq}">
						{else}{$req.icq}{/if}
					</td>
				</tr>
				<tr>
					<td align="right">{$msg.t41}</td>
					<td>
						{if $edit}<input type="text" name="aim" value="{$req.aim}">
						{else}{$req.aim}{/if}
					</td>
				</tr>
				<tr>
					<td align="right">{$msg.t42}</td>
					<td>
						{if $edit}<input type="text" name="yim" value="{$req.yim}">
						{else}{$req.yim}{/if}
					</td>
				</tr>
				<tr>
					<td align="right">{$msg.t06}</td>
					<td>
						{if $edit}<input type="text" name="msnm" value="{$req.msnm}">
						{else}{$req.msnm}{/if}
					</td>
				</tr>
				<tr>
					<td align="right" valign="top">{$msg.t13}</td>
					<td>
						{if $edit}<textarea name="comments" rows="6" cols="30">{$req.comments}</textarea>
						{else}{$nl2br}{/if}
				</tr>
				{if $edit}
				<tr>
					<td></td>
					<td>
						<input type="submit" name="save" value="{$msg.t14}" onClick="javascript:return formIsValid();">
					</td>
				</tr>
				{/if}
			</table>
			{if $edit}</form>{/if}
		</center>
	{else}
		<center>
			<h4>{$msg.t17}{$req.userid}</h4>
		</center>
	{/if}
	</body>
</html>