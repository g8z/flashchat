<?php
	$GLOBALS['fc_config']['languages']['ru'] = array(
		'name' => "Русский",

		'messages' => array(
			'ignored' => "Пользователь 'USER_LABEL' игнорирует Ваши сообщения",
			'banned' => "Вас забанили",
			'login' => 'Пожалуйста, зарегистрируйтесь',
			'wrongPass' => 'Неправильное имя пользователя или пароль. Пожалуйста, попробуйте снова.',
			'anotherlogin' => 'Другой пользователь вошел в чат под этим именем пользователя. Чтобы продолжить пользование чатом введите имя пользователя и пароль еще раз.',
			'expiredlogin' => 'Ваша чат сессия была закрыта. Чтобы продолжить пользование чатом введите имя пользователя и пароль еще раз.',
			'enterroom' => "[ROOM_LABEL]: пользователь USER_LABEL вошел в TIMESTAMP",
			'leaveroom' => "[ROOM_LABEL]: Пользователь USER_LABEL ушел в TIMESTAMP",
			'selfenterroom' => "Вы вошли в комнату [ROOM_LABEL] в TIMESTAMP",
			'bellrang' => 'USER_LABEL звонит в звонок',
			'chatfull' => 'Чат занят. Пожалуйста попробуйте позднее.',
			'iplimit' => 'Вы уже зарегистрированы в чате.'
		),

		'usermenu' => array(
			'profile' => "Данные пользователя",
			'unban' => "Снять бан",
			'ban' => "Забанить",
			'unignore' => "Снять игнорирование",
			'fileshare' => 'Отослать файл',
			'ignore' => "Проигнорировать",
			'invite' => "Пригласить",
			'privatemessage' => "Приватное сообщение",
		),

		'status' => array(
			'away' => "Отошел",
			'busy' => "Занят",
			'here' => "Тут",
			'brb'  => 'BRB',
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "Комната 'ROOM_LABEL' не найдена",
				'usernotfound' => "Пользователь 'USER_LABEL' не найден",
				'unbanned' => "Пользователь 'USER_LABEL' снял с Вас бан",
				'banned' => "Пользователь 'USER_LABEL' забанил Вас",
				'unignored' => "Пользователь 'USER_LABEL' снял с Вас игнорирование",
				'ignored' => "Пользователь 'USER_LABEL' игнорирует ваши сообщения",
				'invitationdeclined' => "Пользователь 'USER_LABEL' отклонил Ваше приглашение в комнату 'ROOM_LABEL'",
				'invitationaccepted' => "Пользователь 'USER_LABEL' принял Ваше приглашение в комнату 'ROOM_LABEL'",
				'roomnotcreated' => "Комната не была создана",

				'roomisfull' => 'В комнате [ROOM_LABEL] нету свободного места. Пожалуйста виберите другую комнату.',
				'alert' => '<b>Внимание!</b><br><br>',
				'chatalert' => '<b>Внимание!</b><br><br>',
				'gag' => "<b>Вы отстронены на DURATION минут(у)!</b><br><br>Вы можете читать сообщения, но не можете отвечать на них пока действует отстроние.",
				'ungagged' => "Ви опять допущены к чату пользователем 'USER_LABEL'",		 
				'gagconfirm' => 'Ползователь USER_LABEL отстронен на MINUTES минут(у).',
				'alertconfirm' => 'USER_LABEL прочел предупреждение.',
				'file_declined' => 'Ползователь USER_LABEL не желает принять ваш файл.',
				'file_accepted' => 'Ползователь USER_LABEL принял ваш файл.',
			),

			'unignore' => array(
				'unignoreBtn' => "Снять игнорирование",
				'unignoretext' => "Пояснение",
			),

			'unban' => array(
				'unbanBtn' => "Снять бан",
				'unbantext' => "Пояснение",
			),
			
			'tablabels' => array(
				'themes' => "Темы",
				'sounds' => "Звуки",
				'text'  => "Текст",
				'effects'  => 'Еффекты',
				'admin'  => "Админ",
				'about' => 'Про нас',

			),
					
			'text' => array(
				'itemChange' => "Елемент к изменению",
				'fontSize' => "Размер шрифта",
				'fontFamily' => "Шрифт",
				'language' => "Язык",
				'mainChat' => "Окно чата",
				'interfaceElements' => "Елементы управления",
				'title' => "Заголовок",
				'mytextcolor' => 'Использовать мой цвет текста для новых сообщений.',
			),


			'effects' => array(
				'avatars' => 'Аватар',
				'mainchat' => 'Окно чата',
				'roomlist' => 'Список комнат',
				'background' => 'Фон',
				'custom' => 'Другой...',
				'showBackgroundImages' => "Показывать фоновый рисунок",
				'uiAlpha' => "Прозрачность",
				'splashWindow' => 'Активировать окно браузера, когда новое сообщение пришло.',
			),
			
			'sound' => array(
				'sampleBtn' => "Тест",
				'testBtn' => "Тест",
				'muteall' => "Выключить все звуки",
				'submitmessage' => "Отправка сообщения",
				'reveivemessage' => "Получение сообщения",
				'enterroom' => "Вход в комнату",
				'leaveroom' => "Выход из комнаты",
				'pan' => "Баланс",
				'volume' => "Громкость",
			
				'initiallogin' => "Вход в чат",
				'logout' => "Выход из чата",
				'privatemessagereceived' => "Получено приватное сообщение",
				'invitationreceived' => "Получено приглашение",
				'combolistopenclose' => "Открыть/закрыть список",
				'userbannedbooted' => "Пользователь забанен или загружен",
				'usermenumouseover' => "Курсор над меню пользователя",
				'roomopenclose' => "Открыть/закрыть комнату",
				'popupwindowopen' => "Открытие окна",
				'popupwindowclosemin' => "Закрытие окна",
				'pressbutton' => "Нажатие клавиши",
				'otheruserenters' => "Другой пользователь вошел в комнату",
			),

			'skin' => array(
				'inputBoxBackground' => "Фон поля ввода",
				'privateLogBackground' => "Фон списка приватных сообщений",
				'publicLogBackground' => "Фон списка публичных сообщений",
				'enterRoomNotify' => "Системные сообщения",
				'roomText' => "Заголовок комнаты",
				'room' => "Фон комнаты",
				'userListBackground' => "Фон списка пользователей",
				'dialogTitle' => "Заголовок диалогов",
				'dialog' => "Фон диалогов",
				'buttonText' => "Текст кнопок",
				'button' => "Фон кнопок",
				'borderColor' => "Кайма",
				'bodyText' => "Текст главного окна",
				'background' => "Фон главного окна",
				'selectskin' => "Выберите цветовую тему...",
				'buttonBorder' => "Кайма кнопок",
				'selectBigSkin' => "Выберите тему...",
				'titleText' => "Заголовок"
			),

			'privateBox' => array(
				'sendBtn' => "Послать",
				'toUser' => "Чат с USER_LABEL:",
			),

			'login' => array(
				'loginBtn' => "Войти в систему",
				'language' => "Язык:",
				'moderator' => "(для модератора)",
				'password' => "Пароль:",
				'username' => "Имя пользователя:",
			),

			'invitenotify' => array(
				'declineBtn' => "Отклонить",
				'acceptBtn' => "Принять",
				'userinvited' => "Пользователь 'USER_LABEL' пригласил Вас в комнату 'ROOM_LABEL'",
			),

			'invite' => array(
				'sendBtn' => "Отправить",
				'includemessage' => "Пояснение:",
				'inviteto' => "Пригласить в:",
			),

			'ignore' => array(
				'ignoreBtn' => "Проигнорировать",
				'ignoretext' => "Пояснение",
			),

			'createroom' => array(
				'createBtn' => "Создать",
				'private' => "Приватная",
				'public' => "Публичная",
				'entername' => "Имя комнаты",
			),

			'ban' => array(
				'banBtn' => "Забанить",
				'byIP' => "по IP",
				'fromChat' => "из чата",
				'fromRoom' => "из комнаты",
				'banText' => "Пояснение",
			),

			'common' => array(
				'cancelBtn' => "Отмена",
				'okBtn' => "OK",
				
				'win_choose'         => 'Виберите файл для загрузки:',
				'win_upl_btn'        => '  Загрузить  ',
				'upl_error'          => 'Ошибка загрузки файла',
				'pls_select_file'    => 'Пожалуйста выберите файл для загрузки',
				'ext_not_allowed'    => 'Тип FILE_EXT файлов не поддерживается. Пожалуйста выбирайте файлы следующих типов: ALLOWED_EXT',
				'size_too_big'       => 'Размер файла слишком велик, чтобы его загрузить. Попробуйте еще раз.',
			),

			'sharefile' => array(
				'chat_users'=> '[ Послать ко всему чату ]',
				'all_users' => '[ Послать в комнату ]',
				'file_info_size'  => '<br>Максимальный размер файла MAX_SIZE.',
				'file_info_ext' => ' Поддерживаются типы файлов: ALLOWED_EXT',
				'win_share_only'=>'Послать пользователю',				
				'usr_message' => '<b>Пользователь USER_LABEL хочет послать вам файл</b><br><br>Имя файла: F_NAME<br>Размер: F_SIZE',				
			),
			

			'loadavatarbg' => array(
				'win_title'  => 'Другой фон...',
				'file_info'  => 'Ваш файл должен быть не слишкрм большим JPG изображением или Flash SWF файлом.',
				'use_label'  => 'Использовать етот файл для:',
				'rb_mainchat_avatar' => 'Аватар окна чата',
				'rb_roomlist_avatar' => 'Аватар списка комнат',
				'rb_mc_rl_avatar'    => 'Аватар окна чата и списка комнат',
				'rb_this_theme'      => 'Фон только для даной темы',
				'rb_all_themes'      => 'Фон для всех тем',
			),
		),

		'desktop' => array(
			'invalidsettings' => "Ошибка в установках",
			'selectsmile' => "Смайлы",
			'sendBtn' => "Послать",
			'saveBtn' => "Записать",
			'soundBtn' => "Звук",
			'skinBtn' => "Опции",
			'addRoomBtn' => "Добавить",
			'myStatus' => "Статус",
			'room' => "Комната",
			'welcome' => "Рады видеть Вас, USER_LABEL",
			'ringTheBell' => "Не Отвечают? Позвони в звонок:",
			'logOffBtn' => "X",
			'helpBtn' => "?",
			'adminSign' => ""
		)
	);
?>