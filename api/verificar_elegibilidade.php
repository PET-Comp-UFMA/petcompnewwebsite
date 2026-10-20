<?php
require_once __DIR__ . '/conexao_e_helpers.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'erro' => 'Método não permitido.']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true) ?? $_POST;

$cpf = validarCpf($input['cpf'] ?? '');

if ($cpf === false) {
    echo json_encode(['ok' => false, 'erro' => 'CPF inválido.']);
    exit;
}

// A elegibilidade agora é simples: existir na lista que o tutor liberou.
// ORDER BY id DESC: se o mesmo CPF tiver mais de uma liberação,
// sempre pega a mais recente (mesmo critério do gerar_declaracao.php).
$stmt = $mysqli->prepare(
    'SELECT id, nome FROM liberacoes_certificado
     WHERE cpf = ?
     ORDER BY id DESC
     LIMIT 1'
);
$stmt->bind_param('s', $cpf);
$stmt->execute();
$liberacao = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$liberacao) {
    echo json_encode([
        'ok'   => false,
        'erro' => 'Não encontramos uma liberação para esse CPF. Procure a coordenação do PETComp.',
    ]);
    exit;
}

echo json_encode([
    'ok'   => true,
    'nome' => $liberacao['nome'],
]);