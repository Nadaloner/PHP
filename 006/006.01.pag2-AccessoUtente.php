<?php
    if(!isset($_POST["ModuloAccesso"])) {
?>
<!doctype HTML>
<html>
    <head>
        <title>Login Utente</title>
    </head>
    <body>
        <p>
            Accesso Utente
        </p>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <br>
            Utente: <input type="text" name="utente" required ><br>
            <br>
            Password: <input type="password" name="password" required><br>
            <input type="submit" name ="ModuloAccesso" value="invia POST" />
        </form>
    </body>
</html>
<?php
    } else {
        $inputUtente = $_POST["utente"];
        $inputPassword = $_POST["password"];
        $pwd = sha1($inputPassword);
        $connessione = mysqli_connect('localhost', 'root', '','5ait_vacanze') or die (mysqli_connect_error());
        $check = "select id from dati where user='$inputUtente' AND password='$pwd'";
        $result = mysqli_query($connessione, $check);

        if(mysqli_num_rows($result) > 0) {
            echo "Login avvenuto con successo, benvenuto $inputUtente!";
        } else {
            echo "Login fallito, nome utente o password errati.";
        }

        mysqli_close($connessione);
    }
?>
<html>
    <br><a href="006.01.pag0-ControlloUtente.php">Vai alla Registrazione</a>
</html>
<?php
    include("../000/000_NavigationMenu.php");
?>

CREATE TABLE dati (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(50) NOT NULL,
    password VARCHAR(75) NOT NULL
);