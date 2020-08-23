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
	
	//importazione txt
	$final = file_get_contents("../txt/Utente.html");
	$header=file_get_contents("../txt/Header.html");
	$footer=file_get_contents("../txt/Footer.html");

	//generazione variabili di sostituzione
	$modificaBio="";
	$creaPagina="";
	$email="";
	$trainbox="";
	$logout="";
	if(!$queryInfoU)	throw new Exception("Wrong ID");
	if((isset($_SESSION['userType'])) && ($id==$_SESSION['id'])){
		$email="EMAIL: ".stampaEmail($queryInfoU);
		//form per modifica bio
		$modificaBio='<form action="utils/operations.php" method="post" name="modificaBioform"><fieldset><label><textarea rows="5" cols="50" name="bioTesto" >'.getUserBio($id,$connessione).'</textarea></label><label><input class="button" name="modificaBio" value="Modifica Bio" type="submit" /></label></fieldset></form>';
		if($_SESSION['userType']=="1"){
			// button per creare nuovo treno
			$creaPagina='<form action="utils/uploadPagina.php" method="post" name="addTrenoform"><fieldset><label><input class="button" name="creaTreno" type="submit" value="Crea Treno"/></label></fieldset></form>';
		}
		$logout='<form action="utils/operations.php" method="post" name="logoutForm"><fieldset><label><input class="button" name="logout" type="submit" value="Logout"/></label></fieldset></form>';
	}	
	if($queryRisultati) $trainbox=stampaTrainBox($queryRisultati);
	else $trainbox="<p>Questo utente non ha pubblicato pagine in Nieva Trains</p>";

	//sostituzione variabili di sostituzione
	$final=str_replace("##header##",$header,$final);
	$final=str_replace("##footer##",$footer,$final);
	$final=str_replace("##Email##",$email,$final);
	$final=str_replace("%%modificabio",$modificaBio,$final);
	$final=str_replace("%%creapagina",$creaPagina,$final);
	$final=str_replace("##ImmagineUtente##",stampaImmagine($queryInfoU),$final);
	$final=str_replace("##NomeU##",stampaNomeU($queryInfoU),$final);
	$final=str_replace("##InfoUtente##",stampaInfoUtente($queryInfoU),$final);
	$final=str_replace("##Bio##","BIO: ".stampaBio($queryInfoU),$final);
	$final=str_replace("##TrainBox##",$trainbox,$final);
	$final=str_replace("%%logout",$logout,$final);
	echo $final;
}catch(Exception $eccezione){
	//gestione eccezioni
	if($eccezione="No get" || $eccezione="Wrong ID") header("refresh:0; url=../php/Ricerca.php");
	else echo $eccezione;
}
//chiusura connessione
$connessione->closeConnection();
?>
