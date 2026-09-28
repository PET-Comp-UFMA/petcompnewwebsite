<?php
require_once __DIR__ . '/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !csrfValido($_POST['csrf'] ?? null)) {
    http_response_code(403);
    exit('Requisição inválida.');
}

$id          = $_POST['id'] ?? null;
$nome        = trim($_POST['nome'] ?? '');
$cpf         = validarCpf($_POST['cpf'] ?? '');
$matricula   = trim($_POST['matricula'] ?? '');
$dataInicio  = $_POST['data_inicio'] ?? '';
$dataFim     = trim($_POST['data_fim'] ?? '') ?: null;

if ($nome === '' || $cpf === false || $matricula === '' || $dataInicio === '') {
    header('Location: painel.php?msg=erro');
    exit;
}

// data_fim é opcional, mas se vier preenchida não pode ser antes da data_inicio.
// Os dois campos vêm de <input type="date"> (formato YYYY-MM-DD), então a
// comparação de strings já dá a ordem cronológica certa.
if ($dataFim !== null && $dataFim < $dataInicio) {
    header('Location: painel.php?msg=data_invalida');
    exit;
}

try {
    if ($id) {
        $stmt = $mysqli->prepare(
            'UPDATE liberacoes_certificado
             SET nome = ?, cpf = ?, matricula = ?, data_inicio = ?, data_fim = ?
             WHERE id = ?'
        );
        $stmt->bind_param('sssssi', $nome, $cpf, $matricula, $dataInicio, $dataFim, $id);
    } else {
        $stmt = $mysqli->prepare(
            'INSERT INTO liberacoes_certificado (nome, cpf, matricula, data_inicio, data_fim)
             VALUES (?, ?, ?, ?, ?)'
        );
        $stmt->bind_param('sssss', $nome, $cpf, $matricula, $dataInicio, $dataFim);
    }
    $stmt->execute();
    $stmt->close();
    header('Location: painel.php?msg=ok');
} catch (mysqli_sql_exception $e) {
    // Provavelmente CPF duplicado (UNIQUE key) — mensagem genérica de erro.
    header('Location: painel.php?msg=erro');
}
exit;
