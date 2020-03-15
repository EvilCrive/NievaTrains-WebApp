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
if($_SESSION['Fail']){}
$a="" .$_SESSION['fail']. "";
$b="" .$_SESSION['Fail']. "";
//sostituzioni:

$finale=str_replace("%b",$a,$finale);
$finale=str_replace("%a",$b,$finale);

//echo dell'html finale
echo $finale;
if($a=="Errore Login")	echo $a;
?>