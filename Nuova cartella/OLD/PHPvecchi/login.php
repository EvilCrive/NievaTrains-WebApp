<?php
require_once "connection.php";
$ConnessioneAttiva = new DBAccess();
$var=$ConnessioneAttiva->openConnectionlocal();
$password=$_POST['password'];
$email=$_POST['email'];
echo $password, " ", $email, " ";
	//errori
	if(!empty($password) || !empty($email)){
		
		if($var)
		{
			
			$query = "SELECT* from utente WHERE Mail='$email' AND Password='$password';";
			
			$r=$ConnessioneAttiva->getQuery($query);
			session_start();
			$_SESSION['id'] = $ConnessioneAttiva->getQuery("SELECT Id_Utente AS ID from utente WHERE Mail='$email'")[0]['ID'];
			$_SESSION['nome'] = $ConnessioneAttiva->getQuery("SELECT Nome from utente WHERE Mail='$email'");
			$_SESSION['cognome'] = $ConnessioneAttiva->getQuery("SELECT Cognome from utente WHERE Mail='$email'");
			$_SESSION['email'] = $email;
			$_SESSION['username'] = $ConnessioneAttiva->getQuery("SELECT Username from utente WHERE Mail='$email'");
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