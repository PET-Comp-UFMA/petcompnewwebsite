<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        #map {
            width: 100%;
            height: 80vh;
            background-color: #ffffff;
        }
    </style>
</head>

<?php
$title = "Mapa CCET";
$cssFiles = ['css/mapa-ccet.css'];
$jsFiles = ['js/mapa-ccet.js'];
include 'head.php';
?>

<body>
    <?php include 'header.php'; ?>

    <div class="container-header">
        <h2>Mapa CCET</h2>
        <h3>Confira o mapa do CCET (Centro de Ciências Exatas e Tecnológicas)</h3>
        <h4><a href="index.php">Página Inicial</a></h4>
        <h4> → Mapa CCET</h4>
    </div>

    <div class="container-body">
        <p>
            Esta página oferece uma solução intuitiva e tecnológica para a navegação no Centro de Ciências Exatas e Tecnológicas (CCET) da UFMA, apresentando um mapa interativo detalhado do prédio. Desenvolvida pelos membros do PETComp, a plataforma permite que alunos, professores e visitantes localizem rapidamente salas de aula, auditórios e laboratórios, eliminando a desorientação comum nos corredores do centro. Com uma interface funcional e pensada na experiência do usuário, a ferramenta se consolida como um guia essencial para a comunidade acadêmica, facilitando o fluxo e o acesso às dependências do CCET.
        </p>
    </div>

    <div id="map-container">
        <div id="map"></div>

        <div class="seletor-andares">
            <button class="btn-andar" onclick="mudarAndar('andar3')">3º Andar</button>
            <button class="btn-andar" onclick="mudarAndar('andar2')">2º Andar</button>
            <button class="btn-andar" onclick="mudarAndar('andar1')">1º Andar</button>
            <button class="btn-andar ativo" onclick="mudarAndar('terreo')" id="btn-terreo">Térreo</button>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="mapa-ccet.js"></script>

</body>

</html>