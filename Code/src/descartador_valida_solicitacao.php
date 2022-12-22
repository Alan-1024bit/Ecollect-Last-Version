<?php
    ob_start();
    require("../src/geral_usuario_logica.php");
    require("../database/usuario_bd.php");

    $concluida = 0;
    $flagErro = 0;

    if(isset($_POST["removerColetor"])){
        cancelaColeta($conexao, $_POST["idColeta"]);
    }

    date_default_timezone_set('America/Sao_Paulo');

    $hora_atual = date('H:i', time());
    $hoje = date('Y-m-d');

    $resultado = buscarColeta($conexao, $_SESSION["usuario_logado"], $_POST["dataColeta"]);
    
    if($resultado == null){//caso não tenha nenhuma coleta previamente cadastrada no banco para o dia selecionado pelo usuário
        if($_POST["dataColeta"] == $hoje){
            if($_POST["horaColeta"] >= "06:00" && $_POST["horaColeta"] <= "18:00" && $_POST["horaColeta"] >= $hora_atual){
                if(isset($_GET["editar"])){
                    editarSolicitacao($conexao, $_POST["idColeta"], $_POST["dataColeta"], $_POST["horaColeta"]);
                }else{
                    insereColeta($conexao, $_SESSION["usuario_logado"], $_POST["dataColeta"], $_POST["horaColeta"], $concluida);
                    
                    $idColeta = buscarIdColeta($conexao, $_POST["horaColeta"], $_POST["dataColeta"], $_SESSION["usuario_logado"]);
    
                    for($i = 1; $i <= $_POST["qtddMateriais"]; $i++){
                        insereColetaMaterial($conexao, $idColeta, $_POST['Material' .$i. ''], $_POST['qtdd' .$i. '']);
                    }
                }
                    
                header("Location: descartador_solicitacoes.php");
                exit();
            }else{
                if(isset($_GET["editar"])){
                    header('Location: descartador_edita_solicitacao.php?idColeta=' .$_POST["idColeta"]. '&&erro=2');
                    exit();
                }else{
                    header("Location: descartador_solicita.php?erro=2");
                    exit();
                }
            }
        }else{
            if($_POST["horaColeta"] >= "06:00" && $_POST["horaColeta"] <= "18:00"){
                if(isset($_GET["editar"])){
                    editarSolicitacao($conexao, $_POST["idColeta"], $_POST["dataColeta"], $_POST["horaColeta"]);
                }else{
                    insereColeta($conexao, $_SESSION["usuario_logado"], $_POST["dataColeta"], $_POST["horaColeta"], $concluida);
                    
                    $idColeta = buscarIdColeta($conexao, $_POST["horaColeta"], $_POST["dataColeta"], $_SESSION["usuario_logado"]);
    
                    for($i = 1; $i <= $_POST["qtddMateriais"]; $i++){
                        insereColetaMaterial($conexao, $idColeta, $_POST['Material' .$i. ''], $_POST['qtdd' .$i. '']);
                    }
                }

                header("Location: descartador_solicitacoes.php");
                exit();
            }else{
                if(isset($_GET["editar"])){
                    header('Location: descartador_edita_solicitacao.php?idColeta=' .$_POST["idColeta"]. '&&erro=1');
                    exit();
                }else{
                    header("Location: descartador_solicita.php?erro=2");
                    exit();
                }
            }
        }

    }else{//caso tenha alguma coleta previamente cadastrada no banco para o dia selecionado pelo usuário
        $erro = FALSE;

        foreach ($resultado as $coleta) {

            $horaColetaexistente = $coleta["horaColeta"];
            $horanovaColeta = $_POST["horaColeta"];

            $duracaoColetaexistente = date('H:i:s', strtotime('+ 1 hours', strtotime($horaColetaexistente)));
            $duracaonovaColeta = date('H:i:s', strtotime('+ 1 hours', strtotime($horanovaColeta)));

            if(!($horaColetaexistente != $horanovaColeta &&
            $horanovaColeta >= $duracaoColetaexistente ||
            $duracaonovaColeta <= $horaColetaexistente)){
                $erro = TRUE;
                break;
            }
        }

        if($erro == TRUE){
            if(isset($_GET["editar"])){
                header('Location: descartador_edita_solicitacao.php?idColeta=' .$_POST["idColeta"]. '&&erro=1');
                exit();
            }else{
                header("Location: descartador_solicita.php?erro=2");
                exit();
            }
        }else{
            if(isset($_GET["editar"])){
                editarSolicitacao($conexao, $_POST["idColeta"], $_POST["dataColeta"], $_POST["horaColeta"]);
            }else{
                insereColeta($conexao, $_SESSION["usuario_logado"], $_POST["dataColeta"], $_POST["horaColeta"], $concluida);
                
                $idColeta =  buscarIdColeta($conexao, $_POST["horaColeta"], $_POST["dataColeta"], $_SESSION["usuario_logado"]);

                for($i = 1; $i <= $_POST["qtddMateriais"]; $i++){
                    insereColetaMaterial($conexao, $idColeta, $_POST['Material' .$i. ''], $_POST['qtdd' .$i. '']);
                }
            }
            header("Location: descartador_solicitacoes.php");
            exit();
        }
    }
?>
