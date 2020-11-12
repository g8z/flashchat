<?php
	$GLOBALS['fc_config']['languages']['pl'] = array(
		'name' => "Polski",

		'messages' => array(
			'ignored' => "'USER_LABEL' ingoruje twoje wiadomości",
			'banned' => "Zostałeś banowany",
			'login' => 'Logowanie do czatu',
			'wrongPass' => 'Niepoprawna nazwa lub hasło. Spróbuj ponownie.',
			'anotherlogin' => 'Ktoś inny obecnie używa tej nazwy. Spróbuj ponownie.',
			'expiredlogin' => 'Sesja wygasła. Zaloguj się ponownie.',
			'enterroom' => '[ROOM_LABEL]: USER_LABEL wszedł o godz. TIMESTAMP',
			'leaveroom' => '[ROOM_LABEL]: USER_LABEL wyszedł o godz. TIMESTAMP',
			'selfenterroom' => 'Witaj! Wszedłeś do [ROOM_LABEL] o godz. TIMESTAMP',
			'bellrang' => 'USER_LABEL zadzwonił',
			'chatfull' => 'Czat jest pełen. Spróbuj później.',
			'iplimit' => 'Jesteś już na czacie.'
		),

		'usermenu' => array(
			'profile' => 'Profil',
			'unban' => 'Nie banuj',
			'ban' => 'Banuj',
			'unignore' => 'Nie ignoruj',
			'fileshare' => 'Dziel plik',
			'ignore' => 'Ignoruj',
			'invite' => 'Zaproś',
			'privatemessage' => 'Wiadomość prywatna',			
		),

		'status' => array(
			'here' => 'Obecny',
			'busy' => 'Zajęty',
			'away' => 'Nieobecny',
			'brb'  => 'Zaraz wracam',			
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "Pokój 'ROOM_LABEL' nie znaleziony",
				
'usernotfound' => "Użytkownik 'USER_LABEL'  nie znaleziony",
				'unbanned' => "Nie jesteś już banowany przez użytkownika 'USER_LABEL'",
				'banned' => "Jesteś banowany przez użytkownika 'USER_LABEL'",
					'unignored' => "Nie jesteś już ignorowany przez użytkownika 'USER_LABEL'",
				'ignored' => "Jesteś ignorowany przez użytkownika 'USER_LABEL'",
				'invitationdeclined' => "Użytkownik 'USER_LABEL' odrzucił zaproszenie do pokoju 'ROOM_LABEL'",
				'invitationaccepted' => "Użytkownik 'USER_LABEL' przyjął twoje zaproszenie do pokoju 'ROOM_LABEL'",
				'roomnotcreated' => 'Nie utworzono pokoju',
				'roomisfull' => '[ROOM_LABEL] jest pełny. Wybierz inny pokój.',
				'alert' => '<b>UWAGA!</b><br><br>',
				'chatalert' => '<b>UWAGA!</b><br><br>',
				'gag' => "<b>Jesteś zawieszony przez DURATION minut(y)!</b><br><br>Możesz widzieć wiadomości, ale nie możesz brać udziału ".
						 "nowe wiadomości w rozmowie, aż zawieszenie upłynie.",
				'ungagged' => "Zostałeś odwieszony przez użytkownika 'USER_LABEL'",		 
				'gagconfirm' => 'USER_LABEL zawieszony na MINUTES minut(y).',
				'alertconfirm' => 'USER_LABEL przeczytał uwagę.',
				'file_declined' => 'Twój plik został odrzucony przez USER_LABEL.',
				'file_accepted' => 'Twój plik został zaakceptowany przez USER_LABEL.',
			),

			'unignore' => array(
				'unignoreBtn' => 'Nie ignoruj',
				'unignoretext' => 'Wpisz komentarz nieignorowania',
			),

			'unban' => array(
				'unbanBtn' => 'Nie banuj',
				'unbantext' => 'Wpisz komentarz do niebanowania',
			),
			
			'tablabels' => array(
				'themes' => 'Tematy',
				'sounds' => 'Dźwięki',
				'text'  => 'Tekst',
				'effects'  => 'Efekty',
				'admin'  => 'Administracja',
				'about' => 'O programie',
			),

			'text' => array(
				'itemChange' => 'Element do Zmiany',
				'fontSize' => 'Rozmiar Czcionki',
				'fontFamily' => 'Czcionka',
				'language' => 'Język',
				'mainChat' => 'Główny Czat',
				'interfaceElements' => 'Elementy Interfejsu',
				'title' => 'Tytuł',
				'mytextcolor' => 'Użyj mojego koloru tekstu dla wszystkich otrzymanych wiadomości.',
			),
			
			'effects' => array(
				'avatars' => 'Avatary',
				'mainchat' => 'Główny czat',
				'roomlist' => 'Lista pokojów',
				'background' => 'Tło',
				'custom' => 'Własne ustawienia',
				'showBackgroundImages' => 'Pokaż tło',
				'splashWindow' => 'Ustaw okno na nowej wiadomości',
				'uiAlpha' => 'Przezroczystość',
			),

			'sound' => array(
				'sampleBtn' => 'Próbka',
				'testBtn' => 'Test',
				'muteall' => 'Wycisz wszystko',
				'submitmessage' => 'Wysłanie wiadomości',				'reveivemessage' => 'Odebranie wiadomości',
				'enterroom' => 'Wejście do pokoju',
				'leaveroom' => 'Opuszczenie pokoju',
				'pan' => 'Balans',
				'volume' => 'Głośność',
				'initiallogin' => 'Początkowy login',
				'logout' => 'Wylogowanie',
				'privatemessagereceived' => 'Odebranie prywatnej wiadomości',
				'invitationreceived' => 'Odebranie zaproszenia',
				'combolistopenclose' => "Otwórz/zamknij listę combobox",
				'userbannedbooted' => 'Użytkownik banowany lub wyrzucony',
				'usermenumouseover' => 'Menu użytkownika w mouse over',
				'roomopenclose' => "Sekcja otwarcia/zamykania pokoju",
				'popupwindowopen' => 'Otwieranie okna popup',
				'popupwindowclosemin' => 'Zamykanie okna popup',
				'pressbutton' => 'Naciśnięcie klawisza',
				
'otheruserenters' => 'Inni użytkownicy wchodzą do pokoju',
			),

			'skin' => array(
				'inputBoxBackground' => 'Tło pola wprowadzania tekstu',
				'privateLogBackground' => 'Tło prywatnego logu',
				'publicLogBackground' => 'Tło publicznego logu',
				'enterRoomNotify' => 'Powiadomienie o wejściu do pokoju',
				'roomText' => 'Kolor tekstu pokoju',
				'room' => 'Tło pokoju',
				'userListBackground' => 'Tło listy użytkowników',
				'dialogTitle' => 'Tytuł dialogu',
				'dialog' => 'Tło dialogu',
				'buttonText' => 'Tekst na przycisku',
				'button' => 'Tło przycisku',
				'bodyText' => 'Tekst',
				'background' => 'Główne tło',
				'borderColor' => 'Kolor obramowania',
				'selectskin' => 'Wybór Koloru Schematu...',
				'buttonBorder' => 'Kolor obramowania przycisku',
				'selectBigSkin' => 'Wybór Skórki...',
				'titleText' => 'Tekst tytułu',
			),

			'privateBox' => array(
				'sendBtn' => 'Wyślij',
				'toUser' => 'Rozmawia z USER_LABEL:',
			),

			'login' => array(
				'loginBtn' => 'Zaloguj',
				'language' => 'Język:',
				'moderator' => '(jeśli moderator)',
				'password' => 'Hasło:',
				'username' => 'Nazwa użytkownika:',
			),

			'invitenotify' => array(
				'declineBtn' => 'Odrzuć',
				'acceptBtn' => 'Akceptuj',
				'userinvited' => "Użytkownik 'USER_LABEL' zaprosił cię do pokoju 'ROOM_LABEL'",
			),

			'invite' => array(
				'sendBtn' => 'Wyślij',
				'includemessage' => 'Załącz tę wiadomość do zaproszenia:',
				'inviteto' => 'Zaproś użytkownika do:',
			),

			'ignore' => array(
				'ignoreBtn' => 'Ignoruj',
				'ignoretext' => 'Komunikat inorowania',
			),

			'createroom' => array(
				'createBtn' => 'Utwórz',
				'private' => 'Prywatny',
				'public' => 'Publiczny',
				'entername' => 'Wprowadź nazwę pokoju',
			),

			'ban' => array(
				'banBtn' => 'Banuj',
				'byIP' => 'wg IP',
				'fromChat' => 'z czatu',
				'fromRoom' => 'z pokoju',
				'banText' => 'Komunikat do banowania',
			),

			'common' => array(
				'cancelBtn' => 'Anuluj',
				'okBtn' => 'OK',
				
				'win_choose'         => 'Wybierz plik do załadowania:',
				'win_upl_btn'        => '  Załadowanie  ',
				'upl_error'          => 'Błąd podczas załadowania pliku',
				'pls_select_file'    => 'Wybierz plik do załadowania',
				'ext_not_allowed'    => 'Rozszerzenie pliku  FILE_EXT jest niedozwolone. Wybierz plik zawierający następujące rozszerzenie: ALLOWED_EXT',
				'size_too_big'       => 'Plik, który usiłujesz dzielić przekracza maksymalną dopuszczalną objętość. Spróbuj ponownie.',
			),
			
			'sharefile' => array(
				'chat_users'=> '[ Dziel dla Czatu ]',
				'all_users' => '[ Dziel dla Pokoju ]',
				'file_info_size'  => '<br>Maksymalna dopuszczalna objętość tego pliku MAX_SIZE.',
				'file_info_ext' => ' Dopuszczalne Typy Plików: ALLOWED_EXT',
				'win_share_only'=>'Dziel z',				
				'usr_message' => '<b>Użytkownik USER_LABEL chce dzielić plik z tobą</b><br><br>Nazwa pliku: F_NAME<br>Objętość pliku: F_SIZE',				
			),
			
			'loadavatarbg' => array(
				'win_title'  => 'Tło preferowane',
				'file_info'  => 'Twój plik powinien być obrazem JPG (nie progresywny) lub plikiem Flasha - SWF.',
				'use_label'  => 'Użyj ten plik dla:',
				'rb_mainchat_avatar' => 'Tylko główny avatar czatu',
				'rb_roomlist_avatar' => 'Tylko avatar listy pokojów',
				'rb_mc_rl_avatar'    => 'Avatarowie głównego czatu i listy pokojów',
				'rb_this_theme'      => 'Tło tylko dla tego tematu',
				'rb_all_themes'      => 'Tło dla wszystkich tematów',
			),
			
			
		),

		'desktop' => array(
			'invalidsettings' => 'Niepoprawne ustawienia',
			'selectsmile' => 'Buźki',
			'sendBtn' => 'Wyślij',
			'saveBtn' => 'Zapisz',
			'clearBtn' => 'Wyczyść',
			'skinBtn' => 'Opcje',
			'addRoomBtn' => 'Dodaj',
			'myStatus' => 'Mój status',
			'room' => 'Pokój',
			'welcome' => 'Witaj USER_LABEL',
			'ringTheBell' => 'Brak odpowiedzi? Zadzwoń:',
			'logOffBtn' => 'X',
			'helpBtn' => '?',
			'adminSign' => '',
		)
	);
?>