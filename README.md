To-do:
- Design ausarbeiten und festlegen
	- Hintergrund-Muster
	- Begrüssungsbildschirm mit Einleitungstext
	- <s>Auswahlseite</s>
- <s>Kapitel-Content mit php laden</s>
- Downloads mit php laden
- Account erstellen implementieren
- Wenn eingeloggt Registrieren-Button disablen
- Ausloggen-Button implementieren
- Account mit php laden
- Foto hochladen Funktion


Links:
http://paletton.com/palette.php?uid=3040w0koMt%2Bf8GFkkxxtmq9vlkD
http://stackoverflow.com/questions/19462672/jquery-detect-bootstrap-3-state
http://www.jasny.net/bootstrap/javascript/#fileinput

!IMPORTANT!
ÄNDERUNG DER SQL STRUKTUREN VON "pages" UND "kommentare":

"pages":<br>
removed: &emsp; content	&emsp;&emsp;&emsp; text<br>
added:	&emsp;&emsp; yt-link	&emsp;&emsp;&emsp;&emsp; text<br>
added:	&emsp;&emsp; description &emsp;&emsp; text<br>
added:	&emsp;&emsp; pdf &emsp;&emsp;&emsp;&emsp;&emsp; text<br>

"kommentare":<br>
added: &emsp;&emsp; PageID &emsp;&emsp;&emsp; varchar(20)


