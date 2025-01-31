<!doctype HTML>
<html>
	<head>
		<title>Esercizio 001.03 - Pag 2</title>
	</head>
	<body>
		<div>
			Questa pagina riceve nel url la variabile $a e la visualizza a schermo<br><br>
			Nome = 
			<?php
				echo $_REQUEST['nome'];
			?><br>
			Cognome = 
			<?php
				echo $_REQUEST['cognome'];
			?><br>
			Eta' = 
			<?php
				echo $_REQUEST['eta'];
			?>
		</div>
		<br>
		<?PHP
			include("../000/000_NavigationMenu.php")
		?>
	</body>
</html>
