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
	if(isset($_GET["Id_Treno"])) $id=$_GET["Id_Treno"];
	else throw new Exception("No get");
	//query al db
	$queryInfoTreno=getInfoTreno($id, $connessione);
	$queryNomeA=getUsernameA($id, $connessione);
	$queryCommenti=getCommenti($id, $connessione);
	$nPreferiti=getPreferiti($id, $connessione);
	//generazione variabili di sostituzione
	//$divusermenu;
	//$ref;
	
	//importazione txt
	$final = file_get_contents("../txt/Treno.html");
	$header=file_get_contents("../txt/Header.html");
	$footer=file_get_contents("../txt/Footer.html");
	//sostituzione variabili di sostituzione
	$final=str_replace("##LikeT##",stampaPreferiti($nPreferiti),$final);
	//$final=str_replace("%%user",$divusermenu,$final);	
	//$final=str_replace("%%user",$ref,$final);	
	$final=str_replace("##header##",$header,$final);
	$final=str_replace("##footer##",$footer,$final);	
	
if($queryInfoTreno) {
	$final=str_replace("##ImmagineTreno##",stampaImmagine($queryInfoTreno),$final);
	$final=str_replace("##NomeT##",stampaNomeT($queryInfoTreno),$final);
	$final=str_replace("##SchedaT##",stampaSchedaT($queryInfoTreno),$final);
	$final=str_replace("##DescT##",stampaDescT($queryInfoTreno),$final);
}else new throw Exception("Wrong ID");

if($queryNomeA) $final=str_replace("##NomeA##",stampaUsernameA($queryNomeA),$final);
else new throw Exception("Errore nel DB, manca l'autore di una pagina");
	
if($queryCommenti) $final=str_replace("##Commenti##",stampaCommenti($queryCommenti),$final);
else $final=str_replace("##Commenti##","",$final);
	
	echo $final;
}catch(Exception $eccezione){
	//gestione eccezioni
	if($eccezione="No get" || $eccezione="Wrong ID") header("refresh:0; url=../php/Ricerca.php");
	else echo $eccezione;
}
//chiusura connessione
$connessione->closeConnection();
?>
