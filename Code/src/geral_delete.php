<?php
    ob_start();
    require("geral_usuario_logica.php");
    require("../database/usuario_bd.php");

    $resultado = deletarUsuario($_SESSION["usuario_logado"], $_SESSION["perfil"], $conexao);

    if($resultado == null){
        header("Location: geral_ajustes.php?flag=0");
        exit();
    }else{
        header("Location: geral_logout.php");
        exit();
    }
?>