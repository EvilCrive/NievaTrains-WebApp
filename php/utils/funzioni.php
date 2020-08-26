<?php
require_once "connection.php";


//RICERCA


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
		$var.='				<li>Categoria: '.$queryRes[$i]["Categoria"].'</li>'."\n";
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


//COMMENTI


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
function stampaCommento($queryRes) {
	$var="";
	$var.='<li class="comment">';
	$var.='		<div class="info">';
	$var.='			<div class="commentInfo">';
	$var.='				<a href="../php/Utente.php?Id_Utente='.$queryRes["Id_Utente"].'">'.$queryRes["Username"].'</a>';
	$var.='				<span class="data">'.$queryRes["Data"].'</span>';
	$var.='			</div>';
	$var.='		</div>';
	$var.='		<p>'.$queryRes["Testo"].'</p>';
	$var.='</li>';
	return $var;
}


//STAMPE TRENI E UTENTI


function stampaSchedaT($queryRes) {
	$var="";
	$var='<li>Nome: '.$queryRes[0]["Nome"].'</li>'."\n";
	$var.='<li>Marca: '.$queryRes[0]["Costruttore"].'</li>'."\n";
	$var.='<li>Categoria: '.$queryRes[0]["Categoria"].'</li>'."\n";
	$var.='<li>Tipo: '.$queryRes[0]["Tipo"].'</li>'."\n";
	$var.='<li>Velocità: '.$queryRes[0]["Velocità_Max"].' Km/h</li>'."\n";

	return $var;
}
function stampaPreferiti($nPreferiti) {
	if($nPreferiti==1) return "1 Like </p>";
	else return $nPreferiti." Likes </p>";
}
function stampaImmagine($queryImmagine) {
	return "../uploads/".$queryImmagine[0]["Immagine"];
}
function stampaInfoUtente($queryRes) {
	if($queryRes[0]["Is_User_Type"]==1) $tmp='"blue"> Utente Esperto';
	else $tmp='"red"> Utente Base';
	$var=$queryRes[0]["Nome"].' '.$queryRes[0]["Cognome"].' (@'.$queryRes[0]["Username"].')<span class='.$tmp.'</span>';	
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


//ADD-MODIFY TRENO


function controlNuploadAddTreno($connessione){
	$errors="";
	$categorie=$_POST['categorie'];
	switch($categorie){
		case "1":
			$_POST['categorie']="Elettrico";
		break;
		case "2":
			$_POST['categorie']="Vapore";
		break;
		case "3":
			$_POST['categorie']="Maglev EDS";
		break;
		case "4":
			$_POST['categorie']="Maglev EMS";
		break;
		case "5":
			$_POST['categorie']="Diesel";
		break;
	}
	$tipo=$_POST['tipo'];//1 a 6
	switch($tipo){
		case "1":
			$_POST['tipo']="Alta velocità";
		break;
		case "2":
			$_POST['tipo']="Lunga Percorrenza";
		break;
		case "3":
			$_POST['tipo']="Prototipo";
		break;
		case "4":
			$_POST['tipo']="Intercity";
		break;
		case "5":
			$_POST['tipo']="Trasporto Locale";
		break;
	}
	if (!preg_match('/^[a-z0-9 ]{3,12}$/i',$_POST['nome']))        $errors.="<li>Nome non valido</li>";
	if (!preg_match('/^[a-z0-9 ()&]{3,12}$/i',$_POST['costruttore']))        $errors.="<li>Costruttore non valido</li>";
	if (!preg_match('/^[0-9]{1,3}$/i',$_POST['velocita']))        $errors.="<li>Velocità non valida</li>";
	if (!preg_match('/^[0-9]{4}$/i',$_POST['anni']))        $errors.="<li>Anno non valido</li>";
	if (!preg_match('/.{10,}/i',$_POST['descrizione']))        $errors.="<li>Descrizione non valida</li>";
	if($_FILES['myfileupload']['error']!==4){
		$tipoFile=$_FILES['myfileupload']['type'];
		$tipoFile=str_replace("image/","",$tipoFile);

		$target_file = trim($_POST['nome']).".".$tipoFile;
		//controlli 
		  $check = getimagesize($_FILES["myfileupload"]["tmp_name"]);
		  if($check == false) {
			$errors.="<li>File non e' un'immagine.</li>";
		}
		if (file_exists($target_file)) {
			$errors.="<li>File esiste già.</li>";
		}
		if ($_FILES["myfileupload"]["size"] > 500000) {
			$errors.="<li>File troppo grande (in MB).</li>";
		}  
		if(($tipoFile != "jpg") && ($tipoFile != "jpeg") && ($tipoFile != "png")) {
			$errors.="<li>Formato sbagliato, solo JPG JPEG PNG accettati.</li>";
		}
		if (!$errors) {
			if (move_uploaded_file($_FILES['myfileupload']['tmp_name'], "../uploads/Treni".$target_file)){
				addTreno("Treni/".$target_file,$connessione);

				header("refresh:0; url=../PHP/Utente.php?Id_Utente=".$_SESSION['id']);
				//refresh treno add $_SESSION['id']
			} else {
				$errors.="<li>Errore di uploading del file.</li>";
			}
		  }
	}else	$errors.="<li>Aggiungi un file come immagine del treno.</li>";
	return $errors;
}
function controlNmodifyTreno($connessione){
	$errors="";
	$categorie=$_POST['categorie'];
	switch($categorie){
		case "1":
			$_POST['categorie']="Elettrico";
		break;
		case "2":
			$_POST['categorie']="Vapore";
		break;
		case "3":
			$_POST['categorie']="Maglev EDS";
		break;
		case "4":
			$_POST['categorie']="Maglev EMS";
		break;
		case "5":
			$_POST['categorie']="Diesel";
		break;
	}
	$tipo=$_POST['tipo'];
	switch($tipo){
		case "1":
			$_POST['tipo']="Alta velocità";
		break;
		case "2":
			$_POST['tipo']="Lunga Percorrenza";
		break;
		case "3":
			$_POST['tipo']="Prototipo";
		break;
		case "4":
			$_POST['tipo']="Intercity";
		break;
		case "5":
			$_POST['tipo']="Trasporto Locale";
		break;
	}

	if (!preg_match('/^[a-z0-9 ]{3,12}$/i',$_POST['nome']))        $errors.="<li>Nome non valido</li>";
	if (!preg_match('/^[a-z0-9 ()&]{3,12}$/i',$_POST['costruttore']))        $errors.="<li>Costruttore non valido</li>";
	if (!preg_match('/^[0-9]{1,3}$/i',$_POST['velocita']))        $errors.="<li>Velocità non valida</li>";
	if (!preg_match('/^[0-9]{4}$/i',$_POST['anni']))        $errors.="<li>Anno non valido</li>";
	if (!preg_match('/.{10,}/i',$_POST['descrizione']))        $errors.="<li>Descrizione non valida</li>";
	if(!$errori){
		updateTreno($connessione);
		header("refresh:0; url=../PHP/Treno.php?Id_Treno=".$_POST['idtreno']);
		//refresh modifica treno $_POST['idtreno']
	}
	return $errors;
}


//CONTROLLI SIGNUP/LOGIN


function controlloUploadImmagineUtenti($errors){
	$target_file="";
	if($_FILES['myfile']['error']!==4){
		$tipoFile=$_FILES['myfile']['type'];
		$tipoFile=str_replace("image/","",$tipoFile);
		$target_file=trim($_FILES['user']).".".$tipoFile;
		//controlli
		$check = getimagesize($_FILES["myfile"]["tmp_name"]);
		if($check == false) {
		  $errors.="<li>File non e' un'immagine.</li>";
		}
		if (file_exists($target_file)) {
		  $errors.="<li>File esiste già.</li>";
		}
		if ($_FILES["myfile"]["size"] > 500000) {
		  $errors.="<li>File troppo grande (in MB).</li>";
		}  
		if(($tipoFile != "jpg") && ($tipoFile != "jpeg") && ($tipoFile != "png")) {
		  $errors.="<li>Formato sbagliato, solo JPG JPEG PNG accettati.</li>";
		}
		if(!$errors){
			if (!move_uploaded_file($_FILES['myfile']['tmp_name'], "../../uploads/Utenti/".$target_file)){
				$errors.="<li>Errore di uploading del file immagine.</li>";
				
			}
		}
	}else{
		$errors.="<li>File assente</li>";
	}
	return $target_file;
}
function controlliSignup($errors,$connessione){
	$email=$_POST['email'];
	$nome=$_POST['nome'];
	$cognome=$_POST['cognome'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$conferma_password=$_POST['conferma_password'];

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
function controlliLogin($errors,$connessione){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$email=filter_var($email,FILTER_SANITIZE_EMAIL);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL) || (!preg_match('/^(\w)+@(\w{3,10})+.(\w{2,3})$/',$email)))     $errors.="<li>Email non valida</li>";
	if (!preg_match('/^[a-z0-9]{6,12}$/i',$password))   $errors.="<li>Password non valida</li>";
	if(!checkLoginUtente($email,$password, $connessione))	$errors.="Email o Password sbagliati.";
	return $errors;
}


// menu utente (header)


function functionMenuUser($final){
	$id="";
	$xd="hidden";
	if(isset($_SESSION['id'])){
		$xd="";
		$var='
		<img id="utenteTop" src="../resources/conductor.png" alt="Area riservata" onclick="openMenuUser()"/>';
		$id=$_SESSION['id'];
	}else	$var='<a href="../php/LogIn.php"><img id="utenteTop" src="../resources/conductor.png" alt="Area riservata"/></a>';
	$final=str_replace("%%user",$id,$final);
	$final=str_replace("%%u%%",$xd,$final);
	return $final=str_replace("##user##",$var,$final);
}


//ADMIN PANEL


function checkAdmin($connessione,$errors){
	$user=$_POST['user'];
	$pin=$_POST['pin'];
	if(!preg_match('/^\w{3,}$/',$user))	$errors.="<li>Errore USER:<ol><li>Minimo 3 caratteri, alfanumerici</li></ol></li>";
	if(!preg_match('/^\w{3,}$/',$pin))		$errors.="<li>Errore USER:<ol><li>Minimo 3 caratteri, alfanumerici</li></ol></li>";
	if(!correctAdmin($connessione))			$errors.="<li>Errore Login: <ol><li>User o PIN sbagliati.</li></ol></li>";
	return $errors;
}
function stampaListaUtenti4AP($results,$op){
	if($results)	$nrisultati=sizeof($results);
	else	$nrisultati=0;
	$var='';
	for($i=0; $i<$nrisultati; $i++) {
		$bool=0;
		if($results[$i]["Is_User_Type"]==1)	$bool=1;	
		if(($op=="PROMOZIONE") && ($bool==0))	$var.= '<p class="card-body">'.$results[$i]["Username"].'<a href="../PHP/AdminPanel.php?AdminOP=1&operation=1&utente='.$results[$i]["Id_Utente"].'" class="button">+</a></p>';
		if(($op=="DECLASSAZIONE") && ($bool==1))	$var.= '<p class="card-body">'.$results[$i]["Username"].'<a href="../PHP/AdminPanel.php?AdminOP=1&operation=2&utente='.$results[$i]["Id_Utente"].'" class="button">-</a></p>';
		if($op=="ELIMINA")		$var.= '<p class="card-body">'.$results[$i]["Username"].'<a href="../PHP/AdminPanel.php?AdminOP=1&operation=3&utente='.$results[$i]["Id_Utente"].'" class="button">X</a></p>';
	}
	$var.='<a href="../PHP/AdminPanel.php?AdminOP=1" class="button">TORNA INDIETRO</a>';
	return $var;
}
function stampaDeleteUtente($id,$connessione){
	$results=getInfoUtente($id,$connessione);
	$var="<p>Vuoi eliminare il seguente Utente:</p><p>".$results[0]['Nome']." ".$results[0]['Cognome']." (@".$results[0]['Username'].')</p><a href="AdminPanel.php?AdminOP=1&operation=3&utente='.$id.'&elimina" class="button">Conferma</a><a href="AdminPanel.php?AdminOP=1&operation=3" class="button">Torna Indietro</a>';
	return $var;
}
function stampaPromozioneUtente($id,$connessione){
	$results=getInfoUtente($id,$connessione);
	$var="<p>Vuoi promuovere a esperto il seguente Utente Base:</p><p>".$results[0]['Nome']." ".$results[0]['Cognome']." (@".$results[0]['Username'].')</p><a href="AdminPanel.php?AdminOP=1&operation=1&utente='.$id.'&promozione" class="button">Conferma</a><a href="AdminPanel.php?AdminOP=1&operation=1" class="button">Torna Indietro</a>';
	return $var;
}
function stampaDeclassazioneUtente($id,$connessione){
	$results=getInfoUtente($id,$connessione);
	$var="<p>Vuoi declassare a base il seguente Utente Esperto:</p><p>".$results[0]['Nome']." ".$results[0]['Cognome']." (@".$results[0]['Username'].')</p><a href="AdminPanel.php?AdminOP=1&operation=2&utente='.$id.'&declassazione" class="button">Conferma</a><a href="AdminPanel.php?AdminOP=1&operation=2" class="button">Torna Indietro</a>';
	return $var;
}
function stampaListaTreni4AP($results){
	if($results)	$nrisultati=sizeof($results);
	else	$nrisultati=0;
	$var='';
	for($i=0; $i<$nrisultati; $i++) {
		$var.= '<p class="card-body">'.$results[$i]["Nome"].'<a href="../PHP/AdminPanel.php?AdminOP=2&treno='.$results[$i]["Id_Treno"].'" class="button">X</a></p>';
	}
	$var.='<a href="../PHP/AdminPanel.php" class="button">TORNA INDIETRO</a>';
	return $var;
}
function stampaDeleteTreno($id,$connessione){
	$results=getInfoTreno($id,$connessione);
	$var="<p>Vuoi eliminare il seguente Treno:</p><ul>".stampaSchedaT($results).'</ul><a href="AdminPanel.php?AdminOP=2&treno='.$results[0]["Id_Treno"].'&delete" class="button stayRight">Conferma</a>';
	return $var;
}
function stampaListaCommenti4AP($results){
	if($results)	$nrisultati=sizeof($results);
	else	$nrisultati=0;
	$var='<div><ul>';
	for($i=0; $i<$nrisultati; $i++) {
		$var.= stampaCommento($results[$i]).'<a href="../PHP/AdminPanel.php?AdminOP=3&commento='.$results[$i]["Id_Commento"].'" class="button">X</a>';
	}
	$var.='</ul></div><a href="../PHP/AdminPanel.php" class="button">TORNA INDIETRO</a>';
	return $var;
}
function stampaDeleteCommento($id,$connessione){
	$results=getInfoCommento($id,$connessione);
	$var="<p>Vuoi eliminare il seguente Commento:</p><ul>".stampaCommento($results[0]).'</ul><a href="AdminPanel.php?AdminOP=3&commento='.$results[0]["Id_Commento"].'&delete" class="button">Conferma</a><a href="../PHP/AdminPanel.php?AdminOP=3" class="button">TORNA INDIETRO</a>';
	return $var;
}

?>