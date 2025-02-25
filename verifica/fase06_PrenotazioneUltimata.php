<?PHP
	session_start();
	if (isset($_SESSION['fase']) && (int)$_SESSION['fase'] > 3){
		$_SESSION['fase'] = 6;
?>
<!doctype HTML>
<html>
	<head>
		<title>Esercizi 006 - Prenotazione fase 6</title>
	</head>
	<body>
		<H2 style="color:blue;">
			Prenotazione fase 6 - Prenotazione ultimata.
		</H2>
		Ciao <strong><?PHP echo $_SESSION['utente']; ?></strong> !<br>
		ID località selezionata: <strong><?PHP echo $_SESSION['ID_bioma'];?></strong><br>
		Località selezionata: <strong><?PHP echo $_SESSION['bioma'];?></strong><br>
		ID Albergo selezionato: <strong><?PHP echo $_SESSION['ID_albergo'];?></strong><br>
		Albergo selezionato: <strong><?PHP echo $_SESSION['albergo'];?></strong><br>
		ID Camera selezionata: <strong><?PHP echo $_SESSION['ID_camera'];?></strong><br>
		Camera selezionata: <strong><?PHP echo $_SESSION['camera'];?></strong><br>
		<br>
		Numero prenotazione: xxx<br>
		Conserva questo numero, ti servità al momento dell'ingresso in albergo per ritirare le chiavi.<br>
		<br>
		Ti ringraziamo per la fiducia accordatati,<br>
		a presto <?PHP echo $_SESSION['utente']; ?>.
		
<?PHP
	echo "<br><br><br>";
	echo "<font color=\"gray\">Contenuto array" . '$_SESSION';
	echo "<br>";
	print_r($_SESSION);
	echo "</font>";
	session_destroy();
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