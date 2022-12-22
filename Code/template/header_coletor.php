<?php
    require("../src/geral_usuario_logica.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="imagex/png" href="../assets/images/ciclo.ico">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/style.css">
        <title>Ecollect</title>
    </head>
    <body class="bg-light">
        <div vw class="enabled">
            <div vw-access-button class="active"></div>
            <div vw-plugin-wrapper>
                <div class="vw-plugin-top-wrapper"></div>
            </div>
        </div>
        <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
        <script>
            new window.VLibras.Widget('https://vlibras.gov.br/app');
        </script>
        <nav class="navbar navbar-expand-lg navbar-light bg-light container">
            <a class="navbar-brand" href="">
                <span class="lettering Montserrat-Brand">
                    E
                </span>

                <span class="lettering Montserrat-Brand">
                    c
                </span>

                <span class="lettering Montserrat-Brand">
                    <img src="../assets/images/ciclo.png" alt="ciclo" width="18" height="18">
                </span>

                <span class="lettering Montserrat-Brand">
                    l
                </span>

                <span class="lettering Montserrat-Brand">
                    l
                </span>

                <span class="lettering Montserrat-Brand">
                    e
                </span>

                <span class="lettering Montserrat-Brand">
                    c
                </span>    

                <span class="lettering Montserrat-Brand">
                    t
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse Cabin" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active mr-3">
                        <a class="nav-link text-secondary" href="coletor_solicitacoes.php">Solicitações</a>
                    </li>

                    <li class="nav-item mr-3">
                        <a class="nav-link text-secondary" href="coletor_agendadas.php">Agendadas</a>
                    </li>

                    <li class="nav-item">
                        <div class="dropdown">
                            
                            <!--SOMENTE EXIBIR EM TELAS GRANDES-->
                            <button class="dropdown-toggle nav-link text-dark"
                            type="button"
                            id="dropdownMenuButton"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            <?php
                                echo'' .$_SESSION["nome"]. '';
                            ?>
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="../src/geral_ajustes.php?perfil=0">Configurações</a>
                              <a class="dropdown-item" href="../src/geral_logout.php">Sair</a>
                            </div>
                          </div>
                    </li>
                </ul>
            </div>
        </nav>