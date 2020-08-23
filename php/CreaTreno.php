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
	if(isset($_POST['button'])){
		$errors="";
		$_SESSION['fail']="";
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
		if (!preg_match('/^[a-z]{3,12}$/i',$_POST['categorie']))        $errors.="<li>Categorie non valido</li>";
		if (!preg_match('/^[a-z]{3,12}$/i',$_POST['tipo']))        $errors.="<li>Tipo non valido</li>";
		if (!preg_match('/^[a-z0-9]{3,12}$/i',$_POST['nome']))        $errors.="<li>Nome non valido</li>";
		if (!preg_match('/^[a-z0-9]{3,12}$/i',$_POST['costruttore']))        $errors.="<li>Costruttore non valido</li>";
		if (!preg_match('/^[0-9]{1,3}$/i',$_POST['velocita']))        $errors.="<li>Velocità non valido</li>";
		if (!preg_match('/^[0-9]{4}$/i',$_POST['anni']))        $errors.="<li>Anni non valido</li>";
		if (!preg_match('/^[a-z0-9]{3,6000}$/i',$_POST['descrizione']))        $errors.="<li>Descrizione non valido</li>";
	
		$_SESSION['fail'].=$errors;
		if(isset($_FILES['myfileupload'])){
			$uploadOk=1;
			$tipoFile=$_FILES['myfileupload']['type'];
			$tipoFile=str_replace("image/","",$tipoFile);
			$target_file = $nome.".".$tipoFile;
			//controlli 
  			$check = getimagesize($_FILES["myfileupload"]["tmp_name"]);
  			if($check !== false) {
    			echo "File is an image - " . $check["mime"] . ".";
    			$uploadOk = 1;
  			} else {
    			echo "File is not an image.";
    			$uploadOk = 0;
			}
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}
			if ($_FILES["myfileuload"]["size"] > 500000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}  
			// Allow certain file formats
			if(($tipo != "jpg") || ($tipo != "jpeg") || ($tipo != "png")) {
				echo "Sorry, only JPG.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			  // if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES['myfileupload']['tmp_name'], "../uploads/".$target_file)){
					addTreno($_POST,$connessione);
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
  			}
		}
	}
	//importazione txt
	$final = file_get_contents("../txt/AggiungiPagina.html");
	$header=file_get_contents("../txt/Header.html");
	$footer=file_get_contents("../txt/Footer.html");
	//sostituzione variabili di sostituzione
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
