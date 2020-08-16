<?php
//importazione librerie
require_once "connection.php";
require_once "funzioni.php";
require_once "sqlutils.php";
//inizializzazione session

//connessione al db
$connessione=new DBAccess();
try {
	//generazione variabili di sostituzione
	$divusermenu;
	$ref;
	//importazione txt
	$final = file_get_contents("../txt/Steam.html");
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