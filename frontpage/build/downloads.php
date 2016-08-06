<div class="container ">
	<div class="jumbotron">
		<?php 
			// Auslesen der Titel und PDF's
			$pageinfo = mysqli_query($db_link,"SELECT `Pagename`,`pdfs` FROM `pages`");
			$titel = array();
			$pdf = array();
			while ($row = mysqli_fetch_array($pageinfo)){
				array_push($titel,$row['Pagename']);
				array_push($pdf,$row['pdfs']);
			}
			
			// Erstellung der Titel
			for($i = 0;count($titel)/7 >= $i;$i++){
				echo '<table class="table"><thead class="thead-inverse"><tr><th>#</th>';
				for($indti = 7*$i;$indti < $i+7 && $indti < count($titel); $indti++){
					echo'<th>'. $titel[$indti] .'</th>';
				}
				echo '</tr></thead><tbody>';
				
				// Berechnung der Grössten pdf-serie
				$maxsize = 0;
				for($indti = 7*$i;$indti < $i+7 && $indti < count($titel); $indti++){
					if(count(explode(",",$pdf[$indti])) > $maxsize){$maxsize = count(explode(",",$pdf[$indti]));}
				}
				
				// Erstellung der PDF's
				for($ind = 0; $ind < $maxsize; $ind++){
					echo'<tr><th scope="row">'. ($ind + 1) .'</th>';
						for($indti = 7*$i;$indti < $i+7; $indti++){
							echo'<td>';
							if($indti < count($titel) && count(explode(",",$pdf[$indti]))> $ind){
								$names = explode(",",$pdf[$indti]);
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
