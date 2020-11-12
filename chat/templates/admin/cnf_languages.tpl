<H3>{$langs.t14}</H3>
<script type="text/javascript">
var option_count = {$rowcount};
var optionstr = '{$lang_option}';


</script>


<table width="50%" border="1">
 <tr>

 <td align="center">{$cnf_langs.t0}</td>
 <td  colspan="2" align="center">{$cnf_langs.t1}</td>
 </tr>
{foreach name=fc_languages from=$fc_languages  item=val key=key}
<FORM name="languages" action="cnf_config.php?module={$smarty.request.module}" method="post" enctype="multipart/form-data" name="cnf_form1">
 <tr>
 <td align="center">
  {$val}
  </td>
  <td align="right">{$key} </td>

  <td align="center">
  {if $val>0 }
	<input type="image" src="bumper.gif" border="0" alt="{$cnf_langs.t2}">
  {else}
   &nbsp;
  {/if}
  </td>
  </tr>
  <input type="hidden" name="{$key}" id="{$val}" value={$val}  >
   </FORM>
{/foreach}
</table>


