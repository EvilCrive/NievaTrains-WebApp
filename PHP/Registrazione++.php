<?php
require_once "connection.php";
$ConnessioneAttiva = new DBAccess();

$username=$_POST['Username'];
$password=$_POST['Password'];
$nome=$_POST['Nome'];
$cognome=$_POST['Cognome'];
$email=$_POST['Mail'];
echo $username," ", $password, " ", $nome, " ", $cognome, " ", $email;
	//errori
	if(!empty($username) || !empty($password) || !empty($nome) || !empty($cognome) 
		|| !empty($email)){
		$var=$ConnessioneAttiva->openConnectionlocal();
		if($var)
		{
			
			$query = "INSERT INTO utente VALUES(NULL,'$nome','$cognome','$username','$email','$password');";
			echo $query;
			$ConnessioneAttiva->getQuery($query);
			echo "Fantastico!","La tua iscrizione è avvenuta con successo. Tra qualche secondo ti mando alla Home.";
			$_SESSION['id'] = $ConnessioneAttiva->getQuery("SELECT Id_Utente AS ID FROM Utente WHERE Mail='$email'")[0]['ID'];
			$_SESSION['nome'] = $nome;
			$_SESSION['cognome'] = $cognome;
			$_SESSION['email'] = $email;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['login'] = true;
			$ConnessioneAttiva->closeConnection();
  header( "refresh:4; url=../../index.php" ); 
		}
	}else{
		echo "Completa i campi.";
		die();
	}
	


?>