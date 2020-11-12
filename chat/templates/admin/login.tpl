{include file=top.tpl}
<center>

{if $error}
<font color="red">{$error}</font>
{/if}
{if $installed}
<h4>{$langs.t0}</h4>
<form name="loginForm" action="login.php" method="post">
<table border="0">
	<tr>
		<td align="right">{$langs.t1}</td>
		<td><input type="text" name="login" value="{$fc_login}"></td>
	</tr>
	<tr>
		<td align="right">{$langs.t2}</td>
		<td><input type="password" name="password" value="{$fc_pass}"></td>
	</tr>
	<!--tr>
		<td align="right">
			Chat instance
		</td>
		<td>
			<SELECT NAME=session_inst >
				{foreach name=name from=$chat_instances item=val key=key}
					<OPTION VALUE="{$val.id}" {if $smarty.request.session_inst==$val.id}selected {/if} >{$val.name}
				{/foreach}
			</SELECT>
		</td>
	</tr-->
	<tr>
		<td align="right">{$langs.t3}</td>
		<td>
			<SELECT NAME=language_select onChange="loginForm.submit();">
				{foreach name=language from=$languages item=val key=key}
						<OPTION VALUE="{$key}" {if $defLanguage == $key} selected {/if}>{$val}
				{/foreach}
			</SELECT>
		</td>
	</tr>
	<input type="hidden" name="session_inst" id="session_inst" value="1">
	<tr>
		<td colspan="2" align="center"><input type="submit" name="do" value="{$langs.t4}"></td>
	</tr>
</table>
</form>
{/if}
</center>

{include file=bottom.tpl}
