<script src="js/topbar.js"></script>

<div class="menu_top hidden-xs">
	<div id="header" class="navbar navbar-default navbar-static-top">
		<div class="navbar-header">
			<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
				<i class="icon-reorder"></i>
			</button>
			<a id="title_name" class="navbar-brand">
				NKSA School
			</a>
		</div>
		<nav class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li>
					<a href="index.php?loc=home">Home</a>
				</li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kapitel<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php
							// SQL Datenbank verlinken
							define ( 'MYSQL_HOST',      'localhost' );
							define ( 'MYSQL_BENUTZER',  'wpp' );
							define ( 'MYSQL_KENNWORT',  'Wppgamer1998,' );
							define ( 'MYSQL_DATENBANK', 'sncmsdb' );
							$db_link = mysqli_connect(MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);
								
							// Falls Verlinkung zur SQL-Datenbank nicht funktioniert
							if(!$db_link){
								exit("Verbindungsfehler: ".mysqli_connect_error());
							} 
							
							// Auslesen der Titel und ID'S, um die Auswahl zu erstellen
							$pageinfo = mysqli_query($db_link,"SELECT `Pagename`,`PageID` FROM `pages` ORDER BY PageID");
							while ($row = mysqli_fetch_array($pageinfo)){
								echo "<li><a class='top_black'";
								if(!empty($_GET) && isset($_GET['kap']) && $_GET["kap"] == $row["PageID"]){
									echo " class='selected'";
								}
								echo " href='index.php?loc=kapitel&kap=" . $row["PageID"] . "'>Kapitel ".$row["PageID"]." - ".$row["Pagename"] . " </a></li>";
							}
						?>	
					</ul>
				</li>
				<li>
					<a href="index.php?loc=downloads">Downloads</a>
				</li>
			</ul>
			<ul class="nav navbar-nav pull-right">
				<li class="dropdown">
					<a href="#" id="nbAcctDD" class="dropdown-togglev" data-toggle="dropdown">Gast <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
					<ul class="dropdown-menu pull-right">
					   <li class="nohover"><a class="top_black"><input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1"></a></li>
		<li class="nohover"><a class="top_black"><input type="text" class="form-control" placeholder="Passwort" aria-describedby="basic-addon1"></a></li>
		<li role="separator" class="divider"></li>
		<li><a class="top_black" href="index.php?loc=profil">Login</a></li>
		<li role="separator" class="divider"></li>
		<li><a class="top_black">Register</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>

<div class="menu_top navbar_mobile visible-xs">
	<div id="header" class="navbar navbar-default navbar-static-top navbar_center">
	<a id="title_name" class="navbar-brand" href="#">NKSA School</a>
		<div class="navbar-header">
			<a class="navbar-brand navbar-brand_top" href="index.php?loc=home">Home</a>
			<a class="navbar-brand navbar-brand_top" href="index.php?loc=downloads">Downloads</a>
			<a class="navbar-brand navbar-brand_top" href="index.php?loc=profil">Login</a>
		</div>
	</div>
</div>