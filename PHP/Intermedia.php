<?php
require_once "connection.php";
require_once "stampe.php";
//apertura connessione
$connessione=new DBAccess();
session_start();
try{
	if(!$connessione->openConnectionLocal()) throw new Exception("No connection");

	if(isset($_GET["Categoria"])) {
		$cat=$_GET["Categoria"];

	//getquery correlate(categoria)
		$consigliate=$connessione->getQuery("SELECT Descrizione_Immagine, Nome_Immagine, Id_Ricetta, Nome FROM ricetta WHERE Macro_Categoria='$cat' OR Categoria='$cat';");
		if(!$consigliate) throw new Exception("Categoria sbagliata");
	//file html	
		$finale=file_get_contents('../txt/'.$cat.'.html');
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
	// %%Ricette(correlate)
		$finale=str_replace("%%Ricette",stampaRicette($consigliate),$finale);

	//echo dell'html finale
		echo $finale;
	}
	else {
		throw new Exception("No parameter get");
	}
	$connessione->closeConnection();
}catch(Exception $eccezione){
	echo file_get_contents('../txt/ErroreCategorie.html'); 
	$connessione->closeConnection();
}
?>