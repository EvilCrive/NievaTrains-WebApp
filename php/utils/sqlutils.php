<?php
require_once "connection.php";
//Utenti
function getInfoUtente($id, $connessione) { //1
	$var=$connessione->getQuery("SELECT * FROM utenti WHERE Id_Utente=$id");
	return $var;
}
function checkUtente($mail,$user, $connessione){
	return $connessione->getQuery("SELECT Username,Mail from utenti WHERE Mail=$mail OR Username=$user");
}
function insertUtente($nome,$cognome,$username,$email,$password,$bio,$immagine, $connessione){
	$usertype=0;
	$query = "INSERT INTO utente (Nome,Cognome,Username,Mail,Password,Bio,Is_User_Type,Immagine) VALUES($nome,$cognome,$username,$email,$password,$bio,$usertype,$immagine);";
	return $connessione->exeQuery($query);			
}
function getUserID($email, $connessione){
	return $connessione->getQuery("SELECT Id_Utente AS ID from utenti WHERE Mail='$email'")[0]['ID'];
}
function checkLoginUtente($email,$password, $connessione){
	$query = "SELECT* from utenti WHERE Mail='$email' AND Password='$password';";
	return $connessione->getQuery($query);
}
function getUserNome($email, $connessione){
	return $connessione->getQuery("SELECT Nome from utenti WHERE Mail='$email'")[0]['Nome'];
}
function getUserCognome($email, $connessione){
	return $connessione->getQuery("SELECT Cognome from utenti WHERE Mail='$email'")[0]['Cognome'];
}
function getUserUserName($email, $connessione){
	return $connessione->getQuery("SELECT Username from utenti WHERE Mail='$email'")[0]['Username'];
}
function getUserUserType($email, $connessione){
	return $connessione->getQuery("SELECT Is_User_Type from utenti WHERE Mail='$email'")[0]['Is_User_Type'];
}
function boolLiked($iduser,$idtreno,$connessione){
	return $connessione->getQuery("SELECT * from preferiti WHERE Id_Utente='$iduser' AND Id_Treno='$idtreno'");
}
function removeLike($iduser,$idtreno,$connessione){
	return $connessione->exeQuery("DELETE FROM preferiti WHERE Id_Utente=$iduser AND Id_Treno=$idtreno");
}
function addLike($iduser,$idtreno,$connessione){
	return $connessione->exeQuery("INSERT INTO preferiti (Id_Utente, Id_Treno) VALUES($iduser,$idtreno)");
}
function stampaInfoUtente($queryRes) {
	$var=$queryRes[0]["Nome"]." ".$queryRes[0]["Cognome"]." (@".$queryRes[0]["Username"].")";	
	return $var;
}
function stampaEmail($queryRes) {
	return $queryRes[0]["Mail"];
}
function stampaBio($queryRes) {
	return $queryRes[0]["Bio"];
}
function stampaNomeU($queryRes) {
	return $queryRes[0]["Nome"];
}
function stampaUsernameA($queryRes) {
	return $queryRes;
}
function getUsernameA($id, $connessione) {
	$var=$connessione->getQuery("SELECT U.Id_Utente, T.Id_Autore, T.Id_Treno, U.Username FROM utenti AS U JOIN treni AS T WHERE U.Id_Utente=T.Id_Autore AND T.Id_Treno=$id");
	return $var[0]['Username'];
}
function getUserBio($id,$connessione){
	return $connessione->getQuery("SELECT Bio FROM utenti WHERE Id_Utente='$id'")[0]["Bio"];
}
function updateBio($id,$bio,$connessione){
	return $connessione->exeQuery("UPDATE utenti SET Bio='$bio' WHERE Id_Utente='$id'");
}


//treni


function getInfoTrenoLimit($connessione) { //2
	$var=$connessione->getQuery("SELECT T.Id_Autore, U.Id_Utente, T.Id_Treno, U.Username, T.Nome, T.Categoria, T.Costruttore, T.Immagine FROM treni AS T JOIN utenti AS U ON T.Id_Autore=U.Id_Utente LIMIT 6");
	//if($var=null) throw new Exception("bad query");
	return $var;
}
function getInfoTreno($id, $connessione) { //2
	$var=$connessione->getQuery("SELECT * FROM treni WHERE Id_Treno=$id");
	return $var;
}
function getTrainBoxAutore($id, $connessione) { //3
	$var=$connessione->getQuery("SELECT T.Id_Autore, U.Id_Utente, T.Id_Treno, U.Username, T.Nome, T.Categoria, T.Costruttore, T.Immagine FROM treni AS T JOIN utenti AS U ON T.Id_Autore=U.Id_Utente WHERE T.Id_Autore=$id"); 
	return $var;
}
function getTrainBoxRicerca($stringa, $connessione) { //4//
	$var=$connessione->getQuery("SELECT T.Id_Autore, U.Id_Utente, T.Id_Treno, U.Username, T.Nome, T.Categoria, T.Costruttore, T.Immagine FROM treni AS T JOIN utenti AS U ON U.Id_Utente=T.Id_Autore
	WHERE T.Nome LIKE '%$stringa%' OR T.Categoria LIKE '%$stringa%' OR T.Costruttore LIKE '%$stringa%';"); 
	return $var;
}
function getUtentiBoxRicerca($stringa, $connessione) { //5
	$var=$connessione->getQuery("SELECT Id_Utente, Mail, Nome, Username, Cognome, Immagine FROM utenti AS T
	WHERE T.Nome LIKE '%$stringa%' OR T.Cognome LIKE '%$stringa%' OR T.Username LIKE '%$stringa%'"); 
	return $var;
}
function getCommenti($id, $connessione) { //6
	$var=$connessione->getQuery("SELECT C.Id_Treno, C.Id_Utente, U.Id_Utente, U.Username, C.Testo, C.Data FROM commenti AS C JOIN utenti AS U ON U.Id_Utente=C.Id_Utente
	WHERE C.Id_Treno=$id"); 
	return $var;
}
function stampaNomeT($queryRes) {
	return $queryRes[0]["Nome"];
}
function stampaDescT($queryRes) {
	return $queryRes[0]["Descrizione"];
}
function stampaImgT($queryRes) {
	return $queryRes[0]["Immagine"];
}
function stampaCategoriaT($query){
	return $query[0]["Categoria"];
}
function getPreferiti($id, $connessione) {
	$var=$connessione->getQuery("SELECT count(*) FROM preferiti WHERE Id_Treno=$id"); 
	return $var[0]['count(*)'];
}
function removeTreno($utente,$treno,$connessione){
	return $connessione->exeQuery("DELETE FROM treni WHERE Id_Treno='$treno' AND Id_Autore='$utente'");
}
function removeCommento($user, $treno, $connessione){
	return $connessione->exeQuery("DELETE FROM commenti WHERE Id_Utente='$user' AND Id_Treno='$treno'");
}

?>








