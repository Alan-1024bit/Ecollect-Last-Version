<?php
ob_start();
require("../database/conecta_bd.php");
require("../database/usuario_bd.php");
require("../template/header.html");

?>  

        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h3 class="text-center text-dark mt-5 Cabin_SemiBold">Descartador</h3>
                    <div class="text-center mb-2 text-dark HindGuntur">Cadastre-se e descarte!</div>
                    <div class="card">

                        <form class="card-body p-lg-5 Cabin" action="../src/geral_valida_cadastro.php" method="post">
                            <small class="form-text text-danger HindGuntur-SemiBold text-center mb-2">
                                <?php
                                    if(isset($_GET["flag"])){
                                        if($_GET["flag"] == 0){
                                            echo"Cadastro não realizado! Algo deu errado, por favor tente novamente.";
                                        }elseif ($_GET["flag"] == 1) {
                                            echo'Usuário já cadastrado! tente fazer <a href="../public/login.php" class="text-dark fw-bold"><u>Login</u></a>';
                                        }
                                    }
                                ?>
                                </small>
                            <div class="mb-3 row">
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="text" class="form-control" id="" placeholder="Nome" name="nome">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                    </small>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="text" class="form-control" id="" placeholder="Sobrenome" name="sbrnome">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                    </small>
                                </div>

                            </div>

                            <div class="mb-3 row">

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="text" class="form-control" id="Username" aria-describedby="emailHelp"
                                    placeholder="E-mail" name="email">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                      </small>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="tel" class="form-control" id="telephone" placeholder="Telefone" name="tel">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                      </small>
                                </div>
                            </div>

                            <div class="mb-3 row">

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="password" class="form-control" id="password" placeholder="Senha" name="senha">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                      </small>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="password" class="form-control" id="verifyPassword" placeholder="Confirmar Senha" name="confirmarSenha">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                      </small>
                                </div>
                            </div>

                            <div class="mb-3 row">

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="" class="form-control" id="" placeholder="Rua" name="ruaCasa">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                      </small>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="" class="form-control" id="" placeholder="Nº" name="nmrCasa">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                      </small>
                                </div>
                            </div>

                            <div class="mb-5 row">

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <select class="custom-select" name="Bairro" id="SelectBairro">
                                        <option value="0">Selecione o bairro onde mora</option>
                                        <?php
                                            $listaBairros = listarBairros($conexao);

                                            foreach($listaBairros as $item){
                                                echo'
                                        <option value="' .$item["idBairro"]. '">' .$item["nomeBairro"]. '</option>
                                                ';
                                            }
                                        ?>
                                    </select>
                                    <small class="material-icons" data-toggle="tooltip" title="Se não encontrar seu bairro, use o bairro mais próximo">info</small>
                                </div>

                            </div>

                            <div class="text-center">
                                <input type="hidden" name="perfil" value="1">
                                <button type="submit" class="btn btn-success px-5 mb-5 w-100">Cadastrar</button>
                            </div>

                            <div id="emailHelp" class="form-text text-center mb-5 text-dark">

                                Já está cadastrado?

                                <a href="../public/login.php" class="text-dark fw-bold">
                                    <u>Faça Login!</u>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php 
require("../template/footer.html");
?>