<!doctype HTML>
<html>
	<head>
		<title>Esercizio 001.01 - Pag 1</title>
	</head>
	<body>
		<p>
			<ol>
				<li>Si imposta il valore della variabile $a uguale a 5.</li>
				<li>Si visualizza la variabile all'interno della pagina HTML.</li>
				<li>Premendo sul link si va alla pagina successiva.</li>
			</ol>
			================================================<br>
			<br>
		</p>
		<div>
		<?php
			$a = 5;
			echo "a = ".$a;
		?>
		</div>
		<br>
		<a href="001.01.pag2.php" >Clicca qui per andare alla pagina seguente.</a>
		<br>
		<?PHP
			include("../000/000_NavigationMenu.php")
		?>
	</body>
</html>
