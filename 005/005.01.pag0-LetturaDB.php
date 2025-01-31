<!doctype HTML>
<html>
	<head>
		<title>Esercizio 005.01 - Pag 1</title>
	</head>
	<body>
		<p>
			Lettura dati da Database.
		</p>
		<?PHP
			// apertura conessione
			$connection = mysqli_connect('localhost', 'root', '', '5ait_automobili')
			or die ("ERROR: Cannot connect");
			
			// crea ed esegue una query di INSERT
			//$sql = "insert into log (descrizione,utente,nomePagina) values ('Accesso pagina web','NADALON Marco','005.01.pag0-LetturaDB')";
			//$result = mysqli_query($connection, $sql) or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");
			
			// crea ed esegue una query diSELECT
			$sql = "select * from modelli";	
			$result = mysqli_query($connection, $sql) or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");
			
			//verifica le righe restituite
			if (mysqli_num_rows($result) > 0) {
				$numColumns = mysqli_num_fields($result);
				while ($row = mysqli_fetch_row($result)) {
					if (count($row) == $numColumns) {
						echo implode(" - ", $row);
						echo "<br>";
					} else {
						echo "Invalid number of columns in the table!";
					}
				}
			} else {
				echo "No records found!";
			}
			
			// chiude la connessione
			mysqli_close($connection);
		?>
		<br>
		<?PHP
			include("../000/000_NavigationMenu.php")
		?>
	</body>
</html>
