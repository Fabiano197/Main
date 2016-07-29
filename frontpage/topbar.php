<script src="js/topbar.js"></script>
<div class="menu_top">
<div id="header" class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="icon-reorder"></i>
        </button>
        <a id="title_name" class="navbar-brand" href="#">
            NKSA School
        </a>
    </div>
    <nav class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kapitel<b class="caret"></b></a>
                <ul class="dropdown-menu">
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
            </li>
            <li>
                <a href="downloads.php">Downloads</a>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-right">
            <li class="dropdown">
                <a href="#" id="nbAcctDD" class="dropdown-toggle" data-toggle="dropdown">Gast <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
                <ul class="dropdown-menu pull-right">
                   <li class="nohover"><a><input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1"></a></li>
    <li class="nohover"><a><input type="text" class="form-control" placeholder="Passwort" aria-describedby="basic-addon1"></a></li>
	<li role="separator" class="divider"></li>
	<li><a href="profil.php">Login</a></li>
    <li role="separator" class="divider"></li>
    <li><a>Register</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
</div>