<?php
    ob_start();
    require("../template/header_coletor.php");
    require("../database/usuario_bd.php");

    if(isset($_SESSION["usuario_logado"])){
        echo'
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h3 class="text-center text-dark Cabin_SemiBold">Alterar</h3>
                    <div class="card my-5">

                        <form class="card-body p-lg-5 Cabin" action="geral_valida_altera.php" method="post">

                            <div class="mb-3 row">
                                
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="text" class="form-control" id="" placeholder="Nome" name="nome" value="' .$_SESSION["nome"]. '" disabled=disabled>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                    </small>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="text" class="form-control" id="" placeholder="Sobrenome" name="sbrnome" value="' .$_SESSION["sbrnome"]. '" disabled=disabled>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        
                                    </small>
                                </div>

                            </div>

                            <div class="mb-3 row">

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="email" class="form-control" id="Username" aria-describedby="emailHelp"
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


                            <div class="row">

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="divSelectBairro">
                                    <select class="custom-select" name="Bairro" id="SelectBairro">
                                        <option value="0">Selecione bairros para trabalhar*</option>
        ';

        $listaBairros = listarBairros($conexao);

        foreach($listaBairros as $item){
            for ($i=1, $flag = 0; $i <= sizeof($_SESSION["bairros"]) && $flag != 1; $i++) { 
                if($_SESSION["bairros"][$i] == $item["idBairro"]){
                    echo'
                                        <option value="' .$item["idBairro"]. '" disabled="disabled">' .$item["nomeBairro"]. '</option>
                    ';
                    $flag = 1;
                }
            }

            if($flag == 0){
                echo'
                                    <option value="' .$item["idBairro"]. '">' .$item["nomeBairro"]. '</option>
                ';
            }
        }

        echo'
                                    </select>
                                </div>
                            </div>

                            <!--CONTEÚDO DINÂMICO INSERIDO AQUI-->
                            <div class="row mb-3 mt-1">
  
                                <div class="md-form col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="divBairro">
        ';

        foreach($listaBairros as $item){    
            for ($i=1; $i <= sizeof($_SESSION["bairros"]); $i++) {
                if($item["idBairro"] == $_SESSION["bairros"][$i]){
                    echo'
                                        <div class="btn-group mt-1 mb-1" role="group" aria-label="Exemplo básico" id="InputBairroHidden' .$item["idBairro"]. '">
                                            <button type="button" class="btn btn-secondary disable">' .$item["nomeBairro"]. '</button>
                                            <button type="button" class="btn btn-secondary material-icons" id="buttonDeleteBairro' .$item["idBairro"]. '" onclick="DeleteBairro(' .$item["idBairro"]. ')">close</button>
                            
                                            <input type="hidden" name="Bairro' .$item["idBairro"]. '" value="' .$item["idBairro"]. '">
                                        </div>
                    ';
                }
            }
        }

        echo'
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="divSelectMaterial">
                                    <select class="custom-select" name="Material" id="SelectMaterial">
                                        <option value="0">Selecione materiais para coletar*</option>
        ';

        $listaMateriais = listarMateriais($conexao);

        foreach($listaMateriais as $item){
            for ($i=1, $flag = 0; $i <= sizeof($_SESSION["materiais"]) && $flag != 1; $i++) { 
                if($_SESSION["materiais"][$i] == $item["idMaterial"]){
                    echo'
                                        <option value="' .$item["idMaterial"]. '" disabled="disabled">' .$item["tipoMaterial"]. '</option>
                    ';
                    $flag = 1;
                }
            }

            if($flag == 0){
                echo'
                                        <option value="' .$item["idMaterial"]. '">' .$item["tipoMaterial"]. '</option>
                ';
            }
        }

        echo'
                                      </select>
                                </div>

                            </div>

                            <!--CONTEÚDO DINÂMICO INSERIDO AQUI-->
                            <div class="row mb-5 mt-1">

                                <div class="md-form col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="divMaterial">
        ';

        foreach($listaMateriais as $item){
            for ($i=1; $i <= sizeof($_SESSION["materiais"]); $i++) { 
                if($item["idMaterial"] == $_SESSION["materiais"][$i]){
                    echo'
                                        <div class="btn-group mt-1 mb-1" role="group" aria-label="Exemplo básico" id="InputMaterialHidden' .$item["idMaterial"]. '">
                                            <button type="button" class="btn btn-secondary disable">' .$item["tipoMaterial"]. '</button>
                                            <button type="button" class="btn btn-secondary material-icons" id="buttonDeleteMaterial' .$item["idMaterial"]. '" onclick="DeleteMaterial(' .$item["idMaterial"]. ')">close</button>
                                
                                            <input type="hidden" name="Material' .$item["idMaterial"]. '" value="' .$item["idMaterial"]. '">
                                        </div>
                    ';
                }
            }
        }

        echo'

                                </div>

                            </div>

                            <div class="text-center">
                                <input type="hidden" name="qtddBairros" value="' .sizeof($_SESSION["bairros"]). '" id="id_qtddBairros">
                                <input type="hidden" name="qtddMateriais" value="' .sizeof($_SESSION["materiais"]). '" id="id_qtddMateriais">
                                <input type="hidden" name="perfil" value="0">
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