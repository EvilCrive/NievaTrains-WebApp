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
	//upload file e form
	$errors="";
	if(isset($_POST['button'])){
		//controlli info treno
		$categorie=$_POST['categorie'];//1 a 6
		switch($categorie){
			case "1":
				$_POST['categorie']="Elettrico";
			break;
			case "2":
				$_POST['categorie']="Vapore";
			break;
			case "3":
				$_POST['categorie']="Maglev EDS";
			break;
			case "4":
				$_POST['categorie']="Maglev EMS";
			break;
			case "5":
				$_POST['categorie']="Diesel";
			break;
			case "6":
				$_POST['categorie']="Turbina a Gas";
			break;
		}
		$tipo=$_POST['tipo'];//1 a 6
		switch($tipo){
			case "1":
				$_POST['tipo']="Alta velocità";
			break;
			case "2":
				$_POST['tipo']="Lunga Percorrenza";
			break;
			case "3":
				$_POST['tipo']="Prototipo";
			break;
			case "4":
				$_POST['tipo']="Intercity";
			break;
			case "5":
				$_POST['tipo']="Trasporto Locale";
			break;
		}
		if (!preg_match('/^[a-z0-9]{3,12}$/i',$_POST['nome']))        $errors.="<li>Nome non valido</li>";
		if (!preg_match('/^[a-z0-9]{3,12}$/i',$_POST['costruttore']))        $errors.="<li>Costruttore non valido</li>";
		if (!preg_match('/^[0-9]{1,3}$/i',$_POST['velocita']))        $errors.="<li>Velocità non valida</li>";
		if (!preg_match('/^[0-9]{4}$/i',$_POST['anni']))        $errors.="<li>Anno non valido</li>";
		if (!preg_match('/[a-z0-9]{10,}/i',$_POST['descrizione']))        $errors.="<li>Descrizione non valida</li>";
		if($_FILES['myfileupload']['error']!==4){
			$tipoFile=$_FILES['myfileupload']['type'];
			$tipoFile=str_replace("image/","",$tipoFile);
			$target_file = $_POST['nome'].".".$tipoFile;
			//controlli 
  			$check = getimagesize($_FILES["myfileupload"]["tmp_name"]);
  			if($check == false) {
    			$errors.="<li>File non e' un'immagine.</li>";
			}
			if (file_exists($target_file)) {
				$errors.="<li>File esiste già.</li>";
			}
			if ($_FILES["myfileupload"]["size"] > 500000) {
				$errors.="<li>File troppo grande (in MB).</li>";
			}  
			if(($tipoFile != "jpg") && ($tipoFile != "jpeg") && ($tipoFile != "png")) {
				$errors.="<li>Formato sbagliato, solo JPG JPEG PNG accettati.</li>";
			}
			if (!$errors) {
				if (move_uploaded_file($_FILES['myfileupload']['tmp_name'], "../uploads/".$target_file)){
					addTreno($_POST,"Treni/".$target_file,$connessione);
				} else {
					$errors.="<li>Errore di uploading del file.</li>";
				}
  			}
		}else	$errors.="<li>Aggiungi un file come immagine del treno.</li>";
	}
	//importazione txt
	$final = file_get_contents("../txt/CreaTreno.html");
	$header=file_get_contents("../txt/Header.html");
	$footer=file_get_contents("../txt/Footer.html");
	//sostituzione variabili di sostituzione
	$final=str_replace("##header##",$header,$final);
	$final=str_replace("##footer##",$footer,$final);
	$final=str_replace("##Errori##",$errors,$final);
	if($errors)	header("refresh:0 url=CreaTreno.php#errori_registrazione");
	echo $final;	
}catch(Exception $eccezione){
	//gestione eccezioni
	echo $eccezione;
}
//chiusura connessione
$connessione->closeConnection();
?>
