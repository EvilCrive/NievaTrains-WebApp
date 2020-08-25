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
	//query al db
	
	if(isset($_POST['button'])){
		if(isset($_SESSION['userType'])){
			$_SESSION=array();
			session_destroy();
		}
		$_SESSION['admin']=$_POST['user'];
		$_SESSION['pin']=$_POST['pin'];
	}


	//importazione txt
	$final = file_get_contents("../txt/AdminPanel_Login.html");
	$header=file_get_contents("../txt/Header.html");
	$footer=file_get_contents("../txt/Footer.html");
	//sostituzione variabili di sostituzione

	$final=str_replace("##header##",$header,$final);
	$final=str_replace("##footer##",$footer,$final);		
	$final=functionMenuUser($final);
	echo $final;
}catch(Exception $eccezione){
	//gestione eccezioni
	echo $eccezione;
}
//chiusura connessione
$connessione->closeConnection();
?>