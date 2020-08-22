<?php
require_once "connection.php";
require_once "sqlutils.php";
$connessione=new DBAccess();
session_start();
try{
    if(!$connessione->openConnection()) throw new Exception("No connection");
    if(!(isset($_SESSION['userType']))){
        //non sei loggato
        header("refresh:0; url=../LogIn.php");
        die();
    }else{
        if(isset($_POST['like'])){
            //voto
            $idtreno=$_POST['idtreno'];
            $iduser=$_SESSION['id'];
            if(boolLiked($iduser,$idtreno,$connessione)){
                //already liked
                removeLike($iduser,$idtreno,$connessione);
            }else{
                //ora si mette il like
                addLike($iduser,$idtreno,$connessione);
            }
            header("refresh:0 url=../Treno.php?Id_Treno=$idtreno");
        }

        //da fare
        if(isset($_POST['modificaTreno'])){
            //modifica treno 
        }
        if(isset($_POST['eliminaTreno'])){
            $idtreno=$_POST['idtreno'];
            $iduser=$_SESSION['id'];
            removeTreno($iduser,$idtreno,$connessione);
        }
        if(isset($_POST['eliminaCommento'])){

        }
    }
}catch(Exception $exc){
    echo $exc;
}
$connessione->closeConnection();
?>