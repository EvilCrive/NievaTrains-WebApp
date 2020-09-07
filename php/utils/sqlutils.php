<?php
require_once "connection.php";


//Utenti


function getUserID($email, $connessione){
	return $connessione->getQuery("SELECT Id_Utente AS ID from Utenti WHERE Mail='$email'")[0]['ID'];
}
function getInfoUtente($id, $connessione) { //1
	$var=$connessione->getQuery("SELECT * FROM Utenti WHERE Id_Utente=$id");
	return $var;
}
function getUserNome($email, $connessione){
	return $connessione->getQuery("SELECT Nome from Utenti WHERE Mail='$email'")[0]['Nome'];
}
function getUserCognome($email, $connessione){
	return $connessione->getQuery("SELECT Cognome from Utenti WHERE Mail='$email'")[0]['Cognome'];
}
function getUserUserName($email, $connessione){
	return $connessione->getQuery("SELECT Username from Utenti WHERE Mail='$email'")[0]['Username'];
}
function getUserUserType($email, $connessione){
	return $connessione->getQuery("SELECT Is_User_Type from Utenti WHERE Mail='$email'")[0]['Is_User_Type'];
}
function boolLiked($iduser,$idtreno,$connessione){
	return $connessione->getQuery("SELECT * from Preferiti WHERE Id_Utente='$iduser' AND Id_Treno='$idtreno'");
}


//check e add e remove utente


function checkUtente($mail,$user, $connessione){
		return $connessione->getQuery("SELECT Username,Mail from Utenti WHERE Mail='$mail' OR Username='$user'");
}
function insertUtente($nome,$cognome,$username,$email,$password,$bio,$immagine, $connessione){
	$usertype=0;
	$query = "INSERT INTO Utenti (Nome,Cognome,Username,Mail,Password,Bio,Is_User_Type,Immagine) VALUES('$nome','$cognome','$username','$email','$password','$bio','$usertype','$immagine');";
	return $connessione->exeQuery($query);			
}
function checkLoginUtente($email,$password, $connessione){
	$query = "SELECT* from Utenti WHERE Mail='$email' AND Password='$password';";
	return $connessione->getQuery($query);
}


//operations utenti


function removeLike($iduser,$idtreno,$connessione){
	return $connessione->exeQuery("DELETE FROM Preferiti WHERE Id_Utente=$iduser AND Id_Treno=$idtreno");
}
function addLike($iduser,$idtreno,$connessione){
	return $connessione->exeQuery("INSERT INTO Preferiti (Id_Utente, Id_Treno) VALUES($iduser,$idtreno)");
}

function getUsernameA($id, $connessione) {
	$var=$connessione->getQuery("SELECT U.Id_Utente, T.Id_Autore, T.Id_Treno, U.Username FROM Utenti AS U JOIN Treni AS T WHERE U.Id_Utente=T.Id_Autore AND T.Id_Treno=$id");
	return $var[0];
}
function getUserBio($id,$connessione){
	return $connessione->getQuery("SELECT Bio FROM Utenti WHERE Id_Utente='$id'")[0]["Bio"];
}
function updateBio($id,$bio,$connessione){
	return $connessione->exeQuery("UPDATE Utenti SET Bio='$bio' WHERE Id_Utente='$id'");
}


//treni


function getInfoTrenoLimit($connessione) { //2
	$var=$connessione->getQuery("SELECT T.Id_Autore, U.Id_Utente, T.Id_Treno, U.Username, T.Nome, T.Categoria, T.Costruttore, T.Immagine FROM Treni AS T JOIN Utenti AS U ON T.Id_Autore=U.Id_Utente LIMIT 6");
	//if($var=null) throw new Exception("bad query");
	return $var;
}
function getInfoTreno($id, $connessione) { //2
	$var=$connessione->getQuery("SELECT * FROM Treni WHERE Id_Treno=$id");
	return $var;
}
function getTrainBoxAutore($id, $connessione) { //3
	$var=$connessione->getQuery("SELECT T.Id_Autore, U.Id_Utente, T.Id_Treno, U.Username, T.Nome, T.Categoria, T.Costruttore, T.Immagine FROM Treni AS T JOIN Utenti AS U ON T.Id_Autore=U.Id_Utente WHERE T.Id_Autore=$id"); 
	return $var;
}
function getTrainBoxRicerca($stringa, $connessione) { //4//
	$var=$connessione->getQuery("SELECT T.Id_Autore, U.Id_Utente, T.Id_Treno, U.Username, T.Nome, T.Categoria, T.Costruttore, T.Immagine FROM Treni AS T JOIN Utenti AS U ON U.Id_Utente=T.Id_Autore
	WHERE T.Nome LIKE '%$stringa%' OR T.Categoria LIKE '%$stringa%' OR T.Costruttore LIKE '%$stringa%';"); 
	return $var;
}
function getUtentiBoxRicerca($stringa, $connessione) { //5
	$var=$connessione->getQuery("SELECT Id_Utente, Mail, Nome, Username, Cognome, Immagine FROM Utenti AS T
	WHERE T.Nome LIKE '%$stringa%' OR T.Cognome LIKE '%$stringa%' OR T.Username LIKE '%$stringa%'"); 
	return $var;
}


//operations su treni


function getCommenti($id, $connessione) { //6
	$var=$connessione->getQuery("SELECT C.Id_Treno, C.Id_Utente, U.Id_Utente, U.Username, C.Testo, C.Data FROM Commenti AS C JOIN Utenti AS U ON U.Id_Utente=C.Id_Utente
	WHERE C.Id_Treno=$id"); 
	return $var;
}
function getPreferiti($id, $connessione) {
	$var=$connessione->getQuery("SELECT count(*) FROM Preferiti WHERE Id_Treno=$id"); 
	return $var[0]['count(*)'];
}
function removeCommento($user, $treno,$data,$connessione){
	return $connessione->exeQuery("DELETE FROM Commenti WHERE Id_Utente='$user' AND Id_Treno='$treno' AND Data='$data'");
}
function addCommento($user,$treno,$testo,$connessione){
	$data=date("Y-m-d H:i:s");
	return $connessione->exeQuery("INSERT INTO Commenti (Testo, Data, Id_Utente, Id_Treno) VALUES ('$testo','$data',$user,$treno)");
}
function getInfoCommento($id,$connessione){
	return $connessione->getQuery(
	"SELECT C.Id_Utente, C.Id_Commento, U.Id_Utente, U.Username, C.Testo, C.Data FROM Commenti AS C JOIN utenti AS U ON U.Id_Utente=C.Id_Utente
	WHERE C.Id_Commento=$id");
}


//add-remove-modify treno


function removeTreno($utente,$treno,$connessione){
	return $connessione->exeQuery("DELETE FROM Treni WHERE Id_Treno='$treno' AND Id_Autore='$utente'");
}
function deleteTreno($treno,$connessione){
	return $connessione->exeQuery("DELETE FROM Treni WHERE Id_Treno='$treno'");
}
function addTreno($file,$connessione){
	$id=$_SESSION['id'];$nome=$_POST['nome'];$categorie=$_POST['categorie'];$costruttore=$_POST['costruttore'];$tipo=$_POST['tipo'];$velocita=$_POST['velocita'];$anni=$_POST['anni'];$descrizione=mysqli_real_escape_string($connessione->getConnection(),$_POST['descrizione']); 
	return $connessione->exeQuery("INSERT INTO Treni (Id_Autore,Categoria,Nome,Costruttore,Tipo,Velocità_Max,Anno_Costruzione, Descrizione, Immagine) VALUES('$id','$categorie','$nome','$costruttore','$tipo','$velocita','$anni','$descrizione','$file')");
}
function updateTreno($connessione){
	$idtreno=$_POST['idtreno'];$iduser=$_SESSION['id'];$nome=$_POST['nome'];$categorie=$_POST['categorie'];$costruttore=$_POST['costruttore'];$tipo=$_POST['tipo'];$velocita=$_POST['velocita'];$anni=$_POST['anni'];$descrizione=mysqli_real_escape_string($connessione->getConnection(),$_POST['descrizione']); 
	return $connessione->exeQuery("UPDATE Treni SET Id_Autore='$iduser', Categoria='$categorie', Nome='$nome', Costruttore='$costruttore', Tipo='$tipo', Velocità_Max='$velocita', Anno_Costruzione='$anni', Descrizione='$descrizione' WHERE Id_Treno='$idtreno'");
}


//adminpanel


function correctAdmin($connessione){
	return	$connessione->getQuery("SELECT * FROM Admins WHERE User='".$_POST['user']."' AND Pin='".$_POST['pin']."'");
}
function getAllUtenti($connessione){
	return $connessione->getQuery("SELECT Nome,Cognome,Username,Id_Utente,Is_User_Type FROM Utenti");
}
function deleteUtente($id,$connessione){
	return $connessione->exeQuery("DELETE FROM Utenti WHERE Id_Utente='$id'");
}
function promozioneUtente($id,$connessione){
	$query=$connessione->exeQuery("UPDATE Utenti SET Is_User_Type=1 WHERE Id_Utente='$id'");
	return $query;
}
function declassazioneUtente($id,$connessione){
	$query=$connessione->exeQuery("UPDATE Utenti SET Is_User_Type=0 WHERE Id_Utente='$id'");
	return $query;
}
function getAllTreni($connessione){
	return $connessione->getQuery("SELECT * from Treni");
}
function getAllCommenti($connessione){
	return $connessione->getQuery("SELECT C.Id_Utente, C.Id_Commento, U.Username, C.Data, C.Testo from Commenti AS C JOIN Utenti AS U WHERE U.Id_Utente=C.Id_Utente");
}
function deleteCommento($id,$connessione){
	return $connessione->exeQuery("DELETE FROM Commenti WHERE Id_Commento='$id'");
}


?>








