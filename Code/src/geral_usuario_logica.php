<?php
session_start();

function logarColetor($emailColetor, $senha, $nomeColetor, $sbrnomeColetor, $telColetor, $perfil, $listaBairros, $listaMateriais) {
    $_SESSION["perfil"] = $perfil;

    $_SESSION["usuario_logado"] = $emailColetor;
    $_SESSION["senha"] = $senha;
    $_SESSION["nome"] = $nomeColetor;
    $_SESSION["sbrnome"] = $sbrnomeColetor;
    $_SESSION["tel"] = $telColetor;


    $_SESSION["bairros"] = [];
    $i = 1;

    foreach($listaBairros as $item){
      $_SESSION["bairros"][$i] = $item["idBairro"];
      $i++;
    }

    $_SESSION["materiais"] = [];
    $i = 1;
    
    foreach($listaMateriais as $item){
      $_SESSION["materiais"][$i] = $item["idMaterial"];
      $i++;
    }
    /**/
}

function logarDescartador($emailDescartador, $senha, $nomeDescartador, $sbrnomeDescartador, $telDescartador, $ruaCasa, $nmrCasa, $idBairro, $perfil){
  $_SESSION["perfil"] = $perfil;  
  
  $_SESSION["usuario_logado"] = $emailDescartador;
  $_SESSION["senha"] = $senha;
  $_SESSION["nome"] = $nomeDescartador;
  $_SESSION["sbrnome"] = $sbrnomeDescartador;
  $_SESSION["tel"] = $telDescartador;
  $_SESSION["ruaCasa"] = $ruaCasa;
  $_SESSION["nmrCasa"] = $nmrCasa;
  $_SESSION["idBairro"] = $idBairro;
}

function verificarUsuarioLogado() {
  return isset($_SESSION["usuario_logado"]);
}

function realizarLogout() {
  if($_SESSION["perfil"] == 0){
    unset($_SESSION["usuario_logado"]);
    unset($_SESSION["senha"]);
    unset($_SESSION["perfil"]);

    unset($_SESSION["nome"]);
    unset($_SESSION["sbrnome"]);
    unset($_SESSION["tel"]);

    unset($_SESSION["bairros"]);
    unset($_SESSION["materiais"]);
    
  }elseif($_SESSION["perfil"] == 1){
    unset($_SESSION["usuario_logado"]);
    unset($_SESSION["senha"]);
    unset($_SESSION["perfil"]);

    unset($_SESSION["nome"]);
    unset($_SESSION["sbrnome"]);
    unset($_SESSION["tel"]);
    unset($_SESSION["ruaCasa"]);
    unset($_SESSION["nmrCasa"]);
    unset($_SESSION["idBairro"]);
  }

  session_destroy();  
}

?>