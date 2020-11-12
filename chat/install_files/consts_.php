<?php
/**
 ** Constants used for installation file.
 **/

define('INC_DIR', dirname(__FILE__) . '/./../inc/');//for config.php

define('NAVY_FILE_SIZE', 1992);//necessary for check uploaded in binary mode

define('CHAT_ROOMS', 'The Lounge, Hollywood, Tech Talk, Current Events');//default rooms

define('CONFIG_FILE', INC_DIR . 'config.php');

define('INST_DIR', './install_files/');


$cmss = array(
'azdgCMS'     => 'AZDG Dating Lite 2.1.2',
			'cpgNukeCMS'  => 'CPGNuke',
			'cpgNukeDragonfly921CMS'  => 'CPGNuke Dragonfly 9.2.1',
			'datingProCMS'=> 'Dating Pro',
			'e107CMS'     => 'e107 0.617',
			'eMeetingCMS' => 'eMeeting',
			'efriendsCMS497' => 'Alstrasoft E-friends 4.9.7',
			'fusionCMS'   => 'PHP Fusion 4.0.0',
			'fusionCMS2'  => 'PHP Fusion 5.0.1',
			'fusion6CMS'  => 'PHP Fusion 6',
			'geeklogCMS'  => 'GeekLog 1.3.9',
			'joomlaCMS'	  => 'Joomla 1.1',
			'ipbCMS'      => 'Invision Power Board (IPB) 2.0.0',
			'ipbCMS2'     => 'Invision Power Board (IPB) 2.0.3',
			'ipbCMS2'     => 'Invision Power Board (IPB) 2.1.0',
			'ipb30CMS'     => 'Invision Power Board (IPB) 3.0.3',
			'lunabyteCMS' => 'LunaByte / Enigma 1.3',
			'mamboCMS'    => 'Mambo 4.5.0',
			'mamboCMS2'   => 'Mambo 4.5.2',
			'mambo465CMS'   => 'Mambo 4.6.5',
			
			'mdproCMS'    => 'MD-Pro 1.0.7',
			'mdpro1081CMS'    => 'MD-Pro 1.0.81',
			'moodleCMS'   => 'Moodle',
			'moodle16CMS' => 'Moodle 1.6',
			'moodle17CMS' => 'Moodle 1.7',
			'moodle18CMS' => 'Moodle 1.8',
			'moodle19CMS' => 'Moodle 1.9',
			'osdateCMS'   => 'osDate Dating System',
			'phpBB2CMS'	  => 'phpBB 2.0.10 and above',
			'phpBB3CMS'	  => 'phpBB 3.0.B2 and above',
			'phpBB307CMS'	  => 'phpBB 3.0.2 and above',
			'phpBB305CMS'	  => 'phpBB 3.0.5 and above',
			//'phpNukeModCMS'	=> 'PHP-Nuke 7.3(module version)',
			'phpNukeCMS73'	=> 'PHP-Nuke 7.3',
			'phpNukeCMS76'	=> 'PHP-Nuke 7.6',
			'phpNukeCMS78'	=> 'PHP-Nuke 7.8',
			//'postNukeModCMS'	=> 'PostNuke 0.726-3(module version)',
			'postNukeCMS'	=> 'PostNuke 0.726-3',
			'postNukeCMS0762'	=> 'PostNuke 0.762',
			'phorumCMS518' => 'Phorum 5.1.8',
            'phorumCMS527' => 'Phorum 5.2.7',
			'smfCMS'	=> 'Simple Machines 1.0',
			'smfCMS2'	=> 'Simple Machines 1.1',
			'smfCMS20'	=> 'Simple Machines 2.0',
			'ubbCMS'	=> 'UBB.Threads 6.5',
			'ubb70CMS'	=> 'UBB.Threads 7.0',
			'ubb71CMS'	=> 'UBB.Threads 7.1',
			'ubb74CMS'	=> 'UBB.Threads 7.4',
			'vbulletin30CMS'=> 'vBulletin 3.0',
			'vbulletin35CMS'=> 'vBulletin 3.5',
			'vbulletin36CMS'=> 'vBulletin 3.6',
			'vbulletin37CMS'=> 'vBulletin 3.7',
			'vbulletin38CMS'=> 'vBulletin 3.8',
			'vbulletin40CMS'=> 'vBulletin 4.0',
			'webDateCMS'    => 'Web Date',
			'wotCMS2'	=> 'WoltLab Burning Board 2.3.4',
			'wowCMS'	=> 'WowBB 1.6.1',
			'wowCMS2'	=> 'WowBB 1.6.2',
			'wowCMS165'	=> 'WowBB 1.6.5',
			'wowCMS170'	=> 'WowBB 1.7',
			'xmbCMS'	=> 'XMB 1.9.1',
			'xoopsCMS'	=> 'Xoops 2.0.7',
			'xoops2016CMS'	=> 'Xoops 2.0.16',
			'phpkitCMS' => 'phpkit 1.6.1',
			'MyBBCMS'	=> 'MyBB 1.0',
			'easysiteCMS' => 'EasySite 3.2.5',
			'SBDatingCMS' => 'Softbiz Dating',
			'phpFox108' => 'phpFox 1.0.8',
			'phpFox11' => 'phpFox 1.1',
			'phpFox16CMS' => 'phpFox 1.6',
			'inspirations31CMS'   => 'Inspirations 3.1',
			'drupalCMS' => 'Drupal',
			'drupal613CMS' => 'Drupal 6.1.3',
			'punbbCMS'        => 'punBB 1.2.10',

			);

//Create DB tables
/*$db_tables = array
(
	"bans"        => "CREATE TABLE {dbpref}bans (created timestamp(14) NOT NULL, userid int(11) default NULL, banneduserid int(11) default NULL, roomid int(11) default NULL, ip varchar(16) default NULL, INDEX(userid), INDEX(created))",
	"connections" => "CREATE TABLE {dbpref}connections (id varchar(32) NOT NULL default '', updated timestamp(14) NOT NULL, created timestamp(14) NOT NULL, userid int(11) default NULL, roomid int(11) default NULL, state tinyint(4) NOT NULL default '1', color int(11) default NULL, start int(11) default NULL, lang char(2) default NULL, ip varchar(16) default NULL, tzoffset int(11) default 0, chatid int(11) NOT NULL default '1', INDEX(userid), INDEX(roomid), INDEX(updated), PRIMARY KEY (id))",
	"ignors"      => "CREATE TABLE {dbpref}ignors (created timestamp(14) NOT NULL, userid int(11) default NULL, ignoreduserid int(11) default NULL, INDEX(userid), INDEX(ignoreduserid), INDEX(created))",
	"messages"    => "CREATE TABLE {dbpref}messages (id int(11) NOT NULL auto_increment, created timestamp(14) NOT NULL, toconnid varchar(32) default NULL, touserid int(11) default NULL, toroomid int(11) default NULL, command varchar(255) NOT NULL default '', userid int(11) default NULL, roomid int(11) default NULL, txt text, chatid int(11) NOT NULL default '1', INDEX(touserid), INDEX(toroomid), INDEX(toconnid), INDEX(created), PRIMARY KEY (id))",
	"rooms"       => "CREATE TABLE {dbpref}rooms (id int(11) NOT NULL auto_increment, updated timestamp(14) NOT NULL, created timestamp(14) NOT NULL, name varchar(64) NOT NULL default '', password varchar(32) NOT NULL default '', ispublic char(1) default NULL, ispermanent int(11) default NULL, INDEX(name), INDEX(ispublic), INDEX(ispermanent), INDEX(updated), PRIMARY KEY (id))",
	"users"       => "CREATE TABLE {dbpref}users (id int(11) NOT NULL auto_increment, login varchar(200) NOT NULL default '', password varchar(32) NOT NULL default '', roles int(11) NOT NULL default '0', profile TEXT default NULL, INDEX(login), PRIMARY KEY  (id))",

	"config"	  => "CREATE TABLE {dbpref}config
							(id int(10) unsigned NOT NULL auto_increment,
  							level_0 varchar(255) NOT NULL default '',
  							level_1 varchar(255) default NULL,
			    			level_2 varchar(255) default NULL,
  							level_3 varchar(255) default NULL,
  							level_4 varchar(255) default NULL,
  							type varchar(10) default NULL,
  							title varchar(255) NOT NULL default '',
  							comment varchar(255) NOT NULL default '',
							info varchar(255) NOT NULL default '',
  							parent_page varchar(255) NOT NULL default '',
  							_order int(10) unsigned NOT NULL default '0',
  							PRIMARY KEY  (id),
  							KEY id (id))",

	"config_values" => "CREATE TABLE {dbpref}config_values
							(id int(3) unsigned NOT NULL auto_increment,
  							instance_id int(10) unsigned NOT NULL default '0',
  							config_id int(10) unsigned NOT NULL default '0',
  							value text NOT NULL,
  							disabled int(1) unsigned NOT NULL default '0',
  							PRIMARY KEY  (id),
  							KEY id (id))",

	"config_instances" => "CREATE TABLE {dbpref}config_instances
							(id int(10) unsigned NOT NULL auto_increment,
							is_active tinyint(1) unsigned NOT NULL default '1',
							is_default tinyint(1) unsigned NOT NULL default '0',
							name varchar(100) NOT NULL default '',
							created_date datetime NOT NULL default '0000-00-00 00:00:00',
							PRIMARY KEY  (id),
							KEY id (id) )",
	"config_chats"  => 		"CREATE TABLE {dbpref}config_chats (
  							id int(10) unsigned NOT NULL auto_increment,
  							name char(100) NOT NULL default '',
  							instances char(255) NOT NULL default '1',
							is_default tinyint(1) NOT NULL default '0',
  							PRIMARY KEY  (id),
  							KEY id (id))",

);*/
$db_tables = array
(
	"bans"        => "CREATE TABLE {dbpref}bans (created timestamp(14) NOT NULL, userid int(11) default NULL, banneduserid int(11) default NULL, roomid int(11) default NULL, ip varchar(16) default NULL, instance_id int(11) default 1, INDEX(userid), INDEX(created), PRIMARY KEY  (id))",
	"connections" => "CREATE TABLE {dbpref}connections (id varchar(32) NOT NULL default '', updated timestamp(14) NOT NULL, created timestamp(14) NOT NULL, userid int(11) default NULL, roomid int(11) default NULL, state tinyint(4) NOT NULL default '1', color int(11) default NULL, start int(11) default NULL, lang char(2) default NULL, ip varchar(16) default NULL, tzoffset int(11) default 0, chatid int(11) NOT NULL default '1', instance_id int(11) default 1, INDEX(userid), INDEX(roomid), INDEX(updated), PRIMARY KEY (id))",
	"ignors"      => "CREATE TABLE {dbpref}ignors (created timestamp(14) NOT NULL, userid int(11) default NULL, ignoreduserid int(11) default NULL, instance_id int(11) default 1, INDEX(userid), INDEX(ignoreduserid), INDEX(created))",
	"messages"    => "CREATE TABLE {dbpref}messages (id int(11) NOT NULL auto_increment, created timestamp(14) NOT NULL, toconnid varchar(32) default NULL, touserid int(11) default NULL, toroomid int(11) default NULL, command varchar(255) NOT NULL default '', userid int(11) default NULL, roomid int(11) default NULL, txt text, chatid int(11) NOT NULL default '1', instance_id int(11) default 1, INDEX(touserid), INDEX(toroomid), INDEX(toconnid), INDEX(created), PRIMARY KEY (id))",
	"rooms"       => "CREATE TABLE {dbpref}rooms (id int(11) NOT NULL auto_increment, updated timestamp(14) NOT NULL, created timestamp(14) NOT NULL, name varchar(64) NOT NULL default '', password varchar(32) NOT NULL default '', ispublic char(1) default NULL, ispermanent int(11) default NULL, instance_id int(11) default 1, INDEX(name), INDEX(ispublic), INDEX(ispermanent), INDEX(updated), PRIMARY KEY (id))",
	"users"       => "CREATE TABLE {dbpref}users (id int(11) NOT NULL auto_increment, login varchar(200) NOT NULL default '', password varchar(32) NOT NULL default '', roles int(11) NOT NULL default '0', profile TEXT default NULL, instance_id int(11) default 1, INDEX(login), PRIMARY KEY  (id))",

	"config"	  => "CREATE TABLE {dbpref}config
							(id int(10) unsigned NOT NULL auto_increment,
  							level_0 varchar(255) NOT NULL default '',
  							level_1 varchar(255) default NULL,
			    			level_2 varchar(255) default NULL,
  							level_3 varchar(255) default NULL,
  							level_4 varchar(255) default NULL,
  							type varchar(10) default NULL,
							units varchar(10) NOT NULL default '',
  							title varchar(255) NOT NULL default '',
  							comment varchar(255) NOT NULL default '',
							info varchar(255) NOT NULL default '',
  							parent_page varchar(255) NOT NULL default '',
  							_order int(10) unsigned NOT NULL default '0',
  							PRIMARY KEY  (id),
  							KEY id (id))",

	"config_values" => "CREATE TABLE {dbpref}config_values
							(id int(3) unsigned NOT NULL auto_increment,
  							instance_id int(10) unsigned NOT NULL default '1',
  							config_id int(10) unsigned NOT NULL default '0',
  							value text NOT NULL,
  							disabled int(1) unsigned NOT NULL default '0',
  							PRIMARY KEY  (id),
  							KEY id (id))",

	"config_instances" => "CREATE TABLE {dbpref}config_instances
							(id int(10) unsigned NOT NULL auto_increment,
							is_active tinyint(1) unsigned NOT NULL default '1',
							is_default tinyint(1) unsigned NOT NULL default '0',
							name varchar(100) NOT NULL default '',
							created_date datetime NOT NULL default '0000-00-00 00:00:00',
							PRIMARY KEY  (id),
							KEY id (id) )",
	"paypal_log" =>       "CREATE TABLE `{dbpref}paypal_log` (
  						   `id` bigint(20) unsigned NOT NULL auto_increment,
  						   `date` datetime NOT NULL default '0000-00-00 00:00:00',
  						   `user_name` varchar(50) NOT NULL default '',
  						   `txn_id` varchar(25) NOT NULL default '',
  						   `txn_type` varchar(25) NOT NULL default '',
  						   `item_name` varchar(25) NOT NULL default '',
  						   `item_number` varchar(50) NOT NULL default '',
  						   `post_from` varchar(10) NOT NULL default '',
  						   `payer_email` varchar(75) NOT NULL default '',
  						   `details` text NOT NULL,
  						   `result` text NOT NULL,
  						   `paypal_testmode` tinyint(4) NOT NULL default '0',
  						   `gateway` int(11) NOT NULL default '0',
  						   instance_id int(11) default 1,
  						   PRIMARY KEY  (`id`)
						   )",
	"config_main" =>      "CREATE TABLE `{dbpref}config_main` (
  						   `id` int(10) unsigned NOT NULL auto_increment,
						    `level_0` varchar(255) NOT NULL default '',
						    `level_1` varchar(255) default NULL,
						    `level_2` varchar(255) default NULL,
						    `level_3` varchar(255) default NULL,
						    `level_4` varchar(255) default NULL,
						    `value` varchar(255) NOT NULL default '',
						    `type` varchar(10) default NULL,
						    `title` varchar(255) NOT NULL default '',
						    `comment` varchar(255) NOT NULL default '',
						    `info` varchar(255) NOT NULL default '',
						    `parent_page` varchar(255) NOT NULL default '',
						    `_order` int(10) unsigned NOT NULL default '0',
						    PRIMARY KEY  (`id`),
						    KEY `id` (`id`)
						   )"
	/*"config_chats"  => 		"CREATE TABLE {dbpref}config_chats (
  							id int(10) unsigned NOT NULL auto_increment,
  							name char(100) NOT NULL default '',
  							instances char(255) NOT NULL default '1',
							is_default tinyint(1) NOT NULL default '0',
  							PRIMARY KEY  (id),
  							KEY id (id))",*/

);
//changed on 090706 for chat instances ends here
?>