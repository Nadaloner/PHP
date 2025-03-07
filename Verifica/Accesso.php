<?php
    if (!isset($_POST["FormLogin"])){  
        session_start();
        session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.5">
    <title>Form LOGIN Utente</title>
</head>
<body>
    <h2>LOGIN</h2>

        <img src="amazon.png" alt="" display="block" margin-left="auto" margin-right="auto" width="50%">

    <form method="POST" >
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="FormLogin" value="Invia">
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
            session_start();
            $_SESSION['fase'] = 1;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            header("Location: PrenotazioneProdotti.php");
        } else {
            echo "Nome utente o password inseriti sono incorretti, riprovare!";
        }

        mysqli_close($connessione);
    }
    
?>  