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

            <section>
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
            </section>

            <div class="banner-modal" id="bannerModal">
                <span class="banner-modal-close" id="closeModal">&times;</span>
                <img class="banner-modal-img" id="modalImage" alt="Banner ampliado">
            </div>

            <section class="banner-info-section">
                <div class="info-container">

                    <div class="swiper info-carousel">
                        <div class="swiper-wrapper">

                            <!-- CARD 1 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Título banner 1</h3>
                                <p>Descrição banner 1</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/01.jpg">Visualizar</button>
                                <a href="./assets/banners/01.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 2 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Título banner 2</h3>
                                <p>Descrição banner 2</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/02.jpg">Visualizar</button>
                                <a href="./assets/banners/02.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 3 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Título banner 3</h3>
                                <p>Descrição banner 3</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/03.jpg">Visualizar</button>
                                <a href="./assets/banners/03.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 4 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Título banner 4</h3>
                                <p>Descrição banner 4</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/04.jpg">Visualizar</button>
                                <a href="./assets/banners/04.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 6 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Título banner 6</h3>
                                <p>Descrição banner 6</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/06.jpg">Visualizar</button>
                                <a href="./assets/banners/06.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 7 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Título banner 7</h3>
                                <p>Descrição banner 7</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/07.jpg">Visualizar</button>
                                <a href="./assets/banners/07.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 8 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Título banner 8</h3>
                                <p>Descrição banner 8</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/08.jpg">Visualizar</button>
                                <a href="./assets/banners/08.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 9 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Título banner 9</h3>
                                <p>Descrição banner 9</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/09.jpg">Visualizar</button>
                                <a href="./assets/banners/09.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 10 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Título banner 10</h3>
                                <p>Descrição banner 10</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/10.jpg">Visualizar</button>
                                <a href="./assets/banners/10.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 12 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Título banner 12</h3>
                                <p>Descrição banner 12</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/12.jpg">Visualizar</button>
                                <a href="./assets/banners/12.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 13 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Título banner 13</h3>
                                <p>Descrição banner 13</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/13.jpg">Visualizar</button>
                                <a href="./assets/banners/13.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 14 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Título banner 14</h3>
                                <p>Descrição banner 14</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/14.jpg">Visualizar</button>
                                <a href="./assets/banners/14.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 15 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Título banner 15</h3>
                                <p>Descrição banner 15</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/15.jpg">Visualizar</button>
                                <a href="./assets/banners/15.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 17 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Título banner 17</h3>
                                <p>Descrição banner 17</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/17.jpg">Visualizar</button>
                                <a href="./assets/banners/17.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 18 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Título banner 18</h3>
                                <p>Descrição banner 18</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/18.jpg">Visualizar</button>
                                <a href="./assets/banners/18.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                            <!-- CARD 19 -->
                            <div class="swiper-slide">
                            <div class="banner-card">
                                <h3>Título banner 19</h3>
                                <p>Descrição banner 19</p>

                                <div class="banner-card-actions">
                                <button class="btn-view" data-img="./assets/banners/19.jpg">Visualizar</button>
                                <a href="./assets/banners/19.jpg" download class="btn-download">Download</a>
                                </div>
                            </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section>

        <?php include('footer.php') ?>
        <script src="./js/js.js"></script>
    </main>
</body>

</html>