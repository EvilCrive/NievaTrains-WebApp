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
	$var="";
	$errors="";
	$final="";
	if(isset($_POST['button'])){
		$final = file_get_contents("../txt/AdminPanel_Login.html");
		if(isset($_SESSION['userType'])){
			$_SESSION=array();
			session_destroy();
		}
		$admin=$_POST['user'];
		$pin=$_POST['pin'];
		if(!preg_match('/^\w{3,}$/',$admin))	$errors.="<li>Errore USER:<ol><li>Minimo 3 caratteri, alfanumerici</li></ol></li>";
		if(!preg_match('/^\w{3,}$/',$pin))		$errors.="<li>Errore USER:<ol><li>Minimo 3 caratteri, alfanumerici</li></ol></li>";
		$errors=checkAdmin($connessione,$errors);
		if(!$errors){
			$_SESSION['admin']=$_POST['user'];
			$_SESSION['pin']=$_POST['pin'];
		}else{
			$var='<div id="errori_adminlogin">';
			$errors=$var."<ul>".$errors."</ul>";
			$final=str_replace($var,$errors,$final);
		}
	}
	if(isset($_SESSION['admin'])){
		print_r($_SESSION);
	}else{$final = file_get_contents("../txt/AdminPanel_Login.html");}


	//importazione txt
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