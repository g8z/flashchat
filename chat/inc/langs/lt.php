<?php
	$GLOBALS['fc_config']['languages']['lt'] = array(
		'name' => "Lietuvių",

		'messages' => array(
			'ignored' => "Vartotojas 'USER_LABEL' ignoruoja Jūsų žinutes",
			'banned' => "Jums draudžiama įeiti į svetainę.",
			'login' => 'Prisijungimas prie pokalbių svetainės.',
			'wrongPass' => 'Neteisingas vartotojo vardas arba slaptažodis. Bandykite dar kartą.',
			'anotherlogin' => 'Šiuo vardu jau prisijungęs kitas vartotojas. Bandykite dar kartą.',
			'expiredlogin' => 'Jūsų prisijungimui baigėsi galiojimo laikas. Prašome prisijungti iš naujo.',
			'enterroom' => "[ROOM_LABEL]: USER_LABEL prisijungė TIMESTAMP",
			'leaveroom' => "[ROOM_LABEL]: USER_LABEL atsijungė TIMESTAMP",
			'selfenterroom' => "Sveiki! Jus prisijungėte prie pokalbių svetainės [ROOM_LABEL] TIMESTAMP",
			'bellrang' => 'USER_LABEL beldžiasi',
			'chatfull' => 'Svetainė pilna. Bandykite prisijungti vėliau.',
			'iplimit' => 'Jūs jau esate prisijungę.'
		),

		'usermenu' => array(
			'profile' => "Vartotojo duomenys",
			'unban' => "Nuimti draudimą",
			'ban' => "Uždrausti",
			'unignore' => "Nuimti ignoravimą",
			'fileshare' => 'Nusiųsti failą',
			'ignore' => "Ignoruoti",
			'invite' => "Pakviesti",
			'privatemessage' => "Privati žinutė"
		),

		'status' => array(
			'away' => "Toli",
			'busy' => "Užimtas",
			'here' => "Čia",
			'brb'  => 'Netrukus būsiu'
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "Svetainė 'ROOM_LABEL' nerasta",
				'usernotfound' => "Vartotojas 'USER_LABEL' nerastas",
				'unbanned' => "Vartotojas 'USER_LABEL' nuėmė Jums draudimą įeiti į pokalbių svetainę:",
				'banned' => "Vartotojas 'USER_LABEL' uždraudė Jums įeiti į pokalbių svetainę:",
				'unignored' => "Vartotojas 'USER_LABEL' nuėmė Jūsų žinučių ignoravimą:",
				'ignored' => "Vartotojas 'USER_LABEL' ignoruoja Jūsų žinutes:",
				'invitationdeclined' => "Vartotojas 'USER_LABEL' atmetė Jūsų kvietimą jungtis prie pokalbių svetainės 'ROOM_LABEL':",
				'invitationaccepted' => "Vartotojas 'USER_LABEL' priėmė Jūsų kvietimą jungtis prie pokalbių svetainės 'ROOM_LABEL':",
				'roomnotcreated' => "Svetainė nesukurta:",
				'roomisfull' => '[ROOM_LABEL] pilna. Pasirinkite kitą svetainę.',
				'alert' => '<b>DĖMESIO!</b><br><br>',
				'chatalert' => '<b>DĖMESIO!</b><br><br>',
				'gag' => "<b>Jūs nutildyti DURATION minutėms(ių)!</b><br><br>Galite diskusiją stebėti, bet negalite joje dalyvauti kol nesibaigs nutildymo laikas",
				'ungagged' => "Vartotojas 'USER_LABEL' leido jums dalyvauti diskusijoje",
				'gagconfirm' => 'USER_LABEL nutildytas MINUTES minutes(ių).',
				'alertconfirm' => 'USER_LABEL perskaitė skubų pranešimą.',
				'file_declined' => 'USER_LABEL nesutiko priimti jūsų failo.',
				'file_accepted' => 'USER_LABEL sutiko atsisiųsti failą.'
			),

			'unignore' => array(
				'unignoreBtn' => "Nuimti ignoravimą",
				'unignoretext' => "Įveskite paaiškinimą"
			),

			'unban' => array(
				'unbanBtn' => "Nuimti draudimą",
				'unbantext' => "Įveskite paaiškinimą"
			),
			'tablabels' => array(
				'themes' => 'Temos',
				'sounds' => 'Garsai',
				'text'  => 'Tekstas',
				'effects'  => 'Efektai',
				'admin'  => 'Administravimas',
				'about' => 'Apie'
			),
			'text' => array(
				'itemChange' => 'Keičiamas elementas',
				'fontSize' => 'Šrifto dydis',
				'fontFamily' => 'Šriftas',
				'language' => 'Kalba',
				'mainChat' => 'Pagrindinė svetainė',
				'interfaceElements' => 'Sąsajos elementai',
				'title' => 'Antraštė',
				'mytextcolor' => 'Naudoti mano teksto spalvą visiems gaunamiems pranešimams.'
			),
			'effects' => array(
				'avatars' => 'Avatarai',
				'mainchat' => 'Pagrindinė svetainė',
				'roomlist' => 'Svetainių sąrašas',
				'background' => 'Fonas',
				'custom' => 'Pasirinktini',
				'showBackgroundImages' => 'Rodyti foną',
				'splashWindow' => 'Aktyvuoti langą atėjus naujai žinutei',
				'uiAlpha' => 'Permatomumas'
			),
			'sound' => array(
				'sampleBtn' => "Testas",
				'testBtn' => "Testas",
				'muteall' => "Išjungti visus garsus",
				'submitmessage' => "Žinutės gavimas",
				'reveivemessage' => "Žinutės siuntimas",
				'enterroom' => "Prisijungimas prie svetainės",
				'leaveroom' => "Atsijungimas nuo svetainės",
				'pan' => "Balansas",
				'volume' => "Garsumas",
				'initiallogin' => 'Pirminis prisijungimas',
				'logout' => 'Atsijungimas',
				'privatemessagereceived' => 'Gauta privati žinutė',
				'invitationreceived' => 'Gautas kvietimas',
				'combolistopenclose' => "Iškrentančio sąrašo atidarymas/uždarymas",
				'userbannedbooted' => 'Vartotojas uždraustas/išvarytas',
				'usermenumouseover' => 'Pelės žymeklis virš vartotojų sąrašo',
				'roomopenclose' => "Svetainių sąrašo atidarymas/uždarymas",
				'popupwindowopen' => 'Iššokančio lango atidarymas',
				'popupwindowclosemin' => 'Iššokančio lango uždarymas',
				'pressbutton' => 'Klavišo paspaudimas',
				'otheruserenters' => 'Kito vartotojo prisijungimas'
			),

			'skin' => array(
				'inputBoxBackground' => "Teksto įvedimo lauko fonas",
				'privateLogBackground' => "Privačių žinučių sąrašo fonas",
				'publicLogBackground' => "Bendrų žinučių sąrašo fonas",
				'enterRoomNotify' => "Pokalbių svetainės pranešimas",
				'roomText' => "Pokalbių svetainės antraštė",
				'room' => "Pokalbių svetainės fonas",
				'userListBackground' => "Vartotojų sąrašo fonas",
				'dialogTitle' => "Dialogų antraštė",
				'dialog' => "Dialogų fonas",
				'buttonText' => "Mygtukų tekstas",
				'button' => "Mygtukų fonas",
				'bodyText' => "Pagrindinio lango tekstas",
				'background' => "Pagrindinio lango fonas",
				'borderColor' => 'Rėmelio spalva',
				'selectskin' => "Pasirinkite spalvų temą...",
				'buttonBorder' => 'Mygtukų rėmelio spalva',
				'selectBigSkin' => 'Pasirinkite kailinius...',
				'titleText' => 'Antraštės tekstas'
			),
			'privateBox' => array(
				'sendBtn' => 'Siųsti',
				'toUser' => 'Bendraujama su USER_LABEL:'
			),
			'login' => array(
				'loginBtn' => "Prisijungti",
				'language' => "Kalba:",
				'moderator' => "(moderatoriui)",
				'password' => "Slaptažodis:",
				'username' => "Vartotojo vardas:"
			),
			'invitenotify' => array(
				'declineBtn' => "Atmesti",
				'acceptBtn' => "Priimti",
				'userinvited' => "Vartotojas 'USER_LABEL' kviečia Jus prisijungti prie svetainės 'ROOM_LABEL':"
			),

			'invite' => array(
				'sendBtn' => "Siųsti",
				'includemessage' => "Įveskite paaiškinimą:",
				'inviteto' => "Pakviesti vartotoją į:"
			),

			'ignore' => array(
				'ignoreBtn' => "Ignoruoti",
				'ignoretext' => "Įveskite paaiškinimą"
			),

			'createroom' => array(
				'createBtn' => "Sukurti",
				'private' => "Privati",
				'public' => "Bendra",
				'entername' => "Įveskite svetainės pavadinimą"
			),

			'ban' => array(
				'banBtn' => "Uždrausti",
				'byIP' => "pagal IP",
				'fromChat' => "nuo svetainių",
				'fromRoom' => "nuo svetainės",
				'banText' => "Įveskite paaiškinimą"
			),

			'common' => array(
				'cancelBtn' => "Atšaukti",
				'okBtn' => "Gerai",
				'win_choose'         => 'Pasirinkite siunčiamą failą:',
				'win_upl_btn'        => '  Siųsti  ',
				'upl_error'          => 'Klaida siunčiant failą',
				'pls_select_file'    => 'Pasirinkite siunčiamą failą',
				'ext_not_allowed'    => 'Failai su plėtiniu FILE_EXT nėra leistini. Pasirinkite failą su vienu iš šių plėtinių: ALLOWED_EXT',
				'size_too_big'       => 'Jūsų pasirinktas failas viršija didžiausią galimą dydį. Bandykite pasirinkite mažesnį.'
			),
			'sharefile' => array(
				'chat_users'=> '[ Siųsti visoms svetainėms ]',
				'all_users' => '[ Siųsti svetainei ]',
				'file_info_size'  => '<br>Maksimalus šio failo dydis yra MAX_SIZE.',
				'file_info_ext' => ' Leistini failų plėtiniai: ALLOWED_EXT',
				'win_share_only'=>'Siųsti tik vartotojui',				
				'usr_message' => '<b>USER_LABEL nori jums nusiųsti failą</b><br><br>Failas: F_NAME<br>Dydis: F_SIZE'
			),
			
			'loadavatarbg' => array(
				'win_title'  => 'Pasirenkamas fonas',
				'file_info'  => 'Jūsų failas turėtų būti vieno kadro JPEG paveikslas arba Flash SWF failas.',
				'use_label'  => 'Naudoti failą šiais tikslais:',
				'rb_mainchat_avatar' => 'Tik pagrindinio lango avataras',
				'rb_roomlist_avatar' => 'Tik svetainių sąrašo avataras',
				'rb_mc_rl_avatar'    => 'Pagrindinio lango ir svetainių sąrašo avataras',
				'rb_this_theme'      => 'Tik šitos temos fonas',
				'rb_all_themes'      => 'Visų temų fonas'
			),
		),

		'desktop' => array(
			'invalidsettings' => "Neteisingi nustatymai",
			'selectsmile' => "Šypsenėlės",
			'sendBtn' => "Siųsti",
			'saveBtn' => "Išsaugoti",
			'clearBtn' => 'Išvalyti',
			'skinBtn' => "Tema",
			'addRoomBtn' => "Pridėti",
			'myStatus' => "Būsena",
			'room' => "Pokalbių svetainė",
			'welcome' => "Sveiki atvykę USER_LABEL",
			'ringTheBell' => 'Tyla? Pasibelskite:',
			'logOffBtn' => 'X',
			'helpBtn' => '?',
			'adminSign' => ''
		)
	);
?>