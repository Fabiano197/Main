	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<div class="jumbotron">
					<h1>Hallo!</h1>
					<p>Lerne einfach und simpel, wie man einen Film erstellt.</p>
					<p><a class="btn btn-primary btn-lg" href="index.php?loc=kapitel&kap=1" role="button">Starte mit deiner ersten Lektion</a></p>
					<img class="hidden-xs img-responsive home_img" id="kamera" src="content/pics/kamera.png"/>
				</div>
			</div>
			<?php
				$pageinfo = mysqli_query($db_link,"SELECT `Pagename`,`PageID` FROM `pages` ORDER BY PageID");
				while ($row = mysqli_fetch_array($pageinfo)){
					$path = "content/pics/home_" . $row["PageID"] . ".png";
					echo '<div class="col-xs-6 col-md-4 col-lg-3 home_select"><a href="index.php?loc=kapitel&kap='. $row["PageID"] .'"><div class="panel panel-default shadow_select"><div class="panel-heading"><h3 class="panel-title">';
					echo "Kapitel ".$row["PageID"]."<br>- ".$row["Pagename"];
					echo '</h3></div><div class="panel-body"><img class="img-responsive home_img" src="';
					if (file_exists($path)) { echo $path; } else { echo 'content/pics/missing.png';}
					echo '"/></div></div></a></div>';
				}
			?>
		</div>
	</div>
</div>