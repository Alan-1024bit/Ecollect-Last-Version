<?php
ob_start();
require("../template/header_coletor.php");
require("../database/usuario_bd.php");

if(!isset($_SESSION["usuario_logado"])){
    header("Location: ../public/login.php");
    exit();
}

    if(verificaDisponibilidade($conexao, $_GET["idColeta"]) == ''){
        agendaColeta($conexao, $_GET["idColeta"], $_SESSION["usuario_logado"]);
        
        header("Location: coletor_solicitacoes.php");
        exit();
    }
?>