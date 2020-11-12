<?php
	$GLOBALS['fc_config']['languages']['fa'] = array(
		'name' => "فارسی",

		'messages' => array(
		    	'ignored' => "کارکرد'USER_LABEL'پيغام های شما خطا ميدهد",
			'banned' => "You've been banned",
			'login' => 'براي استفاده از اتاقها لطفا وارد شويد',
			'wrongPass' => 'نام کاربري و يا کلمه عبور اشتباه ميباشد لطفا دوباره سعي کنيد',
			'anotherlogin' => ' در حال حاظر فرد ديگری با اين نام در اتاق حاظر است لطفا نام ديگری براي خود انتخاب کنيد ',
			'expiredlogin' => 'ارتباط شما قطع شد لطفا مجددا وارد شويد',
			'enterroom' => 'TIMESTAMP به اتاق وارد شد USER_LABEL :[ROOM_LABEL]',
			'leaveroom' => 'TIMESTAMP از اتاق خارج شد USER_LABEL :[ROOM_LABEL]',
			'selfenterroom' => 'Welcome! You have entered [ROOM_LABEL] at TIMESTAMP',
			'bellrang' => 'USER_LABEL الان زنگ زد',
			'chatfull' => 'با عرض تاسف اتاقها پر شده اند لطفا بعدا وارد شويد',
			'iplimit' => 'شما در حال صحبت هستيد',
		),

		'usermenu' => array(
			'profile' => 'مشخصات',
			'unban' => 'باز شدن قفل',
			'ban' => 'قفل',
			'unignore' => 'رد قفل',
			'fileshare' => 'ارسال فايل',
			'ignore' => 'Ignore',
			'invite' => 'دعوت به اتاق',
			'privatemessage' => 'صحبت خصوصي',
		),

		'status' => array(
			'away' => 'در اتاق نيست',
			'busy' => 'مشغول هست',
			'here' => 'در اتاق هست',
			'brb'  => 'در حال ورود به اتاق',

		),

		'dialog' => array(
			'misc' => array(
			   	'roomnotfound' => "پيدا نشد 'ROOM_LABEL' اتاق",
				'usernotfound' => "پيدا نشد 'USER_LABEL' کاربر",
				'unbanned' => "'USER_LABEL' قفلتان را شکست",
				'banned' => "'USER_LABEL' قفلتان کرد",
				'unignored' => "'USER_LABEL' شما را آزاد کرد ",
				'ignored' => "'USER_LABEL'  Ignore",
				'invitationdeclined' => "'ROOM_LABEL' قبول نکرد 'USER_LABEL' ",
				'invitationaccepted' => "'ROOM_LABEL' قبول کرد  'USER_LABEL'  ",
				'roomnotcreated' => 'اتاق ساخته نشد',
				'roomisfull' => ' پر است لطفا اتاق ديگري انتخاب کنيد   [ROOM_LABEL]  اتاق ',
				'alert' => '<b>!اخطار</b><br><br>',
				'chatalert' => '<b>!اخطار</b><br><br>',
				'gag' => "  دقيقه ساکت خواهيد ماند DURATION تا مدت",
				'ungagged' => "'USER_LABEL' محدودیت شما باطل شد از طرف",
				'gagconfirm' => "دقيقه. MINUTES به مدت'USER_LABEL'ساکت خواد ماند",
				'alertconfirm' => "اخطار را خواند 'USER_LABEL' کاربر",
				'file_declined' => "فايل را قبول نکرد 'USER_LABEL' کاربر",
		        'file_accepted' => "فايل را قبول کرد 'USER_LABEL' کاربر",
			),

			'unignore' => array(
				'unignoreBtn' => 'Un-ignore',
				'unignoretext' => 'Enter un-ignore text',
			),

			'unban' => array(
				'unbanBtn' => 'Un-ban',
				'unbantext' => 'Enter un-ban text',
			),

           		'tablabels' => array(
				'themes' => 'قالب',
				'sounds' => 'صدا',
				'text'  => 'متون',
				'effects'  => 'پوسته',
				'admin'  => 'مدير',
				'about' => 'درباره ما',
			),
			
			'text' => array(
				'itemChange' => 'نحوه آيتمها',
				'fontSize' => 'سايز فونتها',
				'fontFamily' => 'نوع خط',
				'language' => 'زبان',
				'mainChat' => 'Main Chat',
				'interfaceElements' => 'Interface Elements',
				'title' => 'Title',
				'mytextcolor' => 'پيامهاي رسيده را به رنگي که من در نوشتن به کار ميبرم در بيار',
			),
			
			'effects' => array(
				'avatars' => 'Avatar',
				'mainchat' => 'در صحبت',
				'roomlist' => 'در ليست',
				'background' => 'پشت زمينه',
				'custom' => 'بقيه',
				'showBackgroundImages' => 'استفاده از پشت زمينه',
				'splashWindow' => 'Focus window on new message',
				'uiAlpha' => 'شفافيت',
			),
			
			'sound' => array(
				'sampleBtn' => 'نمونه',
				'testBtn' => 'امتحان',
				'muteall' => 'قطع کلي صدا',
				'submitmessage' => 'فرستادن پيغام',
				'reveivemessage' => 'دريافت پيغام',
				'enterroom' => 'ورود به اتاق',
				'leaveroom' => 'خروج از اتاق',
				'pan' => 'کفه',
				'volume' => 'صدا',
				//added sounds
				'initiallogin' => 'در اولين ورود',
				'logout' => 'خروج',
				'privatemessagereceived' => 'دريافت پيغام خصوصي',
				'invitationreceived' => 'دريافت دعوتنامه',
				'combolistopenclose' => 'باز/ انتخاب ليست',
				'smiliesopenclose' => 'بسته/ انتخاب ليست',
				'userbannedbooted' => 'کاربر محدود شد و يا بيرون شد',
				'usermenumouseover' => 'روي منوي ماوس',
				'roomopenclose' => "باز/بسته   اتاق",
				'popupwindowopen' => 'هنگام باز شدن پنجره جديد',
				'popupwindowclosemin' => 'بستن پنجره جديد',
				'pressbutton' => 'وارد کردن رمز',
				'otheruserenters' => 'کاربر ديگري به اتاق وارد شد',
			),

			'skin' => array(
				'inputBoxBackground' => 'پشت زمينه جعبه ورود',
				'privateLogBackground' => 'پشت زمينه ورود خصوصي',
				'publicLogBackground' => 'پشت زمينه ورود عمومي',
				'enterRoomNotify' => 'خواندن اخطار و ورود به اتاق',
				'roomText' => 'متن اتاق',
				'room' => 'پشت زمينه اتاقها',
				'userListBackground' => 'پشت زمينه ليست کاربران',
				'dialogTitle' => 'عنوان گفتگو',
				'dialog' => 'پشت زمينه گفتگو',
				'buttonText' => 'نوشته دکمه ها',
				'button' => 'پشت زمينه دکمه ها',
				'buttonBorder' => 'رنگ حاشيه دکمه ها',
				'borderColor' => 'رنگ حاشيه ها',
				'bodyText' => 'بدنه نوشته ها',
				'background' => 'پشت زمينه اصلي',
				'selectskin' => 'به ترتيب رنگ',
				'showBackgroundImages' => 'نشان دادن عکس ها به عنوان پشت زمينه',
				'uiAlpha' => 'شفافيت',
				'selectBigSkin' => 'انتخاب پوسته',
				'titleText' => 'متن عنوان',
			),

            		'privateBox' => array(
				'sendBtn' => 'ارسال',
				'toUser' => ': صحبت خصوصي : USER_LABEL ',
			),

			'login' => array(
				'loginBtn' => 'ورود',
				'language' => 'زبان :',
				'moderator' => 'براي افراد عضو',
				'password' => 'رمز عبور :',
				'username' => 'نام کاربري :',
			),

			'invitenotify' => array(
				'declineBtn' => 'رد کن',
				'acceptBtn' => 'قبول کن',
				'userinvited' => "'ROOM_LABEL'  'USER_LABEL' دعوت به اتاق",
			),

			'invite' => array(
				'sendBtn' => 'ارسال',
				'includemessage' => 'متني که ميخواهيد با دعوتنامه فرستاده شود',
				'inviteto' => 'انتخاب اتاق',
			),

			'ignore' => array(
				'ignoreBtn' => 'Ignore',
				'ignoretext' => 'Enter ignore text',
			),

			'createroom' => array(
				'createBtn' => 'ايجاد کن',
				'private' => 'خصوصي',
				'public' => 'عمومي',
				'entername' => 'نام اتاق',
			),

			'ban' => array(
				'banBtn' => 'ممنوع کن',
				'byIP' => 'IP توسط',
				'fromChat' => 'بوسيله صحبت',
				'fromRoom' => 'بوسيله اتاق',
				'banText' => 'متن ممنوع کردن را وارد کنيد',
			),

			'common' => array(
				'cancelBtn' => "انصراف",
				'okBtn' => "موافق",
				
				'win_choose'         => 'فايلي که آپلود خواهد شد را انتخاب کنيد',
				'win_upl_btn'        => '  ارسال  ',
				'upl_error'          => 'خطا در آپلود فایل',
				'pls_select_file'    => 'لطفا فايلي که آپلود خواهد شد را انتخاب کنيد:',
		       		'ext_not_allowed'    => 'The FILE_EXT file extension is not allowed. Please choose a file with one of the these extensions: ALLOWED_EXT',
				'size_too_big'       => 'حجم فايلي که انتخاب کرديد بزرگتر از مقدار تعيين شده ميباشد ',
			),
			
			'sharefile' => array(
				'chat_users'=> '[ صحبت را با او بخش کن ]',
				'all_users' => '[ اتاق را با او بخش کن ]',
				'file_info_size'  => '.MAX_SIZE پسوندهاي مجاز و مقدار حجم آنها <br>',
				'file_info_ext' => '.ALLOWED_EXT : ',
				'win_share_only'=>'به  >>>',				
				'usr_message' => '<br>F_SIZE :حجم فايل <br>F_NAME :نام فايل </b><br><br> اين فايل را به شما فرستاد USER_LABEL <b>',				
			),
			
			'loadavatarbg' => array(
				'win_title'  => 'پشت زمينه ديگر',
				'file_info'  => 'Your file should be a non-progressive JPG image, or a Flash SWF file ',
				'use_label'  => 'اين فايل را براي اين بکار ببر',
				'rb_mainchat_avatar' => 'فقط براي چت avatar',
				'rb_roomlist_avatar' => 'فقط براي ليست اتاقها avatar',
				'rb_mc_rl_avatar'    => 'هم براي چت و هم براي ليست اتاقها avatar',
				'rb_this_theme'      => 'پشت زمينه فقط براي اين پوسته',
				'rb_all_themes'      => 'پشت زمينه براي کل پوسته ها',
			),
		),

		'desktop' => array(
			'invalidsettings' => 'تنظيمات غلط',
			'selectsmile' => 'شکلکها',
			'sendBtn' => 'ارسال',
			'saveBtn' => 'ذخيره',
			'soundBtn' => 'صدا',
			'clearBtn' => 'حذف',
			'skinBtn' => 'تنظيمات',
			'addRoomBtn' => 'ساخت اتاق',
			'myStatus' => 'وضعيت',
			'room' => 'اتاق',
			'welcome' => ' USER_LABEL : Welcome To Omidiyeh  ',
			'ringTheBell' => 'جوابي نيست؟ زنگ را بزنيد',
			'logOffBtn' => 'خروج',
			'helpBtn' => '؟',
			'adminSign' => 'مدیر کل',
		)
	);
?>