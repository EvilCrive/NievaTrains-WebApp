<?php

require_once "connection.php";
require_once "stampe.php";
session_start();
echo $_SESSION['login'];
$login="";
if(isset($_SESSION['login'])){
    if(!$_SESSION['login']){
        header("refresh:0; url=../PHP/Registrazione.php?logged=false");
        $login="off";
    }
}else{
    header("refresh:0; url=../PHP/Registrazione.php?logged=false");
    $login="off";
}

if($login!=="off"){
    if(isset($_GET['request'])){
     if($_GET['request']==="1"){
         //profilo
         $id=$_SESSION['id'];
         header("refresh:0; url=../PHP/Utente.php?Id_Utente=$id");
     }else{
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
        }else{
            //parametro get diverso da 1 o 2
        }
    }

    }else{
    
        //scritto male il parametro get
    }
}


?>