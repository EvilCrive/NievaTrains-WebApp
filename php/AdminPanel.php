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
			$adminop="";
			$final = file_get_contents("../txt/AdminPanel_Operations.html");
			if($_GET['AdminOP']==1){
				if(isset($_GET['utente'])){
					$iduser=$_GET['utente'];
					if(isset($_GET['promuovi'])){
						if(promuoviUtente($iduser,$connessione))	$adminop='<p>Operazione completata. </p><a href="AdminPanel.php" class="button">Torna all Admin Panel</a>';
						else	$adminop='<p>Operazione fallita. </p><a href="AdminPanel.php" class="button">Torna all Admin Panel</a>';
					}else	$adminop=stampaPromuoviUtente($iduser,$connessione);
				}else{
					$listautenti=getAllUtenti($connessione);
					$adminop=stampaListaUtenti4AP($listautenti,"PROMUOVI");
				}
			}
			else if($_GET['AdminOP']==2){
				if(isset($_GET['utente'])){
					$iduser=$_GET['utente'];
					if(isset($_GET['delete'])){
						if(deleteUtente($iduser,$connessione))	$adminop='<p>Operazione completata. </p><a href="AdminPanel.php" class="button">Torna all Admin Panel</a>';
						else	$adminop='<p>Operazione fallita. </p><a href="AdminPanel.php" class="button">Torna all Admin Panel</a>';
					}else	$adminop=stampaDeleteUtente($iduser,$connessione);
				}else{
					$listautenti=getAllUtenti($connessione);
					$adminop=stampaListaUtenti4AP($listautenti,"ELIMINA");
				}
			}
			else if($_GET['AdminOP']==3){
				//Elimina Treno
				if(isset($_GET['treno'])){
					$idtreno=$_GET['treno'];
					if(isset($_GET['delete'])){
						if(deleteTreno($idtreno,$connessione))	$adminop='<p>Operazione completata. </p><a href="AdminPanel.php" class="button">Torna all Admin Panel</a>';
						else	$adminop='<p>Operazione fallita. </p><a href="AdminPanel.php" class="button">Torna all Admin Panel</a>';
					}else	$adminop=stampaDeleteTreno($idtreno,$connessione);
				}else{
					$listatreni=getAllTreni($connessione);
					$adminop=stampaListaTreni4AP($listatreni);
				}
			}
			else if($_GET['AdminOP']==4){
				//Elimina Commenti
				if(isset($_GET['commento'])){
					$idcommento=$_GET['commento'];
					if(isset($_GET['delete'])){
						if(deleteCommento($idcommento,$connessione))	$adminop='<p>Operazione completata. </p><a href="AdminPanel.php" class="button">Torna all Admin Panel</a>';
						else	$adminop='<p>Operazione fallita. </p><a href="AdminPanel.php" class="button">Torna all Admin Panel</a>';
					}else	$adminop=stampaDeleteCommento($idcommento,$connessione);
				}else{
					$listacommenti=getAllCommenti($connessione);
					$adminop=stampaListaCommenti4AP($listacommenti);
				}
			}
			else if($_GET['AdminOP']==5){
				//Logout
				$adminop='';
			}
			else{
				$adminop='<p>Non esiste questa operazione. </p><a href="AdminPanel.php" class="button">Torna Indietro</a>';
			}
			$final=str_replace("%%adminoperation%%",$adminop,$final);
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