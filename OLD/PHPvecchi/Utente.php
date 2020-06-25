<?php
require_once "connection.php";
require_once "stampe.php";
$connessione = new DBAccess();
$var=$connessione->openConnectionlocal();
$result=$connessione->getQuery("SELECT * from utente WHERE Id_Utente=1;");
$risultati=$result[0];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
	<!-- Specifico il charset -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- Titolo -->
	<title> Matteo Brosolo - OrangeTango</title>
	<!-- Titolo esteso dentro un meta -->
	<meta name="title" content="Matteo Brosolo - profilo utente - OrangeTango" />
	<!-- Descrizione del sito -->
	<meta name="description" content="Profilo dell'utente Matteo Brosolo" />
	<!-- Keyword principali del sito -->
	<meta name="keywords" content="OrangeTango, utenti, matteo, brosolo, informazioni, redazione" />
	<meta name="author" content="Alberto Crivellari, Matteo Brosolo, Francesco Bugno, Marco Barbaresco" />
	 

	<link media="handheld,screen" rel="stylesheet" type="text/css" href="../CSS/css_desktop.css" />
	<link media="handheld,screen and (max-width:720px)" rel="stylesheet" type="text/css" href="../CSS/css_mobile.css"/>
	<script src="../JS/menu_hamburger_utente.js"></script>

<link media="print" rel="stylesheet" type="text/css" href="../CSS/css_print.css" >
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
			<li><a href="" target="_top">Secondi</a></li>
			<li><a href="" target="_top">Dolci</a></li>
			<li class="stayright"><a  class="active" href="" target="_top">About</a></li>
			<ul>
		</div>
	</div>
	<!--breadcrumb-->
	<div id="breadcrumb">
		<ul>
			<li>Ti trovi in: <span xml:lang="en" lang="en"><a href="./home.html">Home</a></span> -&gt; Utenti</li>
			<li class="stayright"><a href="#">Vai al Contenuto</a></li>
		</ul>
	</div>
	<!--END TOP OF THE PAGE-->

<div class="rowUtente clear">
  <div class="leftcolumn">
    <div class="card">
	<?php 
		if(isset($risultati["Nome_Immagine"])) echo '<img id="userImg" src="../immagini/'.$risultati["Nome_Immagine"].'" alt="'.$risultati["Nome_Thumbnail"].'"/>';
		else echo '      <img id="userImg" src="../immagini/account.png" alt="user logo"/>;'
	?>
      <button class="button2">Livello: <?php echo $risultati["Livello"]?></button>
	  <button class="button2">Top Fan: <?php echo $risultati["Top_Fan"]?></button>

    </div>
    <div class="card">
      <h2>Lista Followers</h2>
	  <?php stampaFollowers($connessione,$risultati["Id_Utente"]);?>
	  	<a href="#">Vedi tutti...</a>
  	</div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2><?php echo $risultati["Nome"].' '.$risultati["Cognome"]?></h2>
      <p>@<?php echo $risultati["Username"]?></p>
      <form>
	<?php
		if(isset($risultati["Bio"])) echo '<p>'.$risultati["Bio"].'</p>';
  		else echo '<textarea id="bio">Bio...</textarea>';
	?>
	  </form>
    </div>
    <div class="card">
      <h2>Ricette Preferite </h2>
		<?php 
		$result=$connessione->getQuery("SELECT R.Nome, R.Introduzione, R.Nome_Immagine, R.Descrizione_Immagine
			FROM Preferiti AS P JOIN Ricetta AS R ON P.Id_Ricetta=R.Id_Ricetta
			WHERE P.Id_Utente=1;");
		stampaRicerca($result);
		?>
    <a href="#">Vedi tutte...</a>
  </div>
</div>
</div>
<!--
<div id="content">
  <img src="#" alt="immagine matteo">
  <h1>MATTEO BROSOLO</h1>
  <button type="button" name="button">+Follow</button>
  <div id="badgeLivello">
    <p>Lv 100</p>
  </div>
  <div id="badgeFan">
    <p>Crive</p>
  </div>
  <div id="biografia">
    <h2>Bio</h2>
    <p>bla bla bla bla</p>
  </div>
  <div id="ricetteData">
    <h2>Ricette Preferite:</h2>
    <div class="ricettaBox">
    <img src="#" alt="asd">
    <h3>Riso</h3>
    <p>del riso</p>
    </div>
    <div class="ricettaBox">
    <img src="#" alt="asd">
    <h3>Pasta</h3>
    <p>della pasta</p>
    </div>
    <p>Vedi Tutte</p>
  </div>
  <div id="followersData">
    <h2>Followers</h2>
    <div class="followerBox">
      <img src="" alt="crive">
      <p>Alberto Crivellari</p>
    </div>
    <div class="followerBox">
      <img src="" alt="crive2">
      <p>EvilCrive</p>
    </div>
    <p>Vedi Tutti</p>
  </div>
</div>
-->
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
