<?php
    ob_start();
    header("Refresh: 120");
    require("../template/header_coletor.php");
    require("../database/usuario_bd.php");

    if(!isset($_SESSION["usuario_logado"])){
        header("Location: ../public/login.php");
        exit();
    }

    $listaColetas = AgendadasColetor($conexao, $_SESSION["usuario_logado"]);

    $nomeMateriais = [];
    $nomeMateriais[1] = 'Papel';
    $nomeMateriais[2] = 'Latinha';
    $nomeMateriais[3] = 'Plástico';
    $nomeMateriais[4] = 'PET';
    $nomeMateriais[5] = 'Vidro';
    $nomeMateriais[6] = 'Metal';
    $nomeMateriais[7] = 'Papelão';

    $listaBairros = listarBairros($conexao);

    date_default_timezone_set('America/Sao_Paulo');

    $hora_atual = date('H:i', time());
    $hoje = date('Y-m-d');

?>
        <div class="container">
            <h3 class="text-center text-dark mb-5 Cabin_SemiBold">Coletas Agendadas</h3>
        </div>
        
        <div class="container mx-auto mt-4 espacoUm">
            <div class="row">
<?php
    $algumaColeta = 0;

    if($listaColetas == NULL){
        echo'
            <div class="mb-5 mt-5 mx-auto text-center">
                <i class="material-icons info">more_time</i>
                <p class="text-muted HindGuntur espacoUm">Nenhuma coleta agendada! Comece visualizando suas solicitações de coleta e aceite alguma.</p>
            </div>
        ';
    }else{
        foreach ($listaColetas as $coleta) {//percorre a lista de todas as coletas
            foreach ($_SESSION["bairros"] as $bairroInt) {//percorre a lista de preferências por bairros 
                
                if($coleta["idBairro"] == $bairroInt){//se o bairro de coleta tiver o mesmo id de um bairro de preferência
                    //echo'<br>idColeta: ' .$coleta["idColeta"]. '; No Bairro: ' .$coleta["idBairro"]. '<br>';
                    
                    $listaMateriais = listarMateriaisColeta($conexao, $coleta["idColeta"]);//obter a lista de todos os materiais a serem descartados nessa coleta
                    
                    $exibeColeta = 1;
    
                    foreach ($listaMateriais as $material_coleta) {//percorre a lista de materiais a serem descartados
                        //echo'TEM MATERIAL: ' .$material_coleta["idMaterial"]. '';
                        
                        $flagMaterial = 0;
    
                        foreach($_SESSION["materiais"] as $material_interesse){//percorre a lista de materiais de interesse
                            
                            if($material_interesse == $material_coleta["idMaterial"]){//se o material de preferencia tiver o mesmo id do material a ser descartado
                                //echo' E INTERESSE<br>';
                                $flagMaterial = 1;
                            }
                        }
    
                        if($flagMaterial == 0){
                            $exibeColeta = 0;
                            break;
                            //echo' SEM INTERESSE<br>';
                        }
                    }
    
                    if($exibeColeta == 1){
                        if($coleta["dataColeta"] > $hoje){
                            echo'
                        <div class="col-md-4 mb-4">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-header Cabin bg-white">
                                    <h5 class="card-title">' .date('d/M/Y', strtotime($coleta["dataColeta"])). ' às ' .date('G:i', strtotime($coleta["horaColeta"])). '</h5>
                                    <h6 class="card-subtitle mb-3 text-muted">' .$coleta["ruaCasa"]. ', ' .$coleta["nmrCasa"]. ', ' .$listaBairros[($coleta["idBairro"] - 1)]["nomeBairro"]. '.</h6>
                                    <h6 class="card-subtitle mb-2 text-muted Cabin">' .$coleta["nomeDescartador"]. ', ' .$coleta["telDescartador"]. '</h6>
                                </div>
        
                                <div class="container HindGuntur">
                                    <table class="table table-borderlesss container-fluid">
                                        <tbody>
                                            <tr>
        
                            ';
                            $i = 1;
                            foreach ($listaMateriais as $material_coleta) {
                                if($i % 2 == 0){
                                    echo'
                                                
                                                <td>' .$material_coleta["qtddMaterial"]. 'Kg de ' .$nomeMateriais[$material_coleta["idMaterial"]]. '</td>
                                            </tr>
                                    ';
                                }else{
                                    echo'
                                                <td>' .$material_coleta["qtddMaterial"]. 'Kg de ' .$nomeMateriais[$material_coleta["idMaterial"]]. '</td>
                                    ';
                                }
                                $i++;
                            }
        
                            if(($i % 2) == 0){
                                echo'    
                                                <td></td>
                                            </tr>
                                ';
                            }

                            echo'
                                        </tbody>
                                    </table>
                                </div>
        
                                <div class="card-footer bg-white">
                                    <div class="mr-auto p-2 bd-highlight">
                                        <a href="../src/coletor_cancela_coleta.php?idColeta=' .$coleta["idColeta"]. '">
                                            <button class="btn btn-danger" data-toggle="tooltip" title="Cancelar"><i class="material-icons">cancel</i></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                            ';
                        }elseif ($coleta["dataColeta"] == $hoje){

                            echo'
                        <div class="col-md-4 mb-4">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="card-header Cabin bg-white">
                                    <h5 class="card-title">' .date('d/M/Y', strtotime($coleta["dataColeta"])). ' às ' .date('G:i', strtotime($coleta["horaColeta"])). '</h5>
                                    <h6 class="card-subtitle mb-3 text-muted">' .$coleta["ruaCasa"]. ', ' .$coleta["nmrCasa"]. ', ' .$listaBairros[($coleta["idBairro"] - 1)]["nomeBairro"]. '.</h6>
                                    <h6 class="card-subtitle mb-2 text-muted">' .$coleta["nomeDescartador"]. ', ' .$coleta["telDescartador"]. '</h6>
                                </div>
        
                                <div class="container HindGuntur">
                                    <table class="table table-borderlesss container-fluid">
                                        <tbody>
                                            <tr>
                                    ';

                                    $i = 1;

                                    foreach ($listaMateriais as $material_coleta) {
                                        if($i % 2 == 0){
                                            echo'
                                                        
                                                <td>' .$material_coleta["qtddMaterial"]. 'Kg de ' .$nomeMateriais[$material_coleta["idMaterial"]]. '</td>
                                            </tr>
                                            ';
                                        }else{
                                            echo'
                                                <td>' .$material_coleta["qtddMaterial"]. 'Kg de ' .$nomeMateriais[$material_coleta["idMaterial"]]. '</td>
                                            ';
                                        }
                                        $i++;
                                    }
                
                                    if(($i % 2) == 0){
                                        echo'    
                                                <td></td>
                                            </tr>
                                        ';
                                    }

                            if($hora_atual < $coleta["horaColeta"]){
                                echo'
                                            </tbody>
                                        </table>
                                    </div>
                
                                    <div class="card-footer bg-white">
                                        <div class="mr-auto p-2 bd-highlight">
                                            <a href="../src/coletor_cancela_coleta.php?idColeta=' .$coleta["idColeta"]. '">
                                                <button class="btn btn-danger" data-toggle="tooltip" title="Cancelar"><i class="material-icons">cancel</i></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                                    ';
                            }else{
                                echo'
                                            </tbody>
                                        </table>
                                    </div>
                
                                    <div class="card-footer bg-white">
                                        <div class="mr-auto p-2 bd-highlight">
                                            <a href="">
                                                <button class="btn btn-danger" disabled data-toggle="tooltip" title="Cancelar"><i class="material-icons">cancel</i></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                        ';
                            }
                        }
                        
                        $algumaColeta = 1;
                    }
                    
                }
            }
        }

        if($algumaColeta == 0){
            echo'
                <div class="mb-5 mt-5 mx-auto text-center">
                    <i class="material-icons info">more_time</i>
                    <p class="text-muted HindGuntur espacoUm">Nenhuma coleta agendada! Comece visualizando suas solicitações de coleta e aceite alguma.</p>
                </div>
            ';
        }
    }

    
    echo'
            </div>
        </div>    
    ';

    require("../template/footer.html");
?>