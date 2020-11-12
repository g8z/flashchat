<h3>Chats</h3>
<FORM action="cnf_config.php" method="post" enctype="multipart/form-data" name="chat"> 

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
		Configuration instances
	</th>
	<th NOWRAP>
		Is Default
	</th>
	<th>&nbsp;
		
	</th>
</tr>
<!--representation values-->
{foreach name=chats from=$chats item=val key=key}

	<tr>
		<td align="center">
			{$val.id}
		</td>
		<td NOWRAP>
			<input type=hidden name=fld_name_{$val.id} value="{$val.name}">
			<input type="button" value="edit" name=bttn_{$val.id} onclick="javascript:bttnDis( bttn_{$val.id},txt_{$val.id} );">
			<input type="text" name=txt_{$val.id} value="{$val.name}" disabled style="border: 0px;background-color:white;color:black;" onchange="javascript:ValueExchange(fld_name_{$val.id},txt_{$val.id})">
		</td>
		<td >
			
			<SELECT name="chat_instance_{$val.id}" > 
				{foreach name=chat_inst from=$val.instances item=val1 key=key1}
					<OPTION VALUE="{$val1.id}" {if $val1.set == "1" || $val1.is_default == "1"}selected{/if}/>{$val1.name}
				{/foreach}
			</SELECT>
		</td>
		<td align="center">
			<input type=radio name=fld_chats value = "1" {if $val.is_default == "1"}checked{/if}>
		</td>
		<td NOWRAP align="center">
			<A HREF="cnf_config.php?module=chats&method=Dublicate&ID={$val.id}">Duplicate</A>
			&nbsp;
			{if $val.is_default != "1"}
			/&nbsp;
			<a href="javascript:decision('Are you sure you want to delete this instance?\nNote: ALL configuration data for this instance will be lost.','cnf_config.php?module=chats&method=Delete&ID={$val.id}')">Delete</a>
			{/if}	
		</td>
	</tr>
{/foreach}
</table>	
<table width="100%">

	<tr>
		<td>&nbsp;
			
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
