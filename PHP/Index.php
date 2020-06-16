<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
//apertura connessione
$connessione=new DBAccess();
try{
	if(!$connessione->openConnectionLocal()) throw new Exception("No connection");

	//getquery consigliate
	$consigliate=$connessione->getQuery("SELECT R.Descrizione_Immagine, R.Nome_Immagine, R.Id_Ricetta, R.Macro_Categoria, R.Nome, count(V.Voto) AS Numero_Voti
									FROM Ricetta AS R JOIN Voto AS V ON R.Id_Ricetta=V.Id_Ricetta
									GROUP BY R.Nome
									ORDER BY Numero_Voti DESC;");
	$connessione->closeConnection();
	//generazione numero random
	$num=rand(0,sizeof($consigliate)-1);

	//file html	
	$finale = file_get_contents("../txt/Index.html");
	//sidemenu user
	if(isset($_SESSION['login'])){
		if($_SESSION['login'])	$divusermenu='<div id="myUserSideNav" class="sidenav"><a href="javascript:void(0)" class="closebtn" onclick="closeUserNav()">&times;</a><ul><li><a href="../PHP/UserManage.php?request=1">Profilo</a></li><li><a href="../PHP/UserManage.php?request=2">Logout</a></li></ul></div>';
		else	$divusermenu="";
	}else{
		$divusermenu="";
	}
	$finale=str_replace("%%utente",$divusermenu,$finale);
		//sostituzioni:

	$finale=str_replace("%%Speciale",stampaSpeciale($consigliate[$num]),$finale);
	$finale=str_replace("%%Ricette",stampaRicette($consigliate),$finale);
	//echo dell'html finale
	echo $finale;
}catch(Exception $eccezione){
	echo $eccezione;
	$connessione->closeConnection();
}
?>