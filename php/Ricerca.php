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
	if(isset($_GET["stringaCercata"])) $stringa=$_GET["stringaCercata"];
	else $stringa="";
	if(isset($_GET["CategoriaCercata"])) $CatRicerca=$_GET["CategoriaCercata"];
	else $CatRicerca="Treni";
	//query al db
	if($CatRicerca=="Utenti") $queryRisultato=getUtentiBoxRicerca($stringa, $connessione);
	else $queryRisultato=getTrainBoxRicerca($stringa, $connessione);
	//generazione variabili di sostituzione
	//importazione txt
	$final=file_get_contents("../txt/Ricerca.html");
	$header=file_get_contents("../txt/Header.html");
	$footer=file_get_contents("../txt/Footer.html");
	//sostituzione variabili di sostituzione
	$final=str_replace("##Stringa##",$stringa,$final);
	$final=str_replace("##CatRicerca##",$CatRicerca,$final);	
	$final=str_replace("##header##",$header,$final);
	$final=str_replace("##footer##",$footer,$final);

if($queryRisultato){
	if($CatRicerca=="Utenti")	$final=str_replace("##TrainBox##",stampaUtentiBox($queryRisultato),$final);
	else	$final=str_replace("##TrainBox##",stampaTrainBox($queryRisultato),$final);
}
else $final=str_replace("##TrainBox##","<p>Spiacenti ma non ci sono risultati corrispondenti ai criteri di ricerca</p>",$final);
	
	echo $final;
}catch(Exception $eccezione){
	//gestione eccezioni
	echo $eccezione;
}
//chiusura connessione
$connessione->closeConnection();
?>