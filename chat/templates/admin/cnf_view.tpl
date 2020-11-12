<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>View</title>
</head>

<body>
{if $ext == "swf"}
	<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" WIDTH="100%" HEIGHT="100%">
	<PARAM name="movie" value="{$patch}">
	<PARAM name="quality" value="hight">

	<EMBED src="{$patch}" quality="high" WIDTH="100%" HEIGHT="100%" TYPE="application/x-shockwave-flash">
	</EMBED>

	</OBJECT>
{else}
	<img border='1' src="{$patch}">
{/if}
</body>
</html>
