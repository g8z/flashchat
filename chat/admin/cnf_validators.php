<?php


//-------------------------------------------------
//main validator function
//$rule is array ['rule',required]
//-------------------------------------------------
function value_validator( $value, $rule, $fld_name )
{	
		
	if( isset($rule[2]) ) $fld_name = $rule[2];

	if( $rule[1] && (!isset($value) || trim($value)==''))
	{
		$_SESSION['error_name'] = $fld_name;
		return sprintf(LANG_VALUE_REQUIRED, $fld_name);
	}

	if( !$rule[1] && (!isset($value) || trim($value)=='')) return '';

	
	switch( $rule[0] )
	{
		case 'email' : if( ! emailCheck( $value ) )
					   {
					   		$_SESSION['error_name'] = $fld_name;
							return sprintf(LANG_VALUE_INCORRECT, $fld_name);
					   };
					   break;
		case 'phone' : if( ! phoneCheck( $value ))
					   {
					   		$_SESSION['error_name'] = $fld_name;
							return sprintf(LANG_VALUE_INCORRECT, $fld_name);
					   }
					   break;
		case 'number': if( ! numberCheck( $value ))
					   {
					   		$_SESSION['error_name'] = $fld_name;
							return sprintf(LANG_VALUE_INCORRECT, $fld_name);
					   }
					   break;
		case 'float': if( ! floatCheck( $value ))
					   {
					   		$_SESSION['error_name'] = $fld_name;
							return sprintf(LANG_VALUE_INCORRECT, $fld_name);
					   }
					   break;
		case 'datetime':if( ! dateCheck( $value ))
					   {
					   		$_SESSION['error_name'] = $fld_name;
							return sprintf(LANG_VALUE_INCORRECT, $fld_name);
					   }
						break;
		case 'CMS':if( ! CMSCheck( $value ))
					   {
					   		$_SESSION['error_name'] = $fld_name;
							return sprintf('CMS system is not found', $fld_name);
					   }
						break;
		case 'alfanum':break;
		default       :if( ! syntaxCheck( $rule[0],$value ) )
					   {
					   		$_SESSION['error_name'] = $fld_name;
							return sprintf(LANG_VALUE_INCORRECT, $fld_name);
					   };
	}

	return '';
}
//-------------------------------------------------
//CMS
//-------------------------------------------------
function CMSCheck( $rule )
{
  if( $rule == 'false' )
    return(false) ;
  else
   return(true) ;
}
//-------------------------------------------------
//check syntax
//-------------------------------------------------
function syntaxCheck( $rule,$line )
{
	$line = trim($line);
  if( !preg_match('/'.$rule.'/',$line) )
  {
    return(false) ;
  }else
   return(true) ;
}
//-------------------------------------------------
//check email
//-------------------------------------------------
function emailCheck ($eMail)
{
  $eMail = trim($eMail);
  if(!preg_match("/^([0-9a-zA-Z]+)([0-9a-zA-Z._-]+)*[@]([0-9,a-z,A-Z]+)([._-]([0-9a-zA-Z]+))*[.]([0-9a-zA-Z]){2}([0-9a-zA-Z])?$/",$eMail))
  {
    return(false) ;
  }else
   return(true) ;
}
//-------------------------------------------------
//check phone
//-------------------------------------------------
function phoneCheck ( $val )
{
	$val = eregi_replace("(\(|\)|\-|\+)","", $val);

	return numberCheck( $val );
}
//-------------------------------------------------
//number check
//-------------------------------------------------
function numberCheck( $val )
{
	if( is_numeric($val) && strpos($val, '.') === false && $val >= -1 )
	{		
		return true;
	}
	else
	{		
		return false;
	}
}
//-------------------------------------------------
//float check
//-------------------------------------------------
function floatCheck( $val )
{
	if( !is_float($val) || !is_numeric($val)) return true;
	else return false;
}

//-------------------------------------------------
//check if img file exists if not return default image path
//-------------------------------------------------
function getImgPath( $path, $add='' )
{

	$default_path = $add . 'src/images/not_found.jpg';
	if($path != '') $path = $add . $path;

	if( file_exists( $path ) )
	{
		return $path;
	}else
	{
		return $default_path;
	}
}
//-------------------------------------------------
//date time check
//-------------------------------------------------
function dateCheck( $val )
{
	if( strtotime($val) == -1 )return false;
	else return true;
}


?>