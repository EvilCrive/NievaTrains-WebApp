<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
//apertura connessione
$connessione=new DBAccess();
try{
	if(!$connessione->openConnectionLocal()) throw new Exception("No connection");

	//estrazioni variabili dalla get(id ricetta)
	if(isset($_GET["Id_Ricetta"])) {
		$ID=$_GET["Id_Ricetta"];
	//getquery ricetta(id)
		$ricetta=$connessione->getQuery("SELECT * FROM ricetta WHERE Id_Ricetta=$ID;");
		$prefe=$connessione->getQuery("SELECT count(*) FROM Preferiti WHERE Id_Ricetta=$ID;");
	//getquery commenti(id)
		$commenti=$connessione->getQuery("SELECT U.Nome, U.Cognome, U.Nome_Immagine, C.Testo, C.Data, C.Numero_Like FROM commento as C JOIN Utente AS U ON C.Id_Utente=U.Id_Utente WHERE C.Id_Ricetta=$ID;");
	//getquery correlate(categoria)
		$cat=$ricetta[0]['Macro_Categoria'];
		$correlate=$connessione->getQuery("SELECT * FROM ricetta WHERE Macro_Categoria='$cat';");
	//file html
		$finale = file_get_contents("../txt/Ricetta.html");

	//sostituzioni:
		$finale=str_replace("%%Breadcrumb",stampaBreadcrumb($ricetta),$finale);
		$finale=str_replace("%%Titolo",stampaNome($ricetta),$finale);
		$finale=str_replace("%%Voto",stampaVoto($ricetta),$finale);
		$finale=str_replace("%%Preferiti",stampaPreferiti($prefe),$finale);
		$finale=str_replace("%%Immagine",stampaImmagineRicetta($ricetta),$finale);
		$finale=str_replace("%%Informazioni",stampaInformazioni($ricetta),$finale);
		$finale=str_replace("%%Ingredienti",stampaIngredienti($ricetta),$finale);
		$finale=str_replace("%%Introduzione",stampaIntroduzione($ricetta),$finale);
		$finale=str_replace("%%PassoPasso",stampaPassoPasso($ricetta),$finale);
		$finale=str_replace("%%RicettaEstesa",stampaRicettaEstesa($ricetta),$finale);
		$finale=str_replace("%%Commenti",stampaCommenti($commenti),$finale);
		$finale=str_replace("%%Ricette",stampaRicette($correlate),$finale);
		$finale=str_replace("%%idricetta",$ID,$finale);
		$finale=str_replace("%%login",$_SESSION['login'],$finale);
		

	//echo dell'html finale
		echo $finale;
	}
	else {
		throw new Exception("No parameter get");
	}
	$connessione->closeConnection();
}catch(Exception $eccezione){
	echo file_get_contents('../txt/ErroreRicette.html'); 
	$connessione->closeConnection();
}
?>