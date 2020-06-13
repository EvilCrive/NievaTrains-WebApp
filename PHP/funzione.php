<!-- 
  vecchia funzione.php
  <html>
 <head>
  <title>Test PHP</title>
 </head>
 <body>
  <?php 

/*	considera $array come l'array con gli ingredienti/il passopasso preso dal database;
	nel database ogni "riga" sia degli ingredienti che del passopasso è separato dalle altre da \n
*/
/*
  $array=array("primo;
  	secondo;
  	terzo;
  	quarto;
  	quinto.");

// !converto in stringa
  $stringa=implode($array);

// !converto di nuovo in array usando \n come separatore
  $aux=explode("\n",$stringa);

// !stampa
  echo '<ul>';
  foreach ($aux as $element) {
  	echo '<li>'.$element.'</li>';
  }
  echo '</ul>'
  */
  ?>
 </body>
</html>

 -->

<!-- nuova -->
<html>
 <head>
  <title>Test PHP</title>
 </head>
 <body>
  <?php 

/*	considera $array come l'array con gli ingredienti/il passopasso preso dal database;
	nel database ogni "riga" sia degli ingredienti che del passopasso è separato dalle altre da \n
*/
require_once "connection.php";
require_once "stampe.php";
//apertura connessione
$connessione=new DBAccess();

	if(!$connessione->openConnectionLocal()) throw new Exception("No connection");
  $ID=1;
	//getquery ricetta(id)
	$ricetta=$connessione->getQuery("SELECT * FROM ricetta WHERE Id_Ricetta=$ID;");
  $stringa=stampaIntroduzione($ricetta);
  $aux=explode(". ",$stringa);
  echo $stringa;
  echo '<ul>';
  foreach ($aux as $element) {
  	echo '<p>'.$element.'. '.'</p>';
  }
  echo '</ul>'
  ?>
 </body>
</html>



