<?php
function getModuleInformation() {
	return array(	'admin' => 	array	(	'config' => 'config.xml',
											'settings' => 'badwords.xml',
											'labels' => array	(	'/^config/' => array ("", '<b>Bad Words source files.</b> <br>If you\'d like to use only the XML file, and not the PHP file, you can change use_php_badwords to false, and set use_xml_badwords to true.'),
																	'/^bad_words_settings/' => array ("", '<b>Bad Words setting</b>'),
																	'/^use_xml_badwords/' => array ("", 'Use the XML file'),
																	'/^use_php_badwords/' => array ("", 'Use the PHP file'),
																	'/^frequency/' => array ("Frequency", 'The number of times which an event occurs'),
																	'/^time/' => array ("Time", 'The duration in which <frequency> events must occur'),
																	'/^action/' => array ("Action", 'Action. Use either ban_ip or alert values'),
																	'/^message/' => array ("Message", 'The message which should appear to the user after the module takes appropriate action'),
																	'/^spam_settings/' => array ("", "<b>Spam Settings</b><br>With the anti-spam feature enabled, repeating a URL frequently in a small time frame will alert the user, as shown below. Please note that FlashChat has a built-in anti-flooding control, which can be set using the 'floodInterval' property in /inc/config.php (the number of seconds that a user must wait before posting a new message)."),
																	'/^message/' => array ("Message", 'The message which should appear to the user after the module takes appropriate action'),
																	'/^word[0-9]*/' => array ("", 'The bad word #[I]'),
																)
											,
											'fields' => array ('[I]' => '')
										),

					'whiteboard' =>	array	(	'config' => 'config.xml',
												'settings' => null,
												'labels' => array	(
																		'/^size/' => array ("", '<b>Interface size</b>'),
																		'/^width/' => array ("Width", 'The default width'),
																		'/^height/' => array ("Height", 'The default height'),
																		'/^fcs/' => array ("", '<b>Flash Media Server</b>'),
																		'/^url/' => array ("", 'URL'),
																		'/^framework/' => array ("", '<b>Framework</b>'),
																		'/^queryTime/' => array ("", 'The query time'),
																		'/^strings/' => array ("", ''),
																		'/^string/' => array ("", '<b>Labels</b>'),
																		'/^[0-9]+/' => array ("", '<b>Label #[I]</b>'),
																		'/^id/' => array ("", 'Label ID'),
																		'/^value/' => array ("", 'Value')
																	)
											),
					'mp3' => 	array	(	'config' => 'config.xml',
											'settings' => 'list.xml',
											'labels' => array	(
											            '/^autoplay/' => array ("Autoplay", "1 - enable autoplay, 0 - disable"),
																	'/^width/' => array ("Width", "The default module interface width"),
																	'/^height/' => array ("Height", "The default module interface height"),
																	'/^sort_by/' => array ("Sort field", "The default sort field. Options available include: title, artist, genre, or duration"),
																	'/^sort_type/' => array ("Sort type", "The default sort type. Options available include: ASC or DESC"),
																	'/^sort_by_text/' => array ("", 'The "Sort By" text'),
																	'/^artist_text/' => array ("", 'The "Artist" text'),
																	'/^title_text/' => array ("", 'The "Title" text'),
																	'/^genre/' => array ("", "The formatting of the Genre headers, when sorting by genre."),
																	'/^bold/' => array ("", "Bold style"),
																	'/^italic/' => array ("", "Italic Style"),
																	'/^indent/' => array ("", "Indention"),
																	'/^text/' => array ("", 'The "Genre" text'),
																	'/^length_text/' => array ("", 'The "Length" text'),
																	'/^song(_[0-9])*/' => array ("", "<b>The song #[I]</b>"),
																	'/^title/' => array ("", "The song title"),
																	'/^artist/' => array ("", "Artist"),
																	'/^genre/' => array ("", "Genre"),
																	'/^duration/' => array ("", "Duration"),
																	'/^src/' => array ("MP3 file path", "MP3 file path, relative to the mp3player.swf file")
																)
										),
					'video' => 	array	(	'config' => 'config.xml',
											'settings' => null,
											'labels' => array	(
																		'/^server/' => array ("", "Path for your web host"),
																		'/^width/' => array ("Width", "The default width of the AV module"),
																		'/^height/' => array ("Height", "The default height of the AV module"),
																		'/^volume/' => array ("Volume", "The default volume, from 0 to 100 inclusive"),
																		'/^cam/' => array ("Camera state", 'The default state for the camera. It is recommended that you leave this as "on"'),
																		'/^mic/' => array ("Microphone state", 'The default state for the microphone. It is recommended that you leave this as "on", too')
																	)
										),
					'banner' =>	array	(	'config' => 'config.xml',
											'settings' => 'banners.xml',
											'labels' => array	(
																		'/^auto_rotate/' => array ("", "<b>Auto-rotation feature</b>"),
																		'/^active/' => array ("Active", "Enable auto-rotation"),
																		'/^time/' => array ("Delay", "The delay time, in seconds, between banners"),

																		'/^banner(_[0-9])*/' => array ("", "<b>The Banner #[I]</b>"),
																		'/^url/' => array ("URL", "The URL, banner links to"),
																		'/^target/' => array ("Target", 'The target window ("_self", "_blank")'),
																		'/^langs/' => array ("Languages", 'Indicates which languages this banner should be displayed for ("all" - for all languages)'),
																		'/^rooms/' => array ("Roome", 'This determines the rooms of the chat in which the banner will be displayed  ("all" - for all rooms)'),
																		'/^skins/' => array ("Skins", 'Determines the skins of the chat for which this banner should be displayed ("all" - for all skins)'),
																		'/^src/' => array ("File path", "The path, relative to the banners.xml file, of the JPG or SWF file of your banner"),
																		'/^fading/' => array ("Fading", "Enable fade in and out during the rotation")
																)
										),
					'radio' => 	array	(	'config' => 'config.xml',
											'settings' => 'stations.xml',
											'labels' => array	(
											            '/^autoplay/' => array ("Autoplay", "1 - enable autoplay, 0 - disable"),
																	'/^width/' => array ("Width", "The default module interface width"),
																	'/^height/' => array ("Height", "The default module interface height"),
																	'/^sort_by/' => array ("Sort by", "The default sort field - choices are name or genre"),
																	'/^sort_type/' => array ("Sort type", "The default sort type. Options available include: ASC or DESC"),
																	'/^sort_by_text/' => array ("", 'The "Sort By" text'),
																	'/^name_text/' => array ("", 'The "Name" text'),
																	'/^title_text/' => array ("", 'The "Title" text'),
																	'/^genre/' => array ("", "The formatting of the Genre headers, when sorting by genre."),
																	'/^bold/' => array ("", "Bold style"),
																	'/^italic/' => array ("", "Italic Style"),
																	'/^indent/' => array ("", "Indention"),
																	'/^text/' => array ("", 'The "Genre" text'),
																	'/^add_button/' => array ("", 'The "Add" button label'),
																	'/^remove_button/' => array ("", 'The "Remove" button label'),
																	'/^add_window_title/' => array ("", 'Tha "Add" window title'),
																	'/^ok_button/' => array ("", 'The "Ok" button label'),
																	'/^cancel_button/' => array ("", 'The "Cancel" button label'),
																	'/^name/' => array ("", 'Name'),
																	'/^Genre/' => array ("", 'Genre'),
																	'/^url/' => array ("", 'URL'),
																	'/^url_text/' => array ("", 'The "URL" text'),
																	'/^station(_[0-9])*/' => array ("", "<b>The station#[I]</b>"),
																	'/^title/' => array ("", "The song title"),
																	'/^artist/' => array ("", "Artist"),
																	'/^genre/' => array ("", "Genre"),
																	'/^duration/' => array ("", "Duration"),
																	'/^src/' => array ("Source", "Server URL")
																)
										),
					'text' => array	(	'config' => 'config.xml',
											'settings' => 'messages.xml',
											'labels' => array	(
																	'/^width/' => array ("Width", "The default module interface width"),
																	'/^height/' => array ("Height", "The default module interface height"),

																	'/^use_theme_color/' => array ("", "Use theme colors"),
																	'/^background_color/' => array ("", "The background color"),
																	'/^top_title/' => array ("", "The top title text"),
																	'/^top_title_color/' => array ("", "The top title color"),
																	'/^title_color/' => array ("", "The title color"),
																	'/^title_background_color/' => array ("", "The title background color"),
																	'/^message_color/' => array ("", "The message color"),
																	'/^message_background_color/' => array ("", "The message background color"),
																	'/^navigation_color/' => array ("", "The navigatioin color"),
																	'/^broadcast_title_text/' => array ("", "The broadcast title text"),


																	'/^message(_[0-9])*/' => array ("", "<b>The message #[I]</b>"),
																	'/^title/' => array ("", "The message title"),
																	'/^text/' => array ("", "The message text"),

																	'/^langs/' => array ("Languages", 'Indicates which languages this message should be displayed for ("all" - for all languages)'),
																	'/^rooms/' => array ("Rooms", 'This determines the rooms of the chat in which the message will be displayed  ("all" - for all rooms)')
																)
										)

	);
}
?>