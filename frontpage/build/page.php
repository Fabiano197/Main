<div id="description" class="col-sm-8 post comments">
	<div class="responsive-video">
		<iframe src="<?php
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
						// Titel auslesen
						$auslesung = mysqli_query($db_link,"SELECT * FROM pages Where PageID =" . $_GET["kap"]);
						$ausgabe =  mysqli_fetch_array($auslesung);
						echo $ausgabe['Pagename'];?></b></a></h3>
            </div>
        </div> 
        <div class="post-description"> 
			<p><?php
				// Beschreibung auslesen
				$auslesung = mysqli_query($db_link,"SELECT * FROM pages Where PageID =" . $_GET["kap"]);
				$ausgabe =  mysqli_fetch_array($auslesung);
				echo $ausgabe['description']; ?></p>				
		</div>	
	</div>
	<div id="page_corr" class="row visible-xs panel panel-primary post">
		<div class="post-description">
		<?php
			// PDF's auslesen
			$auslesung = mysqli_query($db_link,"SELECT * FROM pages Where PageID =" . $_GET["kap"]);
			$ausgabe =  mysqli_fetch_array($auslesung);
			if($ausgabe['pdfs'] != ""){
			$tokens = explode(",",$ausgabe['pdfs']);
				foreach ($tokens as $val){
					echo '<div class="col-xs-4"><a href="/content/pdf/';
					echo $val;
					echo '.pdf" class="thumbnail thumb" download><img class="thumb" src="content/pics/pdf.png"/></a></div>';
				}
			}
		?>
		</div>
	</div>
</div>

<div class="row hidden-xs">
	<?php
		// PDF's auslesen
		$auslesung = mysqli_query($db_link,"SELECT * FROM pages Where PageID =" . $_GET["kap"]);
		$ausgabe =  mysqli_fetch_array($auslesung);
		if($ausgabe['pdfs'] != ""){
		$tokens = explode(",",$ausgabe['pdfs']);
			foreach ($tokens as $val){
				echo '<div class="col-sm-4"><a href="/content/pdf/';
				echo $val;
				echo '.pdf" class="thumbnail thumb" download><img class="thumb" src="content/pics/pdf.png"/></a></div>';
			}
		}
	?>
</div>	

