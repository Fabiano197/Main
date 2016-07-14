<?php
include_once("classfiles/oshiri_tools.php");
include_once("classfiles/GETPOST.php");
include_once("classfiles/SQLquery.php");
include_once("classfiles/userauth.php");

$userauth = new Userauth();
$credentials = "?user=".$username."&token=".$authkey."&uuid=".$uuid;

if(isset($_GET["ruid"]) == true){
	$remusrid = $_GET["ruid"];
	
	if($userauth->checkAuthKey($authkey, $uuid) == 1){
		
		$query = "DELETE FROM auth WHERE ID = '".$remusrid."'";
		$result = sqlquery($query);
		
		redirect(getBaseAddress()."/".$credentials."&pageid=settings&action=remusr");
	}
	else{
		redirect(getBaseAddress()."/login.php");
	}
}

if(isset($_GET["muid"]) == true){
	$editusrid = $_GET["muid"];
	$newperm = $_GET["mperm"];
	
	if($userauth->checkAuthKey($authkey, $uuid) == 1){
		
		$userauth->setPermission($editusrid, $newperm);
		
		redirect(getBaseAddress()."/".$credentials."&pageid=settings&action=viewusrs");
	}
	else{
		redirect(getBaseAddress()."/login.php");
	}
}

if(isset($_POST["cusername"]) == true){
	$cusername = $_POST["cusername"];
	$cpassword = $_POST["cpassword"];
	$cemail = $_POST["cemail"];
	$cpermissionraw = $_POST["cpermissions"];
	
	$cpermission = 0;
	
	switch($cpermissionraw){
		case (strcmp("User", $cpermissionraw)==0): $cpermission = 1;
		break;
		case (strcmp("Moderator", $cpermissionraw)==0): $cpermission = 2;
		break;
		case (strcmp("Admin", $cpermissionraw)==0): $cpermission = 3;
		break;
		
		default:
		$cpermission = 0;
		break;
	}
	
	echo $cpermissionraw."  ".$cpermission;
	
	if($userauth->checkAuthKey($authkey, $uuid) == 1){
		
		$userauth->createUser($cusername, $cpassword, $cemail);
		$cuuid = $userauth->getID($cusername, $cpassword);
		$userauth->setPermission($cuuid, $cpermission);
		
		redirect(getBaseAddress()."/".$credentials."&pageid=settings&action=addusr");
	}
	else{
		redirect(getBaseAddress()."/login.php");
	}
}

if(isset($_GET["pupdate"]) == true){
	$pname = $_POST["pupdatename"];
	$pmail = $_POST["pupdatemail"];
	$ppass = $_POST["pupdatepasswd"];
	
	$statement_name = "";
	$statement_mail = "";
	$statement_pass = "";

	if(strcmp($pname, "") != 0 && strcmp($pmail, "") != 0){
		$statement_name = "User='".$pname."'";
		$statement_mail = "EMail='".$pmail."',";
	}
	else if(strcmp($pname, "") != 0 && strcmp($ppass, "") != 0){
		$statement_name = "User='".$pname."',";
		$statement_pass = "Passwd='".$ppass."'";
	}
	else if(strcmp($pmail, "") != 0 && strcmp($ppass, "") != 0){
		$statement_mail = "EMail='".$pmail."',";
		$statement_pass = "Passwd='".$ppass."'";
	}
	else if(strcmp($pname, "") != 0){
		$statement_name = "User='".$pname."'";
	}
	else if(strcmp($pmail, "") != 0){
		$statement_mail = "EMail='".$pmail."'";
	}
	else if(strcmp($ppass, "") != 0){
		$statement_pass = "Passwd='".$ppass."'";
	}
	else{
		$statement_mail = "EMail='".$pmail."',";
		$statement_name = "User='".$pname."',";
		$statement_pass = "Passwd='".$ppass."'";
	}
	
	if($userauth->checkAuthKey($authkey, $uuid) == 1){
		
		$query = "UPDATE auth SET ".$statement_mail.$statement_name.$statement_pass." WHERE ID = '".$uuid."'";
		$result = sqlquery($query);
		
		echo mysql_error();
		
		redirect(getBaseAddress()."/".$credentials."&pageid=profile");
	}
	else{
		redirect(getBaseAddress()."/login.php");
	}
}

?>