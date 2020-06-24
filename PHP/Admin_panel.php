<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
//apertura connessione
$connessione=new DBAccess();
try{
	if(!$connessione->openConnectionLocal()) throw new Exception("No connection");
	// $bool serve per selezionare l'html da prendere
	$bool=1;
	
	//quando admin e' loggato
	if(isset($_SESSION['adminlogged'])){
		//quando admin ha scelto una delle 3 operazioni
		if(isset($_GET['operation'])){
			if($_GET['operation']==="1"){
				$finale = file_get_contents("../txt/admin_panel_remove.html");
				$bool=0;
				$utenti=$connessione->getQuery("SELECT Id_Utente,Nome,Cognome,Username from utente");
				$finale=str_replace("%%title","Elimina utenti",$finale);
				$finale=str_replace("%%eliminawhat",stampadeleteUtenti($utenti),$finale);
			}
			elseif($_GET['operation']==="2"){
				$finale = file_get_contents("../txt/admin_panel_remove.html");
				$bool=0;
				$utenti=$connessione->getQuery("SELECT C.Id_Commento, C.Testo, C.Id_Utente, C.Data, R.Nome, U.Username  FROM `commento` AS C JOIN `utente` AS U JOIN `ricetta` AS R ON C.Id_Utente=U.Id_Utente GROUP BY Id_Commento");
				$finale=str_replace("%%title","Elimina commenti",$finale);
				$finale=str_replace("%%eliminawhat",stampadeleteCommenti($utenti),$finale);
			}
			elseif($_GET['operation']==="3"){
				$_SESSION=array();
				session_destroy();
				header( "refresh:0; url=../PHP/Index.php" ); 
			}
			else	header( "refresh:0; url=../PHP/Index.php" );
		}
		//admin sta cancellando commento o utente
		if(isset($_GET['delete'])){
			//conferma cancellazione
			if($_GET['delete']==="1"){
				$finale = file_get_contents("../txt/admin_panel_remove.html");
				$bool=0;
				if(!isset($_GET['id']))		header( "refresh:0; url=../PHP/Index.php" );
				if(!isset($_GET['name']))	header( "refresh:0; url=../PHP/Index.php" );
				$elimina='<a href="../PHP/Admin_panel.php?delete=2&name='.$_GET['name'].'&id='.$_GET['id'].'"class=button>ELIMINA</a>';
				$elimina.='<a href="../PHP/Admin_panel.php?operation=';

				if($_GET['name']==="utente"){
					$iduser=$_GET['id'];
					$utenti=$connessione->getQuery("SELECT Id_Utente,Nome,Cognome,Username from utente WHERE Id_Utente='$iduser';");
					if(!$utenti)	header( "refresh:0; url=../PHP/Admin_panel.php" );	
					$var="l'utente @".$utenti[0]["Username"];
					$elimina.=1;
				}else{
					$var="il commento";
					$elimina.=2;
				}
				$elimina.='" class="button">TORNA INDIETRO</a>';
				$finale=str_replace("%%title","Elimina ".$var,$finale);
				$finale=str_replace("%%eliminawhat",$elimina,$finale);

			}
			//cancellato
			elseif($_GET['delete']==="2"){
				$finale = file_get_contents("../txt/admin_panel_remove.html");
				$bool=0;
				if(!isset($_GET['name']))	header( "refresh:0; url=../PHP/Index.php" );
				if(!isset($_GET['id']))		header( "refresh:0; url=../PHP/Index.php" );
				$elimina='<p class="onemidem">Eliminato ';
				if($_GET['name']==="utente"){
					$id=$_GET['id'];
					$connessione->exeQuery("DELETE from utente WHERE Id_Utente='$id'");
					$elimina.="l'utente!</p>"."\n";
					header( "refresh:2; url=../PHP/Admin_panel.php" );
				}
				elseif($_GET['name']==="commento"){
					$id=$_GET['id'];
					$connessione->exeQuery("DELETE FROM commento WHERE Id_Commento='$id'");
					$elimina.="il commento!</p>"."\n";
					header( "refresh:2; url=../PHP/Admin_panel.php" );
				}
				$finale=str_replace("%%title","",$finale);
				$finale=str_replace("%%eliminawhat",$elimina,$finale);
			}
			else{
				header( "refresh:0; url=../PHP/Index.php" );
			}
		}
		if($bool)	$finale = file_get_contents("../txt/adminpanel.html");
		$bool=0;
	}

	//quando admin si sta loggando
	if(isset($_POST['button'])){
		$user=$_POST['user'];
		$pin=$_POST['pin'];
		$connessione->openConnectionLocal();
		if($connessione->getQuery("SELECT * from admins WHERE User='$user' AND Pin='$pin'")){
			$finale = file_get_contents("../txt/adminpanel.html");
			$bool=0;
			$_SESSION=array();
			session_destroy();
			session_start();
			$_SESSION['adminlogged']=true;
		}
	}

	//prima che l'admin provi a loggarsi
	if($bool){
		$finale = file_get_contents("../txt/admin_panel_login.html");
	}
	//sidemenu user
	$divusermenu="";
	$ref="";
	if(isset($_SESSION['login'])){
		if($_SESSION['login'])	$divusermenu='<div id="myUserSideNav" class="sidenav"><a href="javascript:void(0)" class="closebtn" onclick="closeUserNav()">&times;</a><ul><li><a href="../PHP/userManage.php?request=1">Profilo</a></li><li><a href="../PHP/userManage.php?request=2">Logout</a></li></ul></div>';
		else	$divusermenu="";
	}else{
		$divusermenu="";
	}
	if($divusermenu===""){
		$ref='<a href="Registrazione.php"><img id="user_logo" src="../immagini/account.png" alt="user logo" onclick="openUserNav()"/></a>';
	}else{
		$ref='<img id="user_logo" src="../immagini/account.png" alt="user logo" onclick="openUserNav()"/>';
		
	}

	$finale=str_replace("%%user",$ref,$finale);
	$finale=str_replace("%%utente",$divusermenu,$finale);
	
	//echo dell'html finale
	echo $finale;
}catch(Exception $eccezione){
	echo $eccezione;
}
$connessione->closeConnection();
?>
