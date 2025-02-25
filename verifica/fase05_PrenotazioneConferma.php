<?PHP
	session_start();
	if (isset($_SESSION['fase']) && (int)$_SESSION['fase'] > 3){
		
		$values = explode("|", $_POST['camera']);
		$ID_camera = $values[0];
		$camera = $values[1];

		$_SESSION['ID_camera'] = $ID_camera; 
		$_SESSION['camera'] = $camera; 
		$_SESSION['fase'] = 5;
		
		#unset($_SESSION['ID_camera']);
		#unset($_SESSION['camera']);
?>
<!doctype HTML>
<html>
	<head>
		<title>Esercizi 006 - Prenotazione fase 5</title>
	</head>
	<body>
		<H2 style="color:blue;">
			Prenotazione fase 5 - Conferma prenotazione
		</H2>
		Ciao <strong><?PHP echo $_SESSION['utente']; ?></strong> !<br>
		ID località selezionata: <strong><?PHP echo $_SESSION['ID_bioma'];?></strong><br>
		Località selezionata: <strong><?PHP echo $_SESSION['bioma'];?></strong><br>
		ID Albergo selezionato: <strong><?PHP echo $_SESSION['ID_albergo'];?></strong><br>
		Albergo selezionato: <strong><?PHP echo $_SESSION['albergo'];?></strong><br>
		ID Camera selezionata: <strong><?PHP echo $_SESSION['ID_camera'];?></strong><br>
		Camera selezionata: <strong><?PHP echo $_SESSION['camera'];?></strong><br>
		<br>
		Premi OK per confermare.
		<form method="POST" action="fase06_PrenotazioneUltimata.php">
			<input type="submit" name="PrenotazioneConfermata" class="button" value="OK" />
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