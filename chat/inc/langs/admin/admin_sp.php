<?php
	$GLOBALS['fc_config']['languages_admin']['sp'] = array(
		'name'=>'Espa&ntilde;ol',

		'admin_index.tpl' => array(
			't0' => 'Panel de Administraci&oacute;n de FlashChat',
			't1' => 'Esta herramienta est&aacute; dise&ntilde;ada para dar a los administradores de FlashChat multiples maneras de ver o resetear los registros de chat, y agregar/editar/eliminar salas.',
			't2' => 'Hay {$usrnumb} usuarios registrados'
		),

		'banlist.tpl' => array(
			't0' => 'expulsados',
			't1' => 'creado',
			't2' => 'usuario',
			't3' => 'usuario expulsado',
			't4' => 'ID de la sala',
			't5' => 'nivel de expulsi&oacute;n',
			't6' => 'remover expulsi&oacute;n',
			't7' => 'no hay expulsiones'
		),

		'bot.tpl' => array(
			't0' => 'bot',
			't1' => 'nombre del bot',
			't2' => 'imagen de la lista de salas del bot',
			't3' => 'ninguno',
			't4' => 'imagen de el chat principal del bot',
			't5' => 'entrar a esta sala',
			't6' => 'activado cuando haya &lt;X usuarios',
			't7' => 'activado cuando haya &gt;X usuarios',
			't8' => 'activado cuando se usa FlashChat en modo "soporte"',
			't9' => 'activado cuando un administrador no est&aacute; presente',
			't10' => 'activado cuando no hay otros bots en la sala',
			't11' => 'activado cuando un usuario en particular est&eacute; presente',
			't12' => 'Los bots estan deshabilitados en tu sistema.',
			't13' => 'El bot no puede ser agregado porque la instalaci&oacute;n de bots fue saltada en el instalador de Flash Chat.',
			't14' => 'Por favor, reinicie el instalador para habilitar el soporte para bots.'
		),

		'botlist.tpl' => array(
			't0' => 'Bots',
			't1' => 'Agregar nuevo bot',
			't2' => 'Nombre del bot',
			't3' => 'Borrar',
			't4' => 'No se encontraron bots',
			't5' => 'La opci&oacute;n de bots se encuentra deshabilitada. Para habilitar el soporte para bots, selecciona "Si" en "Habilitad Bots" en "Configuraciones Generales" dentro de las configuraciones de este panel de control.',
			't6' => 'Quiz&aacute;s tambi&eacute;n debas reiniciar el instalador de para agregar las bases de conocimiento necesarias.'
		),

		'chatlist.tpl' => array(
			't0' => 'Esta opci&oacute;n no esta disponible cuando FlashChat est&aacute; integrado con un CMS (Sistema de Manejo de Contenidos) personalizado.',
			't1' => 'Chats',
			't2' => 'en esta sala:',
			't3' => 'Cualquier sala',
			't4' => 'Entre estas fechas:',
			't5' => 'y',
			't6' => 'desde los &uacute;ltimos X d&iacute;as:',
			't7' => 'por publicador:',
			't8' => 'Cualquier usuario',
			't9' => 'por moderador:',
			't10' => 'Nombre de la sala',
			't11' => 'Ingreso de publicador',
			't12' => 'Ingreso de moderador',
			't13' => 'Empezar',
			't14' => 'Finalizar',
			't15' => 'previsualizar',
			't16' => 'No Hay Moderadores',
			't17' => 'No se encontraron chats',
			't18' => 'Por favor, use las herramientas de administraci&oacute;n de usuarios que viene son su sistema para agregar, editar, o eliminar usuarios.',
			't19' => 'Mostrar chats',
			't20' => 'Limpiar filtros',
			't21' => 'Remover mensajes',
			't22' => 'Enviado',
			't23' => 'De',
			't24' => 'Para',
			't25' => 'Mensaje',
			't26' => 'Mensajes a mostrar'
		),

		'connlist.tpl' => array(
			't0' => 'Conexiones',
			't1' => 'actualizado',
			't2' => 'creado',
			't3' => 'usuario',
			't4' => 'ID de sala',
			't5' => 'estado',
			't6' => 'color',
			't7' => 'empezar',
			't8' => 'idioma',
			't9' => 'tzoffset',
			't10' => 'host',
			't11' => 'No se encontraron conexiones'
		),

		'ignorelist.tpl' => array(
			't0' => 'ignorado',
			't1' => 'creado',
			't2' => 'usuario',
			't3' => 'usuario ignorado',
			't4' => 'designorar usuario',
			't5' => 'no se encontraron ignorados'
		),

		'logout.tpl' => array(
			't0' => 'Salir del Panel de Administraci&oacute;n de FlashChat',
			't1' => 'Saliste del sistema',
			't2' => 'Haz click aqu&iacute; para ingresar',
			't3' => 'Si est&aacute; usando FlashChat integrado con un CMS (Sistema de Manejo de Contenidos) personalizado, quiz&aacute;s necesites mantenerte contectado, dependiendo de como su sistema guarde informaci&oacute;n del usuario.',
			't4' => 'FlashChat no est&aacute; instalado.'
		),

		'msglist.tpl' => array(
			't0' => 'Mensajes',
			't1' => 'en esta sala:',
			't2' => 'Cualquier sala',
			't3' => 'entre estas fechas:',
			't4' => 'y',
			't5' => 'Desde los &uacute;ltimos x d&iacute;as:',
			't6' => 'por este usuario:',
			't7' => 'Cualquier usuario',
			't8' => 'que contenga esta palabra:',
			't9' => 'enviado',
			't10' => 'del usuario',
			't11' => 'a la sala',
			't12' => 'al usuario',
			't13' => 'No hay mensajes',
			't14' => 'Mostrar mensajes',
			't15' => 'Limpiar filtros',
			't16' => 'Eliminar Mensajes'
		),

		'nopermit.tpl' => array(
			't0' => 'No tienes los permisos necesarios para acceder a esta herramienta.'
		),

		'room.tpl' => array(
			't0' => 'Sala',
			't1' => 'nombre',
			't2' => 'clave',
			't3' => 'p&uacute;blico',
			't4' => 'permanente',
			't5' => 'Agregar nueva sala',
			't6' => 'Actualizar sala',
			't7' => 'Eliminar sala'
		),

		'uninstall.tpl' => array(
			't0' => 'FlashChat fue desinstalado correctamente.',
			't1' => 'FlashChat no est&aacute; instalado.',
			't2' => 'Desinstalar',
			't3' => 'Eliminar de MySQL todas las tablas de FlashChat. Esta opci&oacute;n te permitir&aacute; ejecutar nuevamente el instalador.',
			't4' => 'Quizas debas subir nuevamente la carpeta de "install_files" y el archivo install.php antes de reinstalar.',
			't5' => 'Las siguientes tablas  ser&aacute;n removidas definitivamente :',
			't6' => 'Eliminar todos loa archivos de configuracion del directorio cach&eacute;. Esta opci&oacute;n te permitir&aacute; ejecutar nuevamente el instalador.',
			't7' => 'Quizas debas subir nuevamente la carpeta de "install_files" y el archivo install.php antes de reinstalar.',
			't8' => 'Comprendo que estas acctiones no son reversibles.',
			't9' => '¿¡¿Est&aacute; seguro?!? ¡Esta acci&oacute;n no es reversible!',
			't10' => 'Continuar',
			't11' => 'Cancelar'
		),

		'user.tpl' => array(
			't0' => 'Esta opci&oacute;n no esta disponible cuando FlashChat est&aacute; integrado con un CMS (Sistema de Manejo de Contenidos) personalizado.',
			't1' => 'usuario',
			't2' => 'ingresar',
			't3' => 'clave',
			't4' => 'rol',
			't5' => 'Por favor, use las herramientas de administraci&oacute;n de usuarios que vienen con tu sistema, para agregar, editar o eliminar usuarios.',
			't6' => 'Agregar nuevo usuario',
			't7' => 'Actualizar usuario',
			't8' => 'Eliminar usuario'
		),

		'usrlist.tpl' => array(
			't0' => 'Esta opci&oacute;n no esta disponible cuando FlashChat est&aacute; integrado con un CMS (Sistema de Manejo de Contenidos) personalizado.',
			't1' => 'Usuarios',
			't2' => 'Agregar nuevo usuario',
			't3' => 'ID',
			't4' => 'ingresar',
			't5' => 'clave',
			't6' => 'rol',
			't7' => 'No se encontraron usuarios',
			't8' => 'Por favor, use las herramientas de administraci&oacute;n de usuarios que vienen con tu sistema, para agregar, editar o eliminar usuarios.'
		),

		'top.tpl' => array(
			't0' => 'Inicial',
			't1' => 'Principal',
			't2' => 'Configuraci&oacute;n',
			't3' => 'Mensajes',
			't4' => 'Chats',
			't5' => 'Usuarios',
			't6' => 'Salas',
			't7' => 'Conexiones',
			't8' => 'Bannear',
			't9' => 'Ignorar',
			't10' => 'Bots',
			't11' => 'Desinstalar',
			't12' => 'Cerrar Sesi&oacute;n'
		),

		'roomlist.tpl' => array(
			't0' => 'Salas',
			't1' => 'Agregar nueva sala',
			't2' => 'nombre',
			't3' => 'clave',
			't4' => 'p&uacute;blico',
			't5' => 'permanente',
			't6' => 'Aumentar',
			't7' => 'Eliminar',
			't8' => 'Enviar Todos',
			't9' => 'Debes recargar el chat (Actualizar P&aacute;gina) y reingresar para ver los cambios en la sala.',
			't10' => 'No se encontraron salas',
			't11' => 'Editar'
		),

		'login.tpl' => array(
			't0' => 'Ingreso al Panel de Administraci&oacute;n de FlashChat',
			't1' => 'ingresar',
			't2' => 'clave',
			't3' => 'Seleccionar idioma',
			't4' => 'ingresar',
			't5' => 'No se puede dar acceso al role de administrador para este usuario y clave.',
			't6' => 'FlashChat no est&aacute; instalado.'
		),

		'cnf_top.tpl' => array(
			't0' => 'Instancias de Chat',
			't1' => 'Configuraciones Generales',
			't2' => 'Configuraciones de Conexi&oacute;n',
			't3' => 'Almacenamiento de Mensajes',
			't4' => 'Temas, colores e imagenes',
			't5' => 'Administrador de Dise&ntilde;o',
			't6' => 'Configuraciones de Fuentes',
			't7' => 'Sonidos',
			't8' => 'Emoticones',
			't9' => 'Avatares',
			't10' => 'Compartir Archivos',
			't11' => 'Modulos',
			't12' => 'Precarga',
			't13' => 'Configuraciones de Fin de Sesi&oacute;n',
			't14' => 'Idiomas',
			't15' => 'Malas Palabras / Textos r&aacute;pidos',
			't16' => 'Otras Configuraciones'
		),

		'cnf_avatars' => array(
			't762' => array(
				'value' => 'Solo moderador:'
			),

			't763' => array(
				'value' => 'Valor Predeterminado del Chat Principal:',
				'hint' => 'un c&oacute;digo de emotic&oacute;n'
			),

			't764' => array(
				'value' => 'Estado Predeterminado del Chat Principal:',
				'hint' => 'Activado = Tildado/Activado predeterminado'
			),

			't765' => array(
				'value' => 'Permite Anular Chat Principal:',
				'hint' => 'Si \'No\', no puede ser cambiado (La selecci&oacute;n no est&aacute; habilitado)'
			),

			't766' => array(
				'value' => 'Valor predeterminado de la Sala:',
				'hint' => 'un c&oacute;digo de emotic&oacute;n'
			),

			't767' => array(
				'value' => 'Estado Predeterminado de la Sala:',
				'hint' => 'Activado = Tildado/Activado predeterminado'
			),

			't768' => array(
				'value' => 'Permite Anular Sala:',
				'hint' => 'Si \'No\', no puede ser cambiado (La selecci&oacute;n no est&aacute; habilitado)'
			),

			't769' => array(
				'value' => 'Valor Predeterminado del Chat Principal:',
				'hint' => 'un c&oacute;digo de emotic&oacute;n'
			),

			't770' => array(
				'value' => 'Estado Predeterminado del Chat Principal:',
				'hint' => 'Activado = Tildado/Activado predeterminado'
			),

			't771' => array(
				'value' => 'Permite Anular Chat Principal:',
				'hint' => 'Si \'No\', no puede ser cambiado (La selecci&oacute;n no est&aacute; habilitado)'
			),

			't772' => array(
				'value' => 'Valor Predeterminado de la Sala:',
				'hint' => 'un c&oacute;digo de emotic&oacute;n'
			),

			't773' => array(
				'value' => 'Estado Predeterminado de la Sala:',
				'hint' => 'Activado = Tildado/Activado predeterminado'
			),

			't774' => array(
				'value' => 'Permite Anular la Sala:',
				'hint' => 'Si \'No\', no puede ser cambiado (La selecci&oacute;n no est&aacute; habilitado)'
			),

			't775' => array(
				'value' => 'Valor Predeterminado del Chat Principal:',
				'hint' => 'un c&oacute;digo de emotic&oacute;n'
			),

			't776' => array(
				'value' => 'Estado Predeterminado del Chat Principal:',
				'hint' => 'Activado = Tildado/Activado predeterminado'
			),

			't777' => array(
				'value' => 'Permite Anular Chat Principal:',
				'hint' => 'Si \'No\', no puede ser cambiado (La selecci&oacute;n no est&aacute; habilitado)'
			),

			't778' => array(
				'value' => 'Valor Predeterminado de la Sala:',
				'hint' => 'un c&oacute;digo de emotic&oacute;n'
			),

			't779' => array(
				'value' => 'Estado Predeterminado de la Sala:',
				'hint' => 'Activado = Tildado/Activado predeterminado'
			),

			't780' => array(
				'value' => 'Permite Anular la Sala:',
				'hint' => 'Si \'No\', no puede ser cambiado (La selecci&oacute;n no est&aacute; habilitado)'
			),

			't781' => array(
				'value' => 'Valor Predeterminado del Chat Principal:',
				'hint' => 'un c&oacute;digo de emotic&oacute;n'
			),

			't782' => array(
				'value' => 'Estado Predeterminado del Chat Principal:',
				'hint' => 'Activado = Tildado/Activado predeterminado'
			),

			't783' => array(
				'value' => 'Permite Anular Chat Principal:',
				'hint' => 'Si \'No\', no puede ser cambiado (La selecci&oacute;n no est&aacute; habilitado)'
			),

			't784' => array(
				'value' => 'Valor Predeterminado de la Sala:',
				'hint' => 'un c&oacute;digo de emotic&oacute;n'
			),

			't785' => array(
				'value' => 'Estado Predeterminado de la Sala:',
				'hint' => 'Activado = Tildado/Activado predeterminado'
			),

			't786' => array(
				'value' => 'Permite Anular la Sala:',
				'hint' => 'Si \'No\', no puede ser cambiado (La selecci&oacute;n no est&aacute; habilitado)'
			),

			't787' => array(
				'value' => 'Valor Predeterminado del Chat Principal:',
				'hint' => 'un c&oacute;digo de emotic&oacute;n'
			),

			't788' => array(
				'value' => 'Estado Predeterminado del Chat Principal:',
				'hint' => 'Activado = Tildado/Activado predeterminado'
			),

			't789' => array(
				'value' => 'Permite Anular Chat Principal:',
				'hint' => 'Si \'No\', no puede ser cambiado (La selecci&oacute;n no est&aacute; habilitado)'
			),

			't790' => array(
				'value' => 'Valor Predeterminado de la Sala:',
				'hint' => 'un c&oacute;digo de emotic&oacute;n'
			),

			't791' => array(
				'value' => 'Estado Predeterminado de la Sala:',
				'hint' => 'Activado = Tildado/Activado predeterminado'
			),

			't792' => array(
				'value' => 'Permite Anular la Sala:',
				'hint' => 'Si \'No\', no puede ser cambiado (La selecci&oacute;n no est&aacute; habilitado)'
			),

			't793' => array(
				'value' => 'Valor Predeterminado del Chat Principal:',
				'hint' => 'un c&oacute;digo de emotic&oacute;n'
			),

			't794' => array(
				'value' => 'Estado Predeterminado del Chat Principal:',
				'hint' => 'Activado = Tildado/Activado predeterminado'
			),

			't795' => array(
				'value' => 'Permite Anular Chat Principal:',
				'hint' => 'Si \'No\', no puede ser cambiado (La selecci&oacute;n no est&aacute; habilitado)'
			),

			't796' => array(
				'value' => 'Valor Predeterminado de la Sala:',
				'hint' => 'un c&oacute;digo de emotic&oacute;n'
			),

			't797' => array(
				'value' => 'Estado Predeterminado de la Sala:',
				'hint' => 'Activado = Tildado/Activado predeterminado'
			),

			't798' => array(
				'value' => 'Permite Anular la Sala:',
				'hint' => 'Si \'No\', no puede ser cambiado (La selecci&oacute;n no est&aacute; habilitado)'
			),

			't0' => 'Cambiar configuraci&oacute;n para:',
			't1' => 'Configuracion para Hombres',
			't2' => 'Configuracion para Mujeres',
			't3' => 'Guardar Configuraci&oacute;n'

		),

		'cnf_badwords' => array(
			't0' => 'Los asteriscos (*) pueden usarse para indicar coincidencias parciales. Deje el campo de la derecha vac&iacute;o para usar el texto de sustituci&oacute;n predeterminado, o ingrese texto para seleccionar un texto de sustituci&oacute;n espec&iacute;fico para malas palabras.',
			't2' => 'Esta opci&oacute;n tambi&eacute;n puede usarse para "Texto R&aacute;pido" si hay alguna frase que uses frecuentemente. Por ejemplo, "HCE" puede ser cambiado por "Hola, ¿C&oacute;mo est&aacute;s?" especificando "HCE" como una mala palabra, y la frase correspondiente como texto de sustituci&oacute;n.',
			't3' => 'Texto de Sustituci&oacute;n Predeterminado:',
			't4' => 'Agregar',
			't5' => 'Activado',
			't6' => 'Desactivado',
			't7' => 'Eliminar',
			't8' => 'Deshabilitar todos los Filtros',
			't9' => 'Guardar Configuraci&oacute;n',
			't10' => '¿Est&aacute; seguro que quiere eliminar esta palabra?\nNota: Esta palabra se perder&aacute;.',
		),

		'cnf_conn' => array(
			't23' => array(
				'value' => 'Intervalo de publicaci&oacute;n:',
				'hint' => 'en segundos, la cantidad de tiempo que debe pasar antes de que el usuario publique otro mensaje'
			),

			't24' => array(
				'value' => 'Intervalo de Inactividad:',
				'hint' => 'en segundos, si un usuario tiene FlashChat abierto por (IntervaloDeInactividad) segundos'
			),

			't799' => array(
				'value' => 'Intervalo de Pedido de Mensaje:',
				'hint' => 'tiempo de actualizaci&oacute;n del chat, en segundos'
			),

			't800' => array(
				'value' => 'Intervalo de Pedido de Mensaje en estado Inactivo:',
				'hint' => 'tiempo de actualizaci&oacute;n del chat en estado inactivo, en segundos'
			),

			't802' => array(
				'value' => 'Desconectarse Automaticamente Despu&eacute;s de:',
				'hint' => 'tiempo de inactividad luego del cual el usuario es considerado desconectado, en segundos'
			),

			't803' => array(
				'value' => 'Cerrar Automaticamente Despu&eacute;s de:',
				'hint' => 'tiempo de inactividad luego del cual la conexi&oacute;n es quitada de la base de datos, en segundos'
			),

			't804' => array(
				'value' => 'Direcci&oacute;n de la Ayuda:',
				'hint' => 'Tambi&eacute;n puedes usar help.php'
			)

		),

		'cnf_const' => array(
			't626' => array(
				'value' => 'Nombre Predeterminado del Dise&ntilde;o:'
			),

			't627' => array(
				'value' => 'Nombre Predeterminado del Dise&ntilde;o SWF:'
			),

			't628' => array(
				'value' => 'Nombre Predeterminado del Dise&ntilde;o en XP:'
			),

			't629' => array(
				'value' => 'Nombre Predeterminado del Dise&ntilde;o SWF en XP:'
			),

			't630' => array(
				'value' => 'Nombre Predeterminado del Dise&ntilde;o en Aqua:'
			),

			't631' => array(
				'value' => 'Nombre Predeterminado del Dise&ntilde;o SWF en Aqua:'
			),

			't632' => array(
				'value' => 'Nombre Predeterminado del Dise&ntilde;o en Degrade:'
			),

			't633' => array(
				'value' => 'Nombre Predeterminado del Dise&ntilde;o SWF en Degrade:'
			)

		),

		'cnf_filesharing' => array(
			't830' => array(
				'value' => 'Permite Enviar A Toda la Sala:',
				'hint' => 'los moderadores siempre pueden enviar a todos los usuarios de la sala - esta opci&oacute;n es s&oacute;lo para los no-moderadores'
			),

			't831' => array(
				'value' => 'Permite Enviar A Toda el Chat:',
				'hint' => 'los moderadores siempre pueden enviar a todos los usuarios del chat - esta opci&oacute;n es s&oacute;lo para los no-moderadores'
			),

			't832' => array(
				'value' => 'Extensiones de Archivo Permitidas:',
				'hint' => "extensiones de archivo permitidas, separadas por comas (para permitir todas, seleccione \'\')"
			),

			't833' => array(
				'value' => 'Tama&ntilde;o M&aacute;ximo de Archivo:',
				'hint' => 'tama&ntilde;o m&aacute;ximo de archivo en bytes (2*1024*1024 = 2Mb)'
			),

			't834' => array(
				'value' => 'M&aacute;ximas Horas de Vida para un Archivo:',
				'hint' => 'tiempo en horas para gaurdar el archivo en el servidor (el archivo ser&aacute; eliminado despu&eacute;s de este lapso)'
			),

			't835' => array(
				'value' => 'Extensiones de Archivo Permitidas:',
				'hint' => "extensiones de archivo permitidas, separadas por comas (para permitir todas, seleccione \'\')"
			),

			't836' => array(
				'value' => 'Tama&ntilde;o M&aacute;ximo de Archivo:',
				'hint' => 'tama&ntilde;o m&aacute;ximo de archivo en bytes (2*1024*1024 = 2Mb)'
			),

			't837' => array(
				'value' => 'M&aacute;ximas Horas de Vida para un Archivo:',
				'hint' => 'tiempo en horas para gaurdar el archivo en el servidor (el archivo ser&aacute; eliminado despu&eacute;s de este lapso)'
			),

			't838' => array(
				'value' => 'Tama&ntilde;o M&aacute;ximo de Archivo:',
				'hint' => 'tama&ntilde;o m&aacute;ximo de archivo en bytes (2*1024*1024 = 2Mb)'
			),

			't839' => array(
				'value' => 'M&aacute;ximas Horas de Vida para un Archivo:',
				'hint' => 'tiempo en horas para gaurdar el archivo en el servidor (el archivo ser&aacute; eliminado despu&eacute;s de este lapso)'
			),

			't840' => array(
				'value' => 'M&aacute;ximas Horas de Vida para un Archivo:',
				'hint' => 'tiempo en horas para gaurdar el archivo en el servidor (el archivo ser&aacute; eliminado despu&eacute;s de este lapso)'
			),

			't0' => 'Compartir archivos en el chat',
			't1' => 'Cargando fondo del Avatar',
			't2' => 'Cargando foto del usuario',
			't3' => 'Si',
			't4' => 'No',
			't5' => 'Guardar Configuraci&oacute;n',
			't6' => 'bytes',
			't7' => 'horas'
		),

		'cnf_font' => array(
			't635' => array(
				'value' => 'Permitir Sobreescribir Color del Texto:',
				'hint' => 'predeterminados (presencia : la opci&oacute;n est&aacute; visible u oculta)'
			),

			't636' => array(
				'value' => 'Permitir Cambios:',
				'hint' => 'predeterminados (presencia : la opci&oacute;n est&aacute; visible u oculta)'
			),

			't637' => array(
				'value' => 'Tama&ntilde;o Predeterminado:',
				'hint' => 'predeterminados (presencia : la opci&oacute;n est&aacute; visible u oculta)'
			),

			't638' => array(
				'value' => 'Familia de Fuentes:',
				'hint' => 'predeterminados (presencia : la opci&oacute;n est&aacute; visible u oculta)'
			),

			't639' => array(
				'value' => 'Permitir Cambios:',
				'hint' => 'predeterminados (presencia : la opci&oacute;n est&aacute; visible u oculta)'
			),

			't640' => array(
				'value' => 'Tama&ntilde;o Predeterminado:',
				'hint' => 'predeterminados (presencia : la opci&oacute;n est&aacute; visible u oculta)'
			),

			't641' => array(
				'value' => 'Familia de Fuentes:',
				'hint' => 'predeterminados (presencia : la opci&oacute;n est&aacute; visible u oculta)'
			),

			't642' => array(
				'value' => 'Permitir Cambios:',
				'hint' => 'predeterminados (presencia : la opci&oacute;n est&aacute; visible u oculta)'
			),

			't643' => array(
				'value' => 'Tama&ntilde;o Predeterminado:',
				'hint' => 'predeterminados (presencia : la opci&oacute;n est&aacute; visible u oculta)'
			),

			't644' => array(
				'value' => 'Familia de Fuentes:',
				'hint' => 'predeterminados (presencia : la opci&oacute;n est&aacute; visible u oculta)'
			),

			't0' => 'Si',
			't1' => 'No',
			't2' => 'Chat Principal',
			't3' => 'Elementos de la Interfaz',
			't4' => 'T&iacute;tulo',
			't5' => 'Tama&ntilde;o de Fuente:',
			't6' => 'Familia de Fuentes:',
			't7' => 'Nombre',
			't8' => 'Deshabilitado',
			't9' => 'Guardar Configuraci&oacute;n'

		),

		'cnf_general' => array(
			't3' => array(
				'value' => 'Modo de Depuraci&oacute;n:',
				'hint' => 'poner en verdadero para ejecutar en modo de depuraci&oacute;n'
			),

			't4' => array(
				'value' => 'Versi&oacute;n de FlashChat:',
				'hint' => 'lanzamiento de arquitectura . lanzamiento de mejora . lanzamiento de parche'
			),

			't5' => array(
				'value' => 'Permitir sockets en el servidor:',
				'hint' => 'poner en verdadero para habilitar sockets en el servidor - lea los PDF en l&iacute;nea para m&aacute;s detalles'
			),

			't6' => array(
				'value' => 'Permitir modo de "Soporte en Vivo":',
				'hint' => "set to true to use chat in \'Live Support\' mode"
			),

			't7' => array(
				'value' => 'Habilitar reporte de errores:',
				'hint' => 'poner en verdadero para habilitar reporte de errores'
			),

			't8' => array(
				'value' => 'Habilitar Bots:<br>Debes reinstalar FlashChat para habilitar la opci&oacute;n de Bots',
				'hint' => 'poner en verdadero para habilitar bots'
			),

			't9' => array(
				'value' => 'IP virtual de los bots:',
				'hint' => 'ip virtual de los bots'
			),

			't10' => array(
				'value' => 'Deshabilitar el men&uacute; propio de la lista de usuarios:',
				'hint' => 'poner en falso para permitir el pop-up del men&uacute; propio'
			),

			't11' => array(
				'value' => 'Permitir ventana pop-up de confirmaci&oacute;n para administradores (moderadores):',
				'hint' => 'poner en verdadero para permitir ventana pop-up de confirmaci&oacute;n para administradores (moderadores)'
			),

			't12' => array(
				'value' => 'Formato de Etiquetas:',
				'hint' => 'los posibles valores son cualquier combinacion de AVATAR, USUARIO y TIMESTAMP'
			),

			't13' => array(
				'value' => 'Formato del Time Stamp:',
				'hint' => 'Patr&oacute;n para funci&oacute;n de fecha de PHP'
			),

			't14' => array(
				'value' => 'M&aacute;ximo de conexiones por direcci&oacute;n IP:',
				'hint' => 'n&uacute;mero de conexiones por direcci&oacute;n IP'
			),

			't15' => array(
				'value' => 'Deshabilitar comandos IRC:',
				'hint' => 'puedes poner aqu&iacute; una lista de comandos IRC a deshabilitar, por ejemplo (back,backtime)'
			),

			't16' => array(
				'value' => 'Deshabilitar comandos IRC para Moderadores:',
				'hint' => 'Restricciones a Moderadores (que comandos IRC est&aacute;n deshabilitados para Moderadores)'
			),

			't17' => array(
				'value' => 'Restricciones a Moderadores en la secci&oacute;n de aministraci&oacute;n:',
				'hint' => 'Restricciones a Moderadores en la secci&oacute;n de aministraci&oacute;n (admin.php), por ejemplo (bots, desinstalar, conexiones, usuarios)'
			),

			't18' => array(
				'value' => 'Tama&ntilde;o m&aacute;ximo del texto a ingresar:',
				'hint' => 'tama&ntilde;o m&aacute;ximo del texto a ingresar, # caracteres'
			),

			't19' => array(
				'value' => 'N&uacute;mero m&aacute;ximo de mensajes del registro de chat:',
				'hint' => 'N&uacute;mero m&aacute;ximo de mensajes a guardar en el  registro de chat'
			),

			't20' => array(
				'value' => 'Abrir todas las salas con usuarios:',
				'hint' => 'si est&aacute; en verdadero, la lista de usuarios abre todas las salas con usuarios en ellas'
			),

			't21' => array(
				'value' => 'Mostrar ventana de desconexi&oacute;n:',
				'hint' => 'si est&aacute; en falso, entonces solo usa el m&eacute;todo ....src=logout.php, pero no el m&eacute;todo de pop-ups'
			),

			't22' => array(
				'value' => 'Tiempo de muestra de la ventana de desconexi&oacute;n:',
				'hint' => 'en segundos'
			),

			't25' => array(
				'value' => 'Mostrar ventana de chat en primer plano cuando un nuevo mensaje es recibido:',
				'hint' => 'muestra en primer plano las ventanas de chat no visibles, cuando se recibe un nuevo mensaje'
			),

			't26' => array(
				'value' => 'Sala predeterminada:',
				'hint' => 'clave principal de la sala donde van todos los usuarios  luego de ingresar al sistema'
			),

			't27' => array(
				'value' => 'Eliminar autom&aacute;ticamente la Sala:',
				'hint' => 'n&uacute;mero de segundos antes de que la sala sea eliminada'
			),

			't28' => array(
				'value' => 'T&iacute;tulo de la sala en la lista del usuario:',
				'hint' => 'formato del t&iacute;tulo de la sala en la lista del usuario'
			),

			't29' => array(
				'value' => 'M&aacute;ximo de usuarios por sala:'
			),

			't30' => array(
				'value' => 'Orden de la lista:',
				'hint' => 'Opciones: Alfab&eacute;ticamente, de la A a la Z, Por orden de ingreso a la sala, Moderadores & Administradores primero, luego de la A a la Z, Moderadores & Administradores primero, luego por orden de ingreso, Por estado del usuario, Moderadores & Administradores primero, luego por estado del usuario'
			),

			't31' => array(
				'value' => 'Sistema CMS:',
				'hint' => 'CMSpredeterminado - CMS predeterminado, vac&iacute;o - CMS sin estado'
			),

			't32' => array(
				'value' => 'Ingresar Decodificaci&oacute;n UTF8:',
				'hint' => 'posibles valores - verdadero, falso'
			),

			't33' => array(
				'value' => 'Clave Encriptada:',
				'hint' => 'opci&oacute;n para encriptar la clave del usuario para CMSpredeterminado, puede ser 1 - encriptar y 0 - no encriptar'
			),

			't34' => array(
				'value' => 'Motd Autom&aacute;tico:',
				'hint' => '1 para activarlo, 0 para desactivarlo (one significa que es mostrado luego de entrar al chat)'
			),

			't35' => array(
				'value' => 'T&oacute;pico Autom&aacute;tico:',
				'hint' => '1 para activarlo, 0 para desactivarlo (one significa que es mostrado luego de entrar a la sala)'
			),

			't36' => array(
				'value' => 'Clave de Administrador:<br>s&oacute;lo aplica si se usa un CMS sin estado (Invitado)',
				'hint' => 'permite que cualquier usuario ingrese como administrador - s&oacute;lo para el modo de CMS sin estado'
			),

			't37' => array(
				'value' => 'Clave de Moderador:<br>s&oacute;lo aplica si se usa un CMS sin estado (Invitado)',
				'hint' => 'permite que cualquier usuario ingrese como moderador - s&oacute;lo para el modo de CMS sin estado'
			),

			't38' => array(
				'value' => 'Clave de Esp&iacute;a:<br>s&oacute;lo aplica si se usa un CMS sin estado (Invitado)',
				'hint' => 'permite que cualquier usuario ingrese como un esp&iacute;a - s&oacute;lo para el modo de CMS sin estado'
			),

			't981' => array(
				'value' => 'N&uacute;mero m&aacute;ximo de minutos del comando de backtime:',
				'hint' => 'establece el m&aacute;ximo n&uacute;mero de minutos que el comando de backtime ser&aacute; mantenido, use 0 para ilimitado'
			),

			't982' => array(
				'value' => 'N&uacute;mero M&aacute;x de l&iacute;neas del comando de backtime:',
				'hint' => 'establece el m&aacute;ximo n&uacute;mero de l&iacute;neas que el comando de backtime mantendr&aacute;, use 0 para ilimitado'
			),

			't1104' => array(
				'value' => 'Bandera que indica si es una instancia paga de chat',
				'hint' => 'poner en 1 si esta es una instancia paga de chat'
			),

			't1105' => array(
				'value' => 'Monto de la Membres&iacute;a (si es una instancia paga de chat)',
				'hint' => 'si esta es una instancia paga de chat, por favor actualice el monto de la membres&iacute;a'
			),

			't1106' => array(
				'value' => 'Bandera que indica si est&aacute; en modo de test (si es una instancia paga de chat)',
				'hint' => 'si esta es una instancia paga de chat, por favor especifique si est&aacute; en modo de test'
			),

			't1107' => array(
				'value' => 'Direcci&oacute;n de mail de negocios de PayPal (si es una instancia paga de chat)',
				'hint' => 'si es una instancia paga de chat, por favor especifique el mail de negocios'
			),

			't1108' => array(
				'value' => 'Moneda (si esta es una instancia paga de chat)',
				'hint' => "si es una instancia paga de chat, por favor especifique la moneda, por ejemplo: \'USD\'"
			),

			't1109' => array(
				'value' => 'Habilitar sockets de java en el servidor:',
				'hint' => 'poner en verdadero para habilitar sockets en el servidor - mire los PDF en l&iacute;nea para m&aacute;s detalles'
			),

			't1110' => array(
				'value' => 'Tipo de cach&eacute;: (para cambiar la configuraci&oacute;n de cach&eacute;, debes reinstalar FlashChat)',
				'hint' => '0 = sin cach&eacute;, 1 = cach&eacute; limitado, 2 = cach&eacute; completo'
			),

			't1111' => array(
				'value' => 'Ruta del cache:',
				'hint' => '0 = sin cach&eacute;, 1 = cach&eacute; limitado, 2 = cach&eacute; completo'
			),

			't1112' => array(
				'value' => 'Prefijo del archivo del cach&eacute;:',
				'hint' => '0 = sin cach&eacute;, 1 = cach&eacute; limitado, 2 = cach&eacute; completo'
			),

			't1190' => array(
				'value' => 'T&iacute;tulo del usuario en la lista de usuarios:',
				'hint' => 'los posibles valores son cualquier combinaci&oacute;n de AVATAR, USUARIO y ESTADO'
			),

			't2' => array(
				'value' => 'A&ntilde;adir Tiempo al servidor:',
				'hint' => 'establece el tiempo a&ntilde;adido al servidor (necesario solo para corregit problems con la zona horario del servidor)'
			),

			't1192' => array(
				'value' => 'Texto de Salto de L&iacute;nea:',
				'hint' => 'texto de salto de l&iacute;nea'
			)

		),

		'cnf_layout' => array(
			't39' => array(
				'value' => 'Permitir Expulsiones:'
			),

			't40' => array(
				'value' => 'Permitir Invitaciones:'
			),

			't41' => array(
				'value' => 'Permitir Ingorar:'
			),

			't42' => array(
				'value' => 'Permitir Perfiles:'
			),

			't43' => array(
				'value' => 'Permitir Crear Salas:'
			),

			't44' => array(
				'value' => 'Permitir Compartir Archivos:'
			),

			't45' => array(
				'value' => 'Permitir Fondos Personalizados:',
				'hint' => 'Si selecciona No, los botones de paneles de efectos Personalizados desaparecen'
			),

			't46' => array(
				'value' => 'Mostrar Panel de Opciones:'
			),

			't47' => array(
				'value' => 'Mostrar Caja de Texto:'
			),

			't48' => array(
				'value' => 'Mostrar Log Privado:'
			),

			't49' => array(
				'value' => 'Mostrar Log P&uacute;blico:'
			),

			't50' => array(
				'value' => 'Mostrar Lista de Usuarios:'
			),

			't51' => array(
				'value' => 'Mostrar Desconectarse:'
			),

			't52' => array(
				'value' => 'Modo Sola &Uacute;nica:',
				'hint' => 'Si selecciona Si, la lista de salas est&aacute; visible'
			),

			't53' => array(
				'value' => 'Permitir Mensajes Privados:'
			),

			't54' => array(
				'value' => 'Mostrar Direcciones:'
			),

			't55' => array(
				'value' => 'Mostrar Lista de Estados:'
			),

			't56' => array(
				'value' => 'Mostrar Bot&oacute;n de Opciones:'
			),

			't57' => array(
				'value' => 'Mostrar Lista de Colores:'
			),

			't58' => array(
				'value' => 'Mostrar Bot&oacute;n Guardar:'
			),

			't59' => array(
				'value' => 'Mostrar Bot&oacute;n Ayuda:'
			),

			't60' => array(
				'value' => 'Mostrar Lista de Caritas:',
				'hint' => 'desactivado, lista, ventana pop-up'
			),

			't61' => array(
				'value' => 'Mostrar Bot&oacute;n Limpiar:'
			),

			't62' => array(
				'value' => 'Mostrar Campana:'
			),

			't63' => array(
				'value' => 'Temas de los paneles:',
				'hint' => 'que paneles mostrar en el panel de opciones (Panel Acerca de no se puede ocultar)'
			),

			't64' => array(
				'value' => 'Panel de Sonidos:'
			),

			't65' => array(
				'value' => 'Panel de Efectos:'
			),

			't66' => array(
				'value' => 'Panel de Texto:'
			),

			't67' => array(
				'value' => 'Ancho M&iacute;nimo:',
				'hint' => 'ancho m&iacute;nimo de la vista de lista de usuarios, en pixeles'
			),

			't68' => array(
				'value' => 'Ancho Predeterminado:',
				'hint' => 'ancho exacto de la lista de usuarios, en porcentaje'
			),

			't69' => array(
				'value' => 'Ancho Relativo:',
				'hint' => 'ancho relativo de la lista de usuarios, en porcentaje'
			),

			't70' => array(
				'value' => 'Ancho al Acoplar:',
				'hint' => 'ancho relativo de la lista de usuarios acoplada, en porcentaje'
			),

			't71' => array(
				'value' => 'Altura al Acoplar:',
				'hint' => 'altura relativo de la lista de usuarios acoplada, en porcentaje'
			),

			't72' => array(
				'value' => 'Posici&oacute;n:',
				'hint' => 'Posici&oacute;n en la pantalla es DERECHA o IZQUIERDA'
			),

			't73' => array(
				'value' => 'Altura M&iacute;nima:',
				'hint' => 'altura m&iacute;nimo del log p&uacute;blico, en pixeles'
			),

			't74' => array(
				'value' => 'Altura Predeterminada:',
				'hint' => 'altura exacta del log p&uacute;blico, en pixeles'
			),

			't75' => array(
				'value' => 'Altura Relativa:',
				'hint' => 'Altura Relativa del log p&uacute;blico, en porcentaje'
			),

			't76' => array(
				'value' => 'Altura M&iacute;nima:'
			),

			't77' => array(
				'value' => 'Altura Predeterminada:'
			),

			't78' => array(
				'value' => 'Altura Relativa:'
			),

			't79' => array(
				'value' => 'Altura M&iacute;nima:'
			),

			't80' => array(
				'value' => 'Altura Predeterminada:'
			),

			't81' => array(
				'value' => 'Altura Relativa:'
			),

			't82' => array(
				'value' => 'Posici&oacute;n:',
				'hint' => 'Posici&oacute;n en la pantalla es ARRIBA o ABAJO'
			),

			't83' => array(
				'value' => 'Permitir Expulsiones:'
			),

			't84' => array(
				'value' => 'Permitir Invitaciones:'
			),

			't85' => array(
				'value' => 'Permitir Ignorados:'
			),

			't86' => array(
				'value' => 'Permitir Perfiles:'
			),

			't87' => array(
				'value' => 'Permitir Crear Salas:'
			),

			't88' => array(
				'value' => 'Permitir Compartir Archivos:'
			),

			't89' => array(
				'value' => 'Permitir Fondos Personalizados:',
				'hint' => 'Si selecciona No, los botones de paneles de efectos Personalizados desaparecen'
			),

			't90' => array(
				'value' => 'Mostrar Panel de Opciones:'
			),

			't91' => array(
				'value' => 'Mostrar Caja de Texto:'
			),

			't92' => array(
				'value' => 'Mostrar Log Privado:'
			),

			't93' => array(
				'value' => 'Mostrar Log P&uacute;blico:'
			),

			't94' => array(
				'value' => 'Mostrar Lista de Usuarios:'
			),

			't95' => array(
				'value' => 'Mostrar Desconectarse:'
			),

			't96' => array(
				'value' => 'Modo Sala &Uacute;nica:',
				'hint' => 'Si selecciona Si, la lista de salas est&aacute; visible'
			),

			't97' => array(
				'value' => 'Permitir Mensajes Privados:'
			),

			't98' => array(
				'value' => 'Mostrar Direcciones:'
			),

			't99' => array(
				'value' => 'Mostrar Lista de Estados:'
			),

			't100' => array(
				'value' => 'Mostrar Bot&oacute;n de Opciones:'
			),

			't101' => array(
				'value' => 'Mostrar Lista de Colores:'
			),

			't102' => array(
				'value' => 'Mostrar Bot&oacute;n Guardar:'
			),

			't103' => array(
				'value' => 'Mostrar Bot&oacute;n Ayuda:'
			),

			't104' => array(
				'value' => 'Mostrar Lista de Caritas:',
				'hint' => 'desactivado, lista, ventana pop-up'
			),

			't105' => array(
				'value' => 'Mostrar Bot&oacute;n Limpiar:'
			),

			't106' => array(
				'value' => 'Mostrar Campana:'
			),

			't107' => array(
				'value' => 'Temas de los paneles:',
				'hint' => 'que paneles mostrar en el panel de opciones (Panel Acerca de no se puede ocultar)'
			),

			't108' => array(
				'value' => 'Panel de Sonidos:'
			),

			't109' => array(
				'value' => 'Panel de Efectos:'
			),

			't110' => array(
				'value' => 'Panel de Texto:'
			),

			't111' => array(
				'value' => 'Ancho M&iacute;nimo:',
				'hint' => 'ancho m&iacute;nimo de la vista de lista de usuarios, en pixeles'
			),

			't112' => array(
				'value' => 'Ancho Predeterminado:',
				'hint' => 'ancho exacto de la lista de usuarios, en porcentaje'
			),

			't113' => array(
				'value' => 'Ancho Relativo:',
				'hint' => 'ancho relativo de la lista de usuarios, en porcentaje'
			),

			't114' => array(
				'value' => 'Ancho al Acoplar:',
				'hint' => 'ancho relativo de la lista de usuarios acoplada, en porcentaje'
			),

			't115' => array(
				'value' => 'Alto al Acoplar:',
				'hint' => 'alto relativo de la lista de usuarios acoplada, en porcentaje'
			),

			't116' => array(
				'value' => 'Posici&oacute;n:',
				'hint' => 'Posici&oacute;n en la pantalla es DERECHA o IZQUIERDA'
			),

			't117' => array(
				'value' => 'Altura M&iacute;nima:',
				'hint' => 'alto m&iacute;nimo del log p&uacute;blico, en pixeles'
			),

			't118' => array(
				'value' => 'Altura Predeterminada:',
				'hint' => 'altura exacta del log p&uacute;blico, en pixeles'
			),

			't119' => array(
				'value' => 'Altura Relativa:',
				'hint' => 'Altura Relativa del log p&uacute;blico, en porcentaje'
			),

			't120' => array(
				'value' => 'Altura M&iacute;nima:'
			),

			't121' => array(
				'value' => 'Altura Predeterminada:'
			),

			't122' => array(
				'value' => 'Altura Relativa:'
			),

			't123' => array(
				'value' => 'Altura M&iacute;nima:'
			),

			't124' => array(
				'value' => 'Altura Predeterminada:'
			),

			't125' => array(
				'value' => 'Altura Relativa:'
			),

			't126' => array(
				'value' => 'Posici&oacute;n:',
				'hint' => 'Posici&oacute;n en la pantalla es ARRIBA o ABAJO'
			),

			't127' => array(
				'value' => 'Permitir Expulsiones:'
			),

			't128' => array(
				'value' => 'Permitir Invitaciones:'
			),

			't129' => array(
				'value' => 'Permitir Ignorados:'
			),

			't130' => array(
				'value' => 'Permitir Perfiles:'
			),

			't131' => array(
				'value' => 'Permitir Crear Salas:'
			),

			't132' => array(
				'value' => 'Permitir Compartir Archivos:'
			),

			't133' => array(
				'value' => 'Permitir Fondos Personalizados:',
				'hint' => 'Si selecciona No, los botones de paneles de efectos Personalizados desaparecen'
			),

			't134' => array(
				'value' => 'Mostrar Panel de Opciones:'
			),

			't135' => array(
				'value' => 'Mostrar Caja de Texto:'
			),

			't136' => array(
				'value' => 'Mostrar Log Privado:'
			),

			't137' => array(
				'value' => 'Mostrar Log P&uacute;blico:'
			),

			't138' => array(
				'value' => 'Mostrar Lista de Usuarios:'
			),

			't139' => array(
				'value' => 'Mostrar Desconectarse:'
			),

			't140' => array(
				'value' => 'Modo Sala &Uacute;nica:',
				'hint' => 'Si selecciona Si, la lista de salas est&aacute; visible'
			),

			't141' => array(
				'value' => 'Permitir Mensajes Privados:'
			),

			't142' => array(
				'value' => 'Mostrar Direcciones:'
			),

			't143' => array(
				'value' => 'Mostrar Lista de Estados:'
			),

			't144' => array(
				'value' => 'Mostrar Bot&oacute;n de Opciones:'
			),

			't145' => array(
				'value' => 'Mostrar Lista de Colores:'
			),

			't146' => array(
				'value' => 'Mostrar Bot&oacute;n Guardar:'
			),

			't147' => array(
				'value' => 'Mostrar Bot&oacute;n Ayuda:'
			),

			't148' => array(
				'value' => 'Mostrar Lista de Caritas:',
				'hint' => 'desactivado, lista, ventana pop-up'
			),

			't149' => array(
				'value' => 'Mostrar Bot&oacute;n Limpiar:'
			),

			't150' => array(
				'value' => 'Mostrar Campana:'
			),

			't151' => array(
				'value' => 'Temas de los paneles:',
				'hint' => 'que paneles mostrar en el panel de opciones (Panel Acerca de no se puede ocultar)'
			),

			't152' => array(
				'value' => 'Panel de Sonidos:'
			),

			't153' => array(
				'value' => 'Panel de Efectos:'
			),

			't154' => array(
				'value' => 'Panel de Texto:'
			),

			't155' => array(
				'value' => 'Ancho M&iacute;nimo:',
				'hint' => 'ancho m&iacute;nimo de la vista de lista de usuarios, en pixeles'
			),

			't156' => array(
				'value' => 'Ancho Predeterminado:',
				'hint' => 'ancho exacto de la lista de usuarios, en porcentaje'
			),

			't157' => array(
				'value' => 'Ancho Relativo:',
				'hint' => 'ancho relativo de la lista de usuarios, en porcentaje'
			),

			't158' => array(
				'value' => 'Ancho al Acoplar:',
				'hint' => 'ancho relativo de la lista de usuarios acoplada, en porcentaje'
			),

			't159' => array(
				'value' => 'Alto al Acoplar:',
				'hint' => 'alto relativo de la lista de usuarios acoplada, en porcentaje'
			),

			't160' => array(
				'value' => 'Posici&oacute;n:',
				'hint' => 'Posici&oacute;n en la pantalla es DERECHA o IZQUIERDA'
			),

			't161' => array(
				'value' => 'Altura M&iacute;nima:',
				'hint' => 'alto m&iacute;nimo del log p&uacute;blico, en pixeles'
			),

			't162' => array(
				'value' => 'Altura Predeterminada:',
				'hint' => 'altura exacta del log p&uacute;blico, en pixeles'
			),

			't163' => array(
				'value' => 'Altura Relativa:',
				'hint' => 'Altura Relativa del log p&uacute;blico, en porcentaje'
			),

			't164' => array(
				'value' => 'Altura M&iacute;nima:'
			),

			't165' => array(
				'value' => 'Altura Predeterminada:'
			),

			't166' => array(
				'value' => 'Altura Relativa:'
			),

			't167' => array(
				'value' => 'Altura M&iacute;nima:'
			),

			't168' => array(
				'value' => 'Altura Predeterminada:'
			),

			't169' => array(
				'value' => 'Altura Relativa:'
			),

			't170' => array(
				'value' => 'Posici&oacute;n:',
				'hint' => 'Posici&oacute;n en la pantalla es ARRIBA o ABAJO'
			),

			't171' => array(
				'value' => 'Permitir Ignorados:'
			),

			't172' => array(
				'value' => 'Permitir Invitaciones:'
			),

			't173' => array(
				'value' => 'Permitir Ignorados:'
			),

			't174' => array(
				'value' => 'Permitir Perfiles:'
			),

			't175' => array(
				'value' => 'Permitir Crear Salas:'
			),

			't176' => array(
				'value' => 'Permitir Compartir Archivos:'
			),

			't177' => array(
				'value' => 'Permitir Fondos Personalizados:',
				'hint' => 'Si selecciona No, los botones de paneles de efectos Personalizados desaparecen'
			),

			't178' => array(
				'value' => 'Mostrar Panel de Opciones:'
			),

			't179' => array(
				'value' => 'Mostrar Caja de Texto:'
			),

			't180' => array(
				'value' => 'Mostrar Log Privado:'
			),

			't181' => array(
				'value' => 'Mostrar Log P&uacute;blico:'
			),

			't182' => array(
				'value' => 'Mostrar Lista de Usuarios:'
			),

			't183' => array(
				'value' => 'Mostrar Desconectarse:'
			),

			't184' => array(
				'value' => 'Modo Sala &Uacute;nica:',
				'hint' => 'Si selecciona Si, la lista de salas est&aacute; visible'
			),

			't185' => array(
				'value' => 'Permitir Mensajes Privados:'
			),

			't186' => array(
				'value' => 'Mostrar Direcciones:'
			),

			't187' => array(
				'value' => 'Mostrar Lista de Estados:'
			),

			't188' => array(
				'value' => 'Mostrar Bot&oacute;n de Opciones:'
			),

			't189' => array(
				'value' => 'Mostrar Bot&oacute;n Guardar:'
			),

			't190' => array(
				'value' => 'Mostrar Bot&oacute;n Ayuda:'
			),

			't191' => array(
				'value' => 'Mostrar Lista de Caritas:',
				'hint' => 'desactivado, lista, ventana pop-up'
			),

			't192' => array(
				'value' => 'Mostrar Lista de Colores:'
			),

			't193' => array(
				'value' => 'Mostrar Bot&oacute;n Limpiar:'
			),

			't194' => array(
				'value' => 'Mostrar Campana:'
			),

			't195' => array(
				'value' => 'Temas de los paneles:',
				'hint' => 'que paneles mostrar en el panel de opciones (Panel Acerca de no se puede ocultar)'
			),

			't196' => array(
				'value' => 'Panel de Texto:'
			),

			't197' => array(
				'value' => 'Panel de Efectos:'
			),

			't198' => array(
				'value' => 'Panel de Sonidos:'
			),

			't199' => array(
				'value' => 'Ancho M&iacute;nimo:',
				'hint' => 'ancho m&iacute;nimo de la vista de lista de usuarios, en pixeles'
			),

			't200' => array(
				'value' => 'Ancho Predeterminado:',
				'hint' => 'ancho exacto de la lista de usuarios, en porcentaje'
			),

			't201' => array(
				'value' => 'Ancho Relativo:',
				'hint' => 'ancho relativo de la lista de usuarios, en porcentaje'
			),

			't202' => array(
				'value' => 'Ancho al Acoplar:',
				'hint' => 'ancho relativo de la lista de usuarios acoplada, en porcentaje'
			),

			't203' => array(
				'value' => 'Alto al Acoplar:',
				'hint' => 'alto relativo de la lista de usuarios acoplada, en porcentaje'
			),

			't204' => array(
				'value' => 'Posici&oacute;n:',
				'hint' => 'Posici&oacute;n en la pantalla es DERECHA o IZQUIERDA'
			),

			't205' => array(
				'value' => 'Altura M&iacute;nima:',
				'hint' => 'alto m&iacute;nimo del log p&uacute;blico, en pixeles'
			),

			't206' => array(
				'value' => 'Altura Predeterminada:',
				'hint' => 'altura exacta del log p&uacute;blico, en pixeles'
			),

			't207' => array(
				'value' => 'Altura Relativa:',
				'hint' => 'Altura Relativa del log p&uacute;blico, en porcentaje'
			),

			't208' => array(
				'value' => 'Altura M&iacute;nima:'
			),

			't209' => array(
				'value' => 'Altura Predeterminada:'
			),

			't210' => array(
				'value' => 'Altura Relativa:'
			),

			't211' => array(
				'value' => 'Altura M&iacute;nima:'
			),

			't212' => array(
				'value' => 'Altura Predeterminada:'
			),

			't213' => array(
				'value' => 'Altura Relativa:'
			),

			't214' => array(
				'value' => 'Posici&oacute;n:',
				'hint' => 'Posici&oacute;n en la pantalla es ARRIBA o ABAJO'
			),

			't215' => array(
				'value' => 'Permitir Ignorados:'
			),

			't216' => array(
				'value' => 'Permitir Invitaciones:'
			),

			't217' => array(
				'value' => 'Permitir Ignorados:'
			),

			't218' => array(
				'value' => 'Permitir Perfiles:'
			),

			't219' => array(
				'value' => 'Permitir Crear Salas:'
			),

			't220' => array(
				'value' => 'Permitir Compartir Archivos:'
			),

			't221' => array(
				'value' => 'Permitir Fondos Personalizados:',
				'hint' => 'Si selecciona No, los botones de paneles de efectos Personalizados desaparecen'
			),

			't222' => array(
				'value' => 'Mostrar Panel de Opciones:'
			),

			't223' => array(
				'value' => 'Mostrar Caja de Texto:'
			),

			't224' => array(
				'value' => 'Mostrar Log Privado:'
			),

			't225' => array(
				'value' => 'Mostrar Log P&uacute;blico:'
			),

			't226' => array(
				'value' => 'Mostrar Lista de Usuarios:'
			),

			't227' => array(
				'value' => 'Mostrar Desconectarse:'
			),

			't228' => array(
				'value' => 'Modo Sala &Uacute;nica:',
				'hint' => 'Si selecciona Si, la lista de salas est&aacute; visible'
			),

			't229' => array(
				'value' => 'Permitir Mensajes Privados:'
			),

			't230' => array(
				'value' => 'Mostrar Direcciones:'
			),

			't231' => array(
				'value' => 'Mostrar Lista de Estados:'
			),

			't232' => array(
				'value' => 'Mostrar Bot&oacute;n de Opciones:'
			),

			't233' => array(
				'value' => 'Mostrar Lista de Colores:'
			),

			't234' => array(
				'value' => 'Mostrar Bot&oacute;n Guardar:'
			),

			't235' => array(
				'value' => 'Mostrar Bot&oacute;n Ayuda:'
			),

			't236' => array(
				'value' => 'Mostrar Lista de Caritas:',
				'hint' => 'desactivado, lista, ventana pop-up'
			),

			't237' => array(
				'value' => 'Mostrar Bot&oacute;n Limpiar:'
			),

			't238' => array(
				'value' => 'Mostrar Campana:'
			),

			't239' => array(
				'value' => 'Temas de los paneles:',
				'hint' => 'que paneles mostrar en el panel de opciones (Panel Acerca de no se puede ocultar)'
			),

			't240' => array(
				'value' => 'Panel de Sonidos:'
			),

			't241' => array(
				'value' => 'Panel de Efectos:'
			),

			't242' => array(
				'value' => 'Panel de Texto:'
			),

			't243' => array(
				'value' => 'Ancho M&iacute;nimo:',
				'hint' => 'ancho m&iacute;nimo de la vista de lista de usuarios, en pixeles'
			),

			't244' => array(
				'value' => 'Ancho Predeterminado:',
				'hint' => 'ancho exacto de la lista de usuarios, en porcentaje'
			),

			't245' => array(
				'value' => 'Ancho Relativo:',
				'hint' => 'ancho relativo de la lista de usuarios, en porcentaje'
			),

			't246' => array(
				'value' => 'Ancho al Acoplar:',
				'hint' => 'ancho relativo de la lista de usuarios acoplada, en porcentaje'
			),

			't247' => array(
				'value' => 'Alto al Acoplar:',
				'hint' => 'alto relativo de la lista de usuarios acoplada, en porcentaje'
			),

			't248' => array(
				'value' => 'Posici&oacute;n:',
				'hint' => 'Posici&oacute;n en la pantalla es DERECHA o IZQUIERDA'
			),

			't249' => array(
				'value' => 'Altura M&iacute;nima:',
				'hint' => 'alto m&iacute;nimo del log p&uacute;blico, en pixeles'
			),

			't250' => array(
				'value' => 'Altura Predeterminada:',
				'hint' => 'altura exacta del log p&uacute;blico, en pixeles'
			),

			't251' => array(
				'value' => 'Altura Relativa:',
				'hint' => 'Altura Relativa del log p&uacute;blico, en porcentaje'
			),

			't252' => array(
				'value' => 'Altura M&iacute;nima:'
			),

			't253' => array(
				'value' => 'Altura Predeterminada:'
			),

			't254' => array(
				'value' => 'Altura Relativa:'
			),

			't255' => array(
				'value' => 'Altura M&iacute;nima:'
			),

			't256' => array(
				'value' => 'Altura Predeterminada:'
			),

			't257' => array(
				'value' => 'Altura Relativa:'
			),

			't258' => array(
				'value' => 'Posici&oacute;n:',
				'hint' => 'Posici&oacute;n en la pantalla es ARRIBA o ABAJO'
			),

			't0' => 'Editar apariencia para:',
			't1' => 'Si',
			't2' => 'No',
			't3' => 'Guardar Configuraci&oacute;n',
			't4' => 'Caja de Herramientas',
			't5' => 'Panel de Opciones',
			't6' => 'Restricciones de la lista de usuarios',
			't7' => 'Restricciones de la lista p&uacute;blica',
			't8' => 'Restricciones de la lista privada',
			't9' => 'Restricciones de la lista de Ingreso de Texto',
		),

		'cnf_logout' => array(
			't841' => array(
				'value' => 'Cerrar FlashCat:',
				'hint' => 'Si selecciona Si, la ventana de FlashChat se cierra luego de desconectarse'
			),

			't842' => array(
				'value' => 'Redireccionar a URL:',
				'hint' => 'Redireccionar a URL debe ser una URL v&aacute;lida'
			),

			't843' => array(
				'value' => 'URL:',
				'hint' => 'Redireccionar debe estar en Si para que esto funcione'
			),

			't844' => array(
				'value' => 'Ventana:',
				'hint' => 'la ventana donde abrirlo. Valores posibles: _blank, _self, _parent, o un nombre de ventana'
			),

			't0' => 'Editar apariencia para:'
		),

		'cnf_modules' => array(
			't845' => array(
				'value' => 'Punto de Agrupamiento:',
				'hint' => 'punto de agrupamiento: -1,0,1,2,3 o 4 (0 = centrado,1-4=esquinas de abajo de la lista de salas) + 5-12 punto'
			),

			't846' => array(
				'value' => 'Ruta:',
				'hint' => 'establecer en \' \' para deshabilitar. Para ver como funciona, use \'banner.swf\' o \'moduletest.swf\''
			),

			't847' => array(
				'value' => 'Ajustar:',
				'hint' => 'Si selecciona Si, SWF es ajustado horizontal y verticalmente para llenar todo el espacio disponible'
			),

			't848' => array(
				'value' => 'Posici&oacute;n x Predeterminada:',
				'hint' => 'la posici&oacute;n \'x\' predeterminada de la ventana flotante (cuando Agrupamiento = -1)'
			),

			't849' => array(
				'value' => 'Posici&oacute;n y Predeterminada:',
				'hint' => 'la posici&oacute;n \'y\' predeterminada de la ventana flotante (cuando Agrupamiento = -1)'
			),

			't850' => array(
				'value' => 'Ancho Predeterminado:',
				'hint' => 'el ancho predeterminado de la ventana florante (cuando Agrupamiento = -1)'
			),

			't851' => array(
				'value' => 'Altura Predeterminada:',
				'hint' => 'la altura predeterminada de la ventana florante (cuando Agrupamiento = -1)'
			),

			't0' => 'No hay m&oacute;dulos.',
			't1' => 'Agregar Nuevo M&oacute;dulo',
			't2' => 'M&oacute;dulo',
			't3' => 'Si',
			't4' => 'No',
			't5' => 'Eliminar',
			't6' => 'Guardar Configuraci&oacute;n',
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
				'value' => 'Eliminar Mensaje Despu&eacute;s de:',
				'hint' => 'eliminar mensaje despu&eacute;s de este tiempo, en segundos'
			)

		),

		'cnf_other' => array(
			't625' => array(
				'value' => 'Tema Predeterminado:'
			),

			't634' => array(
				'value' => 'Visualizaci&oacute;n Predeterminada:'
			),

			't670' => array(
				'value' => 'Idioma Especial:'
			),

			't805' => array(
				'value' => 'Desexpulsar Autom&aacute;ticamente Despu&eacute;s de:',
				'hint' => 'tiempo despu&eacute;s del que el usuario es des-expulsado, en segundos'
			),

			't806' => array(
				'value' => 'Idioma Predeterminado:',
				'hint' => 'c&oacute;digo de dos letras del idioma predeterminado (ver abajo)'
			),

			't807' => array(
				'value' => 'Permitir Idiomas:',
				'hint' => 'permitir a los usuarios seleccionar otro idioma'
			),

			't808' => array(
				'value' => 'Base:'
			),

			't809' => array(
				'value' => 'Mostrar IP:',
				'hint' => 'mostrar el IP del usuario y el proveedor con el comando /who si esta en Si'
			),

			't810' => array(
				'value' => 'PM usuario:',
				'hint' => 'establecer en Si para mostrar uns lista de comandos de usuario en una ventana PM, No para ventana de chat'
			),

			't811' => array(
				'value' => 'PM Administrador:',
				'hint' => 'establecer en Si para mostrar uns lista de comandos de moderador en una ventana PM, No para ventana de chat'
			),

			't812' => array(
				'value' => 'M&aacute;ximo de Salas:',
				'hint' => 'n&uacute;mero m&aacute;ximo de salas p&uacute;blicas'
			),

			't0' => 'Si',
			't1' => 'No',
			't2' => 'Guardar Configuraci&oacute;n'
		),

		'cnf_preloader' => array(
			't660' => array(
				'value' => 'Texto de las Opciones:'
			),

			't661' => array(
				'value' => 'Texto de las Caritas:'
			),

			't662' => array(
				'value' => 'Texto del Chat Principal:'
			),

			't663' => array(
				'value' => 'Texto Inicial:'
			),

			't664' => array(
				'value' => 'Texto OK:'
			),

			't665' => array(
				'value' => 'Familia de Fuentes:'
			),

			't666' => array(
				'value' => 'Tama&ntilde;o de Fuente:'
			),

			't667' => array(
				'value' => 'Color de Fuente:'
			),

			't668' => array(
				'value' => 'Color de Fondo:'
			),

			't669' => array(
				'value' => 'Color de la Barra:'
			),

			't985' => array(
				'value' => 'Mostrar Bot&oacute;n de "Iniciar Sesi&oacute;n":',
				'hint' => "Si est&aacute; en falso, el bot&oacute;n de \'Inicio de Sesi&oacute;n\' est&aacute; invisible"
			),

			't986' => array(
				'value' => 'Mostrar Barra de T&iacute;tulo:',
				'hint' => 'Si est&aacute; en falso, la barra de t&iacute;tulo est&aacute; invisible'
			),

			't987' => array(
				'value' => 'Tema:'
			),

			't988' => array(
				'value' => 'Ancho:'
			),

			't989' => array(
				'value' => 'Alto:'
			),

			't990' => array(
				'value' => 'Mensaje Ingresado:',
				'hint' => 'si est&aacute; en verdadero, el mensaje aparece si no fue ingresado'
			),

			't991' => array(
				'value' => 'Alineado:',
				'hint' => "\'left\' or \'right\'"
			),

			't992' => array(
				'value' => 'X de la Etiqueta:'
			),

			't993' => array(
				'value' => 'Y de la Etiqueta:'
			),

			't994' => array(
				'value' => 'X del Campo:'
			),

			't995' => array(
				'value' => 'Y del Campo:'
			),

			't996' => array(
				'value' => 'Tipo del Texto:'
			),

			't997' => array(
				'value' => 'Ancho del Texto:'
			),

			't998' => array(
				'value' => 'Mensaje Ingresado:'
			),

			't999' => array(
				'value' => 'Alineado:'
			),

			't1000' => array(
				'value' => 'X de la Etiqueta:'
			),

			't1001' => array(
				'value' => 'Y de la Etiqueta:'
			),

			't1002' => array(
				'value' => 'X del Campo:'
			),

			't1003' => array(
				'value' => 'Y del Campo:'
			),

			't1004' => array(
				'value' => 'Tipo del Texto:'
			),

			't1005' => array(
				'value' => 'Ancho del Texto:'
			),

			't1006' => array(
				'value' => 'Alineado:'
			),

			't1007' => array(
				'value' => 'X de la Etiqueta:'
			),

			't1008' => array(
				'value' => 'Y de la Etiqueta:'
			),

			't1009' => array(
				'value' => 'X del Campo:'
			),

			't1010' => array(
				'value' => 'Y del Campo:'
			),

			't1011' => array(
				'value' => 'Alineado:'
			),

			't1012' => array(
				'value' => 'X de la Etiqueta'
			),

			't1013' => array(
				'value' => 'Y de la Etiqueta'
			),

			't1014' => array(
				'value' => 'X del Campo'
			),

			't1015' => array(
				'value' => 'Y del Campo'
			),

			't1099' => array(
				'value' => 'Mensaje Ingresado:',
				'hint' => 'si est&aacute; en verdadero, el mensaje aparece si no fue ingresado'
			),

			't1100' => array(
				'value' => 'Mensaje Ingresado:'
			),

			't0' => 'Ingresar Opciones de la Caja',
			't1' => 'Usuario',
			't2' => 'Clave',
			't3' => 'Idioma',
			't4' => 'T&iacute;tulo',
			't5' => 'Haz click Aqu&iacute; para seleccionar un color',
			't6' => 'Si',
			't7' => 'No',
			't8' => 'Guardar Configuraci&oacute;n'
		),

		'cnf_smilies' => array(
			't672' => array(
				'value' => 'Carita:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't673' => array(
				'value' => 'Triste:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't674' => array(
				'value' => 'Gui&ntilde;o:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't675' => array(
				'value' => 'Risa:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't676' => array(
				'value' => 'Colorado:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't677' => array(
				'value' => 'Lengua:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't678' => array(
				'value' => 'Pregunta:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't679' => array(
				'value' => 'Pavor:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't680' => array(
				'value' => 'Beb&eacute;:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't681' => array(
				'value' => 'Cool:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't682' => array(
				'value' => 'Malvado:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't683' => array(
				'value' => 'Sonrisa:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't684' => array(
				'value' => 'Coraz&oacute;n:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't685' => array(
				'value' => 'Beso:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't686' => array(
				'value' => 'NuevaLinea:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't687' => array(
				'value' => 'Ninja:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't688' => array(
				'value' => 'Giro:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't689' => array(
				'value' => 'Ojos Girando:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't690' => array(
				'value' => 'Cuchillada:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't691' => array(
				'value' => 'Durmiendo:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't692' => array(
				'value' => 'Extra&ntilde;ado:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't693' => array(
				'value' => 'Silbido:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't694' => array(
				'value' => 'Maravillado:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't695' => array(
				'value' => 'Llamada:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't696' => array(
				'value' => 'Dinero:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't697' => array(
				'value' => 'Shock:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't698' => array(
				'value' => 'Tilde:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't699' => array(
				'value' => 'Bola:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't700' => array(
				'value' => 'Aplauso:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't701' => array(
				'value' => 'Llanto:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't702' => array(
				'value' => 'Suerte:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't703' => array(
				'value' => 'Nono:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't704' => array(
				'value' => 'Golpe:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't705' => array(
				'value' => 'Calavera:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't706' => array(
				'value' => 'Sip:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't707' => array(
				'value' => 'Yin-Yang:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't708' => array(
				'value' => 'Tierra:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't709' => array(
				'value' => 'Eh?:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't710' => array(
				'value' => 'Hipnosis:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't711' => array(
				'value' => 'Java:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't712' => array(
				'value' => 'No:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't713' => array(
				'value' => 'Lluvia:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't714' => array(
				'value' => 'Rosa:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't715' => array(
				'value' => 'EEUU:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't716' => array(
				'value' => 'Gran Sonrisa:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't717' => array(
				'value' => 'Desmayo:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't718' => array(
				'value' => 'Malos Contenidos:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't719' => array(
				'value' => 'Miau:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't720' => array(
				'value' => 'Dedos Abajo:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't721' => array(
				'value' => 'Dedos Arriba:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't722' => array(
				'value' => 'Ladrido:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't723' => array(
				'value' => 'Cerveza:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't724' => array(
				'value' => 'M&uacute;sica:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't725' => array(
				'value' => 'Leyendo:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't726' => array(
				'value' => 'Burbuja de Palabra:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't727' => array(
				'value' => 'Mujer:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't728' => array(
				'value' => 'Mujer2:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't729' => array(
				'value' => 'Hombre:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't730' => array(
				'value' => 'Hombre2:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't731' => array(
				'value' => 'Administrador:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't732' => array(
				'value' => 'Moderador:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't733' => array(
				'value' => 'Basquet:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't734' => array(
				'value' => 'Bowling:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't735' => array(
				'value' => 'Criquet:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't736' => array(
				'value' => 'F&uacute;tbol Americano:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't737' => array(
				'value' => 'Golf:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't738' => array(
				'value' => 'Hockey:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't739' => array(
				'value' => 'Navegaci&oacute;n:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't740' => array(
				'value' => 'F&uacute;tbol:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't741' => array(
				'value' => 'Tenis:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't742' => array(
				'value' => 'Bandera de Australia:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't743' => array(
				'value' => 'Brasil:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't744' => array(
				'value' => 'Bandera de Canad&aacute;:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't745' => array(
				'value' => 'China:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't746' => array(
				'value' => 'Espa&ntilde;a:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't747' => array(
				'value' => 'Uni&oacute;n Europea:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't748' => array(
				'value' => 'Francia:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't749' => array(
				'value' => 'Alemania:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't750' => array(
				'value' => 'Grecia:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't751' => array(
				'value' => 'Bandera de India:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't752' => array(
				'value' => 'Italia:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't753' => array(
				'value' => 'Jap&oacute;n:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't754' => array(
				'value' => 'Bandera de M&eacute;jico:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't755' => array(
				'value' => 'Bandera de Polonia:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't756' => array(
				'value' => 'Bandera de Portugal:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't757' => array(
				'value' => 'Rusia:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't758' => array(
				'value' => 'Suecia:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't759' => array(
				'value' => 'Bandera de Ucrania:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't760' => array(
				'value' => 'Reino Unido:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't761' => array(
				'value' => 'Mapa de EEUU:',
				'hint' => 'para desactivar cualquier carita, seleccione "Off"'
			),

			't0' => 'On',
			't1' => 'Off'

		),

		'cnf_sound' => array(
			't259' => array(
				'value' => 'Pan Predeterminado:',
				'hint' => 'rango desde -100 hasta 100 (izquierda..derecha)',
				'r' => '(-100 ... 100)'

			),

			't260' => array(
				'value' => 'Volumen Predeterminado:',
				'hint' => 'volumen predeterminao del sonido, en porcentaje',
				'r' => '(0 ... 100)'
			),

			't261' => array(
				'value' => 'Silenciar Todo:',
				'hint' => 'silenciar todas las opciones predeterminadas'
			),

			't262' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't263' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't264' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't265' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't266' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't267' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't268' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't269' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't270' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't271' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't272' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't273' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't274' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't275' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't276' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't277' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't813' => array(
				'value' => 'Sonar Campana:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't814' => array(
				'value' => 'Abandonar Sala:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't815' => array(
				'value' => 'Ingreso de Otro Usuario:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't816' => array(
				'value' => 'Mensaje Recibido:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't817' => array(
				'value' => 'Enviar Mensaje:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't818' => array(
				'value' => 'Abrir/Cerrar Sala:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't819' => array(
				'value' => 'Inicio de Sesi&oacute;n:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't820' => array(
				'value' => 'Desconexi&oacute;n:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't821' => array(
				'value' => 'Abrir/Cerrar Lista:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't822' => array(
				'value' => 'Usuario Banneado/Echado:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't823' => array(
				'value' => 'Invitaci&oacute;n Recibida:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't824' => array(
				'value' => 'Mensaje Privado Recibido:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't825' => array(
				'value' => 'Pasar Mouse sobre Men&uacute; de Usuario:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't826' => array(
				'value' => 'Pop-Up Abierto:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't827' => array(
				'value' => 'Pop-up Cerrado/Minimizado:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't828' => array(
				'value' => 'Ingreso a Sala:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't829' => array(
				'value' => 'Tecla Presionada:',
				'hint' => 'Seleccione Si para activar este sonido o No para desactivarlo'
			),

			't984' => array(
				'hint' => 'Seleccione "Si" para activar este sonido o "No" para desactivarlo'
			),

			't0' => 'Si',
			't1' => 'No',
			't2' => 'Nombre del Sonido',
			't3' => 'Silencio',
			't4' => 'Predeterminado',
			't5' => 'Guardar Configuraci&oacute;n'
		),

		'cnf_theme' => array(
			't278' => array(
				'value' => 'Nombre del Tema:'
			),

			't279' => array(
				'value' => 'Fondo de la pantalla de Di&aacute;logo:'
			),

			't280' => array(
				'value' => 'Imagen de Fondo:'
			),

			't282' => array(
				'value' => 'Mostrar Imagen de Fondo:'
			),

			't283' => array(
				'value' => 'Transparencia de la Interfaz de Usuario:'
			),

			't284' => array(
				'value' => 'Color del T&iacute;tulo de la Ventana de Di&aacute;logo:'
			),

			't285' => array(
				'value' => 'Color de Fondo de la Ventana de Di&aacute;logo:'
			),

			't286' => array(
				'value' => 'Color del Texto de la Sala:'
			),

			't287' => array(
				'value' => 'Color de Fondo de la Lista de Usuarios:'
			),

			't288' => array(
				'value' => 'Color de Fondo de la Sala:'
			),

			't289' => array(
				'value' => 'Color de Notificaci&oacute;n de ingreso a la Sala:'
			),

			't290' => array(
				'value' => 'Color de Texto del Bot&oacute;n:'
			),

			't291' => array(
				'value' => 'Color del Bot&oacute;n:'
			),

			't292' => array(
				'value' => 'Color del Bot&oacute;n Presionado:'
			),

			't293' => array(
				'value' => 'Color del Borde del Bot&oacute;n:'
			),

			't294' => array(
				'value' => 'Color de Fondo del puntero de la Barra:'
			),

			't295' => array(
				'value' => 'Color de Fondo de la Barra:'
			),

			't296' => array(
				'value' => 'Color de Fondo del puntero de la Barra Presionado:'
			),

			't297' => array(
				'value' => 'Color de Fondo de la Caja de Texto:'
			),

			't298' => array(
				'value' => 'Color de Fondo del Log Privado:'
			),

			't299' => array(
				'value' => 'Color de Fondo del Log P&uacute;blico:'
			),

			't300' => array(
				'value' => 'Color del Borde:'
			),

			't301' => array(
				'value' => 'Color del Texto Principal:'
			),

			't302' => array(
				'value' => 'Color del Texto del T&iacute;tulo:'
			),

			't303' => array(
				'value' => 'Color de Fondo:'
			),

			't304' => array(
				'value' => 'Color de Usuario Recomendado:'
			),

			't305' => array(
				'value' => 'Color del Bot&oacute;n Cerrar:'
			),

			't306' => array(
				'value' => 'Color del Bot&oacute;n Cerrar Apretado:'
			),

			't307' => array(
				'value' => 'Color del Borde del Bot&oacute;n Cerrar:'
			),

			't308' => array(
				'value' => 'Color de la Cruz del Bot&oacute;n Cerrar:'
			),

			't309' => array(
				'value' => 'Color del Bot&oacute;n Minimizar:'
			),

			't310' => array(
				'value' => 'Color del Bot&oacute;n Minimizar Apretado:'
			),

			't311' => array(
				'value' => 'Color del Borde del Bot&oacute;n Minimizar:'
			),

			't312' => array(
				'value' => 'Color del Tilde:'
			),

			't313' => array(
				'value' => 'Nombre del Tema:'
			),

			't314' => array(
				'value' => 'Fondo de la Ventana de Di&aacute;logo:'
			),

			't315' => array(
				'value' => 'Imagen de Fondo:'
			),

			't317' => array(
				'value' => 'Mostrar Imagen de Fondo:'
			),

			't318' => array(
				'value' => 'Transparencia de la Interfaz de Usuario:'
			),

			't319' => array(
				'value' => 'Color del T&iacute;tulo de la Ventana de Di&aacute;logo:'
			),

			't320' => array(
				'value' => 'Color de Fondo de la Ventana de Di&aacute;logo:'
			),

			't321' => array(
				'value' => 'Color del Texto de la Sala:'
			),

			't322' => array(
				'value' => 'Color de Fondo de la Sala:'
			),

			't323' => array(
				'value' => 'Color de Fondo de la Lista de Usuarios:'
			),

			't324' => array(
				'value' => 'Color de Notificaci&oacute;n de ingreso a la Sala:'
			),

			't325' => array(
				'value' => 'Color de Texto del Bot&oacute;n:'
			),

			't326' => array(
				'value' => 'Color del Bot&oacute;n:'
			),

			't327' => array(
				'value' => 'Color del Borde del Bot&oacute;n:'
			),

			't328' => array(
				'value' => 'Color de Fondo de la Caja de Texto:'
			),

			't329' => array(
				'value' => 'Color de Fondo del Log Privado:'
			),

			't330' => array(
				'value' => 'Color de Fondo del Log P&uacute;blico:'
			),

			't331' => array(
				'value' => 'Color del Borde:'
			),

			't332' => array(
				'value' => 'Color del Texto Principal:'
			),

			't333' => array(
				'value' => 'Color del Texto del T&iacute;tulo:'
			),

			't334' => array(
				'value' => 'Color de Fondo:'
			),

			't335' => array(
				'value' => 'Color de Usuario Recomendado:'
			),

			't336' => array(
				'value' => 'Color del Bot&oacute;n Cerrar:'
			),

			't337' => array(
				'value' => 'Color del Bot&oacute;n Cerrar Apretado:'
			),

			't338' => array(
				'value' => 'Color del Borde del Bot&oacute;n Cerrar:'
			),

			't339' => array(
				'value' => 'Color de la Cruz del Bot&oacute;n Cerrar:'
			),

			't340' => array(
				'value' => 'Color del Bot&oacute;n Minimizar:'
			),

			't341' => array(
				'value' => 'Color del Bot&oacute;n Minimizar Apretado:'
			),

			't342' => array(
				'value' => 'Color del Borde del Bot&oacute;n Minimizar:'
			),

			't343' => array(
				'value' => 'Color del Tilde:'
			),

			't344' => array(
				'value' => 'Nombre del Tema:'
			),

			't345' => array(
				'value' => 'Fondo de la Ventana de Di&aacute;logo:'
			),

			't346' => array(
				'value' => 'Imagen de Fondo:'
			),

			't348' => array(
				'value' => 'Mostrar Imagen de Fondo:'
			),

			't349' => array(
				'value' => 'Transparencia de la Interfaz de Usuario:'
			),

			't350' => array(
				'value' => 'Color del T&iacute;tulo de la Ventana de Di&aacute;logo:'
			),

			't351' => array(
				'value' => 'Color de Fondo de la Ventana de Di&aacute;logo:'
			),

			't352' => array(
				'value' => 'Color del Texto de la Sala:'
			),

			't353' => array(
				'value' => 'Color de Fondo de la Lista de Usuarios:'
			),

			't354' => array(
				'value' => 'Color de Fondo de la Sala:'
			),

			't355' => array(
				'value' => 'Color de Notificaci&oacute;n de ingreso a la Sala:'
			),

			't356' => array(
				'value' => 'Color de Texto del Bot&oacute;n:'
			),

			't357' => array(
				'value' => 'Color del Bot&oacute;n:'
			),

			't359' => array(
				'value' => 'Color del Borde del Bot&oacute;n:'
			),

			't361' => array(
				'value' => 'Color de Fondo de la Caja de Texto:'
			),

			't362' => array(
				'value' => 'Color de Fondo del Log Privado:'
			),

			't363' => array(
				'value' => 'Color de Fondo del Log P&uacute;blico:'
			),

			't364' => array(
				'value' => 'Color del Borde:'
			),

			't365' => array(
				'value' => 'Color del Texto Principal:'
			),

			't366' => array(
				'value' => 'Color del Texto del T&iacute;tulo:'
			),

			't367' => array(
				'value' => 'Color de Fondo:'
			),

			't368' => array(
				'value' => 'Color de Usuario Recomendado:'
			),

			't369' => array(
				'value' => 'Color del Bot&oacute;n Cerrar:'
			),

			't370' => array(
				'value' => 'Color del Bot&oacute;n Cerrar Apretado:'
			),

			't371' => array(
				'value' => 'Color del Borde del Bot&oacute;n Cerrar:'
			),

			't372' => array(
				'value' => 'Color de la Cruz del Bot&oacute;n Cerrar:'
			),

			't373' => array(
				'value' => 'Color del Bot&oacute;n Minimizar:'
			),

			't374' => array(
				'value' => 'Color del Bot&oacute;n Minimizar Apretado:'
			),

			't375' => array(
				'value' => 'Color del Borde del Bot&oacute;n Minimizar:'
			),

			't376' => array(
				'value' => 'Color del Tilde:'
			),

			't377' => array(
				'value' => 'Nombre del Tema:'
			),

			't378' => array(
				'value' => 'Fondo de la Ventana de Di&aacute;logo:'
			),

			't379' => array(
				'value' => 'Imagen de Fondo:'
			),

			't381' => array(
				'value' => 'Mostrar Imagen de Fondo:'
			),

			't382' => array(
				'value' => 'Transparencia de la Interfaz de Usuario:'
			),

			't383' => array(
				'value' => 'Color del T&iacute;tulo de la Ventana de Di&aacute;logo:'
			),

			't384' => array(
				'value' => 'Color de Fondo de la Ventana de Di&aacute;logo:'
			),

			't385' => array(
				'value' => 'Color del Texto de la Sala:'
			),

			't386' => array(
				'value' => 'Color de Fondo de la Sala:'
			),

			't387' => array(
				'value' => 'Color de Fondo de la Lista de Usuarios:'
			),

			't388' => array(
				'value' => 'Color de Notificaci&oacute;n de ingreso a la Sala:'
			),

			't389' => array(
				'value' => 'Color de Texto del Bot&oacute;n:'
			),

			't390' => array(
				'value' => 'Color del Bot&oacute;n:'
			),

			't391' => array(
				'value' => 'Color del Borde del Bot&oacute;n:'
			),

			't392' => array(
				'value' => 'Color de Fondo de la Caja de Texto:'
			),

			't393' => array(
				'value' => 'Color de Fondo del Log Privado:'
			),

			't394' => array(
				'value' => 'Color de Fondo del Log P&uacute;blico:'
			),

			't395' => array(
				'value' => 'Color del Borde:'
			),

			't396' => array(
				'value' => 'Color del Texto Principal:'
			),

			't397' => array(
				'value' => 'Color del Texto del T&iacute;tulo:'
			),

			't398' => array(
				'value' => 'Color de Fondo:'
			),

			't399' => array(
				'value' => 'Color de Usuario Recomendado:'
			),

			't400' => array(
				'value' => 'Color del Bot&oacute;n Cerrar:'
			),

			't401' => array(
				'value' => 'Color del Bot&oacute;n Cerrar Apretado:'
			),

			't402' => array(
				'value' => 'Color del Borde del Bot&oacute;n Cerrar:'
			),

			't403' => array(
				'value' => 'Color de la Cruz del Bot&oacute;n Cerrar:'
			),

			't404' => array(
				'value' => 'Color del Bot&oacute;n Minimizar:'
			),

			't405' => array(
				'value' => 'Color del Bot&oacute;n Minimizar Apretado:'
			),

			't406' => array(
				'value' => 'Color del Borde del Bot&oacute;n Minimizar:'
			),

			't407' => array(
				'value' => 'Color del Tilde:'
			),

			't408' => array(
				'value' => 'Nombre del Tema:'
			),

			't409' => array(
				'value' => 'Fondo de la Ventana de Di&aacute;logo:'
			),

			't410' => array(
				'value' => 'Imagen de Fondo:'
			),

			't412' => array(
				'value' => 'Mostrar Imagen de Fondo:'
			),

			't413' => array(
				'value' => 'Transparencia de la Interfaz de Usuario:'
			),

			't414' => array(
				'value' => 'Color del T&iacute;tulo de la Ventana de Di&aacute;logo:'
			),

			't415' => array(
				'value' => 'Color de Fondo de la Ventana de Di&aacute;logo:'
			),

			't416' => array(
				'value' => 'Color del Texto de la Sala:'
			),

			't417' => array(
				'value' => 'Color de Fondo de la Sala:'
			),

			't418' => array(
				'value' => 'Color de Fondo de la Lista de Usuarios:'
			),

			't419' => array(
				'value' => 'Color de Notificaci&oacute;n de ingreso a la Sala:'
			),

			't420' => array(
				'value' => 'Color de Texto del Bot&oacute;n:'
			),

			't421' => array(
				'value' => 'Color del Bot&oacute;n:'
			),

			't422' => array(
				'value' => 'Color del Borde del Bot&oacute;n:'
			),

			't423' => array(
				'value' => 'Color de Fondo de la Caja de Texto:'
			),

			't424' => array(
				'value' => 'Color de Fondo del Log Privado:'
			),

			't425' => array(
				'value' => 'Color de Fondo del Log P&uacute;blico:'
			),

			't426' => array(
				'value' => 'Color del Borde:'
			),

			't427' => array(
				'value' => 'Color del Texto Principal:'
			),

			't428' => array(
				'value' => 'Color del Texto del T&iacute;tulo:'
			),

			't429' => array(
				'value' => 'Color de Fondo:'
			),

			't430' => array(
				'value' => 'Color de Usuario Recomendado:'
			),

			't431' => array(
				'value' => 'Color del Bot&oacute;n Cerrar:'
			),

			't432' => array(
				'value' => 'Color del Bot&oacute;n Cerrar Apretado:'
			),

			't433' => array(
				'value' => 'Color del Borde del Bot&oacute;n Cerrar:'
			),

			't434' => array(
				'value' => 'Color de la Cruz del Bot&oacute;n Cerrar:'
			),

			't435' => array(
				'value' => 'Color del Bot&oacute;n Minimizar:'
			),

			't436' => array(
				'value' => 'Color del Bot&oacute;n Minimizar Apretado:'
			),

			't437' => array(
				'value' => 'Color del Borde del Bot&oacute;n Minimizar:'
			),

			't438' => array(
				'value' => 'Color del Tilde:'
			),

			't439' => array(
				'value' => 'Nombre del Tema:'
			),

			't440' => array(
				'value' => 'Fondo de la Ventana de Di&aacute;logo:'
			),

			't441' => array(
				'value' => 'Imagen de Fondo:'
			),

			't443' => array(
				'value' => 'Mostrar Imagen de Fondo:'
			),

			't444' => array(
				'value' => 'Transparencia de la Interfaz de Usuario:'
			),

			't445' => array(
				'value' => 'Color del T&iacute;tulo de la Ventana de Di&aacute;logo:'
			),

			't446' => array(
				'value' => 'Color de Fondo de la Ventana de Di&aacute;logo:'
			),

			't447' => array(
				'value' => 'Color del Texto de la Sala:'
			),

			't448' => array(
				'value' => 'Color de Fondo de la Sala:'
			),

			't449' => array(
				'value' => 'Color de Fondo de la Lista de Usuarios:'
			),

			't450' => array(
				'value' => 'Color de Notificaci&oacute;n de ingreso a la Sala:'
			),

			't451' => array(
				'value' => 'Color de Texto del Bot&oacute;n:'
			),

			't452' => array(
				'value' => 'Color del Bot&oacute;n:'
			),

			't453' => array(
				'value' => 'Color del Borde del Bot&oacute;n:'
			),

			't454' => array(
				'value' => 'Color de Fondo de la Caja de Texto:'
			),

			't455' => array(
				'value' => 'Color de Fondo del Log Privado:'
			),

			't456' => array(
				'value' => 'Color de Fondo del Log P&uacute;blico:'
			),

			't457' => array(
				'value' => 'Color del Borde:'
			),

			't458' => array(
				'value' => 'Color del Texto Principal:'
			),

			't459' => array(
				'value' => 'Color del Texto del T&iacute;tulo:'
			),

			't460' => array(
				'value' => 'Color de Fondo:'
			),

			't461' => array(
				'value' => 'Color de Usuario Recomendado:'
			),

			't462' => array(
				'value' => 'Color del Bot&oacute;n Cerrar:'
			),

			't463' => array(
				'value' => 'Color del Bot&oacute;n Cerrar Apretado:'
			),

			't464' => array(
				'value' => 'Color del Borde del Bot&oacute;n Cerrar:'
			),

			't465' => array(
				'value' => 'Color de la Cruz del Bot&oacute;n Cerrar:'
			),

			't466' => array(
				'value' => 'Color del Bot&oacute;n Minimizar:'
			),

			't467' => array(
				'value' => 'Color del Bot&oacute;n Minimizar Apretado:'
			),

			't468' => array(
				'value' => 'Color del Borde del Bot&oacute;n Minimizar:'
			),

			't469' => array(
				'value' => 'Color del Tilde:'
			),

			't470' => array(
				'value' => 'Nombre del Tema:'
			),

			't471' => array(
				'value' => 'Fondo de la Ventana de Di&aacute;logo:'
			),

			't472' => array(
				'value' => 'Imagen de Fondo:'
			),

			't474' => array(
				'value' => 'Mostrar Imagen de Fondo:'
			),

			't475' => array(
				'value' => 'Transparencia de la Interfaz de Usuario:'
			),

			't476' => array(
				'value' => 'Color del T&iacute;tulo de la Ventana de Di&aacute;logo:'
			),

			't477' => array(
				'value' => 'Color de Fondo de la Ventana de Di&aacute;logo:'
			),

			't478' => array(
				'value' => 'Color del Texto de la Sala:'
			),

			't479' => array(
				'value' => 'Color de Fondo de la Sala:'
			),

			't480' => array(
				'value' => 'Color de Fondo de la Lista de Usuarios:'
			),

			't481' => array(
				'value' => 'Color de Notificaci&oacute;n de ingreso a la Sala:'
			),

			't482' => array(
				'value' => 'Color de Texto del Bot&oacute;n:'
			),

			't483' => array(
				'value' => 'Color del Bot&oacute;n:'
			),

			't484' => array(
				'value' => 'Color del Borde del Bot&oacute;n:'
			),

			't485' => array(
				'value' => 'Color de Fondo de la Caja de Texto:'
			),

			't486' => array(
				'value' => 'Color de Fondo del Log Privado:'
			),

			't487' => array(
				'value' => 'Color de Fondo del Log P&uacute;blico:'
			),

			't488' => array(
				'value' => 'Color del Borde:'
			),

			't489' => array(
				'value' => 'Color del Texto Principal:'
			),

			't490' => array(
				'value' => 'Color del Texto del T&iacute;tulo:'
			),

			't491' => array(
				'value' => 'Color de Fondo:'
			),

			't492' => array(
				'value' => 'Color de Usuario Recomendado:'
			),

			't493' => array(
				'value' => 'Color del Bot&oacute;n Cerrar:'
			),

			't494' => array(
				'value' => 'Color del Bot&oacute;n Cerrar Apretado:'
			),

			't495' => array(
				'value' => 'Color del Borde del Bot&oacute;n Cerrar:'
			),

			't496' => array(
				'value' => 'Color de la Cruz del Bot&oacute;n Cerrar:'
			),

			't497' => array(
				'value' => 'Color del Bot&oacute;n Minimizar:'
			),

			't498' => array(
				'value' => 'Color del Bot&oacute;n Minimizar Apretado:'
			),

			't499' => array(
				'value' => 'Color del Borde del Bot&oacute;n Minimizar:'
			),

			't500' => array(
				'value' => 'Color del Tilde:'
			),

			't501' => array(
				'value' => 'Nombre del Tema:'
			),

			't502' => array(
				'value' => 'Fondo de la Ventana de Di&aacute;logo:'
			),

			't503' => array(
				'value' => 'Imagen de Fondo:'
			),

			't505' => array(
				'value' => 'Mostrar Imagen de Fondo:'
			),

			't506' => array(
				'value' => 'Transparencia de la Interfaz de Usuario:'
			),

			't507' => array(
				'value' => 'Color del T&iacute;tulo de la Ventana de Di&aacute;logo:'
			),

			't508' => array(
				'value' => 'Color de Fondo de la Ventana de Di&aacute;logo:'
			),

			't509' => array(
				'value' => 'Color del Texto de la Sala:'
			),

			't510' => array(
				'value' => 'Color de Fondo de la Sala:'
			),

			't511' => array(
				'value' => 'Color de Fondo de la Lista de Usuarios:'
			),

			't512' => array(
				'value' => 'Color de Notificaci&oacute;n de ingreso a la Sala:'
			),

			't513' => array(
				'value' => 'Color de Texto del Bot&oacute;n:'
			),

			't514' => array(
				'value' => 'Color del Bot&oacute;n:'
			),

			't515' => array(
				'value' => 'Color del Borde del Bot&oacute;n:'
			),

			't516' => array(
				'value' => 'Color de Fondo de la Caja de Texto:'
			),

			't517' => array(
				'value' => 'Color de Fondo del Log Privado:'
			),

			't518' => array(
				'value' => 'Color de Fondo del Log P&uacute;blico:'
			),

			't519' => array(
				'value' => 'Color del Borde:'
			),

			't520' => array(
				'value' => 'Color del Texto Principal:'
			),

			't521' => array(
				'value' => 'Color del Texto del T&iacute;tulo:'
			),

			't522' => array(
				'value' => 'Color de Fondo:'
			),

			't523' => array(
				'value' => 'Color de Usuario Recomendado:'
			),

			't524' => array(
				'value' => 'Color del Bot&oacute;n Cerrar:'
			),

			't525' => array(
				'value' => 'Color del Bot&oacute;n Cerrar Apretado:'
			),

			't526' => array(
				'value' => 'Color del Borde del Bot&oacute;n Cerrar:'
			),

			't527' => array(
				'value' => 'Color de la Cruz del Bot&oacute;n Cerrar:'
			),

			't528' => array(
				'value' => 'Color del Bot&oacute;n Minimizar:'
			),

			't529' => array(
				'value' => 'Color del Bot&oacute;n Minimizar Apretado:'
			),

			't530' => array(
				'value' => 'Color del Borde del Bot&oacute;n Minimizar:'
			),

			't531' => array(
				'value' => 'Color del Tilde:'
			),

			't532' => array(
				'value' => 'Nombre del Tema:'
			),

			't533' => array(
				'value' => 'Fondo de la Ventana de Di&aacute;logo:'
			),

			't534' => array(
				'value' => 'Imagen de Fondo:'
			),

			't536' => array(
				'value' => 'Mostrar Imagen de Fondo:'
			),

			't537' => array(
				'value' => 'Transparencia de la Interfaz de Usuario:'
			),

			't538' => array(
				'value' => 'Color del T&iacute;tulo de la Ventana de Di&aacute;logo:'
			),

			't539' => array(
				'value' => 'Color de Fondo de la Ventana de Di&aacute;logo:'
			),

			't540' => array(
				'value' => 'Color del Texto de la Sala:'
			),

			't541' => array(
				'value' => 'Color de Fondo de la Sala:'
			),

			't542' => array(
				'value' => 'Color de Fondo de la Lista de Usuarios:'
			),

			't543' => array(
				'value' => 'Color de Notificaci&oacute;n de ingreso a la Sala:'
			),

			't544' => array(
				'value' => 'Color de Texto del Bot&oacute;n:'
			),

			't545' => array(
				'value' => 'Color del Bot&oacute;n:'
			),

			't546' => array(
				'value' => 'Color del Borde del Bot&oacute;n:'
			),

			't547' => array(
				'value' => 'Color de Fondo de la Caja de Texto:'
			),

			't548' => array(
				'value' => 'Color de Fondo del Log Privado:'
			),

			't549' => array(
				'value' => 'Color de Fondo del Log P&uacute;blico:'
			),

			't550' => array(
				'value' => 'Color del Borde:'
			),

			't551' => array(
				'value' => 'Color del Texto Principal:'
			),

			't552' => array(
				'value' => 'Color del Texto del T&iacute;tulo:'
			),

			't553' => array(
				'value' => 'Color de Fondo:'
			),

			't554' => array(
				'value' => 'Color de Usuario Recomendado:'
			),

			't555' => array(
				'value' => 'Color del Bot&oacute;n Cerrar:'
			),

			't556' => array(
				'value' => 'Color del Bot&oacute;n Cerrar Apretado:'
			),

			't557' => array(
				'value' => 'Color del Borde del Bot&oacute;n Cerrar:'
			),

			't558' => array(
				'value' => 'Color de la Cruz del Bot&oacute;n Cerrar:'
			),

			't559' => array(
				'value' => 'Color del Bot&oacute;n Minimizar:'
			),

			't560' => array(
				'value' => 'Color del Bot&oacute;n Minimizar Apretado:'
			),

			't561' => array(
				'value' => 'Color del Borde del Bot&oacute;n Minimizar:'
			),

			't562' => array(
				'value' => 'Color del Tilde:'
			),

			't563' => array(
				'value' => 'Nombre del Tema:'
			),

			't564' => array(
				'value' => 'Fondo de la Ventana de Di&aacute;logo:'
			),

			't565' => array(
				'value' => 'Imagen de Fondo:'
			),

			't567' => array(
				'value' => 'Mostrar Imagen de Fondo:'
			),

			't568' => array(
				'value' => 'Transparencia de la Interfaz de Usuario:'
			),

			't569' => array(
				'value' => 'Color del T&iacute;tulo de la Ventana de Di&aacute;logo:'
			),

			't570' => array(
				'value' => 'Color de Fondo de la Ventana de Di&aacute;logo:'
			),

			't571' => array(
				'value' => 'Color del Texto de la Sala:'
			),

			't572' => array(
				'value' => 'Color de Fondo de la Sala:'
			),

			't573' => array(
				'value' => 'Color de Fondo de la Lista de Usuarios:'
			),

			't574' => array(
				'value' => 'Color de Notificaci&oacute;n de ingreso a la Sala:'
			),

			't575' => array(
				'value' => 'Color de Texto del Bot&oacute;n:'
			),

			't576' => array(
				'value' => 'Color del Bot&oacute;n:'
			),

			't577' => array(
				'value' => 'Color del Borde del Bot&oacute;n:'
			),

			't578' => array(
				'value' => 'Color de Fondo de la Caja de Texto:'
			),

			't579' => array(
				'value' => 'Color de Fondo del Log Privado:'
			),

			't580' => array(
				'value' => 'Color de Fondo del Log P&uacute;blico:'
			),

			't581' => array(
				'value' => 'Color del Borde:'
			),

			't582' => array(
				'value' => 'Color del Texto Principal:'
			),

			't583' => array(
				'value' => 'Color del Texto del T&iacute;tulo:'
			),

			't584' => array(
				'value' => 'Color de Fondo:'
			),

			't585' => array(
				'value' => 'Color de Usuario Recomendado:'
			),

			't586' => array(
				'value' => 'Color del Bot&oacute;n Cerrar:'
			),

			't587' => array(
				'value' => 'Color del Bot&oacute;n Cerrar Apretado:'
			),

			't588' => array(
				'value' => 'Color del Borde del Bot&oacute;n Cerrar:'
			),

			't589' => array(
				'value' => 'Color de la Cruz del Bot&oacute;n Cerrar:'
			),

			't590' => array(
				'value' => 'Color del Bot&oacute;n Minimizar:'
			),

			't591' => array(
				'value' => 'Color del Bot&oacute;n Minimizar Apretado:'
			),

			't592' => array(
				'value' => 'Color del Borde del Bot&oacute;n Minimizar:'
			),

			't593' => array(
				'value' => 'Color del Tilde:'
			),

			't594' => array(
				'value' => 'Nombre del Tema:'
			),

			't595' => array(
				'value' => 'Fondo de la Ventana de Di&aacute;logo:'
			),

			't596' => array(
				'value' => 'Imagen de Fondo:'
			),

			't598' => array(
				'value' => 'Mostrar Imagen de Fondo:'
			),

			't599' => array(
				'value' => 'Transparencia de la Interfaz de Usuario:'
			),

			't600' => array(
				'value' => 'Color del T&iacute;tulo de la Ventana de Di&aacute;logo:'
			),

			't601' => array(
				'value' => 'Color de Fondo de la Ventana de Di&aacute;logo:'
			),

			't602' => array(
				'value' => 'Color del Texto de la Sala:'
			),

			't603' => array(
				'value' => 'Color de Fondo de la Sala:'
			),

			't604' => array(
				'value' => 'Color de Fondo de la Lista de Usuarios:'
			),

			't605' => array(
				'value' => 'Color de Notificaci&oacute;n de ingreso a la Sala:'
			),

			't606' => array(
				'value' => 'Color de Texto del Bot&oacute;n:'
			),

			't607' => array(
				'value' => 'Color del Bot&oacute;n:'
			),

			't608' => array(
				'value' => 'Color del Borde del Bot&oacute;n:'
			),

			't609' => array(
				'value' => 'Color de Fondo de la Caja de Texto:'
			),

			't610' => array(
				'value' => 'Color de Fondo del Log Privado:'
			),

			't611' => array(
				'value' => 'Color de Fondo del Log P&uacute;blico:'
			),

			't612' => array(
				'value' => 'Color del Borde:'
			),

			't613' => array(
				'value' => 'Color del Texto Principal:'
			),

			't614' => array(
				'value' => 'Color del Texto del T&iacute;tulo:'
			),

			't615' => array(
				'value' => 'Color de Fondo:'
			),

			't616' => array(
				'value' => 'Color de Usuario Recomendado:'
			),

			't617' => array(
				'value' => 'Color del Bot&oacute;n Cerrar:'
			),

			't618' => array(
				'value' => 'Color del Bot&oacute;n Cerrar Apretado:'
			),

			't619' => array(
				'value' => 'Color del Borde del Bot&oacute;n Cerrar:'
			),

			't620' => array(
				'value' => 'Color de la Cruz del Bot&oacute;n Cerrar:'
			),

			't621' => array(
				'value' => 'Color del Bot&oacute;n Minimizar:'
			),

			't622' => array(
				'value' => 'Color del Bot&oacute;n Minimizar Apretado:'
			),

			't623' => array(
				'value' => 'Color del Borde del Bot&oacute;n Minimizar:'
			),

			't624' => array(
				'value' => 'Color del Tilde:'
			),

			't1016' => array(
				'value' => 'Fondo de los Controles'
			),

			't1017' => array(
				'value' => 'Texto de Cabecera'
			),

			't1018' => array(
				'value' => 'Borde del Puntero de la Barra'
			),

			't1019' => array(
				'value' => 'Item de la Lista de Usuarios'
			),

			't1020' => array(
				'value' => 'Bot&oacute;n Presionado'
			),

			't1021' => array(
				'value' => 'Fondo de los Controles'
			),

			't1022' => array(
				'value' => 'Texto de Cabecera'
			),

			't1023' => array(
				'value' => 'Fondo del Puntero de la Barra'
			),

			't1024' => array(
				'value' => 'Fondo del Puntero de la Barra Presionado'
			),

			't1025' => array(
				'value' => 'Borde del Puntero de la Barra'
			),

			't1026' => array(
				'value' => 'Fondo de la Barra'
			),

			't1027' => array(
				'value' => 'Item de la Lista de Usuarios'
			),

			't1028' => array(
				'value' => 'Fondo de los Controles'
			),

			't1029' => array(
				'value' => 'Texto de Cabecera'
			),

			't1030' => array(
				'value' => 'Fondo del Puntero de la Barra'
			),

			't1031' => array(
				'value' => 'Fondo del Puntero de la Barra Presionado'
			),

			't1032' => array(
				'value' => 'Borde del Puntero de la Barra'
			),

			't1033' => array(
				'value' => 'Item de la Lista de Usuarios'
			),

			't1034' => array(
				'value' => 'Bot&oacute;n Presionado'
			),

			't1035' => array(
				'value' => 'Fondo de los Controles'
			),

			't1036' => array(
				'value' => 'Texto de Cabecera'
			),

			't1037' => array(
				'value' => 'Fondo del Puntero de la Barra'
			),

			't1038' => array(
				'value' => 'Fondo del Puntero de la Barra Presionado'
			),

			't1039' => array(
				'value' => 'Borde del Puntero de la Barra'
			),

			't1040' => array(
				'value' => 'Fondo de la Barra'
			),

			't1041' => array(
				'value' => 'Item de la Lista de Usuarios'
			),

			't1042' => array(
				'value' => 'Bot&oacute;n Presionado'
			),

			't1043' => array(
				'value' => 'Fondo de los Controles'
			),

			't1044' => array(
				'value' => 'Texto de Cabecera'
			),

			't1045' => array(
				'value' => 'Fondo del Puntero de la Barra'
			),

			't1046' => array(
				'value' => 'Fondo del Puntero de la Barra Presionado'
			),

			't1047' => array(
				'value' => 'Borde del Puntero de la Barra'
			),

			't1048' => array(
				'value' => 'Fondo de la Barra'
			),

			't1049' => array(
				'value' => 'Item de la Lista de Usuarios'
			),

			't1050' => array(
				'value' => 'Bot&oacute;n Presionado'
			),

			't1051' => array(
				'value' => 'Fondo de los Controles'
			),

			't1052' => array(
				'value' => 'Texto de Cabecera'
			),

			't1053' => array(
				'value' => 'Fondo del Puntero de la Barra'
			),

			't1054' => array(
				'value' => 'Fondo del Puntero de la Barra Presionado'
			),

			't1055' => array(
				'value' => 'Borde del Puntero de la Barra'
			),

			't1056' => array(
				'value' => 'Fondo de la Barra'
			),

			't1057' => array(
				'value' => 'Item de la Lista de Usuarios'
			),

			't1058' => array(
				'value' => 'Bot&oacute;n Presionado'
			),

			't1059' => array(
				'value' => 'Fondo de los Controles'
			),

			't1060' => array(
				'value' => 'Texto de Cabecera'
			),

			't1061' => array(
				'value' => 'Fondo del Puntero de la Barra'
			),

			't1062' => array(
				'value' => 'Fondo del Puntero de la Barra Presionado'
			),

			't1063' => array(
				'value' => 'Borde del Puntero de la Barra'
			),

			't1064' => array(
				'value' => 'Fondo de la Barra'
			),

			't1065' => array(
				'value' => 'Item de la Lista de Usuarios'
			),

			't1066' => array(
				'value' => 'Bot&oacute;n Presionado'
			),

			't1067' => array(
				'value' => 'Fondo de los Controles'
			),

			't1068' => array(
				'value' => 'Texto de Cabecera'
			),

			't1069' => array(
				'value' => 'Fondo del Puntero de la Barra'
			),

			't1070' => array(
				'value' => 'Fondo del Puntero de la Barra Presionado'
			),

			't1071' => array(
				'value' => 'Borde del Puntero de la Barra'
			),

			't1072' => array(
				'value' => 'Fondo de la Barra'
			),

			't1073' => array(
				'value' => 'Item de la Lista de Usuarios'
			),

			't1074' => array(
				'value' => 'Bot&oacute;n Presionado'
			),

			't1075' => array(
				'value' => 'Fondo de los Controles'
			),

			't1076' => array(
				'value' => 'Texto de Cabecera'
			),

			't1077' => array(
				'value' => 'Fondo del Puntero de la Barra'
			),

			't1078' => array(
				'value' => 'Fondo del Puntero de la Barra Presionado'
			),

			't1079' => array(
				'value' => 'Borde del Puntero de la Barra'
			),

			't1080' => array(
				'value' => 'Fondo de la Barra'
			),

			't1081' => array(
				'value' => 'Item de la Lista de Usuarios'
			),

			't1082' => array(
				'value' => 'Bot&oacute;n Presionado'
			),

			't1083' => array(
				'value' => 'Fondo de los Controles'
			),

			't1084' => array(
				'value' => 'Texto de Cabecera'
			),

			't1085' => array(
				'value' => 'Fondo del Puntero de la Barra'
			),

			't1086' => array(
				'value' => 'Fondo del Puntero de la Barra Presionado'
			),

			't1087' => array(
				'value' => 'Borde del Puntero de la Barra'
			),

			't1088' => array(
				'value' => 'Fondo de la Barra'
			),

			't1089' => array(
				'value' => 'Item de la Lista de Usuarios'
			),

			't1090' => array(
				'value' => 'Bot&oacute;n Presionado'
			),

			't1091' => array(
				'value' => 'Fondo de los Controles'
			),

			't1092' => array(
				'value' => 'Texto de Cabecera'
			),

			't1093' => array(
				'value' => 'Fondo del Puntero de la Barra'
			),

			't1094' => array(
				'value' => 'Fondo del Puntero de la Barra Presionado'
			),

			't1095' => array(
				'value' => 'Borde del Puntero de la Barra'
			),

			't1096' => array(
				'value' => 'Fondo de la Barra'
			),

			't1097' => array(
				'value' => 'Item de la Lista de Usuarios'
			),

			't1113' => array(
				'value' => 'Color del Bot&oacute;n Presionado:'
			),

			't1114' => array(
				'value' => 'Color de Fondo del puntero de la Barra:'
			),

			't1118' => array(
				'value' => 'Nombre del Tema:'
			),

			't1119' => array(
				'value' => 'Fondo de la Ventana de Di&aacute;logo:'
			),

			't1120' => array(
				'value' => 'Imagen de Fondo:'
			),

			't1122' => array(
				'value' => 'Mostrar Imagen de Fondo:'
			),

			't1123' => array(
				'value' => 'Transparencia de la Interfaz de Usuario:'
			),

			't1124' => array(
				'value' => 'Color del T&iacute;tulo de la Ventana de Di&aacute;logo:'
			),

			't1125' => array(
				'value' => 'Color de Fondo de la Ventana de Di&aacute;logo:'
			),

			't1126' => array(
				'value' => 'Color del Texto de la Sala:'
			),

			't1127' => array(
				'value' => 'Color de Fondo de la Sala:'
			),

			't1128' => array(
				'value' => 'Color de Fondo de la Lista de Usuarios:'
			),

			't1129' => array(
				'value' => 'Color de Notificaci&oacute;n de ingreso a la Sala:'
			),

			't1130' => array(
				'value' => 'Color de Texto del Bot&oacute;n:'
			),

			't1131' => array(
				'value' => 'Color del Bot&oacute;n:'
			),

			't1132' => array(
				'value' => 'Color del Borde del Bot&oacute;n:'
			),

			't1133' => array(
				'value' => 'Color de Fondo de la Caja de Texto:'
			),

			't1134' => array(
				'value' => 'Color de Fondo del Log Privado:'
			),

			't1135' => array(
				'value' => 'Color de Fondo del Log P&uacute;blico:'
			),

			't1136' => array(
				'value' => 'Color del Borde:'
			),

			't1137' => array(
				'value' => 'Color del Texto Principal:'
			),

			't1138' => array(
				'value' => 'Color del Texto del T&iacute;tulo:'
			),

			't1139' => array(
				'value' => 'Color de Fondo:'
			),

			't1140' => array(
				'value' => 'Color de Usuario Recomendado:'
			),

			't1141' => array(
				'value' => 'Color del Bot&oacute;n Cerrar:'
			),

			't1142' => array(
				'value' => 'Color del Bot&oacute;n Cerrar Apretado:'
			),

			't1143' => array(
				'value' => 'Color del Borde del Bot&oacute;n Cerrar:'
			),

			't1144' => array(
				'value' => 'Color de la Cruz del Bot&oacute;n Cerrar:'
			),

			't1145' => array(
				'value' => 'Color del Bot&oacute;n Minimizar:'
			),

			't1146' => array(
				'value' => 'Color del Bot&oacute;n Minimizar Apretado:'
			),

			't1147' => array(
				'value' => 'Color del Borde del Bot&oacute;n Minimizar:'
			),

			't1148' => array(
				'value' => 'Color del Tilde:'
			),

			't1149' => array(
				'value' => 'Bot&oacute;n Presionado'
			),

			't1150' => array(
				'value' => 'Fondo de los Controles'
			),

			't1151' => array(
				'value' => 'L&iacute;nea de Encabezado'
			),

			't1152' => array(
				'value' => 'Color del Fondo de la Barra'
			),

			't1153' => array(
				'value' => 'Color del Fondo de la Barra Presionada'
			),

			't1154' => array(
				'value' => 'Color del Borde de la Barra'
			),

			't1155' => array(
				'value' => 'Color del Fondo de la Barra'
			),

			't1156' => array(
				'value' => 'Item de la Lista de Usuarios'
			),

			't1157' => array(
				'value' => 'Nombre del Tema:'
			),

			't1158' => array(
				'value' => 'Fondo de la Pantalla de Di&aacute;logo:'
			),

			't1159' => array(
				'value' => 'Imagen de Fondo:'
			),

			't1161' => array(
				'value' => 'Mostrar Imagen de Fondo:'
			),

			't1162' => array(
				'value' => 'Tranparencia de la Interfaz de Usuario:'
			),

			't1163' => array(
				'value' => 'Color del T&iacute;tulo de la Pantalla de Di&aacute;logo:'
			),

			't1164' => array(
				'value' => 'Color del Fondo de las Pantallas de Di&aacute;logo:'
			),

			't1165' => array(
				'value' => 'Color del Texto de la Sala:'
			),

			't1166' => array(
				'value' => 'Color de Fondo de la Lista de Usuarios:'
			),

			't1167' => array(
				'value' => 'Color de Fondo de la Sala:'
			),

			't1168' => array(
				'value' => 'Color de Notificaci&oacute;n de Ingreso a la Sala:'
			),

			't1169' => array(
				'value' => 'Color del Texto del Bot&oacute;n:'
			),

			't1170' => array(
				'value' => 'Color del Bot&oacute;n:'
			),

			't1171' => array(
				'value' => 'Color del Borde del Bot&oacute;n Apretado:'
			),

			't1172' => array(
				'value' => 'Color del Borde del Bot&oacute;n:'
			),

			't1173' => array(
				'value' => 'Color de Fondo de la Barra:'
			),

			't1174' => array(
				'value' => 'Color de Fondo de la Caja de Texto:'
			),

			't1175' => array(
				'value' => 'Color de Fondo Privado:'
			),

			't1176' => array(
				'value' => 'Color de Fondo P&uacute;blico:'
			),

			't1177' => array(
				'value' => 'Color del Borde:'
			),

			't1178' => array(
				'value' => 'Color del Texto Principal:'
			),

			't1179' => array(
				'value' => 'Color del Texto del T&iacute;tulo:'
			),

			't1180' => array(
				'value' => 'Color de Fondo:'
			),

			't1181' => array(
				'value' => 'Color de Usuario Recomendado:'
			),

			't1182' => array(
				'value' => 'Color del Bot&oacute;n Minimizar:'
			),

			't1183' => array(
				'value' => 'Color del Bot&oacute;n Cerrar Apretado:'
			),

			't1184' => array(
				'value' => 'Color del Borde del Bot&oacute;n Cerrar:'
			),

			't1185' => array(
				'value' => 'Color de la Cruz del Bot&oacute;n Cerrar:'
			),

			't1186' => array(
				'value' => 'Color del Bot&oacute;n Minimizar:'
			),

			't1187' => array(
				'value' => 'Color del Bot&oacute;n Minimizar Apretado:'
			),

			't1188' => array(
				'value' => 'Color del Borde del Bot&oacute;n Minimizar:'
			),

			't1189' => array(
				'value' => 'Color del Tilde:'
			),

			't0' => 'Imagen de fondo para el tema:',
			't1' => 'Subir',
			't2' => 'Agregar un nuevo Tema',
			't3' => 'Cambiar configuraci&oacute;n para:',
			't4' => 'Este Tema',
			't5' => 'Nombre del nuevo Tema:',
			't6' => 'Estos Temas',
			't7' => 'Si',
			't8' => 'No',
			't9' => 'Haz click aqu&iacute; para elegir el color',
			't10' => 'Ver',
			't11' => 'Guardar Configuraci&oacute;n'
		),

		'cnf_list' => array(
			't0' => 'Si',
			't1' => 'No',
			't2' => 'Guardar Configuraci&oacute;n'
		),

		'cnf_languages' => array(
			't0' => 'Ordenar',
			't1' => 'Nombre del Archivo',
			't2' => 'Bump up'
		)
	);
?>