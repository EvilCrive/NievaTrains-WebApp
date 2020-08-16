<?php
require_once "connection.php";
require_once "sqlutils.php";

function stampaHeader(){}
function stampaFooter(){}
function stampaRicerca(){}

function stampaInfoUtente($getParam) {
	$queryRes=getInfoUtente($getParam);
	
	$var=$queryRes["Nome"]." ".$queryRes["Cognome"]." (@".$queryRes["Username"].")";	
	return $var;
}
function stampaEmail($getParam) {
	$queryRes=getEmail($getParam);
	return $queryRes;
}
function stampaBio($getParam) {
	$queryRes=getBio($getParam);
	return $queryRes;
}
function stampaTrainBox($getParam) {
	$queryRes=getTrainBox($getParam);
	
	$var='<div class="row">';
	
	for(i){
		$var.='	<div class="card">'."\n";
		$var.='		<div class="card-header">'."\n";
		$var.='			<img class="img-left" src="'.$queryRes[i]["Immagine"].'" alt="">'."\n";
		$var.='		</div>'."\n";
		$var.='		<div class="card-body">'."\n";
		$var.='			<ul>'."\n";
		$var.='				<li>Nome: '.$queryRes[i]["Nome"].'</li>'."\n";
		$var.='				<li>Tipo: '.$queryRes[i]["Categoria"].'</li>'."\n";
		$var.='				<li>Marca: '.$queryRes[i]["Costruttore"].'</li>'."\n";
		$var.='				<li>Autore: '.$queryRes[i]["Autore"].'</li>'."\n";
		$var.='			</ul>'."\n";
		$var.='			<a href="../PHP/Treni.php?Id_Treno='.$queryRes[i]["Id_Treno"].'" class="btn">Read more</a>'."\n";
		$var.='		</div>'."\n";
		$var.='	</div>'."\n";
	}
	
	$var.='</div>'."\n";; 
	
	return $var;
}
function stampaNomeT($getParam) {
	$queryRes=getNomeT($getParam);	
	return $queryRes;
}
function stampaNomeA($getParam) {
	$queryRes=getNomeA($getParam);
	return $queryRes;
}
function stampaSchedaT($getParam) {
	$queryRes=getSchedaT($getParam);
	
	$var='<li>Categoria: '.$queryRes["Categoria"].'</li>'."\n";
	$var.='<li>Marca: '.$queryRes["Marca"].'</li>'."\n";
	$var.='<li>Tipo: '.$queryRes["Tipo"].'</li>'."\n";
	$var.='<li>Velocità: '.$queryRes["Velocità"].'</li>'."\n";
	$var.='<li>Nome: '.$queryRes["Nome"].'</li>'."\n";
	
	return $var;
}
function stampaDescT($getParam) {
	$queryRes=getDescT($getParam);
	return $queryRes;
}
function stampaImgT($getParam) {
	$queryRes=getImgT($getParam);
	return $queryResr;
}
function stampaCommenti($getParam) {
	$queryRes=getCommenti($getParam)
	$var="";
	for(i) {
	$var.='<li class="comment">'
	$var.='		<div class="info">'
	$var.='			<form action="commentManage.php" method="post" class="eliminacommenti">'
	$var.='				<fieldset id="deleteButton">'
	$var.='						<input type="submit" name="button" class="button" value="Elimina" />'
	$var.='						<input  name="idricetta" value="xd" class="hidden" />'
	$var.='						<input name="idcommento" value="xd" class="hidden" />'
	$var.='					</fieldset>'
	$var.='					</form>'
	$var.='			<div class="commentInfo">'
	$var.='				<a href="#">'.$queryRes[i]["Username"].'</a>'
	$var.='				<span class="data">'.$queryRes[i]["Data"].'</span>'
	$var.='			</div>'
	$var.='		</div>'
	$var.='		<p>'.$queryRes[i]["Testo"].'</p>'
	$var.='</li>'
	}
	return $var
}
function stampaCatRicerca($getParam) {
	$queryRes=getCatRicerca($getParam);
	return $queryRes;
}
?>