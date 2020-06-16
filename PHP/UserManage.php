<?php

require_once "connection.php";
require_once "stampe.php";
session_start();
$login="";
if(isset($_SESSION['login'])){
    if(!$_SESSION['login']){
        $login="off";
    }
}else{
    $login="off";
}

if($login!=="off"){
    if(isset($_GET['request'])){
     if($_GET['request']==="1"){
         //profilo
         $id=$_SESSION['id'];
         header("refresh:0; url=../PHP/Utente.php?Id_Utente=$id");
         die();
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
        if(isset($_POST['bio'])){
            echo "1";
            $bio=$_POST['bio'];
            $iduser=$_SESSION['id'];
            $ConnessioneAttiva = new DBAccess();
            $var=$ConnessioneAttiva->openConnectionlocal();
            $query="UPDATE utente SET Bio='$bio' WHERE Id_Utente='$iduser'";
            $ConnessioneAttiva->exeQuery($query);
            header("refresh:0; url=../PHP/Utente.php?Id_Utente=$iduser");
            die();
        }
        //scritto male il parametro get
        header("refresh:0; url=../PHP/Index.php");    
        die();
     }
     header("refresh:0; url=../PHP/Registrazione.php?logged=false");


?>