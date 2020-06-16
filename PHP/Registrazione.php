<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
//file html	
$finale = file_get_contents("../txt/Registrazione.html");
if(!isset($_SESSION['first'])){
	$_SESSION['fail']="";
}

if(isset($_SESSION['justlogged'])){
	if($_SESSION['justlogged']==true){
	$_SESSION['justlogged']=false;
	header("refresh:0; url=../PHP/Index.php");
			
	}
}
$b=$_SESSION['fail'];
$finale=str_replace("%b",$b,$finale);
	//sidemenu user
	if(isset($_SESSION['login'])){
		if($_SESSION['login'])	$divusermenu='<div id="myUserSideNav" class="sidenav"><a href="javascript:void(0)" class="closebtn" onclick="closeUserNav()">&times;</a><ul><li><a href="../PHP/UserManage.php?request=1">Profilo</a></li><li><a href="../PHP/UserManage.php?request=2">Logout</a></li></ul></div>';
		else	$divusermenu="";
	}else{
		$divusermenu="";
	}
	$finale=str_replace("%%utente",$divusermenu,$finale);
echo $finale;
?>