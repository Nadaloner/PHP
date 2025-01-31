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
		<ul>
			<li><a href="../000/" target="">Esercizi 000</a></li>
			<li><a href="../001/" target="">Esercizi 001</a></li>
			<li><a href="../002/" target="">Esercizi 002</a></li>
			<li><a href="../003/" target="">Esercizi 003</a></li>
			<li><a href="../004/" target="">Esercizi 004</a></li>
			<li><a href="../005/" target="">Esercizi 005</a></li>
			<li><a href="../006/" target="">Esercizi 006</a></li>
		</ul>
	</body>
</html>
