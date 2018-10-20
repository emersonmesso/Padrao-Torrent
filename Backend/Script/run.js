$(document).ready(function(){
    var topo = $("#navtopo");
    topo.hide();
    var urlCore = "../Backend/Core/";

    //AÇÕES COM SCROLL DA PÁGINA
    $(window).scroll(function(){
        var scrollTop = $(window).scrollTop();
        
        if(scrollTop >= 150){
            topo.fadeIn(10);
            
        }else{
            topo.fadeOut(10);
        }
    });
    
    //Mais filmes
    $("#btnMais").on('click', function(){
        var idTorrent = $("#containerFilmes b:last").attr("lang");
        var telaTorrent = $("#containerFilmes b");
        //alert(idTorrent);
        $.ajax({
            url: urlCore + "execMais.php",
            data: {idTorrent : idTorrent},
            type: "POST",
            success: function (data) {
                $("#containerFilmes").append(data);
                telaTorrent.focus();
            },
            error: function () {
                alert("Erro");
            }
        });
    });
    
    
    //Formulário de busca
    $("#formBusca").submit(function(){
        $("#btnBusca").click();
        return false;
    });
    $("#btnBusca").on('click', function(){
        //recebendo os dados
        var busca = $("#campBusca").val();
        
        if(busca == "" || busca == null){
            alert("Campo de busca em branco !\n ;)");
        }else{
            window.location.href = "http://teste.padraotorrent.com/busca/"+busca;
        }
        //
        $("#campBusca").val();
        return false;
    });
    //Ações dos Buttons
    $("#btnLink").on('click', function(){
        var link = $(this).attr("lang");
        window.location.href = link;
    });
    
    
    
    /*FORMULÁRIO DE CADASTRO DE USUÁRIOS*/
    $("#alertDanger").hide();
    $("#alertSuccess").hide();
    $("#FormCadastroUsuário").submit(function(){
        //pegando os dados do formulário
        var nome = $("#FormNome").val();
        var email = $("#FormEmail").val();
        var idade = $("#FormIdade").val();
        var sexo = $("#FormSexo option:selected").val();
        var usuario = $("#FormUser").val();
        var senha = $("#FormSenha").val();
        //alerts
        var alertaErro = $("#alertDanger");
        var alertaSucesso = $("#alertSuccess");
        var textoErro = $("textoAlertDanger");
        var textoErro = $("textoAlertSuccess");
        
        //
        var erro = false;
        
        
        //verificando os dados
        if(nome == ""){
            $(".textoAlertDanger").html("Nome Não Informado!");
            alertaErro.fadeIn(300);
            erro = true;
        }
        
        if(email == ""){
            $(".textoAlertDanger").html("E-mail Não Informado!");
            alertaErro.fadeIn(300);
            erro = true;
        }
        
        return false;
    });
    /**/
});