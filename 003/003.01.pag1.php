<!doctype HTML>
<html>
	<head>
		<title>Esercizio 003.01 - Pag 1</title>
	</head>
	<body>
		<p>
			Controlla l'esistenza della cartella root/003 e root/099.
		</p>
		Directory "003"<br>
		<?PHP
			if (is_dir("../003/"))
			{
				echo "&nbsp" . "&nbsp" . "\tla cartella esiste !!";
			} else {
				echo "&nbsp" . "&nbsp" . "\tla cartella NON esiste !!";
			}
		?>
		<br>
		<br>
		Directory "099"<br>
		<?PHP
			if (is_dir("../099/"))
			{
				echo "&nbsp" . "&nbsp" . "\tla cartella esiste !!";
			} else {
				echo "&nbsp" . "&nbsp" . "\tla cartella NON esiste !!";
			}
		?>
		<br>
		<?PHP
			include("../000/000_NavigationMenu.php")
		?>
	</body>
</html>
