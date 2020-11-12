<?php
	$GLOBALS['fc_config']['languages']['ro'] = array(
		'name' => "Romana (fara diacritice)",

		'messages' => array(
			'ignored' => "'USER_LABEL' iti ignora mesajele",
			'banned' => "Ati fost blocat",
			'login' => 'Trebuie sa va autentificati',
			'wrongPass' => 'Nume utilizator sau parola gresita. Va rugam incercati din nou.',
			'anotherlogin' => 'Alt utilizator este deja autentificat cu acest nume. Va rugam incercati din nou.',
			'expiredlogin' => 'Conexiune expirata. Va rugam sa va re-autentificati.',
			'enterroom' => '[ROOM_LABEL]: USER_LABEL a intrat la TIMESTAMP',
			'leaveroom' => '[ROOM_LABEL]: USER_LABEL a plecat la TIMESTAMP',
			'selfenterroom' => 'Salut! Ai intrat in camera [ROOM_LABEL] la TIMESTAMP',
			'bellrang' => 'USER_LABEL a sunat clopotelul',
			'chatfull' => 'Chatul este plin. Va rugam incercati mai tarziu.',
			'iplimit' => 'Deja sunteti in chat.'
		),

		'usermenu' => array(
			'profile' => 'Profil',
			'unban' => 'Deblocheaza',
			'ban' => 'Blocheaza',
			'unignore' => 'Scoate ignore',
			'fileshare' => 'Trimite fisier',
			'ignore' => 'Ignora',
			'invite' => 'Invita',
			'privatemessage' => 'Mesaj privat',
		),

		'status' => array(
			'here' => 'Aici',
			'busy' => 'Ocupat',
			'away' => 'Plecat',
			'brb'  => 'Revin imediat',
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "Camera 'ROOM_LABEL' nu a fost gasita",
				'usernotfound' => "Utilizatorul 'USER_LABEL' nu a fost gasit",
				'unbanned' => "Ai fost deblocat de 'USER_LABEL'",
				'banned' => "Ai fost blocat de 'USER_LABEL'",
				'unignored' => "Nu mai esti ignorat de 'USER_LABEL'",
				'ignored' => "Esti ignorat de 'USER_LABEL'",
				'invitationdeclined' => "'USER_LABEL' a respins invitatia ta de a intra in 'ROOM_LABEL'",
				'invitationaccepted' => "'USER_LABEL' a acceptat invitatia ta de a intra in  'ROOM_LABEL'",
				'roomnotcreated' => 'Camera nu a fost creeata',
				'roomisfull' => '[ROOM_LABEL] este plina. Va rugam alegeti alta camera.',
				'alert' => '<b>ALERTA!</b><br><br>',
				'chatalert' => '<b>ALERTA!</b><br><br>',
				'gag' => "<b>Ai fost indepartat pentru DURATION minut(e)!</b><br><br>Poti vedea mesajele din aceasta camera, dar nu poti scrie mesaje".
						 "noi in conversatie, pana cand expira timpul.",
				'ungagged' => "Ai fost readus in conversatie de 'USER_LABEL'",
				'gagconfirm' => 'USER_LABEL este indepartat pentru MINUTES minut(e).',
				'alertconfirm' => 'USER_LABEL a citit alerta.',
				'file_declined' => 'Fisierul tau a fost respins de USER_LABEL.',
				'file_accepted' => 'Fisierul tau a fost acceptat de USER_LABEL.',
			),

			'unignore' => array(
				'unignoreBtn' => 'Scoate ignore',
				'unignoretext' => 'Scrie mesaj de ignorare',
			),

			'unban' => array(
				'unbanBtn' => 'Deblocheaza',
				'unbantext' => 'Scrie mesaj de deblocare',
			),

			'tablabels' => array(
				'themes' => 'Teme',
				'sounds' => 'Sunete',
				'text'  => 'Texte',
				'effects'  => 'Efecte',
				'admin'  => 'Admin',
				'about' => 'Despre',
			),

			'text' => array(
				'itemChange' => 'Obiect de schimbat',
				'fontSize' => 'Marimea Fontului',
				'fontFamily' => 'Tipul fontului',
				'language' => 'Limba',
				'mainChat' => 'Chat principal',
				'interfaceElements' => 'Elemente de interfata',
				'title' => 'Titlu',
				'mytextcolor' => 'Foloseste culoarea aceasta pentru toate mesajele primite.',
			),

			'effects' => array(
				'avatars' => 'Avataruri',
				'mainchat' => 'Chatul principal',
				'roomlist' => 'Lista camerelor',
				'background' => 'Fundal',
				'custom' => 'Particularizat',
				'showBackgroundImages' => 'Arata Fundal',
				'splashWindow' => 'Fereastra ia focus la mesaj nou',
				'uiAlpha' => 'Transparenta',
			),

			'sound' => array(
				'sampleBtn' => 'Exemplu',
				'testBtn' => 'Test',
				'muteall' => 'Scoate sunetele',
				'submitmessage' => 'Trimitere mesaj',
				'reveivemessage' => 'Primire message',
				'enterroom' => 'Intrare in camera',
				'leaveroom' => 'Iesire din camera',
				'pan' => 'Pan',
				'volume' => 'Volum',
				'initiallogin' => 'Autentificare initiala',
				'logout' => 'Deautentificare',
				'privatemessagereceived' => 'Primire mesaj privat',
				'invitationreceived' => 'Primire invitatie',
				'combolistopenclose' => "Deschidere/inchidere lista",
				'userbannedbooted' => 'Utilizatorul blocat sau a bootat',
				'usermenumouseover' => 'Mouseul deasupra meniului',
				'roomopenclose' => "Deschide/inchide sectiunea de camere",
				'popupwindowopen' => 'Popup la deschiderea ferestrei',
				'popupwindowclosemin' => 'Inchiderea ferestrei popup',
				'pressbutton' => 'Apasare tasta',
				'otheruserenters' => 'Alt utilizator intra in camera',
			),

			'skin' => array(
				'inputBoxBackground' => 'Fundalul casutei de intrare text',
				'privateLogBackground' => 'Fundalul jurnalului privat',
				'publicLogBackground' => 'Fundalul jurnalului public',
				'enterRoomNotify' => 'Notificare intrare in camera',
				'roomText' => 'Textul camerei',
				'room' => 'Fundalul camerei',
				'userListBackground' => 'Fundalul listei cu utilizatori',
				'dialogTitle' => 'Titlu dialog',
				'dialog' => 'Fundal dialog',
				'buttonText' => 'Textul butonului',
				'button' => 'Fundalul butonului',
				'bodyText' => 'Textul principal',
				'background' => 'Fundalul principal',
				'borderColor' => 'Culoarea marginii',
				'selectskin' => 'Alege schema de culori...',
				'buttonBorder' => 'Culoarea marginii butonului',
				'selectBigSkin' => 'Alege Skin...',
				'titleText' => 'Textul titlului',
			),

			'privateBox' => array(
				'sendBtn' => 'Trimite',
				'toUser' => 'Conversatie cu USER_LABEL:',
			),

			'login' => array(
				'loginBtn' => 'Autentificare',
				'language' => 'Limba:',
				'moderator' => '(moderator)',
				'password' => 'Parola:',
				'username' => 'Nume utilizator:',
			),

			'invitenotify' => array(
				'declineBtn' => 'Refuza',
				'acceptBtn' => 'Accepta',
				'userinvited' => "'USER_LABEL' Te-a invitat in 'ROOM_LABEL'",
			),

			'invite' => array(
				'sendBtn' => 'Trimite',
				'includemessage' => 'Include acest mesaj in invitatia ta:',
				'inviteto' => 'Invita utilizator in:',
			),

			'ignore' => array(
				'ignoreBtn' => 'Ignora',
				'ignoretext' => 'Scrie textul de ignorare',
			),

			'createroom' => array(
				'createBtn' => 'Creeaza',
				'private' => 'Privata',
				'public' => 'Publica',
				'entername' => 'Scrieti numele camerei',
			),

			'ban' => array(
				'banBtn' => 'Blocheaza',
				'byIP' => 'dupa IP',
				'fromChat' => 'din chat',
				'fromRoom' => 'din camera',
				'banText' => 'Scrie textul de blocare',
			),

			'common' => array(
				'cancelBtn' => 'Renunta',
				'okBtn' => 'OK',

				'win_choose'         => 'Alege fisier de uploadat:',
				'win_upl_btn'        => '  Upload  ',
				'upl_error'          => 'Eroare la uploadare',
				'pls_select_file'    => 'Va rugam alegeti fisierul de uploadat',
				'ext_not_allowed'    => 'Extensia FILE_EXT nu este permisa. Va rugam alegeti un fisier cu una din urmatoarele extensii: ALLOWED_EXT',
				'size_too_big'       => 'Fisierul pe care ati incercat sa il trimiteti are dimensiunea mai mare decat dimensiunea maxima acceptata. Va rugam incercati din nou.',
			),

			'sharefile' => array(
				'chat_users'=> '[ Trimite la chat ]',
				'all_users' => '[ Trimite la camera ]',
				'file_info_size'  => '<br>Dimensiune maxima admisa a fisierului MAX_SIZE.',
				'file_info_ext' => ' Tipuri de fisiere permise: ALLOWED_EXT',
				'win_share_only'=>'Trimite catre',
				'usr_message' => '<b>USER_LABEL vrea sa iti trimita un fisier</b><br><br>Numele Fisierului: F_NAME<br>Dimensiune fisierului: F_SIZE',
			),

			'loadavatarbg' => array(
				'win_title'  => 'Fundal particularizat',
				'file_info'  => 'Fisierul trebuie sa fie o imagine JPG neprogresiva, sau un fisier flash de tip SWF .',
				'use_label'  => 'Foloseste acest fisier pentru:',
				'rb_mainchat_avatar' => 'Doar avatarul din chatul principal',
				'rb_roomlist_avatar' => 'Doar avatarul din lista de camere',
				'rb_mc_rl_avatar'    => 'Avatarul din camera principala si cel din lista de camere',
				'rb_this_theme'      => 'Fundalul doar pentru aceasta tema',
				'rb_all_themes'      => 'Fundalul tuturor temelor',
			),


		),

		'desktop' => array(
			'invalidsettings' => 'Setari gresite',
			'selectsmile' => 'Zambete',
			'sendBtn' => 'Trimite',
			'saveBtn' => 'Salveaza',
			'clearBtn' => 'Refa starea initiala',
			'skinBtn' => 'Optiuni',
			'addRoomBtn' => 'Adauga',
			'myStatus' => 'Starea mea',
			'room' => 'Camera',
			'welcome' => 'Bine ai venit, USER_LABEL',
			'ringTheBell' => 'Nici un raspuns? Suna clopotelul:',
			'logOffBtn' => 'X',
			'helpBtn' => '?',
			'adminSign' => '',
		)
	);
?>