{assign var=title value=Messages}
{include file=top.tpl}
<center>
	<h4>{$langs.t0}</h4>
	<form name="msglist" id="msglist" action="msglist.php" method="post">
	<table border="0">
		<tr>
			<td align="right">{$langs.t1}</td>
			<td>
				<select name="roomid">
				<option value="0">[ {$langs.t2} ]
				{html_options options=$rooms selected=$smarty.request.roomid}
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">{$langs.t3}</td>
			<td><input type="text" name="from" value="{$smarty.request.from}" size="19">  {$langs.t4} <input type="text" name="to" value="{$smarty.request.to}" size="19">(YYYY-MM-DD hh:mm:ss)</td>
		</tr>
		<tr>
			<td align="right">{$langs.t5}</td>
			<td><input type="text" name="days" value="{$smarty.request.days}" size="8"></td>
		</tr>
		<tr>
			<td align="right">{$langs.t6}</td>
			<td>
				<select name="userid">
				<option value="0">[ {$langs.t7} ]
				{html_options options=$users selected=$smarty.request.userid}
					</select>
				</td>
			</tr>
			<tr>
				<td align="right" width="200">{$langs.t8}</td>
				<td><input type="text" name="keyword" value="{$smarty.request.keyword}" size="32"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="apply" value="{$langs.t14}">
					<input type="submit" name="clear" value="{$langs.t15}">
					<input type="hidden" id="sort" name="sort" value="none">
					<!--<input type="submit" name="remove" value="{$langs.t16}">-->
				</td>
			</tr>
		</table>
	</form>

{if $messages}

<table border="1">
	<tr>
		<th><a href="javascript:my_getbyid('sort').value = 'id'; my_getbyid('msglist').submit()">id</a></th>
		<th><a href="javascript:my_getbyid('sort').value = 'sent'; my_getbyid('msglist').submit()">{$langs.t9}</a></th>
		<th><a href="javascript:my_getbyid('sort').value = 'user'; my_getbyid('msglist').submit()">{$langs.t10}</a></th>
		<th><a href="javascript:my_getbyid('sort').value = 'toroom'; my_getbyid('msglist').submit()">{$langs.t11}</a></th>
		<th><a href="javascript:my_getbyid('sort').value = 'touser'; my_getbyid('msglist').submit()">{$langs.t12}</a></th>
		<th>txt</th>
	</tr>

{foreach from=$messages item=message}
	<tr>
		<td>{$message.id}</td>
		<td>{$message.sent}</td>
		<td>
		<a href="user.php?id={$message.user_id}" target="_blank">{$message.user}</a>
		</td>
		<td><a href="room.php?id={$message.toroomid}">{$message.toroom}</a></td>
		<td>
		<a href="user.php?id={$message.touser_id}" target="_blank">{$message.touser}</a>
		</td>
		<td>{$message.txt}</td>
	</tr>
{/foreach}
{else}
	{$langs.t13}
{/if}

</center>

{include file=bottom.tpl}
