<?php
session_start();
if (isset($_SESSION['fase']) && (int)$_SESSION['fase']>0){
    $_SESSION['fase'] = 2;
    unset($_SESSION['idScarpa']);
    unset($_SESSION['Scarpa']);
    unset($_SESSION['idCampo']);
    unset($_SESSION['Campo']);
?>
<!doctype HTML>
<html>
    <head>
        <title>Prenotazione Campo e Scarpe</title>
    </head>
    <body>
        <h2>PRENOTAZIONE MATERIALE</h2>
        <p>Benvenuto <?PHP echo $_SESSION['username'];?></p>

        <form method="POST" action="PrenotazioneScarpe.php">
        <select id="Campo" name="Campo" onchange="document.getElementById('campo').value = this.options[this.selectedIndex].value + '|' + this.options[this.selectedIndex].text">
				 <option value="0">Selezione campo di gioco</option>
				 <?PHP
					$connection = mysqli_connect('localhost', 'root', '', 'amazon')
						or die ("ERROR: Cannot connect");
					$sql = "SELECT idCampo, campo FROM campi WHERE campo != 'undefined'";
					$result = mysqli_query($connection, $sql)
						or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");
					
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_row($result)) {
							echo "<option value="  . $row[0] . ">" . $row[1] . "</option>";
						}
					}
					mysqli_close($connection);
			?>		 
			</select>
			<input type="text" name="campo" id="campo" value="" />
			<input type="submit" name="Fase" value="SceltaCampo"/>
        </form>
    </body>
</html>
<?php
 } else {
    echo "Effettua il login per accedere a questa pagina";
 }
?>