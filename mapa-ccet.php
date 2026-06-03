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

    <?php
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

    <div id="map-container">
        <div id="map">
            <img src="assets/svg/LOGOTIPO - CLARA.svg" class="logo-petcomp" alt="Nicolas Caliman">

            <div class="busca-container">
                <div class="input-wrapper">
                    <svg class="icone-lupa" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>

                    <input type="text" id="input-busca" placeholder="Buscar sala, lab, professor...">

                    <button id="btn-limpar-busca" class="btn-limpar" aria-label="Limpar busca" title="Limpar pesquisa" style="display: none;">
                        <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
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

                    <button class="btn-filtro" onclick="filtrarCategoria(['wc-m', 'wc-f'], this)">
                        <svg fill="currentColor" width="20" height="20" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <path d="M 9 4 C 6.800781 4 5 5.800781 5 8 C 5 9.113281 5.476563 10.117188 6.21875 10.84375 C 4.886719 11.746094 4 13.285156 4 15 L 4 20.625 L 6 21.625 L 6 28 L 12 28 L 12 21.625 L 14 20.625 L 14 15 C 14 13.285156 13.113281 11.746094 11.78125 10.84375 C 12.523438 10.117188 13 9.113281 13 8 C 13 5.800781 11.199219 4 9 4 Z M 22 4 C 19.800781 4 18 5.800781 18 8 C 18 9.152344 18.523438 10.175781 19.3125 10.90625 C 18.40625 11.585938 17.746094 12.597656 17.53125 13.8125 C 17.53125 13.824219 17.53125 13.832031 17.53125 13.84375 L 16.03125 21.8125 L 15.78125 23 L 19 23 L 19 28 L 25 28 L 25 23 L 28.21875 23 L 27.96875 21.8125 L 26.46875 13.84375 C 26.46875 13.832031 26.46875 13.824219 26.46875 13.8125 C 26.253906 12.597656 25.59375 11.585938 24.6875 10.90625 C 25.476563 10.175781 26 9.152344 26 8 C 26 5.800781 24.199219 4 22 4 Z M 9 6 C 10.117188 6 11 6.882813 11 8 C 11 9.117188 10.117188 10 9 10 C 7.882813 10 7 9.117188 7 8 C 7 6.882813 7.882813 6 9 6 Z M 22 6 C 23.117188 6 24 6.882813 24 8 C 24 9.117188 23.117188 10 22 10 C 20.882813 10 20 9.117188 20 8 C 20 6.882813 20.882813 6 22 6 Z M 9 12 C 10.65625 12 12 13.34375 12 15 L 12 19.375 L 10 20.375 L 10 26 L 8 26 L 8 20.375 L 6 19.375 L 6 15 C 6 13.34375 7.34375 12 9 12 Z M 22 12 C 23.230469 12 24.277344 12.816406 24.5 14.15625 L 24.5 14.1875 L 24.53125 14.1875 L 25.8125 21 L 23 21 L 23 26 L 21 26 L 21 21 L 18.1875 21 L 19.46875 14.1875 L 19.5 14.1875 L 19.5 14.15625 C 19.722656 12.816406 20.769531 12 22 12 Z" />
                        </svg>
                    </button>

                    <button class="btn-filtro" onclick="filtrarCategoria('bebedouro', this)">
                        <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 18C11.5597 18 11.1318 17.8547 10.7825 17.5867C10.4332 17.3187 10.1821 16.9429 10.0681 16.5176" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <path d="M10.4243 4.67868C11.0553 3.60606 11.3707 3.06975 11.8223 2.98822C11.9398 2.967 12.0602 2.967 12.1777 2.98822C12.6293 3.06975 12.9447 3.60606 13.5757 4.67868L15.244 7.51482C16.41 9.49693 17.3197 11.619 17.9515 13.8301V13.8301C18.9781 17.4232 16.2801 21 12.5432 21H11.4568C7.71989 21 5.02193 17.4232 6.04854 13.8301V13.8301C6.6803 11.619 7.59004 9.49693 8.75599 7.51482L10.4243 4.67868Z" stroke="currentColor" stroke-width="2" />
                        </svg>
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