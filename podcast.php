<!DOCTYPE html>
<html lang="pt-BR">
<?php 
    $title = "Podcast";
    $cssFiles = ['css/podcast.css'];
    $jsFiles = ['js/podcomp.js'];
    include 'head.php';
    
?>


<body>
    <?php include('header.php') ?>
    <main>
        <div class="container-header">
            <h2>PODComp</h2>
            <h3>O PODCast do PETComp</h3>
            <h4><a href="index.php">Página Inicial</a></h4>
            <h4> → Produtos</h4>
            <h4> → Podcast</h4>
        </div>

        <div class="container-body">
            <p>Com a vinda da pandemia do Covid-19, o grupo teve algumas de suas atividades de Extensão suspensas 
                devido aos protocolos de segurança indicados pela OMS. Pensando nisso, propusemos uma solução que conseguiria 
                alcançar nosso público tanto no âmbito acadêmico, quanto fora dela, na comunidade. Surgiu então, a ideia da criação 
                de um Podcast já que é uma mídia que tem notório crescimento no número de consumidores nos últimos anos, fazendo com 
                que se tornasse uma solução para o distanciamento social, prezado durante a pandemia. Tem-se como público alvo não 
                apenas aqueles que estão inseridos no contexto do grupo, mas sim para quem tem o interesse por tecnologia e também
                quem busca entender mais sobre essa área. Assim, buscamos fazer a sintetização de informações, levando-as de forma 
                clara, atrativa e confiável.
            </p>
        </div>

        <section id="produtos-podcomp">
        <div class="swiper carousel">
            <div class="swiper-wrapper">
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        </div>
        </section>
        

        <?php include 'footer.php'; ?>
        
</body>