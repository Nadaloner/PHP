<!doctype HTML>
<html>
	<head>
		<title>Esercizio 001.02 - Pag 1</title>
	</head>
	<body>	
		<p>
			<ol>
				<li>Si imposta il valore della variabile $a uguale a 5.</li>
				<li>Si visualizza la variabile all'interno della pagina HTML.</li>
				<li>Premendo sul link si va alla pagina successiva passando<br>
				la variabile $a in chiaro all'interno del url.</li>
			</ol>
			================================================<br>
			<br>
		</p>
			<div>
			<?php
				$a = 5;
				echo $a;
			?>
		</div>
		<br>
		<a href="001.02.pag2.php?a=<?php echo $a; ?>" >Clicca qui per andare alla pagina seguente passando la variabile $a.</a>
		<br>
		<?PHP
			include("../000/000_NavigationMenu.php")
		?>
	</body>
</html>
