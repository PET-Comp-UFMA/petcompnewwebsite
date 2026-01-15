<!DOCTYPE html>
<html lang="pt-BR">


<?php 
    $title = "Banners";
    $cssFiles = ['css/banners.css'];
    $jsFiles = ['js/swiper.js'];
    include "head.php";
?>


<body>
    <main>
        <?php include('header.php') ?>
            <div class="container-header">
                <h2>Banners</h2>
                <h3>Confira os banners do PETComp</h3>
                <h4><a href="index.php">Página Inicial</a></h4>
                <h4> -> Publicações</h4>
                <h4> -> Banners</h4>
            </div>

            <div class="container-body">
                <p>Aqui você pode explorar os banners de trabalhos desenvolvidos e apresentados pelo PETComp ao longo de sua trajetória.
                Cada banner representa um capítulo da nossa história — são projetos, pesquisas, eventos e iniciativas que refletem o compromisso do grupo com o ensino, a extensão e a pesquisa em Computação.
                Nesta galeria, você encontrará produções que foram apresentadas em congressos, seminários e encontros acadêmicos, mostrando a evolução das ideias, das tecnologias e das pessoas que fazem parte do PETComp. <br><br>
                Descubra como o grupo tem contribuído para a formação de estudantes, o fortalecimento da comunidade acadêmica e o avanço do conhecimento científico na área da Computação.</p>
            </div>

            <div class="carousel-section">
                <div class="carousel-container">

                    <div class="swiper carousel">
                        <div class="swiper-wrapper">
                        
                            <div class="swiper-slide">
                                <img src="./assets/banners/01.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets/banners/02.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets/banners/03.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets/banners/04.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets/banners/06.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets/banners/07.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets/banners/08.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets/banners/09.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets/banners/10.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets/banners/12.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets/banners/13.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets/banners/14.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets/banners/15.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets/banners/17.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets/banners/18.jpg" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="./assets/banners/19.jpg" alt="">
                            </div>

                        </div>

                        <div class="swiper-controls">
                            <div class="swiper-button-prev" aria-label="Banner anterior"></div>
                            <div class="swiper-pagination"></div>
                        <div class="swiper-button-next" aria-label="Próximo banner"></div>
                    </div>
                    </div>

                </div>
            </div>

            <div class="banner-modal" id="bannerModal">
                <span class="banner-modal-close" id="closeModal">&times;</span>
                <img class="banner-modal-img" id="modalImage" alt="Banner ampliado">
            </div>

        <?php include('footer.php') ?>
        <script src="./js/js.js"></script>
    </main>
</body>

</html>