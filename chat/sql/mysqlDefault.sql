#--------------------------------------------------------------------------
# Table structure for table `bans`
#--------------------------------------------------------------------------

CREATE TABLE `bans` (
       `id` int(11) NOT NULL auto_increment,
       `created` timestamp(14) NOT NULL,
       `userid` int(11) default NULL,
       `banneduserid` int(11) default NULL,
       `roomid` int(11) default NULL,
       `ip` varchar(16) default NULL,
       KEY `id` (`id`),
       KEY `userid` (`userid`),
       KEY `created` (`created`)
     ) TYPE=MyISAM;

#--------------------------------------------------------------------------
# Table structure for table `connections`
#--------------------------------------------------------------------------

CREATE TABLE `connections` (
       `id` varchar(32) NOT NULL default '',
       `updated` timestamp(14) NOT NULL,
       `created` timestamp(14) NOT NULL,
       `userid` int(11) default NULL,
       `roomid` int(11) default NULL,
       `state` tinyint(4) NOT NULL default '1',
       `color` int(11) default NULL,
       `start` int(11) default NULL,
       `lang` char(2) default NULL,
       `ip` varchar(16) default NULL,
       `tzoffset` int(11) default '0',
       `chatid` int(11) NOT NULL default '1',
       PRIMARY KEY  (`id`),
       KEY `userid` (`userid`),
       KEY `roomid` (`roomid`),
       KEY `updated` (`updated`)
     ) TYPE=MEMORY;

#--------------------------------------------------------------------------
# Table structure for table `ignors`
#--------------------------------------------------------------------------

CREATE TABLE `ignors` (
       `created` timestamp(14) NOT NULL,
       `userid` int(11) default NULL,
       `ignoreduserid` int(11) default NULL,
       KEY `userid` (`userid`),
       KEY `ignoreduserid` (`ignoreduserid`),
       KEY `created` (`created`)
     ) TYPE=MyISAM;

#--------------------------------------------------------------------------
# Table structure for table `messages`
#--------------------------------------------------------------------------

CREATE TABLE `messages` (
       `id` int(11) NOT NULL auto_increment,
       `created` timestamp(14) NOT NULL,
       `toconnid` varchar(32) default NULL,
       `touserid` int(11) default NULL,
       `toroomid` int(11) default NULL,
       `command` varchar(255) NOT NULL default '',
       `userid` int(11) default NULL,
       `roomid` int(11) default NULL,
       `txt` varcher(255),
       PRIMARY KEY  (`id`),
       KEY `touserid` (`touserid`),
       KEY `toroomid` (`toroomid`),
       KEY `toconnid` (`toconnid`),
       KEY `created` (`created`)
     ) TYPE=MEMORY AUTO_INCREMENT=14 ;

#--------------------------------------------------------------------------
# Table structure for table `rooms`
#--------------------------------------------------------------------------

CREATE TABLE `rooms` (
       `id` int(11) NOT NULL auto_increment,
       `updated` timestamp(14) NOT NULL,
       `created` timestamp(14) NOT NULL,
       `name` varchar(64) NOT NULL default '',
       `password` varchar(32) NOT NULL default '', 
       `ispublic` char(1) default NULL,
       `ispermanent` int(11) default NULL,
       
       PRIMARY KEY  (`id`),
       KEY `name` (`name`),
       KEY `ispublic` (`ispublic`),
       KEY `ispermanent` (`ispermanent`),
       KEY `updated` (`updated`)
     ) TYPE=MyISAM AUTO_INCREMENT=5 ;

#--------------------------------------------------------------------------
# Table structure for table `users`
#--------------------------------------------------------------------------

CREATE TABLE `users` (
       `id` int(11) NOT NULL auto_increment,
       `login` varchar(32) NOT NULL default '',
       `password` varchar(32) NOT NULL default '',
       `roles` int(11) NOT NULL default '0',
       `profile` text,
       PRIMARY KEY  (`id`),
       KEY `login` (`login`)
     ) TYPE=MEMORY AUTO_INCREMENT=2 ;
 