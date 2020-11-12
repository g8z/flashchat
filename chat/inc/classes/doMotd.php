<?php

				$rfile = './temp/appdata/motd.txt';


				if(file_exists($rfile) && $php_file = @fopen($rfile, 'rb')) {
					$contents = fread($php_file, $fz = filesize ($rfile));
					fclose ($php_file);

					$contents = str_replace( chr(13) . chr(10) , '<br>', $contents); // replace crlf with line breaks
					$contents = str_replace( chr(10) . chr(13) , '<br>', $contents); // replace lfcr with line breaks
					$rtxt = explode('<br>', $contents);

					foreach($rtxt as $k => $v)
						$this->sendToUser(null, new Message('msg', $this->userid, $GLOBALS['fc_config']['liveSupportMode']?$this->roomid:null, $v, $this->color));
				}
?>