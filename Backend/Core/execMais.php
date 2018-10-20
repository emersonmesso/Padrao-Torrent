<?php
require "../Config/Controller.php";
$mysql = new Controller();

//Mostrando todos os erro do PHP
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


$id = $_POST['idTorrent'];
$mysql->filmes(true, $id, "");