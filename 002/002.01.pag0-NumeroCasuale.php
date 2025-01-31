<!doctype HTML>
<html>
	<head>
		<title>Esercizio 002.01 - INFO</title>
	</head>
	<body>
		<p>
			Generazione di un numero casuale.
		</p>
		<?PHP
			echo "Numero causale:<br>";
			echo rand() . "<br>" . "<br>";
			echo "Numero causale compreso tra 15 e 37:<br>";
			echo rand(15, 37);
		?>
		<br>
		<?PHP
			include("../000/000_NavigationMenu.php")
		?>
	</body>
</html>
