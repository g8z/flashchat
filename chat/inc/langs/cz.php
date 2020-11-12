<?php
	$GLOBALS['fc_config']['languages']['cz'] = array(
		'name' => "Česky",

		'messages' => array(
			'ignored' => "Uživatel 'USER_LABEL' ignoruje Vaše zprávy",
			'banned' => "Byl jste zrušen",
			'login' => 'Prosím, přihlaste se do chatu',
			'wrongPass' => 'Chybný uživatel, nebo heslo. Prosím skuste znova.',
			'anotherlogin' => 'Jiný uživatel je už přihlásen s tímto jménem. Prosím skuste znova.',
			'expiredlogin' => 'Vaše spojení expirovalo, prosím přihlaste se znova.',
			'enterroom' => "[ROOM_LABEL]: USER_LABEL se přihlásil o TIMESTAMP",
			'leaveroom' => "[ROOM_LABEL]: USER_LABEL opustil o TIMESTAMP",
			'selfenterroom' => "Vítejte! Vešli jste do [ROOM_LABEL] o TIMESTAMP",
			'bellrang' => 'USER_LABEL zazvonil se zvonečkem',
			'chatfull' => 'Chat je plný. Zkuste to, prosím, pozděj.',
			'iplimit' => 'Už jste přihlášen do chatu.'
		),

		'usermenu' => array(
			'profile' => "Profil",
			'unban' => "Přijmout",
			'ban' => "Vyhodit",
			'unignore' => "Odignorovat",
			'fileshare' => 'Sdílet soubor',
			'ignore' => "Ignorovat",
			'invite' => "Pozvat",
			'privatemessage' => "Soukromá zpráva",
		),

		'status' => array(
			'here' => "Přítomen",
			'away' => "Pryč",
			'busy' => "Zaneprázdněn",
			'brb'  => 'Hned jsem tady',
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "Místnost 'ROOM_LABEL' nenalezena",
				'usernotfound' => "Uživatel 'USER_LABEL' nenalezen",
				'unbanned' => "Byli jste přijat uživatelem 'USER_LABEL':",
				'banned' => "Byli jste vyhozený uživatelem 'USER_LABEL':",
				'unignored' => "Byli jste odignorován uživatelem 'USER_LABEL':",
				'ignored' => "Byli jste ignorován uživatelem 'USER_LABEL':",
				'invitationdeclined' => "Uživatel 'USER_LABEL' zamítnul Vaše pozvání do miestnosti 'ROOM_LABEL':",
				'invitationaccepted' => "Užívateľ 'USER_LABEL' akceptoval Vaše pozvání do místnosti 'ROOM_LABEL':",
				'roomnotcreated' => "Místnost nebyla vytvořena:",
				'roomisfull' => 'Místnost [ROOM_LABEL] je plná. Prosím, zvolte si jinou místnost.',
				'alert' => '<b>POZOR!</b><br><br>',
				'chatalert' => '<b>POZOR!</b><br><br>',
				'gag' => "<b>Byli jste umlčeni na DURATION minut!</b><br><br>Můžete se dívat na zprávy, ale ne psát ".
						 "nové zprávy do konverzace, pokým umlčení vyprší.",
				'ungagged' => "Umlčení Vám zrušil uživatel 'USER_LABEL'",		 
				'gagconfirm' => 'USER_LABEL byl umlčen pro MINUTES minut.',
				'alertconfirm' => 'USER_LABEL pročetl uporoznění.',
				'file_declined' => 'Váš soubor byl odmítnut uživatelem USER_LABEL.',
				'file_accepted' => 'Váš soubor byl akceptován uživatelem USER_LABEL.',						 
			),

			'unignore' => array(
				'unignoreBtn' => "Odignorovat",
				'unignoretext' => "Vložte zprávu",
			),

			'unban' => array(
				'unbanBtn' => "Příjmout",
				'unbantext' => "Vložte příjmací zprávu",
			),
			
			'tablabels' => array(
				'themes' => 'Témy',
				'sounds' => 'Zvuky',
				'text'  => 'Písmo',
				'effects'  => 'Efekty',
				'admin'  => 'Administrace',
				'about' => 'O Chatu',
			),
			
			'text' => array(
				'itemChange' => 'Položka pro změnu',
				'fontSize' => 'Velikost Písma',
				'fontFamily' => 'Typ Písma',
				'language' => 'Jazyk',
				'mainChat' => 'Hlavní Chat',
				'interfaceElements' => 'Prvky prostředí',
				'title' => 'Titulek',
				'mytextcolor' => 'Použi mojí barvu na všechny přijaté zprávy.',
			),
			
			'effects' => array(
				'avatars' => 'Avatari',
				'mainchat' => 'Hlavní chat',
				'roomlist' => 'Místností',
				'background' => 'Pozadí',
				'custom' => 'Vlastné',
				'showBackgroundImages' => 'Zobrazit pozadí',
				'splashWindow' => 'Zaměř okno při nové zpráve',
				'uiAlpha' => 'Průsvitnost',
			),
			
			'sound' => array(
				'sampleBtn' => "Příklad",
				'testBtn' => "Test",
				'muteall' => "Všechno tiše",
				'submitmessage' => "Odešli zprávu",
				'reveivemessage' => "Příjmout zprávu",
				'enterroom' => "Vstoupit do místnosti",
				'leaveroom' => "Opustit místnost",
				'pan' => "Pan",
				'volume' => "Hlasitost",
				'initiallogin' => 'Úvodní přihlášení',
				'logout' => 'Odhlášení',
				'privatemessagereceived' => 'Přijetí privátní zprávy',
				'invitationreceived' => 'Přijetí pozvánky',
				'combolistopenclose' => "Otevřít/Zavřít rozbalovací seznam",
				'userbannedbooted' => 'Uživatel byl zrušen nebo bootuje',
				'usermenumouseover' => 'Přejetí myši ponad uživatelské menu',
				'roomopenclose' => "Otevřít/Zavřít sekci Místnost",
				'popupwindowopen' => 'Otevře se okno',
				'popupwindowclosemin' => 'Zavře se okno',
				'pressbutton' => 'Stlačení klávesy',
				'otheruserenters' => 'Jiný užívatel vejde do místnosti',
			),

			'skin' => array(
				'inputBoxBackground' => "Pozadí vstupního textu",
				'privateLogBackground' => "Pozadí soukromého logu",
				'publicLogBackground' => "Pozadí veřejného logu",
				'enterRoomNotify' => "Upozornění při vstupe do místnosti",
				'roomText' => "Text místnosti",
				'room' => "Pozadí místnosti",
				'userListBackground' => "Pozadí zeznamu uživatelu",
				'dialogTitle' => "Titulek dialogu",
				'dialog' => "Pozadí dialogu",
				'buttonText' => "Text tlačidel",
				'button' => "Pozadí tlačidel",
				'bodyText' => "Text tela",
				'background' => "Hlavní pozadí",
				'borderColor' => 'Barva rámu',
				'selectskin' => "Vyber skin...",
				'buttonBorder' => 'Barva pozadí tlačítek',
				'selectBigSkin' => 'Vyber Skin...',
				'titleText' => 'Text titulku',
			),
			
			'privateBox' => array(
				'sendBtn' => 'Odeslat',
				'toUser' => 'Mluvíte s USER_LABEL:',
			),

			'login' => array(
				'loginBtn' => "Login",
				'language' => "Jazyk:",
				'moderator' => "(či moderátor)",
				'password' => "Heslo:",
				'username' => "Jméno uživatele:",
			),

			'invitenotify' => array(
				'declineBtn' => "Zamítnout",
				'acceptBtn' => "Akceptovat",
				'userinvited' => "Uživatel 'USER_LABEL' Vás pozval do místnosti 'ROOM_LABEL':",
			),

			'invite' => array(
				'sendBtn' => "Poslat",
				'includemessage' => "Vložit tuto zprávu s pozvánkou:",
				'inviteto' => "Pozvat užívatele do:",
			),

			'ignore' => array(
				'ignoreBtn' => "Ignorovať",
				'ignoretext' => "Vložte dôvod",
			),

			'createroom' => array(
				'createBtn' => "Vytvořit",
				'private' => "Soukromá",
				'public' => "Veřejná",
				'entername' => "Vložte jméno místnosti",
			),

			'ban' => array(
				'banBtn' => "Vyhodit",
				'byIP' => "podle IP",
				'fromChat' => "z chatu",
				'fromRoom' => "z místnosti",
				'banText' => "Vložte duvod",
			),

			'common' => array(
				'cancelBtn' => "Zrušit",
				'okBtn' => "OK",
				
				'win_choose'         => 'Vyberte soubor pro odeslání:',
				'win_upl_btn'        => '  Odešli  ',
				'upl_error'          => 'Chyba při odesílání',
				'pls_select_file'    => 'Prosím, vyberte soubor pro odeslání:',
				'ext_not_allowed'    => 'Přípona FILE_EXT není povolena. Prosím, vyberte soubor s přípou: ALLOWED_EXT',
				'size_too_big'       => 'Soubor, který chcete sdílet přesahuje maximální povolenou velikost. Prosím, zkuste to znova.',
			),
			
			'sharefile' => array(
				'chat_users'=> '[ Sdílet pro Chat ]',
				'all_users' => '[ Sdílet pro Místnost ]',
				'file_info_size'  => '<br>Maximální povolená velikost pro tento soubor je MAX_SIZE.',
				'file_info_ext' => ' Povolené typy souborů: ALLOWED_EXT',
				'win_share_only'=>'Sdílet s',				
				'usr_message' => '<b>USER_LABEL chce s vami sdílet soubor</b><br><br>Název: F_NAME<br>Velikost: F_SIZE',				
			),
			
			'loadavatarbg' => array(
				'win_title'  => 'Vlastní pozadí',
				'file_info'  => 'Soubor by měl být neprogresivní JPG obrázek, nebo Flash SWF.',
				'use_label'  => 'Použi tento soubor pro:',
				'rb_mainchat_avatar' => 'Avatar pro hlavní chat',
				'rb_roomlist_avatar' => 'Avatar pro seznam místností',
				'rb_mc_rl_avatar'    => 'Avatar pro hlavní chat a seznam',
				'rb_this_theme'      => 'Pozadí jenom pro tuhle tému',
				'rb_all_themes'      => 'Pozadí pro všechny témy',
			),
		
		
		),

		'desktop' => array(
			'invalidsettings' => "Chybné nastavení",
			'selectsmile' => "Smajlíky",
			'sendBtn' => "Poslat",
			'saveBtn' => "Uložit",
			'clearBtn' => 'Vymazat',
			'skinBtn' => 'Možnosti',
			'addRoomBtn' => 'Přidat',
			'myStatus' => "Muj status",
			'room' => 'Místnost',
			'welcome' => "Vítejte USER_LABEL",
			'ringTheBell' => 'Neodpovídá? Zazvoňte na zvoneček:',
			'logOffBtn' => 'X',
			'helpBtn' => '?',
			'adminSign' => '',
		)
	);
?>
