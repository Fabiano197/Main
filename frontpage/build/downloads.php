<div class="container hidden-xs">
	<div class="jumbotron">
		<?php 
			// Auslesen der Titel und PDF's
			$pageinfo = mysqli_query($db_link,"SELECT `PageID`,`pdfs` FROM `pages` ORDER BY PageID");
			$titel = array();
			$pdf = array();
			while ($row = mysqli_fetch_array($pageinfo)){
				array_push($titel,$row['PageID']);
				array_push($pdf,$row['pdfs']);
			}
			
			// Erstellung der Titel
			$rowsize = 7;
			for($i = 0;count($titel)/$rowsize > $i;$i++){
				echo '<table class="table"><thead class="thead-inverse"><tr><th>#</th>';
				for($indti = $rowsize*$i;$indti < $i*$rowsize+$rowsize && $indti < count($titel); $indti++){
					echo'<th>Kapitel '. $titel[$indti] .'</th>';
				}
				echo '</tr></thead><tbody>';
				
				// Berechnung der Grössten pdf-serie
				$maxsize = 0;
				for($indti = $rowsize*$i;$indti < $i*$rowsize+$rowsize && $indti < count($titel); $indti++){
					if(count(explode(",",$pdf[$indti])) > $maxsize){$maxsize = count(explode(",",$pdf[$indti]));}
				}
				
				// Erstellung der PDF's
				for($ind = 0; $ind < $maxsize; $ind++){
					echo'<tr><th scope="row">'. ($ind + 1) .'</th>';
						for($indti = $rowsize*$i;$indti < $i*$rowsize+$rowsize && $indti < count($titel); $indti++){
							echo'<td>';
							$names = explode(",",$pdf[$indti]);
							if(count($names)> $ind){
								echo'<a href="/content/pdf/'. $names[$ind] .'.pdf" download>'. $names[$ind] . '.pdf</a>';
							}
							echo'</td>';
						}
					echo'</tr>';
				}
				
				echo '</tbody></table>';
			}
		?>
	</div>
</div>

