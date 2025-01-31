<!doctype HTML>
<html>
	<head>
		<title>Esercizio 003.02 - Pag 1</title>
	</head>
	<body>
		<p>
			<h2>Recupera la cartella corrente.</h2>
			<?PHP
				echo "getcwd()" . "<br>";
				echo "&nbsp" . "&nbsp" . getcwd() . "<br>" . "<br>";
				echo "dirname(__FILE__)" . "<br>";
				echo "&nbsp" . "&nbsp" . dirname(__FILE__) . "<br>" . "<br>";
				echo "basename(__DIR__)" . "<br>";
				echo "&nbsp" . "&nbsp" . basename(__DIR__) . "<br>" . "<br>";
			?>
		</p>
		<p>
			<h2>Elenca i files presenti nella cartella corrente (<?PHP echo basename(__DIR__) ?>).</h2>
			<?PHP
				foreach (new DirectoryIterator('.') as $file) {
					if($file->isDot()) continue;
					//echo $file->getFilename() . "<br>";
					echo $file->getFilename();
					if ($file->getFilename() == basename($_SERVER['PHP_SELF']))
						echo "<font color=\"red\"> - SONO IO -</font>";
					echo "<br>";
				}
			?>
		</p>
		<br>
		<?PHP
			include("../000/000_NavigationMenu.php")
		?>
	</body>
</html>
