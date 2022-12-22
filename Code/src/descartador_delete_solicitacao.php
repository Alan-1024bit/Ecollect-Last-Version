<?php
    ob_start();
    require("../database/usuario_bd.php");
    require("geral_usuario_logica.php");

    $resultado = deletarSolicitacaoColeta($conexao, $_GET["idColeta"]);

    if($resultado == null){
        header("Location: descartador_solicitacoes.php?flag=1");
        exit();
    }else{
        header("Location: descartador_solicitacoes.php");
        exit();
    }
?>