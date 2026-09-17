<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    $extraHead = '
    <!-- Leaflet e Plugins -->
    <link rel="preload" href="img/mapa-ccet-T.svg" as="image" type="image/svg+xml">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css" type="text/css">
    <script src="https://unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet.fullscreen/dist/Control.FullScreen.css" />
    <script src="https://unpkg.com/leaflet.fullscreen/dist/Control.FullScreen.umd.js" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/ubergesundheit/Leaflet.EdgeMarker@master/Leaflet.EdgeMarker.js" defer></script>
';
    echo $extraHead;
    $isEmbed = isset($_GET['embed']) && $_GET['embed'] == 'true';

    if ($isEmbed):
    ?>
        <style>
            .container-header,
            .container-body,
            h4,
            h5 {
                display: none !important;
            }

            html,
            body {
                margin: 0 !important;
                padding: 0 !important;
                width: 100vw !important;
                height: 100vh !important;
                overflow: hidden !important;
                background-color: transparent !important;
            }

            #map-container {
                width: 100vw !important;
                height: 100vh !important;
                margin: 0 !important;
                border-radius: 0 !important;
                max-width: none !important;
                max-height: none !important;
            }
        </style>
    <?php endif; ?>

</head>

<?php
$title = "Mapa CCET";
$cssFiles = ['css/mapa-ccet.css'];
$jsFiles = ['js/mapa-ccet.js'];
include 'head.php';
?>

<body>
    <?php
    if (!isset($_GET['embed']) || $_GET['embed'] !== 'true') {
        include 'header.php';
    }
    ?>

    <div class="container-header">
        <h2>Mapa CCET</h2>
        <h3>Confira o mapa do CCET (Centro de Ciências Exatas e Tecnológicas)</h3>
        <h4><a href="index.php">Página Inicial</a></h4>
        <h4> → Mapa CCET</h4>
    </div>

    <div class="container-body">
        <p>
            Esta página oferece uma solução intuitiva e tecnológica para a navegação no Centro de Ciências Exatas e Tecnológicas (CCET) da UFMA, apresentando um mapa interativo detalhado do prédio. Desenvolvida pelos membros do PETComp, a plataforma permite que alunos, professores e visitantes localizem rapidamente salas de aula, auditórios, laboratórios e mais, eliminando a desorientação comum nos corredores do centro. Com uma interface funcional e pensada na experiência do usuário, a ferramenta se consolida como um guia essencial para a comunidade acadêmica, facilitando o fluxo e o acesso às dependências do CCET.
        </p>
    </div>


    </div>
    </div>

    <div class="container-body">
        <p> O Mapa Digital do CCET é uma iniciativa idealizada e desenvolvida pelos membros do PETComp. O processo de mapeamento de todo o prédio foi realizado de forma manual, com a equipe percorrendo todos os corredores, andares e blocos do centro para catalogar a localização e informações de cada espaço. Devido ao tamanho do CCET e a mudança constante de salas, algumas informações podem apresentar erros ou estar desatualizadas. Logo, destacamos a importância da colaboração entre a comunidade acadêmica para manter o mapa sempre atualizado e o deixa-lo cada vez melhor.</br></br><strong>Você pode:</strong></p>
        <ul>
            <li>Reportar salas com informações erradas/incompletas, como: numeração, bloco, nome ou descrição.</li>
            <li>Adicionar ou atualizar a foto/logo do seu laboratório, diretório, etc.</li>
            <li>Incluir uma descrição personalizada na sua sala, como: linhas de pesquisa, horários de atendimento, contatos, etc.</li>
            <li>E sugerir novas funcionalidades, melhorias ou apontar bugs na plataforma.</li>
        </ul>
        <p>Para isso, preencha o nosso forms (<a href="https://forms.gle/Hec8p5DiC5p7FsY48" target="_blank" style="color: #016BE5; text-decoration: none; font-weight: bold;">https://forms.gle/Hec8p5DiC5p7FsY48</a>) ou entre em contato conosco pelo nosso e-mail (<a href="mailto:petcomputacao@ufma.br" style="color: #016BE5; text-decoration: none; font-weight: bold;">petcomputacao@ufma.br</a>).</p>
        </p>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>