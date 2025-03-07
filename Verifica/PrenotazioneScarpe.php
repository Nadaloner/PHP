<?php
session_start();
if (isset($_SESSION['fase']) && (int)$_SESSION['fase']>1){
    $_SESSION['fase'] = 3;
    $valoriCampo = explode('|',$_POST['campo']);
    $_SESSION['idCampo'] = $valoriCampo[0];
    $_SESSION['campo'] = $valoriCampo[1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Prenotazione Scarpe</title>
</head>
<body>
    <h2>PRENOTAZIONE MATERIALE</h2>
    <p>Benvenuto <?PHP echo $_SESSION['username']?></p>
        <form method="POST" action="FinePrenotazione.php">
        <select name="Scarpe" id="Scarpe" onchange="document.getElementById('scarpe').value = this.options[this.selectedIndex].value + '|' + this.options[this.selectedIndex].text">
            <option value="0">Seleziona paio scarpe adatto</option>
            <?php
                $connessione = mysqli_connect('localhost','root','','amazon')
                    or die("Errore: ".mysqli_connect_error());
                $query = "select idScarpa, Scarpa from scarpe";
                $risultato = mysqli_query($connessione,$query);
                if (mysqli_num_rows($risultato) > 0){
                    while ($riga = mysqli_fetch_row($risultato)){
                        echo "<option value='$riga[0]'>".$riga[1]."</option>";
                    }
                }
                mysqli_close($connessione);
            ?>
        </select>
        <input type="text" name="scarpe" id="scarpe" value="" />
        <input type="submit" name="Fase" value="SceltaScarpe"/>
    </form>
</body>
</html>
<?php
 } else {
    echo "Effettua il login per accedere a questa pagina";
 }
?>