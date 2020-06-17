<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
//apertura connessione
$connessione=new DBAccess();
try{
	$bool=1;
	if(isset($_SESSION['adminlogged'])){
		if(isset($_GET['operation'])){
			echo "ciao";
			die();
		}
		$finale = file_get_contents("../txt/adminpanel.html");
		$bool=0;
	}
	if(!$connessione->openConnectionLocal()) throw new Exception("No connection");
	if(isset($_POST['button'])){
		$user=$_POST['user'];
		$pin=$_POST['pin'];
		$connessione->openConnectionLocal();
		if($connessione->getQuery("SELECT * from admins WHERE User='$user' AND Pin='$pin'")){
			$finale = file_get_contents("../txt/adminpanel.html");
			$bool=0;
			$_SESSION=array();
			session_destroy();
			session_start();
			$_SESSION['adminlogged']=true;
		}
	}
	if($bool){
		$finale = file_get_contents("../txt/admin_panel_login.html");
	}
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
	$finale=str_replace("%%user",$ref,$finale);
	$finale=str_replace("%%utente",$divusermenu,$finale);
	
	//echo dell'html finale
	echo $finale;
}catch(Exception $eccezione){
	echo $eccezione;
	$connessione->closeConnection();
}
?>