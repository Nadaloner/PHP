<!doctype HTML>
<html>
	<head>
		<title>Esercizio 001.01 - Pag 2</title>
	</head>
	<body>
		<p>			
			Si prova a stampare il valore assegnato alla variabile $a.<br>
			Essendo che la pagina precedente non passa la variabile<br>
			a questa pagina, il server, compilando il codice php<br>
			andra' in errore sollevando un <b>Warning</b>.<br>
			<br>
			================================================<br>
		</p>
		<div>
			<?php
				echo "a = ".$a;
			?>
		</div>
		<br>
		<a href="001.01.pag1.php" >Clicca qui per tornare alla pagina precedente.</a>
		<br>
		<?PHP
			include("../000/000_NavigationMenu.php")
		?>
	</body>
</html>
