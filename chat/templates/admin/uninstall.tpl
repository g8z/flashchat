{assign var=title value=Un-install}
{include file=top.tpl}

<center>
	{if $_REQUEST.installed == 2}
		{$langs.t0}
	{elseif $_REQUEST.installed == 3}
		<font color="red">{$langs.t1}</font>
	{else}
	<h4>{$langs.t2}</h4>
	<form name="uninstall" action="uninstall.php" method="post">
	<table border="0" cellspacing="8">
		<tr>
			<td colspan="3" valign="TOP">
			{if $_REQUEST.installed != 4}
				{$langs.t3}<br>
				{$langs.t4}<br>
				{$langs.t5}<br>
				{assign var="cacheType" value="0"}
			{else}
				{$langs.t6}<br>
				{$langs.t7}<br>
				{assign var="cacheType" value="2"}
			{/if}
			</td>
		</tr>
		<tr>
			<td width="80">&nbsp;</td>
			<td>
			<font color="Red"><b>
				{foreach from=$_REQUEST.tables key=key item=ordersel}
					{$ordersel}<br>
				{/foreach}
			</b></font>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="checkbox" id="CB_AGREE" name="CB_AGREE" onclick="javascript:my_getbyid('continue').disabled=!my_getbyid('CB_AGREE').checked" id="agree_id">
				{$langs.t8}
			</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="button" id="continue" name="continue" onclick="javascript: decision('{$langs.t9}', 'uninstall.php?action=1&cacheType={$cacheType}')" value="{$langs.t10}" disabled>
				<input type="button" name="cancel" value="{$langs.t11}" onClick="javascript:window.location.href = 'index.php';">
			</td>
		</tr>
	</table>
	</form>
	{/if}
</center>
{include file=bottom.tpl}