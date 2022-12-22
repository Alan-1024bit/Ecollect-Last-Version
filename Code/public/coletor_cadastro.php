<?php
ob_start();
require("../database/usuario_bd.php");
require("../template/header.html");

?>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h3 class="text-center text-dark mt-5 Cabin_SemiBold">Coletor</h3>
                    <div class="text-center mb-1 text-dark HindGuntur">Cadastre-se e colete!</div>
                    <div class="card">

                        <form class="card-body p-lg-5 Cabin" action="../src/geral_valida_cadastro.php" method="post">
                            <small class="form-text text-danger HindGuntur-SemiBold text-center mb-2">
                            <?php
                                if(isset($_GET["flag"])){
                                    if($_GET["flag"] == 0){
                                        echo"Cadastro não realizado! Selecione, no mínimo, um bairro e material de sua preferência.";
                                    }elseif ($_GET["flag"] == 1) {
                                        echo"Cadastro não realizado! Algo deu errado, por favor tente novamente.";
                                    }elseif ($_GET["flag"] == 2) {
                                        echo'Usuário já cadastrado! tente fazer <a href="../public/login.php" class="text-dark fw-bold"><u>Login</u></a>';
                                    }
                                }
                            ?>
                            </small>
                            <div class="mb-3 row">
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="text" class="form-control" id="" placeholder="Nome" name="nome">
                                    <small class="form-text text-muted">
                                        
                                    </small>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="text" class="form-control" id="" placeholder="Sobrenome" name="sbrnome">
                                    <small class="form-text text-muted">
                                        
                                    </small>
                                </div>

                            </div>

                            <div class="mb-3 row">

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="email" class="form-control" id="Username" aria-describedby="emailHelp"
                                    placeholder="E-mail" name="email">
                                    <small class="form-text text-muted">
                                        
                                    </small>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="tel" class="form-control" id="telephone" placeholder="Telefone" name="tel">
                                    <small class="form-text text-muted">
                                        
                                    </small>
                                </div>
                            </div>

                            <div class="mb-3 row">

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="password" class="form-control" id="password" placeholder="Senha" name="senha">
                                    <small class="form-text text-muted">
                                        
                                    </small>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="password" class="form-control" id="verifyPassword" placeholder="Confirmar Senha" name="confirmarSenha">
                                    <small class="form-text text-muted">
                                        
                                    </small>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="divSelectBairro">
                                    <select class="custom-select" name="Bairro" id="SelectBairro">
                                        <option value="0">Selecione bairros para trabalhar*</option>
                                        <?php
                                            $listaBairros = listarBairros($conexao);

                                            foreach($listaBairros as $item){
                                                echo'
                                        <option value="' .$item["idBairro"]. '">' .$item["nomeBairro"]. '</option>
                                                ';
                                            }
                                        ?>
                                    </select>
                                    <small class="form-text text-muted" id="error-qtddBairros">
                                        No máx. 5 bairros e no mín. 1
                                    </small>
                                    <small class="material-icons" data-toggle="tooltip" title="Se não encontrar seu bairro, use o bairro mais próximo">info</small>
                                </div>
                            </div>

                            <!--CONTEÚDO DINÂMICO INSERIDO AQUI-->
                            <div class="row mb-3 mt-1">
  
                                <div class="md-form col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="divBairro">

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="divSelectMaterial">
                                    <select class="custom-select" name="Material" id="SelectMaterial">
                                        <option value="0">Selecione materiais para coletar*</option>
                                        <?php
                                            $listaMaterias = listarMateriais($conexao);

                                            foreach($listaMaterias as $item){
                                                echo'
                                        <option value="' .$item["idMaterial"]. '">' .$item["tipoMaterial"]. '</option>
                                                ';
                                            }
                                        ?>
                                    </select>

                                    <small class="form-text text-muted">
                                        No máx. 7 materiais e no mín. 1
                                    </small>
                                </div>

                            </div>

                            <!--CONTEÚDO DINÂMICO INSERIDO AQUI-->
                            <div class="row mb-5 mt-1">

                                <div class="md-form col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="divMaterial">

                                    <div class="btn-group mt-1 mb-1" role="group" aria-label="Exemplo básico">

                                    </div>

                                </div>

                            </div>

                            <div class="text-center">
                                <input type="hidden" name="qtddBairros" value="0" id="id_qtddBairros">
                                <input type="hidden" name="qtddMateriais" value="0" id="id_qtddMateriais">
                                <input type="hidden" name="perfil" value="0">
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