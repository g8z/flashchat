<?php
//Create DB tables
$db_tables = array
(
	"bans"        => "CREATE TABLE {dbpref}bans (id int(11) NOT NULL auto_increment, created timestamp(14) NOT NULL, userid int(11) default NULL, banneduserid int(11) default NULL, roomid int(11) default NULL, ip varchar(16) default NULL, instance_id int(11) default 1, INDEX(userid), INDEX(created), PRIMARY KEY  (id))",
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
						   )",
	"config_chats"  => 		"CREATE TABLE {dbpref}config_chats (
  							id int(10) unsigned NOT NULL auto_increment,
  							name char(100) NOT NULL default '',
  							instances char(255) NOT NULL default '1',
							is_default tinyint(1) NOT NULL default '0',
  							PRIMARY KEY  (id),
  							KEY id (id))",


);
?>