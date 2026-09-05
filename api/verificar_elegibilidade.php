<?php
require_once __DIR__ . '/conexao_e_helpers.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'erro' => 'Método não permitido.']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true) ?? $_POST;

$cpf       = validarCpf($input['cpf'] ?? '');
$matricula = trim($input['matricula'] ?? '');

if ($cpf === false) {
    echo json_encode(['ok' => false, 'erro' => 'CPF inválido.']);
    exit;
}

if ($matricula === '' || !preg_match('/^\d{5,20}$/', $matricula)) {
    echo json_encode(['ok' => false, 'erro' => 'Número de matrícula inválido.']);
    exit;
}

$stmt = $mysqli->prepare(
    'SELECT id, nome_completo, data_ingresso, data_saida, ativo
     FROM petianos
     WHERE cpf = ? AND matricula = ?
     LIMIT 1'
);
$stmt->bind_param('ss', $cpf, $matricula);
$stmt->execute();
$petiano = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$petiano) {
    echo json_encode(['ok' => false, 'erro' => 'Não encontramos um cadastro com esse CPF e matrícula.']);
    exit;
}

if (empty($petiano['data_ingresso'])) {
    echo json_encode(['ok' => false, 'erro' => 'Cadastro incompleto. Procure a coordenação do PETComp.']);
    exit;
}

$inicio = new DateTime($petiano['data_ingresso']);
$fim    = !empty($petiano['data_saida']) ? new DateTime($petiano['data_saida']) : new DateTime();

$mesesNoPrograma = $inicio->diff($fim)->y * 12 + $inicio->diff($fim)->m;

if ($mesesNoPrograma < MESES_MINIMOS_ELEGIBILIDADE) {
    echo json_encode([
        'ok'   => false,
        'erro' => 'Tempo mínimo de ' . MESES_MINIMOS_ELEGIBILIDADE . ' meses no programa ainda não foi atingido.',
    ]);
    exit;
}

echo json_encode([
    'ok'   => true,
    'nome' => $petiano['nome_completo'],
]);
