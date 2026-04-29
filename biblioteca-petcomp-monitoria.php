<?php require_once "scripts.php/renderComponent.php" ?>

<!DOCTYPE html>
<html lang="pt-BR">
<?php 
    $title = "Biblioteca";
    $cssFiles = ['css\biblioteca.css'];
    include "head.php";
?>

<body>
    <?php include('header.php') ?>
    <main>
        <?php renderComponent("container-header.php", [
            "titulo_pagina" => "Repositório Educacional Aberto",
            "descricao" => "Monitorias",
            "caminho" => ["Repositório Educacional", "Monitorias"]
        ]);
        ?>

        <?php 
            $href = 'biblioteca-petcomp-main.php';
            include('components/btn-voltar.php');
        ?>
        
        <div class="container-body">
            <p>  
            </p>        
        </div>

        <div class="box-container">
            <div class = "sections-cards">

                <div class="monitoring-card">
                    <div class="card-background"  id = "card-1" ></div>
                    <div class="card-item">
                        <div class="division">
                            <div class= "box-texts">
                                <h3>Algoritmos 1</h3>
                                <p>Vídeo aula</p>
                                <p>Questionário</p>
                                <p>Resumo</p>
                                <a href="https://drive.google.com/drive/u/2/folders/1BRG3kbCbN3GanjB6fFonEYOZ_SBcCWTb" target="_blank" >Acessar</a>
                            </div>
                            <img src="img\algoritmos.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="monitoring-card">
                    <div class="card-background" id="card-2"></div>
                    <div class="card-item">
                        <div class="division">
                            <div class="box-texts">
                                <h3>Cálculo 1</h3>
                                <p>Vídeo aula</p>
                                <p>Questionário</p>
                                <p>Resumo</p>
                                <a href="https://drive.google.com/drive/u/2/folders/1H9jp0xxiXwhaZyq2CdfjjAUE_223IYZR" target="_blank">Acessar</a>
                            </div>
                            <img src="img\calculo.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="monitoring-card">
                    <div class="card-background" id="card-3"></div>
                    <div class="card-item">
                        <div class="division">
                            <div class="box-texts">
                                <h3>Estrutura de <br>Dados 1</h3>
                                <p>Vídeo aula</p>
                                <p>Questionário</p>
                                <p>Resumo</p>
                                <a href="https://drive.google.com/drive/u/1/folders/1m4WewzLausEO0hvcfGVxYx7ZyS4nRzHA" target="_blank">Acessar</a>
                            </div>
                            <img src="img\ed1.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="monitoring-card">
                    <div class="card-background" id="card-4"></div>
                    <div class="card-item">
                        <div class="division">
                            <div class="box-texts">
                                <h3>Linguagem de <br>programação 1</h3>
                                <p>Vídeo aula</p>
                                <p>Questionário</p>
                                <p>Resumo</p>
                                <a href="https://drive.google.com/drive/u/2/folders/1NGBpcdmz55_a75jpLyvWr06O0n_uew2_" target="_blank">Acessar</a>
                            </div>
                            <img src="img\lp1.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="monitoring-card">
                    <div class="card-background" id="card-5"></div>
                    <div class="card-item">
                        <div class="division" id="division-mdl">
                            <div class="box-texts">
                                <h3>Matemática Discreta<br>e Lógica</h3>
                                <p>Vídeo aula</p>
                                <p>Questionário</p>
                                <p>Resumo</p>
                                <a href="https://drive.google.com/drive/u/2/folders/1g-BFLtKRUr6DkF3GCqjw8ykA9uSq0_z6" target="_blank">Acessar</a>
                            </div>
                            <img src="img\mdl.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="monitoring-card">
                    <div class="card-background" id="card-6"></div>
                    <div class="card-item">
                        <div class="division" id="division">
                            <div class="box-texts">
                                <h3>Cálculo Vetorial e <br> Geometria Analítica</h3>
                                <p>Vídeo aula</p>
                                <p>Questionário</p>
                                <p>Resumo</p>
                                <a href="https://drive.google.com/drive/folders/1aePehmxr_hn5xgtvBDzlGHyifHPt0sKA">Acessar</a>
                            </div>
                            <img src="img\calculoVetorial.png" alt="" width="200px">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    
    </main>
</body>
<?php include('footer.php') ?>
  <script src="./js/biblioteca.js"></script>
</html>
