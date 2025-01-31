<!doctype HTML>
<html>
	<head>
		<title>Esercizio 001.04 - Pag 2</title>
	</head>
	<body>
		<pre>
			<?php
				var_dump($_REQUEST);
			?>
		</pre>
		
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				echo nl2br("<h2>metodo POST</h2>\n");
				$name = htmlspecialchars($_POST['nome']);
				$surname = htmlspecialchars($_POST['cognome']);
				echo "Nome: " , $name, nl2br("\n");
				echo "Cognome: ", $surname;
			} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
				echo nl2br("<h2>metodo GET</h2>\n");
				$name = htmlspecialchars($_GET['nome']);
				$surname = htmlspecialchars($_GET['cognome']);
				echo "Nome: " , $name, nl2br("\n");
				echo "Cognome: ", $surname;
			}
		?>
		<br><br><br><br>
		<hr>
		<a href="../" >Clicca qui per tornare alla HOME.</a><br>
		<?PHP
			include("../000/000_NavigationMenu.php")
		?>
	</body>
</html>
