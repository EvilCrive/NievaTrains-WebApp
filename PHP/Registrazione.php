<?php
require_once "connection.php";
require_once "stampe.php";
//apertura connessione
//$connessione=new DBAccess();
//if(!$connessione->openConnectionLocal()) echo 'errore';

//getquery consigliate

//$connessione->closeConnection();
//generazione numero random
//$num=rand(0,sizeof($consigliate)-1);

//file html	
$finale = file_get_contents("../txt/Registrazione.html");
	
//sostituzioni:
//$finale=str_replace("%%Speciale",stampaSpeciale($consigliate[$num]),$finale);
//$finale=str_replace("%%Ricette",stampaRicette($consigliate),$finale);

//echo dell'html finale
echo $finale
?>