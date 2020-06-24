
<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
$connessione = new DBAccess();
try{
  if(!$connessione->openConnectionLocal()) throw new Exception("No connection");
  if(isset($_SESSION['login'])){
    //voto
    if((isset($_POST['ricetta'])) && (isset($_POST['voto']))){ 
      $idricetta=$_POST['ricetta'];
      $idutente=$_SESSION['id'];
      $voto=$_POST['voto'];
      if($connessione->getQuery("SELECT * FROM voto WHERE Id_Utente='$idutente' AND Id_Ricetta='$idricetta';")){
        $connessione->exeQuery("DELETE FROM voto WHERE Id_Utente='$idutente' AND Id_Ricetta='$idricetta';");
      }
      $connessione->exeQuery("INSERT INTO voto (Id_Utente,Id_Ricetta,Voto) VALUES('$idutente','$idricetta','$voto');");
      header("refresh:0; url=../PHP/Ricetta.php?Id_Ricetta=$idricetta");
    }

    if(isset($_GET['idricetta'])){
      //preferiti
      $idutente=$_SESSION['id'];
      $idricetta=$_GET['idricetta'];
      $ricerca=$connessione->getQuery("SELECT * FROM preferiti WHERE Id_Utente='$idutente' AND Id_Ricetta='$idricetta'");
      if(!$ricerca){
        $connessione->exeQuery("INSERT INTO preferiti (Id_Utente,Id_Ricetta) VALUES('$idutente','$idricetta');");
      }else{
        $connessione->exeQuery("DELETE FROM preferiti WHERE Id_Utente='$idutente' AND Id_Ricetta='$idricetta'");
      }
      header("refresh:0; url=../PHP/Ricetta.php?Id_Ricetta=$idricetta");
    }
    
  }else{
    header("refresh:0; url=../PHP/Registrazione.php");
  }
}catch(Exception $eccezione){
	echo $eccezione;
}	
$connessione->closeConnection();
?>

