<?PHP
	session_start();
	if (isset($_SESSION['fase']) && (int)$_SESSION['fase'] > 2){
		
		$values = explode("|", $_POST['albergo']);
		$ID_albergo = $values[0];
		$albergo = $values[1];

		$_SESSION['ID_albergo'] = $ID_albergo; 
		$_SESSION['albergo'] = $albergo; 
		$_SESSION['fase'] = 4;
		
		unset($_SESSION['ID_camera']);
		unset($_SESSION['camera']);
?>
<!doctype HTML>
<html>
	<head>
		<title>Esercizi 006 - Prenotazione fase 4</title>
	</head>
	<body>
		<H2 style="color:blue;">
			Prenotazione fase 4 - Camera
		</H2>
		Ciao <strong><?PHP echo $_SESSION['utente']; ?></strong> !<br>
		ID località selezionata: <strong><?PHP echo $_SESSION['ID_bioma'];?></strong><br>
		Località selezionata: <strong><?PHP echo $_SESSION['bioma'];?></strong><br>
		ID Albergo selezionato: <strong><?PHP echo $_SESSION['ID_albergo'];?></strong><br>
		Albergo selezionato: <strong><?PHP echo $_SESSION['albergo'];?></strong><br>
		<br>
		<form method="POST" action="fase05_PrenotazioneConferma.php">
			<label for="Camera"> Camera : </label>
			<select id="Camera" name="Camera" onchange="document.getElementById('camera').value = this.options[this.selectedIndex].value + '|' + this.options[this.selectedIndex].text">">">
				 <option value="0">Selezione camera</option>
				 <?PHP
					$connection = mysqli_connect('localhost', 'root', '', 'vacanze')
						or die ("ERROR: Cannot connect");
					$sql = "SELECT ID_camera, camera FROM camere WHERE ID_albergo = " . $_SESSION['ID_albergo'];
					$result = mysqli_query($connection, $sql)
						or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");
					
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_row($result)) {
							echo "<option value="  . $row[0] . ">" . $row[1] . "</option>";
						}
					}
					mysqli_close($connection);
			?>		 
			</select>
			<input type="text" name="camera" id="camera" value="" />
			<input type="submit" name="Fase" value="Conferma prenotazione"/>
		</form>
<?PHP
	echo "<br><br><br>";
	echo "<font color=\"gray\">Contenuto array" . '$_SESSION';
	echo "<br>";
	print_r($_SESSION);
	echo "</font>";
?>
	</body>
</html>
<?PHP
	} else {
		print_r($_SESSION);
		echo "<br>";
		echo "fase :" . $_SESSION['fase'] . "<br>";
		echo "no<br>";
	}
?>
<?PHP
	include("../000/000_NavigationMenu.php");
?>