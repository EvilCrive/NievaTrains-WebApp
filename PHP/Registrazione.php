<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
//file html	
$finale = file_get_contents("../txt/Registrazione.html");
//signup non worka
//login non worka
//login/signup ha workato
echo $finale;
?>