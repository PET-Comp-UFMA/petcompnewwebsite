<?php require_once "scripts.php/renderComponent.php" ?>

<!DOCTYPE html>
<html lang="pt-br">

<?php 
    $title = "Monitoria";
    $cssFiles = ["css/monitoria.css"];
    include "head.php";
?>

<body>
    <?php include "header.php"; ?>

    <?php 
        renderComponent("container-header.php", [
            "titulo_pagina" => "Repositório educacional",
            "descricao" => "Monitoria de Algoritmos I",
            "caminho" => ["Repositório educacional", "Monitoria de Algoritmos I"]
        ]);
    ?>

    <?php include "footer.php"; ?>
</body>

</html>