<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
$connessione=new DBAccess();
try{
    if(!$connessione->openConnectionLocal()) throw new Exception("No connection");
    
    if(isset($_SESSION['login'])){

        //sidebar user (profilo+logout)
        if(isset($_GET['request'])){
            if($_GET['request']==="1"){
                //profilo
                $id=$_SESSION['id'];
                header("refresh:0; url=../PHP/Utente.php?Id_Utente=$id");
            }
            if($_GET['request']==="2"){
                //logout
                $_SESSION['login']="0";
                $_SESSION['id'] = "";
                $_SESSION['nome'] = "";
                $_SESSION['cognome'] = "";
                $_SESSION['email'] = "";
                $_SESSION['username'] = "";
                $_SESSION['password'] = "";
                $_SESSION=array();
                session_destroy();
                header("refresh:0; url=../PHP/Index.php");
            }
        }

        //modifica bio + follow/unfollow
        if(isset($_POST['bio'])){
            //modifica bio
            $bio=$_POST['bio'];
            $iduser=$_SESSION['id'];
            $query="UPDATE utente SET Bio='$bio' WHERE Id_Utente='$iduser'";
            $connessione->exeQuery($query);
            header("refresh:0; url=../PHP/Utente.php?Id_Utente=$iduser");
        }
        if(isset($_POST['follow'])){
            //follow
            $id2=$_POST['follow'];
            $iduser=$_SESSION['id'];
            $query="INSERT INTO follow (Id_Utente1, Id_Utente2) VALUES ('$iduser','$id2')";
            $connessione->exeQuery($query);
            header("refresh:0; url=../PHP/Utente.php?Id_Utente=$id2");    
        }
        if(isset($_POST['unfollow'])){
            //unfollow
            $id2=$_POST['unfollow'];
            $iduser=$_SESSION['id'];
            $query="DELETE FROM follow WHERE Id_Utente1='$iduser' AND Id_Utente2='$id2'";
            $connessione->exeQuery($query);
            header("refresh:0; url=../PHP/Utente.php?Id_Utente=$id2");
        }


    }else{
        //se non sei loggato di reindirizza alla pagina di registrazione
        header("refresh:0; url=../PHP/Registrazione.php?notlogged");
    }
}catch(Exception $eccezione){
	echo $eccezione;
}	
$connessione->closeConnection();
?>
