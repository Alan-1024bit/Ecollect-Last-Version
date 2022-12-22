<?php
ob_start();
require("../database/conecta_bd.php");
require("../database/usuario_bd.php");
require("geral_usuario_logica.php");

$usuario = $_POST["email"];
$senha = $_POST["senha"];
$perfil = $_POST["perfil"];

$usuario = buscarUsuario($conexao, $usuario, $senha, $perfil);

if ($usuario == null) {
  header("Location: ../public/login.php?flag=1");
  exit();
} else {
  if($perfil == 0){//USUÁRIO SELECIONOU PERFIL COLETOR
    $listaBairros = LerColetorBairro($conexao, $usuario["emailColetor"]);
    $listaMateriais = LerColetorMaterial($conexao, $usuario["emailColetor"]);

    logarColetor($usuario["emailColetor"], $senha, $usuario["nomeColetor"], $usuario["sbrnomeColetor"], $usuario["telColetor"], $perfil, $listaBairros, $listaMateriais);
    header("Location: coletor_solicitacoes.php");
    exit();

  }else{//USUÁRIO NÃO SELECIONOU PERFIL COLETOR, OU SEJA, É DESCARTADOR
    logarDescartador($usuario["emailDescartador"], $senha, $usuario["nomeDescartador"], $usuario["sbrnomeDescartador"], $usuario["telDescartador"], $usuario["ruaCasa"], $usuario["nmrCasa"], $usuario["idBairro"], $perfil);
    header("Location: descartador_solicitacoes.php");
    exit();
  }
}
?>