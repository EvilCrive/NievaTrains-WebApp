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
	//upload file e form
	$errors="";
	if(isset($_POST['button'])){
		$array=$_FILES;
		controlNuploadAddTreno($_POST,$array);	
	}
	//importazione txt
	$final = file_get_contents("../txt/CreaTreno.html");
	$header=file_get_contents("../txt/Header.html");
	$footer=file_get_contents("../txt/Footer.html");
	//sostituzione variabili di sostituzione
	$final=str_replace("##header##",$header,$final);
	$final=str_replace("##footer##",$footer,$final);
	$final=str_replace("##Errori##",$errors,$final);
	if($errors)	header("refresh:0 url=CreaTreno.php#errori_registrazione");
	echo $final;	
}catch(Exception $eccezione){
	//gestione eccezioni
	echo $eccezione;
}
//chiusura connessione
$connessione->closeConnection();
?>
