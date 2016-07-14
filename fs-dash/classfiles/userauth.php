<?php
/*
USERAUTH.PHP

COPYRIGHT (c) 2016 ROMAN HIMMEL

AUTHOR: ROMAN HIMMEL
DATE: 2016/05/27


DOCUMENTATION: 

generates an AuthKey which is based on a timestamp (changes every hour) for uninterrupted account use between sub-sites of this CMS.
checks the authkey 
*/

include_once("oshiri_tools.php");

class Userauth{

private function getSecretNumber(){
	return "nm6kfcsHOXue2VI6jcYS";
} //DO NOT SHARE - may cause SERIOUS security leaks!!

public function genAuthKey($user, $passwd){
	
	$passwordGenerationError = false;
	$uuid = "";
	$passwd = md5($passwd);
	$authkey = "invalid";
	
	// Create connection
	$link = mysql_connect('localhost', 'program', 'qwertzy13');
	if (!$link) {
		die('Not connected : ' . mysql_error());
	}
	
	$db_selected = mysql_select_db('sncmsDB', $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}
	
	//form query to check user database
	
	$sql = "SELECT `ID` FROM auth WHERE User = '".$user."' && Passwd = '".$passwd."'";
	$result = mysql_query($sql);
	
	if(!$result){
		echo mysql_error();
	}
	
	while($row = mysql_fetch_array($result)){
		$uuid = $row[0];
	}
	
	if(mysql_num_rows($result) > 0){
		$authkey = $this->genHashToken($uuid);
	}
	
	return $authkey;
}

public function checkAuthKey($key, $user){
	$composeKey = $this->genHashToken($user);
	$success;
	
	if(strcmp($composeKey, $key) == 0){
		$success = true;
	}
	else{
		$success = false;
	}
	
	return $success;
}

private function genHashToken($user){
	$timestamp = date("Y/m/d/h");
	$hashtoken = md5($timestamp.$user.$this->getSecretnumber());
	
	return $hashtoken;
}

public function createUser($user, $pass, $email = "anonymous@torrent.to"){
	
	
	$servername = "localhost";
	$username = "program";
	$password = "qwertzy13";
	$dbname = "sncmsDB";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$uuid = generateRandomString(10);
	
	$query = "SELECT User FROM auth WHERE ID = '".$uuid."'";
	$result = $conn->query($query);
	$uuid = $this->uuid_exsists($uuid, $conn);
	
	$pass = md5($pass);
	
	$sql = "INSERT INTO auth (User, Passwd, ID, EMail) VALUES ('".$user."','".$pass."','".$uuid."','".$email."')";
	$result = $conn->query($sql);

	$conn-> close();
}

private function uuid_exsists($uuid, $conn){
	$query = "SELECT User FROM auth WHERE ID = '".$uuid."'";
	$result = $conn->query($query);
	
	if($result->num_rows > 0){
		$uuid = generateRandomString(10);
		$uuid = $this->uuid_exsists($uuid, $conn);
	}
	else{
		return $uuid;
	}
}

public function getPermission($uuid){
	$permission = 0;
	
	$link = mysql_connect('localhost', 'program', 'qwertzy13');
		if (!$link) {
		die('Not connected : ' . mysql_error());
	}
	
	$db_selected = mysql_select_db('sncmsDB', $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}
	
	$sql = "SELECT Permission FROM auth WHERE ID = '".$uuid."'";
	$result = mysql_query($sql);
	
	while($row = mysql_fetch_array($result)){
		$permission = $row[0];
	}
	
	return $permission;
}

public function setPermission($uuid, $permission){
	$link = mysql_connect('localhost', 'program', 'qwertzy13');
		if (!$link) {
		die('Not connected : ' . mysql_error());
	}
	
	$db_selected = mysql_select_db('sncmsDB', $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}
	
	$sql = "UPDATE auth SET Permission=".$permission." WHERE ID = '".$uuid."'";
	$result = mysql_query($sql);
	
	
	
	return $result;
}

public function getID($user, $pass){
	$servername = "localhost";
	$username = "program";
	$password = "qwertzy13";
	$dbname = "sncmsDB";
	
	$uuid = "-";
	
	$pass = md5($pass);
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$query = "SELECT ID FROM auth WHERE User = '".$user."' && Passwd = '".$pass."'";
	$result = $conn->query($query);
	
	while($row = $result->fetch_array()){
		$uuid = $row[0];
	}

	$conn-> close();
	
	return $uuid;
}

}
?>