<?php
	$GLOBALS['fc_config']['languages']['gm'] = array(
		'name' => "Deutsch",

		'messages' => array(
			'login' => 'Zum Chat bitte einloggen',
			'wrongPass' => 'Mitgliedsname oder Passwort falsch. Bitte erneut versuchen.',
			'anotherlogin' => 'Ein anderer Nutzer ist mit diesem Namen eingeloggt. Bitte erneut versuchen.',
			'expiredlogin' => 'Deine Verbindung ist abgelaufen. Bitte erneut einloggen.',
			'enterroom' => "[ROOM_LABEL]: USER_LABEL hat den Raum um TIMESTAMP betreten",
			'leaveroom' => "[ROOM_LABEL]: USER_LABEL hat den Raum um TIMESTAMP verlassen",
			'selfenterroom' => "Willkommen! Du hast den Raum [ROOM_LABEL] um TIMESTAMP betreten",
			'ignored' => "Nutzer 'USER_LABEL' ignoriert Deine Nachrichten",
			'banned' => "Du bist gesperrt",
			'bellrang' => "'USER_LABEL' hat geklingelt",
			//!!!
			'chatfull' => 'Chat ist besetzt. Bitte versuch später nocheinmal.',
			'iplimit' => 'Du bist bereits im Chat registriert.'
		),

		'usermenu' => array(
			'profile' => "Profil",
			'unban' => "Entsperren",
			'ban' => "Sperren",
			//!!!
			'fileshare' => 'Datei abschicken',
			
			'unignore' => "Zulassen",
			'ignore' => "Ignorieren",
			'invite' => "Einladen",
			'privatemessage' => "Private Nachricht"
		),

		'status' => array(
			'away' => "Abwesend",
			'busy' => "Beschäftigt",
			'here' => "Anwesend",
			//!!!
			'brb'  => 'BRB',
		),

		'dialog' => array(
			'misc' => array(
				'usernotfound' => "Mitglied 'USER_LABEL' nicht gefunden",
				'unbanned' => "'USER_LABEL' hat Dich entsperrt:",
				'banned' => "Du wurdest gesperrt von 'USER_LABEL':",
				'unignored' => "'USER_LABEL' hat Dich wieder zugelassen",
				'ignored' => "Du wurdest ignoriert von 'USER_LABEL':",
				'invitationdeclined' => "'USER_LABEL' hat Deine Einladung in den Raum 'ROOM_LABEL' abgelehnt",
				'invitationaccepted' => "'USER_LABEL' hat Deine Einladung in den Raum 'ROOM_LABEL' angenommen",
				'roomnotcreated' => "Raum nicht eingerichtet:",
				'roomnotfound' => "Raum 'ROOM_LABEL' nicht gefunden",

				//!!!
				'roomisfull' => 'Es gibt kein Platy mehr im Raum [ROOM_LABEL]. Bitte wähle einen anderen Raum.',
				'alert' => '<b>Achtung!</b><br><br>',
				'chatalert' => '<b>Achtung!</b><br><br>',
				'gag' => "<b>Du wirst im Laufe DURATION Minute(n) gesperrt!</b><br><br>Du kannst zwar die eingekommene Nachrichten lesen, darfst sie aber im Laufe der Sperrzeit nicht beantworten.",
				'ungagged' => "Du bist wieder ins Char vom Mitglied 'USER_LABEL' zugelassen.",	 
				'gagconfirm' => 'Mitglied USER_LABEL ist für MINUTES Minute(n) gesperrt.',
				'alertconfirm' => 'USER_LABEL hat die Warnung gelesen.',
				'file_declined' => 'Mitglied USER_LABEL weigert sich Ihre Datei zu empfangen.',
				'file_accepted' => 'Mitglied USER_LABEL hat Ihre Datei empfangen.',
			),

			'unignore' => array(
				'unignoreBtn' => "Zulassen",
				'unignoretext' => "Zulassungstext eingeben",
			),

			'unban' => array(
				'unbanBtn' => "Entsperren",
				'unbantext' => "Entsperrungstext eingeben",
			),
			
			'tablabels' => array(
				'themes' => "Themen",
				'sounds' => "Töne",
				'text'  => "Text",
				//!!!
				'effects'  => 'Effekte',
				'admin'  => "Admin",
				//!!!
				'about' => 'Über uns',
			),
			
			'text' => array(
				'itemChange' => "Element zum Ändern",
				'fontSize' => "Schriftgröße",
				'fontFamily' => "Schrifttyp",
				'language' => "Sprache",
				'mainChat' => "Haupt Chat",
				'interfaceElements' => "Oberfläche elemente",
				'title' => "Titel",
				//!!!	
				'mytextcolor' => 'Meine Textfarben für eingekommene Nachrichten verwenden.',
			),

			//!!!
			'effects' => array(
				'avatars' => 'Avatar',
				'mainchat' => 'Chatfenster',
				'roomlist' => 'Raumliste',
				'background' => 'Hintergrund',
				'custom' => 'Wählen...',
				'showBackgroundImages' => "Hintergrund anzeigen",
				'uiAlpha' => "Transparenz",
				'splashWindow' => 'Browserfenster aktivieren, wenn neue Nachricht angekommen.',
			),
						
			'sound' => array(
				'sampleBtn' => "Abspielen",
				'testBtn' => "Test",
				'muteall' => "Stumm",
				'submitmessage' => "Nachricht senden",
				'reveivemessage' => "Nachricht empfangen",
				'enterroom' => "Raum betreten",
				'leaveroom' => "Raum verlassen",
				'pan' => "Balance",
				'volume' => "Lautstärke",
				'initiallogin' => "Anfangslogin",
				'logout' => "Logout",
				'privatemessagereceived' => "Private Nachrichten empfangen",
				'invitationreceived' => "Einladung empfangen",
				'combolistopenclose' => "combobox Liste öffnen/schließen",
				'userbannedbooted' => "Nutzer ist gesperrt oder ausgewiesen",
				'usermenumouseover' => "Nutzer menü mouse over",
				'roomopenclose' => "Raumsektion öffnen/schließen",
				'popupwindowopen' => "Pop-up Fenster öffnet sich",
				'popupwindowclosemin' => "Pop-up Fenster schließt sich",
				'pressbutton' => "Taste drücken",
				'otheruserenters' => "Anderer Nutzer betritt das Raum"
			),

			'skin' => array(
				'inputBoxBackground' => "Eingabebox Hintergrund",
				'privateLogBackground' => "Private Box Hintergrund",
				'publicLogBackground' => "Öffentliche Box Hintergrund",
				'enterRoomNotify' => "Raum betreten Meldung",
				'roomText' => "Räume",
				'room' => "Räume Hintergrund",
				'userListBackground' => "Mitgliederliste Hintergrund",
				'dialogTitle' => "Dialogtitel",
				'dialog' => "Dialog Hintergrund",
				'buttonText' => "Schaltflächentext",
				'button' => "Schaltfläche Hintergrund",
				'bodyText' => "Haupttext",
				'background' => "Hintergrund",
				'borderColor' => "Rahmenfarbe",
				'selectskin' => "Farben Scheme wählen...",
				'buttonBorder' => "Schaltflächen Rahmenfarbe",
				'selectBigSkin' => "Skin wählen...",
				'titleText' => "Titeltext"
			),
			
			'privateBox' => array(
				'sendBtn' => "Senden",
				'toUser' => "Sprich zum USER_LABEL:",
			),
									
			'login' => array(
				'loginBtn' => "Einloggen",
				'language' => "Sprache:",
				'moderator' => "(falls Moderator)",
				'password' => "Passwort:",
				'username' => "Mitgliedsname:",
			),

			'invitenotify' => array(
				'declineBtn' => "Ablehnen",
				'acceptBtn' => "Annehmen",
				'userinvited' => "'USER_LABEL' hat Dich in den Raum 'ROOM_LABEL' eingeladen",
			),

			'invite' => array(
				'sendBtn' => "Senden",
				'includemessage' => "Füge diese Nachricht Deiner Einladung hinzu:",
				'inviteto' => "Mitglied einladen in:",
			),

			'ignore' => array(
				'ignoreBtn' => "Ignorieren",
				'ignoretext' => "Ignoriertext eingeben",
			),

			'createroom' => array(
				'createBtn' => "Einrichten",
				'private' => "Privat",
				'public' => "Öffentlich",
				'entername' => "Raumnamen eingeben",
			),

			'ban' => array(
				'banBtn' => "Sperren",
				'byIP' => "anhand IP",
				'fromChat' => "vom Chat",
				'fromRoom' => "vom Raum",
				'banText' => "Bitte Sperrtext eingeben",
			),

			'common' => array(
				'cancelBtn' => "Abbrechen",
				'okBtn' => "OK",

				//!!!
				'win_choose'         => 'Wähle eine Datei zum Runterladen:',
				'win_upl_btn'        => '  Datei hochladen  ',
				'upl_error'          => 'Fehler beim Laden der Datei',
				'pls_select_file'    => 'Bitte, wähle eine Datei zum Runterladen',
				'ext_not_allowed'    => 'Die Erweiterung FILE_EXT der Datei wird nicht unterstützt. Bitte wähle eine Datei mit einer Erweiterung aus folgender Liste: ALLOWED_EXT',
				'size_too_big'       => 'Die Dateigröße ßberschreitet den erlaubten Wert. Versuche nocheinmal.',
			),

			//!!!
			'sharefile' => array(
				'chat_users'=> '[ An den gesammten Chat senden ]',
				'all_users' => '[ An dem Raum senden ]',
				'file_info_size'  => '<br>Maximal erlaubte Dateigröße MAX_SIZE.',
				'file_info_ext' => ' Folgende Dateierweiterungen werden unterstützt: ALLOWED_EXT',
				'win_share_only'=>'Dem Mitglied senden',				
				'usr_message' => '<b>Mitglied USER_LABEL möchte Dir eine Datei schicken.</b><br><br>Dateiname: F_NAME<br>Größe: F_SIZE',				
			),
			
			//!!!	
			'loadavatarbg' => array(
				'win_title'  => 'Hintergrund wählen...',
				'file_info'  => 'Ihre Datei soll vernunftmäßig großen JPG-Bild bzw. Flash SWF-Animation enthalten.',
				'use_label'  => 'Diese Datei wird verwendet als:',
				'rb_mainchat_avatar' => 'Avatar des Chatfensters',
				'rb_roomlist_avatar' => 'Avatar der Liste der Räume',
				'rb_mc_rl_avatar'    => 'Avatar des Chatfensters und der Liste der Räume',
				'rb_this_theme'      => 'Hintergrund nur für dieses Thema',
				'rb_all_themes'      => 'Hintergrund für alle Themen',
			),
		),

		'desktop' => array(
			'invalidsettings' => "Ungültige Einstellungen",
			'selectsmile' => "Smilies",
			'sendBtn' => "Senden",
			'saveBtn' => "Speichern",
			'soundBtn' => "Sound",
			'skinBtn' => "Design",
			'addRoomBtn' => "Hinzufügen",
			'myStatus' => "Mein Status",
			'room' => "Raum",
			'welcome' => "Willkommen USER_LABEL",
			'ringTheBell' => "Keine Antwort? Klingeln Sie:",
			'logOffBtn' => "X",
			'helpBtn' => "?",
			'adminSign' => ""
		)
	);
?>