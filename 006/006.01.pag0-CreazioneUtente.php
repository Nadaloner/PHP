<?php
if (!isset($_POST["ModuloRegistrazione"])) {
?>
<!doctype HTML>
<html>
	<head>
		<title>Esercizi 006 - Creazione Utente</title>
	</head>
	<body>
		<p>
			<h1>Creazione Utente</h1>
		</p>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
			Utente: <input type="text" name="utente" required ><br>
			Password: <input type="text" name="password" required><br>
			<input type="submit" name ="ModuloRegistrazione" value="invia POST" />
		</form>
	</body>
</html>
<?php
} else {
	$inputUtente = trim($_POST["utente"]);
	$inputPass = trim($_POST["password"]);
	$ip = $_SERVER['REMOTE_ADDR'];
		if ($ip !== '172.16.11.12 or localhost') {
			die("Via Via");
		}

	$pwd = sha1(string: $inputPass);
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
<?php
include("../000/000_NavigationMenu.php")
?>