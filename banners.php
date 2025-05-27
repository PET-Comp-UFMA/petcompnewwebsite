<!DOCTYPE html>
<html lang="pt-BR">


<?php 
    $title = "Banners";
    $cssFiles = ['css/banners.css'];
    $jsFiles = ['js/swiper.js'];
    include "head.php";
?>


<body>
  <?php include('header.php') ?>
    <div class="container-header">
        <h2>Banners</h2>
        <h3>Confira os banners do PETComp</h3>
        <h4><a href="index.php">Página Inicial</a></h4>
        <h4> -> Publicações</h4>
        <h4> -> Banners</h4>
    </div>

    <div class="container-body">
        <p>Aqui você pode encontrar banners de trabalhos realizados e apresentados pelo PETComp ao longo de toda sua história.</p>
    </div>

    <div class="main">
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

            <div class="swiper-pagination"></div>
        </div>
    </div>


  <?php include('footer.php') ?>
  <script src="./js/js.js"></script>
</body>

</html>