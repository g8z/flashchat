{assign var="title" value="Bot"}
{include file="top.tpl"}
<center>
<h4>{$langs.t0}</h4>
{if $enableBots}
	<form name="bot" action="bot.php" method="post">
		<input type="hidden" name="id" value="{$_REQUEST.id}">
		<table border="0" cellspacing="8">
		<tr><td align="right">{$langs.t1}</td><td><input type="text" name="login" value="{$_REQUEST.login}"></td></tr>
		<tr>
			<td align="right">{$langs.t2}</td>
			<td >
				<select name="room_avatar">
					{assign var="selected" value="`$_REQUEST.bot.room_avatar`"}
					<option id="0" {if $selected==""}selected{/if}>--{$langs.t3}--</option>
					{foreach from=$_REQUEST.smilies key=key item=ordersel}
					<option id="{$key}" {if $ordersel==$selected}selected{/if}>{$ordersel}</option>
					{/foreach}
				</select>				
			</td>
		</tr>
		<tr>
			<td align="right">{$langs.t4}</td>
			<td >
				<select name="chat_avatar">
					{assign var="selected" value="`$_REQUEST.bot.chat_avatar`"}
					<option id="0" {if $selected==""}selected{/if}>--{$langs.t3}--</option>
					{foreach from=$_REQUEST.smilies key=key item=ordersel}
					<option id="{$key}" {if $ordersel==$selected}selected{/if}>{$ordersel}</option>
					{/foreach}
				</select>				
			</td>
		</tr>
		<tr>
			<td align="right">{$langs.t5}</td>
			<td >
				<select name="roomid">
					{assign var="selected" value="`$_REQUEST.bot.roomid`"}
					{foreach from=$_REQUEST.rooms key=key item=ordersel}
					<option id="{$key}" {if $key==$selected}selected{/if}>{$ordersel}</option>
					{/foreach}
				</select>				
			</td>
		</tr>
		<tr>
			<td align="right">{$langs.t6}</td>
			<td >
				<input type="text" name="active_on_min_users" size="3" maxlength="2" value="{$_REQUEST.bot.active_on_min_users}">
			</td>			
		</tr>
		<tr>
			<td align="right">{$langs.t7}</td>
			<td >
				<input type="text" name="active_on_max_users" size="3" maxlength="2" value="{$_REQUEST.bot.active_on_max_users}">
			</td>			
		</tr>
		<!--
		<tr>
			<td align="right">
				<input type="checkbox" name="active_on_supportmode" id="active_on_supportmode" 
				{if $_REQUEST.bot.active_on_supportmode == 1} checked {/if}>
			</td>
			<td>{$langs.t8}</td>
		</tr>
		-->
		<tr>
			<td align="right">{$langs.t9}</td>
			<td >
				<input type="checkbox" name="active_on_no_moderators" id="active_on_no_moderators" 
				{if $_REQUEST.bot.active_on_no_moderators == 1} checked {/if}>
			</td>			
		</tr>
		<tr>
			<td align="right">{$langs.t10}</td>
			<td >
				<input type="checkbox" name="active_on_no_bots" id="active_on_no_bots" 
				{if $_REQUEST.bot.active_on_no_bots == 1} checked {/if}>
			</td>
			
		</tr>
		<tr>
			<td align="right">{$langs.t11}</td>
			<td >
				<select name="active_on_user">
					{assign var="selected" value="`$_REQUEST.bot.active_on_user`"}
					<option id="0" {if $selected=="0"}selected{/if}>--{$langs.t3}--</option>
					{foreach from=$_REQUEST.users key=key item=ordersel}
					<option id="{$ordersel.id}" value="{$ordersel.id}" {if $ordersel.id==$selected}selected{/if}>{$ordersel.login}</option>
					{/foreach}
				</select>				
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
		</tr>
		</table>
	</form>
{else}
{$langs.t12}
<!--
{$langs.t13}
{$langs.t14}
-->
{/if}	
</center>
{include file="bottom.tpl"}