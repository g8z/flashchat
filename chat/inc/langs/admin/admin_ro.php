<?php
	$GLOBALS['fc_config']['languages_admin']['ro'] = array(
		'name'=>'Romana (fara diacritice)',

		'admin_index.tpl' => array(
			't0' => 'Panoul de administrare FlashChat',
			't1' => 'Aceasta unealta  ofera administratorilor  FlashChat multiple cai de vizualizare a logurilor chat-ului, resetarea logurilor chat-ului, si adaugare/editare/stergere a camerelor chat-ului',
			't2' => 'Sunt {$usrnumb} utilizatori inregistrati '
		),

		'banlist.tpl' => array(
			't0' => 'Interdictii',
			't1' => 'creat',
			't2' => 'utilizator',
			't3' => 'utilizator interzis',
			't4' => 'id-ul camerei',
			't5' => 'nivelul de interdictie',
			't6' => 'sterge interdictie',
			't7' => 'Nicio interdictie gasita'
		),

		'bot.tpl' => array(
			't0' => 'robot',
			't1' => 'numele robotului',
			't2' => 'avatarul robotului listei de camere',
			't3' => 'nimeni',
			't4' => 'avatarul robotului din chat-ul principal',
			't5' => 'logheaza-te in camera',
			't6' => 'activ cand &lt;X utilizatori sunt prezenti',
			't7' => 'activ cand &gt;X utilizatori sunt prezenti',
			't8' => 'activ cand FlashChat este folosit in modul „suport”',
			't9' => 'activ cand niciun administrator nu este prezent ',
			't10' => 'activ cand nu sunt alti roboti in camera ',
			't11' => 'activ cand un anumit utilizator este prezent',
			't12' => 'Robotii sunt dezectivati pe sistemul dumneavoastra',
			't13' => 'Robotul nu poate fi adaugat pentru ca instalarea robotului a fost omisa la instalarea FlashChat',
			't14' => 'Va rugam rulati inca o data instalarea pentru a activa suportul pentru roboti '
		),

		'botlist.tpl' => array(
			't0' => 'Roboti',
			't1' => 'Adauga robot nou',
			't2' => 'Numele robotului',
			't3' => 'Sterge',
			't4' => 'Nici un robot gasit',
			't5' => 'Optiunea roboti este dezactivata momentan. Pentru a activa aceasta optiune, selectati ”Da” pentru optiunea ”Activeaza Roboti” in sectiunea ”Setari Generale” din panoul de administrare',
			't6' => 'Va rugam rulati inca o data instalarea FlashChat pentru a adauga si informatiile de baza necesare '
		),

		'chatlist.tpl' => array(
			't0' => 'Aceasta optiune nu este disponibila cand FlashChat este integrat cu CMS(sistem de management al continutului).',
			't1' => 'Chat-uri',
			't2' => 'in aceasta camera:',
			't3' => 'Orice camera',
			't4' => 'intre aceste date',
			't5' => 'si',
			't6' => 'in ultimele X zile:',
			't7' => 'de initiator:',
			't8' => 'Orice utilizator',
			't9' => 'de moderator:',
			't10' => 'Numele camerei',
			't11' => 'Autentificare initiator',
			't12' => ' Autentificare moderator',
			't13' => 'Start',
			't14' => 'Sfarsit',
			't15' => 'previzualizare',
			't16' => 'Nici un moderator',
			't17' => 'Nici un chat gasit',
			't18' => 'Va rugam folositi uneltele de administrare care vin cu sistemul pentru a adauga, edita sau sterge utilizatori',
			't19' => 'Arata chat-uri',
			't20' => 'Elimina filtru',
			't21' => 'Sterge mesaje',
			't22' => 'Trimis',
			't23' => 'De la',
			't24' => 'La',
			't25' => 'Mesaj',
			't26' => 'mesaje de aratat'
		),

		'connlist.tpl' => array(
			't0' => 'Conexiuni',
			't1' => 'actualizat',
			't2' => 'creat',
			't3' => 'utilizator',
			't4' => 'id-ul camerei',
			't5' => 'stare',
			't6' => 'culoare',
			't7' => 'start',
			't8' => 'limba',
			't9' => 'tzoffset',
			't10' => 'gazda',
			't11' => 'Nici o conexiune gasita'
		),

		'ignorelist.tpl' => array(
			't0' => 'Ignoruri',
			't1' => 'creat',
			't2' => 'utilizator',
			't3' => 'utilizator ignorat',
			't4' => 'sterge ignorare',
			't5' => 'Nici o ignorare gasita'
		),

		'logout.tpl' => array(
			't0' => 'Deconecteaza-te din panoul de administrare FlashChat',
			't1' => 'Ai fost deconectat',
			't2' => 'Apasa aici pentru autentificare',
			't3' => 'Daca Flashchat este folosit cu CMS(sistem de management al continutului), atunci puteti fi inca autentificat, in functie de modul in care sistemul dumneavoastra retine datele utilizatorului',
			't4' => 'FlashChat nu este instalat.'
		),

		'msglist.tpl' => array(
			't0' => 'Mesaje',
			't1' => 'in aceasta camera',
			't2' => 'Orice camera',
			't3' => 'intre aceste date:',
			't4' => 'si',
			't5' => 'in ultimele X zile:',
			't6' => 'de acest utilizator:',
			't7' => 'Orice utilizator',
			't8' => 'contine acest cuvant cheie',
			't9' => 'trimis',
			't10' => 'de la utilizatorul',
			't11' => 'la camera',
			't12' => 'la utilizator',
			't13' => 'Nici un mesaj gasit',
			't14' => 'Arata mesaje',
			't15' => 'Elimina filtru',
			't16' => 'Sterge mesaje'
		),

		'nopermit.tpl' => array(
			't0' => 'Nu aveti permisiunile necesare pentru a accesa aceasta unealta'
		),

		'room.tpl' => array(
			't0' => 'Camera',
			't1' => 'nume',
			't2' => 'parola',
			't3' => 'public',
			't4' => 'permanent',
			't5' => 'Adauga o noua camera',
			't6' => 'Actualizeaza camera',
			't7' => 'Sterge camera'
		),

		'uninstall.tpl' => array(
			't0' => 'FlashChat a fost dezinstalat cu succes',
			't1' => 'FlashChat nu este instalat',
			't2' => 'Dezinstaleaza',
			't3' => 'Elimina toate tabelele FlashChat din MySQL. Aceasta optiune va da posibilitatea de a rula inca o data instalarea .',
			't4' => 'Ar  putea fi necesar sa incarcati inca o data directorul ”install_files” si fisierul ”install.php” inainte de reinstalare ',
			't5' => '[Urmatoarele tabele vor fi eliminate permanent:',
			't6' => 'Eliminati toate configurarile din directorul cache. Aceasta optiune va permite sa rulati inca o data instalarea',
			't7' => 'Ar  putea fi necesar sa incarcati inca o data directorul ”install_files” si fisierul ”install.php” inainte de reinstalare ',
			't8' => 'Am inteles ca aceste actiuni sunt ireversibile',
			't9' => 'Sunteti sigur?!? Aceasta actiune  NU este reversibila!',
			't10' => 'Continua',
			't11' => 'Anuleaza'
		),

		'user.tpl' => array(
			't0' => 'Aceasta optiune nu este disponibila cand FlashChat este intregat cu CMS(sistem de management al continutului)..',
			't1' => 'utilizator',
			't2' => 'autentificare',
			't3' => 'parola',
			't4' => 'rol',
			't5' => 'Va rugam folositi uneltele de administrare a utilizatorului care vin cu sistemul pentru a adauga, edita sau sterge utilizatori.',
			't6' => 'Adauga utilizator nou',
			't7' => 'Actualizeaza utilizator',
			't8' => 'Sterge utilizator'
		),

		'usrlist.tpl' => array(
			't0' => 'Aceasta optiune nu este disponibila cand FlashChat este intregat cu CMS(sistem de management al continutului)',
			't1' => 'Utilizatori' ,
			't2' => 'Adauga utilizator nou',
			't3' => 'id',
			't4' => 'autentificare',
			't5' => 'parola',
			't6' => 'rol',
			't7' => 'Nici un utilizator gasit',
			't8' => 'Va rugam folositi uneltele de administrare a utilizatorului care vin cu sistemul pentru a adauga, edita sau sterge utilizatori.'
		),

		'top.tpl' => array(
			't0' => 'Acasa',
			't1' => 'Principal',
			't2' => 'Configurare',
			't3' => 'Mesaje',
			't4' => 'Chat-uri',
			't5' => 'Utilizatori',
			't6' => 'Camere',
			't7' => 'Conexiuni',
			't8' => 'Interdictii',
			't9' => 'Ignoruri',
			't10' => 'Roboti',
			't11' => 'Dezinstaleaza',
			't12' => 'Deconectare'
		),

		'roomlist.tpl' => array(
			't0' => 'Camere',
			't1' => 'Adauga o noua camera',
			't2' => 'nume',
			't3' => 'parola',
			't4' => 'public',
			't5' => 'permanent',
			't6' => 'bump up',
			't7' => 'Sterge',
			't8' => 'Adaugati toti',
			't9' => 'Trebuie sa reincarcati chat-ul (reicarcati pagina) si autentificati-va din nou pentru a vedea schimbarile camerei',
			't10' => 'Nici o camera gasita',
			't11' => 'editeaza'
		),

		'login.tpl' => array(
			't0' => 'Autentificare in panoul de administrare FlashChat',
			't1' => 'autentificare ',
			't2' => 'parola',
			't3' => 'Selectati limba',
			't4' => 'autentificare',
			't5' => 'Cu acest utilizator si aceasta parola rolul de administrator nu este disponibil',
			't6' => 'FlashChat nu este intalat'
		),

		'cnf_top.tpl' => array(
			't0' => 'Instante ale chat-ului',
			't1' => 'Setari generale',
			't2' => 'Setari conexiune',
			't3' => 'Stocare mesaje',
			't4' => 'Culori ale temei si imagini',
			't5' => 'Manager de layout',
			't6' => 'Setari font',
			't7' => 'Sunete',
			't8' => 'Zambete',
			't9' => 'Avatari',
			't10' => 'Partajare fisier',
			't11' => 'Module',
			't12' => 'Preincarcare',
			't13' => 'Setari deconectare',
			't14' => 'Limbi',
			't15' => 'Invective/ Text rapid',
			't16' => 'Alte setari'
		),

		'cnf_avatars' => array(
			't762' => array(
				'value' => 'Numai mod:'
			),

			't763' => array(
				'value' => 'Valoarea initiala a Chat-ului principal:',
				'hint' => 'un cod zambet'
			),

			't764' => array(
				'value' => 'Starea initiala a Chat-ului principal:',
				'hint' => 'Pornit = bifat/pornit initial'
			),

			't765' => array(
				'value' => 'Chat-ul principal permite override:',
				'hint' => 'Daca nu, nu poate fi schimbat(combo box-ul este inactiv)'
			),

			't766' => array(
				'value' => 'Valoarea initiala a camerei:',
				'hint' => 'un cod zambet'
			),

			't767' => array(
				'value' => 'Starea initiala a camerei:',
				'hint' => 'Pornit = bifat/pornit initial'
			),

			't768' => array(
				'value' => 'Camera permite override:',
				'hint' => 'Daca nu, nu poate fi schimbat(combo box-ul este inactiv) '
			),

			't769' => array(
				'value' => ' Valoarea initiala  a Chat-ului principal:',
				'hint' => 'un cod zambet'
			),

			't770' => array(
				'value' => 'Starea initiala a chat-ului principal:',
				'hint' => 'Pornit = bifat/pornit initial'
			),

			't771' => array(
				'value' => 'Chat-ul principal permite override :',
				'hint' => 'Daca nu, nu poate fi schimbat(combo box-ul este inactiv)'
			),

			't772' => array(
				'value' => 'Valoarea initiala a camerei:',
				'hint' => 'un cod zambet'

			),

			't773' => array(
				'value' => 'Starea initiala a camerei:',
				'hint' => 'Pornit = bifat/pornit initial'

			),

			't774' => array(
				'value' => 'Camera permite override:',
				'hint' => 'Daca nu, nu poate fi schimbat(combo box-ul este inactiv) '
			),

			't775' => array(
				'value' => ' Valoarea initiala  a Chat-ului principal:',
				'hint' => 'un cod zambet'
			),

			't776' => array(
				'value' =>  'Starea initiala a chat-ului principal:',
				'hint' => 'Pornit = bifat/pornit initial'
			),

			't777' => array(
				'value' =>'Chat-ul principal permite override :',
				'hint' => 'Daca nu, nu poate fi schimbat(combo box-ul este inactiv)'
			),

			't778' => array(
				'value' => 'Starea initiala a camerei:',
				'hint' => 'un cod zambet'
			),

			't779' => array(
				'value' => 'Starea initiala a camerei:',
				'hint' => 'Pornit = bifat/pornit initial'
			),

			't780' => array(
				'value' => 'Camera permite override:',
				'hint' => 'Daca nu, nu poate fi schimbat(combo box-ul este inactiv)'
			),

			't781' => array(
				'value' => 'Valoarea initiala a chat-ului principal:',
				'hint' => 'un cod zambet'
			),

			't782' => array(
				'value' => 'Starea initiala a chat-ului principal:',
				'hint' => 'Pornit = bifat/pornit initial'
			),

			't783' => array(
				'value' => 'Chat-ul principal permite override:',
				'hint' => 'Daca nu, nu poate fi schimbat(combo box-ul este inactiv)'
			),

			't784' => array(
				'value' => 'Starea initiala a camerei:',
				'hint' => 'un cod zambet'
			),

			't785' => array(
				'value' => 'Starea initiala a camerei:',
				'hint' => 'Pornit = bifat/pornit initial'
			),

			't786' => array(
				'value' => 'Camera permite override:',
				'hint' => 'Daca nu, nu poate fi schimbat(combo box-ul este inactiv)'
			),

			't787' => array(
				'value' => 'Valoarea initiala a chat-ului principal:',
				'hint' => 'un cod zambet'
			),

			't788' => array(
				'value' => 'Starea initiala a chat-ului principal:',
				'hint' => 'Pornit = bifat/pornit initial'
			),

			't789' => array(
				'value' => 'Chat-ul principal permite override:',
				'hint' => 'Daca nu, nu poate fi schimbat(combo box-ul este inactiv)'
			),

			't790' => array(
				'value' => 'Starea initiala a camerei:',
				'hint' => 'un cod zambet'
			),

			't791' => array(
				'value' => 'Starea initiala a camerei:',
				'hint' => 'Pornit = bifat/pornit initial'
			),

			't792' => array(
				'value' => 'Camera permite override:',
				'hint' => 'Daca nu, nu poate fi schimbat(combo box-ul este inactiv)'
			),

			't793' => array(
				'value' => 'Valoarea initiala a chat-ului principal:',
				'hint' => 'un cod zambet'
			),

			't794' => array(
				'value' => 'Starea initiala a chat-ului principal:',
				'hint' => 'Pornit = bifat/pornit initial'
			),

			't795' => array(
				'value' => 'Chat-ul principal permite override:',
				'hint' => 'Daca nu, nu poate fi schimbat(combo box-ul este inactiv)'
			),

			't796' => array(
				'value' => 'Starea initiala a camerei:',
				'hint' => 'un cod zambet'
			),

			't797' => array(
				'value' => 'Starea initiala a camerei:',
				'hint' => 'Pornit = bifat/pornit initial'
			),

			't798' => array(
				'value' => 'Camera permite override:',
				'hint' => 'Daca nu, nu poate fi schimbat(combo box-ul este inactiv)'
			),

			't0' => 'Schimba setarea pentru:',
			't1' => 'Setare baiat',
			't2' => 'Setare fata',
			't3' => 'Salveaza Setari'

		),

		'cnf_badwords' => array(
			't0' => 'Semnul asterisc (*)  poate fi utilizat pentru a indica potriviri partiale. Lasati partea dreapta a campului libera pentru a utiliza textul de substitutie, sau  introduceti textul in partea dreapta pentru a seta un textul de substitutie pentru invective.
',
			't2' => 'Aceasta caracteristica poate fi folosita si pentru "Quick Text " daca este o fraza folosita frecvent. De exemplu "hthar" poate fi schimbat in "Hi there, how are you?" si definind "hthar" ca invectiva putem sa-i asociem un text de substitutie',
			't3' => 'Textul de substitutie initial:',
			't4' => 'Adauga',
			't5' => 'Pornit',
			't6' => 'Oprit',
			't7' => 'Sterge',
			't8' => 'Dezactivati toate filtrele',
			't9' => 'Salvati Setarile',
			't10' => 'Sunteti sigur ca vreti sa eliminati acest cuvant?\nNota: Acest cuvant va fi pierdut.',
		),

		'cnf_conn' => array(
			't23' => array(
				'value' => 'Interval de flux:',
				'hint' => 'in secunde, timpul total pentru ca un utilizator sa posteze un alt mesaj'
			),

			't24' => array(
				'value' => 'Intervalul de inactivitate:',
				'hint' => 'in secunde, daca un utilizator are FlashChat pornit pentru (inactivityInterval) secunde'
			),

			't799' => array(
				'value' => 'Intervalul de cerere mesaj :',
				'hint' => 'timpul de actualizare, secunde'
			),

			't800' => array(
				'value' => ' Intervalul de cerere mesaj in starea plecat:',
				'hint' => 'timpul de actualizare al chat-ului in stare plecat,secunde'
			),

			't802' => array(
				'value' => 'Auto Deconectare Dupa:',
				'hint' => 'Timpul de inactivitate dupa care un utilizator este considerat deconectat, secunde'
			),

			't803' => array(
				'value' => 'Auto Inchidere dupa:',
				'hint' => 'Timpul de inactivitate dupa care conexiunea este eliminata din baza de date,secunde'
			),

			't804' => array(
				'value' => 'Adresa de ajutor:',
				'hint' => 'Puteti folosi si help.php'
			)

		),

		'cnf_const' => array(
			't626' => array(
				'value' => 'Numele initial al skinului:'
			),

			't627' => array(
				'value' => 'Numele initial al skinului SWF:'
			),

			't628' => array(
				'value' => 'Numele initial al skinului XP:'
			),

			't629' => array(
				'value' => 'Numele initial al skinului Xp SWF:'
			),

			't630' => array(
				'value' => 'Numele initial al skinului Aqua:'
			),

			't631' => array(
				'value' => 'Numele initial al skinului Aqua SWF:'
			),

			't632' => array(
				'value' => 'Numele initial al skinului Gardient:'
			),

			't633' => array(
				'value' => 'Numele initial al  skinului Gardient SWF:'
			)

		),

		'cnf_filesharing' => array(
			't830' => array(
				'value' => 'Permite camera de partajare:',
				'hint' => 'moderatorul poate partaja cu alti utilizatori din camera - aceasta optiune este numai pentru non-moderatori'
			),

			't831' => array(
				'value' => 'Permite partajarea in Chat:',
				'hint' => 'moderatorul poate partaja cu alti utilizatori din camera - aceasta optiune este numai pentru non-moderator'
			),

			't832' => array(
				'value' => 'Permite extensiile fisierelor:',
				'hint' => "permite extensia fisierului,separat de virgula(pt a permite toare extensiile setati la \'\' )"
			),

			't833' => array(
				'value' => 'Marimea maxima a fisierului:',
				'hint' => 'Marimea maxima a fisierului in octeti (2*1024*1024 egal cu 2Mb)'
			),

			't834' => array(
				'value' => 'Timpul maxim de retinere a fisierului in ore:',
				'hint' => 'timpul in ore de retinere a fisierului pe server(dupa acest timp fisierul va fi sters)'
			),

			't835' => array(
				'value' => 'Permite extensiile fisierelor',
				'hint' => "permite extensia fisierului,separat de virgula(pt a permite toare extensile setati la \'\' )"
			),

			't836' => array(
				'value' => 'Marimea maxima a fisierului:',
				'hint' => 'Marimea fisierului maxim in octeti (2*1024*1024 egal cu 2Mb)'
			),

			't837' => array(
				'value' => 'Timpul maxim de retinere a fisierului in ore:',
				'hint' => 'timpul in ore de retinere a fisierului pe server(dupa acest timp fisierul va fi sters))'
			),

			't838' => array(
				'value' => 'Permite extensiile fisierelor:',
				'hint' => "permite extensia fisierului,separat de virgula(pt a permite toate extensiile setati la \'\' )"
			),

			't839' => array(
				'value' => 'Marimea maxima a fisierului:',
				'hint' => 'Marimea fisierului maxim in octeti (2*1024*1024 egal cu 2Mb)'
			),

			't840' => array(
				'value' => 'Timpul maxim de retinere a fisierului:',
				'hint' => 'timpul in ore de retinere a fisierului pe server(dupa acest timp fisierul va fi sters))'
			),

			't0' => 'Partajarea fisierelor chatului',
			't1' => 'Fundalul avatarului se incarca',
			't2' => 'Poza utlizatorului se incarca',
			't3' => 'Da',
			't4' => 'Nu',
			't5' => 'Salveaza Setarile',
			't6' => 'octeti',
			't7' => 'ore'
		),

		'cnf_font' => array(
			't635' => array(
				'value' => 'Permite inlocuirea culorii textului :',
				'hint' => 'initial(presence : este aceasta optiune visibila sau ascunsa)'
			),

			't636' => array(
				'value' => 'Permita schimbarea:',
				'hint' => 'initial(presence : este aceasta optiune visibila sau ascunsa)'
			),

			't637' => array(
				'value' => 'Marimea initiala:',
				'hint' => 'initial(presence : este aceasta optiune visibila sau ascunsa)'			),

			't638' => array(
				'value' => 'Familia Fontului:',
				'hint' => 'initial(presence : este aceasta optiune visibila sau ascunsa)'
			),

			't639' => array(
				'value' => 'Permita schimbarea:',
				'hint' => 'initial(presence : este aceasta optiune visibila sau ascunsa)'			),

			't640' => array(
				'value' => 'Marimea initiala:',
				'hint' => 'initial(presence : este aceasta optiune visibila sau ascunsa)'			),

			't641' => array(
				'value' => 'Familia Fontului:',
				'hint' => 'initial(presence : este aceasta optiune visibila sau ascunsa)'			),

			't642' => array(
				'value' => 'Permite schimbarea:',
				'hint' => 'initial(presence : este aceasta optiune visibila sau ascunsa)'
			),

			't643' => array(
				'value' => 'Marimea initiala',
				'hint' => 'initial(presence : este aceasta optiune visibila sau ascunsa)'
			),

			't644' => array(
				'value' => 'Familia Fontului:',
				'hint' => 'initial(presence : este aceasta optiune visibila sau ascunsa)'			),

			't0' => 'Da',
			't1' => 'Nu',
			't2' => 'Chat Principal',
			't3' => 'Elementele interfetei',
			't4' => 'Titlu',
			't5' => 'Marimea fontului:',
			't6' => 'Familia Fontului:',
			't7' => 'Nume',
			't8' => 'Dezactivat',
			't9' => 'Salveaza Setarile'

		),

		'cnf_general' => array(
			't3' => array(
				'value' => 'Modul Debug:',
				'hint' => 'seteati adevarat pentru a rula modul Debug'
			),

			't4' => array(
				'value' => 'Versiunea de FlashChat:',
				'hint' => 'arhitectura lansata . caracteristica lansata . patch lansat'
			),

			't5' => array(
				'value' => 'Activeaza socket serverul:',
				'hint' => 'setati adeverat pentru a rula socket server- pentru mai multe detalii vizitati documentele PDF'
			),

			't6' => array(
				'value' => 'Activeaza modul "Suport Live" :',
				'hint' => "setati adeverat pentru a rula chatul in modul \'Suport Live\'"
			),

			't7' => array(
				'value' => 'Activeaza raportarea erorilor:',
				'hint' => 'setati adeverat pentru a activa raportarea erorilor'
			),

			't8' => array(
				'value' => 'Activati roboti:<br>Va trebui sa reinstalati FlashChat pentru a activa optiunea Robot',
				'hint' => 'setati adeverat pentru a activa robotii'
			),

			't9' => array(
				'value' => 'Ip-ul virtual a robotului:',
				'hint' => 'Ip-ul virtual a robotului'
			),

			't10' => array(
				'value' => 'Dezactivati meniul listei de utilizatori :',
				'hint' => 'setati fals pentru a permite meniu popup '
			),

			't11' => array(
				'value' => 'Permite fereastra popup de confirmare pentru admin(moderator):',
				'hint' => 'setati adeverat pentru a activa ferestra de confirmare pentru admin(moderator)'
			),

			't12' => array(
				'value' => 'Formatul etichetei:',
				'hint' => 'valorile posibile sunt combinatii de AVATAR, USER si TIMESTAMP'
			),

			't13' => array(
				'value' => 'Formatul Timp stamp:',
				'hint' => 'model pentru functia PHP date'
			),

			't14' => array(
				'value' => 'Numar maxim de conectari pe adresa de IP:',
				'hint' => 'numarul de autentificari per IP:'
			),

			't15' => array(
				'value' => 'Dezactiveaza comenzile IRC:',
				'hint' => 'poti adauga o lista de comenzi IRC care sa fie dezactivate aici, de exemplu(back,backtime) '
			),

			't16' => array(
				'value' => 'Dezactiveaza comenzile IRC pentru Moderatori:',
				'hint' => 'Restricti de Moderator(care din comenzile IRC sunt dezactivate pentru moderator)'
			),

			't17' => array(
				'value' => 'Restrictii de moderator in panoul de administrare:',
				'hint' => 'Restrictii de moderator in panoul de administrare (admin.php), ca (roboti,dezinstalare,conexiune,utilizatori)'
			),

			't18' => array(
				'value' => 'Lungimea maxima a textului introdus:',
				'hint' => 'lungimea maxima a textului introdus, # caractere'
			),

			't19' => array(
				'value' => 'Numarul maxim de mesaje din logurile chat-ului:',
				'hint' => 'numarul maxim de mesaje stocate in logurile chat-ului'
			),

			't20' => array(
				'value' => 'Deschide toate camerele cu utilizatori:',
				'hint' => 'daca adevarat deschide toate camerele cu utilizatori in ele'
			),

			't21' => array(
				'value' => 'Arata fereastra de deconectare:',
				'hint' => 'daca este fals, atunci este utilizata numai metoda ... src=logat.php, dar nu folosi metoda popup la toate'
			),

			't22' => array(
				'value' => 'Timpul de aratare al ferestrei de deconectare:',
				'hint' => 'in secunde'
			),

			't25' => array(
				'value' => 'Arata fereastra chatului atunci cand este primit un nou mesaj:',
				'hint' => 'Arata fereastra chatului inactiv atunci cand este primit un nou mesaj '
			),

			't26' => array(
				'value' => 'Camera initiala:',
				'hint' => 'cheia primara a camerei unde sunt directionati toti utilizatori dupa autentificare'
			),

			't27' => array(
				'value' => 'Autoeliminare camera:',
				'hint' => 'numarul de secunde inainte ca o camera sa fie eliminata'
			),

			't28' => array(
				'value' => 'Titlu camerei in lista de utilizatori',
				'hint' => 'formateaza stringul pentru titlul camerer din lista de utilizatori'
			),

			't29' => array(
				'value' => 'Numarul maxim de utilizatori per camera:'
			),

			't30' => array(
				'value' => 'Ordinea listei:',
				'hint' => 'optiunea: Alfabtic,de la A la Z, Ordinea in functie de intrare in camera, Moderatorii si  Administratorii primi, apoi de la A la Z,  Moderatorii si  Administratorii primi, apoi in functie de intrarea in camera. Ordinea dupa statusul utilizatorilor, Moderatorii si Administratorii  primi, apoi dupa statusul utilizatorilor'
			),

			't31' => array(
				'value' => 'Sistemul CMS:',
				'hint' => 'initialCMS – CMS initial, blank - CMS simplu'
			),

			't32' => array(
				'value' => 'Autentificare cu decodare UTF8 :',
				'hint' => 'valori posibile - adevarat, fals'
			),

			't33' => array(
				'value' => 'Cripteaza parola:',
				'hint' => 'optiunea de criptare a parolei utilizatorului pentru initialCMS, poate fi  1- criptare si 0- nu se cripteaza'
			),

			't34' => array(
				'value' => 'Mod Automat:',
				'hint' => '1 pentru pornit, 0 pentru oprit (pornit inseamna  ca modul este vizibil la intrarea in chat '
			),

			't35' => array(
				'value' => 'Autotopic:',
				'hint' => '1 pentru pornit, 0 pentru oprit(pornit inseamna  ca modul este vizibil la intrarea in chat)'
			),

			't36' => array(
				'value' => 'Parola Administrator:<br> aplica numai daca daca gazda foloseste CMS',
				'hint' => 'permite oricarui utilizator sa se autentifice ca administrator – numai in modul CMS simplu'
			),

			't37' => array(
				'value' => 'Parola Moderator:<br> aplica numai daca daca gazda foloseste CMS',
				'hint' => 'permite oricarui utilizator sa se autentifice ca moderator – numai in modul CMS simplu'
			),

			't38' => array(
				'value' => 'Parola Spy:<br> aplica numai daca daca gazda foloseste CMS',
				'hint' => 'permite oricarui utilizator sa se autentifice ca spion – numai in modul CMS simplu'
			),

			't981' => array(
				'value' => 'Numarul maxim de minute pentru comenzile inapoi in timp:',
				'hint' => 'setari numarul maxim minute pentru comanda inapoi in timp retinuta de  server, folositi 0 sa nu fie maxim'
			),

			't982' => array(
				'value' => 'Numarul maxim de linii de comenzi inapoi in timp:',
				'hint' => 'setati numarul maxim de linii de comenzi inapoi in timp,  folositi 0 sa nu fie maxim'
			),

			't1104' => array(
				'value' => 'Semnalizeaza atunci cand este un chat platit ',
				'hint' => 'seteaza la 1 daca este un chat platit'
			),

			't1105' => array(
				'value' => 'Valoarea Partenariatului(daca este chat platit)',
				'hint' => 'daca acesta este chat platit, va rugam updatati valoarea de parteneriat'
			),

			't1106' => array(
				'value' => 'Specifica daca acesta este in modul test (daca este chat platit)',
				'hint' => 'daca acesta este chat platit, va rugam sa specificati daca acesta este in modul test'
			),

			't1107' => array(
				'value' => 'Email de afaceri Paypal',
				'hint' => 'daca acesta este chat platit, va rugam specificati emailul de afaceri'
			),

			't1108' => array(
				'value' => 'Moneda',
				'hint' => "daca acesta este chat platit, va rugam mentionati moneda  de exemplu:\'USD\'"
			),

			't1109' => array(
				'value' => 'Activeaza java socket server:',
				'hint' => 'setati adevarat pentru a permite socket server - pentru mai multe detalii vizitati documentele PDF '
			),

			't1110' => array(
				'value' => 'Tipul de cache:(pentru a schimba setarile chat-ului, trebuie sa re-instalati FlashChat)',
				'hint' => '0 = nu retine cache;, 1 = cache limitat, 2 = cache complet'
			),

			't1111' => array(
				'value' => 'Calea cache-ului:',
				'hint' => '0 = nu retine cache;, 1 = cache limitat, 2 = cache complet'
			),

			't1112' => array(
				'value' => 'Prefixul fisierelor cache:',
				'hint' => '0 = nu retine cache;, 1 = cache limitat, 2 = cache complet'
			),

			't1190' => array(
				'value' => 'Titlu utilizatorului in lista de utilizatori:',
				'hint' => 'valorile posibile sunt combinatii de AVATAR, USER si TIMESTAMP '
			),

			't2' => array(
				'value' => 'Timpul serverului offset:',
				'hint' => 'setati timpul serverului offset(folosit pentru a corecta problemele de fus orar ale serverului)'
			),

			't1192' => array(
				'value' => 'Textul liniei de spatiu:',
				'hint' => 'Textul liniei de spatiu'
			)

		),

		'cnf_layout' => array(
			't39' => array(
				'value' => 'Permite banurile:'
			),

			't40' => array(
				'value' => 'Permite invitatiile:'
			),

			't41' => array(
				'value' => 'Permite ignoruri:'
			),

			't42' => array(
				'value' => 'Permite profile:'
			),

			't43' => array(
				'value' => 'Permite crearea camerelor:'
			),

			't44' => array(
				'value' => 'Permite partajarea fisierelor:'
			),

			't45' => array(
				'value' => 'Permite fundal personalizat:',
				'hint' => 'daca Nu, butonul de personalizare al tabului de efect  este dezactivat'
			),

			't46' => array(
				'value' => 'Arata panoul de optiuni:'
			),

			't47' => array(
				'value' => 'Arata cutia de intrare:'
			),

			't48' => array(
				'value' => 'Arata logurile private:'
			),

			't49' => array(
				'value' => 'Arata logurile publice:'
			),

			't50' => array(
				'value' => 'Arata lista de utilizatori:'
			),

			't51' => array(
				'value' => 'Arata Deconectarea:'
			),

			't52' => array(
				'value' => 'Este Modul de Camera unica:',
				'hint' => 'daca DA camera are efect de ceata vizibil'
			),

			't53' => array(
				'value' => 'Permite Mesajele Private:'
			),

			't54' => array(
				'value' => 'Arata Adresele:'
			),

			't55' => array(
				'value' => 'Arata lista de status:'
			),

			't56' => array(
				'value' => 'Arata butoanele de optiuni:'
			),

			't57' => array(
				'value' => 'Arata lista de culori:'
			),

			't58' => array(
				'value' => 'Arata butonul de salvare:'
			),

			't59' => array(
				'value' => 'Arata butonul de ajutor:'
			),

			't60' => array(
				'value' => 'Arata lista de zambete:',
				'hint' => 'dezactivati,lista combo, fereastra popup'
			),

			't61' => array(
				'value' => 'Arata butonul de stergere:'
			),

			't62' => array(
				'value' => 'Arata clopotel:'
			),

			't63' => array(
				'value' => 'Tabul de teme:',
				'hint' => 'care tab este vizibil in panoul de optiuni(tabul Despre nu poate fi ascuns)'
			),

			't64' => array(
				'value' => 'Tabul de sunet:'
			),

			't65' => array(
				'value' => 'Tabul de efecte:'
			),

			't66' => array(
				'value' => 'Tabul de text:'
			),

			't67' => array(
				'value' => 'Latimea Minima:',
				'hint' => 'latimea minima a listei de vedere a utilizatorului , pixeli'
			),

			't68' => array(
				'value' => 'Latimea initiala:',
				'hint' => 'latimea exact a listei de utilizatori, procente'
			),

			't69' => array(
				'value' => 'Latimea Relativa;',
				'hint' => 'Latimea Relativa a listei de utilizatori, procente'
			),

			't70' => array(
				'value' => 'Latimea de andocare:',
				'hint' => 'Latimea relativa de andocare a listei de utilizatori, procente'
			),

			't71' => array(
				'value' => 'Inaltimea de andocare:',
				'hint' => 'Latimea relativa de andocare a listei de utilizatori, procente'
			),

			't72' => array(
				'value' => 'Pozitia:',
				'hint' => 'Pozitia in stadiu p.v. este dreapta sau stanga'
			),

			't73' => array(
				'value' => 'Inaltimea minima:',
				'hint' => 'inaltmea minima a logului public, pixeli'
			),

			't74' => array(
				'value' => 'Inaltimea initiala:',
				'hint' => 'inaltimea exacta a logului public, pixeli'
			),

			't75' => array(
				'value' => 'Inaltimea Relativa:',
				'hint' => 'Inaltimea Relativa a logului public, procente'
			),

			't76' => array(
				'value' => 'Inaltimea minima:'
			),

			't77' => array(
				'value' => 'Inaltimea initiala:'
			),

			't78' => array(
				'value' => 'Inaltimea Relativa:'
			),

			't79' => array(
				'value' => 'Inaltimea minima:'
			),

			't80' => array(
				'value' => 'Inaltimea initiala:'
			),

			't81' => array(
				'value' => 'Inaltimea Relativa:'
			),

			't82' => array(
				'value' => 'Pozitia:',
				'hint' => ' Pozitia in stadiu p.v. este jos sau sus'
			),

			't83' => array(
				'value' => 'Permite banurile:'
			),

			't84' => array(
				'value' => 'Permite Invitatiile:'
			),

			't85' => array(
				'value' => 'Permite Ignorurile:'
			),

			't86' => array(
				'value' => 'Permite Profilele:'
			),

			't87' => array(
				'value' => 'Permite Crearea de Camere:'
			),

			't88' => array(
				'value' => 'Permite partajarea fisierelor:'
			),

			't89' => array(
				'value' => 'Permite personalizarea fundalului:',
				'hint' => 'daca Nu, butonul de personalizare al tabului de efect  este dezactivat'
			),

			't90' => array(
				'value' => 'Arata panoul de optiuni:'
			),

			't91' => array(
				'value' => 'Arata cutia de intrare:'
			),

			't92' => array(
				'value' => 'Arata logurile private:'
			),

			't93' => array(
				'value' => 'Arata logurile publice:'
			),

			't94' => array(
				'value' => 'Arata lista de utilizatori:'
			),

			't95' => array(
				'value' => 'Arata Deconectare:'
			),

			't96' => array(
				'value' => 'Este Modul Camera unica:',
				'hint' => 'daca DA camera are efect de ceata vizibil'
			),

			't97' => array(
				'value' => 'Permite Mesajele Private:'
			),

			't98' => array(
				'value' => 'Arata Adresele:'
			),

			't99' => array(
				'value' => 'Arata lista de status:'
			),

			't100' => array(
				'value' => 'Arata butonul de optiuni:'
			),

			't101' => array(
				'value' => 'Arata lista de culori:'
			),

			't102' => array(
				'value' => 'Arata butonul de salvare:'
			),

			't103' => array(
				'value' => 'Arata butonul de ajutor:'
			),

			't104' => array(
				'value' => 'Arata lista de zambete:',
				'hint' => 'dezactivati,lista combo, fereastra popup'
			),

			't105' => array(
				'value' => 'Arata butonu de stergere:'
			),

			't106' => array(
				'value' => 'Arata clopotel:'
			),

			't107' => array(
				'value' => 'Tabul de teme:',
				'hint' => 'care tab este vizibil in panoul de optiuni(tabul Despre nu poate fi ascuns)'
			),

			't108' => array(
				'value' => 'Tabul de sunete:'
			),

			't109' => array(
				'value' => 'Tabul de efecte:'
			),

			't110' => array(
				'value' => 'Tabul de text:'
			),

			't111' => array(
				'value' => 'Latimea Minima:',
				'hint' => 'latimea minima a listei de utilizatori , pixeli'
			),

			't112' => array(
				'value' => 'Latimea initiala:',
				'hint' => 'latimea exacta a listei de utilizatori, procente'
			),

			't113' => array(
				'value' => 'Latimea Relativa:',
				'hint' => 'Latimea Relativa a listei de utilizatori, percent'
			),

			't114' => array(
				'value' => 'Latimea de andocare:',
				'hint' => 'Latimea de andocare a listei de utilizatori, percent'
			),

			't115' => array(
				'value' => 'Inaltimea Platformei:',
				'hint' => 'Latimea Relativa de andocare a listei de utilizatori, procente'
			),

			't116' => array(
				'value' => 'Pozitia:',
				'hint' => 'Pozitia in stadiul p.v.  este Dreapta sau Stanga'
			),

			't117' => array(
				'value' => 'Inaltimea minima:',
				'hint' => 'inaltimea minima a logurilor publice, pixeli'
			),

			't118' => array(
				'value' => 'Inaltimea initiala:',
				'hint' => 'inaltimea exacta a logurilor publice, pixeli'
			),

			't119' => array(
				'value' => 'Inaltimea Relativa:',
				'hint' => 'Inaltimea Relativa a logurilor publice, procente'
			),

			't120' => array(
				'value' => 'Inaltimea minima:'
			),

			't121' => array(
				'value' => 'Inaltimea initiala:'
			),

			't122' => array(
				'value' => 'Inaltimea Relativa:'
			),

			't123' => array(
				'value' => 'Inaltimea minima:'
			),

			't124' => array(
				'value' => 'Inaltimea initiala:'
			),

			't125' => array(
				'value' => 'Inaltimea Relativa:'
			),

			't126' => array(
				'value' => 'Pozitia:',
				'hint' => 'Pozitia in stadiu p.v.  este Jos sau Sus'
			),

			't127' => array(
				'value' => 'Permite banurile:'
			),

			't128' => array(
				'value' => 'Permite Invitatiile:'
			),

			't129' => array(
				'value' => 'Permite Ignorurile:'
			),

			't130' => array(
				'value' => 'Permite Profilele:'
			),

			't131' => array(
				'value' => 'Permite Crearea de Camere:'
			),

			't132' => array(
				'value' => 'Permite partajarea fisierelor:'
			),

			't133' => array(
				'value' => 'Permite Personalizarea Fundalului:',
				'hint' => 'daca Nu, butonul de personalizare al tabului de efecte este dezactivat'
			),

			't134' => array(
				'value' => 'Arata panoul de optiuni:'
			),

			't135' => array(
				'value' => 'Arata Cutia de intrare:'
			),

			't136' => array(
				'value' => 'Arata logarea privata:'
			),

			't137' => array(
				'value' => 'Arata logarea publica:'
			),

			't138' => array(
				'value' => 'Arata lista de utilizatori:'
			),

			't139' => array(
				'value' => 'Arata deconectare:'
			),

			't140' => array(
				'value' => 'Este Modul Camera unica:',
				'hint' => 'daca DA camera are efect de ceata vizibil'
			),

			't141' => array(
				'value' => 'Permite Mesajele Private:'
			),

			't142' => array(
				'value' => 'Arata Adresele:'
			),

			't143' => array(
				'value' => 'Arata lista de status:'
			),

			't144' => array(
				'value' => 'Arata butoanele de optiuni:'
			),

			't145' => array(
				'value' => 'Arata lista de culori:'
			),

			't146' => array(
				'value' => 'Arata butonul de salvare:'
			),

			't147' => array(
				'value' => 'Arata butonul de ajutor:'
			),

			't148' => array(
				'value' => 'Arata lista de zambete:',
				'hint' => 'dezactivati,lista combo, fereastra popup'
			),

			't149' => array(
				'value' => 'Arata butonul de stergere:'
			),

			't150' => array(
				'value' => 'Arata clopotel:'
			),

			't151' => array(
				'value' => 'Tabul de teme:',
				'hint' => 'care tab este vizibil in panoul de optiuni(tabul Despre nu poate fi ascuns)'
			),

			't152' => array(
				'value' => 'Tabul de sunete:'
			),

			't153' => array(
				'value' => 'Tabul de efecte:'
			),

			't154' => array(
				'value' => 'Tabul de text:'
			),

			't155' => array(
				'value' => 'Latimea Minima:',
				'hint' => 'latimea minima a listei de utilizatori , pixeli'
			),

			't156' => array(
				'value' => 'Latimea initiala:',
				'hint' => 'latimea exacta a listei de utilizatori, procente'
			),

			't157' => array(
				'value' => 'Latimea Relativa:',
				'hint' => 'Latimea Relativa a listei de utilizatori, procente'
			),

			't158' => array(
				'value' => 'Latimea de andocare:',
				'hint' => 'Latimea Relativa de andocare a listei de utilizatori, procente'
			),

			't159' => array(
				'value' => 'Inaltimea de andocare:',
				'hint' => 'Latimea Relativa de andocare a listei de utilizatori, procente'
			),

			't160' => array(
				'value' => 'Pozitia:',
				'hint' => 'Pozitia in stadiul p.v. este Dreapta sau Stanga'
			),

			't161' => array(
				'value' => 'Inaltimea minima:',
				'hint' => 'inaltmea minima logurilor publice, pixeli'
			),

			't162' => array(
				'value' => 'Inaltimea Initiala:',
				'hint' => 'inaltimea exacta a logurilor publice, pixeli'
			),

			't163' => array(
				'value' => 'Inaltimea Relativa:',
				'hint' => 'Inaltimea Relativa a publicului logat, procente'
			),

			't164' => array(
				'value' => 'Inaltimea minima:'
			),

			't165' => array(
				'value' => 'Inaltimea Initiala:'
			),

			't166' => array(
				'value' => 'Inaltimea Relativa:'
			),

			't167' => array(
				'value' => 'Inaltimea minima:'
			),

			't168' => array(
				'value' => 'Inaltimea Initiala:'
			),

			't169' => array(
				'value' => 'Inaltimea Relativa:'
			),

			't170' => array(
				'value' => 'Pozitia:',
				'hint' => 'Pozitia in stadiul p.v este  Jos sau Sus'
			),

			't171' => array(
				'value' => 'Permite banurile:'
			),

			't172' => array(
				'value' => 'Permite Invitatiile:'
			),

			't173' => array(
				'value' => 'Permite Ignorurile:'
			),

			't174' => array(
				'value' => 'Permite Profilele:'
			),

			't175' => array(
				'value' => 'Permite Crearea de Camere:'
			),

			't176' => array(
				'value' => 'Permite partajarea fisierelor:'
			),

			't177' => array(
				'value' => 'Permite Fundal Personalizat:',
				'hint' => 'daca Nu, tabul de efect personalizat a butonului e dezactivat'
			),

			't178' => array(
				'value' => 'Arata panoul de optiuni:'
			),

			't179' => array(
				'value' => 'Arata Cutia de intrare:'
			),

			't180' => array(
				'value' => 'Arata logurile private:'
			),

			't181' => array(
				'value' => 'Arata logurile publice:'
			),

			't182' => array(
				'value' => 'Arata lista de utilizatori:'
			),

			't183' => array(
				'value' => 'Arata Deconectare:'
			),

			't184' => array(
				'value' => 'Este Modul Camera unica:',
				'hint' => 'daca DA camera are efect de ceata vizibil'
			),

			't185' => array(
				'value' => 'Permite Mesajele Private:'
			),

			't186' => array(
				'value' => 'Arata Adresele:'
			),

			't187' => array(
				'value' => 'Arata lista de status:'
			),

			't188' => array(
				'value' => 'Arata butoanele de optiuni:'
			),

			't189' => array(
				'value' => 'Arata butonul de salvare:'
			),

			't190' => array(
				'value' => 'Arata butonul de ajutor:'
			),

			't191' => array(
				'value' => 'Arata lista de zambete:',
				'hint' => 'dezactivati,lista combo, fereastra popup'
			),

			't192' => array(
				'value' => 'Arata lista de culori:'
			),

			't193' => array(
				'value' => 'Arata butonu de stergere:'
			),

			't194' => array(
				'value' => 'Arata clopotel:'
			),

			't195' => array(
				'value' => 'Tabul de teme:',
				'hint' => 'care tab este vizibil in panoul de optiuni(tabul Despre nu poate fi ascuns)'
			),

			't196' => array(
				'value' => 'Tabul de text:'
			),

			't197' => array(
				'value' => 'Tabul de efecte:'
			),

			't198' => array(
				'value' => 'Tabul de sunete:'
			),

			't199' => array(
				'value' => 'Latimea Minima:',
				'hint' => 'latimea minima a listei de utilizatori, pixeli'
			),

			't200' => array(
				'value' => 'Latimea Initiala:',
				'hint' => 'latimea exact a listei de utilizatori, procente'
			),

			't201' => array(
				'value' => 'Latimea Relativa:',
				'hint' => 'Latimea Relativa a listei de utilizatori, percent'
			),

			't202' => array(
				'value' => 'Latimea de andocare:',
				'hint' => 'Latimea Relativa de andocare a listei de utilizatori, percent'
			),

			't203' => array(
				'value' => 'Inaltimea de andocare:',
				'hint' => 'Latimea Relativa de andocare a listei de utilizatori, procente'
			),

			't204' => array(
				'value' => 'Pozitia:',
				'hint' => 'Pozitia in stadiul p.v. este Dreapta sau Stanga'
			),

			't205' => array(
				'value' => 'Inaltimea minima:',
				'hint' => 'inaltmea minima a logurilor publice, pixeli'
			),

			't206' => array(
				'value' => 'Inaltimea Initiala:',
				'hint' => 'inaltimea exacta a logurilor publice, pixeli'
			),

			't207' => array(
				'value' => 'Inaltimea Relativa:',
				'hint' => 'Inaltimea Relativa a logurilor publice, procente'
			),

			't208' => array(
				'value' => 'Inaltimea minima:'
			),

			't209' => array(
				'value' => 'Inaltimea Initiala:'
			),

			't210' => array(
				'value' => 'Inaltimea Relativa:'
			),

			't211' => array(
				'value' => 'Inaltimea minima:'
			),

			't212' => array(
				'value' => 'Inaltimea Initiala:'
			),

			't213' => array(
				'value' => 'Inaltimea Relativa:'
			),

			't214' => array(
				'value' => 'Pozitia:',
				'hint' => 'Pozitia in stadiul p.v. este  Jos sau Sus'
			),

			't215' => array(
				'value' => 'Permite banurile:'
			),

			't216' => array(
				'value' => 'Permite Invitatiile:'
			),

			't217' => array(
				'value' => 'Permite Ignorurile:'
			),

			't218' => array(
				'value' => 'Permite Profilele:'
			),

			't219' => array(
				'value' => 'Permite Crearea de Camere:'
			),

			't220' => array(
				'value' => 'Permite partajarea fisierelor:'
			),

			't221' => array(
				'value' => 'Permite Personalizarea Fundalului:',
				'hint' => 'daca Nu, butonul de personalizare al tabului de efecte este dezactivat'
			),

			't222' => array(
				'value' => 'Arata panoul de optiuni:'
			),

			't223' => array(
				'value' => 'Arata Cutia de intrare:'
			),

			't224' => array(
				'value' => 'Arata logurile private:'
			),

			't225' => array(
				'value' => 'Arata logurile publice:'
			),

			't226' => array(
				'value' => 'Arata lista de utilizatori:'
			),

			't227' => array(
				'value' => 'Arata deconectare:'
			),

			't228' => array(
				'value' => 'Este Modul Camera unica:',
				'hint' => 'daca DA camera are efect de ceata vizibil'
			),

			't229' => array(
				'value' => 'Permite Mesajele Private:'
			),

			't230' => array(
				'value' => 'Arata Adresele:'
			),

			't231' => array(
				'value' => 'Arata lista de status:'
			),

			't232' => array(
				'value' => 'Arata butoanele de optiuni:'
			),

			't233' => array(
				'value' => 'Arata lista de culori:'
			),

			't234' => array(
				'value' => 'Arata butonul de salvare:'
			),

			't235' => array(
				'value' => 'Arata butonul de ajutor:'
			),

			't236' => array(
				'value' => 'Arata lista de zambete:',
				'hint' => 'dezactivati,lista combo, fereastra popup'
			),

			't237' => array(
				'value' => 'Arata butonul de stergere:'
			),

			't238' => array(
				'value' => 'Arata clopotel:'
			),

			't239' => array(
				'value' => 'Tabul de teme:',
				'hint' => 'care tab este vizibil in panoul de optiuni(tabul Despre nu poate fi ascuns)'
			),

			't240' => array(
				'value' => 'Tabul de sunete:'
			),

			't241' => array(
				'value' => 'Tabul de efecte:'
			),

			't242' => array(
				'value' => 'Tabul de text:'
			),

			't243' => array(
				'value' => 'Latimea Minima:',
				'hint' => 'latimea minima a listei de utilizatori, pixeli'
			),

			't244' => array(
				'value' => 'Latimea Initiala:',
				'hint' => 'latimea exacta a listei de utilizatori, procente'
			),

			't245' => array(
				'value' => 'Latimea Relativa:',
				'hint' => 'Latimea Relativa a listei de utilizatori, procente'
			),

			't246' => array(
				'value' => 'Latimea de andocare:',
				'hint' => 'Latimea Relativa de andocare a listei de utilizatori, percent'
			),

			't247' => array(
				'value' => 'Inaltimea de andocare',
				'hint' => 'Latimea Relativa de andocare a listei de utilizatori, procente'
			),

			't248' => array(
				'value' => 'Pozitia:',
				'hint' => 'Pozitia in stadiul p.v. este Dreapta sau Stanga'
			),

			't249' => array(
				'value' => 'Inaltimea minima:',
				'hint' => 'inaltmea minima a logurilor publice, pixeli'
			),

			't250' => array(
				'value' => 'Inaltimea Initiala:',
				'hint' => 'inaltimea exacta a logurilor publice, pixeli'
			),

			't251' => array(
				'value' => 'Inaltimea Relativa:',
				'hint' => 'Inaltimea Relativa a logurilor publice, procente'
			),

			't252' => array(
				'value' => 'Inaltimea minima:'
			),

			't253' => array(
				'value' => 'Inaltimea Initiala:'
			),

			't254' => array(
				'value' => 'Inaltimea Relativa:'
			),

			't255' => array(
				'value' => 'Inaltimea minima:'
			),

			't256' => array(
				'value' => 'Inaltimea Initiala:'
			),

			't257' => array(
				'value' => 'Inaltimea Relativa:'
			),

			't258' => array(
				'value' => 'Pozitia:',
				'hint' => 'Pozitia in stadiul p.v. este  Jos sau Sus'
			),

			't0' => 'Editeaza layout-ul pentru:',
			't1' => 'Da',
			't2' => 'Nu',
			't3' => 'Salveaza Setarile',
			't4' => 'Tablou de instrumente',
			't5' => 'Panoul de Optiuni',
			't6' => 'Lista de utilizatori cu constrangeri',
			't7' => 'Lista publica cu constrangeri',
			't8' => 'Lista privata cu constrangeri',
			't9' => 'Lista de intrare cu constrangeri',
		),

		'cnf_logout' => array(
			't841' => array(
				'value' => 'Inchide FlashChat:',
				'hint' => 'daca Da, atunci fereastra FlashChat se inchide dupa deconectare'
			),

			't842' => array(
				'value' => 'redirectionare URL:',
				'hint' => 'redirectionareURL trebuie sa fie un URL valid '
			),

			't843' => array(
				'value' => 'URL:',
				'hint' => 'redirectionare trebuie sa fie setata la DA pentru a functiona'
			),

			't844' => array(
				'value' => 'Fereastra:',
				'hint' => 'fereastra se deschide in urmatoarele valori posibile: _blank, _self,_parent, sau  un nume de fereastra'
			),

			't0' => 'Editeaza layout-ul pentru:'
		),

		'cnf_modules' => array(
			't845' => array(
				'value' => 'Punct de ancora:',
				'hint' => 'punctul de ancora:  -1,0,1,2,3 or 4 (0 = central,1-4=spatiu sub lista de camere) + 5-12 puncte'
			),

			't846' => array(
				'value' => 'Calea:',
				'hint' => "setati la \' \' pentru dezactivat. Pentru a vedea cum functioneaza,foloseste \'banner.swf\' sau \'moduletest.swf\'"
			),

			't847' => array(
				'value' => 'Intindere:',
				'hint' => 'daca Da, SWF este intins orizontal si verticala pentru a ocupa tot spatiul disponibil'
			),

			't848' => array(
				'value' => 'Pozitia initiala x :',
				'hint' => " initial \'x\' Pozitia fereastrei plutitoare (cand este ancorata = -1)"
			),

			't849' => array(
				'value' => 'Pozitia initiala y :',
				'hint' => "initial \'x\' Pozitia a Fereastrei plutitoare (cand este ancorata = -1)"
			),

			't850' => array(
				'value' => 'Latimea initiala:',
				'hint' => 'latimea initiala a fereastrei plutitoare (cand este ancorata = -1)'
			),

			't851' => array(
				'value' => 'Inaltimea Initiala:',
				'hint' => 'inaltimea initiala a fereastrei plutitoare (cand este ancorata = -1)'
			),

			't0' => 'Nu sunt module.',
			't1' => 'Adauga un nou modul',
			't2' => 'Modul',
			't3' => 'Da',
			't4' => 'No',
			't5' => 'Sterge',
			't6' => 'Salveaza Setarile',
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
				'value' => 'Sterge Mesajul  dupa:',
				'hint' => 'Mesaj este sters dupa acest timp, secunde'
			)

		),

		'cnf_other' => array(
			't625' => array(
				'value' => 'Tema Initiala:'
			),

			't634' => array(
				'value' => 'Skin-ul Initial:'
			),

			't670' => array(
				'value' => 'Limba speciala:'
			),

			't805' => array(
				'value' => 'Auto eliminare ban dupa:',
				'hint' => 'timpul dupa care utilizatorul este debanat,secunde'
			),

			't806' => array(
				'value' => 'Limba Initiala:',
				'hint' => 'codul de doua litere corespunzator limbii initiale(vedeti mai jos)'
			),

			't807' => array(
				'value' => 'Limba Permisa:',
				'hint' => 'permite utilizatorului sa aleaga o noua limba'
			),

			't808' => array(
				'value' => 'baza:'
			),

			't809' => array(
				'value' => 'Arata IP:',
				'hint' => 'arata Ip-ul utilizatorului si hostul la/cine daca este setata la Da'
			),

			't810' => array(
				'value' => 'Utilizator PM:',
				'hint' => 'seteaza la Da pentru a produce o lista cu comenzile utilizatorilor la o fereastra PM, Nu la fereastra chat'
			),

			't811' => array(
				'value' => 'Administrator PM:',
				'hint' => 'seteaza la Da pentru a produce o lista cu comenzile a moderatorilor la o fereastra PM, Nu la fereastra chat'
			),

			't812' => array(
				'value' => 'Numar maxim de camere:',
				'hint' => 'numarul maxim de camere destinate publicului'
			),

			't0' => 'Da',
			't1' => 'Nu',
			't2' => 'Salveaza Setarile'
		),

		'cnf_preloader' => array(
			't660' => array(
				'value' => 'Setarile Textului:'
			),

			't661' => array(
				'value' => 'Textul de zambete:'
			),

			't662' => array(
				'value' => 'Textul Principal a Chatului:'
			),

			't663' => array(
				'value' => 'Text de inceput:'
			),

			't664' => array(
				'value' => 'Text OK:'
			),

			't665' => array(
				'value' => 'Familia Fontului:'
			),

			't666' => array(
				'value' => 'Marimea Fontului:'
			),

			't667' => array(
				'value' => 'Culoarea Fontului:'
			),

			't668' => array(
				'value' => 'Culoarea de fundal:'
			),

			't669' => array(
				'value' => 'Culoarea barei:'
			),

			't985' => array(
				'value' => 'Arata butonul "Login" :',
				'hint' => "daca fals, butonul \'Login\'este ascuns"
			),

			't986' => array(
				'value' => 'Arata bara de titlu:',
				'hint' => 'daca fals,bara de titlu este ascunsa'
			),

			't987' => array(
				'value' => 'Tema:'
			),

			't988' => array(
				'value' => 'Latime:'
			),

			't989' => array(
				'value' => 'Inaltime:'
			),

			't990' => array(
				'value' => 'Mesaje admise:',
				'hint' => 'daca adevarat, mesajeze se arata daca nu sunt admise'
			),

			't991' => array(
				'value' => 'Aliniaza:',
				'hint' => "\'stanga\' sau \'dreapta\'"
			),

			't992' => array(
				'value' => 'eticheta X :'
			),

			't993' => array(
				'value' => 'eticheta Y :'
			),

			't994' => array(
				'value' => 'campul X :'
			),

			't995' => array(
				'value' => 'campul Y :'
			),

			't996' => array(
				'value' => 'Tipul textului:'
			),

			't997' => array(
				'value' => 'Latimea Textului:'
			),

			't998' => array(
				'value' => 'Mesaje admise:'
			),

			't999' => array(
				'value' => 'Aliniaza:'
			),

			't1000' => array(
				'value' => 'eticheta X:'
			),

			't1001' => array(
				'value' => ' eticheta Y:'
			),

			't1002' => array(
				'value' => ' campul X:'
			),

			't1003' => array(
				'value' => ' campul Y:'
			),

			't1004' => array(
				'value' => 'Tipul textului:'
			),

			't1005' => array(
				'value' => 'Latimea Textului:'
			),

			't1006' => array(
				'value' => 'Aliniaza:'
			),

			't1007' => array(
				'value' => 'eticheta X:'
			),

			't1008' => array(
				'value' => 'eticheta Y:'
			),

			't1009' => array(
				'value' => 'campul X:'
			),

			't1010' => array(
				'value' => 'campul Y:'
			),

			't1011' => array(
				'value' => 'Aliniaza:'
			),

			't1012' => array(
				'value' => ' eticheta X: '
			),

			't1013' => array(
				'value' => ' eticheta Y :'
			),

			't1014' => array(
				'value' => 'campul X :'
			),

			't1015' => array(
				'value' => ' campul Y :'
			),

			't1099' => array(
				'value' => 'Mesaje admise:',
				'hint' => 'daca adevarat, mesajeze se arata daca nu sunt admise'
			),

			't1100' => array(
				'value' => 'Mesaje admise:'
			),

			't0' => 'Setarile cutiei de autentificare',
			't1' => 'Nume utilizator',
			't2' => 'Parola',
			't3' => 'Limba',
			't4' => 'Titlu',
			't5' => 'Apasati aici pentru a alege culoarea',
			't6' => 'Da',
			't7' => 'Nu',
			't8' => 'Salveaza Setarile'
		),

		'cnf_smilies' => array(
			't672' => array(
				'value' => 'Zambet:',
				'hint' => 'dezactivati oricare zambet selectand "Off"'
			),

			't673' => array(
				'value' => 'Trist:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't674' => array(
				'value' => 'Clipit:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't675' => array(
				'value' => 'Raset:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't676' => array(
				'value' => 'Rosu:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't677' => array(
				'value' => 'Limba Scoasa:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't678' => array(
				'value' => 'Intreaba:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't679' => array(
				'value' => 'Respect:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't680' => array(
				'value' => 'bebe:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't681' => array(
				'value' => 'Cule:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't682' => array(
				'value' => 'Malefic:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't683' => array(
				'value' => 'Ranjet:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't684' => array(
				'value' => 'Inima:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't685' => array(
				'value' => 'Pupic:',
				'hint' => 'dezactiveaza oricare smile selectat "Off"'
			),

			't686' => array(
				'value' => 'Line noua:',
				'hint' => 'dezactiveaza oricare smile selectat "Off"'
			),

			't687' => array(
				'value' => 'Ninja:',
				'hint' => 'dezactiveaza oricare smile selectat "Off"'
			),

			't688' => array(
				'value' => 'Rula:',
				'hint' => 'dezactiveaza oricare smile selectat "Off"'
			),

			't689' => array(
				'value' => 'Ochi rotitori:',
				'hint' => 'dezactiveaza oricare smile selectat "Off"'
			),

			't690' => array(
				'value' => 'Slash :',
				'hint' => 'dezactiveaza oricare smile selectat "Off"'
			),

			't691' => array(
				'value' => 'Dormi:',
				'hint' => 'dezactiveaza oricare smile selectat "Off"'
			),

			't692' => array(
				'value' => 'Ciudat:',
				'hint' => 'dezactiveaza oricare smile selectat "Off"'
			),

			't693' => array(
				'value' => 'Fluierare:',
				'hint' => 'dezactiveaza oricare smile selectat "Off"'
			),

			't694' => array(
				'value' => 'Minune:',
				'hint' => 'dezactiveaza oricare smile selectat "Off"'
			),

			't695' => array(
				'value' => 'Suna:',
				'hint' => 'dezactiveaza oricare smile selectat "Off"'
			),

			't696' => array(
				'value' => 'Bani:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't697' => array(
				'value' => 'Soc:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't698' => array(
				'value' => 'Bifat:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't699' => array(
				'value' => 'Minge:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't700' => array(
				'value' => 'Aplauze:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't701' => array(
				'value' => 'Plange:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't702' => array(
				'value' => 'Noroc:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't703' => array(
				'value' => 'Nunu:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't704' => array(
				'value' => 'Pumn:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't705' => array(
				'value' => 'Craniu:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't706' => array(
				'value' => 'Aha:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't707' => array(
				'value' => 'Yin si yang:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't708' => array(
				'value' => 'Pamant:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't709' => array(
				'value' => 'Cum?:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't710' => array(
				'value' => 'Hipnoza:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't711' => array(
				'value' => 'Java:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't712' => array(
				'value' => 'Nu:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't713' => array(
				'value' => 'Ploaie:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't714' => array(
				'value' => 'Trandafir:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't715' => array(
				'value' => 'Usa:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't716' => array(
				'value' => 'Ranjet Mare:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't717' => array(
				'value' => 'Lesin:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't718' => array(
				'value' => 'Continut urat:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't719' => array(
				'value' => 'Muuuu:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't720' => array(
				'value' => 'Deget jos:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't721' => array(
				'value' => 'Deget sus:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't722' => array(
				'value' => 'Woof:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't723' => array(
				'value' => 'bere:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't724' => array(
				'value' => 'Muzica:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't725' => array(
				'value' => 'Citind:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't726' => array(
				'value' => 'Cuvant balon:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't727' => array(
				'value' => 'Femeie:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't728' => array(
				'value' => 'Femeie2:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't729' => array(
				'value' => 'barbat:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't730' => array(
				'value' => 'barbat2:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't731' => array(
				'value' => 'Administrator:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't732' => array(
				'value' => 'Moderator:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't733' => array(
				'value' => 'Minge de baschet:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't734' => array(
				'value' => 'Joc de popice:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't735' => array(
				'value' => 'Cricket:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't736' => array(
				'value' => 'Fotbal american:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't737' => array(
				'value' => 'Golf:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't738' => array(
				'value' => 'Hochei:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't739' => array(
				'value' => 'Navigaţie :',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't740' => array(
				'value' => 'Fotbal:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't741' => array(
				'value' => 'Tenis:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't742' => array(
				'value' => 'Steagul Australiei:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't743' => array(
				'value' => 'Steagul Braziliei:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't744' => array(
				'value' => 'Steagul Canadei:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't745' => array(
				'value' => 'China:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't746' => array(
				'value' => 'Spania:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't747' => array(
				'value' => 'Uniunea Europeana:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't748' => array(
				'value' => 'Franta:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't749' => array(
				'value' => 'Steagul Germaniei:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't750' => array(
				'value' => 'Steagul Greciei:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't751' => array(
				'value' => 'Steagul Indiei:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't752' => array(
				'value' => 'Italia:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't753' => array(
				'value' => 'Japonia:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't754' => array(
				'value' => 'Steagul Mexicului:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't755' => array(
				'value' => 'Steagul Poloniei:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't756' => array(
				'value' => 'Steagul Portugaliei:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't757' => array(
				'value' => 'Rusia:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't758' => array(
				'value' => 'Elvetia:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't759' => array(
				'value' => 'Steagul Ucraniei:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't760' => array(
				'value' => 'Regatul Unit:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't761' => array(
				'value' => 'Harta Statelor Unite:',
				'hint' => 'dezactivati oricare zambet selectand „Off”'
			),

			't0' => 'On',
			't1' => 'Off'

		),

		'cnf_sound' => array(
			't259' => array(
				'value' => 'Panorama Initiala:',
				'hint' => 'sir de la -100 pana la 100 (stanga..dreapta)',
				'r' => '(-100 ... 100)'

			),

			't260' => array(
				'value' => 'Volumul Initial:',
				'hint' => 'volumul sunetului initial, in procente',
				'r' => '(0 ... 100)'
			),

			't261' => array(
				'value' => 'Mut la toate:',
				'hint' => 'Mut la toate setarea initiala'
			),

			't262' => array(
				'hint' => 'Setati  "Da" pentru a activa acest sunet sau  "Nu" ca sa il dezactivati'
			),

			't263' => array(
				'hint' => 'Setati  "Da" pentru a activa acest sunet sau  "Nu" ca sa il dezactivati'
			),

			't264' => array(
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't265' => array(
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't266' => array(
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't267' => array(
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't268' => array(
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't269' => array(
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't270' => array(
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't271' => array(
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't272' => array(
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't273' => array(
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't274' => array(
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't275' => array(
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't276' => array(
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't277' => array(
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't813' => array(
				'value' => 'Sunet Clopotel :',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't814' => array(
				'value' => 'Paraseste Camera:',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't815' => array(
				'value' => 'Intrari alti utilizator:',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't816' => array(
				'value' => 'Mesaj primit:',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't817' => array(
				'value' => 'Mesaj trimis:',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't818' => array(
				'value' => 'Deschide/Inchide Camera:',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't819' => array(
				'value' => 'Autentificare Initiala:',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't820' => array(
				'value' => 'Deconectare:',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't821' => array(
				'value' => 'Deschide/Inchide lista combo:',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't822' => array(
				'value' => 'Utilizator banat/butat:',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't823' => array(
				'value' => 'Invitatie Primita:',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't824' => array(
				'value' => 'Mesaj Privat Primit:',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't825' => array(
				'value' => 'Meniul Utilizatorului MouseOver:',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't826' => array(
				'value' => 'Popup Deschis:',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't827' => array(
				'value' => 'Inchide/Minimalizeaza Popup :',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't828' => array(
				'value' => 'Intra in Camera:',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't829' => array(
				'value' => 'Cheie apasata:',
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't984' => array(
				'hint' => 'Setati  „Da” pentru a activa acest sunet sau  „Nu” ca sa il dezactivati'
			),

			't0' => 'Da',
			't1' => 'Nu',
			't2' => 'Numele Sunetului',
			't3' => 'Mut',
			't4' => 'Initial',
			't5' => 'Salveaza Setarile'
		),

		'cnf_theme' => array(
			't278' => array(
				'value' => 'Numele Temei:'
			),

			't279' => array(
				'value' => 'Fundalul dialogului:'
			),

			't280' => array(
				'value' => 'Imagine de Fundal:'
			),

			't282' => array(
				'value' => 'Arata Imaginea de Fundal:'
			),

			't283' => array(
				'value' => 'Transpareta Interfatei Utilizatorului:'
			),

			't284' => array(
				'value' => 'Culoare de titlu a dialogului:'
			),


			't285' => array(
				'value' => 'Culoarea de fundal a dialogului:'
			),

			't286' => array(
				'value' => 'Culoare de text a camerei:'
			),

			't287' => array(
				'value' => 'Culoarea de fundal a listei de utilizatori:'
			),

			't288' => array(
				'value' => 'Culoarea de fundal a Camerei:'
			),

			't289' => array(
				'value' => 'Culoarea de notificare la intrarea in camera:'
			),

			't290' => array(
				'value' => 'Culoarea de text a butonului:'
			),

			't291' => array(
				'value' => 'Culoarea butonului:'
			),

			't292' => array(
				'value' => 'Culoare butonului Apasat:'
			),

			't293' => array(
				'value' => 'Culoarea marginii butonului :'
			),

			't294' => array(
				'value' => 'Culoarea de fundal a scrularului:'
			),

			't295' => array(
				'value' => 'Culoarea de fundal a scrularului:'
			),

			't296' => array(
				'value' => 'Culoarea de fundal a scrularului apasat:'
			),

			't297' => array(
				'value' => 'Culoarea de fundal a cutiei de intrare:'
			),

			't298' => array(
				'value' => 'Culoarea de fundal pentru logurile private:'
			),

			't299' => array(
				'value' => 'Culoarea de fundal pentru logurile publice:'
			),

			't300' => array(
				'value' => 'Culoarea de margine:'
			),

			't301' => array(
				'value' => 'Culoare Textului de corp:'
			),

			't302' => array(
				'value' => 'Culoarea Textului Titlului:'
			),

			't303' => array(
				'value' => 'Culoarea de fundal:'
			),

			't304' => array(
				'value' => 'Culoarea recomandata pentru Utilizator:'
			),

			't305' => array(
				'value' => 'Culoarea butonului de inchidere:'
			),

			't306' => array(
				'value' => 'Culoarea butonului de inchidere la apasare:'
			),

			't307' => array(
				'value' => 'Culoarea marginii butonului de inchidere :'
			),

			't308' => array(
				'value' => 'Culoarea butonului de inchidere Sageata:'
			),

			't309' => array(
				'value' => 'Culoarea butonului de minimalizare:'
			),

			't310' => array(
				'value' => 'Culoarea butonului de minimalizare la apasare:'
			),

			't311' => array(
				'value' => 'Culoarea marginii butonului de minimalizare:'
			),

			't312' => array(
				'value' => 'Verifica Culoarea:'
			),

			't313' => array(
				'value' => 'Numele Temei:'
			),

			't314' => array(
				'value' => 'Dialog de Fundal:'
			),

			't315' => array(
				'value' => 'Imagine de Fundal:'
			),

			't317' => array(
				'value' => 'Arata Imagine de Fundal:'
			),

			't318' => array(
				'value' => 'Transpareta Interfatei Utilizatorului:'
			),

			't319' => array(
				'value' => 'Culoare de titlu a dialogului:'
			),

			't320' => array(
				'value' => 'Culoarea de fundal a dialogului:'
			),

			't321' => array(
				'value' => 'Culoare de text a camerei:'
			),

			't322' => array(
				'value' => 'Culoarea de fundal a Camerei:'
			),

			't323' => array(
				'value' => 'Culoarea de fundal a listei de utilizatori:'
			),

			't324' => array(
				'value' => 'Culoarea de notificare la intrarea in camera:'
			),

			't325' => array(
				'value' => 'Culoarea de text a butonului:'
			),

			't326' => array(
				'value' => 'Culoarea butonului:'
			),

			't327' => array(
				'value' => 'Culoarea marginii butonului :'
			),

			't328' => array(
				'value' => 'Culoarea de fundal a cutiei de intrare:'
			),

			't329' => array(
				'value' => 'Culoarea de fundal pentru logurile private:'
			),

			't330' => array(
				'value' => 'Culoarea de fundal pentru logurile publice:'
			),

			't331' => array(
				'value' => 'Culoarea de margine:'
			),

			't332' => array(
				'value' => 'Culoare Textului de corp:'
			),

			't333' => array(
				'value' => 'Culoarea Textului Titlului:'
			),

			't334' => array(
				'value' => 'Culoarea de fundal:'
			),

			't335' => array(
				'value' => 'Culoarea recomandata pentru Utilizator:'
			),

			't336' => array(
				'value' => 'Culoarea butonului de inchidere:'
			),

			't337' => array(
				'value' => 'Culoarea butonului de inchidere la apasare:'
			),

			't338' => array(
				'value' => 'Culoarea marginii butonului de inchidere :'
			),

			't339' => array(
				'value' => 'Culoarea butonului de inchidere Sageata:'
			),

			't340' => array(
				'value' => 'Culoarea butonului de minimalizare:'
			),

			't341' => array(
				'value' => 'Culoarea butonului de minimalizare la apasare:'
			),

			't342' => array(
				'value' => 'Culoarea marginii butonului de minimalizare:'
			),

			't343' => array(
				'value' => 'Verifica Culoarea:'
			),

			't344' => array(
				'value' => 'Numele Temei:'
			),

			't345' => array(
				'value' => 'Dialog de Fundal:'
			),

			't346' => array(
				'value' => 'Imagine de Fundal:'
			),

			't348' => array(
				'value' => 'Arata Imagine de Fundal:'
			),

			't349' => array(
				'value' => 'Transpareta Interfatei Utilizatorului:'
			),

			't350' => array(
				'value' => 'Culoare de titlu a dialogului:'
			),

			't351' => array(
				'value' => 'Culoarea de fundal a dialogului:'
			),

			't352' => array(
				'value' => 'Culoare de text a camerei:'
			),

			't353' => array(
				'value' => 'Culoarea de fundal a listei de utilizatori:'
			),

			't354' => array(
				'value' => 'Culoarea de fundal a camerei:'
			),

			't355' => array(
				'value' => 'Culoarea de notificare la intrarea in camera:'
			),

			't356' => array(
				'value' => 'Culoarea de text a butonului:'
			),

			't357' => array(
				'value' => 'Culoarea butonului:'
			),

			't359' => array(
				'value' => 'Culoarea marginii butonului :'
			),

			't361' => array(
				'value' => 'Culoarea de fundal a cutiei de intrare:'
			),

			't362' => array(
				'value' => 'Culoarea de fundal pentru logurile private:'
			),

			't363' => array(
				'value' => 'Culoarea de fundal pentru logurile publice:'
			),

			't364' => array(
				'value' => 'Culoarea de margine:'
			),

			't365' => array(
				'value' => 'Culoare Textului de corp:'
			),

			't366' => array(
				'value' => 'Culoarea Textului Titlului:'
			),

			't367' => array(
				'value' => 'Culoarea de fundal:'
			),

			't368' => array(
				'value' => 'Culoarea recomandata pentru Utilizator:'
			),

			't369' => array(
				'value' => 'Culoarea butonului de inchidere:'
			),

			't370' => array(
				'value' => 'Culoarea butonului de inchidere la apasare:'
			),

			't371' => array(
				'value' => 'Culoarea marginii butonului de inchidere :'
			),

			't372' => array(
				'value' => 'Culoarea butonului de inchidere Sageata:'
			),

			't373' => array(
				'value' => 'Culoarea butonului de minimalizare:'
			),

			't374' => array(
				'value' => 'Culoarea butonului de minimalizare la apasare:'
			),

			't375' => array(
				'value' => 'Culoarea marginii butonului de minimalizare:'
			),

			't376' => array(
				'value' => 'Verifica Culoarea:'
			),

			't377' => array(
				'value' => 'Numele Temei:'
			),

			't378' => array(
				'value' => 'Dialog de Fundal:'
			),

			't379' => array(
				'value' => 'Imagine de Fundal:'
			),

			't381' => array(
				'value' => 'Arata Imagine de Fundal:'
			),

			't382' => array(
				'value' => 'Transpareta Interfatei Utilizatorului:'
			),

			't383' => array(
				'value' => 'Culoare de titlu a dialogului:'
			),

			't384' => array(
				'value' => 'Culoarea de fundal a dialogului:'
			),

			't385' => array(
				'value' => 'Culoare de text a camerei:'
			),

			't386' => array(
				'value' => 'Culoarea de fundal a Camerei:'
			),

			't387' => array(
				'value' => 'Culoarea de fundal a listei de utilizatori:'
			),

			't388' => array(
				'value' => 'Culoarea de notificare la intrarea in camera:'
			),

			't389' => array(
				'value' => 'Culoarea de text a butonului:'
			),

			't390' => array(
				'value' => 'Culoarea butonului:'
			),

			't391' => array(
				'value' => 'Culoarea marginii butonului :'
			),

			't392' => array(
				'value' => 'Culoarea de fundal a cutiei de intrare:'
			),

			't393' => array(
				'value' => 'Culoarea de fundal pentru logurile private:'
			),

			't394' => array(
				'value' => 'Culoarea de fundal pentru logurile publice:'
			),

			't395' => array(
				'value' => 'Culoarea de margine:'
			),

			't396' => array(
				'value' => 'Culoare Textului de corp:'
			),

			't397' => array(
				'value' => 'Culoarea Textului Titlului:'
			),

			't398' => array(
				'value' => 'Culoarea de fundal:'
			),

			't399' => array(
				'value' => 'Culoarea recomandata pentru Utilizator:'
			),

			't400' => array(
				'value' => 'Culoarea butonului de inchidere:'
			),

			't401' => array(
				'value' => 'Culoarea butonului de inchidere la apasare:'
			),

			't402' => array(
				'value' => 'Culoarea marginii butonului de inchidere :'
			),

			't403' => array(
				'value' => 'Culoarea butonului de inchidere Sageata:'
			),

			't404' => array(
				'value' => 'Culoarea butonului de minimalizare:'
			),

			't405' => array(
				'value' => 'Culoarea butonului de minimalizare la apasare:'
			),

			't406' => array(
				'value' => 'Culoarea marginii butonului de minimalizare :'
			),

			't407' => array(
				'value' => 'Verifica Culoarea:'
			),

			't408' => array(
				'value' => 'Numele Temei:'
			),

			't409' => array(
				'value' => 'Dialog de Fundal:'
			),

			't410' => array(
				'value' => 'Imagine de Fundal:'
			),

			't412' => array(
				'value' => 'Arata Imaginea de Fundal:'
			),

			't413' => array(
				'value' => 'Transpareta Interfatei Utilizatorului:'
			),

			't414' => array(
				'value' => 'Culoare de titlu a dialogului:'
			),

			't415' => array(
				'value' => 'Culoarea de fundal a dialogului:'
			),

			't416' => array(
				'value' => 'Culoare de text a camerei:'
			),

			't417' => array(
				'value' => 'Culoarea de fundal a Camerei:'
			),

			't418' => array(
				'value' => 'Culoarea de fundal a listei de utilizatori:'
			),

			't419' => array(
				'value' => 'Culoarea de notificare la intrarea in camera:'
			),

			't420' => array(
				'value' => 'Culoarea de text a butonului:'
			),

			't421' => array(
				'value' => 'Culoarea butonului:'
			),

			't422' => array(
				'value' => 'Culoarea marginii butonului :'
			),

			't423' => array(
				'value' => 'Culoarea de fundal a cutiei de intrare:'
			),

			't424' => array(
				'value' => 'Culoarea de fundal pentru logurile private:'
			),

			't425' => array(
				'value' => 'Culoarea de fundal pentru logurile publice:'
			),

			't426' => array(
				'value' => 'Culoarea de margine:'
			),

			't427' => array(
				'value' => 'Culoare Textului de corp:'
			),

			't428' => array(
				'value' => 'Culoarea Textului Titlului:'
			),

			't429' => array(
				'value' => 'Culoarea de fundal:'
			),

			't430' => array(
				'value' => 'Culoarea recomandata pentru Utilizator:'
			),

			't431' => array(
				'value' => 'Culoarea butonului de inchidere:'
			),

			't432' => array(
				'value' => 'Culoarea butonului de inchidere la apasare:'
			),

			't433' => array(
				'value' => 'Culoarea marginii butonului de inchidere:'
			),

			't434' => array(
				'value' => 'Culoarea butonului de inchidere Sageata:'
			),

			't435' => array(
				'value' => 'Culoarea butonului de minimalizare:'
			),

			't436' => array(
				'value' => 'Culoarea butonului de minimalizare la apasare:'
			),

			't437' => array(
				'value' => 'Culoarea marginii butonului de minimalizare :'
			),

			't438' => array(
				'value' => 'Verifica Culoarea:'
			),

			't439' => array(
				'value' => 'Numele Temei:'
			),

			't440' => array(
				'value' => 'Dialog de Fundal:'
			),

			't441' => array(
				'value' => 'Imaginea de Fundal:'
			),

			't443' => array(
				'value' => 'Arata Imaginea de Fundal:'
			),

			't444' => array(
				'value' => 'Transpareta Interfatei Utilizatorului:'
			),

			't445' => array(
				'value' => 'Culoare de titlu a dialogului:'
			),

			't446' => array(
				'value' => 'Culoarea de fundal a dialogului:'
			),

			't447' => array(
				'value' => 'Culoare de text a camerei:'
			),

			't448' => array(
				'value' => 'Culoarea de fundal a Camerei:'
			),

			't449' => array(
				'value' => 'Culoarea de fundal a listei de utilizatori:'
			),

			't450' => array(
				'value' => 'Culoarea de notificare la intrarea in camera:'
			),

			't451' => array(
				'value' => 'Culoarea de text a butonului:'
			),

			't452' => array(
				'value' => 'Culoarea butonului:'
			),

			't453' => array(
				'value' => 'Culoarea marginii butonului :'
			),

			't454' => array(
				'value' => 'Culoarea de fundal a cutiei de intrare:'
			),

			't455' => array(
				'value' => 'Culoarea de fundal pentru logurile private:'
			),

			't456' => array(
				'value' => 'Culoarea de fundal pentru logurile publice:'
			),

			't457' => array(
				'value' => 'Culoarea de margine:'
			),

			't458' => array(
				'value' => 'Culoare Textului de corp:'
			),

			't459' => array(
				'value' => 'Culoarea Textului Titlului:'
			),

			't460' => array(
				'value' => 'Culoarea de fundal:'
			),

			't461' => array(
				'value' => 'Culoarea recomandata pentru Utilizator:'
			),

			't462' => array(
				'value' => 'Culoarea butonului de inchidere:'
			),

			't463' => array(
				'value' => 'Culoarea butonului de inchidere la apasare:'
			),

			't464' => array(
				'value' => 'Culoarea marginii butonului de inchidere :'
			),

			't465' => array(
				'value' => 'Culoarea butonului de inchidere Sageata:'
			),

			't466' => array(
				'value' => 'Culoarea butonului de minimalizare:'
			),

			't467' => array(
				'value' => 'Culoarea butonului de minimalizare la apasare:'
			),

			't468' => array(
				'value' => 'Culoarea marginii butonului de minimalizare :'
			),

			't469' => array(
				'value' => 'Verifica Culoarea:'
			),

			't470' => array(
				'value' => 'Numele Temei:'
			),

			't471' => array(
				'value' => 'Dialog de Fundal:'
			),

			't472' => array(
				'value' => 'Imaginea de Fundal:'
			),

			't474' => array(
				'value' => 'Arata Imaginea de Fundal:'
			),

			't475' => array(
				'value' => 'Transpareta Interfatei Utilizatorului:'
			),

			't476' => array(
				'value' => 'Culoare de titlu a dialogului:'
			),

			't477' => array(
				'value' => 'Culoarea de fundal a dialogului:'
			),

			't478' => array(
				'value' => 'Culoare de text a camerei:'
			),

			't479' => array(
				'value' => 'Culoarea de fundal a Camerei:'
			),

			't480' => array(
				'value' => 'Culoarea de fundal a listei de utilizatori:'
			),

			't481' => array(
				'value' => 'Culoarea de notificare la intrarea in camera:'
			),

			't482' => array(
				'value' => 'Culoarea de text a butonului:'
			),

			't483' => array(
				'value' => 'Culoarea butonului:'
			),

			't484' => array(
				'value' => 'Culoarea marginii butonului :'
			),

			't485' => array(
				'value' => 'Culoarea de fundal a cutiei de intrare:'
			),

			't486' => array(
				'value' => 'Culoarea de fundal pentru logurile private:'
			),

			't487' => array(
				'value' => 'Culoarea de fundal pentru logurile publice:'
			),

			't488' => array(
				'value' => 'Culoarea de margine:'
			),

			't489' => array(
				'value' => 'Culoare Textului de corp:'
			),

			't490' => array(
				'value' => 'Culoarea Textului Titlului:'
			),

			't491' => array(
				'value' => 'Culoarea de fundal:'
			),

			't492' => array(
				'value' => 'Culoarea recomandata pentru Utilizator:'
			),

			't493' => array(
				'value' => 'Culoarea butonului de inchidere:'
			),

			't494' => array(
				'value' => 'Culoarea butonului de inchidere la apasare:'
			),

			't495' => array(
				'value' => 'Culoarea marginii butonului de inchidere :'
			),

			't496' => array(
				'value' => 'Culoarea butonului de inchidere Sageata:'
			),

			't497' => array(
				'value' => 'Culoarea butonului de minimalizare:'
			),

			't498' => array(
				'value' => 'Culoarea butonului de minimalizare la apasare:'
			),

			't499' => array(
				'value' => 'Culoarea marginii butonului de minimalizare :'
			),

			't500' => array(
				'value' => 'Verifica Culoarea:'
			),

			't501' => array(
				'value' => 'Numele Temei:'
			),

			't502' => array(
				'value' => 'Dialog de Fundal:'
			),

			't503' => array(
				'value' => 'Imaginea de Fundal:'
			),

			't505' => array(
				'value' => 'Arata Imaginea de Fundal:'
			),

			't506' => array(
				'value' => 'Transpareta Interfatei Utilizatorului:'
			),

			't507' => array(
				'value' => 'Culoare de titlu a dialogului:'
			),

			't508' => array(
				'value' => 'Culoarea de fundal a dialogului:'
			),

			't509' => array(
				'value' => 'Culoare de text a camerei:'
			),

			't510' => array(
				'value' => 'Culoarea de fundal a Camerei:'
			),

			't511' => array(
				'value' => 'Culoarea de fundal a listei de utilizatori:'
			),

			't512' => array(
				'value' => 'Culoarea de notificare la intrarea in camera:'
			),

			't513' => array(
				'value' => 'Culoarea de text a butonului:'
			),

			't514' => array(
				'value' => 'Culoarea butonului:'
			),

			't515' => array(
				'value' => 'Culoarea marginii butonului :'
			),

			't516' => array(
				'value' => 'Culoarea de fundal a cutiei de intrare:'
			),

			't517' => array(
				'value' => 'Culoarea de fundal pentru logurile private:'
			),

			't518' => array(
				'value' => 'Culoarea de fundal pentru logurile publice:'
			),

			't519' => array(
				'value' => 'Culoarea de margine:'
			),

			't520' => array(
				'value' => 'Culoare Textului de corp:'
			),

			't521' => array(
				'value' => 'Culoarea Textului Titlului:'
			),

			't522' => array(
				'value' => 'Culoarea de fundal:'
			),

			't523' => array(
				'value' => 'Culoarea recomandata pentru Utilizator:'
			),

			't524' => array(
				'value' => 'Culoarea butonului de inchidere:'
			),

			't525' => array(
				'value' => 'Culoarea butonului de inchidere la apasare:'
			),

			't526' => array(
				'value' => 'Culoarea marginii butonului de inchidere :'
			),

			't527' => array(
				'value' => 'Culoarea butonului de inchidere Sageata:'
			),

			't528' => array(
				'value' => 'Culoarea butonului de minimalizare:'
			),

			't529' => array(
				'value' => 'Culoarea butonului de minimalizare la apasare:'
			),

			't530' => array(
				'value' => 'Culoarea marginii butonului de minimalizare :'
			),

			't531' => array(
				'value' => 'Verifica Culoarea:'
			),

			't532' => array(
				'value' => 'Numele Temei:'
			),

			't533' => array(
				'value' => 'Dialog de Fundal:'
			),

			't534' => array(
				'value' => 'Imaginea de Fundal:'
			),

			't536' => array(
				'value' => 'Arata Imaginea de Fundal:'
			),

			't537' => array(
				'value' => 'Transpareta Interfatei Utilizatorului:'
			),

			't538' => array(
				'value' => 'Culoare de titlu a dialogului:'
			),

			't539' => array(
				'value' => 'Culoarea de fundal a dialogului:'
			),

			't540' => array(
				'value' => 'Culoare de text a camerei:'
			),

			't541' => array(
				'value' => 'Culoarea de fundal a Camerei:'
			),

			't542' => array(
				'value' => 'Culoarea de fundal a listei de utilizatori:'
			),

			't543' => array(
				'value' => 'Culoarea de notificare la intrarea in camera:'
			),

			't544' => array(
				'value' => 'Culoarea de text a butonului:'
			),

			't545' => array(
				'value' => 'Culoarea butonului:'
			),

			't546' => array(
				'value' => 'Culoarea marginii butonului :'
			),

			't547' => array(
				'value' => 'Culoarea de fundal a cutiei de intrare:'
			),

			't548' => array(
				'value' => 'Culoarea de fundal pentru logurile private:'
			),

			't549' => array(
				'value' => 'Culoarea de fundal pentru logurile publice:'
			),

			't550' => array(
				'value' => 'Culoarea de margine:'
			),

			't551' => array(
				'value' => 'Culoare Textului de corp:'
			),

			't552' => array(
				'value' => 'Culoarea Textului Titlului:'
			),

			't553' => array(
				'value' => 'Culoarea de fundal:'
			),

			't554' => array(
				'value' => 'Culoarea recomandata pentru Utilizator:'
			),

			't555' => array(
				'value' => 'Culoarea butonului de inchidere:'
			),

			't556' => array(
				'value' => 'Culoarea butonului de inchidere la apasare:'
			),

			't557' => array(
				'value' => 'Culoarea marginii butonului de inchidere :'
			),

			't558' => array(
				'value' => 'Culoarea butonului de inchidere Sageata:'
			),

			't559' => array(
				'value' => 'Culoarea butonului de minimalizare:'
			),

			't560' => array(
				'value' => 'Culoarea butonului de minimalizare la apasare:'
			),

			't561' => array(
				'value' => 'Culoarea marginii butonului de minimalizare :'
			),

			't562' => array(
				'value' => 'Verifica Culoarea:'
			),

			't563' => array(
				'value' => 'Numele Temei:'
			),

			't564' => array(
				'value' => 'Dialog de Fundal:'
			),

			't565' => array(
				'value' => 'Imaginea de Fundal:'
			),

			't567' => array(
				'value' => 'Arata Imaginea de Fundal:'
			),

			't568' => array(
				'value' => 'Transpareta Interfatei Utilizatorului:'
			),

			't569' => array(
				'value' => 'Culoare de titlu a dialogului:'
			),

			't570' => array(
				'value' => 'Culoarea de fundal a dialogului:'
			),

			't571' => array(
				'value' => 'Culoare de text a camerei:'
			),

			't572' => array(
				'value' => 'Culoarea de fundal a Camerei:'
			),

			't573' => array(
				'value' => 'Culoarea de fundal a listei de utilizatori:'
			),

			't574' => array(
				'value' => 'Culoarea de notificare la intrarea in camera:'
			),

			't575' => array(
				'value' => 'Culoarea de text a butonului:'
			),

			't576' => array(
				'value' => 'Culoarea butonului:'
			),

			't577' => array(
				'value' => 'Culoarea marginii butonului :'
			),

			't578' => array(
				'value' => 'Culoarea de fundal a cutiei de intrare:'
			),

			't579' => array(
				'value' => 'Culoarea de fundal pentru logurile private:'
			),

			't580' => array(
				'value' => 'Culoarea de fundal pentru logurile publice:'
			),

			't581' => array(
				'value' => 'Culoarea de margine:'
			),

			't582' => array(
				'value' => 'Culoare Textului de corp:'
			),

			't583' => array(
				'value' => 'Culoarea Textului Titlului:'
			),

			't584' => array(
				'value' => 'Culoarea de fundal:'
			),

			't585' => array(
				'value' => 'Culoarea recomandata pentru Utilizator:'
			),

			't586' => array(
				'value' => 'Culoarea butonului de inchidere:'
			),

			't587' => array(
				'value' => 'Culoarea butonului de inchidere la apasare:'
			),

			't588' => array(
				'value' => 'Culoarea marginii butonului de inchidere :'
			),

			't589' => array(
				'value' => 'Culoarea butonului de inchidere Sageata:'
			),

			't590' => array(
				'value' => 'Culoarea butonului de minimalizare:'
			),

			't591' => array(
				'value' => 'Culoarea butonului de minimalizare la apasare:'
			),

			't592' => array(
				'value' => 'Culoarea marginii butonului de minimalizare :'
			),

			't593' => array(
				'value' => 'Verifica Culoarea:'
			),

			't594' => array(
				'value' => 'Numele Temei:'
			),

			't595' => array(
				'value' => 'Dialog de Fundal:'
			),

			't596' => array(
				'value' => 'Imaginea de Fundal:'
			),

			't598' => array(
				'value' => 'Arata Imaginea de Fundal:'
			),

			't599' => array(
				'value' => 'Transpareta Interfatei Utilizatorului:'
			),

			't600' => array(
				'value' => 'Culoare de titlu a dialogului:'
			),

			't601' => array(
				'value' => 'Culoarea de fundal a dialogului:'
			),

			't602' => array(
				'value' => 'Culoare de text a camerei:'
			),

			't603' => array(
				'value' => 'Culoarea de fundal a Camerei:'
			),

			't604' => array(
				'value' => 'Culoarea de fundal a listei de utilizatori:'
			),

			't605' => array(
				'value' => 'Culoarea de notificare la intrarea in camera:'
			),

			't606' => array(
				'value' => 'Culoarea de text a butonului:'
			),

			't607' => array(
				'value' => 'Culoarea butonului:'
			),

			't608' => array(
				'value' => 'Culoarea marginii butonului :'
			),

			't609' => array(
				'value' => 'Culoarea de fundal a cutiei de intrare:'
			),

			't610' => array(
				'value' => 'Culoarea de fundal pentru logurile private:'
			),

			't611' => array(
				'value' => 'Culoarea de fundal pentru logurile publice:'
			),

			't612' => array(
				'value' => 'Culoarea de margine:'
			),

			't613' => array(
				'value' => 'Culoare Textului de corp:'
			),

			't614' => array(
				'value' => 'Culoarea Textului Titlului:'
			),

			't615' => array(
				'value' => 'Culoarea de fundal:'
			),

			't616' => array(
				'value' => 'Culoarea recomandata pentru Utilizator:'
			),

			't617' => array(
				'value' => 'Culoarea butonului de inchidere:'
			),

			't618' => array(
				'value' => 'Culoarea butonului de inchidere la apasare:'
			),

			't619' => array(
				'value' => 'Culoarea marginii butonului de inchidere :'
			),

			't620' => array(
				'value' => 'Culoarea butonului de inchidere Sageata:'
			),

			't621' => array(
				'value' => 'Culoarea butonului de minimalizare:'
			),

			't622' => array(
				'value' => 'Culoarea butonului de minimalizare la apasare:'
			),

			't623' => array(
				'value' => 'Culoarea marginii butonului de minimalizare :'
			),

			't624' => array(
				'value' => 'Verifica Culoarea:'
			),

			't1016' => array(
				'value' => 'Controlurile de fundal'
			),

			't1017' => array(
				'value' => 'Titlu'
			),

			't1018' => array(
				'value' => 'bara de scroll'
			),

			't1019' => array(
				'value' => 'Lista cu obiecte ale utilizatorului'
			),

			't1020' => array(
				'value' => 'Apasa butonul'
			),

			't1021' => array(
				'value' => 'Controlurile de fundal'
			),

			't1022' => array(
				'value' => 'Titlu'
			),

			't1023' => array(
				'value' => 'Fundalul de Scroll'
			),

			't1024' => array(
				'value' => 'Fundalul de Scroll la apasare'
			),

			't1025' => array(
				'value' => 'bara de scroll'
			),

			't1026' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1027' => array(
				'value' => 'Lista cu obiecte a utilizatorului'
			),

			't1028' => array(
				'value' => 'Controlurile de fundal'
			),

			't1029' => array(
				'value' => 'Titlu'
			),

			't1030' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1031' => array(
				'value' => 'Fundalul De Scroll Apasat'
			),

			't1032' => array(
				'value' => 'bara de scroll'
			),

			't1033' => array(
				'value' => 'Lista cu obiecte a utilizatorului'
			),

			't1034' => array(
				'value' => 'Apasa butonul'
			),

			't1035' => array(
				'value' => 'Controlurile de fundal'
			),

			't1036' => array(
				'value' => 'Titlu'
			),

			't1037' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1038' => array(
				'value' => 'Fundalul De Scroll Apasat'
			),

			't1039' => array(
				'value' => 'bara de scroll'
			),

			't1040' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1041' => array(
				'value' => 'Lista cu obiecte a utilizatorului'
			),

			't1042' => array(
				'value' => 'Apasa butonul'
			),

			't1043' => array(
				'value' => 'Controlurile de fundal'
			),

			't1044' => array(
				'value' => 'Titlu'
			),

			't1045' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1046' => array(
				'value' => 'Fundalul De Scroll Apasat'
			),

			't1047' => array(
				'value' => 'bara de scroll'
			),

			't1048' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1049' => array(
				'value' => 'Lista cu obiecte a utilizatorului'
			),

			't1050' => array(
				'value' => 'Apasa butonul'
			),

			't1051' => array(
				'value' => 'Controlurile de fundal'
			),

			't1052' => array(
				'value' => 'Titlu'
			),

			't1053' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1054' => array(
				'value' => 'Fundalul De Scroll Apasat'
			),

			't1055' => array(
				'value' => 'Bara de scroll'
			),

			't1056' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1057' => array(
				'value' => 'Lista cu obiecte a utilizatorului'
			),

			't1058' => array(
				'value' => 'Apasa butonul'
			),

			't1059' => array(
				'value' => 'Controlurile de fundal'
			),

			't1060' => array(
				'value' => 'Titlu'
			),

			't1061' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1062' => array(
				'value' => 'Fundalul De Scroll Apasat'
			),

			't1063' => array(
				'value' => 'bara de scroll'
			),

			't1064' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1065' => array(
				'value' => 'Lista cu obiecte a utilizatorului'
			),

			't1066' => array(
				'value' => 'Apasa butonul'
			),

			't1067' => array(
				'value' => 'Controlurile de fundal'
			),

			't1068' => array(
				'value' => 'Titlu'
			),

			't1069' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1070' => array(
				'value' => 'Fundalul De Scroll Apasat'
			),

			't1071' => array(
				'value' => 'bara de scroll'
			),

			't1072' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1073' => array(
				'value' => 'Lista cu obiecte a utilizatorului'
			),

			't1074' => array(
				'value' => 'Apasa butonul'
			),

			't1075' => array(
				'value' => 'Controlurile de fundal'
			),

			't1076' => array(
				'value' => 'Titlu'
			),

			't1077' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1078' => array(
				'value' => 'Fundalul De Scroll Apasat'
			),

			't1079' => array(
				'value' => 'bara de scroll'
			),

			't1080' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1081' => array(
				'value' => 'Lista cu obiecte a utilizatorului'
			),

			't1082' => array(
				'value' => 'Apasa butonul'
			),

			't1083' => array(
				'value' => 'Controlurile de fundal'
			),

			't1084' => array(
				'value' => 'Titlu'
			),

			't1085' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1086' => array(
				'value' => 'Fundalul De Scroll Apasat'
			),

			't1087' => array(
				'value' => 'bara de scroll'
			),

			't1088' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1089' => array(
				'value' => 'Lista cu obiecte a utilizatorului'
			),

			't1090' => array(
				'value' => 'Apasa butonul'
			),

			't1091' => array(
				'value' => 'Controlurile de fundal'
			),

			't1092' => array(
				'value' => 'Titlu'
			),

			't1093' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1094' => array(
				'value' => 'Fundalul De Scroll Apasat'
			),

			't1095' => array(
				'value' => 'bara de scroll'
			),

			't1096' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1097' => array(
				'value' => 'Lista cu obiecte a utilizatorului'
			),

			't1113' => array(
				'value' => 'Culoare butonului Apasat:'
			),

			't1114' => array(
				'value' => 'Culoarea de fundal a scrularului:'
			),

			't1118' => array(
				'value' => 'Numele Temei:'
			),

			't1119' => array(
				'value' => 'Dialog de Fundal:'
			),

			't1120' => array(
				'value' => 'Imaginea de Fundal:'
			),

			't1122' => array(
				'value' => 'Arata Imaginea de Fundal:'
			),

			't1123' => array(
				'value' => 'Transpareta Interfatei Utilizatorului:'
			),

			't1124' => array(
				'value' => 'Culoare de titlu a dialogului:'
			),

			't1125' => array(
				'value' => 'Culoarea de fundal a dialogului:'
			),

			't1126' => array(
				'value' => 'Culoare de text a camerei:'
			),

			't1127' => array(
				'value' => 'Culoarea de fundal a Camerei:'
			),

			't1128' => array(
				'value' => 'Culoarea de fundal a listei de utilizatori:'
			),

			't1129' => array(
				'value' => 'Culoarea de notificare la intrarea in camera:'
			),

			't1130' => array(
				'value' => 'Culoarea de text a butonului:'
			),

			't1131' => array(
				'value' => 'Culoarea butonului:'
			),

			't1132' => array(
				'value' => 'Culoarea marginii butonului:'
			),

			't1133' => array(
				'value' => 'Culoarea de fundal a cutiei de intrare:'
			),

			't1134' => array(
				'value' => 'Culoarea de fundal pentru logurile private:'
			),

			't1135' => array(
				'value' => 'Culoarea de fundal pentru logurile publice:'
			),

			't1136' => array(
				'value' => 'Culoarea de margine:'
			),

			't1137' => array(
				'value' => 'Culoare Textului de corp:'
			),

			't1138' => array(
				'value' => 'Culoarea Textului Titlului:'
			),

			't1139' => array(
				'value' => 'Culoarea de fundal:'
			),

			't1140' => array(
				'value' => 'Culoarea recomandata pentru Utilizator:'
			),

			't1141' => array(
				'value' => 'Culoarea butonului de inchidere:'
			),

			't1142' => array(
				'value' => 'Culoarea butonului de inchidere la apasare:'
			),

			't1143' => array(
				'value' => 'Culoarea marginii butonului de inchidere :'
			),

			't1144' => array(
				'value' => 'Culoarea butonului de inchidere Sageata:'
			),

			't1145' => array(
				'value' => 'Culoarea butonului de minimalizare:'
			),

			't1146' => array(
				'value' => 'Culoarea butonului de minimalizare la apasare:'
			),

			't1147' => array(
				'value' => 'Culoarea marginii butonului de minimalizare :'
			),

			't1148' => array(
				'value' => 'Verifica Culoarea:'
			),

			't1149' => array(
				'value' => 'Apasa butonul'
			),

			't1150' => array(
				'value' => 'Controlurile de fundal'
			),

			't1151' => array(
				'value' => 'Titlu'
			),

			't1152' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1153' => array(
				'value' => 'Fundalul De Scroll Apasat'
			),

			't1154' => array(
				'value' => 'Bara de scroll'
			),

			't1155' => array(
				'value' => 'Fundalul De Scroll'
			),

			't1156' => array(
				'value' => 'Lista cu obiecte a utilizatorului'
			),

			't1157' => array(
				'value' => 'Numele Temei:'
			),

			't1158' => array(
				'value' => 'Dialog de Fundal:'
			),

			't1159' => array(
				'value' => 'Imaginea de Fundal:'
			),

			't1161' => array(
				'value' => 'Arata Imaginea de Fundal:'
			),

			't1162' => array(
				'value' => 'Transpareta Interfatei Utilizatorului:'
			),

			't1163' => array(
				'value' => 'Culoare de titlu a dialogului:'
			),

			't1164' => array(
				'value' => 'Culoarea de fundal a dialogului:'
			),

			't1165' => array(
				'value' => 'Culoare de text a camerei:'
			),

			't1166' => array(
				'value' => 'Culoarea de fundal a listei de utilizatori:'
			),

			't1167' => array(
				'value' => 'Culoarea de fundal a Camerei:'
			),

			't1168' => array(
				'value' => 'Culoarea de notificare la intrarea in camera:'
			),

			't1169' => array(
				'value' => 'Culoarea de text a butonului:'
			),

			't1170' => array(
				'value' => 'Culoarea butonului:'
			),

			't1171' => array(
				'value' => 'Culoare butonului apasat:'
			),

			't1172' => array(
				'value' => 'Culoarea marginii butonului :'
			),

			't1173' => array(
				'value' => 'Culoarea de fundal pentru Scroller:'
			),

			't1174' => array(
				'value' => 'Culoarea de fundal a cutiei de intrare:'
			),

			't1175' => array(
				'value' => 'Culoarea de fundal pentru logurile private:'
			),

			't1176' => array(
				'value' => 'Culoarea de fundal pentru logurile publice:'
			),

			't1177' => array(
				'value' => 'Culoarea de margine:'
			),

			't1178' => array(
				'value' => 'Culoare Textului de corp:'
			),

			't1179' => array(
				'value' => 'Culoarea Textului Titlului:'
			),

			't1180' => array(
				'value' => 'Culoarea de fundal:'
			),

			't1181' => array(
				'value' => 'Culoarea recomandata pentru Utilizator:'
			),

			't1182' => array(
				'value' => 'Culoarea butonului de inchidere:'
			),

			't1183' => array(
				'value' => 'Culoarea butonului de inchidere la apasare:'
			),

			't1184' => array(
				'value' => 'Culoarea marginii butonului de inchidere :'
			),

			't1185' => array(
				'value' => 'Culoarea butonului de inchidere sageata:'
			),

			't1186' => array(
				'value' => 'Culoarea butonului de minimalizare:'
			),

			't1187' => array(
				'value' => 'Culoarea butonului de minimalizare la apasare:'
			),

			't1188' => array(
				'value' => 'Culoarea marginii butonului de minimalizare :'
			),

			't1189' => array(
				'value' => 'Verifica Culoarea:'
			),

			't0' => 'Imaginea de Fundal pentru tema:',
			't1' => 'Incarca',
			't2' => 'Adauga o noua tema',
			't3' => 'Schimba setarile pentru:',
			't4' => 'Aceasta Tema',
			't5' => 'Noul Nume a Temei:',
			't6' => 'Aceaste Teme',
			't7' => 'Da',
			't8' => 'Nu',
			't9' => 'Apasa aici pentru a selecta culoarea',
			't10' => 'Vizualizare',
			't11' => 'Salveaza Setarile'
		),

		'cnf_list' => array(
			't0' => 'Da',
			't1' => 'Nu',
			't2' => 'Salveaza Setarile'
		),

		'cnf_languages' => array(
			't0' => 'Comanda',
			't1' => 'Nume fisier',
			't2' => 'Bump up'
		)
	);
?>

