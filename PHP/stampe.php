<?php
require_once "connection.php";


function stampaRicerca($result) {
	$nrisultati=sizeof($result);
	echo '<div class="rowconsigliate clear">'."\n";
	$contatore=1;
	for ($i=0; $i<$nrisultati; $i++){

		$tmp=$result[$i];
		echo '<div class="responsive">'."\n";
		echo '	<div class="gallery">'."\n";
		echo '		<a target="_blank" href="'.$tmp["Nome_Immagine"].'.jpg">'."\n";
		echo '		<img src="../Database/Ricette/'.$tmp["Nome_Immagine"].'.jpg" alt="'.$tmp["Descrizione_Immagine"].'" width="600" height="400">'."\n";
		echo '		</a>'."\n";
		echo '	<div class="desc">'.$tmp["Nome"].'</div>'."\n";
		echo '	</div>'."\n";
		echo '</div>'."\n";
		
		if($contatore%4===0) { //da controllare il caso in cui sono multipli di 4
			echo '</div>'."\n";
			echo '<div class="rowconsigliate clear">'."\n";
		}
	$contatore++;
	}
	echo '</div>'."\n";
	}
	
function stampaVoto($Connessione, $ID) {
	$result=$Connessione->getQuery("SELECT Voto FROM Ricetta WHERE Id_Ricetta=$ID;");
	$tmp=$result[0];
	echo $tmp["Voto"];
}
function stampaPreferiti($Connessione, $ID) {
	$result=$Connessione->getQuery("SELECT count(*) FROM Preferiti WHERE Id_Ricetta=$ID;");
	$tmp=$result[0];
	echo $tmp["count(*)"];
}
function stampaImmagine() {}
function stampaInformazioni($Connessione, $ID) {
	$result=$Connessione->getQuery("SELECT Calorie, Dose, Costo, Difficoltà, Tempo_Preparazione
		FROM Ricetta
		WHERE Id_Ricetta=$ID;");
		$tmp=$result[0];
		echo '<li><i>€ Difficoltà : '.$tmp["Difficoltà"].'</i></li>';
		echo '<li><i>€ Preparazione : '.$tmp["Tempo_Preparazione"].' minuti</i></li>';
		echo '<li><i>€ Dosi per : '.$tmp["Dose"].' persone</i></li>';
		echo '<li><i>€ Costo : '.$tmp["Costo"].'</i></li>';
		echo '<li><i>€ Calorie : '.$tmp["Calorie"].'</i></li>';
}
function stampaIngredienti($Connessione, $ID) { //dovrebbe essere una lista
	$result=$Connessione->getQuery("SELECT Ingredienti FROM Ricetta WHERE Id_Ricetta=$ID;");
	$tmp=$result[0];
	echo $tmp["Ingredienti"];
}
function stampaPasso($Connessione, $ID){
	$result=$Connessione->getQuery("SELECT Passo_Passo FROM Ricetta WHERE Id_Ricetta=$ID;");
	$tmp=$result[0];
	echo $tmp["Passo_Passo"];
}
function stampaCommenti($Connessione, $ID) {
	$result=$Connessione->getQuery("SELECT U.Nome, U.Cognome, U.Nome_Immagine, C.Testo, C.Data, C.Numero_Like FROM Commento as C JOIN Utente AS U ON C.Id_Utente=U.Id_Utente WHERE C.Id_Ricetta=$ID;");
	$nrisultati=sizeof($result);
	for ($i=0; $i<$nrisultati; $i++){
	$tmp=$result[$i];
		echo '<li class="comment">';
        echo '	<div class="info">';
        echo '  	<a href="#">'.$tmp["Nome"].' '.$tmp["Cognome"].'</a>';
        echo '  </div>';
		echo '	<p>'.$tmp["Testo"].'</p>';
		echo '	</li>';
	
	}
	
}
?>