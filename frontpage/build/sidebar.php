<div id="sidebar-wrapper">
	<ul class="sidebar-nav">
		<?php	
			$pageinfo = mysqli_query($db_link,"SELECT `Pagename`,`PageID` FROM `pages`");
			while ($row = mysqli_fetch_array($pageinfo)){
				echo "<li><a";
				if(!empty($_GET) && $_GET["kap"] == $row["PageID"]){
					echo " class='selected'";
				}
				echo " href='index.php?loc=kapitel&kap=" . $row["PageID"] . "'>" . $row["PageID"] . ". " . $row["Pagename"] . " </a></li>";
			}
		?>
	</ul>
</div>
