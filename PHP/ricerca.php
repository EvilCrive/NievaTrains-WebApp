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
	$connessione->closeConnection();
		//sidemenu user
		if(isset($_SESSION['login'])){
			if($_SESSION['login'])	$divusermenu='<div id="myUserSideNav" class="sidenav"><a href="javascript:void(0)" class="closebtn" onclick="closeUserNav()">&times;</a><ul><li><a href="../PHP/UserManage.php?request=1">Profilo</a></li><li><a href="../PHP/UserManage.php?request=2">Logout</a></li></ul></div>';
			else	$divusermenu="";
		}else{
			$divusermenu="";
		}
		$finale=str_replace("%%utente",$divusermenu,$finale);

	//sostituzioni:
	if(!$ricerca){
		$finale=str_replace("%%HeaderRicerca","",$finale);
		$finale=str_replace("%%Ricette",stampaInfoBox("Ricette"),$finale);
		$finale=str_replace("%%Utenti",stampaInfoBox("Utenti"),$finale);
	}
	else {
		if($stringa==="") $finale=str_replace("%%HeaderRicerca",stampaHeaderRicerca($ricerca,$stringa),$finale);
		else $finale=str_replace("%%HeaderRicerca",stampaHeaderRicerca($ricerca,$stringa),$finale);
		$finale=str_replace("%%Ricette",stampaRicette($ricerca),$finale);
		$finale=str_replace("%%Utenti",stampaUtenti($ricerca),$finale);
	}
	echo $finale;
}catch(Exception $eccezione){
	echo $eccezione;
	$connessione->closeConnection();
}
?>