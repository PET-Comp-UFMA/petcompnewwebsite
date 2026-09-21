<?php
require_once __DIR__ . '/auth.php';

$stmt = $mysqli->prepare('SELECT nome, email FROM usuarios_admin WHERE id = ? LIMIT 1');
$stmt->bind_param('i', $_SESSION['admin_id']);
$stmt->execute();
$conta = $stmt->get_result()->fetch_assoc();
$stmt->close();

$erro = '';
$sucesso = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfValido($_POST['csrf'] ?? null)) {
        http_response_code(403);
        exit('Requisição inválida.');
    }

    $nome  = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senhaNova = $_POST['senha_nova'] ?? '';

    if ($nome === '' || $email === '') {
        $erro = 'Nome e e-mail são obrigatórios.';
    } else {
        if ($senhaNova !== '') {
            if (strlen($senhaNova) < 8) {
                $erro = 'A senha nova precisa ter pelo menos 8 caracteres.';
            } else {
                $hash = password_hash($senhaNova, PASSWORD_DEFAULT);
                $stmt = $mysqli->prepare('UPDATE usuarios_admin SET nome=?, email=?, senha_hash=? WHERE id=?');
                $stmt->bind_param('sssi', $nome, $email, $hash, $_SESSION['admin_id']);
            }
        } else {
            $stmt = $mysqli->prepare('UPDATE usuarios_admin SET nome=?, email=? WHERE id=?');
            $stmt->bind_param('ssi', $nome, $email, $_SESSION['admin_id']);
        }

        if (!$erro) {
            $stmt->execute();
            $stmt->close();
            $_SESSION['admin_nome'] = $nome;
            $conta['nome'] = $nome;
            $conta['email'] = $email;
            $sucesso = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<title>Minha conta — PETComp</title>
<style>
    body { font-family: Arial, sans-serif; background: #f1f5f9; margin: 0; color: #1e293b; }
    header { background: #01204C; color: #fff; padding: 18px 30px; }
    header a { color: #7dd3fc; text-decoration: none; font-size: 13px; }
    main { max-width: 420px; margin: 30px auto; padding: 0 20px; }
    .card { background: #fff; border-radius: 10px; padding: 26px; box-shadow: 0 2px 6px rgba(0,0,0,.06); }
    label { display: block; font-size: 13px; margin: 14px 0 5px; color: #334155; }
    input { width: 100%; padding: 9px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box; }
    button { margin-top: 20px; padding: 10px 20px; background: #027BFD; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; }
    .msg { padding: 10px; border-radius: 6px; font-size: 13px; margin-top: 16px; }
    .msg.ok { background: #dcfce7; color: #15803d; }
    .msg.erro { background: #fee2e2; color: #b91c1c; }
    .aviso { font-size: 12px; color: #64748b; margin-top: 4px; }
</style>
</head>
<body>
<header><a href="painel.php">&larr; Voltar pro painel</a></header>
<main>
    <div class="card">
        <h2>Minha conta</h2>
        <p class="aviso">Se um(a) novo(a) tutor(a) assumir, é só trocar o nome e o e-mail aqui.</p>

        <form method="post">
            <input type="hidden" name="csrf" value="<?= csrfToken() ?>">

            <label for="nome">Nome (aparece no certificado)</label>
            <input type="text" id="nome" name="nome" required value="<?= htmlspecialchars($conta['nome']) ?>">

            <label for="email">E-mail de login</label>
            <input type="email" id="email" name="email" required value="<?= htmlspecialchars($conta['email']) ?>">

            <label for="senha_nova">Nova senha (deixe vazio pra manter a atual)</label>
            <input type="password" id="senha_nova" name="senha_nova" minlength="8">

            <button type="submit">Salvar</button>

            <?php if ($sucesso): ?>
                <div class="msg ok">Salvo com sucesso.</div>
            <?php elseif ($erro): ?>
                <div class="msg erro"><?= htmlspecialchars($erro) ?></div>
            <?php endif; ?>
        </form>
    </div>
</main>
</body>
</html>
