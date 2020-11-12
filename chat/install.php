<?php
require('FirePHPCore/fb.php');
//function fb(){}

@session_start();
ini_set('memory_limit', '32M');
ini_set('magic_quotes_runtime', 0);
ini_set('magic_quotes_sybase', 0);

if( isset($_REQUEST['step']) )
{
	$_SESSION['step_install'] = $_REQUEST['step'];
}
else
{
	$_SESSION['step_install'] = 1;
}

if( !$_SESSION['step_install'] || $_SESSION['step_install']<0 || $_SESSION['step_install']>8 || !is_numeric($_SESSION['step_install']) )
{
	$_SESSION['step_install'] = 1;
}
if($_SESSION['step_install'] == 1)
{
	unset($_SESSION['cache_type']);
	unset($_SESSION['forcms']);
	unset($_SESSION['rand_num']);
	unset($_SESSION['chachePath']);
	unset($_SESSION['usecms']);

}
include './install_files/consts.php'; 	// Constants
include './install_files/funcs.php';	// Needed functions

if( $_SESSION['step_install'] > 2 )
{
	include './inc/common.php';

	include_once './inc/config.php';		// FlashChat config
}

if(isset($_SESSION['forcms']))
{
	//FIX BY VERONICA
	if($_SESSION['step_install'] == '3')
	{
		$_SESSION['step_install'] = '3.5';
		// fix by artemK0, fixed VERONICA's fix:)
		addFontsToConfig($GLOBALS['fc_config']['db']['pref'], $_SESSION['session_inst'], $GLOBALS['fc_config']['cacheType'], $GLOBALS['fc_config']['cachePath'], $GLOBALS['fc_config']['cacheFilePrefix']);
		// end
	}
	$step = $_SESSION['step_install'];
	//END-OF-FIX
}

include './install_files/step_'.$_SESSION['step_install'].'.php';

?>