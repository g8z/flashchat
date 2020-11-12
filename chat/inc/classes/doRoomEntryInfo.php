<?php

$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'rooms WHERE id=?', 80);
$rs = $stmt->process($this->roomid);
$rec = $rs->next();

$rfile = './temp/appdata/';

if($rec['ispermanent'])
{
	$rfile .= trim($rec['name']) . '.txt';
}
else
{
	if($rec['ispublic'])
	{
		$rfile .= 'public_text.txt';
	}
	else
	{
		$rfile .= 'private_text.txt';
	}
}

if(file_exists($rfile) && $php_file = @fopen($rfile, 'rb'))
{
	$contents = fread($php_file, $fz = filesize ($rfile));
	fclose ($php_file);

	$user = ChatServer::getUser($this->userid);
	$contents = str_replace( 'ROOM_LABEL', trim($rec['name']), $contents);
	$contents = str_replace( 'USER_LABEL', trim($user['login']), $contents);
	$contents = str_replace( chr(13) . chr(10) , "<br>", $contents); // replace crlf with line breaks
	$contents = str_replace( chr(10) . chr(13) , "<br>", $contents); // replace lfcr with line breaks
	$rtxt = explode('<br>', $contents);

	foreach($rtxt as $k => $v)
	{
		$this->sendToUser($destination, new Message('msg', $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $v, $this->color));
	}
}

?>