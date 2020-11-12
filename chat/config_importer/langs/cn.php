<?php
	$GLOBALS['fc_config']['languages']['cn'] = array(
		'name' => "简体中文",

		'messages' => array(
			'ignored' => "用户 'USER_LABEL' 忽略了您的消息。",
			'banned' => "您已被禁止！",
			'login' => '进入聊天室请先登陆',
			'wrongPass' => '用户名或密码不正确，请重试。',
			'anotherlogin' => '该用户名已由另一个用户登陆，请重试。',
			'expiredlogin' => '连接超时，请重新登陆。',
			'enterroom' => "[ROOM_LABEL]: USER_LABEL 已于下列时间进入： TIMESTAMP",
			'leaveroom' => "[ROOM_LABEL]: USER_LABEL 已于下列时间离开： TIMESTAMP",
			'selfenterroom' => "欢迎光临！ 您已进入 [ROOM_LABEL] 时间是： TIMESTAMP",
			'bellrang' => 'USER_LABEL 摇了铃',
			'chatfull' => '聊天室人员已满，请重试。',
			'iplimit' => '您已经进入聊天室。'
		),

		'usermenu' => array(
			'profile' => "个人档案",
			'unban' => "解除禁止",
			'ban' => "禁止",
			'unignore' => "解除忽略",
			'fileshare' => '文件共享',
			'ignore' => "忽略",
			'invite' => "邀请",
			'privatemessage' => "私聊消息",
		),

		'status' => array(
			'here' => "在线",
			'busy' => "忙",
			'away' => "离开",
			'brb'  => '一会就回来',			
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "房间： 'ROOM_LABEL' 未找到",
				'usernotfound' => "用户： 'USER_LABEL' 未找到",
				'unbanned' => "用户 'USER_LABEL' 解除了对您的禁止",
				'banned' => "您已被用户 'USER_LABEL' 禁止",
				'unignored' => "用户 'USER_LABEL' 解除了对您的忽略",
				'ignored' => "您已经被用户 'USER_LABEL'忽略",
				'invitationdeclined' => "用户 'USER_LABEL' 拒绝了您发出的到房间'ROOM_LABEL'聊天的邀请",
				'invitationaccepted' => "用户 'USER_LABEL' 接受了您发出的到房间'ROOM_LABEL'聊天的邀请",
				'roomnotcreated' => "房间尚未创建",
				'roomisfull' => '[ROOM_LABEL] 已满，请选择其他房间。',
				'alert' => '<b>ALERT!</b><br><br>',
				'chatalert' => '<b>ALERT!</b><br><br>',
				'gag' => "<b> 您将在 DURATION 分钟时间内不能传送消息！ </b><br><br>在这段事件结束之前，您可以在这个聊天室中查看他人的消息，但不能在对话中发送新消息。 ",
				'ungagged' => "您的禁言设定已经被 'USER_LABEL' 取消。",		 
				'gagconfirm' => 'USER_LABEL 被设定禁言 MINUTES 分钟。',
				'alertconfirm' => 'USER_LABEL 受到警告。',
				'file_declined' => '您的文件未被 USER_LABEL.接收。',
				'file_accepted' => 'USER_LABEL 接收到您的文件。',
			),

			'unignore' => array(
				'unignoreBtn' => "解除忽略",
				'unignoretext' => "输入解除忽略文字（原因）",
			),

			'unban' => array(
				'unbanBtn' => "解除禁止",
				'unbantext' => "输入解除禁止文字（原因）",
			),

			'tablabels' => array(
				'themes' => "主题",
				'sounds' => "声音",
				'text'  => "文字",
				'effects'  => "效果",
				'admin'  => "管理",
				'about' => "关于",
			),

			'text' => array(
				'itemChange' => "需设置的项目",
				'fontSize' => "文字大小",
				'fontFamily' => "字体",
				'language' => "语言",
				'mainChat' => "主聊天室",
				'interfaceElements' => "界面元素",
				'title' => "标题",
				'mytextcolor' => '以我设置的字体颜色格式化接受的消息。',
			),

			'effects' => array(
				'avatars' => '头像',
				'mainchat' => '主聊天窗口',
				'roomlist' => '房间列表',
				'background' => '背景',
				'custom' => '自定义',
				'showBackgroundImages' => '显示背景',
				'splashWindow' => '消息到来时，聚焦到窗口。',
				'uiAlpha' => '透明度',
			),

			'sound' => array(
				'sampleBtn' => "范例",
				'testBtn' => "测试",
				'muteall' => "全部静音",
				'submitmessage' => "提交消息",
				'reveivemessage' => "接收消息",
				'enterroom' => "进入房间",
				'leaveroom' => "离开房间",
				'pan' => "面板",
				'volume' => "音量",				//added sounds
				'initiallogin' => "首次登陆",
				'logout' => "注销",
				'privatemessagereceived' => "接收私聊消息",
				'invitationreceived' => "接收邀请",
				'combolistopenclose' => "打开/关闭组合列表",
				'userbannedbooted' => "用户已被禁止或踢出",
				'usermenumouseover' => "鼠标经过用户菜单",
				'roomopenclose' => "打开/关闭房间",
				'popupwindowopen' => "弹出窗口打开",
				'popupwindowclosemin' => "弹出窗口关闭",
				'pressbutton' => "按下键盘",
				'otheruserenters' => "其他用户进入了房间",
			),

			'skin' => array(
				'inputBoxBackground' => "输入框背景",
				'privateLogBackground' => "个人记录背景",
				'publicLogBackground' => "公共记录背景",
				'enterRoomNotify' => "进入房间通知",
				'roomText' => "房间文字",
				'room' => "房间背景",
				'userListBackground' => "用户列表背景",
				'dialogTitle' => "对话框标题",
				'dialog' => "对话框背景",
				'borderColor' => "边框颜色",
				'buttonText' => "按钮文本",
				'button' => "按钮背景",
				'buttonBorder' => "按钮边框颜色",
				'bodyText' => "正文文本",
				'background' => "主背景",
				'selectskin' => "选择配色主题...",
				'showBackgroundImages' => "显示背景",
				'uiAlpha' => "透明度",
				'selectBigSkin' => "选择皮肤...",
				'titleText' => "标题文字",
			),

			'privateBox' => array(
				'sendBtn' => "发送",
				'toUser' => "正在与用户 USER_LABEL 聊天：",
			),

			'login' => array(
				'loginBtn' => "登陆",
				'language' => "语言:",
				'moderator' => "(是否监督人)",
				'password' => "密码：",
				'username' => "用户名：",
			),

			'invitenotify' => array(
				'declineBtn' => "拒绝",
				'acceptBtn' => "接受",
				'userinvited' => "用户 'USER_LABEL' 邀请您进入房间： 'ROOM_LABEL'",
			),

			'invite' => array(
				'sendBtn' => "发送",
				'includemessage' => "将该消息与邀请一同发送：",
				'inviteto' => "邀请用户至：",
			),

			'ignore' => array(
				'ignoreBtn' => "忽略",
				'ignoretext' => "输入忽略文字",
			),

			'createroom' => array(
				'createBtn' => "创建",
				'private' => "私有",
				'public' => "公共",
				'entername' => "输入房间名",
			),

			'ban' => array(
				'banBtn' => "禁止",
				'byIP' => "通过IP",
				'fromChat' => "从对话",
				'fromRoom' => "从房间",
				'banText' => "输入禁止文字",
			),

			'common' => array(
				'cancelBtn' => "取消",
				'okBtn' => "确定",

				'win_choose'         => '选择上传文件：',
				'win_upl_btn'        => '  上传  ',
				'upl_error'          => '文件上传出错',
				'pls_select_file'    => '请选择上传文件',
				'ext_not_allowed'    => '不允许使用 FILE_EXT 扩展名。 请使用如下扩展名： ALLOWED_EXT',
				'size_too_big'       => '您试图共享的文件超过最大允许大小，请重试。',
			),

			'sharefile' => array(
				'chat_users'=> '[ 在聊天中共享 ]',
				'all_users' => '[ 在聊天室共享 ]',
				'file_info_size'  => '<br>此文件的最大允许大小为 MAX_SIZE.',
				'file_info_ext' => ' 允许使用的文件类型为 ALLOWED_EXT',
				'win_share_only'=>'共享',				
				'usr_message' => '<b>USER_LABEL 希望和您共享文件</b><br><br>文件名： F_NAME<br>文件大小： F_SIZE',				
			),
			
			'loadavatarbg' => array(
				'win_title'  => '设定背景',
				'file_info'  => '您的文件应是静态JPG文件或者Flash的SWF文件。',
				'use_label'  => '此文件将用于：',
				'rb_mainchat_avatar' => '仅用于主聊天室头像',
				'rb_roomlist_avatar' => '仅用于聊天室目录头像',
				'rb_mc_rl_avatar'    => '聊天室以及聊天室目录头像',
				'rb_this_theme'      => '仅用于当前主题的背景',
				'rb_all_themes'      => '用于所有主体的背景',
			),
			
		),

		'desktop' => array(
			'invalidsettings' => "无效设置",
			'selectsmile' => "表情",
			'sendBtn' => "发送",
			'saveBtn' => "保存",
			'soundBtn' => "声音",
			'skinBtn' => "选项",
			'addRoomBtn' => "添加",
			'myStatus' => "我的状态",
			'room' => "房间",
			'welcome' => "欢迎 USER_LABEL",
			'ringTheBell' => "没有回复？摇铃：",
			'logOffBtn' => "X",
			'helpBtn' => "?",
			'adminSign' => "(M)"
		)
	);
?>