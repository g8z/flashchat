{literal}
<script type="text/javascript">
	function saveXml(id) {
		//parseStr
		var fid = 'frmModule'+id;
		var ts = '';
		$(fid).select('input, select').each(function (inp) {
			ts += inp.name + '=' + $F(inp)+'&';
		});
		ts  += 'deleted=' + deleted;
		$('moduleOutput'+id).update('Loading...');
		new Ajax.Updater('moduleOutput'+id, 'cnf_module_xml_save.php', {
			postBody: ts
		});
	}
	
	var offset = 0;
	var deleted = '';
	function deleteXml(id) {
		if (confirm('Delete this record? To apply changes click the "Save" button')) {
			$('tbl'+id).hide();
			deleted += id+';';
		}
	}
	
	function addXml(id) {
		var fid = 'frmModule'+id;
		var ts = '';
		$(fid).select('input, select').each(function (inp) {
			ts += inp.name + '=' + $F(inp)+'&';
		});
		ts += 'indexOffset=' + offset;
		offset++;
		new Ajax.Updater('moduleAdd'+id, 'cnf_module_xml_add.php', {
			postBody: ts, insertion: Insertion.Bottom
			
		});
	}
	
</script>
<script src="../prototype.js"></script>
{/literal}