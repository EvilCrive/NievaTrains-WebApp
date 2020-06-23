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
	<title> Secondi - OrangeTango</title>
	<!-- Titolo esteso dentro un meta -->
	<meta name="title" content="Secondi - OrangeTango" />
	<!-- Descrizione del sito -->
	<meta name="description" content="Tutte le ricette di Secondi Piatti " />
	<!-- Keyword principali del sito -->
	<meta name="keywords" content="OrangeTango, informazioni, secondi, carne, pesce" />
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
					<li>Ti trovi in: <span xml:lang="en" lang="en"><a href="./home.html">Home</a></span> -&gt; Secondi</li>
					<li class="stayright"><a href="#">Vai al Contenuto</a></li>
				</ul>
			</div>
	<!--END TOP OF THE PAGE-->
	<!--START PAGE CONTENT-->
  <div id="content">
		<div id="intro" class="clear">
			<h2>Secondi</h2>
		</div>
		<div class="row clear">
			<h3>Qualcosa in più:</h3>
			<p>Un secondo piatto è un piatto - in genere a base di carne, pesce o uova - consumato dopo che,
				nel corso di un pasto, è stato servito un primo. Alcuni piatti possono fungere a seconda della quantità servita o delle diverse usanze locali da secondo oppure da antipasto</p>
		</div>
			<div id="sottocategoriaData" class="row clear">
	      <h3>SOTTOCATEGORIE:</h3>
				<ul>
	  			<li>
						<h4>Carne</h4>
						<p>Carne è il termine usato comunemente per intendere le parti commestibili degli animali omeotermi, e può comprendere perciò anche gli organi interni, o frattaglie. Nel linguaggio comune e in molte normative il termine... <a href="#">Scopri di più</a></p>
					</li>
					<li>
						<h4>Pesce</h4>
						<p>Con il termine pesce, inteso in senso alimentare, si comprendono gli alimenti derivanti dalla pesca, comprendenti sia l'eterogeneo gruppo dei pesci, sia tutti gli animali marini o di acqua dolce, selvatici o di allevamento... <a href="#">Scopri di più</a></p>
					</li>
	  		</ul>
	    </div>
			<h3>Ricette:</h3>
			<?php 
			$result=$ConnessioneAttiva->getQuery("SELECT Descrizione_Immagine, Nome_Immagine, Nome FROM ricetta WHERE Macro_Categoria='Secondi';");
			stampaRicerca($result);
			?>
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
			<li><a href="" lang="en">Facebook</a><span>&nbsp;</span><a href="" lang="en">Instagram</a><span>&nbsp;</span><a href="" lang="en">About</a></li>
		</ul>
	<div id="validity">
		<img id="htmlvalid" src="../immagini/valid-xhtml10.png" alt="HTML valido" />
		<img id="cssvalid" src="../immagini/vcss-blue.gif" alt="CSS3 valido" />
	</div>
</div>
</body>

</html>