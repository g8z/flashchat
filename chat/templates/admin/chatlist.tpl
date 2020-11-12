{assign var=title value=Chats}
{include file=top.tpl}
{if $manageUsers}
<div align="center"><br>{$langs.t0}<br>{$langs.t19}</div>
{else}
<center>
	<h4>{$langs.t1}</h4>
	<form name="chatlist" id="chatlist" action="chatlist.php" method="post">
	<table border="0">
		<tr>
			<td align="right">{$langs.t2}</td>
			<td>
				<select name="roomid">
				<option value="0">[ {$langs.t3} ]
				{html_options options=$rooms selected=$smarty.request.roomid}
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">{$langs.t4}</td>
			<td><input type="text" name="from" value="{$smarty.request.from}" size="19">  {$langs.t5} <input type="text" name="to" value="{$smarty.request.to}" size="19">(YYYY-MM-DD hh:mm:ss)</td>
		</tr>
		<tr>
			<td align="right">{$langs.t6}</td>
			<td><input type="text" name="days" value="{$smarty.request.days}" size="8"></td>
		</tr>
		<tr>
			<td align="right">{$langs.t7}</td>
			<td>
				<select name="initiatorid">
				<option value="0">[ {$langs.t8} ]
				{html_options options=$initiators selected=$smarty.request.initiatorid}
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">{$langs.t9}</td>
			<td>
				<select name="moderatorid">
				<option value="0">[ {$langs.t8} ]
				{html_options options=$moderators selected=$smarty.request.moderatorid}
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">{$langs.t26}</td>
			<td><input type="text" name="msg2show" value="{$smarty.request.msg2show}" size="8"></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="apply" value="{$langs.t19}">
				<input type="submit" name="clear" value="{$langs.t20}">
				<input type="hidden" id="sort" name="sort" value="none">
				<!--<input type="submit" name="remove" value="{$langs.t21}">-->
			</td>
		</tr>
	</table>
</form>

{if $chats}
<table border="1">
	<tr>
		<th><a href="javascript:my_getbyid('sort').value = 'roomname'; my_getbyid('chatlist').submit()"> {$langs.t10} </a></th>
		<th><a href="javascript:my_getbyid('sort').value = 'initiatorlogin'; my_getbyid('chatlist').submit()">{$langs.t11}</a></th>
		<th><a href="javascript:my_getbyid('sort').value = 'moderatorlogin'; my_getbyid('chatlist').submit()">{$langs.t12}</a></th>
		<th><a href="javascript:my_getbyid('sort').value = 'start'; my_getbyid('chatlist').submit()">{$langs.t13}</a></th>
		<th><a href="javascript:my_getbyid('sort').value = 'end'; my_getbyid('chatlist').submit()">{$langs.t14}</a></th>
		<th>{$langs.t15}</th>
	</tr>
{foreach from=$chats item=chat}
	<tr>
		<td valign="top"><a href="roomlist.php?id={$chat.roomid}">{$chat.roomname}</a></td>
		<td valign="top"><a href="usrlist.php?id={$chat.initiatorid}">{$chat.initiatorlogin}</a></td>
		<td valign="top">
	{if $chat.moderatorid}
		<a href="usrlist.php?id={$chat.moderatorid}">{$chat.moderatorlogin}</a>
	{else}
		[{$langs.t16}]
	{/if}
		</td>
		<td valign="top">
			<a href="msglist.php?roomid={$chat.roomid}&from={$chat.start}&to={$chat.end}">
			{$chat.start}
			</a>
		</td>
		<td valign="top">
			{$chat.end}
		</td>
		<td valign="top">
			<table border="0" CELLSPACING="0" CELLPADDING="0">
{foreach from=$chat.messages item=message}
			<tr>
				<td><b>{$message.name}: </b>{$message.txt}</td>
			</tr>
	{/foreach}
			</table>
		</td>
	</tr>
{/foreach}
	</table>
{else}
	{$langs.t17}
{/if}
{if $private}
<h4>Private Messages:</h4>
<table border="1">
	<tr>
		<th>{$langs.t22}</th>
		<th>{$langs.t23}</th>
		<th>{$langs.t24}</th>
		<th>{$langs.t25}</th>
	</tr>
{foreach from=$private item=message}
	<tr>
		<td valign="top">{$message.created}</td>
		<td valign="top"><a href="usrlist.php?id={$message.login}">{$message.login}</a></td>
		<td valign="top"><a href="usrlist.php?id={$message.touserid}">{$message.touserid}</a></td>
		<td valign="top">{$message.txt}</td>
	</tr>
{/foreach}
	</table>
{/if}

</center>

{/if}
{include file=bottom.tpl}
