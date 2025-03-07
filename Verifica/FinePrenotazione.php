<?php
    session_start();
    if (isset($_SESSION['fase']) && (int)$_SESSION['fase'] > 2){
        $valoriScarpe = explode('|',$_POST['scarpe']);
        $_SESSION['idScarpa'] = $valoriScarpe[0];
        $_SESSION['Scarpa'] = $valoriScarpe[1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fine Prenotazione</title>
</head>
<body>
    <p>Siamo arrivati alla fine <?php echo $_SESSION['username'] ?></p>
    <p>Conferma le tue scielte</p>
    <p>Hai prenotato un campo con cratteristiche : <?php echo $_SESSION['campo'] ?> e il suo id è <?php echo $_SESSION['idCampo'] ?></p>
    <p>e il paio di scarpe che hai prenotato è un tipo :  <?php echo $_SESSION['Scarpa'] ?> con id <?php echo $_SESSION['idScarpa']?></p>
    <p>Procedo alla prenotazione ....</p>
    <?php
            $connessione = mysqli_connect('localhost','root','','amazon') or die ("Error:".mysqli_connect_error());
            $prenotazione = "insert into prenotazioni (username,idCampo,idScarpa) values ('".$_SESSION['username']."', ".$_SESSION['idCampo'].", ".$_SESSION['idScarpa'].")";
            $vai=mysqli_query($connessione,$prenotazione);
            echo "<p>Prenotazione confermata! Grazie per aver prenotato con noi.</p>";
            mysqli_close($connessione);
            session_destroy();
    ?>




</body>
</html>

<?php
    } else {
        echo "Effettua il login per accedere a questa pagina";
    }