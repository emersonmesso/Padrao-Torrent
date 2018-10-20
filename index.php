<?php
require "./Backend/Config/Controller.php";
$con = new Controller();

//Contador
if(session_start()){
    session_start();
}
$_CV['registraAuto'] = true;
if ($_CV['registraAuto'] == true) {
     $con->registraVisita();
 }

//Mostrando todos os erro do PHP
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

//Header
$con->header();

//Conteudo
$con->conteudo();

//Footer
$con->footer();

//setcookie("login", "emersonmesso");
//setcookie("classe", 0);