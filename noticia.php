<?php
require_once 'conexao.php';

// Valida e obtém o parâmetro `id` da URL
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    // Redireciona ou finaliza a execução
    header('Location: ListaNoticias.php');
    exit;
}

// Prepara e executa consulta principal (uso de prepared statement evita SQL injection)
$stmt = $mysqli->prepare('SELECT titulo, texto, foto FROM noticias WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($titulo, $textoRaw, $fotoRaw);

if (!$stmt->fetch()) {
    // Se não encontrou a notícia, redireciona
    header('Location: ListaNoticias.php');
    exit;
}
$stmt->close();

// Divide texto em parágrafos e separa múltiplas imagens
$paragrafos = preg_split("/(\r\n){2,}/", $textoRaw);
$imagens     = array_filter(explode('|', $fotoRaw));

// Consulta os botões relacionados
$btnStmt = $mysqli->prepare('SELECT botaoNome, botaoLink FROM noticias_botoes WHERE idNoticia = ?');
$btnStmt->bind_param('i', $id);
$btnStmt->execute();
$btnStmt->bind_result($botaoNome, $botaoLink);

// Cabeçalho (head.php deverá iterar sobre $cssFiles e imprimir as <link>)
$title    = htmlspecialchars($titulo . ' | PETComp', ENT_QUOTES, 'UTF-8');
$cssFiles = [
    'css/noticias.css',
    'css/styles.css',
    'css/styles2.css',
    'css/noticiaespecifica.css',
    'css/trabalhos_publicados.css'
];
include 'head.php';

// Inclui header global (navbar, logo, etc)
include 'header.php';
?>

<body>
  <main>
    <section class="container noticia-especifica">
      <h1 class="titulo-noticia"><?= htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8') ?></h1>

      <?php if ($imagens): ?>
      <div class="img_noticias">
        <?php foreach ($imagens as $src): ?>
          <img class="img-noticia" src="<?= htmlspecialchars($src, ENT_QUOTES, 'UTF-8') ?>" alt="">
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <?php foreach ($paragrafos as $p): ?>
        <p class="texto-noticia-esp"><?= nl2br(htmlspecialchars(trim($p), ENT_QUOTES, 'UTF-8')) ?></p>
      <?php endforeach; ?>

      <?php if ($btnStmt->execute() && $btnStmt->store_result() && $btnStmt->num_rows): ?>
      <div class="noticia-especifica-botoes">
        <?php 
        $btnStmt->bind_result($nm, $lnk);
        while ($btnStmt->fetch()): ?>
          <a class="botaoGenerico" href="<?= htmlspecialchars($lnk, ENT_QUOTES, 'UTF-8') ?>" target="_blank">
            <?= htmlspecialchars($nm, ENT_QUOTES, 'UTF-8') ?>
          </a>
        <?php endwhile; ?>
      </div>
      <?php endif;
      $btnStmt->close(); ?>

      <div class="voltar">
        <a href="noticias.php" class="button-back">Voltar</a>
      </div>
    </section>
  </main>

  <script src="scripts/script.js" defer></script>
</body>
</html>
