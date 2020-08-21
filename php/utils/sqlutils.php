<?php
require_once "connection.php";
//Utenti
function getInfoUtente($id, $connessione) { //1
	$var=$connessione->getQuery("SELECT * FROM utenti WHERE Id_Utente=$id");
}
//treni
function getInfoTreno($id, $connessione) { //2
	$var=$connessione->getQuery("SELECT * FROM treni WHERE Id_Treno=$id");
}
function getTrainBoxAutore($id, $connessione) { //3
	$var=$connessione->getQuery("SELECT T.Id_Autore, U.Id_Utente, T.Id_Treno, U.Username, T.Nome, T.Categoria, T.Costruttore, T.Immagine FROM treni AS T JOIN utenti AS U ON T.Id_Autore=U.Id_Utente WHERE T.Id_Autore=$id"); 
}
function getTrainBoxRicerca($stringa, $connessione) { //4
	$var=$connessione->getQuery("SELECT T.Id_Autore, U.Id_Utente, T.Id_Treno, U.Username, T.Nome, T.Categoria, T.Costruttore, T.Immagine FROM treni AS T JOIN utenti AS U ON U.Id_Utente=T.Id_Autore
	WHERE T.Nome LIKE '%$stringa%' OR T.Categoria LIKE '%$stringa%' OR T.Costruttore LIKE '%$stringa%';"); 
}
function getUtentiBoxRicerca($stringa, $connessione) { //5
	$var=$connessione->getQuery("SELECT Id_Utente, Email, Nome, Username, Cognome, Immagine FROM utenti
	WHERE T.Nome LIKE '%$stringa%' OR T.Cognome LIKE '%$stringa%' OR T.Username LIKE '%$stringa%'"); 
}
function getCommenti($id, $connessione) { //6
	$var=$connessione->getQuery("SELECT C.Id_Treno, C.Id_Utente, U.Id_Utente, U.Username, C.Testo, C.Data FROM commenti AS C JOIN utenti AS U ON U.Id_Utente=C.Id_Utente
	WHERE C.Id_Treno=$id"); 
}
//////////////////////////////////////////////////
function getPreferiti($id, $connessione) {
	$var=$connessione->getQuery("SELECT count(*) FROM preferiti WHERE Id_Treno=$id"); 
	return $var[0]['count(*)'];
}
function getUsernameA($id, $connessione) {
	$var=$connessione->getQuery("SELECT U.Id_Utente, T.Id_Autore, T.Id_Treno, U.Username FROM utenti AS U JOIN treni AS T WHERE U.Id_Utente=T.Id_Autore AND T.Id_Treno=$id");
	return $var[0]['Username'];
}
?>








