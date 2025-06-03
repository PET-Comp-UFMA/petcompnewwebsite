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

        <div class = "cadeira-monitoria">
            <div class= "box-models" id="boxmodel1" >
                <div>
                    <h1>Algorítmos 1</h1>
                    <div class="buttons-infos">
                        <button>Vídeo Aula</button>
                        <button>Questionário</button>
                        <button>Resumo</button>
                        <button id='acessar'>Acessar</button>
                    </div>
                </div>
                <div>
                    <img src="img\algorítmos 1 - biblioteca.png" alt="Ícone Algorítmos 1">
                </div>
            </div>
            
            <div class="box-models" id="boxmodel2">
                <div>
                    <h1>Cálculo 1</h1>
                    <div class="buttons-infos">
                        <button>Vídeo Aula</button>
                        <button>Questionário</button>
                        <button>Resumo</button>
                        <button id='acessar'>Acessar</button>
                    </div>
                </div>
                <div>
                    <img src="img\calc 1 - biblioteca.png" alt="Ícone Cálculo 1">
                </div>
            </div>
            
            <div class="box-models" id="boxmodel3">
                <div>
                    <h1>Estrutura de Dados 1</h1>
                    <div class="buttons-infos">
                        <button>Vídeo Aula</button>
                        <button>Questionário</button>
                        <button>Resumo</button>
                        <button id='acessar'>Acessar</button>
                    </div>
                </div>
                <div>
                    <img src="img\estrutura de dados- biblioteca.png" alt="Ícone Estrutura de Dados 1">
                </div>
            </div>

            <div class="box-models" id="boxmodel4">
                <div>
                    <h1>Linguagem de Programação 1</h1>
                    <div class="buttons-infos">
                        <button>Vídeo Aula</button>
                        <button>Questionário</button>
                        <button>Resumo</button>
                        <button id='acessar'>Acessar</button>
                    </div>
                </div>
                <div>
                    <img src="img\linguagem de programacao - biblioteca.png" alt="Ícone Linguagem de Programação 1">
                </div>
            </div>
            
            <div class="box-models" id="boxmodel5">
                <div>
                    <h1>Matemática Discreta e Lógica</h1>
                    <div class="buttons-infos">
                        <button>Vídeo Aula</button>
                        <button>Questionário</button>
                        <button>Resumo</button>
                        <button id='acessar'>Acessar</button>
                    </div>
                </div>
                <div>
                    <img src="img\matematica discreta e logica - biblioteca.png" alt="Ícone Matemática Discreta e Lógica">
                </div>
            </div>
            
        </div>
    
    </main>
</body>
<?php include('footer.php') ?>
  <script src="./js/js.js"></script>
</html>
