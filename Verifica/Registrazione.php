<?php
    if (!isset($_POST["FormRegistrazione"])){  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrazione Utente</title>
</head>
<body>
    <h2>REGISTRAZIONE</h2>
    <form method="POST" >
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="FormRegistrazione" value="Invia">
    </form>
</body>
</html>

<?php
    }else{
        $username = $_POST["username"];
        $password = $_POST["password"];

        $pwd = md5($password);
        $connessione=mysqli_connect('localhost','root','','amazon')
            or die("Errore: ".mysqli_connect_error());

        $query = "select idUtente from utenti where username = '$username' and password = '$pwd'";
        $risultato = mysqli_query($connessione,$query);
        if (mysqli_num_rows($risultato) > 0){
            echo "Problema nella creazione dell'utente riprovare con altre credenziali, prova ad accedere da qua -> <a href='Accesso.php'>Accedi</a>";
        } else {
            $insert = "insert into utenti (username,password) values ('$username','$pwd')";
            $inserimento = mysqli_query($connessione,$insert);
            echo "OK, Utente registrato correttamente, prova ad accedere da qua -> <a href='Accesso.php'>Accedi</a>";
        }

        mysqli_close($connessione);
    }
    
?>  