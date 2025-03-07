<?PHP
	$inputUtente = "Paolo";
	$inputPass = "Abc1234!";
	
	session_start();
	$_SESSION['fase'] = '1';
	$_SESSION['Utente'] = $inputUtente;
	$_SESSION['Password'] = $inputPass;

	header("Location: 008.02.Sessioni_Pag2.php");
?>