<?PHP
	session_start();
	if (isset($_SESSION['fase']) && (int)$_SESSION['fase'] > 1){
		
		$values = explode("|", $_POST['bioma']);
		$ID_bioma = $values[0];
		$bioma = $values[1];
			
		$_SESSION['ID_bioma'] = $ID_bioma; 
		$_SESSION['bioma'] = $bioma; 
		$_SESSION['fase'] = 3;
		
		unset($_SESSION['ID_albergo']);
		unset($_SESSION['albergo']);
		unset($_SESSION['ID_camera']);
		unset($_SESSION['camera']);
?>
<!doctype HTML>
<html>
	<head>
		<title>Esercizi 006 - Prenotazione fase 3</title>
	</head>
	<body>
		<H2 style="color:blue;">
			Prenotazione fase 3 - Albergo
		</H2>
		Ciao <strong><?PHP echo $_SESSION['utente']; ?></strong> !<br>
		ID località selezionata: <strong><?PHP echo $_SESSION['ID_bioma'];?></strong><br>
		Località selezionata: <strong><?PHP echo $_SESSION['bioma'];?></strong><br>
		<br>
		<form method="POST" action="fase04_PrenotazioneCamera.php">
			<label for="Albergo"> Albergo : </label>
			<select id="Albergo" name="Albergo" onchange="document.getElementById('albergo').value = this.options[this.selectedIndex].value + '|' + this.options[this.selectedIndex].text">">
				 <option value="0">Selezione albergo</option>
				 <?PHP
					$connection = mysqli_connect('localhost', 'root', '', 'vacanze')
						or die ("ERROR: Cannot connect");
					$sql = "SELECT ID_albergo, albergo FROM alberghi WHERE ID_bioma = " . $_SESSION['ID_bioma'];
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
			<input type="text" name="albergo" id="albergo" value="" />
			<input type="submit" name="Fase" value="Scelta camera"/>
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
		echo "!! Sessione non attiva !!<br>";
	}
?>
<?PHP
	include("../000/000_NavigationMenu.php");
?>