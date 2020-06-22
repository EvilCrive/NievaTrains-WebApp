
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
		$var.= '		<a href="Ricetta.php?Id_Ricetta='.$results[$i]["Id_Ricetta"].'">'."\n";
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

	$var='<a href="Ricetta.php?Id_Ricetta='.$result["Id_Ricetta"].'">';
	$var.= '<img src="../Database/Ricette/'.$result["Nome_Immagine"].'.jpg" alt="'.$result["Descrizione_Immagine"].'">';
	$var.='</a>';
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
		
	if($bool){
		$var.= '	<h3>Risultato ricerca utenti: </h3>';
	}else{
		$var.= '	<h3>Risultato ricerca ricette:</h3>';
	}
	
	
		$var.= '	<p>"'.$stringa.'"</p> ';
	}
	elseif($bool){
		$var.= '	<h3>Tutti gli utenti</h3>';
	}else{
		$var.= '	<h3>Tutte le ricette</h3>';
	}

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
	return '<img id="userImg" src="../immagini/Utente/'.$results[0]["Nome_Immagine"].'.jpg" alt="'.$results[0]["Nome_Thumbnail"].'"/>';
}
function stampaImmagineRicetta($results) {
	return '<img id="img_ricetta" src="../Database/Ricette/'.$results[0]["Nome_Immagine"].'.jpg" alt="'.$results[0]["Nome_Thumbnail"].'"/>';
}

function stampaFollowers($results) {
	if($results)	$nrisultati=sizeof($results);
	else	$nrisultati=0;
	$var='';
	for($i=0; $i<$nrisultati; $i++) { 
		$var.= '<a href="Utente.php?Id_Utente='.$results[$i]["Id_Utente2"].'"><button class="button2">'.$results[$i]["Username"].'</button></a>'."\n";
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
	$var= '<a href="../PHP/Intermedia.php?Categoria='.$results[0]["Macro_Categoria"].'">'.$results[0]["Macro_Categoria"].'</a>';
	if($results[0]["Categoria"]!=$results[0]["Macro_Categoria"]) $var.= ' -&gt; '.'<a href="../PHP/Intermedia.php?Categoria='.$results[0]["Macro_Categoria"].'">'.$results[0]["Categoria"].'</a>  ';
	$var.='-&gt; '.$results[0]["Nome"];
	
	return $var;
}
function stampaVoto($results,$voto,$ricetta) {
$var= '	<form action="../PHP/preferitiManage.php" class="rating-box" method="post" onsubmit="return Alertunlogged()">';
	//
if($voto){
	$var.=' <p>Voto Medio : '.$voto[0]["ROUND(AVG(Voto),1)"].'/ 5 </p>';
}
$var.=	'<ul class="ratings"><li class="fa fa-star-o"></li><li class="fa fa-star-o"></li><li class="fa fa-star-o"></li><li class="fa fa-star-o"></li><li class="fa fa-star-o"></li></ul><input name="voto" id="rating-value" hidden></input>';
$var.=	'<input name="ricetta" hidden value='.$ricetta.'/><button id="valuta" class="button1"> Valuta </button></form>';
return $var;
}
function stampaPreferiti($results,$ID,$bool) {
	$var='<a href="../PHP/preferitiManage.php?idricetta='.$ID.'">';
	if($bool)	$var.='<p class="fa fa-heart" id="selected" onclick="return Alertunlogged()">&nbsp'.$results[0]["count(*)"].'</p></a>';
	else		$var.='<p class="fa fa-heart" id="unselected" onclick="return Alertunlogged()">&nbsp'.$results[0]["count(*)"].'</p></a>';
	return $var;
}
function stampaInformazioni($results) {
	$var= '<li><span class="infoRic"> Difficoltà :</span> '.$results[0]["Difficoltà"].'</li>'."\n";
	$var.= '<li><span class="infoRic"> Preparazione :</span> '.$results[0]["Tempo_Preparazione"].' minuti</li>'."\n";
	$var.= '<li><span class="infoRic"> Dosi per :</span> '.$results[0]["Dose"].' persone</li>'."\n";
	$var.= '<li><span class="infoRic"> Costo : </span>'.$results[0]["Costo"].'</li>'."\n";
	$var.= '<li><span class="infoRic"> Calorie : </span>'.$results[0]["Calorie"].'</li>'."\n";
	
	return $var;
}
function stampaIntroduzione($results) {
	return '<p>&nbsp;'.$results[0]["Introduzione"].'</p>';
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
					$var.= '<form action="commentManage.php" method="post"><input type="submit" name="button" class="button" value="Elimina"><input name="idricetta" value="'.$results[$i]["Id_Ricetta"].'" hidden></input><input name="idcommento" value="'.$results[$i]["Id_Commento"].'" hidden ></input></form>';
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
		$var.= '			<img id="userImg" src="../immagini/Utente/'.$results[$i]["Nome_Immagine"].'.jpg" alt="'.$results[$i]["Nome_Thumbnail"].'"/>';
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
	return '<form action="../PHP/userManage.php" method="post"><textarea name="bio"></textarea><button class="button">Modifica BIO</button></form>';
}
function stampafollow($user){
	return '<form action="../PHP/userManage.php" method="post"><input hidden name="follow" value="'.$user.'"></input><button class="button" name="submit">Follow</button></form>';
}
function stampaunfollow($user){
	return '<form action="../PHP/userManage.php" method="post"><input hidden name="unfollow" value="'.$user.'"></input><button class="button" name="submit">Unfollow</button></form>';
}




function stampadeleteUtenti($results){
	if($results)	$nrisultati=sizeof($results);
	else	$nrisultati=0;
	$var='';
	for($i=0; $i<$nrisultati; $i++) { 
		$var.= '<p class="onemidem">'.$results[$i]["Username"].'<a href="../PHP/Admin_panel.php?delete=1&name=utente&id='.$results[$i]["Id_Utente"].'"><button class="button3">X</button></a></p>'."\n";
	}
	$var.='<a href="../PHP/Admin_panel.php"><button class="button">TORNA INDIETRO</button></a>';
	return $var;
}

function stampadeleteCommenti($results){
	if($results)	$nrisultati=sizeof($results);
	else	$nrisultati=0;
	$var='';
	for($i=0; $i<$nrisultati; $i++) { 
		$var.= '<div class="orangebord">';
		$var.='<p class="onemidem">'.$results[$i]["Id_Commento"].")  ".$results[$i]["Testo"].'</p>';
		$var.='<p class="oneem">Utente: '.$results[$i]["Username"].'</p><p>Data: '.$results[$i]["Data"].'</p>';
		$var.='<p class="oneem">Ricetta: '.$results[$i]["Nome"].'</p>';
		$var.='<p><a href="../PHP/Admin_panel.php?delete=1&name=commento&id='.$results[$i]["Id_Commento"].'"><button class="button">ELIMINA IL COMMENTO</button></a></p></div>'."\n";
	}
	$var.='<a href="../PHP/Admin_panel.php"><button class="button">TORNA INDIETRO</button></a>';
	return $var;
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


