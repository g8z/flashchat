<?php
	$GLOBALS['fc_config']['languages']['du'] = array(
		'name' => "Nederlands",

		'messages' => array(
			'ignored' => "U wordt genegeerd door gebruiker 'USER_LABEL'",
			'banned' => "U werd geband",
			'login' => 'Meld aan voor de kwebbel',
			'wrongPass' => 'Incorrecte gebruikersnaam of paswoord. Probeer a.u.b. opnieuw.',
			'anotherlogin' => 'Een andere gebruiker is aangemeld met deze gebruikersnaam. Probeer a.u.b. opnieuw.',
			'expiredlogin' => 'Uw verbinding is verlopen. Meld u a.u.b opnieuw aan.',
			'enterroom' => "[ROOM_LABEL]: USER_LABEL is binnengekomen om TIMESTAMP",
			'leaveroom' => "[ROOM_LABEL]: USER_LABEL is weggegaan om TIMESTAMP",
			'selfenterroom' => "Welkom! Je bent kamer ROOM_LABEL binnengekomen om TIMESTAMP",
			'bellrang' => 'USER_LABEL trok aan de bel',
			'chatfull' => 'De kwebbel is vol. Probeer het later opnieuw.',
			'iplimit' => 'U bent reeds in de kwebbel.'
		),

		'usermenu' => array(
			'profile' => 'Profiel',
			'unban' => 'Stop ban',
			'ban' => 'Ban',
			'unignore' => 'Stop negeren',
			'fileshare' => 'Bestand delen',
			'ignore' => 'Negeren',
			'invite' => 'Uitnodigen',
			'privatemessage' => 'Prive bericht',
		),

		'status' => array(
			'here' => 'Aanwezig',
			'busy' => 'Bezet',
			'away' => 'Afwezig',
			'brb'  => 'BZT',
			'water' => 'Water verversen',
			'vissen' => 'Vissen voeren',
			'planten' => 'Planten snoeien',			
			'forum' => 'Forum lezen',			
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "Kamer 'ROOM_LABEL' niet gevonden",
				'usernotfound' => "Gebruiker 'USER_LABEL' niet gevonden",
				'unbanned' => "Uw ban werd opgeheven door 'USER_LABEL'",
				'banned' => "U werd geband door 'USER_LABEL'",
				'unignored' => "U wordt niet meer genegeerd door gebruiker 'USER_LABEL'",
				'ignored' => "U wordt genegeerd door gebruiker 'USER_LABEL'",
				'invitationdeclined' => "Gebruiker 'USER_LABEL' heeft uw uitnodiging voor chatruimte 'ROOM_LABEL' geweigerd",
				'invitationaccepted' => "Gebruiker 'USER_LABEL' heeft uw uitnodiging voor chatruimte 'ROOM_LABEL' geaccepteerd",
				'roomnotcreated' => "Kamer werd niet gemaakt",
				'roomisfull' => '[ROOM_LABEL] is vol. Gelieve een andere kamer te kiezen.',
				'alert' => '<b>BELANGRIJK BERICHT!</b><br><br>',
				'chatalert' => '<b>BELANGRIJK BERICHT!</b><br><br>',
				'gag' => "<b>U bent het zwijgen opgelegd voor DURATION minuten!</b><br><br>U kan de berichten in de kamer zien, maar kan niet ".
						 "aan het gesprek deelnemen, totdat de tijd verstreken is.",
				'ungagged' => "U kreeg de toestemming om terug te spreken van 'USER_LABEL'",
				'gagconfirm' => 'USER_LABEL is het zwijgen opgelegd voor MINUTES minuten.',
				'alertconfirm' => 'USER_LABEL heeft het belangrijk bericht gelezen.',
				'file_declined' => 'Uw bestand werd geweigerd door USER_LABEL.',
				'file_accepted' => 'Uw bestand werd geaccepteerd door USER_LABEL.',
			),

			'unignore' => array(
				'unignoreBtn' => "Stop negeren",
				'unignoretext' => "Bericht voor stop negeren",
			),

			'unban' => array(
				'unbanBtn' => "Stop ban",
				'unbantext' => "Bericht voor stop ban",
			),

			'tablabels' => array(
				'themes' => "Thema's",
				'sounds' => "Geluiden",
				'text'  => "Tekst",
				'effects'  => 'Effekten',
				'admin'  => "Administrator",
				'about' => 'Over',
			),

			'text' => array(
				'itemChange' => "Te veranderen item",
				'fontSize' => "Lettergrootte",
				'fontFamily' => "Lettertype",
				'language' => "Taal",
				'mainChat' => "Hoofd kamer",
				'interfaceElements' => "Interface elementen",
				'title' => "Titel",
				'mytextcolor' => 'Gebruik mijn tekstkleur voor alle ontvangen berichten.',
			),

			'effects' => array(
				'avatars' => 'Avatars',
				'mainchat' => 'Hoofd kamer',
				'roomlist' => 'Kamer lijst',
				'background' => 'Achtergrond',
				'custom' => 'Zelf gemaakt',
				'showBackgroundImages' => 'Toon achtergrond',
				'splashWindow' => 'Focus venster op nieuw bericht',
				'uiAlpha' => 'Doorzichtigheid',
			),

			'sound' => array(
				'sampleBtn' => "Voorbeeld",
				'testBtn' => "Test",
				'muteall' => "Geluid uit",
				'submitmessage' => "Verzend bericht",
				'reveivemessage' => "Ontvang bericht",
				'enterroom' => "Ga de kamer binnen",
				'leaveroom' => "Verlaat kamer",
				'pan' => "Luidspreker instellingen",
				'volume' => "Volume",
				'initiallogin' => "Aanmelden",
				'logout' => "Uitloggen",
				'privatemessagereceived' => "Prive bericht ontvangen",
				'invitationreceived' => "Uitnodiging ontvangen",
				'combolistopenclose' => "Open/sluit combinatie lijst",
				'userbannedbooted' => "Gebruiker geband/opnieuw gestart",
				'usermenumouseover' => "Muis over gebruikersmenu",
				'roomopenclose' => "Open/sluit kamer",
				'popupwindowopen' => "Open popup venster",
				'popupwindowclosemin' => "Sluit popup venster",
				'pressbutton' => "Druk knop",
				'otheruserenters' => "Gebruiker komt de kamer binnen"
			),

			'skin' => array(
				'inputBoxBackground' => "Voer invoerveld achtergrond in",
				'privateLogBackground' => "Prive logboek achtergrond",
				'publicLogBackground' => "Publieke logboek achtergrond",
				'enterRoomNotify' => "Vul kamer bericht in",
				'roomText' => "Kamer tekst",
				'room' => "Kamer achtergrond",
				'userListBackground' => "Gebruikerslijst achtergrond",
				'dialogTitle' => "Dialoog titel",
				'dialog' => "Dialoog achtergrond",
				'buttonText' => "Knop tekst",
				'button' => "Knop achtergrond",
				'bodyText' => "Inhoud tekst",
				'background' => "Hoofd achtergrond",
				'borderColor' => "Rand kleur",
				'selectskin' => "Selecteer kleur schema...",
				'buttonBorder' => "Knop rand kleur",
				'selectBigSkin' => "Selecteer uiterlijk...",
				'titleText' => "Titel tekst"
			),

			'privateBox' => array(
				'sendBtn' => "Verstuur",
				'toUser' => "Praat tegen USER_LABEL:",
			),

			'login' => array(
				'loginBtn' => "Aanmelden",
				'language' => "Taal:",
				'moderator' => "(als moderator)",
				'password' => "Paswoord:",
				'username' => "Gebruikersnaam:",
			),

			'invitenotify' => array(
				'declineBtn' => "Weiger",
				'acceptBtn' => "Accepteer",
				'userinvited' => "Gebruiker 'USER_LABEL' heeft u uitgenodigd voor kamer 'ROOM_LABEL'",
			),

			'invite' => array(
				'sendBtn' => "Verzend",
				'includemessage' => "Verzend dit bericht met je uitnodiging:",
				'inviteto' => "Nodig gebruiker uit in:",
			),

			'ignore' => array(
				'ignoreBtn' => "Negeer",
				'ignoretext' => "Vul negeer tekst in",
			),

			'createroom' => array(
				'createBtn' => "Maak",
				'private' => "Prive",
				'public' => "Publiek",
				'entername' => "Vul naam kamer in",
			),

			'ban' => array(
				'banBtn' => "Ban",
				'byIP' => "d.m.v. IP",
				'fromChat' => "van kwebbel",
				'fromRoom' => "van kamer",
				'banText' => "Vul ban tekst in",
			),

			'common' => array(
				'cancelBtn' => "Annuleren",
				'okBtn' => "Ok",

				'win_choose'         => 'Kies bestand om op te laden:',
				'win_upl_btn'        => '  Opladen  ',
				'upl_error'          => 'Bestand oplaad fout',
				'pls_select_file'    => 'A.u.b. selecteer een bestand om op te laden',
				'ext_not_allowed'    => 'De bestandsextentie FILE_EXT is niet toegelaten. Gelieve een bestand met een van de volgende extenties te kiezen: ALLOWED_EXT',
				'size_too_big'       => 'Het bestand dat u hebt proberen te delen is te groot. Gelieve opnieuw te proberen.',
			),

			'sharefile' => array(
				'chat_users'=> '[ Delen met Kwebbel ]',
				'all_users' => '[ Delen met Kamer ]',
				'file_info_size'  => '<br>De maximum bestandsgrootte is MAX_SIZE.',
				'file_info_ext' => ' Toegelaten bestandtypes: ALLOWED_EXT',
				'win_share_only'=>'Delen met',
				'usr_message' => '<b>USER_LABEL wil een bestand met u delen</b><br><br>Bestandsnaam: F_NAME<br>Bestandsgrootte: F_SIZE',
			),

			'loadavatarbg' => array(
				'win_title'  => 'Eigen achtergrond',
				'file_info'  => 'Uw bestand moet een non-progressive JPG beeld, or a Flash SWF bestand zijn.',
				'use_label'  => 'Gebruik dit bestand voor:',
				'rb_mainchat_avatar' => 'Avatar enkel voor Kwebbel',
				'rb_roomlist_avatar' => 'Avatar enkel voor kamer lijst',
				'rb_mc_rl_avatar'    => 'Avatars voor Kwebbel en kamer lijst',
				'rb_this_theme'      => 'Achtergrond enkel voor dit thema',
				'rb_all_themes'      => "Achtergrond voor alle thema's",
			),


		),

		'desktop' => array(
			'invalidsettings' => "Ongeldige instellingen",
			'selectsmile' => "Smilies",
			'sendBtn' => "Verstuur",
			'saveBtn' => "Opslaan",
			'clearBtn' => "Wissen",
			'skinBtn' => "Opties",
			'addRoomBtn' => "Voeg toe",
			'myStatus' => "Mijn status",
			'room' => "Kamer",
			'welcome' => "Welkom USER_LABEL",
			'ringTheBell' => "Trek Aan De Bel:",
			'logOffBtn' => "X",
			'helpBtn' => "?",
			'adminSign' => "(M)"
		)
	);
?>