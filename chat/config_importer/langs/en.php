<?php
	$GLOBALS['fc_config']['languages']['en'] = array(
		'name' => "English",

		'messages' => array(
			'ignored' => "'USER_LABEL' is ignoring your messages",
			'banned' => "You've been banned",
			'maxRooms' => "Reached the maximum number of public rooms",
			'login' => 'Please login to the chat',
			'wrongPass' => 'Incorrect user name or password. Please try again.',
			'required' => 'required',
			'anotherlogin' => 'Another user is logged in with this user name. Please try again.',
			'expiredlogin' => 'Your connection has expired. Please re-login.',
			'enterroom' => '[ROOM_LABEL]: USER_LABEL has entered at TIMESTAMP',
			'leaveroom' => '[ROOM_LABEL]: USER_LABEL has left at TIMESTAMP',
			'selfenterroom' => 'Welcome! You have entered [ROOM_LABEL] at TIMESTAMP',
			'bellrang' => 'USER_LABEL rang the bell',
			'chatfull' => 'The chat is full. Please try again later.',
			'iplimit' => 'You are already in the chat.',
			'roomlock' => 'This room is password protected.<br>Please enter the room password:',
			'locked' => 'Invalid password. Please try again.',
			'botfeat' => 'The bot feature is not currently enabled.',
			'securityrisk' => 'The file that you uploaded may contain scripting elements, which could pose a security risk. Please try another file.',
		),

		'usermenu' => array(
			'profile' => 'Profile',
			'unban' => 'Un-ban',
			'ban' => 'Ban',
			'unignore' => 'Un-ignore',
			'fileshare' => 'Share File',
			'ignore' => 'Ignore',
			'invite' => 'Invite',
			'privatemessage' => 'Private message',
		),

		'status' => array(
			'here' => 'Here',
			'busy' => 'Busy',
			'away' => 'Away',
			'brb'  => 'BRB',
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "Room 'ROOM_LABEL' not found",
				'usernotfound' => "User 'USER_LABEL' not found",
				'unbanned' => "You were un-banned by user 'USER_LABEL'",
				'banned' => "You were banned by user 'USER_LABEL'",
				'unignored' => "You were un-ignored by user 'USER_LABEL'",
				'ignored' => "You were ignored by user 'USER_LABEL'",
				'invitationdeclined' => "User 'USER_LABEL' declined your invitation to room 'ROOM_LABEL'",
				'invitationaccepted' => "User 'USER_LABEL' accepted your invitation to room 'ROOM_LABEL'",
				'roomnotcreated' => 'Room was not created',
				'roomisfull' => '[ROOM_LABEL] is full. Please choose another room.',
				'alert' => '<b>ALERT!</b><br>',
				'chatalert' => '<b>ALERT!</b><br>',
				'gag' => "<b>You've been gagged for DURATION minute(s)!</b><br><br>You may view messages in this room, but not contribute ".
						 "new messages to the conversation, until the gag expires.",
				'ungagged' => "You were un-gagged by user 'USER_LABEL'",
				'gagconfirm' => 'USER_LABEL is gagged for MINUTES minute(s).',
				'alertconfirm' => 'USER_LABEL has read the alert.',
				'file_declined' => 'Your file was declined by USER_LABEL.',
				'file_accepted' => 'Your file was accepted by USER_LABEL.',
			),

			'unignore' => array(
				'unignoreBtn' => 'Un-ignore',
				'unignoretext' => 'Enter un-ignore text',
			),

			'unban' => array(
				'unbanBtn' => 'Un-ban',
				'unbantext' => 'Enter un-ban text',
			),

			'tablabels' => array(
				'themes' => 'Themes',
				'sounds' => 'Sounds',
				'text'  => 'Text',
				'effects'  => 'Effects',
				'admin'  => 'Admin',
				'about' => 'About',
			),

			'text' => array(
				'itemChange' => 'Item to Change',
				'fontSize' => 'Font Size',
				'fontFamily' => 'Font Family',
				'language' => 'Language',
				'mainChat' => 'Main Chat',
				'interfaceElements' => 'Interface Elements',
				'title' => 'Title',
				'mytextcolor' => 'Use my text color for all received messages.',
			),

			'effects' => array(
				'avatars' => 'Avatars',
				'photo' => 'Photo',
				'mainchat' => 'Main chat',
				'roomlist' => 'Room list',
				'background' => 'Background',
				'custom' => 'Custom',
				'showBackgroundImages' => 'Show background',
				'splashWindow' => 'Focus window on new message',
				'uiAlpha' => 'Transparency',
			),

			'sound' => array(
				'sampleBtn' => 'Sample',
				'testBtn' => 'Test',
				'muteall' => 'Mute all',
				'submitmessage' => 'Submit message',
				'reveivemessage' => 'Receive message',
				'enterroom' => 'Enter room',
				'leaveroom' => 'Leave room',
				'pan' => 'Pan',
				'volume' => 'Volume',
				'initiallogin' => 'Initial login',
				'logout' => 'Logout',
				'privatemessagereceived' => 'Receive private message',
				'invitationreceived' => 'Receive invitation',
				'combolistopenclose' => "Open/close combobox list",
				'userbannedbooted' => 'User banned or booted',
				'usermenumouseover' => 'User menu mouse over',
				'roomopenclose' => "Open/close room section",
				'popupwindowopen' => 'Popup window opens',
				'popupwindowclosemin' => 'Popup window closes',
				'pressbutton' => 'Key press',
				'otheruserenters' => 'Other user enters room',
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
				'sendBtn' => 'Send',
				'toUser' => 'Talking to USER_LABEL:',
			),

			'login' => array(
				'loginBtn' => 'Login',
				'language' => 'Language:',
				'moderator' => '(if moderator)',
				'password' => 'Password:',
				'username' => 'User name:',
			),

			'invitenotify' => array(
				'declineBtn' => 'Decline',
				'acceptBtn' => 'Accept',
				'userinvited' => "'USER_LABEL' has invited you to chat in 'ROOM_LABEL'",
			),

			'invite' => array(
				'sendBtn' => 'Send',
				'includemessage' => 'Include this message with your invitation:',
				'inviteto' => 'Invite user to:',
			),

			'ignore' => array(
				'ignoreBtn' => 'Ignore',
				'ignoretext' => 'Enter ignore text',
			),

			'createroom' => array(
				'createBtn' => 'Create',
				'private' => 'Private',
				'public' => 'Public',
				'entername' => 'Enter room name',
				'enterpass' => 'Enter a room password or leave blank to allow access without password.',
			),

			'ban' => array(
				'banBtn' => 'Ban',
				'byIP' => 'by IP',
				'fromChat' => 'from chat',
				'fromRoom' => 'from room',
				'banText' => 'Enter ban text',
			),

			'common' => array(
				'cancelBtn' => 'Cancel',
				'okBtn' => 'OK',

				'win_choose'         => 'Choose the file to upload:',
				'win_upl_btn'        => '  Upload  ',
				'upl_error'          => 'File uploading error',
				'pls_select_file'    => 'Please select a file to upload',
				'ext_not_allowed'    => 'The FILE_EXT file extension is not allowed. Please choose a file with one of the these extensions: ALLOWED_EXT',
				'size_too_big'       => 'The file that you have attempted to share exceeds the maximum allowed file size. Please try again.',
			),

			'sharefile' => array(
				'chat_users'=> '[ Share To Chat ]',
				'all_users' => '[ Share To Room ]',
				'file_info_size'  => '<br>The maximum allowed size of this file MAX_SIZE.',
				'file_info_ext' => ' Allowed File Types: ALLOWED_EXT',
				'win_share_only'=>'Share with',
				'usr_message' => '<b>USER_LABEL wants to share a file with you</b><br><br>File name: F_NAME<br>File size: F_SIZE',
			),

			'loadavatarbg' => array(
				'win_title'  => 'Custom Background',
				'file_info'  => 'Your file should be a non-progressive JPG image.',
				'use_label'  => 'Use this file for:',
				'rb_mainchat_avatar' => 'Main chat avatar only',
				'rb_roomlist_avatar' => 'Room list avatar only',
				'rb_mc_rl_avatar'    => 'Both main chat and room list avatars',
				'rb_this_theme'      => 'Background for this theme only',
				'rb_all_themes'      => 'Background for all themes',
			),

			'loadphoto' => array(
				'win_title'  => 'Custom User Photo',
				'file_info'  => 'Your file should be a non-progressive JPG image, GIF image, PNG image.',
			),
		),

		'desktop' => array(
			'invalidsettings' => 'Invalid settings',
			'selectsmile' => 'Smilies',
			'sendBtn' => 'Send',
			'saveBtn' => 'Save',
			'clearBtn' => 'Clear',
			'skinBtn' => 'Options',
			'addRoomBtn' => 'Add',
			'myStatus' => 'My status',
			'room' => 'Room',
			'welcome' => 'Welcome USER_LABEL',
			'ringTheBell' => 'No Answer? Ring The Bell:',
			'logOffBtn' => 'X',
			'helpBtn' => '?',
			'adminSign' => '',
		)
	);
?>