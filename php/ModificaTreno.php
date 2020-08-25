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

    $errors="";
    $treno="";
    if(isset($_POST['idtreno']))    $treno=$_POST['idtreno'];
    else    throw new Exception("no idtreno in post");
    //query
    $infotreno=getInfoTreno($treno,$connessione);
    $iduser=stampaIdAutoreT($infotreno);
	if(isset($_SESSION['userType']) && ($_SESSION['userType']==1) && $iduser==$_SESSION['id']){
            if(isset($_POST['button'])){
                //modifica treno
                controlNmodifyTreno($connessione);

            }
            //queryDB
            $nome=stampaNomeT($infotreno);
            $costruttore=stampaCostruttoreT($infotreno);
            $velocita=stampaVelocitaT($infotreno);
            $anno=stampaAnnoT($infotreno);
            $descrizione=stampaDescT($infotreno);
		    //importazione txt
		    $final = file_get_contents("../txt/ModificaTreno.html");
		    $header=file_get_contents("../txt/Header.html");
    		$footer=file_get_contents("../txt/Footer.html");
	    	//sostituzione variabili di sostituzione
		    $final=str_replace("##header##",$header,$final);
    		$final=str_replace("##footer##",$footer,$final);
            $final=str_replace("##Errori##",$errors,$final);
            //autocompleta campi coi campi del treno selezionato da modificare
            $final=str_replace("%%nome",'"'.$nome.'"',$final);
            $final=str_replace("%%costruttore",'"'.$costruttore.'"',$final);
            $final=str_replace("%%velocita",'"'.$velocita.'"',$final);
            $final=str_replace("%%anno",'"'.$anno.'"',$final);
            $final=str_replace("%%descrizione",'"'.$descrizione.'"',$final);
            $final=str_replace("%%idtreno",$treno,$final);
            //check finale errori
            if($errors)	header("refresh:0 url=ModificaTreno.php#errori_newtreno");
            $final=functionMenuUser($final);
		    echo $final;	
	}else	die();//header("refresh:0 url=../PHP/Index.php");
}catch(Exception $eccezione){
	//gestione eccezioni
	echo $eccezione;
}
//chiusura connessione
$connessione->closeConnection();
?>