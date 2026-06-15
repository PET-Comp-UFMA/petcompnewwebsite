<?php require_once "scripts.php/renderComponent.php" ?>



<!DOCTYPE html>
<html lang="pt-br">

<?php
$title = "Planejamento";
$cssFiles = ['css/planejamento.css'];
include 'head.php';
?>

<body>

    <?php include('header.php') ?>

    <main>

        <?php
            renderComponent("container-header.php", [
                "titulo_pagina" => "Planejamento Anual",
                "descricao" => "",
                "caminho" => ["Publicações","Planejamento Anual"]
            ]);
            ?>

            <?php
            $href = '';
            include('components/btn-voltar.php');
        ?>
        <section class="planejamentos">

            <div class="menu-lateral">
                <div>
                    <p>Planejamento Anual</p>
                </div>
                <div>
                    <p>Relatório Anual</p>
                </div>
            </div>

            <div>
                <h1 id="title-documents">Titulo</h1>
                <?php
                    $json = file_get_contents('data/planejamentos.json');
                    $planejamentos = json_decode($json, true);
                foreach ($planejamentos as $planejamento):
                ?>
                
                <div class="planejamento-card">

                    
                    <div class="planejamento-left">
                        <span class="documents-icon">
                                <img src="assets/svg/iconDocuments.svg" alt="">
                        </span>
                        <div class="planejamento-info">
                        
                            <h2><?= $planejamento['titulo'] ?></h2>
                            <p>
                                Publicado em
                                <?= $planejamento['dataPublicacao'] ?>
                            </p>
                        
                        </div>
                    </div>

                    <div>
                        <a href="<?= $planejamento['arquivo'] ?> "target="_blank" class="btn-documento">
                            Ver documento
                        </a>
                    </div>

                </div>
                    <?php endforeach; ?>
            </div>
        </section>

    </main>

    <?php include('footer.php')?>
    
</body>
</html>