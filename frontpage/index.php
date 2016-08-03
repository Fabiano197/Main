<!DOCTYPE html>
<html>
	<?php include_once "build/header.php"?>
	<body>
		<?php 
		include_once "build/topbar.php";
		if(!isset($_GET['loc'])){
			header("Location: index.php?loc=home");
		} 
		include "build/" . "$_GET[loc]" . ".php";
		?>
	</body>
</html>