<!doctype HTML>
<html>
	<head>
		<title>Esercizi 008 - Sessioni</title>
	</head>
	<body>
		<p><H2>
			Sessioni
		</H2></p>
<?PHP
	session_start();
	$_SESSION['Saluto'] = 'Ciao';
	$inputUtente = "Riccardo";
	$inputPass = "Abc123!";
	
	$_SESSION['Utente'] = $inputUtente;
	$_SESSION['Password'] = $inputPass;
	
	echo "Saluto: <STRONG>" . $_SESSION['Saluto'] . "</STRONG><BR>";
	echo "Utente: " . $_SESSION['Utente'] . "<BR>";
	$_SESSION = array();
	echo "<BR><BR>Dopo aver sbiancato l'array delle variabili di sessione" . "<BR>";
	echo "Saluto: <STRONG>" . $_SESSION['Saluto'] . "</STRONG><BR>";
	echo "Utente: " . $_SESSION['Utente'] . "<BR>";
	session_destroy();
?>
	</body>
</html>

<?PHP
	include("../000/000_NavigationMenu.php")
?>