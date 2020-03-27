<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
//apertura connessione
//$connessione=new DBAccess();
//if(!$connessione->openConnectionLocal()) echo 'errore';

//getquery consigliate

//$connessione->closeConnection();
//generazione numero random
//$num=rand(0,sizeof($consigliate)-1);

//file html	
$finale = file_get_contents("../txt/Registrazione.html");
if(isset($_SESSION['Fail'])){
	$a="" .$_SESSION['Fail']. "";
}else{
	$a="";
}
if(isset($_SESSION['fail'])){
	$b="" .$_SESSION['fail']. "";
}else{
	$b="";
}
if(isset($_SESSION['errors'])){
	$c="" .$_SESSION['errors']. "";
}else{
	$c="";
}
//sostituzioni:

$finale=str_replace("%b",$b,$finale);
$finale=str_replace("%a",$a,$finale);
$finale=str_replace("%c",$c,$finale);
//echo dell'html finale
echo $finale;
if($a=="Errore Login")	echo $a;
?>