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
                    <li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 1){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=1'>"?>1. Drehbuch</a></li>
					<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 2){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=2'>"?>2. Auflösung</a></li>
					<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 3){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=3'>"?>3. Kamera: Einstellung</a></li>
					<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 4){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=4'>"?>4. Kamera: HD und 4K</a></li>
					<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 5){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=5'>"?>5. Kamera: Belichtung</a></li>
					<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 6){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=6'>"?>6. Kamera: Belichtung Teil 2</a></li>
					<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 7){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=7'>"?>7. Licht</a></li>
					<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 8){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=8'>"?>8. Ton</a></li>
					<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 9){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=9'>"?>9. Klappe</a></li>
					<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 10){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=10'>"?>10. Maske</a></li>
					<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 11){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=11'>"?>11. Schauspiel</a></li>
					<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"];if($kapitel == 12){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=12'>"?>12. Schnitt</a></li>
					<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 13){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=13'>"?>13. Postproduktion</a></li>
					<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 14){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=14'>"?>14. Finanzierung</a></li>
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