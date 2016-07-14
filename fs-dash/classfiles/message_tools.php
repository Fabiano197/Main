<?php
	function markAllRead(){
		
		
		return $result;
	}
	
	function getNewMessages(){
		
		
		return $messageArray;
	}
	
	function getMessages(){
		
		$query = "SELECT * FROM kommentare";
		$result = sqlquery($query);
		
		$message_array = array();
		$name_array = array();
		$timestamp_array = array();
		$avatar_array = array();
		
		while($row = mysql_fetch_assoc($result)){
			array_unshift($message_array, $row["Kommentar"]);
			array_unshift($name_array, $row["Benutzer"]);
			array_unshift($timestamp_array, $row["Datum"]);
			array_push($avatar_array, "http://placehold.it/50x50");
		}
		
		$messageArray = array(
		"message" => $message_array,
		"name" => $name_array,
		"timestamp" => $timestamp_array,
		"avatar" => $avatar_array
		);
		
		return $messageArray;
	}
?>