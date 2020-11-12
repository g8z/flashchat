<?php
// supportyn.php - Written by, Gene Wells
	$GLOBALS['my_file_name'] = 'supportyn';
	require_once('inc/common.php');

	$id = 'flashchat';
	$params = array();

	$open = false;

	if($GLOBALS['fc_config']['liveSupportMode']) {
		$stmt = new Statement('SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}connections WHERE userid IS NOT NULL',218);
		if($rs = $stmt->process()) {
			while($rec = $rs->next()) {
				if(ChatServer::userInRole($rec['userid'], ROLE_ADMIN) || ChatServer::userInRole($rec['userid'], ROLE_MODERATOR)) {
					$open = true;
				}
			}
		}
	}
	if ($open)
    {?>
        <img src="supportonline.gif" width="120" height="60" />
   <?php }else{ ?>
        <img src="supportoffline.gif" width="140" height="80" />
  <?php  }
?>