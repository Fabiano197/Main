<?php
	include_once("classfiles/oshiri_tools.php");
	include_once("classfiles/GETPOST.php");
	include_once("classfiles/SQLquery.php");
	include_once("classfiles/userauth.php");
	
	$userauth = new Userauth();
	
	$query = 'delete from pages where PageID ="'.$pageid.'"';
	
	if($userauth->checkAuthKey($authkey, $uuid) == 1){
		$result = sqlquery($query);
	}
	else{
		redirect(getBaseAddress());
	}
	
	$credentials = "?user=".$username."&token=".$authkey."&uuid=".$uuid;
	
	redirect(getBaseAddress()."/".$credentials."&pageid=pagedit");
?>