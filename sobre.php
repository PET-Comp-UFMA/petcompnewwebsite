<!DOCTYPE html>
<html lang="pt-br">

<?php 
    $title = "Sobre nós";
    $cssFiles = ['css/sobre.css'];
    include 'head.php';
?>

<body>
    <?php include 'header.php'; ?>

    <div class="container-header">
        <h2>Sobre nós</h2>
        <h3>Conheça um pouco sobre o grupo</h3>
        <h4><a href="index.php">Página Inicial</a></h4>
        <h4> → Sobre nós</h4>
    </div>

    <div class="container-body">
        <p> O Programa de Educação Tutorial de Ciência da Computação da UFMA foi criado em 1 de Setembro de 2007, tendo como tutor o Professor Alexandre César Muniz de Oliveira, em 19 de Janeiro de 2016 o Professor Geraldo Braz Junior tornou-se o novo tutor do grupo. E após sua excelente gestão, em 2019 assume o Professor Luis Rivero. O PET Computação já realizou diversas atividades de pesquisa, ensino e extensão. </p>
        <p> Dentre as atividades desenvolvidas pelo PETComp podemos citar Acalourada (recepção dos calouros), Grupo de Acompanhamento ao Discente (GAD - Monitoria), Fábrica de Software (desenvolvimento de sites, apps como MAMAprev, Peça em casa e SOS MAMA, CientAcalntara), os petianos fazem pesquisas nas mais diversas áreas no laboratórios onde o PETComp é a porta de entrada da maioria, tivemos a produção de diversos minicursos e oficinas, produção e organização de eventos (EACOMP, ERCEMAPI, eJIM 2020 e ENEPET 2020) e o PodComp, o podcast do PETComp. </p>
    </div>

    <div class="gallery">
    <div class="group">
        <div class="image-container">
            <img src="img/sobre-imagem1.jpg" class="wide">
            <p class="image-description">Equipe PETComp 2023</p>
        </div>
        <div class="image-container">
            <img src="img/sobre-image3.svg">
            <p class="image-description">Apresentação do PETComp para L.A.B.I</p>
        </div>
        <div class="image-container">
            <img src="img/sobre-imagem5.jpg">
            <p class="image-description">PETComp na Feira de profissões 2023</p>
        </div>
    </div>
    <div class="group">
        <div class="image-container">
            <img src="img/sobre-image6.jpeg" class="wide">
            <p class="image-description">Petianos na recepção de calouros 2024.2</p>
        </div>
        <div class="image-container">
            <img src="img/sobre-image4.png">
            <p class="image-description"> PETComp na Feira de profissões 2024</p>
        </div>
        <div class="image-container">
            <img src="img/sobre-image2.png">
            <p class="image-description">Confraternização PETComp 2023</p>
        </div>
    </div>
</div>


    <?php include 'footer.php'; ?>
</body>
</html>
