<div class="container">
	<div class="row">
		<div class="col-xs-10 col-md-10 mar45 col-centered">
			<div class="jumbotron">
				<div class="pull-left">
					<h1>Hallo!</h1>
					<p>Lerne einfach und simpel, wie man einen Film erstellt.</p>
					<p><a class="btn btn-primary btn-lg" href="index.php?loc=kapitel&kap=1" role="button">Starte mit deiner ersten Lektion</a></p>
				</div>
				<div class="pull-right">
					<img class="img-responsive home_img" id="kamera" src="content/pics/camera.png"/>
				</div>
			</div>
		</div>
		</div>
</div>
			
<div class="container container_back">			
	<?php
		$pageinfo = mysqli_query($db_link,"SELECT `Pagename`,`PageID` FROM `pages` ORDER BY PageID");
		while ($row = mysqli_fetch_array($pageinfo)){
		$path = "content/pics/home_" . $row["PageID"] . ".png";
		echo '<div class="col-xs-6 col-md-4 col-lg-3 home_select"><a href="index.php?loc=kapitel&kap='. $row["PageID"];
		echo '"><div class="panel panel-default">';
		echo '<div class="panel-body"><img class="img-responsive home_img" src="';
		if (file_exists($path)) { echo $path; } else { echo 'content/pics/missing.png';}
		echo '"/></div>';
		echo '<div class="panel-footer"><h3 class="panel-title">' . "Kapitel ".$row["PageID"]." - ".$row["Pagename"] . '</h3></div></a></div></div>';
		}
	?>
</div>
