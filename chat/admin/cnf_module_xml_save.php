<?php

	require_once('xml2array.php');
	require_once('array2xml.php');
	$fileName= '../temp/'.$_POST['modulePath'];
	$contents = file_get_contents($fileName);

	$deleted = explode(';', $_POST['deleted']);

	unset($_POST['modulePath']);
	unset($_POST['deleted']);
	$result = xml2array($contents);

	$keys = array_keys($result);
	if (!$keys[0]) {
		echo '--';
		die();
	}
	define('ROOT_NAME', $keys[0]);
	$result = array();//
	foreach ($_POST as $key=>$param) {
		$isDeleted = false;

		foreach ($deleted as $del) {
			if ('' != $del && (false !== strpos($key, $del.'--') || false !== strpos($key, $del.'_attr--') || $del == substr($key, -strlen($del)))) {
				$isDeleted = true;
			}
		}
		if (!$isDeleted) {
			if ('' == $param) {
				$param = 'null';
			}
			$path = explode('--', $key);
			$ref = &$result;
			foreach ($path as $p) {
				if ('' != $p) {
					$ref = &$ref[$p];
				}
			}
			$ref = $param;
		}
	}
//	print_r($result);
	require_once('xml_writer_class.php');

//	$writer = new XmlWriterClass();
//	$writer->push('kkeky', array('asd'=>'1','bbb'=>'2'));
//	$writer->pop();
//	$xmlStr = $writer->getXml();
//	$writer->element($key, $val)

//	die();
	$converter = new Array2XML();
	$converter->setRootName(ROOT_NAME);
	//echo '<pre>';
	//print_r($result);
	$xmlStr = $converter->convert($result);

	@chmod($fileName, 0777);
    if (!$handle = fopen($fileName, 'w')) {
         echo "Cannot create file ($fileName)";
         exit;
    }

	if (fwrite($handle, $xmlStr) === FALSE) {
        echo "Cannot write to file ($fileName)";
        exit;
    }

    echo "Data was successfully saved to file ($fileName)";

    fclose($handle);

    //echo $xmlStr;
?>