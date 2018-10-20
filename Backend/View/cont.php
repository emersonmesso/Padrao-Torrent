<?php include "Backend/Config/config.php"; ?>
<!--VISUALIZAÇÃO DO SITE-->
<div class="container-fluid" id="logosite">
    <a href="./"><img src="Backend/Images/logo.png" width="100%" alt="Imagem logo do site"></a>
</div>
<!--VISUALIZAÇÃO DO SITE-->

<div class="container bg-light mt-4 p-4" id="contVip">
    
    <h1 class="text-center text-info">CONTEÚDO VIP</h1>

    
    <div class="row">
        
        <div class="col-sm-6">
            <div class="container-fluid">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    
                    <div class="carousel-inner">
                        <?php echo $mysql->carroucel(); ?>
                    </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6">
            <div class="container-fluid text-center mt-2">
                
                <h3>Quais Os Benefícios De Ser VIP?</h3>
                <div class="card border-primary float-right mb-3" style="width: 15rem;">
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold">Filmes Online</h4>
                        <p class="card-text text-justify">
                            Você pode assitir aos lançamentos assim que eles forem lançados!
                        </p>
                        
                    </div>
                    
                </div>
                
                <div class="card border-primary float-left mb-3" style="width: 15rem;">
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold">Downloads Ilimitados</h4>
                        <p class="card-text text-justify">
                            Você pode fazer o downloads de todos os filmes que quiser e sem bloquei.
                        </p>
                        <p class="text-muted ">Alguns filmes são bloqueados para usuários não VIPs</p>
                        
                    </div>
                    
                </div>
                
                <div class="card border-primary float-right mb-3" style="width: 15rem;">
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold">Adminstração Dos Seus Dados</h4>
                        <p class="card-text text-justify">
                            Você tem uma área de adminstração de todas as suas informações...
                        </p>
                        <p class="text-muted ">Alguns filmes são bloqueados para usuários VIP</p>
                        
                    </div>
                    
                </div>
                
                <div class="card border-primary float-left mb-3" style="width: 15rem;">
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold">Notificações Sobre Lançamentos</h4>
                        <p class="card-text text-justify">
                            Você receberá a notificação sobre algum lançamento que você queria assistir ou fazer o download.
                        </p>
                        <p class="text-muted ">Alguns filmes são bloqueados para usuários VIP</p>
                        
                    </div>
                    
                </div>
                
                <div class="card border-primary float-right mb-3" style="width: 15rem;">
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold">API de Torrents</h4>
                        <p class="card-text text-justify">
                            Você pode levar todas as informações do filme para o seu Site com a nossa API.
                        </p>
                        <p class="text-muted "><a href="api">Ver API</a></p>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
        
    </div>
    
    <div class="row mt-5">
        
        <div class="col-12">
            <button type="button" class="btn btn-secondary btn-lg btn-block" lang="vip" title="link" id="btnLink">QUERO SER VIP!</button>
        </div>
        
    </div>

</div>
<!--FILMES-->
<div class="container mt-4 p-4 text-center" id="containerFilmes">
    <h2>Todos Os Filmes Disponíveis</h2>
    <!--Tela dos filmes-->
    
    <?php
    $mysql->filmes(false, 0, "");
    ?>
    <!--Tela dos filmes-->
    
    
</div>
<!--FILMES-->

<!-- MAIS FILMES-->
<div class="container">
    <button type="button" class="btn btn-dark btn-lg btn-block mb-3" id="btnMais">Carregar Mais Filmes</button>
</div>
<!-- MAIS FILMES-->