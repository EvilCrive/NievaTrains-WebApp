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
	$bool=1;
	if(isset($_POST['button'])){
		$bool=0;
		$final = file_get_contents("../txt/AdminPanel_Login.html");
		if(isset($_SESSION['userType']))	$_SESSION=array();
		$admin=$_POST['user'];
		$pin=$_POST['pin'];
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
		$bool=0;
		if(isset($_GET['AdminOP'])){
			if($_GET['AdminOP']==1){
				//Elimina Commenti
				$final = file_get_contents("../txt/AdminPanel_Operations.html");
			}
			else if($_GET['AdminOP']==2){
				//Promuovi Utenti 
			}
			else if($_GET['AdminOP']==3){
				//Elimina Treno
			}
			else if($_GET['AdminOP']==4){
				//Elimina Utenti
			}
			else echo "4";
		}else	$final = file_get_contents("../txt/AdminPanel_Pannello.html");
	}
	if($bool===1)	$final = file_get_contents("../txt/AdminPanel_Login.html");

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