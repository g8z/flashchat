{assign var=title value=User}
{include file=top.tpl}
<center>

{if $error}
<font color="red">{$error}</font>
{/if}
{if $notice}
<font color="green">{$notice}</font>
{/if}
{if $manageUsers}
	<div align="center"><br>{$langs.t0}<br> {$langs.t5}</div>
{else}
<h4>{$langs.t1}</h4>
<form name="user" action="user.php" method="post">
	<input type="hidden" name="id" value="{$_REQUEST.id}">
	<table border="0">
		<tr><td align="right">{$langs.t2}</td><td><input type="text" name="login" value="{$_REQUEST.login}"></td></tr>
		<tr><td align="right">{$langs.t3}</td><td><input type="text" name="password" value="{$_REQUEST.password}"></td></tr>
		<tr>
			<td align="right">{$langs.t4}</td>
			<td>
				<select name="roles">
				{html_options options=$roles selected=$_REQUEST.roles}
				</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="add" value="{$langs.t6}">
					<input type="submit" name="set" value="{$langs.t7}"
{if !$_REQUEST.id}
					disabled
{/if}
					>
					<input type="submit" name="del" value="{$langs.t8}"
{if !$_REQUEST.id}
					disabled
{/if}
					>
				</td>
			</tr>
		</table>
	</form>

{/if}

</center>

{include file=bottom.tpl}
