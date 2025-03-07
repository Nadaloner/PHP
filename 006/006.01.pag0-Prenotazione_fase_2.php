<?PHP
	if (session_status() == PHP_SESSION_ACTIVE) {
		echo 'Session is not active';
	} else {
		session_start();
		if ($_SESSION['fase'] == '1') {
			if (isset($_SESSION['fase']) && $_SESSION['fase']=='1'){
		
	
?>
<!doctype HTML>
<html>
	<head>
		<title>Esercizi 006 - Prenotazione fase 1</title>
	</head>
	<body>
		<p><H2 style="color:blue;">
			Prenotazione
		</H2></p>
		<form method="POST" >
			<label for="Paesaggio"> Paesaggio : </label>
			<select id="Paesaggio" name="Paesaggio" onchange="document.getElementById('selected_bioma').value=this.options[this.selectedIndex].text">
				 <option value="0">Selezione paesaggio</option>
				 <?PHP
					$connection = mysqli_connect('localhost', 'root', '', 'vacanze')
						or die ("ERROR: Cannot connect");
					$sql = "SELECT idBioma, bioma FROM biomi WHERE bioma != 'undefined'";
					$result = mysqli_query($connection, $sql)
						or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");
					
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_row($result)) {
							echo "<option value="  . $row[0] . ">" . $row[1] . "</option>";
						}
					}
					mysqli_close($connection);
			?>		 
			</select><br> 
			<input type="hidden" name="selected_bioma" id="selected_bioma" value="" />
			<input type="submit" name="Fase2" value="Procedi"/>
		</form>
	</body>
</html>
<?PHP
	} 
}
	}
?>
<?PHP
	include("../000/000_NavigationMenu.php")
?>