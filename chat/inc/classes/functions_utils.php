<?php
function utf8CharToUnumber($str,$hex=0) {
	$ord=ord(substr($str,0,1));     // First char

	if (($ord & 192) == 192)        // This verifyes that it IS a multi byte string
	{
		$binBuf='';
		for ($b=0;$b<8;$b++)        // for each byte in multibyte string...
		{
			$ord = $ord << 1;       // Shift it left and ...
			if ($ord & 128)         // ... and with 8th bit - if that is set, then there are still bytes in sequence.
			{
				$binBuf.=substr('00000000'.decbin(ord(substr($str,$b+1,1))),-6);
			} 
			else break;
		}
		$binBuf=substr('00000000'.decbin(ord(substr($str,0,1))),-(6-$b)).$binBuf;
		$int = bindec($binBuf);
	}
	else $int = $ord;
	return $hex ? 'x'.dechex($int) : $int;
}

function utf8_to_entities($str) {
	$strLen = strlen($str);
	$outStr='';
	$buf='';
	for ($a=0;$a<$strLen;$a++) // Traverse each char in UTF-8 string.
	{       
		$chr=substr($str,$a,1);
		$ord=ord($chr);
		if ($ord>127) // This means multibyte! (first byte!)
		{       
			if ($ord & 64) // Since the first byte must have the 7th bit set we check that. Otherwise we might be in the middle of a byte sequence.
			{
				$buf=$chr;      // Add first byte
				for ($b=0;$b<8;$b++) // for each byte in multibyte string...
				{
					$ord = $ord << 1; // Shift it left and ...
					if ($ord & 128) // ... and with 8th bit - if that is set, then there are still bytes in sequence.
					{
						$a++;   // Increase pointer...
						$buf.=substr($str,$a,1);        // ... and add the next char.
					}
					else break;
				}
				$outStr.='&#'.utf8CharToUnumber($buf).';';
			} 
			else $outStr.=chr(127); // No char exists (MIDDLE of MB sequence!)
		} 
		else $outStr.=$chr;   // ... otherwise it's just ASCII 0-127 and one byte. Transparent
	}
	return $outStr;
}

function entities_to_utf8($str,$alsoStdHtmlEnt=0){
	if ($alsoStdHtmlEnt)
	{
		$trans_tbl = array_flip(get_html_translation_table(HTML_ENTITIES));
	}
	$token = md5(microtime());
	$parts = explode($token,ereg_replace('(&([#[:alnum:]]*);)',$token.'\2'.$token,$str));
	foreach($parts as $k => $v)
	{
		if ($k%2)
		{
			if (substr($v,0,1)=='#')       // Dec or hex entities:
			{
				if (substr($v,1,1)=='x') $v=hexdec(substr($v,2));
				$parts[$k] = UnumberToChar(substr($v,1));
			} 
			elseif ($alsoStdHtmlEnt && $trans_tbl['&'.$v.';']) 
			{  // Other entities:
				$parts[$k] = utf8_encode($trans_tbl['&'.$v.';'],'iso-8859-1');
			} 
			else        // No conversion:
			{
				$parts[$k] ='&'.$v.';';
			}
		}
	}
                 
	return implode('',$parts);
}

function UnumberToChar($cbyte)  {
	$str='';
         
	if ($cbyte < 0x80) {
		$str.=chr($cbyte);
	} else if ($cbyte < 0x800) {
		$str.=chr(0xC0 | ($cbyte >> 6));
		$str.=chr(0x80 | ($cbyte & 0x3F));
	} else if ($cbyte < 0x10000) {
		$str.=chr(0xE0 | ($cbyte >> 12));
		$str.=chr(0x80 | (($cbyte >> 6) & 0x3F));
		$str.=chr(0x80 | ($cbyte & 0x3F));
	} else if ($cbyte < 0x200000) {
		$str.=chr(0xF0 | ($cbyte >> 18));
		$str.=chr(0x80 | (($cbyte >> 12) & 0x3F));
		$str.=chr(0x80 | (($cbyte >> 6) & 0x3F));
		$str.=chr(0x80 | ($cbyte & 0x3F));
	} else if ($cbyte < 0x4000000) {
		$str.=chr(0xF8 | ($cbyte >> 24));
		$str.=chr(0x80 | (($cbyte >> 18) & 0x3F));
		$str.=chr(0x80 | (($cbyte >> 12) & 0x3F));
		$str.=chr(0x80 | (($cbyte >> 6) & 0x3F));
		$str.=chr(0x80 | ($cbyte & 0x3F));
	} else if ($cbyte < 0x80000000) {
		$str.=chr(0xFC | ($cbyte >> 30));
		$str.=chr(0x80 | (($cbyte >> 24) & 0x3F));
		$str.=chr(0x80 | (($cbyte >> 18) & 0x3F));
		$str.=chr(0x80 | (($cbyte >> 12) & 0x3F));
		$str.=chr(0x80 | (($cbyte >> 6) & 0x3F));
		$str.=chr(0x80 | ($cbyte & 0x3F));
	} else { // Cannot express a 32-bit character in UTF-8
		$str .= chr(127);
	}
	return $str;
}

?>