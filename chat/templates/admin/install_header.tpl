{include file=top_js_and_style.tpl}
<script language="javascript" src="prototype.js"></script>
{literal}
<SCRIPT type="text/javascript">
	var status = new Array(); 
	function showHide(id) {
		status[id] = !status[id];
		if (status[id]) {
			$(id).hide();
		}
		else {
			$(id).show();
		}
	}
</SCRIPT>
{/literal}