{assign var=title value="Main Settings"}
{include file=top.tpl}
<center>
<h4>{$fc_msg}</h4>
<form action="{$self_url}" method="post" enctype="multipart/form-data" >
<input type="hidden" name="form1" value="update" />
<table width="100%">
		{foreach name=name from=$main_records item=val key=key}		
  			<tr>
    			<td align="right">{$val.title}</td>
    			<td><input type="text" name="val_{$val.id}" value="{$val.value}" /></td>
  				</tr>
         {/foreach}	
  	<tr>
    <td align="right">&nbsp;</td>
    <td><input type="submit" name="Submit" value="Submit" /></td>
  </tr>
</table>
</form>
</center>
{include file=bottom.tpl}
