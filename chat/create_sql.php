<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'on');

	$link=mysql_connect("localhost",'root','admin');
	mysql_select_db('fc2',$link);

	$filename = 'mysql.txt';
	$file = fopen($filename, 'w');
	$query="
		SELECT
		id, level_0, level_1, level_2, level_3, level_4,
		type, units, title, comment, info, parent_page, _order
		FROM flashchat_config";
	$res=mysql_query($query);
	while ($row = mysql_fetch_object($res)) {
		$line = sprintf('INSERT INTO flashchat_config VALUES("%s","%s","%s","%s","%s","%s","%s","%s","%s","%s","%s","%s","%s");',
			$row->id, $row->level_0, $row->level_1, $row->level_2, $row->level_3, $row->level_4,
			$row->type, $row->units, addslashes($row->title), addslashes($row->comment), addslashes($row->info), $row->parent_page, $row->_order)."\n";
		fwrite($file, $line);
	}

	$query="
		SELECT
		id, name, instances, is_default
		FROM flashchat_config_chats";
	$res=mysql_query($query);
	while ($row = mysql_fetch_object($res)) {
		$line = sprintf('INSERT INTO flashchat_config_chats VALUES("%s","%s","%s","%s");',
			$row->id, $row->name, $row->instances, $row->is_default)."\n";
		fwrite($file, $line);
	}

	$query="
		SELECT
		id, is_active, is_default, name, created_date
		FROM flashchat_config_instances";
	$res=mysql_query($query);
	while ($row = mysql_fetch_object($res)) {
		//print_r($row);
		$line = sprintf('INSERT INTO flashchat_config_instances VALUES("%s","%s","%s","%s",%s);',
			$row->id, $row->is_active, $row->is_default, $row->name, 'NOW()')."\n";
		fwrite($file, $line);
	}

	$query="
		SELECT
		id, instance_id, config_id, value, disabled
		FROM flashchat_config_values";
	$res=mysql_query($query);
	while ($row = mysql_fetch_object($res)) {
		$line = sprintf('INSERT INTO flashchat_config_values VALUES("%s","%s","%s","%s","%s");',
			$row->id, $row->instance_id, $row->config_id, $row->value, $row->disabled)."\n";
		fwrite($file, $line);
	}

	$query="
		SELECT
		id, level_0, level_1, level_2, level_3, level_4,
		value, type, title, comment, info, parent_page, _order
		FROM flashchat_config_main";
	$res=mysql_query($query);
	while ($row = mysql_fetch_object($res)) {
		$line = sprintf('INSERT INTO flashchat_config_main VALUES("%s","%s","%s","%s","%s","%s","%s","%s","%s","%s","%s","%s","%s");',
			$row->id, $row->level_0, $row->level_1, $row->level_2, $row->level_3, $row->level_4, $row->value, $row->type, $row->title, $row->comment, $row->info, $row->parent_page, $row->_order)."\n";
		fwrite($file, $line);
	}
	fclose($file);
?>