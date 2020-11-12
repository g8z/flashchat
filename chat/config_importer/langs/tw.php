<?php
	$GLOBALS['fc_config']['languages']['tw'] = array(
		'name' => "繁體中文",

		'messages' => array(
			'ignored' => "用戶 'USER_LABEL' 忽略了您的消息。",
			'banned' => "您已被禁止！",
			'login' => '進入聊天室請先登陸',
			'wrongPass' => '用戶名或密碼不正確，請重試。',
			'anotherlogin' => '該用戶名已由另一個用戶登陸，請重試。',
			'expiredlogin' => '連接超時，請重新登陸。',
			'enterroom' => "[ROOM_LABEL]: USER_LABEL 已於下列時間進入： TIMESTAMP",
			'leaveroom' => "[ROOM_LABEL]: USER_LABEL 已於下列時間離開： TIMESTAMP",
			'selfenterroom' => "歡迎光臨！ 您已進入 [ROOM_LABEL] 時間是： TIMESTAMP",
			'bellrang' => 'USER_LABEL 搖了鈴',
			'chatfull' => '聊天室已滿。請稍后重試。',
			'iplimit' => '您已經在聊天中。'
		),

		'usermenu' => array(
			'profile' => "個人檔案",
			'unban' => "解除禁止",
			'ban' => "禁止",
			'unignore' => "解除忽略",
			'fileshare' => '文檔共享',
			'ignore' => "忽略",
			'invite' => "邀請",
			'privatemessage' => "私聊消息",
		),

		'status' => array(
			'here' => "在綫",
			'busy' => "忙",
			'away' => "離開",
			'brb'  => '稍后囬來',			
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "房間： 'ROOM_LABEL' 未找到",
				'usernotfound' => "用戶： 'USER_LABEL' 未找到",
				'unbanned' => "用戶 'USER_LABEL' 解除了對您的禁止",
				'banned' => "您已被用戶 'USER_LABEL' 禁止",
				'unignored' => "用戶 'USER_LABEL' 解除了對您的忽略",
				'ignored' => "您已被用戶 'USER_LABEL'忽略",
				'invitationdeclined' => "用戶 'USER_LABEL' 拒絕了您發出的到房間'ROOM_LABEL'聊天的邀請",
				'invitationaccepted' => "用戶 'USER_LABEL' 接受了您發出的到房間'ROOM_LABEL'聊天的邀請",
				'roomnotcreated' => "房間尚未創建",
				'roomisfull' => '[ROOM_LABEL] 已滿，請選擇其他房間',
				'alert' => '<b>警告！</b><br><br>',
				'chatalert' => '<b>警告！</b><br><br>',
				'gag' => "<b>您在 DURATION 分鍾的時間中不能傳送消息！</b><br><br>在這段時間結束之前，您可以在這個聊天室中查看他人的消息，但不能在對話中發送新消息。",
				'ungagged' => "您的禁言設定被'USER_LABEL'取消。",		 
				'gagconfirm' => 'USER_LABEL 被設定禁言 MINUTES 分鍾。',
				'alertconfirm' => 'USER_LABEL 收到警告。',
				'file_declined' => '您的文檔已經被 USER_LABEL 拒絕。',
				'file_accepted' => '您的文檔已經被 USER_LABEL 接受。',
			),

			'unignore' => array(
				'unignoreBtn' => "解除忽略",
				'unignoretext' => "輸入解除忽略文字（原因）",
			),

			'unban' => array(
				'unbanBtn' => "解除禁止",
				'unbantext' => "輸入解除禁止文字（原因）",
			),

			'tablabels' => array(
				'themes' => "主題",
				'sounds' => "聲音",
				'text'  => "文字",
				'effects'  => '傚果',
				'admin'  => "管理",
				'about' => '關于',
			),

			'text' => array(
				'itemChange' => "需設置的專案",
				'fontSize' => "文字大小",
				'fontFamily' => "字體",
				'language' => "語言",
				'mainChat' => "主聊天室",
				'interfaceElements' => "介面元素",
				'title' => "標題",
				'mytextcolor' => '對于所有收到的消息，使用我的文本顔色',
			),

			'effects' => array(
				'avatars' => '頭像',
				'mainchat' => '主聊天窗口',
				'roomlist' => '房間目錄',
				'background' => '揹景',
				'custom' => '定製',
				'showBackgroundImages' => '顯示揹景',
				'splashWindow' => '當收到消息時聚焦到窗口。',
				'uiAlpha' => '透明度',
			),

			'sound' => array(
				'sampleBtn' => "範例",
				'testBtn' => "測試",
				'muteall' => "全部靜音",
				'submitmessage' => "提交消息",
				'reveivemessage' => "接收消息",
				'enterroom' => "進入房間",
				'leaveroom' => "離開房間",
				'pan' => "面板",
				'volume' => "音量",
				'initiallogin' => "首次登陸",
				'logout' => "註銷",
				'privatemessagereceived' => "接收私聊消息",
				'invitationreceived' => "接收邀請",
				'combolistopenclose' => "打開/關閉組合列表",
				'userbannedbooted' => "用戶已被禁止或踢出",
				'usermenumouseover' => "用戶滑鼠經過菜单",
				'roomopenclose' => "打開/關閉房間",
				'popupwindowopen' => "彈出視窗打開",
				'popupwindowclosemin' => "彈出窗口關閉",
				'pressbutton' => "按下鍵盤",
				'otheruserenters' => "其他用戶進入了房間"
			),

			'skin' => array(
				'inputBoxBackground' => "輸入框背景",
				'privateLogBackground' => "個人記錄背景",
				'publicLogBackground' => "公共記錄背景",
				'enterRoomNotify' => "進入房間通知",
				'roomText' => "房間文字",
				'room' => "房間背景",
				'userListBackground' => "用戶列表背景",
				'dialogTitle' => "對話方塊標題",
				'dialog' => "對話方塊背景",
				'borderColor' => "邊框顏色",
				'buttonText' => "按鈕文本",
				'button' => "按鈕背景",
				'buttonBorder' => "按鈕邊框顏色",
				'bodyText' => "正文文本",
				'background' => "主背景",
				'selectskin' => "選擇配色主題...",
				'showBackgroundImages' => "顯示背景",
				'uiAlpha' => "透明度",
				'selectBigSkin' => "選擇皮膚...",
				'titleText' => "標題文字",
			),

			'privateBox' => array(
				'sendBtn' => "發送",
				'toUser' => "正在與用戶 USER_LABEL 聊天：",
			),

			'login' => array(
				'loginBtn' => "登陸",
				'language' => "語言:",
				'moderator' => "(是否監督人)",
				'password' => "密碼：",
				'username' => "用戶名：",
			),

			'invitenotify' => array(
				'declineBtn' => "拒絕",
				'acceptBtn' => "接受",
				'userinvited' => "用戶 'USER_LABEL' 邀請您進入房間： 'ROOM_LABEL'",
			),

			'invite' => array(
				'sendBtn' => "發送",
				'includemessage' => "將該消息與邀請一同發送：",
				'inviteto' => "邀請用戶至：",
			),

			'ignore' => array(
				'ignoreBtn' => "忽略",
				'ignoretext' => "輸入忽略文字",
			),

			'createroom' => array(
				'createBtn' => "創建",
				'private' => "私有",
				'public' => "公共",
				'entername' => "輸入房間名",
			),

			'ban' => array(
				'banBtn' => "禁止",
				'byIP' => "通過IP",
				'fromChat' => "從對話",
				'fromRoom' => "從房間",
				'banText' => "輸入禁止文字",
			),

			'common' => array(
				'cancelBtn' => "取消",
				'okBtn' => "確定",
				
				'win_choose'         => '上傳文檔：',
				'win_upl_btn'        => '  上傳  ',
				'upl_error'          => '文件上傳錯誤',
				'pls_select_file'    => '請選擇上傳的文檔',
				'ext_not_allowed'    => '不允許使用 FILE_EXT 擴展名。請上傳具有如下擴展名的文件： ALLOWED_EXT',
				'size_too_big'       => '您希望共享的文件超過文件的最大允許大小。請重試。',
			),

			'sharefile' => array(
				'chat_users'=> '[ 在聊天中共享 ]',
				'all_users' => '[ 在聊天室共享 ]',
				'file_info_size'  => '<br>此文檔的最大允許大小為 MAX_SIZE。',
				'file_info_ext' => ' 允許使用的文檔類型為： ALLOWED_EXT',
				'win_share_only'=>'共享',				
				'usr_message' => '<b>USER_LABEL 希望和您共享文檔</b><br><br>文檔名稱： F_NAME<br>文檔大小： F_SIZE',				
			),
			
			'loadavatarbg' => array(
				'win_title'  => '定製揹景',
				'file_info'  => '您的文檔應當是靜態JPG文檔或者Flash的SWF文檔。',
				'use_label'  => '此文檔將用于：',
				'rb_mainchat_avatar' => '僅用于主聊天室頭像',
				'rb_roomlist_avatar' => '僅用于聊天室目錄頭像',
				'rb_mc_rl_avatar'    => '主聊天室以及聊天室目錄頭像',
				'rb_this_theme'      => '僅用于當前主題的揹景',
				'rb_all_themes'      => '用于所有主題的揹景',
			),
			
		),

		'desktop' => array(
			'invalidsettings' => "無效設置",
			'selectsmile' => "表情",
			'sendBtn' => "發送",
			'saveBtn' => "保存",
			'soundBtn' => "聲音",
			'skinBtn' => "選項",
			'addRoomBtn' => "添加",
			'myStatus' => "我的狀態",
			'room' => "房間",
			'welcome' => "歡迎 USER_LABEL",
			'ringTheBell' => "沒有回復？搖鈴：",
			'logOffBtn' => "X",
			'helpBtn' => "?",
			'adminSign' => "(M)"
		)
	);
?>