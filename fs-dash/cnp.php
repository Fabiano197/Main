<?php
	include_once("classfiles/oshiri_tools.php");
	include_once("classfiles/GETPOST.php");
	include_once("classfiles/SQLquery.php");
	include_once("classfiles/userauth.php");
	
	$content = "null";
	$pagename = "null";
	$pageid = generateRandomString(30);
	
	$userauth = new Userauth();
	
	if(isset($_POST["editor"]) == true){
		$content = $_POST["editor"];
	}	
	
	if(isset($_POST["pagename"]) == true){
		$pagename = $_POST["pagename"];
	}
	
	if(isset($_POST["fpid"]) == true){
		$fpid = $_POST["fpid"];
		$query = "UPDATE pages SET Content='".$content."', Pagename='".$pagename."' WHERE PageID = '".$fpid."'";
	}
	else{
		$query = 'insert into pages (Content, Pagename, PageID) values ("'.$content.'", "'.$pagename.'", "'.$pageid.'")';
	}
	
	session_start();
	
	if($userauth->checkAuthKey($_SESSION['authkey'], $_SESSION['uuid']) == 1){
		$result = sqlquery($query);
	}
	else{
		redirect(getBaseAddress());
	}
	
	echo $fpid;
	
	//redirect(getBaseAddress()."/".'?pageid=pagedit');
?>