<?php

function sqlquery($query){
	$link = mysql_connect('localhost', 'program', 'qwertzy13');
	if (!$link) {
		die('Not connected : ' . mysql_error());
	}
	
	$db_selected = mysql_select_db('sncmsDB', $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}
	
	$result = mysql_query($query);
	
	return $result;
}
?>