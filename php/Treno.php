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
	if(isset($_GET["Id_Treno"])) $id=$_GET["Id_Treno"];
	else throw new Exception("No get");
	//query al db
	$queryNomeT=getNomeT($id, $connessione);
	$queryNomeA=getUsernameA($id, $connessione);
	$querySchedaT=getSchedaT($id, $connessione);
	$queryDescT=getDescT($id, $connessione);
	$queryCommenti=getCommenti($id, $connessione);
	$queryImmagine=getImmagineTreno($id, $connessione);
	//generazione variabili di sostituzione
	$divusermenu;
	$ref;
	$NomeT=stampaNomeT($queryNomeT);
	$NomeA=stampaUsernameA($queryNomeA);
	$SchedaT=stampaSchedaT($querySchedaT);
	$DescT=stampaDescT($queryDescT);
	$Commenti=stampaCommenti($queryCommenti);
	$immagine=stampaImmagine($queryImmagine);
	//importazione txt
	$final = file_get_contents("../txt/Treno.html");
	$header=file_get_contents("../txt/Header.html");
	$footer=file_get_contents("../txt/Footer.html");
	//sostituzione variabili di sostituzione
	$final=str_replace("%%user",$divusermenu,$final);	
	$final=str_replace("%%user",$ref,$final);	
	$final=str_replace("##ImmagineTreno##",$immagine,$final);
	$final=str_replace("##NomeT##",$NomeT,$final);
	$final=str_replace("##NomeA##",$NomeA,$final);
	$final=str_replace("##SchedaT##",$SchedaT,$final);	
	$final=str_replace("##DescT##",$DescT,$final);	
	$final=str_replace("##Commenti##",$Commenti,$final);
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