<?php

include_once("../SQLquery.php");

$planned_actions = "";

createDatabase();
createTables();
createDefaultUser();

function createDatabase(){
	$query = "CREATE DATABASE sncmsDB";
	
	echo sqlquery($query);
}

function createTables(){
	
	$query = "CREATE TABLE pages
			(
			User varchar(30),
			Passwd varchar(100),
			EMail varchar(50),
			Permission int,
			ID varchar(50)
			)";
			
	echo sqlquery($query);
			
	$query = "CREATE TABLE auth
			(
			Pagename varchar(50),
			PageID varchar(20),
			Content text
			)";
			
	echo sqlquery($query);
	
	$query = "CREATE TABLE kommentare
			(
			Benutzer text,
			Datum text,
			Kommentar text,
			Titel text
			)";
			
	echo sqlquery($query);
}

function createDefaultUser(){
	$pw = "admin";
	$pw = md5($pw);
	
	$query = "INSERT INTO auth (User, Passwd, EMail, Permission, ID) VALUES('admin','".$pw."','admin@admin.com', 3,'ADM1Nadm1n')";
	
	echo sqlquery($query);
}

?>