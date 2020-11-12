<script type="text/javascript" src="../prototype.js"></script>
<script type="text/javascript">
<!--
	function uploaded(path, id) {
		$(id).value = '../../../' + path;
	}
//-->
</script>
<?php
require_once('xml2array.php');
require_once('cnf_module_xml_information.php');
require_once('cnf_module_xml_functions.php');



function getModuleXml($all_modules, $rootPath) {
	$modules = array();
	$info = getModuleInformation();
	foreach($all_modules as $i => $mod) {
		$rootName = '';
		$curInfo = null;
		foreach ($info as $modName => $modInfo) {
			if (strpos(strtolower($mod[1]), $modName)) {
				$curInfo = $modInfo;
				break;
			}
		}
		$GLOBALS['labelIndex'] = 1;
		$GLOBALS['curInfo'] = $curInfo;
		$path = substr($mod[1],0, strrpos($mod[1], '/'));
		$pathForAjax = $path.'/'.$curInfo['config'];
		$filePath = $rootPath.'temp/'.$path.'/'.$curInfo['config'];
		$contents = file_get_contents($filePath);
		$result = xml2array($contents);

		$keys = array_keys($result);
		$rootName = $keys[0];
		$result = $result[$rootName];
//		echo '<pre>';print_r($result);
		$frmIndex = $i+1;
		$modules[$i] .= "
			<tr>
				<td colspan='2'>
					<b>{$curInfo['config']}</b>
					<div id='frmModule{$frmIndex}'>
						<input type='hidden' value='{$pathForAjax}' name='modulePath'>
						<table width='100%' class='body_table' border='0' style='border-width: 0px;'>";
		$GLOBALS['showDeleteButton'] = false;
		foreach ($result as $k=>$r) {
			$modules[$i].=showFields($k,$r, $result, '', null);
		}
		$modules[$i] .= "	<tr>
								<td colspan='2' align='right'>
									<br>
									<input type='button' onclick='saveXml(\"{$frmIndex}\");' value='Save changes'>
								</td>
							</tr>
						</table>
					</div>
				</td>
			</tr>";
		$modules[$i] .= "
			<tr>
				<td colspan='2'>
					<div id='moduleOutput$frmIndex'></div>
				</td>
			</tr>";



		//////////////////////////
		if ($curInfo['settings']) {

			$filePath = $rootPath.'temp/'.$path.'/'.$curInfo['settings'];
			$pathForAjax = $path.'/'.$curInfo['settings'];
			$contents = file_get_contents($filePath);
			$result = xml2array($contents);

			$keys = array_keys($result);
			$rootName = $keys[0];
			$result = $result[$rootName];
//			echo '<pre>';print_r($result);
			$modules[$i] .= "
				<tr>
					<td colspan='2'>
						<b>{$curInfo['settings']}</b>
						<div id='frmModule{$frmIndex}settings'>
							<input type='hidden' value='$pathForAjax' name='modulePath'>";

			foreach ($result as $k=>$r) {
				$modules[$i].=	"<table width='100%' class='body_table' style='border-width: 0px;' id='tbl$k'>";
				$GLOBALS['showDeleteButton'] = true;
				$modules[$i].=showFields($k,$r, $result, '', null);
				if ('_attr' != substr($k, -5) && !$GLOBALS['showDeleteButton']) {
					$modules[$i] .= "
								<tr>
									<td colspan='2' align='right'>
										<input type='button' value='Delete' onclick='deleteXml(\"$k\")'>
									</td>
								</tr>
					";
				}
				$modules[$i].=	"</table>";
			}

			$modules[$i].=	"<table width='100%' class='body_table' style='border-width: 0px;'>
								<tr>
									<td colspan='2' align='right'>
										<div id='moduleAdd{$frmIndex}settings'></div>
										<br>
										<input type='button' onclick='saveXml(\"{$frmIndex}settings\");' value='Save changes'>
										<input type='button' onclick='addXml(\"{$frmIndex}settings\");' value='Add'>
									</td>
								</tr>
							</table>
						</div>
					</td>
				</tr>";
			$modules[$i] .= "
				<tr>
					<td colspan='2'>
						<div id='moduleOutput{$frmIndex}settings'></div>
					</td>
				</tr>";
		}

	}
	return $modules;
}
?>