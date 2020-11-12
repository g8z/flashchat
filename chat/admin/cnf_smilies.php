<?php
//all necessary fields on page

// process form submit
//----------
if( $_POST['submit'] )
{
	//echo "APPDATA_DIR.config_$_SESSION[session_inst].php";exit;
	$fld = getPOSTfields('fld_');
	$disabled = getPOSTfields('disabled_');
	$order = getPOSTfields('order_');

	//validator rule
	//greate array $valid_rule
	$valid_rule = array();
	foreach($fld['err'] as $k => $v)
	{
		if ( $fld['err'][$k]['type'] == 'string')
		{
			$valid_rule[$k][0] = 'alfanum';
			$valid_rule[$k][1] = 1;
			$valid_rule[$k][2] = $fld['err'][$k]['name'];
		}
	}


	$errMsg = '';
	reset($fld);
	foreach($fld['err'] as $k => $v)
	{
		if( isset($valid_rule[$k]) )
		{
			$errMsg = value_validator($v['value'],$valid_rule[$k],$valid_rule[$k]['name']);
			if($errMsg != '')
			{
				break;
			}
		}
	}


	if($errMsg == '')
	{
		foreach($fld['ins'] as $k => $v)
		{
			$sql = "UPDATE {$GLOBALS['fc_config']['db']['pref']}config_values
					SET value = ?,
						disabled = ?
					WHERE config_id = ?
					AND instance_id = ?
					LIMIT 1";
			$stmt = new Statement($sql, 406);
			$f = $stmt->process($v, $disabled['ins'][$k], $k, $_SESSION['session_inst']);

			$sql = "UPDATE {$GLOBALS['fc_config']['db']['pref']}config SET _order = ? WHERE id = ? LIMIT 1";
			$stmt = new Statement($sql, 439);
			$f = $stmt->process($order['ins'][$k], $k);
		}
	}
	unlink(APPDATA_DIR . 'config_' . $_SESSION['session_inst'] . '.php');
}

//-------------------------------
$sql = "SELECT {$GLOBALS['fc_config']['db']['pref']}config.*,
			{$GLOBALS['fc_config']['db']['pref']}config_values.value,
			{$GLOBALS['fc_config']['db']['pref']}config_values.disabled
		FROM {$GLOBALS['fc_config']['db']['pref']}config,
			{$GLOBALS['fc_config']['db']['pref']}config_values
		WHERE {$GLOBALS['fc_config']['db']['pref']}config.parent_page = ?
			AND {$GLOBALS['fc_config']['db']['pref']}config.id = {$GLOBALS['fc_config']['db']['pref']}config_values.config_id
			AND {$GLOBALS['fc_config']['db']['pref']}config_values.instance_id = ?
		ORDER BY _order;";
$stmt = new Statement($sql, 405);
$f = $stmt->process($module, $_SESSION['session_inst']);

//populate array with values
$fields = array();
while($v = $f->next())
{
	$fields[$v['id']] = $v;
	$fields[$v['id']]['value'] = addslashes($fields[$v['id']]['value']);
	$fields[$v['id']]['comment'] = addslashes($fields[$v['id']]['comment']);
	$fields[$v['id']]['_order'] = addslashes($fields[$v['id']]['_order']);	$_order[] = addslashes($fields[$v['id']]['_order']);
	$fields[$v['id']]['info'] = $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_'.$module]['t'.$v['id']]['hint'];
	if ( $_POST['submit'] && $errMsg != '' )
	    $fields[$v["id"]]['value'] = $fld['err'][$v["id"]]['value'];
}
//--- assign Smarty values
$smarty->assign('cnf_langs',$GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_smilies']);
$smarty->assign('fields', $fields);
$smarty->assign('_order', $_order);
$smarty->assign('errMsg', $errMsg);
//echo "<pre>";print_r($fields);echo "</pre>";
?>