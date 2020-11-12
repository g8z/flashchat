

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
{foreach name=fields1 from=$fields.sound item=val1 key=key}
	<tr>
		<td style="width:30%;" class="tdTitle">
			{assign var="k" value=$key-$fields.sound_patch[0]._order+1}
			{if $fields.sound_patch[0]._order-1 <= $key}
				{$fields.sound_patch[$k].title}
				{assign var="array" value=$fields.sound_patch[$k]}
			{elseif $fields.sound_patch[0]._order-1 > $key}
				{$fields.sound[$key].title}
				{assign var="array" value=$fields.sound[$key]}
			{else}
			{/if}
			<input type="Hidden" name="name_{$val1.id}" value="{$val1.title}">
			<input type="Hidden" name="type_{$val1.id}" value="{$val1.type}">
			<input type="Hidden" name="field_{$val1.id}" value="{$val1.level_1}">
		</td>


		<td width="50">
		<div style="white-space: nowrap;height:25px;">
			{if $val1.type == 'integer'}
					<input type="Text" size="5"  name="fld_{$val1.id}" value="{$val1.value}">
			{elseif $val1.type == 'string'}
					<input type="Text" size="40" name="fld_{$val1.id}" value="{$val1.value}">
			{elseif $val1.type == 'boolean'}

					<input type="Radio" name="fld_{$val1.id}" value="1" {if $val1.value } checked {/if} id="yes{$key}"><label for="yes{$key}">{$cnf_langs.t0}</label>
					<input type="Radio" name="fld_{$val1.id}" value="0" {if !$val1.value } checked {/if} id="no{$key}"><label for="no{$key}">{$cnf_langs.t1}</label>
					{if $fields.sound_patch[0]._order-1 <= $key}
						<SELECT NAME="fld_{$array.id}">
							{section name=i loop=$fields.sound_files start=2}
								{assign var="name" value=$fields.sound_files[i]}
								{assign var="patch" value=sounds/$name}
								<OPTION VALUE="{$patch}" {if $array.value == $patch} selected {/if}>{$name}
							{/section}
						</SELECT>
					{/if}

			{/if}
			{if $val1.r!='' }
				{$val1.r}
			{/if}
			{if $val1.info!='' }
				<a href="#" class="hintanchor" onMouseover="showhint('{$val1.info}', this, event, '200px')" >[?]</a>
			{/if}
			</div>
		</td>


			<td align="right" width="5">

			</td>

	</tr>
	{if $val1.level_1 == 'muteAll'}
		<tr>
			<td colspan="4">&nbsp;

			</td>
		</tr>
		<tr>
			<th align="left">
				{$cnf_langs.t2}
			</th>
			<th colpsan="2" align="left">
				{$cnf_langs.t3}&nbsp;{$cnf_langs.t4}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MP3
			</th>
		</tr>
		<tr>
			<td colspan="3">
				<HR>
			</td>
		</tr>
	{/if}
{/foreach}
