<?php
require_once "connection.php";

function getInfoUtente($id) {
	getQuery("SELECT Nome, Cognome, Username FROM utenti WHERE Id_Utente=$id");
}
function getEmail($id) {
	getQuery("SELECT Mail FROM utenti WHERE Id_Utente=$id");
}
function getBio($id) {
	getQuery("SELECT Bio FROM utenti WHERE Id_Utente=$id");
}
function getTrainBox($id) {
	//da aggiungere l'autore
	getQuery("SELECT Id_Treno, Nome, Categoria, Costruttore, Immagine FROM treni WHERE Id_Treno=$id");
}
function getNomeT($id) {
	getQuery("SELECT Nome FROM treni WHERE Id_Treno=$id");
}
function getNomeA($id) {
	getQuery("SELECT Nome FROM utenti WHERE Id_Utente=$idU");
}
function getSchedaT($id) {
	getQuery("SELECT Nome, Categoria, Costruttore, Tipo, Velocità_Max, Anni_Costruzione FROM treni WHERE Id_Treno=$id");
}
function getDescT($id) {
	getQuery("SELECT Descrizione FROM treni WHERE Id_Treno=$id");
}
function getImgT($id) {
	getQuery("SELECT Immagine FROM treni WHERE Id_Treno=$id");
}
function getCommenti($id) {
	getQuery("SELECT Testo, Data FROM commenti WHERE Id_Treno=$id");
}
function getCatRicerca($id) {
	getQuery("SELECT Categoria FROM treni WHERE Id_Treno=$id");
}

?>