<?PHP
	if (!isset($_POST["ModuloRegistrazione"])) {
?>
<!doctype HTML>
<html>
	<head>
		<title>Esercizi 006 - Verifica Utente</title>
	</head>
	<body>
		<p>
			Registrazione Utente
		</p>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
			Utente: <input type="text" name="utente" required ><br>
			Password: <input type="text" name="password" required><br>
			<input type="submit" name ="ModuloRegistrazione" value="invia POST" />
		</form>
	</body>
</html>
<?PHP
	} else {
		$inputUtente =($_POST["utente"]);
		$inputPass =($_POST["password"]);
		
		$pwd = sha1($inputPass);
		
		$connessione = mysqli_connect('localhost', 'root', '', '5ait_vacanze')
			or die ("ERROR: Cannot connect");
		$sql = "select id from dati where user = '$inputUtente'";
		
		$controllo = mysqli_query($connessione, $sql)
		or die ("ERROR: " . mysqli_error($connessione) . " (la query usata era $sql)");
		
		if (mysqli_num_rows($controllo) > 0) {
			die("Qualcosa è andato storto");
		}

		$InserimentoDatiUtente = "insert into dati (user,password) values ('$inputUtente', '$pwd')";
		$Inserimento = mysqli_query($connessione, $InserimentoDatiUtente);
		
		if ($Inserimento) {
			header("Location: 006.01.pag1-UtenteRegistrato.php");
		} else {
			die("Errore: Qualcosa è andato storto. Riprova più tardi.");
		}


		mysqli_close($connessione);
	}
?>
<html>
	<br>
	<a href="006.01.pag2-AccessoUtente.php">Vai al Log In</a>
</html>
<?PHP
	include("../000/000_NavigationMenu.php")
?>


