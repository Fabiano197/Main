<!DOCTYPE html>
<html>
	<?php include_once "build/header.php"?>
	<body>
		<?php 
		include_once "build/topbar.php";
		include "build/" . "$_GET[loc]" . ".php";
		?>
	</body>
</html>