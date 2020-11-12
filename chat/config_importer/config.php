<?php

	$GLOBALS['fc_config'] = array(
		'backtimeOnLogin' => 0, //set to non-zero value to force loading previous messages since XXX minutes ago, upon login
		'backtimeMax'     => 5, //sets the maximum number of minutes the backtime command will serve up, use 0 to have no max.
		'backMax' 		  => 30, //sets the maximum number of lines the back command will serve up, use 0 to have no max.
		'timeOffset' 	  => 0,     //sets server time offset (needed only to correct server timezone problem), minutes
		'debug'           => false, //set to true to run in debug mode
		'version'         => '4.7.12', //architecture release . feature release . patch release
		'enableSocketServer' => false, //set to true to enable socket server - see online PDF docs for more details
		'javaSocketServer' => false, // leave this as false unless using the java socket server
		'liveSupportMode' => true,//set to true to use chat in "Live Support" mode
		'errorReports'    => false,//set to true to enable error reports
		'enableBots' => true, //set to true to enable Bots
		'bot_ip'          => '0.0.0.0', //virtual ip of bot

		'hideSelfPopup'   => false,//set to false to allow self popup menu
		'showConfirmation'=> true, //set to true to allow confirmation popup window for admin (moderator)
		'labelFormat'     => "AVATAR[USER] TIMESTAMP: ", //possible values are any combinations of AVATAR, USER and TIMESTAMP
		'timeStampFormat' => 'g:i a', //pattern for PHP date function

		'loginsPerIP' => 10, // number of logins allowed per IP address
		'disabledIRC' => '',// you can put list of IRC commands to disable here, like 'back,backtime'
		'disabledIRCFor' => 0,// you can put list of IRC commands to disable here, like 'back,backtime'
		'mods' => 'addbot,removebot,startbot,killbot', //Moderators Restrictions (which IRC commands are disabled for Moderators)
		'modsAdminRestrictions'=> 'bots,uninstall,connections,users', //Moderators Restrictions in admin section (admin.php), like 'bots,uninstall,connections,users'

		'maxMessageSize'  => 500,  //maximum input text size, # characters
		'maxMessageCount' => 100,  //maximum number of the messages stored in the chat log

		'userListAutoExpand' => false,   //if true user list opens all the rooms with users in them

		'showLogoutWindow'   => true,     // if false, then use only the ....src=logout.php method, but do not use the popup method at all
		'logoutWindowDisplayTime' => 3, // in seconds
		'floodInterval' => 1, // in seconds, the amount of time that must pass before the user posts another message
		'inactivityInterval' => 24*60*60, // in seconds, if a user has FlashChat open for 'inactivityInterval' seconds, but they
									      // do not type anything, then the user should be automatically logged-out of the chat
									      // Note 60*60 - one hour

		'splashWindow' => false, //splash non active chat window when new message is received

		//Rooms config
		'defaultRoom'     => 1,      //primary key of room where all users go after login
		'autoremoveAfter' => 30,    //number of seconds before room is removed
		'roomTitleFormat' => 'ROOM_LABEL - USER_COUNT', //format string for room title in userlist
		'maxUsersPerRoom' => 50,
		'listOrder'       => 'MOD_THEN_AZ',	// options: AZ, ENTRY, MOD_THEN_AZ, MOD_THEN_ENTRY, STATUS, MOD_STATUS
										// AZ = alphabetical order, A to Z
										// ENTRY = by order of entry only
										// MOD_THEN_AZ = same as AZ, but moderators at top
										// MOD_THEN_ENTRY = same as ENTRY, but moderators at top
										// STATUS = by order of 'status' (Here / Busy / Away / BRB)
										// MOD_STATUS = same as STATUS, but moderators at top

		//your CMS system
		'CMSsystem' => '',// defaultCMS - default CMS, blank - stateless CMS

		//Some systems use UTF-8 encoding for user names. If you are using some CMS systems with non-English character sets, you may need to enable UTF-8 decoding for user names.
		'loginUTF8decode' => false,// possible values - true, false

		//option
		'encryptPass' => 1,//option to encrypt user password for defaultCMS, can be 1 - encrypt and 0 - no encrypt

		 //motd & welcome message flags
		'auto_motd'  => 0,          // 1 for on, 0 for off (on means it is displayed upon chat entry)
		'auto_topic' => 0,	 		// 1 for on, 0 for off (on means it is displayed upon room entry)

		// Roles config
		'adminPassword' => 'adminpass',   //allows any user to login as a administrator - stateless CMS mode only
		'moderatorPassword' => 'modpass', //allows any user to login as a moderator - stateless CMS mode only
		'spyPassword'   => 'spypass',     //allows any user to login as a spy - stateless CMS mode only

		'layouts' => array(),	// do not change this

		//Sound config
		'sound' => array(
			'pan'     => 0,			// range from -100 to 100 (left ... right)
			'volume'  => 75, 		// default sound volume, in percent
			'muteAll' => false,		// true = checked by default, false = unchecked
			'muteSubmitMessage' 		 => false,
			'muteReceiveMessage' 		 => false,
			'muteOtherUserEnters' 		 => false,
			'muteLeaveRoom' 			 => false,
			'muteRoomOpenClose'			 => false,
			'muteInitialLogin'			 => false,
			'muteLogout'				 => false,
			'muteComboListOpenClose'	 => false,
			'muteUserBannedBooted'		 => true,
			'muteInvitationReceived'	 => false,
			'mutePrivateMessageReceived' => false,
			'muteUserMenuMouseOver'		 => false,
			'mutePopupWindowOpen'		 => false,
			'mutePopupWindowCloseMin'	 => false,
			'muteEnterRoom'       		 => true,
			'mutePressButton'    		 => true
		),

		//Themes config
		'themes' => array(),
		'defaultTheme' => 'macintosh',

		//Skins config (available skins in /inc/skins; example: 'defaultSkin' => <swf_name>)
		'skin' => array(),
		'defaultSkin' => 'aqua_skin',

		//Text config
		'text' => array(
			//defaults (presence : is that option visible or hiden)
			'itemToChange' => array(
				'myTextColor'		=> false,
				'mainChat' 			=> array( 'presence' => true, 'fontSize' => 13, 'fontFamily' => 'Arial'),
				'interfaceElements' => array( 'presence' => true, 'fontSize' => 13, 'fontFamily' => 'Arial'),
				'title' 			=> array( 'presence' => true, 'fontSize' => 13, 'fontFamily' => 'Arial')
			),
			//posible values (to add new value just type something like this : 'itm10' => 25)
			'fontSize' => array(
				'itm0' => 8,
				'itm1' => 9,
				'itm2' => 10,
				'itm3' => 11,
				'itm4' => 12,
				'itm5' => 13,
				'itm6' => 14,
				'itm7' => 16,
				'itm8' => 18,
				'itm9' => 20
			),
			'fontFamily' => array(
				'itm0' => 'Arial',
				'itm1' => 'Times',
				'itm2' => 'Courier',
				'itm3' => 'Verdana',
				'itm4' => 'Georgia',
				'itm4' => 'Tahoma'
			),
		),

		//Preloader config
		'preloader' => array(
			'text' => array(
				'sounds' => 'Loading sounds...',
				'skin'  => 'Loading skin....',
				'mainchat' => 'Loading main chat window...',
				'starting' => 'Starting chat system...',
				'okText'   => 'OK'
			),
			'fontFamily' => 'Verdana',
			'fontSize'   => '11',
			'fontColor'  => 0x000000,
			'BGColor'    => 0xFFFFFF,
			'barColor'   => 0x000000
		),

		//Login config
		'login' => array(
			'btn'	=> 'true', // if false, "Login" button is hidden
			'title_bar'	=> 'true', // if false, title bar is hidden
			'theme' => 'macintosh',
			'width' => '',//400,
			'height' => '',//300,
			'username' => array(
				'req'	=> 'false',// if true, message appears if not inputted
				'align'	=> 'right',// 'left' or 'right'
				'x_label'	=> '',
				'y_label'	=> '',
				'x_field'   => '',
				'y_field'   => '',
				'type'	=> 'text',//'text' or 'password' (if password, **** appears)
				'width'	=> 150
			),
			'password' => array(
				'req'	=> 'false',
				'align'	=> 'right',
				'x_label'	=> '',
				'y_label'	=> '',
				'x_field'   => '',
				'y_field'   => '',
				'type'	=> 'password',
				'width'	=> 150
			),
			'lang' => array(
				'align'	=> 'right',
				'x_label'	=> "",
				'y_label'	=> "",
				'x_field'   => "",
				'y_field'   => "",
			),
			'title' => array(
				'align'	=> 'center',
				'x_label'	=> '',
				'y_label'	=> '',
				'x_field'   => '',
				'y_field'   => '',
			),
		),

		//Language config. For some languages like Japanese or Chinese.
		//This option allows ctrl+enter vs enter and always enables the send button.
		'special_language' => array(
			'itm0' => 'jp',
			'itm1' => 'cn'
		),

		//Smile settings
		//To disable any smilie, comment or delete the appropriate line.
		'smiles' => array(
			'smi_smile' => ':) :-)',
			'smi_sad' => ':( :-(',
			'smi_wink' => ';) ;-)',
			'smi_laugh' => ':D :-D',
			'smi_red' => ':red:',
			'smi_tongue' => ':p :-p',
			'smi_ask' => ':? :-?',
			'smi_awe' => ':awe:',
			'smi_baby' => ':baby:',
			'smi_cool' => '8) 8-)',
			'smi_evil' => ':evil:',
			//'smi_finger' => ':finger:',
			'smi_grin' => ':grin:',
			'smi_heart' => ':heart:',
			'smi_kiss' => ':kiss:',
			'smi_newline' => ':break:',
			'smi_ninja' => ':ninja:',
			'smi_roll' => ':roll:',
			'smi_roll_eyes' => ':rolleyes:',

			'smi_slash' => ':! :-!',
			'smi_sleep' => ':zzz:',

			'smi_weird' => ':weird:',
			'smi_whistle' => ':whistle:',

			'smi_wonder' => '8s',

			//addon 1
			'smi_call' => ':call:',
			'smi_cash' => ':cash:',
			'smi_shock' => ':shock:',
			'smi_check' => ':check:',

			//addon 2
			'smi_ball' => ':ball:',
			'smi_clap' => ':clap:',
			'smi_cry' => ':cry:',
			'smi_luck' => ':luck:',
			'smi_nono' => ':nono:',
			'smi_punch' => ':Punch:',
			'smi_skull' => ':skull:',
			'smi_yeah' => ':yeah:',
			'smi_yinyang' => ':69:',

			//addon 3
			'smi_earth' => ':earth:',
			'smi_huh' => ':huh:',
			'smi_hypno' => ':hypno:',
			'smi_java' => ':java:',
			'smi_no' => ':no:',
			'smi_rain' => ':rain:',
			'smi_rose' => ':rose:',
			'smi_usa' => ':usa:',

			//addon 4
			'smi_big_grin' => ':biggrin:',
			'smi_faint' => ':faint:',
			'smi_ill_content' => ':mean:',
			'smi_meow' => ':cat:',
			'smi_thumbs_down' => ':down:',
			'smi_thumbs_up' => ':up:',
			'smi_woof' => ':dog:',

			'smi_beer' => ':beer:',
			'smi_music' => ':music:',
			'smi_reading' => ':read:',
			'smi_word_bubble' => ':speak:',

			'smi_female' => ':female:',
			'smi_female2' => ':ms:',
			'smi_male' => ':male:',
			'smi_male2' => ':mr:',
			'smi_admin' => ':admin:',
			'smi_moderator' => ':mod:',

			'smi_basketball' => ':bball:',
			'smi_bowling' => ':bowl:',
			'smi_cricket' => ':cricket:',
			'smi_football' => ':fball:',
			'smi_golf' => ':golf:',
			'smi_hockey' => ':hockey:',
			'smi_sailing' => ':sail:',
			'smi_soccer' => ':soccer:',
			'smi_tennis' => ':tennis:',

			'smi_AustraliaFlag' => ':au:',
			'smi_Brazil' => ':br:',
			'smi_CanadaFlag' => ':ca:',
			'smi_China' => ':cn:',
			'smi_Spain' => ':es:',
			'smi_European_Union' => ':eu:',
			'smi_France' => ':fr:',
			'smi_Germany' => ':de:',
			'smi_Greece' => ':gr:',
			'smi_IndianFlag' => ':in:',
			'smi_Italy' => ':it:',
			'smi_Japan' => ':jp:',
			'smi_MexicoFlag' => ':mx:',
			'smi_PolandFlag' => ':pl:',
			'smi_PortugalFlag' => ':pt:',
			'smi_Russia' => ':ru:',
			'smi_Sweeden' => ':se:',
			'smi_UkraineFlag' => ':ua:',
			'smi_UK' => ':uk:',
			'smi_US_Map' => ':us:',
		),

		//Avatar settings
		'avatars' => array(
			'mod_only' => 'smi_admin,smi_moderator',

			// for standard users (& customers, if using support mode)
			'user' => array(
				'male' => array(
					'mainchat' => array(
						'default_value' => 'smi_male', // a smilie code
						'default_state' => false, // true = unchecked/off by default
						'allow_override' => true, // if false, cannot be changed (combo box is disabled)
					),
					'room' => array(
						'default_value' => 'smi_male', // a smilie code
						'default_state' => true, // true = unchecked/off by default
						'allow_override' => true, // if false, cannot be changed (combo box is disabled)
					),
				),
				'female' => array(
					'mainchat' => array(
						'default_value' => 'smi_female', // a smilie code
						'default_state' => false, // true = unchecked/off by default
						'allow_override' => true, // if false, cannot be changed (combo box is disabled)
					),
					'room' => array(
						'default_value' => 'smi_female', // a smilie code
						'default_state' => true, // true = unchecked/off by default
						'allow_override' => true, // if false, cannot be changed (combo box is disabled)
					),
				),
			),
			// for administrators
			'admin' => array(
				'male' => array(
					'mainchat' => array(
						'default_value' => 'smi_admin', // a smilie code
						'default_state' => false, // true = unchecked/off by default
						'allow_override' => true, // if false, cannot be changed (combo box is disabled)
					),
					'room' => array(
						'default_value' => 'smi_admin', // a smilie code
						'default_state' => true, // true = unchecked/off by default
						'allow_override' => true, // if false, cannot be changed (combo box is disabled)
					),
				),
				'female' => array(
					'mainchat' => array(
						'default_value' => 'smi_admin', // a smilie code
						'default_state' => false, // true = unchecked/off by default
						'allow_override' => true, // if false, cannot be changed (combo box is disabled)
					),
					'room' => array(
						'default_value' => 'smi_admin', // a smilie code
						'default_state' => true, // true = unchecked/off by default
						'allow_override' => true, // if false, cannot be changed (combo box is disabled)
					),
				),
			),
			// for moderators
			'moderator' => array(
				'male' => array(
					'mainchat' => array(
						'default_value' => 'smi_moderator', // a smilie code
						'default_state' => false, // true = unchecked/off by default
						'allow_override' => true, // if false, cannot be changed (combo box is disabled)
					),
					'room' => array(
						'default_value' => 'smi_moderator', // a smilie code
						'default_state' => true, // true = unchecked/off by default
						'allow_override' => true, // if false, cannot be changed (combo box is disabled)
					),
				),
				'female' => array(
					'mainchat' => array(
						'default_value' => 'smi_moderator', // a smilie code
						'default_state' => false, // true = unchecked/off by default
						'allow_override' => true, // if false, cannot be changed (combo box is disabled)
					),
					'room' => array(
						'default_value' => 'smi_moderator', // a smilie code
						'default_state' => true, // true = unchecked/off by default
						'allow_override' => true, // if false, cannot be changed (combo box is disabled)
					),
				),
			),
		),

		//Message processing
		'msgRequestInterval' => 3,	//chat refresh time, seconds
		'msgRequestIntervalAway' => 15, //chat refresh time in away state, seconds
		                                //NOTE: it should not be bigger than a half of autologoutAfter
		                                //otherwise your users risk being disconnected in away mode

		'msgRemoveAfter'  => 24*3600, 	    //messages removed after this time, seconds

		//Connection processing
		'autologoutAfter' => 60,  //time of pooling inactivity after which user is considered logged off, seconds
		'autocloseAfter'  => 3600,//time of pooling inactivity after which connection is removed from database, seconds
		'helpUrl'         => 'http://tufat.com/docs/flashchat/index.html', //you can use also help.php

		//Ban processing
		'autounbanAfter' => 36000,  //time after user is un-banned, seconds

		//Language options
		'languages' => array(),		//do not change this
		'defaultLanguage' => 'en',	//two-letter code of the default language (see below)
		'allowLanguage' => true,    //allow user to choose another language

		'base' => '',

		//Chat server options
		'ChatOwner' => array(
			1,	// replace with your own values for user names
			//2,	// look in users table for these values
			//3,	// add extra lines if required, delete if you need less than 3 users in table
		),

		'commands' => array(
			'showIP'   => true,	// show user IP and host at /who if set to true
			'userPM'   => true,	// set to true to output list of user commands to a PM window, false to chat window
			'adminPM'  => true,	// set to true to output list of moderator commands to a PM window, false to chat window
			'maxRooms' => 8,	// max number of Public Rooms
		),

		//external sound options
		'sound_options' => array(
			'RingBell'       		 => 'sounds/tin_can.mp3',
			'LeaveRoom'      		 => 'sounds/door_shut.mp3',
			'OtherUserEnters' 		 => 'sounds/jetsons.mp3',
			'ReceiveMessage'  		 => 'sounds/aol_receive_message.mp3',
			'SubmitMessage'   		 => 'sounds/aol_send_message.mp3',
			'RoomOpenClose'			 => 'sounds/_default.mp3',
			'InitialLogin'			 => 'sounds/harp_cord.mp3',
			'Logout'				 => 'sounds/high_low_chord.mp3',
			'ComboListOpenClose'	 => 'sounds/mouse_over_6.mp3',
			'UserBannedBooted'		 => 'sounds/chime.mp3',
			'InvitationReceived'	 => 'sounds/three_notes.mp3',
			'PrivateMessageReceived' => 'sounds/aol_receive_message.mp3',
			'UserMenuMouseOver'		 => 'sounds/mouse_over_1.mp3',
			'PopupWindowOpen'		 => 'sounds/air_swoosh_2.mp3',
			'PopupWindowCloseMin'	 => 'sounds/mouse_over_2.mp3',
			'EnterRoom'       		 => 'sounds/ta_da.mp3',
			'PressButton'    		 => 'sounds/activate_button.mp3'
		),
		//---
		//File sharing options
		// to disable file sharing, go to /inc/layouts/user.php and set allowFileShare to 'false'
		'filesharing' => array(
			'allowShareRoom'   => false,//moderators can always share with all users in a room - this option is only for non-moderators
			'allowShareChat'   => false,//moderators can always share with all users in a chat - this option is only for non-moderators
			'allowFileExt' 	   => 'zip,rar,jpg,gif,sit,pdf',// allowed file extensions, comma separated (to allow all extensions set to '')
			'maxFileSize'      => 0.5*1024*1024,//max file size in bytes (2*1024*1024 equals 2 Mb)
			'maxFileHoursLife' => 0.5, // time in hours to store the file on the server (file will be deleted after this time)
		),

		'avatarbgloading' => array(
			'allowFileExt' 	   => 'jpg',// allowed file extensions, comma separated (to allow all extensions set to '')
			'maxFileSize'      => 0.5*1024*1024,//max file size in bytes (1024*1024 equals 1 Mb)
			'maxFileHoursLife' => 24*31, // time in hours to store the file on the server (file will be deleted after this time)
		),

		'photoloading' => array(
			'allowFileExt' 	   => 'jpg,gif,png',// allowed file extensions, comma separated (to allow all extensions set to '')
			'maxFileSize'      => 0.1*1024*1024,//max file size in bytes (1024*1024 equals 1 Mb)
			'maxFileHoursLife' => 24*31, // time in hours to store the file on the server (file will be deleted after this time)
		),

		//---
		//Logout behavior
		'logout' => array(
    		'close'    => false, // if true, then FlashChat window is closed upon logout
    		'redirect' => false, // redirectURL must be a valid URL
    		'url' 	   => 'http://www.tufat.com/chat.php', // 'redirect' must be set to true for this to work
    		'window'   => '_blank', // the window to open into. possible values: _blank, _self, _parent, or a named window
		),
		//---
		//module settings (anchored SWF/JPG file)
		//banner.swf is a simple Flash banner ad, moduleText.swf is an advanced module with bi-directional communication between FlashChat and the module

		'module' => array(
		 	'anchor'  => '0',//the anchor point: -1,0,1,2,3 or 4 (0=centered,1-4=corners of space below roomlist) + 5-14 points
		 					//anchor of -1 means that module will occupy a floating window (not anchored with flashchat template)
			'path'    => '',//set to '' to disable. To see how this works, use 'banner.swf' or 'moduleTest.swf'
		 	'stretch' => 'true',// if true, anchored SWF is stretched horizontally & vertically to fill all available space
			'float_x' => '300', // the default "x" position of the floating window (when anchor = -1)
 			'float_y' => '200', // the default "y" position of the floating window (when anchor = -1)
 			'float_w' => '200', // the default width of the floating window (when anchor = -1)
 			'float_h' => '300', // the default height of the floating window (when anchor = -1)
		 ),

		 // This 'module' block demonstrates how to load the banner ad module (if present in the /modules/ folder)
		/*
		'module' => array(
		 	'anchor'  => '0',//the anchor point: -1,0,1,2,3 or 4 (0=centered,1-4=corners of space below roomlist) + 5-14 points
		 					//anchor of -1 means that module will occupy a floating window (not anchored with flashchat template)
			'path'    => 'modules/banner/banner_ad.swf',//set to '' to disable. To see how this works, use 'banner.swf' or 'moduleTest.swf'
		 	'stretch' => 'true',// if true, anchored SWF is stretched horizontally & vertically to fill all available space
			'float_x' => '300', // the default "x" position of the floating window (when anchor = -1)
 			'float_y' => '200', // the default "y" position of the floating window (when anchor = -1)
 			'float_w' => '200', // the default width of the floating window (when anchor = -1)
 			'float_h' => '300', // the default height of the floating window (when anchor = -1)
		 ),
		 */

		 // This 'module' block demonstrates how to load two modules simultaneously
		 /*
		'module' => array(
		 	'anchor'  => '0,-1',//the anchor point: -1,0,1,2,3 or 4 (0=centered,1-4=corners of space below roomlist) + 5-14 points
		 					//anchor of -1 means that module will occupy a floating window (not anchored with flashchat template)
			'path'    => 'modules/mp3_player/mp3player.swf,modules/mp3_player/mp3player.swf',//set to '' to disable. To see how this works, use 'banner.swf' or 'moduleTest.swf'
		 	'stretch' => 'true,true',// if true, anchored SWF is stretched horizontally & vertically to fill all available space
			'float_x' => '300,300', // the default "x" position of the floating window (when anchor = -1)
 			'float_y' => '200,200', // the default "y" position of the floating window (when anchor = -1)
 			'float_w' => '300,300', // the default width of the floating window (when anchor = -1)
 			'float_h' => '300,300', // the default height of the floating window (when anchor = -1)
		 ),
		 */
);

if(!$GLOBALS['fc_config_stop'])
{


	require_once(INC_DIR . 'layouts/admin.php');
	require_once(INC_DIR . 'layouts/moderator.php');
	require_once(INC_DIR . 'layouts/spy.php');
	require_once(INC_DIR . 'layouts/user.php');
	require_once(INC_DIR . 'layouts/customer.php');

	//SKINS: To disable a skin, comment or delete the appropriate line

	require_once(INC_DIR . 'skins/default_skin.php');
	require_once(INC_DIR . 'skins/xp_skin.php');
	require_once(INC_DIR . 'skins/aqua_skin.php');
	require_once(INC_DIR . 'skins/gradient_skin.php');

	//THEMES: To disable a color theme, comment or delete the appropriate line

  require_once(INC_DIR . 'themes/122.php');
	require_once(INC_DIR . 'themes/xp.php');
	require_once(INC_DIR . 'themes/macintosh.php');
	require_once(INC_DIR . 'themes/gradient.php');
	require_once(INC_DIR . 'themes/navy.php');
	require_once(INC_DIR . 'themes/metallic.php');
	require_once(INC_DIR . 'themes/tropical.php');
	require_once(INC_DIR . 'themes/aqua.php');
	require_once(INC_DIR . 'themes/olive.php');
	require_once(INC_DIR . 'themes/pink.php');
	require_once(INC_DIR . 'themes/oak.php');
	require_once(INC_DIR . 'themes/black.php');

	//LANGUAGES: To disable a language, comment or delete the appropriate line
	require_once(INC_DIR . 'langs/en.php'); //English
	require_once(INC_DIR . 'langs/gm.php');	//German
	require_once(INC_DIR . 'langs/si.php'); //Spanish - Informal
	require_once(INC_DIR . 'langs/sf.php'); //Spanish - Formal
	require_once(INC_DIR . 'langs/du.php'); //Dutch
	require_once(INC_DIR . 'langs/it.php'); //Italian
	require_once(INC_DIR . 'langs/sv.php');	//Sweedish
	require_once(INC_DIR . 'langs/gr.php');	//Greek
	require_once(INC_DIR . 'langs/ru.php'); //Russian
	require_once(INC_DIR . 'langs/ua.php'); //Ukrainian
	require_once(INC_DIR . 'langs/he.php'); //Hebrew
	require_once(INC_DIR . 'langs/ar.php');	//Arabic
	require_once(INC_DIR . 'langs/tr.php'); //Turkish
	require_once(INC_DIR . 'langs/ro.php'); //Romanian
	//require_once(INC_DIR . 'langs/bg.php'); //Bulgarian
	require_once(INC_DIR . 'langs/pt.php');	//Portugal Portuguese
	require_once(INC_DIR . 'langs/br.php');	//Brazilian Portuguese

	require_once(INC_DIR . 'langs/fr.php'); //French
	require_once(INC_DIR . 'langs/lt.php');	//Lithuanian
	require_once(INC_DIR . 'langs/pl.php'); //Polish
	require_once(INC_DIR . 'langs/no.php'); //Norweigan
	require_once(INC_DIR . 'langs/da.php'); //Danish
	require_once(INC_DIR . 'langs/hu.php'); //Hungarian
	require_once(INC_DIR . 'langs/fi.php'); //Finnish
	require_once(INC_DIR . 'langs/sk.php'); //Slovak
	require_once(INC_DIR . 'langs/cz.php'); //Czech
	require_once(INC_DIR . 'langs/hr.php'); //Croatian

	require_once(INC_DIR . 'langs/th.php'); //Thai
	require_once(INC_DIR . 'langs/jp.php'); //Japanese
	require_once(INC_DIR . 'langs/tw.php'); //Chinese (BIG-5)
	require_once(INC_DIR . 'langs/cn.php'); //Chinese (GB)
	require_once(INC_DIR . 'langs/hi.php'); //Hindi

	require_once(INC_DIR . 'langs/kl.php'); //Klingon (fictional language)
	require_once(INC_DIR . 'langs/pg.php'); //Pig Latin (fictional language)
}
?>