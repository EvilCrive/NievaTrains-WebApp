<?php
require_once "connection.php";
$connessione = new DBAccess();
$var=$connessione->openConnectionlocal();
$password=$_POST['password'];
$email=$_POST['email'];
echo $password, " ", $email, " ";
	//errori
	if(!empty($password) || !empty($email)){
		
		if($var)
		{
			
			$query = "SELECT* from utente WHERE Mail='$email' AND Password='$password';";
			
			$r=$connessione->getQuery($query);
			session_start();
			$_SESSION['id'] = $connessione->getQuery("SELECT Id_Utente AS ID from utente WHERE Mail='$email'")[0]['ID'];
			$_SESSION['nome'] = $connessione->getQuery("SELECT Nome from utente WHERE Mail='$email'");
			$_SESSION['cognome'] = $connessione->getQuery("SELECT Cognome from utente WHERE Mail='$email'");
			$_SESSION['email'] = $email;
			$_SESSION['username'] = $connessione->getQuery("SELECT Username from utente WHERE Mail='$email'");
			$_SESSION['password'] = $password;
			$_SESSION['login'] = true;
			
			print_r($_SESSION['nome']);
			print_r($_SESSION['cognome']);
			
  header( "Location=../index.php" ); 
		}
	}else{
		echo "Completa i campi.";
		die();
	}
	


?>