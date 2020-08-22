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
	if(isset($_GET["Id_Utente"])) $id=$_GET["Id_Utente"];
	else throw new Exception("No get");
	//query al db
	$queryInfoU=getInfoUtente($id, $connessione);
	$queryRisultati=getTrainBoxAutore($id, $connessione);
	//generazione variabili di sostituzione
	
	//importazione txt
	$final = file_get_contents("../txt/Utente.html");
	$header=file_get_contents("../txt/Header.html");
	$footer=file_get_contents("../txt/Footer.html");

	//sostituzione variabili di sostituzione	
	$final=str_replace("##header##",$header,$final);
	$final=str_replace("##footer##",$footer,$final);
	$modificaBio="";
	$creaPagina="";
	$email="";
	if($queryInfoU){
		$final=str_replace("##ImmagineUtente##",stampaImmagine($queryInfoU),$final);
		$final=str_replace("##NomeU##",stampaNomeU($queryInfoU),$final);
		$final=str_replace("##InfoUtente##",stampaInfoUtente($queryInfoU),$final);
		$final=str_replace("##Bio##","BIO: ".stampaBio($queryInfoU),$final);
		if((isset($_SESSION['userType'])) && ($id==$_SESSION['id'])){
			$email="EMAIL: ".stampaEmail($queryInfoU);
			//form per modifica bio
			$modificaBio='<form action="utils/operations.php" method="post"><fieldset><label><textarea rows="5" cols="50" name="bioTesto" >'.getUserBio($id,$connessione).'</textarea></label><label><input class="button" name="modificaBio" value="Modifica Bio" type="submit" /></label></fieldset></form>';
			if($_SESSION['userType']=="1"){
				// button per creare nuovo treno
				$creaPagina='<form action="utils/operations.php" method="post"><fieldset><label><input class="button" nome="creaTreno" value="Crea Treno"/></label></fieldset></form>';
			}
		}	
	}
	else throw new Exception("Wrong ID");

	$final=str_replace("##Email##",$email,$final);
	$final=str_replace("%%modificabio",$modificaBio,$final);
	$final=str_replace("%%creapagina",$creaPagina,$final);

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
