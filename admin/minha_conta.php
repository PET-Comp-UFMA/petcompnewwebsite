<?php
require_once __DIR__ . '/auth.php';

$stmt = $mysqli->prepare('SELECT nome, email, cargo, matricula_siape, assinatura_base64 FROM usuarios_admin WHERE id = ? LIMIT 1');
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

    $nome           = trim($_POST['nome'] ?? '');
    $email          = trim($_POST['email'] ?? '');
    $cargo          = trim($_POST['cargo'] ?? '');
    $matriculaSiape = trim($_POST['matricula_siape'] ?? '');
    $senhaNova      = $_POST['senha_nova'] ?? '';

    if ($nome === '' || $email === '' || $cargo === '' || $matriculaSiape === '') {
        $erro = 'Nome, e-mail, cargo e matrícula SIAPE são obrigatórios.';
    }

    // Assinatura é opcional no formulário: só troca se o(a) tutor(a)
    // enviar um arquivo novo. Se não enviar, mantém a que já tá salva.
    $assinaturaBase64 = $conta['assinatura_base64'];
    if (!$erro && !empty($_FILES['assinatura']['name'])) {
        $arquivo = $_FILES['assinatura'];
        if ($arquivo['error'] !== UPLOAD_ERR_OK || $arquivo['type'] !== 'image/png' || $arquivo['size'] > 2 * 1024 * 1024) {
            $erro = 'A assinatura precisa ser um PNG de até 2MB.';
        } else {
            $assinaturaBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($arquivo['tmp_name']));
        }
    }

    if (!$erro && $senhaNova !== '' && strlen($senhaNova) < 8) {
        $erro = 'A senha nova precisa ter pelo menos 8 caracteres.';
    }

    if (!$erro) {
        if ($senhaNova !== '') {
            $hash = password_hash($senhaNova, PASSWORD_DEFAULT);
            $stmt = $mysqli->prepare(
                'UPDATE usuarios_admin
                 SET nome=?, email=?, senha_hash=?, cargo=?, matricula_siape=?, assinatura_base64=?
                 WHERE id=?'
            );
            $stmt->bind_param('ssssssi', $nome, $email, $hash, $cargo, $matriculaSiape, $assinaturaBase64, $_SESSION['admin_id']);
        } else {
            $stmt = $mysqli->prepare(
                'UPDATE usuarios_admin
                 SET nome=?, email=?, cargo=?, matricula_siape=?, assinatura_base64=?
                 WHERE id=?'
            );
            $stmt->bind_param('sssssi', $nome, $email, $cargo, $matriculaSiape, $assinaturaBase64, $_SESSION['admin_id']);
        }

        $stmt->execute();
        $stmt->close();

        $_SESSION['admin_nome']  = $nome;
        $conta['nome']           = $nome;
        $conta['email']          = $email;
        $conta['cargo']          = $cargo;
        $conta['matricula_siape'] = $matriculaSiape;
        $conta['assinatura_base64'] = $assinaturaBase64;
        $sucesso = true;
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
    .assinatura-atual { margin-top: 8px; }
    .assinatura-atual img { max-height: 70px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 6px; }
</style>
</head>
<body>
<header><a href="painel.php">&larr; Voltar pro painel</a></header>
<main>
    <div class="card">
        <h2>Minha conta</h2>
        <p class="aviso">Se um(a) novo(a) tutor(a) assumir, é só trocar os dados aqui — inclusive a assinatura. Declarações já emitidas não mudam.</p>

        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf" value="<?= csrfToken() ?>">

            <label for="nome">Nome (aparece no certificado)</label>
            <input type="text" id="nome" name="nome" required value="<?= htmlspecialchars($conta['nome']) ?>">

            <label for="email">E-mail de login</label>
            <input type="email" id="email" name="email" required value="<?= htmlspecialchars($conta['email']) ?>">

            <label for="cargo">Cargo (aparece no certificado)</label>
            <input type="text" id="cargo" name="cargo" required maxlength="160" value="<?= htmlspecialchars($conta['cargo'] ?? '') ?>">

            <label for="matricula_siape">Matrícula SIAPE</label>
            <input type="text" id="matricula_siape" name="matricula_siape" required maxlength="20" value="<?= htmlspecialchars($conta['matricula_siape'] ?? '') ?>">

            <label for="assinatura">Assinatura (PNG, fundo transparente)</label>
            <?php if (!empty($conta['assinatura_base64'])): ?>
                <div class="assinatura-atual">
                    <img src="<?= htmlspecialchars($conta['assinatura_base64']) ?>" alt="Assinatura atual">
                </div>
            <?php endif; ?>
            <input type="file" id="assinatura" name="assinatura" accept="image/png">
            <p class="aviso">Deixe em branco pra manter a assinatura atual.</p>

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
