<?php
require_once __DIR__ . '/../api/conexao_e_helpers.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Já logado? Manda direto pro painel.
if (!empty($_SESSION['admin_id'])) {
    header('Location: painel.php');
    exit;
}

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    $stmt = $mysqli->prepare('SELECT id, nome, senha_hash FROM usuarios_admin WHERE email = ? LIMIT 1');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $usuario = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if ($usuario && password_verify($senha, $usuario['senha_hash'])) {
        session_regenerate_id(true);
        $_SESSION['admin_id']   = $usuario['id'];
        $_SESSION['admin_nome'] = $usuario['nome'];
        header('Location: painel.php');
        exit;
    }

    // Mensagem genérica de propósito — não revela se foi o e-mail
    // ou a senha que errou (evita confirmar pra quem tá tentando
    // adivinhar se um e-mail existe cadastrado).
    $erro = 'E-mail ou senha inválidos.';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<title>Painel do Tutor — PETComp</title>
<style>
    body { font-family: Arial, sans-serif; background: #f1f5f9; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
    .card { background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,.1); width: 340px; }
    h1 { font-size: 20px; color: #0B114A; margin-bottom: 24px; }
    label { display: block; font-size: 13px; margin: 14px 0 6px; color: #334155; }
    input { width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box; }
    button { width: 100%; margin-top: 22px; padding: 11px; background: #027BFD; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; }
    button:hover { background: #0263D1; }
    .erro { background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 6px; font-size: 13px; margin-top: 16px; }
</style>
</head>
<body>
    <form class="card" method="post">
        <h1>Painel do Tutor — PETComp</h1>

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required autofocus>

        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit">Entrar</button>

        <?php if ($erro): ?>
            <div class="erro"><?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>
    </form>
</body>
</html>
