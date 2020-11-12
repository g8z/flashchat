<?php

/*$stmt = new Statement("INSERT INTO {$GLOBALS['fc_config']['db']['pref']}rooms (created, name, password, ispublic) VALUES (NOW(), ?,?,?)");

$id       = $stmt->process($label, $pass, (($isPublic)?'y':null));*/
//changed on 090706 for chat instances
//check
$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms',65);
$roomCnt = 0;
if($rs = $stmt->process()) {
  while($rec = $rs->next()) {
    if ('y' == $rec['ispublic']) {
      $roomCnt++;
    }

  }
}
if ($isPublic && !$GLOBALS['fc_config']['liveSupportMode'] && $roomCnt >= $GLOBALS['fc_config']['commands']['maxRooms']) {
  $this->sendBack(new Message('error', null, null, 'maxRooms'));
  return;
}
$stmt = new Statement('INSERT INTO '.$GLOBALS['fc_config']['db']['pref'].'rooms (created, name, password, ispublic, instance_id) VALUES (NOW(), ?,?,?,?)', 58);
$id = $stmt->process($label, $pass, (($isPublic)?'y':null), $this->session_inst);
//changed on 090706 for chat instances ends here

$msg = new Message('adr', null, $id, $label);
$msg_lock = new Message('srl', null, $id, 'true');
if($isPublic)
{
	$this->sendToAll($msg);
	if($pass != '')
	{
		$this->sendToAll($msg_lock);
	}
}
else
{
	$this->sendBack($msg);
	if($pass != '')
	{
		$this->sendBack($msg_lock);
	}
}

return $id;

?>