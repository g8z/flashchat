<H3>Languages</H3>


<FORM name="languages" action="cnf_config.php" method="post" enctype="multipart/form-data" name="cnf_form1">
<table border="0" width1="700" height="100%" align="left">

<!--error process -->

{if $errMsg != ''}
	<TR>
		<TD class="errorMsg" valign='middle'  align="center" colspan="2">	
			{$errMsg}
		</TD>			
	</TR>
{/if}

<!--end error handling-->

<!--table languages -->
{if $edit == "false"}
{foreach name=fields from=$fields item=val key=key}
<tr>
	<td style="width:200px;">
		{$val.title}
		<input type="Hidden" name="type_{$val.id}" value="{$val.type}">
		<input type="Hidden" name="name_{$val.id}" value="{$val.title}">
		<input type="Hidden" name="field_{$val.id}" value="{$val.level_0}">
	</td>
	
	<td>
{if $val.type == 'combo'}
	<select name="combo_{$val.id}"> 
		{foreach name=name from=$array item=val1 key=key1}
			<option value={$val1.nam}  {if $val1.nam == $val.value}selected{/if}>{$val1.name}
		{/foreach}
	</select>	
{elseif $val.type == 'boolean'}				
	<div style="white-space: nowrap;">
		<input type="Radio" name="bool_{$val.id}" value="1" {if $val.value } checked {/if} id="yes{$key}"><label for="yes{$key}">Yes</label>
		<input type="Radio" name="bool_{$val.id}" value="0" {if !$val.value } checked {/if} id="no{$key}"><label for="no{$key}">No</label>
	</div>
{/if}	
	</td>
	

			<td align="right" width="5">
			{if $val.info!='' }
				<!--img src="info.jpg" alt="{$val.comment}" border="0" onClick="return show_info_page('{$val.comment}');"-->
				<a href="#" class="hintanchor" onMouseover="showhint('{$val.info}', this, event, '200px')" >
					<img src="info.jpg" alt="{$val.comment}" border="0" >
				</a>
			{/if}
			</td>
		
</tr>	
{/foreach}
<tr>
	<td colspan="4">&nbsp;
		
	</td>
</tr>



{assign var="index" value="0"}
	{foreach name=name from=$array item=val key=key}
		<tr>
			<td>
				{$val.name}
			</td>
			<td>
				<div style="white-space: nowrap;">
					<input type="Radio" name="cnf_disabled_{$val.nam}" value="0" {if !$val.disabled } checked {/if} id="on{$val.nam}"><label for="on{$val.nam}">On</label>
					<input type="Radio" name="cnf_disabled_{$val.nam}" value="1" {if $val.disabled } checked {/if} id="off{$val.nam}"><label for="off{$val.nam}">Off</label>
				</div>
			</td>
			<td>
			{assign var="index" value=$index+1}
				<SELECT NAME="cnf_order_{$val.nam}" onchange="javascript: neworder( form,cnf_order_{$val.nam},hdd{$val.nam} );" > 
					{section name=customer loop=$array }
						<OPTION VALUE={$smarty.section.customer.index+1}  {if $smarty.section.customer.index+1 == $index}selected{/if}>{$smarty.section.customer.index+1}
					{/section}
				</SELECT>
				<input type="hidden" name="hdd{$val.nam}" value="{$index}">
			</td>
			<td>
				<a href="cnf_config.php?module=languages&lan={$val.nam}&method=edit" >Edit</a>
			</td>
		</tr>		
	{/foreach}
	<tr>
		<td colspan="2">
			<input type="submit" name="SaveDisable" value="Save Settings">
		</td>
	</tr>
<!--end table languages -->	
	

<!--table language edit -->
{elseif $edit == "true"}
{foreach name=fields from=$lang item=val key=key }	
<tr>
	<td>&nbsp;
		
	</td>
</tr>
<tr>
	<th colspan="2" align="left">
		{$key|capitalize}
		{assign var="mas" value="$key"}
	</th>
</tr>

	{foreach name=array from=$val item=val1 key=key1 }
	
	{if $key1 == "0"}
		<tr>
			<td>
				{$key}
			</td>
			<td>
				<input type="text" name="cnf_{$mas}_{$mas}_{$key}" size="60" value="{$val}">
			</td>
		</tr>
	{else}
		{foreach name=array from=$val1 item=val2 key=key2 }		
			{if $key2 == "0"}
				<tr>
					<td>
						{$key1}
					</td>
					<td>
						<input type="text" name="cnf_{$mas}_{$key1}_{$key1}" value="{$val1}" size="60">
					</td>
				</tr>
			{else}
			{if $prew != $key1}<tr><th colspan="2" align="left">&nbsp;&nbsp;{$key1}</th></tr>{/if}
			{assign var="prew" value="$key1"}
				<tr>
					<td>
						{$key2}
					</td>
					<td>
						<input type="text" name="cnf_{$mas}_{$key1}_{$key2}" value="{$val2}" size="60">
					</td>
				</tr>	
			{/if}
		{/foreach}
	{/if}
	{/foreach}
{/foreach}
<tr>
	<td colspan="2" align="center">
		<input type="submit" name="submit" value="Save Settings">
	</td>
</tr>
{elseif $edit == "error"}
<tr>
	<td>
		<a href="cnf_config.php?module=languages" >Back</a>
	</td>
</tr>
{/if}
</table>
<input type="Hidden" name="lan" value="{$language}">
<input type="Hidden" name="module" value="{$module}">
</FORM>