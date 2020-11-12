<?php

///---------------http://64.236.34.97:80/stream/1006--------------------///

	$url = urldecode($_GET["url"]);
//	$url = urldecode("http%3A%2F%2F205%2E188%2E234%2E38%3A8016");
//	$url = urldecode("http://kanga.college.columbia.edu:8000/");


	$tmp = parse_url($url);

	$streamname = $tmp["host"]; // put in whatever stream you want to play

	$port = (int)($tmp["port"]); // put in the port of the stream
	$path = $tmp["path"]; // put in any extra path, this is usually just a /
	if(empty($path)) $path = "/";
/*
		$fp = fopen("log.log","w");

	fwrite($fp,"$url\n");

fwrite($fp,$streamname."----------".$path."-------------".$port."\n");
	fclose($fp);*/

//	print $streamname."----------".$path."-------------".$port;

	header("Content-type: audio/mpeg");

	$sock = fsockopen($streamname,$port);

	fputs($sock, "GET $path HTTP/1.0\r\n");
	fputs($sock, "Host: $streamname\r\n");
	fputs($sock, "User-Agent: WinampMPEG/2.8\r\n");
	fputs($sock, "Accept: */*\r\n");
	fputs($sock, "Icy-MetaData:0\r\n");

	fputs($sock, "Connection: close\r\n\r\n");

	fpassthru($sock);

	fclose($sock);
?>