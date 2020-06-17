<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
//apertura connessione
$connessione=new DBAccess();
try{
if(!$connessione->openConnectionLocal()) throw new Exception("No connection");


if(isset($_GET["Id_Utente"])) {
//estrazioni variabili dalla get(id utente)
	$ID=$_GET["Id_Utente"];
//getquery utente(id)
	$utente=$connessione->getQuery("SELECT * FROM utente WHERE Id_Utente=$ID;");
//getquery followers(id)
	$followers=$connessione->getQuery("SELECT U.Username, F.Id_Utente2
		FROM Utente AS U JOIN Follow AS F ON U.Id_Utente=F.Id_Utente2
		WHERE F.Id_Utente1=$ID;");
//getquery preferite(id)
	$preferite=$connessione->getQuery("SELECT R.Id_Ricetta, R.Nome, R.Introduzione, R.Nome_Immagine, R.Descrizione_Immagine
			FROM Preferiti AS P JOIN Ricetta AS R ON P.Id_Ricetta=R.Id_Ricetta
			WHERE P.Id_Utente=$ID;");
//file html	
	$finale = file_get_contents("../txt/Utente.html");
	//sidemenu user
		$divusermenu="";
	$ref="";
	if(isset($_SESSION['login'])){
		if($_SESSION['login'])	$divusermenu='<div id="myUserSideNav" class="sidenav"><a href="javascript:void(0)" class="closebtn" onclick="closeUserNav()">&times;</a><ul><li><a href="../PHP/UserManage.php?request=1">Profilo</a></li><li><a href="../PHP/UserManage.php?request=2">Logout</a></li></ul></div>';
		else	$divusermenu="";
	}else{
		$divusermenu="";
	}
	if($divusermenu===""){
		$ref='<a href="Registrazione.php"><img id="user_logo" src="../immagini/account.png" alt="user logo" onclick="openUserNav()"/></a>';
	}else{
		$ref='<img id="user_logo" src="../immagini/account.png" alt="user logo" onclick="openUserNav()"/>';
		
	}
	$finale=str_replace("%%user",$ref,$finale);
	$finale=str_replace("%%utente",$divusermenu,$finale);
//sostituzioni:
	$finale=str_replace("%%Nome",stampaUsername($utente),$finale); 
	$finale=str_replace("%%Immagine",stampaImmagineUtente($utente),$finale);
	if(isset($_SESSION['login'])){
		if($_SESSION['login']){
			$iduser=$_SESSION['id'];
		}
	}
	if($_GET['Id_Utente']===$iduser){
		$finale=str_replace("%%azioni",stampaEditbio(),$finale);
	}else{
		$id2=$_GET['Id_Utente'];
		$query=$connessione->getQuery("SELECT * FROM follow WHERE Id_Utente1='$iduser' AND Id_Utente2='$id2'");
		if($query){
			$finale=str_replace("%%azioni","",$finale);
		}else{
			$finale=str_replace("%%azioni",stampafollow($id2),$finale);
		}
	}
	$finale=str_replace("%%CognomeUsernameBio",stampaNomeCognomeUsernameBio($utente),$finale);
	$finale=str_replace("%%Followers",stampaFollowers($followers),$finale);
	$finale=str_replace("%%Ricette",stampaRicette($preferite),$finale);

//echo dell'html finale
	echo $finale;
}
else {
	throw new Exception("No parameter get");
}
$connessione->closeConnection();
}catch(Exception $eccezione){
	echo file_get_contents('../txt/ErroreUtenti.html'); 
	$connessione->closeConnection();
}
?>