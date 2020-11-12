<?php
	$GLOBALS['fc_config']['languages']['da'] = array(
		'name' => "Danish",

		'messages' => array(
			'ignored' => "'USER_LABEL' ignorerer dine beskeder",
			'banned' => "Du er blevet bandlyst",
			'login' => 'Log på til chatten',
			'wrongPass' => 'Ukorrekt brugernavn eller kodeord. Prøv igen.',
			'anotherlogin' => 'En anden bruger er logget ind med dette brugernavn. Prøv igen.',
			'expiredlogin' => 'Forbindelsen er udløbet. Log på igen.',
			'enterroom' => '[ROOM_LABEL]: USER_LABEL er ankommet TIMESTAMP',
			'leaveroom' => '[ROOM_LABEL]: USER_LABEL er smuttet TIMESTAMP',
			'selfenterroom' => 'Velkommen! Du er ankommet til [ROOM_LABEL] klokken TIMESTAMP',
			'bellrang' => 'USER_LABEL ringede med klokken',
			'chatfull' => 'Chatten er fuldt optaget. Prøv igen lidt senere.',
			'iplimit' => 'Du er allerede på chatten.',
			'roomlock' => 'Dette rum er kodeordsbeskyttet.<br>Indtast kodeordet for chatrummet:',
			'locked' => 'Ukorrekt kodeord. Prøv igen.',
			'botfeat' => 'Bot features er ikke aktiveret.',
		),

		'usermenu' => array(
			'profile' => 'Profil',
			'unban' => 'Ophævelse af bandlysning',
			'ban' => 'Bandlys',
			'unignore' => 'U-ignorer',
			'fileshare' => 'Send en fil',
			'ignore' => 'Ignorer',
			'invite' => 'Inviter',
			'privatemessage' => 'Privat chat',			
		),

		'status' => array(
			'here' => 'Her',
			'busy' => 'Optaget',
			'away' => 'Ikke tilstede',
			'brb'  => 'Straks tilbage',			
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "Rummet 'ROOM_LABEL' blev ikke fundet",
				'usernotfound' => "Bruger 'USER_LABEL' blev ikke fundet",
				'unbanned' => "Du er ikke længere bandlyst af 'USER_LABEL'",
				'banned' => "Du er blevet bandlyst af bruger 'USER_LABEL'",
				'unignored' => "Du er ikke længere ignoreret af 'USER_LABEL'",
				'ignored' => "Du er blevet ignoreret af 'USER_LABEL'",
				'invitationdeclined' => " 'USER_LABEL' har afslået din invitation til at chatte i 'ROOM_LABEL'",
				'invitationaccepted' => " 'USER_LABEL' har accepteret din invitation til at chatte i 'ROOM_LABEL'",
				'roomnotcreated' => 'Rummet blev ikke lavet',
				'roomisfull' => '[ROOM_LABEL] er fuldt optaget. Vælg et andet rum.',
				'alert' => '<b>ALERT!</b><br>',
				'chatalert' => '<b>ALERT!</b><br>',
				'gag' => "<b>Du er blevet bedt om at tie stille i DURATION minut(er)!</b><br><br>du kan læse men ikke skrive ".
						 "indtil din karantæne er ophørt.",
				'ungagged' => "Din karantæne er ophævet af 'USER_LABEL'",		 
				'gagconfirm' => 'USER_LABEL er kommet i karantæne for MINUTES minut(ter)).',
				'alertconfirm' => 'USER_LABEL har læst advarslen.',
				'file_declined' => 'Din fil er afslået af USER_LABEL.',
				'file_accepted' => 'Din fil er accepteret af USER_LABEL.',
			),

			'unignore' => array(
				'unignoreBtn' => 'U-ignorer',
				'unignoretext' => 'Indtast u-ignorer tekst',
			),

			'unban' => array(
				'unbanBtn' => 'Ophævelse af bandlysning',
				'unbantext' => 'Indtast ophævelse af bandlyst tekst',
			),
			
			'tablabels' => array(
				'themes' => 'Temaer',
				'sounds' => 'Lyde',
				'text'  => 'Tekst',
				'effects'  => 'Effekter',
				'admin'  => 'Admin',
				'about' => 'Om',
			),

			'text' => array(
				'itemChange' => 'Punkter at ændre',
				'fontSize' => 'Skriftstørrelse',
				'fontFamily' => 'Skrifttyper',
				'language' => 'Sprog',
				'mainChat' => 'Chat',
				'interfaceElements' => 'Brugerflade-elementer',
				'title' => 'Titel',
				'mytextcolor' => 'Brug min farve til alle beskeder.',
			),
			
			'effects' => array(
				'avatars' => 'Ikoner',
				'mainchat' => 'Hovedchatten',
				'roomlist' => 'Rumlisten',
				'background' => 'Baggrund',
				'custom' => 'Personlig indstilling',
				'showBackgroundImages' => 'Vis baggrund',
				'splashWindow' => 'Fokusvinduet på nye chatbeskeder',
				'uiAlpha' => 'Gennemsigtighed',
			),

			'sound' => array(
				'sampleBtn' => 'Eksempel',
				'testBtn' => 'Test',
				'muteall' => "Gør alle stumme",
				'submitmessage' => 'Indtast besked',
				'reveivemessage' => 'Modtag besked',
				'enterroom' => 'Gå ind i rummet',
				'leaveroom' => 'Forlad rummet',
				'pan' => 'Pan',
				'volume' => 'Volume',
				'initiallogin' => 'Initial log på',
				'logout' => 'Log ud',
				'privatemessagereceived' => 'Modtag private beskeder',
				'invitationreceived' => 'Modtag invitation',
				'combolistopenclose' => "Åbn/luk combobox listen",
				'userbannedbooted' => 'Bruger bandlyst eller booted',
				'usermenumouseover' => 'Bruger menu mouse over',
				'roomopenclose' => "Open/close room section",
				'popupwindowopen' => 'Popup vindue åbnes',
				'popupwindowclosemin' => 'Popup vindue lukkes',
				'pressbutton' => 'Key press',
				'otheruserenters' => 'Anden bruger ankommet til chatten',
			),

			'skin' => array(
				'inputBoxBackground' => 'Skrivefelt baggrund',
				'privateLogBackground' => 'Privat log baggrund',
				'publicLogBackground' => 'Offenligt log baggrund',
				'enterRoomNotify' => 'Skriv rum notat',
				'roomText' => 'Rumtekst',
				'room' => 'Rumbaggrund',
				'userListBackground' => 'Brugerliste baggrund',
				'dialogTitle' => 'Dialogtitel',
				'dialog' => 'Dialogbaggrund',
				'buttonText' => 'Knaptekst',
				'button' => 'Knappebaggrund',
				'bodyText' => 'KROPteksten',
				'background' => 'Hovedbaggrund',
				'borderColor' => 'Rammefarver',
				'selectskin' => 'Vælg farveskema...',
				'buttonBorder' => 'Knappers rammefarve',
				'selectBigSkin' => 'Vælg Skin...',
				'titleText' => 'Titeltekst',
			),

			'privateBox' => array(
				'sendBtn' => 'Send',
				'toUser' => 'Taler til USER_LABEL:',
			),

			'login' => array(
				'loginBtn' => 'Log på',
				'language' => 'Sprog:',
				'moderator' => '(Hvis moderator)',
				'password' => 'Kodeord:',
				'username' => 'Brugernavn:',
			),

			'invitenotify' => array(
				'declineBtn' => 'Afslå',
				'acceptBtn' => 'Accepter',
				'userinvited' => "'USER_LABEL' har inviteret dig til at chatte i 'ROOM_LABEL'",
			),

			'invite' => array(
				'sendBtn' => 'Send',
				'includemessage' => 'Inkluder denne tekst i din invitation:',
				'inviteto' => 'Inviter bruger til:',
			),

			'ignore' => array(
				'ignoreBtn' => 'Ignorer',
				'ignoretext' => 'Indtast ignorertekst',
			),

			'createroom' => array(
				'createBtn' => 'Opret',
				'private' => 'Privat',
				'public' => 'Offentligt',
				'entername' => 'Indtast rummets navn',
				'enterpass' => 'Indtast et kodeord eller lad være blank, hvis alle skal kunne komme ind.',
			),

			'ban' => array(
				'banBtn' => 'Bandlys',
				'byIP' => 'af IP',
				'fromChat' => 'fra chat',
				'fromRoom' => 'fra værelse',
				'banText' => 'Indtast bandlys tekst',
			),

			'common' => array(
				'cancelBtn' => 'Fortryd',
				'okBtn' => 'OK',
				
				'win_choose'         => 'Vælg filen du vil sende:',
				'win_upl_btn'        => '  Send  ',
				'upl_error'          => 'Fejl i afsendelse af fil',
				'pls_select_file'    => 'Vælg en fil du vil sende',
				'ext_not_allowed'    => 'Filen FILE_EXT har et format der ikke er tilladt at sende her på Chatten. Vælg en fil i et af følgende formater: ALLOWED_EXT',
				'size_too_big'       => 'Filen du forsøger at sende er større end maksimalt tilladt. Prøv igen.',
			),
			
			'sharefile' => array(
				'chat_users'=> '[ Del med chatten ]',
				'all_users' => '[ Del med hele rummet ]',
				'file_info_size'  => '<br>Den maksimale filstørrelse MAX_SIZE.',
				'file_info_ext' => ' Tilladte filtyper/formater: ALLOWED_EXT',
				'win_share_only'=>'Del med',				
				'usr_message' => '<b>USER_LABEL er ved at sende en fil til dig</b><br><br>Fil navn: F_NAME<br>Filstørrelse: F_SIZE',				
			),
			
			'loadavatarbg' => array(
				'win_title'  => 'Personlig baggrund',
				'file_info'  => 'Din fil bør være et ikke-progressiv JPG billede, eller en Flash SWF fil.',
				'use_label'  => 'Brug denne fil til:',
				'rb_mainchat_avatar' => 'Kun i hovedchatten',
				'rb_roomlist_avatar' => 'Kun i rumlisten',
				'rb_mc_rl_avatar'    => 'Både hovedchatten og rumlisten',
				'rb_this_theme'      => 'Kun baggrund for dette tema',
				'rb_all_themes'      => 'Baggrund for alle temaer',
			),
			
			
		),

		'desktop' => array(
			'invalidsettings' => 'Ikke acceptable indstillinger',
			'selectsmile' => 'Smilies',
			'sendBtn' => 'Send',
			'saveBtn' => 'Gem log',
			'clearBtn' => 'Nulstil',
			'skinBtn' => 'Indstillinger',
			'addRoomBtn' => 'Tilføj',
			'myStatus' => 'Min status',
			'room' => 'Rum',
			'welcome' => 'Velkommen USER_LABEL',
			'ringTheBell' => 'Intet svar? Ring med klokken:',
			'logOffBtn' => 'X',
			'helpBtn' => '?',
			'adminSign' => '',
		)
	);
?>