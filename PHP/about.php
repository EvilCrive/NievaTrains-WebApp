<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
//apertura connessione
$connessione=new DBAccess();
try{
	if(!$connessione->openConnectionLocal()) throw new Exception("No connection");

	//file html	
	$finale = file_get_contents("../txt/about.html");
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
	
	
	//echo dell'html finale
	echo $finale;
}catch(Exception $eccezione){
	echo $eccezione;
	$connessione->closeConnection();
}
?>