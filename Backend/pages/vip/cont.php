<?php include "Backend/Config/config.php"; ?>
<!--VISUALIZAÇÃO DO SITE-->
<div class="container-fluid" id="logosite">
    <a href="./"><img src="Backend/Images/logo.png" width="100%" alt="Imagem logo do site"></a>
</div>
<!--VISUALIZAÇÃO DO SITE-->

<div class="container text-center bg-light">
    <h1 class="w-100 bg-dark text-white p-2 mt-3">Usuários VIP!</h1>
    
    <h3 class="">Quais Os Benefícios?</h3>
    <div class="row mt-5">
        
        <div class="col-4">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Downloads Ilimitados</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Assistir Filmes Online</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Área De Administração</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Notificações De Lançamentos</a>
                <a class="nav-link" id="v-pills-api-tab" data-toggle="pill" href="#v-pills-api" role="tab" aria-controls="v-pills-api" aria-selected="false">Acesso a API Do Site</a>
            </div>
        </div>
        
        <div class="col-8">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <p>Você pode fazer quantos downloads quiser no nosso site!</p>
                    <p>O nosso sistema usa técnicas de negócio que bloqueiam quantidades agressivas de downloads dos filmes para um único IP de acesso, com isso bloqueamos downloads indevidos de filmes, a fim de
                    conseguir medir o total de downloads de cada filme.
                    </p>
                    <p>Utilizamos essa técnica para bloquear downloads indevidos para usuários simples, disponibilizando o total de 3 downloads por dia para cada usuário final.</p>
                    <p>Clientes VIP podem fazer quantos downloads quiserem em qualquer filme do sistema.</p>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <p>Você pode assistir a qualquer filme disponível no site!</p>
                    <p>Todos os lançamentos serão adicionados para download e a opção de assistir online também assim que estiverem disponíveis na internet.</p>
                    <p>Os filmes serão adicionados assim que forem lançados ou quando for encontrado uma versão melhor do filme (Qualidade de Áudio e Vídeo).</p>
                    <p>Só usuários VIP podem assitir aos filmes no site.</p>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <p>Com a área de administração, você pode visualizar todos os seus dados referentes ao pagamento dos valores, bem como 
                    buscar filmes para download e assistir a eles, definir categorias preferidas e filmes com esses requisitos estarão disponíveis
                    para download e assitir na própria área de administração.
                    </p>
                    <p>Você pode também fazer pedidos de filmes e marcar para ser notificados sobre o lançamento desses filmes no site.</p>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <p>
                        Ao selecionar um filme na sua área de administração, um pedido, você receberá uma notificação
                        por e-mail informando que o seu filme foi lançado e esta disponível para download e assistir online.
                    </p>
                    <p>
                        O link do filme será enviado pelo e-mail e também aparecerá uma notificação assim que o usuario entrar no site.
                    </p>
                </div>
                <div class="tab-pane fade" id="v-pills-api" role="tabpanel" aria-labelledby="v-pills-api-tab">
                    <p>Com a API do site, você pode incorporar dodos dos filmes aqui disponíveis no seu site.</p>
                    <p>
                        Todos os dados, como tamanho, imagem de post, nome, sinope, entre outros dados estarão disponíveis a serem utilizados
                        livremente no seu site.
                    </p>
                </div>
            </div>
        </div>
        
        
    </div>
</div>

<!--PASSOS-->
<div class="container bg-light text-center mt-5">
    
    <h2>Passos e informações para ser VIP</h2>
    
    <div class="row p-5">
        
        <div class="card" style="width: 20em;">
            
            <div class="card-body">
                <h5 class="card-title">Passo 1</h5>
                <div class="card-text">
                    <p>
                        Fazer o cadstro no site utilizando seu e-mail de uso pessoa
                        e informar as outras informações do formulário.
                    </p>
                    <p class="text-muted">
                        O e-mail informado deve ser o mesmo utilizado no pagamento.
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><button type="button" class="btn btn-secondary btn-block" id="btnFormCadastro" data-toggle="modal" data-target="#exampleModal">Abrir Formulário</button></li>
                    
                </ul>
            </div>
        </div>
        
    </div>
    
</div>