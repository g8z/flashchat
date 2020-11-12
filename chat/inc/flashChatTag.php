<?php
	function flashTag($id, $movie, $width = '100%', $height = '100%', $params = array(), $base = '') {
		$flashVars = array();

		foreach($params as $name => $value) {
			if($value) $flashVars[] = $name.'=' . urlencode($value);
		}
		
		$fv = join('&', $flashVars);
		
		//print_r($fv);
		$tag = '';
		//for file sharing
		//$tag .= '<div style="position:absolute;left:0px;top:0px;visibility:hidden;" id="datadiv"><iframe src="about:blank" height="0" width="0" name="dataframe"></iframe></div>';

		/*$tag .= '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" WIDTH="'.$width.'" HEIGHT="'.$height.'"  id="'.$id.'" ALIGN="">';
		$tag .= '<PARAM NAME="FlashVars" VALUE="'.$fv.'">';
		$tag .= '<PARAM NAME="movie" VALUE="'.$movie.'">';
		$tag .= '<PARAM NAME="quality" VALUE="high">';
		$tag .= '<PARAM NAME="menu" VALUE="true">';
		$tag .= '<PARAM NAME="scale" VALUE="noscale">';
		$tag .= '<PARAM NAME="salign" VALUE="LT">';
		$tag .= '<PARAM NAME="BASE" VALUE="'.$base.'">';
		$tag .= '<EMBED src="'.$movie.'" FlashVars="'.$fv.'" menu="false" quality="high" scale="noscale" salign="LT" WIDTH="'.$width.'" HEIGHT="'.$height.'" NAME="'.$id.'" ALIGN="" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer" BASE="'.$base.'"></EMBED>';
		$tag .= '</OBJECT>';
		*/
		$tag = '
		<script type="text/javascript" src="history/history.js"></script>
		<script type="text/javascript" src="history/history.css"></script>
		<script type="text/javascript" src="javascript/swfobject.js"></script>
		<script type="text/javascript">
			<!--
			var flashvars = false;
			var params = {};
			params.quality = "high";
			params.allowScriptAccess = "always";
			params.allowFullScreen= "true";
			params.bgcolor = "#FFFFFF";
			var attributes = {};
			attributes.id = "flashchat";
			attributes.name = "flashchat";
			swfobject.embedSWF("'.$movie.'?'.$fv.'", "'.$id.'", "'.$width.'", "'.$height.'", "9.0.0", false, flashvars, params, attributes);
			-->
        </script>';
		
		return $tag;
	}

	function flashChatTag($width, $height, $params = array(), $base = '') {
		
		$tag  = flashTag('flashchat', $base . 'chat.swf', $width, $height, $params, $base);
		$tag .= '<script type="text/javascript" src="' . $base . 'js.php"></script>';

		return $tag;
	}
?>