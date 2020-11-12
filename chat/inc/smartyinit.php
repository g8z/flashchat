<?php

define('SMARTY_DIR', dirname(__FILE__) . '/smarty/');// prevent redefine Smarty from CMS

$GLOBALS['my_file_name'] = 'smartyinit';

require_once(dirname(__FILE__).'/common.php');

if( ! class_exists('Smarty')  )
{
	require_once(INC_DIR . 'smarty/Smarty.class.php');
}

$smarty = new Smarty;

//smarty config
$smarty->compile_check = true;
$smarty->debugging     = false;
$smarty->caching 	   = false;
//$smarty->force_compile = true;
$smarty->cache_dir     = INC_DIR . $GLOBALS['fc_config']['cachePath'];
$smarty->template_dir  = INC_DIR . '../templates';
$smarty->compile_dir   = INC_DIR . '../temp/templates/templates_c';

$smarty->assign('rand','rnd='.rand());

if( ! headers_sent() )
{
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');
}

?>