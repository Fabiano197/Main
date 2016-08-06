<?php

class Userstats{
	
	public function getProgress($userobject){
		$uuid = $userobject->getID();
		$token = $userobject->getToken();
		
		$result = $this->query("select Progress from userstats where ID = '$uuid'");
		
		return $result;
	}
	
	public function getName($userobject){
		$uuid = $userobject->getID();
		$token = $userobject->getToken();
		
		$result = $this->query("select User from auth where ID = '$uuid'");
		
		return $result;
	}
	
	public function getRegDate($userobject){
		$uuid = $userobject->getID();
		$token = $userobject->getToken();
		
		$result = $this->query("select RegisterDate from auth where ID = '$uuid'");
		
		return $result;
	}

	public function getLastLoc($userobject){
		$uuid = $userobject->getID();
		$token = $userobject->getToken();
		
		$result = $this->query("select Pagename from pages where PageID = (select LastLesson from userstats where ID = '$uuid')");
		
		return $result;
	}
	
	private function query($query){
		include("settings/config.php");
		
		$conn = new mysqli($db_host, $db_user, $db_password, $db_db);
		
		if($result = $conn->query($query)){
			$result = $result->fetch_array(MYSQLI_NUM);
		}
		$conn->close();
		
		return $result[0];
	}
	
}

?>