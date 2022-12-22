<?php
ob_start();
require("../database/usuario_bd.php");

$perfil = $_POST["perfil"];

if($perfil == 1){//CADASTRO DE DESCARTADOR

    $emailDescartador = $_POST["email"];
    $senha = $_POST["senha"];
    $nomeDescartador = $_POST["nome"];
    $sbrnomeDescartador = $_POST["sbrnome"];
    $telDescartador = $_POST["tel"];
    $ruaCasa = $_POST["ruaCasa"];
    $nmrCasa = $_POST["nmrCasa"];
    $idBairro = $_POST["Bairro"];
    
    if(buscarUsuario($conexao, $emailDescartador, $senha, $perfil) == null){//VERIFICAÇÃO PARA GARANTIR QUE UM USUÁRIO NÃO SE CADASTRE DUAS VEZES
        $resultado = cadastrarDescartador($conexao, $emailDescartador, $senha,
            $nomeDescartador, $sbrnomeDescartador, $telDescartador, $ruaCasa, $nmrCasa, $idBairro);
    
        if($resultado == TRUE){
            header("Location: ../public/login.php?flag=3");
            exit();
        }else {
            if($resultado["senha"] == $senha){
                header("Location: ../public/descartador_cadastro.php?flag=1");
                exit();
            }else{
                header("Location: ../public/descartador_cadastro.php?flag=0");
                exit();
            }

        }
    }else{
        header("Location: ../public/descartador_cadastro.php?flag=1");
        exit();
    }

}elseif ($perfil == 0) {//CADASTRO DE COLETOR
    if($_POST["qtddBairros"] == 0 || $_POST["qtddMateriais"] == 0){//NÃO CADASTRA
        header("Location: coletor_cadastro.php?flag=0");
        exit();
    }else{//CADASTRA
        if(buscarUsuario($conexao, $_POST["email"], $_POST["senha"], $perfil) == null){//NÃO CADASTRADO

            $emailColetor = $_POST["email"];

            $senha = $_POST["senha"];
            
            $nomeColetor = $_POST["nome"];
        
            $sbrnomeColetor = $_POST["sbrnome"];
        
            $telColetor = $_POST["tel"];

            //CADASTRAR USANDO INSERT
            $resultado = cadastrarColetor($conexao, $emailColetor, $senha, $nomeColetor, $sbrnomeColetor, $telColetor);

            //RESULTADO DA QUERY INSERT
            if($resultado == TRUE){//COLETOR TEVE SEU CADASTRO REALIZADO
            
                //obter a quantidade de bairros selecionados
                $qtddBairros = $_POST["qtddBairros"];

                //obter a quantidade de materiais selecionados
                $qtddMateriais = $_POST["qtddMateriais"];

                //obter os bairros selecionados. o número 10 vai ser substituído assim que o banco de dados estiver mais povoado.
                for ($i=1, $insertBairro=0; $i <= 140; $i++) {//$i <= a quantidade de Bairros cadastrados no Banco de Dados
                    if($insertBairro == $qtddBairros){
                        break;
                    }else{
                        if(isset($_POST['Bairro' .$i. ''])){
                            insereColetorBairro($conexao, $emailColetor, $_POST['Bairro' .$i. '']);
                            $insertBairro++;
                        }
                    }
                }

                //obter os materiais selecionados. o número 7 vai ser substituído assim que o banco de dados estiver mais povoado.
                for ($i=1, $insertMaterial=0; $i <= 7; $i++) {//$i <= a quantidade de Materiais cadastrados no Banco de Dados
                    if(isset($_POST['Material' .$i. ''])){
                        insereColetorMaterial($conexao, $emailColetor, $_POST['Material' .$i. '']);
                    }
                }

                header("Location: ../public/login.php?flag=2");
                exit();

            }else {//CADASTRO NÃO REALIZADO
                header("Location: ../public/coletor_cadastro.php?flag=1");
                exit();
            }
        }else{//JÁ CADASTRADO
            header("Location: ../public/coletor_cadastro.php?flag=2");
            exit();
        }

    }
}


?>