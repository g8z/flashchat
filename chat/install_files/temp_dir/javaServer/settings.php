<?php
require_once( 'config.socketSrv.php' );

$xml = "<socketServer";
$str = "";
foreach( $GLOBALS['fc_config']['socketServer'] as $key=>$val )
	$str = $str." $key=\"$val\" ";

$xml = $xml.$str."errorReports=\"".$GLOBALS['fc_config']['errorReports']."\" />";//errorReports

echo $xml;

?>