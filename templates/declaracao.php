<?php
/**
 * Espera as variáveis: $numeroDeclaracao, $nome, $cpfFormatado,
 * $dataInicioExtenso, $dataFimExtenso, $dataEmissaoExtenso,
 * $tutorNome, $tutorCargo, $logoBase64, $assinaturaBase64
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
    @page { margin: 0; size: A4 landscape; }

    * { box-sizing: border-box; }

    body {
        font-family: Arial, sans-serif;
        color: #1b2a55;
        margin: 0;
        padding: 0;
    }

    /* Trick clássico do dompdf pra centralizar vertical E horizontalmente
       na página inteira: uma table de 100% de altura com célula
       vertical-align:middle. Isso resolve o "espaço em branco embaixo". */
    .pagina-wrapper {
        width: 100%;
        height: 793px; /* altura útil de uma A4 paisagem a 96dpi */
        display: table;
    }
    .pagina-cell {
        display: table-cell;
        vertical-align: middle;
        text-align: center;
    }

    .pagina {
        display: inline-block;
        width: 1000px;
        text-align: left;
        padding: 65px 85px 107px;
        border: 3px solid #1b3a7a;
        background-color: #eef5fc;
        position: relative;
    }

    .marca-dagua {
        position: absolute;
        top: 125px;
        left: 50%;
        margin-left: -265px;
        width: 530px;
        opacity: 0.07;
        z-index: 0;
    }

    .conteudo { position: relative; z-index: 1; }

    .header { display: table; width: 100%; }
    .header .logo { display: table-cell; vertical-align: top; }
    .header .logo img { height: 58px; }
    .header .numero {
        display: table-cell;
        vertical-align: top;
        text-align: right;
        font-size: 13px;
        color: #6b7a99;
        padding-top: 8px;
    }

    .titulo-bloco { text-align: center; margin: 35px 0 28px; }
    h1 {
        color: #1b2a55;
        font-size: 36px;
        letter-spacing: 3px;
        margin: 0;
        font-weight: bold;
    }

    p.corpo {
        font-size: 18px;
        line-height: 1.75;
        text-align: center;
        max-width: 750px;
        margin: 0 auto 35px;
    }

    .local-data { font-size: 16px; text-align: left; margin: 0 0 48px 0; }

    .assinatura { text-align: center; }
    .assinatura img { height: 122px; margin-bottom: -40px; }
    .linha-assinatura {
        border-top: 1px solid #444;
        width: 340px;
        margin: 0 auto;
        padding-top: 8px;
        font-size: 13px;
        line-height: 1.5;
        color: #1b2a55;
    }

    .rodape-validacao {
        font-size: 11px;
        color: #99a3b8;
        text-align: center;
        margin-top: 24px;
    }
</style>
</head>
<body>
    <div class="pagina-wrapper">
        <div class="pagina-cell">
            <div class="pagina">
                <img class="marca-dagua" src="<?= $logoBase64 ?>" alt="">

                <div class="conteudo">
                    <div class="header">
                        <div class="logo"><img src="<?= $logoBase64 ?>" alt="PETComp"></div>
                        <div class="numero">nº de declaração: <?= htmlspecialchars($numeroDeclaracao) ?></div>
                    </div>

                    <div class="titulo-bloco">
                        <h1>DECLARAÇÃO</h1>
                    </div>

                    <p class="corpo">
                        Declaro, para os devidos fins, que o(a) discente
                        <strong><?= htmlspecialchars(mb_strtoupper($nome)) ?></strong>
                        com <strong>CPF <?= htmlspecialchars($cpfFormatado) ?></strong>,
                        integrou o Programa de Educação Tutorial de Ciência da Computação,
                        financiado pela Secretaria de Educação Superior do Ministério da
                        Educação (MEC/SESu), <strong>de <?= $dataInicioExtenso ?> a <?= $dataFimExtenso ?></strong>,
                        desenvolvendo com dedicação e responsabilidade, atividades de ensino,
                        pesquisa e extensão.
                    </p>

                    <div class="local-data">São Luís, <?= $dataEmissaoExtenso ?></div>

                    <div class="assinatura">
                        <img src="<?= $assinaturaBase64 ?>" alt="assinatura">
                        <div class="linha-assinatura">
                            <?= htmlspecialchars($tutorNome) ?><br>
                            <?= htmlspecialchars($tutorCargo) ?>
                        </div>
                    </div>

                    <div class="rodape-validacao">
                        Valide este documento na aba "Validar Documento" usando o código: <?= htmlspecialchars($numeroDeclaracao) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>