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
    <div class="container-header">    
        <h2>Biblioteca</h2>
        <h3>Veja as monitorias que promovemos</h3>
        <h4><a href="index.php">Página Inicial</a></h4>
        <h4> → Biblioteca PETComp</h4>
    </div>
        
        <div class="container-body">
            <p>Com o objetivo de apoiar tanto a comunidade acadêmica quanto a local, o PETComp oferece uma variedade de documentos e materiais de apoio que estão disponíveis para consulta a qualquer momento. Esses recursos foram cuidadosamente selecionados para atender às necessidades de estudantes, professores e pesquisadores, e podem ser acessados facilmente através do nosso site. Abaixo, você encontrará uma coleção de arquivos de auxílio educacional, que abrangem diferentes áreas do conhecimento e têm o intuito de complementar e enriquecer o aprendizado de todos.  
            </p>        
        </div>

        <div class="box-container">
            <div class = "sections-cards">

                <div class="monitoring-card">
                    <div class="card-background"  id = "card-1" ></div>
                    <div class="card-item">
                        <h3>Algoritmos 1</h3>
                        <div class= "box-texts">
                            <p>Vídeo aula</p>
                            <p>Questionário</p>
                            <p>Resumo</p>
                            <a href="https://drive.google.com/drive/folders/1lgkO5emzPdYbeRuOvcedcDhmtHtW-U1U" target="_blank" >Acessar</a>
                        </div>
                    </div>
                    <img src="img\algoritmos.png" alt="">
                </div>

                <div class="monitoring-card">
                    <div class="card-background"  id = "card-2"  ></div>
                    <div class="card-item">
                        <h3>Cálculo 1</h3>
                        <div class= "box-texts">
                            <p>Vídeo aula</p>
                            <p>Questionário</p>
                            <p>Resumo</p>
                            <a href="https://drive.google.com/drive/folders/1lgkO5emzPdYbeRuOvcedcDhmtHtW-U1U" target="_blank">Acessar</a>
                        </div>
                    </div>
                    <img src="img\calculo1.png" alt="">
                </div>

                <div class="monitoring-card">
                    <div class="card-background" id = "card-3"></div>
                    <div class="card-item">
                        <h3>Estrutura de <br> Dados 1</h3>
                        <div class= "box-texts">
                            <p>Vídeo aula</p>
                            <p>Questionário</p>
                            <p>Resumo</p>
                            <a href="https://drive.google.com/drive/folders/1lgkO5emzPdYbeRuOvcedcDhmtHtW-U1U" target="_blank">Acessar</a>
                        </div>
                    </div>
                    <img src="img\ed1.png" alt="">
                </div>

                <div class="monitoring-card">
                    <div class="card-background"  id = "card-4" ></div>
                    <div class="card-item">
                        <h3>Linguagem de <br>Programação 1</h3>
                        <div class= "box-texts">
                            <p>Vídeo aula</p>
                            <p>Questionário</p>
                            <p>Resumo</p>
                            <a href="https://drive.google.com/drive/folders/1lgkO5emzPdYbeRuOvcedcDhmtHtW-U1U" target="_blank">Acessar</a>
                        </div>
                    </div>
                    <img src="img\lp1.png" alt="">
                </div>

                <div class="monitoring-card" id = "card-mdl">
                    <div class="card-background" id = "card-5" ></div>
                    <div class="card-item">
                        <h3>Matemática <br>Discreta e Lógica</h3>
                        <div class= "box-texts">
                            <p>Vídeo aula</p>
                            <p>Questionário</p>
                            <p>Resumo</p>
                            <a href="https://drive.google.com/drive/folders/1lgkO5emzPdYbeRuOvcedcDhmtHtW-U1U" target="_blank">Acessar</a>
                        </div>
                    </div>
                    <img src="img\mdl.png" alt="">
                </div>

            </div>
        </div>
    
    </main>
</body>
<?php include('footer.php') ?>
  <script src="./js/js.js"></script>
</html>
