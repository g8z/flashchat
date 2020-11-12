{assign var=title value=Home}
{include file=top.tpl}
<center>
<h4>{$langs.t0}</h4>
</center>
<center>
<p>{$langs.t1}
{if $manageUsers}
	{$langs.t2}
{/if}

{include file=bottom.tpl}
