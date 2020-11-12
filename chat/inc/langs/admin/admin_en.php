<?php
	$GLOBALS['fc_config']['languages_admin']['en'] = array(
		'name'=>'English',

		'admin_index.tpl' => array(
			't0' => 'FlashChat Administration Panel',
			't1' => 'This tool is designed to give FlashChat administrators multiple ways to view the chat logs, reset the chat logs, and add/edit/remove rooms.',
			't2' => 'There are {$usrnumb} registered users'
		),

		'banlist.tpl' => array(
			't0' => 'Bans',
			't1' => 'created',
			't2' => 'user',
			't3' => 'banneduser',
			't4' => 'roomid',
			't5' => 'ban level',
			't6' => 'remove ban',
			't7' => 'No bans found.'
		),

		'bot.tpl' => array(
			't0' => 'bot',
			't1' => 'bot name',
			't2' => 'bot room list avatar',
			't3' => 'none',
			't4' => 'bot main chat avatar',
			't5' => 'login into room',
			't6' => 'active when &lt;X users are present',
			't7' => 'active when &gt;X users are present',
			't8' => 'active when using FlashChat in "support" mode',
			't9' => 'active when an admin is not present',
			't10' => 'active when there are no other bots in the room',
			't11' => 'active when a particular user is present',
			't12' => 'Bots is disabled on your system.',
			't13' => 'The bot could not be added because the bot installation was skipped in the FlashChat installer.',
			't14' => 'Please re-run the installer to enable bot support.'
		),

		'botlist.tpl' => array(
			't0' => 'Bots',
			't1' => 'Add new bot',
			't2' => 'Bot Name',
			't3' => 'Delete',
			't4' => 'No bots found.',
			't5' => 'The bot feature is currently disabled. To enable bot support, set "Enable Bots" to "Yes" in the "General Settings" configuration section of this AdminCP.',
			't6' => 'You may need to re-run the FlashChat installer to add the necessary knowledge bases, too.'
		),

		'chatlist.tpl' => array(
			't0' => 'This option is not available when FlashChat is integrated with a custom CMS (content management system).',
			't1' => 'Chats',
			't2' => 'in this room:',
			't3' => 'Any room',
			't4' => 'between these dates:',
			't5' => 'and',
			't6' => 'from the past X days:',
			't7' => 'by initiator:',
			't8' => 'Any user',
			't9' => 'by moderator:',
			't10' => 'Room name',
			't11' => 'Initiator login',
			't12' => 'Moderator login',
			't13' => 'Start',
			't14' => 'End',
			't15' => 'preview',
			't16' => 'No Moderator',
			't17' => 'No chats found.',
			't18' => 'Please use the user administration tools which come with your system to add, edit, or remove users.',
			't19' => 'Show chats',
			't20' => 'Clear filter',
			't21' => 'Remove messages',
			't22' => 'Sent',
			't23' => 'From',
			't24' => 'To',
			't25' => 'Message',
			't26' => 'messages to show'
		),

		'connlist.tpl' => array(
			't0' => 'Connections',
			't1' => 'updated',
			't2' => 'created',
			't3' => 'user',
			't4' => 'roomid',
			't5' => 'state',
			't6' => 'color',
			't7' => 'start',
			't8' => 'lang',
			't9' => 'tzoffset',
			't10' => 'host',
			't11' => 'No connections found.'
		),

		'ignorelist.tpl' => array(
			't0' => 'Ignores',
			't1' => 'created',
			't2' => 'user',
			't3' => 'ignored user',
			't4' => 'remove ignore',
			't5' => 'No ignores found.'
		),

		'logout.tpl' => array(
			't0' => 'FlashChat AdminCP logout',
			't1' => 'You\'ve been logged out.',
			't2' => 'Click here to login',
			't3' => 'If you are using FlashChat integrated with a custom CMS (content management system), then you may still be logged in, depending on how your system stores user data.',
			't4' => 'FlashChat is not installed.'
		),

		'msglist.tpl' => array(
			't0' => 'Messages',
			't1' => 'In this room:',
			't2' => 'Any room',
			't3' => 'Between these dates:',
			't4' => 'and',
			't5' => 'From the past X days:',
			't6' => 'By this user:',
			't7' => 'Any user',
			't8' => 'Containing this keyword:',
			't9' => 'Sent',
			't10' => 'From user',
			't11' => 'To room',
			't12' => 'To user',
			't13' => 'No messages found.',
			't14' => 'Show messages',
			't15' => 'Clear filter',
			't16' => 'Remove messages'
		),

		'nopermit.tpl' => array(
			't0' => 'You do not have the necessary permissions to access this tool.'
		),

		'room.tpl' => array(
			't0' => 'Room',
			't1' => 'name',
			't2' => 'password',
			't3' => 'public',
			't4' => 'permanent',
			't5' => 'Add new room',
			't6' => 'Update room',
			't7' => 'Remove room'
		),

		'uninstall.tpl' => array(
			't0' => 'FlashChat is un-installed succesfully.',
			't1' => 'FlashChat is not installed.',
			't2' => 'Un-install',
			't3' => 'Remove all FlashChat tables from MySQL. This option will allow you to re-run the installer.',
			't4' => 'You may need to re-upload the "install_files" folder and the install.php file before re-install.',
			't5' => 'The following tables will be permanently removed:',
			't6' => 'Remove all config files from cache dir. This option will allow you to re-run the installer.',
			't7' => 'You may need to re-upload the "install_files" folder and the install.php file before re-install.',
			't8' => 'I understand that these actions are not reversible.',
			't9' => 'Are you sure?!? This action is NOT reversible!',
			't10' => 'Continue',
			't11' => 'Cancel'
		),

		'user.tpl' => array(
			't0' => 'This option is not available when FlashChat is integrated with a custom CMS (content management system).',
			't1' => 'user',
			't2' => 'login',
			't3' => 'password',
			't4' => 'role',
			't5' => 'Please use the user administration tools which come with your system to add, edit, or remove users.',
			't6' => 'Add new user',
			't7' => 'Update user',
			't8' => 'Remove user'
		),

		'usrlist.tpl' => array(
			't0' => 'This option is not available when FlashChat is integrated with a custom CMS (content management system).',
			't1' => 'Users',
			't2' => 'Add new user',
			't3' => 'ID',
			't4' => 'login',
			't5' => 'password',
			't6' => 'role',
			't7' => 'No users found',
			't8' => 'Please use the user administration tools which come with your system to add, edit, or remove users.',
			't9' => 'You are using FlashChat in so-called "Stateless CMS" mode, which means that any user can login without a user account, and without providing a password.<br> Administrators may login using any username, with the administrator password defined in the Configuration section. Moderators may login using any username, with the moderator password. Spies may login using any username, with the spy password.',
			't10' => 'You are using FlashChat with existing CMS system. You can edit users in the "Users" section of your CMS system.'
		),

		'top.tpl' => array(
			't0' => 'Home',
			't1' => 'Main',
			't2' => 'Configuration',
			't3' => 'Messages',
			't4' => 'Chats',
			't5' => 'Users',
			't6' => 'Rooms',
			't7' => 'Connections',
			't8' => 'Bans',
			't9' => 'Ignores',
			't10' => 'Bots',
			't11' => 'Un-install',
			't12' => 'Logout'
		),

		'roomlist.tpl' => array(
			't0' => 'Rooms',
			't1' => 'Add new room',
			't2' => 'Name',
			't3' => 'Password',
			't4' => 'Public',
			't5' => 'Permanent',
			't6' => 'Bump up',
			't7' => 'Delete',
			't8' => 'Submit All',
			't9' => 'You must re-load the chat (page refresh) and re-login to see room changes.',
			't10' => 'No rooms found',
			't11' => 'Edit'
		),

		'login.tpl' => array(
			't0' => 'FlashChat Admin Panel Login',
			't1' => 'login',
			't2' => 'password',
			't3' => 'select language',
			't4' => 'login',
			't5' => 'Could not grant admin role for this login and password.',
			't6' => 'FlashChat is not installed.'
		),

		'cnf_top.tpl' => array(
			't0' => 'Chat Instances',
			't1' => 'General settings',
			't2' => 'Connection settings',
			't3' => 'Message storage',
			't4' => 'Theme colors and images',
			't5' => 'Layout manager',
			't6' => 'Font settings',
			't7' => 'Sounds',
			't8' => 'Smilies',
			't9' => 'Avatars',
			't10' => 'File sharing',
			't11' => 'Modules',
			't12' => 'Preloader',
			't13' => 'Logout settings',
			't14' => 'Languages',
			't15' => 'Bad words/Quick text',
			't16' => 'All other settings'
		),

		'cnf_avatars' => array(
			't762' => array(
				'value' => 'Mod Only:'
			),

			't763' => array(
				'value' => 'Main Chat Default Value:',
				'hint' => 'A smilie code'
			),

			't764' => array(
				'value' => 'Main Chat Default State:',
				'hint' => 'On = checken/on by default'
			),

			't765' => array(
				'value' => 'Main Chat Allow Override:',
				'hint' => 'If no, cannot be changed (combo box is disable)'
			),

			't766' => array(
				'value' => 'Room Default Value:',
				'hint' => 'A smilie code'
			),

			't767' => array(
				'value' => 'Room Default State:',
				'hint' => 'On = checken/on by default'
			),

			't768' => array(
				'value' => 'Room Allow Override:',
				'hint' => 'If no, cannot be changed (combo box is disable)'
			),

			't769' => array(
				'value' => 'Main Chat Default Value:',
				'hint' => 'A smilie code'
			),

			't770' => array(
				'value' => 'Main Chat Default State:',
				'hint' => 'On = checken/on by default'
			),

			't771' => array(
				'value' => 'Main Chat Allow Override:',
				'hint' => 'If no, cannot be changed (combo box is disable)'
			),

			't772' => array(
				'value' => 'Room Default Value:',
				'hint' => 'A smilie code'
			),

			't773' => array(
				'value' => 'Room Default State:',
				'hint' => 'On = checken/on by default'
			),

			't774' => array(
				'value' => 'Room allow override:',
				'hint' => 'If no, cannot be changed (combo box is disable)'
			),

			't775' => array(
				'value' => 'Main Chat Default Value:',
				'hint' => 'A smilie code'
			),

			't776' => array(
				'value' => 'Main Chat Default State:',
				'hint' => 'On = checken/on by default'
			),

			't777' => array(
				'value' => 'Main Chat Allow Override:',
				'hint' => 'If no, cannot be changed (combo box is disable)'
			),

			't778' => array(
				'value' => 'Room Default Value:',
				'hint' => 'A smilie code'
			),

			't779' => array(
				'value' => 'Room Default State:',
				'hint' => 'On = checken/on by default'
			),

			't780' => array(
				'value' => 'Room Allow Override:',
				'hint' => 'If no, cannot be changed (combo box is disable)'
			),

			't781' => array(
				'value' => 'Main Chat Default Value:',
				'hint' => 'A smilie code'
			),

			't782' => array(
				'value' => 'Main Chat Default State:',
				'hint' => 'On = checken/on by default'
			),

			't783' => array(
				'value' => 'Main Chat Allow Override:',
				'hint' => 'If no, cannot be changed (combo box is disable)'
			),

			't784' => array(
				'value' => 'Room Default Value:',
				'hint' => 'A smilie code'
			),

			't785' => array(
				'value' => 'Room Default State:',
				'hint' => 'On = checken/on by default'
			),

			't786' => array(
				'value' => 'Room Allow Override:',
				'hint' => 'If no, cannot be changed (combo box is disable)'
			),

			't787' => array(
				'value' => 'Main Chat Default Value:',
				'hint' => 'A smilie code'
			),

			't788' => array(
				'value' => 'Main Chat Default State:',
				'hint' => 'On = checken/on by default'
			),

			't789' => array(
				'value' => 'Main Chat Allow Override:',
				'hint' => 'If no, cannot be changed (combo box is disable)'
			),

			't790' => array(
				'value' => 'Room Default Value:',
				'hint' => 'A smilie code'
			),

			't791' => array(
				'value' => 'Room Default State:',
				'hint' => 'On = checken/on by default'
			),

			't792' => array(
				'value' => 'Room Allow Override:',
				'hint' => 'If no, cannot be changed (combo box is disable)'
			),

			't793' => array(
				'value' => 'Main Chat Default Value:',
				'hint' => 'A smilie code'
			),

			't794' => array(
				'value' => 'Main Chat Default State:',
				'hint' => 'On = checken/on by default'
			),

			't795' => array(
				'value' => 'Main Chat Allow Override:',
				'hint' => 'If no, cannot be changed (combo box is disable)'
			),

			't796' => array(
				'value' => 'Room Default Value:',
				'hint' => 'A smilie code'
			),

			't797' => array(
				'value' => 'Room Default State:',
				'hint' => 'On = checken/on by default'
			),

			't798' => array(
				'value' => 'Room Allow Override:',
				'hint' => 'If no, cannot be changed (combo box is disable)'
			),

			't0' => 'Change setting for:',
			't1' => 'Male Setting',
			't2' => 'Female Setting',
			't3' => 'Save Settings'

		),

		'cnf_badwords' => array(
			't0' => 'Asterisk marks (*) can be used to indicate partial matches. Leave the right-side field emply to use the default substitution text, or input text into the right-side to set a specific substitute text for the bad words.
',
			't2' => 'This feature can also be used for "Quick Text" if there is a phrase that you use frequently. For example "hthar" could be changed to "Hi there, how are you?" by specifying "hthar" as a bad word, and the corresponding sentence as the text substitute.',
			't3' => 'Default Substitute Text:',
			't4' => 'Add',
			't5' => 'On',
			't6' => 'Off',
			't7' => 'Delete',
			't8' => 'Disable All Filters',
			't9' => 'Save Settings',
			't10' => 'Are you sure you want to delete this word?\nNote: This word will be lost.',
		),

		'cnf_conn' => array(
			't23' => array(
				'value' => 'Flood interval:',
				'hint' => 'In seconds, the amount of time that must pass before the user posts another message'
			),

			't24' => array(
				'value' => 'Inactivity interval:',
				'hint' => 'In seconds, if a user has FlashChat open for (inactivity interval) seconds'
			),

			't799' => array(
				'value' => 'Message Request Interval:',
				'hint' => 'Chat refresh time, second'
			),

			't800' => array(
				'value' => 'Message Request Interval Away:',
				'hint' => 'Chat refresh time in alway state, second'
			),

			't802' => array(
				'value' => 'Auto Logout After:',
				'hint' => 'Time of pooling inactivaty after which user is considered logged off, seconds'
			),

			't803' => array(
				'value' => 'Auto Close After:',
				'hint' => 'Time of pooling inactivaty after which connection is removed from database, seconds'
			),

			't804' => array(
				'value' => 'Help Url:',
				'hint' => 'You can use also help.php'
			),

			't801' => array(
				'value' => 'Message Remove After:',
				'hint' => 'Message removed after this time, second'
			)

		),

		'cnf_const' => array(
			't626' => array(
				'value' => 'Default Skin Name:'
			),

			't627' => array(
				'value' => 'Default Skin SWF name:'
			),

			't628' => array(
				'value' => 'Default XP Skin Name:'
			),

			't629' => array(
				'value' => 'Default XP Skin SWF name:'
			),

			't630' => array(
				'value' => 'Default Aqua Skin Name:'
			),

			't631' => array(
				'value' => 'Default Aqua Skin SWF name:'
			),

			't632' => array(
				'value' => 'Default Gradient Skin Name:'
			),

			't633' => array(
				'value' => 'Default Gradient Skin SWF name:'
			)

		),

		'cnf_filesharing' => array(
			't830' => array(
				'value' => 'Allow Share Room:',
				'hint' => 'Moderator can always share width all users in room - this option is only for non-moderators'
			),

			't831' => array(
				'value' => 'Allow Share Chat:',
				'hint' => 'Moderator can always share width all users in chat - this option is only for non-moderators'
			),

			't832' => array(
				'value' => 'Allow File Extensions:',
				'hint' => "Allowed file extensions, comma separated (to allowed all extensions set to \'\')"
			),

			't833' => array(
				'value' => 'Maximum File Size:',
				'hint' => 'Max file size in bytes (2*1024*1024 equals 2Mb)'
			),

			't834' => array(
				'value' => 'Maximum File Hours Life:',
				'hint' => 'Time in hours to store the file on the server (file will be deleted after this time)'
			),

			't835' => array(
				'value' => 'Allow File Extenisons:',
				'hint' => "Allowed file extensions, comma separated (to allow all extensions set to \'\')"
			),

			't836' => array(
				'value' => 'Maximum File Size:',
				'hint' => 'Max file size in bytes (2*1024*1024 equals 2Mb)'
			),

			't837' => array(
				'value' => 'Maximum File Hours Life:',
				'hint' => 'Time in hours to store the file on the server (file will be deleted after this time)'
			),

			't838' => array(
				'value' => 'Allow File Extenisons:',
				'hint' => "Allowed file extensions, comma separated (to allow all extensions set to \'\')"
			),

			't839' => array(
				'value' => 'Maximum File Size:',
				'hint' => 'Max file size in bytes (2*1024*1024 equals 2Mb)'
			),

			't840' => array(
				'value' => 'Maximum File Hours Life:',
				'hint' => 'Time in hours to store the file on the server (file will be deleted after this time)'
			),

			't0' => 'Chat file sharing',
			't1' => 'Avatar background loading',
			't2' => 'User photo loading',
			't3' => 'Yes',
			't4' => 'No',
			't5' => 'Save Settings',
			't6' => 'bytes',
			't7' => 'hours'
		),

		'cnf_font' => array(
			't635' => array(
				'value' => 'Enable Text Color Override:',
				'hint' => 'defaults (presence : is that option visible or hidden)'
			),

			't636' => array(
				'value' => 'Allow Change:',
				'hint' => 'defaults (presence : is that option visible or hidden)'
			),

			't637' => array(
				'value' => 'Default Size:',
				'hint' => 'defaults (presence : is that option visible or hidden)'
			),

			't638' => array(
				'value' => 'Font Family:',
				'hint' => 'defaults (presence : is that option visible or hidden)'
			),

			't639' => array(
				'value' => 'Allow Change:',
				'hint' => 'defaults (presence : is that option visible or hidden)'
			),

			't640' => array(
				'value' => 'Default Size:',
				'hint' => 'defaults (presence : is that option visible or hidden)'
			),

			't641' => array(
				'value' => 'Font Family:',
				'hint' => 'defaults (presence : is that option visible or hidden)'
			),

			't642' => array(
				'value' => 'Allow Change:',
				'hint' => 'defaults (presence : is that option visible or hidden)'
			),

			't643' => array(
				'value' => 'Default Size:',
				'hint' => 'defaults (presence : is that option visible or hidden)'
			),

			't644' => array(
				'value' => 'Font Family:',
				'hint' => 'defaults (presence : is that option visible or hidden)'
			),

			't0' => 'Yes',
			't1' => 'No',
			't2' => 'Main Chat',
			't3' => 'Interface Elements',
			't4' => 'Title',
			't5' => 'Font Size:',
			't6' => 'Font Family:',
			't7' => 'Name',
			't8' => 'Disabled',
			't9' => 'Save Settings'

		),   
		'cnf_general' => array(
			't3' => array(
				'value' => 'Debug mode:',
				'hint' => 'Set to true to run in debug mode.'
			),

			't4' => array(
				'value' => 'FlashChat version:',
				'hint' => 'Architecture release/Feature release/Patch release'
			),

			't5' => array(
				'value' => 'Enable socket server:',
				'hint' => 'Set to true to enable socket server - see online PDF docs for more details.'
			),

			't6' => array(
				'value' => 'Enable "Live Support" mode:',
				'hint' => "Set to true to use chat in \'Live Support\' mode."
			),

			't7' => array(
				'value' => 'Enable error reports:',
				'hint' => 'Set to true to enable error reports.'
			),

			't8' => array(
				'value' => 'Enable Bots:<br>You must re-install FlashChat to enable the Bot option',
				'hint' => 'Set to true to enable bots.'
			),

			't9' => array(
				'value' => 'Virtual IP of bot:',
				'hint' => 'Virtual IP of bot'
			),

			't10' => array(
				'value' => 'Disable user list self menu:',
				'hint' => 'Set to false to allow self pop-up menu.'
			),

			't11' => array(
				'value' => 'Allow confirmation popup window for administrator (moderator):',
				'hint' => 'Set to true to allow confirmation pop-up window for administrator (moderator).'
			),

			't12' => array(
				'value' => 'Label format:',
				'hint' => 'Possible values are any combinations of AVATAR, USER and TIMESTAMP.'
			),

			't13' => array(
				'value' => 'Time stamp format:',
				'hint' => 'Pattern for PHP date function'
			),

			't14' => array(
				'value' => 'Max logins per IP address:',
				'hint' => 'Number of logins allowed per IP address.'
			),

			't15' => array(
				'value' => 'Disabled IRC commands:',
				'hint' => 'You can put list of IRC commands to disable here, like (back, backtime).'
			),

			't16' => array(
				'value' => 'Disabled IRC commands for Moderators:',
				'hint' => 'Moderators Restrictions (which IRC commands are disabled for moderators)'
			),

			't17' => array(
				'value' => 'Moderators Restrictions in Administrator section:',
				'hint' => 'Moderators Restrictions in Admin section (admin.php), like (bots, uninstall, connections, users)'
			),

			't18' => array(
				'value' => 'Maximum input text size:',
				'hint' => 'Maximum input text size, # characters'
			),

			't19' => array(
				'value' => 'Maximum number of the messages chat log:',
				'hint' => 'Maximum number of the messages stored in the chat log.'
			),

			't20' => array(
				'value' => 'Opens all the rooms with users:',
				'hint' => 'If true user list opens all the rooms with users in them.'
			),

			't21' => array(
				'value' => 'Show logout window:',
				'hint' => 'If false, then use only the ....src=logout.php method, but do not use the popup method at all.'
			),

			't22' => array(
				'value' => 'Logout window display time:',
				'hint' => 'In seconds'
			),

			't25' => array(
				'value' => 'Splash chat window when new message is received:',
				'hint' => 'Splash non active chat window when new message is received.'
			),

			't26' => array(
				'value' => 'Default room:',
				'hint' => 'Primary key of room where all users go after login.'
			),

			't27' => array(
				'value' => 'Autoremove room:',
				'hint' => 'Number of seconds before room is removed.'
			),

			't28' => array(
				'value' => 'Room title in userlist:',
				'hint' => 'Format string for room title in userlist.'
			),

			't29' => array(
				'value' => 'Maximum users per room:'
			),

			't30' => array(
				'value' => 'List order:',
				'hint' => 'Options: Alphabetical, A to Z, Order by entry to room, Mods & Admins first, then A to Z, Mods & Admins first, then by entry, order by user status, Mods & Admins first and then by user status'
			),

			't31' => array(
				'value' => 'CMS system:',
				'hint' => 'Default CMS - default CMS, blank - stateless CMS'
			),

			't32' => array(
				'value' => 'Login UTF8 decode:',
				'hint' => 'Possible values - true, false'
			),

			't33' => array(
				'value' => 'Encrypt password:',
				'hint' => 'Option to encrypt user password for default, CMS, can be 1 - encrypt and 0 - no encrypt'
			),

			't34' => array(
				'value' => 'Automotd:',
				'hint' => '1 for on, 0 for off (on means it is displayed upon chat entry)'
			),

			't35' => array(
				'value' => 'Autotopic:',
				'hint' => '1 for on, 0 for off (on means it is displayed upon room entry)'
			),

			't36' => array(
				'value' => 'Administrator Password:<br>only applicable if Stateless (Guest) CMS is used',
				'hint' => 'Allows any user to login as a administrator - stateless CMS mode only'
			),

			't37' => array(
				'value' => 'Moderator Password:<br>only applicable if Stateless (Guest) CMS is used',
				'hint' => 'Allows any user to login as a moderator - stateless CMS mode only'
			),

			't38' => array(
				'value' => 'Spy Password:<br>only applicable if Stateless (Guest) CMS is used',
				'hint' => 'Allows any user to login as a spy - stateless CMS mode only'
			),

			't981' => array(
				'value' => 'Max number of backtime command minutes:',
				'hint' => 'Sets the maximum number of minutes the backtime command will serve up, use 0 to have no max'
			),

			't982' => array(
				'value' => 'Max number of backtime command lines:',
				'hint' => 'Sets the maximum number of lines the back command will serve up, use 0 to have no max'
			),

			't1104' => array(
				'value' => 'Flag wether this is a paid chat instance',
				'hint' => 'Set to 1 if this is a paid instance'
			),

			't1105' => array(
				'value' => 'Membership Amount (if this is a paid chat instance)',
				'hint' => 'If this is a paid instance,please update the amount for membership'
			),

			't1106' => array(
				'value' => 'Specify wether this is a test mode (if this is a paid chat instance)',
				'hint' => 'If this is a paid instance, please specify wether this is a test mode'
			),

			't1107' => array(
				'value' => 'Paypal bussiness email (if this is a paid chat instance)',
				'hint' => 'If this is a paid instance, please specify mention the bussiness email'
			),

			't1108' => array(
				'value' => 'Currency (if this is a paid chat instance)',
				'hint' => "If this is a paid instance,please mention the currency for eg: \'USD\'"
			),

			't1109' => array(
				'value' => 'Enable java socket server:',
				'hint' => 'Set to true to enable socket server - see online PDF docs for more details'
			),

			't1110' => array(
				'value' => 'Cache type: (to change cache settings, you must re-install FlashChat)',
				'hint' => '0 = no caching, 1 = limited caching, 2 = full caching'
			),

			't1111' => array(
				'value' => 'Cache path:',
				'hint' => '0 = no caching, 1 = limited caching, 2 = full caching'
			),

			't1112' => array(
				'value' => 'Cache file prefix:',
				'hint' => '0 = no caching, 1 = limited caching, 2 = full caching'
			),

			't1190' => array(
				'value' => 'User title in userlist:',
				'hint' => 'Possible values are any combinations of AVATAR, USER and STATUS.'
			),

			't2' => array(
				'value' => 'Server time offset:',
				'hint' => 'Sets server time offset (needed only to correct server timezone problem)'
			),

			't1192' => array(
				'value' => 'Line Break Text:',
				'hint' => 'Line break text'
			),

			't1193' => array(
				'value' => 'Volume Increment:',
				'hint' => 'Volume increment'
			),

			't1194' => array(
				'value' => 'Pan Increment:',
				'hint' => 'Pan increment'
			),

			't1195' => array(
				'value' => 'Transparency Increment:',
				'hint' => 'Transparency increment'
			),

			't625' => array(
				'value' => 'Default Theme:'
			),

			't634' => array(
				'value' => 'Default Skin:'
			),

			't670' => array(
				'value' => 'Special language:'
			),

			't805' => array(
				'value' => 'Auto Un-banned After:',
				'hint' => 'Time after user is un-banned, seconds'
			),

			't806' => array(
				'value' => 'Default Language:',
				'hint' => 'Two-letter code of the default language (see below)'
			),

			't807' => array(
				'value' => 'Allow Language:',
				'hint' => 'Allow user to choose another language'
			),
			
			't3008' => array(
			  'hint'=>'Specify which Usergroup to disable commands for'
			),
		  't3006' => array(
		    'hint'=>'Allow guests to login to your CMS'
		  ),
      't3010' => array(
        'hint'=>'Prefix for guest to login'
      )

		),

		'cnf_layout' => array(
			't2000' => array(
				'value' => 'Allow "un-docking" of the panels:'
			),
			't2001' => array(
				'value' => 'Allow "un-docking" of the panels:'
			),
			't2002' => array(
				'value' => 'Allow "un-docking" of the panels:'
			),
			't2003' => array(
				'value' => 'Allow "un-docking" of the panels:'
			),
			't2004' => array(
				'value' => 'Allow "un-docking" of the panels:'
			),
			't39' => array(
				'value' => 'Allow Bans:'
			),

			't40' => array(
				'value' => 'Allow Invitations:'
			),

			't41' => array(
				'value' => 'Allow Ignores:'
			),

			't42' => array(
				'value' => 'Allow Profiles:'
			),

			't43' => array(
				'value' => 'Allow Create Rooms:'
			),

			't44' => array(
				'value' => 'Allow File Shares:'
			),

			't45' => array(
				'value' => 'Allow Custom Backgrounds:',
				'hint' => 'if No, effects tab Customs button disappears'
			),

			't46' => array(
				'value' => 'Show Option Panel:'
			),

			't47' => array(
				'value' => 'Show Input Box:'
			),

			't48' => array(
				'value' => 'Show Private Log:'
			),

			't49' => array(
				'value' => 'Show Public Log:'
			),

			't50' => array(
				'value' => 'Show User List:'
			),

			't51' => array(
				'value' => 'Show Logout:'
			),

			't52' => array(
				'value' => 'Is Single Room Mode:',
				'hint' => 'If yes room drop-down is visible'
			),

			't53' => array(
				'value' => 'Allow Private Message:'
			),

			't54' => array(
				'value' => 'Show Addressee:'
			),

			't55' => array(
				'value' => 'Show status list:'
			),

			't56' => array(
				'value' => 'Show options button:'
			),

			't57' => array(
				'value' => 'Show color list:'
			),

			't58' => array(
				'value' => 'Show save button:'
			),

			't59' => array(
				'value' => 'Show help button:'
			),

			't60' => array(
				'value' => 'Show smilies list:',
				'hint' => 'disable,combo list,popup window'
			),

			't61' => array(
				'value' => 'Show clear button:'
			),

			't62' => array(
				'value' => 'Show bell:'
			),

			't63' => array(
				'value' => 'Themes tab:',
				'hint' => 'which tabs to show in the options panel (about tab cannot be hidden)'
			),

			't64' => array(
				'value' => 'Sounds tab:'
			),

			't65' => array(
				'value' => 'Effects tab:'
			),

			't66' => array(
				'value' => 'Text tab:'
			),

			't67' => array(
				'value' => 'Minimum Width:',
				'hint' => 'Minimal width of user list view, pixels'
			),

			't68' => array(
				'value' => 'Default Width:',
				'hint' => 'Exact width of userlist, percent'
			),

			't69' => array(
				'value' => 'Relative Width;',
				'hint' => 'Relative width of userlist, percent'
			),

			't70' => array(
				'value' => 'Un-docked Width:',
				'hint' => 'Relative width of docked userlist, percent'
			),

			't71' => array(
				'value' => 'Un-docked Height:',
				'hint' => 'Relative height of docked userlist, percent'
			),

			't72' => array(
				'value' => 'Position:',
				'hint' => 'Position on the stage p.v. is RIGHT or LEFT'
			),

			't73' => array(
				'value' => 'Minimum Height:',
				'hint' => 'Minimal height of public log, pixels'
			),

			't74' => array(
				'value' => 'Default Height:',
				'hint' => 'Exact height of public log, pixels'
			),

			't75' => array(
				'value' => 'Relative Height:',
				'hint' => 'Relative height of public log, percent'
			),

			't76' => array(
				'value' => 'Minimum Height:'
			),

			't77' => array(
				'value' => 'Default Height:'
			),

			't78' => array(
				'value' => 'Relative Height:'
			),

			't79' => array(
				'value' => 'Minimum Height:'
			),

			't80' => array(
				'value' => 'Default Height:'
			),

			't81' => array(
				'value' => 'Relative Height:'
			),

			't82' => array(
				'value' => 'Position:',
				'hint' => 'Position on the stage p.v. is BOTTOM or TOP'
			),

			't83' => array(
				'value' => 'Allow Bans:'
			),

			't84' => array(
				'value' => 'Allow Invitations:'
			),

			't85' => array(
				'value' => 'Allow Ignores:'
			),

			't86' => array(
				'value' => 'Allow Profiles:'
			),

			't87' => array(
				'value' => 'Allow Create Rooms:'
			),

			't88' => array(
				'value' => 'Allow File Shares:'
			),

			't89' => array(
				'value' => 'Allow Custom Backgrounds:',
				'hint' => 'If no, effects tab customs button disappears'
			),

			't90' => array(
				'value' => 'Show Option Panel:'
			),

			't91' => array(
				'value' => 'Show Input Box:'
			),

			't92' => array(
				'value' => 'Show Private Log:'
			),

			't93' => array(
				'value' => 'Show Public Log:'
			),

			't94' => array(
				'value' => 'Show User List:'
			),

			't95' => array(
				'value' => 'Show Logout:'
			),

			't96' => array(
				'value' => 'Is Single Room Mode:',
				'hint' => 'If yes room drop-down is visible'
			),

			't97' => array(
				'value' => 'Allow Private Message:'
			),

			't98' => array(
				'value' => 'Show addressee:'
			),

			't99' => array(
				'value' => 'Show status list:'
			),

			't100' => array(
				'value' => 'Show options button:'
			),

			't101' => array(
				'value' => 'Show color list:'
			),

			't102' => array(
				'value' => 'Show save button:'
			),

			't103' => array(
				'value' => 'Show help button:'
			),

			't104' => array(
				'value' => 'Show smilies list:',
				'hint' => 'Disable,combo list,pop-up window'
			),

			't105' => array(
				'value' => 'Show clear button:'
			),

			't106' => array(
				'value' => 'Show bell:'
			),

			't107' => array(
				'value' => 'Themes tab:',
				'hint' => 'Which tabs to show in the options panel (about tab cannot be hidden)'
			),

			't108' => array(
				'value' => 'Sounds tab:'
			),

			't109' => array(
				'value' => 'Effects tab:'
			),

			't110' => array(
				'value' => 'Text tab:'
			),

			't111' => array(
				'value' => 'Minimum Width:',
				'hint' => 'Minimal width of user list view, pixels'
			),

			't112' => array(
				'value' => 'Default Width:',
				'hint' => 'Exact width of userlist, percent'
			),

			't113' => array(
				'value' => 'Relative Width:',
				'hint' => 'Relative width of userlist, percent'
			),

			't114' => array(
				'value' => 'Un-docked Width:',
				'hint' => 'Relative width of docked userlist, percent'
			),

			't115' => array(
				'value' => 'Docked Height:',
				'hint' => 'Relative height of docked userlist, percent'
			),

			't116' => array(
				'value' => 'Position:',
				'hint' => 'Position on the stage p.v. is RIGHT or LEFT'
			),

			't117' => array(
				'value' => 'Minimum Height:',
				'hint' => 'Minimal height of public log, pixels'
			),

			't118' => array(
				'value' => 'Default Height:',
				'hint' => 'Exact height of public log, pixels'
			),

			't119' => array(
				'value' => 'Relative Height:',
				'hint' => 'Relative height of public log, percent'
			),

			't120' => array(
				'value' => 'Minimum Height:'
			),

			't121' => array(
				'value' => 'Default Height:'
			),

			't122' => array(
				'value' => 'Relative Height:'
			),

			't123' => array(
				'value' => 'Minimum Height:'
			),

			't124' => array(
				'value' => 'Default Height:'
			),

			't125' => array(
				'value' => 'Relative Height:'
			),

			't126' => array(
				'value' => 'Position:',
				'hint' => 'Position on the stage p.v. is BOTTOM or TOP'
			),

			't127' => array(
				'value' => 'Allow Ban:'
			),

			't128' => array(
				'value' => 'Allow Invitations:'
			),

			't129' => array(
				'value' => 'Allow Ignores:'
			),

			't130' => array(
				'value' => 'Allow Profiles:'
			),

			't131' => array(
				'value' => 'Allow Create Rooms:'
			),

			't132' => array(
				'value' => 'Allow File Shares:'
			),

			't133' => array(
				'value' => 'Allow Custom Backgrounds:',
				'hint' => 'If no,  effects tab Customs button disappears'
			),

			't134' => array(
				'value' => 'Show Option Panel:'
			),

			't135' => array(
				'value' => 'Show Input Box:'
			),

			't136' => array(
				'value' => 'Show Private Log:'
			),

			't137' => array(
				'value' => 'Show Public Log:'
			),

			't138' => array(
				'value' => 'Show User List:'
			),

			't139' => array(
				'value' => 'Show Logout:'
			),

			't140' => array(
				'value' => 'Is Single Room Mode:',
				'hint' => 'If yes room drop-down is visible'
			),

			't141' => array(
				'value' => 'Allow Private Message:'
			),

			't142' => array(
				'value' => 'Show Addressee:'
			),

			't143' => array(
				'value' => 'Show status list:'
			),

			't144' => array(
				'value' => 'Show options button:'
			),

			't145' => array(
				'value' => 'Show color list:'
			),

			't146' => array(
				'value' => 'Show save button:'
			),

			't147' => array(
				'value' => 'Show help button:'
			),

			't148' => array(
				'value' => 'Show smilies list:',
				'hint' => 'Disable,combo list,pop-up window'
			),

			't149' => array(
				'value' => 'Show clear button:'
			),

			't150' => array(
				'value' => 'Show bell:'
			),

			't151' => array(
				'value' => 'Themes tab:',
				'hint' => 'Which tabs to show in the options panel (about tab cannot be hidden)'
			),

			't152' => array(
				'value' => 'Sounds tab:'
			),

			't153' => array(
				'value' => 'Effects tab:'
			),

			't154' => array(
				'value' => 'Text tab:'
			),

			't155' => array(
				'value' => 'Minimum Width:',
				'hint' => 'Minimal width of user list view, pixels'
			),

			't156' => array(
				'value' => 'Default Width:',
				'hint' => 'Exact width of userlist, percent'
			),

			't157' => array(
				'value' => 'Relative Width:',
				'hint' => 'Relative width of userlist, percent'
			),

			't158' => array(
				'value' => 'Un-docked Width:',
				'hint' => 'Relative width of docked userlist, percent'
			),

			't159' => array(
				'value' => 'Docked Height:',
				'hint' => 'Relative height of docked userlist, percent'
			),

			't160' => array(
				'value' => 'Position:',
				'hint' => 'Position on the stage p.v. is RIGHT or LEFT'
			),

			't161' => array(
				'value' => 'Minimum Height:',
				'hint' => 'Minimal height of public log, pixels'
			),

			't162' => array(
				'value' => 'Default Height:',
				'hint' => 'Exact height of public log, pixels'
			),

			't163' => array(
				'value' => 'Relative Height:',
				'hint' => 'Relative height of public log, percent'
			),

			't164' => array(
				'value' => 'Minimum Height:'
			),

			't165' => array(
				'value' => 'Default Height:'
			),

			't166' => array(
				'value' => 'Relative Height:'
			),

			't167' => array(
				'value' => 'Minimum Height:'
			),

			't168' => array(
				'value' => 'Default Height:'
			),

			't169' => array(
				'value' => 'Relative Height:'
			),

			't170' => array(
				'value' => 'Position:',
				'hint' => 'Position on the stage p.v. is BOTTOM or TOP'
			),

			't171' => array(
				'value' => 'Allow Bans:'
			),

			't172' => array(
				'value' => 'Allow Invitations:'
			),

			't173' => array(
				'value' => 'Allow Ignores:'
			),

			't174' => array(
				'value' => 'Allow Profiles:'
			),

			't175' => array(
				'value' => 'Allow Create Rooms:'
			),

			't176' => array(
				'value' => 'Allow File Shares:'
			),

			't177' => array(
				'value' => 'Allow Custom Backgrounds:',
				'hint' => 'If no, effects tab Customs button disappears'
			),

			't178' => array(
				'value' => 'Show Option Panel:'
			),

			't179' => array(
				'value' => 'Show Input Box:'
			),

			't180' => array(
				'value' => 'Show Private Log:'
			),

			't181' => array(
				'value' => 'Show Public Log:'
			),

			't182' => array(
				'value' => 'Show User List:'
			),

			't183' => array(
				'value' => 'Show Logout:'
			),

			't184' => array(
				'value' => 'Is Single Room Mode:',
				'hint' => 'If yes room drop-down is visible'
			),

			't185' => array(
				'value' => 'Allow Private Message:'
			),

			't186' => array(
				'value' => 'Show Addressee:'
			),

			't187' => array(
				'value' => 'Show status list:'
			),

			't188' => array(
				'value' => 'Show options button:'
			),

			't189' => array(
				'value' => 'Show save button:'
			),

			't190' => array(
				'value' => 'Show help button:'
			),

			't191' => array(
				'value' => 'Show smilies list:',
				'hint' => 'Disable,combo list,pop-up window'
			),

			't192' => array(
				'value' => 'Show color list:'
			),

			't193' => array(
				'value' => 'Show clear button:'
			),

			't194' => array(
				'value' => 'Show bell:'
			),

			't195' => array(
				'value' => 'Themes tab:',
				'hint' => 'which tabs to show in the options panel (about tab cannot be hidden)'
			),

			't196' => array(
				'value' => 'Text tab:'
			),

			't197' => array(
				'value' => 'Effects tab:'
			),

			't198' => array(
				'value' => 'Sounds tab:'
			),

			't199' => array(
				'value' => 'Minimum Width:',
				'hint' => 'minimal width of user list view, pixels'
			),

			't200' => array(
				'value' => 'Default Width:',
				'hint' => 'exact width of userlist, percent'
			),

			't201' => array(
				'value' => 'Relative Width:',
				'hint' => 'relative width of userlist, percent'
			),

			't202' => array(
				'value' => 'Un-docked Width:',
				'hint' => 'relative width of docked userlist, percent'
			),

			't203' => array(
				'value' => 'Docked Height:',
				'hint' => 'relative height of docked userlist, percent'
			),

			't204' => array(
				'value' => 'Position:',
				'hint' => 'position on the stage p.v. is RIGHT or LEFT'
			),

			't205' => array(
				'value' => 'Minimum Height:',
				'hint' => 'minimal height of public log, pixels'
			),

			't206' => array(
				'value' => 'Default Height:',
				'hint' => 'exact height of public log, pixels'
			),

			't207' => array(
				'value' => 'Relative Height:',
				'hint' => 'relative height of public log, percent'
			),

			't208' => array(
				'value' => 'Minimum Height:'
			),

			't209' => array(
				'value' => 'Default height:'
			),

			't210' => array(
				'value' => 'Relative Height:'
			),

			't211' => array(
				'value' => 'Minimum Height:'
			),

			't212' => array(
				'value' => 'Default Height:'
			),

			't213' => array(
				'value' => 'Relative Height:'
			),

			't214' => array(
				'value' => 'Position:',
				'hint' => 'position on the stage p.v. is BOTTOM or TOP'
			),

			't215' => array(
				'value' => 'Allow Bans:'
			),

			't216' => array(
				'value' => 'Allow Invitations:'
			),

			't217' => array(
				'value' => 'Allow Ignores:'
			),

			't218' => array(
				'value' => 'Allow Profiles:'
			),

			't219' => array(
				'value' => 'Allow Create Rooms:'
			),

			't220' => array(
				'value' => 'Allow File Shares:'
			),

			't221' => array(
				'value' => 'Allow Custom Backgrounds:',
				'hint' => 'if No, effects tab Customs button disappears'
			),

			't222' => array(
				'value' => 'Show Option Panel:'
			),

			't223' => array(
				'value' => 'Show Input Box:'
			),

			't224' => array(
				'value' => 'Show Private Log:'
			),

			't225' => array(
				'value' => 'Show Public Log:'
			),

			't226' => array(
				'value' => 'Show User List:'
			),

			't227' => array(
				'value' => 'Show Logout:'
			),

			't228' => array(
				'value' => 'Is Single Room Mode:',
				'hint' => 'if Yes room drop-down is visible'
			),

			't229' => array(
				'value' => 'Allow Private Message:'
			),

			't230' => array(
				'value' => 'Show Addressee:'
			),

			't231' => array(
				'value' => 'Show status list:'
			),

			't232' => array(
				'value' => 'Show options button:'
			),

			't233' => array(
				'value' => 'Show color list:'
			),

			't234' => array(
				'value' => 'Show save button:'
			),

			't235' => array(
				'value' => 'Show help button:'
			),

			't236' => array(
				'value' => 'Show smilies list:',
				'hint' => 'disable,combo list,popup window'
			),

			't237' => array(
				'value' => 'Show clear button:'
			),

			't238' => array(
				'value' => 'Show bell:'
			),

			't239' => array(
				'value' => 'Themes tab:',
				'hint' => 'which tabs to show in the options panel (about tab cannot be hidden)'
			),

			't240' => array(
				'value' => 'Sounds tab:'
			),

			't241' => array(
				'value' => 'Effects tab:'
			),

			't242' => array(
				'value' => 'Text tab:'
			),

			't243' => array(
				'value' => 'Minimum Width:',
				'hint' => 'Minimal width of user list view, pixels'
			),

			't244' => array(
				'value' => 'Default Width:',
				'hint' => 'Exact width of userlist, percent'
			),

			't245' => array(
				'value' => 'Relative Width:',
				'hint' => 'Relative width of userlist, percent'
			),

			't246' => array(
				'value' => 'Un-docked Width:',
				'hint' => 'Relative width of docked userlist, percent'
			),

			't247' => array(
				'value' => 'Docked Height:',
				'hint' => 'Relative height of docked userlist, percent'
			),

			't248' => array(
				'value' => 'Position:',
				'hint' => 'Position on the stage p.v. is RIGHT or LEFT'
			),

			't249' => array(
				'value' => 'Minimum Height:',
				'hint' => 'Minimal height of public log, pixels'
			),

			't250' => array(
				'value' => 'Default Height:',
				'hint' => 'Exact height of public log, pixels'
			),

			't251' => array(
				'value' => 'Relative Height:',
				'hint' => 'Relative height of public log, percent'
			),

			't252' => array(
				'value' => 'Minimum Height:'
			),

			't253' => array(
				'value' => 'Default Height:'
			),

			't254' => array(
				'value' => 'Relative  Height:'
			),

			't255' => array(
				'value' => 'Minimum Height:'
			),

			't256' => array(
				'value' => 'Default Height:'
			),

			't257' => array(
				'value' => 'Relative Height:'
			),

			't258' => array(
				'value' => 'Position:',
				'hint' => 'position on the stage p.v. is BOTTOM or TOP'
			),

			't0' => 'Edit layout for:',
			't1' => 'Yes',
			't2' => 'No',
			't3' => 'Save Settings',
			't4' => 'Toolbar',
			't5' => 'Options Panel',
			't6' => 'User list constraints',
			't7' => 'Public list constraints',
			't8' => 'Private list constraints',
			't9' => 'Input list constraints',
		),

		'cnf_logout' => array(
			't841' => array(
				'value' => 'Close FlashChat:',
				'hint' => 'If yes, then FlashChat window is closed upon logout'
			),

			't842' => array(
				'value' => 'Redirect URL:',
				'hint' => 'Re-directURL must be a valid URL'
			),

			't843' => array(
				'value' => 'URL:',
				'hint' => 'Re-direct must be set to Yes for this to work'
			),

			't844' => array(
				'value' => 'Window:',
				'hint' => 'The window to open into. possible values: _blank, _self,_parent, or a named window'
			),

			't0' => 'Edit layout for:'
		),

		'cnf_modules' => array(
			't845' => array(
				'value' => 'Anchor point:',
				'hint' => 'The anchor point: -1,0,1,2,3 or 4 (0 = centered,1-4=corners of space below roomlist) + 5-12 point'
			),

			't846' => array(
				'value' => 'Path:',
				'hint' => "set to \' \' to disable. To see how this work, use \'banner.swf\' or \'moduletest.swf\'"
			),

			't847' => array(
				'value' => 'Stretch:',
				'hint' => 'If yes, achered SWF is streched horizontally & vertically to fiil all available space'
			),

			't848' => array(
				'value' => 'Default x position:',
				'hint' => "The default \'x\' position of the floating window (when anchor = -1)"
			),

			't849' => array(
				'value' => 'Default y position:',
				'hint' => "The default \'y\' position of the floating window (when anchor = -1)"
			),

			't850' => array(
				'value' => 'Default width:',
				'hint' => 'The default width of the floating window (when anchor = -1)'
			),

			't851' => array(
				'value' => 'Default height:',
				'hint' => 'The default height of the floating window (when anchor = -1)'
			),

			't0' => 'There are no modules.',
			't1' => 'Add New Module',
			't2' => 'Module',
			't3' => 'Yes',
			't4' => 'No',
			't5' => 'Delete',
			't6' => 'Save Settings',
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
				'value' => 'Message Remove After:',
				'hint' => 'message removed after this time, second'
			)

		),

		'cnf_other' => array(
			't625' => array(
				'value' => 'Default Theme:'
			),

			't634' => array(
				'value' => 'Default Skin:'
			),

			't670' => array(
				'value' => 'Special language:'
			),

			't805' => array(
				'value' => 'Auto Un-banned After:',
				'hint' => 'Time after user is un-banned, seconds'
			),

			't806' => array(
				'value' => 'Default Language:',
				'hint' => 'Two-letter code of the default language (see below)'
			),

			't807' => array(
				'value' => 'Allow Language:',
				'hint' => 'Allow user to choose another language'
			),

			't808' => array(
				'value' => 'Base:'
			),

			't809' => array(
				'value' => 'Show IP:',
				'hint' => 'Show the user IP and host at/who if set to Yes'
			),

			't810' => array(
				'value' => 'User PM:',
				'hint' => 'Set to yes to output list of user command to a PM window, no to chat window'
			),

			't811' => array(
				'value' => 'Admin PM:',
				'hint' => 'set to yes to output list of moderator command to a PM window, no to chat window'
			),

			't812' => array(
				'value' => 'Maximum Rooms:',
				'hint' => 'Max number of Public Rooms'
			),

			't0' => 'Yes',
			't1' => 'No',
			't2' => 'Save Settings'
		),

		'cnf_preloader' => array(
			't660' => array(
				'value' => 'Sounds Text:'
			),

			't661' => array(
				'value' => 'Skin Text:'
			),

			't662' => array(
				'value' => 'Main Chat Text:'
			),

			't663' => array(
				'value' => 'Starting Text:'
			),

			't664' => array(
				'value' => 'OK Text:'
			),

			't665' => array(
				'value' => 'Font Family:'
			),

			't666' => array(
				'value' => 'Font Size:'
			),

			't667' => array(
				'value' => 'Font Color:'
			),

			't668' => array(
				'value' => 'Background Color:'
			),

			't669' => array(
				'value' => 'Bar Color:'
			),

			't985' => array(
				'value' => 'Show "Login" button:',
				'hint' => "If false, \'login\' button is hidden"
			),

			't986' => array(
				'value' => 'Show title bar:',
				'hint' => 'If false, title bar is hidden'
			),

			't987' => array(
				'value' => 'Theme:'
			),

			't988' => array(
				'value' => 'Width:'
			),

			't989' => array(
				'value' => 'Height:'
			),

			't990' => array(
				'value' => 'Message inputted:',
				'hint' => 'If true, message appears if not inputted'
			),

			't991' => array(
				'value' => 'Align:',
				'hint' => "\'left\' or \'right\'"
			),

			't992' => array(
				'value' => 'X label:'
			),

			't993' => array(
				'value' => 'Y label:'
			),

			't994' => array(
				'value' => 'X field:'
			),

			't995' => array(
				'value' => 'Y field:'
			),

			't996' => array(
				'value' => 'Text type:'
			),

			't997' => array(
				'value' => 'Text width:'
			),

			't998' => array(
				'value' => 'Message inputted:'
			),

			't999' => array(
				'value' => 'Align:'
			),

			't1000' => array(
				'value' => 'X label:'
			),

			't1001' => array(
				'value' => 'Y label:'
			),

			't1002' => array(
				'value' => 'X field:'
			),

			't1003' => array(
				'value' => 'Y field:'
			),

			't1004' => array(
				'value' => 'Text type:'
			),

			't1005' => array(
				'value' => 'Text width:'
			),

			't1006' => array(
				'value' => 'Align:'
			),

			't1007' => array(
				'value' => 'X label:'
			),

			't1008' => array(
				'value' => 'Y label:'
			),

			't1009' => array(
				'value' => 'X field:'
			),

			't1010' => array(
				'value' => 'Y field:'
			),

			't1011' => array(
				'value' => 'Align:'
			),

			't1012' => array(
				'value' => 'X label'
			),

			't1013' => array(
				'value' => 'Y label'
			),

			't1014' => array(
				'value' => 'X field'
			),

			't1015' => array(
				'value' => 'Y field'
			),

			't1099' => array(
				'value' => 'Message inputted:',
				'hint' => 'If true, message appears if not inputted'
			),

			't1100' => array(
				'value' => 'Message inputted:'
			),

			't0' => 'Login Box Settings',
			't1' => 'Username',
			't2' => 'Password',
			't3' => 'Language',
			't4' => 'Title',
			't5' => 'Click Here to Pick up the color',
			't6' => 'Yes',
			't7' => 'No',
			't8' => 'Save Settings'
		),

		'cnf_smilies' => array(
			't672' => array(
				'value' => 'Smile:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't673' => array(
				'value' => 'Sad:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't674' => array(
				'value' => 'Wink:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't675' => array(
				'value' => 'Laugh:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't676' => array(
				'value' => 'Red:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't677' => array(
				'value' => 'Tongue:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't678' => array(
				'value' => 'Ask:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't679' => array(
				'value' => 'Awe:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't680' => array(
				'value' => 'Baby:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't681' => array(
				'value' => 'Cool:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't682' => array(
				'value' => 'Evil:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't683' => array(
				'value' => 'Grin:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't684' => array(
				'value' => 'Heart:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't685' => array(
				'value' => 'Kiss:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't686' => array(
				'value' => 'Newline:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't687' => array(
				'value' => 'Ninja:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't688' => array(
				'value' => 'Roll:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't689' => array(
				'value' => 'Roll Eyes:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't690' => array(
				'value' => 'Slash:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't691' => array(
				'value' => 'Sleep:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't692' => array(
				'value' => 'Weird:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't693' => array(
				'value' => 'Whistle:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't694' => array(
				'value' => 'Wonder:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't695' => array(
				'value' => 'Call:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't696' => array(
				'value' => 'Cash:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't697' => array(
				'value' => 'Shock:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't698' => array(
				'value' => 'Check:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't699' => array(
				'value' => 'Ball:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't700' => array(
				'value' => 'Clap:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't701' => array(
				'value' => 'Cry:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't702' => array(
				'value' => 'Luck:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't703' => array(
				'value' => 'Nono:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't704' => array(
				'value' => 'Punch:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't705' => array(
				'value' => 'Skull:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't706' => array(
				'value' => 'Yeah:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't707' => array(
				'value' => 'Yinyang:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't708' => array(
				'value' => 'Earth:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't709' => array(
				'value' => 'Huh:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't710' => array(
				'value' => 'Hypno:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't711' => array(
				'value' => 'Java:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't712' => array(
				'value' => 'No:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't713' => array(
				'value' => 'Rain:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't714' => array(
				'value' => 'Rose:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't715' => array(
				'value' => 'Usa:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't716' => array(
				'value' => 'Big Grin:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't717' => array(
				'value' => 'Faint:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't718' => array(
				'value' => 'Ill Content:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't719' => array(
				'value' => 'Meow:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't720' => array(
				'value' => 'Thumbs Down:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't721' => array(
				'value' => 'Thumbs Up:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't722' => array(
				'value' => 'Woof:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't723' => array(
				'value' => 'Beer:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't724' => array(
				'value' => 'Music:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't725' => array(
				'value' => 'Reading:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't726' => array(
				'value' => 'Word Bubble:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't727' => array(
				'value' => 'Female:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't728' => array(
				'value' => 'Female2:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't729' => array(
				'value' => 'Male:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't730' => array(
				'value' => 'Male2:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't731' => array(
				'value' => 'Admin:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't732' => array(
				'value' => 'Moderator:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't733' => array(
				'value' => 'Basketball:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't734' => array(
				'value' => 'Bowling:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't735' => array(
				'value' => 'Cricket:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't736' => array(
				'value' => 'Football:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't737' => array(
				'value' => 'Golf:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't738' => array(
				'value' => 'Hockey:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't739' => array(
				'value' => 'Sailing:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't740' => array(
				'value' => 'Soccer:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't741' => array(
				'value' => 'Tennis:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't742' => array(
				'value' => 'Australia Flag:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't743' => array(
				'value' => 'Brazil:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't744' => array(
				'value' => 'Canada Flag:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't745' => array(
				'value' => 'China:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't746' => array(
				'value' => 'Spain:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't747' => array(
				'value' => 'European Union:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't748' => array(
				'value' => 'France:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't749' => array(
				'value' => 'Germany:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't750' => array(
				'value' => 'Greece:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't751' => array(
				'value' => 'Indian Flag:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't752' => array(
				'value' => 'Italy:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't753' => array(
				'value' => 'Japan:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't754' => array(
				'value' => 'Mexico Flag:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't755' => array(
				'value' => 'Poland Flag:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't756' => array(
				'value' => 'Portugal Flag:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't757' => array(
				'value' => 'Russia:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't758' => array(
				'value' => 'Sweeden:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't759' => array(
				'value' => 'Ukraine Flag:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't760' => array(
				'value' => 'UK:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't761' => array(
				'value' => 'US Map:',
				'hint' => 'Do disable any smilie select "Off"'
			),

			't0' => 'On',
			't1' => 'Off'

		),

    'cnf_sound' => array(
			't259' => array(
				'value' => 'Default Pan:',
				'hint' => 'Range from -100 to 100 (left..right)',
				'r' => '(-100 ... 100)'

			),

			't260' => array(
				'value' => 'Default Volume:',
				'hint' => 'Default sound volume in percent',
				'r' => '(0 ... 100)'
			),

			't261' => array(
				'value' => 'Mute All:',
				'hint' => 'Mute all default settings'
			),

			't262' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't263' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't264' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't265' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't266' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't267' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't268' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't269' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't270' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't271' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't272' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't273' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't274' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't275' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't276' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't277' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't813' => array(
				'value' => 'Ring Bell:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't814' => array(
				'value' => 'Leave Room:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't815' => array(
				'value' => 'Other User Enters:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't816' => array(
				'value' => 'Receive Message:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't817' => array(
				'value' => 'Submit Message:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't818' => array(
				'value' => 'Room Open/Close:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't819' => array(
				'value' => 'Initial Login:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't820' => array(
				'value' => 'Logout:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't821' => array(
				'value' => 'Combo List Open/Close:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't822' => array(
				'value' => 'User Banned/Booted:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't823' => array(
				'value' => 'Invitation Received:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't824' => array(
				'value' => 'Private Message Received:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't825' => array(
				'value' => 'User Menu MouseOver:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't826' => array(
				'value' => 'Popup Open:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't827' => array(
				'value' => 'Popup Close/Minimize:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't828' => array(
				'value' => 'Enter Room:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't829' => array(
				'value' => 'Key Press:',
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't984' => array(
				'hint' => 'Set Yes to activate this sound or No to deactivate'
			),

			't0' => 'Yes',
			't1' => 'No',
			't2' => 'Sound Name',
			't3' => 'Mute',
			't4' => 'Default',
			't5' => 'Save Settings'
		),

		'cnf_theme' => array(
			't278' => array(
				'value' => 'Theme Name:'
			),

			't279' => array(
				'value' => 'Dialog Background:'
			),

			't280' => array(
				'value' => 'Background Image:'
			),

			't282' => array(
				'value' => 'Show Background Image:'
			),

			't283' => array(
				'value' => 'User Interface Transparency:'
			),

			't284' => array(
				'value' => 'Dialog Title Color:'
			),

			't285' => array(
				'value' => 'Dialog Background Color:'
			),

			't286' => array(
				'value' => 'Room Text Color:'
			),

			't287' => array(
				'value' => 'User List Background Color:'
			),

			't288' => array(
				'value' => 'Room Background Color:'
			),

			't289' => array(
				'value' => 'Enter Room Notify Color:'
			),

			't290' => array(
				'value' => 'Button Text Color:'
			),

			't291' => array(
				'value' => 'Button Color:'
			),

			't292' => array(
				'value' => 'Button Press Color:'
			),

			't293' => array(
				'value' => 'Button Border Color:'
			),

			't294' => array(
				'value' => 'Scroll BG Color:'
			),

			't295' => array(
				'value' => 'Scroller BG Color:'
			),

			't296' => array(
				'value' => 'Scroll BG Press Color:'
			),

			't297' => array(
				'value' => 'Input Box Background Color:'
			),

			't298' => array(
				'value' => 'Private Log Background Color:'
			),

			't299' => array(
				'value' => 'Public Log Background Color:'
			),

			't300' => array(
				'value' => 'Border Color:'
			),

			't301' => array(
				'value' => 'Body Text Color:'
			),

			't302' => array(
				'value' => 'Title Text Color:'
			),

			't303' => array(
				'value' => 'Background Color:'
			),

			't304' => array(
				'value' => 'Recommended User Color:'
			),

			't305' => array(
				'value' => 'Close Button Color:'
			),

			't306' => array(
				'value' => 'Close Button Press Color:'
			),

			't307' => array(
				'value' => 'Close Button Border Color:'
			),

			't308' => array(
				'value' => 'Close Button Arrow Color:'
			),

			't309' => array(
				'value' => 'Minimize Button Color:'
			),

			't310' => array(
				'value' => 'Minimize Button Press Color:'
			),

			't311' => array(
				'value' => 'Minimize Button Border Color:'
			),

			't312' => array(
				'value' => 'Check Color:'
			),

			't313' => array(
				'value' => 'Theme Name:'
			),

			't314' => array(
				'value' => 'Dialog Background:'
			),

			't315' => array(
				'value' => 'Background Image:'
			),

			't317' => array(
				'value' => 'Show Background Image:'
			),

			't318' => array(
				'value' => 'User Interface Transparency:'
			),

			't319' => array(
				'value' => 'Dialog Title Color:'
			),

			't320' => array(
				'value' => 'Dialog Background Color:'
			),

			't321' => array(
				'value' => 'Room Text Color:'
			),

			't322' => array(
				'value' => 'Room Background Color:'
			),

			't323' => array(
				'value' => 'User List Background Color:'
			),

			't324' => array(
				'value' => 'Enter Room Notify Color:'
			),

			't325' => array(
				'value' => 'Button Text Color:'
			),

			't326' => array(
				'value' => 'Button Color:'
			),

			't327' => array(
				'value' => 'Button Border Color:'
			),

			't328' => array(
				'value' => 'Input Box Background Color:'
			),

			't329' => array(
				'value' => 'Private Log Background Color:'
			),

			't330' => array(
				'value' => 'Public Log Background Color:'
			),

			't331' => array(
				'value' => 'Border Color:'
			),

			't332' => array(
				'value' => 'Body Text Color:'
			),

			't333' => array(
				'value' => 'Title Text Color:'
			),

			't334' => array(
				'value' => 'Background Color:'
			),

			't335' => array(
				'value' => 'Recommended User Color:'
			),

			't336' => array(
				'value' => 'Close Button Color:'
			),

			't337' => array(
				'value' => 'Close Button Press Color:'
			),

			't338' => array(
				'value' => 'Close Button Border Color:'
			),

			't339' => array(
				'value' => 'Close Button Arrow Color:'
			),

			't340' => array(
				'value' => 'Minimize Button Color:'
			),

			't341' => array(
				'value' => 'Minimize Button Press Color:'
			),

			't342' => array(
				'value' => 'Minimize Button Border Color:'
			),

			't343' => array(
				'value' => 'Check Color:'
			),

			't344' => array(
				'value' => 'Theme Name:'
			),

			't345' => array(
				'value' => 'Dialog Background:'
			),

			't346' => array(
				'value' => 'Background Image:'
			),

			't348' => array(
				'value' => 'Show Background Image:'
			),

			't349' => array(
				'value' => 'User Interface Transparency:'
			),

			't350' => array(
				'value' => 'Dialog Title Color:'
			),

			't351' => array(
				'value' => 'Dialog Background Color:'
			),

			't352' => array(
				'value' => 'Room Text Color:'
			),

			't353' => array(
				'value' => 'User List Background Color:'
			),

			't354' => array(
				'value' => 'Room Background Color:'
			),

			't355' => array(
				'value' => 'Enter Room Notify Color:'
			),

			't356' => array(
				'value' => 'Button Text Color:'
			),

			't357' => array(
				'value' => 'Button Color:'
			),

			't359' => array(
				'value' => 'Button Border Color:'
			),

			't361' => array(
				'value' => 'Input Box Background Color:'
			),

			't362' => array(
				'value' => 'Private Log Background Color:'
			),

			't363' => array(
				'value' => 'Public Log Background Color:'
			),

			't364' => array(
				'value' => 'Border Color:'
			),

			't365' => array(
				'value' => 'Body Text Color:'
			),

			't366' => array(
				'value' => 'Title Text Color:'
			),

			't367' => array(
				'value' => 'Background Color:'
			),

			't368' => array(
				'value' => 'Recommended User Color:'
			),

			't369' => array(
				'value' => 'Close Button Color:'
			),

			't370' => array(
				'value' => 'Close Button Press Color:'
			),

			't371' => array(
				'value' => 'Close Button Border Color:'
			),

			't372' => array(
				'value' => 'Close Button Arrow Color:'
			),

			't373' => array(
				'value' => 'Minimize Button Color:'
			),

			't374' => array(
				'value' => 'Minimize Button Press Color:'
			),

			't375' => array(
				'value' => 'Minimize Button Border Color:'
			),

			't376' => array(
				'value' => 'Check Color:'
			),

			't377' => array(
				'value' => 'Theme Name:'
			),

			't378' => array(
				'value' => 'Dialog Background:'
			),

			't379' => array(
				'value' => 'Background Image:'
			),

			't381' => array(
				'value' => 'Show Background Image:'
			),

			't382' => array(
				'value' => 'User Interface Transparency:'
			),

			't383' => array(
				'value' => 'Dialog Title Color:'
			),

			't384' => array(
				'value' => 'Dialog Background Color:'
			),

			't385' => array(
				'value' => 'Room Text Color:'
			),

			't386' => array(
				'value' => 'Room Background Color:'
			),

			't387' => array(
				'value' => 'User List Background Color:'
			),

			't388' => array(
				'value' => 'Enter Room Notify Color:'
			),

			't389' => array(
				'value' => 'Button Text Color:'
			),

			't390' => array(
				'value' => 'Button Color:'
			),

			't391' => array(
				'value' => 'Button Border Color:'
			),

			't392' => array(
				'value' => 'Input Box Background Color:'
			),

			't393' => array(
				'value' => 'Private Log Background Color:'
			),

			't394' => array(
				'value' => 'Public Log Background Color:'
			),

			't395' => array(
				'value' => 'Border Color:'
			),

			't396' => array(
				'value' => 'Body Text Color:'
			),

			't397' => array(
				'value' => 'Title Text Color:'
			),

			't398' => array(
				'value' => 'Background Color:'
			),

			't399' => array(
				'value' => 'Recommended User Color:'
			),

			't400' => array(
				'value' => 'Close Button Color:'
			),

			't401' => array(
				'value' => 'Close Button Press Color:'
			),

			't402' => array(
				'value' => 'Close Button Border Color:'
			),

			't403' => array(
				'value' => 'Close Button Arrow Color:'
			),

			't404' => array(
				'value' => 'Minimize Button Color:'
			),

			't405' => array(
				'value' => 'Minimize Button Press Color:'
			),

			't406' => array(
				'value' => 'Minimize Button Border Color:'
			),

			't407' => array(
				'value' => 'Check Color:'
			),

			't408' => array(
				'value' => 'Theme Name:'
			),

			't409' => array(
				'value' => 'Dialog Background:'
			),

			't410' => array(
				'value' => 'Background Image:'
			),

			't412' => array(
				'value' => 'Show Background Image:'
			),

			't413' => array(
				'value' => 'User Interface Transparency:'
			),

			't414' => array(
				'value' => 'Dialog Title Color:'
			),

			't415' => array(
				'value' => 'Dialog Background Color:'
			),

			't416' => array(
				'value' => 'Room Text Color:'
			),

			't417' => array(
				'value' => 'Room Background Color:'
			),

			't418' => array(
				'value' => 'User List Background Color:'
			),

			't419' => array(
				'value' => 'Enter Room Notify Color:'
			),

			't420' => array(
				'value' => 'Button Text Color:'
			),

			't421' => array(
				'value' => 'Button Color:'
			),

			't422' => array(
				'value' => 'Button Border Color:'
			),

			't423' => array(
				'value' => 'Input Box Background Color:'
			),

			't424' => array(
				'value' => 'Private Log Background Color:'
			),

			't425' => array(
				'value' => 'Public Log Background Color:'
			),

			't426' => array(
				'value' => 'Border Color:'
			),

			't427' => array(
				'value' => 'Body Text Color:'
			),

			't428' => array(
				'value' => 'Title Text Color:'
			),

			't429' => array(
				'value' => 'Background Color:'
			),

			't430' => array(
				'value' => 'Recommended User Color:'
			),

			't431' => array(
				'value' => 'Close Button Color:'
			),

			't432' => array(
				'value' => 'Close Button Press Color:'
			),

			't433' => array(
				'value' => 'Close Button Border Color:'
			),

			't434' => array(
				'value' => 'Close Button Arrow Color:'
			),

			't435' => array(
				'value' => 'Minimize Button Color:'
			),

			't436' => array(
				'value' => 'Minimize Button Press Color:'
			),

			't437' => array(
				'value' => 'Minimize Button Border Color:'
			),

			't438' => array(
				'value' => 'Check Color:'
			),

			't439' => array(
				'value' => 'Theme Name:'
			),

			't440' => array(
				'value' => 'Dialog Background:'
			),

			't441' => array(
				'value' => 'Background Image:'
			),

			't443' => array(
				'value' => 'Show Background Image:'
			),

			't444' => array(
				'value' => 'User Interface Transparency:'
			),

			't445' => array(
				'value' => 'Dialog Title Color:'
			),

			't446' => array(
				'value' => 'Dialog Background Color:'
			),

			't447' => array(
				'value' => 'Room Text Color:'
			),

			't448' => array(
				'value' => 'Room Background Color:'
			),

			't449' => array(
				'value' => 'User List Background Color:'
			),

			't450' => array(
				'value' => 'Enter Room Notify Color:'
			),

			't451' => array(
				'value' => 'Button Text Color:'
			),

			't452' => array(
				'value' => 'Button Color:'
			),

			't453' => array(
				'value' => 'Button Border Color:'
			),

			't454' => array(
				'value' => 'Input Box Background Color:'
			),

			't455' => array(
				'value' => 'Private Log Background Color:'
			),

			't456' => array(
				'value' => 'Public Log Background Color:'
			),

			't457' => array(
				'value' => 'Border Color:'
			),

			't458' => array(
				'value' => 'Body Text Color:'
			),

			't459' => array(
				'value' => 'Title Text Color:'
			),

			't460' => array(
				'value' => 'Background Color:'
			),

			't461' => array(
				'value' => 'Recommended User Color:'
			),

			't462' => array(
				'value' => 'Close Button Color:'
			),

			't463' => array(
				'value' => 'Close Button Press Color:'
			),

			't464' => array(
				'value' => 'Close Button Border Color:'
			),

			't465' => array(
				'value' => 'Close Button Arrow Color:'
			),

			't466' => array(
				'value' => 'Minimize Button Color:'
			),

			't467' => array(
				'value' => 'Minimize Button Press Color:'
			),

			't468' => array(
				'value' => 'Minimize Button Border Color:'
			),

			't469' => array(
				'value' => 'Check Color:'
			),

			't470' => array(
				'value' => 'Theme Name:'
			),

			't471' => array(
				'value' => 'Dialog Background:'
			),

			't472' => array(
				'value' => 'Background Image:'
			),

			't474' => array(
				'value' => 'Show Background Image:'
			),

			't475' => array(
				'value' => 'User Interface Transparency:'
			),

			't476' => array(
				'value' => 'Dialog Title Color:'
			),

			't477' => array(
				'value' => 'Dialog Background Color:'
			),

			't478' => array(
				'value' => 'Room Text Color:'
			),

			't479' => array(
				'value' => 'Room Background Color:'
			),

			't480' => array(
				'value' => 'User List Background Color:'
			),

			't481' => array(
				'value' => 'Enter Room Notify Color:'
			),

			't482' => array(
				'value' => 'Button Text Color:'
			),

			't483' => array(
				'value' => 'Button Color:'
			),

			't484' => array(
				'value' => 'Button Border Color:'
			),

			't485' => array(
				'value' => 'Input Box Background Color:'
			),

			't486' => array(
				'value' => 'Private Log Background Color:'
			),

			't487' => array(
				'value' => 'Public Log Background Color:'
			),

			't488' => array(
				'value' => 'Border Color:'
			),

			't489' => array(
				'value' => 'Body Text Color:'
			),

			't490' => array(
				'value' => 'Title Text Color:'
			),

			't491' => array(
				'value' => 'Background Color:'
			),

			't492' => array(
				'value' => 'Recommended User Color:'
			),

			't493' => array(
				'value' => 'Close Button Color:'
			),

			't494' => array(
				'value' => 'Close Button Press Color:'
			),

			't495' => array(
				'value' => 'Close Button Border Color:'
			),

			't496' => array(
				'value' => 'Close Button Arrow Color:'
			),

			't497' => array(
				'value' => 'Minimize Button Color:'
			),

			't498' => array(
				'value' => 'Minimize Button Press Color:'
			),

			't499' => array(
				'value' => 'Minimize Button Border Color:'
			),

			't500' => array(
				'value' => 'Check Color:'
			),

			't501' => array(
				'value' => 'Theme Name:'
			),

			't502' => array(
				'value' => 'Dialog Background:'
			),

			't503' => array(
				'value' => 'Background Image:'
			),

			't505' => array(
				'value' => 'Show Background Image:'
			),

			't506' => array(
				'value' => 'User Interface Transparency:'
			),

			't507' => array(
				'value' => 'Dialog Title Color:'
			),

			't508' => array(
				'value' => 'Dialog Background Color:'
			),

			't509' => array(
				'value' => 'Room Text Color:'
			),

			't510' => array(
				'value' => 'Room Background Color:'
			),

			't511' => array(
				'value' => 'User List Background Color:'
			),

			't512' => array(
				'value' => 'Enter Room Notify Color:'
			),

			't513' => array(
				'value' => 'Button Text Color:'
			),

			't514' => array(
				'value' => 'Button Color:'
			),

			't515' => array(
				'value' => 'Button Border Color:'
			),

			't516' => array(
				'value' => 'Input Box Background Color:'
			),

			't517' => array(
				'value' => 'Private Log Background Color:'
			),

			't518' => array(
				'value' => 'Public Log Background Color:'
			),

			't519' => array(
				'value' => 'Border Color:'
			),

			't520' => array(
				'value' => 'Body Text Color:'
			),

			't521' => array(
				'value' => 'Title Text Color:'
			),

			't522' => array(
				'value' => 'Background Color:'
			),

			't523' => array(
				'value' => 'Recommended User Color:'
			),

			't524' => array(
				'value' => 'Close Button Color:'
			),

			't525' => array(
				'value' => 'Close Button Press Color:'
			),

			't526' => array(
				'value' => 'Close Button Border Color:'
			),

			't527' => array(
				'value' => 'Close Button Arrow Color:'
			),

			't528' => array(
				'value' => 'Minimize Button Color:'
			),

			't529' => array(
				'value' => 'Minimize Button Press Color:'
			),

			't530' => array(
				'value' => 'Minimize Button Border Color:'
			),

			't531' => array(
				'value' => 'Check Color:'
			),

			't532' => array(
				'value' => 'Theme Name:'
			),

			't533' => array(
				'value' => 'Dialog Background:'
			),

			't534' => array(
				'value' => 'Background Image:'
			),

			't536' => array(
				'value' => 'Show Background Image:'
			),

			't537' => array(
				'value' => 'User Interface Transparency:'
			),

			't538' => array(
				'value' => 'Dialog Title Color:'
			),

			't539' => array(
				'value' => 'Dialog Background Color:'
			),

			't540' => array(
				'value' => 'Room Text Color:'
			),

			't541' => array(
				'value' => 'Room Background Color:'
			),

			't542' => array(
				'value' => 'User List Background Color:'
			),

			't543' => array(
				'value' => 'Enter Room Notify Color:'
			),

			't544' => array(
				'value' => 'Button Text Color:'
			),

			't545' => array(
				'value' => 'Button Color:'
			),

			't546' => array(
				'value' => 'Button Border Color:'
			),

			't547' => array(
				'value' => 'Input Box Background Color:'
			),

			't548' => array(
				'value' => 'Private Log Background Color:'
			),

			't549' => array(
				'value' => 'Public Log Background Color:'
			),

			't550' => array(
				'value' => 'Border Color:'
			),

			't551' => array(
				'value' => 'Body Text Color:'
			),

			't552' => array(
				'value' => 'Title Text Color:'
			),

			't553' => array(
				'value' => 'Background Color:'
			),

			't554' => array(
				'value' => 'Recommended User Color:'
			),

			't555' => array(
				'value' => 'Close Button Color:'
			),

			't556' => array(
				'value' => 'Close Button Press Color:'
			),

			't557' => array(
				'value' => 'Close Button Border Color:'
			),

			't558' => array(
				'value' => 'Close Button Arrow Color:'
			),

			't559' => array(
				'value' => 'Minimize Button Color:'
			),

			't560' => array(
				'value' => 'Minimize Button Press Color:'
			),

			't561' => array(
				'value' => 'Minimize Button Border Color:'
			),

			't562' => array(
				'value' => 'Check Color:'
			),

			't563' => array(
				'value' => 'Theme Name:'
			),

			't564' => array(
				'value' => 'Dialog Background:'
			),

			't565' => array(
				'value' => 'Background Image:'
			),

			't567' => array(
				'value' => 'Show Background Image:'
			),

			't568' => array(
				'value' => 'User Interface Transparency:'
			),

			't569' => array(
				'value' => 'Dialog Title Color:'
			),

			't570' => array(
				'value' => 'Dialog Background Color:'
			),

			't571' => array(
				'value' => 'Room Text Color:'
			),

			't572' => array(
				'value' => 'Room Background Color:'
			),

			't573' => array(
				'value' => 'User List Background Color:'
			),

			't574' => array(
				'value' => 'Enter Room Notify Color:'
			),

			't575' => array(
				'value' => 'Button Text Color:'
			),

			't576' => array(
				'value' => 'Button Color:'
			),

			't577' => array(
				'value' => 'Button Border Color:'
			),

			't578' => array(
				'value' => 'Input Box Background Color:'
			),

			't579' => array(
				'value' => 'Private Log Background Color:'
			),

			't580' => array(
				'value' => 'Public Log Background Color:'
			),

			't581' => array(
				'value' => 'Border Color:'
			),

			't582' => array(
				'value' => 'Body Text Color:'
			),

			't583' => array(
				'value' => 'Title Text Color:'
			),

			't584' => array(
				'value' => 'Background Color:'
			),

			't585' => array(
				'value' => 'Recommended User Color:'
			),

			't586' => array(
				'value' => 'Close Button Color:'
			),

			't587' => array(
				'value' => 'Close Button Press Color:'
			),

			't588' => array(
				'value' => 'Close Button Border Color:'
			),

			't589' => array(
				'value' => 'Close Button Arrow Color:'
			),

			't590' => array(
				'value' => 'Minimise Button Color:'
			),

			't591' => array(
				'value' => 'Minimise Button Press Color:'
			),

			't592' => array(
				'value' => 'Minimise Button Border Color:'
			),

			't593' => array(
				'value' => 'Check Color:'
			),

			't594' => array(
				'value' => 'Theme Name:'
			),

			't595' => array(
				'value' => 'Dialog Background:'
			),

			't596' => array(
				'value' => 'Background Image:'
			),

			't598' => array(
				'value' => 'Show Background Image:'
			),

			't599' => array(
				'value' => 'User Interface Transparency:'
			),

			't600' => array(
				'value' => 'Dialog Title Color:'
			),

			't601' => array(
				'value' => 'Dialog Background Color:'
			),

			't602' => array(
				'value' => 'Room Text Color:'
			),

			't603' => array(
				'value' => 'Room Background Color:'
			),

			't604' => array(
				'value' => 'User List Background Color:'
			),

			't605' => array(
				'value' => 'Enter Room Notify Color:'
			),

			't606' => array(
				'value' => 'Button Text Color:'
			),

			't607' => array(
				'value' => 'Button Color:'
			),

			't608' => array(
				'value' => 'Button Border Color:'
			),

			't609' => array(
				'value' => 'Input Box Background Color:'
			),

			't610' => array(
				'value' => 'Private Log Background Color:'
			),

			't611' => array(
				'value' => 'Public Log Background Color:'
			),

			't612' => array(
				'value' => 'Border Color:'
			),

			't613' => array(
				'value' => 'Body Text Color:'
			),

			't614' => array(
				'value' => 'Title Text Color:'
			),

			't615' => array(
				'value' => 'Background Color:'
			),

			't616' => array(
				'value' => 'Recommended User Color:'
			),

			't617' => array(
				'value' => 'Close Button Color:'
			),

			't618' => array(
				'value' => 'Close Button Press Color:'
			),

			't619' => array(
				'value' => 'Close Button Border Color:'
			),

			't620' => array(
				'value' => 'Close Button Arrow Color:'
			),

			't621' => array(
				'value' => 'Minimise Button Color:'
			),

			't622' => array(
				'value' => 'Minimise Button Press Color:'
			),

			't623' => array(
				'value' => 'Minimise Button Border Color:'
			),

			't624' => array(
				'value' => 'Check Color:'
			),

			't1016' => array(
				'value' => 'Controls Background'
			),

			't1017' => array(
				'value' => 'Headline'
			),

			't1018' => array(
				'value' => 'Scroll Border'
			),

			't1019' => array(
				'value' => 'User List Item'
			),

			't1020' => array(
				'value' => 'Button Press'
			),

			't1021' => array(
				'value' => 'Controls Background'
			),

			't1022' => array(
				'value' => 'Headline'
			),

			't1023' => array(
				'value' => 'Scroll Background'
			),

			't1024' => array(
				'value' => 'Scroll Background Press'
			),

			't1025' => array(
				'value' => 'Scroll Border'
			),

			't1026' => array(
				'value' => 'Scroller Background'
			),

			't1027' => array(
				'value' => 'User List Item'
			),

			't1028' => array(
				'value' => 'Controls Background'
			),

			't1029' => array(
				'value' => 'Headline'
			),

			't1030' => array(
				'value' => 'Scroll Background'
			),

			't1031' => array(
				'value' => 'Scroll Background Press'
			),

			't1032' => array(
				'value' => 'Scroll Border'
			),

			't1033' => array(
				'value' => 'User List Item'
			),

			't1034' => array(
				'value' => 'Button Press'
			),

			't1035' => array(
				'value' => 'Controls Background'
			),

			't1036' => array(
				'value' => 'Headline'
			),

			't1037' => array(
				'value' => 'Scroll Background'
			),

			't1038' => array(
				'value' => 'Scroll Background Press'
			),

			't1039' => array(
				'value' => 'Scroll Border'
			),

			't1040' => array(
				'value' => 'Scroller Background'
			),

			't1041' => array(
				'value' => 'User List Item'
			),

			't1042' => array(
				'value' => 'Button Press'
			),

			't1043' => array(
				'value' => 'Controls Background'
			),

			't1044' => array(
				'value' => 'Headline'
			),

			't1045' => array(
				'value' => 'Scroll Background'
			),

			't1046' => array(
				'value' => 'Scroll Background Press'
			),

			't1047' => array(
				'value' => 'Scroll Border'
			),

			't1048' => array(
				'value' => 'Scroller Background'
			),

			't1049' => array(
				'value' => 'User List Item'
			),

			't1050' => array(
				'value' => 'Button Press'
			),

			't1051' => array(
				'value' => 'Controls Background'
			),

			't1052' => array(
				'value' => 'Headline'
			),

			't1053' => array(
				'value' => 'Scroll Background'
			),

			't1054' => array(
				'value' => 'Scroll Background Press'
			),

			't1055' => array(
				'value' => 'Scroll Border'
			),

			't1056' => array(
				'value' => 'Scroller Background'
			),

			't1057' => array(
				'value' => 'User List Item'
			),

			't1058' => array(
				'value' => 'Button Press'
			),

			't1059' => array(
				'value' => 'Controls Background'
			),

			't1060' => array(
				'value' => 'Headline'
			),

			't1061' => array(
				'value' => 'Scroll Background'
			),

			't1062' => array(
				'value' => 'Scroll Background Press'
			),

			't1063' => array(
				'value' => 'Scroll Border'
			),

			't1064' => array(
				'value' => 'Scroller Background'
			),

			't1065' => array(
				'value' => 'User List Item'
			),

			't1066' => array(
				'value' => 'Button Press'
			),

			't1067' => array(
				'value' => 'Controls Background'
			),

			't1068' => array(
				'value' => 'Headline'
			),

			't1069' => array(
				'value' => 'Scroll Background'
			),

			't1070' => array(
				'value' => 'Scroll Background Press'
			),

			't1071' => array(
				'value' => 'Scroll Border'
			),

			't1072' => array(
				'value' => 'Scroller Background'
			),

			't1073' => array(
				'value' => 'User List Item'
			),

			't1074' => array(
				'value' => 'Button Press'
			),

			't1075' => array(
				'value' => 'Controls Background'
			),

			't1076' => array(
				'value' => 'Headline'
			),

			't1077' => array(
				'value' => 'Scroll Background'
			),

			't1078' => array(
				'value' => 'Scroll Background Press'
			),

			't1079' => array(
				'value' => 'Scroll Border'
			),

			't1080' => array(
				'value' => 'Scroller Background'
			),

			't1081' => array(
				'value' => 'User List Item'
			),

			't1082' => array(
				'value' => 'Button Press'
			),

			't1083' => array(
				'value' => 'Controls Background'
			),

			't1084' => array(
				'value' => 'Headline'
			),

			't1085' => array(
				'value' => 'Scroll Background'
			),

			't1086' => array(
				'value' => 'Scroll Background Press'
			),

			't1087' => array(
				'value' => 'Scroll Border'
			),

			't1088' => array(
				'value' => 'Scroller Background'
			),

			't1089' => array(
				'value' => 'User List Item'
			),

			't1090' => array(
				'value' => 'Button Press'
			),

			't1091' => array(
				'value' => 'Controls Background'
			),

			't1092' => array(
				'value' => 'Headline'
			),

			't1093' => array(
				'value' => 'Scroll Background'
			),

			't1094' => array(
				'value' => 'Scroll Background Press'
			),

			't1095' => array(
				'value' => 'Scroll Border'
			),

			't1096' => array(
				'value' => 'Scroller Background'
			),

			't1097' => array(
				'value' => 'User List Item'
			),

			't1113' => array(
				'value' => 'Button Press Color:'
			),

			't1114' => array(
				'value' => 'Scroll BG Color:'
			),

			't1118' => array(
				'value' => 'Theme Name:'
			),

			't1119' => array(
				'value' => 'Dialog Background:'
			),

			't1120' => array(
				'value' => 'Background Image:'
			),

			't1122' => array(
				'value' => 'Show Background Image:'
			),

			't1123' => array(
				'value' => 'User Interface Transparency:'
			),

			't1124' => array(
				'value' => 'Dialog Title Color:'
			),

			't1125' => array(
				'value' => 'Dialog Background Color:'
			),

			't1126' => array(
				'value' => 'Room Text Color:'
			),

			't1127' => array(
				'value' => 'Room Background Color:'
			),

			't1128' => array(
				'value' => 'User List Background Color:'
			),

			't1129' => array(
				'value' => 'Enter Room Notify Color:'
			),

			't1130' => array(
				'value' => 'Button Text Color:'
			),

			't1131' => array(
				'value' => 'Button Color:'
			),

			't1132' => array(
				'value' => 'Button Border Color:'
			),

			't1133' => array(
				'value' => 'Input Box Background Color:'
			),

			't1134' => array(
				'value' => 'Private Log Background Color:'
			),

			't1135' => array(
				'value' => 'Public Log Background Color:'
			),

			't1136' => array(
				'value' => 'Border Color:'
			),

			't1137' => array(
				'value' => 'Body Text Color:'
			),

			't1138' => array(
				'value' => 'Title Text Color:'
			),

			't1139' => array(
				'value' => 'Background Color:'
			),

			't1140' => array(
				'value' => 'Recommended User Color:'
			),

			't1141' => array(
				'value' => 'Close Button Color:'
			),

			't1142' => array(
				'value' => 'Close Button Press Color:'
			),

			't1143' => array(
				'value' => 'Close Button Border Color:'
			),

			't1144' => array(
				'value' => 'Close Button Arrow Color:'
			),

			't1145' => array(
				'value' => 'Minimise Button Color:'
			),

			't1146' => array(
				'value' => 'Minimise Button Press Color:'
			),

			't1147' => array(
				'value' => 'Minimise Button Border Color:'
			),

			't1148' => array(
				'value' => 'Check Color:'
			),

			't1149' => array(
				'value' => 'Button Press'
			),

			't1150' => array(
				'value' => 'Controls Background'
			),

			't1151' => array(
				'value' => 'Headline'
			),

			't1152' => array(
				'value' => 'Scroll Background'
			),

			't1153' => array(
				'value' => 'Scroll Background Press'
			),

			't1154' => array(
				'value' => 'Scroll Border'
			),

			't1155' => array(
				'value' => 'Scroller Background'
			),

			't1156' => array(
				'value' => 'User List Item'
			),

			't1157' => array(
				'value' => 'Theme Name:'
			),

			't1158' => array(
				'value' => 'Dialog Background:'
			),

			't1159' => array(
				'value' => 'Background Image:'
			),

			't1161' => array(
				'value' => 'Show Background Image:'
			),

			't1162' => array(
				'value' => 'User Interface Transparency:'
			),

			't1163' => array(
				'value' => 'Dialog Title Color:'
			),

			't1164' => array(
				'value' => 'Dialog Background Color:'
			),

			't1165' => array(
				'value' => 'Room Text Color:'
			),

			't1166' => array(
				'value' => 'User List Background Color:'
			),

			't1167' => array(
				'value' => 'Room Background Color:'
			),

			't1168' => array(
				'value' => 'Enter Room Notify Color:'
			),

			't1169' => array(
				'value' => 'Button Text Color:'
			),

			't1170' => array(
				'value' => 'Button Color:'
			),

			't1171' => array(
				'value' => 'Button Press Color:'
			),

			't1172' => array(
				'value' => 'Button Border Color:'
			),

			't1173' => array(
				'value' => 'Scroller BG Color:'
			),

			't1174' => array(
				'value' => 'Input Box Background Color:'
			),

			't1175' => array(
				'value' => 'Private Log Background Color:'
			),

			't1176' => array(
				'value' => 'Public Log Background Color:'
			),

			't1177' => array(
				'value' => 'Border Color:'
			),

			't1178' => array(
				'value' => 'Body Text Color:'
			),

			't1179' => array(
				'value' => 'Title Text Color:'
			),

			't1180' => array(
				'value' => 'Background Color:'
			),

			't1181' => array(
				'value' => 'Recommended User Color:'
			),

			't1182' => array(
				'value' => 'Close Button Color:'
			),

			't1183' => array(
				'value' => 'Close Button Press Color:'
			),

			't1184' => array(
				'value' => 'Close Button Border Color:'
			),

			't1185' => array(
				'value' => 'Close Button Arrow Color:'
			),

			't1186' => array(
				'value' => 'Minimise Button Color:'
			),

			't1187' => array(
				'value' => 'Minimise Button Press Color:'
			),

			't1188' => array(
				'value' => 'Minimise Button Border Color:'
			),

			't1189' => array(
				'value' => 'Check Color:'
			),

			't0' => 'Background image for theme:',
			't1' => 'Upload',
			't2' => 'Add a New Theme',
			't3' => 'Change setting for:',
			't4' => 'This Theme',
			't5' => 'New theme name:',
			't6' => 'This Themes',
			't7' => 'Yes',
			't8' => 'No',
			't9' => 'Click Here to Pick up the color',
			't10' => 'View',
			't11' => 'Save Settings'
		),

		'cnf_list' => array(
			't0' => 'Yes',
			't1' => 'No',
			't2' => 'Save Settings'
		),

		'cnf_languages' => array(
			't0' => 'Order',
			't1' => 'Filename',
			't2' => 'Bump up'
		)
	);
?>