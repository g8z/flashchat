<h3>Instances</h3>
<FORM action="cnf_config.php" method="post" enctype="multipart/form-data" name="inst"> 

<table border="1" width="700" height="100%" >

<!--error process -->

{if $errMsg != ''}
	<TR>
		<TD class="errorMsg" valign='middle'  align="center" colspan="2">	
			{$errMsg}
		</TD>			
	</TR>
{/if}
<!--end error handling-->

<tr>
	<th>
		ID
	</th>
	<th>
		Name
	</th>
	<th NOWRAP>
		Is Active
	</th>
	<th NOWRAP>
		Is Default
	</th>
	<th>
		&nbsp;
	</th>
</tr>
<!--representation values-->
{foreach name=instances from=$instances item=val key=key}

	<tr>
		<td align="center">
			{$val.id}
		</td>
		<td NOWRAP>
			<input type=hidden name=fld_name_{$val.id} value="{$val.name}">
			<input type="button" value="edit" name=bttn_{$val.id} onclick="javascript:bttnDis( bttn_{$val.id},txt_{$val.id} );">
			<input type="text" name=txt_{$val.id} value="{$val.name}" disabled style="border: 0px;background-color:white;color:black;" onchange="javascript:ValueExchange(fld_name_{$val.id},txt_{$val.id})">
		
		</td>
		<td align="center">
			<input type=hidden name="fld_box_{$val.id}" value="{$val.is_active}">
			<input type=checkbox {if $val.is_active == "1"} checked{/if} onchange="javascript:ChangeValue( fld_box_{$val.id});">			
		</td>
		<td align="center">
			<input type=radio name=fld_default value = "1"{if $val.is_default == "1"} checked{/if}>
		</td>
		<td NOWRAP align="center">
			<A HREF="cnf_config.php?module=instances&method=Dublicate&ID={$val.id}">Duplicate</A>
			{if $count_inst > 1 && $val.is_default != 1}
				&nbsp;/&nbsp;
				<a href="javascript:decision('Are you sure you want to delete this instance?\nNote: ALL configuration data for this instance will be lost.','cnf_config.php?module=instances&method=Delete&ID={$val.id}')">Delete</a>
			{/if}
		</td>
	</tr>
{/foreach}
</table>	
<table width="100%">

	<tr>
		<td>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td align="center">
			<input type="Submit" name="submit" value="Save Settings">
		</td>
	</tr>
</table>	


<input type="Hidden" name="module" value="{$module}">
</form>
