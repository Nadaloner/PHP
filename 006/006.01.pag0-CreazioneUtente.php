<?PHP
	if (!isset($_POST["InvioCredenziali"])) {
?>
<!doctype HTML>
<html>
	<head>
		<title>Esercizi 006 - Creazione utente</title>
	</head>
	<body>
		<p>
			Registrazione utente
		</p>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
			Utente: <input type="text" name="utente"><br>
			Password: <input type="password" name="password"><br>
			<input type="submit" name ="InvioCredenziali" value="invia POST" />
		</form>
	</body>
</html>
<?PHP
	} else {
		if (!isset($_POST["utente"]) || trim($_POST["utente"]) == ""){
			die ("Devi inserire un nome utente!");
		} 
		if (!isset($_POST["password"]) || trim($_POST["password"]) == ""){
			die ("Devi inserire una password!");
		} 
		$inputUtente = ($_POST["utente"]);
		$inputPass = ($_POST["password"]);
		
		#$pwd = password_hash('$inputPass', PASSWORD_DEFAULT);
		$pwd = md5($inputPass);
		
		$connection = mysqli_connect('localhost', 'root', '', '5ait_vacanze')
			or die ("ERROR: Cannot connect");
		$sql = "SELECT ID FROM dati WHERE user = '$inputUtente'";
		
		$result = mysqli_query($connection, $sql)
		or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");
		//echo $result;
		if (mysqli_num_rows($result) == 0) {
			//header("Location: 006.01.pag0-CreazioneUtente.php");
			$sql= "INSERT INTO dati (user,password) VALUES ('$inputUtente','$pwd')";
			$result1 = mysqli_query($connection, $sql)
			or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");
			//echo $result;
			/*$sql= "SELECT ID FROM utenti WHERE user = '$inputUtente' AND password='$pwd'";
			$result1 = mysqli_query($connection, $sql)
			or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");
			if (mysqli_num_rows($result1) > 0){*/
			echo "Registrato correttamente";
			echo var_dump($result1);
			
			
			
			$myfile = fopen("password.txt", "a+") or die("Unable to open file!");
			$testo = "Nome = ". $inputUtente. " password  = ".$inputPass. " utente = ".$_SERVER['REMOTE_ADDRESS'];
			fwrite($myfile, $testo);
			fwrite($myfile, "\r\n");
			fclose($myfile);
			
			
			
			
			
			
			//}
			//else{
				//echo "Qualcosa è andato storto";
			//}
		}
		else{
			//echo var_dump($result1);
			echo "Nome utente esistente";
		}
		mysqli_close($connection);
	}
?>
<?PHP
	include("../000/000_NavigationMenu.php")
?>