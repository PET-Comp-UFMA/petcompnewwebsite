<?php

require_once __DIR__ . '/../core/component.php';

class ResumoMonitoria extends Component {

    public function __construct(
        protected string $imagem,
        protected string $nomeMonitoria,
        protected string $descricao
    ) {
        $this->cssDependencies[] = "css/components_styles/resumo_monitoria.css";
    }

    public function render(): string{
        ob_start();
        ?>

        <article class="card-monitoria">
            <div class="card-monitoria__aside">
                <img src="<?= $this->imagem ?>" alt="" class="card-monitoria__icon">
            </div>

            <div class="card-monitoria__content">
                <h2 class="card-monitoria__title"><?= $this->nomeMonitoria ?></h2>
                <p class="card-monitoria__description"><?= $this->descricao ?></p>
            </div>
        </article>
        <?php

        return ob_get_clean();
    }

}

?>