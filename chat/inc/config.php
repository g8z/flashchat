<?php
//end of cache options
$GLOBALS['filename'] = 'config';
include_once INC_DIR.'get_config.php';


if ( !isset($_REQUEST['step']) )
{
	if( $GLOBALS['fc_config']['cacheType'] == 0 || !isset($GLOBALS['fc_config']['cacheType']) )
	{
		require_once( INC_DIR . 'classes/db.php');
	}
	else
	{
		//$st = microtime();
		switch($GLOBALS['fc_config']['cacheType'])
		{
			case 2:  require_once( INC_DIR . 'classes/db_fullCache.php');
					 break;
			default: require_once( INC_DIR . 'classes/db_cache.php');
				     break;
		}
	}
}


if( $GLOBALS['fc_config']['javaSocketServer']  )
{
	$GLOBALS['fc_config']['enableSocketServer'] = true;
}

if( !$GLOBALS['fc_config_stop'] )
{
	require_once(INC_DIR . 'flashChatTag.php');
	require_once(INC_DIR . 'layouts/admin.php');
	require_once(INC_DIR . 'layouts/moderator.php');
	require_once(INC_DIR . 'layouts/spy.php');
	require_once(INC_DIR . 'layouts/user.php');

	require_once(INC_DIR . 'layouts/customer.php');

	//SKINS: To disable a skin, comment or delete the appropriate line

	//Skins config (available skins in /inc/skins; example: 'defaultSkin' => <swf_name>)
	$GLOBALS['fc_config']['skin'] = array();
	require_once(INC_DIR . 'skins/default_skin.php');
	require_once(INC_DIR . 'skins/xp_skin.php');
	require_once(INC_DIR . 'skins/aqua_skin.php');
	require_once(INC_DIR . 'skins/gradient_skin.php');
	//require_once(INC_DIR . 'skins/swing_skin.php');
	//require_once(INC_DIR . 'skins/motif_skin.php');
	//require_once(INC_DIR . 'skins/vista_skin.php');
	//require_once(INC_DIR . 'skins/m15uno_skin.php');
	//require_once(INC_DIR . 'skins/lunar_skin.php');
	//require_once(INC_DIR . 'skins/transylvania_skin.php');
	//require_once(INC_DIR . 'skins/frames_skin.php');
	//require_once(INC_DIR . 'skins/paint_skin.php');
	//THEMES: To disable a color theme, comment or delete the appropriate line
	//Themes config
	$GLOBALS['fc_config']['themes'] = array();
	require_once('include_themes.php');

}
	$file_path = $GLOBALS['fc_config']['appdata_path'];
	if( file_exists( $file_path ) && filesize( $file_path ) > 0 )
	{
		$arr = filemtime($file_path);
	}




if( !isset( $_REQUEST['step'] )  )
{
		if( time() - $arr>5 )
		{
			//added on 090706 for chat instances
			$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'config_main', 1);

			$rs = $stmt->process();
			$main_records = array();
			while($rec = $rs->next())
			{
			 	$GLOBALS['fc_config']['fc_instance'][$rec['level_0']] = $rec['value'];

			}
		}
}


/*$GLOBALS['fc_config']['fc_instance'] =  array(
                                              'paypal_admin_bussiness_email' => 'admin@fc.com',
											  'instance_value' => 50,
											  'admin_currency_type' => 'USD'
											  );*/


$GLOBALS['fc_config']['payment_options']['debug_mode'] = 0;
//Deriving datas for comma delimited texts in admin
$fc_spl_languages = $GLOBALS['fc_config']['special_language']['itm0'];
$fc_spl_language_items=explode(',',$fc_spl_languages);

for( $i=0 ; $i < sizeof($fc_spl_language_items) ; $i++ )
{
	$GLOBALS['fc_config']['special_language']['itm'.$i] = $fc_spl_language_items[$i];
}

//for($i=0;$i<count($fc_spl_language_items);$i++)
//echo "<pre>";print_r($GLOBALS['fc_config']['special_language']);echo "</pre>";exit;
//Deriving datas for comma delimited texts in admin ends here
if( !isset( $_REQUEST['step'] )  )
{
	$query = 'SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'config_instances WHERE is_active=1 OR is_default=1 ORDER BY id';

	$stmt = new Statement( $query , 2 );
	$res  = $stmt->process();
	$GLOBALS['fc_config']['instances'] = array();

	while($row = $res->next())
	{
		//if ( in_array($row['id'],$pieces) )
		    $GLOBALS['fc_config']['instances'][] = array( 'id' => $row['id'] , 'name' => $row['name'] );
	}
}

?>