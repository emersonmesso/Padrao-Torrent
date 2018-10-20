<?php include "Backend/Config/config.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/x-icon" href="Backend/Images/ico.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="O Melhores Filmes Em Torrent">
        <meta name="keywords" content="Padrão, Torrent, Filmes, Download">
        <meta name="author" content="Padrão Torrent">
        <title>Padrão Torrent</title>
        <link href="Backend/Styles/reset.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    </head>
    <body>
        
        <nav class="navbar navbar-expand-md navbar-dark bg-dark" id="navtopo">
            <a class="navbar-brand" href="./">Padrão Torrent</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="./">Início <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vip">Vip</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contato">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sobre">Sobre</a>
                    </li>
                </ul>
                
                <?php
                $mysql->controleUsuario();
                ?>
                
                
                <!--INFORMAÇÕES DO USUÁRIO-->
                <form class="form-inline my-2 my-lg-0" id="formBusca">
                    <input class="form-control mr-sm-2" type="search" id="campBusca" placeholder="Busca" aria-label="Search">
                    <button type="button" class="btn btn-outline-success" id="btnBusca" type="submit">Procurar</button>
                </form>
            </div>
        </nav>