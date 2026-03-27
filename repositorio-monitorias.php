<?php
require_once 'monitorias-config.php';

// Pega qual monitoria está sendo visualizada (default: primeira)
$id_ativo = $_GET['monitoria'] ?? $monitorias[0]['id'];
$monitoria = get_monitoria($id_ativo) ?? $monitorias[0];

// Semestre selecionado (default: primeiro da lista)
$semestre_ativo = $_GET['semestre'] ?? $monitoria['semestres'][0];

// Aula em destaque: ?aula=2 (índice), default 0
$aula_idx = isset($_GET['aula']) ? (int)$_GET['aula'] : 0;
$aula_idx = max(0, min($aula_idx, count($monitoria['aulas']) - 1));
$aula_destaque = $monitoria['aulas'][$aula_idx];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<?php
  $title = "Repositório Educacional —" . htmlspecialchars($monitoria['titulo']);
  $cssFiles = ['css/repositorio-monitorias.css', 'css\biblioteca.css'];
  include 'head.php';
?>

<body>
  <?php include 'header.php'; ?>

  <div class="container-header">    
      <h2>Biblioteca</h2>
      <h3>Veja os nossos repositórios</h3>
      <h4><a href="index.php">Página Inicial</a></h4>
      <h4> → <a href="biblioteca-petcomp-main.php">Repositório Educacional</a></h4>
      <h4> → Monitoria de Algoritmos 1</h4>
      <h4> → Vídeo Aula de Algoritmos 1</h4>
  </div>

  <section class="monitoria-hero">
      <div class="container hero-inner">
          <div class="hero-thumb">
              <div class="fake-player">
                  <div class="fake-play-btn"></div>
              </div>
          </div>
          <div class="hero-info">
              <h1 class="hero-titulo"><?= htmlspecialchars($monitoria['titulo']) ?></h1>
              <p class="hero-desc"><?= htmlspecialchars($monitoria['descricao']) ?></p>
          </div>
      </div>
  </section>

  <main class="main-content container">

      <div class="semestre-card">
          <div class="semestre-header-info">
              <div class="icon-calendario">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
              </div>
              <div class="titulo-subtitulo">
                  <h3>Selecione o período para assistir</h3>
                  <p>Escolha abaixo o semestre letivo para carregar as monitorias gravadas</p>
              </div>
          </div>
          
          <div class="semestre-bar-inner">
            <?php foreach ($monitoria['semestres'] as $sem): ?>
            <a href="?monitoria=<?= urlencode($monitoria['id']) ?>&semestre=<?= urlencode($sem) ?>&aula=0"
              class="semestre-btn <?= $sem === $semestre_ativo ? 'ativo' : '' ?>">
                <?= htmlspecialchars($sem) ?>
            </a>
            <?php endforeach; ?>
            <button class="semestre-btn btn-ver-mais">Ver mais <span>v</span></button>
          </div>
      </div>

      <div class="video-grid">
          <div class="player-area">
              <h3 class="section-title">Aula em Destaque</h3>
              <div class="player-wrap">
                  <?php if ($aula_destaque['youtube_id'] !== 'SUBSTITUA_PELO_ID_DO_YOUTUBE'): ?>
                  <iframe
                      src="https://www.youtube.com/embed/<?= htmlspecialchars($aula_destaque['youtube_id']) ?>?rel=0&modestbranding=1"
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen>
                  </iframe>
                  <?php else: ?>
                  <div style="display:flex;align-items:center;justify-content:center;height:100%;color:#fff;flex-direction:column;gap:8px;opacity:.5">
                      <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                      <span style="font-size:.85rem">Adicione o ID do YouTube no config</span>
                  </div>
                  <?php endif; ?>
              </div>

              <div class="player-info">
                  <h2 class="player-titulo"><?= htmlspecialchars($aula_destaque['titulo']) ?></h2>
                  <div class="player-meta">
                      <span>
                          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                          <?= htmlspecialchars($aula_destaque['data'] ?? '08 de Outubro, 2025') ?>
                      </span>
                      <span>
                          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                          <?= htmlspecialchars($aula_destaque['duracao']) ?>
                      </span>
                  </div>
              </div>
          </div>

          <aside class="playlist-card">
              <div class="lista-header">
                  Lista de Vídeos
              </div>
              
              <div class="playlist-items">
                  <?php foreach ($monitoria['aulas'] as $i => $aula): ?>
                  <?php $yt_id = $aula['youtube_id']; $is_ativa = $i === $aula_idx; ?>
                  <a href="?monitoria=<?= urlencode($monitoria['id']) ?>&semestre=<?= urlencode($semestre_ativo) ?>&aula=<?= $i ?>"
                    class="aula-card <?= $is_ativa ? 'ativa' : '' ?>">

                      <div class="aula-thumb">
                          <?php if ($yt_id !== 'SUBSTITUA_PELO_ID_DO_YOUTUBE'): ?>
                          <img src="https://img.youtube.com/vi/<?= htmlspecialchars($yt_id) ?>/mqdefault.jpg"
                              alt="Thumbnail <?= htmlspecialchars($aula['titulo']) ?>"
                              loading="lazy">
                          <?php else: ?>
                          <div class="aula-thumb-placeholder">
                              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                          </div>
                          <?php endif; ?>
                          <span class="thumb-duration"><?= htmlspecialchars($aula['duracao']) ?></span>
                      </div>

                      <div class="aula-info">
                          <div class="aula-titulo"><?= htmlspecialchars($aula['modulo']) ?>:<br> <?= htmlspecialchars($aula['titulo']) ?></div>
                          <div class="aula-autor">Eldo Gustavo, 22/2</div>
                          <div class="aula-status"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg> Assistido</div>
                      </div>

                      <div class="aula-action">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon></svg>
                      </div>
                  </a>
                  <?php endforeach; ?>
              </div>
          </aside>
      </div>

  </main>
  <?php include 'footer.php'; ?>
</body>
</html>