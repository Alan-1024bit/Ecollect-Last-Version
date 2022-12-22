<?php
require("conecta_bd.php");

function buscarUsuario($conexao, $usuario, $senha, $perfil) {
  $usuario = mysqli_real_escape_string($conexao, $usuario);
  $senha = mysqli_real_escape_string($conexao, $senha);
  $senha_md5 = md5($senha);

  if($perfil == 0){//COLETOR
    $sql = "SELECT emailColetor, senha, nomeColetor, sbrnomeColetor, telColetor FROM COLETOR
    WHERE emailColetor = '$usuario' AND senha ='$senha_md5'";
  }else{//DESCARTADOR
    $sql = "SELECT emailDescartador, senha, nomeDescartador, sbrnomeDescartador, telDescartador, ruaCasa, nmrCasa, idBairro FROM DESCARTADOR
    WHERE emailDescartador = '$usuario' AND senha ='$senha_md5'";
}

  $resultado = mysqli_query($conexao, $sql);
  return mysqli_fetch_assoc($resultado);
}

function cadastrarDescartador($conexao, $emailDescartador, $senha, 
$nomeDescartador,$sbrnomeDescartador, $telDescartador, $ruaCasa, $nmrCasa, $idBairro){
  
  $emailDescartador = mysqli_real_escape_string($conexao, $emailDescartador);
  $senha = mysqli_real_escape_string($conexao, $senha);
  $senha_md5 = md5($senha);
  
  $sql = 
"INSERT INTO DESCARTADOR
  (emailDescartador, senha, nomeDescartador, sbrnomeDescartador, telDescartador, ruaCasa, nmrCasa, idBairro) 
VALUES 
  ('$emailDescartador',
  '$senha_md5',
  '$nomeDescartador',
  '$sbrnomeDescartador',
  '$telDescartador',
  '$ruaCasa',
  '$nmrCasa',
  '$idBairro')";

$resultado = mysqli_query($conexao, $sql);
return $resultado;
}

function cadastrarColetor($conexao, $emailColetor, $senha, $nomeColetor, $sbrnomeColetor, $telColetor){
  
  $emailColetor = mysqli_real_escape_string($conexao, $emailColetor);
  $senha = mysqli_real_escape_string($conexao, $senha);
  $senha_md5 = md5($senha);
  
  $sql = 
"INSERT INTO COLETOR
  (emailColetor, senha, nomeColetor, sbrnomeColetor, telColetor) 
VALUES 
  ('$emailColetor',
  '$senha_md5',
  '$nomeColetor',
  '$sbrnomeColetor',
  '$telColetor')";

$resultado = mysqli_query($conexao, $sql);
return $resultado;
}

function insereColetorBairro($conexao, $emailColetor, $idBairro){
  $sql =
"INSERT INTO COLETOR_BAIRRO
(emailColetor, idBairro) 
VALUES 
('$emailColetor',
'$idBairro')";

return mysqli_query($conexao, $sql);
}

function LerColetorBairro($conexao, $emailColetor){
  $listaBairros = [];

  $sql = "SELECT idBairro FROM COLETOR_BAIRRO WHERE emailColetor = '$emailColetor'";

  $resultado = mysqli_query($conexao, $sql);
  while ($bairro = mysqli_fetch_assoc($resultado)) {
    array_push($listaBairros, $bairro);
  }

  return $listaBairros;
}

function insereColetorMaterial($conexao, $emailColetor, $idMaterial){
  $sql =
"INSERT INTO COLETOR_MATERIAL
(idMaterial, emailColetor) 
VALUES 
('$idMaterial',
'$emailColetor')";

return mysqli_query($conexao, $sql);
}

function LerColetorMaterial($conexao, $emailColetor){
  $listaMateriais = [];

  $sql = "SELECT idMaterial FROM COLETOR_MATERIAL WHERE emailColetor = '$emailColetor'";

  $resultado = mysqli_query($conexao, $sql);
  while ($material = mysqli_fetch_assoc($resultado)) {
    array_push($listaMateriais, $material);
  }

  return $listaMateriais;
}

function deletarUsuario($usuario, $perfil, $conexao){

  if($perfil == 0){

    $sql = "DELETE FROM coletor WHERE emailColetor = '$usuario'";

  }elseif($perfil == 1){

    $sql = "DELETE FROM descartador WHERE emailDescartador = '$usuario'";
  }
  
  return mysqli_query($conexao, $sql);
}

function listarBairros($conexao){
  $listaBairros = [];
  $sql = "SELECT idBairro, nomeBairro FROM BAIRRO";

  $resultado = mysqli_query($conexao, $sql);
  while ($bairro = mysqli_fetch_assoc($resultado)) {
      array_push($listaBairros, $bairro);
  }

  return $listaBairros;
}

function listarMateriais($conexao){
  $listaMateriais = [];
  $sql = "SELECT idMaterial, tipoMaterial FROM MATERIAL";

  $resultado = mysqli_query($conexao, $sql);
  while ($material = mysqli_fetch_assoc($resultado)) {
      array_push($listaMateriais, $material);
  }

  return $listaMateriais;
}

function alterarDescartador($conexao, $emailDescartador, $senha,
$telDescartador, $ruaCasa, $nmrCasa, $idBairro){

  $senha = mysqli_real_escape_string($conexao, $senha);
  $senha_md5 = md5($senha);
  
  $sql = 
  "UPDATE
    DESCARTADOR
  SET
    senha = '$senha_md5',
    telDescartador = '$telDescartador',
    ruaCasa = '$ruaCasa',
    nmrCasa = '$nmrCasa',
    idBairro = '$idBairro'
  WHERE
    emailDescartador = '$emailDescartador'
  ";

  $resultado = mysqli_query($conexao, $sql);
  return $resultado;
}

function alterarColetor($conexao, $emailColetor, $senha, $telColetor){

  $senha = mysqli_real_escape_string($conexao, $senha);
  $senha_md5 = md5($senha);
  
  $sql = 
  "UPDATE
    COLETOR
  SET
    senha = '$senha_md5',
    telColetor = '$telColetor'
  WHERE
    emailColetor = '$emailColetor'
  ";

  $resultado = mysqli_query($conexao, $sql);
  return $resultado;
}


function deleteColetorBairro($conexao, $emailColetor){
  $sql =
"DELETE FROM
  COLETOR_BAIRRO
WHERE
  emailColetor = '$emailColetor'";

return mysqli_query($conexao, $sql);
}

function deleteColetorMaterial($conexao, $emailColetor){
  $sql =
"DELETE FROM
  COLETOR_MATERIAL
WHERE
  emailColetor = '$emailColetor'";

return mysqli_query($conexao, $sql);
}


function buscarColeta($conexao, $emailDescartador, $dataColeta){

  $listaColetas = [];

  $sql = "SELECT emailDescartador, dataColeta, horaColeta FROM COLETA WHERE emailDescartador = '$emailDescartador' AND dataColeta = '$dataColeta'";

  $resultado = mysqli_query($conexao, $sql);

  while ($coleta = mysqli_fetch_assoc($resultado)) {
      array_push($listaColetas, $coleta);
  }

  return $listaColetas;
}

function insereColeta($conexao, $emailDescartador, $dataColeta,
    $horaColeta){

  $sql =
  "INSERT INTO COLETA
    (emailDescartador,
    dataColeta,
    horaColeta,
    emailColetor) 
  VALUES 
  ('$emailDescartador',
  '$dataColeta',
  '$horaColeta',
  NULL)";
  
  mysqli_query($conexao, $sql);
}


function buscarIdColeta($conexao, $horaColeta, $dataColeta, $emailDescartador){
  $sql = "SELECT idColeta FROM COLETA WHERE dataColeta = '$dataColeta' AND horaColeta = '$horaColeta' AND emailDescartador = '$emailDescartador'";

  $resultado = mysqli_query($conexao, $sql);

  $linha = mysqli_fetch_row($resultado);

  return $linha[0];
}


function insereColetaMaterial($conexao, $idColeta, $idMaterial, $qtddMaterial){
  $sql = 
  "INSERT INTO COLETA_MATERIAL
    (idMaterial, idColeta, qtddMaterial) 
  VALUES 
  ('$idMaterial',
  '$idColeta',
  '$qtddMaterial')";

  return mysqli_query($conexao, $sql);
}

function SolicitacaoDescartador($conexao, $emailDescartador){
  $listaColetas = [];

  $sql = "
SELECT
	COLETA.idColeta,
  COLETA.dataColeta,
  COLETA.horaColeta,
  COLETA_MATERIAL.idMaterial,
  COLETA_MATERIAL.qtddMaterial
FROM
	COLETA,
  COLETA_MATERIAL
WHERE
	COLETA.emailDescartador = '$emailDescartador'
AND
	COLETA_MATERIAL.idColeta = COLETA.idColeta
AND 
	COLETA.emailColetor IS NULL";

  $resultado = mysqli_query($conexao, $sql);
  while ($coleta = mysqli_fetch_assoc($resultado)) {
      array_push($listaColetas, $coleta);
  }

  return $listaColetas;
}

function deletarSolicitacaoColeta($conexao, $idColeta){

    $sql = "DELETE FROM coleta WHERE idColeta = '$idColeta'";
  
  return mysqli_query($conexao, $sql);
}

function SolicitacaoColetor($conexao){
  $listaColetas = [];

  $sql = "
SELECT
  COLETA.idColeta,
  COLETA.dataColeta,
  COLETA.horaColeta,
  DESCARTADOR.ruaCasa,
  DESCARTADOR.nmrCasa,
  BAIRRO.idBairro
FROM
  COLETA,
  DESCARTADOR,
  BAIRRO
WHERE
	COLETA.emailDescartador = DESCARTADOR.emailDescartador
AND 
	DESCARTADOR.idBairro = BAIRRO.idBairro
AND 
	COLETA.emailColetor IS NULL";

  $resultado = mysqli_query($conexao, $sql);
  while ($coleta = mysqli_fetch_assoc($resultado)) {
      array_push($listaColetas, $coleta);
  }

  return $listaColetas;
}

function listarMateriaisColeta($conexao, $idColeta){
  $listaMateriais = [];

  $sql = "
SELECT
  COLETA_MATERIAL.idMaterial,
  COLETA_MATERIAL.qtddMaterial
FROM
  COLETA_MATERIAL
WHERE
  COLETA_MATERIAL.idColeta = '$idColeta'
  ";

  $resultado = mysqli_query($conexao, $sql);
  while ($material = mysqli_fetch_assoc($resultado)) {
    array_push($listaMateriais, $material);
  }

  return $listaMateriais;
}

function verificaDisponibilidade($conexao, $idColeta){
  $sql = "
SELECT
  COLETA.emailColetor
FROM
  COLETA
WHERE
  COLETA.idColeta = '$idColeta'
  ";
  
  $resultado = mysqli_query($conexao, $sql);

  $emailColetores = [];

  while ($coletor = mysqli_fetch_assoc($resultado)) {
    array_push($emailColetores, $coletor);
  }

  foreach ($emailColetores as $coletor) {
    return $coletor["emailColetor"];
  }
}

function agendaColeta($conexao, $idColeta, $emailColetor){
  $sql = "
UPDATE 
  COLETA
SET
  COLETA.emailColetor = '$emailColetor'
WHERE
  COLETA.idColeta = '$idColeta'
  ";

  mysqli_query($conexao, $sql);
}

function cancelaColeta($conexao, $idColeta){
  $sql = "
UPDATE 
  COLETA
SET
  COLETA.emailColetor = NULL
WHERE
  COLETA.idColeta = '$idColeta'
  ";

  mysqli_query($conexao, $sql);
}


function adicionarHistorico($conexao, $emailColetor, $idColeta){

  date_default_timezone_set('America/Sao_Paulo');

  $hora_atual = date('H:i:s', time());
  $hoje = date('Y-m-d');

  $sql = 
"INSERT INTO COLETA_COLETOR
  (emailColetor, idColeta, dataConc, horaConc) 
VALUES 
  ('$emailColetor',
  '$idColeta',
  '$hoje',
  '$hora_atual')";

  mysqli_query($conexao, $sql);
}
/**/

function SelectColetaExpirada($conexao, $idColeta){
  $SolicitacaoColeta = [];

  $sql = "
SELECT
	COLETA.dataColeta,
  COLETA.horaColeta
FROM
	COLETA
WHERE
	COLETA.idColeta = '$idColeta'
  ";

$resultado = mysqli_query($conexao, $sql);

while ($coleta = mysqli_fetch_assoc($resultado)) {
  array_push($SolicitacaoColeta, $coleta);
}

return $SolicitacaoColeta;
}

function editarSolicitacao($conexao, $idColeta, $novaData, $novaHora){

  $data = explode("/", $novaData);

  if(isset($data[1])){
    $dia = $data[0];
    $mes = $data[1];
    $ano = $data[2];

    $data = '' .$ano. '-' .$mes. '-' .$dia. '';

    $sql = "
UPDATE 
  COLETA
SET
  COLETA.horaColeta = '$novaHora',
  COLETA.dataColeta = '$data'
WHERE
  COLETA.idColeta = '$idColeta'";

  }else{

    $sql = "
UPDATE 
  COLETA
SET
  COLETA.horaColeta = '$novaHora',
  COLETA.dataColeta = '$novaData'
WHERE
  COLETA.idColeta = '$idColeta'";
  }

  mysqli_query($conexao, $sql);
}


function AgendadasColetor($conexao, $emailColetor){
  $listaColetas = [];

  $sql = "
SELECT
  COLETA.idColeta,
  COLETA.dataColeta,
  COLETA.horaColeta,
  DESCARTADOR.nomeDescartador,
  DESCARTADOR.sbrnomeDescartador,
  DESCARTADOR.telDescartador,
  DESCARTADOR.ruaCasa,
  DESCARTADOR.nmrCasa,
  BAIRRO.idBairro
FROM
  COLETA,
  DESCARTADOR,
  BAIRRO
WHERE
	COLETA.emailDescartador = DESCARTADOR.emailDescartador
AND 
	DESCARTADOR.idBairro = BAIRRO.idBairro
AND 
	COLETA.emailColetor = '$emailColetor'";

  $resultado = mysqli_query($conexao, $sql);
  while ($coleta = mysqli_fetch_assoc($resultado)) {
      array_push($listaColetas, $coleta);
  }

  return $listaColetas;
}

/*
falta add infos sobre o descartador que solicitou a coleta
*/

function AgendadasDescartador($conexao, $emailDescartador){
  $listaColetas = [];

  $sql = "
SELECT
	COLETA.idColeta,
  COLETA.dataColeta,
  COLETA.horaColeta,
  COLETA_MATERIAL.idMaterial,
  COLETA_MATERIAL.qtddMaterial,
  COLETOR.nomeColetor,
  COLETOR.sbrnomeColetor,
  COLETOR.telColetor
FROM
	COLETA,
  COLETA_MATERIAL,
  COLETOR
WHERE
	COLETA.emailDescartador = '$emailDescartador'
AND
	COLETA_MATERIAL.idColeta = COLETA.idColeta
AND 
	COLETA.emailColetor IS NOT NULL
AND
  COLETOR.emailColetor = COLETA.emailColetor";

  $resultado = mysqli_query($conexao, $sql);
  while ($coleta = mysqli_fetch_assoc($resultado)) {
      array_push($listaColetas, $coleta);
  }

  return $listaColetas;
}
/*
falta add infos sobre o coletor que aceitou a coleta
*/
?>