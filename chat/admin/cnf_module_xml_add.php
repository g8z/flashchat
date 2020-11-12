<?php
	require_once('cnf_module_xml_information.php');
	require_once('cnf_module_xml_functions.php');
	require_once('xml2array.php');
	$module = substr($_REQUEST['modulePath'], 0);
	$info = getModuleInformation();
	$curInfo = null;
	foreach ($info as $modName => $modInfo) {
		if (strpos(strtolower($module), $modName)) {
			$curInfo = $modInfo;
			break;
		}
	}
	$GLOBALS['curInfo'] = $curInfo;
	
	$filePath = '../temp/'.$_REQUEST['modulePath'];
	$contents = file_get_contents($filePath);
	$dir = substr($filePath, 0, strrpos($filePath, '/'));
	
	$result = xml2array($contents);
	$keys = array_keys($result);
	$rootName = $keys[0];
	$result = $result[$rootName];
	
	$cnt = 0;
	foreach ($result as $k=>$r) {
		if ('_attr' != substr($k, -5)) {
			$cnt ++;
		}
	}
	$keyIndex = $cnt + $_POST['indexOffset'];
	$GLOBALS['labelIndex'] = $keyIndex + 1;
	$curPath = '';
	/*if (strpos($module, 'admin')) {
		$keys = array_keys($result);
		$curPath = $keys[0];
		$result = $result[$curPath];
	}*/
	
	$keys = array_keys($curInfo);
	foreach ($result as $k=>$r) {
		if ('radio' != $keys[0]) {
			$GLOBALS['showUpload'] = true;
		}
		$res = 	"<table width='100%' class='body_table' style='border-width: 0px;' cellspacing='0' cellspadding='0'>"
				.showFields($k,$r, $result, $curPath, $keyIndex);
				
		$res .= "
			</table>";
		break;
	}
	echo $res;
	
?>
