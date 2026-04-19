<?php 

require_once 'core/component.php';

class ContainerHeader extends Component {

    public function __construct(
        protected string $titulo_pagina,
        protected string $descricao,
        protected array $caminho
    ) {
        $this->dependencies[] = "../css/monitoria.css";
    }

    public function render(): String {
        ob_start();
        ?>

        <div class="container-header">
            <h2><?= htmlspecialchars($this->titulo_pagina) ?></h2>
            <h3><?= htmlspecialchars($this->descricao) ?></h3>
            <h4><a href="index.php">Página inicial</a></h4>
            
            <?php foreach ($this->caminho as $subcaminho): ?>
                <h4> → <?= htmlspecialchars($subcaminho) ?></h4>
            <?php endforeach; ?>
        </div>

        <?php
        return ob_get_clean();
    }
}

?>
