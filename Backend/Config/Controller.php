<?php
require "mysql.php";
class Controller {
    private $url;
    public $DADOS;
    
    
    function Controller (){
        $_SERVER['REQUEST_URI'];
        $parte1 = strrchr($_SERVER['REQUEST_URI'],"?");
        $parte2 = str_replace($parte1,"",$_SERVER['REQUEST_URI']);
        $this->url = explode("/",$parte2);
        array_shift($this->url);
    }
    
    //HEADER
    public function header(){
        //buscando o cabeçalho do arquivo
        if($this->url[0] == ""){
            //inicial
            include "Backend/View/header.php";
        }else{
            include "Backend/pages/".$this->url[0]."/header.php";
        }
    }


    //CONTEUDO
    public function conteudo (){
        if($this->url[0] == ""){
            //inicial
            include "Backend/View/cont.php";
        }else{
            include "Backend/pages/".$this->url[0]."/cont.php";
        }
    }


    //FOOTER
    public function footer(){
        if($this->url[0] == ""){
            //inicial
            include "Backend/View/footer.php";
        }else{
            include "Backend/pages/".$this->url[0]."/footer.php";
        }
    }
    
    //SELECT no banco de dados
    public function select($tabela,$todos=NULL,$where=NULL,$order=NULL){
        //inicia a classe
        $mysql = new mysql();
        //instancia a conexão
        $mysql->conecta();
        
        if($todos == NULL){
            $todos = "*";
        }
        if($where != NULL){
            $where = " WHERE ".$where;
        }
        if($order != NULL){
            $order = " ORDER BY ".$order;
        }
        $sql = "SELECT {$todos} FROM {$tabela}{$where}{$order}";
        $query = $mysql->sql->query($sql);
        //fecha a coneção
        mysqli_close($mysql->sql);
        return $query;
    }
    
    //DELETE no banco de dados
    public function delete($tabela, $where){
        //inicia a classe
        $mysql = new mysql();
        //instancia a conexão
        $mysql->conecta();
        //
        if($where != NULL){
            $where = " WHERE ".$where;
        }
        //criando a consulta
        $sql = "DELETE FROM {$tabela}{$where}";
        $query = $mysql->sql->query($sql);
        //fecha a coneção
        mysqli_close($mysql->sql);
        return $query;
    }
    
    //UPDATE no banco de dados
    public function update($tabela,$valores,$where){
        //inicia a classe
        $mysql = new mysql();
        //instancia a conexão
        $mysql->conecta();
        //
        if($where != NULL){
            $where = " WHERE ".$where;
        }
        //
        $sql = "UPDATE {$tabela} SET {$valores} {$where}";
        //executa a Query
        $query = $mysql->sql->query($sql);
        //fecha a coneção
        mysqli_close($mysql->sql);
        return $query;
    }
    
    //INSERE no banco de dados
    public function insere($tabela,$campos,$valores){
        //inicia a classe
        $mysql = new mysql();
        //instancia a conexão
        $mysql->conecta();
        //
        $sql = "INSERT INTO {$tabela}({$campos}) VALUES({$valores})";
        //executa a Query
        $query = $mysql->sql->query($sql);
        //fecha a coneção
        mysqli_close($mysql->sql);
        return $query;
    }
    
    //
    function limita_caracteres($texto, $limite, $quebra = true){
   	$tamanho = strlen($texto);
   	if($tamanho <= $limite){ //Verifica se o tamanho do texto é menor ou igual ao limite
            $novo_texto = $texto;
   	}else{ // Se o tamanho do texto for maior que o limite
            if($quebra == true){ // Verifica a opção de quebrar o texto
         	$novo_texto = trim(substr($texto, 0, $limite))."...";
            }else{ // Se não, corta $texto na última palavra antes do limite
         	$ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); // Localiza o útlimo espaço antes de $limite
         	$novo_texto = trim(substr($texto, 0, $ultimo_espaco))."..."; // Corta o $texto até a posição localizada
            }
   	}
        return $novo_texto; // Retorna o valor formatado
    }
    
    //Cria a URL do filme
    public function URL_TORRENT($row_a){
        $nome_a = "";
        //
        if($row_a['titulo_p'] == ""){
            $nome_a = $row_a['titulo_o'] . " S" . $row_a['temporada'] . " E" . $row_a['episodio'] . " " . $row_a['ano'] . " " . $row_a['qualidade']." " . $row_a['audio'];
        }else{
            $nome_a = $row_a['titulo_p'] . " S" . $row_a['temporada'] . " E" . $row_a['episodio'] . " " . $row_a['ano'] . " " . $row_a['qualidade']." " . $row_a['audio'];
        }

        $nome_a = str_replace("  ", "-",$nome_a);
        $nome_a = str_replace(" ", "-",$nome_a);
        $nome_a = str_replace("---", "-",$nome_a);
        $nome_a = str_replace("----", "-",$nome_a);
        $nome_a = str_replace(":", "-",$nome_a);
        $nome_a = str_replace("--", "-",$nome_a);
        //$nome_a = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $nome_a) );
        $nome_a = $nome_a . ".html";
        //
        return "http://padraotorrent.com/torrent/" . $row_a['id']."/".$nome_a;
        
    }
    
    //Cria o nome do filme para exibição
    public function nomeExibicao($row_p){
        $nome_p = "";
        //
        if($row_p['tipo'] == "Filme"){
            if($row_p['titulo_p'] == ""){
                $nome_p = $row_p['titulo_o'] . " (" . $row_p['ano'] . ") " . $row_p['qualidade']." " . $row_p['audio'];
            }else{
                $nome_p = $row_p['titulo_p'] . " (" . $row_p['ano'] . ") " . $row_p['qualidade']." " . $row_p['audio'];
           }
        }else{
            if($row_p['titulo_p'] == ""){
                $nome_p = $row_p['titulo_o'] . " S" . $row_p['temporada'] . " E" . $row_p['episodio'] . " (" . $row_p['ano'] . ") " . $row_p['qualidade']." " . $row_p['audio'];
            }else{
                $nome_p = $row_p['titulo_p'] . " S" . $row_p['temporada'] . " E" . $row_p['episodio'] . " (" . $row_p['ano'] . ") " . $row_p['qualidade']." " . $row_p['audio'];
            }
        }
        //
        return $nome_p;
        
    }
    
    public function carroucel(){
        $sql = $this->select("torrent", "*", "link_online != ''", "downloads DESC LIMIT 0,5");
        $cont = 0;
        while ($row = mysqli_fetch_array($sql)){
            $titulo = "";
            if($row['titulo_p'] == ""){
                $titulo = $row['titulo_o'] . " (" . $row['ano']. ") ". $row['audio'];
            }else{
                $titulo = $row['titulo_p'] . " (" . $row['ano']. ") ". $row['audio'];
            }
            
            if($cont == 0){
                echo '<div class="carousel-item active">';
            }else{
                echo '<div class="carousel-item">';
            }
            
                echo '<img class="d-block w-100" src="Backend/Images/'.$row['capa'].'" alt="First slide">';
                echo '<div class="carousel-caption d-none d-md-block">';
                    echo '<h3 class="text-warning font-weight-bold">'.$titulo.'</h3>';
                    echo '<p class="text-warning font-weight-bold">'. $this->limita_caracteres($row['sinopse'], 100, false).'</p>';
                echo '</div>';
            echo '</div>';
            $cont++;
        }
    }
    
    //verifica se existe pares no servidor
    public function verPeers($rows){
        
        if($rows['info_hash'] != ""){
            
            //adicionando as variáveis
            $hash = $rows['info_hash'];
            $seeds = 0;
            $peers = 0;
            $cont = 0;
            
            //pricura no banco de existe algum torrent
            $sql = $this->select("peers");
            while($rows_peers = mysqli_fetch_array($sql)){
                $h = bin2hex($rows_peers['info_hash']);
                
                if($hash == $h){
                    //quantidade de seeds
                    if($rows_peers['left'] == 0){
                        $seeds = $seeds + 1;
                    }
                    //quantidade de peers
                    if($rows_peers['left'] > 0){
                        $peers = $peers + 1;
                    }
                    $cont++;
                } 
            }
            
            if($cont != 0){
                $retorno = array(
                    'erro' => false,
                    'seed' => $seeds,
                    'peer' => $peers
                );
            }else{
                $retorno = array(
                    'erro' => true,
                    'seed' => $rows['seeds'],
                    'peer' => $rows['peers']
                );
            }
            
            
        }else{
            $retorno = array(
                'erro' => true,
                'seed' => $rows['seeds'],
                'peer' => $rows['peers']
            );
        }
        return $retorno;
    }
    
    //registro de visitas
    public function registraVisita() {
        $_CV['iniciaSessao'] = true;
        $_CV['tabela'] = 'visitas';
        $sql = $this->select("visitas", "COUNT(*)", " data = CURDATE()");
        $resultado = mysqli_fetch_row($sql);
        // Verifica se é uma visita (do visitante)
        $nova = (!isset($_SESSION['ContadorVisitas'])) ? true : false;
        // Verifica se já existe registro para o dia
        if ($resultado[0] == 0) {

            $this->insere($_CV['tabela'], "", "NULL, CURDATE(), 1, 1");
        } else {
            if ($nova == true) {
                $this->update($_CV['tabela'], "uniques = (`uniques + 1), pageviews = (`pageviews + 1)", "data = CURDATE()");
            } else {
                $this->update($_CV['tabela'], "pageviews = (pageviews + 1)", "data = CURDATE()");
            }
        }

        // Cria uma variavel na sessão
        $_SESSION['ContadorVisitas'] = md5(time());
     }
     
    //Pega a visita
    public function pegaVisitas($tipo = 'uniques ', $periodo = 'hoje') {
        $_CV['registraAuto'] = true;
        $_CV['tabela'] = 'visitas';
        switch($tipo) {
            default:
            case 'uniques':
                $campo = 'uniques';
                break;
            case 'pageviews':
                $campo = 'pageviews';
                break;
        }

        switch($periodo) {
            default:
            case 'hoje':
                $busca = "data = CURDATE()";
                break;
            case 'mes':
                $busca = "data BETWEEN DATE_FORMAT(CURDATE(), '%Y-%m-01') AND LAST_DAY(CURDATE())";
                break;
            case 'ano':
                $busca = "data BETWEEN DATE_FORMAT(CURDATE(), '%Y-01-01') AND DATE_FORMAT(CURDATE(), '%Y-12-31')";
                break;
        }
        // Faz a consulta no MySQL em função dos argumentos
        $sql1 = $this->select($_CV['tabela'], "SUM(`".$campo."`)", $busca);
        $resultado = mysqli_fetch_row($sql1);

        // Retorna o valor encontrado ou zero
        return (!empty($resultado)) ? (int)$resultado[0] : 0;
    }






    //
    public function filmes($proximo, $id, $busca){
        if($proximo){
            $sql_filmes = $this->select("torrent", "*", "id < $id", "id DESC LIMIT 0,10");
        }else{
            
            if($busca != ""){
                $sql_filmes = $this->select("torrent", "*", "titulo_o LIKE '%".$busca."%' OR titulo_p LIKE '%".$busca."%'", "id DESC");
            }else{
                $sql_filmes = $this->select("torrent", "*", "", "id DESC LIMIT 0,10");
            }
        }
        if(mysqli_num_rows($sql_filmes) > 0){
            while($rows = mysqli_fetch_array($sql_filmes)){

                ?>
                    <div class="bg-light p-3 mt-2 rounded" id="telaTorrent">

                        <div class="row mb-3 p-2">
                            <div class="col-sm-12 bg-dark text-white p-3 rounded" style="font-size: 1.5em;"><?php echo $this->nomeExibicao($rows) ?></div>
                        </div>
                        <div class="row rounded">
                            <div class="col-sm-4" id="img_filme" style="overflow: hidden;">
                                <?php if($busca != ""){ ?>
                                    <img src="<?php echo "../Backend/Images/".$rows['capa'] ?>" alt="Imagem do filme" >
                                <?php }else{ ?>
                                    <img src="<?php echo "Backend/Images/".$rows['capa'] ?>" alt="Imagem do filme" >
                                <?php }?>
                            </div>

                            <div class="col-sm-8">


                                <div class="row align-items-center p-3">

                                    <!---->
                                    <div class="card w-100 mt-3">
                                        <div class="card-body">
                                            <div class="card-text p-3">
                                                <a class="rounded bg-success p-3 text-white" href="<?php echo $rows['link'] ?>" target="_blank">Download</a>
                                            </div>

                                        </div>
                                    </div>



                                    <div class="card w-100 mt-3">
                                        <div class="card-body">

                                            <div class="card-text text-center">

                                                <ul class="nav nav-tabs" id="myTabs_<?php echo $rows['id'] ?>" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="sinopse-tab_<?php echo $rows['id'] ?>" data-toggle="tab" href="#sinopse_<?php echo $rows['id'] ?>" role="tab" aria-controls="sinopse" aria-selected="true">Sinopse</a>
                                                    </li>
                                                    <!--ELENCO-->
                                                    <?php
                                                    if($rows['elenco'] != ""){
                                                        ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="elenco-tab_<?php echo $rows['id'] ?>" data-toggle="tab" href="#elenco_<?php echo $rows['id'] ?>" role="tab" aria-controls="elenco" aria-selected="true">Elenco</a>
                                                    </li>
                                                    <?php
                                                    }
                                                    ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="filme-tab_<?php echo $rows['id'] ?>" data-toggle="tab" href="#filme_<?php echo $rows['id'] ?>" role="tab" aria-controls="info" aria-selected="true">Inf. Do Filme</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="rastreador-tab_<?php echo $rows['id'] ?>" data-toggle="tab" href="#rastreador_<?php echo $rows['id'] ?>" role="tab" aria-controls="rastreador" aria-selected="true">Outros Dados</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="sinopse_<?php echo $rows['id'] ?>" role="tabpanel" aria-labelledby="sinopse_<?php echo $rows['id'] ?>">
                                                        <p><?php echo $rows['sinopse'] ?></p>
                                                    </div>
                                                    <?php
                                                    if($rows['elenco'] != ""){
                                                        echo '<div class="tab-pane fade" id="elenco_'.$rows['id'].'" role="tabpanel" aria-labelledby="profile-tab">';
                                                            echo '<p>' . nl2br( $rows['elenco'] ). '</p>';
                                                        echo '</div>';
                                                    }
                                                    ?>

                                                    <div class="tab-pane fade" id="filme_<?php echo $rows['id'] ?>" role="tabpanel" aria-labelledby="filme-tab_<?php echo $rows['id'] ?>">
                                                        <?php if($rows['titulo_p'] != "") echo "<b>Título No Brasil: </b><em>".$rows['titulo_p']."</em><br>"; else echo ""; ?>
                                                        <?php if($rows['titulo_p'] != "") echo "<b>Título Original: </b><em>".$rows['titulo_o']."</em><br>"; else echo ""; ?>
                                                        <?php
                                                        if($rows['temporada'] == 0){ }else{
                                                            ?>
                                                            <b>Temporada:</b> <em title="Temporada do torrent"><?php echo $rows['temporada'] ?></em>
                                                            <br />
                                                            <b>Episódio:</b> <em title="Episódio do torrent"><?php echo $rows['episodio'] ?></em>
                                                            <br />
                                                            <b>Nome do Episídio:</b> <em title="Episódio do torrent"><?php echo $rows['n_epi'] ?></em>
                                                            <br />
                                                            <?php
                                                        }
                                                        ?>
                                                        <b>Ano De Lançamento:</b> <em title="Ano de lançamento do torrent"><?php echo $rows['ano'] ?></em>
                                                        <br />
                                                        <b>Duração:</b> <em title="Duração do torrent"><?php echo $rows['duracao'] ?></em>
                                                        <br />
                                                        <?php
                                                        if($rows['genero_dois'] != ""){
                                                            echo "<b>Gênero:</b> <em title='Gênero do torrent'>".$rows['genero']." | ".$rows['genero_dois']."</em>";
                                                            echo "<br>";
                                                        }else{
                                                            echo "<b>Gênero:</b> <em title='Gênero do torrent'>".$rows['genero']."</em>";
                                                            echo "<br>";
                                                        }
                                                        if($rows['diretor'] != ""){
                                                            if($rows['tipo'] == "Filme"){
                                                                echo "<b>Direção:</b> <em title='Direção do torrent'>".$rows['diretor']."</em>";
                                                            }else{
                                                                echo "<b>Criador:</b> <em title='Criador do torrent'>".$rows['diretor']."</em>";
                                                            }
                                                        }
                                                        ?>
                                                        <hr />
                                                        <b>Qualidade:</b> <em title="Qualidade do torrent"><?php echo $rows['qualidade'] ?></em>
                                                        <br />
                                                        <b>Formato:</b> <em title="Formato do torrent"><?php echo $rows['formato'] ?></em>
                                                        <br />
                                                        <b>Áudio:</b> <em title="Áudio do torrent"><?php echo $rows['audio'] ?></em>
                                                        <br />
                                                        <b>Idioma:</b> <em title="Idioma do torrent"><?php echo $rows['idioma'] ?></em>
                                                        <br />
                                                        <b>Legenda:</b> <em title="Legenda do torrent"><?php echo $rows['legenda'] ?></em>
                                                        <?php

                                                        if($rows['legenda'] != "Sem Legenda"){
                                                            echo "<br>";
                                                            echo "<b>Idioma Da Legenda:</b> <em title='Idioma da legenda do torrent'>".$rows['idioma_legenda']."</em>";
                                                        }

                                                        if($rows['imdb'] != ""){
                                                            $strin = $rows['imdb'];
                                                            $str = substr($strin, 26, 9);
                                                        ?>
                                                            <br />
                                                            IMDB: 

                                                            <span class="imdbRatingPlugin" data-user="ur93983501" data-title="<?php echo $rows['imdb'] ?>" data-style="p1"><a href="https://www.imdb.com/title/<?php echo $rows['imdb'] ?>/?ref_=plg_rt_1" target="_blank"><img src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/images/imdb_46x22.png" alt="" /></a></span><script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js";stags.parentNode.insertBefore(js,stags);})(document,"script","imdb-rating-api");</script>

                                                        <?php
                                                        }

                                                        ?>

                                                    </div>
                                                    <div class="tab-pane fade" id="rastreador_<?php echo $rows['id'] ?>" role="tabpanel" aria-labelledby="rastreador-tab_<?php echo $rows['id'] ?>">
                                                        <b>Tamanho: </b><?php echo $rows['tamanho']; ?>
                                                        <br/>
                                                        <b>Info_hash: </b><?php echo $rows['info_hash'] ?>

                                                        <?php
                                                        $dados_rastreador = $this->verPeers($rows);
                                                        if($dados_rastreador['erro']){
                                                            echo '<br />';
                                                            echo '<b>Tipo Do Torrent: </b> Externo';
                                                            echo '<br />';
                                                            echo '<b class="font-weight-bold text-success">Enviando: '.$dados_rastreador['seed'].'</b>';
                                                            echo '<br />';
                                                            echo '<b class="font-weight-bold text-danger">Baixando: '.$dados_rastreador['peer']. '</b>';
                                                        }else{
                                                            echo '<br />';
                                                            echo '<b>Tipo Do Torrent: </b> Interno';
                                                            echo '<br />';
                                                            echo '<b class="font-weight-bold text-success">Enviando: '.$dados_rastreador['seed'] . '</b>';
                                                            echo '<br />';
                                                            echo '<b class="font-weight-bold text-danger">Baixando: '.$dados_rastreador['peer'].'</b>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="card-footer text-muted">
                                                    <?php echo $rows['downloads'] ?> Downloads | Em <?php echo $rows['data'] ?>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <b id="idTorrent" lang="<?php echo $rows['id'] ?>"></b>
                <?php
            }
        }else{
            echo 'Nenhum torrent encontrado para ' . $busca;
        }
    }
    
    
    
    //Controle do usuário
    public function controleUsuario (){
        //verifica se existe o usuário logado
        if(isset($_COOKIE['login']) && isset($_COOKIE['classe'])){
            //usuário logado
            //verifica a classe do usuário
            if($_COOKIE['classe'] == 0){ //admim
                //busca a imagem do admin
                $sql_image = $this->select("admin", "*", "admin = '".$_COOKIE['login']."'");
                $img_user = "";
                while($row = mysqli_fetch_array($sql_image)){
                    if($row['foto'] != ""){
                        $img_user = $row['foto'];
                    }
                }
                
                //mostrando os dados na tela
                echo '<div class="dropdown mr-5" style="margin-right: 35px;">';
                    echo '<div class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">';
                        echo '<img src="'.$img_user.'" alt="Imagem do usuário" class="rounded-circle">';
                    echo '</div>';
                    
                    echo '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                        echo '<a class="dropdown-item" href="#">Meu Perfil</a>';
                        echo '<a class="dropdown-item" href="#">Meus Filmes</a>';
                        echo '<a class="dropdown-item" href="#">Sair</a>';
                    echo '</div>';
            }else{
                //usuário padrão
                
            }
            
        }else{
            echo '<button type="button" class="btn btn-outline-success mr-5" type="submit">Fazer Login</button>';
        }
        
        
        
    }
    
}