<?php
session_start();
session_destroy();
if(!isset($_POST['formInvioCredenziali'])){
?>
<!doctype HTML>
<html>
<head>
    <title>Esercizi 010 - Accesso pagina Bowling</title>
</head>
<body>
    <img src="download.jpg" alt="">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Utente: <br><input type="text" name = "utente" required><br>
        Password: <br><input type="password" name="password" required><br>
        <br><input type="submit" name="formInvioCredenziali" value ="Accedi">
    </form>
</body>
</html>
<?php
} else {
    $nomeUtente = trim($_POST['utente']);
    $pass = trim($_POST['password']);

    $pwd = MD5($pass);


    $connessione = mysqli_connect('localhost', 'root','','5ait_bowling')
        or die ("Errore di connessione al database");
    $comando = "select user from utenti where user = '$nomeUtente' and password = '$pwd'";

    $result = mysqli_query($connessione, $comando)
			or die ("ERROR: " . mysqli_error($connessione) . " (query was $sql)");
        
    if(mysqli_num_rows($result) > 0){
        session_start();
        $_SESSION['fase'] = 1;
        $_SESSION['utente'] = $nomeUtente;
        $_SESSION['pwd'] = $pwd;

        header("Location: consegnaAttrezzatura.php");
    } else {
        echo "utenza non valida";
    }

    mysqli_close($connessione);
}

include("../000/000_NavigationMenu.php");
?>