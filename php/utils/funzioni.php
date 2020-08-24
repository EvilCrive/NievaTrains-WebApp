<?php
require_once "connection.php";
function stampaTrainBox($queryRes) {
	$nrisultati=sizeof($queryRes);
	$var='<div class="row">';
	
	for ($i=0; $i<$nrisultati; $i++){
		$var.='	<div class="card">'."\n";
		$var.='		<div class="card-header">'."\n";
		$var.='			<img class="img-left" src="../uploads/'.$queryRes[$i]["Immagine"].'" alt="">'."\n";
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
		$var.='			<img class="img-left" src="../uploads/'.$queryRes[$i]["Immagine"].'" alt="">'."\n";
		$var.='		</div>'."\n";
		$var.='		<div class="card-body">'."\n";
		$var.='			<ul>'."\n";
		$var.='				<li>Nome: '.$queryRes[$i]["Nome"].'</li>'."\n";
		$var.='				<li>Tipo: '.$queryRes[$i]["Cognome"].'</li>'."\n";
		$var.='				<li>Marca: '.$queryRes[$i]["Username"].'</li>'."\n";
		$var.='				<li>Autore: '.$queryRes[$i]["Mail"].'</li>'."\n";
		$var.='			</ul>'."\n";
		$var.='			<a href="../PHP/Utente.php?Id_Utente='.$queryRes[$i]["Id_Utente"].'" class="btn">Read more</a>'."\n";
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
	if(isset($_SESSION['userType']) && ($_SESSION['id']==$queryRes[$i]["Id_Utente"])){
		$var.=' <form action="utils/operations.php" method="post" class="eliminacommenti">';
		$var.='		<fieldset id="deleteButton">';
		$var.='			<input name="eliminaCommento" type="submit" class="button" value="Elimina"/>';
		$var.='			<input name="idtreno" value="'.$queryRes[$i]["Id_Treno"].'" class="hidden" />';
		$var.='			<input name="dataCommento" value="'.$queryRes[$i]["Data"].'" class="hidden" />';
		$var.='		</fieldset>';
		$var.='</form>';
	}	
	$var.='			<div class="commentInfo">';
	$var.='				<a href="../php/Utente.php?Id_Utente='.$queryRes[$i]["Id_Utente"].'">'.$queryRes[$i]["Username"].'</a>';
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
	$var.='<li>Velocità: '.$queryRes[0]["Velocità_Max"].' Km/h</li>'."\n";

	return $var;
}
function stampaPreferiti($nPreferiti) {
	if($nPreferiti==1) return "1 Like";
	else return $nPreferiti." Likes";
}
function stampaImmagine($queryImmagine) {
	return "../uploads/".$queryImmagine[0]["Immagine"];
}
function stampaInfoUtente($queryRes) {
	if($queryRes[0]["Is_User_Type"]==1) $tmp='"blue"> Utente Esperto';
	else $tmp='"red"> Utente Base';
	$var=$queryRes[0]["Nome"].' '.$queryRes[0]["Cognome"].' (@'.$queryRes[0]["Username"].'),<span class='.$tmp.'</span>';	
	return $var;
}
function stampaEmail($queryRes) {
	return $queryRes[0]["Mail"];
}
function stampaBio($queryRes) {
	return $queryRes[0]["Bio"];
}
function stampaNomeU($queryRes) {
	return $queryRes[0]["Nome"];
}
function stampaUsernameA($queryRes) {
	return '<a href="../php/Utente.php?Id_Utente='.$queryRes["Id_Utente"].'">'.$queryRes["Username"].'</a>';
}
function stampaNomeT($queryRes) {	
	return $queryRes[0]["Nome"];	
}	
function stampaDescT($queryRes) {	
	return $queryRes[0]["Descrizione"];	
}	
function stampaImgT($queryRes) {	
	return $queryRes[0]["Immagine"];	
}	
function stampaCategoriaT($query){	
	return $query[0]["Categoria"];	
}		

function stampaIdAutoreT($query){
	return $query[0]["Id_Autore"];
}
function stampaCostruttoreT($query){
	return $query[0]["Costruttore"];
}
function stampaVelocitaT($query){
	return $query[0]["Velocità_Max"];
}
function stampaAnnoT($query){
	return $query[0]["Anno_Costruzione"];
}
function controlloUploadImmagineUtenti($files,$errors){
	$target_file="";
	if($files['myfile']['error']!==4){
		$tipoFile=$files['myfile']['type'];
		$tipoFile=str_replace("image/","",$tipoFile);
		$target_file=$files['user'].".".$tipoFile;
		//controlli
		$check = getimagesize($files["myfile"]["tmp_name"]);
		if($check == false) {
		  $errors.="<li>File non e' un'immagine.</li>";
		}
		if (file_exists($target_file)) {
		  $errors.="<li>File esiste già.</li>";
		}
		if ($files["myfile"]["size"] > 500000) {
		  $errors.="<li>File troppo grande (in MB).</li>";
		}  
		if(($tipoFile != "jpg") && ($tipoFile != "jpeg") && ($tipoFile != "png")) {
		  $errors.="<li>Formato sbagliato, solo JPG JPEG PNG accettati.</li>";
		}
		if(!$errors){
			if (!move_uploaded_file($files['myfile']['tmp_name'], "../../uploads/Utenti/".$target_file)){
				$errors.="<li>Errore di uploading del file immagine.</li>";
				
			}
		}
	}else{
		$errors.="<li>File assente</li>";
	}
	return $target_file;
}
function controlNuploadAddTreno($post,$files,$connessione){
	$errors="";
	$categorie=$post['categorie'];
	switch($categorie){
		case "1":
			$post['categorie']="Elettrico";
		break;
		case "2":
			$post['categorie']="Vapore";
		break;
		case "3":
			$post['categorie']="Maglev EDS";
		break;
		case "4":
			$post['categorie']="Maglev EMS";
		break;
		case "5":
			$post['categorie']="Diesel";
		break;
		case "6":
			$post['categorie']="Turbina a Gas";
		break;
	}
	$tipo=$post['tipo'];//1 a 6
	switch($tipo){
		case "1":
			$post['tipo']="Alta velocità";
		break;
		case "2":
			$post['tipo']="Lunga Percorrenza";
		break;
		case "3":
			$post['tipo']="Prototipo";
		break;
		case "4":
			$post['tipo']="Intercity";
		break;
		case "5":
			$post['tipo']="Trasporto Locale";
		break;
	}
	if (!preg_match('/^[a-z0-9]{3,12}$/i',$post['nome']))        $errors.="<li>Nome non valido</li>";
	if (!preg_match('/^[a-z0-9]{3,12}$/i',$post['costruttore']))        $errors.="<li>Costruttore non valido</li>";
	if (!preg_match('/^[0-9]{1,3}$/i',$post['velocita']))        $errors.="<li>Velocità non valida</li>";
	if (!preg_match('/^[0-9]{4}$/i',$post['anni']))        $errors.="<li>Anno non valido</li>";
	if (!preg_match('/.{10,}/i',$post['descrizione']))        $errors.="<li>Descrizione non valida</li>";
	if($files['myfileupload']['error']!==4){
		$tipoFile=$files['myfileupload']['type'];
		$tipoFile=str_replace("image/","",$tipoFile);
		$target_file = $post['nome'].".".$tipoFile;
		//controlli 
		  $check = getimagesize($files["myfileupload"]["tmp_name"]);
		  if($check == false) {
			$errors.="<li>File non e' un'immagine.</li>";
		}
		if (file_exists($target_file)) {
			$errors.="<li>File esiste già.</li>";
		}
		if ($files["myfileupload"]["size"] > 500000) {
			$errors.="<li>File troppo grande (in MB).</li>";
		}  
		if(($tipoFile != "jpg") && ($tipoFile != "jpeg") && ($tipoFile != "png")) {
			$errors.="<li>Formato sbagliato, solo JPG JPEG PNG accettati.</li>";
		}
		if (!$errors) {
			if (move_uploaded_file($files['myfileupload']['tmp_name'], "../uploads/".$target_file)){
				addTreno($post,"Treni/".$target_file,$connessione);
			} else {
				$errors.="<li>Errore di uploading del file.</li>";
			}
		  }
	}else	$errors.="<li>Aggiungi un file come immagine del treno.</li>";
	return $errors;
}

function controlNmodifyTreno($post,$connessione){
	$errors="";
	$categorie=$post['categorie'];
	switch($categorie){
		case "1":
			$post['categorie']="Elettrico";
		break;
		case "2":
			$post['categorie']="Vapore";
		break;
		case "3":
			$post['categorie']="Maglev EDS";
		break;
		case "4":
			$post['categorie']="Maglev EMS";
		break;
		case "5":
			$post['categorie']="Diesel";
		break;
		case "6":
			$post['categorie']="Turbina a Gas";
		break;
	}
	$tipo=$post['tipo'];//1 a 6
	switch($tipo){
		case "1":
			$post['tipo']="Alta velocità";
		break;
		case "2":
			$post['tipo']="Lunga Percorrenza";
		break;
		case "3":
			$post['tipo']="Prototipo";
		break;
		case "4":
			$post['tipo']="Intercity";
		break;
		case "5":
			$post['tipo']="Trasporto Locale";
		break;
	}
	if (!preg_match('/^[a-z0-9]{3,12}$/i',$post['nome']))        $errors.="<li>Nome non valido</li>";
	if (!preg_match('/^[a-z0-9]{3,12}$/i',$post['costruttore']))        $errors.="<li>Costruttore non valido</li>";
	if (!preg_match('/^[0-9]{1,3}$/i',$post['velocita']))        $errors.="<li>Velocità non valida</li>";
	if (!preg_match('/^[0-9]{4}$/i',$post['anni']))        $errors.="<li>Anno non valido</li>";
	if (!preg_match('/.{10,}/i',$post['descrizione']))        $errors.="<li>Descrizione non valida</li>";
	if(!$errori)	updateTreno($post,$connessione);
	return $errors;
}

function controlliSignup($post,$errors,$connessione){
	$email=$post['email'];
	$nome=$post['nome'];
	$cognome=$post['cognome'];
	$username=$post['username'];
	$password=$post['password'];
	$conferma_password=$post['conferma_password'];

	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))     	$errors.="<li>Email non valida</li>";
    if (!preg_match('/^[a-z0-9]{6,12}$/i',$password))   	$errors.="<li>Password non valida</li>";
	if (!preg_match('/^[a-z0-9]{6,12}$/i',$username))       $errors.="<li>Username non valido</li>";
	if (!preg_match('/^[a-z0-9]{3,12}$/i',$nome))           $errors.="<li>Nome non valido</li>";
	if (!preg_match('/^[a-z0-9]{3,12}$/i',$cognome))        $errors.="<li>Cognome non valido</li>";
	if (($_POST['conferma_password']!=$_POST['password']))	$errors.="<li>Password e confermaPassword sbagliate</li>";
	if(checkUtente($email,$username, $connessione))			$errors.="Questo utente e' gia' registrato.";
	return $errors;
}
function controlliLogin($post,$errors,$connessione){
	$email=$post['email'];
	$password=$post['password'];
	$email=filter_var($email,FILTER_SANITIZE_EMAIL);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL) || (!preg_match('/^(\w)+@(\w{3,10})+.(\w{2,3})$/',$email)))     $errors.="<li>Email non valida</li>";
	if (!preg_match('/^[a-z0-9]{6,12}$/i',$password))   $errors.="<li>Password non valida</li>";
	if(!checkLoginUtente($email,$password, $connessione))	$errors.="Email o Password sbagliati.";
	return $errors;
}
function functionMenuUser($session,$final){
	if(isset($session['id'])){
		$var='
		<img id="utenteTop" src="../resources/conductor.png" alt="Area riservata" onclick="openMenuUser()"/>
';
	
	}else	$var='<a href="../php/LogIn.php"><img id="utenteTop" src="../resources/conductor.png" alt="Area riservata"/></a>';
	return $final=str_replace("##user##",$var,$final);
}

?>