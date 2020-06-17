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
						<li><a href="../PHP/Index.php">Home</a></li>
						<li><a href="../PHP/Intermedia.php?Categoria=Antipasti" target="_top">Antipasti</a></li>
						<li><a href="../PHP/Intermedia.php?Categoria=Primi" target="_top">Primi</a></li>
						<li><a href="../PHP/Intermedia.php?Categoria=Secondi" target="_top">Secondi</a></li>
						<li><a href="../PHP/Intermedia.php?Categoria=Dolci" target="_top">Dolci</a></li>
						<li><a href="../txt/about.html">About</a></li>
					</ul>
			</div>
			<img id="hamburger" src="../immagini/hamburger.png" alt="menu hamburger" onclick="openNav()"/>
				<a href="../txt/Index.html"><img id="logo_head" src="../immagini/logo.png" alt="logo orange tango"/></a>
				<img id="user_logo" src="../immagini/account.png" alt="user logo" onclick="openUserNav()"/>
				<form class="topnav" action="../PHP/ricerca.php" method="post">
		 			<input type="text" placeholder="Cerca ricette e utenti" type="text" name="stringaCercata" />
					<button class="button" name="cerca">Cerca</button>
				</form>
			</div>
				<!--seconda riga header-->
		  <div id="hrow_2">
				<ul id="menuList">
					<li><a href="../PHP/Index.php" target="_top">Home</a></li>
					<li><a href="../PHP/Intermedia.php?Categoria=Antipasti" target="_top">Antipasti</a></li>
					<li><a href="../PHP/Intermedia.php?Categoria=Primi" target="_top">Primi</a></li>
					<li><a href="../PHP/Intermedia.php?Categoria=Secondi" target="_top">Secondi</a></li>
					<li><a href="../PHP/Intermedia.php?Categoria=Dolci" target="_top">Dolci</a></li>
					<li class="stayright"><a href="../txt/about.html" target="_top">About</a></li>
				<ul>
			</div>
		</div>
	<!--breadcrumb-->
		<div id="breadcrumb">
			<ul>
				<li>Ti trovi in : ERRORE </li>
				<li class="stayright"><a href="#content">Vai al Contenuto</a></li>
			</ul>
		</div>

		<div class="parent-content">
    		<div class="text-content">
					<img id="img-404" src="../immagini/img404error.png" alt="Errore 404" />
      			<h1>Ops! Pagina non trovata.</h1>
      			<h2> Errore 404 </h2>
						<a href="../txt/Index.html"> Torna alla <span xml:lang="en">Home</span></a>
    		</div>
		</div>

		<div id="tornasu">
			<a href="#content"><img id="logo_freccia" src="../immagini/tornasu.png" alt="arrow_up" /></a>
		</div>

	<div id="footer">
	<div id="LogoFooter">
		<img src="../immagini/logo.png" alt="logo orange tango" id="logoImg" />
	</div>
		<ul>
			<li>&copy; 2019 Orange Tango Inc.</li>
			<li><a href="http://www.facebook.com" lang="en">Facebook</a><span>&nbsp;</span><a href="http://wwww.instagram.com" lang="en">Instagram</a><span>&nbsp;</span><a href="../txt/about.html" lang="en">About</a></li>
		</ul>
	<div id="validity">
		<img id="htmlvalid" src="../immagini/valid-xhtml10.png" alt="HTML valido" />
		<img id="cssvalid" src="../immagini/vcss-blue.gif" alt="CSS3 valido" />
	</div>
	</div>
</body>
</html>
