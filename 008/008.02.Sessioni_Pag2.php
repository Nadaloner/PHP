<!doctype HTML>
<html>
	<head>
		<title>Esercizi 008 - Sessioni</title>
	</head>
	<body>
		<p><H2>
			Sessioni pagina 2
		</H2></p>
<?PHP
	session_start();
	if (!isset($_SESSION['fase'])) {
		echo "Non trovo info di sessione";
	} else {
		echo "<BR><BR>Leggo le variabili di sessione impostate nella pagina precedente" . "<BR>";
		echo "Utente: <STRONG>" . $_SESSION['Utente'] . "</STRONG><BR>";
		echo "Password: <STRONG>" . $_SESSION['Password'] . "</STRONG><BR>";
		session_destroy();
	}
?>
	</body>
</html>

<?PHP
	include("../000/000_NavigationMenu.php")
?>