<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('conexao.php');

// Consulta para pegar todas as notícias, ordenadas pela data
$queryUltimas = "SELECT * FROM noticias ORDER BY data DESC";
$resultUltimas = mysqli_query($mysqli, $queryUltimas);
$ultimasNoticias = [];

// Verifica se há resultados e adiciona ao array
if (mysqli_num_rows($resultUltimas) > 0) {
    while ($row = mysqli_fetch_assoc($resultUltimas)) {
        // Se a notícia tem múltiplas imagens separadas por "|", pegamos apenas a primeira
        $imagens = explode("|", $row['foto']);
        $row['foto'] = $imagens[0]; // Usa a primeira imagem

        // Só adiciona a notícia ao array se ela tiver uma imagem
        if (!empty($row['foto'])) {
            $ultimasNoticias[] = $row;
        }
    }
}

// Função para truncar o título
function truncarTitulo($titulo, $limite = 30) {
    if (strlen($titulo) > $limite) {
        return substr($titulo, 0, $limite) . '...'; // Adiciona '...' se o título for truncado
    }
    return $titulo;
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<!-- HEAD -->
<?php 
    $title = "PETComp";
    $cssFiles = ['css/index.css'];
    $jsFiles = ['js/swiper.js', 'js/index.js'];
    include "head.php";
?>

<body>

<script>
    const newsData = <?php echo json_encode($ultimasNoticias, JSON_UNESCAPED_UNICODE); ?>;
</script>

<div class="main">
<?php include 'header.php'; ?>

<div class="background">
    <section class="text-container1">
        <img src="img/petcomptext.png" alt="text petcomp">
    </section> 
    <section class="petianos-container">
        <img src="img/petianosimg.png" alt="imagem dos petianos" id="petianosimg">
    </section>   
</div>

<div class="noticias"> 
    <section class="ultimasnoticiastext">
        <h1>Últimas notícias</h1>
    </section>

    <div class="noticias-container">
        <!-- Bloco noticias -->
        <div class="image-container">
            <img class="img-notice" src="assets/images/noticias/notice1.png" alt="">
            <div class= "grid-news-texts">
                <a class="title" href="">Evento</a>
                <a class="title-overlay" href="">Seletivo 2025.2</a>
            </div>
        </div>

        <div class="image-container">
            <img class="img-notice" src="assets/images/noticias/notice2.png" alt="">
            <div class= "grid-news-texts">
                <a class="title" href="">Evento</a>
                <a class="title-overlay" href="">Acalourada 2025.2</a>
            </div>
        </div>

        <div class="image-container">
            <img class="img-notice" src="assets/images/noticias/notice3.png" alt="">
            <div class= "grid-news-texts">
                <a class="title" href="">Produtos</a>
                <a class="title-overlay" href="">Revista PETComp</a>
            </div>
        </div>

        <div class="image-container">
            <img class="img-notice" src="assets/images/noticias/notice4.png" alt="">

            <div class= "grid-news-texts">
                <a class="title" href="">Evento</a>
                <a class="title-overlay" href="">ExploraComp</a>
                <a href=""><img id="logo-Notice" src="img\Social-Icons.png" alt=""></a>
            </div>

            
        </div>
    </div>
</div>

    <div class="minifundo">
        <img src="img/minifundo.png" alt="minifundo" class="background-img">
        <h2>Ensino, Pesquisa e Extensão</h2>
        <ul>
            <li class="minifundoliimg"> <img src="img/inovacao.png" alt="inovacaoimg"></li>
            <li class="minifundoliimg"> <img src="img/lupa-de-pesquisa.png" alt="lupadepesquisaimg"></li>
            <li class="minifundoliimg"> <img src="img/lampada-de-ideia.png" alt="lampadadeideiaimg"></li>
        </ul>
    </div> 
    <div class="swiper carousel">
    <div class="swiper-wrapper">
        <a href="eventos.php" target="_blank" class="swiper-slide">
            <img src="img/eventos.png" alt="eventos">
            <div class="text-container">
                <h2 class="text-carousel">PET Eventos</h2>
                <h3 class="secundary-text">Veja um pouco dos eventos que o PET participou!</h3>
            </div>
        </a>

        <a href="desenvolvimento.php" target="_blank" class="swiper-slide">
            <img src="img/projetos.jpeg" alt="projetos">
            <div class="text-container">
                <h2 class="text-carousel">PET Projetos</h2>
                <h3 class="secundary-text">Veja um pouco dos projetos que o PET promoveu!</h3>
            </div>
        </a>

        <a href="monitoria.php" target="_blank" class="swiper-slide">
            <img src="img/monitoria.jpg" alt="monitorias">
            <div class="text-container">
                <h2 class="text-carousel">PET Monitorias</h2>
                <h3 class="secundary-text">Veja um pouco das monitorias ofertadas pelo PET!</h3>
            </div>
        </a>
    </div>
    </div>


    <button type="button" class="swiper-button-next"></button>
    <button type="button" class="swiper-button-prev"></button>
    <div class="swiper-pagination"></div>
    </div>
    <div class="atividades">
        <h2 class="activities-title">Atividades</h2>
        <div class="activities-card">
            <img class="activities-img" src="img/image4.png" alt="monitoria">
            <h3 class="activities-subtitle">
                Monitoria
            </h3>
            <a href="monitoria.php" target="_blank"><button class="saibamaisbtn">Saiba mais</button></a>
        </div>
        <div class="activities-card">
            <img class="activities-img" src="img/podcast.png" alt="podcast" id="podcast-card">
            <h3 class="activities-subtitle" >
                Podcast
            </h3>
            <a href="podcast.php" target="_blank"><button class="saibamaisbtn">Saiba mais</button></a>
        </div>
        <div class="activities-card">
            <img class="activities-img" src="img/desenvolvimento-web 1.png" alt="podcast" style="margin-bottom: 0.6rem;">
            <h3 class="activities-subtitle" style="font-size: 25px;">
                Fábrica de Software
            </h3>
            <a href="desenvolvimento.php" target="_blank"><button class="saibamaisbtn">Saiba mais</button></a>
        </div>
        <div class="activities-card">
            <img class="activities-img" src="img/conferencia.png" alt="conferencia" style="margin-bottom: 1.4rem;">
            <h3 class="activities-subtitle" style="font-size: 25px;">
                Eventos
            </h3>
            <a href="eventos.php" target="_blank"><button class="saibamaisbtn">Saiba mais</button></a>
        </div>
        <div class="activities-card">
            <img class="activities-img" src="img/livro-de-capa-preta-fechado.png" alt="conferencia" style="margin-bottom: 1.4rem;">
            <h3 class="activities-subtitle" style="font-size: 25px;">
                Artigos
            </h3>
            <a href="publicacoes.php"><button class="saibamaisbtn">Saiba mais</button></a>
        </div>
        <div class="activities-card">
            <img class="activities-img" src="img/curso-online.png" alt="miniscursos e oficinas" style="margin-bottom: 0.6rem;">
            <h3 class="activities-subtitle" style="font-size: 25px;">
                Minicursos e oficinas
            </h3>
            <a href="minicurso.php" target="_blank"><button class="saibamaisbtn">Saiba mais</button></a>
        </div>
        <div class="text-card">
        <h2 class="final-text">O PETComp desenvolve diversas atividades em pesquisa, ensino e extensão. Clique em um dos cards para obter mais informações!</h2>
        </div>
        
    </div>
</div>

<?php include 'footer.php'; ?>
</div>
</body>
</html>