<?php
	$GLOBALS['fc_config']['languages']['fi'] = array(
		'name' => "Suomi",

		'messages' => array(
			'ignored' => "'USER_LABEL' jättää viestisi huomiotta",
			'banned' => "Sinut on asetettu porttikieltoon",
			'login' => 'Ole hyvä ja kirjaudu chättiin',
			'wrongPass' => 'Väärä käyttäjänimi tai salasana. Ole hyvä ja yritä uudelleen.',
			'anotherlogin' => 'Joku muu on kirjautuneena sinun nimelläsi. Koeta myöhemmin uudelleen.',
			'expiredlogin' => 'Yhteytesi on vanhentunut. Ole hyvä ja kirjaudu uudestaan.',
			'enterroom' => "[ROOM_LABEL]: USER_LABEL liittyi TIMESTAMP",
			'leaveroom' => "[ROOM_LABEL]: USER_LABEL lähti TIMESTAMP",
			'selfenterroom' => "Tervetuloa! Olet liitynyt [ROOM_LABEL] huoneeseen TIMESTAMP",
			'bellrang' => 'USER_LABEL soitti kelloa',
			'chatfull' => 'Chätti on täynnä. Ole hyvä ja yritä myöhemmin uudelleen.',
			'iplimit' => 'Olet jo sisällä chätissä.'
		),

		'usermenu' => array(
			'profile' => "Profiili",
			'unban' => "Poista porttikielto",
			'ban' => "Aseta porttikielto",
			'unignore' => "Ota huomioon",
			'fileshare' => 'Jaa tiedosto',
			'ignore' => "Jätä huomiotta",
			'invite' => "Kutsu",
			'privatemessage' => "Yksityisviesti",
		),

		'status' => array(
			'away' => "Poissa",
			'busy' => "Kiireinen",
			'here' => "Täällä",
			'brb'  => 'Palaa pian',
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "Huonetta 'ROOM_LABEL' ei löytynyt",
				'usernotfound' => "Käyttäjää 'USER_LABEL' ei löytynyt",
				'unbanned' => "'USER_LABEL' poisti sinulta porttikiellon",
				'banned' => "'USER_LABEL' antoi sinulle porttikiellon",
				'unignored' => "'USER_LABEL' ottaa sinut huomioon",
				'ignored' => " 'USER_LABEL' ei ota sinua huomioon",
				'invitationdeclined' => "Käyttäjä 'USER_LABEL' hylkäsi kutsun 'ROOM_LABEL' huoneeseen",
				'invitationaccepted' => "Käyttäjä 'USER_LABEL' hyväksyi kutsun 'ROOM_LABEL' huoneeseen",
				'roomnotcreated' => "Huonetta ei voitu luoda",
				'roomisfull' => '[ROOM_LABEL] on täynnä. Ole hyvä ja valitse jokin muu huone.',
				'alert' => '<b>HÄLYTYS!</b><br><br>',
				'chatalert' => '<b>HÄLYTYS!</b><br><br>',
				'gag' => "<b>Sinut on vaiennettu DURATION minuutiksi!</b><br><br>Pystyt seuraamaan viestejä tässä huoneessa, muttet voi ".
						 "kirjoittaa uusia viestejä ennen kuin vaiennus loppuu.",
				'ungagged' => "Käyttäjä 'USER_LABEL' poisti vaiennuksesi.",
				'gagconfirm' => 'USER_LABEL on vaiennettu MINUTES minuutiksi.',
				'alertconfirm' => 'USER_LABEL on nähnyt hälytyksen.',
				'file_declined' => 'Käyttäjä USER_LABEL hylkäsi tiedostosi.',
				'file_accepted' => 'Käyttäjä USER_LABEL hyväksyi tiedostosi.',
			),

			'unignore' => array(
				'unignoreBtn' => "Ota huomioon",
				'unignoretext' => "Anna huomioon ottamisen syy",
			),

			'unban' => array(
				'unbanBtn' => "Poista porttikielto",
				'unbantext' => "Anna porttikiellon poiston syy",
			),

			'tablabels' => array(
				'themes' => 'Teemat',
				'sounds' => 'Äänet',
				'text'  => 'Teksti',
				'effects'  => 'Efektit',
				'admin'  => 'Ylläpito',
				'about' => 'Tietoja',
			),

			'text' => array(
				'itemChange' => 'Muutoksen kohde',
				'fontSize' => 'Fonttikoko',
				'fontFamily' => 'Fonttityyppi',
				'language' => 'Kieli',
				'mainChat' => 'Päächätti',
				'interfaceElements' => 'Käyttöliittymän osat',
				'title' => 'Otsikko',
				'mytextcolor' => 'Käytä omaa tekstiväriäni kaikille vastaanotetuille viesteille.',
			),

			'effects' => array(
				'avatars' => 'Hahmot',
				'mainchat' => 'Päächätti',
				'roomlist' => 'Huoneluettelo',
				'background' => 'Tausta',
				'custom' => 'Räätälöinti',
				'showBackgroundImages' => 'Näytä tausta',
				'splashWindow' => 'Fokusoi ikkuna uuteen viestiin',
				'uiAlpha' => 'Läpinäkyvyys',
			),

			'sound' => array(
				'sampleBtn' => "Esimerkki",
				'testBtn' => "Testaa",
				'muteall' => "Vaimenna kaikki",
				'submitmessage' => "Lähetä viesti",
				'reveivemessage' => "Ota viesti vastaan",
				'enterroom' => "Liity huoneeseen",
				'leaveroom' => "Poistu huoneesta",
				'pan' => "Tasapaino",
				'volume' => "Äänenvoimakkuus",
				'initiallogin' => 'Sisäänkirjautuminen',
				'logout' => 'Poistuminen',
				'privatemessagereceived' => 'Vastaanota yksityisviesti',
				'invitationreceived' => 'Ota vastaan kutsu',
				'combolistopenclose' => "Avaa/sulje valikko",
				'userbannedbooted' => 'Käyttäjä asetettu porttikieltoon tai poistettu',
				'usermenumouseover' => 'Osoitin käyttäjävalikon päällä',
				'roomopenclose' => "Avaa/sulje huoneosio",
				'popupwindowopen' => 'Popup-ikkuna aukeaa',
				'popupwindowclosemin' => 'Popup-ikkuna sulkeutuu',
				'pressbutton' => 'Näppäimen painallus',
				'otheruserenters' => 'Muu käyttäjä tulee huoneeseen',
			),

			'skin' => array(
				'inputBoxBackground' => "Lähetettävän tekstin tausta",
				'privateLogBackground' => "Yksityisen keskustelun tausta",
				'publicLogBackground' => "Yleisen keskustelun tausta",
				'enterRoomNotify' => "Huoneeseen liittymisviestit",
				'roomText' => "Huoneiden tekstit",
				'room' => "Huonelistan tausta",
				'userListBackground' => "Käyttäjälistan tausta",
				'dialogTitle' => "Ikkunoiden otsikko",
				'dialog' => "Ikkunoiden tausta",
				'buttonText' => "Nappien teksti",
				'button' => "Nappien tausta",
				'bodyText' => "Yleiset tekstit",
				'background' => "Chätin tausta",
				'borderColor' => 'Reunan väri',
				'selectskin' => 'Valitse väristö...',
				'buttonBorder' => 'Nappien reunojen väri',
				'selectBigSkin' => 'Valitse skini...',
				'titleText' => 'Otsikon teksti',
			),

			'privateBox' => array(
				'sendBtn' => 'Lähetä',
				'toUser' => 'Käyttäjälle USER_LABEL:',
			),

			'login' => array(
				'loginBtn' => "Sisään",
				'language' => "Kieli:",
				'moderator' => "(jos moderaattori)",
				'password' => "Salasana:",
				'username' => "Nimimerkki:",
			),

			'invitenotify' => array(
				'declineBtn' => "Hylkää",
				'acceptBtn' => "Hyväksy",
				'userinvited' => "Käyttäjä 'USER_LABEL' kutsui sinut 'ROOM_LABEL' huoneeseen",
			),

			'invite' => array(
				'sendBtn' => "Lähetä",
				'includemessage' => "Lähetä tämä viesti kutsun mukana:",
				'inviteto' => "Kutsu käyttäjä:",
			),

			'ignore' => array(
				'ignoreBtn' => "Jätä huomiotta",
				'ignoretext' => "Anna huomiota jättämisen syy",
			),

			'createroom' => array(
				'createBtn' => "Luo",
				'private' => "Yksityinen",
				'public' => "Julkinen",
				'entername' => "Anna huoneen nimi",
			),

			'ban' => array(
				'banBtn' => "Porttikielto",
				'byIP' => "IP:n mukaan",
				'fromChat' => "chätistä",
				'fromRoom' => "huoneesta",
				'banText' => "Anna porttikiellon syy",
			),

			'common' => array(
				'cancelBtn' => "Peruuta",
				'okBtn' => 'OK',

				'win_choose'         => 'Valitse lähetettävä tiedosto:',
				'win_upl_btn'        => '  Lähetä  ',
				'upl_error'          => 'Virhe tiedoston lähetyksessä',
				'pls_select_file'    => 'Ole hyvä ja valitse lähetettävä tiedosto',
				'ext_not_allowed'    => 'Tiedostopääte FILE_EXT ei ole sallittu. Valitse tiedosto jossa on sallittu pääte: ALLOWED_EXT',
				'size_too_big'       => 'Tiedosto jonka yritit jakaa on liian suuri. Yritä uudelleen.',
			),

			'sharefile' => array(
				'chat_users'=> '[ Jaa chättiin ]',
				'all_users' => '[ Jaa huoneeseen ]',
				'file_info_size'  => '<br>Tiedoston sallittu maksimikoko on MAX_SIZE.',
				'file_info_ext' => ' Sallitut tiedostotyypit: ALLOWED_EXT',
				'win_share_only'=>'Jaa käyttäjän kanssa:',
				'usr_message' => '<b>USER_LABEL haluaa jakaa sinulle tiedoston</b><br><br>Tiedoston nimi: F_NAME<br>Koko: F_SIZE',
			),

			'loadavatarbg' => array(
				'win_title'  => 'Räätälöity tausta',
				'file_info'  => 'Tiedoston tulee olla lomittamaton JPG-kuva tai Flash SWF-tiedosto.',
				'use_label'  => 'Tiedoston käyttötarkoitus:',
				'rb_mainchat_avatar' => 'Vain päächätin hahmo',
				'rb_roomlist_avatar' => 'Vain huonelistan hahmo',
				'rb_mc_rl_avatar'    => 'Päächätin ja huonelistan hahmot',
				'rb_this_theme'      => 'Tausta vain tälle teemalle',
				'rb_all_themes'      => 'Tausta kaikille teemoille',
			),


		),

		'desktop' => array(
			'invalidsettings' => "Väärät asetukset",
			'selectsmile' => "Hymiöt",
			'sendBtn' => "Lähetä",
			'saveBtn' => "Tallenna",
			'clearBtn' => 'Tyhjennä',
			'skinBtn' => "Asetukset",
			'addRoomBtn' => "Lisää",
			'myStatus' => "Tilani",
			'room' => "Huone",
			'welcome' => "Tervetuloa USER_LABEL",
			'ringTheBell' => 'Ei vastausta? Soita kelloa:',
			'logOffBtn' => 'X',
			'helpBtn' => '?',
			'adminSign' => '',
		)
	);
?>