<?php
require_once "connection.php";
$ConnessioneAttiva = new DBAccess();
$var=$ConnessioneAttiva->openConnectionlocal();
session_start();
$_SESSION['errors']="";
$password=$_POST['password'];
$email=$_POST['email'];
$tmp=0;
if($_POST['button']=="Accedi") $tmp=0;
if($_POST['button']=="Registrati") $tmp=1;
if($tmp){
	$nome=$_POST['Nome'];
	$cognome=$_POST['Cognome'];
	$username=$_POST['Username'];
}
	//errori
$errors="";
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){$errors.="Email non valida";}	else{};
if (!preg_match('/^[a-z0-9]{6,12}$/i',$password)){$errors.=", Password non valida";}	else{};
if($tmp){
	if (!preg_match('/^[a-z0-9]{6,12}$/i',$username)){$errors.=", Username non valido";}	else{};
	if (!preg_match('/^[a-z0-9]{6,12}$/i',$nome)){$errors.=", Nome non valido";}	else{};
	if (!preg_match('/^[a-z0-9]{6,12}$/i',$cognome)){$errors.=", Cognome non valido";}	else{};
	if (!($_POST['confirmpassword']==$_POST['password'])){$errors.= ", Password e confermaPassword sbagliate";}

}
//$errors.=".";
if($var){
	if($tmp){
		//registrazione
		$controlquery="SELECT Username,Mail FROM utente WHERE Mail='$email' OR Username='$username';";
		

		echo $email;
		echo " ";
		echo $username;
		if($ConnessioneAttiva->getQuery($controlquery)){
			echo "esiste gia";
			header("refresh:1; url=../PHP/Registrazione.php");
			$_SESSION['Fail']="Questo utente e' gia' registrato.";
			$_SESSION['fail']="";
			$_SESSION['errors']=$errors;
			die();
		}
		if(!$errors) {	
			$query = "INSERT INTO utente (Nome,Cognome,Username,Mail,Password) VALUES('$nome','$cognome','$username','$email','$password');";
			$ConnessioneAttiva->exeQuery($query);
			echo "Fantastico!","La tua iscrizione è avvenuta con successo. Tra qualche secondo ti mando alla Home.";
			$_SESSION['id'] = $ConnessioneAttiva->getQuery("SELECT Id_Utente AS ID FROM Utente WHERE Mail='$email'")[0]['ID'];
			$_SESSION['nome'] = $nome;
			$_SESSION['cognome'] = $cognome;
			$_SESSION['email'] = $email;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['login'] = true;
			header( "refresh:2; url=../../Index.php" ); 	
		}else{
			header("refresh:1; url=../PHP/Registrazione.php");
			$_SESSION['Fail']="Completa tutti i campi.";
			$_SESSION['fail']="";
			$_SESSION['errors']=$errors;
		}
	}else{
		//login
		$query = "SELECT* FROM utente WHERE Mail='$email' AND Password='$password';";
		$r=$ConnessioneAttiva->getQuery($query);
		if(!$errors && $r){
			//echo "nice";
			$_SESSION['id'] = $ConnessioneAttiva->getQuery("SELECT Id_Utente AS ID FROM Utente WHERE Mail='$email'")[0]['ID'];
			$_SESSION['nome'] = $ConnessioneAttiva->getQuery("SELECT Nome FROM Utente WHERE Mail='$email'");
			$_SESSION['cognome'] = $ConnessioneAttiva->getQuery("SELECT Cognome FROM Utente WHERE Mail='$email'");
			$_SESSION['email'] = $email;
			$_SESSION['username'] = $ConnessioneAttiva->getQuery("SELECT Username FROM Utente WHERE Mail='$email'");
			$_SESSION['password'] = $password;
			$_SESSION['login'] = true;
			echo "Benissimo! Hai fatto l'accesso."
			header( "refresh:1 url=./Index.php" );
		}else{
			//echo "rip";
			header("refresh:1; url=./Registrazione.php");
			$_SESSION['fail']="Email o Password sbagliati.";
			$_SESSION['Fail']="";
			$_SESSION['errors']=$errors;
			
		}
	}		
}else{
		echo "Completa i campi.";
		die();
}	
?>