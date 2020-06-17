<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
$finale = file_get_contents("../txt/Ricerca.html");

//apertura connessione
$connessione=new DBAccess();
try{
	if(!$connessione->openConnectionLocal()) throw new Exception("No connection");

	//estrazioni variabili dalla post(stringa cercata)
	$passaggio=true;
	if(isset($_POST["stringaCercata"])) $stringa=$_POST["stringaCercata"];
	else $stringa="";
	$ricerca=$connessione->getQuery("SELECT Descrizione_Immagine, Nome_Immagine, Id_Ricetta, Nome FROM ricetta WHERE Nome LIKE '%$stringa%' OR Categoria='$stringa';");
	$ricercautenti=$connessione->getQuery("SELECT Nome, Cognome, Username, Id_Utente, Nome_Immagine, Nome_Thumbnail FROM utente WHERE Username LIKE '%$stringa%' UNION SELECT Nome, Cognome, Username, Id_Utente, Nome_Immagine, Nome_Thumbnail FROM utente WHERE Nome LIKE '%$stringa%' UNION SELECT Nome, Cognome, Username, Id_Utente, Nome_Immagine, Nome_Thumbnail FROM utente WHERE Cognome LIKE '%$stringa%';");
	$connessione->closeConnection();
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


	$tmp=0;
	if($ricerca)	$tmp+=1;
	if($ricercautenti)	$tmp+=1;	
	//sostituzioni:
	if(!$tmp){
		$finale=str_replace("%%HeaderRicerca","",$finale);
		$finale=str_replace("%%HeaderResearchUtenti","",$finale);
		$finale=str_replace("%%Ricette",stampaInfoBox("Ricette"),$finale);
		$finale=str_replace("%%Utenti",stampaInfoBox("Utenti"),$finale);
	}
	else {
			if(isset($_GET['tuttelericette'])){
				$check=1;
			}else{
				$check=0;
			}

			if($check===0){
				$finale=str_replace("%%HeaderRicerca",stampaHeaderRicerca($ricerca,$stringa,"0"),$finale);
				$finale=str_replace("%%HeaderResearchUtenti",stampaHeaderRicerca($ricercautenti,$stringa,"1"),$finale);
				$finale=str_replace("%%Ricette",stampaRicette($ricerca),$finale);
				$finale=str_replace("%%Utenti",stampaUtenti($ricercautenti),$finale);
			}
			if($check===1){
				$finale=str_replace("%%HeaderRicerca",stampaHeaderRicerca($ricerca,$stringa,"0"),$finale);
				$finale=str_replace("%%HeaderResearchUtenti","",$finale);
				$finale=str_replace("%%Ricette",stampaRicette($ricerca),$finale);
				$finale=str_replace("%%Utenti"," ",$finale);
			}
	}
	echo $finale;
}catch(Exception $eccezione){
	echo $eccezione;
	$connessione->closeConnection();
}
?>