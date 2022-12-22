<?php
    ob_start();
    require("../database/usuario_bd.php");
    require("../src/geral_usuario_logica.php");

    if(isset($_SESSION["usuario_logado"])){
        if($_SESSION["perfil"] == 0){
            if($_POST["qtddBairros"] == 0 || $_POST["qtddMateriais"] == 0){//NÃO ALTERA
                header("Location: coletor_altera.php?flag=0");
                exit();
        
            }else{//ALTERA

                if($_SESSION["senha"] != $_POST["senha"] || $_SESSION["tel"] != $_POST["tel"]){
                    $resultado = alterarColetor($conexao, $_SESSION["usuario_logado"], $_POST["senha"], $_POST["tel"]);

                    if($resultado == null){
                        header("Location: coletor_altera.php?flag=1");
                        exit();
                    }else{

                        $_SESSION["tel"] = $_POST["tel"];
                        $_SESSION["senha"] = $_POST["senha"];
                    }
                }

                $resultado = deleteColetorBairro($conexao, $_SESSION["usuario_logado"]);

                $bairros = [];
        
                for ($i=1, $indiceBairros=0; $i <= 140; $i++) {
                    if($indiceBairros <= $_POST["qtddBairros"]){
                        if(isset($_POST['Bairro' .$i. ''])){
                            $indiceBairros++;
                            $bairros[$indiceBairros] = $_POST['Bairro' .$i. ''];
                            echo'' .$_POST['Bairro' .$i. '']. '';
                        }
                    }else{
                        break;
                    }
                }

                if($resultado != null){
                    unset($_SESSION["bairros"]);

                    for ($i=1; $i <= $_POST["qtddBairros"]; $i++) {
                        $resultado = insereColetorBairro($conexao, $_SESSION["usuario_logado"], $bairros[$i]);

                        if($resultado != null){
                            $_SESSION["bairros"][$i] = $bairros[$i];
                        }else{
                            header("Location: coletor_altera.php?flag=2");
                            exit();
                            break;
                        }
                    }
                }

                
                $resultado = deleteColetorMaterial($conexao, $_SESSION["usuario_logado"]);

                $materiais = [];
        
                for ($i=1, $indiceMateriais=0; $i <= 7; $i++) {
                    if($indiceMateriais <= $_POST["qtddMateriais"]){
                        if(isset($_POST['Material' .$i. ''])){
                            $indiceMateriais++;
                            $materiais[$indiceMateriais] = $_POST['Material' .$i. ''];
                            echo'' .$_POST['Material' .$i. '']. '';
                        }
                    }else{
                        break;
                    }
                }

                if($resultado != null){
                    unset($_SESSION["materiais"]);

                    for ($i=1; $i <= $_POST["qtddMateriais"]; $i++) {
                        $resultado = insereColetorMaterial($conexao, $_SESSION["usuario_logado"], $materiais[$i]);

                        if($resultado != null){
                            $_SESSION["materiais"][$i] = $materiais[$i];
                        }else{
                            header("Location: coletor_altera.php?flag=3");
                            exit();
                            break;
                        }
                    }

                    header("Location: coletor_altera.php?flag=4");
                    exit();
                }
                
            }
        }elseif($_SESSION["perfil"] == 1){
            $senha = $_POST["senha"];
            $telDescartador = $_POST["tel"];
            $ruaCasa = $_POST["ruaCasa"];
            $nmrCasa = $_POST["nmrCasa"];
            $idBairro = $_POST["Bairro"];
            
            if($senha != $_SESSION["senha"] || $telDescartador != $_SESSION["telDescartador"]
            || $ruaCasa != $_SESSION["ruaCasa"] || $nmrCasa != $_SESSION["nmrCasa"] ||
            $idBairro != $_SESSION["idBairro"]){
                // 1. Alteração com o banco de dados
                $resultado = alterarDescartador($conexao, $_SESSION["usuario_logado"],
                $senha, $telDescartador, $ruaCasa, $nmrCasa, $idBairro);
            }
             
            if($resultado == null){
                header("Location: descartador_altera.php?flag=0");
                exit();
            }else{
                // 2. Alterar 
                $_SESSION["senha"] = $senha;
                $_SESSION["tel"] = $telDescartador;
                $_SESSION["ruaCasa"] = $ruaCasa;
                $_SESSION["nmrCasa"] = $nmrCasa;
                $_SESSION["idBairro"] = $idBairro;

                header("Location: descartador_solicitacoes.php?flag=0");
                exit();
            }
        }
    }else{
        header("Location: ../public/login.php");
        exit();
    }

?>