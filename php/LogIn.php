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
	if(isset($_SESSION['userType'])){
		$id=$_SESSION['id'];
		header("refresh:0 url=Utente.php?Id_Utente=$id");	
	}
	$final=str_replace("%%errors",$errori,$final);
	$final=str_replace("##header##",$header,$final);
	$final=str_replace("##footer##",$footer,$final);	
	$final=functionMenuUser($_SESSION,$final);
	echo $final;
	
}catch(Exception $eccezione){
	//gestione eccezioni
	echo $eccezione;
}
//chiusura connessione
$connessione->closeConnection();
?>