<?php
require_once "connection.php";
$ConnessioneAttiva = new DBAccess();
$var=$ConnessioneAttiva->openConnectionlocal();
session_start();
$_SESSION['first']=true;
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
	if (!preg_match('/^[a-z0-9]{3,12}$/i',$nome)){$errors.=", Nome non valido";}	else{};
	if (!preg_match('/^[a-z0-9]{3,12}$/i',$cognome)){$errors.=", Cognome non valido";}	else{};
	if (!($_POST['confirmpassword']==$_POST['password'])){$errors.= ", Password e confermaPassword sbagliate";}

}

if($var){
	if($tmp){
		//registrazione
		$controlquery="SELECT Username,Mail from utente WHERE Mail='$email' OR Username='$username';";
		if($ConnessioneAttiva->getQuery($controlquery)){
			//controllo per utenti gia' iscritti	
			header("refresh:0; url=../PHP/Registrazione.php");
			$_SESSION['fail']="Questo utente e' gia' registrato.";
			die();
		}
		if(!$errors) {	
			$img="immagine";
			$img.=explode(": ",$_POST['selectimg'])[1];
			if($img==="immagine")	$img="immagineA";
			$bio="Io sono ".$nome." ".$cognome." ( @".$username." ) ";
			$thumb=$username;
			$descr="Immagine profilo di ".$nome." ".$cognome;
			$query = "INSERT INTO utente (Nome,Cognome,Username,Mail,Password,Bio,Nome_Immagine,Nome_Thumbnail,Descrizione_Immagine) 
			VALUES('$nome','$cognome','$username','$email','$password','$bio','$img','$thumb','$descr');";
			$ConnessioneAttiva->exeQuery($query);
			if(isset($_SESSION['adminlogged'])){
				$_SESSION=array();
				session_destroy();
				session_start();
			}
			$_SESSION['id'] = $ConnessioneAttiva->getQuery("SELECT Id_Utente AS ID from utente WHERE Mail='$email'")[0]['ID'];
			$_SESSION['nome'] = $nome;
			$_SESSION['cognome'] = $cognome;
			$_SESSION['email'] = $email;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['login'] = true;
			$_SESSION['justlogged']=true;
			$_SESSION['fail']="";
			header( "refresh:0; url=../PHP/Registrazione.php" ); 	
		}else{
			
			header("refresh:0; url=../PHP/Registrazione.php");
			$_SESSION['fail']="Ci sono stati errori, che sono sfuggiti ai controlli client side.(qualche campo non e' valido): "."\n";
			$_SESSION['fail'].=$errors;
		}

	}else{
		//login
		$query = "SELECT* from utente WHERE Mail='$email' AND Password='$password';";
		$r=$ConnessioneAttiva->getQuery($query);
		if(!$errors ){
			if(!$r){
				header("refresh:0; url=./Registrazione.php");
				$_SESSION['fail']="Email o Password sbagliati.";
				$_SESSION['errors']=$errors;
			}else{
				if(isset($_SESSION['adminlogged'])){
					$_SESSION=array();
					session_destroy();
					session_start();
				}
				$_SESSION['id'] = $ConnessioneAttiva->getQuery("SELECT Id_Utente AS ID from utente WHERE Mail='$email'")[0]['ID'];
				$_SESSION['nome'] = $ConnessioneAttiva->getQuery("SELECT Nome from utente WHERE Mail='$email'");
				$_SESSION['cognome'] = $ConnessioneAttiva->getQuery("SELECT Cognome from utente WHERE Mail='$email'");
				$_SESSION['email'] = $email;
				$_SESSION['username'] = $ConnessioneAttiva->getQuery("SELECT Username from utente WHERE Mail='$email'");
				$_SESSION['password'] = $password;
				$_SESSION['login'] = true;
				$_SESSION['justlogged']=true;
				$_SESSION['fail']="";
				header("refresh:0; url=./Registrazione.php");
			}

		}else{
			header("refresh:0; url=../PHP/Registrazione.php");
			$_SESSION['fail']="Ci sono stati errori, che sono sfuggiti ai controlli client side.(qualche campo non e' valido): ";
			$_SESSION['fail'].=$errors;
		}
	}		
}else{
		$_SESSION['fail']="Problema di connessione";
		die();
}	
?>