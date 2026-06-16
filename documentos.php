<?php require_once "scripts.php/renderComponent.php" ?>

<?php

$tipo = $_GET['tipo'] ?? 'planejamento';

if ($tipo == 'relatorio') {
    $json = file_get_contents('data/relatorios.json');
    $tituloPagina = "Relatórios Anuais";
    $titulohead = "Relatorio";
} else {
    $json = file_get_contents('data/planejamentos.json');
    $tituloPagina = "Planejamentos Anuais";
    $titulohead = "Planejamento";
}

$documentos = json_decode($json, true);

?>

<!-- 
 
Quer Adicionar um novo relatório ou planejamento?
Vá até a pasta 'data' e clique em relatorios.json ou planejamento.json
E preencha com:
    {
        "ano": Ano do relatório
        "titulo": "Planejamento Anual 'ano'", 
        "arquivo": caminho do arquivo ou link do drive,
        "dataPublicacao": "xx/xx/xxxx" dia em que foi publicado
    }

-->

<!DOCTYPE html>
<html lang="pt-br">

<?php
$title = "$titulohead";
$cssFiles = ['css/documentos.css', 'css/biblioteca.css'];
include 'head.php';
?>

<body>

    <?php include('header.php') ?>

    <main>

        <?php
            renderComponent("container-header.php", [
                "titulo_pagina" => "Planejamento e Relatório",
                "descricao" => "Acesse planejamentos e relatórios do PETComp",
                "caminho" => ["Publicações","Planejamento e Relatório"]
            ]);
        ?>

        <section class="planejamentos">

            <div class="menu-lateral">
                <a href="planejamento" class="select <?= $tipo == 'planejamento' ? 'active' : '' ?>">
                    
                        <div>
                            <img src="assets/svg/iconDocuments.svg" alt="">
                            <p>Planejamentos</p>
                        </div>
                        <img src="assets/svg/seta.svg" id="setinha" alt="">

                </a>
                
                <a href="relatorio" class="select <?= $tipo == 'relatorio' ? 'active' : '' ?>">
                        <div>
                            <img src="assets/svg/iconDocuments.svg"alt="">
                            <p>Relatórios</p>
                        </div>
                        <img src="assets/svg/seta.svg" id="setinha" alt="">
                </a>
            </div>

            <div class="documentos">
                <h1 id="title-documents"><?= $tituloPagina ?></h1>
                <?php
                foreach ($documentos as $documento):
                ?>
                
                <div class="planejamento-card">

                    
                    <div class="planejamento-left">
                        <span class="documents-icon">
                                <img src="assets/svg/iconDocuments.svg" alt="">
                        </span>
                        <div class="planejamento-info">
                        
                            <h2><?= $documento['titulo'] ?></h2>
                            <p>
                                Publicado em
                                <?= $documento['dataPublicacao'] ?>
                            </p>
                        
                        </div>
                    </div>

                    <div>
                        <a href="<?= $documento['arquivo'] ?> "target="_blank" class="btn-documento">
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