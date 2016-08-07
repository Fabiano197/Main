<div id="sidebar-wrapper">
	<ul class="sidebar-nav">
		<?php	
			// Auslesen der Titel und ID'S, um die Auswahl zu erstellen
			$pageinfo = mysqli_query($db_link,"SELECT `Pagename`,`PageID` FROM `pages` ORDER BY PageID");
			while ($row = mysqli_fetch_array($pageinfo)){
				echo "<li><a";
				if(!empty($_GET) && $_GET["kap"] == $row["PageID"]){
					echo " class='selected'";
				}
				echo " href='index.php?loc=kapitel&kap=" . $row["PageID"] . "'>Kapitel ".$row["PageID"]." - ".$row["Pagename"] . " </a></li>";
			}
		?>
	</ul>
</div>
