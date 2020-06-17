<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
//apertura connessione
$connessione=new DBAccess();
try{
	if(!$connessione->openConnectionLocal()) throw new Exception("No connection");
	$bool=1;

	if(isset($_SESSION['adminlogged'])){
		if(isset($_GET['operation'])){
			if($_GET['operation']==="1"){
				$finale = file_get_contents("../txt/admin_panel_remove.html");
				$bool=0;
				$utenti=$connessione->getQuery("SELECT Id_Utente,Nome,Cognome,Username FROM utente");
				$finale=str_replace("%%title","Elimina utenti",$finale);
				$finale=str_replace("%%eliminawhat",stampadeleteUtenti($utenti),$finale);
			}
			elseif($_GET['operation']==="2"){
				$finale = file_get_contents("../txt/admin_panel_remove.html");
				$bool=0;
				$utenti=$connessione->getQuery("SELECT * FROM commento");
				$finale=str_replace("%%title","Elimina utenti",$finale);
				$finale=str_replace("%%eliminawhat",stampadeleteCommenti($utenti),$finale);
			}
			elseif($_GET['operation']==="3"){
				$_SESSION=array();
				session_destroy();
				header( "refresh:0; url=../PHP/Index.php" ); 
			}
			else	header( "refresh:0; url=../PHP/Index.php" );
		}
		if(isset($_GET['delete'])){
			if($_GET['delete']==="1"){
				$finale = file_get_contents("../txt/admin_panel_remove.html");
				$bool=0;
				if(!isset($_GET['id']))		header( "refresh:0; url=../PHP/Index.php" );
				if(!isset($_GET['name']))	header( "refresh:0; url=../PHP/Index.php" );
				$elimina='<a href="../PHP/Admin_panel.php?delete=2&name='.$_GET['name'].'&id='.$_GET['id'].'"><button class=button>ELIMINA</button></a>';
				$finale=str_replace("%%title","Elimina ".$_GET['name'],$finale);
				$finale=str_replace("%%eliminawhat",$elimina,$finale);

			}
			elseif($_GET['delete']==="2"){
				$finale = file_get_contents("../txt/admin_panel_remove.html");
				$bool=0;
				if(!isset($_GET['name']))	header( "refresh:0; url=../PHP/Index.php" );
				if(!isset($_GET['id']))		header( "refresh:0; url=../PHP/Index.php" );
				$elimina='<p>Eliminato ';
				if($_GET['name']==="utente"){
					$id=$_GET['id'];
					$connessione->exeQuery("DELETE FROM utente WHERE Id_Utente='$id'");
					$elimina.="l'utente!</p>"."\n";
				}
				elseif($_GET['name']==="commento"){
					$id=$_GET['id'];
					$connessione->exeQuery("DELETE FROM commento WHERE Id_Commento='$id'");
					$elimina.="il commento!</p>"."\n";
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
	$connessione->closeConnection();
}
?>