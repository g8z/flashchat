<?php
	$GLOBALS['fc_config']['languages']['fr'] = array(
		'name' => "Français",

		'messages' => array(
			'ignored' => "'USER_LABEL' ignore vos messages.",
			'banned' => "Vous avez été banni(e).",
			'login' => 'Veuillez vous identifier.',
			'wrongPass' => 'Mot de passe incorrect.',
			'anotherlogin' => 'Un autre utilisateur à déjà réservé cet identifiant.',
			'expiredlogin' => 'Votre connexion à expiré, veuillez vous reconnecter.',
			'enterroom' => "[ROOM_LABEL]: USER_LABEL est arrivé(e) à TIMESTAMP.",
			'leaveroom' => "[ROOM_LABEL]: USER_LABEL nous à quitté(e) à TIMESTAMP.",
			'selfenterroom' => "Bienvenue, vous êtes entré dans [ROOM_LABEL] à TIMESTAMP.",
			'bellrang' => 'USER_LABEL a sonné la cloche.',
			'chatfull' => 'Le salon de discussion est plein. Merci de réessayer plus tard.',
			'iplimit' => 'Vous êtes déjà dans le salon.',
			'roomlock' => "Ce salon est protégé par mot de passe.<br>Merci d'entrer le mot de passe :",
			'locked' => 'Mot de passe invalide. Merci de recommencer.',
			'botfeat' => "Le dispositif du robot n'est pas actif."
		),

		'usermenu' => array(
			'profile' => "Profil",
			'unban' => "N’est plus banni",
			'ban' => "Banni",
			'unignore' => "Ne plus ignorer",
			'fileshare' => "Partager",
			'ignore' => "Ignorer",
			'invite' => "Inviter",
			'privatemessage' => "Message privé",
		),

		'status' => array(
			'here' => "Présent(e)",
			'busy' => "Occupé(e)",
			'away' => "Absent(e)",
			'brb'  => 'Je reviens',
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "Salon 'ROOM_LABEL' non trouvé.",
				'usernotfound' => "Utilisateur 'USER_LABEL' inconnu.",
				'unbanned' => "Vous n’êtes plus banni(e) par l’utilisateur 'USER_LABEL' :",
				'banned' => "Vous êtes banni(e) par l’utilisateur 'USER_LABEL' :",
				'unignored' => "Vous n’êtes plus ignoré(e) par l’utilisateur 'USER_LABEL' :",
				'ignored' => "Vous êtes ignoré(e) par 'USER_LABEL' :",
				'invitationdeclined' => "L'utilisateur 'USER_LABEL' décline votre invitation au salon 'ROOM_LABEL' :",
				'invitationaccepted' => "L'utilisateur 'USER_LABEL' accepte votre invitation au salon 'ROOM_LABEL' :",
				'roomnotcreated' => "Le salon n'est pas créé.",
				'roomisfull' => '[ROOM_LABEL] est complet. Merci de choisir un autre salon.',
				'alert' => '<b>ALERTE !</b><br><br>',
				'chatalert' => '<b>ALERTE !</b><br><br>',
				'gag' => "<b>Vous avez été bâillonné(e) pour DURATION minute(s) !</b><br><br>Vous pouvez regarder les messages de ce salon, mais vous n'avez pas le droit de contribuer aux nouveaux messages de la conversation, jusqu'à ce que le bâillon expire.",
				'ungagged' => "Vous avez été débâillonné(e) par l'utilisateur 'USER_LABEL'.",
				'gagconfirm' => 'USER_LABEL est bâillonné(e) pour MINUTES minute(s).',
				'alertconfirm' => "USER_LABEL a lu l'alerte.",
				'file_declined' => 'Votre fichier a été refusé par USER_LABEL.',
				'file_accepted' => 'Votre fichier a été accepté par USER_LABEL.',
			),

			'unignore' => array(
				'unignoreBtn' => "Ne plus ignorer",
				'unignoretext' => "Expliquer le motif",
			),

			'unban' => array(
				'unbanBtn' => "Ne plus bannir",
				'unbantext' => "Expliquer le motif",
			),

			'tablabels' => array(
				'themes' => 'Thèmes',
				'sounds' => 'Sons',
				'text'  => 'Texte',
				'effects'  => 'Effets',
				'admin'  => 'Admin',
				'about' => 'Informations',
			),

			'text' => array(
				'itemChange' => 'Objet à modifier',
				'fontSize' => 'Taille de caractère',
				'fontFamily' => 'Famille de caractère',
				'language' => 'Langue',
				'mainChat' => 'Discussion principale',
				'interfaceElements' => "Elements de l'interface",
				'title' => 'Titre',
				'mytextcolor' => 'Utiliser ma couleur des textes pour tous les messages reçus.',
			),

			'effects' => array(
				'avatars' => 'Avatars',
				'mainchat' => 'Salon principal',
				'roomlist' => 'Liste utilisateurs',
				'background' => 'Arrière-plan',
				'custom' => 'Personnaliser',
				'showBackgroundImages' => "Afficher l'arrière-plan.",
				'splashWindow' => 'Afficher au premier plan les nouveaux mesages.',
				'uiAlpha' => 'Transparence',
			),

			'sound' => array(
				'sampleBtn' => "Exemple",
				'testBtn' => "Test",
				'muteall' => "Tous",
				'submitmessage' => "Envoyer un message",
				'reveivemessage' => "Recevoir un message",
				'enterroom' => "Entrer dans le salon",
				'leaveroom' => "Sortir du salon",
				'pan' => "Panoramique",
				'volume' => "Volume",
				'initiallogin' => 'Connexion',
				'logout' => 'Déconnexion',
				'privatemessagereceived' => "Reception d'un message privé",
				'invitationreceived' => "Reception d'une invitation",
				'combolistopenclose' => "Ouvrir/fermer la liste de combobox",
				'userbannedbooted' => 'Utilisateur banni ou exclu',
				'usermenumouseover' => "Souris sur le menu d'utilisateur ",
				'roomopenclose' => "Ouvrir/fermer section de salons",
				'popupwindowopen' => "Ouverture automatique de fenêtre",
				'popupwindowclosemin' => 'Fermeture automatique de fenêtre',
				'pressbutton' => 'Pression des touches',
				'otheruserenters' => "Entrée d'un utilisateur dans le salon",
			),

			'skin' => array(
				'inputBoxBackground' => "Zone de texte",
				'privateLogBackground' => "Zone privée",
				'publicLogBackground' => "Zone publique",
				'enterRoomNotify' => "Notification d'entrée du salon",
				'roomText' => "Titre du salon",
				'room' => "Fond du titre du salon",
				'userListBackground' => "Liste des utilisateurs",
				'dialogTitle' => "Bandeau supérieur",
				'dialog' => "Bordure haute et gauche",
				'buttonText' => "Texte des boutons",
				'button' => "Fond des boutons",
				'bodyText' => "Corps du texte",
				'background' => "Menu déroulant",
				'borderColor' => 'Bordures des zones de texte',
				'selectskin' => "Selectionner le thème...",
				'buttonBorder' => 'Bordure des boutons',
				'selectBigSkin' => 'Selectionner la peau...',
				'titleText' => 'Texte du bandeau haut',
			),

			'privateBox' => array(
				'sendBtn' => 'Envoyer',
				'toUser' => 'Parler à USER_LABEL:',
			),

			'login' => array(
				'loginBtn' => "Connexion",
				'language' => "Langue :",
				'moderator' => "(si modérateur)",
				'password' => "Mot de passe :",
				'username' => "Utilisateur :",
			),

			'invitenotify' => array(
				'declineBtn' => "Décliner",
				'acceptBtn' => "Accepter",
				'userinvited' => "L’utilisateur 'USER_LABEL' vous invite dans le salon 'ROOM_LABEL':",
			),

			'invite' => array(
				'sendBtn' => "Envoyer",
				'includemessage' => "Inclure ce message à votre invitation :",
				'inviteto' => "Inviter l’utilisateur à :",
			),

			'ignore' => array(
				'ignoreBtn' => "Ignorer",
				'ignoretext' => "Expliquer le motif",
			),

			'createroom' => array(
				'createBtn' => "Créer",
				'private' => "Privé",
				'public' => "Public",
				'entername' => "Entrer le nom du salon",
				'enterpass' => "Entrer un mot de passe pour le salon ou laisser vide pour ne pas restreindre l'accés.",
			),

			'ban' => array(
				'banBtn' => "Bannir",
				'byIP' => "par IP",
				'fromChat' => "du chat",
				'fromRoom' => "du salon",
				'banText' => "Expliquer le motif",
			),

			'common' => array(
				'cancelBtn' => "Annuler",
				'okBtn' => "OK",
				'win_choose'         => 'Choisissez le fichier à partager :',
				'win_upl_btn'        => '  Partager ce fichier  ',
				'upl_error'          => 'Erreur pendant le téléchargement du fichier',
				'pls_select_file'    => 'Choisissez le fichier à partager.',
				'ext_not_allowed'    => 'Les fichier de type FILE_EXT ne sont pas autorisés. Choisissez un fichier avec une de ces extensions : ALLOWED_EXT',
				'size_too_big'       => 'Le fichier est trop volumineux. Merci de ne pas dépasser la taille maximum autorisée.',
			),

			'sharefile' => array(
				'chat_users'=> '[ Partager avec tous ]',
				'all_users' => '[ Partager avec le salon ]',
				'file_info_size'  => '<br>Votre fichier ne doit pas faire plus de MAX_SIZE.',
				'file_info_ext' => ' Les extensions de fichier autorisées sont les suivantes : ALLOWED_EXT.',
				'win_share_only'=>'Partager avec',
				'usr_message' => '<b>USER_LABEL veut partager un dossier avec vous.</b><br><br>Nom du fichier : F_NAME<br>Taille du fichier : F_SIZE',
			),

			'loadavatarbg' => array(
				'win_title'  => 'Arrière-plan personnel',
				'file_info'  => 'Votre fichier doit être une image non-progressive JPG, ou un fichier Flash SWF.',
				'use_label'  => 'Utiliser ce fichier pour :',
				'rb_mainchat_avatar' => 'Avatar du salon principal',
				'rb_roomlist_avatar' => 'Avatar des listes de salons',
				'rb_mc_rl_avatar'    => 'Avatar des listes de salons et du salon principal',
				'rb_this_theme'      => 'Fond pour ce thème',
				'rb_all_themes'      => 'Fond pour tous les thèmes',
			),
		),
			'desktop' => array(
				'invalidsettings' => "Configuration non conforme",
				'selectsmile' => "Emoticônes",
				'sendBtn' => "Envoyer",
				'saveBtn' => "Sauver",
				'clearBtn' => 'Nettoyer',
				'soundBtn' => "Son",
				'skinBtn' => "Options",
				'addRoomBtn' => "Ajouter",
				'myStatus' => "Mon statut",
				'room' => "Salon",
				'welcome' => "Bienvenue USER_LABEL",
				'ringTheBell' => '',
				'logOffBtn' => 'Fermer',
				'helpBtn' => '?',
				'adminSign' => '',
		)
	);
?>