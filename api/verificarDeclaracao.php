<?php

require_once __DIR__ . '/../services/declaracaoService.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);

    echo json_encode([
        'sucesso' => false,
        'mensagem' => 'Método não permitido.'
    ]);

    exit;
}

$dados = json_decode(file_get_contents('php://input'), true);

$cpf = $dados['cpf'] ?? '';
$matricula = $dados['matricula'] ?? '';

if (empty($cpf) || empty($matricula)) {
    http_response_code(400);

    echo json_encode([
        'sucesso' => false,
        'mensagem' => 'CPF e matrícula são obrigatórios.'
    ]);

    exit;
}

$spreadsheetId = $_ENV['ID_PLANILHA'];

$declarationService = new declaracaoService();

$resultado = $declarationService->verificarAluno(
    $spreadsheetId,
    $cpf,
    $matricula
);

echo json_encode([
    'sucesso' => true,
    'resultado' => $resultado
]);