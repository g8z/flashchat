<?php
	$GLOBALS['fc_config']['languages']['hr'] = array(
		'name' => "Hrvatski",

		'messages' => array(
			'login' => 'Logiranje na Chat',
			'wrongPass' => 'Krivo korisničko ime ili lozinka. Pokušajte ponovo.',
			'anotherlogin' => 'Korisničko ime već postoji. Pokušajte ponovo.',
			'expiredlogin' => 'Vaša veza je istekla. Novo logiranje.',
			'enterroom' => "[ROOM_LABEL]: USER_LABEL je ušao/la u sobu u TIMESTAMP",
			'leaveroom' => "[ROOM_LABEL]: USER_LABEL je napustio/la sobu u TIMESTAMP",
			'selfenterroom' => "Dobrodošli! Ušli ste u sobu [ROOM_LABEL] u TIMESTAMP",
			'ignored' => "Korisnik 'USER_LABEL' ignorira vašu poruku",
			'banned' => "Vi ste izbačeni",
			'bellrang' => "'USER_LABEL' je pozvonio",
			//!!!
			'chatfull' => 'Chat je zauzet. Pokušajte nešto kasnije.',
			'iplimit' => 'Upravo ste registrirani na Chatu.'
		),

		'usermenu' => array(
			'profile' => "Profil",
			'unban' => "Dopustite",
			'ban' => "Izbacite",
			//!!!
			'fileshare' => 'Slanje filea',
			
			'unignore' => "Prestanite ignorirati",
			'ignore' => "Ignorirajte",
			'invite' => "Pozovite",
			'privatemessage' => "Privatna poruka"
		),

		'status' => array(
			'away' => "Odsutan",
			'busy' => "Zauzet",
			'here' => "Prisutan",
			//!!!
			'brb'  => 'BRB',
		),

		'dialog' => array(
			'misc' => array(
				'usernotfound' => "Korisnik 'USER_LABEL' nije pronađen",
				'unbanned' => "'USER_LABEL' vam je dopustio pristup:",
				'banned' => "'USER_LABEL' vas je izbacio:",
				'unignored' => "'USER_LABEL' vas je prestao ignorirati",
				'ignored' => "'USER_LABEL' vas ignorira:",
				'invitationdeclined' => "'USER_LABEL' je odbio/la vaš poziv u sobu 'ROOM_LABEL'",
				'invitationaccepted' => "'USER_LABEL' je prihvatio/la vaš poziv u sobu 'ROOM_LABEL'",
				'roomnotcreated' => "Soba ne postoji:",
				'roomnotfound' => "Soba 'ROOM_LABEL' nije pronađena",

				//!!!
				'roomisfull' => 'U sobi [ROOM_LABEL] nema sugovornika. Odaberite neku drugu sobu.',
				'alert' => '<b>Pažnja!</b><br><br>',
				'chatalert' => '<b>Pažnja!</b><br><br>',
				'gag' => "<b>Vi ste u slijedećih DURATION minuta blokirani!</b><br><br>U tome periodu možete primati poruke, ali ne i odgovarati na njih.",
				'ungagged' => "'USER_LABEL' vam je ponovo dozvolio razgovor.",	 
				'gagconfirm' => 'Korisnik USER_LABEL je blokiran slijedećih MINUTES minuta.',
				'alertconfirm' => 'USER_LABEL je pročitao/la upozorenje.',
				'file_declined' => 'USER_LABEL ne želi primiti vaše fileove.',
				'file_accepted' => 'USER_LABEL je primio/la poslane fileove.',
			),

			'unignore' => array(
				'unignoreBtn' => "Prestanak ignoriranja",
				'unignoretext' => "Upišite tekst",
			),

			'unban' => array(
				'unbanBtn' => "Dopusti pristup",
				'unbantext' => "Upišite tekst",
			),
			
			'tablabels' => array(
				'themes' => "Teme",
				'sounds' => "Zvukovi",
				'text'  => "Tekst",
				//!!!
				'effects'  => 'Efekti',
				'admin'  => "Administrator",
				//!!!
				'about' => 'O nama',
			),
			
			'text' => array(
				'itemChange' => "Promjena elemenata",
				'fontSize' => "Veličina pisma",
				'fontFamily' => "Vrsta pisma",
				'language' => "Jezik",
				'mainChat' => "Glavni Chat",
				'interfaceElements' => "Površinski elementi",
				'title' => "Naslov",
				//!!!	
				'mytextcolor' => 'Moja boja teksta za dolazeće poruke.',
			),

			//!!!
			'effects' => array(
				'avatars' => 'Avatar',
				'mainchat' => 'Prozor Chata',
				'roomlist' => 'Lista soba',
				'background' => 'Pozadina',
				'custom' => 'Izaberite...',
				'showBackgroundImages' => "Prikaži pozadinu",
				'uiAlpha' => "Transparentnost",
				'splashWindow' => 'Aktiviranje prozora u Browseru, kada dođe nova poruka.',
			),
						
			'sound' => array(
				'sampleBtn' => "Odsviraj",
				'testBtn' => "Test",
				'muteall' => "Isključi",
				'submitmessage' => "Slanje poruke",
				'reveivemessage' => "Primanje poruke",
				'enterroom' => "Uđi u sobu",
				'leaveroom' => "Napusti sobu ",
				'pan' => "Balans",
				'volume' => "Glasnoća",
				'initiallogin' => "Početni login",
				'logout' => "Izlaz",
				'privatemessagereceived' => "Primanje privatnih poruka",
				'invitationreceived' => "Primanje poziva",
				'combolistopenclose' => "Kombo lista otvori/zatvori",
				'userbannedbooted' => "Korisnik je blokiran ili odsutan",
				'usermenumouseover' => "Izbornik na korisničkom imenu",
				'roomopenclose' => "Sekcija soba otvori/zatvori",
				'popupwindowopen' => "Pop-up prozor se otvara",
				'popupwindowclosemin' => "Pop-up prozor se zatvara",
				'pressbutton' => "Pritisnite tipku",
				'otheruserenters' => "Drugi korisnik ulazi u sobu"
			),

			'skin' => array(
				'inputBoxBackground' => "Pozadina boxa za tekst",
				'privateLogBackground' => "Pozadina boxa za privatne poruke",
				'publicLogBackground' => "Pozadina boxa za javne poruke",
				'enterRoomNotify' => "Info prilikom ulaska u sobu",
				'roomText' => "Sobe",
				'room' => "Pozadina soba",
				'userListBackground' => "Pozadina korisničke liste",
				'dialogTitle' => "Naslov dijaloga",
				'dialog' => "Pozadina dijaloga",
				'buttonText' => "Tekst za dugmad",
				'button' => "Pozadina dugmadi",
				'bodyText' => "Glavni tekst",
				'background' => "Pozadina",
				'borderColor' => "Boja okvira",
				'selectskin' => "Izbor skina...",
				'buttonBorder' => "Boja okvira dugmadi",
				'selectBigSkin' => "Izbor skina...",
				'titleText' => "Tekst naslova"
			),
			
			'privateBox' => array(
				'sendBtn' => "Pošalji",
				'toUser' => "Poruka za USER_LABEL:",
			),
									
			'login' => array(
				'loginBtn' => "Login",
				'language' => "Jezik:",
				'moderator' => "(Moderator)",
				'password' => "Lozinka:",
				'username' => "Korisničko ime:",
			),

			'invitenotify' => array(
				'declineBtn' => "Odbij",
				'acceptBtn' => "Prihvati",
				'userinvited' => "'USER_LABEL' vas je pozvao/la u sobu 'ROOM_LABEL'",
			),

			'invite' => array(
				'sendBtn' => "Pošalji",
				'includemessage' => "Dodajte poruku uz poziv:",
				'inviteto' => "Pozovite korisnika u:",
			),

			'ignore' => array(
				'ignoreBtn' => "Ignoriraj",
				'ignoretext' => "Razlog ignoriranja",
			),

			'createroom' => array(
				'createBtn' => "Uredi",
				'private' => "Privatna",
				'public' => "Javna",
				'entername' => "Upišite ime sobe",
			),

			'ban' => array(
				'banBtn' => "Izbaci",
				'byIP' => "uključujući IP",
				'fromChat' => "iz Chata",
				'fromRoom' => "iz sobe",
				'banText' => "Upišite razlog izbacivanja",
			),

			'common' => array(
				'cancelBtn' => "Odustani",
				'okBtn' => "OK",

				//!!!
				'win_choose'         => 'Izaberite file za upload:',
				'win_upl_btn'        => '  Upload filea  ',
				'upl_error'          => 'Greška prilikom uploada',
				'pls_select_file'    => 'Odaberite file za download',
				'ext_not_allowed'    => 'Ekstenzija FILE_EXT nije podržana. Izaberite file koji je dozvoljen: ALLOWED_EXT',
				'size_too_big'       => 'Veličina file je veća od dozvoljene. Pokušajte ponovo.',
			),

			//!!!
			'sharefile' => array(
				'chat_users'=> '[ Pošaljite na cijeli Chat ]',
				'all_users' => '[ Pošaljite na sobu ]',
				'file_info_size'  => '<br>Dozvoljena veličina filea je MAX_SIZE.',
				'file_info_ext' => ' Dozvoljeni su fileovi sa ekstenzijom: ALLOWED_EXT',
				'win_share_only'=>'Pošaljite korisniku',				
				'usr_message' => '<b>Korisnik USER_LABEL vam želi poslati file.</b><br><br>Ime filea: F_NAME<br>Veličina: F_SIZE',				
			),
			
			//!!!	
			'loadavatarbg' => array(
				'win_title'  => 'Izbor pozadine...',
				'file_info'  => 'Vaš file treba sadržavati veću JPG-sliku odnosno Flash SWF-animaciju.',
				'use_label'  => 'File će biti korišten kao:',
				'rb_mainchat_avatar' => 'Avatar za prozor chata',
				'rb_roomlist_avatar' => 'Avatar za listu soba',
				'rb_mc_rl_avatar'    => 'Avatar za prozor chata i listu soba',
				'rb_this_theme'      => 'Pozadina samo za ovu temu',
				'rb_all_themes'      => 'Pozadina za sve teme',
			),
		),

		'desktop' => array(
			'invalidsettings' => "Neispravno podešavanje",
			'selectsmile' => "Smajlići",
			'sendBtn' => "Pošalji",
			'saveBtn' => "Spremi",
			'soundBtn' => "Zvuk",
			'skinBtn' => "Design",
			'addRoomBtn' => "Dodaj",
			'myStatus' => "Moj status",
			'room' => "Soba",
			'welcome' => "Dobrodošli USER_LABEL",
			'ringTheBell' => "Nema odgovora? Pozvonite:",
			'logOffBtn' => "X",
			'helpBtn' => "?",
			'adminSign' => ""
		)
	);
?>
