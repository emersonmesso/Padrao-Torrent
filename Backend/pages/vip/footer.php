    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FORMULÁRIO DE CADASTRO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="" id="FormCadastroUsuário">
                    <div class="modal-body">
                        <b class="text-danger">Todos os campos são obrigatórios</b>

                        <div class="form-group">
                            <h3 class="text-muted">Dados Pessoais</h3>
                            <label for="FormNome">Nome:</label>
                            <input type="text" name="nome" minlength="3" maxlength="40" id="FormNome" class="form-control">

                            <label for="FormIdade">Idade:</label>
                            <input type="number" name="idade" id="FormIdade" class="form-control">
                            <label for="FormSexo">Sexo:</label>
                            <select name="sexo" id="FormSexo" class="form-control">
                                <option value="">Selecione</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <h3 class="text-muted">Dados De Acesso</h3>
                            <label for="FormEmail">E-mail:</label>
                            <input type="email" name="email" id="FormEmail" class="form-control">
                            
                            <label for="FormUser">Usuário:</label>
                            <input type="text" name="usuario" id="FormUser" class="form-control">
                            
                            <label for="FormSenha">Senha:</label>
                            <input type="password" name="usuario" id="FormSenha" class="form-control">
                            
                        </div>
                        
                        <div class="form-group">
                            <div class="alert alert-danger alert-dismissible" role="alert" id="alertDanger">
                                <p class="textoAlertDanger">Texto Aqui</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="alert alert-success alert-dismissible" role="alert" id="alertSuccess">
                                <p class="textoAlertSuccess">Texto Aqui</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Limpar Campos</button>
                        <button type="submit" class="btn btn-success">Concluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!---->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="../../Backend/Script/functions.js"></script>
    <script src="../../Backend/Script/run.js"></script>
    </body>
</html>