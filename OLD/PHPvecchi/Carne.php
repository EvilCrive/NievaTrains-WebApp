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
	<title> Secondi di Carne - OrangeTango</title>
	<!-- Titolo esteso dentro un meta -->
	<meta name="title" content="Secondi di Carne - OrangeTango" />
	<!-- Descrizione del sito -->
	<meta name="description" content="Tutte le ricette di Carne, secondi piatti. " />
	<!-- Keyword principali del sito -->
	<meta name="keywords" content="OrangeTango, informazioni, secondi, carne" />
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
					<li><a href="" target="_top">Primi</a></li>
					<li class="active"><a href="" target="_top">Secondi</a></li>
					<li><a href="" target="_top">Dolci</a></li>
					<li class="stayright"><a href="" target="_top">About</a></li>
				<ul>
			</div>
		</div>
		<!--breadcrumb-->
			<div id="breadcrumb">
				<ul>
					<li>Ti trovi in: <span xml:lang="en"><a href="./home.html">Home</a></span> -&gt; Secondi -&gt; Carne</li>
					<li class="stayright"><a href="#">Vai al Contenuto</a></li>
				</ul>
			</div>
	<!--END TOP OF THE PAGE-->
	<!--START PAGE CONTENT-->
	<div id="content">
		<div id="intro" class="clear">
			<h2>Carne</h2>
		</div>
		<div class="row clear">
			<h3>Qualcosa in più:</h3>
			<p>Carne è il termine usato comunemente per intendere le parti commestibili degli animali omeotermi, e può comprendere perciò anche gli organi interni, o frattaglie. Nel linguaggio comune e in molte normative il termine esclude i prodotti ittici e della pesca. Comunemente per "pesce" si intende la carne dei pesci.</p>
			<p>Ci sono due aspetti principali che riguardano la qualità delle carni: la "qualità nutrizionale", che è un dato oggettivamente valutabile, e la "qualità organolettica" in parte valutabile oggettivamente e in parte ha valenza solo soggettiva, in quanto dipendente dalla qualità percepita dal consumatore (aroma, succosità, tenerezza e colore). Da quest'ultimo punto di vista, notevoli sono le differenze tra le preferenze degli individui, comprese le preferenze per tagli diversi di carne, magra o grassa, muscolare o frattaglie, metodi di cottura, ecc. Nei paesi industrializzati la domanda di quella che viene identificata come carne di qualità, così come la domanda di particolari qualità per una gamma di prodotti dell'industria di trasformazione della carne, implicano la scelta delle razze, la loro alimentazione e la gestione degli animali con allevamenti intensivi e l'uso di integratori alimentari appositamente formulati, con la tendenza a macellare animali giovani. La domanda di qualità nella maggior parte delle regioni meno sviluppate del mondo è verso prodotti di origine animale di qualsiasi tipo. Gli animali vivono in condizioni di pascoli magri e crescono più lentamente, producendo grandi animali da macello, e la macellazione avviene normalmente su animali molto vecchi. Il risultato è che la carne è meno succosa e di una qualità che è notevolmente diversa da quella dei paesi industrializzati.
			</p>
		</div>
		<h3>Ricette Simili:</h3>
			<?php 
			$result=$ConnessioneAttiva->getQuery("SELECT Descrizione_Immagine, Nome_Immagine, Nome FROM ricetta WHERE Categoria='Carne';");
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