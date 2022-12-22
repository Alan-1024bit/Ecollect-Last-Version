<?php
    ob_start();
    require("../template/header.html");
?>
        <div>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="first-slide w-100" src="../assets/images/carousel-items/init.jpg" alt="First slide" height="500">
                        <div class="container">

                            <div class="carousel-caption text-left mb-5">
                                <h1 class="Montserrat-Carousel">Reduzir</h1>
                            </div>

                            <div class="carousel-caption text-center mb-5">
                                <h1 class="Montserrat-Carousel">Reutilizar</h1>
                            </div>

                            <div class="carousel-caption text-right mb-5">
                                <h1 class="Montserrat-Carousel">Reciclar</h1>
                            </div>

                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="first-slide w-100" src="../assets/images/carousel-items/first.jpg" alt="First slide" height="500">
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1 class="Cabin_SemiBold">Reduzir</h1>
                                <p class="HindGuntur">Reduzir consiste em ações que reduzam o consumo de bens e serviços, visando à diminuição da geração de resíduos e consequente redução do desperdício.</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="second-slide w-100" src="../assets/images/carousel-items/second.jpg" alt="Second slide" height="500">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1 class="Cabin_SemiBold">Reutilizar</h1>
                                <p class="HindGuntur">A reutilização contribui significativamente para a economia de recursos renováveis utilizados para fabricar cada vez mais bens de consumo</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="third-slide w-100" src="../assets/images/carousel-items/third.jpg" alt="Third slide" height="500">
                        <div class="container">
                            <div class="carousel-caption text-right">
                                <h1 class="Cabin_SemiBold">Reciclar</h1>
                                <p class="HindGuntur">envolve o processamento de materiais por meio de sua transformação física ou química, geralmente em forma de matéria-prima para produção de novos produtos e bens de consumo.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon ml-5" aria-hidden="true"></span>
                    <span class="sr-only">Voltar</span>
                </a>

                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon mr-5" aria-hidden="true"></span>
                    <span class="sr-only">Avançar</span>
                </a>
            </div>

            <div class="container marketing mt-5 text-center">

                <div class="row">
                    <div class="col-lg-4">
                        <img class="rounded-circle" src="../assets/images/features/descarte-icone.jpg" alt="Generic placeholder image" width="140" height="140">
                        <h2 class="Cabin">Descarte</h2>
                        <p class="HindGuntur">Seja um descartador e consiga destinar seu lixo reciclável corretamente! Colabore com o processo de realocação de materiais enquanto ajuda profissionais da coleta em seu trabalho.</p>
                    </div>
                    <div class="col-lg-4">
                        <img class="rounded-circle" src="../assets/images/features/uniao-icone.jpg" alt="Generic placeholder image" width="140" height="140">
                        <h2 class="Cabin">União</h2>
                        <p class="HindGuntur">Unindo pessoas, coisas e sonhos! Cadastre-se em qualquer dos perfis de usuário para iniciar a colaboração com o meio ambiente enquanto a gente faz o resto.</p>
                    </div>
                    <div class="col-lg-4">
                        <img class="rounded-circle" src="../assets/images/features/coleta-icone.jpg" alt="Generic placeholder image" width="140" height="140">
                        <h2 class="Cabin">Coleta</h2>
                        <p class="HindGuntur">Seja um coletor e saiba quando e onde encontrar materiais recicláveis para coletar! Consiga um melhor aproveitamento e menos custos em serviços prestados.</p>
                    </div>
                </div>
        
                <hr class="featurette-divider">
        
                <div class="row featurette">
                    <div class="col-md-7 mt-5">
                        <h2 class="featurette-heading Cabin">Descarte correto. <span class="text-success">Um novo rumo. </span></h2>
                        <p class="lead HindGuntur">A destinação correta de lixo reciclável é uma decisão que está na mão do descartador. É ele quem colabora significativamente com a saúde ambiental do local em que vive. Para tanto, cadastre-se e participe dessa iniciativa!</p>
                    </div>
                    <div class="col-md-5">
                        <img class="featurette-image img-fluid mx-auto" src="../assets/images/features/descarte.jpg" alt="Generic placeholder image">
                    </div>
                </div>
        
                <hr class="featurette-divider">
        
                <div class="row featurette">
                    <div class="col-md-7 order-md-2 mt-5">
                        <h2 class="featurette-heading Cabin">Criando redes. <span class="text-success">Ajudando o meio ambiente. </span></h2>
                        <p class="lead HindGuntur">Aqui você terá oportunidade de conhecer outros usuários que podem te ajudar. Assim, produzimos conexões entre pessoas que geram uma diminuição na poluição da cidade. E o melhor: sem custos.</p>
                    </div>
                    <div class="col-md-5 order-md-1">
                        <img class="featurette-image img-fluid mx-auto" src="../assets/images/features/uniao.jpg" alt="Generic placeholder image">
                    </div>
                </div>
        
                <hr class="featurette-divider">
        
                <div class="row featurette">
                    <div class="col-md-7 mt-5">
                        <h2 class="featurette-heading Cabin">Coleta de recicláveis. <span class="text-success">Um novo sonho. </span></h2>
                        <p class="lead HindGuntur">O processo de catação de materiais recicláveis é fundamental para o saneamento da cidade e meio ambiente. Coletor, otimize sua produtividade, participe dessa iniciativa! </p>
                    </div>
                    <div class="col-md-5">
                        <img class="featurette-image img-fluid mx-auto" src="../assets/images/features/coleta.jpg" alt="Generic placeholder image">
                    </div>
                </div>
        
                <hr class="featurette-divider">
            </div>
        </div>
<?php
    require("../template/footer.html");
?>