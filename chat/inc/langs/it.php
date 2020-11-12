<?php
	$GLOBALS['fc_config']['languages']['it'] = array(
		'name' => "Italiano",

		'messages' => array(
			'ignored' => "'USER_LABEL' ha deciso di ignorare i tuoi messaggi",
			'banned' => "Sei stato bannato",
			'login' => "Si prega di effettuare login alla chat",
			'wrongPass' => "Nome utente o password errati. Riprovare.",
			'anotherlogin' => "Un altro utente è connesso col lo stesso Nome Utente. Riprovare.",
			'expiredlogin' => "Connessione terminata. Rieffettuare il login.",
			'enterroom' => "[ROOM_LABEL]: 'USER_LABEL' è entrato alle TIMESTAMP",
			'leaveroom' => "[ROOM_LABEL]: 'USER_LABEL' è uscito alle TIMESTAMP",
			'selfenterroom' => "Benvenuto! Sei entrato nella stanza [ROOM_LABEL] alle TIMESTAMP",
			'bellrang' => "USER_LABEL ha suonato il campanello",
			'chatfull' => 'Chat Piena. Riprovare.',
			'iplimit' => 'Sei già nella chat.'
		),

		'usermenu' => array(
			'profile' => "Profilo",
			'unban' => "Riammetti utente",
			'ban' => "Banna utente",
			'unignore' => "Togli l'ignora",
			'fileshare' => 'Condividi File',
			'ignore' => "Ignora",
			'invite' => "Invita",
			'privatemessage' => "Messaggio privato",
		),

		'status' => array(
			'here' => 'Presente',
			'busy' => 'Occupato',
			'away' => 'Assente',
			'brb'  => 'BRB',
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "La stanza 'ROOM_LABEL' non è stata trovata",
				'usernotfound' => "L'utente 'USER_LABEL' non è stato trovato",
				'unbanned' => "Sei stato riamesso dall'utente 'USER_LABEL'",
				'banned' => "Sei stato bandito dall'utente 'USER_LABEL'",
				'unignored' => "L'utente 'USER_LABEL' ha smesso di ignorarti",
				'ignored' => "L'utente 'USER_LABEL' ha deciso di ignorarti",
				'invitationdeclined' => "L'utente 'USER_LABEL' ha declinato il tuo invito alla stanza 'ROOM_LABEL'",
				'invitationaccepted' => "L'utente 'USER_LABEL' ha accettato il tuo invito alla stanza 'ROOM_LABEL'",
				'roomnotcreated' => "La stanza non è stata creata",
				'roomisfull' => '[ROOM_LABEL] è piena. Scegliere un altra stanza.',
				'alert' => '<b>ALLARME!</b><br><br>',
				'chatalert' => '<b>ALLARME!</b><br><br>',
				'gag' => "<b>Siete stati imbavagliati per DURATION minuto(i)!</b><br><br>Potete visualizzare i messaggi nella stanza, ma non potete inviare ".
						 "nuovi messaggi, fino al termine dell'imbavagliamento.",
				'ungagged' => "Vi è stato tolto il bavaglio dall'utente 'USER_LABEL'",
				'gagconfirm' => 'USER_LABEL è imbavagliato per MINUTES minuto(i).',
				'alertconfirm' => 'USER_LABEL ha letto l\'allarme.',
				'file_declined' => 'Il vostro file è stato rifiutato da USER_LABEL.',
				'file_accepted' => 'Il vostro file è stato accettato da USER_LABEL.',
			),

			'unignore' => array(
				'unignoreBtn' => "Disattiva Ignora",
				'unignoretext' => "Scrivere il testo per disattivare l'ignoramento",
			),

			'unban' => array(
				'unbanBtn' => "Disattiva Ban",
				'unbantext' => "Scrivi testo di riammissione",
			),

			'tablabels' => array(
				'themes' => "Temi",
				'sounds' => "Suoni",
				'text'  => "Testo",
				'effects'  => 'Effetti',
				'admin'  => 'Amministratore',
				'about' => 'Informazioni',
			),

			'text' => array(
				'itemChange' => "Elemento da cambiare",
				'fontSize' => "Dimensione Carattere",
				'fontFamily' => "Tipo Carattere",
				'language' => "Lingua",
				'mainChat' => "Chat Principale",
				'interfaceElements' => "Elementi di Interfaccia",
				'title' => "Titolo",
				'mytextcolor' => 'Utilizza il colore del testo per tutti i messaggi ricevuti.',
			),

			'effects' => array(
				'avatars' => 'Avatars',
				'mainchat' => 'Chat Principale',
				'roomlist' => 'Lista delle Stanze',
				'background' => 'Sfondo',
				'custom' => 'Personalizzato',
				'showBackgroundImages' => 'Mostra Sfondo',
				'splashWindow' => 'Attiva finestra per i nuovi messaggi',
				'uiAlpha' => 'Trasparenza',
			),

			'sound' => array(
				'sampleBtn' => "Esempio",
				'testBtn' => "Test",
				'muteall' => "Nessun suono",
				'submitmessage' => "Messaggio inviato",
				'reveivemessage' => "Messaggio ricevuto",
				'enterroom' => "Entrata nella stanza",
				'leaveroom' => "Uscita dalla stanza",
				'pan' => "Bilanciamento",
				'volume' => "Volume",
				'initiallogin' => "Login iniziale",
				'logout' => "Logout",
				'privatemessagereceived' => "Messaggio privato ricevuto",
				'invitationreceived' => "Invito ricevuto",
				'combolistopenclose' => "Apri/chiudi una lista di opzioni",
				'userbannedbooted' => "Utente bannato o mandato via",
				'usermenumouseover' => "Mouse sopra al menu utente",
				'roomopenclose' => "Apri/chiudi sezione della stanza",
				'popupwindowopen' => "Apertura di una finestra in pop-up",
				'popupwindowclosemin' => "Chiusura di una finestra di pop-up",
				'pressbutton' => "Pressione di un tasto",
				'otheruserenters' => "Entrata di un'altro utente nella stanza",
			),

			'skin' => array(
				'inputBoxBackground' => "Sfondo del box di immissione",
				'privateLogBackground' => "Sfondo dell'area privata",
				'publicLogBackground' => "Sfondo dell'area pubblica",
				'enterRoomNotify' => "Notifica di entrata nella stanza",
				'roomText' => "Testo delle stanze",
				'room' => "Sfondo delle stanze",
				'userListBackground' => "Sfondo lista utenti",
				'dialogTitle' => "Titolo dialoghi",
				'dialog' => "Sfondo dialoghi",
				'buttonText' => "Testo dei bottoni",
				'button' => "Sfondo dei bottoni",
				'bodyText' => "Testo principale",
				'background' => "Sfondo principale",
				'borderColor' => "Colore dei bordi",
				'selectskin' => "Scegli schema di colori...",
				'buttonBorder' => "Colore dei bordi dei bottoni",
				'selectBigSkin' => "Scegli Skin...",
				'titleText' => "Testo del titolo",
			),

			'privateBox' => array(
				'sendBtn' => "Invia",
				'toUser' => "Stai parlando con USER_LABEL:",
			),

			'login' => array(
				'loginBtn' => "Login",
				'language' => "Lingua:",
				'moderator' => "(se moderatore)",
				'password' => "Password:",
				'username' => "User Name:",
			),

			'invitenotify' => array(
				'declineBtn' => "Declina",
				'acceptBtn' => "Accetta",
				'userinvited' => "'USER_LABEL' ti invita a chattare nella stanza 'ROOM_LABEL'",
			),

			'invite' => array(
				'sendBtn' => "Invia",
				'includemessage' => "Includi questo messaggio al tuo invito:",
				'inviteto' => "Invita l'utente a:",
			),

			'ignore' => array(
				'ignoreBtn' => "Ignora",
				'ignoretext' => "Scrivere il testo per motivare l'ignore",
			),

			'createroom' => array(
				'createBtn' => "Crea",
				'private' => "Privato",
				'public' => "Pubblico",
				'entername' => "Scrivere il nome della stanza",
			),

			'ban' => array(
				'banBtn' => "Interdici",
				'byIP' => "dall'IP",
				'fromChat' => "dalla chat",
				'fromRoom' => "dalla stanza",
				'banText' => "Scriver il testo per motivare di ban",
			),

			'common' => array(
				'cancelBtn' => "Annulla",
				'okBtn' => "Ok",

				'win_choose'         => 'Scegliere il file per l\'upload:',
				'win_upl_btn'        => '  Upload  ',
				'upl_error'          => 'Errore nell\'upload del file',
				'pls_select_file'    => 'Scegliere il file per l\'upload',
				'ext_not_allowed'    => 'L\'estensione file FILE_EXT non è permessa. Si prega di scegliere un file con una delle seguenti estensioni: ALLOWED_EXT',
				'size_too_big'       => 'Il file che avete provato a condividere eccede la grandezza massima dei file consentita. Riprovare.',
			),


			'sharefile' => array(
				'chat_users'=> '[ Condividi con la Chat ]',
				'all_users' => '[ Condividi con la Stanza ]',
				'file_info_size'  => '<br>La grandezza massima permessa di questo file MAX_SIZE.',
				'file_info_ext' => ' Tipi di File Permessi: ALLOWED_EXT',
				'win_share_only'=>'Condividi con',
				'usr_message' => '<b>USER_LABEL vuole condividere un file con te</b><br><br>Nome del File: F_NAME<br>Grandezza File: F_SIZE',
			),

			'loadavatarbg' => array(
				'win_title'  => 'Sfondo Personalizzato',
				'file_info'  => 'Il vostro file non deve essere un immagine JPG progressiva, o un file Flash SWF.',
				'use_label'  => 'Usa questo file per:',
				'rb_mainchat_avatar' => 'Solo l\'avatar della chat Principale',
				'rb_roomlist_avatar' => 'Solo l\'avatar per la lista delle stanze',
				'rb_mc_rl_avatar'    => 'Avatar sia per la chat principale e la lista delle stanze',
				'rb_this_theme'      => 'Sfondo solo per questo tema',
				'rb_all_themes'      => 'Sfondo per tutti i temi',
			),

		),

		'desktop' => array(
			'invalidsettings' => "Impostazioni non valide",
			'selectsmile' => "Sorrisi",
			'sendBtn' => "Invia",
			'saveBtn' => "Salva",
			'soundBtn' => "Suoni",
			'skinBtn' => "Opzioni",
			'addRoomBtn' => "Aggiungi",
			'myStatus' => "Il mio stato",
			'room' => "Stanza",
			'welcome' => "Benvenuto USER_LABEL",
			'ringTheBell' => "Non ricevi risposta? Suona il campanello:",
			'logOffBtn' => "X",
			'helpBtn' => "?",
			'adminSign' => "(M)",
		)
	);
?>
