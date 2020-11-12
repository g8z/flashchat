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
{foreach name=fields from=$fields item=val key=key}

	{if !($val.level_0 == 'is_paid_chat' || $val.level_0 == 'membership_amount' || $val.level_0 == 'payment_test_mode' || $val.level_0 == 'paypal_bussiness_email' || $val.level_0 == 'payment_currency_type')}

	{if ($val.value == '' || $val.value == 'statelessCMS') && $val.level_0 == 'CMSsystem'}
		{assign var="cms" value="true"}
	{/if}
	{if !($val.level_0 == 'adminPassword' || $val.level_0 == 'spyPassword' || $val.level_0 == 'moderatorPassword')}
	<tr>
		<td style="width:30%;" valign="top" class="tdTitle">{$val.title}
			<input type="Hidden" name="type_{$val.id}" value="{$val.type}">
			<input type="Hidden" name="name_{$val.id}" value="{$val.title}">
			<input type="Hidden" name="field_{$val.id}" value="{$val.level_0}">
		</td>
		<td nowrap height="25" valign="top">
		<div style="white-space: nowrap;">
			{if $val.type == 'integer'}
				<input type="hidden" id="val_{$val.id}" name="val_{$val.id}" value="{$val.value}">
				<input type="Text" size="5"  id="fld_{$val.id}" name="fld_{$val.id}" value="{$val.value}">&nbsp;{$value.dimension[$val.level_0]}
			{elseif $val.type == 'string'}
				{if $val.level_0 == 'modsAdminRestrictions'}
					<select name="fld_{$val.id}[]" multiple size="8" style="WIDTH: 255px">
						{foreach name=name from=$mod_rest item=val1 key=key1}
							{if $val1=="#"}
								<option value={$mods_rest_selected[$key1]} selected>{$mods_rest_selected[$key1]}
							{else}
								<option value={$val1}>{$val1}
							{/if}
						{/foreach}
					</select>
				{elseif $val.level_0 == 'mods'}
					<select name="fld_{$val.id}[]" multiple size="8" style="WIDTH: 255px">
						{foreach name=name from=$mods item=val1 key=key1}
							{if $val1=="#"}
								<option value={$mods_selected[$key1]} selected>{$mods_selected[$key1]}
							{else}
								<option value={$val1}>{$val1}
							{/if}
						{/foreach}
					</select>
				{elseif $val.level_0 == 'disabledIRC'}
					<select name="fld_{$val.id}[]" multiple size="8" style="WIDTH: 255px">
						{foreach name=name from=$disabledIRC item=val1 key=key1}
							{if $val1=="#"}
								<option value={$disabledIRC_selected[$key1]} selected>{$disabledIRC_selected[$key1]}
							{else}
								<option value={$val1}>{$val1}
							{/if}
						{/foreach}
					</select>
				{elseif $val.level_0 == 'disabledIRCFor'}
					<select name="fld_{$val.id}[]" multiple size="5" style="WIDTH: 255px">
						{foreach name=name from=$roles item=val1 key=key1}
							{if $val1.selected==true}
								<option value={$val1.value} selected>{$val1.name}</option>
							{else}
								<option value={$val1.value}>{$val1.name}</option>
							{/if}
						{/foreach}
					</select>
				{else}
						{if $val.level_0 == 'cachePath' || $val.level_0 == 'cacheFilePrefix'}
							{$val.value}
							<input type="hidden" id="val_{$val.id}" name="val_{$val.id}" value="{$val.value}">
							<input type="hidden" name="fld_{$val.id}" value="{$val.value}">
						{else}
							<input type="Text" size="40"
							{if  $val.level_0 == 'version' || $val.level_0 == 'cachePath'|| $val.level_0 == 'cacheFilePrefix' || ($cms != 'true' && ($val.level_0 == 'adminPassword'||$val.level_0 == 'spyPassword' || $val.level_0 == 'moderatorPassword'))}disabled style="background-color:#cccccc;color:#000000;" {/if}
							{if $val.level_0 == 'adminPassword'}id="admin"{/if}
							{if $val.level_0 == 'spyPassword'}id="spy"{/if}
							{if $val.level_0 == 'moderatorPassword'}id="moderator"{/if}
						name="fld_{$val.id}" value="{$val.value}">
						<input type="hidden" id="val_{$val.id}" name="val_{$val.id}" value="{$val.value}">
						{/if}
				{/if}
			{elseif $val.type == 'combo'}
				<input type="hidden" id="val_{$val.id}" name="test_{$val.id}" value="{$val.value}">
				{if $val.level_0 == 'cacheType'}
					{assign var="cacheType" value=$val.value}
					<input type="hidden" name="fld_{$val.id}" value="{$val.value}" id="fld_{$val.id}">
					{assign var="array" value=$value[$val.level_0]}
					{$array[$val.value]}
				{else}
				<select {if $val.level_0 == 'cacheType'} disabled style="background-color:white;color:black;" {/if} {if $val.level_0 == 'CMSsystem'}id="cmsSystem" onchange="javascript:changeCms();"{else}id="fld_{$val.id}"{/if} name="fld_{$val.id}">
					{if $val.level_1 == 'anchor' || $val.level_1 == 'window'}
						{assign var="array" value=$value[$val.level_1]}
					{else}
						{assign var="array" value=$value[$val.level_0]}
					{/if}

					{foreach name=name from=$array item=val1 key=key1}
						<option value={$key1} {if $key1 == $val.value || ($val.value == 'defaultUsrExtCMS' && $key1 == 'defaultCMS')}selected{/if}>{if $val.level_0 == 'defaultSkin'} {$val1.name} {else} {$val1} {/if}
					{/foreach}
				</select>
				{/if}
			{elseif $val.type == 'boolean'}
					<input type="hidden" id="val_{$val.id}" name="val_{$val.id}" value="{$val.value}">
					<input {if ($cacheType==2 && $val.level_0 == 'enableBots') || ($cms && $val.level_0 == 'encryptPass') }disabled{/if} type="Radio" {if $val.level_0 == 'encryptPass'}id="encYes"{else}id="fld_{$val.id}"{/if} name="fld_{$val.id}" value="1" {if $val.value } checked{/if} id="yes{$key}"><label for="yes{$key}">{$cnf_langs.t0}</label>
					<input type="Radio" {if $val.level_0 == 'encryptPass'}id="encNo"{else}id="fld_{$val.id}"{/if} name="fld_{$val.id}" value="0"{if !$val.value } checked{/if} id="no{$key}" {if $cms && $val.level_0 == 'encryptPass'}checked disabled{/if}><label for="no{$key}">{$cnf_langs.t1}</label>
					{if $val.level_0 == 'encryptPass'}<input type="hidden" name="encPassOld" value="{$val.value}">{/if}
			{/if}
			{if $val.info!='' }
				<a href="#" class="hintanchor" onMouseover="showhint('{$val.info}', this, event, '200px')" >[?]</a>
			{/if}
			</div>
		</td>
		</tr>
		{else}
		{if $cms}
			<tr>
			<td style="width:250px;" valign="top">{$val.title}
				<input type="Hidden" name="type_{$val.id}" value="{$val.type}">
				<input type="Hidden" name="name_{$val.id}" value="{$val.title}">
				<input type="Hidden" name="field_{$val.id}" value="{$val.level_0}">
			</td>
			<td nowrap height="25" valign="top">
			<div style="white-space: nowrap">
				<input type="Text" size="40"
					{if $val.level_0 == 'adminPassword'}id="admin"{/if}
					{if $val.level_0 == 'spyPassword'}id="spy"{/if}
					{if $val.level_0 == 'moderatorPassword'}id="moderator"{/if}
					name="fld_{$val.id}" value="{$val.value}">
				<input type="hidden" id="val_{$val.id}" name="val_{$val.id}" value="{$val.value}">
				{if $val.info!='' }
					<a href="#" class="hintanchor" onMouseover="showhint('{$val.info}', this, event, '200px')" >[?]</a>
				{/if}
				</div>
			</td>
			</tr>
		{else}
			<input type="hidden" name="fld_{$val.id}" value="{$val.value}">
		{/if}
		{/if}
		{/if}
{/foreach}