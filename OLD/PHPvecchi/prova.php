<?php
require_once "connection.php";
$ConnessioneAttiva = new DBAccess();
$var=$ConnessioneAttiva->openConnectionlocal();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
  <title>prova</title>
</head>
<body>
	<h1>prova</h1>
  <?php
    if($var) {
		$result=$ConnessioneAttiva->getQuery("SELECT Descrizione_Immagine, Nome_Immagine, Nome FROM ricetta;");
		$nresults=sizeof($result);
		echo $nresults;
		$tmp=$result[1];
		echo '<div class="responsive">';
		echo '	<div class="gallery">';
		echo '		<a target="_blank" href="img_forest.jpg">';
		echo '		<img src="../immagini/Ricette/'.$tmp["Nome_Immagine"].'jpg" alt="'.$tmp["Descrizione_Immagine"].'" width="600" height="400">';
		echo '		</a>';
		echo '	<div class="desc">'.$tmp["Nome"].'</div>';
		echo '	</div>';
		echo '</div>';

	}
  ?>
</body>
</html>
