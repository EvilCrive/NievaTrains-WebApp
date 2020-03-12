<?php
require_once "connection.php";
require_once "stampe.php";
//apertura connessione
$connessione=new DBAccess();
try{
	if(!$connessione->openConnectionLocal()) throw new Exception("No connection");

	if(isset($_GET["Categoria"])) {
		$cat=$_GET["Categoria"];

	//getquery correlate(categoria)
		$consigliate=$connessione->getQuery("SELECT Descrizione_Immagine, Nome_Immagine, Nome FROM ricetta WHERE Macro_Categoria='$cat';");
		if(!$consigliate) throw new Exception("Categoria sbagliata");
	//file html	
		$finale=file_get_contents('../txt/'.$cat.'.html');

	//sostituzioni:
	// %%Ricette(correlate)
		$finale=str_replace("%%Ricette",stampaRicette($consigliate),$finale);

	//echo dell'html finale
		echo $finale;
	}
	else {
		throw new Exception("No get");
	}
	$connessione->closeConnection();
}catch(Exception $eccezione){
	header( "refresh:0; url=./Ricerca.php" );
	$connessione->closeConnection();
}
?>