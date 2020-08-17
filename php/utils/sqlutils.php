<?php
require_once "connection.php";

function getInfoUtente($id, $connessione) {
	return $connessione->getQuery("SELECT Nome, Cognome, Username FROM utenti WHERE Id_Utente=$id");
}
function getEmail($id, $connessione) {
	return $connessione->getQuery("SELECT Mail FROM utenti WHERE Id_Utente=$id");
}
function getBio($id, $connessione) {
	return $connessione->getQuery("SELECT Bio FROM utenti WHERE Id_Utente=$id");
}
function getNomeT($id, $connessione) {
	return $connessione->getQuery("SELECT Nome FROM treni WHERE Id_Treno=$id");
}
function getUsernameA($id, $connessione) {
	return $connessione->getQuery("SELECT U.Id_Utente, T.Id_Autore, T.Id_Treno, U.Username FROM utenti AS U JOIN treni AS T WHERE U.Id_Utente=T.Id_Autore AND T.Id_Treno=$id");
}
function getSchedaT($id, $connessione) {
	return $connessione->getQuery("SELECT Nome, Categoria, Costruttore, Tipo, Velocità_Max, Anni_Costruzione FROM treni WHERE Id_Treno=$id");
}
function getDescT($id, $connessione) {
	return $connessione->getQuery("SELECT Descrizione FROM treni WHERE Id_Treno=$id");
}
function getImgT($id, $connessione) {
	return $connessione->getQuery("SELECT Immagine FROM treni WHERE Id_Treno=$id");
}
/////////////////////////////////////////////////////
function getTrainBoxAutore($id, $connessione) {
	return $connessione->getQuery("SELECT T.Id_Autore, U.Id_Utente, T.Id_Treno, U.Username, T.Nome, T.Categoria, T.Costruttore, T.Immagine FROM treni
	WHERE T.Id_Autore=$id"); 
}
function getTrainBoxRicerca($stringa, $connessione) {//
	return $connessione->getQuery("SELECT T.Id_Autore, U.Id_Utente, T.Id_Treno, U.Username, T.Nome, T.Categoria, T.Costruttore, T.Immagine FROM treni AS T JOIN utenti AS U ON U.Id_Utente=T.Id_Autore
	WHERE T.Nome LIKE '%$stringa%' OR T.Categoria LIKE '%$stringa%' OR T.Costruttore LIKE '%$stringa%';"); 
}
function getUtentiBoxRicerca($stringa, $connessione) {
	return $connessione->getQuery("SELECT Id_Utente, Email, Nome, Username, Cognome, Immagine FROM utenti
	WHERE T.Nome LIKE '%$stringa%' OR T.Cognome LIKE '%$stringa%' OR T.Username LIKE '%$stringa%'"); 
}
function getCommenti($id, $connessione) {
	return $connessione->getQuery("SELECT C.Id_Treno, C.Id_Utente, U.Id_Utente, U.Username, C.Testo, C.Data FROM commenti AS C JOIN utenti AS U ON U.Id_Utente=C.Id_Utente
	WHERE C.Id_Treno=$id"); 
}
function getPreferiti($id, $connessione) {
	return $connessione->getQuery("SELECT count(*) FROM preferiti WHERE Id_Treno=$id");
}
function getImmagineUtente($id, $connessione) {
	return $connessione->getQuery("SELECT Immagine FROM utenti WHERE Id_Utente=$id");
}
function getImmagineTreno($id, $connessione) {
	return $connessione->getQuery("SELECT Immagine FROM treni WHERE Id_Treno=$id");
}
?>







