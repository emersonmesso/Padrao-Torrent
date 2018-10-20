<?php include "Backend/Config/config.php"; ?>
<!--VISUALIZAÇÃO DO SITE-->
<div class="container-fluid" id="logosite">
    <a href="../"><img src="../Backend/Images/logo.png" width="100%" alt="Imagem logo do site"></a>
</div>
<!--VISUALIZAÇÃO DO SITE-->

<!--FILMES-->
<div class="container mt-4 p-4 text-center" id="containerFilmes">
    <h2>Todos Os Filmes Disponíveis</h2>
    <!--Tela dos filmes-->
    
    <?php
    $mysql->filmes(false, 0, $mysql->url[1]);
    ?>
    <!--Tela dos filmes-->
    
    
</div>
<!--FILMES-->