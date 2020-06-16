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
	$followers=$connessione->getQuery("SELECT U.Username
		FROM Utente AS U JOIN Follow AS F ON U.Id_Utente=F.Id_Utente2
		WHERE F.Id_Utente1=$ID;");
//getquery preferite(id)
	$preferite=$connessione->getQuery("SELECT R.Id_Ricetta, R.Nome, R.Introduzione, R.Nome_Immagine, R.Descrizione_Immagine
			FROM Preferiti AS P JOIN Ricetta AS R ON P.Id_Ricetta=R.Id_Ricetta
			WHERE P.Id_Utente=$ID;");
//file html	
	$finale = file_get_contents("../txt/Utente.html");
	//sidemenu user
	if(isset($_SESSION['login'])){
		if($_SESSION['login'])	$divusermenu='<div id="myUserSideNav" class="sidenav"><a href="javascript:void(0)" class="closebtn" onclick="closeUserNav()">&times;</a><ul><li><a href="../PHP/UserManage.php?request=1">Profilo</a></li><li><a href="../PHP/UserManage.php?request=2">Logout</a></li></ul></div>';
		else	$divusermenu="";
	}else{
		$divusermenu="";
	}
	$finale=str_replace("%%utente",$divusermenu,$finale);
//sostituzioni:
	$finale=str_replace("%%Nome",stampaUsername($utente),$finale); 
	$finale=str_replace("%%Immagine",stampaImmagineUtente($utente),$finale);
	$finale=str_replace("%%LivelloTopFan",stampaLivelloTopFan($utente),$finale);
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