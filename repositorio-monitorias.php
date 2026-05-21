<?php require_once 'monitorias-config.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<?php
$title = "Repositório";
$cssFiles = ['css/biblioteca.css', 'css/repositorio-monitorias.css'];
$jsFiles = ['js/repositorio_monitorias.js'];
include "head.php";
?>

<body>
    <?php include('header.php') ?>

    <div class="container-header">
        <h2>Repositório Educacional Aberto</h2>
        <?php
        // Qual monitoria está ativa (via GET, default = primeira)
        $id_ativo  = $_GET['monitoria'] ?? $monitorias[0]['id'];
        $monitoria = get_monitoria($id_ativo, $monitorias) ?? $monitorias[0];
        ?>
        <h3><?= htmlspecialchars($monitoria['subtitulo']) ?></h3>
        <h4>
            <a href="">Pagina Inicial</a>
            → <a href="repositorio-educacional">Repositório Educacional</a>
            → <a href="repositorio-educacional/monitorias/materiais?id=<?= urlencode($monitoria['id_json']) ?>"><?= htmlspecialchars($monitoria['subtitulo']) ?></a>
            → <span><?= htmlspecialchars($monitoria['titulo']) ?></span>
        </h4>
    </div>
    <?php
    $href = 'repositorio-educacional/monitorias/materiais?id=' . urlencode($monitoria['id_json']);
    include('components/btn-voltar.php');
    ?>

    <?php
    // Semestre selecionado (default = primeiro da lista)
    $semestre_ativo = $_GET['semestre'] ?? $monitoria['semestres'][0];

    // Filtra as aulas do semestre ativo
    $aulas_semestre = array_values(array_filter(
        $monitoria['aulas'],
        fn($a) => ($a['semestre'] ?? '') === $semestre_ativo
    ));

    // Aula em destaque (índice via GET)
    $aula_idx      = max(0, (int)($_GET['aula'] ?? 0));
    $aula_idx      = empty($aulas_semestre) ? 0 : min($aula_idx, count($aulas_semestre) - 1);
    $aula_destaque = $aulas_semestre[$aula_idx] ?? null;

    // Quantos semestres mostrar antes do "Ver mais"
    $MAX_SEM_VISIVEIS = 8;
    $mostrar_todos    = isset($_GET['todos_semestres']);
    ?>

    <div class="rep-wrap">

        <!-- HERO -->
        <div class="rep-hero">
            <div class="rep-hero-thumb">
                <img src="img/Caixavideo.svg" alt="Ícone Vídeo Aula">
            </div>
            <div class="rep-hero-texto">
                <h1><?= htmlspecialchars($monitoria['titulo']) ?></h1>
                <p><?= htmlspecialchars($monitoria['descricao']) ?></p>
            </div>
        </div>

        <!-- SELEÇÃO DE SEMESTRE -->
        <div class="rep-sem-section">
            <div class="rep-sem-label">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
                Selecione o período para assistir
            </div>
            <div class="rep-sem-sublabel">Escolha abaixo o semestre letivo para carregar as monitorias gravadas</div>

            <div class="rep-sem-pills">
                <?php
                $semestres = $monitoria['semestres'];
                $exibir    = $mostrar_todos ? $semestres : array_slice($semestres, 0, $MAX_SEM_VISIVEIS);
                foreach ($exibir as $sem):
                    $url = 'repositorio-educacional/monitorias/video-aula?monitoria=' . urlencode($monitoria['id'])
                        . '&semestre='  . urlencode($sem)
                        . '&aula=0'
                        . ($mostrar_todos ? '&todos_semestres=1' : '');
                ?>
                    <a href="<?= $url ?>"
                        class="rep-pill <?= $sem === $semestre_ativo ? 'ativo' : '' ?>">
                        <?= htmlspecialchars($sem) ?>
                    </a>
                <?php endforeach; ?>

                <?php if (!$mostrar_todos && count($semestres) > $MAX_SEM_VISIVEIS): ?>
                    <a href="repositorio-educacional/monitorias/video-aula?monitoria=<?= urlencode($monitoria['id']) ?>&semestre=<?= urlencode($semestre_ativo) ?>&todos_semestres=1"
                        class="rep-ver-mais">
                        Ver mais
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- GRID: PLAYER + LISTA -->
        <div class="rep-grid-container">
            <div class="rep-grid">

                <?php if (empty($aulas_semestre)): ?>
                    <!-- Nenhuma aula cadastrada para este semestre -->
                    <div class="rep-empty">
                        <svg viewBox="0 0 24 24">
                            <path d="M3 22V2l18 10L3 22z" />
                        </svg>
                        Nenhuma aula disponível para o semestre <?= htmlspecialchars($semestre_ativo) ?>.
                    </div>

                <?php else: ?>

                    <!-- COLUNA ESQUERDA: Aula em Destaque -->
                    <div>
                        <div class="rep-destaque-titulo">Aula em Destaque</div>

                        <div class="rep-player-wrap">
                            <?php if (!empty($aula_destaque['youtube_id']) && $aula_destaque['youtube_id'] !== 'SUBSTITUA_PELO_ID_DO_YOUTUBE'): ?>
                                <iframe
                                    src="https://www.youtube.com/embed/<?= htmlspecialchars($aula_destaque['youtube_id']) ?>?rel=0&modestbranding=1&color=white"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            <?php else: ?>
                                <div class="rep-player-placeholder">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M3 22V2l18 10L3 22z" />
                                    </svg>
                                    <span>Vídeo em breve</span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="rep-aula-info">
                            <h2><?= htmlspecialchars($aula_destaque['titulo']) ?></h2>
                            <div class="rep-aula-meta">
                                <span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2" />
                                        <line x1="16" y1="2" x2="16" y2="6" />
                                        <line x1="8" y1="2" x2="8" y2="6" />
                                        <line x1="3" y1="10" x2="21" y2="10" />
                                    </svg>
                                    <?= htmlspecialchars($aula_destaque['data']) ?>
                                </span>
                                <span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                    <?= htmlspecialchars($aula_destaque['duracao']) ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- COLUNA DIREITA: Lista de Vídeos -->
                    <div>
                        <div class="rep-lista-titulo">Lista de Vídeos</div>

                        <div class="rep-lista">
                            <?php foreach ($aulas_semestre as $i => $aula):
                                $yt    = $aula['youtube_id'];
                                $ativo = ($i === $aula_idx);
                                $url_item = 'repositorio-educacional/monitorias/video-aula?monitoria=' . urlencode($monitoria['id'])
                                    . '&semestre='  . urlencode($semestre_ativo)
                                    . '&aula='      . $i;
                            ?>
                                <a href="<?= $url_item ?>" class="rep-item <?= $ativo ? 'ativo' : '' ?>">

                                    <!-- Thumbnail -->
                                    <div class="rep-item-thumb">
                                        <?php if ($yt !== 'SUBSTITUA_PELO_ID_DO_YOUTUBE'): ?>
                                            <img src="https://img.youtube.com/vi/<?= htmlspecialchars($yt) ?>/mqdefault.jpg"
                                                alt="" loading="lazy">
                                        <?php else: ?>
                                            <div class="rep-item-thumb-ph">
                                                <svg viewBox="0 0 24 24">
                                                    <path d="M3 22V2l18 10L3 22z" />
                                                </svg>
                                            </div>
                                        <?php endif; ?>
                                        <span class="rep-item-dur"><?= htmlspecialchars($aula['duracao']) ?></span>
                                    </div>

                                    <!-- Info -->
                                    <div class="rep-item-info">
                                        <div class="rep-item-modulo"><?= htmlspecialchars($aula['modulo']) ?></div>
                                        <div class="rep-item-nome"><?= htmlspecialchars($aula['titulo']) ?></div>
                                        <div class="rep-item-data"><?= htmlspecialchars($aula['data']) ?></div>
                                    </div>

                                    <!-- Botão play circular -->
                                    <div class="rep-play-btn">
                                        <svg viewBox="0 0 24 24">
                                            <path d="M3 22V2l18 10L3 22z" />
                                        </svg>
                                    </div>

                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                <?php endif; ?>

            </div><!-- /rep-grid -->
        </div><!-- /rep-grid-container -->

    </div><!-- /rep-wrap -->

    <?php include('footer.php') ?>
</body>

</html>