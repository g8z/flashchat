
<!--error process -->

{if $errMsg != ''}
	<TR>
		<TD class="errorMsg" valign='middle'  align="center" colspan="4">
			{$errMsg}
		</TD>
	</TR>
{/if}
<!--end error handling-->


<tr>
	<td colspan="2" align="center" nowrap>
		{$cnf_langs.t3}
	</td>
	<td colspan="3">
		<input type="text" size="15" name="Substitute" value={$substitute}>
	</td>
</tr>

<!--Add badword-->
	<tr>
		<td colspan="5">&nbsp;

		</td>
	</tr>
{if !$isInstaller}

	<tr>
		<td align="right">
			<input type="Text" size="15" name="AddName" value="">
		</td>
		<td  align="center" size="5" >
			=>
		</td>
		<td>
			<input type="Text" size="15" name="AddValue" value="">
		</td>
		<td colspan="2">
			<input type="submit" name="Submit1" value="{$cnf_langs.t4}" onclick='javascript:document.submit();' align="left">
		</td>
	</tr>
{/if}
	<tr>
		<td colspan="5" align="right">&nbsp;

		</td>
	</tr>

<!--representation values-->
{foreach name=fields from=$fields item=val key=key}
	<tr>


		<td width="40%" align="right">
			<input type="Text" size="15" name="name_{$val.id}" value="{$val.level_1}">
			<input type="Hidden" name="type_{$val.id}" value="{$val.type}">
			<input type="Hidden" name="field_{$val.id}" value="{$smarty.foreach.fields.iteration}">
		</td>
		<td align="center" >
			=>
		</td>
		<td >
			<input type="Text" size="15" name="fld_{$val.id}" value="{$val.value}">
		</td>
		<td  align="left">
			<div style="white-space: nowrap;">
				<input type="Radio" name="disabled_{$val.id}" value="0" {if !$val.disabled } checked {/if} id="on{$key}"><label for="on{$key}">{$cnf_langs.t5}</label>
				<input type="Radio" name="disabled_{$val.id}" value="1" {if $val.disabled } checked {/if} id="off{$key}"><label for="off{$key}">{$cnf_langs.t6}</label>
			</div>
		</td>
		<td>
		  {if !$isInstaller}
			  <a href="javascript:decision('{$cnf_langs.t10}','cnf_config.php?module=badwords&method=Delete&ID={$val.id}')">{$cnf_langs.t7}</a>
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
		<td colspan="4">

		</td>
	</tr>