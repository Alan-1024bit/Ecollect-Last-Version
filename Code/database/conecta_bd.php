<?php
$servidor = "aula-dsi.mysql.database.azure.com";
$usuario = "nunes";//DEFINIR
$senha = "@bacaxi01";//DEFINIR
$banco = "ecollect";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

mysqli_set_charset($conexao, "utf8");

if (mysqli_connect_errno($conexao)) {
  echo "Não foi possível conectar ao banco. Erro: " . mysqli_connect_error();
  die();  
}
?>