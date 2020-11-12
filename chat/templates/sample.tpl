<html>
<title>ACME Widgets</title>
<head>
<meta http-equiv=Content-Type content="text/html;  charset=UTF-8">
{literal}
<style type=text/css>
<!--
.title {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 24px;
	font-weight: bold;
	color: #0033FF;
}
.normal {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.small {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.subtitle {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #663366;
	font-weight: bold;
}
A {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #0000FF;
}
A:hover {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FF0000;
}
-->
</style>
{/literal}
</head>
<body bgcolor="#FFFFCC" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"
	{if $data.lin} onLoad="setFocus()" onUnload="doLogout()"{/if}>

<table width="100%" height="100%" border="0" cellpadding="8" cellspacing="0">
  <tr>
    <td height="50" colspan="2"><p><span class="title">ACME Widgets</span><br>
        <span class="normal">Serving all your widget needs since 1995!</span></p></td></tr>
  <tr>
    <td width="150" valign=top bgcolor="#FFFF99" nowrap><table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td class="normal"><a href="#home">Home page</a></td>
        </tr>
        <tr>
          <td class="normal"><a href="#about">About us</a></td>
        </tr>
        <tr>
          <td class="normal"><a href="#products">Products &amp; Services</a></td>
        </tr>
        <tr>
          <td class="normal"><a href="#contact">Contact</a></td>
        </tr>
        <tr>
          <td class="normal"><a href="#chat">Widget Chat</a></td>
        </tr>
        <tr>
          <td class="small" nowrap>(c) 2004 ACME Widgets</td>
        </tr>
        <tr>
          <td class="small"><p><br>
              <strong>Special Announcement</strong><br>
              Acme widgets will be hosting a chat about the newly released Widget
              2000 this Friday at 9pm EST. Our Vice-president of Widget operations,
              Donald Duck, will be hosting this chat.</p></td>
        </tr>
      </table></td>
    <td width="90%" valign=top bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td class="subtitle">Widget Chat</td>
		</tr>
		{if $data.lin}
			<tr>
				<td class=normal>
					Thanks for joining our chat! If you have any follow-up questions, please feel free to e-mail our <a href=mailto:support@acmewidgets.widget>support department</a> after the chat.
				</td>
			</tr>
			<tr>
				<td class=normal>
			   	{$data.flashChatTag}
			</td></tr>
			<tr><td class=normal>Legal notice: opinions expressed in this chat session are not necessarily officially endorsed by ACME Widgets.</td></tr>
		{else}
        <tr>
          <td class="normal">Welcome to our chat room. This system requires the
            <a href="http://www.macromedia.com/software/flashplayer/" target="flash">Macromedia Flash plug-in</a>.
            Please choose a name to identify you to the chat system. You do not
            need a password unless you are a chat moderator.</td>
        </tr>
        <tr>
          <td valign=top>

		  <form method="post">

		      <table width="100%" border="0" cellpadding="2" cellspacing="0" class="normal">
                <tr>
                  <td width="16%" nowrap><div align="right">Username:</div></td><td width="84%"><input name="username" type="text" class="normal" size="20"></td>
                </tr>
                <tr>
                  <td><div align="right">Password:</div></td>
                  <td><input name="password" type="password" class="normal" size="20">
                    (if a moderator)</td>
                </tr>
                <tr>
                  <td><div align="right">Language:</div></td>
                  <td><select name="lang" class="normal">
                      {assign var=selected value=$data.defaultLanguage}
					  {foreach from=$data.languages key=key item=ordersel}
						<option value="{$key}"{if $key==$selected}selected{/if}>{$ordersel.name}</option>
					  {/foreach}
                      </select>
				  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input name="button" type="submit" class="normal" value="Login &gt;&gt;"></td>
                </tr>
              </table>
		</form>
     	</td></tr>
		{/if}	
      </table>
    </td></tr>
</table>

</body>
</html>
