<?php
	ob_start();

	$GLOBALS['my_file_name'] = 'preloader_settings.php';

	require_once('inc/common.php');

	$showBackground = $GLOBALS['fc_config']['themes'][$GLOBALS['fc_config']['login']['theme']]['showBackgroundImages'];
  $GLOBALS['fc_config']['preloader']['backgroundImage'] = ($showBackground) ? $GLOBALS['fc_config']['themes'][$GLOBALS['fc_config']['login']['theme']]['backgroundImage'] : '';
  $GLOBALS['fc_config']['preloader']['background'] = $GLOBALS['fc_config']['themes'][$GLOBALS['fc_config']['login']['theme']]['background'];

	header('Pragma: public');
	header('Expires: 0');
	header('Content-type: text/xml');

?>

<preloader_settings <?php echo array2attrs($GLOBALS['fc_config']['preloader'])?> pageTitle="<?php echo $GLOBALS['fc_config']['pageTitle']?>">
	<text <?php echo array2attrs($GLOBALS['fc_config']['preloader']['text'])?>/>
</preloader_settings>
<?php
	ob_end_flush();
?>