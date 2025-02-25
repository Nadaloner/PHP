<?php
session_start();
if (isset($_SESSION['fase']) && (int)$_SESSION['fase'] > 0) {
    unset($_SESSION['nPartecipanti']);
    unset($_SESSION['paiaScarpe']);
?>
<!doctype HTML>
<html>
<head>
    <title>Consegna Attrezzatura - Fase 2</title>
</head>
<body>
    <h2 style="color:green">Attrezzatura</h2>

    Bentornato <strong><?php echo $_SESSION['utente']; ?></strong>!<br>

    <form method="POST" action="processaDati.php">
        <label for="nPartecipanti">Numero partecipanti:</label>
        <input type="number" name="nPartecipanti" required><br>
        <label for="paiaScarpe">Numero paia scarpe:</label>
        <input type="number" name="paiaScarpe" required><br>
        <input type="submit" value="Conferma">
    </form>

</body>
</html>
<?php
} else {
    // Gestisci caso di sessione non valida
}
?>
