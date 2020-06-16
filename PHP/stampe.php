
<?php
require_once "connection.php";

function stampaRicette($results) {
	if($results)	$nrisultati=sizeof($results);
	else	$nrisultati=0;
	$var= '<div class="rowconsigliate clear">'."\n";
	$contatore=1;
	for ($i=0; $i<$nrisultati; $i++){
		$var.= '<div class="responsive">'."\n";
		$var.= '	<div class="gallery">'."\n";
		$var.= '		<a target="_blank" href="Ricetta.php?Id_Ricetta='.$results[$i]["Id_Ricetta"].'">'."\n";
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
function stampaHeaderRicerca($results,$stringa,$bool) {
	if($results)	$nrisultati=sizeof($results);
	else	$nrisultati=0;
	$var='<div id="infoBox" class="clear row">';
	$var.= '<div id="ricercatext">';
	if(!$stringa=="") {
		$var.= '	<h3>Ricerca per: </h3>';
		$var.= '	<p>'.$stringa.'</p> ';
	}
	else $var.= '	<h3>Tutte le ricette</h3>';
	$var.= '</div>';
	$var.= '<div id="nrisultati">';
	if($bool){
		$var.= '	<p>'.$nrisultati.' utenti trovati </p>';
	}else{
		$var.= '	<p>'.$nrisultati.' ricette trovate </p>';
	}
	$var.= '</div>';
	$var.='</div>';
	return $var;
}

function stampaUsername($results) {
	return $results[0]["Username"];
}
function stampaNome($results) {
	return $results[0]["Nome"];
}
function stampaImmagineUtente($results) {
	return '<img id="userImg" src="../immagini/'.$results[0]["Nome_Immagine"].'.jpg" alt="'.$results[0]["Nome_Thumbnail"].'"/>';
}
function stampaImmagineRicetta($results) {
	return '<img id="img_ricetta" src="../Database/Ricette/'.$results[0]["Nome_Immagine"].'.jpg" alt="'.$results[0]["Nome_Thumbnail"].'"/>';
}

function stampaFollowers($results) {
	if($results)	$nrisultati=sizeof($results);
	else	$nrisultati=0;
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
	$var= $results[0]["Macro_Categoria"];
	if($results[0]["Categoria"]!=$results[0]["Macro_Categoria"]) $var.= ' -&gt; '.$results[0]["Categoria"].' -&gt; ';
	$var.= ' -&gt; '.$results[0]["Nome"];
	
	return $var;
}
function stampaVoto($results) {
	return '<button class="button1 likes">'.$results[0]["Voto"].'</button>';
}
function stampaPreferiti($results,$ID) {
	return '<a href="../PHP/preferitiManage.php?idricetta='.$ID.'"><button class="button1 prefe">'.$results[0]["count(*)"].'</button></a>';
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
	return '<p>&nbsp;</p>'.trasformaStringaInLista($results[0]["Introduzione"]);
}
function stampaRicettaEstesa($results) {
	return $results[0]["Preparazione"];
}
function stampaPassoPasso($results){
	$stringa=$results[0]["Passo_Passo"];
	return trasformaStringaInLista($stringa);
}
function stampaCommenti($results) {
	if($results)	if($results)	$nrisultati=sizeof($results);
	else	$nrisultati=0;
	else	$nrisultati=0;
	$var='';
	for ($i=0; $i<$nrisultati; $i++){
		$var.= '<li class="comment">'."\n";
		
		$var.= '	<div class="info">'."\n";
		if(isset($_SESSION['login'])){
			if($_SESSION['login']){
				if($_SESSION['id']===$results[$i]["Id_Utente"]){
					$var.= '<form action="commentManage.php" method="post"><input type="submit" name="button" class="minibutton" value="Elimina"><input name="idricetta" value="'.$results[$i]["Id_Ricetta"].'" hidden></input><input name="idcommento" value="'.$results[$i]["Id_Commento"].'" hidden ></input></form>';
				}
			}
		}
		$var.='  	<a href="Utente.php?Id_Utente='.$results[$i]["Id_Utente"].'">'.$results[$i]["Nome"].' '.$results[$i]["Cognome"].'</a>'."\n";
		$var.= '    <span class="data">'.$results[$i]["Data"].'</span>'."\n";
		$var.= '  </div>'."\n";
		$var.= '	<p>'.$results[$i]["Testo"]."\n";
		$var.= '	</li>'."\n";
	
	}
	
	return $var;
}

function stampaInfoBox($testo){
	$var='<div id="infoBox" class="clear row">';
	$var.='	<h2>Non ci sono '.$testo.' corrispondenti ai parametri di ricerca</h2>';
	$var.='</div>';
	
	return $var;
}

function stampaIngredienti($results) { 	
	$stringa=$results[0]["Ingredienti"];
	return trasformaStringaInLista($stringa);
}
function stampaUtenti($results) {
	if($results)	$nrisultati=sizeof($results);
	else	$nrisultati=0;
	$var= '<div class="rowconsigliate clear">'."\n";
	$contatore=1;
	for ($i=0; $i<$nrisultati; $i++){
		$var.= '<div class="responsive">'."\n";
		$var.= '	<div class="gallery">'."\n";
		$var.= '		<a target="_blank" href="Utente.php?Id_Utente='.$results[$i]["Id_Utente"].'">'."\n";
		$var.= '			<img id="userImg" src="../immagini/'.$results[0]["Nome_Immagine"].'.jpg" alt="'.$results[0]["Nome_Thumbnail"].'"/>';
		$var.= '		</a>'."\n";
		$var.= '	<div class="desc">'.$results[$i]["Nome"].' '.$results[$i]["Cognome"].' - @'.$results[$i]["Username"].'</div>'."\n";
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

function stampaEditbio(){
	return '<form action="../PHP/UserManage.php" method="post"><input name="bio"></input><button class="minibutton">Modifica</button></form>';
}
function stampafollow($user){
	return '<form action="../PHP/UserManage.php" method="post"><input hidden name="follow" value="'.$user.'"></input><button class="button" name="submit">Segui</button></form>';


}


function trasformaStringaInLista($stringa){
	$aux=explode("\n",$stringa);
	$var='';
	$var.='<ul>';
  	foreach ($aux as $element) {
		if($element[0]=="$")	$var.='<li class="grassetto">'.substr($element,1).'</li>';
		else	$var.='<li>'.$element.'</li>';
  	}
	$var.='</ul>';
	return $var; 
}

function trasformaStringaInParagrafi($stringa){
	$aux=explode("\n",$stringa);
	$var='';
  	foreach ($aux as $element) {
	
	
  	$var.='<p>'.$element.'</p>';
  	}
	return $var; 
}

?>


