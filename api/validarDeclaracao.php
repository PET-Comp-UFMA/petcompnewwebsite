<?php

require_once __DIR__ . '/../services/declaracaoService.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);

    echo json_encode([
        'sucesso' => false,
        'mensagem' => 'Método não permitido.'
    ]);

    exit;
}

$dados = json_decode(
    file_get_contents('php://input'),
    true
);

$codigo = trim($dados['codigo'] ?? '');

if ($codigo === '') {
    http_response_code(400);

    echo json_encode([
        'sucesso' => false,
        'mensagem' => 'Código de verificação é obrigatório.'
    ]);

    exit;
}

$declarationService = new declaracaoService();

$declaracao = $declarationService->validarDeclaracao($codigo);

if ($declaracao === null) {
    echo json_encode([
        'sucesso' => true,
        'valida' => false,
        'mensagem' => 'Declaração não encontrada.'
    ]);

    exit;
}

echo json_encode([
    'sucesso' => true,
    'valida' => true,
    'declaracao' => $declaracao
]);