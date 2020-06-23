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
	<title> Home - OrangeTango</title>
	<!-- Titolo esteso dentro un meta -->
	<meta name="title" content="Home, pagina iniziale di OrangeTango" />
	<!-- Descrizione del sito -->
	<meta name="description" content="Ricette per ogni tipologia, con descrizione e riassunto...veloci e adatte a tutti." />
	<!-- Keyword principali del sito -->
	<meta name="keywords" content="OrangeTango, home, cucina, inizio, ricette" />
	<meta name="author" content="Alberto Crivellari, Matteo Brosolo, Francesco Bugno, Marco Barbaresco" />
	 

	<link media="handheld,screen" rel="stylesheet" type="text/css" href="../CSS/css_desktop.css" />
	<link media="handheld,screen and (max-width:720px)  " rel="stylesheet" type="text/css" href="../CSS/css_mobile.css"/>
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
				<a href="../HTML/Registrazione.html"><img id="user_logo" src="../immagini/account.png" alt="user logo"/></a>
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
					<li><a href="" target="_top">Secondi</a></li>
					<li><a href="" target="_top">Dolci</a></li>
					<li class="stayright"><a href="" target="_top">About</a></li>
				<ul>
			</div>
		</div>
	<!--breadcrumb-->
		<div id="breadcrumb">
			<ul>
				<li>Ti trovi in: <span xml:lang="en" lang="en"><a href="./home.html">Home</a></span></li>
				<li class="stayright"><a href="#content">Vai al Contenuto</a></li>
			</ul>
		</div>
	<!--END TOP OF THE PAGE-->
	<!--START PAGE CONTENT-->
	<div id="content">
<div id="intro" class="clear">
		<h2>La Ricetta del giorno</h2>
</div>

	<div id="ricettaGiorno">
		      	<img src="../Database/Ricette/immagini base/antipasti_crocchette.jpg" alt="Crocchette di patate">
					<div id="textGiorno">
						<h2>Antipasti</h2>
						<p>Crocchette di Patate</p>
					</div>
	</div>
		<!--PHP start-->
		<div id="searchwrapper">
			<div id="search">
				<input type="text" placeholder="Cerca ricette e utenti">
				<button class="button" name="cerca">Cerca</button>
			</div>
		</div>
		<!--PHP end-->
		<!--PHP start-->
		<h2>Lasciati ispirare</h2>

			<?php 
			$result=$ConnessioneAttiva->getQuery("SELECT R.Descrizione_Immagine, R.Nome_Immagine, R.Nome,count(V.Voto) AS Numero_Voti
				FROM Ricetta AS R JOIN Voto AS V ON R.Id_ricetta=V.Id_ricetta
				GROUP BY R.Nome
				ORDER BY Numero_Voti DESC;");
			stampaRicerca($result);
			?>
		  <a href="#">Scopri di più..</a>

		  <!--PHP end-->
			<h2>In Orange Tango puoi..</h2>
		  <div id="flex-funzionalita">
				<div class="funzionalitaBox">
					<p>Trovare ricette di cibi da ogni parte del mondo</p>
				</div>
				<div class="funzionalitaBox">
					<p>Seguire gli altri utenti e sfidarli a chi ha più punti</p>
				</div>
				<div class="funzionalitaBox">
					<p>Votare le ricette per farci sapere quali preferisci</p>
				</div>
				<div class="funzionalitaBox">
					<p>Mettere mi piace ai commenti degli altri utenti</p>
				</div>
				<div class="funzionalitaBox">
					<p>Seguire i tuoi amici: basta cliccare sul tasto "Segui"</p>
				</div>
				<div class="funzionalitaBox">
					<p>Scalare la classifica e diventare uno dei Top Fan</p>
				</div>
		</div>
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
			<li><a href="http://www.facebook.com" lang="en">Facebook</a><span>&nbsp;</span><a href="https://www.instagram.com/?hl=it" lang="en">Instagram</a><span>&nbsp;</span><a href="../PHP/About.php" lang="en">About</a></li>
		</ul>
	<div id="validity">
		<img id="htmlvalid" src="../immagini/valid-xhtml10.png" alt="HTML valido" />
		<img id="cssvalid" src="../immagini/vcss-blue.gif" alt="CSS3 valido" />
		<p><a href="../PHP/Admin_panel.php">AdminPanel</a></p>
	</div>
</div>
</body>
</html>
