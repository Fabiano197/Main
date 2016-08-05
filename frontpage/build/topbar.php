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
							// SQL Datenbank verlinken
							define ( 'MYSQL_HOST',      'localhost' );
							define ( 'MYSQL_BENUTZER',  'program' );
							define ( 'MYSQL_KENNWORT',  'qwertzy13' );
							define ( 'MYSQL_DATENBANK', 'sncmsdb' );
							$db_link = mysqli_connect(MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);
								
							// Falls Verlinkung zur SQL-Datenbank nicht funktioniert
							if(!$db_link){
								exit("Verbindungsfehler: ".mysqli_connect_error());
							} 
							$pageinfo = mysqli_query($db_link,"SELECT `Pagename`,`PageID` FROM `pages`");
							while ($row = mysqli_fetch_array($pageinfo)){
								echo "<li><a";
								if(!empty($_GET) && isset($_GET['kap']) && $_GET["kap"] == $row["PageID"]){
									echo " class='selected'";
								}
								echo " href='index.php?loc=kapitel&kap=" . $row["PageID"] . "'>" . $row["Pagename"] . " </a></li>";
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