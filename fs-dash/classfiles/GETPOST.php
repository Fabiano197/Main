<?php
$pageid = "dashboard";
$username = "Anonymous";
$password = "text";
$authkey = "text";
$uuid = "abc";
$action = "none";
$syssqlexec = null;

if(isset($_GET["pageid"]) == true){
	$pageid = $_GET["pageid"];
}

if(isset($_GET["action"]) == true){
	$action = $_GET["action"];
}

if(isset($_GET["user"]) == true){
	$username = $_GET["user"];
}

if(isset($_GET["token"]) == true){
	$authkey = $_GET["token"];
}

if(isset($_POST["user"]) == true){
	$username = $_POST["user"];
}

if(isset($_POST["password"]) == true){
	$password = $_POST["password"];
	
}

if(isset($_GET["uuid"]) == true){
	$uuid = $_GET["uuid"];
}

if(isset($_POST["sqlexec"]) == true){
	$syssqlexec = $_POST["sqlexec"];
}

?>