<?php
	$GLOBALS['fc_config']['languages_admin']['da'] = array(
		'name'=>'Dansk',
		'admin_index.tpl' => array(
			't0' => 'FlashChat Administrations Panel',
			't1' => 'Dette redskab giver FlashChat administratorer mangfoldige muligheder for at se chat logs, resat  chat logs, og tilføje/redigere/fjern/slette room.',
			't2' => 'Der er {$usrnumb} registerede brugere'
		),
		'banlist.tpl' => array(
			't0' => 'Bandlysning/forbud',
			't1' => 'oprettet',
			't2' => 'bruger',
			't3' => 'bandlysningnedbruger',
			't4' => 'roomid',
			't5' => 'bandlysning niveau',
			't6' => 'fjern fjern bandlysning',
			't7' => 'Ingen Bandlysning fundet'
		),
		'bot.tpl' => array(
			't0' => 'bot',
			't1' => 'bot navn',
			't2' => 'bot room list avatar ',
			't3' => 'Ingen',
			't4' => 'bot /main chat avatar',
			't5' => 'login til room',
			't6' => 'navn &lt;X brugere er til stede',
			't7' => 'aktiv når&gt;X brugere er til stede',
			't8' => 'aktiv når   bruges i "support" tilstand',
			't9' => 'aktiv når en admin ikke er til stede',
			't10' => 'aktiv når der er Ingen  bots i room',
			't11' => 'aktiv når en bestemt bruger er til stede',
			't12' => 'Bots er deaktiveret i dit system.',
			't13' => ' bot kunne ikke tilføjes fordi bot installationen blev skippet i  FlashChat installationen.',
			't14' => 'vær venligr at køre igen installationen for at aktiver bot support.'
		),
		'botlist.tpl' => array(
			't0' => 'Bots',
			't1' => 'Tilføj ny bot',
			't2' => 'Bot Navn',
			't3' => 'Slet',
			't4' => 'Ingen bots fundet',
			't5' => ' bot funktionen er for øjeblikket deaktiveret. Til aktivering af bot support, sat "Aktiver Bots" til "Ja" i " GenerelleSettings" konfigurations sektion af dette admin panel.',
			't6' => 'Duhar maspørge behov  for at  køre   FlashChat installationen igen for  også  at  tilføje det nødvendige basis kendskab.'
		),
		'chatlist.tpl' => array(
			't0' => ' denne option er ikke tilgængelig når FlashChat er integreret med en custom CMS (content management system).',
			't1' => ' ',
			't2' => 'I dette room:',
			't3' => 'Et nyt room',
			't4' => 'imellem disse datør:',
			't5' => 'og',
			't6' => 'fra   sidste X dage:',
			't7' => 'af initiator:',
			't8' => 'en ny bruger',
			't9' => 'af moderator:',
			't10' => 'Room navn',
			't11' => 'initiator login',
			't12' => 'moderator  login',
			't13' => 'Start',
			't14' => ' Slut ',
			't15' => 'prese',
			't16' => 'Ingen Moderator',
			't17' => 'Ingen chats fundet',
			't18' => 'vær venlig at brug bruger Administrationsen redskaber som kommer  med dit system til  at tilføje,redigere, eller  fjern brugere.',
			't19' => 'Vis chats',
			't20' => 'Ryd filter',
			't21' => 'fjern beskeder',
			't22' => 'Sendt',
			't23' => 'Fra',
			't24' => 'To',
			't25' => 'Besked',
			't26' => 'Vis beskeder '
		),
		'connlist.tpl' => array(
			't0' => 'Forbindelser',
			't1' => 'opdgå ind iet',
			't2' => 'oprettet',
			't3' => 'bruger',
			't4' => 'room id',
			't5' => 'stat',
			't6' => 'farve',
			't7' => 'Start',
			't8' => 'sprog',
			't9' => 'tzoffsat',
			't10' => 'vært',
			't11' => 'Ingen Forbindelser fundet'
		),
		'ignorelist.tpl' => array(
			't0' => 'Ignorerer',
			't1' => 'oprettet',
			't2' => 'bruger',
			't3' => 'ignoreret bruger',
			't4' => ' fjern ignorere',
			't5' => 'Ingen ignorerer fundet'
		),
		'logout.tpl' => array(
			't0' => 'FlashChat Admin Panel Logud',
			't1' => 'Du er blevet logged ud.',
			't2' => 'Klik her til login',
			't3' => 'Hvis Du  bruger FlashChat integreret med en custom CMS (content management system), så kan Du maspørge stadig være logged på, afhængig af hvordan dit system lagrer brugerdata.',
			't4' => 'FlashChat  er ikke installeret.'
		),
		'msglist.tpl' => array(
			't0' => 'Beskeder',
			't1' => 'I dette room:',
			't2' => 'Et nyt room',
			't3' => 'imellem disse datør:',
			't4' => 'og',
			't5' => 'fra de sidste X dage:',
			't6' => 'af denne bruger:',
			't7' => 'en ny bruger',
			't8' => 'som indeholder dette nøgleord:',
			't9' => 'Sendt',
			't10' => 'fra bruger',
			't11' => 'til room',
			't12' => 'til bruger',
			't13' => 'Ingen beskeder fundet',
			't14' => 'Vis beskeder',
			't15' => 'Ryd filter',
			't16' => ' fjern beskeder'
		),
		'nopermit.tpl' => array(
			't0' => 'Du har ikke den  nødvenige Adgangstilladerlse   til dette redskab.'
		),
		'room.tpl' => array(
			't0' => 'Room',
			't1' => 'navn',
			't2' => 'password',
			't3' => 'offentlig',
			't4' => 'permanent',
			't5' => 'Tilføj nyt room',
			't6' => 'Opdgå ind i room',
			't7' => ' fjern room'
		),
		'uninstall.tpl' => array(
			't0' => 'FlashChat er de-installeret.',
			't1' => 'FlashChat er ikke installeret.',
			't2' => 'De-installer',
			't3' => ' fjern alle FlashChat taklokkeer fra My SQL.denne option tillader dig at  køre installationen igen.',
			't4' => 'Du har maspørge behov for at re-uploade "install _files" folderen  og  installere .php filen install _files før re-install .',
			't5' => 'De følgende taklokkeer vil blive permanent  fjernet:',
			't6' => ' fjern alle Konfig filer fra cache dir. denne option  tillader dig at  køre installationen igen.',
			't7' => 'Du har maspørge behov for at re-uploade "install _files" folderen  og  install .php filen install _files før re-install  .',
			't8' => 'I forstår at disse Handlinger  ikke kan ændres.',
			't9' => 'Er Du sikker?!?denne Handling kan ikke ændres!',
			't10' => 'Fortsæt',
			't11' => 'Annuler'
		),
		'user.tpl' => array(
			't0' => 'denne option ikke ertilgængelig når FlashChat er integreret meden custom CMS (contentmanagement system).',
			't1' => 'bruger',
			't2' => 'login',
			't3' => 'password',
			't4' => ' ',
			't5' => 'vær venlig at brug bruger Administrations redskaberne som kommer med dit system til at tilføje,redigere, eller  fjern brugere.',
			't6' => 'Tilføj ny bruger',
			't7' => 'Opdgå ind i bruger',
			't8' => ' fjern bruger'
		),
		'usrlist.tpl' => array(
			't0' => 'denne option ikke ertilgængelig når FlashChat er integreret meden custom CMS (contentmanagement system).',
			't1' => 'Brugere',
			't2' => 'Tilføj ny bruger',
			't3' => 'id',
			't4' => 'login',
			't5' => 'password',
			't6' => 'rule',
			't7' => 'Ingen brugere fundet',
			't8' => 'vær venligr atbruge   bruger Administrationsen redskaber som kommer med dit system til tilføje,redigere, eller  fjern brugere.'
		),
		'top.tpl' => array(
			't0' => 'Home',
			't1' => 'Main',
			't2' => 'Konfigurations',
			't3' => 'Beskeder',
			't4' => 'Chats',
			't5' => 'Brugere',
			't6' => 'Rooms',
			't7' => 'Forbindelser',
			't8' => 'Benns',
			't9' => 'Ignorerer',
			't10' => 'Bots',
			't11' => 'De-installer',
			't12' => 'Log ud'
		),
		'roomlist.tpl' => array(
			't0' => 'Rooms',
			't1' => 'Tilføj nyt room',
			't2' => 'navn',
			't3' => 'password',
			't4' => 'offentlig',
			't5' => 'permanent',
			't6' => 'Bump op',
			't7' => 'Slet',
			't8' => 'Submit alle',
			't9' => 'Du skal re-loade chat (genopfrisk siden) og re-login for at se room ændringer.',
			't10' => 'Ingen  room fundet',
			't11' => 'redigere'
		),
		'login.tpl' => array(
			't0' => 'FlashChat Admin Panel Login',
			't1' => 'login',
			't2' => 'password',
			't3' => 'vælg sprog',
			't4' => 'login',
			't5' => 'Kunne ikke give admin rule for dette login og password.',
			't6' => 'FlashChat er ikke installeret.'
		),
		'cnf_top.tpl' => array(
			't0' => 'Chat Instances',
			't1' => ' GenerelleSettings',
			't2' => 'Forbindelses Settings',
			't3' => 'Besked storage',
			't4' => 'tema farver og images',
			't5' => 'Layout manager',
			't6' => 'Font Settings',
			't7' => 'lyd',
			't8' => 'Smilies',
			't9' => 'avatars',
			't10' => 'file deling',
			't11' => 'Moduler',
			't12' => 'Preloader',
			't13' => 'Logud Settings',
			't14' => 'Sprog',
			't15' => 'Bandlysningdlyste ord / Quick tekst',
			't16' => 'alle andre Settings'
		),
		'cnf_avatars' => array(
			't762' => array(
				'value' => 'Mod Kun:'
			),
			't763' => array(
				'value' => 'Main Chat Default Value:',
				'hint' => 'smilie kode'
			),
			't764' => array(
				'value' => 'Main Chat Default Stat:',
				'hint' => 'i = check a/on af default'
			),
			't765' => array(
				'value' => 'Main Chat tillader Override:',
				'hint' => 'HvisIngen, kode ikke være ændret (combo box er deaktiveret)'
			),
			't766' => array(
				'value' => 'Room Default Value:',
				'hint' => 'smilie kode'
			),
			't767' => array(
				'value' => 'Room Default Stat:',
				'hint' => 'i = checka/on afdefault'
			),
			't768' => array(
				'value' => 'Room tillader Override:',
				'hint' => 'HvisIngen, kan ikke være ændret (combo box er deaktiveret)'
			),
			't769' => array(
				'value' => 'Main Chat Default Value:',
				'hint' => ' smilie kode'
			),
			't770' => array(
				'value' => 'Main Chat Default Stat:',
				'hint' => 'i = checka/onafdefault'
			),
			't771' => array(
				'value' => 'Main Chat tillader Override:',
				'hint' => 'HvisIngen, kan ikke være ændret (combo box er deaktiveret)'
			),
			't772' => array(
				'value' => 'Room Default Value:',
				'hint' => ' smilie kode'
			),
			't773' => array(
				'value' => 'Room Default Stat:',
				'hint' => 'i = checka/onafdefault'
			),
			't774' => array(
				'value' => 'Room tillader Override:',
				'hint' => 'HvisIngen, kan ikke være ændret (combo box er deaktiveret)'
			),
			't775' => array(
				'value' => 'Main Chat Default Value:',
				'hint' => ' smilie kode'
			),
			't776' => array(
				'value' => 'Main Chat Default Stat:',
				'hint' => 'i = checka/onafdefault'
			),
			't777' => array(
				'value' => 'Main Chat tillader Override:',
				'hint' => 'HvisIngen, kan ikke være ændret (combo box er deaktiveret)'
			),
			't778' => array(
				'value' => 'Room Default Value:',
				'hint' => ' smilie kode'
			),
			't779' => array(
				'value' => 'Room Default Stat:',
				'hint' => 'i = checka/onafdefault'
			),
			't780' => array(
				'value' => 'Room tillader Override:',
				'hint' => 'HvisIngen, kan ikke være ændret (combo box er deaktiveret)'
			),
			't781' => array(
				'value' => 'Main Chat Default Value:',
				'hint' => ' smilie kode'
			),
			't782' => array(
				'value' => 'Main Chat Default Stat:',
				'hint' => 'i = checka/onafdefault'
			),
			't783' => array(
				'value' => 'Main Chat tillader Override:',
				'hint' => 'HvisIngen, kan ikke være ændret (combo box er deaktiveret)'
			),
			't784' => array(
				'value' => 'Room Default Value:',
				'hint' => ' smilie kode'
			),
			't785' => array(
				'value' => 'Room Default Stat:',
				'hint' => 'i = checka/onafdefault'
			),
			't786' => array(
				'value' => 'Room tillader Override:',
				'hint' => 'HvisIngen, kan ikke være ændret (combo box er deaktiveret)'
			),
			't787' => array(
				'value' => 'Main Chat Default Value:',
				'hint' => ' smilie kode'
			),
			't788' => array(
				'value' => 'Main Chat Default Stat:',
				'hint' => 'i = checka/onafdefault'
			),
			't789' => array(
				'value' => 'Main Chat tillader Override:',
				'hint' => 'HvisIngen, kan ikke være ændret (combo box er deaktiveret)'
			),
			't790' => array(
				'value' => 'Room Default Value:',
				'hint' => ' smilie kode'
			),
			't791' => array(
				'value' => 'Room Default Stat:',
				'hint' => 'i = checka/onafdefault'
			),
			't792' => array(
				'value' => 'Room tillader Override:',
				'hint' => 'HvisIngen, kan ikke være ændret (combo box er deaktiveret)'
			),
			't793' => array(
				'value' => 'Main Chat Default Value:',
				'hint' => ' smilie kode'
			),
			't794' => array(
				'value' => 'Main Chat Default Stat:',
				'hint' => 'i = checka/onafdefault'
			),
			't795' => array(
				'value' => 'Main Chat tillader Override:',
				'hint' => 'HvisIngen, kan ikke være ændret (combo box er deaktiveret)'
			),
			't796' => array(
				'value' => 'Room Default Value:',
				'hint' => ' smilie kode'
			),
			't797' => array(
				'value' => 'Room Default Stat:',
				'hint' => 'i = checka/onafdefault'
			),
			't798' => array(
				'value' => 'Room tillader Override:',
				'hint' => 'HvisIngen, kan ikke være ændret (combo box er deaktiveret)'
			),
			't0' => 'Skhvist setting for:',
			't1' => 'M Setting',
			't2' => 'K Setting',
			't3' => 'Gem Settings'
		),
		'cnf_badwords' => array(
			't0' => 'Stjerne mærker (*) kan være brugt til indikere partielle matcher.forladhøjre felt tom til brug for default substitutions tekst, eller indsæt tekst til  højre for at sætte en spechvisik erstatnings tekst for det bandlysningdlyste  ord.
',
			't2' => 'denne funktion kan også være brugt for "Quick Tekst"Hvis der er phrase  Du bruger ofte. For example "hsår" kunne være ændret til "Hej, hvordan går det ?"af spechvisicerende  "hsår" som bandlysningdlyst ord, og tilsvarende Sætning som tekst erstatning.',
			't3' => 'Default Erstatnings Tekst:',
			't4' => 'Tilføje',
			't5' => 'On',
			't6' => 'Off',
			't7' => 'Slet',
			't8' => 'Deaktiver allefiltre',
			't9' => 'Gem Settings',
			't10' => 'Er Du sikker Du ønsker at slette dette ord?\bemærk:dette ord vil gå tabt.',
		),
		'cnf_conn' => array(
			't23' => array(
				'value' => 'Flood interval:',
				'hint' => 'i sekunder,   mængden af tid som skal gå før brugeren sender ikke tilstede besked'
			),
			't24' => array(
				'value' => 'Inaktivitets interval:',
				'hint' => 'i sekunder ,Hvis en bruger har FlashChat åbner I (InaktivitetsInterval) sekunder'
			),
			't799' => array(
				'value' => 'Besked Request Interval:',
				'hint' => 'chat genoptaget tid, sekunder'
			),
			't800' => array(
				'value' => 'Besked Request Intervalaltid:',
				'hint' => 'chat genoptaget tid i altid stat, sekunder'
			),
			't802' => array(
				'value' => 'ENuTil Logud ENfter:',
				'hint' => 'tid af pooling uvirksomhed efter som bruger anses for at være logged af, sekunder'
			),
			't803' => array(
				'value' => 'ENuTil Luk ENfter:',
				'hint' => 'tid af pooling uvirksomhed efter som forbindelse er  fjernet fra database, sekunder'
			),
			't804' => array(
				'value' => 'Hjælpe Url:',
				'hint' => 'Du kan brug også Hjælpe.php'
			),

			't801' => array(
				'value' => 'Message Remove After:',
				'hint' => 'message removed after this time, second'
			)
		),
		'cnf_const' => array(
			't626' => array(
				'value' => 'Default Skin Navn:'
			),
			't627' => array(
				'value' => 'Default Skin SWF navn:'
			),
			't628' => array(
				'value' => 'Default XP Skin Navn:'
			),
			't629' => array(
				'value' => 'Default XP Skin SWF navn:'
			),
			't630' => array(
				'value' => 'Default Aquspørgin Navn:'
			),
			't631' => array(
				'value' => 'Default Aquspørgin SWF navn:'
			),
			't632' => array(
				'value' => 'Default Gradient Skin Navn:'
			),
			't633' => array(
				'value' => 'Default Aquspørgin SWF navn:'
			)
		),
		'cnf_filesharing' => array(
			't830' => array(
				'value' => 'tillader Room deling:',
				'hint' => 'Moderator kan altid dele bredde  til alle brugere i room -denne option er kun for Ingen-Moderator'
			),
			't831' => array(
				'value' => 'tillader Chat deling:',
				'hint' => 'Moderator kan altid dele bredde til alle brugere i chat -denne option er kun for Ingen-Moderator'
			),
			't832' => array(
				'value' => 'tillader file Udvidelser:',
				'hint' => "tillader  file udvidelser, adskilt ved Komma ( tillader alle udvidelser sat til \'\')"
			),
			't833' => array(
				'value' => 'Maximum fil Størrelse:',
				'hint' => 'max fil størrelse i bytes (2*1024*1024 = 2Mb)'
			),
			't834' => array(
				'value' => 'Maximum file Liv I Timer:',
				'hint' => 'tid i timer til lagring af file i serveren(file vil være slettet efter dette )'
			),
			't835' => array(
				'value' => 'tillader file Udvidelser:',
				'hint' => "tillader file udvidelser, komma adskilt ved (Til tillader alle udvidelser sat til \'\')"
			),
			't836' => array(
				'value' => 'Maximum file Størrelse:',
				'hint' => 'max file størrelse i bytes (2*1024*1024 = 2Mb)'
			),
			't837' => array(
				'value' => 'Maximum file Liv I Timer:',
				'hint' => 'tid i timer til lagring  af file i serveren(file vil være slettet  )'
			),
			't838' => array(
				'value' => 'tillader file Udvidelser:',
				'hint' => "tillader file udvidelser, komma adskilt ved (Til tillader alle udvidelser sat til \'\')"
			),
			't839' => array(
				'value' => 'Maximum file Størrelse:',
				'hint' => 'max file størrelse i bytes (2*1024*1024 = 2Mb)'
			),
			't840' => array(
				'value' => 'Maximum fil Liv I Timer:',
				'hint' => '[DEN tid i timer til lagring  af file i serveren(file vil være slettet  )'
			),
			't0' => 'Chat file deling',
			't1' => 'Avatar baggrund loading',
			't2' => 'Bruger phoTil loading',
			't3' => 'Ja',
			't4' => 'Ingen',
			't5' => 'Gem Settings',
			't6' => 'bytes',
			't7' => 'timer'
		),
		'cnf_font' => array(
			't635' => array(
				'value' => 'Aktiver Tekst Farve Override:',
				'hint' => 'defaults (til stede : er som option synlig eller skjult)'
			),
			't636' => array(
				'value' => 'tillader Skhvist:',
				'hint' => 'defaults (til stede : er som option synlig eller skjult)'
			),
			't637' => array(
				'value' => 'Default Størrelse:',
				'hint' => 'defaults (til stede : er som option synlig eller skjult)'
			),
			't638' => array(
				'value' => 'Font Familie:',
				'hint' => 'defaults (til stede : er som option synlig eller skjult)'
			),
			't639' => array(
				'value' => 'tillader Skhvist:',
				'hint' => 'defaults (til stede : er som option synlig eller skjult)'
			),
			't640' => array(
				'value' => 'Default Størrelse:',
				'hint' => 'defaults (til stede : er som option synlig eller skjult)'
			),
			't641' => array(
				'value' => 'Font Familie:',
				'hint' => 'defaults (til stede : er som option synlig eller skjult)'
			),
			't642' => array(
				'value' => 'tillader Skhvist:',
				'hint' => 'defaults (til stede : er som option synlig eller skjult)'
			),
			't643' => array(
				'value' => 'Default Størrelse:',
				'hint' => 'defaults (til stede : er som option synlig eller skjult)'
			),
			't644' => array(
				'value' => 'Font Familie:',
				'hint' => 'defaults (til stede : er som option synlig eller skjult)'
			),
			't0' => 'Ja',
			't1' => 'Ingen',
			't2' => 'Main Chat',
			't3' => 'Interface Elementer',
			't4' => 'Titel',
			't5' => 'Font Størrelse:',
			't6' => 'Font Familie:',
			't7' => 'Navn',
			't8' => 'Deaktiveret',
			't9' => 'Gem Settings'
		),
		'cnf_general' => array(
			't3' => array(
				'value' => 'Debug tilstand:',
				'hint' => 'sat til sand til kørsel i debug tilstand'
			),
			't4' => array(
				'value' => 'FlashChat version:',
				'hint' => 'arkitektur udgivelse . funktionen udgivelse . patch udgivelse'
			),
			't5' => array(
				'value' => 'Aktiverer socket server:',
				'hint' => 'sat til sand til aktivering af socket server - se online PDF dokumenter for flere detaljer'
			),
			't6' => array(
				'value' => 'Aktiver"Live Support" tilstand:',
				'hint' => "sat til sand til chat brug i \'Live Support\' tilstand"
			),
			't7' => array(
				'value' => 'Aktiver fejlmeldinger:',
				'hint' => 'sat til sand til aktivering af fejlmeldinger'
			),
			't8' => array(
				'value' => 'Aktiver Bots:<br>Du skal re-installere  FlashChat til aktivering af Bot option',
				'hint' => 'sat til sand til aktivering af Bots'
			),
			't9' => array(
				'value' => 'Virtuel IP af bot:',
				'hint' => 'Virtuel ip af bot'
			),
			't10' => array(
				'value' => 'Deaktiveret bruger liste selv menu:',
				'hint' => 'sat til falsk tillader selv popup menu'
			),
			't11' => array(
				'value' => 'tillader bekræftelse popup vindue for admin (Moderator):',
				'hint' => 'sat til sand til tillader bekræftelse popup vindue for admin (Moderator)'
			),
			't12' => array(
				'value' => 'Label format:',
				'hint' => 'mulige værdier er enhver kombinationer af AVATAR, BRUGER og TIDSTEMPEL'
			),
			't13' => array(
				'value' => 'Tid stamp format:',
				'hint' => 'pattern for PHP date function'
			),
			't14' => array(
				'value' => 'Max logins per IP adresse:',
				'hint' => 'antal af logins tilladt per IP adresse'
			),
			't15' => array(
				'value' => 'Deaktiveret IRC kommandoer:',
				'hint' => 'Du kan sætte liste af IRC kommandoer til Deaktiveret her, ligesom (back,backtid)'
			),
			't16' => array(
				'value' => 'Deaktiveret IRC kommandoer for Moderator:',
				'hint' => 'Moderator Restriktioner (som IRC kommandoer er Deaktiveret for Moderator)'
			),
			't17' => array(
				'value' => 'Moderator Restriktioner i admin sektion:',
				'hint' => 'Moderator Restriktioner i admin sektion (admin.php), ligesom (bots,uninstall ,Forbindelser,brugere)'
			),
			't18' => array(
				'value' => 'Maximum indsæt tekst størrelse:',
				'hint' => 'maximum indsæt tekst størrelse, # characters'
			),
			't19' => array(
				'value' => 'Maximum antal af  beskeder chat log:',
				'hint' => 'maximum antal af  beskeder lagret i  chat log'
			),
			't20' => array(
				'value' => '  alle  room med brugere:',
				'hint' => 'Hvissand bruger liste åbner alle  room med brugere tilstede'
			),
			't21' => array(
				'value' => 'Vis logud vindue:',
				'hint' => 'Hvis falsk, så brug kun   ....src=logud.php metode, men ikke brug   popup metode overhovedet'
			),
			't22' => array(
				'value' => 'Logud vindue derplay tid:',
				'hint' => 'i sekunder'
			),
			't25' => array(
				'value' => 'Splash chat vindue når all besked er modtaget:',
				'hint' => 'splash Ingen active chat vindue når ny besked er modtaget'
			),
			't26' => array(
				'value' => 'Default room:',
				'hint' => 'primary key af room hvor alle brugere går efter login'
			),
			't27' => array(
				'value' => 'ENuTil fjern room:',
				'hint' => 'antal af sekunder før room er fjernet'
			),
			't28' => array(
				'value' => 'Room titel i brugerliste:',
				'hint' => 'format string for room titel i brugerliste'
			),
			't29' => array(
				'value' => 'Maximum brugere per room:'
			),
			't30' => array(
				'value' => 'Listeorden:',
				'hint' => 'options: Alfabetisk, a til Z, Orden adgang til room, Mods & Admins first, så a til Z, Mods & Admins first, så adgang, Orden af bruger status, Mods & Admins first, så af bruger status'
			),
			't31' => array(
				'value' => 'CMS system:',
				'hint' => 'defaultCMS - default CMS, blank - statless CMS'
			),
			't32' => array(
				'value' => 'Login UTF8 dekode:',
				'hint' => 'mulig values - sand, falsk'
			),
			't33' => array(
				'value' => 'encrypt password:',
				'hint' => 'option til encrypt bruger password for defaultCMS, kan være 1 - encrypt og 0 - Ingen encrypt'
			),
			't34' => array(
				'value' => 'Automotd:',
				'hint' => '1 for on, 0 for off (on betyder   er der played ved chat indgang)'
			),
			't35' => array(
				'value' => 'Autotopic:',
				'hint' => '1 for on, 0 for off (on betyder den/t er derplayed ved room indgang)'
			),
			't36' => array(
				'value' => 'Admin Gåord:<br>kun brugbarHvisStatless (Guest) CMS er brugt',
				'hint' => 'tilladers enhver bruger til login som a adminertrator - statless CMS tilstand kun'
			),
			't37' => array(
				'value' => 'Moderator Gåord:<br>kun brugbarHvisStatless (Guest) CMS er brugt',
				'hint' => 'tilladers enhver bruger til login som a Moderator - statless CMS tilstand kun'
			),
			't38' => array(
				'value' => 'Spy Gåord:<br>kun brugbarHvisStatless (Guest) CMS er brugt',
				'hint' => 'tilladers enhver bruger til login som a spy - statless CMS tilstand kun'
			),
			't981' => array(
				'value' => 'Max antal af backtidkommandominutes:',
				'hint' => 'sats   maximum antal af minutes   backtidkommandovil serve op, brug 0 til have Ingen max'
			),
			't982' => array(
				'value' => 'Max antal af backtidkommandolines:',
				'hint' => 'sats   maximum antal af lines   backkommandovil serve op, brug 0 til have Ingen max'
			),
			't1104' => array(
				'value' => 'Flag hvisrdette er betaltchat instance',
				'hint' => 'sat til 1 hvis dette er betalt instance'
			),
			't1105' => array(
				'value' => 'Membership Beløb (hvisdetteer betalt chat instance)',
				'hint' => 'hvisdetteer abetaltinstance,venligst Opdgå ind i mågda for membership'
			),
			't1106' => array(
				'value' => 'Specificer hvisrdetteer a test tilstand (hvisdetteer betalt chat instance)',
				'hint' => 'hvisdetteer betalt instance,venligst Specificer hvisrdetteer a test tilstand'
			),
			't1107' => array(
				'value' => 'Paypal bussiness email (hvisdetteer betalt chat instance)',
				'hint' => 'hvisdetteer abetaltinstance,venligst Specificer Curracy bussiness email'
			),
			't1108' => array(
				'value' => 'Møntfod (hvisdetteer betalt chat instance)',
				'hint' => "hvisdetteer abetaltinstance,venligst nævn   møntfod for eg: \'USD\'"
			),
			't1109' => array(
				'value' => 'Aktiver java socket server:',
				'hint' => 'sat til sand til aktivering afsocket server - see online PDF dokumgå ind i for flere detaljer'
			),
			't1110' => array(
				'value' => 'Cache type: (Til skhvist cache Settings, Du skal re-install  FlashChat)',
				'hint' => '0 = Ingen caching, 1 = begrænset caching, 2 =fuldcaching'
			),
			't1111' => array(
				'value' => 'Cache path:',
				'hint' => '0 = Ingen caching, 1 = begrænset caching, 2 =fuldcaching'
			),
			't1112' => array(
				'value' => 'Cache fil prefix:',
				'hint' => '0 = Ingen caching, 1 = begrænset caching, 2 =fuldcaching'
			),
			't1190' => array(
				'value' => 'Bruger titel i brugerliste:',
				'hint' => 'mulig values er enhver kombinationer af AVATAR, BRUGER og STATUS'
			),
			't2' => array(
				'value' => 'Server tid offsat:',
				'hint' => 'sats server tid offsat (kun til correct server tidzone problem)'
			),
			't1192' => array(
				'value' => 'LinjeskiftTekst:',
				'hint' => 'linjeskifttekst'
			),

			't1193' => array(
				'value' => 'Volume Increment:',
				'hint' => 'volume increment'
			),

			't1194' => array(
				'value' => 'Pan Increment:',
				'hint' => 'pan increment'
			),

			't1195' => array(
				'value' => 'Transparency Increment:',
				'hint' => 'transparency increment'
			),

			't625' => array(
				'value' => 'Default Theme:'
			),

			't634' => array(
				'value' => 'Default Skin:'
			),

			't670' => array(
				'value' => 'Special language:'
			),

			't805' => array(
				'value' => 'Auto Un-banned After:',
				'hint' => 'time after user is un-banned, seconds'
			),

			't806' => array(
				'value' => 'Default Language:',
				'hint' => 'two-letter code of the default language (see below)'
			),

			't807' => array(
				'value' => 'Allow Language:',
				'hint' => 'allow user to choose another language'
			)
		),
		'cnf_layout' => array(
			't39' => array(
				'value' => 'tillader Bandlysning:'
			),
			't40' => array(
				'value' => 'tillader Invitations:'
			),
			't41' => array(
				'value' => 'tillader Ignorerer:'
			),
			't42' => array(
				'value' => 'tillader Profiles:'
			),
			't43' => array(
				'value' => 'tillader Opret Rooms:'
			),
			't44' => array(
				'value' => 'tillader file Deling:'
			),
			't45' => array(
				'value' => 'tillader Custom Baggrunds:',
				'hint' => 'HvisIngen, effects tab Customs tast dervist'
			),
			't46' => array(
				'value' => 'Vis Option Panel:'
			),
			't47' => array(
				'value' => 'Vis Indsæt Box:'
			),
			't48' => array(
				'value' => 'Vis Private Log:'
			),
			't49' => array(
				'value' => 'Vis Offentlig Log:'
			),
			't50' => array(
				'value' => 'Vis Bruger Liste:'
			),
			't51' => array(
				'value' => 'Vis Logud:'
			),
			't52' => array(
				'value' => 'Er Single Room Tilstand:',
				'hint' => 'HvisJa room drop-down er synlig'
			),
			't53' => array(
				'value' => 'tillader Private Besked:'
			),
			't54' => array(
				'value' => 'Vis Adresse:'
			),
			't55' => array(
				'value' => 'Vis status liste:'
			),
			't56' => array(
				'value' => 'Vis options tast:'
			),
			't57' => array(
				'value' => 'Vis farve liste:'
			),
			't58' => array(
				'value' => 'Vis Gem tast:'
			),
			't59' => array(
				'value' => 'Vis Hjælpe tast:'
			),
			't60' => array(
				'value' => 'Vis smilies liste:',
				'hint' => 'Deaktiveret,combo liste,popup vindue'
			),
			't61' => array(
				'value' => 'Vis Ryd tast:'
			),
			't62' => array(
				'value' => 'Vis klokke:'
			),
			't63' => array(
				'value' => 'tema tab:',
				'hint' => 'som tabs til Vis i   options panel (bud tab kan ikke være skjult)'
			),
			't64' => array(
				'value' => 'lyd tab:'
			),
			't65' => array(
				'value' => 'Effects tab:'
			),
			't66' => array(
				'value' => 'Tekst tab:'
			),
			't67' => array(
				'value' => 'Minimum Bredde:',
				'hint' => 'minimal bredde af bruger listese, pixels'
			),
			't68' => array(
				'value' => 'Default Bredde:',
				'hint' => 'eksakt bredde af brugerliste, percat'
			),
			't69' => array(
				'value' => 'Relative Bredde;',
				'hint' => 'relative bredde af brugerliste, percat'
			),
			't70' => array(
				'value' => 'Docked Bredde:',
				'hint' => 'relative bredde af docked brugerliste, percat'
			),
			't71' => array(
				'value' => 'Docked  højde:',
				'hint' => 'relative  højde af docked brugerliste, percat'
			),
			't72' => array(
				'value' => 'Position:',
				'hint' => 'position i   trin p.v. er HØJRE eller VENSTRE'
			),
			't73' => array(
				'value' => 'Minimum  højde:',
				'hint' => 'minimal  højde af offentlig log, pixels'
			),
			't74' => array(
				'value' => 'Default  højde:',
				'hint' => 'eksakt  højde af offentlig log, pixels'
			),
			't75' => array(
				'value' => 'Relative  højde:',
				'hint' => 'relative  højde af offentlig log, percat'
			),
			't76' => array(
				'value' => 'Minimum  højde:'
			),
			't77' => array(
				'value' => 'Default  højde:'
			),
			't78' => array(
				'value' => 'Relative  højde:'
			),
			't79' => array(
				'value' => 'Minimum  højde:'
			),
			't80' => array(
				'value' => 'Default  højde:'
			),
			't81' => array(
				'value' => 'Relative  højde:'
			),
			't82' => array(
				'value' => 'Position:',
				'hint' => 'position i   trin p.v. er BOTTOM eller TOP'
			),
			't83' => array(
				'value' => 'tillader Bandlysning:'
			),
			't84' => array(
				'value' => 'tillader Invitations:'
			),
			't85' => array(
				'value' => 'tillader Ignorerer:'
			),
			't86' => array(
				'value' => 'tillader Profiles:'
			),
			't87' => array(
				'value' => 'tillader Opret Rooms:'
			),
			't88' => array(
				'value' => 'tillader file Deling:'
			),
			't89' => array(
				'value' => 'tillader Custom Baggrunds:',
				'hint' => 'HvisIngen, effects tab Customs tast dervist'
			),
			't90' => array(
				'value' => 'Vis Option Panel:'
			),
			't91' => array(
				'value' => 'Vis Indsæt Box:'
			),
			't92' => array(
				'value' => 'Vis Private Log:'
			),
			't93' => array(
				'value' => 'Vis Offentlig Log:'
			),
			't94' => array(
				'value' => 'Vis Bruger Liste:'
			),
			't95' => array(
				'value' => 'Vis Logud:'
			),
			't96' => array(
				'value' => 'Er Single Room Tilstand:',
				'hint' => 'HvisJa room drop-down er synlig'
			),
			't97' => array(
				'value' => 'tillader Private Besked:'
			),
			't98' => array(
				'value' => 'Vis Adresseee:'
			),
			't99' => array(
				'value' => 'Vis status liste:'
			),
			't100' => array(
				'value' => 'Vis options tast:'
			),
			't101' => array(
				'value' => 'Vis farve liste:'
			),
			't102' => array(
				'value' => 'Vis Gem tast:'
			),
			't103' => array(
				'value' => 'Vis Hjælpe tast:'
			),
			't104' => array(
				'value' => 'Vis smilies liste:',
				'hint' => 'Deaktiveret,combo liste,popup vindue'
			),
			't105' => array(
				'value' => 'Vis Ryd tast:'
			),
			't106' => array(
				'value' => 'Vis klokke:'
			),
			't107' => array(
				'value' => 'temas tab:',
				'hint' => 'som tabs til Vis i   options panel (Abud tab kan ikke være skjult)'
			),
			't108' => array(
				'value' => 'lyd tab:'
			),
			't109' => array(
				'value' => 'Effects tab:'
			),
			't110' => array(
				'value' => 'Tekst tab:'
			),
			't111' => array(
				'value' => 'Minimum Bredde:',
				'hint' => 'minimal bredde af bruger listese, pixels'
			),
			't112' => array(
				'value' => 'Default Bredde:',
				'hint' => 'eksakt bredde af brugerliste, percat'
			),
			't113' => array(
				'value' => 'Relative Bredde:',
				'hint' => 'relative bredde af brugerliste, percat'
			),
			't114' => array(
				'value' => 'Docked Bredde:',
				'hint' => 'relative bredde af docked brugerliste, percat'
			),
			't115' => array(
				'value' => 'Docked  højde:',
				'hint' => 'relative  højde af docked brugerliste, percat'
			),
			't116' => array(
				'value' => 'Position:',
				'hint' => 'position i   trin p.v. er HØJRE eller VENSTRE'
			),
			't117' => array(
				'value' => 'Minimum  højde:',
				'hint' => 'minimal  højde af offentlig log, pixels'
			),
			't118' => array(
				'value' => 'Default  højde:',
				'hint' => 'eksakt  højde af offentlig log, pixels'
			),
			't119' => array(
				'value' => 'Relative  højde:',
				'hint' => 'relative  højde af offentlig log, percat'
			),
			't120' => array(
				'value' => 'Minimum  højde:'
			),
			't121' => array(
				'value' => 'Default  højde:'
			),
			't122' => array(
				'value' => 'Relative  højde:'
			),
			't123' => array(
				'value' => 'Minimum  højde:'
			),
			't124' => array(
				'value' => 'Default  højde:'
			),
			't125' => array(
				'value' => 'Relative  højde:'
			),
			't126' => array(
				'value' => 'Position:',
				'hint' => 'position i   trin p.v. er BOTTOM eller TOP'
			),
			't127' => array(
				'value' => 'tillader Bandlysning:'
			),
			't128' => array(
				'value' => 'tillader Invitations:'
			),
			't129' => array(
				'value' => 'tillader Ignorerer:'
			),
			't130' => array(
				'value' => 'tillader Profiles:'
			),
			't131' => array(
				'value' => 'tillader Opret Rooms:'
			),
			't132' => array(
				'value' => 'tillader file Deling:'
			),
			't133' => array(
				'value' => 'tillader Custom Baggrunds:',
				'hint' => 'HvisIngen,  effects tab Customs tast dervist'
			),
			't134' => array(
				'value' => 'Vis Option Panel:'
			),
			't135' => array(
				'value' => 'Vis Indsæt Box:'
			),
			't136' => array(
				'value' => 'Vis Private Log:'
			),
			't137' => array(
				'value' => 'Vis Offentlig Log:'
			),
			't138' => array(
				'value' => 'Vis Bruger Liste:'
			),
			't139' => array(
				'value' => 'Vis Logud:'
			),
			't140' => array(
				'value' => 'Er Single Room Tilstand:',
				'hint' => 'HvisJa room drop-down er synlig'
			),
			't141' => array(
				'value' => 'tillader Private Besked:'
			),
			't142' => array(
				'value' => 'Vis Adresse:'
			),
			't143' => array(
				'value' => 'Vis status liste:'
			),
			't144' => array(
				'value' => 'Vis options tast:'
			),
			't145' => array(
				'value' => 'Vis farve liste:'
			),
			't146' => array(
				'value' => 'Vis Gem tast:'
			),
			't147' => array(
				'value' => 'Vis Hjælpe tast:'
			),
			't148' => array(
				'value' => 'Vis smilies liste:',
				'hint' => 'Deaktiveret,combo liste,popup vindue'
			),
			't149' => array(
				'value' => 'Vis Ryd tast:'
			),
			't150' => array(
				'value' => 'Vis klokke:'
			),
			't151' => array(
				'value' => 'temas tab:',
				'hint' => 'som tabs til Vis i   options panel (Abud tab kan ikke være skjult)'
			),
			't152' => array(
				'value' => 'lyd tab:'
			),
			't153' => array(
				'value' => 'Effects tab:'
			),
			't154' => array(
				'value' => 'Tekst tab:'
			),
			't155' => array(
				'value' => 'Minimum Bredde:',
				'hint' => 'minimal bredde af bruger listese, pixels'
			),
			't156' => array(
				'value' => 'Default Bredde:',
				'hint' => 'eksakt bredde af brugerliste, percat'
			),
			't157' => array(
				'value' => 'Relative Bredde:',
				'hint' => 'relative bredde af brugerliste, percat'
			),
			't158' => array(
				'value' => 'Docked Bredde:',
				'hint' => 'relative bredde af docked brugerliste, percat'
			),
			't159' => array(
				'value' => 'Docked  højde:',
				'hint' => 'relative  højde af docked brugerliste, percat'
			),
			't160' => array(
				'value' => 'Position:',
				'hint' => 'position i   trin p.v. er HØJRE eller VENSTRE'
			),
			't161' => array(
				'value' => 'Minimum  højde:',
				'hint' => 'minimal  højde af offentlig log, pixels'
			),
			't162' => array(
				'value' => 'Default  højde:',
				'hint' => 'eksakt  højde af offentlig log, pixels'
			),
			't163' => array(
				'value' => 'Relative  højde:',
				'hint' => 'relative  højde af offentlig log, percat'
			),
			't164' => array(
				'value' => 'Minimum  højde:'
			),
			't165' => array(
				'value' => 'Default  højde:'
			),
			't166' => array(
				'value' => 'Relative  højde:'
			),
			't167' => array(
				'value' => 'Minimum  højde:'
			),
			't168' => array(
				'value' => 'Default  højde:'
			),
			't169' => array(
				'value' => 'Relative  højde:'
			),
			't170' => array(
				'value' => 'Position:',
				'hint' => 'position i   trin p.v. er BOTTOM eller TOP'
			),
			't171' => array(
				'value' => 'tillader Bandlysning:'
			),
			't172' => array(
				'value' => 'tillader Invitations:'
			),
			't173' => array(
				'value' => 'tillader Ignorerer:'
			),
			't174' => array(
				'value' => 'tillader Profiles:'
			),
			't175' => array(
				'value' => 'tillader Opret Rooms:'
			),
			't176' => array(
				'value' => 'tillader file Deling:'
			),
			't177' => array(
				'value' => 'tillader Custom Baggrunds:',
				'hint' => 'HvisIngen, effects tab Customs tast dervist'
			),
			't178' => array(
				'value' => 'Vis Option Panel:'
			),
			't179' => array(
				'value' => 'Vis Indsæt Box:'
			),
			't180' => array(
				'value' => 'Vis Private Log:'
			),
			't181' => array(
				'value' => 'Vis Offentlig Log:'
			),
			't182' => array(
				'value' => 'Vis Bruger Liste:'
			),
			't183' => array(
				'value' => 'Vis Logud:'
			),
			't184' => array(
				'value' => 'Er Single Room Tilstand:',
				'hint' => 'HvisJa room drop-down er synlig'
			),
			't185' => array(
				'value' => 'tillader Private Besked:'
			),
			't186' => array(
				'value' => 'Vis Adresseee:'
			),
			't187' => array(
				'value' => 'Vis status liste:'
			),
			't188' => array(
				'value' => 'Vis options tast:'
			),
			't189' => array(
				'value' => 'Vis Gem tast:'
			),
			't190' => array(
				'value' => 'Vis Hjælpe tast:'
			),
			't191' => array(
				'value' => 'Vis smilies liste:',
				'hint' => 'Deaktiveret,combo liste,popup vindue'
			),
			't192' => array(
				'value' => 'Vis farve liste:'
			),
			't193' => array(
				'value' => 'Vis Ryd tast:'
			),
			't194' => array(
				'value' => 'Vis klokke:'
			),
			't195' => array(
				'value' => 'temas tab:',
				'hint' => 'som tabs til Vis i   options panel (Abud tab kan ikke være skjult)'
			),
			't196' => array(
				'value' => 'Tekst tab:'
			),
			't197' => array(
				'value' => 'Effects tab:'
			),
			't198' => array(
				'value' => 'lyd tab:'
			),
			't199' => array(
				'value' => 'Minimum Bredde:',
				'hint' => 'minimal bredde af bruger listese, pixels'
			),
			't200' => array(
				'value' => 'Default Bredde:',
				'hint' => 'eksakt bredde af brugerliste, percat'
			),
			't201' => array(
				'value' => 'Relative Bredde:',
				'hint' => 'relative bredde af brugerliste, percat'
			),
			't202' => array(
				'value' => 'Docked Bredde:',
				'hint' => 'relative bredde af docked brugerliste, percat'
			),
			't203' => array(
				'value' => 'Docked  højde:',
				'hint' => 'relative  højde af docked brugerliste, percat'
			),
			't204' => array(
				'value' => 'Position:',
				'hint' => 'position i   trin p.v. er HØJRE eller VENSTRE'
			),
			't205' => array(
				'value' => 'Minimum  højde:',
				'hint' => 'minimal  højde af offentlig log, pixels'
			),
			't206' => array(
				'value' => 'Default  højde:',
				'hint' => 'eksakt  højde af offentlig log, pixels'
			),
			't207' => array(
				'value' => 'Relative  højde:',
				'hint' => 'relative  højde af offentlig log, percat'
			),
			't208' => array(
				'value' => 'Minimum  højde:'
			),
			't209' => array(
				'value' => 'Default  højde:'
			),
			't210' => array(
				'value' => 'Relative  højde:'
			),
			't211' => array(
				'value' => 'Minimum  højde:'
			),
			't212' => array(
				'value' => 'Default  højde:'
			),
			't213' => array(
				'value' => 'Relative  højde:'
			),
			't214' => array(
				'value' => 'Position:',
				'hint' => 'position i   trin p.v. er BOTTOM eller TOP'
			),
			't215' => array(
				'value' => 'tillader Bandlysning:'
			),
			't216' => array(
				'value' => 'tillader Invitations:'
			),
			't217' => array(
				'value' => 'tillader Ignorerer:'
			),
			't218' => array(
				'value' => 'tillader Profiles:'
			),
			't219' => array(
				'value' => 'tillader Opret Rooms:'
			),
			't220' => array(
				'value' => 'tillader file Deling:'
			),
			't221' => array(
				'value' => 'tillader Custom Baggrunds:',
				'hint' => 'HvisIngen, effects tab Customs tast dervist'
			),
			't222' => array(
				'value' => 'Vis Option Panel:'
			),
			't223' => array(
				'value' => 'Vis Indsæt Box:'
			),
			't224' => array(
				'value' => 'Vis Private Log:'
			),
			't225' => array(
				'value' => 'Vis Offentlig Log:'
			),
			't226' => array(
				'value' => 'Vis Bruger Liste:'
			),
			't227' => array(
				'value' => 'Vis Logud:'
			),
			't228' => array(
				'value' => 'Er Single Room Tilstand:',
				'hint' => 'HvisJa room drop-down er synlig'
			),
			't229' => array(
				'value' => 'tillader Private Besked:'
			),
			't230' => array(
				'value' => 'Vis Adresseee:'
			),
			't231' => array(
				'value' => 'Vis status liste:'
			),
			't232' => array(
				'value' => 'Vis options tast:'
			),
			't233' => array(
				'value' => 'Vis farve liste:'
			),
			't234' => array(
				'value' => 'Vis Gem tast:'
			),
			't235' => array(
				'value' => 'Vis Hjælpe tast:'
			),
			't236' => array(
				'value' => 'Vis smilies liste:',
				'hint' => 'Deaktiveret,combo liste,popup vindue'
			),
			't237' => array(
				'value' => 'Vis Ryd tast:'
			),
			't238' => array(
				'value' => 'Vis klokke:'
			),
			't239' => array(
				'value' => 'temas tab:',
				'hint' => 'som tabs til Vis i   options panel (Abud tab kan ikke være skjult)'
			),
			't240' => array(
				'value' => 'lyd tab:'
			),
			't241' => array(
				'value' => 'Effects tab:'
			),
			't242' => array(
				'value' => 'Tekst tab:'
			),
			't243' => array(
				'value' => 'Minimum Bredde:',
				'hint' => 'minimal bredde af bruger listese, pixels'
			),
			't244' => array(
				'value' => 'Default Bredde:',
				'hint' => 'eksakt bredde af brugerliste, percat'
			),
			't245' => array(
				'value' => 'Relative Bredde:',
				'hint' => 'relative bredde af brugerliste, percat'
			),
			't246' => array(
				'value' => 'Docked Bredde:',
				'hint' => 'relative bredde af docked brugerliste, percat'
			),
			't247' => array(
				'value' => 'Docked  højde:',
				'hint' => 'relative  højde af docked brugerliste, percat'
			),
			't248' => array(
				'value' => 'Position:',
				'hint' => 'position i   trin p.v. er HØJRE eller VENSTRE'
			),
			't249' => array(
				'value' => 'Minimum  højde:',
				'hint' => 'minimal  højde af offentlig log, pixels'
			),
			't250' => array(
				'value' => 'Default  højde:',
				'hint' => 'eksakt  højde af offentlig log, pixels'
			),
			't251' => array(
				'value' => 'Relative  højde:',
				'hint' => 'relative  højde af offentlig log, percat'
			),
			't252' => array(
				'value' => 'Minimum  højde:'
			),
			't253' => array(
				'value' => 'Default  højde:'
			),
			't254' => array(
				'value' => 'Relative   højde:'
			),
			't255' => array(
				'value' => 'Minimum  højde:'
			),
			't256' => array(
				'value' => 'Default  højde:'
			),
			't257' => array(
				'value' => 'Relative  højde:'
			),
			't258' => array(
				'value' => 'Position:',
				'hint' => 'position i   trin p.v. er BOTTOM eller TOP'
			),
			't0' => 'redigere layout for:',
			't1' => 'Ja',
			't2' => 'Ingen',
			't3' => 'Gem Settings',
			't4' => 'Redskabbar',
			't5' => 'Options Panel',
			't6' => 'Bruger liste begrænsninger',
			't7' => 'Offentlig liste begrænsninger',
			't8' => 'Private liste begrænsninger',
			't9' => 'Indsæt liste begrænsninger',
		),
		'cnf_logout' => array(
			't841' => array(
				'value' => 'Luk FlashChat:',
				'hint' => 'HvisJa, så FlashChat vindue er lukket ved logud'
			),
			't842' => array(
				'value' => 'Redirect URL:',
				'hint' => 'redirectURL skal være valid URL'
			),
			't843' => array(
				'value' => 'URL:',
				'hint' => 'redirect skal være sat til Ja fordettetil fungere'
			),
			't844' => array(
				'value' => 'Vindue:',
				'hint' => '  vindue til åbner til. mulig values: _blank, _selv,_pernt, eller a navn vindue'
			),
			't0' => 'redigere layout for:'
		),
		'cnf_modules' => array(
			't845' => array(
				'value' => 'Anker punkt:',
				'hint' => '  anker punkt: -1,0,1,2,3 eller 4 (0 = cgå ind ied,1-4=corners af plads below roomliste) + 5-12 point'
			),
			't846' => array(
				'value' => 'Path:',
				'hint' => "sat til \' \' til Deaktiveret. til se hvordandettefungere, brug \'bandlysningner.swf\' eller \'moduletest.swf\'"
			),
			't847' => array(
				'value' => 'Stretch:',
				'hint' => 'HvisJa, achered SWF er streched horizontally & vertically til fiilalletilgågelig plads'
			),
			't848' => array(
				'value' => 'Default x position:',
				'hint' => "  default \'x\' position af   flydende vindue (når anker = -1)"
			),
			't849' => array(
				'value' => 'Default y position:',
				'hint' => "  default \'y\' position af   flydende vindue (når anker = -1)"
			),
			't850' => array(
				'value' => 'Default bredde:',
				'hint' => '  default bredde af   flydende vindue (når anker = -1)'
			),
			't851' => array(
				'value' => 'Default  højde:',
				'hint' => '  default  højde af   flydende vindue (når anker = -1)'
			),
			't0' => 'Der er Ingen modules.',
			't1' => 'Tilføj nyModule',
			't2' => 'Module',
			't3' => 'Ja',
			't4' => 'Ingen',
			't5' => 'Slet',
			't6' => 'Gem Settings',
			't7' => 'module requires Flash Media Server or Red5 Server',
			't8' => 'Enabled',
			't9' => 'Configure',
			't10' => 'Floating',
			't11' => 'Center of space below Room List',
			't12' => 'Top-Left of space below Room List',
			't13' => 'Top-Right of space below Room List',
			't14' => 'Bottom-Left of space below Room List',
			't15' => 'Bottom-Right of space below Room List',
			't16' => 'Top-Left of Title Bar',
			't17' => 'Top-Center of Title Bar',
			't18' => 'Top-Right of Title Bar',
			't19' => 'Top-Left of Chat Pane',
			't20' => 'Top-Right of Chat Pane',
			't21' => 'Bottom-Right of Chat Pane',
			't22' => 'Bottom-Left of Chat Pane',
			't23' => 'Center of Chat Pane'
		),
		'cnf_msg' => array(
			't801' => array(
				'value' => 'Besked  fjern After:',
				'hint' => 'besked fjernet bagefter, sekunder'
			)
		),
		'cnf_other' => array(
			't625' => array(
				'value' => 'Default tema:'
			),
			't634' => array(
				'value' => 'Default Skin:'
			),
			't670' => array(
				'value' => 'Special sprog:'
			),
			't805' => array(
				'value' => 'AuTil Un-bandlysningned After:',
				'hint' => 'tid efter bruger er un-bandlysningned, sekunder'
			),
			't806' => array(
				'value' => 'Default Sprog:',
				'hint' => '2-tegnskode af   default sprog (see below)'
			),
			't807' => array(
				'value' => 'tillader Sprog:',
				'hint' => 'tillader bruger til vælge ikke tilstede sprog'
			),
			't808' => array(
				'value' => 'Base:'
			),
			't809' => array(
				'value' => 'Vis IP:',
				'hint' => 'Vis   bruger IP og vært at /hvemHvissat til Ja'
			),
			't810' => array(
				'value' => 'Bruger PM:',
				'hint' => 'sat til Ja til udsætte listeaf brugerkommandotil a PM vindue, Ingen til chat vindue'
			),
			't811' => array(
				'value' => 'Admin PM:',
				'hint' => 'sat til Ja til udsætte listeaf Moderatorkommandotil a PM vindue, Ingen til chat vindue'
			),
			't812' => array(
				'value' => 'Maximum Rooms:',
				'hint' => 'max antal af Offentlig Rooms'
			),
			't0' => 'Ja',
			't1' => 'Ingen',
			't2' => 'Gem Settings'
		),
		'cnf_preloader' => array(
			't660' => array(
				'value' => 'Setting Tekst:'
			),
			't661' => array(
				'value' => 'Smilies Tekst:'
			),
			't662' => array(
				'value' => 'Main Chat Tekst:'
			),
			't663' => array(
				'value' => 'Starting Tekst:'
			),
			't664' => array(
				'value' => 'OK Tekst:'
			),
			't665' => array(
				'value' => 'Font Familie:'
			),
			't666' => array(
				'value' => 'Font Størrelse:'
			),
			't667' => array(
				'value' => 'Font Farve:'
			),
			't668' => array(
				'value' => 'Baggrund Farve:'
			),
			't669' => array(
				'value' => 'Bar Farve:'
			),
			't985' => array(
				'value' => 'Vis "Login" tast:',
				'hint' => "hvis falsk, \'Login\' tast er skjult"
			),
			't986' => array(
				'value' => 'Vis titel bar:',
				'hint' => 'Hvisfalsk, titel bar er skjult'
			),
			't987' => array(
				'value' => 'tema:'
			),
			't988' => array(
				'value' => 'Bredde:'
			),
			't989' => array(
				'value' => ' højde:'
			),
			't990' => array(
				'value' => 'Besked insætteted:',
				'hint' => 'Hvissand, besked vistHvisikke insætteted'
			),
			't991' => array(
				'value' => 'Ret ind:',
				'hint' => "\'VENSTRE\' eller \'HØJRE\'"
			),
			't992' => array(
				'value' => 'X label:'
			),
			't993' => array(
				'value' => 'Y label:'
			),
			't994' => array(
				'value' => 'X felt:'
			),
			't995' => array(
				'value' => 'Y felt:'
			),
			't996' => array(
				'value' => 'Tekst type:'
			),
			't997' => array(
				'value' => 'Tekst bredde:'
			),
			't998' => array(
				'value' => 'Besked insæt:'
			),
			't999' => array(
				'value' => 'Ret ind:'
			),
			't1000' => array(
				'value' => 'X label:'
			),
			't1001' => array(
				'value' => 'Y label:'
			),
			't1002' => array(
				'value' => 'X felt:'
			),
			't1003' => array(
				'value' => 'Y felt:'
			),
			't1004' => array(
				'value' => 'Tekst type:'
			),
			't1005' => array(
				'value' => 'Tekst bredde:'
			),
			't1006' => array(
				'value' => 'Ret ind:'
			),
			't1007' => array(
				'value' => 'X label:'
			),
			't1008' => array(
				'value' => 'Y label:'
			),
			't1009' => array(
				'value' => 'X felt:'
			),
			't1010' => array(
				'value' => 'Y felt:'
			),
			't1011' => array(
				'value' => 'Ret ind:'
			),
			't1012' => array(
				'value' => 'X label'
			),
			't1013' => array(
				'value' => 'Y label'
			),
			't1014' => array(
				'value' => 'X felt'
			),
			't1015' => array(
				'value' => 'Y felt'
			),
			't1099' => array(
				'value' => 'Besked insætteted:',
				'hint' => 'Hvissand, besked vistHvisikke insætteted'
			),
			't1100' => array(
				'value' => 'Besked insætteted:'
			),
			't0' => 'Login Box Settings',
			't1' => 'Brugernavn',
			't2' => 'password',
			't3' => 'Sprog',
			't4' => 'Titel',
			't5' => 'Klik hertil Vælg op   farve',
			't6' => 'Ja',
			't7' => 'Ingen',
			't8' => 'Gem Settings'
		),
		'cnf_smilies' => array(
			't672' => array(
				'value' => 'Smile:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't673' => array(
				'value' => 'Slut :',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't674' => array(
				'value' => 'Wink:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't675' => array(
				'value' => 'Le:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't676' => array(
				'value' => 'Red:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't677' => array(
				'value' => 'Tongue:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't678' => array(
				'value' => ':',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't679' => array(
				'value' => 'Forbavselse:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't680' => array(
				'value' => 'Baby:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't681' => array(
				'value' => 'Cool:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't682' => array(
				'value' => 'Evil:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't683' => array(
				'value' => 'Grin:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't684' => array(
				'value' => 'Hjerte:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't685' => array(
				'value' => 'Kys:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't686' => array(
				'value' => 'Nyline:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't687' => array(
				'value' => 'Ninja:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't688' => array(
				'value' => 'Rul:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't689' => array(
				'value' => 'Rul EJa:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't690' => array(
				'value' => 'Slash:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't691' => array(
				'value' => 'Sover:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't692' => array(
				'value' => 'Underlig:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't693' => array(
				'value' => 'Fløjt:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't694' => array(
				'value' => 'undren:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't695' => array(
				'value' => 'ringl:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't696' => array(
				'value' => 'kontanter:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't697' => array(
				'value' => 'chok:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't698' => array(
				'value' => 'Check:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't699' => array(
				'value' => 'Bold:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't700' => array(
				'value' => 'klap:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't701' => array(
				'value' => 'græd:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't702' => array(
				'value' => 'held:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't703' => array(
				'value' => 'Ingen:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't704' => array(
				'value' => 'Punch:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't705' => array(
				'value' => 'kranie:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't706' => array(
				'value' => 'jah:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't707' => array(
				'value' => 'Yinyang:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't708' => array(
				'value' => 'Jorden:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't709' => array(
				'value' => 'hva:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't710' => array(
				'value' => 'Hypnose:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't711' => array(
				'value' => 'Java:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't712' => array(
				'value' => 'Ingen:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't713' => array(
				'value' => 'Regn:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't714' => array(
				'value' => 'Rose:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't715' => array(
				'value' => 'Brug:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't716' => array(
				'value' => 'Stort Grin:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't717' => array(
				'value' => 'besvim:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't718' => array(
				'value' => 'Ill Contat:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't719' => array(
				'value' => 'Mjav:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't720' => array(
				'value' => 'tommel ned:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't721' => array(
				'value' => 'tommel op:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't722' => array(
				'value' => 'vuf:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't723' => array(
				'value' => 'øl:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't724' => array(
				'value' => 'Musik:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't725' => array(
				'value' => 'Re Slut ing:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't726' => array(
				'value' => 'Ord Boble:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't727' => array(
				'value' => 'K:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't728' => array(
				'value' => 'K2:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't729' => array(
				'value' => 'M:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't730' => array(
				'value' => 'M2:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't731' => array(
				'value' => 'Admin:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't732' => array(
				'value' => 'Moderator:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't733' => array(
				'value' => 'Basketball:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't734' => array(
				'value' => 'Bowling:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't735' => array(
				'value' => 'Cricket:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't736' => array(
				'value' => 'Fodbold:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't737' => array(
				'value' => 'Golf:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't738' => array(
				'value' => 'Hockey:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't739' => array(
				'value' => 'Sejlads:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't740' => array(
				'value' => 'Soccer:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't741' => array(
				'value' => 'Taner:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't742' => array(
				'value' => 'Australisk Flag:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't743' => array(
				'value' => 'Brazil:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't744' => array(
				'value' => 'Kan Slut et Flag:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't745' => array(
				'value' => 'Kina:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't746' => array(
				'value' => 'Spanien:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't747' => array(
				'value' => 'EU:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't748' => array(
				'value' => 'Frankrig:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't749' => array(
				'value' => 'tyskland:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't750' => array(
				'value' => 'Grækenland:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't751' => array(
				'value' => 'Indisk Flag:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't752' => array(
				'value' => 'Italien:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't753' => array(
				'value' => 'Japan:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't754' => array(
				'value' => 'Mexico Flag:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't755' => array(
				'value' => 'Polsk Flag:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't756' => array(
				'value' => 'Portugal Flag:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't757' => array(
				'value' => 'Rusland:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't758' => array(
				'value' => 'Sverige:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't759' => array(
				'value' => 'Ukraine Flag:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't760' => array(
				'value' => 'UK:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),
			't761' => array(
				'value' => 'US Kort:',
				'hint' => 'Deaktiveret enhver smilie vælg "Off"'
			),

			't0' => 'Yes',
			't1' => 'No'
		),
		'cnf_sound' => array(
			't259' => array(
				'value' => 'Default Pan:',
				'hint' => 'range fra -100 til 100 (VENSTRE..HØJRE)',
				'r' => '(-100 ... 100)'
			),
			't260' => array(
				'value' => 'Default Volume:',
				'hint' => 'default lyd volume, i percat',
				'r' => '(0 ... 100)'
			),
			't261' => array(
				'value' => 'Skru nedalle:',
				'hint' => 'skru nedalle default setting'
			),
			't262' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't263' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't264' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't265' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't266' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't267' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't268' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't269' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't270' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't271' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't272' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't273' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't274' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't275' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't276' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't277' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't813' => array(
				'value' => 'Ring Klokke:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't814' => array(
				'value' => 'forladRoom:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't815' => array(
				'value' => 'Andree Bruger gå ind is:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't816' => array(
				'value' => 'Receive Besked:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't817' => array(
				'value' => 'Submit Besked:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't818' => array(
				'value' => 'Room Åbner/Luk:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't819' => array(
				'value' => 'Initial Login:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't820' => array(
				'value' => 'Logud:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't821' => array(
				'value' => 'Combo ListeÅbner/Luk:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't822' => array(
				'value' => 'Bruger Bandlysningned/Booted:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't823' => array(
				'value' => 'Invitation Modtaget:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't824' => array(
				'value' => 'Private Besked Modtaget:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't825' => array(
				'value' => 'Bruger Mau MobrugeOver:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't826' => array(
				'value' => 'Popup Åbner:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't827' => array(
				'value' => 'Popup Luk/Formindsk:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't828' => array(
				'value' => 'gå ind i Room:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't829' => array(
				'value' => 'Key Press:',
				'hint' => 'Sat Ja til aktiverdettelyd eller Ingen til deaktiver'
			),
			't984' => array(
				'hint' => 'Sat "Ja" til aktiverdettelyd eller "Ingen" til deaktiver'
			),
			't0' => 'Ja',
			't1' => 'Ingen',
			't2' => 'Lyd Navn',
			't3' => 'Tavs',
			't4' => 'Default',
			't5' => 'Gem Settings'
		),
		'cnf_theme' => array(
			't278' => array(
				'value' => 'tema Navn:'
			),
			't279' => array(
				'value' => 'Dialog Baggrund:'
			),
			't280' => array(
				'value' => 'Baggrund Image:'
			),
			't282' => array(
				'value' => 'Vis Baggrund Image:'
			),
			't283' => array(
				'value' => 'Bruger Interface Gennemsigtighed:'
			),
			't284' => array(
				'value' => 'Dialog Titel Farve:'
			),
			't285' => array(
				'value' => 'Dialog Baggrund Farve:'
			),
			't286' => array(
				'value' => 'Room Tekst Farve:'
			),
			't287' => array(
				'value' => 'Bruger ListeBaggrund Farve:'
			),
			't288' => array(
				'value' => 'Room Baggrund Farve:'
			),
			't289' => array(
				'value' => 'gå ind i Room  Farve:'
			),
			't290' => array(
				'value' => 'Tast Tekst Farve:'
			),
			't291' => array(
				'value' => 'Tast Farve:'
			),
			't292' => array(
				'value' => 'Tast Press Farve:'
			),
			't293' => array(
				'value' => 'Tast Grænse Farve:'
			),
			't294' => array(
				'value' => 'rulBG Farve:'
			),
			't295' => array(
				'value' => 'Ruller BG Farve:'
			),
			't296' => array(
				'value' => 'rulBG Press Farve:'
			),
			't297' => array(
				'value' => 'Indsæt Box Baggrund Farve:'
			),
			't298' => array(
				'value' => 'Private Log Baggrund Farve:'
			),
			't299' => array(
				'value' => 'Offentlig Log Baggrund Farve:'
			),
			't300' => array(
				'value' => 'Grænse Farve:'
			),
			't301' => array(
				'value' => 'Krop Tekst Farve:'
			),
			't302' => array(
				'value' => 'Titel Tekst Farve:'
			),
			't303' => array(
				'value' => 'Baggrund Farve:'
			),
			't304' => array(
				'value' => 'AnbefaletBruger Farve:'
			),
			't305' => array(
				'value' => 'Luk Tast Farve:'
			),
			't306' => array(
				'value' => 'Luk Tast Press Farve:'
			),
			't307' => array(
				'value' => 'Luk Tast Grænse Farve:'
			),
			't308' => array(
				'value' => 'Luk Tast Pil Farve:'
			),
			't309' => array(
				'value' => 'Formindsk Tast Farve:'
			),
			't310' => array(
				'value' => 'Formindsk Tast Press Farve:'
			),
			't311' => array(
				'value' => 'Formindsk Tast Grænse Farve:'
			),
			't312' => array(
				'value' => 'Check Farve:'
			),
			't313' => array(
				'value' => 'tema Navn:'
			),
			't314' => array(
				'value' => 'Dialog Baggrund:'
			),
			't315' => array(
				'value' => 'Baggrund Image:'
			),
			't317' => array(
				'value' => 'Vis Baggrund Image:'
			),
			't318' => array(
				'value' => 'Bruger Interface Gennemsigtighed:'
			),
			't319' => array(
				'value' => 'Dialog Titel Farve:'
			),
			't320' => array(
				'value' => 'Dialog Baggrund Farve:'
			),
			't321' => array(
				'value' => 'Room Tekst Farve:'
			),
			't322' => array(
				'value' => 'Room Baggrund Farve:'
			),
			't323' => array(
				'value' => 'Bruger ListeBaggrund Farve:'
			),
			't324' => array(
				'value' => 'gå ind i Room  Farve:'
			),
			't325' => array(
				'value' => 'Tast Tekst Farve:'
			),
			't326' => array(
				'value' => 'Tast Farve:'
			),
			't327' => array(
				'value' => 'Tast Grænse Farve:'
			),
			't328' => array(
				'value' => 'Indsæt Box Baggrund Farve:'
			),
			't329' => array(
				'value' => 'Private Log Baggrund Farve:'
			),
			't330' => array(
				'value' => 'Offentlig Log Baggrund Farve:'
			),
			't331' => array(
				'value' => 'Grænse Farve:'
			),
			't332' => array(
				'value' => 'Krop Tekst Farve:'
			),
			't333' => array(
				'value' => 'Titel Tekst Farve:'
			),
			't334' => array(
				'value' => 'Baggrund Farve:'
			),
			't335' => array(
				'value' => 'AnbefaletBruger Farve:'
			),
			't336' => array(
				'value' => 'Luk Tast Farve:'
			),
			't337' => array(
				'value' => 'Luk Tast Press Farve:'
			),
			't338' => array(
				'value' => 'Luk Tast Grænse Farve:'
			),
			't339' => array(
				'value' => 'Luk Tast Pil Farve:'
			),
			't340' => array(
				'value' => 'Formindsk Tast Farve:'
			),
			't341' => array(
				'value' => 'Formindsk Tast Press Farve:'
			),
			't342' => array(
				'value' => 'Formindsk Tast Grænse Farve:'
			),
			't343' => array(
				'value' => 'Check Farve:'
			),
			't344' => array(
				'value' => 'tema Navn:'
			),
			't345' => array(
				'value' => 'Dialog Baggrund:'
			),
			't346' => array(
				'value' => 'Baggrund Image:'
			),
			't348' => array(
				'value' => 'Vis Baggrund Image:'
			),
			't349' => array(
				'value' => 'Bruger Interface Gennemsigtighed:'
			),
			't350' => array(
				'value' => 'Dialog Titel Farve:'
			),
			't351' => array(
				'value' => 'Dialog Baggrund Farve:'
			),
			't352' => array(
				'value' => 'Room Tekst Farve:'
			),
			't353' => array(
				'value' => 'Bruger ListeBaggrund Farve:'
			),
			't354' => array(
				'value' => 'Room Baggrund Farve:'
			),
			't355' => array(
				'value' => 'gå ind i Room  Farve:'
			),
			't356' => array(
				'value' => 'Tast Tekst Farve:'
			),
			't357' => array(
				'value' => 'Tast Farve:'
			),
			't359' => array(
				'value' => 'Tast Grænse Farve:'
			),
			't361' => array(
				'value' => 'Indsæt Box Baggrund Farve:'
			),
			't362' => array(
				'value' => 'Private Log Baggrund Farve:'
			),
			't363' => array(
				'value' => 'Offentlig Log Baggrund Farve:'
			),
			't364' => array(
				'value' => 'Grænse Farve:'
			),
			't365' => array(
				'value' => 'Krop Tekst Farve:'
			),
			't366' => array(
				'value' => 'Titel Tekst Farve:'
			),
			't367' => array(
				'value' => 'Baggrund Farve:'
			),
			't368' => array(
				'value' => 'AnbefaletBruger Farve:'
			),
			't369' => array(
				'value' => 'Luk Tast Farve:'
			),
			't370' => array(
				'value' => 'Luk Tast Press Farve:'
			),
			't371' => array(
				'value' => 'Luk Tast Grænse Farve:'
			),
			't372' => array(
				'value' => 'Luk Tast Pil Farve:'
			),
			't373' => array(
				'value' => 'Formindsk Tast Farve:'
			),
			't374' => array(
				'value' => 'Formindsk Tast Press Farve:'
			),
			't375' => array(
				'value' => 'Formindsk Tast Grænse Farve:'
			),
			't376' => array(
				'value' => 'Check Farve:'
			),
			't377' => array(
				'value' => 'tema Navn:'
			),
			't378' => array(
				'value' => 'Dialog Baggrund:'
			),
			't379' => array(
				'value' => 'Baggrund Image:'
			),
			't381' => array(
				'value' => 'Vis Baggrund Image:'
			),
			't382' => array(
				'value' => 'Bruger Interface Gennemsigtighed:'
			),
			't383' => array(
				'value' => 'Dialog Titel Farve:'
			),
			't384' => array(
				'value' => 'Dialog Baggrund Farve:'
			),
			't385' => array(
				'value' => 'Room Tekst Farve:'
			),
			't386' => array(
				'value' => 'Room Baggrund Farve:'
			),
			't387' => array(
				'value' => 'Bruger ListeBaggrund Farve:'
			),
			't388' => array(
				'value' => 'gå ind i Room  Farve:'
			),
			't389' => array(
				'value' => 'Tast Tekst Farve:'
			),
			't390' => array(
				'value' => 'Tast Farve:'
			),
			't391' => array(
				'value' => 'Tast Grænse Farve:'
			),
			't392' => array(
				'value' => 'Indsæt Box Baggrund Farve:'
			),
			't393' => array(
				'value' => 'Private Log Baggrund Farve:'
			),
			't394' => array(
				'value' => 'Offentlig Log Baggrund Farve:'
			),
			't395' => array(
				'value' => 'Grænse Farve:'
			),
			't396' => array(
				'value' => 'Krop Tekst Farve:'
			),
			't397' => array(
				'value' => 'Titel Tekst Farve:'
			),
			't398' => array(
				'value' => 'Baggrund Farve:'
			),
			't399' => array(
				'value' => 'AnbefaletBruger Farve:'
			),
			't400' => array(
				'value' => 'Luk Tast Farve:'
			),
			't401' => array(
				'value' => 'Luk Tast Press Farve:'
			),
			't402' => array(
				'value' => 'Luk Tast Grænse Farve:'
			),
			't403' => array(
				'value' => 'Luk Tast Pil Farve:'
			),
			't404' => array(
				'value' => 'Formindsk Tast Farve:'
			),
			't405' => array(
				'value' => 'Formindsk Tast Press Farve:'
			),
			't406' => array(
				'value' => 'Formindsk Tast Grænse Farve:'
			),
			't407' => array(
				'value' => 'Check Farve:'
			),
			't408' => array(
				'value' => 'tema Navn:'
			),
			't409' => array(
				'value' => 'Dialog Baggrund:'
			),
			't410' => array(
				'value' => 'Baggrund Image:'
			),
			't412' => array(
				'value' => 'Vis Baggrund Image:'
			),
			't413' => array(
				'value' => 'Bruger Interface Gennemsigtighed:'
			),
			't414' => array(
				'value' => 'Dialog Titel Farve:'
			),
			't415' => array(
				'value' => 'Dialog Baggrund Farve:'
			),
			't416' => array(
				'value' => 'Room Tekst Farve:'
			),
			't417' => array(
				'value' => 'Room Baggrund Farve:'
			),
			't418' => array(
				'value' => 'Bruger ListeBaggrund Farve:'
			),
			't419' => array(
				'value' => 'gå ind i Room  Farve:'
			),
			't420' => array(
				'value' => 'Tast Tekst Farve:'
			),
			't421' => array(
				'value' => 'Tast Farve:'
			),
			't422' => array(
				'value' => 'Tast Grænse Farve:'
			),
			't423' => array(
				'value' => 'Indsæt Box Baggrund Farve:'
			),
			't424' => array(
				'value' => 'Private Log Baggrund Farve:'
			),
			't425' => array(
				'value' => 'Offentlig Log Baggrund Farve:'
			),
			't426' => array(
				'value' => 'Grænse Farve:'
			),
			't427' => array(
				'value' => 'Krop Tekst Farve:'
			),
			't428' => array(
				'value' => 'Titel Tekst Farve:'
			),
			't429' => array(
				'value' => 'Baggrund Farve:'
			),
			't430' => array(
				'value' => 'AnbefaletBruger Farve:'
			),
			't431' => array(
				'value' => 'Luk Tast Farve:'
			),
			't432' => array(
				'value' => 'Luk Tast Press Farve:'
			),
			't433' => array(
				'value' => 'Luk Tast Grænse Farve:'
			),
			't434' => array(
				'value' => 'Luk Tast Pil Farve:'
			),
			't435' => array(
				'value' => 'Formindsk Tast Farve:'
			),
			't436' => array(
				'value' => 'Formindsk Tast Press Farve:'
			),
			't437' => array(
				'value' => 'Formindsk Tast Grænse Farve:'
			),
			't438' => array(
				'value' => 'Check Farve:'
			),
			't439' => array(
				'value' => 'tema Navn:'
			),
			't440' => array(
				'value' => 'Dialog Baggrund:'
			),
			't441' => array(
				'value' => 'Baggrund Image:'
			),
			't443' => array(
				'value' => 'Vis Baggrund Image:'
			),
			't444' => array(
				'value' => 'Bruger Interface Gennemsigtighed:'
			),
			't445' => array(
				'value' => 'Dialog Titel Farve:'
			),
			't446' => array(
				'value' => 'Dialog Baggrund Farve:'
			),
			't447' => array(
				'value' => 'Room Tekst Farve:'
			),
			't448' => array(
				'value' => 'Room Baggrund Farve:'
			),
			't449' => array(
				'value' => 'Bruger ListeBaggrund Farve:'
			),
			't450' => array(
				'value' => 'gå ind i Room  Farve:'
			),
			't451' => array(
				'value' => 'Tast Tekst Farve:'
			),
			't452' => array(
				'value' => 'Tast Farve:'
			),
			't453' => array(
				'value' => 'Tast Grænse Farve:'
			),
			't454' => array(
				'value' => 'Indsæt Box Baggrund Farve:'
			),
			't455' => array(
				'value' => 'Private Log Baggrund Farve:'
			),
			't456' => array(
				'value' => 'Offentlig Log Baggrund Farve:'
			),
			't457' => array(
				'value' => 'Grænse Farve:'
			),
			't458' => array(
				'value' => 'Krop Tekst Farve:'
			),
			't459' => array(
				'value' => 'Titel Tekst Farve:'
			),
			't460' => array(
				'value' => 'Baggrund Farve:'
			),
			't461' => array(
				'value' => 'AnbefaletBruger Farve:'
			),
			't462' => array(
				'value' => 'Luk Tast Farve:'
			),
			't463' => array(
				'value' => 'Luk Tast Press Farve:'
			),
			't464' => array(
				'value' => 'Luk Tast Grænse Farve:'
			),
			't465' => array(
				'value' => 'Luk Tast Pil Farve:'
			),
			't466' => array(
				'value' => 'Formindsk Tast Farve:'
			),
			't467' => array(
				'value' => 'Formindsk Tast Press Farve:'
			),
			't468' => array(
				'value' => 'Formindsk Tast Grænse Farve:'
			),
			't469' => array(
				'value' => 'Check Farve:'
			),
			't470' => array(
				'value' => 'tema Navn:'
			),
			't471' => array(
				'value' => 'Dialog Baggrund:'
			),
			't472' => array(
				'value' => 'Baggrund Image:'
			),
			't474' => array(
				'value' => 'Vis Baggrund Image:'
			),
			't475' => array(
				'value' => 'Bruger Interface Gennemsigtighed:'
			),
			't476' => array(
				'value' => 'Dialog Titel Farve:'
			),
			't477' => array(
				'value' => 'Dialog Baggrund Farve:'
			),
			't478' => array(
				'value' => 'Room Tekst Farve:'
			),
			't479' => array(
				'value' => 'Room Baggrund Farve:'
			),
			't480' => array(
				'value' => 'Bruger ListeBaggrund Farve:'
			),
			't481' => array(
				'value' => 'gå ind i Room  Farve:'
			),
			't482' => array(
				'value' => 'Tast Tekst Farve:'
			),
			't483' => array(
				'value' => 'Tast Farve:'
			),
			't484' => array(
				'value' => 'Tast Grænse Farve:'
			),
			't485' => array(
				'value' => 'Indsæt Box Baggrund Farve:'
			),
			't486' => array(
				'value' => 'Private Log Baggrund Farve:'
			),
			't487' => array(
				'value' => 'Offentlig Log Baggrund Farve:'
			),
			't488' => array(
				'value' => 'Grænse Farve:'
			),
			't489' => array(
				'value' => 'Krop Tekst Farve:'
			),
			't490' => array(
				'value' => 'Titel Tekst Farve:'
			),
			't491' => array(
				'value' => 'Baggrund Farve:'
			),
			't492' => array(
				'value' => 'AnbefaletBruger Farve:'
			),
			't493' => array(
				'value' => 'Luk Tast Farve:'
			),
			't494' => array(
				'value' => 'Luk Tast Press Farve:'
			),
			't495' => array(
				'value' => 'Luk Tast Grænse Farve:'
			),
			't496' => array(
				'value' => 'Luk Tast Pil Farve:'
			),
			't497' => array(
				'value' => 'Formindsk Tast Farve:'
			),
			't498' => array(
				'value' => 'Formindsk Tast Press Farve:'
			),
			't499' => array(
				'value' => 'Formindsk Tast Grænse Farve:'
			),
			't500' => array(
				'value' => 'Check Farve:'
			),
			't501' => array(
				'value' => 'tema Navn:'
			),
			't502' => array(
				'value' => 'Dialog Baggrund:'
			),
			't503' => array(
				'value' => 'Baggrund Image:'
			),
			't505' => array(
				'value' => 'Vis Baggrund Image:'
			),
			't506' => array(
				'value' => 'Bruger Interface Gennemsigtighed:'
			),
			't507' => array(
				'value' => 'Dialog Titel Farve:'
			),
			't508' => array(
				'value' => 'Dialog Baggrund Farve:'
			),
			't509' => array(
				'value' => 'Room Tekst Farve:'
			),
			't510' => array(
				'value' => 'Room Baggrund Farve:'
			),
			't511' => array(
				'value' => 'Bruger ListeBaggrund Farve:'
			),
			't512' => array(
				'value' => 'gå ind i Room  Farve:'
			),
			't513' => array(
				'value' => 'Tast Tekst Farve:'
			),
			't514' => array(
				'value' => 'Tast Farve:'
			),
			't515' => array(
				'value' => 'Tast Grænse Farve:'
			),
			't516' => array(
				'value' => 'Indsæt Box Baggrund Farve:'
			),
			't517' => array(
				'value' => 'Private Log Baggrund Farve:'
			),
			't518' => array(
				'value' => 'Offentlig Log Baggrund Farve:'
			),
			't519' => array(
				'value' => 'Grænse Farve:'
			),
			't520' => array(
				'value' => 'Krop Tekst Farve:'
			),
			't521' => array(
				'value' => 'Titel Tekst Farve:'
			),
			't522' => array(
				'value' => 'Baggrund Farve:'
			),
			't523' => array(
				'value' => 'AnbefaletBruger Farve:'
			),
			't524' => array(
				'value' => 'Luk Tast Farve:'
			),
			't525' => array(
				'value' => 'Luk Tast Press Farve:'
			),
			't526' => array(
				'value' => 'Luk Tast Grænse Farve:'
			),
			't527' => array(
				'value' => 'Luk Tast Pil Farve:'
			),
			't528' => array(
				'value' => 'Formindsk Tast Farve:'
			),
			't529' => array(
				'value' => 'Formindsk Tast Press Farve:'
			),
			't530' => array(
				'value' => 'Formindsk Tast Grænse Farve:'
			),
			't531' => array(
				'value' => 'Check Farve:'
			),
			't532' => array(
				'value' => 'tema Navn:'
			),
			't533' => array(
				'value' => 'Dialog Baggrund:'
			),
			't534' => array(
				'value' => 'Baggrund Image:'
			),
			't536' => array(
				'value' => 'Vis Baggrund Image:'
			),
			't537' => array(
				'value' => 'Bruger Interface Gennemsigtighed:'
			),
			't538' => array(
				'value' => 'Dialog Titel Farve:'
			),
			't539' => array(
				'value' => 'Dialog Baggrund Farve:'
			),
			't540' => array(
				'value' => 'Room Tekst Farve:'
			),
			't541' => array(
				'value' => 'Room Baggrund Farve:'
			),
			't542' => array(
				'value' => 'Bruger ListeBaggrund Farve:'
			),
			't543' => array(
				'value' => 'gå ind i Room  Farve:'
			),
			't544' => array(
				'value' => 'Tast Tekst Farve:'
			),
			't545' => array(
				'value' => 'Tast Farve:'
			),
			't546' => array(
				'value' => 'Tast Grænse Farve:'
			),
			't547' => array(
				'value' => 'Indsæt Box Baggrund Farve:'
			),
			't548' => array(
				'value' => 'Private Log Baggrund Farve:'
			),
			't549' => array(
				'value' => 'Offentlig Log Baggrund Farve:'
			),
			't550' => array(
				'value' => 'Grænse Farve:'
			),
			't551' => array(
				'value' => 'Krop Tekst Farve:'
			),
			't552' => array(
				'value' => 'Titel Tekst Farve:'
			),
			't553' => array(
				'value' => 'Baggrund Farve:'
			),
			't554' => array(
				'value' => 'AnbefaletBruger Farve:'
			),
			't555' => array(
				'value' => 'Luk Tast Farve:'
			),
			't556' => array(
				'value' => 'Luk Tast Press Farve:'
			),
			't557' => array(
				'value' => 'Luk Tast Grænse Farve:'
			),
			't558' => array(
				'value' => 'Luk Tast Pil Farve:'
			),
			't559' => array(
				'value' => 'Formindsk Tast Farve:'
			),
			't560' => array(
				'value' => 'Formindsk Tast Press Farve:'
			),
			't561' => array(
				'value' => 'Formindsk Tast Grænse Farve:'
			),
			't562' => array(
				'value' => 'Check Farve:'
			),
			't563' => array(
				'value' => 'tema Navn:'
			),
			't564' => array(
				'value' => 'Dialog Baggrund:'
			),
			't565' => array(
				'value' => 'Baggrund Image:'
			),
			't567' => array(
				'value' => 'Vis Baggrund Image:'
			),
			't568' => array(
				'value' => 'Bruger Interface Gennemsigtighed:'
			),
			't569' => array(
				'value' => 'Dialog Titel Farve:'
			),
			't570' => array(
				'value' => 'Dialog Baggrund Farve:'
			),
			't571' => array(
				'value' => 'Room Tekst Farve:'
			),
			't572' => array(
				'value' => 'Room Baggrund Farve:'
			),
			't573' => array(
				'value' => 'Bruger ListeBaggrund Farve:'
			),
			't574' => array(
				'value' => 'gå ind i Room  Farve:'
			),
			't575' => array(
				'value' => 'Tast Tekst Farve:'
			),
			't576' => array(
				'value' => 'Tast Farve:'
			),
			't577' => array(
				'value' => 'Tast Grænse Farve:'
			),
			't578' => array(
				'value' => 'Indsæt Box Baggrund Farve:'
			),
			't579' => array(
				'value' => 'Private Log Baggrund Farve:'
			),
			't580' => array(
				'value' => 'Offentlig Log Baggrund Farve:'
			),
			't581' => array(
				'value' => 'Grænse Farve:'
			),
			't582' => array(
				'value' => 'Krop Tekst Farve:'
			),
			't583' => array(
				'value' => 'Titel Tekst Farve:'
			),
			't584' => array(
				'value' => 'Baggrund Farve:'
			),
			't585' => array(
				'value' => 'AnbefaletBruger Farve:'
			),
			't586' => array(
				'value' => 'Luk Tast Farve:'
			),
			't587' => array(
				'value' => 'Luk Tast Press Farve:'
			),
			't588' => array(
				'value' => 'Luk Tast Grænse Farve:'
			),
			't589' => array(
				'value' => 'Luk Tast Pil Farve:'
			),
			't590' => array(
				'value' => 'Formindsk Tast Farve:'
			),
			't591' => array(
				'value' => 'Formindsk Tast Press Farve:'
			),
			't592' => array(
				'value' => 'Formindsk Tast Grænse Farve:'
			),
			't593' => array(
				'value' => 'Check Farve:'
			),
			't594' => array(
				'value' => 'tema Navn:'
			),
			't595' => array(
				'value' => 'Dialog Baggrund:'
			),
			't596' => array(
				'value' => 'Baggrund Image:'
			),
			't598' => array(
				'value' => 'Vis Baggrund Image:'
			),
			't599' => array(
				'value' => 'Bruger Interface Gennemsigtighed:'
			),
			't600' => array(
				'value' => 'Dialog Titel Farve:'
			),
			't601' => array(
				'value' => 'Dialog Baggrund Farve:'
			),
			't602' => array(
				'value' => 'Room Tekst Farve:'
			),
			't603' => array(
				'value' => 'Room Baggrund Farve:'
			),
			't604' => array(
				'value' => 'Bruger ListeBaggrund Farve:'
			),
			't605' => array(
				'value' => 'gå ind i Room  Farve:'
			),
			't606' => array(
				'value' => 'Tast Tekst Farve:'
			),
			't607' => array(
				'value' => 'Tast Farve:'
			),
			't608' => array(
				'value' => 'Tast Grænse Farve:'
			),
			't609' => array(
				'value' => 'Indsæt Box Baggrund Farve:'
			),
			't610' => array(
				'value' => 'Private Log Baggrund Farve:'
			),
			't611' => array(
				'value' => 'Offentlig Log Baggrund Farve:'
			),
			't612' => array(
				'value' => 'Grænse Farve:'
			),
			't613' => array(
				'value' => 'Krop Tekst Farve:'
			),
			't614' => array(
				'value' => 'Titel Tekst Farve:'
			),
			't615' => array(
				'value' => 'Baggrund Farve:'
			),
			't616' => array(
				'value' => 'AnbefaletBruger Farve:'
			),
			't617' => array(
				'value' => 'Luk Tast Farve:'
			),
			't618' => array(
				'value' => 'Luk Tast Press Farve:'
			),
			't619' => array(
				'value' => 'Luk Tast Grænse Farve:'
			),
			't620' => array(
				'value' => 'Luk Tast Pil Farve:'
			),
			't621' => array(
				'value' => 'Formindsk Tast Farve:'
			),
			't622' => array(
				'value' => 'Formindsk Tast Press Farve:'
			),
			't623' => array(
				'value' => 'Formindsk Tast Grænse Farve:'
			),
			't624' => array(
				'value' => 'Check Farve:'
			),
			't1016' => array(
				'value' => 'Controls Baggrund'
			),
			't1017' => array(
				'value' => 'Her Slutter linjen'
			),
			't1018' => array(
				'value' => 'rulGrænse'
			),
			't1019' => array(
				'value' => 'Bruger ListeItem'
			),
			't1020' => array(
				'value' => 'Tast Press'
			),
			't1021' => array(
				'value' => 'Controls Baggrund'
			),
			't1022' => array(
				'value' => 'Her Slutter linjen'
			),
			't1023' => array(
				'value' => 'rulBaggrund'
			),
			't1024' => array(
				'value' => 'rulBaggrund Press'
			),
			't1025' => array(
				'value' => 'rulGrænse'
			),
			't1026' => array(
				'value' => 'Ruller Baggrund'
			),
			't1027' => array(
				'value' => 'Bruger ListeItem'
			),
			't1028' => array(
				'value' => 'Controls Baggrund'
			),
			't1029' => array(
				'value' => 'Her Slutter linjen'
			),
			't1030' => array(
				'value' => 'rulBaggrund'
			),
			't1031' => array(
				'value' => 'rulBaggrund Press'
			),
			't1032' => array(
				'value' => 'rulGrænse'
			),
			't1033' => array(
				'value' => 'Bruger ListeItem'
			),
			't1034' => array(
				'value' => 'Tast Press'
			),
			't1035' => array(
				'value' => 'Controls Baggrund'
			),
			't1036' => array(
				'value' => 'Her Slutter linjen'
			),
			't1037' => array(
				'value' => 'rulBaggrund'
			),
			't1038' => array(
				'value' => 'rulBaggrund Press'
			),
			't1039' => array(
				'value' => 'rulGrænse'
			),
			't1040' => array(
				'value' => 'Ruller Baggrund'
			),
			't1041' => array(
				'value' => 'Bruger ListeItem'
			),
			't1042' => array(
				'value' => 'Tast Press'
			),
			't1043' => array(
				'value' => 'Controls Baggrund'
			),
			't1044' => array(
				'value' => 'Her Slutter linjen'
			),
			't1045' => array(
				'value' => 'rulBaggrund'
			),
			't1046' => array(
				'value' => 'rulBaggrund Press'
			),
			't1047' => array(
				'value' => 'rulGrænse'
			),
			't1048' => array(
				'value' => 'Ruller Baggrund'
			),
			't1049' => array(
				'value' => 'Bruger ListeItem'
			),
			't1050' => array(
				'value' => 'Tast Press'
			),
			't1051' => array(
				'value' => 'Controls Baggrund'
			),
			't1052' => array(
				'value' => 'Her Slutter linjen'
			),
			't1053' => array(
				'value' => 'rulBaggrund'
			),
			't1054' => array(
				'value' => 'rulBaggrund Press'
			),
			't1055' => array(
				'value' => 'rulGrænse'
			),
			't1056' => array(
				'value' => 'Ruller Baggrund'
			),
			't1057' => array(
				'value' => 'Bruger ListeItem'
			),
			't1058' => array(
				'value' => 'Tast Press'
			),
			't1059' => array(
				'value' => 'Controls Baggrund'
			),
			't1060' => array(
				'value' => 'Her Slutter linjen'
			),
			't1061' => array(
				'value' => 'rulBaggrund'
			),
			't1062' => array(
				'value' => 'rulBaggrund Press'
			),
			't1063' => array(
				'value' => 'rulGrænse'
			),
			't1064' => array(
				'value' => 'Ruller Baggrund'
			),
			't1065' => array(
				'value' => 'Bruger ListeItem'
			),
			't1066' => array(
				'value' => 'Tast Press'
			),
			't1067' => array(
				'value' => 'Controls Baggrund'
			),
			't1068' => array(
				'value' => 'Her Slutter linjen'
			),
			't1069' => array(
				'value' => 'rulBaggrund'
			),
			't1070' => array(
				'value' => 'rulBaggrund Press'
			),
			't1071' => array(
				'value' => 'rulGrænse'
			),
			't1072' => array(
				'value' => 'Ruller Baggrund'
			),
			't1073' => array(
				'value' => 'Bruger ListeItem'
			),
			't1074' => array(
				'value' => 'Tast Press'
			),
			't1075' => array(
				'value' => 'Controls Baggrund'
			),
			't1076' => array(
				'value' => 'Her Slutter linjen'
			),
			't1077' => array(
				'value' => 'rulBaggrund'
			),
			't1078' => array(
				'value' => 'rulBaggrund Press'
			),
			't1079' => array(
				'value' => 'rulGrænse'
			),
			't1080' => array(
				'value' => 'Ruller Baggrund'
			),
			't1081' => array(
				'value' => 'Bruger ListeItem'
			),
			't1082' => array(
				'value' => 'Tast Press'
			),
			't1083' => array(
				'value' => 'Controls Baggrund'
			),
			't1084' => array(
				'value' => 'Her Slutter linjen'
			),
			't1085' => array(
				'value' => 'rulBaggrund'
			),
			't1086' => array(
				'value' => 'rulBaggrund Press'
			),
			't1087' => array(
				'value' => 'rulGrænse'
			),
			't1088' => array(
				'value' => 'Ruller Baggrund'
			),
			't1089' => array(
				'value' => 'Bruger ListeItem'
			),
			't1090' => array(
				'value' => 'Tast Press'
			),
			't1091' => array(
				'value' => 'Controls Baggrund'
			),
			't1092' => array(
				'value' => 'Her Slutter linjen'
			),
			't1093' => array(
				'value' => 'rulBaggrund'
			),
			't1094' => array(
				'value' => 'rulBaggrund Press'
			),
			't1095' => array(
				'value' => 'rulGrænse'
			),
			't1096' => array(
				'value' => 'Ruller Baggrund'
			),
			't1097' => array(
				'value' => 'Bruger ListeItem'
			),
			't1113' => array(
				'value' => 'Tast Press Farve:'
			),
			't1114' => array(
				'value' => 'rulBG Farve:'
			),
			't1118' => array(
				'value' => 'tema Navn:'
			),
			't1119' => array(
				'value' => 'Dialog Baggrund:'
			),
			't1120' => array(
				'value' => 'Baggrund Image:'
			),
			't1122' => array(
				'value' => 'Vis Baggrund Image:'
			),
			't1123' => array(
				'value' => 'Bruger Interface Gennemsigtighed:'
			),
			't1124' => array(
				'value' => 'Dialog Titel Farve:'
			),
			't1125' => array(
				'value' => 'Dialog Baggrund Farve:'
			),
			't1126' => array(
				'value' => 'Room Tekst Farve:'
			),
			't1127' => array(
				'value' => 'Room Baggrund Farve:'
			),
			't1128' => array(
				'value' => 'Bruger ListeBaggrund Farve:'
			),
			't1129' => array(
				'value' => 'gå ind i Room  Farve:'
			),
			't1130' => array(
				'value' => 'Tast Tekst Farve:'
			),
			't1131' => array(
				'value' => 'Tast Farve:'
			),
			't1132' => array(
				'value' => 'Tast Grænse Farve:'
			),
			't1133' => array(
				'value' => 'Indsæt Box Baggrund Farve:'
			),
			't1134' => array(
				'value' => 'Private Log Baggrund Farve:'
			),
			't1135' => array(
				'value' => 'Offentlig Log Baggrund Farve:'
			),
			't1136' => array(
				'value' => 'Grænse Farve:'
			),
			't1137' => array(
				'value' => 'Krop Tekst Farve:'
			),
			't1138' => array(
				'value' => 'Titel Tekst Farve:'
			),
			't1139' => array(
				'value' => 'Baggrund Farve:'
			),
			't1140' => array(
				'value' => 'AnbefaletBruger Farve:'
			),
			't1141' => array(
				'value' => 'Luk Tast Farve:'
			),
			't1142' => array(
				'value' => 'Luk Tast Press Farve:'
			),
			't1143' => array(
				'value' => 'Luk Tast Grænse Farve:'
			),
			't1144' => array(
				'value' => 'Luk Tast Pil Farve:'
			),
			't1145' => array(
				'value' => 'Formindsk Tast Farve:'
			),
			't1146' => array(
				'value' => 'Formindsk Tast Press Farve:'
			),
			't1147' => array(
				'value' => 'Formindsk Tast Grænse Farve:'
			),
			't1148' => array(
				'value' => 'Check Farve:'
			),
			't1149' => array(
				'value' => 'Tast Press'
			),
			't1150' => array(
				'value' => 'Controls Baggrund'
			),
			't1151' => array(
				'value' => 'Her Slutter linjen'
			),
			't1152' => array(
				'value' => 'rulBaggrund'
			),
			't1153' => array(
				'value' => 'rulBaggrund Press'
			),
			't1154' => array(
				'value' => 'rulGrænse'
			),
			't1155' => array(
				'value' => 'Ruller Baggrund'
			),
			't1156' => array(
				'value' => 'Bruger ListeItem'
			),
			't1157' => array(
				'value' => 'tema Navn:'
			),
			't1158' => array(
				'value' => 'Dialog Baggrund:'
			),
			't1159' => array(
				'value' => 'Baggrund Image:'
			),
			't1161' => array(
				'value' => 'Vis Baggrund Image:'
			),
			't1162' => array(
				'value' => 'Bruger Interface Gennemsigtighed:'
			),
			't1163' => array(
				'value' => 'Dialog Titel Farve:'
			),
			't1164' => array(
				'value' => 'Dialog Baggrund Farve:'
			),
			't1165' => array(
				'value' => 'Room Tekst Farve:'
			),
			't1166' => array(
				'value' => 'Bruger ListeBaggrund Farve:'
			),
			't1167' => array(
				'value' => 'Room Baggrund Farve:'
			),
			't1168' => array(
				'value' => 'gå ind i Room  Farve:'
			),
			't1169' => array(
				'value' => 'Tast Tekst Farve:'
			),
			't1170' => array(
				'value' => 'Tast Farve:'
			),
			't1171' => array(
				'value' => 'Tast Press Farve:'
			),
			't1172' => array(
				'value' => 'Tast Grænse Farve:'
			),
			't1173' => array(
				'value' => 'Ruller BG Farve:'
			),
			't1174' => array(
				'value' => 'Indsæt Box Baggrund Farve:'
			),
			't1175' => array(
				'value' => 'Private Log Baggrund Farve:'
			),
			't1176' => array(
				'value' => 'Offentlig Log Baggrund Farve:'
			),
			't1177' => array(
				'value' => 'Grænse Farve:'
			),
			't1178' => array(
				'value' => 'Krop Tekst Farve:'
			),
			't1179' => array(
				'value' => 'Titel Tekst Farve:'
			),
			't1180' => array(
				'value' => 'Baggrund Farve:'
			),
			't1181' => array(
				'value' => 'AnbefaletBruger Farve:'
			),
			't1182' => array(
				'value' => 'Luk Tast Farve:'
			),
			't1183' => array(
				'value' => 'Luk Tast Press Farve:'
			),
			't1184' => array(
				'value' => 'Luk Tast Grænse Farve:'
			),
			't1185' => array(
				'value' => 'Luk Tast Pil Farve:'
			),
			't1186' => array(
				'value' => 'Formindsk Tast Farve:'
			),
			't1187' => array(
				'value' => 'Formindsk Tast Press Farve:'
			),
			't1188' => array(
				'value' => 'Formindsk Tast Grænse Farve:'
			),
			't1189' => array(
				'value' => 'Check Farve:'
			),
			't0' => 'Baggrund image for theme:',
			't1' => 'Uplo Slut ',
			't2' => 'Tilføje Ny tema',
			't3' => 'Skhvis t setting for:',
			't4' => 'dette tema',
			't5' => 'Ny tema navn:',
			't6' => 'dette tema',
			't7' => 'Ja',
			't8' => 'Ingen',
			't9' => 'Klik hertil Vælg   farve',
			't10' => 'Se',
			't11' => 'Gem Settings'
		),
		'cnf_list' => array(
			't0' => 'Ja',
			't1' => 'Ingen',
			't2' => 'Gem Settings'
		),
		'cnf_languages' => array(
			't0' => 'Orden',
			't1' => 'filnavn',
			't2' => 'Bump up'
		)
	);
?>
