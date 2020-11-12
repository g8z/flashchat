{assign var=title value=Bots}
{include file=top.tpl}

<center>
	<h4>{$langs.t0}</h4>
{if $enableBots}	
	<form name="botlist" id="botlist" action="botlist.php" method="post">
		<input type="hidden" id="sort" name="sort" value="none">
	</form>		
	<a href="bot.php?id=0">{$langs.t1}</a><br>
	<br>
{if $botnames}
	<table border="1" cellpadding="2">
		<tr>
			<th><a href="javascript:my_getbyid('sort').value = 'login'; my_getbyid('botlist').submit()">{$langs.t2}</a></th>
			<th>{$langs.t3}</th>
		</tr>
	{foreach from=$botnames item=bot}
		<tr>
			<td><a href="bot.php?id={$bot.id}">{$bot.login}</a></td>
			<td align="center">
				<input type="Button" class="submit" onclick="javascript:decision('Do you really want delete the bot?','botlist.php?id={$bot.id}')" value="  del  ">
			</td>			
		</tr>
	{/foreach}
	</table>
{else}
	{$langs.t4}
{/if}
{else}
<p align="left">
{$langs.t5}
{$langs.t6}
</p>
{/if}
</center>
{include file=bottom.tpl}