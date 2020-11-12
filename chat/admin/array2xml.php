<?php
class Array2XML {
	
	private $writer;
	private $version = '1.0';
	private $encoding = 'UTF-8';
	private $rootName = 'main';
	
	function __construct() {
		$this->writer = new XmlWriterClass();
	}
	
	public function convert($data) {
		//$this->writer->openMemory();
		//$this->writer->startDocument($this->version, $this->encoding);
		//$this->writer->startElement($this->rootName);
		$this->writer->push($this->rootName);
		if (is_array($data)) {
			$this->getXML($data);
		}
		//$this->writer->endElement();
		$this->writer->pop();
		//return $this->writer->outputMemory();
		return $this->writer->getXml();
	}
	
	public function setVersion($version) {
		$this->version = $version;
	}
	
	public function setEncoding($encoding) {
		$this->encoding = $encoding;
	}
	
	public function setRootName($rootName) {
		$this->rootName = $rootName;
	}
	
	private function getXML($data) {
		foreach ($data as $key => $val) {
			if ('_attr' == substr($key, -5)) {
				$k = substr($key,0,-5);
				$isAttr =  (!array_key_exists($k, $data));
				if ($isAttr) {
					$key = $k;
				}
				else {
					continue;
				}
			}
			
			$oldKey = $key;
			
			if (is_numeric($key)) {
				$key = 'key'.$key;
			}
			
			$tmp = explode('_', $key);
			$last = array_pop($tmp);
			if (intval($last) || '0' === $last) {
				$key = implode('_',$tmp);
			}
//			echo "<pre>";
//			print_r($data);
			if (is_array($val)) {
				/*$this->writer->startElement($key);
				if (array_key_exists($oldKey.'_attr', $data)) {
					$this->writeAttr($data[$oldKey.'_attr']);
				}
				
				$this->getXML($val);
				$this->writer->endElement();*/
				
				$attrs = array();
				if (array_key_exists($oldKey.'_attr', $data)) {
					$attrs = $data[$oldKey.'_attr'];
				}
//				print_r($key);
//				print_r($attrs);
				
				$this->writer->push($key, $attrs);
				if (!$isAttr) {
					$this->getXML($val);
				}
				$this->writer->pop();
				
			}
			else {
				//$this->writer->writeElement($key, $val);
				$this->writer->element($key, $val);
			}
		}
	}
	
	/*private function writeAttr($attr) {
		foreach ($attr as $attrKey => $attrValue) {
			$this->writer->writeAttribute($attrKey, $attrValue);
		}	
	}*/
}
//end of Array2XML.php