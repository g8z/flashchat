<h3>{$langs.t15}</h3>
<FORM action="cnf_config.php" method="post" enctype="multipart/form-data"> 

<table border="0" width="700" height="100%">

<!--error process -->

{if $errMsg != ''}
	<TR>
		<TD class="errorMsg" valign='middle'  align="center" colspan="2">	
			{$errMsg}
		</TD>			
	</TR>
{/if}
<!--end error handling-->


<!--representation values-->
{foreach name=fields from=$fields item=val key=key}
	<tr>
	
	
		<td  style="width:200px;">
			{$val.title}
			<input type="Hidden" name="type_{$val.id}" value="{$val.type}">
			<input type="Hidden" name="name_{$val.id}" value="{$val.title}">
		</td>
		
		
		<td width="50">
		<div style="white-space: nowrap;height:25px;">
			{if $val.type == 'integer'}
					<input type="Text" size="5"  name="fld_{$val.id}" value="{$val.value}">
			{elseif $val.type == 'string'}
					<input type="Text" size="40" name="fld_{$val.id}" value="{$val.value}">			
			{elseif $val.type == 'boolean'}				
				<div style="white-space: nowrap;">
					<input type="Radio" name="fld_{$val.id}" value="1" {if $val.value } checked {/if} id="yes{$key}"><label for="yes{$key}">Yes</label>
					<input type="Radio" name="fld_{$val.id}" value="0" {if !$val.value } checked {/if} id="no{$key}"><label for="no{$key}">No</label>
				</div>
			{/if}
			{if $val.info!='' }
				<a href="#" class="hintanchor" onMouseover="showhint('{$val.info}', this, event, '200px')" >[?]</a>
			{/if}	
			</div>	
		</td>	
		
		
			<td align="right" width="5">
			
			</td>
					
		
	</tr>
{/foreach}
	
	<tr>
		<td colspan="3">
			&nbsp;
		</td>
	</tr>
	<tr>
		<td>
			&nbsp;
		</td>
		<td colspan="2"align="center">
			<input type="Submit" name="submit" value="Save Settings">
		</td>
	</tr>
	
</table>

<input type="Hidden" name="module" value="{$module}">
</form>
