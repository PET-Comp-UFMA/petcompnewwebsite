<?php
require_once __DIR__ . '/conexao_e_helpers.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'erro' => 'Método não permitido.']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true) ?? $_POST;
$numero = strtoupper(trim($input['numero'] ?? ''));

if ($numero === '' || !preg_match('/^PET\d{9}$/', $numero)) {
    echo json_encode(['ok' => false, 'valido' => false, 'erro' => 'Número de identificação inválido.']);
    exit;
}

$stmt = $mysqli->prepare(
    'SELECT d.numero_declaracao, d.periodo_inicio, d.periodo_fim, d.emitido_em, p.nome_completo
     FROM declaracoes_emitidas d
     JOIN petianos p ON p.id = d.petiano_id
     WHERE d.numero_declaracao = ?
     LIMIT 1'
);
$stmt->bind_param('s', $numero);
$stmt->execute();
$declaracao = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$declaracao) {
    echo json_encode(['ok' => true, 'valido' => false]);
    exit;
}

// Nome parcialmente mascarado por privacidade (mostra só o primeiro e o último nome)
$partesNome = explode(' ', trim($declaracao['nome_completo']));
$nomeExibicao = count($partesNome) > 1
    ? $partesNome[0] . ' ' . end($partesNome)
    : $partesNome[0];

echo json_encode([
    'ok'     => true,
    'valido' => true,
    'nome'   => $nomeExibicao,
    'emitido_em' => (new DateTime($declaracao['emitido_em']))->format('d/m/Y'),
]);
