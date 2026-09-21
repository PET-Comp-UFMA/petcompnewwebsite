<?php require_once "scripts.php/renderComponent.php" ?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php 
    $title = "Declaração de Horas";
    $cssFiles = ['css\declaracao.css'];
    $jsFiles = ['js/declaracao.js', 'js/declaracao-backend.js'];
    include "head.php";
?>

<body>
    <?php include('header.php') ?>
    <div class="container-header">
        <h2>Declaração de Horas Complementares </h2>
        <h3>Informe seus dados  para  baixar sua declaração de horas complementares.</h3>
        <h4><a href="">Página Inicial</a></h4>
        <h4> → Documentos →</h4>
        <h4> Declaração HC </h4>
    </div>


    <main>

        <div id="btnEmissao" class="select">
            <button id="btnEmitir" class="ativado" type="button" data-declaracao-tab="emissao">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M14 10V12.6667C14 13.0203 13.8595 13.3594 13.6095 13.6095C13.3594 13.8595 13.0203 14 12.6667 14H3.33333C2.97971 14 2.64057 13.8595 2.39052 13.6095C2.14048 13.3594 2 13.0203 2 12.6667V10M11.3333 6.66667L8 10L4.66667 6.66667M8 10V2" stroke="#0A1A40" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>    
                </svg>
                Emitir Documento
            </button>
            <button id="btnValidacao" class="desativado" type="button" data-declaracao-tab="validacao">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M8.00008 1.33301L13.3334 3.99967V7.99967C13.3334 11.333 11.0001 13.333 8.00008 14.6663C5.00008 13.333 2.66675 11.333 2.66675 7.99967V3.99967L8.00008 1.33301Z" stroke="#62748E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6 8.00033L7.33333 9.33366L10 6.66699" stroke="#62748E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>    
                Validar Documento
            </button>
        </div>
        <div class="painel-declaracao" data-painel="emissao">
            <div class="text">
                <h2>Emissão Declaração</h2>
                <hr>
                <p>Informe seu CPF e matrícula para verificar sua elegibilidade e baixar sua declaração de horas complementares.</p>
            </div>
            <div class="card-form">
                <form action="" id="form-emissao">
                    <div class="campo">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" placeholder="000.000.000-00" maxlength="14" inputmode="numeric">
                    </div>
                    <div class="campo">
                        <label for="Matricula">N° da Matrícula</label>
                        <input id="Matricula" type="text" placeholder="12345678910" maxlength="11" inputmode="numeric">
                    </div>
                </form>
                <button id="btnverificar" class="btnRegistrar">
                    Verificar Elegibilidade
                </button>
                <div id="msg-emissao"></div>
            </div>
        </div>

        <div class="painel-declaracao" data-painel="validacao">
            <div  class="text">
                <h2>Autenticidade de Documentos</h2>
                <hr>
                <p>Digite o número de identificação do documento para validar sua autenticidade.</p>
            </div>
            <div class="card-form">
                <form action="" id="form-validacao">
                    <div class="campo">
                        <label for="numValidacao">Código de Verificação</label>
                        <input id="numValidacao" type="text" placeholder="Número de Identificação">
                    </div>
                </form>
                <button id="btnvalidar" class="btnRegistrar">
                    Verificar
                </button>
                <div id="msg-validacao"></div>
            </div>
        </div>

    </main>



    <?php include('footer.php') ?>
    <script src="script.js" defer></script>
</body>

    
</html>
