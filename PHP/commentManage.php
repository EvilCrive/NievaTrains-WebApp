<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
$ConnessioneAttiva = new DBAccess();
$var=$ConnessioneAttiva->openConnectionlocal();

if(isset($_POST['button'])){
  if($_POST['button']=="Elimina"){
    $comm=$_POST['idcommento'];
    $query = "DELETE FROM commento WHERE Id_Commento='$comm';";
    $ConnessioneAttiva->exeQuery($query);
    $idricetta=$_POST['idricetta'];
    header("refresh:0; url=../PHP/Ricetta.php?Id_Ricetta=$idricetta");
  }
}
else{
  if(!isset($_SESSION['login'])){
    echo "non sei loggato";
  }else{
    $commento=$_POST['comment'];
    $idutente=$_SESSION['id'];
    $idricetta=$_POST['idricetta'];
    $date=date("Y-m-d H:i:s");
    
    $query = "INSERT INTO commento (Testo,Data,Numero_Like,Id_Utente,Id_Ricetta) VALUES('$commento','$date','0','$idutente','$idricetta');";
    $ConnessioneAttiva->exeQuery($query);
    header("refresh:0; url=../PHP/Ricetta.php?Id_Ricetta=$idricetta");
  }
  
}



?>

