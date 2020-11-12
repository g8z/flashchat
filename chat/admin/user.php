<?php

require_once('init.php');

if(!inSession()) {
	include('login.php');
	exit;
}
//--------------------------------
// highlight page. artemK0
//--------------------------------
$bold = highlightPage(__FILE__);
$smarty->assign($bold[0], $bold[1]);
ChatServer::prepare();

$cms = $GLOBALS['fc_config']['cms'];
$cmsclass = strtolower(get_class($cms));
$manageUsers = ($cmsclass == 'defaultcms') || ($cmsclass == 'statelesscms_notused'  && (!isset($cms->constArr)));

if( !$manageUsers )
{
	//Assign Smarty variables and load the admin template
	$smarty->assign('manageUsers',!$manageUsers);
	$smarty->display('user.tpl');

	exit;
}

$error = '';
$notice = '';

if(isset($_REQUEST['password'])) {
	$pass = $_REQUEST['password'];

	if( $GLOBALS['fc_config']['CMSsystem']!='' && $GLOBALS['fc_config']['CMSsystem']!='statelessCMS' )
	{
		if( $GLOBALS['fc_config']['encryptPass'] && (strlen($pass) != strlen(md5('password'))))
			$pass = md5($pass);
	}
}

if(isset($_REQUEST['add'])) {
	if(!$_REQUEST['login']) {
		$error = 'login cannot be empty';
	}
	else if(!$_REQUEST['password']) {
		$error = 'please enter password';
	}
	else {
		/*$stmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}users WHERE login=? LIMIT 1");
		$rs = $stmt->process($_REQUEST['login']);

		if(!$rs->hasNext())
		{
			$stmt = new Statement("INSERT INTO {$GLOBALS['fc_config']['db']['pref']}users (login, password, roles) VALUES (?, ?, ?)");
			$_REQUEST['id'] = $stmt->process($_REQUEST['login'], $pass, $_REQUEST['roles']);
			$notice = 'user added';
		}*/
        // changed on 090706 for chat instances
		$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE login=? AND instance_id=? LIMIT 1',140);
		$rs = $stmt->process($_REQUEST['login'], $_SESSION['session_inst']);

		if(!$rs->hasNext())
		{
			$stmt = new Statement('INSERT INTO '.$GLOBALS['fc_config']['db']['pref'].'users (login, password, roles, instance_id) VALUES (?, ?, ?, ?)', 113);
			$_REQUEST['id'] = $stmt->process($_REQUEST['login'], $pass, $_REQUEST['roles'], $_SESSION['session_inst']);
			$notice = 'user added';
		}
        // changed on 090706 for chat instances ends here
		else
		{
			$error = 'user already exist';
		}
	}
} else if(isset($_REQUEST['set'])) {
	if(!$_REQUEST['login']) {
		$error = 'login cannot be empty';
	} else if(!$_REQUEST['id']) {
		$error = 'wrong user id';
	}
	else if(!$_REQUEST['password']) {
		$error = 'please enter password';
	}
	else {
		//$stmt = new Statement("SELECT * FROM {$GLOBALS['fc_config']['db']['pref']}users WHERE login=? AND id<>? LIMIT 1");
		//$rs = $stmt->process($_REQUEST['login'], $_REQUEST['id']);

        // changed on 090706 for chat instances
		$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE login=? AND id<>? AND instance_id=? LIMIT 1',147);
		$rs = $stmt->process($_REQUEST['login'], $_REQUEST['id'], $_SESSION['session_inst']);
		// changed on 090706 for chat instances ends here


		if(!$rs->hasNext())
		{
			$stmt = new Statement('UPDATE '.$GLOBALS['fc_config']['db']['pref'].'users SET login=?, password=?, roles=? WHERE id=?',142);
			$stmt->process($_REQUEST['login'], $pass, $_REQUEST['roles'], $_REQUEST['id']);
			$notice = 'user updated';
		}
		else
		{
			$error = 'user already exist';
		}
	}
} else if(isset($_REQUEST['del'])) {
	if(!$_REQUEST['id']) {
		$error = 'wrong user id';
	} else {
		$stmt = new Statement('DELETE FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE id=?' , 144 );
		$stmt->process($_REQUEST['id']);
		$notice = 'user removed';
		$_REQUEST['id'] = null;
	}
}

$roles = array(
	ROLE_USER => 'user',
	ROLE_ADMIN => 'admin',
	ROLE_MODERATOR => 'moderator',
	ROLE_SPY => 'spy',
	ROLE_CUSTOMER => 'customer'
);

if(isset($_REQUEST['id']))
{
	$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users WHERE id=?' , 120 );
	$rs = $stmt->process($_REQUEST['id']);

	if( is_object( $rs ) )	$_REQUEST = $rs->next();
} else {
	$_REQUEST['id'] = 0;
	$_REQUEST['login'] = '';
	$_REQUEST['password'] = '';
	$_REQUEST['roles'] = ROLE_USER;
}

//Assign Smarty variables and load the admin template
$smarty->assign('error',$error);
$smarty->assign('notice',$notice);
$smarty->assign('roles',$roles);
$smarty->assign('_REQUEST',$_REQUEST);
$smarty->assign('langs', $GLOBALS['fc_config']['languages_admin'][$_COOKIE['language']]['user.tpl']);
$smarty->display('user.tpl');

?>