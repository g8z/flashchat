<?php
include_once('../inc/smartyinit.php');
$smarty->template_dir  = INC_DIR . '../templates/admin';


$image = $_REQUEST['image'];
$exents = substr($image,strpos($image,'.') + 1);
$patch = '../images/'.$image;

$smarty->assign('ext', $exents);
$smarty->assign('patch', $patch);
$smarty->display('cnf_view.tpl');
?>