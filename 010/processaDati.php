<?php
session_start();
if (isset($_POST['nPartecipanti']) && isset($_POST['paiaScarpe'])) {
    $nPartecipanti = $_POST['nPartecipanti']; 
    $nScarpe = $_POST['paiaScarpe'];
    $_SESSION['nPartecipanti'] = $nPartecipanti;
    $_SESSION['paiaScarpe'] = $paiaScarpe;

} else {
    echo "Dati non validi o mancanti!";
}
?>
