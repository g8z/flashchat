<?php
	$GLOBALS['my_file_name'] = 'js';
	include('inc/common.php');
?>
	connid = 0;
	var isUnlogged = false;

	function flashchat_DoFSCommand()
	{
	}

	function setFocus()
	{
		window.focus();
		var chatui = document.getElementById('flashchat');
		if(chatui && chatui.focus) chatui.focus();
	}

	function doLogout()
	{
		<?php
			if($GLOBALS['fc_config']['logout']['redirect'] && $GLOBALS['fc_config']['logout']['window']=='_blank')
			{
				printf("window.open('{$GLOBALS['fc_config']['logout']['url']}', '{$GLOBALS['fc_config']['logout']['window']}');");
			}
		?>

		if(connid == 0) return;

		<?php if(!$GLOBALS['fc_config']['enableSocketServer'])
				if($GLOBALS['fc_config']['showLogoutWindow']) { ?>
				   	width = 220;
					height = 30;

					wleft = (screen.width - width) / 2;
					wtop  = (screen.height - height) / 2 - 20;

					window.open("<?php printf($GLOBALS['fc_config']['base']) ?>dologout.php?id=" + connid, "logout", "width=" + width + ",height=" + height + ",left=" + wleft + ",top=" + wtop + ",location=no,menubar=no,resizable=no,scrollbars=no,status=no,toolbar=no");
		<?php } else { ?>
					img = new Image();
					img.src = "<?php printf($GLOBALS['fc_config']['base']) ?>dologout.php?seed=<?php printf(time()) ?>&id=" + connid;
		<?php } ?>
	}

	function setConnid(newconnid)
	{
		connid = newconnid;
	}


	//------------------------------------------------------------------------------------------------
	////add 19.09.2007 ajax logout flashchat(close browser, refresh)
	//------------------------------------------------------------------------------------------------
		function SendLogout()
		{
			if(connid == 0) return;

			var rand = Math.floor(Math.random()*10000000000);
			var data = "rand=" + rand + "&id=" + connid;

			var xmlHttp = null;
			if (window.XMLHttpRequest)
			{
				//создание объекта для всех браузеров кроме IE
		    	xmlHttp = new XMLHttpRequest();
    		}
			else
			{
				if (window.ActiveXObject)
				{
    				//для IE
        			xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
			        if(!xmlHttp)
					{
			        	xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			        }
			    }
    		}

			xmlHttp.open("POST", "ajax_logout.php?" + data, false);
			xmlHttp.send(data);
		}

	// Disabled window.onload (Setfocus) For Compatibility Reasons With IE8
        // Also Was Disabled For Compatibility With Updated SWFObject
        // IE8 Throws Cant Move Focus Error

        //window.onload = setFocus;

	window.onunload = SendLogout;
	//------------------------------------------------------------------------------------------------
	////add 19.09.2007 ajax logout flashchat(close browser, refresh)
	//------------------------------------------------------------------------------------------------




	//------------------------------
	//---open share file window
	//------------------------------
	var win_popup = null;
	function openWindow( url, name, params, w, h )
	{
	     var ah = window.screen.availHeight;
         var aw = window.screen.availWidth;
         var l = (aw - w) / 2;
         var t = (ah - h) / 2;

         params += params == "" ? "" : ",";
         params += "left="+l+",top="+t+",screenX="+l+",screenY="+t+",height="+h+",width="+w+",resizable=yes,status=yes,scrollbars=no";

         //close previous opened popup
         if (win_popup && win_popup.open && !win_popup.closed)
         {
            win_popup.close();
         }
         //---
	     win_popup = window.open( "", name, params );
	     win_popup.location.href = url;
	}
	//--- end open window function
	/*
	function fileDownload(fname)
	{
		if(window.frames['dataframe'].window && fname)
		{
			window.frames['dataframe'].window.location.href = fname;
		}
		else
		{
			alert('File download error.');
		}
	}*/