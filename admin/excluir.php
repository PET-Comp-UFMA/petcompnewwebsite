<?php
require_once __DIR__ . '/auth.php';

if (!csrfValido($_GET['csrf'] ?? null)) {
    http_response_code(403);
    exit('Requisição inválida.');
}

$id = (int)($_GET['id'] ?? 0);

if ($id > 0) {
    $stmt = $mysqli->prepare('DELETE FROM liberacoes_certificado WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
}

header('Location: painel.php?msg=ok');
exit;
