{assign var=title value=Bans}
{include file=top.tpl}
<center>
	<h4>{$langs.t0}</h4>

{if $error}
	<font color="red">{$error}</font><br><br>
{/if}
{if $notice}
	<font color="green">{$notice}</font><br><br>
{/if}

<form name="banlist" id="banlist" action="banlist.php" method="post">
	<input type="hidden" id="sort" name="sort" value="none">
</form>

{if $bannedlist}
<table border="1">
<tr>
	<th><a href="javascript:my_getbyid('sort').value = 'created'; my_getbyid('banlist').submit()">{$langs.t1}</a></th>
	<th><a href="javascript:my_getbyid('sort').value = 'user'; my_getbyid('banlist').submit()">{$langs.t2}</a></th>
	<th><a href="javascript:my_getbyid('sort').value = 'buser'; my_getbyid('banlist').submit()">{$langs.t3}</a></th>
	<th><a href="javascript:my_getbyid('sort').value = 'roomid'; my_getbyid('banlist').submit()">{$langs.t4}</a></th>
	<th><a href="javascript:my_getbyid('sort').value = 'ip'; my_getbyid('banlist').submit()">ip</a></th>
	<th><a href="javascript:my_getbyid('sort').value = 'banlevel'; my_getbyid('banlist').submit()">{$langs.t5}</a></th>
	<th><a href="javascript:my_getbyid('sort').value = 'buser'; my_getbyid('banlist').submit()">{$langs.t6}</a></th>
</tr>

{foreach from=$bannedlist item=banned}
	<td>{$banned.created}</td>
	<td align=center><a href="user.php?id={$banned.userid}">{$banned.user}</a></td>
	<td align=center><a href="user.php?id={$banned.banneduserid}">{$banned.buser}</a></td>
	<td align=center>{$banned.roomid}</td>
	<td>{$banned.ip}</td>
	<td><center>{$banned.banlevel}</center></td>
	<td align=center><a href="banlist.php?unbanid={$banned.id}">Unban</a></td>
</tr>
{/foreach}
</table>
{else}
	{$langs.t7}
{/if}
</center>
{include file=bottom.tpl}
