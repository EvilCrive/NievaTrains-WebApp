<?php
//redirect se il parametro di ricerca della query in GET non è settato
require_once "connection.php";
require_once "stampeOggetti.php";
$ConnessioneAttiva = new DBAccess();
$var=$ConnessioneAttiva->openConnectionlocal();

$result=$ConnessioneAttiva->getQuery("SELECT * FROM Ricetta WHERE Id_Ricetta='1';");
$risultati=$result[0];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
	<!-- Specifico il charset -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- Titolo -->
	<title> <?php echo $risultati["Nome"];?> - OrangeTango</title>
	<!-- Titolo esteso dentro un meta -->
	<meta name="title" content="Ricetta <?php echo $risultati["Nome"];?> - OrangeTango" />
	<!-- Descrizione del sito -->
	<meta name="description" content="<?php echo $risultati["Nome"];?>" />
	<!-- Keyword principali del sito -->
	<meta name="keywords" content="OrangeTango,<?php echo $risultati["Nome"];?>" />
	<meta name="author" content="Alberto Crivellari, Matteo Brosolo, Francesco Bugno, Marco Barbaresco" />
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
				<img id="logo_head" src="../immagini/logo.png" alt="logo orange tango"/>
				<img id="user_logo" src="../immagini/account.png" alt="user logo"/>
				<form class="topnav" action="../PHP/ricerca.php" method="post">
		 			<input type="text" placeholder="Cerca ricette e utenti" type="text" name="stringaCercata">
					<button class="button" name="cerca">Cerca</button>
				</form>
			</div>
				<!--seconda riga header-->
		  <div id="hrow_2">
				<ul id="menuList">
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
				<li>Ti trovi in: <span xml:lang="en"><a href="./home.html">Home</a></span> <!--php Nome e categorie--></li>
				<li class="stayright"><a href="#">Vai al Contenuto</a></li>
			</ul>
		</div>

<!--END TOP OF THE PAGE-->


<div id="content">
	<div id="intro" class="clear">
	<!--php Nome, Likes(voto), Preferiti-->
		<h2 class="maintitle"><?php echo $risultati["Nome"];?></h2>
			<button class="button1 likes"><?php echo $risultati["Voto"];?></button>
			<button class="button1 prefe"><?php stampaPreferiti($ConnessioneAttiva,1); ?></button>
	</div>
	<div class="row clear">
			<div id="col_sx">
			<!--php Immagine-->
				<img id="img_ricetta" <?php echo 'src="../Database/Ricette/'.$risultati["Nome_Immagine"].'.jpg" alt="'.$risultati["Descrizione_Immagine"].'"'?> />
			</div>
			<div id="col_dx">
				<ul>
					<?php stampaInformazioni($ConnessioneAttiva,1);?>
				</ul>
			</div>
	</div>
	<div class="row">
		<h3> Introduzione </h3>
		<!--php introduzione-->
		<p><?php echo $risultati["Introduzione"];?></p>
	</div>
	<div class="row clear">
			<div id="col_sx">
				<h3> Ingredienti : </h3>
				<!--php Ingredienti-->
				<?php stampaIngredienti($ConnessioneAttiva,1);?>
			</div>
			<div id="col_dx">
				<h3>Passo Passo</h3>
				<!--php passopasso-->
				<p><?php stampaPasso($ConnessioneAttiva,1);?></p>
			</div>
	</div>
	<div class="row">
		<h3> Ricetta Estesa </h3>
		<!--php ricetta-->
		<p><?php echo $risultati["Preparazione"];?></p>
	</div>

<!--COMMENT SECTION -->
<div class="row">

<h3>Commenti:</h3>
	<ul class="comment-section">
	<!--php commenti-->
	<?php stampaCommenti($ConnessioneAttiva,1)?>
			<li class="write-new">
					<form action="#" method="post">
							<textarea placeholder="Lascia un commento qui..." name="comment"></textarea>
									<div>
                      <button type="submit">Invia</button>
                  </div>
					</form>
  		</li>
	</ul>
</div>
<!--RICETTE CORRELATE -->

	<h3>Ricette Della stessa Categoria :</h3>
	<!--php correlate
	Query per le correlate
	stampa correlate
	-->
	<?php
	$stessaCategoria=$ConnessioneAttiva->getQuery("SELECT * FROM Ricetta WHERE Categoria='Antipasti';");
	stampaRicerca($stessaCategoria);
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