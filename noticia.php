<?php
global $root;
require_once 'conexao.php';

$id = isset($_GET["id"]) ? filter_var($_GET["id"], FILTER_VALIDATE_INT) : null;
if (!$id) {
    header("Location: /$root");
    exit;
}

$stmt = $mysqli->prepare('SELECT titulo, texto, foto FROM noticias WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($titulo, $textoRaw, $fotoRaw);

if (!$stmt->fetch()) {
    header("Location: /$root");
    exit;
}
$stmt->close();

$paragrafos = preg_split("/(\r\n){2,}/", $textoRaw);
$imagens = array_filter(explode('|', $fotoRaw));

$title = htmlspecialchars($titulo . ' | PETComp', ENT_QUOTES, 'UTF-8');
$cssFiles = ["css/noticiaespecifica.css"];
include 'head.php';
include 'header.php';
?>

<body>
  <main>
    <section class="container noticia-especifica">
      <h1 class="titulo-noticia">
        <?= htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8') ?>
      </h1>

      <?php if ($imagens): ?>
      <div class="img_noticias">
        <?php foreach ($imagens as $src): ?>
          <img class="img-noticia"
               src="<?= htmlspecialchars($src, ENT_QUOTES, 'UTF-8') ?>"
               alt="">
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <?php foreach ($paragrafos as $p): ?>
        <p class="texto-noticia-esp">
          <?= nl2br(htmlspecialchars(trim($p), ENT_QUOTES, 'UTF-8')) ?>
        </p>
      <?php endforeach; ?>

      <!-- BOTÃO VOLTAR COM FALLBACK -->
      <div class="voltar">
        <button onclick="voltarPagina()" class="button-back">Voltar</button>
      </div>

    </section>
  </main>

  <script>
  function voltarPagina() {
    if (window.history.length > 1) {
      window.history.back();
    } else {
      window.location.href = "/<?= $root ?>";
    }
  }
</script>

  <script src="scripts/script.js" defer></script>
</body>
</html>
