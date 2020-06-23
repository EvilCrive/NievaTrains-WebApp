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
	<title> Risotti - OrangeTango</title>
	<!-- Titolo esteso dentro un meta -->
	<meta name="title" content="Primi piatti di Riso- OrangeTango" />
	<!-- Descrizione del sito -->
	<meta name="description" content="Tutte le ricette tra i Primi di Riso" />
	<!-- Keyword principali del sito -->
	<meta name="keywords" content="OrangeTango, informazioni, primi, riso" />
	<meta name="author" content="Alberto Crivellari, Matteo Brosolo, Francesco Bugno, Marco Barbaresco" />
	 

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
					<li>Ti trovi in: <span xml:lang="en" lang="en"><a href="./home.html">Home</a></span> -&gt; Primi -&gt; Risotti</li>
					<li class="stayright"><a href="#">Vai al Contenuto</a></li>
				</ul>
			</div>
	<!--END TOP OF THE PAGE-->

	<!--START PAGE CONTENT-->
	<div id="content">
		<div id="intro" class="clear">
			<h2>Risotti</h2>
		</div>
		<div class="row clear">
			<h3>Qualcosa in più:</h3>
			<p>Il risotto è un primo piatto tipico della cucina italiana, originario della Lombardia poi diffusosi in tutto il nord Italia e oggi diffuso in numerose versioni in tutto il paese. La sua caratteristica principale è il mantenimento dell'amido, che, gelatinizzatosi a causa della cottura, lega i chicchi tra loro in un composto di tipo cremoso. Tra le varie qualità di riso, ne esistono alcune particolarmente adatte alla preparazione del risotto (Arborio, Baldo, Carnaroli, Maratelli, Rosa Marchetti, Sant'Andrea, Vialone nano). Gli altri ingredienti variano in relazione alla ricetta da preparare. </p>
			<p>C'è una concordanza di massima sulla procedura generale che prevede il preriscaldamento (tostatura) del riso nel tegame con sostanza grassa (burro, olio o altro) e una cottura a fuoco alquanto basso del riso stesso e dell'ingrediente vegetale o animale o misto, che deve essere costantemente seguita, aggiungendo progressivamente il liquido (brodo o succo) necessario a consentire l'assorbimento da parte dei chicchi di riso e la cottura in un costante equilibrio di umidità.</p>
		</div>
		<h3>Ricette Simili:</h3>
			<?php 
			$result=$ConnessioneAttiva->getQuery("SELECT Descrizione_Immagine, Nome_Immagine, Nome FROM ricetta WHERE Categoria='Risotti';");
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