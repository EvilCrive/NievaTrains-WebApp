<?php
require_once "connection.php";
$ConnessioneAttiva = new DBAccess();
$var=$ConnessioneAttiva->openConnectionlocal();
$username=$_POST['Username'];
$password=$_POST['password'];
$nome=$_POST['Nome'];
$cognome=$_POST['Cognome'];
$email=$_POST['email'];
if(!$password)	$password=$_POST['Password'];
if(!$email)		$email=$_POST['Mail'];
	//errori
if($var){
	if(!empty($password) || !empty($email)){
		if(!empty($username) || !empty($password) || !empty($nome) || !empty($cognome) || !empty($email)) {	
			$query = "INSERT INTO utente (Nome,Cognome,Username,Mail,Password) VALUES('$nome','$cognome','$username','$email','$password');";
			$ConnessioneAttiva->exeQuery($query);
			echo "Fantastico!","La tua iscrizione è avvenuta con successo. Tra qualche secondo ti mando alla Home.";
			session_start();
			$_SESSION['id'] = $ConnessioneAttiva->getQuery("SELECT Id_Utente AS ID FROM Utente WHERE Mail='$email'")[0]['ID'];
			$_SESSION['nome'] = $nome;
			$_SESSION['cognome'] = $cognome;
			$_SESSION['email'] = $email;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['login'] = true;
			header( "refresh:4; url=../../index.php" ); 	
		}else{
			echo "Completa i campi.";
			die();
		}
	
			$query = "SELECT* FROM utente WHERE Mail='$email' AND Password='$password';";
			$r=$ConnessioneAttiva->getQuery($query);
			session_start();
			$_SESSION['id'] = $ConnessioneAttiva->getQuery("SELECT Id_Utente AS ID FROM Utente WHERE Mail='$email'")[0]['ID'];
			$_SESSION['nome'] = $ConnessioneAttiva->getQuery("SELECT Nome FROM Utente WHERE Mail='$email'");
			$_SESSION['cognome'] = $ConnessioneAttiva->getQuery("SELECT Cognome FROM Utente WHERE Mail='$email'");
			$_SESSION['email'] = $email;
			$_SESSION['username'] = $ConnessioneAttiva->getQuery("SELECT Username FROM Utente WHERE Mail='$email'");
			$_SESSION['password'] = $password;
			$_SESSION['login'] = true;
			
			print_r($_SESSION['nome']);
			print_r($_SESSION['cognome']);
			
			header( "Location=../index.php" ); 
		
	}else{
		echo "Completa i campi.";
		die();
	}
}	


?>