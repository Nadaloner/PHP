<!doctype HTML>
<html>
	<head>
		<title>Esercizi 006 - Test</title>
	</head>
	<body>
		<p><H2 style="color:red;">
			Test
		</H2></p>
		
		<label for="utente"> Utente : </label>
		<select id="utente" name="utente" onchange="document.getElementById('selected_text').value=this.options[this.selectedIndex].text">
			 <option value="0">Selezione utente</option>
			 <?PHP 
				$connection = mysqli_connect('localhost', 'root', '', '5ait_vacanze')
					or die ("ERROR: Cannot connect");
				$sql = "SELECT ID, user FROM utenti";
		
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
		<input type="hidden" name="selected_text" id="selected_text" value="" />
		<input type="submit" name="InvioCredenziali" value="Elimina"/>
	</body>
</html>
<?PHP
	include("../000/000_NavigationMenu.php")
?>