{literal}
<style>
  option, select {
    text-transform: capitalize;
  }
</style>
{/literal}
<H3>{$langs.t12}</H3>
<FORM action="cnf_config.php" method="post" enctype="multipart/form-data" name="cnf_form">

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

{assign var="bool" value="true"}
<!--representation values-->
{foreach name=fields from=$fields item=val key=key}
{if $val.level_1 == 'btn' }
	<tr>
		<td>&nbsp;

		</td>
	</tr>
	<tr>
		<td align="left">
			<H3>{$cnf_langs.t0}</H3>
		</td>
	</tr>
{assign var="bool" value="false"}
{/if}
{if $val.level_1 == 'username' && $bool == "true"}
	<tr>
		<td align="left">
			{$cnf_langs.t1}
		</td>
	</tr>
{assign var="bool" value="false"}
{/if}
{if $val.level_1 == 'password' && $bool == "false"}
	<tr>
		<th align="left">
			{$cnf_langs.t2}
		</th>
	</tr>
{assign var="bool" value="true"}
{/if}
{if $val.level_1 == 'lang' && $bool == "true"}
	<tr>
		<th align="left">
			{$cnf_langs.t3}
		</th>
	</tr>
{assign var="bool" value="false"}
{/if}
{if $val.level_1 == 'title' && $bool == "false"}
	<tr>
		<th align="left">
			{$cnf_langs.t4}
		</th>
	</tr>
{assign var="bool" value="true"}
{/if}
	<tr>


		<td  style="width:40%;">
			{$val.title}
			<input type="Hidden" name="type_{$val.id}" value="{$val.type}">
			<input type="Hidden" name="name_{$val.id}" value="{$val.title}">
			<input type="Hidden" name="field_{$val.id}" value="{$val.level_1}">
		</td>
			{if $val.type == 'string'}

				<td width="40">
				<div style="white-space: nowrap;">
					<input type="Text" size="30" name="fld_{$val.id}" value="{$val.value}">
					{if $val.level_1 == 'fontColor' || $val.level_1 == 'BGColor' || $val.level_1 == 'barColor'}

					 	<a href="javascript:TCP.popup(document.forms['cnf_form'].elements['fld_{$val.id}'])">
							<img width="15" height="13" border="0" alt="{$cnf_langs.t5}" src="../images/cnf_img/sel.gif">
						</a>

				{/if}
				{$val.units}
				</div>
				</td>
			{elseif $val.type == 'integer'}
				<td width="40">
					<input type="Text" size="5"  name="fld_{$val.id}" value="{$val.value}">{$val.units}
				</td>
			{elseif $val.type == 'combo'}
				<td width="40">
				<div style="white-space: nowrap;">
					<select name="fld_{$val.id}">
						{assign var="array" value=$font[$val.level_1]}
						{if $val.level_0 == "login"}
							{assign var="array" value=$value[$val.level_2]}
						{/if}
						{if $val.level_1 == "theme"}
							{assign var="array" value=$value.defaultTheme}
						{/if}
						{if $val.level_2 == align}
							{assign var="array" value=$value.alignment}
						{/if}
						{if $val.level_2== type}
							{assign var="array" value=$value.text_type}
						{/if}
						{foreach name=font from=$array item=v key=key}
						<option value="{$v}" {if $val.value == $v} selected {/if}>{$v}
						{/foreach}
					</select>
					{if $val.info!='' }
				<a href="#" class="hintanchor" onMouseover="showhint('{$val.info}', this, event, '200px')" >[?]</a>
			{/if}
			</div>
				</td>

			{elseif $val.type == 'string1'}
				<td>
					<div style="white-space: nowrap;">
						<input type="Radio" name="fld_{$val.id}" value="true" {if $val.value == "true" } checked {/if} id="yes{$key}"><label for="yes{$key}">{$cnf_langs.t6}</label>
						<input type="Radio" name="fld_{$val.id}" value="false" {if $val.value == "false" } checked {/if} id="no{$key}"><label for="no{$key}">{$cnf_langs.t7}</label>
						{if $val.info!='' }
				<a href="#" class="hintanchor" onMouseover="showhint('{$val.info}', this, event, '200px')" >[?]</a>
			{/if}
					</div>
				</td>
			{/if}




	</tr>
{/foreach}

	<tr>
		<td colspan="3">&nbsp;

		</td>
	</tr>
	<tr>

		<td colspan="3" align="center">
			<input type="Submit" name="submit" value="{$cnf_langs.t8}">
		</td>
	</tr>

</table>


<input type="Hidden" name="module" value="{$module}">
</form>