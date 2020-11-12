<?php


  include_once(INC_DIR.'common.php');
  /*if (!isset($_SESSION['session_inst'])) {

    $_SESSION['session_inst'] = 1;
    $_SESSION['session_inst_name'] = 'Default'; // added on 090706 for chat instances

  }

  $path = dirname(__FILE__) . '/../temp/appdata/' . $GLOBALS['filename'] . '_' . $_SESSION['session_inst'] . '.php';
  include_once($path);
*/

  $GLOBALS['filename'] = 'badwords';
  //$GLOBALS['force_config'] = true;
  include (INC_DIR.'get_config.php');
?>