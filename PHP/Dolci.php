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
	<title> Dolci - OrangeTango</title>
	<!-- Titolo esteso dentro un meta -->
	<meta name="title" content="Dolci - OrangeTango" />
	<!-- Descrizione del sito -->
	<meta name="description" content="Tutte le ricette di Dolci " />
	<!-- Keyword principali del sito -->
	<meta name="keywords" content="OrangeTango, informazioni, dolci" />
	<meta name="author" content="Alberto Crivellari, Matteo Brosolo, Francesco Bugno, Marco Barbaresco" />
	<meta charset="UTF-8" />

	<link media="handheld,screen" rel="stylesheet" type="text/css" href="../CSS/css_desktop.css" />
	<link media="handheld,screen and (max-width:720px), only screen and (max-device-width:720px)" rel="stylesheet" type="text/css" href="../CSS/css_mobile.css"/>
	<script src="../JS/menu_hamburger.js"></script>

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
				<form class="topnav" action="../PHP/ricerca.php" method="post">
		 			<input type="text" placeholder="Cerca tra le ricette" type="text" name="stringaCercata">
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
					<li class="active"><a href="" target="_top">Dolci</a></li>
					<li class="stayright"><a href="" target="_top">About</a></li>
				<ul>
			</div>
		</div>
	<!--breadcrumb-->
		<div id="breadcrumb">
			<ul>
				<li>Ti trovi in: <span xml:lang="en"><a href="./home.html">Home</a></span>-&gt; Dolci</li>
				<li class="stayright"><a href="#">Vai al Contenuto</a></li>
			</ul>
		</div>
<div id="content">
	<div id="intro" class="clear">
		<h2>Dolci</h2>
	</div>
	<div class="row clear">
		<h3>Qualcosa in più:</h3>
		<p>In cucina il termine dolce si riferisce a qualunque alimento che abbia come componente rilevante lo zucchero o il miele, servito spesso alla fine del pasto come dessert, ma gustato anche a colazione o a merenda.
			Rientrano in questa categoria i prodotti della pasticceria (biscotti, torte e dolci al cucchiaio), della confetteria (come caramelle e marmellata), il gelato e i prodotti a base di cacao, come il cioccolato. </p>
		<p>L'utilizzo dei dolci nella cucina ha visto una notevole espansione negli ultimi quattro secoli, in concomitanza con una maggiore reperibilità di alcuni ingredienti sul mercato, primo fra tutti lo zucchero. L'elemento dolce, infatti, rimase per secoli derivato dalla frutta, dal mosto e soprattutto dal miele, che veniva aggiunto come ingrediente di complemento a molti altri. Il miele viene affiancato intorno all'anno 900 d.C. dallo zucchero di canna, importato come 	spezia dai territori arabi. Solo a partire dal 1500 lo zucchero viene importato dalle Americhe divenendo un ingrediente più comune, al pari del cacao. Lo zucchero di barbabietola renderà l'Europa autonoma nella preparazione di dolci rispetto alle importazioni, tagliando nettamente i costi e dando un impulso considerevole alla produzione dolciaria.</p>

	</div>
			<h3>Ricette:</h3>
			<?php 
			$result=$ConnessioneAttiva->getQuery("SELECT Descrizione_Immagine, Nome_Immagine, Nome FROM ricetta WHERE Macro_Categoria='Dolci';");
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