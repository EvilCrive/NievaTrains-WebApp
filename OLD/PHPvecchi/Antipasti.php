<?php
require_once "connection.php";
require_once "stampe.php";
$ConnessioneAttiva = new DBAccess();
$var=$ConnessioneAttiva->openConnectionlocal();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
	<!-- Specifico il charset -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- Titolo -->
	<title> Antipasti - OrangeTango</title>
	<!-- Titolo esteso dentro un meta -->
	<meta name="title" content="Antipasti - OrangeTango" />
	<!-- Descrizione del sito -->
	<meta name="description" content="Tutte le ricette tra gli Antipasti " />
	<!-- Keyword principali del sito -->
	<meta name="keywords" content="OrangeTango, informazioni, antipasti" />
	<meta name="author" content="Alberto Crivellari, Matteo Brosolo, Francesco Bugno, Marco Barbaresco" />
	<meta charset="UTF-8" />

	<link media="handheld,screen" rel="stylesheet" type="text/css" href="../CSS/css_desktop.css" />
	<link media="handheld,screen and (max-width:720px), only screen and (max-device-width:720px)" rel="stylesheet" type="text/css" href="../CSS/css_mobile.css"/>
	<script src="../JS/menu_hamburger_utente.js"></script>

</head>
<body>
	<!--header-->
		<div id="header">
			<!--prima riga header-->
			<div id="hrow_1">
				<!--MENU -->
			<div id="mySidenav" class="sidenav">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Antipasti</a></li>
						<li><a href="#">Primi</a></li>
						<li><a href="#">Secondi</a></li>
						<li><a href="#">Dolci</a></li>
						<li><a href="#">About</a></li>
					</ul>
			</div>
			<img id="hamburger" src="../immagini/hamburger.png" alt="menu hamburger" onclick="openNav()"/>
				<a href=""><img id="logo_head" src="../immagini/logo.png" alt="logo orange tango"/></a>
				<img id="user_logo" src="../immagini/account.png" alt="user logo"/>
				<form class="topnav" action="../PHP/Ricerca.php" method="post">
		 			<input type="text" placeholder="Cerca ricette e utenti" type="text" name="stringaCercata">
					<button class="button" name="cerca">Cerca</button>
				</form>
			</div>
				<!--seconda riga header-->
		  <div id="hrow_2">
				<ul id="menuList">
					<li><a href="" target="_top">Home</a></li>
					<li class="active"><a href="" target="_top">Antipasti</a></li>
					<li><a href="" target="_top">Primi</a></li>
					<li><a href="" target="_top">Secondi</a></li>
					<li><a href="" target="_top">Dolci</a></li>
					<li class="stayright"><a href="" target="_top">About</a></li>
				<ul>
			</div>
		</div>
		<!--breadcrumb-->
			<div id="breadcrumb">
				<ul>
					<li>Ti trovi in: <span xml:lang="en"><a href="./home.html">Home</a></span> -&gt; Antipasti</li>
					<li class="stayright"><a href="#">Vai al Contenuto</a></li>
				</ul>
			</div>
	<!--END TOP OF THE PAGE-->

	<!--START PAGE CONTENT-->
  <div id="content">
		<div id="intro" class="clear">
			<h2>Antipasti</h2>
		</div>
		<div class="row clear">
			<h3>Qualcosa in più:</h3>
			<p>L'antipasto è una portata consumata all'inizio del pasto e che precede i primi piatti. Corrisponde grosso modo all'hors d'œuvre o entrée francesi e allo starter inglese.
				Si tratta di una preparazione veloce proposta per placare il senso di fame in attesa delle portate principali e quindi probabilisticamente ridurre le porzioni delle stesse. </p>
			<p>Si distinguono in antipasti freddi e caldi, semplici (cioè costituiti da un solo ingrediente di base) e composti (cioè costituiti da più preparazioni assortite). L'antipasto è servito in piccole quantità poiché il suo compito è quello di stuzzicare l'appetito in attesa delle portate principali.
				L'antipasto può essere a base di pesce, verdura, carne o salumi, questi ultimi spesso presenti nell'antipasto all'italiana. Può trattarsi quindi di semplici stuzzichini, tartine, insalate ma anche di preparazioni più complesse. </p>
	<!--PHP start-->
		</div>
		<h3>Ricette:</h3>
			<?php 
			$result=$ConnessioneAttiva->getQuery("SELECT Descrizione_Immagine, Nome_Immagine, Nome FROM ricetta WHERE Macro_Categoria='Antipasti';");
			stampaRicerca($result);
			?>
  </div>

	<!--END PAGE CONTENT-->
<!--Bottone arrow up-->
<div id="tornasu">
	<img id="logo_freccia" src="../immagini/tornasu.png" alt="arrow_up" href="#" />
</div>
<div id="footer">

	<div id="LogoFooter">
		<img src="../immagini/logo.png" alt="logo orange tango" id="logoImg" />
	</div>
		<ul>
			<li>&copy; 2019 Orange Tango Inc.</li>
			<li><a href="" lang="en">Facebook</a><span>&nbsp;</span><a href="" lang="en">Instagram</a><span>&nbsp;</span><a href="" lang="en">About</a></li>
		</ul>
	<div id="validity">
		<img id="htmlvalid" src="../immagini/valid-xhtml10.png" alt="HTML valido" />
		<img id="cssvalid" src="../immagini/vcss-blue.gif" alt="CSS3 valido" />
	</div>
</div>
</body>

</html>