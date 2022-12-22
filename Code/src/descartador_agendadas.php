<?php
    ob_start();
    header("Refresh: 120");
    require("../template/header_descartador.php");
    require("../database/usuario_bd.php");

    if(!isset($_SESSION["usuario_logado"])){
        header("Location: ../public/login.php");
        exit();
    }

    $listaColetas = AgendadasDescartador($conexao, $_SESSION["usuario_logado"]);

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
            <h3 class="text-center text-dark mb-5 Cabin_SemiBold">Coletas Agendadas</h3>
        </div>
        
        <div class="container mx-auto mt-4 mb-5 p-4 espacoUm">
            <div class="row espacoUm">
<?php
    if($listaColetas == NULL){
        echo'
            <div class="mb-5 mt-5 mx-auto text-center">
                <i class="material-icons info">more_time</i>
                <p class="text-muted HindGuntur espacoUm">Nenhum pedido de coleta! Tente novamente mais tarde.</p>
            </div>
        ';
    }else{
        $contador = 0;
        foreach($listaColetas as $coleta){
            if($flag == 0){
                if($coleta["dataColeta"] < $hoje){
                    deletarSolicitacaoColeta($conexao, $coleta["idColeta"]);
                    header("Location: descartador_agendadas.php");
                    exit();
                }else{
                    
                    $ultimo_idColeta = $coleta["idColeta"];

                    echo'
                <div class="col-md-4 mb-4">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-header Cabin bg-white">
                            <h5 class="card-title" >' .date('d/M/Y', strtotime($coleta["dataColeta"])). ' às ' .date('G:i', strtotime($coleta["horaColeta"])). '</h5>
                            <h6 class="card-subtitle mb-2 text-muted">' .$coleta["nomeColetor"]. ' ' .$coleta["sbrnomeColetor"]. ' - ' .$coleta["telColetor"]. '</h6>
                        </div>

                        <div class="container HindGuntur">
                            <table class="table table-borderlesss container-fluid">
                                <tbody>
                                    <tr>
                                        <td>' .$coleta["qtddMaterial"]. 'kg de ' .$nomeMateriais[$coleta["idMaterial"]].'</td>
                    ';

                    $flag = 1;
                    $i++;
                }
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
                        $i--;
                    }

                    if($hoje == $listaColetas[$contador-1]["dataColeta"] && $hora_atual > $coleta["horaColeta"]){
                        echo'
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
            
                                    <div class="card-footer bg-white">
                                        Coleta realizada?
                                        <div class="d-flex bd-highlight">
                                            <a href="descartador_delete_solicitacao.php?idColeta=' .$listaColetas[$contador-1]["idColeta"]. '" class="p-2 bd-highlight">
                                                <button class="btn btn-success"><i class="material-icons">thumb_up</i></button>
                                            </a>
            
                                            <div class="mr-auto p-2 bd-highlight"></div>
            
                                            <div class="text-center p-2 bd-highlight">
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="testando(' .$listaColetas[$contador-1]["idColeta"]. ')"><i class="material-icons">thumb_down</i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                        ';
                    }else{
                        echo'
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
            
                                    <div class="card-footer bg-white">
                                        <div class="d-flex bd-highlight justify-content-center">
                                            <div class="align-content-center p-2 bd-highlight">
                                                <a href="descartador_delete_solicitacao.php?idColeta=' .$listaColetas[$contador-1]["idColeta"]. '">
                                                    <button class="btn btn-danger" data-toggle="tooltip" title="Você excluirá permanentemente essa coleta!"><i class="material-icons">cancel</i></button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                            ';
                    }


                    if($coleta["dataColeta"] < $hoje){
                        deletarSolicitacaoColeta($conexao, $coleta["idColeta"]);
                        header("Location: descartador_agendadas.php");
                        exit();
                    }else{
                        $ultimo_idColeta = $coleta["idColeta"];

                        echo'
                <div class="col-md-4 mb-4">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-header Cabin bg-white">
                            <h5 class="card-title">' .date('d/M/Y', strtotime($coleta["dataColeta"])). ' às ' .date('G:i', strtotime($coleta["horaColeta"])). '</h5>
                            <h6 class="card-subtitle mb-2 text-muted">' .$coleta["nomeColetor"]. ' ' .$coleta["sbrnomeColetor"]. ' - ' .$coleta["telColetor"]. '</h6>
                        </div>

                        <div class="container HindGuntur">
                            <table class="table table-borderlesss container-fluid">
                                <tbody>
                                    <tr>
                                        <td>' .$coleta["qtddMaterial"]. 'kg de ' .$nomeMateriais[$coleta["idMaterial"]]. '</td>
                        ';

                        $i++;                        
                    }
                }
            }
            $contador++;
        }

        if($flag == 1){
            if($hoje == $listaColetas[$contador-1]["dataColeta"] && $hora_atual > $coleta["horaColeta"]){
                echo'
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer bg-white">
                                Coleta realizada?
                                <div class="d-flex bd-highlight">
                                    <a href="descartador_delete_solicitacao.php?idColeta=' .$ultimo_idColeta. '" class="p-2 bd-highlight">
                                        <button class="btn btn-success"><i class="material-icons">thumb_up</i></button>
                                    </a>

                                    <div class="mr-auto p-2 bd-highlight"></div>

                                    <div class="text-center p-2 bd-highlight">
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="testando(' .$coleta["idColeta"]. ')"><i class="material-icons">thumb_down</i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                ';
            }else{
                echo'
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer bg-white">
                                <div class="d-flex bd-highlight justify-content-center">
                                    <div class="align-content-center p-2 bd-highlight">
                                        <a href="descartador_delete_solicitacao.php?idColeta=' .$ultimo_idColeta. '">
                                            <button class="btn btn-danger" data-toggle="tooltip" title="Você excluirá permanentemente essa coleta!"><i class="material-icons">cancel</i></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    ';
            }     
        }
    }
?>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content border-dark">
                    <div class="modal-header border-dark">
                        <h3 class="modal-title m-auto Cabin_SemiBold" id="exampleModalLabel">Coleta não realizada!</h3>
                        <button class="btn btn-secondary" data-dismiss="modal"><i class="material-icons">close</i></button>
                    </div>

                    <div class="modal-body m-auto HindGuntur">
                        Lamentamos o transtorno. Tente reagendar para que outro coletor possa coletá-la, ou exclua:
                    </div>
                    <hr>
                    <div class="m-auto container">
                        <div class="row">
                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>

                            <a href="" class="mb-4 col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center" id="edit">
                                <button class="Cabin btn btn-secondary pr-5 pl-5"><i class="material-icons">edit_calendar</i></button>
                            </a>

                            <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"></div>

                            <a href="" class="mb-4 col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center" id="delete">
                                <button class="Cabin btn btn-danger pr-5 pl-5"><i class="material-icons">delete</i></button>
                            </a>

                            <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php

    require("../template/footer.html");
?>