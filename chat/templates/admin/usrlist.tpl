{assign var=title value=Users}
{include file=top.tpl}

{if $manageUsers}
	<div align="center"><br>{$langs.t9}</div>
{elseif $intCms}
	<div align="center"><br>{$langs.t10}</div>
{else}
<center>
	<form name="usrlist" id="usrlist" action="usrlist.php" method="post">
		<input type="hidden" id="sort" name="sort" value="none">
	</form>
	<h4>{$langs.t1}</h4>
	<a href="user.php">{$langs.t2}</a><br>
	<br>
{if $users}
	<table border="1">
		<tr>
			<th><a href="javascript:my_getbyid('sort').value = 'id'; my_getbyid('usrlist').submit()">{$langs.t3}</a></th>
			<th><a href="javascript:my_getbyid('sort').value = 'login'; my_getbyid('usrlist').submit()">{$langs.t4}</a></th>
			<th><a href="javascript:my_getbyid('sort').value = 'password'; my_getbyid('usrlist').submit()">{$langs.t5}</a></th>
			<th><a href="javascript:my_getbyid('sort').value = 'roles'; my_getbyid('usrlist').submit()">{$langs.t6}</a></th>
		</tr>
	{foreach from=$users item=user}
		<tr>
			<td>{$user.id}</td>
			<td><a href="user.php?id={$user.id}">{$user.login}</a></td>
			<td>{$user.password}&nbsp;</td>
			<td>{$user.roles}</td>
		</tr>
	{/foreach}
{else}
	{$langs.t7}
{/if}
</center>
{/if}
{include file=bottom.tpl}
