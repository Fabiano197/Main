<?php

/*

COLDFUSE PLUGIN ENGINE
COPYRGIHT (C) 2016 ROMAN HIMMEL

"RUN MORE WITH LESS CPU, BE COOL!"
*/

class Coldfuse{
	
	private $pluginList = array ();
	private $pluginpath = "plugins/";
	
	function __construct(){
		
		return "This is COLDFUSE1000 - Plugin Management System";
	}
	
	public function loadmem(){
		foreach (glob("plugins/*.php") as $filename)
		{
			include $filename;
			array_push($this->pluginList, str_replace($this->pluginpath, "", $filename));
		}
	}
	
	public function listLoaded(){
		
		return $this->pluginList;
	}
	
}
?>