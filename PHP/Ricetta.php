<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
//apertura connessione
$connessione=new DBAccess();
try{
	if(!$connessione->openConnectionLocal()) throw new Exception("No connection");

	//estrazioni variabili dalla get(id ricetta)
	if(isset($_GET["Id_ricetta"])) {
		$ID=$_GET["Id_ricetta"];
	//getquery ricetta(id)
	$prefebool="";
		if(isset($_SESSION['login'])){
			$iduser=$_SESSION['id'];
			$prefebool=$connessione->getQuery("SELECT * FROM preferiti WHERE Id_Utente='$iduser' AND Id_ricetta='$ID'");
		}
		$ricetta=$connessione->getQuery("SELECT * FROM ricetta WHERE Id_ricetta=$ID;");
		$prefe=$connessione->getQuery("SELECT count(*) FROM preferiti WHERE Id_ricetta=$ID;");

		$voto=$connessione->getQuery("SELECT ROUND(AVG(Voto),1) FROM voto WHERE Id_ricetta=$ID ");
	//getquery commenti(id)
		$commenti=$connessione->getQuery("SELECT U.Id_Utente, U.Nome, U.Cognome, U.Nome_Immagine, C.Id_ricetta, C.Id_Commento, C.Testo, C.Data FROM commento as C JOIN utente AS U ON C.Id_Utente=U.Id_Utente WHERE C.Id_ricetta=$ID ORDER BY C.Data;");
	//getquery correlate(categoria)
		$cat=$ricetta[0]['Macro_Categoria'];
		$correlate=$connessione->getQuery("SELECT * FROM ricetta WHERE Macro_Categoria='$cat';");
	//file html
		$finale = file_get_contents("../txt/Ricetta.html");
	//sidemenu user
		$divusermenu="";
	$ref="";
	if(isset($_SESSION['login'])){
		if($_SESSION['login'])	$divusermenu='<div id="myUserSideNav" class="sidenav"><a href="javascript:void(0)" class="closebtn" onclick="closeUserNav()">&times;</a><ul><li><a href="../PHP/userManage.php?request=1">Profilo</a></li><li><a href="../PHP/userManage.php?request=2">Logout</a></li></ul></div>';
		else	$divusermenu="";
	}else{
		$divusermenu="";
	}
	if($divusermenu===""){
		$ref='<a href="Registrazione.php"><img id="user_logo" src="../immagini/account.png" alt="user logo" onclick="openUserNav()"/></a>';
	}else{
		$ref='<img id="user_logo" src="../immagini/account.png" alt="user logo" onclick="openUserNav()"/>';
		
	}
	$finale=str_replace("%%user",$ref,$finale);
	$finale=str_replace("%%utente",$divusermenu,$finale);
	//sostituzioni:
		$finale=str_replace("%%Breadcrumb",stampaBreadcrumb($ricetta),$finale);
		$finale=str_replace("%%Titolo",stampaNome($ricetta),$finale);
		$finale=str_replace("%%Voto",stampaVoto($ricetta,$voto,$ID),$finale);
		$finale=str_replace("%%Preferiti",stampaPreferiti($prefe,$ID,$prefebool),$finale);
		$finale=str_replace("%%Immagine",stampaImmagineRicetta($ricetta),$finale);
		$finale=str_replace("%%Informazioni",stampaInformazioni($ricetta),$finale);
		$finale=str_replace("%%Ingredienti",stampaIngredienti($ricetta),$finale);
		$finale=str_replace("%%Introduzione",stampaIntroduzione($ricetta),$finale);
		$finale=str_replace("%%PassoPasso",stampaPassoPasso($ricetta),$finale);
		$finale=str_replace("%%RicettaEstesa",stampaRicettaEstesa($ricetta),$finale);
		$finale=str_replace("%%Commenti",stampaCommenti($commenti),$finale);
		$finale=str_replace("%%Ricette",stampaRicette($correlate),$finale);
		$finale=str_replace("%%idricetta",$ID,$finale);
		if(isset($_SESSION['login'])){
			$finale=str_replace("%%login",$_SESSION['login'],$finale);
		}else{
			$finale=str_replace("%%login",0,$finale);
		}
	//echo dell'html finale
		echo $finale;
	}
	else {
		throw new Exception("No parameter get");
	}
	$connessione->closeConnection();
}catch(Exception $eccezione){
	header( "refresh:0; url=../PHP/Errori.php?errore=ricette" ); 	
	$connessione->closeConnection();
}
?>