<?php
require_once "connection.php";
$connessione = new DBAccess();
session_start();
try{
	if(!$connessione->openConnectionLocal()) throw new Exception("No connection");
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

	//controllo errori server-side
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
	if($tmp){
		//registrazione
		$controlquery="SELECT Username,Mail from utente WHERE Mail='$email' OR Username='$username';";
		if($connessione->getQuery($controlquery)){
			//controllo per utenti gia' iscritti	
			header("refresh:0; url=../PHP/Registrazione.php#error");
			$_SESSION['fail']="Questo utente e' gia' registrato.";
		}else{
			if(!$errors) {	
				$img="immagine";
				$img.=explode(": ",$_POST['selectimg'])[1];
				if($img==="immagine")	$img="immagineA";
				$bio="Io sono ".$nome." ".$cognome." ( @".$username." ) ";
				$thumb=$username;
				$descr="Immagine profilo di ".$nome." ".$cognome;
				$query = "INSERT INTO utente (Nome,Cognome,Username,Mail,Password,Bio,Nome_Immagine,Nome_Thumbnail,Descrizione_Immagine) VALUES('$nome','$cognome','$username','$email','$password','$bio','$img','$thumb','$descr');";
				$connessione->exeQuery($query);
				if(isset($_SESSION['adminlogged'])){
					$_SESSION=array();
					session_destroy();
					session_start();
				}
				$_SESSION['id'] = $connessione->getQuery("SELECT Id_Utente AS ID from utente WHERE Mail='$email'")[0]['ID'];
				$_SESSION['nome'] = $nome;
				$_SESSION['cognome'] = $cognome;
				$_SESSION['email'] = $email;
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['login'] = true;
				$_SESSION['justlogged']=true;
				$_SESSION['fail']="";
				header( "refresh:0; url=../PHP/Registrazione.php#error" ); 	
			}else{
				header("refresh:0; url=../PHP/Registrazione.php#error");
				$_SESSION['fail']="Ci sono stati errori, che sono sfuggiti ai controlli client side.(qualche campo non e' valido): "."\n";
				$_SESSION['fail'].=$errors;
			}
		}
	}else{
		//login
		$query = "SELECT* from utente WHERE Mail='$email' AND Password='$password';";
		$r=$connessione->getQuery($query);
		if(!$r){
			header("refresh:0; url=./Registrazione.php#error");
			$_SESSION['fail']="Email o Password sbagliati.";
			$_SESSION['errors']=$errors;
		}else{
			if(isset($_SESSION['adminlogged'])){
				$_SESSION=array();
				session_destroy();
				session_start();
			}
			$_SESSION['id'] = $connessione->getQuery("SELECT Id_Utente AS ID from utente WHERE Mail='$email'")[0]['ID'];
			$_SESSION['nome'] = $connessione->getQuery("SELECT Nome from utente WHERE Mail='$email'");
			$_SESSION['cognome'] = $connessione->getQuery("SELECT Cognome from utente WHERE Mail='$email'");
			$_SESSION['email'] = $email;
			$_SESSION['username'] = $connessione->getQuery("SELECT Username from utente WHERE Mail='$email'");
			$_SESSION['password'] = $password;
			$_SESSION['login'] = true;
			$_SESSION['justlogged']=true;
			$_SESSION['fail']="";
			header("refresh:0; url=./Registrazione.php#error");
		}
	}		
	$connessione->closeConnection();
}catch(Exception $eccezione){
	echo $eccezione;
	$connessione->closeConnection();
}	
?>