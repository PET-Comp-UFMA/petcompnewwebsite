<?php

require_once __DIR__ . '/services/declaracaoService.php';

$spreadsheetId = '1AzYO_oHPJy6Pq2BCErGLrL8MWdvKdASU2SbDbooG2Rs';

$cpf = '078.891.343-39';
$matricula = '2023099581';

$declarationService = new declaracaoService();

$resultado = $declarationService->verificarAluno(
    $spreadsheetId,
    $cpf,
    $matricula
);

echo '<pre>';
print_r($resultado);
echo '</pre>';