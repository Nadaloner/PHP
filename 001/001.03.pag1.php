<!doctype HTML>
<html>
	<head>
		<title>Esercizio 001.03 - Pag 1</title>
	</head>
	<body>	
		<p>
			<ol>
				<li>Si imposta il valore alle variabile nome, cognome ed eta'.</li>
				<li>Si visualizza il valore delle variabili all'interno della pagina HTML.</li>
				<li>Premendo sul link si va alla pagina successiva passando<br>
				le variabili in chiaro all'interno del url.</li>
			</ol>
			================================================<br>
			<br>
		</p>
		<div>
			<?php
				$nome = "Marco";
				$cognome = "Nadalon";
				$eta = 18;
				echo "Mi chiamo $nome $cognome e ho $eta anni.";
				echo "<br>Mi chiamo " . $nome . " " . $cognome . " " . "e ho $eta anni.";
			?>
		</div>
		<br><br>
		<a href="001.03.pag2.php?nome=<?php echo $nome;?>&cognome=<?php echo $cognome;?>&eta=<?php echo $eta;?>" >Clicca qui per andare alla pagina seguente passando le variabili.</a>
		<br>
		<?PHP
			include("../000/000_NavigationMenu.php")
		?>
	</body>
</html>
