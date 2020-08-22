<?php
//importazione librerie
require_once "utils/connection.php";
require_once "utils/funzioni.php";
require_once "utils/sqlutils.php";
//inizializzazione session
session_start();
//connessione al db
$connessione=new DBAccess();
try {
	if(!$connessione->openConnection()) throw new Exception("No connection");
	//query al db
	
	$final = file_get_contents("../txt/Login.html");
	$header=file_get_contents("../txt/Header.html");
	$footer=file_get_contents("../txt/Footer.html");
	//sostituzione variabili di sostituzione
	$errori="";
	if(isset($_SESSION['fail'])){
		$errori=$_SESSION['fail'];
		$_SESSION['fail']="";
	}
	$final=str_replace("%%errors",$errori,$final);

	$final=str_replace("##header##",$header,$final);
	$final=str_replace("##footer##",$footer,$final);	
	if(isset($_SESSION['userType'])){
		header("refresh:0 url=../../");	
		die();
	}
	echo $final;
	
}catch(Exception $eccezione){
	//gestione eccezioni
	echo $eccezione;
}
//chiusura connessione
$connessione->closeConnection();
?>