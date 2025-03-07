<?php
session_start();

// Controllo se l'utente è autenticato
if (!isset($_SESSION['username'])) {
    echo "Devi effettuare il login per accedere a questa pagina.";
    exit();
}

// Connessione al database
$connessione = new mysqli('localhost', 'root', '', 'amazon');

// Controllo errore di connessione
if ($connessione->connect_error) {
    die("Errore di connessione: " . $connessione->connect_error);
}

// Nome utente dalla sessione
$username = $_SESSION['username'];

// Se l'utente conferma l'eliminazione
if (isset($_POST['conferma_eliminazione'])) {
    $query = "DELETE FROM utenti WHERE username = '$username'";
    $risultato = mysqli_query($connessione, $query);

    if ($risultato) {
        // Distruggere la sessione
        session_destroy();
        echo "<p>Il tuo account è stato eliminato con successo.</p>";
        echo "<p>Verrai reindirizzato alla homepage...</p>";
        header("refresh:3; url=index.php"); // Reindirizza dopo 3 secondi
        exit();
    } else {
        echo "<p>Errore durante l'eliminazione dell'account: " . mysqli_error($connessione) . "</p>";
    }
}

mysqli_close($connessione);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminazione Account</title>
</head>
<body>
    <h2>Eliminazione Account</h2>
    <p>Sei sicuro di voler eliminare il tuo account, <strong><?php echo htmlspecialchars($username); ?></strong>? Questa operazione è irreversibile.</p>
    
    <form method="POST">
        <button type="submit" name="conferma_eliminazione">Conferma Eliminazione</button>
        <a href="profilo.php">Annulla</a>
    </form>
</body>
</html>
