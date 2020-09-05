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
    }else{
        if(isset($_POST['like'])){
            //voto
            $idtreno=$_POST['idtreno'];
            $iduser=$_SESSION['id'];
            if(boolLiked($iduser,$idtreno,$connessione)){
                //e' gia' preferito da te, quindi lo rimuovo
                removeLike($iduser,$idtreno,$connessione);
            }else{
                //ora si mette il like
                addLike($iduser,$idtreno,$connessione);
            }
            header("refresh:0 url=../Treno.php?Id_Treno=$idtreno");
        }
        if(isset($_POST['modificaTreno'])){
            //modifica treno 
        }
        if(isset($_POST['eliminaTreno'])){
            $idtreno=$_POST['idtreno'];
            $iduser=$_SESSION['id'];
            removeTreno($iduser,$idtreno,$connessione);
        }
        if(isset($_POST['eliminaCommento'])){
            $treno=$_POST['idtreno'];
            $data=$_POST['dataCommento'];
            removeCommento($_SESSION['id'],$treno,$data,$connessione);
            header("refresh:0 url=../Treno.php?Id_Treno=$treno#commentform"); 
        }
        if(isset($_POST['aggiungiCommento'])){
            $id=$_SESSION['id'];
            $treno=$_POST['idtreno'];
            $testoCommento=$_POST['testoCommento'];
            $testoCommento=strip_tags($testoCommento);
            $errors="";
            if (!preg_match('/^[a-z0-9]{3,500}$/i',$testoCommento))        $errors.="<li>Commento non valido</li>";
            else    addCommento($id,$treno,$testoCommento,$connessione);
            header("refresh:0 url=../Treno.php?Id_Treno=$treno#commentform"); 
        }
        if(isset($_POST['logout']) || isset($_GET['logout'])){
            $_SESSION['fail']="";
            $_SESSION['id'] = "";
            $_SESSION['nome'] = "";
            $_SESSION['cognome'] = "";
            $_SESSION['email'] = "";
            $_SESSION['username'] = "";
            $_SESSION['password'] = "";
            $_SESSION['userType'] = "";
            $_SESSION=array();
            session_destroy();
            header("refresh:0; url=../../PHP/Index.php");
        }
        //user page
        if(isset($_POST['modificaBio'])){
            $id=$_SESSION['id'];
            if(getUserBio($id,$connessione)!==$_POST['bioTesto']){
                $_POST['bioTesto']=strip_tags($_POST['bioTesto']);
                updateBio($id,$_POST['bioTesto'],$connessione);
            }
            header("refresh:0 url=../Utente.php?Id_Utente=$id");
        }
    }
}catch(Exception $exc){
    echo $exc;
}
$connessione->closeConnection();
?>