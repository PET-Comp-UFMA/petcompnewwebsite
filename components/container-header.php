<div class="container-header">
    <h2><?= htmlspecialchars($titulo_pagina) ?></h2>
    <h3><?= htmlspecialchars($descricao) ?></h3>
    <h4><a href="index.php">Página inicial</a></h4>
    
    <?php foreach ($caminho as $subcaminho): ?>
        <h4> → <?= htmlspecialchars($subcaminho) ?></h4>
    <?php endforeach; ?>
</div>