<?PHP
	session_start();
	if (isset($_SESSION['fase']) && (int)$_SESSION['fase'] > 0){
		$_SESSION['fase'] = 2;
		
		unset($_SESSION['ID_bioma']);
		unset($_SESSION['bioma']);
		unset($_SESSION['ID_albergo']);
		unset($_SESSION['albergo']);
		unset($_SESSION['ID_camera']);
		unset($_SESSION['camera']);
?>
<!doctype HTML>
<html>
	<head>
		<title>Esercizi 006 - Prenotazione fase 2</title>
	</head>
	<body>
		<H2 style="color:blue;">
			Prenotazione fase 2 - Località
		</H2>
		Ciao <strong><?PHP echo $_SESSION['utente']; ?></strong> !<br>
		<br>
		<form method="POST" action="fase03_PrenotazioneAlbergo.php">
			<label for="Paesaggio"> Paesaggio : </label>
			<!-- <select id="Paesaggio" name="Paesaggio" onchange="document.getElementById('bioma').value=this.options[this.selectedIndex].value"> -->
			<select id="Paesaggio" name="Paesaggio" onchange="document.getElementById('bioma').value = this.options[this.selectedIndex].value + '|' + this.options[this.selectedIndex].text">
				 <option value="0">Selezione paesaggio</option>
				 <?PHP
					$connection = mysqli_connect('localhost', 'root', '', '5ait_vacanze')
						or die ("ERROR: Cannot connect");
					$sql = "SELECT idBioma, bioma FROM biomi WHERE bioma != 'undefined'";
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
			<input type="text" name="bioma" id="bioma" value="" />
			<input type="submit" name="Fase" value="Scelta albergo"/>
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