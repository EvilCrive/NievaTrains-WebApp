<?php
require_once "connection.php";


function stampaRicerca($result) {
	$nrisultati=sizeof($result);
	echo '<div class="rowconsigliate clear">'."\n";
	$contatore=1;
	for ($i=0; $i<$nrisultati; $i++){

		$tmp=$result[$i];
		echo '<div class="responsive">'."\n";
		echo '	<div class="gallery">'."\n";
		echo '		<a target="_blank" href="'.$tmp["Nome_Immagine"].'.jpg">'."\n";
		echo '		<img src="../Database/Ricette/'.$tmp["Nome_Immagine"].'jpg" alt="'.$tmp["Descrizione_Immagine"].'" width="600" height="400">'."\n";
		echo '		</a>'."\n";
		echo '	<div class="desc">'.$tmp["Nome"].'</div>'."\n";
		echo '	</div>'."\n";
		echo '</div>'."\n";
		
		if($contatore%4===0) { //da controllare il caso in cui sono multipli di 4
			echo '</div>'."\n";
			echo '<div class="rowconsigliate clear">'."\n";
		}
	$contatore++;
	}
	echo '</div>'."\n";
	}
?>