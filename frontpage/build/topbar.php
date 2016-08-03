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
					<a href="index.php?loc=home">Home</a>
				</li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kapitel<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php
							$chapters = array("Drehbuch", "Auflösung", "Kamera: Einstellung", "Kamera: HD und 4K", "Kamera: Belichtung", "Kamera: Belichtung Teil 2", "Licht", "Ton", "Klappe", "Maske", "Schauspiel", "Schnitt", "Postproduktion", "Finanzierung");
							for($i = 0; $i < count($chapters); $i++){
								echo "<li>";
								echo "<a";
								if(!empty($_GET["kap"]) && $_GET["kap"] == ($i+1)){
									echo " class='selected'";
								}
								echo " href='index.php?loc=kapitel&kap=" . ($i + 1) . "'>" . ($i+1) . ". " . $chapters[$i] . " </a>";
								echo "</li>";
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
					<a href="#" id="nbAcctDD" class="dropdown-toggle" data-toggle="dropdown">Gast <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
					<ul class="dropdown-menu pull-right">
					   <li class="nohover"><a><input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1"></a></li>
		<li class="nohover"><a><input type="text" class="form-control" placeholder="Passwort" aria-describedby="basic-addon1"></a></li>
		<li role="separator" class="divider"></li>
		<li><a href="index.php?loc=profil">Login</a></li>
		<li role="separator" class="divider"></li>
		<li><a>Register</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>