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
	<title> Primi - OrangeTango</title>
	<!-- Titolo esteso dentro un meta -->
	<meta name="title" content="Primi piatti - OrangeTango" />
	<!-- Descrizione del sito -->
	<meta name="description" content="Tutte le ricette tra i Primi " />
	<!-- Keyword principali del sito -->
	<meta name="keywords" content="OrangeTango, informazioni, primi, riso, pasta" />
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
			<div id="breadcrumb">
				<ul>
					<li>Ti trovi in: <span xml:lang="en"><a href="./home.html">Home</a></span> -&gt; Primi</li>
					<li class="stayright"><a href="#">Vai al Contenuto</a></li>
				</ul>
			</div>
	<!--END TOP OF THE PAGE-->
	<!--START PAGE CONTENT-->
  <div id="content">
		<div id="intro" class="clear">
			<h2>Primi</h2>
		</div>
		<div class="row clear">
			<h3>Qualcosa in più:</h3>
			<p>Un primo piatto è un piatto in genere a base di riso o pasta che viene consumato all'inizio del pasto, ma che può essere, a volte, preceduto da uno o più antipasti. Non necessariamente la portata che costituisce
				il primo piatto è asciutta, anzi spesso vengono servite come primo preparazioni brodose quali zuppe o minestre, da consumarsi con il cucchiaio ed in genere basate in tutto o in parte su legumi e verdure</p>
			</div>
			<div id="sottocategoriaData" class="row clear">
				<h3>SOTTOCATEGORIE:</h3>
					<ul>
						<li>
							<h4>Pasta</h4>
							<p>La pasta, intesa come pasta alimentare, è un prodotto a base di farina di diversa estrazione, tipico delle varie cucine regionali d'Italia, divisa in piccole forme regolari destinate alla cottura in acqua... <a href="#">Scopri di più</a></p>
						</li>
						<li>
							<h4>Risotti</h4>
							<p>Il risotto è un primo piatto tipico della cucina italiana, originario della Lombardia poi diffusosi in tutto il nord Italia e oggi diffuso in numerose versioni in tutto il paese. La sua caratteristica principale... <a href="#">Scopri di più</a></p>
						</li>
						<li>
							<h4>Zuppe</h4>
							<p>Per "zuppe" si intendono minestre in brodo preparate con ingredienti e in modi molto varî, ma servite per lo più con fette o pezzetti di pane tostati o fritti (messi a cuocere insieme o aggiunti all’ultimo... <a href="#">Scopri di più</a></p>
						</li>
					</ul>
				</div>

		<!--PHP start-->
			<h3>Ricette:</h3>
			<?php 
			$result=$ConnessioneAttiva->getQuery("SELECT Descrizione_Immagine, Nome_Immagine, Nome FROM ricetta WHERE Macro_Categoria='Primi';");
			stampaRicerca($result);
			?>
	</div>
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