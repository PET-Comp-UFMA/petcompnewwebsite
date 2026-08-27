<?php require_once "scripts.php/renderComponent.php" ?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php 
    $title = "Declaração de Horas";
    $cssFiles = ['css\declaracao.css'];
    include "head.php";
?>

<body>
    <?php include('header.php') ?>
    <div class="container-header">
        <h2>Declaração de Horas Complementares </h2>
        <h3>Informe seus dados  para  baixar sua declaração de horas complementares.</h3>
        <h4><a href="index.php">Página Inicial</a></h4>
        <h4> → Documentos →</h4>
        <h4> Declaração HC </h4>
    </div>


    <main>
        <div class="text">
            <h2>Emisssão Declaração</h2>
            <hr>
            <p>Informe seu CPF e matrícula para verificar sua elegibilidade e baixar sua declaração de horas complementares.</p>
        </div>
        <div class="card-form">
            <form action="">
                <div class="campo">
                    <label for="cpf">CPF</label>
                    <input id="cpf" type="text" placeholder="000.000.000-00">
                </div>
                <div class="campo">
                    <label for="Matricula">N° da Matrícula</label>
                    <input id="Matricula" type="text" placeholder="20202020">
                </div>
            </form>

            <button id="btnRegistrar">
                Verificar Elegibilidade
            </button>
        </div>
    </main>



    <?php include('footer.php') ?>
</body>
</html>