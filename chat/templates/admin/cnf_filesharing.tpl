<h3>{$langs.t10}</h3>
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

<tr>
	<th colspan="3" align="left">
		{$cnff_langs.t0}
	</th>
</tr>
<!--representation values-->
{foreach name=fields from=$fields item=val key=key}
	{if $val.level_1 == "allowFileExt" }


				{if $val.level_0 == "avatarbgloading"}
				<tr>
					<td colspan="3">&nbsp;

					</td>
				</tr>
				<tr>
				<th colspan="3" align="left">
					{$cnff_langs.t1}
				{elseif $val.level_0 == "photoloading"}
				<tr>
					<td colspan="3">&nbsp;

					</td>
				</tr>
				<tr>
				<th colspan="3" align="left">
					{$cnff_langs.t2}
				{/if}
			</th>
		</tr>
	{/if}
	<tr>


		<td style="width:200px;">
			{$val.title}
			<input type="Hidden" name="type_{$val.id}" value="{$val.type}">
			<input type="Hidden" name="name_{$val.id}" value="{$val.title}">
			<input type="Hidden" name="field_{$val.id}" value="{$val.level_1}">
		</td>

		<td width="50">
		<div style="white-space: nowrap;height:25px;">
			{if $val.type == 'integer' || $val.type == 'double'}

				<input type="Text" size="5"  name="fld_{$val.id}" value="{$val.value}">
				{if $val.type == 'integer'}
					{$cnff_langs.t6}
				{elseif $val.type == 'double'}
					{$cnff_langs.t7}
				{/if}

			{elseif $val.type == 'string'}
					<input type="Text" size="40" name="fld_{$val.id}" value="{$val.value}">
			{elseif $val.type == 'boolean'}
					<input type="Radio" name="fld_{$val.id}" value="1" {if $val.value } checked {/if} id="yes{$key}"><label for="yes{$key}">{$cnff_langs.t3}</label>
					<input type="Radio" name="fld_{$val.id}" value="0" {if !$val.value } checked {/if} id="no{$key}"><label for="no{$key}">{$cnff_langs.t4}</label>

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
		<td colspan="3">&nbsp;

		</td>
	</tr>
	<tr>

		<td colspan="3" align="center">
			<input type="Submit" name="submit" value="{$cnff_langs.t5}">
		</td>
	</tr>

</table>

<input type="Hidden" name="module" value="{$module}">
</form>