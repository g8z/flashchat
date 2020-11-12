<?php
     $GLOBALS['fc_config']['languages']['jp'] = array(
           'name' => "日本語",
	   			
           'messages' => array(
                 'ignored' => "'USER_LABEL' メッセージを無視している",
                 'banned' => "禁止された",
                 'login' => 'チャートに登録する',
                 'wrongPass' => '不正確なユーザー名かパスワード。もう一度登録してください。',
                 'anotherlogin' => 'このユーザー名は既にログインされている。再度試してください。',
                 'expiredlogin' => '接続は切れた。もう一度ログインしてください。',
                 'enterroom' => "[ROOM_LABEL]: USER_LABEL はTIMESTAMPで入った",
                 'leaveroom' => "[ROOM_LABEL]: USER_LABEL はTIMESTAMPで去った",
                 'selfenterroom' => "ようこそ！TIMESTAMP で [ROOM_LABEL] 入った",
                 'bellrang' => 'USER_LABEL はベルを鳴らした',
                 'chatfull' => 'チャート混雑のため、後で来てください。',
                 'iplimit' => 'チャートに入っている。',
		   ),

           'usermenu' => array(
                 'profile' => "プロフィール",
                 'unban' => "禁止解除",
                 'ban' => "禁止",
                 'unignore' => "無視を解除する",
				 'fileshare' => 'Share File',
                 'ignore' => "無視する",
                 'invite' => "招待する",
                 'privatemessage' => "プライベートメッセージ",
           ),

           'status' => array(
                 'here' => "いる",
                 'busy' => "忙しい",
                 'away' => "去る",
				 'brb'  => 'BRB',	
           ),

           'dialog' => array(
                 'misc' => array(
                       'roomnotfound' => "部屋'見つけられないROOM_LABEL '",
                       'usernotfound' => "ユーザー'見つけられないUSER_LABEL '",
                       'unbanned' => "ユーザー' USER_LABEL ' によって禁止解除された",
                       'banned' => "ユーザー' USER_LABEL ' によって禁止された",
                       'unignored' => "ユーザー' USER_LABEL ' によって無視を解除された",
                       'ignored' => "ユーザー' USER_LABEL ' によって無視された",
                       'invitationdeclined' => "ユーザー' USER_LABEL ' は部屋' ROOM_LABEL ' に招待を拒否させた",
                       'invitationaccepted' => "ユーザー' USER_LABEL ' は部屋' ROOM_LABEL ' に招待を受け入れた",
                       'roomnotcreated' => "部屋は作成されなかった",
					   'roomisfull' => '[ROOM_LABEL] が混んでいる。他の部屋を選びなさい。',
					   'alert' => '<b>警告!</b><br><br>',
					   'chatalert' => '<b>警告!</b><br><br>',
					   'gag' => "<b> DURATION 分間発言が禁止された。</b><br><br>それまでに、この部屋で読むことができる、メッセージを加わることができない。".
					   "new messages to the conversation, until the gag expires.",
					   'ungagged' => "ユーザー'USER_LABEL' によって、発言禁止が取り除かれた'",		 
					   'gagconfirm' => 'USER_LABEL は発言が MINUTES 分間禁止された。',
					   'alertconfirm' => 'USER_LABEL  は既にこの警告を読んだ',
					   'file_declined' => 'ファイルは USER_LABEL によって拒否された。',
					   'file_accepted' => 'ファイルは USER_LABEL  によって受け入れた。',
                 ),

                 'unignore' => array(
                       'unignoreBtn' => "無視でない",
                       'unignoretext' => "無視でないテキストを入力しなさい",
                 ),

                 'unban' => array(
                       'unbanBtn' => "禁止解除",
                       'unbantext' => "禁止でないテキストを入力しなさい",
                 ),

                 'tablabels' => array(
                       'themes' => "主題",
                       'sounds' => "音声",
                       'text' => "テキスト",
					   'effects'  => '効果',
                       'admin' => "Admin",
					   'about' => 'について',
                 ),

                 'text' => array(
                       'itemChange' => "項目を変更",
                       'fontSize' => "文字サイズ",
                       'fontFamily' => "書体",
                       'language' => "言語",
                       'mainChat' => "メインチャート",
                       'interfaceElements' => "インターフェイス要素",
                       'title' => "タイトル",
                       'mytextcolor' => 'すべて受けるニュースに自分の文字カラーを使う。',
                 ),

                 'effects' => array(
                       'avatars' => '個性のイメージ',
                       'mainchat' => 'メインチャートルーム',
                       'roomlist' => 'チャートルームのリスト',
                       'background' => '背景',
                       'custom' => '設定する',
                       'showBackgroundImages' => '背景を表示する',
                       'splashWindow' => '新しメッセージにウィンドの焦点を集中する。',
                       'uiAlpha' => '透明度',
			),

                 'sound' => array(
                       'sampleBtn' => "サンプル",
                       'testBtn' => "テスト",
                       'muteall' => "無音声",
                       'submitmessage' => "メッセージを入れる",
                       'reveivemessage' => "メッセージを受け取る",
                       'enterroom' => "入室",
                       'leaveroom' => "部屋を出る",
                       'pan' => "パン",
                       'volume' => "ボリューム",
                       'initiallogin' => "最初のログイン",
                       'logout' => "ログアウト",
                       'privatemessagereceived' => "プライベートメッセージを受け取る",
                       'invitationreceived' => "招待を受け取る",
                       'combolistopenclose' => "開く/閉じる　コンボのリスト",
                       'userbannedbooted' => "ユーザーを禁止させるか、または起動させる",
                       'usermenumouseover' => "ユーザーメニューにマウスを通る",
                       'roomopenclose' => "開く/閉じる　部屋セクション",
                       'popupwindowopen' => "ポップアップウィンドウを開く",
                       'popupwindowclosemin' => "ポップアップウィンドウを閉じる",
                       'pressbutton' => "キーを押す",
                       'otheruserenters' => "他のユーザーは部屋に入る"
                 ),

                 'skin' => array(
                       'inputBoxBackground' => "入力ボックス背景",
                       'privateLogBackground' => "プライベートログの背景",
                       'publicLogBackground' => "公共のログの背景",
                       'enterRoomNotify' => "入室の通告",
                       'roomText' => "部屋文字t",
                       'room' => "部屋の背景",
                       'userListBackground' => "ユーザーリストの背景",
                       'dialogTitle' => "ダイアログのタイトル",
                       'dialog' => "ダイアログの背景",
                       'buttonText' => "ボタンのテキスト",
                       'button' => "ボタンの背景",
					   'bodyText' => "ボディテキスト",
					   'background' => "主要な背景",
					   'borderColor' => "ボーダーカラー",
                       'selectskin' => "カラー·スキームを選ぶ...",
					   'buttonBorder' => "ボタンのボーダーカラー",
                       'selectBigSkin' => "スキンを選ぶ...",
                       'titleText' => "タイトルテキスト",
                 ),

                 'privateBox' => array(
                       'sendBtn' => "送る",
                       'toUser' => "USER_LABEL に話す:",
                 ),

                 'login' => array(
                       'loginBtn' => "ログイン",
                       'language' => "言語:",
                       'moderator' => "(スタッフですか)",
                       'password' => "パスワード:",
                       'username' => "ユーザーネーム:",
                 ),

                 'invitenotify' => array(
                       'declineBtn' => "拒否する",
                       'acceptBtn' => "受け取る",
                       'userinvited' => "ユーザー' USER_LABEL ' は部屋' ROOM_LABEL ' に招待した",
                 ),

                 'invite' => array(
                       'sendBtn' => "送る",
                       'includemessage' => "このメッセージを招待と一緒に送る:",
                       'inviteto' => "ユーザーを招待する:",
                 ),

                 'ignore' => array(
                       'ignoreBtn' => "無視する",
                       'ignoretext' => "無視のテキストを入力しなさい",
                 ),

                 'createroom' => array(
                       'createBtn' => "作成する",
                       'private' => "プライベート",
                       'public' => "公用的",
                       'entername' => "部屋の名前を入力する",
                 ),

                 'ban' => array(
                       'banBtn' => "禁止",
                       'byIP' => "IPで",
                       'fromChat' => "チャートから",
                       'fromRoom' => "部屋から",
                       'banText' => "禁止文字を入力する",
                 ),

                 'common' => array(
                       'cancelBtn' => "キャンセル",
                       'okBtn' => "確認する",

					   'win_choose'         => 'アップロードするファイルを選択する:',
                       'win_upl_btn'        => '  アップロード  ',
                       'upl_error'          => 'アップロードにエラー発生',
                       'pls_select_file'    => '一つアップロードするファイルを選びなさい',
                       'ext_not_allowed'    => 'FILE_EXT のファイル拡張子は許可されない。次の拡張を持ったファイル選びなさい: ALLOWED_EXT',
                       'size_too_big'       => '共有するファイルのサイズの限界を超えている、もう一度試してください。',
                 ),

                 'sharefile' => array(
					   'chat_users'=> '[チャートルームを共有する]',
					   'all_users' => '[ルームを共有する]',
					   'file_info_size'  => '<br>このファイル最大サイズ MAX_SIZE.',
					   'file_info_ext' => '許可のドキュメントタイプ: ALLOWED_EXT',
					   'win_share_only'=>'共有する',				
					   'usr_message' => '<b>USER_LABEL はファイル共有が希望する</b><br><br>ファイル名： F_NAME<br>ファイルサイズ：F_SIZE',				
			),
			
                 'loadavatarbg' => array(
					   'win_title'  => '背景を設定する',
					   'file_info'  => 'ファイルは非 progressive フォーマットJPG図像でなければならない、あるいは Flash SWF ファイルである。',
					   'use_label'  => 'ファイルを：',
					   'rb_mainchat_avatar' => 'メインチャートルームの個性のイメージ',
					   'rb_roomlist_avatar' => 'ルームの個性のイメージ',
					   'rb_mc_rl_avatar'    => 'メインチャートルームとルームのリストの個性のイメージ',
					   'rb_this_theme'      => 'この主題の背景',
					   'rb_all_themes'      => 'すべての主題の背景',
			),
			
			
		),

           'desktop' => array(
                 'invalidsettings' => "無効な設定です",
                 'selectsmile' => "表情",
                 'sendBtn' => "送る",
                 'saveBtn' => "保存する",
				 'clearBtn' => '削除',
                 'skinBtn' => "オプション",
                 'addRoomBtn' => "追加する",
                 'myStatus' => "自分の状態",
                 'room' => "部屋",
                 'welcome' => "ようこそ USER_LABEL",
                 'ringTheBell' => "返事がない？ベルを鳴らす:",
                 'logOffBtn' => "X",
                 'helpBtn' => "?",
                 'adminSign' => "(M)",
           )
     );
?>