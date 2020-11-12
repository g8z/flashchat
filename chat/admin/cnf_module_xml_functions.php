<?php
	function showFields($key, $val, $parent, $path, $keyIndex) {
		$k = substr($key, 0, strlen($key)-5);
		$isAttr = ('_attr' == substr($key, -5));
		if ($isAttr) {
			if (!array_key_exists($k, $parent)) {
				$isAttr = false;
				$key = $k;				
			}
		}
		
		$keyToDisplay = $key;
		$keyShort = null;
		$curInfo = $GLOBALS['curInfo'];
		$origKey = $key;
		
		if ($curInfo) {
			foreach ($curInfo['labels'] as $regExp => $label) {
				if (preg_match($regExp, $key)) {
					if ($keyIndex && strpos($regExp, '0-9')) {
						
						$key = preg_replace('/(_[0-9]+)$/', "_$keyIndex", $key, 99, $cnt);
						if (!$cnt) {
							$key = $key."_$keyIndex";
						}
					}
					
					$keyToDisplay = $label[1];
					
					if ('' != $label[0]) {
						$keyShort = $label[0];
					}
					$keyToDisplay = str_replace('[I]', $GLOBALS['labelIndex'], $keyToDisplay, $cnt);
					if (!$isAttr) {
						$GLOBALS['labelIndex'] += $cnt;
					}
					break;
				}
			}
		}
		if (null === $keyShort) {
			$keyShort = $keyToDisplay;
		}
		
		$res = '';
		if ($isAttr) {
			return;
		}
		
		$aks = array();
		if (array_key_exists($origKey.'_attr', $parent)) {
			foreach ($parent[$origKey.'_attr'] as $ak =>$attr) {
				$val[$ak] = $attr;
				$aks[] = $ak;
			}
		}
		$keyToDisplay = addslashes($keyToDisplay);
		if (is_array($val)) {
//			$res .= "<tr><td colspan='2'>".$keyToDisplay."</td></tr>";
			foreach ($val as $k=>$v) {
				$nextPath = $key;
				if (in_array($k, $aks)) {
					$nextPath .= '_attr';
				}
				$res .= showFields($k,$v,$val,$nextPath.'--',$keyIndex);
			}
			$res .= "";
		}
		else {
			$value = ($keyIndex) ? '' : $val;
			$res .= "
				<tr>
					<td>".$keyShort."</td>
					<td width='70%' align='right'>";
			if (in_array($val, array('true', 'false'))) {
				$res .= "<select name='$path--$key'  style='width: 200px'><option value='true'"; 
				$res .= ('true' == $value)? "selected" : ''; 
				$res .= ">True</option><option value='false'"; 
				$res .= ('false' == $value)? "selected" : '';
				$res .=	">False</option></select>";
			}
			elseif (in_array($val, array('on', 'off'))) {
				$res .= "<select name='$path--$key'  style='width: 200px'><option value='on'"; 
				$res .= ('on' == $value)? "selected" : ''; 
				$res .= ">On</option><option value='off'"; 
				$res .= ('off' == $value)? "selected" : '';
				$res .=	">Off</option></select>";
			}
			else {
				$res .= "	<input type='text' name='$path--$key' id='$path--$key' value=\"{$value}\"  style='width: 200px'>";
			}
			if ($path == '' && $GLOBALS['showDeleteButton']) {
				$res .= "
					<input type='button' value='Delete' onclick='deleteXml(\"$key\")'>
				";
			}
			else {
				$GLOBALS['showDeleteButton'] = false;
			}
			$res .= "	<a href='#' class='hintanchor' onMouseover='showhint(\"$keyToDisplay\", this, event, \"200px\")'>[?]</a>";
			
			$res .= "
					</td>
				</tr>";
			if ('src' == $key && $GLOBALS['showUpload']) {
				$tmp = explode('/', $_SERVER['PHP_SELF']);
				array_splice($tmp, -2);
				
				$servPath = implode('/', $tmp);
				$res .="
					<tr><td colspan='2' align='center'><br/>
					<object type='application/x-shockwave-flash' 
						data='../upload.swf' 
						id='upload$keyIndex') height='118' width='263'>
						<param name='movie' value='../upload.swf'>
						<param name='FlashVars' value='elid=$path--$key&amp;path=$servPath'>
						<param name='quality' value='high'>						
					</object><br/><br/>
					</td></tr>";
			}
			if (false !== strpos("$path--$key", 'fcs') || false !== strpos("$path--$key", 'server')) {
				$res .= '<tr><td colspan="2" align="right"><input type="button" value="Test connection" onclick="updateServer($F(\''.$path.'--'.$key.'\'))"></td></tr>';
			} 
		}
		return $res;
	}
?>