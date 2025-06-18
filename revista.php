<!DOCTYPE html>
<html lang="pt-br">
<?php 
    $title = "Revista";
    $cssFiles = ['css/revista.css'];
    $jsFiles = ['js/revista-swiper.js']; // Mesmo sem usar agora, pode deixar listado para carregar depois
    include 'head.php';

    require_once("conexao.php");

    $queryRevistas = "SELECT id, titulo, capa, sobre, visualizar, icone, download FROM revista ORDER BY id ASC";
    $resultRevistas = mysqli_query($mysqli, $queryRevistas);

    $arrayRevistas = [];
    if (mysqli_num_rows($resultRevistas) > 0) {
        while($row = mysqli_fetch_assoc($resultRevistas)) {
            $arrayRevistas[] = $row;
        }
    } else {
        $arrayRevistas = [];
    }
?>

<body>
    <?php include 'header.php'; ?>

    <div class="container-header">
        <h2>Revista</h2>
        <h3>Confira a publicação anual do PETComp</h3>
        <h4><a href="index.php">Página Inicial</a></h4>
        <h4> -> Publicações</h4>
        <h4> -> Revista</h4>
    </div>

    <div class="container-body">
        <h2>Revista PETComp 2025</h2>
        <p>
            A Revista PETComp foi lançada com o propósito de oferecer ao público uma visão abrangente dos projetos desenvolvidos pelo PETComp da UFMA, destacando nossa trajetória aos leitores interessados em conhecer mais sobre o PET de Ciência da Computação da Universidade Federal do Maranhão. A primeira edição foi lançada no ano de 2024, marcando o início desta iniciativa de compartilhar nossas atividades e conquistas. Nela, exploramos os projetos em que estamos envolvidos, combinando textos informativos com imagens ilustrativas para proporcionar uma experiência completa aos leitores. Aguardem as próximas edições para mais novidades sobre o nosso PETComp UFMA!
        </p>
    </div>
    
        <div class="swiper carousel">
            <div class="swiper-wrapper">
                <?php foreach ($arrayRevistas as $revista): ?>
                    <div class="swiper-slide">
                        <img class="noticia-image" src="<?= htmlspecialchars($revista['capa']) ?>" alt="<?= htmlspecialchars($revista['titulo']) ?>">
                        <p class="swiper-caption"><?= htmlspecialchars($revista['titulo']) ?></p>
                        <p class="swiper-about"><?= htmlspecialchars($revista['sobre']) ?></p>
                        <div class="botoes">
                            <a href="<?= htmlspecialchars($revista['visualizar']) ?>" target="_blank">Visualizar</a>
                            <a href="<?= htmlspecialchars($revista['download']) ?>" download>Download</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Paginação e navegação -->
            <div class="swiper-pagination"></div>
            <div class="swiper-buttonsx">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    

    <?php include 'footer.php'; ?>
</body>
</html>
