<?php
require_once "utils/connection.php";
require_once "utils/sqlutils.php";
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
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))     $errors.="Email non valida";
    if (!preg_match('/^[a-z0-9]{6,12}$/i',$password))   $errors.=", Password non valida";
    
    if($_POST['button']=="Registrati"){
        //errori registrazione
        $nome=$_POST['nome'];
		$cognome=$_POST['cognome'];
		$username=$_POST['username'];
		if (!preg_match('/^[a-z0-9]{6,12}$/i',$username))       $errors.="- Username non valido";
		if (!preg_match('/^[a-z0-9]{3,12}$/i',$nome))           $errors.="- Nome non valido";
		if (!preg_match('/^[a-z0-9]{3,12}$/i',$cognome))        $errors.="- Cognome non valido";
        if (!($_POST['confirmpassword']==$_POST['password']))   $errors.="- Password e confermaPassword sbagliate";
        
        //REGISTRAZIONE
        //controllo utenti gia' iscritti
        if(checkUtente($email,$username, $connessione)){
            $_SESSION['fail']="Questo utente e' gia' registrato.";
            header("refresh:0; url=../PHP/Registrazione.php");
            die();
        }
        //controllo errori
        if($errors){
            header("refresh:0; url=../PHP/Registrazione.php");
            $_SESSION['fail']="Ci sono stati errori, che sono sfuggiti ai controlli client side.(qualche campo non e' valido): "."\n".$errors;
            die();
        }
        //inserimento utente nel db/ vera registrazione
            //immagine
            $img="immagine";
        $bio="Io sono".$nome." ".$cognome." (@".$username.") ";
        insertUtente($nome,$cognome,$username,$email,$password,$bio,$img, $connessione);
        //admin part
        if(isset($_SESSION['adminlogged'])){
            $_SESSION=array();
            session_destroy();
            session_start();
        }
        $_SESSION['id'] = getUserID($email, $connessione);
        $_SESSION['nome'] = $nome;
        $_SESSION['cognome'] = $cognome;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['userType'] = 0;
        //ritorna a registrazione, da loggato
        header( "refresh:0; url=../PHP/Registrazione.php" ); 	
    }
    if($_POST['button']=="Accedi"){
        //LOGIN
        if(!checkLoginUtente($email,$password, $connessione)){
            header("refresh:0; url=../PHP/LogIn.php");
            $_SESSION['fail']="Email o Password sbagliati.";
        }else{
            //admin part
            if(isset($_SESSION['adminlogged'])){
				$_SESSION=array();
				session_destroy();
				session_start();
			}
            $_SESSION['id'] = getUserID($email, $connessione);
			$_SESSION['nome'] =getUserNome($email, $connessione); 
			$_SESSION['cognome'] = getUserCognome($email, $connessione);
			$_SESSION['email'] = $email;
			$_SESSION['username'] = getUserUsername($email, $connessione);
			$_SESSION['password'] = $password;
            $_SESSION['userType'] = getUserUserType($email, $connessione);
            header("refresh:0; url=../PHP/LogIn.php");
        }
    }
}catch(Exception $eccezione){
    echo $eccezione;

}
$connessione->closeConnection();
?>