<?php
	$GLOBALS['fc_config']['languages']['ar'] = array(
		'name' => "عربي",

		'messages' => array(
		    	'ignored' => "يتجاهل رسائلك 'USER_LABEL' المستخدم",
			'banned' => "لقد تم منعك من الدردشة",
			'login' => 'الدخول إلى الدردشة ',
			'wrongPass' => 'الاسم أو كلمة المرور خطأ. من فضلك حاول مرة أخرى',
			'anotherlogin' => 'مستخدم آخر يحمل هذا الاسم. من فضلك حاول مرة أخرى',
			'expiredlogin' => 'لقد انتهت مدة اتصالك. من فضلك عاود الدخول',
			'enterroom' => 'TIMESTAMP دخل في الساعة USER_LABEL :[ROOM_LABEL]',
			'leaveroom' => 'TIMESTAMP غادر في الساعة USER_LABEL :[ROOM_LABEL]',
			'selfenterroom' => 'TIMESTAMP في الساعة  [ROOM_LABEL] أهلاَ وسهلاَ! لقد دخلت',
			'bellrang' => 'USER_LABEL يقرع الجرس',
			'chatfull' => 'الدردشة مليئة. من فضلك حاول مرة أخرى',
			'iplimit' => 'إنّك في الدردشة من السابق.',
		),

		'usermenu' => array(
			'profile' => 'الهيئة',
			'unban' => 'إنهاء المنع',
			'ban' => 'امنع',
			'unignore' => 'انهاء التجاهل',
			'fileshare' => 'المشاركة بملفّ',
			'ignore' => 'تجاهل',
			'invite' => 'إدع',
			'privatemessage' => 'رسالة خاصة',
		),

		'status' => array(
			'away' => 'غير موجود',
			'busy' => 'مشغول',
			'here' => 'هنا',
			'brb'  => 'سأعود حالاّ',

		),

		'dialog' => array(
			'misc' => array(
			   	'roomnotfound' => "غير موجودة 'ROOM_LABEL' الغرفة",
				'usernotfound' => "غير موجود 'USER_LABEL' المستخدم",
				'unbanned' => "'USER_LABEL' لقد انتهى منعك من المستخدم",
				'banned' => "'USER_LABEL' لقد تم منعك من المستخدم",
				'unignored' => "'USER_LABEL' لقد انتهى تجاهلك من المستخدم",
				'ignored' => "'USER_LABEL' لقد تم تجاهلك من المستخدم",
				'invitationdeclined' => "'ROOM_LABEL' رفض دعوتك للغرفة 'USER_LABEL' المستخدم",
				'invitationaccepted' => "'ROOM_LABEL' قبل دعوتك للغرفة 'USER_LABEL'  المستخدم",
				'roomnotcreated' => 'لم يتم إنشاء الغرفة',
				'roomisfull' => 'مليئة. رجاءً اختر غرفة أُخرى.  [ROOM_LABEL]  الغرفة ',
				'alert' => '<b>!انتباه</b><br><br>',
				'chatalert' => '<b>!انتباه</b><br><br>',
				'gag' => "دقيقة. إنّك تستطيع مشاهدة الرسائل، لكن لا يُسمح لك المشاركة في الحديث قبل مرور مدّة الإسكات. DURATION  لقد أُسكتت لمدّة",
				'ungagged' => "'USER_LABEL' لقد انتهى إسكاتك من المستخدم",
				'gagconfirm' => "دقيقة. MINUTES لمدّة 'USER_LABEL'  تمّ إسكات المستخدم",
				'alertconfirm' => "قام بقراءة التنبيه. 'USER_LABEL' المستخدم",
				'file_declined' => "رفض الملفّ المرسل منك. 'USER_LABEL' المستخدم",
				'file_accepted' => "قبل الملفّ المرسل منك. 'USER_LABEL' المستخدم",
			),

			'unignore' => array(
				'unignoreBtn' => 'إنهاء التجاهل',
				'unignoretext' => 'أدخل نصا مصاحبا لإنهاء التجاهل',
			),

			'unban' => array(
				'unbanBtn' => 'إنهاء المنع',
				'unbantext' => 'أدخل نصا مرافقا لإنهاء المنع',
			),

           		'tablabels' => array(
				'themes' => 'تصاميم',
				'sounds' => 'الأصوات',
				'text'  => 'نص',
				'effects'  => 'تأثيرات',
				'admin'  => 'المدير',
				'about' => 'عن البرنامج',
			),
			
			'text' => array(
				'itemChange' => 'مادة للتغيير',
				'fontSize' => 'حجم الخط',
				'fontFamily' => 'نوع الخط',
				'language' => 'اللغة',
				'mainChat' => 'الدردشة الرئيسية',
				'interfaceElements' => 'عناصر الوصلة',
				'title' => 'العنوان',
				'mytextcolor' => 'استخدم لون نصوصي الخاص لكلّ الرسائل المستقبلة.',
			),
			
			'effects' => array(
				'avatars' => 'الصور الشخصية',
				'mainchat' => 'الدردشة الرئيسية',
				'roomlist' => 'قائمة الغرف',
				'background' => 'الخلفية',
				'custom' => 'خاصّة',
				'showBackgroundImages' => 'اظهر الخلفية',
				'splashWindow' => 'تركيز النافظة عند إيراد رسالة جديدة.',
				'uiAlpha' => 'الشفافية',
			),
			
			'sound' => array(
				'sampleBtn' => 'عينة',
				'testBtn' => 'اختبار',
				'muteall' => 'إكتم الكل',
				'submitmessage' => 'ابعث الرسالة',
				'reveivemessage' => 'إستقبل الرسالة',
				'enterroom' => 'أدخل الغرفة',
				'leaveroom' => 'غادر الغرفة',
				'pan' => 'لوحة',
				'volume' => 'درجة الصوت',
				//added sounds
				'initiallogin' => 'الدخول الأولي',
				'logout' => 'الخروج',
				'privatemessagereceived' => 'إستقبال الرسائل الخاصة',
				'invitationreceived' => 'إستقبال الدعوة',
				'combolistopenclose' => 'فتح/إغلاق قائمة تجمعيّة',
				'smiliesopenclose' => 'فتح/إغلاق قائمة الإبتسامات',
				'userbannedbooted' => 'مستخدم ممنوع',
				'usermenumouseover' => 'قائمة المستخدم بتمرير الفأرة',
				'roomopenclose' => "فتح/إغلاق قسم الغرفة",
				'popupwindowopen' => 'فتحت نافذة جديدة',
				'popupwindowclosemin' => 'أغلقت النافذة الجديدة',
				'pressbutton' => 'اضغط',
				'otheruserenters' => 'دخول أعضاء آخرين للغرفة',
			),

			'skin' => array(
				'inputBoxBackground' => 'أدخل خلفية الصندوق',
				'privateLogBackground' => 'خلفية السجل الخاص',
				'publicLogBackground' => 'خلفية السجل العام',
				'enterRoomNotify' => 'أدخل إخطارات الغرفة',
				'roomText' => 'نص الغرفة',
				'room' => 'خلفية الغرفة',
				'userListBackground' => 'خلفية قائمة المستخدمين',
				'dialogTitle' => 'عنوان الحوار',
				'dialog' => 'خلفية الحوار',
				'buttonText' => 'نص الزر',
				'button' => 'خلفية الزر',
				'buttonBorder' => 'لون حدود الزر',
				'borderColor' => 'لون التحديد',
				'bodyText' => 'نص الجسم',
				'background' => 'الخلفية الرئيسية',
				'selectskin' => 'إختر لون التصميم',
				'showBackgroundImages' => 'إظهار الخلفية',
				'uiAlpha' => 'شفاف',
				'selectBigSkin' => 'إختر تصميم',
				'titleText' => 'نصّ العنوان',
			),

            		'privateBox' => array(
				'sendBtn' => 'أرسل',
				'toUser' => ':USER_LABEL التحدّث إلى',
			),

			'login' => array(
				'loginBtn' => 'أدخل',
				'language' => ':اللغة',
				'moderator' => '(في حالة مدير الحوار)',
				'password' => 'كلمة المرور:',
				'username' => 'اسم المستخدم:',

			),

			'invitenotify' => array(
				'declineBtn' => 'إرفض',
				'acceptBtn' => 'إقبل',
				'userinvited' => "'ROOM_LABEL' يدعوك للغرفة 'USER_LABEL' المستخدم",
			),

			'invite' => array(
				'sendBtn' => 'ابعث',
				'includemessage' => ':أضف نص هذه الرسالة إلى الدعوة',
				'inviteto' => ':إدع المستخدم إلى',
			),

			'ignore' => array(
				'ignoreBtn' => 'تجاهل',
				'ignoretext' => 'أدخل نصا مرافقا لأمر التجاهل',
			),

			'createroom' => array(
				'createBtn' => 'أنشئ',
				'private' => 'خاص',
				'public' => 'عام',
				'entername' => 'أدخل اسم الغرفة',
			),

			'ban' => array(
				'banBtn' => 'إمنع',
				'byIP' => 'IPمن خلال ',
				'fromChat' => 'من خلال الدردشة',
				'fromRoom' => 'من خلال الغرفة',
				'banText' => 'أدخل نصا مرافقا لأمر المنع',
			),

			'common' => array(
				'cancelBtn' => "إلغاء",
				'okBtn' => "موافق",
				
				'win_choose'         => 'اختر ملفّ للإرسال:',
				'win_upl_btn'        => '  إرسال  ',
				'upl_error'          => 'خطأ في الإرسال',
				'pls_select_file'    => 'رجاءّ، اختر ملفّ للإرسال:',
				'ext_not_allowed'    => ' ALLOWED_EXT :غير مسموح. رجاءً، اختر ملفّاً من احدى هذه الامتدادات FILE_EXT الأمتداد',
				'size_too_big'       => 'الملف الّذي حاولت إرساله أكبر من الحجم المسموح. رجاءً أعد المحاولة.',
			),
			
			'sharefile' => array(
				'chat_users'=> '[ الإرسال إلى الدردشة ]',
				'all_users' => '[ الإرسال إلى الغرفة ]',
				'file_info_size'  => '.MAX_SIZE :أعلى حجم مسموح <br>',
				'file_info_ext' => '.ALLOWED_EXT :الامتدادات المسموحة ',
				'win_share_only'=>'الإرسال إلى',				
				'usr_message' => '<br>F_SIZE :حجم الملفّ <br>F_NAME :اسم الملفّ </b><br><br> يرسل إليك ملفّاً USER_LABEL المستخدم <b>',				
			),
			
			'loadavatarbg' => array(
				'win_title'  => 'خلفيّة خاصّة',
				'file_info'  => ' SWF غير متطوّر أو من نوع فلاش JPG يجب أن يكون الملفّ إمّا من نوع ',
				'use_label'  => 'استخدم الملفّ لِ:ِ',
				'rb_mainchat_avatar' => 'صورة شخصية للدردشة العامة فقط',
				'rb_roomlist_avatar' => 'صورة شخصية لقائمة الغرف فقط',
				'rb_mc_rl_avatar'    => 'صورة شخصية للدردشة الكل من الدردشة العامة وقائمة الغرف',
				'rb_this_theme'      => 'خلفية للإعداد الإعداد الشكلي الحالي',
				'rb_all_themes'      => 'خلفية لكلّ الإعدادات الشكلية',
			),
		),

		'desktop' => array(
			'invalidsettings' => 'إعداد غير صالح',
			'selectsmile' => 'الابتسامات',
			'sendBtn' => 'إبعث',
			'saveBtn' => 'احفظ',
			'soundBtn' => 'الصوت',
			'clearBtn' => 'تنظيف',
			'skinBtn' => 'الواجهة',
			'addRoomBtn' => 'إضافة',
			'myStatus' => 'وضعي الحالي',
			'room' => 'غرفة',
			'welcome' => 'USER_LABEL أهلاَ وسهلاَ',
			'ringTheBell' => 'لا يوجد رد؟ إقرع الجرس',
			'logOffBtn' => 'الخروج',
			'helpBtn' => 'مساعدة',
			'adminSign' => '(مدير)',
		)
	);
?>