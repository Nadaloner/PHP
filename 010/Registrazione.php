<?php
session_start();
session_destroy();
if(!isset($_POST['formInvioCredenziali'])){
?>
<!doctype HTML>
<html>
<head>
    <title>Esercizi 010 - Registrazione pagina Bowling</title>
</head>
<body>
    <h1 style=color:red>REGISTRAZIONE</h1>
    <img src="download.jpg" alt="" style="display: block; margin-left: auto; margin-right: auto;">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Utente: <br><input type="text" name = "utente" required><br>
        Password: <br><input type="password" name="password" required><br>
        <br><input type="submit" name="formInvioCredenziali" value ="Registrati">
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
        echo "Il tuo account risulta già registrato: accedi da qui <a href='Accesso.php'>Accesso</a>";
    } else {
        $insert = "insert into utenti (user,password) values ('$nomeUtente','$pwd')";
        $result = mysqli_query($connessione, $insert)
			or die ("ERROR: " . mysqli_error($connessione) . " (query was $sql)");
            header("Location:Accesso.php");
    }

    mysqli_close($connessione);
}

include("../000/000_NavigationMenu.php");
?>