<?php

//===========================================================================================
//CFG  >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//===========================================================================================
$room_option = 'option';

//update rooms post array names
$room_name_post = 'room_name';
$room_password_post = 'room_password';
$room_public_post = 'room_public';
$room_permanent_post = 'room_permanent';
$room_order_post = 'room_order';
$room_identification_post ='room_id';
$room_delete_post = 'room_del';
$max_order_post = 'max_order';

// add room post
$new_room_name_post = 'name';

//===========================================================================================
//CFG  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
//===========================================================================================

require_once('init.php');

if(!inSession()) {
	include('login.php');
	exit;
}
else if(!inPermission('rooms'))
{
	$tabName = 'Rooms';
	include('nopermit.php');
	exit;
}
//--------------------------------
// highlight page. artemK0
//--------------------------------
$bold = highlightPage(__FILE__);
$smarty->assign($bold[0], $bold[1]);
if(!isset($_REQUEST['sort']) || isset($_REQUEST['clear'])) $_REQUEST['sort'] = 'none';

//===========================================================================================
//UPDATING DB <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
//===========================================================================================

$need_reorder = false;

if(isset($_REQUEST['submited']))
{
	if ( isset($_REQUEST[$room_identification_post]) && (count($_REQUEST[$room_identification_post])>0) )
	{
		$ids = &$_REQUEST[$room_identification_post];

		$need_reorder = true;
		foreach ($ids as $row => $id)
		{
			if (isset($_REQUEST["room_del"][$row]))
			{
				// delete row
				$query = 'DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id='.$id;
				$stmt1 = new Statement($query,69);
				$rs1 = $stmt1->process();
			}
			else
			{
				// update row
				if ( isset($_REQUEST[$room_name_post][$row]) )
				{
					// set new name
					$new_name = "'".$_POST[$room_name_post][$row]."'";
					// set new password
					$new_password = "'".$_POST[$room_password_post][$row]."'";
					// set ispumlic
					if ( isset($_REQUEST[$room_public_post][$row]) )
					{
						$new_ispublic = "'".'y'."'";
					}
					else
					{
						$new_ispublic = 'null';
					}
					// set permament
					if ( isset($_REQUEST[$room_order_post][$row])  )
					{

							$new_ispermanent = $_REQUEST[$room_order_post][$row];
					}
					else
					{
						if ( (isset($_REQUEST[$room_permanent_post][$row])) && (isset($_REQUEST[$max_order_post])) )
						{
							//permanent
							$_REQUEST[$max_order_post]++;
							$new_ispermanent = $_REQUEST[$max_order_post];
						}
						else
							$new_ispermanent = 'null';
					}

					$new_name = str_replace('?', ' ', $new_name);

					$query = 'UPDATE '.$GLOBALS['fc_config']['db']['pref'].'rooms'.' set name='.$new_name.', password='.$new_password.', ispublic='.$new_ispublic.', ispermanent='.$new_ispermanent.' WHERE id='.$id;

					$query_array[] = $query;

					$stmt = new Statement($query,79);
					$rs = $stmt->process();
				}
			}
		}
	}
}
if ( $need_reorder )
{
	$room_place = 1;
	$order_st = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'rooms SET ispermanent=? WHERE id=?',85);
	$stmt = new Statement('SELECT id FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE ispermanent IS NOT NULL ORDER BY ispermanent',78);
	$rs = $stmt->process();
	while($rec = $rs->next()) {
		$order_st->process($room_place, $rec['id']);
		$room_place++;
	}
}

//===========================================================================================
//UPDATING DB <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
//===========================================================================================

/*$stmt = new Statement("SELECT count(*) as maxnumb FROM {$GLOBALS['fc_config']['db']['pref']}rooms WHERE ispermanent IS NOT NULL");
if(($rs = $stmt->process()) && ($rec = $rs->next())) $maxnumb = $rec['maxnumb'];

$stmt = new Statement("SELECT count(*) as rowcount FROM {$GLOBALS['fc_config']['db']['pref']}rooms WHERE id > 0");
if(($rs = $stmt->process()) && ($rec = $rs->next())) $rowcount = $rec['rowcount']+1;

$stmt = new Statement("SELECT ispermanent FROM {$GLOBALS['fc_config']['db']['pref']}rooms ORDER BY ispermanent");
$rs = $stmt->process();
$row_nr = 1;
while($rec = $rs->next()) {
	if($rec['ispermanent']) $order_array[$row_nr] = $rec['ispermanent'];
	$row_nr++;
}

$stmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}rooms ORDER BY ispermanent");
$rs = $stmt->process();*/
//changed on 090706 for chat instances
$stmt = new Statement('SELECT count(*) as maxnumb FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE ispermanent IS NOT NULL AND instance_id=?',66);
if(($rs = $stmt->process($_SESSION['session_inst'])) && ($rec = $rs->next())) $maxnumb = $rec['maxnumb'];

$stmt = new Statement('SELECT count(*) as rowcount FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id > 0 AND instance_id=?', 67 );
if(($rs = $stmt->process($_SESSION['session_inst'])) && ($rec = $rs->next())) $rowcount = $rec['rowcount']+1;

$stmt = new Statement('SELECT ispermanent FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE  instance_id=? ORDER BY ispermanent',68);
$rs = $stmt->process($_SESSION['session_inst']);
$row_nr = 1;
while($rec = $rs->next($_SESSION['session_inst'])) {
	if($rec['ispermanent']) $order_array[$row_nr] = $rec['ispermanent'];
	$row_nr++;
}
//echo "<pre>";print_r($order_array);echo "</pre>";exit;
$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE  instance_id=? ORDER BY ispermanent',68);
$rs = $stmt->process($_SESSION['session_inst']);
//changed on 090706 for chat instances

$rooms = array();
$row_nr = 1;
while($rec = $rs->next()) {

	$temp_room 						= array();
	$temp_room['id']				= $rec['id'];
	$temp_room['row_nr']			= $row_nr;
	$temp_room['name']				= $rec['name'];
	$temp_room['password']			= $rec['password'];
	$temp_room['ispublic'] 			= $rec['ispublic']?'checked':'';
	$temp_room['ispermanent'] 		= $rec['ispermanent']?'checked':'';
	$temp_room['public_id'] 		= $room_public_post.'['.$row_nr.']';
	$temp_room['permanent_id'] 		= $room_permanent_post.'['.$row_nr.']';
	$temp_room['permanent_change'] 	= "javascript: perm_change($row_nr);";
	$temp_room['delete_id'] 		= $room_delete_post.'['.$row_nr.']';
	$temp_room['hidden_id'] 		= $room_identification_post.'['.$row_nr.']';

	if(is_array($order_array)){
		foreach($order_array as $num => $order){
			$value = $room_option.'['.$row_nr.']'.'['.$num.']';
			//echo $value;exit;
			$temp_room['ordersel'][$value] = $order;
		}
	}

	$row_nr++;
	array_push($rooms, $temp_room);
}

if ($_REQUEST['sort'] != 'none') {
	sort_table($_REQUEST['sort'], $rooms);
}
//echo "<pre>";print_r($room_option);echo "</pre>";exit;
//Assign Smarty variables and load the admin template

$smarty->assign('room_name_post',$room_name_post);
$smarty->assign('room_password_post',$room_password_post);
$smarty->assign('room_permanent_post',$room_permanent_post);
$smarty->assign('room_public_post',$room_public_post);
$smarty->assign('room_order_post',$room_order_post);
$smarty->assign('room_option',$room_option);
$smarty->assign('room_identification_post',$room_identification_post);
$smarty->assign('room_delete_post',$room_delete_post);
$smarty->assign('room_option',$room_option);
$smarty->assign('rowcount',$rowcount);
$smarty->assign('max_order_post',$max_order_post);
$smarty->assign('maxnumb',$maxnumb);
$smarty->assign('rooms',$rooms);
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['roomlist.tpl']);
$smarty->display('roomlist.tpl');
//echo "<pre>";print_r($rooms);echo "</pre>";exit;
?>