<?php require_once "scripts.php/renderComponent.php" ?>

<?php
// pega o id da URL
$id = $_GET['id'] ?? null;

// lê o JSON
$json = file_get_contents('data/monitorias.json');
$monitorias = json_decode($json, true);

// verifica se existe
if (!$id || !isset($monitorias[$id])) {
    echo "Monitoria não encontrada.";
    exit;
}



$monitoria = $monitorias[$id];
$nomeMonitoria = (string) $monitoria['nome'];
?>


<!DOCTYPE html>
<html lang="pt-BR">
<?php
$title = "Repositório";
$cssFiles = [
    'css/biblioteca-main.css?v=' . time(),
    'css/biblioteca.css?v=' . time(),
    'css/biblioteca-petcomp-matpet.css?v=' . time()
];
include "head.php";
?>

<body>
    <?php include('header.php') ?>

    <main>
        <?php
        renderComponent("container-header.php", [
            "titulo_pagina" => "Repositório Educacional",
            "descricao" => "Veja os nossos repositórios",
            "caminho" => ["Repositório Educacional", "Monitorias", $nomeMonitoria]
        ]);
        ?>

        <?php
        $href = 'repositorio-educacional/monitorias';
        include('components/btn-voltar.php');
        ?>


        <div class="card-monitoria">
            <div class="icon_monitoria">
                <img class="imagem_icon" src="<?= $monitoria['imagem'] ?>" alt="<?= $monitoria['nome'] ?>">
            </div>
            <div class="container-text">
                <h1>
                    <?= $monitoria['nome'] ?>
                </h1>
                <p>
                    <?= $monitoria['descricao-monitoria'] ?>
                </p>
            </div>
        </div>
        <div class="container-materiais">
            <div class="card-materiais">
                <figure class="video-img">
                    <img src="img/video-aulas.png" alt="Ícone de vídeo aulas">
                    <h1>Vídeo Aula</h1>
                </figure>
                <div class="descricao-card">
                    <p><?= $monitoria['descricao-video'] ?></p>
                    <button> <a href="<?= $monitoria['video-aula'] ?>">Acessar</a> </button>
                </div>

            </div>
            <div class="card-materiais">
                <figure class="exercicios-img">
                    <img src="img/exercicios.png" alt="Ícone de Exercícios">
                    <h1>Atividades </h1>
                </figure>
                <div class="descricao-card">
                    <p><?= $monitoria['descricao-atividade'] ?></p>
                    <button><a href="<?= $monitoria['atividade'] ?>" target="">Acessar</a></button>
                </div>
            </div>
            <div class="card-materiais">
                <figure class="materiais-img">
                    <img src="img/material.png" alt="Ícone de Material Complementar">
                    <h1>Materiais</h1>
                </figure>
                <div class="descricao-card">
                    <p><?= $monitoria['descricao-material'] ?></p>
                    <button><a href="<?= $monitoria['material'] ?>" target="">Acessar</a></button>
                </div>
            </div>



    </main>
    <?php include('footer.php') ?>
</body>

</html>