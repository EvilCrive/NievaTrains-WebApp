<?php
//importazione librerie
require_once "utils/connection.php";
require_once "utils/funzioni.php";
require_once "utils/sqlutils.php";
//inizializzazione session

//connessione al db
$connessione=new DBAccess();
try {
	if(!$connessione->openConnection()) throw new Exception("No connection");
	if(isset($_GET["Id_Utente"])) $id=$_GET["Id_Utente"];
	else throw new Exception("No get");
	//query al db
	$queryInfoU=getInfoUtente($id, $connessione);
	$queryRisultati=getTrainBoxAutore($id, $connessione);
	//generazione variabili di sostituzione
	//$divusermenu;
	//$ref;

	//importazione txt
	$final = file_get_contents("../txt/Utente.html");
	$header=file_get_contents("../txt/Header.html");
	$footer=file_get_contents("../txt/Footer.html");
	//sostituzione variabili di sostituzione
	//$final=str_replace("%%user",$divusermenu,$final);	
	//$final=str_replace("%%user",$ref,$final);	
	
	
	$final=str_replace("##header##",$header,$final);
	$final=str_replace("##footer##",$footer,$final);

if($queryInfoU){
	$final=str_replace("##ImmagineUtente##",stampaImmagine($queryInfoU),$final);
	$final=str_replace("##NomeU##",stampaNomeU($queryInfoU),$final);
	$final=str_replace("##InfoUtente##",stampaInfoUtente($queryInfoU);,$final);
	$final=str_replace("##Email##",stampaEmail($queryInfoU),$final);
	$final=str_replace("##Bio##",stampaBio($queryInfoU),$final);
}
else throw new Exception("Wrong ID");

if($queryRisultati) $final=str_replace("##TrainBox##",stampaTrainBox($queryRisultati),$final);
else $final=str_replace("##TrainBox##","<p>Questo utente non ha pubblicato pagine in Nieva Trains</p>",$final);
	
	echo $final;
}catch(Exception $eccezione){
	//gestione eccezioni
	if($eccezione="No get" || $eccezione="Wrong ID") header("refresh:0; url=../php/Ricerca.php");
	else echo $eccezione;
}
//chiusura connessione
$connessione->closeConnection();
?>
