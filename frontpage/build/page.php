<div id="description" class="col-sm-8 post comments">
	<div class="responsive-video">
		<iframe src="<?php
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
						
						// Auslesen des YT-Links
						$auslesung = mysqli_query($db_link,"SELECT * FROM pages Where PageID =" . $_GET["kap"]);
						$ausgabe =  mysqli_fetch_array($auslesung);
						echo $ausgabe['yt-link'];
						?>" frameborder="0" allowfullscreen></iframe>
	</div>
	<div id="ab" class="panel panel-primary post">
		<div class="post-heading">
			<div class="pull-left meta">
				<h3 class="panel-title"><a><b><?php 
						$auslesung = mysqli_query($db_link,"SELECT * FROM pages Where PageID =" . $_GET["kap"]);
						$ausgabe =  mysqli_fetch_array($auslesung);
						echo $ausgabe['Pagename'];?></b></a></h3>
            </div>
        </div> 
        <div class="post-description"> 
			<p><?php
				$auslesung = mysqli_query($db_link,"SELECT * FROM pages Where PageID =" . $_GET["kap"]);
				$ausgabe =  mysqli_fetch_array($auslesung);
				echo $ausgabe['description']; ?></p>
		</div>
	</div>
</div>
<div class="row hidden-xs">
	<?php
		$auslesung = mysqli_query($db_link,"SELECT * FROM pages Where PageID =" . $_GET["kap"]);
		$ausgabe =  mysqli_fetch_array($auslesung);
		$tokens = explode(",",$ausgabe['pdfs']);
		foreach ($tokens as $val){
			echo '<div class="col-sm-4"><a href="/content/pdf/';
			echo $val;
			echo '.pdf" class="thumbnail thumb" download><img class="thumb" src="content/pics/pdf.png"/></a></div>';
		}
	?>
</div>	