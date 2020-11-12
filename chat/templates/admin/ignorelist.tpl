{assign var=title value=Ignores}
{include file=top.tpl}
<center>
<h4>{$langs.t0}</h4>

<form name="ignorelist" id="ignorelist" action="ignorelist.php" method="post">
	<input type="hidden" id="sort" name="sort" value="none">
</form>

{if $error}
<font color="red">{$error}</font><br><br>
{/if}
{if $notice}
<font color="green">{$notice}</font><br><br>
{/if}

{if $ignores}
<table border="1">
<tr>
	<th><a href="javascript:my_getbyid('sort').value = 'created'; my_getbyid('ignorelist').submit()">{$langs.t1}</a></th>
	<th><a href="javascript:my_getbyid('sort').value = 'user'; my_getbyid('ignorelist').submit()">{$langs.t2}</a></th>
	<th><a href="javascript:my_getbyid('sort').value = 'iuser'; my_getbyid('ignorelist').submit()">{$langs.t3}</a></th>
	<th><a href="javascript:my_getbyid('sort').value = 'iuserid'; my_getbyid('ignorelist').submit()">{$langs.t4}</a></th>
</tr>

{foreach from=$ignores item=ignore}
<tr>
	<td>{$ignore.created}</td>
	<td align=center><a href="user.php?id={$ignore.userid}">{$ignore.user}</a></td>
	<td align=center><a href="user.php?id={$ignore.iuserid}">{$ignore.iuser}</a></td>
	<td align=center><a href="ignorelist.php?unignoreid={$ignore.iuserid}">{$ignore.iuserid}</a></td>
</tr>
{/foreach}
{else}
	{$langs.t5}
{/if}
{include file=bottom.tpl}
