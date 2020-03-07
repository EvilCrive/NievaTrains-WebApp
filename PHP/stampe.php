<?php
require_once "connection.php";

function stampaRicette($results) {
	$nrisultati=sizeof($results);
	$var= '<div class="rowconsigliate clear">'."\n";
	$contatore=1;
	for ($i=0; $i<$nrisultati; $i++){
		$var.= '<div class="responsive">'."\n";
		$var.= '	<div class="gallery">'."\n";
		$var.= '		<a target="_blank" href="'.$results[$i]["Nome_Immagine"].'.jpg">'."\n";
		$var.= '		<img src="../Database/Ricette/'.$results[$i]["Nome_Immagine"].'.jpg" alt="'.$results[$i]["Descrizione_Immagine"].'" width="600" height="400">'."\n";
		$var.= '		</a>'."\n";
		$var.= '	<div class="desc">'.$results[$i]["Nome"].'</div>'."\n";
		$var.= '	</div>'."\n";
		$var.= '</div>'."\n";
		
		if($contatore%4===0) { //da controllare il caso in cui sono multipli di 4
			$var.= '</div>'."\n";
			$var.= '<div class="rowconsigliate clear">'."\n";
		}
	$contatore++;
	}
	$var.= '</div>'."\n";
	
	return $var;
}
function stampaSpeciale($result) {
	$var= '<img src="../Database/Ricette/immagini base/'.$result["Nome_Immagine"].'.jpg" alt="'.$result["Descrizione_Immagine"].'">';
	$var.= '<div id="textGiorno">';
	$var.= '	<h2>'.$result["Macro_Categoria"].'</h2>';
	$var.= '	<p>'.$result["Nome"].'</p>';
	$var.= '</div>';
	
	return $var;
}
function stampaHeaderRicerca($results,$stringa) {
	$var= '<div id="ricercatext">';
	$var.= '	<h3>Ricerca per: '.$stringa.'</h3>';
	$var.= '	<p></p> ';
	$var.= '</div>';
	$var.= '<div id="nrisultati">';
	$var.= '	<p>'.sizeof($results).' risultati </p>';
	$var.= '</div>';
	
	return $var;
}

function stampaUsername($results) {
	return $results[0]["Username"];
}
function stampaNome($results) {
	return $results[0]["Nome"];
}
function stampaImmagine($results) {
	return '<img id="userImg" src="../immagini/'.$results[0]["Nome_Immagine"].'" alt="'.$results[0]["Nome_Thumbnail"].'"/>';
}
function stampaLivelloTopFan($results) {
	$var= '<button class="button2">Livello: '.$results[0]["Livello"].'</button>';
	$var.= '<button class="button2">Top Fan: '.$results[0]["Top_Fan"].'</button>';

	return $var;
}
function stampaFollowers($results) {
	$nrisultati=sizeof($results);
	$var='';
	for($i=0; $i<$nrisultati; $i++) { 
		$var.= '<button class="button2">'.$results[$i]["Username"].'</button>'."\n";
	}
	
	return $var;
}
function stampaNomeCognomeUsernameBio($results) {
    $var= '	<h2>'.$results[0]["Nome"].' '.$results[0]["Cognome"].'</h2>';
    $var.= '	<p>@'.$results[0]["Username"].'</p>';
    $var.= '	<form>';
	$var.= '		<p>'.$results[0]["Bio"].'</p>';
	$var.= '	</form>';
	
	return $var;
}
function stampaBreadcrumb($results) {
	$var= ' -&gt; '.$results[0]["Macro_Categoria"];
	if($results[0]["Categoria"]!=$results[0]["Macro_Categoria"]) $var.= ' -&gt; '.$results[0]["Categoria"].' -&gt; ';
	$var.= ' -&gt; '.$results[0]["Nome"];
	
	return $var;
}
function stampaVoto($results) {
	return '<button class="button1 likes">'.$results[0]["Voto"].'</button>';
}
function stampaPreferiti($results) {
	return '<button class="button1 prefe">'.$results[0]["count(*)"].'</button>';
}
function stampaInformazioni($results) {
	$var= '<li><i>€ Difficoltà : '.$results[0]["Difficoltà"].'</i></li>'."\n";
	$var.= '<li><i>€ Preparazione : '.$results[0]["Tempo_Preparazione"].' minuti</i></li>'."\n";
	$var.= '<li><i>€ Dosi per : '.$results[0]["Dose"].' persone</i></li>'."\n";
	$var.= '<li><i>€ Costo : '.$results[0]["Costo"].'</i></li>'."\n";
	$var.= '<li><i>€ Calorie : '.$results[0]["Calorie"].'</i></li>'."\n";
	
	return $var;
}
function stampaIntroduzione($results) {
	return $results[0]["Introduzione"];
}
function stampaRicettaEstesa($results) {
	return $results[0]["Preparazione"];
}
function stampaPassoPasso($results){
	return $results[0]["Passo_Passo"];
}
function stampaCommenti($results) {
	$nrisultati=sizeof($results);
	$var='';
	for ($i=0; $i<$nrisultati; $i++){
		$var.= '<li class="comment">'."\n";
        $var.= '	<div class="info">'."\n";
        $var.= '  	<a href="#">'.$results[$i]["Nome"].' '.$results[$i]["Cognome"].'</a>'."\n";
        $var.= '  </div>'."\n";
		$var.= '	<p>'.$results[$i]["Testo"].'</p>'."\n";
		$var.= '	</li>'."\n";
	
	}
	
	return $var;
}
function stampaIngredienti($results) { return 'ingredienti';}
function stampaUtenti($results) {} //da fare
?>