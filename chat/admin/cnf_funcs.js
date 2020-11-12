//----------------------------------------------------------
//view information alert
//----------------------------------------------------------
function infoMsg( info )
{
	alert( info );
}
//----------------------------------------------------------
//
//----------------------------------------------------------
function ChangeValue( element)
{
		if ( element.value == 1 )
			element.value = 0;
		else
			element.value = 1;

}
function decision(message, url)
{
	if(confirm(message)) fwd(url);
}

function fwd(url)
{
	location.href = url;
}
//
//
//
function ValueExchange( first,second )
{
	first.value = second.value;
}
//
//
//
function bttnDis( element,text )
{
	element.disabled = true;
	text.disabled = false;

	if (text.style)
    {
         text.style.borderWidth = '2px';
         text.style.borderStyle = 'inset';
    }
    if (text.borderWidth)
    {
         text.borderWidth = '2px';
         text.borderStyle = 'inset';
    }
}
//-----------------------------------------------------------
//submit form
//-----------------------------------------------------------
function Send( form,val )
{
	form.change.value = val;
	form.submit();
}
//-----------------------------------------------------------
//send value
//-----------------------------------------------------------
function Send1( form1,number )
{
	form1.change.value = number;
}
//-----------------------------------------------------------
//verification extensions
//-----------------------------------------------------------
function onSubmit(msg,extens)
{
	extens = extens.toLowerCase();
	var val = document.cnf_form.file.value;
	var allowExt = ','+extens+',';
	if ( val == '' )//if value is NULL
	{
		alert( msg );
		return false;
	}
	else
	{

		var i = val.lastIndexOf('.');
		var ext = val.substring( i+1,val.length );
		ext = ext.toLowerCase();
		if ( allowExt.indexOf(','+ext+',') < 0 )
		{
			msg = 'The '+ext.toUpperCase()+' file extensions is not allowed. Please chose a file with one of these extensions:'+ extens.toUpperCase();
			alert( msg );
		}
		else
		{
			return true;
		}
		return false;
	}
}

//----------------------------------------------------------
//representation image
//----------------------------------------------------------
function openWindow( url, name, params, w, h )
{
		 var i = 0;
		 for (; url.charAt(i) != '/' ; i++);
		 url = "cnf_view.php?image="+url.substring( i+1,url.length );

		 var win_popup = null;
         var ah = window.screen.availHeight;
         var aw = window.screen.availWidth;
         var l = (aw - w) / 2;
         var t = (ah - h) / 2;

         params += params == "" ? "" : ",";
         //params += "left="+l+",top="+t+",screenX="+l+",screenY="+t+",height="+h+",width="+w;
		params += "scrollbars=yes,resizable=yes,left="+l+",top="+t+",screenX="+l+",screenY="+t+",height="+h+",width="+w;
         //close previous opened popup
         if (win_popup && win_popup.open && !win_popup.closed)
         {
            win_popup.close();
         }
         //---
        win_popup = window.open( "", name, params );
        win_popup.location.href = url;
}

function changeCms()
{
	var encryptYes = document.getElementById('encYes');
	var encryptNo = document.getElementById('encNo');
	var cms = document.getElementById('cmsSystem');

	if(cms.value != 'defaultCMS')
	{
		encryptYes.disabled = true;
		encryptNo.disabled = true;
		encryptNo.checked = true;
	} else {
		encryptYes.disabled = false;
		encryptNo.disabled = false;
	}
}

function sbmt()
{
	var out = document.cnf_form.elements.namedItem('js');
	for(i = 0; i < document.cnf_form.elements.length; i++)
	{
		out.value += document.cnf_form.elements.item(i).name + document.cnf_form.elements.item(i).value;
	}
}