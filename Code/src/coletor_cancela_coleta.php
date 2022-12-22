<?php
ob_start();
require("../template/header_coletor.php");
require("../database/usuario_bd.php");

if(!isset($_SESSION["usuario_logado"])){
    header("Location: ../public/login.php");
    exit();
}

    cancelaColeta($conexao, $_GET["idColeta"]);
    header("Location: coletor_agendadas.php");
    exit();
?>