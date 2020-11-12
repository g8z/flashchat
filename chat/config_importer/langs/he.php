<?php
     $GLOBALS['fc_config']['languages']['he'] = array(
          'name' => "עברית",

          'messages' => array(
               'ignored' => "משתמש 'USER_LABEL' מתעלם מהודעותיך",
               'banned' => "אסרו את כניסתך",
               'login' => 'אנא התחבר לצאט',
               'wrongPass' => 'שם משתמש או סיסמה שגויים. אנא נסה שנית.',
               'anotherlogin' => 'משתמש נוסף כבר מחובר עם השם משתמש הזה. אנא נסה שנית.',
               'expiredlogin' => 'פג תוקפו של החיבור שלך. אנא התחבר שנית.',
               'enterroom' => "[ROOM_LABEL]: USER_LABEL נכנס ב TIMESTAMP",
               'leaveroom' => "[ROOM_LABEL]: USER_LABEL יצא ב TIMESTAMP",
               'selfenterroom' => "ברוך הבא! נכנסת ל [ROOM_LABEL] בשעה TIMESTAMP",
               'bellrang' => 'USER_LABEL צלצל בפעמון',
		       'chatfull' => 'הצאט מלאה. אנא נסה שנית מאוחר יותר',
		       'iplimit' => 'אתה כבר בצאט',
          ),

          'usermenu' => array(
               'profile' => "פרופיל",
               'unban' => "הסר אסור כניסה",
               'ban' => "אסור כניסה",
               'unignore' => "הסר התעלמות",
	       	   'fileshare' => 'שתף קובץ',
               'ignore' => "התעלם",
               'invite' => "הזמן",
               'privatemessage' => "הודעה פרטית",
          ),

          'status' => array(
               'here' => "פה",
               'busy' => "עסוק",
               'away' => "לא נמצא",
	       	   'brb'  => 'חוזר בקרוב',
          ),

          'dialog' => array(
               'misc' => array(
               'roomnotfound' => "חדר 'ROOM_LABEL' לא נמצא",
               'usernotfound' => "משתמש 'USER_LABEL' לא נמצא",
               'unbanned' => "משתמש 'USER_LABEL' הסיר את איסור הכניסה שלך",
               'banned' => "משתמש 'USER_LABEL' אסר את כניסתך",
               'unignored' => "משתמש 'USER_LABEL' הסיר את התעלמותו מהודעותיך",
               'ignored' => "'USER_LABEL' מתעלם מהודעותיך",
               'invitationdeclined' => "משתמש 'USER_LABEL' דחה את הזמנתך לחדר 'ROOM_LABEL'",
               'invitationaccepted' => "משתמש 'USER_LABEL' קיבל את הזמנתך לחדר 'ROOM_LABEL'",
               'roomnotcreated' => "חדר לא קיים",
	     	   'roomisfull' => 'מלאה. אנא נסה חדר אחר [ROOM_LABEL]',
			   'alert' => '<b>אזהרה!</b><br><br>',
	           'chatalert' => '<b>אזהרה!</b><br><br>',
		       'gag' => "<b>דקות DURATION שיתקו אותך ל</b><br><br>מותר לך לקרוא הודעות, אבל לא לכתוב ".
				 "הודעות חדשות עד שזמן השתיקה יעבור",
		       'ungagged' => " הסיר את צו השתיקה'USER_LABEL'",		 
			   'gagconfirm' => 'דקות MINUTES הושתק למשך USER_LABEL',
		       'alertconfirm' => 'קרא את האזהרה USER_LABEL',
               'file_declined' => 'דחה את הזמנתך לקבלת קובץ USER_LABEL.',
        	   'file_accepted' => 'קיבל את הקובץ שנשלך USER_LABEL.',
          ),

          'unignore' => array(
               'unignoreBtn' => "הסר התעלמות",
               'unignoretext' => "הכנס הודעת הסרת ההתעלמות",
          ),

          'unban' => array(
               'unbanBtn' => "הסר איסור כניסה",
               'unbantext' => "הכנס הודעת הסרת איסור הכניסה",
          ),

          'tablabels' => array(
               'themes' => "נושא",
               'sounds' => "צלילים",
               'text'  => "טקסט",
     		   'effects'  => 'אפקטים',
               'admin'  => "מנהל",
		       'about' => 'אודות',
          ),

          'text' => array(
               'itemChange' => "עצם להחליף",
               'fontSize' => "גודל הפונט",
               'fontFamily' => "משפחת הפונט",
               'language' => "שפה",
               'mainChat' => "צאט ראשי",
               'interfaceElements' => "יחידות ממשק",
               'title' => "כותרת",
		  	   'mytextcolor' => 'השתמש בצבע הטקסט לכל ההודעות הנכנסות',
          ),

	      'effects' => array(
        	   'avatars' => 'אוואטארים',
		       'mainchat' => 'צאט ראשי',
		       'roomlist' => 'רשימת חדרים',
		       'background' => 'רקע',
		       'custom' => 'אישי',
		       'showBackgroundImages' => 'הראה רקע',
		       'splashWindow' => 'הרקז חלון על ההודעות החדשות',
		       'uiAlpha' => 'שקיפות',
	      ),

          'sound' => array(
               'sampleBtn' => "דוגמה",
               'testBtn' => "בדיקה",
               'muteall' => "השתק הכל",
               'submitmessage' => "שלח הודעה",
               'reveivemessage' => "קבל הודעה",
               'enterroom' => "הכנס לחדר",
               'leaveroom' => "צא מהחדר",
               'pan' => "פן",
               'volume' => "עוצמת קול",
               'initiallogin' => "התחברות ראשונית",
               'logout' => "התנתקות",
               'privatemessagereceived' => "קבל הודעה פרטית",
               'invitationreceived' => "קבל הזמנה",
		       'combolistopenclose' => "פתח/סגור רשימת קומבו",
               'userbannedbooted' => "משתמש הועף או שנאסרה כניסתו",
               'usermenumouseover' => "עכבר מעל תפריט משתמש",
               'roomopenclose' => "פתח/סגור רשימת חדרים",
               'popupwindowopen' => "חלון פופ אפ נפתח",
               'popupwindowclosemin' => "חלון פופ אפ נסגר",
               'pressbutton' => "לחיצה על כפתור",
               'otheruserenters' => "משתמש אחר נכנס לחדר",
          ),

          'skin' => array(
               'inputBoxBackground' => "רקע תיבת הטקסט",
               'privateLogBackground' => "רקע ההודעות הפרטיות",
               'publicLogBackground' => "רקע ההודעות הפומביות",
               'enterRoomNotify' => "הכנס הודעה לחדר",
               'roomText' => "טקסט החדרים",
               'room' => "רקע רשימת החדרים",
               'userListBackground' => "רקע רשימת המשתמשים",
               'dialogTitle' => "כותרת הדיאלוג",
               'dialog' => "רקע הדיאלוג",
               'buttonText' => "טקסט הכפתורים",
               'button' => "רקע הכפתורים",
               'bodyText' => "גוף הטקסט",
               'background' => "רקע ראשי",
               'borderColor' => "צבע הקצוות",
               'selectskin' => "בחר צבעים...",
		       'buttonBorder' => "צבעי קצוות הכפתורים",
               'selectBigSkin' => "בחר סקין...",
               'titleText' => "טקסט כותרת",
          ),

          'privateBox' => array(
               'sendBtn' => "שלח",
               'toUser' => "מדבר אל USER_LABEL:",
          ),

          'login' => array(
               'loginBtn' => "התחבר",
               'language' => "שפה:",
               'moderator' => "(אם מנהל)",
               'password' => "סיסמה:",
               'username' => "שם משתמש:",
          ),

          'invitenotify' => array(
               'declineBtn' => "בטל",
               'acceptBtn' => "אשר",
               'userinvited' => "משתמש 'USER_LABEL' הזמין אותך לחדר 'ROOM_LABEL'",
          ),

          'invite' => array(
               'sendBtn' => "שלח",
               'includemessage' => "הוסף הודעה זו להזמנה:",
               'inviteto' => "הזמן משתמש ל:",
          ),

          'ignore' => array(
               'ignoreBtn' => "התעלם",
               'ignoretext' => "הכנס הודעה להתעלמות",
          ),

          'createroom' => array(
               'createBtn' => "צור",
               'private' => "פרטי",
               'public' => "פומבי",
               'entername' => "הכנס את שם החדר",
          ),

          'ban' => array(
               'banBtn' => "אסור כניסה",
               'byIP' => "מכתובת אינטרנט",
               'fromChat' => "מצאט",
               'fromRoom' => "מחדר",
               'banText' => "הכנס הודעה לאסירת הכניסה",
          ),

          'common' => array(
               'cancelBtn' => "בטל",
               'okBtn' => "אשר",
               'win_choose' => 'בחר בקובץ לאפ-לוד:',
		       'win_upl_btn'        => '  אפ-לוד  ',
		       'upl_error'          => 'תקלה באפ-לוד הדובץ',
		       'pls_select_file'    => 'אנא בחר קובץ לאפ-לוד',
		       'ext_not_allowed'    => 'ALLOWED_EXT :לא מותר. בחר/י קובץ עם סוף FILE_EXT הקובץ עם',
		       'size_too_big'       => 'הקובץ שניסית לשתף גדול מדי. אנא נסה שוב',
          ),

	      'sharefile' => array(
		       'chat_users'=> '[ שתף לצאט ]',
		       'all_users' => '[ שתף לחדר ]',
		       'file_info_size'  => '<br>MAX_SIZE:גודל מקסימלי לקובץ זה',
		       'file_info_ext' => 'ALLOWED_EXT: סוג קבצים מורשים',
		       'win_share_only'=>'שתף עם',				
		       'usr_message' => 'F_SIZE :גודל קובץ<br>F_NAME :שם קובץ<br><br><b>רוצה לשתף קובץ USER_LABEL</b>',				
	      ),
			
          'loadavatarbg' => array(
		       'win_title'  => 'רקע אישי',
		       'file_info'  => 'SWF או פלאש JPG קובץ חייב להיות תמונת  or a Flash SWF file.',
		       'use_label'  => ':השתמש בקובץ זה ל',
		       'rb_mainchat_avatar' => 'צאט ראשי בלבד',
		       'rb_roomlist_avatar' => 'רשימת חדרים בלבד',
		       'rb_mc_rl_avatar'    => 'שימת חדרים ו צאט ראשי',
		       'rb_this_theme'      => 'רקע לתוכן זה בלבד',
		       'rb_all_themes'      => 'רקע לכל',
	      ),

	  ),
          'desktop' => array(
               'invalidsettings' => "הגדרות לא תקינות",
               'selectsmile' => "סמיילים",
               'sendBtn' => "שלח",
               'saveBtn' => "שמור",
	           'clearBtn' => 'נקא',
               'soundBtn' => "צלילים",
               'skinBtn' => "אפשרויות",
               'addRoomBtn' => "הוסף",
               'myStatus' => "המצב שלי",
               'room' => "חדר",
               'welcome' => "ברוך הבא USER_LABEL",
               'ringTheBell' => "אין תשובה? צלצל בפעמון",
               'logOffBtn' => "X",
               'helpBtn' => "?",
               'adminSign' => "",
          )
     );
?>
