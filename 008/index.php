<!doctype HTML>
<html>
	<head>
		<title>Esercizi 008 - index</title>
	</head>
	<body>
		<p><H2>
			Gestione sessioni
		</H2></p>
		<br>
			<ul>
				<li><a href="008.01.Sessioni.php" >Sessioni</a></li>
				<li><a href="008.02.Sessioni_Pag1.php" >Sessioni 2</a></li>
				<li><a href="" >...</a></li>
			</ul>
		<?PHP
			session_start();
			session_destroy();
			include("../000/000_NavigationMenu.php")
		?>
	</body>
</html>
