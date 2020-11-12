<h3>{$langs.t4}</h3>
<FORM action="cnf_config.php" method="post" enctype="multipart/form-data" name="cnf_form">
<table border="0" width="700" height="100%">
<tr>
	<td>
		{$cnf_langs.t0}
	</td>
	<td align="left">
		<input type="hidden" name="MAX_FILE_SIZE" value={$value.maxSize}>
		<input type="file" name="file">
		<input type="submit" name="sub4" value="{$cnf_langs.t1}" onclick="return onSubmit('{$value.pls_select}','{$value.extens}')">
	</td>

</tr>
<tr>
	<td colspan="2">
		<input type="submit" name="sub1" value="{$cnf_langs.t2}">
	</td>
</tr>
<tr>
	<td colspan="2">&nbsp;

	</td>
</tr>
<tr>
	<td colspan="2" align="left">
		{$cnf_langs.t3}
		<SELECT NAME=theme onchange='javascript:Send(cnf_form,"true");'>
			{foreach name=name from=$themes item=val key=key}
				<OPTION VALUE={$val}  {if $val==$name}selected{/if}>{$val}
				{if $smarty.foreach.name.last == "true" }
					{assign var="last_name" value=$val}
				{/if}
			{/foreach}
		</SELECT>
		{if $name != "0"}
			<input type="submit" name="sub2" value="{$disabled} {$cnf_langs.t4}" >
			<input type="Hidden" name="disable" value="{$disabled}">
		{/if}
	</td>
</tr>



	<input type="Hidden" name="module" value="{$module}">
	{assign var="name_theme" value=$name}


<tr>
	{if $name == "0"}
		<td>
			{$cnf_langs.t5}
		</td>
		<td >
			<input type="Text" size="30" name="Name" value="{$last_name}">
			<input type="Hidden" name="Add" value="New">
			{assign var="name_theme" value="xp"}
		</td>
	{else}
		<!--
		<td colspan="4">
			<input type="submit" name="sub2" value="{$disabled} {$cnf_langs.t6}" >
			<input type="Hidden" name="disable" value="{$disabled}">
		</td>
		-->
	{/if}

</tr>
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
{foreach name=fields from=$fields item=val key=key }
	<tr>


		<td width="40%">
			{$val.title}
			<input type="Hidden" name="type_{$val.id}" value="{$val.type}">
			<input type="Hidden" name="name_{$val.id}" value="{$val.title}">
			<input type="Hidden" name="field_{$val.id}" value="{$val.level_2}">
		</td>



			{if $val.type == 'integer'}
				<td width="40">
				<input type="Text" size="5"  name="fld_{$val.id}" value="{$val.value}">
				</td>
				<td width="100">
					&nbsp;
			{elseif $val.type == 'string'}
				{if $val.level_2 != 'name' && $val.level_2 != 'backgroundImage' && $val.level_2 != 'dialogBackgroundImage'}
				<td>
					<input type="Text" size="30" name="fld_{$val.id}" value="{$val.value}" >
				<!--/td>
				<td-->
					<a href="javascript:TCP.popup(document.forms['cnf_form'].elements['fld_{$val.id}'])">
						<img width="15" height="13" border="0" alt="{$cnf_langs.t9}" src="../images/cnf_img/sel.gif">
					</a>
				{elseif $val.level_2 == 'name'}
				<td width="40" colspan="2">
						<input type="Text" size="30" name="fld_{$val.id}" value="{$val.value}">
				{else}
				<td>
						<select name="fld_{$val.id}">
							{foreach name=fields from=$img item=val1 key=key1}
								{assign var="name1" value="images/$val1"}
								<OPTION VALUE="{$name1}" {if  $name1 == $val.value} selected {/if}>{$val1}
							{/foreach}
						</select>
						<input type="button" value="{$cnf_langs.t10}" onclick="javascript:openWindow(fld_{$val.id}.value, 'winName', '',500,500 )">
				</td>
				<td>

				{/if}


			{elseif $val.type == 'boolean'}
				<td width="40" colspan="2">
					<div style="white-space: nowrap;">
						<input type="Radio" name="fld_{$val.id}" value="1" {if $val.value } checked {/if} id="yes{$key}"><label for="yes{$key}">{$cnf_langs.t7}</label>
						<input type="Radio" name="fld_{$val.id}" value="0" {if !$val.value } checked {/if} id="no{$key}"><label for="no{$key}">{$cnf_langs.t8}</label>
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
		<td>&nbsp;

		</td>
	</tr>
	<tr>

		<td align="center" colspan="2">
			<input type="submit" value="{$cnf_langs.t11}" name="sub3" >
		</td>
	</tr>

</table>

<input type="Hidden" name="change" value="false">
<input type="Hidden" name="name" value="{$name_theme}">
<input type="Hidden" name="module" value="{$module}">
</form>