<!DOCTYPE html>
<html lang="pt-BR">


<?php
$title = "PETComp";
$cssFiles = ['css/fab-de-software.css'];
include "head.php";
?>


<body>
    <?php include('header.php') ?>
    <div class="container-header">
        <h2>Fábrica de software</h2>
        <h3>Engenharia de Software no PETComp</h3>
        <h4><a href="index.php">Página Inicial</a></h4>
        <h4> → Projetos</h4>
        <h4> → Fáb.Software</h4>
    </div>

    <div class="container-body">
        <p>A Engenharia de Softwares é uma das vertentes mais fortes na área de Ciência da Computação. A construção de um software pode ser para fins administrativos, de pesquisa, entretenimento, etc. A atividade visa a coleta, criação e manutenção de softwares para a UFMA, também visa solucionar problemáticas da comunidade e projetos apoiados pela IES. Além disso, a atividade colabora juntamente para o ensino de tecnologias aos integrantes do grupo PET e para o compartilhamento desse conhecimento fazendo o uso de políticas de troca de conhecimento, pesquisa e desenvolvimento de tecnologias, e a extensão tecnológica.</p>
        <p>A atividade da continuidade às políticas já realizadas pelo PETComp. Os projetos serão adotados por toda a equipe, de forma que cada um se responsabiliza por algumas sub funcionalidades, usando de processos de desenvolvimento de software hábil a ser pesquisado pelos alunos, bem como metodologias para a gestão de atividades. O software que apresentar melhor desempenho no processo de ensino e aprendizagem será escolhido e produzido. Poderão ser produzidos durante o desenvolvimento da atividade: objetos de aprendizado, aplicações móveis para fins diversos, sistemas de informação, e sistemas computacionais para atender demandas, através das pesquisas realizadas em outras políticas desta proposta.</p>
    </div>

    <div class="section-header">
        <h2 class="titulo">Projetos da Fábrica de Software</h2>
    </div>
    <div class="main">
        <div class="container">
            <a href="https://petcompufma.org/acalourada/" target="_blank" class="card">
                <img src="./assets/images/fabrica_software/acalourada.png" alt="Imagem 5">
                <h3>ACALOURADA</h3>
                <p>Site de recepção e integração dos calouros de Ciência da Computação e Inteligência Artificial do PETComp.</p>
                <div class="tech-tags">
                    <span>HTML</span>
                    <span>CSS</span>
                    <span>JS</span>
                </div>
            </a>
            <a href="http://bauxiteresidue.ufma.br/" target="_blank" class="card">
                <img src="./assets/images/fabrica_software/balchita.png" alt="Imagem 1">
                <h3>RESÍDUO BAUXITA</h3>
                <p>Site sobre o resíduo da bauxita, seu processamento e impacto ambiental na região.</p>
                <div class="tech-tags">
                    <span>HTML</span>
                    <span>CSS</span>
                    <span>JS</span>
                    <span>PHP</span>
                </div>
            </a>
            <a href="https://www.darti.ufma.br/CientAlcantara/" target="_blank" class="card">
                <img src="./assets/images/fabrica_software/cientistasDeAlcantara.png" alt="Imagem 2">
                <h3>CIENTISTAS DE ALCÂNTARA</h3>
                <p>Site sobre capacitação de professores e estudantes de Alcântara em tecnologias espaciais e ensino STEAM.</p>
                <div class="tech-tags">
                    <span>HTML</span>
                    <span>CSS</span>
                    <span>JS</span>
                </div>
            </a>
            <a href="https://petcompufma.org/eacomp/" target="_blank" class="card">
                <img src="./assets/images/fabrica_software/eacomp.png" alt="Imagem 3">
                <h3>EACOMP</h3>
                <p>Site do Encontro Acadêmico de Computação, evento do PETComp para alunos de Informática do Maranhão.</p>
                <div class="tech-tags">
                    <span>HTML</span>
                    <span>CSS</span>
                    <span>JS</span>
                </div>
            </a>
            <a href="https://petcompufma.org/cocom/" target="_blank" class="card">
                <img src="./assets/images/fabrica_software/comcom.png" alt="Imagem 4">
                <h3>COCOM</h3>
                <p>Site sobre a Coordenação de Ciência da Computação da UFMA e o histórico do curso</p>
                <div class="tech-tags">
                    <span>HTML</span>
                    <span>CSS</span>
                    <span>JS</span>
                </div>
            </a>
            <a href="http://observatoriodesaudemental.com.br/" target="_blank" class="card">
                <img src="./assets/images/fabrica_software/SaudeMental.png" alt="Imagem 6">
                <h3>SAÚDE MENTAL</h3>
                <p>Observatório do GESAM (UVA) que reúne pesquisas sobre saúde mental e políticas sobre drogas em Sobral-CE.</p>
                <div class="tech-tags">
                    <span>HTML</span>
                    <span>CSS</span>
                    <span>JS</span>
                </div>
            </a>
            <div class="card">
                <img src="./assets/images/fabrica_software/mamaprev.png" alt="Imagem 7">
                <h3>MAMAprev</h3>
                <p>Aplicativo que auxilia na prevenção do câncer de mama, ajudando usuárias no autocuidado e acompanhamento da saúde.</p>
                <div class="tech-tags">
                    <span>REACT NATIVE</span>
                    <span>JS</span>
                </div>
            </div>
            <div class="card">
                <img src="./assets/images/fabrica_software/aconchego.svg" alt="Imagem 8">
                <h3>ACONCHEGO</h3>
                <p>Aplicativo de apoio para estudantes do PETComp, oferecendo recursos e informações sobre o curso e a universidade.</p>
                <div class="tech-tags">
                    <span>REACT NATIVE</span>
                    <span>JS</span>
                </div>
            </div>
        </div>
    </div>


    <?php include('footer.php') ?>
    <script src="./js/js.js"></script>
</body>

</html>