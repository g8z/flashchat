<?php
	$GLOBALS['fc_config']['languages']['ua'] = array(
		'name' => "Українська",

		'messages' => array(
			'ignored' => "Користувач 'USER_LABEL' проігнорував Ваші повідомлення",
			'banned' => "Вас заборонили",
			'login' => 'Будь-ласка, зареєструйтесь',
			'wrongPass' => "Неправильне ім'я користувача або пароль. Будь-ласка, спробуйте ще раз.",
			'anotherlogin' => "Інший користувач увійшов до чату під цим іменем. Для продовження введіть ім'я користувача та пароль ще раз.",
			'expiredlogin' => "Ваша чат сесія була закрита. Для продовженя введіть ім'я користувача та пароль ще раз.",
			'enterroom' => "[ROOM_LABEL]: Користувач USER_LABEL увійшов в TIMESTAMP",
			'leaveroom' => "[ROOM_LABEL]: Користувач USER_LABEL вийшов в TIMESTAMP",
			'selfenterroom' => "Ви увійшли до кімнати [ROOM_LABEL] в TIMESTAMP",
			'bellrang' => 'USER_LABEL дзвонить в дзвінок',
			'chatfull' => 'Чат зайнятий. Будь-ласка спробуйте пізніше.',
			'iplimit' => 'Ви вже зареєстровані в чаті.'
		),

		'usermenu' => array(
			'profile' => "Налаштування користувача",
			'unban' => "Відмінити заборону",
			'ban' => "Заборонити",
			'unignore' => "Відмінити ігнорування",
			'fileshare' => 'Відіслати файл',
			'ignore' => "Проігнорувати",
			'invite' => "Запросити",
			'privatemessage' => "Приватне повідомлення",
		),

		'status' => array(
			'away' => "Відійшов",
			'busy' => "Зайнятий",
			'here' => "Тут",
			'brb'  => 'BRB',
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "Кімната 'ROOM_LABEL' не знайдена",
				'usernotfound' => "Користувач 'USER_LABEL' не знайдений",
				'unbanned' => "Користувач 'USER_LABEL' зняв з Вас заборону",
				'banned' => "Користувач 'USER_LABEL' заборонив Вас",
				'unignored' => "Користувач 'USER_LABEL' зняв з Вас ігнорування",
				'ignored' => "Користувач 'USER_LABEL' ігнорує ваші повідомлення",
				'invitationdeclined' => "Користувач 'USER_LABEL' не прийняв Ваше запрошення до кімнати 'ROOM_LABEL'",
				'invitationaccepted' => "Користувач 'USER_LABEL' прийняв Ваше запрошення до кімнати 'ROOM_LABEL'",
				'roomnotcreated' => "Кімнату не створено",
				
				'roomisfull' => 'В кімнаті [ROOM_LABEL] немає місця. Будь-ласка виберіть іншу кімнату.',
				'alert' => '<b>Увага!</b><br><br>',
				'chatalert' => '<b>Увага!</b><br><br>',
				'gag' => "<b>Ви відсторонені на DURATION хвилин(у)!</b><br><br>Ви можете читати повідомлення, але не можете відповідати на них поки діє відсторонення.",
				'ungagged' => "Ви знову допущені до чату користувачем 'USER_LABEL'",		 
				'gagconfirm' => 'Користувач USER_LABEL відсторонений на MINUTES хвилин(у).',
				'alertconfirm' => 'USER_LABEL прочитав попередженя.',
				'file_declined' => 'Користувач USER_LABEL не хоче прийняти ваш файл.',
				'file_accepted' => 'Користувач USER_LABEL прийняв ваш файл.',
			),

			'unignore' => array(
				'unignoreBtn' => "Відмінити ігнорування",
				'unignoretext' => "Пояснення",
			),

			'unban' => array(
				'unbanBtn' => "Відмінити заборону",
				'unbantext' => "Пояснення",
			),
			
			'tablabels' => array(
				'themes' => 'Теми',
				'sounds' => 'Звуки',
				'text'  => 'Текст',
				'effects'  => 'Ефекти',
				'admin'  => 'Адміністратор',
				'about' => 'Про нас',
			),
					
			'text' => array(
				'itemChange' => "Елемент до зміни",
				'fontSize' => "Розмір шрифту",
				'fontFamily' => "Шрифт",
				'language' => "Мова",
				'mainChat' => "Вікно чату",
				'interfaceElements' => "Елементи керування",
				'title' => "Заголовок",
				'mytextcolor' => 'Використовувати мій колір тексту для отриманих повідомлень.',
			),

			
			'effects' => array(
				'avatars' => 'Аватар',
				'mainchat' => 'Вікно чату',
				'roomlist' => 'Список кімнат',
				'background' => 'Тло',
				'custom' => 'Вибрати...',
				'showBackgroundImages' => "Показувати малюнок тла",
				'uiAlpha' => "Прозорість",
				'splashWindow' => 'Активувати вікно броузера, коли прийшло нове повідомлення.',
			),
			
			'sound' => array(
				'sampleBtn' => "Тест",
				'testBtn' => "Тест",
				'muteall' => "Без звуку",
				'submitmessage' => "Відправка повідомлення",
				'reveivemessage' => "Отримання повідомлення",
				'enterroom' => "Вхід до кімнати",
				'leaveroom' => "Вихід з кімнати",
				'pan' => "Баланс",
				'volume' => "Гучність",
				'initiallogin' => "Вхід до чату",
				'logout' => "Вихід з чату",
				'privatemessagereceived' => "Отримано приватне повідомлення",
				'invitationreceived' => "Отримано запрошення",
				'combolistopenclose' => "Відкрити/закрити список",
				'userbannedbooted' => "Користувач заборонений чи завантажений",
				'usermenumouseover' => "Курсор над меню користувача",
				'roomopenclose' => "Відкрити/закрити кімнату",
				'popupwindowopen' => "Відкриття вікна",
				'popupwindowclosemin' => "Закриття вікна",
				'pressbutton' => "Натискання клавиші",
				'otheruserenters' => "Інший користувач увійшов до кімнати",
			),

			'skin' => array(
				'inputBoxBackground' => "Тло поля вводу",
				'privateLogBackground' => "Тло списку приватних повідомлень",
				'publicLogBackground' => "Тло списку загальних повідомлень",
				'enterRoomNotify' => "Повідомлення системи",
				'roomText' => "Заголовок кімнати",
				'room' => "Тло кімнати",
				'userListBackground' => "Тло списку користувачів",
				'dialogTitle' => "Заголовок діалогу",
				'dialog' => "Тло діалогу",
				'buttonText' => "Текст кнопок",
				'button' => "Тло кнопок",
				'borderColor' => "Обрамлення",
				'bodyText' => "Текст діалогу",
				'background' => "Тло",
				'selectskin' => "Виберіть тему кольору...",
				'buttonBorder' => "Обрамлення кнопок",
				'selectBigSkin' => "Виберіть тему...",
				'titleText' => "Заголовок"
			),

			'privateBox' => array(
				'sendBtn' => "Відіслати",
				'toUser' => "Чат з USER_LABEL:",
			),

			'login' => array(
				'loginBtn' => "Увійти в систему",
				'language' => "Мова:",
				'moderator' => "(для модератора)",
				'password' => "Пароль:",
				'username' => "Ім'я користувача:",
			),

			'invitenotify' => array(
				'declineBtn' => "Відмінити",
				'acceptBtn' => "Погодитись",
				'userinvited' => "Користувач 'USER_LABEL' запрошує Вас до кімнати 'ROOM_LABEL'",
			),

			'invite' => array(
				'sendBtn' => "Відіслати",
				'includemessage' => "Пояснення:",
				'inviteto' => "Запросити до:",
			),

			'ignore' => array(
				'ignoreBtn' => "Проігнорувати",
				'ignoretext' => "Пояснення",
			),

			'createroom' => array(
				'createBtn' => "Створити",
				'private' => "Приватна",
				'public' => "Загальна",
				'entername' => "Назва кімнати",
			),

			'ban' => array(
				'banBtn' => "Заборонити",
				'byIP' => "за IP",
				'fromChat' => "з чату",
				'fromRoom' => "з кімнати",
				'banText' => "Пояснення",
			),

			'common' => array(
				'cancelBtn' => "Відмінити",
				'okBtn' => "Гаразд",

				'win_choose'         => 'Виберіть файл до завантаження:',
				'win_upl_btn'        => '  Завантажити  ',
				'upl_error'          => 'Помилка завантаження файлу',
				'pls_select_file'    => 'Будь-ласка виберіть файл до завантаження',
				'ext_not_allowed'    => 'Розширення FILE_EXT файлу не підтримується. Будь-ласка виберіть файл з одним із наступних розширень: ALLOWED_EXT',
				'size_too_big'       => 'Розмір файлу є занадто великий, щоб його заваттажити. Спробуйте ще раз.',
			),


			'sharefile' => array(
				'chat_users'=> '[ Послати до всього чату ]',
				'all_users' => '[ Послати до кімнати ]',
				'file_info_size'  => '<br>Максимальний розмір файлу MAX_SIZE.',
				'file_info_ext' => ' Підтримуються розширення: ALLOWED_EXT',
				'win_share_only'=>'Послати користувачу',				
				'usr_message' => '<b>Користувач USER_LABEL хоче послати вам файл</b><br><br>Назва файлу: F_NAME<br>Розмір: F_SIZE',				
			),
			

			'loadavatarbg' => array(
				'win_title'  => 'Вибрати тло...',
				'file_info'  => 'Ваш файл повинен бути не занадто великим JPG зображенням чи Flash SWF файлом.',
				'use_label'  => 'Використовувати цей файл для:',
				'rb_mainchat_avatar' => 'Аватар вікна чату',
				'rb_roomlist_avatar' => 'Аватар списку кімнат',
				'rb_mc_rl_avatar'    => 'Аватар вікна чату і списку кімнат',
				'rb_this_theme'      => 'Тло лише для даної теми',
				'rb_all_themes'      => 'Тло для всіх тем',
			),
		),

		'desktop' => array(
			'invalidsettings' => "Помилка в налаштуваннях",
			'selectsmile' => "Смайли",
			'sendBtn' => "Відіслати",
			'saveBtn' => "Зберегти",
			'soundBtn' => "Звук",
			'skinBtn' => "Опції",
			'addRoomBtn' => "Додати",
			'myStatus' => "Статус",
			'room' => "Кімната",
			'welcome' => "Ласкаво просимо, USER_LABEL",
			'ringTheBell' => "Не Відповідають? Подзвони у дзвінок:",
			'logOffBtn' => "X",
			'helpBtn' => "?",
			'adminSign' => ""
		)
	);
?>