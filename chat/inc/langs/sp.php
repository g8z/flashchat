<?php
	$GLOBALS['fc_config']['languages']['sp'] = array(
		'name' => "Español",

		'messages' => array(
     		'ignored' => "'USER_LABEL' esta ignorando sus mensajes",
			'banned' => "Se ha prohibido tu entrada ( ban )",
			'login' => 'Por favor ingrese al chat',
			'wrongPass' => 'Nombre de usuario o password incorrecto. Por favor intente de nuevo.',
			'required' => 'requerido',
			'anotherlogin' => 'Otro usuario del chat esta usando ese nombre de usuario. Intente de nuevo.',
			'expiredlogin' => 'Su conexion ha expirado. Por favor entre de nuevo.',
			'enterroom' => "[ROOM_LABEL]: USER_LABEL a entrado a las TIMESTAMP",
			'leaveroom' => "[ROOM_LABEL]: USER_LABEL a salido a las TIMESTAMP",
			'selfenterroom' => "¡Bienvenido(a)! Usted a entrado a [ROOM_LABEL] a las TIMESTAMP",
			'bellrang' => 'USER_LABEL ha sonado la campana',
			'chatfull' => 'El chat esta lleno, Por favor intente mas tarde.',
			'iplimit' => 'Ya existe una conexion con su IP en el chat',
			'roomlock' => 'Esta Sala requiere de clave.<br>Por favor ingrese la clave de la sala:',
			'locked' => 'Clave de usuario invalida, Por favor intente de nuevo',
			'botfeat' => 'Los Robots, no se encuentran disponibles en este momento.',
			'securityrisk' => 'El archivo que ha subido podria contener elementos con scripts, lo que podria ser un riesgo de seguridad, Por favor trate con otro archivo',
		),

		'usermenu' => array(
			'profile' => "Perfil",
			'unban' => "Desbloquear",
			'ban' => "Bloquear",
			'unignore' => "Designorar",
			'fileshare' => 'Compartir Archivo',
			'ignore' => "Ignorar",
			'invite' => "Invitar",
			'privatemessage' => "Mensaje Privado",
		),

		'status' => array(
			'here' => "Aquí",
			'busy' => "Ocupado",
			'away' => "Ausente",
			'brb'  => 'Ya Vuelvo',
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "Sala 'ROOM_LABEL' no encontrada",
				'usernotfound' => "Usuario 'USER_LABEL' no fue encontrado(a)",
				'unbanned' => "Usted ha sido desbloqueado por 'USER_LABEL'",
				'banned' => "Usted ha sido bloqueado por 'USER_LABEL'",
				'unignored' => "Usted ha sido designorado por 'USER_LABEL'",
				'ignored' => "Usted ha sido ignorado por 'USER_LABEL'",
				'invitationdeclined' => "El usuario 'USER_LABEL' rechazó su invitación al cuarto 'ROOM_LABEL'",
				'invitationaccepted' => "El usuario 'USER_LABEL' aceptó su invitación al cuarto 'ROOM_LABEL'",
				'roomnotcreated' => "El cuarto no fue creado",
				'roomisfull' => 'la sala: [ROOM_LABEL] esta llena.  Por favor escoja otra sala',
				'alert' => '<b>ALERTA!</b><br>',
				'chatalert' => '<b>ALERTA!</b><br>',
				'gag' => "<b>has sido amordazado durante DURATION minuto(s)!</b><br><br>Usted puede ver los mensajes en la sala, pero no contribuir".
						 "con mensajes a la sala hasta que su mordaza expire.",
				'ungagged' => "Has sido desamordazado por el usuario 'USER_LABEL'",
				'gagconfirm' => 'USER_LABEL te ha amordazado durante MINUTES minuto(s).',
				'alertconfirm' => 'USER_LABEL ha leido la alerta.',
				'file_declined' => 'Tu Archivo no fue aceptado por USER_LABEL.',
				'file_accepted' => 'tu Archivo fue aceptado por USER_LABEL.',
			),

			'unignore' => array(
				'unignoreBtn' => "Designorar",
				'unignoretext' => "Escriba el texto para designorar",
			),

			'unban' => array(
				'unbanBtn' => "Desbloquear",
				'unbantext' => "Escriba el texto para desbloquear",
			),

			'tablabels' => array(
				'themes' => 'Temas',
				'sounds' => 'Sonidos',
				'text'  => 'Texto',
				'effects'  => 'Efectos',
				'admin'  => 'Admin',
				'about' => 'Acerca',
			),

			'text' => array(
				'itemChange' => 'Item a cambiar',
				'fontSize' => 'Tamaño de letra',
				'fontFamily' => 'Tipo de Letra',
				'language' => 'Lenguaje',
				'mainChat' => 'Chat Principal',
				'interfaceElements' => 'Elementos de la Interfase',
				'title' => 'Título',
				'mytextcolor' => 'Usar el color de mi texto para todos los mensajes recibidos.',
			),

			'effects' => array(
				'avatars' => 'Avatares',
				'photo' => 'Fotos',
				'mainchat' => 'Chat principal',
				'roomlist' => 'Lista Salas',
				'background' => 'Fondo',
				'custom' => 'Personalizar',
				'showBackgroundImages' => 'Enseñar Fondo',
				'splashWindow' => 'Enfocar ventana si hay mensaje nuevo',
				'uiAlpha' => 'Transparencia',
			),

			'sound' => array(
				'sampleBtn' => "Muestra",
				'testBtn' => "Prueba",
				'muteall' => "Silenciar todo",
				'submitmessage' => "Enviar un mensaje",
				'reveivemessage' => "Recibir un mensaje",
				'enterroom' => "Entrar a un cuarto",
				'leaveroom' => "Salir de un cuarto",
				'pan' => "Balance",
				'volume' => "Volumen",
				'initiallogin' => 'Entrada Inicial',
				'logout' => 'Salida',
				'privatemessagereceived' => 'Recibir mensaje privado',
				'invitationreceived' => 'Recibir invitación',
				'combolistopenclose' => "Abrir/Cerar lista",
				'userbannedbooted' => 'Usuario bloqueado o explulsado',
				'usermenumouseover' => 'Menu del usuario sobre el mouse',
				'roomopenclose' => "Abrir/Cerar seleccion de salas",
				'popupwindowopen' => 'Ventana flotante se abre',
				'popupwindowclosemin' => 'Ventanta flotante se cierra',
				'pressbutton' => 'Presione Tecla',
				'otheruserenters' => 'Otros entran a la sala',
			),

			'skin' => array(
				'inputBoxBackground' => "Fondo de la casilla de entrada",
				'privateLogBackground' => "Fondo del historial privado",
				'publicLogBackground' => "Fondo del historial público",
				'enterRoomNotify' => "Escriba notificación de la sala",
				'roomText' => "Texto de las salas",
				'room' => "Fondo de las salas",
				'userListBackground' => "Fondo de la lista de usuarios",
				'dialogTitle' => "Título de los diálogos",
				'dialog' => "Fondo de los diálogos",
				'buttonText' => "Texto de los botones",
				'button' => "Fondo de los botones",
				'bodyText' => "Texto principal",
				'background' => "Fondo principal",
				'borderColor' => 'Color del borde',
				'selectskin' => 'Seleccionar esquema de color...',
				'buttonBorder' => 'Color del Borde de los botones',
				'selectBigSkin' => 'Seleccionar Tema...',
				'titleText' => 'Texto del título',
			),

			'privateBox' => array(
				'sendBtn' => 'Enviar',
				'toUser' => 'Hablando con: USER_LABEL:',
			),

			'login' => array(
				'loginBtn' => "Entrar",
				'language' => "Idioma:",
				'moderator' => "(si es moderador)",
				'password' => "Clave:",
				'username' => "Nombre de usuario:",
			),

			'invitenotify' => array(
				'declineBtn' => "Rechazar",
				'acceptBtn' => "Aceptar",
				'userinvited' => "Usuario 'USER_LABEL' lo ha invitado al cuarto 'ROOM_LABEL':",
			),

			'invite' => array(
				'sendBtn' => "Enviar",
				'includemessage' => "Incluya este mensaje con su invitación:",
				'inviteto' => "Invitar usuario a:",
			),

			'ignore' => array(
				'ignoreBtn' => "Ignorar",
				'ignoretext' => "Escriba el texto para ignorar",
			),

			'createroom' => array(
				'createBtn' => "Crear",
				'private' => "Privado",
				'public' => "Público",
				'entername' => "Escriba el nombre de la sala",
				'enterpass' => 'Escriba una clave para la sala o dejela en blanco para permitir el acceso a todos sin clave.',
			),

			'ban' => array(
				'banBtn' => "Bloquear",
				'byIP' => "por IP",
				'fromChat' => "del chat",
				'fromRoom' => "de la sala",
				'banText' => "Escriba el texto para bloquear",
			),

			'common' => array(
				'cancelBtn' => "Cancelar",
				'okBtn' => "Aceptar",

				'win_choose'         => 'Escoja el Archivo a Subir',
				'win_upl_btn'        => '  Subir  ',
				'upl_error'          => 'Error subiendo archivo',
				'pls_select_file'    => 'Por favor escoja el archivo a abrir',
				'ext_not_allowed'    => 'La FILE_EXT extensión no esta permitida. Por favor escoja un archivo con una de estas extensiones: ALLOWED_EXT',
				'size_too_big'       => 'El archivo que ud ha tratado de compartir excede el tamaño máximo permitido de: MAX_SIZE KB. Por favor intente de nuevo.',
			),

			'sharefile' => array(
				'chat_users'=> '[ Compartir con el Chat ]',
				'all_users' => '[ Compartir con la Sala ]',
				'file_info_size'  => '<br>El tamaño maximo permitido de este archivo MAX_SIZE.',
				'file_info_ext' => ' Tipos de archivos aceptados: ALLOWED_EXT',
				'win_share_only'=>'Compartir con:',
				'usr_message' => '<b>USER_LABEL desea compartir un archivo con usted</b><br><br>File name: F_NAME<br>File size: F_SIZE',
			),

			'loadavatarbg' => array(
				'win_title'  => 'Fondo Personalizado',
				'file_info'  => ' Tipos de Archivos Permitidos: ALLOWED_EXT',
				'use_label'  => 'Use este archivo para:',
				'rb_mainchat_avatar' => 'Avatar principal unicamente',
				'rb_roomlist_avatar' => 'Avatar de la lista de salas unicamente',
				'rb_mc_rl_avatar'    => 'Los Dos principal y lista de salas',
				'rb_this_theme'      => 'Fondo para este tema unicamente',
				'rb_all_themes'      => 'Fondo para todos los temas',
			),

			'loadphoto' => array(
				'win_title'  => 'Foto personalizada del usuario',
				'file_info'  => 'Tu archivo debe ser de tipo: ALLOWED_EXT',
			),
		),

		'desktop' => array(
			'invalidsettings' => "Configuración inválida",
			'selectsmile' => "Smilies",
			'sendBtn' => "Enviar",
			'saveBtn' => "Guardar",
			'clearBtn' => "Limpiar",
			'skinBtn' => "Apariencia",
			'addRoomBtn' => "Agregar",
			'myStatus' => "Mi estado",
			'room' => "Sala",
			'welcome' => "Bienvenido(a) USER_LABEL",
			'ringTheBell' => 'Nadie Responde? Toca la Campana:',
			'logOffBtn' => 'X',
			'helpBtn' => '?',
			'adminSign' => '',
		)
	);
?>