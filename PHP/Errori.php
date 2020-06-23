<?php
require_once "connection.php";
require_once "stampe.php";
//apertura connessione
$connessione=new DBAccess();
session_start();
try{
	if(!$connessione->openConnectionLocal()) throw new Exception("No connection");
	//getquery correlate(categoria)
	//file html	
		$finale=file_get_contents('../txt/ErroriVari.html');
	//sidemenu user
		$divusermenu="";
	$ref="";
	if(isset($_SESSION['login'])){
		if($_SESSION['login'])	$divusermenu='<div id="myUserSideNav" class="sidenav"><a href="javascript:void(0)" class="closebtn" onclick="closeUserNav()">&times;</a><ul><li><a href="../PHP/userManage.php?request=1">Profilo</a></li><li><a href="../PHP/userManage.php?request=2">Logout</a></li></ul></div>';
		else	$divusermenu="";
	}else{
		$divusermenu="";
	}
	if($divusermenu===""){
		$ref='<a href="Registrazione.php"><img id="user_logo" src="../immagini/account.png" alt="user logo" onclick="openUserNav()"/></a>';
	}else{
		$ref='<img id="user_logo" src="../immagini/account.png" alt="user logo" onclick="openUserNav()"/>';
		
	}
	if(isset($_GET['errore'])){
		$errors='<div class="parent-content"><div class="text-content"><img id="img-404" src="../immagini/img404error.png" alt="Errore 404" />';
		$errors.='<h1>Ops! Qualcosa e andato storto...</h1>';
		$errors.='<h2>Sembra tu abbia un problema riguardante';
		if($_GET['errore']==="utenti"){
			$errors.=' gli utenti';
			$errors.='</h2><a href="../PHP/Index.php"> Torna alla <span xml:lang="en" lang="en">Home</span></a></div></div>';
		}
		if($_GET['errore']==="categorie"){
			$errors.=" le categorie";
			$errors.='</h2><a href="../PHP/Ricerca.php">Vai a tutte le ricette</a></div></div>';
		}
		if($_GET['errore']==="ricette"){
			$errors.=" le ricette";
			$errors.='</h2><a href="../PHP/Ricerca.php">Vai a tutte le ricerche</a></div></div>';
		}
		
		$finale=str_replace("%%errorivari",$errors,$finale);
	}
	$finale=str_replace("%%user",$ref,$finale);
	$finale=str_replace("%%utente",$divusermenu,$finale);
	//sostituzioni:
	// %%Ricette(correlate)
	//echo dell'html finale
    
    echo $finale;
	$connessione->closeConnection();
}catch(Exception $eccezione){
    echo "wyt";
//	header( "refresh:0; url=../PHP/Index.php" ); 	
	$connessione->closeConnection();
}

?>


