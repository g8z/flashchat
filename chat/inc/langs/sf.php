<?php
	$GLOBALS['fc_config']['languages']['sf'] = array(
		'name' => "Español (usted)",

		'messages' => array(
			'ignored' => "'USER_LABEL' está ignorando sus mensajes",
			'banned' => "Ha sido expulsado",
			'login' => 'Por favor ingrese al Chat',
			'wrongPass' => 'Nombre de usuario desconocido o contraseña incorrecta. Por favor inténtelo de nuevo.',
			'anotherlogin' => 'Otro usuario ha ingresado con esta cuenta. Por favor inténtelo de nuevo.',
			'expiredlogin' => 'Su sesión ha expirado. Por favor ingrese sus datos de nuevo.',
			'enterroom' => "[ROOM_LABEL]: USER_LABEL entró a las TIMESTAMP",
			'leaveroom' => "[ROOM_LABEL]: USER_LABEL salió a las TIMESTAMP",
			'selfenterroom' => "Bienvenido! Usted entró a [ROOM_LABEL] a las TIMESTAMP",
			'bellrang' => 'USER_LABEL tocó la campana',
			'chatfull' => 'La charla está llena. Por favor intente otra vez más adelante.',
			'iplimit' => 'Usted está ya en la charla.'
		),

		'usermenu' => array(
			'profile' => "Perfil",
			'unban' => "Re-admitir",
			'ban' => "Bloquear",
			'unignore' => "Dejar de ignorar",
			'fileshare' => 'Share File',
			'ignore' => "Ignorar",
			'invite' => "Invitar",
			'privatemessage' => "Mensaje Privado",
		),

		'status' => array(
			'here' => "En línea",
			'busy' => "Ocupado",
			'away' => "Ausente",
			'brb'  => 'Volveré',
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "No se encontró la sala 'ROOM_LABEL'",
				'usernotfound' => "No se encontró al usuario 'USER_LABEL'",
				'unbanned' => "Usted fue re-admitido por el usuario 'USER_LABEL'",
				'banned' => "Usted fue bloqueado por el usuario 'USER_LABEL'",
				'unignored' => "El usuario 'USER_LABEL' ha dejado de ignorarle",
				'ignored' => "El usuario 'USER_LABEL' le está ignorando",
				'invitationdeclined' => "El usuario 'USER_LABEL' rechazó su invitación a la sala 'ROOM_LABEL'",
				'invitationaccepted' => "El usuario 'USER_LABEL' aceptó su invitación a la sala 'ROOM_LABEL'",
				'roomnotcreated' => "No se creó la sala",
				'roomisfull' => '[ROOM_LABEL] está lleno. Elija por favor otro sitio.',
				'alert' => '<b>ALARMA!</b><br><br>',
				'chatalert' => '<b>ALARMA!</b><br><br>',
				'gag' => "<b>¡Le han amordazado para DURATION minuto(s)!</b><br><br>Usted puede visiónar mensajes en este sitio, pero no contribuir ".
						 "nuevos mensajes a la conversación, hasta que expira la mordaza.",
				'ungagged' => "Al usuario 'USER_LABEL' le un-amordazo",
				'gagconfirm' => 'USER_LABEL es amordazado por MINUTES minuto(s).',
				'alertconfirm' => 'USER_LABEL ha leído la alarma.',
				'file_declined' => 'Su archivo fue declinado de USER_LABEL.',
				'file_accepted' => 'Su archivo fue aceptado de USER_LABEL.',
			),

			'unignore' => array(
				'unignoreBtn' => "Dejar de ignorar",
				'unignoretext' => "Escriba un mensaje opcional",
			),

			'unban' => array(
				'unbanBtn' => "Re-admitir",
				'unbantext' => "Escriba un mensaje de admisión",
			),

			'tablabels' => array(
				'themes' => "Temas",
				'sounds' => "Sonidos",
				'text'  => "Texto",
				'effects'  => 'Efectos',
				'admin'  => "Admin",
				'about' => 'Sobre',
			),

			'text' => array(
				'itemChange' => "Artículo a Modificar",
				'fontSize' => "Tamaño de Fuente",
				'fontFamily' => "Familia de Fuente",
				'language' => "Idioma",
				'mainChat' => "Chat Principal",
				'interfaceElements' => "Elementos de Interfaz",
				'title' => "Título",
				'mytextcolor' => 'Utilice mi color del texto para todos los mensajes recibidos.',
			),


			'effects' => array(
				'avatars' => 'Avatars',
				'mainchat' => 'Charla Principal',
				'roomlist' => 'Lista de Sitios',
				'background' => 'Fondo',
				'custom' => 'Customizado',
				'showBackgroundImages' => 'Demuestre el fondo',
				'splashWindow' => 'Ventana del foco en nuevo mensaje',
				'uiAlpha' => 'Transparencia',
			),

			'sound' => array(
				'sampleBtn' => "Muestra",
				'testBtn' => "Prueba",
				'muteall' => "Silencio",
				'submitmessage' => "Enviar mensaje",
				'reveivemessage' => "Recibir mensaje",
				'enterroom' => "Entrar sala",
				'leaveroom' => "Abandonar sala",
				'pan' => "Balance",
				'volume' => "Volumen",
				//added sounds
				'initiallogin' => "Iniciar sesión",
				'logout' => "Cerrar sesión",
				'privatemessagereceived' => "Recibir mensaje privado",
				'invitationreceived' => "Recibir invitación",
				'combolistopenclose' => "Abrir/Cerrar lista combo",
				'userbannedbooted' => "Usuario bloqueado o expulsado",
				'usermenumouseover' => "Mouse sobre menú de usuario",
				'roomopenclose' => "Abrir/Cerrar sección de sala",
				'popupwindowopen' => "Abrir ventana emergente",
				'popupwindowclosemin' => "Cerrar ventana emergente",
				'pressbutton' => "Oprimir tecla",
				'otheruserenters' => "Otro usuario entra a la sala"
			),

			'skin' => array(
				'inputBoxBackground' => "Fondo del cuadro de entrada",
				'privateLogBackground' => "Fondo del historial privado",
				'publicLogBackground' => "Fondo del historial público",
				'enterRoomNotify' => "Aviso de entrada a una sala",
				'roomText' => "Texto de las salas",
				'room' => "Fondo de las salas",
				'userListBackground' => "Fondo de la lista de usuarios",
				'dialogTitle' => "Título de las ventanas de diálogo",
				'dialog' => "Fondo de las ventanas de diálogo",
				'buttonText' => "Texto de los botones",
				'button' => "Fondo de los botones",
				'borderColor' => "Color del borde",
				'bodyText' => "Cuerpo del mensaje",
				'background' => "Fondo principal",
				'selectskin' => "Seleccionar esquema de color...",
				'selectBigSkin' => "Seleccionar visualización...",
				'titleText' => "Texto del título"
			),

			'privateBox' => array(
				'sendBtn' => "Enviar",
				'toUser' => "Plátique con USER_LABEL:",
			),

			'login' => array(
				'loginBtn' => "Acceso",
				'language' => "Idioma:",
				'moderator' => "(si es Moderador)",
				'password' => "Contraseña:",
				'username' => "Nombre de usuario:",
			),

			'invitenotify' => array(
				'declineBtn' => "Rechazar",
				'acceptBtn' => "Aceptar",
				'userinvited' => "El usuario 'USER_LABEL' le ha invitado a la sala 'ROOM_LABEL'",
			),

			'invite' => array(
				'sendBtn' => "Enviar",
				'includemessage' => "Incluir este mensaje con su invitación:",
				'inviteto' => "Invitar al usuario a:",
			),

			'ignore' => array(
				'ignoreBtn' => "Ignorar",
				'ignoretext' => "Escriba un mensaje opcional",
			),

			'createroom' => array(
				'createBtn' => "Crear",
				'private' => "Privado",
				'public' => "Público",
				'entername' => "Escriba el nombre de la sala",
			),

			'ban' => array(
				'banBtn' => "Bloquear",
				'byIP' => "por IP",
				'fromChat' => "del chat",
				'fromRoom' => "de la sala",
				'banText' => "Escriba un mensaje de bloqueo",
			),

			'common' => array(
				'cancelBtn' => "Cancelar",
				'okBtn' => "Ok",
				'win_choose'         => 'Elija el archivo para cargar:',
				'win_upl_btn'        => '  Cargar  ',
				'upl_error'          => 'Error cuando cargar el archivo',
				'pls_select_file'    => 'Seleccione por favor un archivo para cargar',
				'ext_not_allowed'    => 'La extensión FILE_EXT de archivo no se permite. Elija por favor un archivo con una de estas extensiones: ALLOWED_EXT',
				'size_too_big'       => 'El archivo que Usted ha procurado compartir excede el tamaño máximo permitido del archivo. Por favor intente otra vez.',

			),


			'sharefile' => array(
				'chat_users'=> '[ Parte a Charlar ]',
				'all_users' => '[ Parte al Sitio ]',
				'file_info_size'  => '<br>El tamaño máximo permitido de este archivo es MAX_SIZE.',
				'file_info_ext' => ' Tipos Permitidos De Archivos: ALLOWED_EXT',
				'win_share_only'=>'Parte con',
				'usr_message' => '<b>USER_LABEL desea compartir un archivo con Usted.</b><br><br>Nombre del acrhivo: F_NAME<br>Tamaño del archivo: F_SIZE',
			),

			'loadavatarbg' => array(
				'win_title'  => 'Fondo de Encargo',
				'file_info'  => 'Su archivo debe ser una imagen no-progresiva JPG, o un archivo Flash SWF.',
				'use_label'  => 'Utilice este archivo para:',
				'rb_mainchat_avatar' => 'Avatar de la charla principal solamente',
				'rb_roomlist_avatar' => 'Avatar de la lista del sitio solamente',
				'rb_mc_rl_avatar'    => 'Avatars del charla principal y de la lista del sitios',
				'rb_this_theme'      => 'Fondo para este tema solamente',
				'rb_all_themes'      => 'Fondo para todos los temas',
			),
		),

		'desktop' => array(
			'invalidsettings' => "Configuración errónea",
			'selectsmile' => "Smilies",
			'sendBtn' => "Enviar",
			'saveBtn' => "Guardar",
			'clearBtn' => 'Borrar',
			'skinBtn' => "Opciones",
			'addRoomBtn' => "Agregar",
			'myStatus' => "Mi estado",
			'room' => "Sala",
			'welcome' => "Bienvenido(a) USER_LABEL",
			'ringTheBell' => "Sin respuesta? Toque la campana:",
			'logOffBtn' => "X",
			'helpBtn' => "?",
			'adminSign' => ""
		)
	);
?>