
<?php require_once __DIR__ . '/../components/container-header.php'; ?>

<body>
    <?php include __DIR__ . '/../header.php'; ?>

    <?php echo $componentController->renderComponent(new ContainerHeader(
        "Repositório educacional",
        "Monitoria de Algoritmos I",
        ["Repositório Educacional", "Monitoria de Algoritmos I"]
    )) ?>

    <?php include __DIR__ . '/../footer.php'; ?>

</body>