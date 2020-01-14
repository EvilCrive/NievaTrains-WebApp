<?php
require_once "connection.php";
$connection = new DBAccess();
$connection->openConnection();

$ricettecercate = $connection->getRicette($_POST['stringaCercata'])


$nrisultati=10;
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
	<!-- Specifico il charset -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- Titolo -->
	<title> Ricerca - OrangeTango</title>
	<meta name="author" content="Alberto Crivellari, Matteo Brosolo, Francesco Bugno, Marco Barbaresco" />
	<meta charset="UTF-8" />

	<link media="handheld,screen" rel="stylesheet" type="text/css" href="../CSS/css_desktop.css" />
	<link media="handheld,screen and (max-width:720px), only screen and (max-device-width:720px)" rel="stylesheet" type="text/css" href="./css/css_mobile.css"/>
	<script src="js/menu_hamburger.js"></script>

</style>

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
				<form class="topnav">
		 			<input type="text" placeholder="Cerca tra le ricette">
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
					<li>Ti trovi in: <span xml:lang="en"><a href="./home.html">Home</a></span> -&gt; Ricerca</li>
					<li class="stayright"><a href="#">Vai al Contenuto</a></li>
				</ul>
			</div>
<!--END TOP OF THE PAGE-->

<div id="content">

	<div id="infoBox" class="clear row">
	  		<div id="ricercatext">
	  			<h3>Ricerca per :</h3>
	  			<?php echo "<p> {$_POST['stringaCercata']} </p>" ?>
	  		</div>
	  		<div id="nrisultati">
	  			<?php echo "<p> $nrisultati" ?> risultati </p>
	  		</div>
	</div>
<?php
	$i=0;
	echo '<div class="rowconsigliate clear">';
	foreach ($ricettecercate as $valore) {
		$i++;
		if($i==4){
			echo '</div>';
			echo '<div class="rowconsigliate clear">';
			$i=0;
		}
		echo '<div class="responsive">';
		echo '	<div class="gallery">';
		echo '		<a target="_blank" href="../Database/Ricette/{$valore['nome_immagine']}">';
		echo '			<img src="../Database/Ricette/{$valore['nome_immagine']}" alt="{$valore['Descrizione_Immagine']}" width="600" height="400">';
		echo '		</a>';
		echo '		<div class="desc">{$valore['Nome']}</div>';
		echo '		</div>';
		echo '	</div>';
	}
	echo '</div>';




 ?>
<div class="rowconsigliate clear">
<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_5terre.jpg">
      <img src="../Database/Ricette/dolci_tiramisu.jpg" alt="Cinque Terre" width="600" height="400">
    </a>
    <div class="desc">Risotto radicchio e salsiccia</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_forest.jpg">
      <img src="../Database/Ricette/dolci_tiramisu.jpg" alt="Forest" width="600" height="400">
    </a>
    <div class="desc">Risotto alla zucca</div>
  </div>
</div>

<div class="responsive ">
  <div class="gallery">
    <a target="_blank" href="img_lights.jpg">
      <img src="../Database/Ricette/dolci_tiramisu.jpg" alt="Northern Lights" width="600" height="400">
    </a>
    <div class="desc">Risotto allo zafferano</div>
  </div>
</div>

<div class="responsive ">
  <div class="gallery">
    <a target="_blank" href="img_mountains.jpg">
      <img src="../Database/Ricette/dolci_tiramisu.jpg" alt="Mountains" width="600" height="400">
    </a>
    <div class="desc">Risotto con i funghi</div>
  </div>
</div>
</div>
<div class="rowconsigliate clear">
<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_5terre.jpg">
      <img src="../Database/Ricette/dolci_tiramisu.jpg" alt="Cinque Terre" width="600" height="400">
    </a>
    <div class="desc">Risotto di mare</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_forest.jpg">
      <img src="../Database/Ricette/dolci_tiramisu.jpg" alt="Forest" width="600" height="400">
    </a>
    <div class="desc">Risotto alla quaglia</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_lights.jpg">
      <img src="../Database/Ricette/dolci_tiramisu.jpg" alt="Northern Lights" width="600" height="400">
    </a>
    <div class="desc">Risotto al risotto</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_mountains.jpg">
      <img src="../Database/Ricette/dolci_tiramisu.jpg" alt="Mountains" width="600" height="400">
    </a>
    <div class="desc">Risotto zucchine e gamberetti</div>
  </div>
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
		<li><a href="" lang="en">Facebook</a><span>&nbsp;</span><a href="" lang="en">Instagram</a><span>&nbsp;</span><a href="" lang="en">About</a></li>
	</ul>
<div id="validity">
	<img id="htmlvalid" src="../immagini/valid-xhtml10.png" alt="HTML valido" />
	<img id="cssvalid" src="../immagini/vcss-blue.gif" alt="CSS3 valido" />
</div>
</div>
</body>
</html>
