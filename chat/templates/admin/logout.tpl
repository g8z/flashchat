{include file=top.tpl}

{if $installed}
<center>
	<h4>{$langs.t0}</h4>
	{$langs.t1} <a href="index.php?{$rand}">{$langs.t2}</a>
</center>

{if !$manageUsers}
	<p align=center>{$langs.t3}</p>
{/if}
{else}
<center>
	<font color="red">{$langs.t4}</font>
</center>
{/if}
{include file=bottom.tpl}
