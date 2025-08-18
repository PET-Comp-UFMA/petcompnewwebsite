<?php
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETComp</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://fonts.googleapis.com/css?family=Alatsi" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Mada' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Alatsi' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Sora' rel='stylesheet'>
    <link rel="stylesheet" href="./css/index.css">
    
    <link rel="stylesheet" href="css/globals.css">
</head>
<body>

<script>
    const newsData = <?php echo json_encode($ultimasNoticias, JSON_UNESCAPED_UNICODE); ?>;
</script>

<?php include 'header.php'; ?>

<div class="background">
    <section class="text-container">
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
        <div class="container d-flex justify-content-md-center" id="center">
            <div class="row align-items-center w-100">
                <!-- Coluna Central -->
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <div class="image-container noticia">
                        <img src="<?php echo isset($ultimasNoticias[0]) ? htmlspecialchars($ultimasNoticias[0]['foto']) : ''; ?>" 
                             alt="Notícia Central" 
                             class="img-fluid central-img">
                        <div class="central-title titulo">
                            <?php echo isset($ultimasNoticias[0]) ? htmlspecialchars(truncarTitulo($ultimasNoticias[0]['titulo'], 60)) : ''; ?>
                        </div>
                    </div>
                </div>
                <!-- Coluna Lateral -->
                <div class="col-12 col-md-3 d-flex flex-column align-items-center">
                    <?php if (isset($ultimasNoticias[1])): ?>
                    <div class="image-container noticia">
                        <img src="<?php echo htmlspecialchars($ultimasNoticias[1]['foto']); ?>" 
                             alt="Notícia Lateral 1" 
                             class="img-fluid lateral-img">
                        <div class="lateral-title titulo">
                            <?php echo htmlspecialchars(truncarTitulo($ultimasNoticias[1]['titulo'], 30)); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if (isset($ultimasNoticias[2])): ?>
                    <div class="image-container noticia">
                        <img src="<?php echo htmlspecialchars($ultimasNoticias[2]['foto']); ?>" 
                             alt="Notícia Lateral 2" 
                             class="img-fluid lateral-img">
                        <div class="lateral-title titulo">
                            <?php echo htmlspecialchars(truncarTitulo($ultimasNoticias[2]['titulo'], 30)); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div cl
    ass="separator">
        <img src="img/separator.png" alt="separador">
    </div>

    <div class="minifundo">
        <img src="img/minifundo.png" alt="minifundo" class="background-img">
        <h2>Ensino, Pesquisa e Extensão</h2>
        <ul>
            <li> <img src="img/inovacao.png" alt="inovacaoimg"></li>
            <li> <img src="img/lupa-de-pesquisa.png" alt="lupadepesquisaimg"></li>
            <li> <img src="img/lampada-de-ideia.png" alt="lampadadeideiaimg"></li>
        </ul>
    </div> 
    <div class="swiper carousel">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <h2 class="text-carousel">PET Eventos</h2>
                <h3 class="secundary-text">Veja um pouco dos eventos que o PET participou!</h3>
                <img src="img/eventos.png" alt="eventos">
                
            </div>
            <div class="swiper-slide"> 
                    <img  src="img/projetos.jpeg" alt="">
                    <h2 class="text-carousel">PET Projetos</h2>
                    <h3 class="secundary-text">Veja um pouco dos projetos que o PET promoveu!</h3>
            </div>
            <div class="swiper-slide"> 
                    <img  src="img/monitoria.jpg" alt="">
                    <h2 class="text-carousel">PET Monitorias</h2>
                    <h3 class="secundary-text">Veja um pouco das monitorias ofertadas pelo PET!</h3>
            </div>
        </div>
        <button type="button" class="swiper-button-next"></button>
        <button type="button" class="swiper-button-prev"></button>
        <div class="swiper-pagination"></div>
    </div>

    <div class="atividades">
        <h2 class="activities-title">Atividades</h2>
        <div class="activities-card">
            <img class="activities-img" src="img/monitoria.png" alt="monitoria">
            <h3 class="activities-subtitle">
                Monitoria
            </h3>
            <a href=""><button class="saibamaisbtn">Saiba mais</button></a>
        </div>
        <div class="activities-card">
            <img class="activities-img" src="img/podcast.png" alt="podcast" id="podcast-card">
            <h3 class="activities-subtitle" >
                Podcast
            </h3>
            <a href=""><button class="saibamaisbtn">Saiba mais</button></a>
        </div>
        <div class="activities-card">
            <img class="activities-img" src="img/desenvolvimento-web 1.png" alt="desenvolvimento">
            <h3 class="activities-subtitle">
                Fábrica de Software
            </h3>
            <a href=""><button class="saibamaisbtn">Saiba mais</button></a>
        </div>
        <div class="activities-card">
            <img class="activities-img" src="img/conferencia.png" alt="conferencia">
            <h3 class="activities-subtitle">
                Eventos
            </h3>
            <a href=""><button class="saibamaisbtn">Saiba mais</button></a>
        </div>
        <div class="activities-card">
            <img class="activities-img" src="img/livro-de-capa-preta-fechado.png" alt="conferencia">
            <h3 class="activities-subtitle">
                Artigos
            </h3>
            <a href=""><button class="saibamaisbtn">Saiba mais</button></a>
        </div>
        <div class="activities-card">
            <img class="activities-img" src="img/curso-online.png" alt="minicursos e oficinas">
            <h3 class="activities-subtitle">
                Minicursos e oficinas
            </h3>
            <a href=""><button class="saibamaisbtn">Saiba mais</button></a>
        </div>
        <div class="text-card">
        <h2 class="final-text">O PETComp desenvolve diversas atividades em pesquisa, ensino e extensão. Clique em um dos cards para obter mais informações!</h2>
        </div>
        
    </div>
</div>

<?php include 'footer.php'; ?>

<!-- Referência ao arquivo JS externo -->
<script src="js/js.js" defer></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>