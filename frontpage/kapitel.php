<!DOCTYPE html>
<html>

<?php include_once "build/header.php"?>

<body>

<?php include_once "topbar.php";?>

<div class = "sidebar">
 <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 1){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=1'>"?>1. Drehbuch</a></li>
				<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 2){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=2'>"?>2. Auflösung</a></li>
				<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 3){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=3'>"?>3. Kamera: Einstellung</a></li>
				<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 4){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=4'>"?>4. Kamera: HD und 4K</a></li>
				<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 5){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=5'>"?>5. Kamera: Belichtung</a></li>
				<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 6){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=6'>"?>6. Kamera: Belichtung Teil 2</a></li>
				<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 7){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=7'>"?>7. Licht</a></li>
				<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 8){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=8'>"?>8. Ton</a></li>
				<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 9){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=9'>"?>9. Klappe</a></li>
				<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 10){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=10'>"?>10. Maske</a></li>
				<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 11){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=11'>"?>11. Schauspiel</a></li>
				<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"];if($kapitel == 12){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=12'>"?>12. Schnitt</a></li>
				<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 13){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=13'>"?>13. Postproduktion</a></li>
				<li><?php $tag = "<a"; if (empty($_GET)){}else{ $kapitel = $_GET["kap"]; if($kapitel == 14){$tag = $tag . " class='selected'";}} echo $tag . " href='kapitel.php?kap=14'>"?>14. Finanzierung</a></li>
            </ul>
        </div>



<div class="content">
<div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
						<?php
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
		
		//Auslesen der Page über die PageID und Ausgabe des Contents
		if (empty($_GET)){include "404.html"; exit();}
		$auslesung = mysqli_query($db_link,"SELECT * FROM pages Where PageID =" . $_GET["kap"]);
		$ausgabe =  mysqli_fetch_array($auslesung);
		if($ausgabe['Content'] == ""){include "404.html"; exit();}
		echo $ausgabe['Content'];
		?>
					<div class="comments">
				<!--<div class="col-sm-8 post com">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left meta">
                        <div class="panel-title">
                            <a href="#"><b>Ryan Haywood</b></a>
                        </div>
                    </div>
                </div> 
                <div class="post-description"> 
                    <p>Brauche ich Licht bei einer Nachtsicht-Kamera? Oder reicht es, wenn ich draussen bin?</p>
                </div>
            </div>
        </div> -->
		
		
		
<!-- <div class="col-sm-8 ask">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Sag was du denkst...">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="button">Senden</button>
      </span>
    </div>
  </div> -->
  
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
  </div>';
				
				
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
    <li><a href="kapitel.php?kap=<?php echo ($_GET['kap'] - 1) ?>"><button type="button" class="btn btn-primary <?php if($_GET['kap'] == 7){echo "disabled_2";}?>" <?php if($_GET['kap'] == 7){echo "onclick='return false;'";}?>>Zurück</button></a></li>
    <li><a href="kapitel.php?kap=<?php echo ($_GET['kap'] + 1) ?>"><button type="button" class="btn btn-primary <?php if($_GET['kap'] == 14){echo "disabled_2";}?>" <?php if($_GET['kap'] == 14){echo "onclick='return false;'";}?>>Weiter</button></a></li>
  </ul>
</nav>
					
		
        </div>
		
</div>

</div>
</div>

</body>
</html>