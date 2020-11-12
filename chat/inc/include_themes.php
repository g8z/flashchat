<?php
  $pathThemes = INC_DIR . "themes";
  $d = dir($pathThemes);
  while (false !== ($entry = $d->read())) {
    $fileInfo = pathinfo($pathThemes . '/' . $entry);

    if ('php' == $fileInfo['extension']) {
      include_once($pathThemes . '/' . $entry);
      $name = $fileInfo['filename'];
      if (!$GLOBALS['fc_config']['themes'][$name]['name']) {
        unset($GLOBALS['fc_config']['themes'][$name]);
      }
    }
  }
?>