<?php
    require_once(INC_DIR . 'classes/fc_languages.php');

	$lang_option = 'option';
	$smarty->assign('cnf_langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['cnf_languages']);
    $fc_lang_admin = new fc_lang_admin($_POST);
	$smarty->assign('fc_languages', $fc_lang_admin->langs);
	$smarty->assign('languages', array_values($fc_lang_admin->langs));
	$rowcount = count($fc_lang_admin->langs) + 1;
	$smarty->assign('rowcount', $rowcount);
	$smarty->assign('lang_option', $lang_option);
?>