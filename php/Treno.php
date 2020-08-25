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

	//importazione txt
	$final = file_get_contents("../txt/Treno.html");
	$header=file_get_contents("../txt/Header.html");
	$footer=file_get_contents("../txt/Footer.html");

	//generazione variabili di sostituzione
	$buttonsOperazioni="";
	$commenti="";
	if(!$queryInfoTreno)	throw new Exception("Wrong ID");
	if(!$queryNomeA)	throw new Exception("Errore nel DB, manca l'autore di una pagina");
	if($queryCommenti) $commenti=stampaCommenti($queryCommenti);
	$buttonPreferiti='<form action="../PHP/utils/operations.php" method="post" name="likesForm"><fieldset><label for="like" class="hidden"></label><input class="button" name="like" type="submit" value="';
	if(isset($_SESSION['userType'])){
		if(boolLiked($_SESSION['id'],$id,$connessione))	$buttonPreferiti.="Unlike";
		else	$buttonPreferiti.="Like";
	}else	$buttonPreferiti.="Like";
	$buttonPreferiti.='" /><input name="idtreno" value="'.$id.'" hidden /></fieldset></form>';
	if((isset($_SESSION['userType'])) && ($_SESSION['userType']==1) && ($queryInfoTreno[0]["Id_Autore"]==$_SESSION['id'])){
		$buttonsOperazioni ='<form action="../PHP/utils/operations.php" class="trenoBts" method="post" name="removeForm"><fieldset>';
		$buttonsOperazioni.='<label class="hidden" for="eliminaTreno"></label><input class="button" name="eliminaTreno" type="submit" value="EliminaTreno"/><input hidden  name="idtreno" value="'.$id.'"></fieldset></form>';
		$buttonsOperazioni.='<form action="../PHP/ModificaTreno.php" class="trenoBts" method="post" name="modifyForm"><fieldset><label class="hidden" for="modificaTreno"></label><input class="button" name="modificaTreno" type="submit" value="Modifica"/><input name="idtreno" value="'.$id.'" hidden/></fieldset></form>';
	}

	//sostituzione variabili di sostituzione
	$final=str_replace("##LikeT##",stampaPreferiti($nPreferiti).$buttonPreferiti,$final);
	$final=str_replace("##header##",$header,$final);
	$final=str_replace("##footer##",$footer,$final);	
	$final=str_replace("%%operazionitreno",$buttonsOperazioni,$final);
	$final=str_replace("##ImmagineTreno##",stampaImmagine($queryInfoTreno),$final);
	$final=str_replace("##NomeT##",stampaNomeT($queryInfoTreno),$final);
	$final=str_replace("##SchedaT##",stampaSchedaT($queryInfoTreno),$final);
	$final=str_replace("##DescT##",stampaDescT($queryInfoTreno),$final);
	$final=str_replace("##CategoriaTLink##",stampaCategoriaT($queryInfoTreno),$final);	
	$final=str_replace("##NomeA##",stampaUsernameA($queryNomeA),$final);
	$final=str_replace("##Commenti##",$commenti,$final);
	$final=str_replace("##NumeroT##",$id,$final);
	$final=functionMenuUser($final);
	echo $final;
	
}catch(Exception $eccezione){
	//gestione eccezioni
	if($eccezione="No get" || $eccezione="Wrong ID") header("refresh:0; url=../php/Ricerca.php");
	else echo $eccezione;
}
//chiusura connessione
$connessione->closeConnection();
?>
