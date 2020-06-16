<?php
require_once "connection.php";
require_once "stampe.php";
session_start();
$ConnessioneAttiva = new DBAccess();
$var=$ConnessioneAttiva->openConnectionlocal();
echo $_GET['request'];
?>

