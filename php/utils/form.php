<?php
require_once "connection.php";
require_once "sqlutils.php";
$connessione=new DBAccess();
session_start();

try{
    if(!$connessione->openConnection()) throw new Exception("No connection");
    $_SESSION['fail']="";
    $email=$_POST['email'];
    $password=$_POST['password'];
    $errors="";
        //errori login
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))     $errors.="<li>Email non valida</li>";
    if (!preg_match('/^[a-z0-9]{6,12}$/i',$password))   $errors.="<li>Password non valida</li>";
    
    if($_POST['button']=="Registrati"){
        //errori registrazione
        $nome=$_POST['nome'];
		$cognome=$_POST['cognome'];
		$username=$_POST['username'];
		if (!preg_match('/^[a-z0-9]{6,12}$/i',$username))       $errors.="<li>Username non valido</li>";
		if (!preg_match('/^[a-z0-9]{3,12}$/i',$nome))           $errors.="<li>Nome non valido</li>";
		if (!preg_match('/^[a-z0-9]{3,12}$/i',$cognome))        $errors.="<li>Cognome non valido</li>";
        if (($_POST['conferma_password']!=$_POST['password']))   $errors.="<li>Password e confermaPassword sbagliate</li>";
        
        //REGISTRAZIONE
        //controllo utenti gia' iscritti
        if(checkUtente($email,$username, $connessione)){
            $errors.="Questo utente e' gia' registrato.";
        }
        //controllo errori
        if($errors){
            header("refresh:0; url=../Registrazione.php#errori_registrazione");
            $_SESSION['fail']="<ul>Errori: ".$errors."</ul>";
        }else{
            //inserimento utente nel db/ vera registrazione
            //immagine
            $img="immagine";
            $bio="Io sono".$nome." ".$cognome." (@".$username.") ";
            insertUtente($nome,$cognome,$username,$email,$password,$bio,$img, $connessione);
            //admin part
            if(isset($_SESSION['adminlogged'])){
                $_SESSION=array();
                session_destroy();
            }
            $_SESSION['id'] = getUserID($email, $connessione);
            $_SESSION['nome'] = $nome;
            $_SESSION['cognome'] = $cognome;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['userType'] = 0;
            //ritorna a registrazione, da loggato
            header( "refresh:0; url=../Registrazione.php" ); 
        }	
    }
    if($_POST['button']=="Accedi"){
        //LOGIN
        if(!checkLoginUtente($email,$password, $connessione)){
            header("refresh:0; url=../LogIn.php#errori_login");
            $errors.="Email o Password sbagliati.";
        }
        //controllo errori
        if($errors){
            header("refresh:0; url=../LogIn.php#errori_login");
            $_SESSION['fail']="<ul>Errori: ".$errors."</ul>";
        }else{
        //admin part
            if(isset($_SESSION['adminlogged'])){
				$_SESSION=array();
				session_destroy();
			}
            $_SESSION['id'] = getUserID($email, $connessione);
			$_SESSION['nome'] =getUserNome($email, $connessione); 
			$_SESSION['cognome'] = getUserCognome($email, $connessione);
			$_SESSION['email'] = $email;
			$_SESSION['username'] = getUserUsername($email, $connessione);
			$_SESSION['password'] = $password;
            $_SESSION['userType'] = getUserUserType($email, $connessione);
            header("refresh:0; url=../LogIn.php");
        }
    }
}catch(Exception $eccezione){
    echo $eccezione;

}
$connessione->closeConnection();
?>