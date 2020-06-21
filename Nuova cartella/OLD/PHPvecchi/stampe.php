<?php
require_once "connection.php";


function stampaRicerca($result) {
	$nrisultati=sizeof($result);
	echo '<div class="rowconsigliate clear">'."\n";
	$contatore=1;
	for ($i=0; $i<$nrisultati; $i++){
		echo '<div class="responsive">'."\n";
		echo '	<div class="gallery">'."\n";
		echo '		<a target="_blank" href="'.$result[$i]["Nome_Immagine"].'.jpg">'."\n";
		echo '		<img src="../Database/Ricette/'.$result[$i]["Nome_Immagine"].'.jpg" alt="'.$result[$i]["Descrizione_Immagine"].'" width="600" height="400">'."\n";
		echo '		</a>'."\n";
		echo '	<div class="desc">'.$result[$i]["Nome"].'</div>'."\n";
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
	echo $result[0]["Voto"];
}
function stampaPreferiti($Connessione, $ID) {
	$result=$Connessione->getQuery("SELECT count(*) FROM Preferiti WHERE Id_Ricetta=$ID;");
	echo $result[0]["count(*)"];
}
function stampaInformazioni($Connessione, $ID) {
	$result=$Connessione->getQuery("SELECT Calorie, Dose, Costo, Difficoltà, Tempo_Preparazione
		FROM Ricetta
		WHERE Id_Ricetta=$ID;");
		echo '<li><i>€ Difficoltà : '.$result[0]["Difficoltà"].'</i></li>'."\n";
		echo '<li><i>€ Preparazione : '.$result[0]["Tempo_Preparazione"].' minuti</i></li>'."\n";
		echo '<li><i>€ Dosi per : '.$result[0]["Dose"].' persone</i></li>'."\n";
		echo '<li><i>€ Costo : '.$result[0]["Costo"].'</i></li>'."\n";
		echo '<li><i>€ Calorie : '.$result[0]["Calorie"].'</i></li>'."\n";
}
function stampaIngredienti($Connessione, $ID) { 
	$result=$Connessione->getQuery("SELECT Ingredienti FROM Ricetta WHERE Id_Ricetta=$ID;");
	echo $result[0]["Ingredienti"];
}
function stampaPasso($Connessione, $ID){
	$result=$Connessione->getQuery("SELECT Passo_Passo FROM Ricetta WHERE Id_Ricetta=$ID;");
	echo $result[0]["Passo_Passo"];
}
function stampaCommenti($Connessione, $ID) {
	$result=$Connessione->getQuery("SELECT U.Nome, U.Cognome, U.Nome_Immagine, C.Testo, C.Data, C.Numero_Like FROM Commento as C JOIN Utente AS U ON C.Id_Utente=U.Id_Utente WHERE C.Id_Ricetta=$ID;");
	$nrisultati=sizeof($result);
	for ($i=0; $i<$nrisultati; $i++){
		echo '<li class="comment">'."\n";
        echo '	<div class="info">'."\n";
        echo '  	<a href="#">'.$result[$i]["Nome"].' '.$result[$i]["Cognome"].'</a>'."\n";
        echo '  </div>'."\n";
		echo '	<p>'.$result[$i]["Testo"].'</p>'."\n";
		echo '	</li>'."\n";
	
	}
}
function stampaImmagine($Connessione, $ID){
	
}
function stampaFollowers($Connessione, $ID) {
	$result=$Connessione->getQuery("SELECT U.Username,F.Id_Utente2
		from utente AS U JOIN Follow AS F ON U.Id_Utente=F.Id_Utente2
		WHERE F.Id_Utente1=$ID;");
	$nrisultati=sizeof($result);
	for($i=0; $i<$nrisultati; $i++) { 
	echo '<a >prova<button class="button2">'.$result[$i]["Username"].'</button></a>'."\n";
	}
}
?>