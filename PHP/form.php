<?php
require_once "connection.php";
$ConnessioneAttiva = new DBAccess();
$var=$ConnessioneAttiva->openConnectionlocal();
$password=$_POST['password'];
$email=$_POST['email'];
$tmp=0;
if($_POST['button']=="Accedi") $tmp=0;
if($_POST['button']=="Registrati") $tmp=1;
	//errori
if($var){
	if($tmp){
		//registrazione
		$nome=$_POST['Nome'];
		$cognome=$_POST['Cognome'];
		$username=$_POST['Username'];
		if(!empty($username) && !empty($password) && !empty($nome) && !empty($cognome) && !empty($email)) {	
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
			header( "refresh:10; url=../../Index.php" ); 	
		}else{
			echo "Completa i campi.";
			
			header("refresh:1; url=../PHP/Registrazione.php");
			session_start();
			$_SESSION['Fail']="Errore registrazione";
			$_SESSION['fail']="";
		}
	}else{
		//login
		$query = "SELECT* FROM utente WHERE Mail='$email' AND Password='$password';";
		$r=$ConnessioneAttiva->getQuery($query);
		if($r){
			//echo "nice";
			session_start();
			$_SESSION['id'] = $ConnessioneAttiva->getQuery("SELECT Id_Utente AS ID FROM Utente WHERE Mail='$email'")[0]['ID'];
			$_SESSION['nome'] = $ConnessioneAttiva->getQuery("SELECT Nome FROM Utente WHERE Mail='$email'");
			$_SESSION['cognome'] = $ConnessioneAttiva->getQuery("SELECT Cognome FROM Utente WHERE Mail='$email'");
			$_SESSION['email'] = $email;
			$_SESSION['username'] = $ConnessioneAttiva->getQuery("SELECT Username FROM Utente WHERE Mail='$email'");
			$_SESSION['password'] = $password;
			$_SESSION['login'] = true;
			header( "refresh:10 url=./Index.php" );
		}else{
			//echo "rip";
			header("refresh:1; url=./Registrazione.php");
			session_start();
			$_SESSION['fail']="Errore login";
			$_SESSION['Fail']="";
			
		}
	}		
}else{
		echo "Completa i campi.";
		die();
}	
?>