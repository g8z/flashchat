<?php

class fc_lang_admin
{
  	var $langs = array();
  	var $langs_str = '';
  	var $config_ln_str = '';
  	var $update_order = false;
  	var $config_ln_path = '' ;
	var $config_order_path = '' ;

	function fc_lang_admin($new_order = array())
  	{
  		if(!isset($_SESSION['session_inst'])) $_SESSION['session_inst'] = 1;
		$this->config_ln_path = INC_DIR . './../temp/appdata/config_ln_'.$_SESSION['session_inst'].'.php';
		$this->config_order_path = INC_DIR . './../temp/appdata/lang_order_'.$_SESSION['session_inst'].'.php';
		$langs = array();

		if(file_exists($this->config_order_path))
		{
			include($this->config_order_path);
		}
		else
		{
			$this->update_order = true;
		}

		if(count($new_order) || (!file_exists($this->config_ln_path)) || (!file_exists($this->config_order_path)) || (count($langs) == 0))
		{
			$this->update_order = true;
		}
		if($this->update_order)
		{
			if($handle = opendir(INC_DIR . 'langs/'))
			{
				$files = array();
				while(false !== ($file = readdir($handle)))
				{
					if($file != '.' && $file != '..' && is_file(INC_DIR . 'langs/' . $file))
					{
						$files []= $file;
					}
				}
				closedir($handle);
			}
			$files = array_flip($files);
			$tmp = array_diff($files, $langs);
			$langs = array_merge($langs, $tmp);

			if(count($new_order) > 0)
			{
				foreach($new_order as $k => $v)
				{
					if(substr($k, -4) == '_php')
					{
						$key = $v - 1;
						$val = str_replace('_', '.', $k);
					}
				}
				$newVal = array_search($key, $langs);
				$langs[$newVal] = $key + 1;
				$langs[$val] = $key;
			}
			foreach($langs as $k => $v)
			{
				$tmp = array_keys($langs, $v);
				if(count($tmp) > 1)
				{
					$langs[$tmp[1]] = $langs[$tmp[1]] + 1;
				}
			}
		}
		asort($langs);
		$langs_str = '$langs = array(';

		foreach($langs as $v => $value)
		{
		 	$langs_str .= "'".$v."' => '".$langs[$v]."',\n";
		}
		$langs_str .= substr($langs_str, -1) . ');';
		$this->langs = $langs;
		$this->lang_str = $langs_str;

		if($this->update_order)
		{
			$this->write2file($this->config_order_path, $langs_str);
			$this->update_config_ln();
		}
	}

	function write2file($path, $str)
	{
		write2file($path, '<?php '.$str.' ?>');
	}

	function update_config_ln()
	{
		foreach($this->langs as $k => $v)
		{
			$this->config_ln_str .= "\n" . 'include_once(INC_DIR.\'langs/' . $k . '\');' . "\n";
		}
		$this->write2file($this->config_ln_path, $this->config_ln_str);
	}
}

?>