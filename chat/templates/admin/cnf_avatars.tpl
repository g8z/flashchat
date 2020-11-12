{literal}
<style>
  option, select, .capitalize {
    text-transform: capitalize;
  }
</style>
{/literal}
<h3>{$langs.t9}</h3>
<FORM action="cnf_config.php" method="post" enctype="multipart/form-data" name="k" >
	{$cnf_langs.t0}
	<SELECT NAME=avatar onchange='submit();'>
		{foreach name=name from=$avatars item=val key=key}
			<OPTION VALUE={$val}    {if $val==$name}selected{/if}>{$val}
		{/foreach}
	</SELECT>

	<input type="Hidden" name="module" value="{$module}">
	{assign var="name_avator" value=$name}
</FORM>




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

{assign var="bool1" value="0"}
<!--representation values-->
{foreach name=fields from=$fields item=val key=key }
		{if $val.level_2 == 'male' && $bool1 == 0}
		{assign var="bool1" value="1"}
			<tr>
				<th colspan="3" align="left"><br>
					{$cnf_langs.t1}
				</th>
			</tr>
		{elseif $val.level_2 == 'female' && $bool1 == 1}
		{assign var="bool1" value="0"}
			<tr>
				<th colspan="3" align="left"><br>
					{$cnf_langs.t2}
				</th>
			</tr>
		{/if}

		<td style="width:200px;">
			{$val.title}
			<input type="Hidden" name="type_{$val.id}" value="{$val.type}">
			<input type="Hidden" name="name_{$val.id}" value="{$val.title}">
			<input type="Hidden" name="field_{$val.id}" value="{$val.level_4}">
		</td>


		<td width="50">
		<div style="white-space: nowrap;height:25px;">
			{if $val.type == 'integer'}
				<input type="Text" size="5"  name="fld_{$val.id}" value="{$val.value}">
			{elseif $val.type == 'combo'}
				<select name="fld_{$val.id}">
					{foreach name=name from=$smilies item=val1 key=key1}
						{foreach name=sm_name from=$sm item=sm_val key=sm_key}
							{if $sm_val.level_1 == $key1}
								{assign var="sm_code" value=$sm_val.value}
							{/if}
						{/foreach}
							<option value={$key1}  {if $key1 == $val.value}selected{/if}>{$val1} {$sm_code}
					{/foreach}
				</select>
			{elseif $val.type == 'string'}
					{foreach name=name from=$mod_only_def item=val1 key=key1}
						<input name="fld_{$val.id}[]" type="checkbox" value="{$val1}" {if $val1|lower == $mod_only[$key1]}checked{/if}>{$val1}</br>
					{/foreach}
			{elseif $val.type == 'boolean'}
				{if $val.title=='default_state'}
					{assign var="true" value="On"}
					{assign var="false" value="Off"}
				{else}
					{assign var="true" value="Yes"}
					{assign var="false" value="No"}
				{/if}
					<input type="Radio" name="fld_{$val.id}" value="1" {if $val.value } checked {/if} id="yes{$key}"><label for="yes{$key}">{$true}</label>
					<input type="Radio" name="fld_{$val.id}" value="0" {if !$val.value } checked {/if} id="no{$key}"><label for="no{$key}">{$false}</label>

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

		<td colspan="3"align="center">
			<input type="Submit" name="submit" value="{$cnf_langs.t3}">
		</td>
	</tr>

</table>


<input type="Hidden" name="name" value="{$name_avator}">
<input type="Hidden" name="module" value="{$module}">
</form>

