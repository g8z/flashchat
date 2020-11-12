<html>
	<head>
		<title>FlashChat Admin Panel</title>
		<meta http-equiv=Content-Type content="text/html;  charset=UTF-8">
		<link href="styles.css" rel="stylesheet" type="text/css">
		{include file=top_js_and_style.tpl}
	</head>

<body>
		<center>
		<form action="cnf_config.php" method="post" enctype="multipart/form-data" >

			<a href="index.php?{$rand}">{$b0.l}{$langs_top.t0}{$b0.r}</a>
<!--{if $fc_admin_chat_instance!='' && $IS_ADMIN == 1}| <a href="main.php">{$langs_top.t1}</a>
            <input type="Hidden" value="{$module}" name="module2">
{/if}-->|

			<a href="cnf_config.php?{$rand}&module=general">{$b1.l}{$langs_top.t2}{$b1.r}</a> |
			<a href="msglist.php?{$rand}">{$b2.l}{$langs_top.t3}{$b2.r}</a> |
			<a href="chatlist.php?{$rand}">{$b3.l}{$langs_top.t4}{$b3.r}</a> |
			<a href="usrlist.php?{$rand}">{$b4.l}{$langs_top.t5}{$b4.r}</a> |
			<a href="roomlist.php?{$rand}">{$b5.l}{$langs_top.t6}{$b5.r}</a> |
			<a href="connlist.php?{$rand}">{$b6.l}{$langs_top.t7}{$b6.r}</a> |
			<a href="banlist.php?{$rand}">{$b7.l}{$langs_top.t8}{$b7.r}</a> |
			<a href="ignorelist.php?{$rand}">{$b8.l}{$langs_top.t9}{$b8.r}</a> |
			<a href="botlist.php?{$rand}">{$b9.l}{$langs_top.t10}{$b9.r}</a> |
			<a href="uninstall.php?{$rand}">{$b10.l}{$langs_top.t11}{$b10.r}</a> |
			<a href="logout.php?{$rand}">{$b11.l}{$langs_top.t12}{$b11.r}</a>
			<p>
				{if $fc_admin_chat_instance!='' && $IS_ADMIN == 1 && $chat_instances|@count>1}
				Load another chat instance:
  	          		<SELECT NAME=instances onchange='submit();' >
			   			{foreach name=name from=$chat_instances item=val key=key}
			    			<OPTION VALUE={$val.id}    {if $val.id == $instance_ID}selected{/if}>{$val.name}
		       			{/foreach}
	          		</SELECT>
	         		<input type="Hidden" value="{$module}" name="module">
				{/if}</p>

        </form>
		</center>
		<hr>
