<!doctype HTML>
<html>
	<head>
		<title>Esercizio 001.04 - Pag 1</title>
	</head>
	<body>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
			Nome: <input type="text" name="nome"><br>
			Cognome: <input type="text" name="cognome"><br>
			<input type="submit" value="invia POST" />
		</form>
		<br>
		<form name=metodoPost action=001.04.pag2.php method=post>
			<input type=text name="nome" placeholder="inserisci il nome" required />
			<input type=text name="cognome" placeholder="inserisci il cognome" required />
			<input type=submit name="invia post" value="invia POST" />
		</form>
		<br>
		<form name=metodoGet action=001.04.pag2.php method=get>
			<input type=text name="nome" placeholder="inserisci il nome" required />
			<input type=text name="cognome" placeholder="inserisci il cognome" required />
			<input type=submit name="invia get" value="invia GET" />
		</form>
		<br><br><br><br>
		<hr>
		<a href="../" >Clicca qui per tornare alla HOME.</a><br>
		<?PHP
			include("../000/000_NavigationMenu.php")
		?>
	</body>
</html>
