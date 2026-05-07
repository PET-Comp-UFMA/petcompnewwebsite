<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
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
        <div id="map">
            <img src="assets/svg/LOGOTIPO - CLARA.svg" class="logo-petcomp" alt="Logo PETComp">
        </div>

        <div class="busca-container">
            <div class="input-wrapper">
                <svg class="icone-lupa" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>

                <input type="text" id="input-busca" placeholder="Buscar sala, laboratório...">
            </div>

            <div class="filtros-categoria">
                <button class="btn-filtro ativo" onclick="filtrarCategoria('todos', this)">
                    <svg viewBox="0 0 24 24" width="14" height="14" stroke="currentColor" stroke-width="2" fill="none">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg> Todos
                </button>

                <button class="btn-filtro" onclick="filtrarCategoria('laboratorio', this)">
                    <svg viewBox="0 0 24 24" width="14" height="14" stroke="currentColor" stroke-width="2" fill="none">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg> Laboratórios
                </button>

                <button class="btn-filtro" onclick="filtrarCategoria('sala', this)">
                    <svg viewBox="0 0 24 24" width="14" height="14" stroke="currentColor" stroke-width="2" fill="none">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                    </svg> Salas
                </button>

                <button class="btn-filtro" onclick="filtrarCategoria('auditorio', this)">
                    <svg viewBox="0 0 24 24" width="14" height="14" stroke="currentColor" stroke-width="2" fill="none">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg> Auditórios
                </button>

                <button class="btn-filtro" onclick="filtrarCategoria('outros', this)">
                    <svg viewBox="0 0 24 24" width="14" height="14" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7" rx="1"></rect>
                        <rect x="14" y="3" width="7" height="7" rx="1"></rect>
                        <rect x="14" y="14" width="7" height="7" rx="1"></rect>
                        <rect x="3" y="14" width="7" height="7" rx="1"></rect>
                    </svg>
                    Outros
                </button>
            </div>
        </div>

        <div class="seletor-andares">
            <button class="btn-andar" onclick="mudarAndar('andar2', this)">2º Andar</button>
            <button class="btn-andar" onclick="mudarAndar('andar1', this)">1º Andar</button>
            <button class="btn-andar ativo" onclick="mudarAndar('terreo', this)" id="btn-terreo">Térreo</button>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="mapa-ccet.js"></script>

</body>

</html>