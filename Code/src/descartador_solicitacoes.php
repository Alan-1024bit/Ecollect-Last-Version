<?php
    ob_start();
    header("Refresh: 120");
    require("../template/header_descartador.php");
    require("../database/usuario_bd.php");

    if(!isset($_SESSION["usuario_logado"])){
        header("Location: ../public/login.php");
        exit();
    }

    if(isset($_GET["flag"])){
        if ($_GET["flag"] == 0) {
            echo'
                <div class="text-success mt-2 mb-3 Roboto-Medium text-center">Alteração realizada com sucesso!</div>            
            ';
        }
    }

    $listaColetas = SolicitacaoDescartador($conexao, $_SESSION["usuario_logado"]);

    $nomeMateriais = [];
    $nomeMateriais[1] = 'Papel';
    $nomeMateriais[2] = 'Latinha';
    $nomeMateriais[3] = 'Plástico';
    $nomeMateriais[4] = 'PET';
    $nomeMateriais[5] = 'Vidro';
    $nomeMateriais[6] = 'Metal';
    $nomeMateriais[7] = 'Papelão';

    $flag = 0;
    $i = 1;

    date_default_timezone_set('America/Sao_Paulo');

    $hora_atual = date('H:i', time());
    $hoje = date('Y-m-d');
?>
        <div class="container">
            <h3 class="text-center text-dark mb-5 Cabin_SemiBold">Coletas Solicitadas</h3>
        </div>
        
        <div class="container mx-auto mt-4 mb-5 p-4 ">
            <div class="row espacoUm">
                <div class="col-md-4 mb-4">
                    <div class="card text-center card-add" style="width: 18rem;">
                        <a href="../src/descartador_solicita.php">
                            <p class="material-icons icon-add mt-5">add_circle</p>
                        </a>                         
                    </div>
                   
                </div>
<?php
    
    foreach($listaColetas as $coleta){

        if($flag == 0){
            $ultimo_idColeta = $coleta["idColeta"];
           
            if($hoje == $coleta["dataColeta"] && $hora_atual <= $coleta["horaColeta"] || $hoje < $coleta["dataColeta"]){
                echo'
                <div class="col-md-4 mb-4">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-header Cabin bg-white">
                            <h5 class="card-title">' .date('d/M/Y', strtotime($coleta["dataColeta"])). ' às ' .date('G:i', strtotime($coleta["horaColeta"])). '</h5>
                        </div>

                        <div class="container HindGuntur">
                            <table class="table table-borderlesss container-fluid">
                                <tbody>
                                    <tr>
                                        <td>' .$coleta["qtddMaterial"]. 'kg de ' .$nomeMateriais[$coleta["idMaterial"]].'</td>
                ';
            }else{
                echo'
                <div class="col-md-4 mb-4">
                    <div class="card text-center border border-danger" style="width: 18rem;"  data-toggle="tooltip" title="Solicitação expirada. Tente alterar a data e hora para que coletores possam visualizar sua solicitação">
                        <div class="card-header Cabin bg-white">
                            <h6 class="card-subtitle text-danger"> <i class="material-icons ">warning</i></h6>
                            <h5 class="card-title">' .date('d/M/Y', strtotime($coleta["dataColeta"])). ' às ' .date('G:i', strtotime($coleta["horaColeta"])). '</h5>
                        </div>

                        <div class="container HindGuntur">
                            <table class="table table-borderlesss container-fluid">
                                <tbody>
                                    <tr>
                                        <td>' .$coleta["qtddMaterial"]. 'kg de ' .$nomeMateriais[$coleta["idMaterial"]].'</td>
                ';
            }

            $flag = 1;
            $i++;
        }else{
            if($ultimo_idColeta == $coleta["idColeta"]){
                if($i == 1){
                    echo'
                                    <tr>
                                        <td>' .$coleta["qtddMaterial"]. 'kg de ' .$nomeMateriais[$coleta["idMaterial"]].'</td>
                    ';
                    $i++;

                }else{
                    echo'
                                        <td>' .$coleta["qtddMaterial"]. 'kg de ' .$nomeMateriais[$coleta["idMaterial"]].'</td>
                                    </tr>
                    ';
                    $i--;
                }

            }else{
                if($i == 2){
                    echo'
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer bg-white">
                            <div class="d-flex bd-highlight">
                                <div class="text-center p-2 bd-highlight">
                                    <a href="descartador_edita_solicitacao.php?idColeta=' .$ultimo_idColeta. '">
                                        <button class="btn btn-secondary"><i class="material-icons">edit_calendar</i></button>
                                    </a>
                                </div>

                                <div class="mr-auto p-2 bd-highlight"></div>

                                <div class="text-center p-2 bd-highlight">
                                    <a href="descartador_delete_solicitacao.php?idColeta=' .$ultimo_idColeta. '">
                                        <button class="btn btn-danger"><i class="material-icons">delete</i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    ';

                    $i--;
                }else{
                    echo'
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer bg-white">
                            <div class="d-flex bd-highlight">
                                <div class="text-center p-2 bd-highlight">
                                    <a href="descartador_edita_solicitacao.php?idColeta=' .$ultimo_idColeta. '">
                                        <button class="btn btn-secondary"><i class="material-icons">edit_calendar</i></button>
                                    </a>
                                </div>

                                <div class="mr-auto p-2 bd-highlight"></div>

                                <div class="text-center p-2 bd-highlight">
                                    <a href="descartador_delete_solicitacao.php?idColeta=' .$ultimo_idColeta. '">
                                        <button class="btn btn-danger"><i class="material-icons">delete</i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    ';
                }

                $ultimo_idColeta = $coleta["idColeta"];

                if($hoje == $coleta["dataColeta"] && $hora_atual <= $coleta["horaColeta"] || $hoje < $coleta["dataColeta"]){
                    echo'
                    <div class="col-md-4 mb-4">
                        <div class="card text-center" style="width: 18rem;">
                            <div class="card-header Cabin bg-white">
                                <h5 class="card-title">' .date('d/M/Y', strtotime($coleta["dataColeta"])). ' às ' .date('G:i', strtotime($coleta["horaColeta"])). '</h5>
                            </div>
    
                            <div class="container HindGuntur">
                                <table class="table table-borderlesss container-fluid">
                                    <tbody>
                                        <tr>
                                            <td>' .$coleta["qtddMaterial"]. 'kg de ' .$nomeMateriais[$coleta["idMaterial"]].'</td>
                    ';
                }else{
                    echo'
                    <div class="col-md-4 mb-4">
                        <div class="card text-center border border-danger" style="width: 18rem;"  data-toggle="tooltip" title="Solicitação expirada. Tente alterar a data e hora para que coletores possam visualizar sua solicitação">
                            <div class="card-header Cabin bg-white">
                                <h6 class="card-subtitle text-danger"> <i class="material-icons">warning</i></h6>
                                <h5 class="card-title">' .date('d/M/Y', strtotime($coleta["dataColeta"])). ' às ' .date('G:i', strtotime($coleta["horaColeta"])). '</h5>
                            </div>
    
                            <div class="container HindGuntur">
                                <table class="table table-borderlesss container-fluid">
                                    <tbody>
                                        <tr>
                                            <td>' .$coleta["qtddMaterial"]. 'kg de ' .$nomeMateriais[$coleta["idMaterial"]].'</td>
                    ';
                }

                $i++;
            }
        }
    }
    if($flag == 1){
        echo'
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer bg-white">
                            <div class="d-flex bd-highlight">
                                <div class="text-center p-2 bd-highlight">
                                    <a href="descartador_edita_solicitacao.php?idColeta=' .$ultimo_idColeta. '">
                                        <button class="btn btn-secondary"><i class="material-icons">edit_calendar</i></button>
                                    </a>
                                </div>

                                <div class="mr-auto p-2 bd-highlight"></div>

                                <div class="text-center p-2 bd-highlight">
                                    <a href="descartador_delete_solicitacao.php?idColeta=' .$ultimo_idColeta. '">
                                        <button class="btn btn-danger"><i class="material-icons">delete</i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';        
    }

?>
            </div>
        </div>
<?php

    require("../template/footer.html");
?>