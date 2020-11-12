<?php
	$uplDir = 'temp/';
	$f = $_FILES['file'];
	$fname = $f['name'];
	@unlink($uplDir.$fname);
	@move_uploaded_file($f['tmp_name'], $uplDir.$fname);
	chmod($uplDir.$fname, 0444);
	if (file_exists($uplDir.$fname)) {
		die('ok-!@'.$fname);
	}
	else {
		echo "Can't save this file";
	}
//---------------------------------------------		
//---calculate max file size
//---------------------------------------------
	$post_max_size = ini_get('post_max_size') * 1024 * 1024;
	$upload_max_filesize = ini_get('upload_max_filesize') * 1024 * 1024;

	$maxSize =	min( $post_max_size, $upload_max_filesize) ;

	function convertSize( $size )
	{
		if( $size < 1024) return $size.' Bytes';
		if( $size > 1024*1024) return round($size/(1024*1024),2).' MB';

		return round($size/1024, 2).' KB';
	}

?>