<div class = "sidebar">
	<div id="wrapper">
		<?php include_once "sidebar.php"?>
		<div class="content">
			<div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<?php
								// Überpfrüfung des GET's und entsprechende Ausgabe von 404
								if (empty($_GET) || $_GET['kap'] == ""){include "404.html"; exit();}
								if (mysqli_fetch_array(mysqli_query($db_link,"SELECT * FROM pages Where PageID =" . $_GET["kap"])) == ""){include "404.html"; exit();}
								include "build/page.php"; ?>
						
						<div class="comments">
							<?php
							// SQL Datenbank verlinken
							$db_link = mysqli_connect(MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);
							
							// Falls Verlinkung zur SQL-Datenbank nicht funktioniert
							if(!$db_link){
							  exit("Verbindungsfehler: ".mysqli_connect_error());
							}
							
							//ID des angemeldeten Benutzers
							$id = "ADM1Nadm1n";
							
							//Nutzerinformationen auslesen
							$idAuslesung = ("SELECT * FROM auth WHERE ID='".$id."'");
							$idAuslesen = mysqli_query($db_link, $idAuslesung);
							$userinformations = mysqli_fetch_assoc($idAuslesen);
							$berechtigung = $userinformations['Permission'];
							$bname = $userinformations['User'];
							
							
							//Kommentar in SQL eintragen
							if(!empty($_POST['titel']) && !empty($_POST['kommentar']) && $berechtigung > 0){
								$kommentar = $_POST["kommentar"];
								$titel = $_POST["titel"];
								$eintrag = "INSERT INTO kommentare (Benutzer, Datum, Kommentar, Titel) VALUES ('$bname', NOW(), '$kommentar', '$titel')";
								$eintragen = mysqli_query($db_link, $eintrag);
							}
							
							// bestehende Kommentare auslesen
							$auslesung = ("SELECT * FROM Kommentare ORDER BY Datum");
							$auslesen = mysqli_query($db_link, $auslesung);
							
							// Falls Auslesung nicht funktioniert
							if(!$auslesen){
								exit("Auslesefehler: ".mysqli_error($db_link));
							}
							
							//Darstellen von Kommentaren
							while ($zeile = mysqli_fetch_array($auslesen)){
							echo '<div class="col-sm-8 post com">
								<div class="panel panel-white post panel-shadow">
									<div class="post-heading">
										<div class="pull-left meta">
											<div class="panel-title">
												<a href="#"><b>';
												
												echo  $zeile['Titel'];
												
												echo'</b></a>
											</div>
										</div>
									</div> 
									<div class="post-description"> 
										<p>';
										
										echo $zeile['Kommentar']; 
										echo '</p>
									</div>
								</div>
							</div>';
							 
							}
							
							//Falls kein Kommentar oder kein Titel geschrieben wurde
							$keinKommentar = false;
							$keinTitel = false;
							if(empty($_POST['kommentar']) && !empty($_POST['titel'])){
								echo "<p> <font color=\"red\">Bitte schreiben Sie etwas in Ihren Kommentar!</font> </p>";
								$keinKommentar = true;
							}
							else if(empty($_POST['titel']) && !empty($_POST['kommentar'])){
								echo "<p> <font color=\"red\">Bitte geben Sie Ihrem Kommentar einen Titel!</font> </p>";
								$keinTitel = true;
							}
							
								if($berechtigung > 0){
									echo '<form action="kapitel.php?kap=' . $_GET['kap'] . '" method="POST" id="usrform">
									
									<div class="col-sm-8 ask">
									<div class="input-group ask">
									<input id="titel" name="titel" form="usrform" type="text" class="form-control" placeholder="Titel">
									</div>
									';
									
									
									//Falls kein Kommentar hinzugefügt wurde, wird der bereits geschriebene Titel wieder geladen
									
									if($keinKommentar){
										echo $_POST['titel'];
									} 
									
										echo '</textarea>
									<div class="form-group">
								
									<textarea class="form-control" rows="15" name="kommentar" form="usrform" id="kommentar">';
									
									
									//Falls kein Titel hinzugefügt wurde, wird der bereits geschriebene Kommentar wieder geladen
									
									if($keinTitel){
										echo $_POST['kommentar'];
									}
									
										echo '</textarea>	
										</div>
										</div>
										
										<div class="col-sm-8 ask">
									<div class="input-group">
									<span class="input-group-btn">
									<a><button type="submit" value="senden" name="submitbutton" class="btn btn-primary">Senden</button></a>
									</span>
									</div>
									</div>
									</form>';
								}
							?>
						</div>
					</div>
                </div>
				
            </div>
				<nav>
					<ul class="pager">
						<li><a href="index.php?loc=kapitel&kap=<?php echo ($_GET['kap'] - 1) ?>"><button type="button" class="btn btn-primary <?php if($_GET['kap'] == 1){echo "disabled_2";}?>" <?php if($_GET['kap'] == 1){echo "onclick='return false;'";}?>>Zurück</button></a></li>
						<li><a href="index.php?loc=kapitel&kap=<?php echo ($_GET['kap'] + 1) ?>"><button type="button" class="btn btn-primary <?php if($_GET['kap'] == 14){echo "disabled_2";}?>" <?php if($_GET['kap'] == 14){echo "onclick='return false;'";}?>>Weiter</button></a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
	