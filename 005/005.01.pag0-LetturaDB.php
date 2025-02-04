<!doctype HTML>
<html>
<head>
	<title>Esercizio 005.01 - Pag 1</title>
</head>
<body>
	<p>
		Lettura dati da Database.
	</p>
	<?php
	include('../../PHP/000/000_Log.php');
	// apertura connessione
	$connection = mysqli_connect('localhost', 'root', '', '5ait_automobili') or die ("ERROR: Cannot connect");


	// crea ed esegue una query di SELECT
	$sql = "select * from log order by id desc limit 5";    
	$result = mysqli_query($connection, $sql) or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");

	if (mysqli_num_rows($result) > 0) {
		$numColumns = mysqli_num_fields($result);

		echo "<table border='1'>";
		echo "<tr><th>ID</th><th>Data</th><th>Nome Utente</th><th>Nome Pagina</th><th>Descrizione</th></tr>";

		while ($row = mysqli_fetch_row($result)) {
			if (count($row) == $numColumns) {
				echo "<tr>";
				foreach ($row as $cell) {
					echo "<td> $cell </td>";
				}
				echo "</tr>";
			} else {
				echo "Invalid number of columns in the table!";
			}
		}

		echo "</table>";
	} else {
		echo "No records found!";
	}

	mysqli_close($connection);
	?>
	<br>
	<?php
	include("../000/000_NavigationMenu.php");
	?>
</body>
</html>
