<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css" type="text/css">
    <script src="https://unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet.fullscreen/dist/Control.FullScreen.css" />
    <script src="https://unpkg.com/leaflet.fullscreen/dist/Control.FullScreen.umd.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/ubergesundheit/Leaflet.EdgeMarker@master/Leaflet.EdgeMarker.js"></script>
</head>
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
            Esta página oferece uma solução intuitiva e tecnológica para a navegação no Centro de Ciências Exatas e Tecnológicas (CCET) da UFMA, apresentando um mapa interativo detalhado do prédio. Desenvolvida pelos membros do PETComp, a plataforma permite que alunos, professores e visitantes localizem rapidamente salas de aula, auditórios, laboratórios e mais, eliminando a desorientação comum nos corredores do centro. Com uma interface funcional e pensada na experiência do usuário, a ferramenta se consolida como um guia essencial para a comunidade acadêmica, facilitando o fluxo e o acesso às dependências do CCET.
        </p>
    </div>

    <div id="map-container">
        <div id="map">
            <img src="assets/svg/LOGOTIPO - CLARA.svg" class="logo-petcomp" alt="Logo PETComp">

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
                        </svg>
                        Todos
                    </button>

                    <button class="btn-filtro" onclick="filtrarCategoria('sala', this)">
                        <svg viewBox="0 0 24 24" width="14" height="14" stroke="currentColor" stroke-width="2" fill="none">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                        </svg>
                        Salas
                    </button>

                    <button class="btn-filtro" onclick="filtrarCategoria('laboratorio', this)">
                        <svg viewBox="0 0 16 16" width="14" height="14" stroke="currentColor" stroke-width="1.5" fill="none">
                            <path d="m4.75 1.75h6.5m-6.5 8h6.5m-5.5-7.5v4.5l-4 7.5h12.5l-4-7.5v-4.5" />
                        </svg>
                        Laboratórios
                    </button>

                    <button class="btn-filtro" onclick="filtrarCategoria(['coord', 'prof'], this)">
                        <svg viewBox="0 0 24 24" width="14" height="14" stroke="currentColor" stroke-width="2" fill="none">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        Docente
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
                <button class="btn-andar" data-andar="2" onclick="mudarAndar('2', this)">2º Andar</button>
                <button class="btn-andar" data-andar="1" onclick="mudarAndar('1', this)">1º Andar</button>
                <button class="btn-andar ativo" data-andar="terreo" onclick="mudarAndar('terreo', this)" id="btn-terreo">Térreo</button>
            </div>

            <select id="select-bloco" class="seletor-blocos" onchange="filtrarBloco(this.value)">
                <option value="todos">Todos</option>
                <option value="1">Bloco 1</option>
                <option value="2">Bloco 2</option>
                <option value="3">Bloco 3</option>
                <option value="4">Bloco 4</option>
                <option value="5">Bloco 5</option>
                <option value="6">Bloco 6</option>
                <option value="7">Bloco 7</option>
                <option value="8">Bloco 8</option>
                <option value="9">Bloco 9</option>
                <option value="10">Bloco 10</option>
            </select>
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