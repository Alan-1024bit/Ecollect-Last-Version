<?php
    ob_start();
    require("../template/header_descartador.php");
    require("../database/usuario_bd.php");

    if(isset($_SESSION["usuario_logado"])){
        echo'
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h3 class="text-center text-dark mt-5 Cabin_SemiBold">Alterar</h3>
                    <div class="card my-5">

                        <form class="card-body p-lg-5 Cabin" action="geral_valida_altera.php" method="post">

                            <div class="mb-3 row">
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="text" class="form-control" id="" placeholder="Nome" name="nome" value="' .$_SESSION["nome"]. '" disabled=disabled>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                    </small>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="text" class="form-control" id="" placeholder="Sobrenome" name="sbrnome"value="' .$_SESSION["sbrnome"]. '" disabled=disabled>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                    </small>
                                </div>

                            </div>

                            <div class="mb-3 row">

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="text" class="form-control" id="Username" aria-describedby="emailHelp"
                                    placeholder="E-mail" name="email" value="' .$_SESSION["usuario_logado"]. '" disabled=disabled>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                      </small>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="tel" class="form-control" id="telephone" placeholder="Telefone" name="tel" value="' .$_SESSION["tel"]. '">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                      </small>
                                </div>
                            </div>

                            <div class="mb-3 row">

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="password" class="form-control" id="password" placeholder="Senha" name="senha" value="' .$_SESSION["senha"]. '">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                      </small>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="password" class="form-control" id="verifyPassword" placeholder="Confirmar Senha" name="confirmarSenha" value="' .$_SESSION["senha"]. '">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                      </small>
                                </div>
                            </div>

                            <div class="mb-3 row">

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="text" class="form-control" placeholder="Rua" name="ruaCasa" value="' .$_SESSION["ruaCasa"]. '">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                      </small>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="number" class="form-control" placeholder="Nº" name="nmrCasa" value="' .$_SESSION["nmrCasa"]. '">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                      </small>
                                </div>
                            </div>

                            <div class="mb-5 row">

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <select class="custom-select" name="Bairro" id="SelectBairro">
                                        <option value="0">Selecione o bairro onde mora</option>
        ';

        $listaBairros = listarBairros($conexao);

        foreach($listaBairros as $item){
            if($item["idBairro"] == $_SESSION["idBairro"]){
            echo'     
                                        <option value="' .$item["idBairro"]. '" selected>' .$item["nomeBairro"]. '</option>
            ';
            }else{
                echo'     
                                        <option value="' .$item["idBairro"]. '">' .$item["nomeBairro"]. '</option>
                ';
            }
        }
                            
        echo'
                                    </select>
                                </div>

                            </div>

                            <div class="text-center">
                                <input type="hidden" name="perfil" value="1">
                                <button type="submit" class="btn btn-success px-5 mb-5 w-100">Alterar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        ';
    }else{
        header("Location: ../public/login.php");
        exit();
    }

    require("../template/footer.html");
?>