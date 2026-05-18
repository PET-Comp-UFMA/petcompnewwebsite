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
function truncarTitulo($titulo, $limite = 30)
{
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
            <section class="text-PETCOMP">
                <img src="img/petcomptext.png" alt="text petcomp">
            </section>
            <section class="petianos-container">
                <img src="img/foto_headerP.svg" alt="imagem dos petianos" id="petianosimg">
            </section>
        </div>

        <div class="noticias">
            <section class="ultimasnoticiastext">
                <h1>Últimas notícias</h1>
            </section>

            <div class="noticias-container">
                <!-- Bloco noticias -->
                <div class="image-container">
                    <a class="noticia-link" href="noticias/38" target="_blank">
                        <img class="img-notice" src="assets/images/noticias/notice5.png" alt="REAPet">
                        <div class="grid-news-texts">
                            <span class="title" target="_blank">Produtos</span>
                            <span class="title-overlay" target="_blank">REA-PET</span>
                        </div>
                    </a>
                    <a class="instagram-link" href="https://www.instagram.com/p/DYF6WtYkQmr/?img_index=1"
                        target="_blank">
                        <img id="logo-Notice" src="img\Social-Icons.png" alt="icone instagram">
                    </a>
                </div>

                <div class="image-container">
                    <a class="noticia-link" href="noticias/55" target="_blank">
                        <img class="img-notice" src="assets/images/noticias/noticia1.jpg" alt="">
                        <div class="grid-news-texts">
                            <span class="title" target="_blank">Evento</span>
                            <span class="title-overlay">Acalourada 2026.1</span>
                        </div>
                    </a>
                    <a class="instagram-link" href="https://www.instagram.com/petcompufma/p/DVdvldvgANX/"
                        target="_blank">
                        <img id="logo-Notice" src="img\Social-Icons.png" alt="icone instagram">
                    </a>
                </div>

                <div class="image-container">
                    <a class="noticia-link" href="noticias/54" target="_blank">
                        <img class="img-notice" src="assets/images/noticias/noticia2.jpg" alt="">
                        <div class="grid-news-texts">
                            <span class="title" target="_blank">Evento</span>
                            <span class="title-overlay" target="_blank">MARAPET</span>
                        </div>
                    </a>
                    <a class="instagram-link" href="https://www.instagram.com/petufma?igsh=MTlpcjdqa2xudGRrbA=="
                        target="_blank">
                        <img id="logo-Notice" src="img\Social-Icons.png" alt="icone instagram">
                    </a>
                </div>

                <div class="image-container">
                    <a class="noticia-link" href="https://online.fliphtml5.com/hyccq/wkkw/#p=8" target="_blank">
                        <img class="img-notice" src="assets/images/noticias/notice3.png" alt="">
                        <div class="grid-news-texts">
                            <span class="title" target="_blank">Publicações</span>
                            <span class="title-overlay" target="_blank">Revista PETComp</span>
                        </div>
                    </a>
                    <a class="instagram-link" href="https://www.instagram.com/p/DDHxxEiRddK/" target="_blank">
                        <img id="logo-Notice" src="img\Social-Icons.png" alt="icone instagram">
                    </a>
                </div>
            </div>
        </div>

        <div class="minifundo">
            <div class="grid-minifundo">
                <h2>Ensino, Pesquisa e Extensão</h2>
                <ul class="img-minifundo">
                    <li><img src="img/inovacao.png" alt="Inovação"></li>
                    <li><img src="img/lupa-de-pesquisa.png" alt="Pesquisa"></li>
                    <li><img src="img/lampada-de-ideia.png" alt="Ideias"></li>
                </ul>
            </div>
        </div>

        <div class="swiper carousel">
            <div class="swiper-wrapper">
                <a href="eventos" target="_blank" class="swiper-slide">
                    <img src="img/eventos.png" alt="eventos">
                    <div class="text-container">
                        <h2 class="text-carousel">PET Eventos</h2>
                        <h3 class="secundary-text">Veja um pouco dos eventos que o PET participou!</h3>
                    </div>
                </a>

                <a href="desenvolvimento" target="_blank" class="swiper-slide">
                    <img src="img/projetos.jpeg" alt="projetos">
                    <div class="text-container">
                        <h2 class="text-carousel">PET Projetos</h2>
                        <h3 class="secundary-text">Veja um pouco dos projetos que o PET promoveu!</h3>
                    </div>
                </a>

                <a href="monitoria" target="_blank" class="swiper-slide">
                    <img src="img/monitoria.jpg" alt="monitorias">
                    <div class="text-container">
                        <h2 class="text-carousel">PET Monitorias</h2>
                        <h3 class="secundary-text">Veja um pouco das monitorias ofertadas pelo PET!</h3>
                    </div>
                </a>
            </div>

            <!-- botões e paginação devem estar dentro do swiper -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="atividades">
            <h2 class="activities-title">Atividades</h2>
            <div class="activities-card">
                <img class="activities-img" src="img/image4.png" alt="monitoria">
                <h3 class="activities-subtitle">
                    Monitoria
                </h3>
                <a href="monitoria" target="_blank"><button class="saibamaisbtn">Saiba mais</button></a>
            </div>
            <div class="activities-card">
                <img class="activities-img" src="img/podcast.png" alt="podcast" id="podcast-card">
                <h3 class="activities-subtitle">
                    Podcast
                </h3>
                <a href="podcast" target="_blank"><button class="saibamaisbtn">Saiba mais</button></a>
            </div>
            <div class="activities-card">
                <img class="activities-img" src="img/desenvolvimento-web 1.png" alt="podcast"
                    style="margin-bottom: 0.6rem;">
                <h3 class="activities-subtitle" style="font-size: 25px;">
                    Fábrica de Software
                </h3>
                <a href="desenvolvimento" target="_blank"><button class="saibamaisbtn">Saiba mais</button></a>
            </div>
            <div class="activities-card">
                <img class="activities-img" src="img/conferencia.png" alt="conferencia" style="margin-bottom: 1.4rem;">
                <h3 class="activities-subtitle" style="font-size: 25px;">
                    Eventos
                </h3>
                <a href="eventos" target="_blank"><button class="saibamaisbtn">Saiba mais</button></a>
            </div>
            <div class="activities-card">
                <img class="activities-img" src="img/livro-de-capa-preta-fechado.png" alt="conferencia"
                    style="margin-bottom: 1.4rem;">
                <h3 class="activities-subtitle" style="font-size: 25px;">
                    Artigos
                </h3>
                <a href="publicacoes"><button class="saibamaisbtn">Saiba mais</button></a>
            </div>
            <div class="activities-card">
                <img class="activities-img" src="img/curso-online.png" alt="miniscursos e oficinas"
                    style="margin-bottom: 0.6rem;">
                <h3 class="activities-subtitle" style="font-size: 25px;">
                    Minicursos e oficinas
                </h3>
                <a href="minicurso" target="_blank"><button class="saibamaisbtn">Saiba mais</button></a>
            </div>
            <div class="text-card">
                <h2 class="final-text">O PETComp desenvolve diversas atividades em pesquisa, ensino e extensão. Clique
                    em um dos cards para obter mais informações!</h2>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    </div>
</body>

</html>