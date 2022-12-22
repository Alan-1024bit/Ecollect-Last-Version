<?php
    ob_start();
    require("../template/header_descartador.php");
    require("../database/usuario_bd.php");

    date_default_timezone_set('America/Sao_Paulo');

    $hoje = date('Y-m-d');
    $data_limite = date('Y-m-d', strtotime('+6 days', strtotime($hoje)));
    $hora_atual = date('H:i', time());

    if(isset($_SESSION["usuario_logado"])){
        if(isset($_GET["idColeta"])){
            if(isset($_GET["flag"])){
                echo'
                <div class="container my-5 py-4">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">

                            <h3 class="text-center text-dark mt-5 Cabin_SemiBold">Reagende uma Coleta</h3>
                ';
            }else{
                echo'
                <div class="container my-5 py-4">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">

                            <h3 class="text-center text-dark mt-5 Cabin_SemiBold">Edite uma Solicitação</h3>
                ';
            }

            
            if(isset($_GET["erro"])){
                if($_GET["erro"] == 1){
                    echo'
                        <small class="form-text text-danger text-center container">
                            Conflito de horários. Espere o coletor de sua coleta já agendada na sua residência e veja se ele pode recolher o material. Caso não possa, efetue uma nova coleta.
                        </small>
                    ';
                }elseif($_GET["erro"] == 2){
                    echo'
                        <small class="form-text text-danger text-center container">
                            Erro no horário! Tente agendar em um horário possível, entre 6 e 18 horas.
                        </small>
                    ';
                }

            }

            echo'
                        <div class="card">
                            <form class="card-body p-lg-5 Cabin mb-5" action="../src/descartador_valida_solicitacao.php?editar=1" method="post">
                                <div class="mb-3 row">            
            ';

            $coleta = SelectColetaExpirada($conexao, $_GET["idColeta"]);

            foreach ($coleta as $coletaeditada) { ?>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <input
                                            placeholder="Data de Coleta"
                                            type="text"
                                            onfocus="(this.type = 'date')"  
                                            class="form-control"
                                            name="dataColeta"
                                            required="required"
                                            <?php
                                            echo'
                                            min="' .$hoje. '"
                                            max="' .$data_limite. '"
                                            value="' .date('d/m/Y', strtotime($coletaeditada["dataColeta"])). '"
                                            ';
                                            ?>
                                        >
                                        <small class="form-text text-muted">
                                            Entre hoje e <?=date('d/m/Y', strtotime($data_limite)) ?>
                                        </small>
                                    </div>

                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <input
                                            placeholder="Hora de Coleta"
                                            type="time"
                                            class="form-control" 
                                            name="horaColeta" 
                                            required="required"
                                            min="06:00"
                                            max="18:00"
                                            <?php
                                            echo'
                                            value="' .date('H:i', strtotime($coletaeditada["horaColeta"])). '"
                                            ';
                                            ?>
                                        >
                                        <small class="form-text text-muted">
                                            Expediente: <u>6h - 18h</u><br> Coleta pode ser realizada cerca de <u>1 hora</u> após o horário solicitado.
                                        </small>
                                    </div>
                                </div>

<?php            
            };

            $listaMateriaisColeta = listarMateriaisColeta($conexao, $_GET["idColeta"]);

            foreach ($listaMateriaisColeta as $materiais) { ?>
                                <div class="mb-3 row">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <select class="custom-select" disabled>
                                            <option value="0">Selecione o material</option>
                                            <?php
                                                $listaMaterias = listarMateriais($conexao);

                                                foreach($listaMaterias as $item){
                                                    if($item["idMaterial"] == $materiais["idMaterial"]){
                                                        echo'
                                            <option value="' .$item["idMaterial"]. '" selected>' .$item["tipoMaterial"]. '</option>
                                                        ';
                                                    }else{
                                                    echo'
                                            <option value="' .$item["idMaterial"]. '">' .$item["tipoMaterial"]. '</option>
                                                    ';
                                                }                                                        
                                                    }

                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <input 
                                            type="number"
                                            class="form-control"
                                            placeholder="Peso aproximado (Kg.)"
                                            step="0.1"
                                            required="required"
                                            min="0.1"
                                            <?php
                                                echo'
                                            value="' .$materiais["qtddMaterial"]. '"
                                                ';
                                            ?>
                                            disabled
                                        >

                                        <small class="form-text text-muted">
                                            No mínimo, 100 g
                                        </small>
                                    </div>
                                </div>
<?php
            };
            echo'
                                <div class="text-center">
                                    <input type="hidden" name="idColeta" value="' .$_GET["idColeta"]. '">
            ';

            if(isset($_GET["flag"])){
                echo'
                                    <input type="hidden" name="removerColetor" value="1">
                ';
            }

            echo'
                                    <button type="submit" class="btn btn-success px-5 w-100">Editar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
            ';
        }else{
            header("Location: ../public/login.php");
            exit();
        }
    }else{
        header("Location: ../public/login.php");
        exit();
    }

    require("../template/footer.html");
?>