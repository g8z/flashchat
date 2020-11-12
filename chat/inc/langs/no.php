<?php
	$GLOBALS['fc_config']['languages']['no'] = array(
		'name' => "Norsk",

		'messages' => array(
			'ignored' => "'USER_LABEL' ignorerer dine meldinger",
			'banned' => "Du har blitt sperret",
			'login' => 'Vennligst logg inn til chat',
			'wrongPass' => 'Feil brukernavn eller passord. Vennligst prøv igjen.',
			'anotherlogin' => 'En annen bruker er logget inn med dette brukernavn. Vennligst prøv igjen.',
			'expiredlogin' => 'Din forbindelse har utgått. Vennligst logg inn på nytt.',
			'enterroom' => '[ROOM_LABEL]: USER_LABEL har logget inn ved TIMESTAMP',
			'leaveroom' => '[ROOM_LABEL]: USER_LABEL har logget ut ved TIMESTAMP',
			'selfenterroom' => 'Velkommen! Du har logget inn i [ROOM_LABEL] at TIMESTAMP',
			'bellrang' => 'USER_LABEL ringte med bjella',
			'chatfull' => 'Chat-rommet er full. Vennligst prøv senere.',
			'iplimit' => 'Du er allerede i denne chat.',
			'roomlock' => 'Dette rommet er passord beskyttet.<br>Vennligst skriv inn rom passord:',
			'locked' => 'Feil passord. Vennligst prøv igjen.',
			'botfeat' => 'The bot feature is not currently enabled.',
		),

		'usermenu' => array(
			'profile' => 'Profil',
			'unban' => 'Fjern sperre',
			'ban' => 'Sperr',
			'unignore' => 'Fjern ignorering',
			'fileshare' => 'Del Fil',
			'ignore' => 'Ignorer',
			'invite' => 'Inviter',
			'privatemessage' => 'Privat melding',			
		),

		'status' => array(
			'here' => 'Tilstede',
			'busy' => 'Opptatt',
			'away' => 'Ikke tilstede',
			'brb'  => 'Straks tilbake',			
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "Room 'ROOM_LABEL' ikke funnet",
				'usernotfound' => "User 'USER_LABEL' ikke funnet",
				'unbanned' => "Bruker 'USER_LABEL' fjernet sin sperre på deg'",
				'banned' => "Bruker 'USER_LABEL' sperret deg",
				'unignored' => "Bruker 'USER_LABEL' fjernet ignorering mot deg'",
				'ignored' => "Bruker 'USER_LABEL' ignorerer deg",
				'invitationdeclined' => "Bruker 'USER_LABEL' aksepterte ikke din invitasjon til rom 'ROOM_LABEL'",
				'invitationaccepted' => "Bruker 'USER_LABEL' aksepterte din invitasjon til rom 'ROOM_LABEL'",
				'roomnotcreated' => 'Chat-rom ble ikke opprettet',
				'roomisfull' => '[ROOM_LABEL] er fullt. Vennligst velg ett annet rom.',
				'alert' => '<b>ALERT!</b><br>',
				'chatalert' => '<b>ALERT!</b><br>',
				'gag' => "<b>Du har blitt sperret for DURATION minutt(er)!</b><br><br>Du kan lese meldinger, men ikke sende ".
						 "nye meldinger før sperren har gått ut.",
				'ungagged' => "Bruker 'USER_LABEL' fjernet din sperre",
				'gagconfirm' => 'USER_LABEL er sperret for MINUTES minutt(er).',
				'alertconfirm' => 'USER_LABEL har lest advarselen.',
				'file_declined' => 'Filen du sendte ble ikke akseptert av USER_LABEL.',
				'file_accepted' => 'Filen du sendte ble akseptert av USER_LABEL.',
			),

			'unignore' => array(
				'unignoreBtn' => 'Fjern ignorering',
				'unignoretext' => 'Skriv grunn for å fjerne ignorering',
			),

			'unban' => array(
				'unbanBtn' => 'Fjern sperre',
				'unbantext' => 'Skriv grunn for å fjerne sperre',
			),
			
			'tablabels' => array(
				'themes' => 'Temaer',
				'sounds' => 'Lyder',
				'text'  => 'Tekst',
				'effects'  => 'Effekter',
				'admin'  => 'Administrer',
				'about' => 'Om',
			),

			'text' => array(
				'itemChange' => 'Hva skal endres?',
				'fontSize' => 'Skrift størrelse',
				'fontFamily' => 'Skrift type',
				'language' => 'Språk',
				'mainChat' => 'Hoved chat',
				'interfaceElements' => 'Skjerm elementer',
				'title' => 'Title',
				'mytextcolor' => 'Bruk min tekst farge for alle innkommende meldinger.',
			),
			
			'effects' => array(
				'avatars' => 'Avatarer',
				'photo' => 'Foto',
				'mainchat' => 'Hoved chat',
				'roomlist' => 'Rom liste',
				'background' => 'Bakgrund',
				'custom' => 'Custom',
				'showBackgroundImages' => 'Vis bakgrunn',
				'splashWindow' => 'Fokusér vindu ved nye meldinger',
				'uiAlpha' => 'Transparent',
			),

			'sound' => array(
				'sampleBtn' => 'Test',
				'testBtn' => 'Test',
				'muteall' => 'Skru av all lyd',
				'submitmessage' => 'Send melding',
				'reveivemessage' => 'Motta melding',
				'enterroom' => 'Gå inn i rom',
				'leaveroom' => 'Forlat rom',
				'pan' => 'Pan',
				'volume' => 'Volum',
				'initiallogin' => 'Hoved-login',
				'logout' => 'Log ut',
				'privatemessagereceived' => 'Motta privat melding',
				'invitationreceived' => 'Motta invitasjon',
				'combolistopenclose' => "Åpne/Lukke combobox liste",
				'userbannedbooted' => 'Bruker sperret eller ignorert',
				'usermenumouseover' => 'Mus over Brukermeny',
				'roomopenclose' => "Åpne/Lukke rom seksjon",
				'popupwindowopen' => 'Popup vindu åpnes',
				'popupwindowclosemin' => 'Popup vindy lukkes',
				'pressbutton' => 'Tastetrykk',
				'otheruserenters' => 'Annen bruker kommer inn i rommet',
			),

			'skin' => array(
				'inputBoxBackground' => 'Tekst boks bakgrunn',
				'privateLogBackground' => 'Privat log bakgrunn',
				'publicLogBackground' => 'Public log bakgrunn',
				'enterRoomNotify' => 'Enter rom notifikasjon',
				'roomText' => 'Rom tekst',
				'room' => 'Rom bakgrunn',
				'userListBackground' => 'Brukerliste bakgrunn',
				'dialogTitle' => 'Dialog tittel',
				'dialog' => 'Dialog bakgrunn',
				'buttonText' => 'Knappe tekst',
				'button' => 'Knapper bakgrunn',
				'bodyText' => 'Hoved tekst',
				'background' => 'Hoved bakgrunn',
				'borderColor' => 'Ramme farge',
				'selectskin' => 'Velg farve tema...',
				'buttonBorder' => 'Rammefarge knapper',
				'selectBigSkin' => 'Velg Skin...',
				'titleText' => 'Tittel tekst',
			),

			'privateBox' => array(
				'sendBtn' => 'Send',
				'toUser' => 'Snakker med USER_LABEL:',
			),

			'login' => array(
				'loginBtn' => 'Login',
				'language' => 'Språk:',
				'moderator' => '(hvis moderator)',
				'password' => 'Passord:',
				'username' => 'Brukernavn:',
			),

			'invitenotify' => array(
				'declineBtn' => 'Avslå',
				'acceptBtn' => 'Aksepter',
				'userinvited' => "'USER_LABEL' har invitert deg til chat rom 'ROOM_LABEL'",
			),

			'invite' => array(
				'sendBtn' => 'Send',
				'includemessage' => 'Inkluder denne meldingen i alle dine invitasjoner:',
				'inviteto' => 'Inviter bruker til:',
			),

			'ignore' => array(
				'ignoreBtn' => 'Ignorer',
				'ignoretext' => 'Skriv ignorer tekst',
			),

			'createroom' => array(
				'createBtn' => 'Lag',
				'private' => 'Privat',
				'public' => 'åpen',
				'entername' => 'Skriv in rom navn',
				'enterpass' => 'Skriv inn rom passord eller la bli blank for tilatelser uten passord.',
			),

			'ban' => array(
				'banBtn' => 'Ban',
				'byIP' => 'by IP',
				'fromChat' => 'fra chat',
				'fromRoom' => 'fra rom',
				'banText' => 'Skriv sperre tekst',
			),

			'common' => array(
				'cancelBtn' => 'Avbryt',
				'okBtn' => 'OK',
				
				'win_choose'         => 'Velg fil å laste opp:',
				'win_upl_btn'        => '  Last opp  ',
				'upl_error'          => 'Feil ved opplasting',
				'pls_select_file'    => 'Vennlisgt velg fil å laste opp',
				'ext_not_allowed'    => 'The FILE_EXT filtype er ikke tillatt. Vennligst velg en fil av en av disse filtyper: ALLOWED_EXT',
				'size_too_big'       => 'Filen du prøvde å dele overskrider den tillatte filstørrelsen. Vennligst prøv igjen.',
			),
			
			'sharefile' => array(
				'chat_users'=> '[ Del med Chat ]',
				'all_users' => '[ Del med Rom ]',
				'file_info_size'  => '<br>Maksimum filstørrelse er MAX_SIZE.',
				'file_info_ext' => ' Tillatte filtyper: ALLOWED_EXT',
				'win_share_only'=>'Del med',				
				'usr_message' => '<b>USER_LABEL ønsker å dele en fil med deg</b><br><br>File name: F_NAME<br>Filstørrelse: F_SIZE',				
			),
			
			'loadavatarbg' => array(
				'win_title'  => 'Custom Bakgrunn',
				'file_info'  => 'Filen bør være et non-progressive JPG bilde, eller en Flash SWF fil.',
				'use_label'  => 'Bruk denne filen for:',
				'rb_mainchat_avatar' => 'Hovedchat avatar',
				'rb_roomlist_avatar' => 'Rom liste avatar',
				'rb_mc_rl_avatar'    => 'Både Hoved chat og rom liste avatar',
				'rb_this_theme'      => 'Bakgrunn for dette tema',
				'rb_all_themes'      => 'Bakgrunn for alle temaer',
			),
			
			'loadphoto' => array(
				'win_title'  => 'Custom Bruker Foto',
				'file_info'  => 'Filen bør være et non-progressive JPG bilde, eller en Flash SWF fil.',
			),		
		),

		'desktop' => array(
			'invalidsettings' => 'Ugyldig instilling',
			'selectsmile' => 'Smilies',
			'sendBtn' => 'Send',
			'saveBtn' => 'Lagre logg',
			'clearBtn' => 'Fjern',
			'skinBtn' => 'Valg',
			'addRoomBtn' => 'Legg til',
			'myStatus' => 'Min status',
			'room' => 'Rom',
			'welcome' => 'Velkommen USER_LABEL',
			'ringTheBell' => 'Ring med bjella:',
			'logOffBtn' => 'Logg Ut',
			'helpBtn' => '?',
			'adminSign' => '',
		)
	);
?>