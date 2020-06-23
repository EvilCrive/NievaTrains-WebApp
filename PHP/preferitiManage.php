
<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
$ConnessioneAttiva = new DBAccess();
$var=$ConnessioneAttiva->openConnectionlocal();
$login=0;
if(isset($_SESSION['login'])){
  if($_SESSION['login']){
    $login=1;
  }else{
    $login=0;
  }
}else{
  $login=0;
}

if($login){
  if((isset($_POST['ricetta'])) && (isset($_POST['voto']))){ 
    $idricetta=$_POST['ricetta'];
    $idutente=$_SESSION['id'];
    $voto=$_POST['voto'];
    if($ConnessioneAttiva->getQuery("SELECT * FROM voto WHERE Id_Utente='$idutente' AND Id_ricetta='$idricetta';")){
      $ConnessioneAttiva->exeQuery("DELETE FROM voto WHERE Id_Utente='$idutente' AND Id_ricetta='$idricetta';");
    }
    $ConnessioneAttiva->exeQuery("INSERT INTO voto (Id_Utente,Id_ricetta,Voto) VALUES('$idutente','$idricetta','$voto');");
    header("refresh:0; url=../PHP/Ricetta.php?Id_ricetta=$idricetta");
    die();
  }
  $idutente=$_SESSION['id'];
  $idricetta=$_GET['idricetta'];
  $ricerca=$ConnessioneAttiva->getQuery("SELECT * FROM preferiti WHERE Id_Utente='$idutente' AND Id_ricetta='$idricetta'");
  if(!$ricerca){
    $ConnessioneAttiva->exeQuery("INSERT INTO preferiti (Id_Utente,Id_ricetta) VALUES('$idutente','$idricetta');");
  }else{
    $ConnessioneAttiva->exeQuery("DELETE FROM preferiti WHERE Id_Utente='$idutente' AND Id_ricetta='$idricetta'");
  }
  header("refresh:0; url=../PHP/Ricetta.php?Id_ricetta=$idricetta");
}else{
  header("refresh:0; url=../PHP/Registrazione.php");
}
?>

