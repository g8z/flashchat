
<H3>{$langs.t5}</H3>


<FORM action="cnf_config.php" method="post" enctype="multipart/form-data" name="k">
	{$cnf_langs.t0}
	<SELECT NAME=layout onchange=k.submit()>
		{foreach name=name from=$layouts item=val key=key}
			<OPTION VALUE={$val.value} {if $val.value == $name}selected{/if}>{$val.name}
		{/foreach}
	</SELECT>

	<input type="Hidden" name="module" value="{$module}">
	{assign var="name_layout" value=$name}
</FORM>




<FORM action="cnf_config.php" method="post" enctype="multipart/form-data">
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

{assign var="bool1" value="0"}
<!--Title for value-->
{foreach name=fields from=$fields item=val key=key }

	{if $val.level_2 == 'toolbar' && $bool1 == '0'}
	{assign var="bool1" value='1'}
		<tr>
			<th colspan="2" align="left"><br>
				{$cnf_langs.t4}
			</th>
		</tr>
	{elseif $val.level_2 == 'optionPanel' && $bool1 == '1'}
	{assign var="bool1" value='0'}
		<tr>
			<th colspan="2" align="left"><br>
				{$cnf_langs.t5}
			</th>
		</tr>
	{elseif $val.level_3 == 'userList' && $bool1 == '0'}
	{assign var="bool1" value='1'}
		<tr>
			<th colspan="2" align="left"><br>
				{$cnf_langs.t6}
			</th>
		</tr>
	{elseif $val.level_3 == 'publicLog' && $bool1 == '1'}
	{assign var="bool1" value='0'}
		<tr>
			<th colspan="2" align="left"><br>
				{$cnf_langs.t7}
			</th>
		</tr>
	{elseif $val.level_3 == 'privateLog' && $bool1 == '0'}
	{assign var="bool1" value='1'}
		<tr>
			<th colspan="2" align="left"><br>
				{$cnf_langs.t8}
			</th>
		</tr>
	{elseif $val.level_3 == 'inputBox' && $bool1 == '1'}
	{assign var="bool1" value='0'}
		<tr>
			<th colspan="2" align="left"><br>
				{$cnf_langs.t9}
			</th>
		</tr>
	{/if}
<!--end Title for value-->


<!--representation values-->
	{if $val.level_2 == 'allowBan' && $name == 1}
	<tr><td><input type="hidden" name="fld_{$val_id}" value="0"></td></tr>
	{else}
	<tr>
		<td style="width:200px;">
			{$val.title}
			<input type="Hidden" name="type_{$val.id}" value="{$val.type}">
			<input type="Hidden" name="name_{$val.id}" value="{$val.title}">
			<input type="Hidden" name="field_{$val.id}" value="{$val.level_4}">
		</td>


		<td width="50">
		<div style="white-space: nowrap;height:25px;">
			{if $val.type == 'integer'}
				{if $val.level_3 == 'userList' && $val.level_4 == 'position'}
					<SELECT name="fld_{$val.id}">
						{foreach name=name from=$userListItems item=option key=key}
							<OPTION VALUE={$key} {if $key == $val.value}selected{/if}>{$option}
						{/foreach}
					</SELECT>
				{elseif $val.level_3 == 'inputBox' && $val.level_4 == 'position'}
					<SELECT name="fld_{$val.id}">
						{foreach name=name from=$inputBoxItems item=option key=key}
							<OPTION VALUE={$key} {if $key == $val.value}selected{/if}>{$option}
						{/foreach}
					</SELECT>
				{else}
					<input type="Text" size="5"  name="fld_{$val.id}" value="{$val.value}">&nbsp;{$value.dimension[$val.level_4]}{$val.units}
				{/if}
				{if $val.info!='' }
					<a href="#" class="hintanchor" onMouseover="showhint('{$val.info}', this, event, '200px')" >[?]</a>
				{/if}
			{elseif $val.type == 'string'}
				<input type="Text" size="40" name="fld_{$val.id}" value="{$val.value}">{$val.units}
				{if $val.info!='' }
					<a href="#" class="hintanchor" onMouseover="showhint('{$val.info}', this, event, '200px')" >[?]</a>
				{/if}
			{elseif $val.type == 'boolean'}
				<input type="Radio" name="fld_{$val.id}" value="1" {if $val.value } checked {/if} id="yes{$key}"><label for="yes{$key}">{$cnf_langs.t1}</label>
				<input type="Radio" name="fld_{$val.id}" value="0" {if !$val.value } checked {/if} id="no{$key}"><label for="no{$key}">{$cnf_langs.t2}</label>
				{if $val.info!='' }
					<a href="#" class="hintanchor" onMouseover="showhint('{$val.info}', this, event, '200px')" >[?]</a>
				{/if}
			{elseif $val.type == 'select'}

				<SELECT name="fld_{$val.id}">
					{foreach name=name from=$val.options item=option key=key}
						<OPTION VALUE={$key} {if $key == $val.value}selected{/if}>{$option}
					{/foreach}
				</SELECT>

			{/if}
			</div>
		</td>



			<td align="right" width="5">

			</td>


	</tr>
	{/if}
{/foreach}

	<tr>
		<td colspan="3">&nbsp;

		</td>
	</tr>
	<tr>
		<td colspan="3" align="center">
			<input type="Submit" name="submit" value="{$cnf_langs.t3}">
		</td>
	</tr>

</table>

<input type="Hidden" name="name" value="{$name_layout}">
<input type="Hidden" name="module" value="{$module}">
</form>