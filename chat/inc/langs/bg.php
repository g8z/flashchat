<?php 
   $GLOBALS['fc_config']['languages']['bg'] = array( 
      'name' => 'Български', 

      'messages' => array( 
         'ignored' => "'USER_LABEL' игнорира съобщенията ти", 
         'banned' => "Ти си баннат", 
         'login' => 'Моля влезте в системата', 
         'wrongPass' => 'Невалидно потребителско име или парола.', 
         'anotherlogin' => 'Друг потребител е логнат с това потребителско име, моля опитайте отново.', 
         'expiredlogin' => 'Загубена връзка. Моля логнете се отново.', 
         'enterroom' => '[ROOM_LABEL]: USER_LABEL влезе в TIMESTAMP', 
         'leaveroom' => '[ROOM_LABEL]: USER_LABEL излезе в TIMESTAMP', 
         'selfenterroom' => 'Здравей! Ти налази [ROOM_LABEL] в TIMESTAMP', 
         'bellrang' => 'USER_LABEL звъни', 
         'chatfull' => 'Чата е пълен, моля опитайте отново.', 
         'iplimit' => 'Ти вече си в чата.', 
         'roomlock' => 'Тази стая има парола.<br>Моля въведете паролата:', 
         'locked' => 'Невалидна парола, моля опитайте отново.', 
         'botfeat' => 'Бота е пуснат.', 
      ), 

      'usermenu' => array( 
         'profile' => 'Профил', 
         'unban' => 'Махни бан', 
         'ban' => 'Банване', 
         'unignore' => 'Махни игнорирането', 
         'fileshare' => 'Прати файл', 
         'ignore' => 'Игнорирай', 
         'invite' => 'Покани', 
         'privatemessage' => 'Лично съобщение',          
      ), 

      'status' => array( 
         'here' => 'Тук', 
         'busy' => 'Зает', 
         'away' => 'Навън', 
         'brb'  => 'BrB',          
      ), 

      'dialog' => array( 
         'misc' => array( 
            'roomnotfound' => "Стая 'ROOM_LABEL' не е открита", 
            'usernotfound' => "Потребител 'USER_LABEL' не е открит", 
            'unbanned' => "Бана ти бе махнат от 'USER_LABEL'", 
            'banned' => "Ти бе баннат от 'USER_LABEL'", 
            'unignored' => "Махнат ти е игнора от 'USER_LABEL'", 
            'ignored' => "Игнориран си от 'USER_LABEL'", 
            'invitationdeclined' => "'USER_LABEL' отхвърли поканата ти в 'ROOM_LABEL'", 
            'invitationaccepted' => "'USER_LABEL' прие поканата ти в 'ROOM_LABEL'", 
            'roomnotcreated' => 'Не е създадена такава стая', 
            'roomisfull' => '[ROOM_LABEL] стаята е пълна.', 
            'alert' => '<b>АЛАРМА!</b><br>', 
            'chatalert' => '<b>АЛАРМА!</b><br>', 
            'gag' => "<b>Затапена ти е устата за DURATION минути!</b><br><br>Можеш да четеш съобщенията в тази стая но не и да пишеш ". 
                   "докато не ти се махне тапата от устата.", 
            'ungagged' => "Махната ти е тапата от 'USER_LABEL'",       
            'gagconfirm' => 'USER_LABEL ти слага тапа за MINUTES минути.', 
            'alertconfirm' => 'USER_LABEL прочете алармата.', 
            'file_declined' => 'Файла е отхвърлен от USER_LABEL.', 
            'file_accepted' => 'Файла е приет от USER_LABEL.', 
         ), 

         'unignore' => array( 
            'unignoreBtn' => 'Махане на игнор', 
            'unignoretext' => 'Послание', 
         ), 

         'unban' => array( 
            'unbanBtn' => 'Махане на бан', 
            'unbantext' => 'Послание', 
         ), 
          
         'tablabels' => array( 
            'themes' => 'Теми', 
            'sounds' => 'Звуци', 
            'text'  => 'Текст', 
            'effects'  => 'Ефекти', 
            'admin'  => 'Админ', 
            'about' => 'Относно', 
         ), 

         'text' => array( 
            'itemChange' => 'Промени', 
            'fontSize' => 'Размер', 
            'fontFamily' => 'Шрифт', 
            'language' => 'Език', 
            'mainChat' => 'Основния прозорец', 
            'interfaceElements' => 'Интерфейсни елементи', 
            'title' => 'Заглавие', 
            'mytextcolor' => 'Използвай мойте зветове при входящи съобщения.', 
         ), 
          
         'effects' => array( 
            'avatars' => 'Аватар', 
            'mainchat' => 'Основен', 
            'roomlist' => 'Списък', 
            'background' => 'Фон', 
            'custom' => 'Пример', 
            'showBackgroundImages' => 'Покажи фона', 
            'splashWindow' => 'Фокусирай прозореци при ново съобщение', 
            'uiAlpha' => 'Прозрачност', 
         ), 

         'sound' => array( 
            'sampleBtn' => 'Пример', 
            'testBtn' => 'Тест', 
            'muteall' => 'Заглуши', 
            'submitmessage' => 'Пусни съобщение', 
            'reveivemessage' => 'Приеми съобщение', 
            'enterroom' => 'Влез', 
            'leaveroom' => 'Излез', 
            'pan' => 'Пан', 
            'volume' => 'Сила', 
            'initiallogin' => 'Логин', 
            'logout' => 'Логаут', 
            'privatemessagereceived' => 'Лично съобщение', 
            'invitationreceived' => 'Покана', 
            'combolistopenclose' => "Отвори/затвори списъка", 
            'userbannedbooted' => 'Потребителя е баннат или бутнат', 
            'usermenumouseover' => 'Потебителско меню с мишка', 
            'roomopenclose' => "Отвори/затвори списък със стаи", 
            'popupwindowopen' => 'Отвори нов прозорец', 
            'popupwindowclosemin' => 'Затвори прозореца', 
            'pressbutton' => 'Клавиш', 
            'otheruserenters' => 'Друг потребител влезе', 
         ), 

         'skin' => array( 
            'inputBoxBackground' => 'Input box background', 
            'privateLogBackground' => 'Private log background', 
            'publicLogBackground' => 'Public log background', 
            'enterRoomNotify' => 'Enter room notification', 
            'roomText' => 'Rooms text', 
            'room' => 'Rooms background', 
            'userListBackground' => 'User list background', 
            'dialogTitle' => 'Dialog title', 
            'dialog' => 'Dialog background', 
            'buttonText' => 'Buttons text', 
            'button' => 'Buttons background', 
            'bodyText' => 'Body text', 
            'background' => 'Main background', 
            'borderColor' => 'Border color', 
            'selectskin' => 'Select Color Scheme...', 
            'buttonBorder' => 'Buttons border color', 
            'selectBigSkin' => 'Select Skin...', 
            'titleText' => 'Title text', 
         ), 

         'privateBox' => array( 
            'sendBtn' => 'Прати', 
            'toUser' => 'Разговор с USER_LABEL:', 
         ), 

         'login' => array( 
            'loginBtn' => 'Логин', 
            'language' => 'Език:', 
            'moderator' => '(модератор)', 
            'password' => 'Парола:', 
            'username' => 'Потребител:', 
         ), 

         'invitenotify' => array( 
            'declineBtn' => 'Отхвърли', 
            'acceptBtn' => 'Приеми', 
            'userinvited' => "'USER_LABEL' те покани в 'ROOM_LABEL'", 
         ), 

         'invite' => array( 
            'sendBtn' => 'Прати', 
            'includemessage' => 'Покана:', 
            'inviteto' => 'Покани потребителя в:', 
         ), 

         'ignore' => array( 
            'ignoreBtn' => 'Игнориране', 
            'ignoretext' => 'Причина', 
         ), 

         'createroom' => array( 
            'createBtn' => 'Създай', 
            'private' => 'Частна', 
            'public' => 'Публична', 
            'entername' => 'Име на стая', 
            'enterpass' => 'Парола (ако искате да има такава).', 
         ), 

         'ban' => array( 
            'banBtn' => 'Бан', 
            'byIP' => 'по IP', 
            'fromChat' => 'От чат', 
            'fromRoom' => 'От стая', 
            'banText' => 'Причина:', 
         ), 

         'common' => array( 
            'cancelBtn' => 'Отмени', 
            'okBtn' => 'Да', 
             
            'win_choose'         => 'Посочи файл:', 
            'win_upl_btn'        => '  Прати  ', 
            'upl_error'          => 'Грешка при изпращане', 
            'pls_select_file'    => 'Избери файл!', 
            'ext_not_allowed'    => 'FILE_EXT е забранен тип файл, моля избери нещо от рода на: ALLOWED_EXT', 
            'size_too_big'       => 'Файла който се опитваш да качиш е прекалено голям.', 
         ), 
          
         'sharefile' => array( 
            'chat_users'=> '[ Сподели с всички ]', 
            'all_users' => '[ Сподели със стая ]', 
            'file_info_size'  => '<br>Максималния позволен размер е MAX_SIZE.', 
            'file_info_ext' => ' Позволени типове: ALLOWED_EXT', 
            'win_share_only'=>'Сподели с',             
            'usr_message' => '<b>USER_LABEL иска да ти предостави файл</b><br><br>Име: F_NAME<br>Размер: F_SIZE',             
         ), 
          
         'loadavatarbg' => array( 
            'win_title'  => 'Фон', 
            'file_info'  => 'Файла не трябва да е прогресивен джей-пег файл или флаш снимация.', 
            'use_label'  => 'Използвай за:', 
            'rb_mainchat_avatar' => 'Чат аватара ми', 
            'rb_roomlist_avatar' => 'Никлист аватара ми', 
            'rb_mc_rl_avatar'    => 'И двата', 
            'rb_this_theme'      => 'Фон за тази тема', 
            'rb_all_themes'      => 'Фон за всички теми', 
         ), 
          
          
      ), 

      'desktop' => array( 
         'invalidsettings' => 'Невалидни настройки', 
         'selectsmile' => 'Хилчета', 
         'sendBtn' => 'Прати', 
         'saveBtn' => 'Запази', 
         'clearBtn' => 'Изчисти', 
         'skinBtn' => 'Настройки', 
         'addRoomBtn' => 'Добави', 
         'myStatus' => 'Статус', 
         'room' => 'Стая', 
         'welcome' => 'Здравей, USER_LABEL', 
         'ringTheBell' => 'Няма отговор? Звънни:', 
         'logOffBtn' => 'X', 
         'helpBtn' => '?', 
         'adminSign' => '@', 
      ) 
   ); 
?>