<?php
    ob_start();
    require("../template/header_descartador.php");
    require("../database/usuario_bd.php");

    date_default_timezone_set('America/Sao_Paulo');

    $hoje = date('Y-m-d');
    $data_limite = date('Y-m-d', strtotime('+6 days', strtotime($hoje)));
    $hora_atual = date('H:i', time());

    if(isset($_SESSION["usuario_logado"])){
?>
        <div class="container my-5 py-4">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h3 class="text-center text-dark mt-5 Cabin_SemiBold">Solicite uma Coleta</h3>
                    <div class="card">
<?php
        if(!isset($_POST["qtddMateriais"])){
?>
                        <form class="card-body p-lg-5 Cabin" action="descartador_solicita.php" method="post" id="form-qtddMateriais">

                            <small class="form-text text-danger text-center container">
                                <?php
                                    if(isset($_GET["erro"])){
                                        if($_GET["erro"] == 1){
                                            echo"Conflito de horários. Espere o coletor de sua coleta já agendada na sua residência e veja se ele pode recolher o material. Caso não possa, efetue uma nova coleta.";
                                            
                                        }
                                        if($_GET["erro"] == 2){
                                            echo"Erro no horário! Tente agendar em um horário possível, entre 6 e 18 horas.";
                                        }
                                    }
                                ?>
                            </small>

                            <div class="mb-3 row">
                                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>

                                <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                    <input
                                        type="number"
                                        step="1"
                                        min="1"
                                        max="7"
                                        placeholder="Quantos Materiais para descarte?"
                                        class="form-control"
                                        name="qtddMateriais"
                                    >

                                    <small class="form-text text-muted text-center">
                                        No mínimo, 1 e no máximo, 7.
                                    </small>
                                </div>

                                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                            </div>

                            <div class="text-center">    
                                <button type="submit" class="btn btn-success px-5 w-50">Avançar</button>
                            </div>
                        </form>
<?php
        }else{?>
                        <form class="card-body p-lg-5 Cabin mb-5" action="../src/descartador_valida_solicitacao.php" method="post">
                            <div class="mb-3 row">
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
                                        ';
                                        ?>
                                    >
                                    <small class="form-text text-muted">
                                        Entre hoje e <?=date('d/M/Y', strtotime($data_limite)) ?>
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
                                    >
                                    <small class="form-text text-muted">
                                        Expediente: <u>6h - 18h</u><br> Coleta pode ser realizada cerca de <u>1 hora</u> após o horário solicitado.
                                    </small>
                                </div>
                            </div>
<?php
    for ($i=1; $i <= $_POST["qtddMateriais"]; $i++) { ?>
                            <div class="mb-3 row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <select class="custom-select" name="Material<?=$i?>" onchange="disableOption(<?=$i?>)" id="Material<?=$i?>">
                                        <option value="0">Selecione o material</option>
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
                                        
                                    </small>
                                    <param id="optionAnterior<?=$i?>" value="0">
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input 
                                        type="number"
                                        class="form-control"
                                        placeholder="Peso aproximado (Kg.)"
                                        name="qtdd<?=$i?>"
                                        step="0.1"
                                        required="required"
                                        min="0.1"
                                    >

                                    <small class="form-text text-muted">
                                        No mínimo, 100 g
                                    </small>
                                </div>
                            </div>
  
<?php
    }
?>

                            <div class="text-center">
                                <input type="hidden" name="qtddMateriais" value="<?= $_POST["qtddMateriais"] ?>" id="qtddMateriais">
                                <button type="submit" class="btn btn-success px-5 w-100">Solicitar</button>
                            </div>
                        </form>
<?php
        }
?>
                    </div>
                </div>
            </div>
        </div>
<?php
    }else{
        header("Location: ../public/login.php");
        exit();
    }

    require("../template/footer.html");
?>