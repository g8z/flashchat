{assign var=title value=Rooms}
{include file=top.tpl}

<!-- transfer vars from php to javascript -->
<script type="text/javascript">
var permanent = '{$room_permanent_post}';
var ispublic = '{$room_public_post}';
var name = '{$room_name_post}';
var password = '{$room_password_post}';
var selectstr = '{$room_order_post}';
var optionstr = '{$room_option}';
var hidden = '{$room_identification_post}';
var option_count = {$rowcount};
var deleteroom = '{$room_delete_post}';
var maxorder = '{$max_order_post}';
</script>
<center>
	<h4>{$langs.t0}</h4>
	<a href="room.php">{$langs.t1}</a><br>
	<br>
{if $rooms}
	<form id="roomlist" action="" method="post" enctype="multipart/form-data">
		<table border="1">
			<tr>
				<th><a href="javascript:my_getbyid('sort').value = 'id'; my_getbyid('roomlist').submit()">id</a></th>
				<th><a href="javascript:my_getbyid('sort').value = 'name'; my_getbyid('roomlist').submit()">{$langs.t2}</a></th>
				<th><a href="javascript:my_getbyid('sort').value = 'password'; my_getbyid('roomlist').submit()">{$langs.t3}</a></th>
				<th>{$langs.t4}</th>
				<th>{$langs.t5}</th>
				<th><a href="javascript:my_getbyid('sort').value = 'row_nr'; my_getbyid('roomlist').submit()">#</a></th>
				<th>{$langs.t6}</th>
				<th>{$langs.t7}</th>
			</tr>
{foreach from=$rooms item=room}
			{* assign javascript variables *}

			<tr>
				<!-- Heater row -->
				<td align="center">
					{$room.id}
				</td>

				<!-- Name row -->
				<td align="center">
					<input type="button" value="{$langs.t11}" id="bttn_{$room.row_nr}" onclick="javascript: onbttnclick('bttn_{$room.row_nr}','room_name[{$room.row_nr}]');">
					<input type="text" name="room_name[{$room.row_nr}]" value="{$room.name}" id="room_name[{$room.row_nr}]" onchange="javascript:row_change('{$room.row_nr}');" onfocus="javascript: onnamefocus('bttn_{$room.row_nr}','room_name[{$room.row_nr}]');" style="border: 0px;">
				</td>
				
				<!-- Password row -->
				<td align="center">
					<input type="button" value="{$langs.t11}" id="bttn_pass_{$room.row_nr}" onclick="javascript: onbttnclick('bttn_pass_{$room.row_nr}','room_password[{$room.row_nr}]');">
					<input type="text" name="room_password[{$room.row_nr}]" value="{$room.password}" id="room_password[{$room.row_nr}]" onchange="javascript:row_change('{$room.row_nr}');" onfocus="javascript: onnamefocus('bttn_pass_{$room.row_nr}','room_password[{$room.row_nr}]');" style="border: 0px;">
				</td>

				<!-- ispublic row -->
				<td align="center">
				<input type="checkbox" name="{$room.public_id}" id="{$room.public_id}" onchange="javascript:row_change('{$room.row_nr}');" {$room.ispublic}>
				</td>

				<!-- ispermanent row -->
				<td align="center">
				<input type="checkbox" name="{$room.permanent_id}" id="{$room.permanent_id}" onchange="javascript:perm_change('{$room.row_nr}');" {$room.ispermanent}>

				<!-- order row -->
				<td align="center">
				{if $room.ispermanent}
				{assign var=room_order_name value=$room_order_post[`$room.row_nr`]}
				<select id="{$room_order_name}" name="{$room_order_name}" onchange="javascript: change({$room.row_nr});" onfocus="javascript:focused('{$room.row_nr}');">
				
				{assign var=selected value=$room_option[`$room.row_nr`][`$room.row_nr`]}
				
				{foreach from=$room.ordersel key=key item=ordersel}
					<option id="{$key}"
					{if $key==$selected}selected{/if}
					>{$ordersel}</option>
				{/foreach}
				
				</select>
				{else}
				&nbsp;
				{/if}
				</td>

				<!-- bumper row -->
				<td align="center">
					<a href="javascript: bump_up({$room.row_nr});">
						<img src="bumper.gif" border="0" alt="Bump up">
					</a>
				</td>

				<!-- delete row -->
				<td align="center">
					<input type="checkbox" name="{$room.delete_id}" id="{$room.delete_id}" onchange="javascript: row_change('{$room.row_nr}');">
				</td>

				<!-- this hidden input will show if user edited row -->
					<input type="hidden" name="{$room.hidden_id}" id="{$room.hidden_id}" value={$room.id} disabled >
			</tr>
{/foreach}
		</table>
		<br>
		<br>
		<input type="hidden" value="{$maxnumb}" name="{$max_order_post}">
		<input type="submit" value="{$langs.t8}" name="submited" onclick="javascript: submit_form();">
		<input type="hidden" id="sort" name="sort" value="none">
		
		<br>
		<br>{$langs.t9}
	</form>
{else}
	{$langs.t10}
{/if}
</center>
{include file=bottom.tpl}

