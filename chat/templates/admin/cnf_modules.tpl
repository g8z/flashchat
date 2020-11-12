{include file=cnf_module_xml_header.tpl}
{literal}
<script type="text/javascript">
	var fmsCount = 0;

	function moduleCheck(name, id) {
		name = name.toLowerCase();
		if (name.indexOf('audio') >= 0 || name.indexOf('white') >= 0) {
			val = $('chk_'+id).checked;
			if (val) {
				fmsCount ++;
			}
			else {
				fmsCount --;
			}
			fmsCount = Math.abs(fmsCount);
		}

		if (0 < fmsCount) {
			$('fmsCheck').show();
			location.href = "#fmsCheck";
		}
		else {
			$('fmsCheck').hide();
		}
	}
</script>
{/literal}

<h3>{$langs.t11}</h3>
{if $is_modules==0}
	{$cnf_langs.t0}
{else}
<FORM action="cnf_config.php?module=modules" method="post" enctype="multipart/form-data" name="mod">

<input type="Hidden" name="module" value="{$module}">
<input type="hidden" name="module125" value="modules125">

<TABLE border="0" width="500" height="100%">
<!--error process -->
{if $errMsg != ''}
	<TR>
		<TD class="errorMsg" valign='middle' align="center" colspan="2">
			{$errMsg}
		</TD>
	</TR>
{/if}
	<tr id="fmsCheck">
		<td width="100%">
			<a name="fmsCheck"></a>
			<b>Test connection to your RTMP server here:</b>
			<p>(copy URL into input field an click the 'Connect' button)</p>

		</td>
		<td colspan="2" align="right" style="padding: 15px 0px">

			{literal}

				<!--  BEGIN Browser History required section -->
				<link rel="stylesheet" type="text/css" href="history/history.css" />
				<!--  END Browser History required section -->

				<title></title>
				<script src="AC_OETags.js" language="javascript"></script>

				<!--  BEGIN Browser History required section -->
				<script src="history/history.js" language="javascript"></script>
				<!--  END Browser History required section -->


				<script language="JavaScript" type="text/javascript">
				<!--
				// -----------------------------------------------------------------------------
				// Globals
				// Major version of Flash required
				var requiredMajorVersion = 9;
				// Minor version of Flash required
				var requiredMinorVersion = 0;
				// Minor version of Flash required
				var requiredRevision = 124;
				// -----------------------------------------------------------------------------
				// -->
				</script>
				</head>

				<script language="JavaScript" type="text/javascript">
				// This function returns the appropriate reference,
				// depending on the browser.
				function getFlexApp(appName)
				{
				  if (navigator.appName.indexOf ("Microsoft") !=-1)
				  {
				    return window[appName];
				  }
				  else
				  {
				    return document[appName];
				  }
				}

				function updateServer(text)
				{
				  fmsCheck.show();
				  location.href = "#fmsCheck";
				  getFlexApp('testConnection').updateServer(text);
				}


				<!--
				// Version check for the Flash Player that has the ability to start Player Product Install (6.0r65)
				var hasProductInstall = DetectFlashVer(6, 0, 65);

				// Version check based upon the values defined in globals
				var hasRequestedVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);

				if ( hasProductInstall && !hasRequestedVersion ) {
					// DO NOT MODIFY THE FOLLOWING FOUR LINES
					// Location visited after installation is complete if installation is required
					var MMPlayerType = (isIE == true) ? "ActiveX" : "PlugIn";
					var MMredirectURL = window.location;
				    document.title = document.title.slice(0, 47) + " - Flash Player Installation";
				    var MMdoctitle = document.title;

					AC_FL_RunContent(
						"src", "playerProductInstall",
						"FlashVars", "MMredirectURL="+MMredirectURL+'&MMplayerType='+MMPlayerType+'&MMdoctitle='+MMdoctitle+"",
						"width", "354",
						"height", "66",
						"align", "middle",
						"id", "testConnection",
						"quality", "high",
						"bgcolor", "#869ca7",
						"name", "testConnection",
						"allowScriptAccess","sameDomain",
						"type", "application/x-shockwave-flash",
						"pluginspage", "http://www.adobe.com/go/getflashplayer"
					);
				} else if (hasRequestedVersion) {
					// if we've detected an acceptable version
					// embed the Flash Content SWF when all tests are passed
					AC_FL_RunContent(
							"src", "testConnection",
							"width", "354",
							"height", "66",
							"align", "middle",
							"id", "testConnection",
							"quality", "high",
							"bgcolor", "#869ca7",
							"name", "testConnection",
							"allowScriptAccess","sameDomain",
							"type", "application/x-shockwave-flash",
							"pluginspage", "http://www.adobe.com/go/getflashplayer"
					);
				  } else {  // flash is too old or we can't detect the plugin
				    var alternateContent = 'Alternate HTML content should be placed here. '
				  	+ 'This content requires the Adobe Flash Player. '
				   	+ '<a href=http://www.adobe.com/go/getflash/>Get Flash</a>';
				    document.write(alternateContent);  // insert non-flash content
				  }

				// -->
				</script>
				<noscript>
				  	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
							id="testConnection" width="354" height="66"
							codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab">
							<param name="movie" value="testConnection.swf" />
							<param name="quality" value="high" />
							<param name="bgcolor" value="#869ca7" />
							<param name="allowScriptAccess" value="sameDomain" />
							<embed src="testConnection.swf" quality="high" bgcolor="#869ca7"
								width="354" height="66" name="testConnection" align="middle"
								play="true"
								loop="false"
								quality="high"
								allowScriptAccess="sameDomain"
								type="application/x-shockwave-flash"
								pluginspage="http://www.adobe.com/go/getflashplayer">
							</embed>
					</object>
				</noscript>
			{/literal}
		</td>
	</tr>
	<!--end error handling-->
	<TR>
		<TD colspan="2"><font color="#ff0000">*</font> {$cnf_langs.t7}</TD>
	</TR>
	<!--representation values-->

{foreach name=fields from=$fields item=field key=i}
	<TR>
		<TH align="left" width="40%" valign="middle">
			{$field.name}
		</TH>
		<TD align="center" width="30%" valign="middle" nowrap>
			<input type="Hidden" name="type_{$i}_1191" value="{$field.1191.type}">
			<input type="Hidden" name="name_{$i}_1191" value="{$field.1191.title}">
			<input type="Hidden" name="field_{$i}_1191" value="{$field.1191.level_1}">
			<input type="checkbox" name="fld_{$i}_1191" id="chk_{$i}" {if $field.1191.value } checked {/if}
				onclick="moduleCheck('{$field.origName}', {$i})"> {$cnf_langs.t8}
			{if $field.1191.value }
				<script type="text/javascript">
					moduleCheck('{$field.origName}', {$i});
				</script>
			{/if}
		</TD>
		<TD align="center" width="30%" valign="middle">
			<input type="button" onClick="javascript:
			if(document.getElementById('div_{$i}').style.display == 'none')
			{literal}{{/literal}
				document.getElementById('div_{$i}').style.display = 'block';
			{literal}}{/literal}
			else
			{literal}{{/literal}
				document.getElementById('div_{$i}').style.display = 'none';
			{literal}}{/literal}" name="configure_{$i}" value="{$cnf_langs.t9}">
		</TD>
	</TR>
	<TR>
		<TD colspan="3">
				{foreach name=values from=$field item=value key=key}
					{if $smarty.foreach.values.first == "true"}
						<div id="div_{$i}" style="display:none;">
						<table border="0" width="100%" cellpadding="3" cellspacing="2">
					{/if}
						{if !($key == 'name' || $key == 'origName' || $value.level_1 == 'enabled')}
							{if $key < 848 || $key > 851}
								<tr>
									<td width="40%"><b>{$value.title}</b></td>
									<td width="60%">
										<div style="white-space: nowrap;">
										<input type="Hidden" name="type_{$i}_{$key}" value="{$value.type}">
										<input type="Hidden" name="name_{$i}_{$key}" value="{$value.title}">
										<input type="Hidden" name="field_{$i}_{$key}" value="{$value.level_1}">
									{if $value.type == 'integer'}
										<input type="Text" size="5"  name="fld_{$i}_{$key}" value="{$value.value}">
									{elseif $value.type == 'string'}
										<input type="Text" size="40" name="fld_{$i}_{$key}" value="{$value.value}">
									{elseif $value.type == 'combo'}
										{if $value.level_1 == 'path'}
										<input type="Hidden" name="fld_{$i}_{$key}" value="{$value.value}">{$value.value}
										{else}
										<select name="fld_{$i}_{$key}" onChange="javascript:
										if(this.value == -1)
										{literal}{{/literal}
											document.getElementById('inner_div_{$i}').style.display = 'block';
										{literal}}{/literal}
										else
										{literal}{{/literal}
											document.getElementById('inner_div_{$i}').style.display = 'none';
										{literal}}{/literal}
										">
											{foreach name=name from=$anchors item=val2 key=key2}
												<option value={$key2} {if $key2 == $value.value}selected {if $key2 == -1}{assign var="dis" value="block"}{else}{assign var="dis" value="none"}{/if}{/if}>{$val2}
											{/foreach}
										</select>
										{/if}
									{elseif $value.type == 'boolean'}
											<input type="Radio" name="fld_{$i}_{$key}" value="true" {if $value.value } checked {/if} id="yes{$key}"><label for="yes{$key}">{$cnf_langs.t3}</label>
											<input type="Radio" name="fld_{$i}_{$key}" value="false" {if !$value.value } checked {/if} id="no{$key}"><label for="no{$key}">{$cnf_langs.t4}</label>
									{/if}
									{if $value.info!='' }
										<a href="#" class="hintanchor" onMouseover="showhint('{$value.info}', this, event, '200px')">[?]</a>
									{/if}
									</div></td></div>
								</tr>
							{else}
								{if $key == 848}
									<tr>
									<td colspan="2" width="100%"><div id="inner_div_{$i}" style="display:{$dis};"><table border="0" width="100%">
								{/if}
									<tr>
									<td width="40%"><b>{$value.title}</b></td>
									<td width="60%">
										<div style="white-space: nowrap; ">
										<input type="Hidden" name="type_{$i}_{$key}" value="{$value.type}">
										<input type="Hidden" name="name_{$i}_{$key}" value="{$value.title}">
										<input type="Hidden" name="field_{$i}_{$key}" value="{$value.level_1}">
									{if $value.type == 'integer'}
										<input type="Text" size="5" name="fld_{$i}_{$key}" value="{$value.value}">
									{/if}
									{if $value.info!='' }
										<a href="#" class="hintanchor" onMouseover="showhint('{$value.info}', this, event, '200px')">[?]</a>
									{/if}
									</div></td></div>
								</tr>
								{if $key == 851}
									</table></div></td></tr>
								{/if}
							{/if}
						{/if}
						{if $smarty.foreach.values.last == "true"}
							{$xml[$smarty.foreach.fields.index]}
							</div></table>
						{/if}
				{/foreach}

		</TD>
	</TR>
	<TR>
		<TD colspan="3"><HR size="1"></TD>
	</TR>
{/foreach}
	<TR>
		<TD colspan="3"></TD>
	</TR>
	<TR>
		<TD colspan="3" align="center">
			<input type="Submit" name="sub_save" value="{$cnf_langs.t6}">
		</TD>
	</TR>
</TABLE>

</FORM>
{/if}