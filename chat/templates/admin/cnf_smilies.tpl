<h3>{$langs.t8}</h3>
<FORM action="cnf_config.php" method="post" enctype="multipart/form-data" name="cnf_form">

<table border="0" width1="700" height="100%">

<!--error process -->

{if $errMsg != ''}
	<TR>
		<TD class="errorMsg" valign='middle'  align="center" colspan="2">
			{$errMsg}
		</TD>
	</TR>
{/if}
<!--end error handling-->

{assign var="index" value="0"}
<!--representation values-->
{foreach name=fields from=$fields item=val key=key}
	<tr>


		<td style="width:200px;">
			<!--  {$val.title} -->
			<!-- <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="50" height="20" id="chat/admin/snf_smile" align="middle">
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="movie" value="snf_smile.swf?smi_name={$val.level_1}" />
			<param name="quality" value="high" />
			<param name="bgcolor" value="#ffffff" />
			<embed src="../smiles.swf?smi_name={$val.level_1}" quality="high" bgcolor="#ffffff" width="50" height="20" name="chat/admin/snf_smile" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
			</object> -->
			<input type="Hidden" name="type_{$val.id}" value="{$val.type}">
			<input type="Hidden" name="name_{$val.id}" value="{$val.title}">
		</td>


		<td width="25">
			<input type="Text" size="25" name="fld_{$val.id}" value="{$val.value}">
		</td>
		<td>
			<SELECT NAME="order_{$val.id}" id="{$val.id}" onchange="javascript:neworder(this, {$val.id});">
				{foreach name=name from=$_order item=val1 key=key1}
					<OPTION VALUE={$val1} {if $val1 == $val._order}selected{/if}>{$val1}
				{/foreach}
			</SELECT>
			<input type="hidden" id="oldOrder_{$val.id}" value="{$val._order}">
		</td>
		<td width="25">
			<div style="white-space: nowrap;">
				<input type="radio" name="disabled_{$val.id}" value="0" {if !$val.disabled }checked{/if} id="on{$key}"><label for="on{$key}">{$cnf_langs.t0}</label>
				<input type="radio" name="disabled_{$val.id}" value="1" {if $val.disabled }checked{/if} id="off{$key}"><label for="off{$key}">{$cnf_langs.t1}</label>
			</div>
		</td>

			<td align="right" width="5">
			{if $val.info != '' }
				<a href="#" class="hintanchor" onMouseover="showhint('{$val.info}', this, event, '200px')" >[?]</a>
			{/if}
			</td>

	</tr>
{/foreach}

	<tr>
		<td colspan="3">&nbsp;

		</td>
	</tr>
	<tr>

		<td colspan="3"align="center">
			<input type="Submit" name="submit" value="Save Settings">
		</td>
	</tr>

</table>

<input type="Hidden" name="module" value="{$module}">
</form>
