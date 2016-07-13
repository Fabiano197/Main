<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" href="css/style.css" rel="stylesheet">
<link href="css/simple-sidebar.css" rel="stylesheet">
<link href="css/topbar.css" rel="stylesheet">
<link href="css/comment.css" rel="stylesheet">
</head>

<body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sidebar.js"></script>

<?php include "topbar.php";?>

<div class = "sidebar">
 <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                          <li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == "Drehbuch"){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=Drehbuch'>"?>1. Drehbuch</a></li>
					 <li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == "Aufloesung"){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=Aufloesung'>"?>2. Auflösung</a></li>
					  <li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == "Einstellung"){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=Einstellung'>"?>3. Kamera: Einstellung</a></li>
					   <li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == "HD_und_4K"){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=HD_und_4K'>"?>4. Kamera: HD und 4K</a></li>
					    <li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == "Belichtung"){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=Belichtung'>"?>5. Kamera: Belichtung</a></li>
						 <li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == "Belichtung_Teil2"){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=Belichtung_Teil2'>"?>6. Kamera: Belichtung Teil 2</a></li>
						  <li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == "Licht"){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=Licht'>"?>7. Licht</a></li>
						   <li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == "Ton"){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=Ton'>"?>8. Ton</a></li>
						    <li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == "Klappe"){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=Klappe'>"?>9. Klappe</a></li>
							 <li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == "Maske"){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=Maske'>"?>10. Maske</a></li>
							  <li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == "Schauspiel"){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=Schauspiel'>"?>11. Schauspiel</a></li>
							   <li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"];if($kapitel == "Schnitt"){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=Schnitt'>"?>12. Schnitt</a></li>
							    <li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == "Postproduktion"){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=Postproduktion'>"?>13. Postproduktion</a></li>
								 <li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == "Finanzierung"){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=Finanzierung'>"?>14. Finanzierung</a></li>
            </ul>
        </div>



<div class="content">
<div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
					<?php
						if (empty($_GET)){include "content/html/404.html"; exit();}
						$kapitel = $_GET["kap"];
						$path = "content/html/" . $kapitel . ".php";
						if(file_exists($path)){
							include $path;
						}else{ 
							include "content/html/404.html";
						}
					?>
					
		
        </div>
		
</div>

</div>
</div>

</body>
</html>