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
        <section class="sobre-podcomp">
            <div class="podcomp-inner">
                <div class="podcomp-textos">
                    <span class="solido">Dicas</span>
                    <span class="contorno">Recomendações</span>
                    <span class="solido">Notícias</span>
                    <span class="contorno">Informações</span>
                    <span class="solido">Experiências</span>
                </div>


                <div class="podcomp-player">

                    <div class="podcomp-top-row">
                        <div class="podcomp-thumb">
                            <img src="img/thumb ep13.png" alt="PodComp Episódio 13 - Carreiras em T.I." />
                        </div>
                        <p class="podcomp-title">O Podcast de Ciência da Computação</p>
                        <div class="podcomp-spotify-icon">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm4.586 14.424a.623.623 0 01-.857.208c-2.348-1.435-5.304-1.76-8.785-.964a.623.623 0 01-.277-1.215c3.809-.87 7.077-.496 9.712 1.115a.623.623 0 01.207.856zm1.223-2.722a.78.78 0 01-1.072.257c-2.687-1.652-6.785-2.13-9.965-1.166a.78.78 0 01-.456-1.49c3.632-1.115 8.147-.575 11.235 1.327a.78.78 0 01.258 1.072zm.105-2.835C14.692 8.95 9.375 8.775 6.297 9.71a.937.937 0 11-.543-1.794c3.527-1.07 9.393-.863 13.098 1.382a.937.937 0 01-.938 1.57z" />
                            </svg>
                        </div>
                    </div>

                    <div class="podcomp-controls">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 6h2v12H6zm3.5 6 8.5 6V6z" />
                        </svg>
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 19h4V5H6zm8-14v14h4V5z" />
                        </svg>
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 18l8.5-6L6 6v12zm2-8.14L11.03 12 8 14.14V9.86zM16 6h2v12h-2z" />
                        </svg>
                    </div>
                    <div class="podcomp-bar-track">
                        <div class="podcomp-bar-fill"></div>
                    </div>

                </div>
            </div>
        </section>
        <section id="produtos-podcomp">
            <h2 class="pc-titulo">Episódios</h2>
            <div class="pc-wrapper">
                <button class="pc-btn" id="pc-prev" aria-label="Anterior">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 6l-6 6 6 6M11 6l-6 6 6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                    </svg>
                </button>
                <div class="pc-track" id="pc-track"></div>
                <button class="pc-btn" id="pc-next" aria-label="Próximo">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 6l6 6-6 6M13 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                    </svg>
                </button>
            </div>
            <div class="pc-dots" id="pc-dots"></div>
        </section>


        <?php include 'footer.php'; ?>

</body>