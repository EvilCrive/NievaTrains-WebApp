<?php
//importazione librerie
require_once "utils/connection.php";
require_once "utils/funzioni.php";
require_once "utils/sqlutils.php";
//inizializzazione session

//connessione al db
$connessione=new DBAccess();
try {
	if(!$connessione->openConnectionLocal()) throw new Exception("No connection");
	//query al db
	
	//generazione variabili di sostituzione
	$divusermenu;
	$ref;
	//importazione txt
	$final = file_get_contents("../txt/Home.html");
	$header=file_get_contents("../txt/Header.html");
	$footer=file_get_contents("../txt/Footer.html");
	//sostituzione variabili di sostituzione
	$final=str_replace("%%user",$divusermenu,$final);
	$final=str_replace("%%user",$ref,$final);	
	$final=str_replace("##header##",$header,$final);
	$final=str_replace("##footer##",$footer,$final);		
	
	echo $final;
}catch(Exception $eccezione){
	//gestione eccezioni
	echo $eccezione;
}
//chiusura connessione
$connessione->closeConnection();
?>