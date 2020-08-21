<?php
require_once "connection.php";

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
function stampaNomeT($queryRes) {
	return $queryRes[0]["Nome"];
}
function stampaNomeU($queryRes) {
	return $queryRes[0]["Nome"];
}
function stampaUsernameA($queryRes) {
	return $queryRes;
}
function stampaDescT($queryRes) {
	return $queryRes[0]["Descrizione"];
}
function stampaImgT($queryRes) {
	return $queryResr[0]["Immagine"];
}


////////////////////////////////////////////////
function stampaTrainBox($queryRes) {
	$nrisultati=sizeof($queryRes);
	$var='<div class="row">';
	
	for ($i=0; $i<$nrisultati; $i++){
		$var.='	<div class="card">'."\n";
		$var.='		<div class="card-header">'."\n";
		$var.='			<img class="img-left" src="'.$queryRes[$i]["Immagine"].'" alt="">'."\n";
		$var.='		</div>'."\n";
		$var.='		<div class="card-body">'."\n";
		$var.='			<ul>'."\n";
		$var.='				<li>Nome: '.$queryRes[$i]["Nome"].'</li>'."\n";
		$var.='				<li>Tipo: '.$queryRes[$i]["Categoria"].'</li>'."\n";
		$var.='				<li>Marca: '.$queryRes[$i]["Costruttore"].'</li>'."\n";
		$var.='				<li>Autore: '.$queryRes[$i]["Username"].'</li>'."\n";
		$var.='			</ul>'."\n";
		$var.='			<a href="../PHP/Treno.php?Id_Treno='.$queryRes[$i]["Id_Treno"].'" class="btn">Read more</a>'."\n";
		$var.='		</div>'."\n";
		$var.='	</div>'."\n";
	}
	
	$var.='</div>'."\n";; 
	
	return $var;
}
function stampaUtentiBox($queryRes) {
	$nrisultati=sizeof($queryRes);
	$var='<div class="row">';
	
	for($i=0; $i<$nrisultati; $i++){
		$var.='	<div class="card">'."\n";
		$var.='		<div class="card-header">'."\n";
		$var.='			<img class="img-left" src="'.$queryRes[$i]["Immagine"].'" alt="">'."\n";
		$var.='		</div>'."\n";
		$var.='		<div class="card-body">'."\n";
		$var.='			<ul>'."\n";
		$var.='				<li>Nome: '.$queryRes[$i]["Nome"].'</li>'."\n";
		$var.='				<li>Tipo: '.$queryRes[$i]["Cognome"].'</li>'."\n";
		$var.='				<li>Marca: '.$queryRes[$i]["Username"].'</li>'."\n";
		$var.='				<li>Autore: '.$queryRes[$i]["Email"].'</li>'."\n";
		$var.='			</ul>'."\n";
		$var.='			<a href="../PHP/Treni.php?Id_Utente='.$queryRes[$i]["Id_Utente"].'" class="btn">Read more</a>'."\n";
		$var.='		</div>'."\n";
		$var.='	</div>'."\n";
	}
	
	$var.='</div>'."\n";; 
	
	return $var;
}
function stampaCommenti($queryRes) {
	$nrisultati=sizeof($queryRes);
	$var="";
	for($i=0; $i<$nrisultati; $i++) {
	$var.='<li class="comment">';
	$var.='		<div class="info">';
	$var.='			<form action="commentManage.php" method="post" class="eliminacommenti">';
	$var.='				<fieldset id="deleteButton">';
	$var.='						<input type="submit" name="button" class="button" value="Elimina" />';
	$var.='						<input  name="idricetta" value="xd" class="hidden" />';
	$var.='						<input name="idcommento" value="xd" class="hidden" />';
	$var.='					</fieldset>';
	$var.='					</form>';
	$var.='			<div class="commentInfo">';
	$var.='				<a href="#">'.$queryRes[$i]["Username"].'</a>';
	$var.='				<span class="data">'.$queryRes[$i]["Data"].'</span>';
	$var.='			</div>';
	$var.='		</div>';
	$var.='		<p>'.$queryRes[$i]["Testo"].'</p>';
	$var.='</li>';
	}
	return $var;
}
function stampaSchedaT($queryRes) {
	$var='<li>Nome: '.$queryRes[0]["Nome"].'</li>'."\n";
	$var.='<li>Marca: '.$queryRes[0]["Costruttore"].'</li>'."\n";
	$var.='<li>Categoria: '.$queryRes[0]["Categoria"].'</li>'."\n";
	$var.='<li>Tipo: '.$queryRes[0]["Tipo"].'</li>'."\n";
	$var.='<li>Velocità: '.$queryRes[0]["Velocità_Max"].'</li>'."\n";

	return $var;
}
function stampaPreferiti($nPreferiti) {
	if($nPreferiti==1) return "1 Like";
	else return $nPreferiti." Likes";
}
function stampaImmagine($queryImmagine) {
	return "../resources/".$queryImmagine[0]["Immagine"].".jpg";
}

?>