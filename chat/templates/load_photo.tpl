<html>
	<head>
		<title>FlashChat v{$data.version} - {$data.win_title}</title>
		<meta http-equiv=Content-Type content="text/html;  charset=UTF-8">
		{literal}
		<script language=JavaScript type=text/javascript>
		<!--// open print window
		function myOnSubmit()
		{
			var fname = document.setup.file.value;
			if( fname == '')
			{
				{/literal}
				var msg = '{$data.pls_select_file}';
				{literal}
				window.alert(msg);
				return false;
			}

			{/literal}
			var allowExt = "{$data.allowFileExt}";
			{literal}
			var ind = fname.lastIndexOf('.');
			if(allowExt != '' && ind > 0)
			{
				var ext = fname.substring(ind + 1, fname.length).toUpperCase();

				allowExt = ',' + allowExt + ',';
				if( allowExt.indexOf(','+ext+',') < 0 )
				{
					{/literal}
					var msg = '{$data.ext_not_allowed}';
					{literal}
					msg = msg.replace('FILE_EXT', ext);
					window.alert(msg);
					return false;
				}
			}
			return true;
		}
		//-->
	</script>
	{/literal}
	</head>

{literal}
<style type=text/css>
<!--
body,td {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: normal;
	color: {/literal}{$data.bodyText};{literal}
}
.small {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: normal;
}
.title {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
}
input {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: normal;
}
select {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: normal;
}
A {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #0000FF;
}
-->
</style>
{/literal}
	<body bgcolor="{$data.publicLogBackground}" onLoad="window.focus()" leftmargin=5 topmargin=0 marginwidth=10 marginheight=5>

	<form name="setup" method="post" enctype="multipart/form-data" onSubmit="return myOnSubmit()">


		<table width="100%" height="100%">
		<tr><td valign="middle" align="center">
			<table border="0" cellpadding="4">

				{if $data.not_errmsg} <tr><td align=center>{$data.errmsg}</td></tr>{/if}

				<tr><td>{$data.win_choose}</td></tr>
				<tr><td><input type="hidden" name="MAX_FILE_SIZE1" value="{$data.maxSize}">
						<input name="file" type="file" size="45"><br>
					</td>
				</tr>
				<tr>
					<td>{$data.file_info}</td>
				</tr>
				<tr>
					<td align="center" nowrap><input name="submit" type="submit" class="input"  value="{$data.win_upl_btn}"></td>
				</tr>
			</table>
			</td>
		</tr>
		</table>
	</form>

	</body>

</html>
