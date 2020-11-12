<?php
	function toLog($title, $str)
	{
		return;
		$fname = 'log.txt';
		if( (!is_writable( $fname ) && file_exists( $fname )) || !is_writable( '.' ) ) return;

		$fp = @fopen($fname,"a");
		@fwrite($fp,"\n//-----------------------------------------------------");
		@fwrite($fp,"\n//----$title");
		@fwrite($fp,"\n//-----------------------------------------------------");

		if( is_array( $str ) )
		{
			ob_start();
			print_r( $str );
			$str = ob_get_contents();
			ob_end_clean();
		}

		@fwrite ( $fp,"\n".$str);
		@fclose( $fp );
	}

	function BadWordAmount($inputString,$badwords_arr) {

			$replace_pairs = array( "&lt;" => " &lt;",
									"&gt;" => "&gt; "
									);
			$inputString = strtr ( $inputString, $replace_pairs);

			$pattern = array();
			$replacement = array();
			$amount = 0;

			$keys = array_keys($badwords_arr);
			for($i = 0; $i <  count($keys); $i++)
			{
				if(is_numeric($keys[$i]))
				{
					$badword = $badwords_arr[$keys[$i]];
				}
				else
				{
					$badword = $keys[$i];
				}

				$badword = str_replace('*', '.?', $badword);
				if(substr($badword, 0, 1) != '.') $badword = '(^|\s+)'.$badword;
				if(substr($badword, -1) != '?') $badword = $badword.'($|\s+)';
				$pattern[$i] = '/'.$badword.'/i';

				$count = preg_match_all($pattern[$i],$inputString,$matches);
				$amount += $count;

			}
			return $amount;
		}

	$badwords_arr = explode("|",$_POST["badwords"]);
	$message = $_POST["message"];

	$amount = BadWordAmount($message,$badwords_arr);

	print $amount;
?>