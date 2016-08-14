<div class="container hidden-xs hidden-lg down_con">
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
			$rowsize = 6;
			for($i = 0;count($titel)/$rowsize > $i;$i++){
				$end = false;
				echo '<table class="table"><thead class="thead-inverse"><tr><th>#</th>';
				for($indti = $rowsize*$i;$indti < $i*$rowsize+$rowsize && $indti < count($titel); $indti++){
					echo'<th>Kapitel '. $titel[$indti] .'</th>';
					if($indti == count($titel)-1){$end = true;}
				}
				if($end){
					for($encou = 0; $encou < $rowsize-(count($titel)%$rowsize)&& 0 <> count($titel)%$rowsize; $encou++){echo'<th class="down_invisible">Kapitel 0</th>';}
				}
				echo '</tr></thead><tbody>';
				
				// Berechnung der Grössten pdf-serie
				$maxsize = 0;
				for($indti = $rowsize*$i;$indti < $i*$rowsize+$rowsize && $indti < count($titel); $indti++){
					if(count(explode(",",$pdf[$indti])) > $maxsize){$maxsize = count(explode(",",$pdf[$indti]));}
				}
				
				// Erstellung der PDF's
				for($ind = 0; $ind < $maxsize; $ind++){
					$end = false;
					echo'<tr><th class="down_th" scope="row">'. ($ind + 1) .'</th>';
						for($indti = $rowsize*$i;$indti < $i*$rowsize+$rowsize && $indti < count($titel); $indti++){
							echo'<td>';
							$names = explode(",",$pdf[$indti]);
							if(count($names)> $ind && $names[0] != ""){
								echo'<a class="downloads_dws" href="/content/pdf/'. $names[$ind] .'.pdf" download>'. $names[$ind] . '.pdf</a>';
							}
							echo'</td>';
							if($indti == count($titel)-1){$end = true;}
							if($end){
								for($encou = 0; $encou < $rowsize-(count($titel)%$rowsize)&& 0 <> count($titel)%$rowsize; $encou++){echo'<td></td>';}
							}
						}
					echo'</tr>';
				}
				
				echo '</tbody></table>';
			}
		?>
	</div>
</div>

<div class="container visible-xs down_con">
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
			$rowsize = 3;
			for($i = 0;count($titel)/$rowsize > $i;$i++){
				$end = false;
				echo '<table class="table"><thead class="thead-inverse"><tr><th>#</th>';
				for($indti = $rowsize*$i;$indti < $i*$rowsize+$rowsize && $indti < count($titel); $indti++){
					echo'<th>Kapitel '. $titel[$indti] .'</th>';
					if($indti == count($titel)-1){$end = true;}
				}
				if($end){
					for($encou = 0; $encou < $rowsize-(count($titel)%$rowsize) && 0 <> count($titel)%$rowsize; $encou++){echo'<th class="down_invisible">Kapitel 0</th>';}
				}
				echo '</tr></thead><tbody>';
				
				// Berechnung der Grössten pdf-serie
				$maxsize = 0;
				for($indti = $rowsize*$i;$indti < $i*$rowsize+$rowsize && $indti < count($titel); $indti++){
					if(count(explode(",",$pdf[$indti])) > $maxsize){$maxsize = count(explode(",",$pdf[$indti]));}
				}
				
				// Erstellung der PDF's
				for($ind = 0; $ind < $maxsize; $ind++){
					$end = false;
					echo'<tr><th class="down_th" scope="row">'. ($ind + 1) .'</th>';
						for($indti = $rowsize*$i;$indti < $i*$rowsize+$rowsize && $indti < count($titel); $indti++){
							echo'<td>';
							$names = explode(",",$pdf[$indti]);
							if(count($names)> $ind && $names[0] != ""){
								echo'<a class="downloads_dws" href="/content/pdf/'. $names[$ind] .'.pdf" download>'. $names[$ind] . '.pdf</a>';
							}
							echo'</td>';
							if($indti == count($titel)-1){$end = true;}
							if($end){
								for($encou = 0; $encou < $rowsize-(count($titel)%$rowsize) && 0 <> count($titel)%$rowsize; $encou++){echo'<td></td>';}
							}
						}
					echo'</tr>';
				}
				
				echo '</tbody></table>';
			}
		?>
	</div>
</div>


<div class="container visible-lg down_con">
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
			$rowsize = 12;
			for($i = 0;count($titel)/$rowsize > $i;$i++){
				$end = false;
				echo '<table class="table"><thead class="thead-inverse"><tr><th>#</th>';
				for($indti = $rowsize*$i;$indti < $i*$rowsize+$rowsize && $indti < count($titel); $indti++){
					echo'<th>Kapitel '. $titel[$indti] .'</th>';
					if($indti == count($titel)-1){$end = true;}
				}
				if($end){
					for($encou = 0; $encou < $rowsize-(count($titel)%$rowsize)&& 0 <> count($titel)%$rowsize; $encou++){echo'<th class="down_invisible">Kapitel 0</th>';}
				}
				echo '</tr></thead><tbody>';
				
				// Berechnung der Grössten pdf-serie
				$maxsize = 0;
				for($indti = $rowsize*$i;$indti < $i*$rowsize+$rowsize && $indti < count($titel); $indti++){
					if(count(explode(",",$pdf[$indti])) > $maxsize){$maxsize = count(explode(",",$pdf[$indti]));}
				}
				
				// Erstellung der PDF's
				for($ind = 0; $ind < $maxsize; $ind++){
					$end = false;
					echo'<tr><th class="down_th" scope="row">'. ($ind + 1) .'</th>';
						for($indti = $rowsize*$i;$indti < $i*$rowsize+$rowsize && $indti < count($titel); $indti++){
							echo'<td>';
							$names = explode(",",$pdf[$indti]);
							if(count($names)> $ind && $names[0] != ""){
								echo'<a class="downloads_dws" href="/content/pdf/'. $names[$ind] .'.pdf" download>'. $names[$ind] . '.pdf</a>';
							}
							echo'</td>';
							if($indti == count($titel)-1){$end = true;}
							if($end){
								for($encou = 0; $encou < $rowsize-(count($titel)%$rowsize)&& 0 <> count($titel)%$rowsize; $encou++){echo'<td></td>';}
							}
						}
					echo'</tr>';
				}
				
				echo '</tbody></table>';
			}
		?>
	</div>
</div>



