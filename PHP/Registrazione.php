<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
//file html	
$finale = file_get_contents("../txt/Registrazione.html");
if(!isset($_SESSION['first'])){
	$_SESSION['fail']="";
}
if($_SESSION['justlogged']==true){
	$_SESSION['justlogged']=false;
	header("refresh:0; url=../PHP/Index.php");
			
}
$b=$_SESSION['fail'];
$finale=str_replace("%b",$b,$finale);
echo $finale;
?>