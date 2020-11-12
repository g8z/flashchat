var pref = new Array();
pref[0] = 'def';
pref[1] = 'stt';

var val = new Array();
val[0] = 'admin';
val[1] = 'moderator';
val[2] = 'spy';

function fieldsAreValid(exsc)
{
	var theForm = document.installInfo;

	var formElements = theForm.elements;
	var numElements = theForm.elements.length;


	// determine if valid by comparing size
	// if size = 6 & is not number, then not valid input
	// if size = 10 & is not color code, then not valid input

	for ( var i = 0; i < numElements; i++ )
	{
		var elemName  = theForm.elements[i].name;
		var elemValue = theForm.elements[i].value;
		var elemSize  = theForm.elements[i].size;
		var elemType  = theForm.elements[i].type;

		if( exsc )
			if( exsc.indexOf(elemName) >= 0 ) continue;

		// all fields are required
		if ( elemType == 'text' || elemType == 'password')
		{
			if ( elemValue == "" )
			{
				if( !isDefault() && checkStatt(theForm.elements[i]) )
				{
					alert( 'One or more required fields was left empty.');
					theForm.elements[i].focus();
					return false;
				}
				if( isDefault() && checkDef(theForm.elements[i]) )
				{
					alert( 'One or more required fields was left empty.');
					theForm.elements[i].focus();
					return false;
				}
			}
		}
	}

	/*
	if( !checkEqual() )
	{
		return false;
	}
	*/


	return true;
}

function checkEqual()
{
	if( !isDefault() )
	{
		var val1 = document.getElementById('stt_adminpass').value;
		var val2 = document.getElementById('stt_moderatorpass').value;
		var val3 = document.getElementById('stt_spypass').value;
		if( val1.length<1 || val2.length<1 || val3.length<1 )
		{
			alert("Please enter passwords");
			document.getElementById('stt_adminpass').focus();
			return false;
		}
		if( val1==val2 || val1==val3 || val2==val3 )
		{
			alert("Please use different passwords");
			document.getElementById('stt_adminpass').focus();
			return false;
		}
	}

	if( isDefault() )
	{


		var val1 = document.getElementById('def_adminlogin').value;
		var val2 = document.getElementById('def_moderatorlogin').value;
		var val3 = document.getElementById('def_spylogin').value;
		if( val1.length<1 || val2.length<1 || val3.length<1 )
		{
			alert("Please enter logins");
			document.getElementById('def_adminlogin').focus();
			return false;
		}
		if( val1==val2 || val1==val3 || val2==val3 )
		{
			alert("Please use different login");
			document.getElementById('def_adminlogin').focus();
			return false;
		}


		var val1 = document.getElementById('def_adminpass').value;
		var val2 = document.getElementById('def_moderatorpass').value;
		var val3 = document.getElementById('def_spypass').value;
		if( val1.length<1 || val2.length<1 || val3.length<1 )
		{
			alert("Please enter passwords");
			document.getElementById('def_adminlogin').focus();
			return false;
		}
		if( val1==val2 || val1==val3 || val2==val3 )
		{
			alert("Please use different passwords");
			document.getElementById('def_adminlogin').focus();
			return false;
		}
	}
	return true;
}
function checkDef(obj)
{
	var name = obj.name;
	for( i in val )
	{
		if( name==('stt_'+val[i]+'pass') )
			return false;
	}
	return true;
}
function checkStatt(obj)
{
	var name = obj.name;
	for( i in val )
	{
		if( name==('def_'+val[i]+'pass') || name==('def_'+val[i]+'login') )
			return false;
	}
	return true;
}
function isDefault()
{
	if( ! document.getElementById("default") ) return false;

	if( document.getElementById("default").style['display']=='block' )
		return true;
	else
		return false;
}
function setLogin(bool)
{
	if(bool==1)
	{
		document.getElementById('default').style['display'] = 'none';
		document.getElementById('stateless').style['display'] = 'block';
	}
	else
	{
		document.getElementById('default').style['display'] = 'block';
		document.getElementById('stateless').style['display'] = 'none';
	}
}
function addUserID(cmb, fld)
{
	var uid = cmb.options[cmb.selectedIndex].value;
	var val = fld.value;
	var find_str = 'user={';

	var ind1 = val.toLowerCase().indexOf(find_str);
	if(ind1 == -1) return;
	var str1 = val.substring(0, ind1 + find_str.length);
	var str2 = val.substring(val.indexOf('}',ind1), val.length);

	fld.value = str1 + uid + str2;

}