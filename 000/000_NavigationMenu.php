<br><br><br><br>
<hr>
<a href="../" >Clicca qui per tornare alla HOME.</a><br>
<ul>
		<?php
		if (is_dir("../000/"))
		{
			echo "<li><a href=\"../000/\" target=\"\">Esercizi 000 Esercizi 000 [Help HTML]</a></li>";
		}
		if (is_dir("../001/"))
		{
			echo "<li><a href=\"../001/\" target=\"\">Esercizi 001 [Passaggio varibili da pag_1 a pag_2]</a></li>";
		}
		if (is_dir("../002/"))
		{
			echo "<li><a href=\"../002/\" target=\"\">Esercizi 002 [Numeri e stringhe]</a></li>";
		}
		if (is_dir("../003/"))
		{
			echo "<li><a href=\"../003/\" target=\"\">Esercizi 003 [File e Directory]</a></li>";
		}
		if (is_dir("../004/"))
		{
			echo "<li><a href=\"../004/\" target=\"\">Esercizi 004 [...]</a></li>";
		}
		if (is_dir("../005/"))
		{
			echo "<li><a href=\"../005/\" target=\"\">Esercizi 005 [Connesione DB]</a></li>";
		}
		if (is_dir("../006/"))
		{
			echo "<li><a href=\"../006/\" target=\"\">Esercizi 006 [Manager utenti]</a></li>";
		}
		if (is_dir("../007/"))
		{
			echo "<li><a href=\"../007/\" target=\"\">Esercizi 007 [...]</a></li>";
		}
		if (is_dir("../008/"))
		{
			echo "<li><a href=\"../008/\" target=\"\">Esercizi 008 [Sessioni]</a></li>";
		}
		if (is_dir("../009/"))
		{
			echo "<li><a href=\"../009/\" target=\"\">Esercizi 009 [...]</a></li>";
		}
	?>
</ul>
<br>
<?php
	//005.01.pag0-LetturaDB.php
	
	$currentFileFolder = dirname($_SERVER['PHP_SELF']); 	// Percorso della cartella
	$currentFileName = basename($_SERVER['PHP_SELF']);	// Nome del file
	$currentFilePath = $_SERVER['SCRIPT_FILENAME']; 					// Percorso completo del file
	
	if($currentFileName != "005.01.pag0-LetturaDB.php") {
		include("../000/000_Log.php");
	}

	/*
		1. Creare connessione
		2. scrivere sql
		3. eseguire la SQL
		4. otterere i risultati
		5. se risultato > 0 (esiste) scrivilo con un echo.
		6. chiudere connessione
	*/
	
	
	$connection = mysqli_connect('localhost', 'root', '', '5ait_automobili')
		or die ("ERROR: Cannot connect");
	
	$sql = "SELECT COUNT(*), MIN(ID), MAX(ID) FROM log";
	
	$result = mysqli_query($connection, $sql)
		or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");			

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_row($result)) {
			echo "Numero di righe in tabella LOG: ". $row[0];
			echo " ";
			echo "ID min: " . $row[1] . " max: ". $row[2];
		}
	} else {
		echo "Non ci sono righe nella tabella LOG.";	
	}
					
	mysqli_close($connection);

	echo "<BR>" . date('Y-m-d\TH:i:sP') . "<BR>";

	setlocale(LC_TIME, 'ita');
	$mia_data = strftime("%A, %d %B %Y");
	echo utf8_encode($mia_data) . "<br>";
	
	// echo "Oggi e' il " . date("d-m-Y") . "<br>";
	// echo "Oggi e' " . htmlspecialchars(date("l")) . "<br>";
	
	// date_default_timezone_set("America/New_York");
	// echo "A New York sono le " . date("h:i:sa") . "<br>";
	// date_default_timezone_set("Europe/Rome");
	// echo "Da noi sono le " . date("h:i:sa") . "<br>" . "<br>";
	
	
	echo "💤 Cartella file: $currentFileFolder <br>";
	echo "💕 Nome file: $currentFileName <br>";
	echo "👍 Percorso: $currentFilePath <br>";
	
	/*
	echo "Indirizzo Server: " . basename($_SERVER['SERVER_ADDR']) . "<br>";
	echo "Nome Server: " . basename($_SERVER['SERVER_NAME']) . "<br>";
	echo "Versione Server: " . basename($_SERVER['SERVER_SOFTWARE']) . "<br>";
	echo "Protocollo: " . basename($_SERVER['SERVER_PROTOCOL']) . "<br>";
	echo "Request method: " . basename($_SERVER['REQUEST_METHOD']) . "<br>";
	echo "Request Time: " . basename($_SERVER['REQUEST_TIME']) . "<br>";
	echo "Remote Port: " . basename($_SERVER['REMOTE_PORT']) . "<br>";
	echo "Script URI: " . basename($_SERVER['REQUEST_URI']) . "<br>";
	echo "HTTP_HOST: " . basename($_SERVER['HTTP_HOST']) . "<br>";
	*/
	echo "<br><br>";
	echo "<font color=\"gray\">© Ricky.Reds 2023-" . date("Y") . "</font>";
?>