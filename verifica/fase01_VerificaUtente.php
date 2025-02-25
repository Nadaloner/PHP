<?PHP
	session_start();
	session_destroy();
	if (!isset($_POST["InvioCredenziali"])) {
?>
<!doctype HTML>
<html>
	<head>
		<title>Esercizi 006 - Verifica Utente</title>
	</head>
	<body>
		<h2>
			Verifica utente / Prenotazione
		</h2>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
			Utente: <input type="text" name="utente"><br>
			Password: <input type="password" name="password"><br>
			<input type="submit" name ="InvioCredenziali" value="Avvia prenotazione" />
		</form>
	</body>
</html>
<?PHP
	} else {
		if (!isset($_POST["utente"]) || trim($_POST["utente"]) == ""){
			die ("Devi inserire un nome utente!");
		} 
		if (!isset($_POST["password"]) || trim($_POST["password"]) == ""){
			die ("Devi inserire una password!");
		} 
		$inputUtente = ($_POST["utente"]);
		$inputPass = ($_POST["password"]);
		
		$pass = MD5($inputPass);
		
		$connection = mysqli_connect('localhost', 'root', '', '5ait_vacanze')
			or die ("ERROR: Cannot connect");
		$sql = "SELECT user FROM dati WHERE user = '$inputUtente' AND password = '$inputPass'";
		
		$result = mysqli_query($connection, $sql)
			or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");
				
		if (mysqli_num_rows(result: $result) > 0) {
			session_start();
			$_SESSION['fase'] = 1;
			$_SESSION['utente'] = $inputUtente;
			$_SESSION['pwd'] = $inputPass;

			header("Location: fase02_PrenotazioneLocalità.php");
		} else {
			echo "!!La combinazione utente/password inserita non è valida !!<BR>";
		}
		mysqli_close($connection);
	}
?>
<?PHP
	include("../000/000_NavigationMenu.php")
?>