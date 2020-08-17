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
	if(isset($_GET["Id_Utente"])) $id=$_GET["Id_Utente"];
	else throw new Exception("No get");
	//query al db
	$queryInfoU=getInfoUtente($id, $connessione);
	$queryEmail=getEmail($id, $connessione);
	$queryBio=getBio($id, $connessione);
	$queryRisultati=getTrainBoxAutore($id, $connessione);
	$nPreferiti=getPreferiti($id, $connessione);
	$queryImmagine=getImmagineUtente($id, $connessione);
	//generazione variabili di sostituzione
	$divusermenu;
	$ref;
	$infoU=stampaInfoUtente($queryInfoU);
	$email=stampaEmail($queryEmail);
	$bio=stampaBio($queryBio);
	$risultati=stampaTrainBox($queryRisultati);
	$preferiti=stampaPreferiti($nPreferiti);
	$immagine=stampaImmagine($queryImmagine);
	//importazione txt
	$final = file_get_contents("../txt/Utente.html");
	$header=file_get_contents("../txt/Header.html");
	$footer=file_get_contents("../txt/Footer.html");
	//sostituzione variabili di sostituzione
	$final=str_replace("%%user",$divusermenu,$final);	
	$final=str_replace("%%user",$ref,$final);	
	$final=str_replace("##ImmagineUtente##",$immagine,$final);
	$final=str_replace("##LikeT##",$preferiti,$final);	
	$final=str_replace("##InfoUtente##",$infoU,$final);
	$final=str_replace("##Email##",$email,$final);
	$final=str_replace("##Bio##",$bio,$final);	
	$final=str_replace("##TrainBox##",$risultati,$final);	
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