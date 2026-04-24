
<?php require_once __DIR__ . '/../components/container-header.php'; 
      require_once __DIR__ . '/../components/repositorio/resumo_monitoria.php' ?>

<body>
    <?php include __DIR__ . '/../header.php'; ?>

    <?php echo $componentController->renderComponent(new ContainerHeader(
        "Repositório educacional",
        "Monitoria de Algoritmos I",
        ["Repositório Educacional", "Monitoria de Algoritmos I"]
    )); ?>
    <main>
        <?php echo $componentController->renderComponent(new ResumoMonitoria(
            "assets/svg/resumo_monitoria.svg",
            "Monitoria de Algoritmos I",
            "A monitoria de Algoritmos 1 tem como objetivo auxiliar os alunos a compreender os fundamentos básicos de algoritmos, como lógica de programação, tipos de dados, variáveis, estruturas de controle e muito mais. Os encontros são realizados toda quarta feira via Google Meet e são ideias para tirar dúvidas sobre a matéria e reforçar conceitos abordados em sala de aula."
        )); ?>
    </main>

    <?php include __DIR__ . '/../footer.php'; ?>

</body>