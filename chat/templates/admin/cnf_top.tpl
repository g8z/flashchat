<script language='Javascript'>
fc_help_url="{$fc_help_url}";
</script>
{literal}
<script language='Javascript'>
<!--
// a small poupup window to show who's in the chat at the current time
function show_info_page(url){
//send user to help page in site
window.open(fc_help_url + url,'Help','width=640, height=540, left=100,top=100,menu=no,toolbar=no,scrollbars=yes');
return false;
}
-->
</script>
{/literal}
<table width="80%" align="center" border="0">

<tr>

<td valign="top" width="200" nowrap>
<div style="visibility:hidden;display:none;">
{if $module == 'instances'}
	<a href="cnf_config.php?module=instances"><b>{$langs.t0}</b></a><br>
{else}
	<a href="cnf_config.php?module=instances">{$langs.t0}</a><br>
{/if}
<br>
{if $IS_ADMIN == 1}
<form action="cnf_config.php" method="post" enctype="multipart/form-data" >
	<SELECT NAME=instances onchange='submit();' style="width: 100%;">
		{foreach name=name from=$instances_name item=val key=key}
			<OPTION VALUE={$val.id}    {if $val.id == $instance_ID}selected{/if}>{$val.name}
		{/foreach}
	</SELECT>
	<input type="Hidden" value="{$module}" name="module">
</form>
{/if}
</div>
{if $module == 'general'}
	<a href="cnf_config.php?module=general"><b>{$langs.t1}</b></a><br>
{else}
	<a href="cnf_config.php?module=general">{$langs.t1}</a><br>
{/if}
{if $module == 'conn'}
	<a href="cnf_config.php?module=conn"><b>{$langs.t2}</b></a><br>
{else}
	<a href="cnf_config.php?module=conn">{$langs.t2}</a><br>
{/if}

<!--
{if $module == 'msg'}
	<a href="cnf_config.php?module=msg"><b>{$langs.t3}</b></a><br>
{else}
	<a href="cnf_config.php?module=msg">{$langs.t3}</a><br>
{/if}
-->
{if $module == 'theme'}
	<a href="cnf_config.php?module=theme"><b>{$langs.t4}</b></a><br>
{else}
	<a href="cnf_config.php?module=theme">{$langs.t4}</a><br>
{/if}
{if $module == 'layout'}
	<a href="cnf_config.php?module=layout"><b>{$langs.t5}</b></a><br>
{else}
	<a href="cnf_config.php?module=layout">{$langs.t5}</a><br>
{/if}
{if $module == 'font'}
	<a href="cnf_config.php?module=font"><b>{$langs.t6}</b></a><br>
{else}
	<a href="cnf_config.php?module=font">{$langs.t6}</a><br>
{/if}
{if $module == 'sound'}
	<a href="cnf_config.php?module=sound"><b>{$langs.t7}</b></a><br>
{else}
	<a href="cnf_config.php?module=sound">{$langs.t7}</a><br>
{/if}
{if $module == 'smilies'}
	<a href="cnf_config.php?module=smilies"><b>{$langs.t8}</b></a><br>
{else}
	<a href="cnf_config.php?module=smilies">{$langs.t8}</a><br>
{/if}
{if $module == 'avatars'}
	<a href="cnf_config.php?module=avatars"><b>{$langs.t9}</b></a><br>
{else}
	<a href="cnf_config.php?module=avatars">{$langs.t9}</a><br>
{/if}
{if $module == 'filesharing'}
	<a href="cnf_config.php?module=filesharing"><b>{$langs.t10}</b></a><br>
{else}
	<a href="cnf_config.php?module=filesharing">{$langs.t10}</a><br>
{/if}
{if $module == 'modules'}
	<a href="cnf_config.php?module=modules"><b>{$langs.t11}</b></a><br>
{else}
	<a href="cnf_config.php?module=modules">{$langs.t11}</a><br>
{/if}

{if $module == 'preloader'}
	<a href="cnf_config.php?module=preloader"><b>{$langs.t12}</b></a><br>
{else}
	<a href="cnf_config.php?module=preloader">{$langs.t12}</a><br>
{/if}

{if $module == 'logout'}
	<a href="cnf_config.php?module=logout"><b>{$langs.t13}</b></a><br>
{else}
	<a href="cnf_config.php?module=logout">{$langs.t13}</a><br>
{/if}
{if $module == 'languages'}
	<a href="cnf_config.php?module=languages"><b>{$langs.t14}</b></a><br>
{else}
	<a href="cnf_config.php?module=languages">{$langs.t14}</a><br>
{/if}
{if $module == 'badwords'}
	<a href="cnf_config.php?module=badwords"><b>{$langs.t15}</b></a><br>
{else}
	<a href="cnf_config.php?module=badwords">{$langs.t15}</a><br>
{/if}
{if $module == 'other'}
	<a href="cnf_config.php?module=other"><b>{$langs.t16}</b></a><br>
{else}
	<a href="cnf_config.php?module=other">{$langs.t16}</a><br>
{/if}
</td>

<td valign="top">


