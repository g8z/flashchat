<?php

	header("Content-type: text/xml; charset=utf-8\r\n"); 
	
	require("../../inc/badwords.php");
	
	print "<bad_words_list>\n";
	
	for( $i=0; $i<count($GLOBALS['fc_config']['badWords']); $i++)
	{
		print "\t<word>".$GLOBALS['fc_config']['badWords'][$i]."</word>\n";
	}
	
	print "</bad_words_list>";

?>