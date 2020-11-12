<?php

header("Content-type: text/xml; charset=utf-8\r\n");
define('INC_DIR', '../../../inc/');
require(INC_DIR."badwords.php");

print "<bad_words_list>\n";

foreach( $GLOBALS['fc_config']['badWords'] as $badWord=>$val)
{
  print "\t<word>".$badWord."</word>\n";
}

print "</bad_words_list>";

?>