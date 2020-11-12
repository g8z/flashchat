<?php
	$GLOBALS['fc_config']['languages']['hu'] = array(
		'name' => "Magyar",

		'messages' => array(
			'ignored' => "'USER_LABEL' némított téged",
			'banned' => "Bannolva lettél",
			'login' => 'Kérlek lépj be a chatre',
			'wrongPass' => 'Helytelen felhasználónév vagy jelszó. Próbáld újra.',
			'anotherlogin' => 'Valaki már belépett ezzel a felhasználónévvel. Próbáld újra.',
			'expiredlogin' => 'A kapcsolatod lejárt. Kérlek lépj be újra.',
			'enterroom' => '[ROOM_LABEL]: USER_LABEL TIMESTAMP -kor belépett',
			'leaveroom' => '[ROOM_LABEL]: USER_LABEL TIMESTAMP -kor kilépett',
			'selfenterroom' => 'Üdvözöllek! Beléptél a [ROOM_LABEL] szobába TIMESTAMP -kor',
			'bellrang' => 'USER_LABEL csengetett',
			'chatfull' => 'A chat jelenleg megtelt. Kérlek próbálkozz később.',
			'iplimit' => 'Már beléptél a chatre.'
		),

		'usermenu' => array(
			'profile' => 'Profil',
			'unban' => 'Bannolás megszüntetése',
			'ban' => 'Bannolás',
			'unignore' => 'Némítás megszüntetése',
			'fileshare' => 'Fájl megosztása',
			'ignore' => 'Némítás',
			'invite' => 'Meghívás',
			'privatemessage' => 'Privát üzenet',			
		),

		'status' => array(
			'here' => 'Jelen',
			'busy' => 'Elfoglalt',
			'away' => 'Távollét',
			'brb'  => 'Rögtön jövok',			
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "A 'ROOM_LABEL' szoba nem található",
				'usernotfound' => "'USER_LABEL' felhasználó nem található",
				'unbanned' => "Bannolásod 'USER_LABEL' megszüntette",
				'banned' => "Bannolva lettél 'USER_LABEL' által",
				'unignored' => "Némításod 'USER_LABEL' megszüntette",
				'ignored' => "'USER_LABEL' némított téged",
				'invitationdeclined' => "'USER_LABEL' visszautasította a 'ROOM_LABEL' szobába való meghívásodat",
				'invitationaccepted' => "'USER_LABEL' elfogadta a 'ROOM_LABEL' szobába való meghívásodat",
				'roomnotcreated' => 'A szoba nem lett létrehozva',
				'roomisfull' => '[ROOM_LABEL] megtelt. Kérlek válassz másik szobát.',
				'alert' => '<b>FIGYELEM!</b><br><br>',
				'chatalert' => '<b>FIGYELEM!</b><br><br>',
				'gag' => "<b>Ideiglenesen némítva lettél DURATION percre!</b><br><br>Továbbra is olvashatod az üzenteket, de nem szólhatsz hozzá ".
						 "a némítas leteltéig.",
				'ungagged' => "Ideiglenes némítasod 'USER_LABEL' megszüntette",		 
				'gagconfirm' => 'USER_LABEL ideiglenes némítasa MINUTES percre.',
				'alertconfirm' => 'USER_LABEL olvasta a figyelmeztetést.',
				'file_declined' => 'USER_LABEL visszautasította a fájlodat.',
				'file_accepted' => 'USER_LABEL elfogadta a fájlodat.',
			),

			'unignore' => array(
				'unignoreBtn' => 'Némítast megszüntet',
				'unignoretext' => 'Némítas megszüntetése üzenettel',
			),

			'unban' => array(
				'unbanBtn' => 'Bannolást megszüntet',
				'unbantext' => 'Bannolás megszüntetése üzenettel',
			),
			
			'tablabels' => array(
				'themes' => 'Témak',
				'sounds' => 'Hangok',
				'text'  => 'Szöveg',
				'effects'  => 'Effektek',
				'admin'  => 'Admin',
				'about' => 'Névjegy',
			),

			'text' => array(
				'itemChange' => 'Változtatandó elem',
				'fontSize' => 'Fontméret',
				'fontFamily' => 'Font típusa',
				'language' => 'Nyelv',
				'mainChat' => 'Fő Chat',
				'interfaceElements' => 'Interfész-elemek',
				'title' => 'Cím',
				'mytextcolor' => 'Saját szövegszínt használ minden bejövő üzenethez.',
			),
			
			'effects' => array(
				'avatars' => 'Avatar-ok',
				'mainchat' => 'Fő chat',
				'roomlist' => 'Szobák listája',
				'background' => 'Háttér',
				'custom' => 'Egyéni',
				'showBackgroundImages' => 'Háttér mutatása',
				'splashWindow' => 'Ablak aktiválása új üzenetnél',
				'uiAlpha' => 'Átlátszóság',
			),

			'sound' => array(
				'sampleBtn' => 'Minta',
				'testBtn' => 'Teszt',
				'muteall' => 'Mindent némít',
				'submitmessage' => 'Üzenet elküldése',
				'reveivemessage' => 'Üzenet erkezése',
				'enterroom' => 'Belépés szobába',
				'leaveroom' => 'Kilépés szobából',
				'pan' => 'Pan',
				'volume' => 'Hangerő',
				'initiallogin' => 'Kezdeti login',
				'logout' => 'Kilépés',
				'privatemessagereceived' => 'Privát üzenet fogadása',
				'invitationreceived' => 'Meghívás fogadása',
				'combolistopenclose' => "Lenyílo listát nyit/zár",
				'userbannedbooted' => 'Felhasználó bannolva/kirúgva',
				'usermenumouseover' => 'Egér a felhasználói menü fölött',
				'roomopenclose' => "Szobalistát nyit/zár",
				'popupwindowopen' => 'Felbukkanó ablak megjelenése',
				'popupwindowclosemin' => 'Felbukkanó ablak bezárása',
				'pressbutton' => 'Billentyűleütés',
				'otheruserenters' => 'Másik felhasználó belépése',
			),

			'skin' => array(
				'inputBoxBackground' => 'Szövegmező háttere',
				'privateLogBackground' => 'Privát log háttere',
				'publicLogBackground' => 'Nyilvános log háttere',
				'enterRoomNotify' => 'Szoba-üzenet megadása',
				'roomText' => 'Szoba szövege',
				'room' => 'Szoba háttere',
				'userListBackground' => 'Felhasználói lista háttere',
				'dialogTitle' => 'Párbeszédablak címe',
				'dialog' => 'Párbeszédablak háttere',
				'buttonText' => 'Gombfelirat',
				'button' => 'Gomb háttere',
				'bodyText' => 'Szöveg',
				'background' => 'Fő háttér',
				'borderColor' => 'Keret színe',
				'selectskin' => 'Színséma választása...',
				'buttonBorder' => 'Gomb keretszíne',
				'selectBigSkin' => 'Skin választása...',
				'titleText' => 'Cím',
			),

			'privateBox' => array(
				'sendBtn' => 'Küldés',
				'toUser' => 'Párbeszéd USER_LABEL-el:',
			),

			'login' => array(
				'loginBtn' => 'Belépés',
				'language' => 'Nyelv:',
				'moderator' => '(ha moderátor)',
				'password' => 'Jelszó:',
				'username' => 'Felhasználónév:',
			),

			'invitenotify' => array(
				'declineBtn' => 'Elutasítás',
				'acceptBtn' => 'Elfogadás',
				'userinvited' => "'USER_LABEL' meghívott a 'ROOM_LABEL' szobába",
			),

			'invite' => array(
				'sendBtn' => 'Küldés',
				'includemessage' => 'Meghívás üzenete:',
				'inviteto' => 'Felhasználó meghívása:',
			),

			'ignore' => array(
				'ignoreBtn' => 'Figyelmen kívül hagy/némít',
				'ignoretext' => 'Figyelmen kívül hagyás üzenete',
			),

			'createroom' => array(
				'createBtn' => 'Létrehozás',
				'private' => 'Privát',
				'public' => 'Nyilvános',
				'entername' => 'Add meg a szoba nevét',
			),

			'ban' => array(
				'banBtn' => 'Bannolás',
				'byIP' => 'IP szerint',
				'fromChat' => 'a chatről',
				'fromRoom' => 'a szobából',
				'banText' => 'Bannolás oka',
			),

			'common' => array(
				'cancelBtn' => 'Mégsem',
				'okBtn' => 'OK',
				
				'win_choose'         => 'Válaszd ki a feltöltendő fájlt:',
				'win_upl_btn'        => '  Feltöltés  ',
				'upl_error'          => 'Fájl-feltöltési hiba',
				'pls_select_file'    => 'Kérlek válaszd ki a feltöltendő fájlt',
				'ext_not_allowed'    => 'A FILE_EXT fájlkiterjesztés tiltott. Válassz a következő típusú fájlok közul: ALLOWED_EXT',
				'size_too_big'       => 'A megosztani kívant fájl mérete túllépi a megengedett fájlméretet. Próbáld újra.',
			),
			
			'sharefile' => array(
				'chat_users'=> '[ Megosztás a chatnek ]',
				'all_users' => '[ Megosztás a szobának ]',
				'file_info_size'  => '<br>E fájl max. megengedett mérete MAX_SIZE.',
				'file_info_ext' => ' Megengedett fájltípusok: ALLOWED_EXT',
				'win_share_only'=>'Megosztás vele',				
				'usr_message' => '<b>USER_LABEL megosztana egy fájlt veled</b><br><br>Fajlnev: F_NAME<br>Fájlméret: F_SIZE',				
			),
			
			'loadavatarbg' => array(
				'win_title'  => 'Egyéni háttér',
				'file_info'  => 'A fájlnak vagy nem progresszív JPG-nek, vagy Flash SWF fájlnak kell lennie.',
				'use_label'  => 'E fájl használata erre:',
				'rb_mainchat_avatar' => 'A fő chatben használatos avatar',
				'rb_roomlist_avatar' => 'A szobalistában használatos avatar',
				'rb_mc_rl_avatar'    => 'Fő chatben és szobalistában használatos avatarok',
				'rb_this_theme'      => 'Háttér ehhez a témához',
				'rb_all_themes'      => 'Háttér minden témához',
			),
			
			
		),

		'desktop' => array(
			'invalidsettings' => 'Érvénytelen beállítások',
			'selectsmile' => 'Smiley-k',
			'sendBtn' => 'Elküld',
			'saveBtn' => 'Mentés',
			'clearBtn' => 'Töröl',
			'skinBtn' => 'Beállítások',
			'addRoomBtn' => 'Hozzáad',
			'myStatus' => 'Állapotom',
			'room' => 'Szoba',
			'welcome' => 'Üdvözöllek USER_LABEL',
			'ringTheBell' => 'Nincs válasz? Csengess:',
			'logOffBtn' => 'X',
			'helpBtn' => '?',
			'adminSign' => '',
		)
	);
?>