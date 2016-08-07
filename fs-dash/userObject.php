<?php

class UserObject{
	
	private $token = '';
	private $uuid = '';
	
	function __construct($uuid, $token){
		$this->token = $token;
		$this->uuid = $uuid;
	}
	
	public function getToken(){
		return $this->token;
	}
	
	public function getID(){
		return $this->uuid;
	}
	
}

?>