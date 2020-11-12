<?php

require_once('init.php');

if(!inSession()) {
	include('login.php');
	exit;
}
if(!ChatServer::userInRole($_SESSION['userid'], ROLE_ADMIN))
{
 include('nopermit.php');
	exit;
}
if($_POST['form1'] == 'update')
{
 foreach($_POST as $key=>$value)
 {
  $rec_name_array = explode("_",$key);
  $rec_id = $rec_name_array[1];
  if($rec_id != '')
  {
     $query = "update {$GLOBALS['fc_config']['db']['pref']}config_main set value = '$value' where id = $rec_id";
      //echo $query."<br>";
      mysql_query($query);
  } 
 
 }//foreach($_POST as $key=>$value)
 $smarty->assign( 'fc_msg', "Main Settings Updated" );
} //if($_POST['form1'] == 'update')

$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'config_main',1);

$rs = $stmt->process();
$main_records = array();
while($main_records[] = $rs->next())
{
	
}//while($rec = $rs->next())
array_pop($main_records);


//Assign Smarty variables and load the admin template

$smarty->assign( 'self_url', $_SERVER['PHP_SELF'] );

$smarty->assign('main_records',$main_records);
$smarty->display('admin_main.tpl');

?>
