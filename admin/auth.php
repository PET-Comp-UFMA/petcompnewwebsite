<?php
// Inclua no TOPO de toda página do /admin/ que exige login
// (exceto login.php e criar_conta.php).
require_once __DIR__ . '/../api/conexao_e_helpers.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

/**
 * Gera/retorna o token CSRF da sessão atual (proteção simples contra
 * envio forjado de formulário a partir de outro site).
 */
function csrfToken(): string {
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrfValido(?string $token): bool {
    return $token !== null && !empty($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $token);
}
