<?php
	$GLOBALS['fc_config']['languages']['gr'] = array(
		'name' => "Ελληνικά",
		
		'messages' => array(
			'ignored' => "O χρήστης 'USER_LABEL' αγνοεί τα μηνύματα σας",
			'banned' => "Έχετε απορριφθεί από το chat",
			'login' => 'Παρακαλώ συνδεθείτε στο chat',
			'wrongPass' => 'Το όνομα του χρήστη ή ο κωδικός δεν ήταν σωστός. Παρακαλώ δοκιμάστε ξανά.',
			'anotherlogin' => 'Άλλος χρήστης είναι συνδεδεμένος με αυτό το όνομα. Παρακαλώ δοκιμάστε ξανά.',
			'expiredlogin' => 'H σύνδεση σας έχει λήξει. Παρακαλώ συνδεθείτε ξανά.',
			'enterroom' => "[ROOM_LABEL]: Ο/Η USER_LABEL ήρθε στις TIMESTAMP",
			'leaveroom' => "[ROOM_LABEL]: Ο/Η USER_LABEL έφυγε στις TIMESTAMP",
			'selfenterroom' => "Καλώς ορίσατε! Ήρθατε στο δωμάτιο [ROOM_LABEL] στις TIMESTAMP",
			'bellrang' => 'ο χρήστης USER_LABEL κτύπησε το κουδούνι',
			'chatfull' => 'Το chat είναι πλήρες. Παρακαλώ δοκιμάστε αργότερα.',
			'iplimit' => 'Είστε ήδη στο chat.'
		),

		'usermenu' => array(
			'profile' => "προφίλ",
			'unban' => "Αναίρεση απαγόρευσης",
			'ban' => "Απαγόρευση",
			'unignore' => "Αναίρεση παράβλεψης",
			'fileshare' => 'Ανταλλαγή Αρχείου',
			'ignore' => "Παράβλεψη",
			'invite' => "Πρόσκληση",
			'privatemessage' => "Προσωπικό μήνυμα",
		),

		'status' => array(
			'away' => "Μακριά",
			'busy' => "Απασχολημένος",
			'here' => "Εδώ",
			'brb'  => 'Επιστρέφω αμέσως',			
		),
		
		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "Το δωμάτιο 'ROOM_LABEL' δέν βρέθηκε",
				'usernotfound' => "Ο χρήστης 'USER_LABEL' δεν βρέθηκε",
				'unbanned' => "Η απαγόρευση εισόδου σας, αναιρέθηκε από τον χρήστη 'USER_LABEL'",
				'banned' => "Σας απαγορεύτηκε η είσοδος από τον χρήστη 'USER_LABEL'",
				'unignored' => "Ο χρήστης 'USER_LABEL' αναίρεσε την παράβλεψη των μηνυμάτων σας.",
				'ignored' => "Τα μηνύματα σας παραβλέπονται από τον χρήστη 'USER_LABEL'",
				'invitationdeclined' => "Ο χρήστης 'USER_LABEL' απέρριψε την πρόσκληση σας για το δωμάτιο 'ROOM_LABEL':",
				'invitationaccepted' => "Ο χρήστης 'USER_LABEL' δέχτηκε την πρόσκληση σας για το δωμάτιο 'ROOM_LABEL'",
				'roomnotcreated' => "Το δωμάτιο δεν δημιουργήθηκε:",
				'roomisfull' => 'Το [ROOM_LABEL] είναι γεμάτο. Παρακαλώ δοκιμάστε σε άλλο δωμάτιο.',
				'alert' => '<b>ΣΗΜΑ ΚΙΝΔΥΝΟΥ!</b><br><br>',
				'chatalert' => '<b>ΣΗΜΑ ΚΙΝΔΥΝΟΥ!</b><br><br>',
				'gag' => "<b>Σας έχει επιβληθεί σιγή για DURATION λεπτό(ά)!</b><br><br>Μπορείτε να βλέπετε τα μηνύματα σε αυτό το δωμάτιο, αλλά δεν μπορείτε να στείλετε ".
						 "νέα μηνύματα στη συζήτηση μέχρι να λήξη η επιβολή σιγής.",
				'ungagged' => "Η επιβολή σιγής έχει αρθεί από τον χρήστη 'USER_LABEL'",		 
				'gagconfirm' => 'Έχει επιβληθεί σιγή στον χρήστη USER_LABEL για MINUTES λεπτό(ά).',
				'alertconfirm' => 'Ο χρήστης USER_LABEL διάβασε το σήμα κινδύνου.',
				'file_declined' => 'Το αρχείο σας απορρίφθηκε από τον χρήστη USER_LABEL.',
				'file_accepted' => 'Ο χρήστης USER_LABEL δέχεται το αρχείο σας.',
			),
			
			'unignore' => array(
				'unignoreBtn' => "Αναίρεση παράβλεψης",
				'unignoretext' => "Εισάγετε το κείμενο της αναίρεσης παράβλεψης",
			),
			
			'unban' => array(
				'unbanBtn' => "Αναίρεση απαγόρευσης",
				'unbantext' => "Εισάγετε το κείμενο της αναίρεσης απαγόρευσης",
			),
			
			'tablabels' => array(
				'themes' => "Θέματα",
				'sounds' => "ήχοι",
				'text'  => "κείμενο",
				'effects'  => 'εφφέ',
				'admin'  => 'διαχειριστής',
				'about' => 'σχετικά',
			),
			
			'text' => array(
				'itemChange' => "Στοιχείο που θα αλλάξει",
				'fontSize' => "Μέγεθος Γραμματοσειράς",
				'fontFamily' => "Τύπος Γραμματοσειράς",
				'language' => "Γλώσσα",
				'mainChat' => "Κύριο Chat",
				'interfaceElements' => "Γραφικό περιβάλλον",
				'title' => "Τίτλος",
				'mytextcolor' => 'Χρήση το δικού μου χρώματος κειμένου σε όλα τα εισερχόμενα μηνύματα.',
			),

			'effects' => array(
				'avatars' => 'Εικονίδια',
				'mainchat' => 'Κυρίως chat',
				'roomlist' => 'Κατάλογος Δωματίων',
				'background' => 'Φόντο',
				'custom' => 'Προσαρμοσμένο',
				'showBackgroundImages' => 'Εμφάνιση φόντου',
				'splashWindow' => 'Εμφάνιση παραθύρου σε νέο μύνημα',
				'uiAlpha' => 'Διαφάνεια',
			),
			
			'sound' => array(
				'sampleBtn' => "Δείγμα",
				'testBtn' => "Δοκιμή",
				'muteall' => "Σίγαση όλων",
				'submitmessage' => "Αποστολή μηνύματος",
				'reveivemessage' => "Λήψη μηνύματος",
				'enterroom' => "Είσοδος σε δωμάτιο",
				'leaveroom' => "Αποχώρηση από δωμάτιο",
				'pan' => "Ισοστάθμιση καναλιών",
				'volume' => "Ένταση",
				'initiallogin' => "Αρχική σύνδεση",
				'logout' => "Αποσύνδεση",
				'privatemessagereceived' => "Λήψη προσωπικού μηνύματος",
				'invitationreceived' => "Λήψη πρόσκλησης",
				'combolistopenclose' => "Άνοιγμα/κλείσιμο λίστας",
				'userbannedbooted' => "Χρήστης απορρίφθηκε ή αποκλείσθηκε",
				'usermenumouseover' => "Πέρασμα ποντικιού από το μενού χρήστη",
				'roomopenclose' => "Άνοιγμα/κλείσιμο περιοχής δωματίων",
				'popupwindowopen' => "Άνοιγμα αναδυόμενου παραθύρου",
				'popupwindowclosemin' => "Κλείσιμο αναδυόμενου παραθύρου",
				'pressbutton' => "Πάτημα πλήκτρου",
				'otheruserenters' => "Είσοδος στο δωμάτιο άλλου χρήστη",
			),
			
			'skin' => array(
				'inputBoxBackground' => "Φόντο στο χώρο πληκτρολόγησης των μηνυμάτων",
				'privateLogBackground' => "Φόντο στα ιδιωτικά μηνύματα",
				'publicLogBackground' => "Φόντο στα δημόσια μηνύματα",
				'enterRoomNotify' => "Ανακοίνωση εισόδου σε δωμάτιο",
				'roomText' => "Κείμενο δωματίων",
				'room' => "Φόντο δωματίων",
				'userListBackground' => "Φόντο του καταλόγου των χρηστών",
				'dialogTitle' => "Τίτλοι διαλόγων",
				'dialog' => "Φόντο διαλόγων",
				'buttonText' => "Κείμενο κουμπιών",
				'button' => "Φόντο κουμπιών",
				'bodyText' => 'Κυρίως Κείμενο',
				'background' => 'Κεντρικό Φόντο',
				'borderColor' => 'Χρώμα Περιγράμματος',
				'selectskin' => 'Επιλογή Χρωματικού Συνδυασμού...',
				'buttonBorder' => 'Χρώμα Περιγράμματος Κουμπιών',
				'selectBigSkin' => 'Επιλογή Skin...',
				'titleText' => 'Κείμενο Τίτλου',
   			),
		
			'privateBox' => array(
				'sendBtn' => "Αποστολή",
				'toUser' => "Συνομιλία με τον/ην USER_LABEL:",
			),
			
			'login' => array(
				'loginBtn' => "Σύνδεση",
				'language' => "Γλώσσα:",
				'moderator' => "(Μόνο για υπερχρήστες)",
				'password' => "Κωδικός πρόσβασης:",
				'username' => "Όνομα χρήστη:",
			),
			
			'invitenotify' => array(
				'declineBtn' => "Άρνηση",
				'acceptBtn' => "Αποδοχή",
				'userinvited' => "Ο χρήστης 'USER_LABEL' σας προσκάλεσε στο δωμάτιο 'ROOM_LABEL'",
			),
			
			'invite' => array(
				'sendBtn' => "Αποστολή",
				'includemessage' => "Κείμενο πρόσκλησης:",
				'inviteto' => "Πρόσκληση χρήστη στο:",
			),
			
			'ignore' => array(
				'ignoreBtn' => "Παράβλεψη",
				'ignoretext' => "Εισάγετε το κείμενο παράβλεψης",
			),
			
			'createroom' => array(
				'createBtn' => "Δημιουργία",
				'private' => "Ιδιωτικό",
				'public' => "Κοινόχρηστο",
				'entername' => "Εισάγετε το όνομα του δωματίου",
			),
			
			'ban' => array(
				'banBtn' => "Απαγόρευση",
				'byIP' => "με IP",
				'fromChat' => "από το chat",
				'fromRoom' => "από το δωμάτιο",
				'banText' => "Εισάγετε το κείμενο απαγόρευσης",
			),
			
			'common' => array(
				'cancelBtn' => "Άκυρο",
				'okBtn' => "OK",
				
				'win_choose'         => 'Επιλέξτε αρχείο για αποστολή:',
				'win_upl_btn'        => '  Αποστολή  ',
				'upl_error'          => 'Παρουσιάστηκε σφάλμα κατά την αποστολή',
				'pls_select_file'    => 'Παρακαλώ επιλέξτε αρχείο για αποστολή',
				'ext_not_allowed'    => 'Ο τύπος αρχείου FILE_EXT δεν είναι επιτρεπτός. Παρακαλώ επιλέξτε ένα αρχείο από τα παρακάτω επιτρεπτά: ALLOWED_EXT',
				'size_too_big'       => 'Το αρχείο που επιχειρήσατε να στείλετε είναι μεγαλύτερο σε μέγεθος από το επιτρεπτό. Παρακαλώ δοκιμάστε ξανά.',				
			),
			
			'sharefile' => array(
				'chat_users'=> '[ Κοινοποίηση στο Chat ]',
				'all_users' => '[ Κοινοποίηση στο Δωμάτιο ]',
				'file_info_size'  => '<br>Το μέγιστο επιτρτπό μέγεθος αυτού του αρχείου, είναι MAX_SIZE.',
				'file_info_ext' => ' Επιτρεπτοί Τύποι Αρχείων: ALLOWED_EXT',
				'win_share_only'=>'Ανταλλαγή με',				
				'usr_message' => '<b>Ο χρήστης USER_LABEL θέλει να ανταλλάξει ένα αρχείο με εσάς.</b><br><br>Όνομα Αρχείου: F_NAME<br>Μέγεθος Αρχείου: F_SIZE',				
			),
			
			'loadavatarbg' => array(
				'win_title'  => 'Προσαρμοσμένο Φόντο',
				'file_info'  => 'Το αρχείο σας πρέπει να είναι μια εικόνα JPG μη προοδευτική ή SWF Flash.',
				'use_label'  => 'Χρήση αυτού του αρχείου για:',
				'rb_mainchat_avatar' => 'Μόνο εικονίδια Κυρίου chat',
				'rb_roomlist_avatar' => 'Μόνο εικονίδια Καταλόγου Δωματίων',
				'rb_mc_rl_avatar'    => 'Εικονίδια Κυρίου chat και καταλόγου δωματίων',
				'rb_this_theme'      => 'Φόντο μόνο για αυτόν τον συνδυασμό',
				'rb_all_themes'      => 'Φόντο για όλους τους συνδυασμούς',
			),			
			
			
		),
		
		'desktop' => array(
			'invalidsettings' => "Μη αποδεκτές ρυθμίσεις",
			'selectsmile' => "Φατσούλες",
			'sendBtn' => "Αποστολή",
			'saveBtn' => "Αποθήκευση",
			'clearBtn' => 'Καθαρισμός Πεδίων',
			'skinBtn' => "Ρυθμίσεις",
			'addRoomBtn' => "Νέο",
			'myStatus' => "Κατάσταση",
			'room' => "Δωμάτιο",
			'welcome' => "Καλώς ήρθατε USER_LABEL",
			'ringTheBell' => "Kαμία απάντηση; κτυπήστε το κουδούνι:",
			'logOffBtn' => "X",
			'helpBtn' => "?",
			'adminSign' => "",
		)
	);
?>