<?php
require_once __DIR__ . '/../api/conexao_e_helpers.php';

// Trava de segurança: só funciona se ainda NÃO existir nenhuma conta.
// Depois que a primeira conta for criada, essa página passa a recusar
// qualquer acesso — inclusive um GET simples, pra não ficar exposta.
$existe = $mysqli->query('SELECT COUNT(*) AS total FROM usuarios_admin')->fetch_assoc()['total'];

if ($existe > 0) {
    http_response_code(403);
    exit('Já existe uma conta cadastrada. Use login.php, ou peça pra quem tem acesso ao banco redefinir a senha direto na tabela usuarios_admin.');
}

$erro = '';
$sucesso = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome  = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if ($nome === '' || $email === '' || strlen($senha) < 8) {
        $erro = 'Preencha nome, e-mail e uma senha com pelo menos 8 caracteres.';
    } else {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $mysqli->prepare('INSERT INTO usuarios_admin (nome, email, senha_hash) VALUES (?, ?, ?)');
        $stmt->bind_param('sss', $nome, $email, $hash);
        $stmt->execute();
        $stmt->close();
        $sucesso = true;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<title>Criar conta do tutor — PETComp</title>
<style>
    body { font-family: Arial, sans-serif; background: #f1f5f9; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
    .card { background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,.1); width: 360px; }
    h1 { font-size: 20px; color: #0B114A; margin-bottom: 8px; }
    p.aviso { font-size: 13px; color: #64748b; margin-bottom: 20px; }
    label { display: block; font-size: 13px; margin: 14px 0 6px; color: #334155; }
    input { width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box; }
    button { width: 100%; margin-top: 22px; padding: 11px; background: #027BFD; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; }
    .erro { background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 6px; font-size: 13px; margin-top: 16px; }
    .ok { background: #dcfce7; color: #15803d; padding: 14px; border-radius: 6px; font-size: 14px; }
</style>
</head>
<body>
    <?php if ($sucesso): ?>
        <div class="card">
            <h1>Conta criada!</h1>
            <div class="ok">
                Pronto. Essa página não vai funcionar de novo — apaga o arquivo
                <code>admin/criar_conta.php</code> do servidor agora por segurança
                e faz login em <a href="login.php">login.php</a>.
            </div>
        </div>
    <?php else: ?>
        <form class="card" method="post">
            <h1>Criar conta do tutor</h1>
            <p class="aviso">Isso só funciona uma vez. Depois de criar, apague este arquivo do servidor.</p>

            <label for="nome">Nome (aparece no certificado)</label>
            <input type="text" id="nome" name="nome" required autofocus>

            <label for="email">E-mail de login</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha (mín. 8 caracteres)</label>
            <input type="password" id="senha" name="senha" minlength="8" required>

            <button type="submit">Criar conta</button>

            <?php if ($erro): ?>
                <div class="erro"><?= htmlspecialchars($erro) ?></div>
            <?php endif; ?>
        </form>
    <?php endif; ?>
</body>
</html>
