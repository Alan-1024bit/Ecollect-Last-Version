<?php
    ob_start();
    if($_GET["perfil"] == 0){
        require("../template/header_coletor.php");
    }else{
        require("../template/header_descartador.php");
    }

    if(isset($_SESSION["usuario_logado"])){
        if($_SESSION["perfil"] == 0){
            $main = "coletor_solicitacoes.php";
            $alterar = "coletor_altera.php";
        }else{
            $main = "descartador_solicitacoes.php";
            $alterar = "descartador_altera.php";
        }

        echo'
            <h3 class="text-center text-dark mt-5 Cabin_SemiBold">Configurações</h3>
            <div class="form-config">
                <div class="container">
                    <div class="form-group mt-5">
                        <form action="' .$alterar. '" method="POST">
                            <div class="row">
                                <div class="col-2 col-sm-2 col-md-4 col-lg-4 col-xl-4"></div>
                                <input type="submit" class="Cabin_SemiBold btn btn-secondary border-dark col-8 col-sm-8 col-md-4 col-lg-4 col-xl-4" value="Alterar dados">
                                <div class="col-2 col-sm-2 col-md-4 col-lg-4 col-xl-4"></div>
                            </div>
                        </form>

                        <div class="row mt-4">
                            <div class="col-2 col-sm-2 col-md-4 col-lg-4 col-xl-4"></div>
                            
                            <button type="button" class="Cabin_SemiBold btn btn-danger border-dark col-8 col-sm-8 col-md-4 col-lg-4 col-xl-4" data-toggle="modal" data-target="#modalExemplo">
                                Excluir conta
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">

                                    <div class="modal-content border-dark">
                                        <div class="modal-header border-dark">
                                            <h3 class="modal-title m-auto Cabin_SemiBold" id="exampleModalLabel">Atenção! Você tem certeza?</h3>
                                        </div>

                                        <div class="modal-body m-auto HindGuntur">
                                            Excluir sua conta desmarcará suas coletas e excluirá todas suas informações permanentemente!
                                        </div>
                                        <hr>
                                        <div class="m-auto container">
                                            <form action="geral_delete.php" method="POST">
                                                <div class="row">
                                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>

                                                    <button class="mb-4 Cabin btn btn-secondary border-dark col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" data-dismiss="modal">Cancelar</button>
                                                    
                                                    <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"></div>
                                                    
                                                    <button type="submit" class="mb-4 Cabin btn btn-danger border-dark col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">Confirmar</button>
                                                    
                                                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2 col-sm-2 col-md-4 col-lg-4 col-xl-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        ';

    }else {
        header("Location: ../public/login.php");
        exit();
    }

    require("../template/footer.html");
?>