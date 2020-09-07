<?php
require_once "connection.php";
require_once "sqlutils.php";
require_once "funzioni.php";
$connessione=new DBAccess();
session_start();

try{
    if(!$connessione->openConnection()) throw new Exception("No connection");
    $_SESSION['fail']="";
    $errors="";
    $email=$_POST['email'];
    if($_POST['button']=="Registrati"){
        //REGISTRAZIONE
        //controllo errori
        $errors=controlliSignup($errors,$connessione);
        //controllo errori immagine
        $_FILES['user']=$_POST['username'];
        $target_file=controlloUploadImmagineUtenti($errors);
        if($errors){
            header("refresh:0; url=../Registrazione.php#errori_registrazione");
            $_SESSION['fail']="<ul>Errori&colon; ".$errors."</ul>";
        }else{
            //tutto ok; procediamo alla creazione account
            $_POST['bio']="Io sono ".$_POST['nome']." ".$_POST['cognome']." (@".$_POST['username'].") ";
            insertUtente($_POST['nome'],$_POST['cognome'],$_POST['username'],$email,$_POST['password'],$_POST['bio'],"Utenti/".$target_file, $connessione);
            //admin part
            if(isset($_SESSION['admin'])){
                $_SESSION=array();
                session_destroy();
                session_start();
            }
            $_SESSION['id'] = getUserID($email, $connessione);
            $_SESSION['nome'] = $_POST['nome'];
            $_SESSION['cognome'] = $_POST['cognome'];
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['userType'] = 0;
            header( "refresh:0; url=../Registrazione.php" );
        }
    }
    if($_POST['button']=="Accedi"){
        //LOGIN
        //controllo errori
        $errors=controlliLogin($errors,$connessione);
        if($errors){
            header("refresh:0; url=../LogIn.php#errori_login");
            $_SESSION['fail']="<ul>Errori&colon; ".$errors."</ul>";
        }else{
            //admin part
            if(isset($_SESSION['admin'])){
				$_SESSION=array();
                session_destroy();
                session_start();
            }
            //tutto ok; procediamo ad accedere nell'account NievaTrains corretto
            $_SESSION['id'] = getUserID($email, $connessione);
			$_SESSION['nome'] =getUserNome($email, $connessione);
			$_SESSION['cognome'] = getUserCognome($email, $connessione);
			$_SESSION['email'] = $email;
			$_SESSION['username'] = getUserUsername($email, $connessione);
			$_SESSION['password'] = $_POST['password'];
            $_SESSION['userType'] = getUserUserType($email, $connessione);
            header("refresh:0; url=../LogIn.php");
        }
    }
}catch(Exception $eccezione){
    echo $eccezione;

}
$connessione->closeConnection();
?>
