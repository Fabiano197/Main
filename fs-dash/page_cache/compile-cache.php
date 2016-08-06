<?php
//copyright (c) 2016 socketdown

class CacheCompiler{
	
	public function cache($content){
		foreach($content as $item){
			$filename = $item["name"];
			$filecontent = $item["content"];
			
			$file = fopen("page_cache/".$filename.".html", "w") or die("Unable to open file!");
			fwrite($file, $filecontent);
		}
	}	
	
	public function purge(){
		array_map('unlink', glob("page_cache/*.html"));
	}
	
	public function delete($file){
		$file .= ".html";
		unlink("page_cache/$file");
	}
}

?>