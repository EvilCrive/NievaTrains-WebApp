<?php
require_once "connection.php";
require_once "stampe.php";
//apertura connessione
$connessione=new DBAccess();
if(!$connessione->openConnectionLocal()) echo 'errore';

if(isset($_GET["Categoria"])) $cat=$_GET["Categoria"];
else $cat="Primi";

//getquery correlate(categoria)
$consigliate=$connessione->getQuery("SELECT Descrizione_Immagine, Nome_Immagine, Nome FROM ricetta WHERE Macro_Categoria='$cat';");
$connessione->closeConnection();
//file html	
$finale=file_get_contents('../txt/'.$cat.'.html');

//sostituzioni:
// %%Ricette(correlate)
$finale=str_replace("%%Ricette",stampaRicette($consigliate),$finale);

//echo dell'html finale
echo $finale;
?>