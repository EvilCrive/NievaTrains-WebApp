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
	<title> Zuppe - OrangeTango</title>
	<!-- Titolo esteso dentro un meta -->
	<meta name="title" content="Zuppe e Minestre - OrangeTango" />
	<!-- Descrizione del sito -->
	<meta name="description" content="Tutte le ricette tra i Primi " />
	<!-- Keyword principali del sito -->
	<meta name="keywords" content="OrangeTango, informazioni, zuppe, minestre" />
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
					<li><a href="" target="_top">Antipasti</a></li>
					<li class="active"><a href="" target="_top">Primi</a></li>
					<li><a href="" target="_top">Secondi</a></li>
					<li><a href="" target="_top">Dolci</a></li>
					<li class="stayright"><a href="" target="_top">About</a></li>
				<ul>
			</div>
		</div>
	<!--breadcrumb-->
	<!--breadcrumb-->
		<div id="breadcrumb">
			<ul>
				<li>Ti trovi in: <span xml:lang="en" lang="en"><a href="./home.html">Home</a></span> -&gt; Primi -&gt; Zuppe</li>
				<li class="stayright"><a href="#">Vai al Contenuto</a></li>
			</ul>
		</div>
	<!--END TOP OF THE PAGE-->

	<!--START PAGE CONTENT-->
	<div id="content">
		<div id="intro" class="clear">
			<h2>Zuppe</h2>
		</div>
		<div class="row clear">
			<h3>Qualcosa in più:</h3>
			<p>Per "zuppe" si intendono minestre in brodo preparate con ingredienti e in modi molto varî, ma servite per lo più con fette o pezzetti di pane tostati o fritti (messi a cuocere insieme o aggiunti all’ultimo momento)</p>
			<p>Le zuppe sono una preparazione del cibo che ha larga diffusione. Per la sua gradevolezza al palato, per la sua relativa maggior economicità e digeribilità rispetto ai piatti a base di carne si è largamente diffusa anche in altri paesi europei e nordamericani. A ciò hanno contribuito la presenza all'estero degli emigrati, le positive esperienze dei turisti che hanno visitato l'Italia e un grande miglioramento delle tecniche di cucina che le nuove generazioni di cuochi e ristoratori di scuola italiana hanno introdotto (soprattutto negli ultimi 30/40 anni)</p>
		</div>
		<h3>Ricette Simili:</h3>
			<?php 
			$result=$ConnessioneAttiva->getQuery("SELECT Descrizione_Immagine, Nome_Immagine, Nome FROM ricetta WHERE Categoria='Zuppe';");
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
