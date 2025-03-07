<!doctype HTML>
<html>
	<head>
		<title>Esercizio 006.01 - Pag 1</title>
	</head>
	<body>
		<p><H2>
			Lettura dati da Database.
		</H2></p>
		<?PHP
			$connection = mysqli_connect('localhost', 'root', '', 'vacanze')
				or die ("ERROR: Cannot connect");
			$sql = "SELECT TABLE_NAME, TABLE_ROWS FROM information_schema.tables WHERE TABLE_SCHEMA = 'vacanze';";
			
			//echo $sql . "<BR><BR>";
			
			$result = mysqli_query($connection, $sql)
				or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");

			echo "<TABLE border = 1>";	
			echo "<TR><TH>Nome tabella</TH><TH>Numero record</TH></TR>";	
			while ($row = mysqli_fetch_row($result)) {
				echo "<TR><TD>$row[0]</TD><TD>$row[1]</TD></TR>";	
			}
			echo "</TABLE>";	

			mysqli_close($connection);
		?>
		<br>
		<?PHP
			include("../000/000_NavigationMenu.php");
		?>
	</body>
</html>
