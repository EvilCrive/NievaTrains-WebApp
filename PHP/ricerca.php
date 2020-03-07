<?php
require_once "connection.php";
require_once "stampe.php";

//apertura connessione
$connessione=new DBAccess();
if(!$connessione->openConnectionLocal()) echo 'errore';

//estrazioni variabili dalla post(stringa cercata)
$passaggio=true;
if(isset($_POST["stringaCercata"])) $stringa=$_POST["stringaCercata"];
else {
	$stringa="";
	$passaggio=false;
}
//getquery ricerca(stringa cercata)
$ricerca=$connessione->getQuery("SELECT Descrizione_Immagine, Nome_Immagine, Nome FROM ricetta WHERE Nome LIKE '%$stringa%' OR Categoria='$stringa';");

//file html	
$finale = file_get_contents("../txt/Ricerca.html");

//sostituzioni:
// %%HeaderRicerca(ricerca)
$finale=str_replace("%%HeaderRicerca",stampaHeaderRicerca($ricerca,$stringa),$finale);
// %%Ricette(ricerca)
$finale=str_replace("%%Ricette",stampaRicette($ricerca),$finale);
// %%Utenti(ricerca)
$finale=str_replace("%%Utenti",stampaUtenti($ricerca),$finale);

//echo dell'html finale
echo $finale;

?>