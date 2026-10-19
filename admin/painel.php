<?php
require_once __DIR__ . '/auth.php';

$editando = null;
if (isset($_GET['editar'])) {
    $stmt = $mysqli->prepare('SELECT * FROM liberacoes_certificado WHERE id = ? LIMIT 1');
    $stmt->bind_param('i', $_GET['editar']);
    $stmt->execute();
    $editando = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}

// Ordenação da lista (valores fixos, nunca o texto da URL direto no SQL)
$ordensValidas = ['az', 'za', 'liberacao'];
$ordem = in_array($_GET['ordem'] ?? '', $ordensValidas, true) ? $_GET['ordem'] : 'az';

$orderBy = match ($ordem) {
    'za'        => 'lc.nome DESC',
    'liberacao' => 'lc.criado_em DESC, lc.id DESC',
    default     => 'lc.nome ASC',
};

$lista = $mysqli->query(
    "SELECT lc.*, de.numero_declaracao, de.emitido_em
     FROM liberacoes_certificado lc
     LEFT JOIN declaracoes_emitidas de ON de.liberacao_id = lc.id
     ORDER BY $orderBy"
)->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<title>Painel do Tutor — PETComp</title>
<style>
    body { font-family: Arial, sans-serif; background: #f1f5f9; margin: 0; color: #1e293b; }
    header { background: #01204C; color: #fff; padding: 18px 30px; display: flex; justify-content: space-between; align-items: center; }
    header a { color: #7dd3fc; text-decoration: none; font-size: 13px; }
    main { max-width: 1000px; margin: 30px auto; padding: 0 20px; }
    .card { background: #fff; border-radius: 10px; padding: 24px; box-shadow: 0 2px 6px rgba(0,0,0,.06); margin-bottom: 24px; }
    h2 { margin-top: 0; font-size: 17px; }
    table { width: 100%; border-collapse: collapse; font-size: 14px; }
    th, td { text-align: left; padding: 10px 8px; border-bottom: 1px solid #e2e8f0; }
    th { color: #64748b; font-weight: 600; font-size: 12px; text-transform: uppercase; }
    .acoes a { margin-right: 10px; font-size: 13px; text-decoration: none; }
    .acoes .editar { color: #027BFD; }
    .acoes .excluir { color: #dc2626; }
    form.formulario label { display: block; font-size: 13px; margin: 12px 0 5px; color: #334155; }
    form.formulario input { width: 100%; padding: 9px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box; }
    .linha-dupla { display: flex; gap: 16px; }
    .linha-dupla > div { flex: 1; }
    button { margin-top: 18px; padding: 10px 20px; background: #027BFD; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; }
    .msg { padding: 10px; border-radius: 6px; font-size: 13px; margin-bottom: 16px; }
    .msg.ok { background: #dcfce7; color: #15803d; }
    .msg.erro { background: #fee2e2; color: #b91c1c; }
    .vazio { color: #94a3b8; font-size: 14px; padding: 20px 0; text-align: center; }

    /* Botão retrátil de ordenação */
    .card-topo { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
    .card-topo h2 { margin: 0; }
    .ordenar { position: relative; }
    .ordenar summary { list-style: none; cursor: pointer; padding: 8px 14px; background: #f1f5f9; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #334155; }
    .ordenar summary::-webkit-details-marker { display: none; }
    .ordenar .opcoes { position: absolute; right: 0; top: 38px; background: #fff; border: 1px solid #e2e8f0; border-radius: 6px; box-shadow: 0 4px 10px rgba(0,0,0,.1); min-width: 220px; z-index: 10; }
    .ordenar .opcoes a { display: block; padding: 10px 14px; font-size: 13px; color: #334155; text-decoration: none; }
    .ordenar .opcoes a:hover { background: #f1f5f9; }
    .ordenar .opcoes a.atual { font-weight: 700; color: #027BFD; }
</style>
</head>
<body>

<header>
    <div>Painel do Tutor — Olá, <?= htmlspecialchars($_SESSION['admin_nome']) ?></div>
    <div>
        <a href="minha_conta.php">Minha conta</a> &nbsp;|&nbsp;
        <a href="logout.php">Sair</a>
    </div>
</header>

<main>

    <?php if (isset($_GET['msg'])): ?>
        <?php
            $classe = $_GET['msg'] === 'ok' ? 'ok' : 'erro';
            $texto = match ($_GET['msg']) {
                'ok' => 'Salvo com sucesso.',
                'data_invalida' => 'A data de fim não pode ser anterior à data de início.',
                default => 'Não foi possível salvar. Confira os dados (CPF já cadastrado?).',
            };
        ?>
        <div class="msg <?= $classe ?>"><?= $texto ?></div>
    <?php endif; ?>

    <div class="card">
        <h2><?= $editando ? 'Editar aluno' : 'Liberar novo aluno' ?></h2>
        <form class="formulario" method="post" action="salvar.php">
            <input type="hidden" name="csrf" value="<?= csrfToken() ?>">
            <?php if ($editando): ?>
                <input type="hidden" name="id" value="<?= (int)$editando['id'] ?>">
            <?php endif; ?>

            <label for="nome">Nome completo</label>
            <input type="text" id="nome" name="nome" required maxlength="80"
                   value="<?= htmlspecialchars($editando['nome'] ?? '') ?>">

            <div class="linha-dupla">
                <div>
                    <label for="cpf">CPF (só números)</label>
                    <input type="text" id="cpf" name="cpf" required
                           inputmode="numeric" autocomplete="off"
                           maxlength="11" pattern="\d{11}"
                           title="Digite os 11 números do CPF, sem pontos ou traço"
                           value="<?= htmlspecialchars($editando['cpf'] ?? '') ?>">
                </div>
                <div>
                    <label for="matricula">Matrícula</label>
                    <input type="text" id="matricula" name="matricula" required
                           maxlength="15" autocomplete="off"
                           value="<?= htmlspecialchars($editando['matricula'] ?? '') ?>">
                </div>
            </div>

            <div class="linha-dupla">
                <div>
                    <label for="data_inicio">Início</label>
                    <input type="date" id="data_inicio" name="data_inicio" required
                           value="<?= htmlspecialchars($editando['data_inicio'] ?? '') ?>">
                </div>
                <div>
                    <label for="data_fim">Fim (deixe vazio se ainda está ativo)</label>
                    <input type="date" id="data_fim" name="data_fim"
                           value="<?= htmlspecialchars($editando['data_fim'] ?? '') ?>">
                </div>
            </div>

            <button type="submit"><?= $editando ? 'Salvar alterações' : 'Liberar aluno' ?></button>
            <?php if ($editando): ?>
                <a href="painel.php" style="margin-left:14px; font-size:13px;">cancelar edição</a>
            <?php endif; ?>
        </form>
    </div>

    <div class="card">
        <div class="card-topo">
            <h2>Alunos liberados (<?= count($lista) ?>)</h2>
            <details class="ordenar">
                <summary>Ordenar ▾</summary>
                <div class="opcoes">
                    <a href="painel.php?ordem=az"        class="<?= $ordem === 'az' ? 'atual' : '' ?>">A → Z</a>
                    <a href="painel.php?ordem=za"        class="<?= $ordem === 'za' ? 'atual' : '' ?>">Z → A</a>
                    <a href="painel.php?ordem=liberacao" class="<?= $ordem === 'liberacao' ? 'atual' : '' ?>">Ordem de liberação (último primeiro)</a>
                </div>
            </details>
        </div>

        <?php if (empty($lista)): ?>
            <div class="vazio">Nenhum aluno liberado ainda.</div>
        <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Nome</th><th>CPF</th><th>Matrícula</th><th>Início</th><th>Fim</th><th>Cód. validação</th><th>Último download</th><th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['nome']) ?></td>
                    <td><?= htmlspecialchars(substr($item['cpf'],0,3).'.'.substr($item['cpf'],3,3).'.'.substr($item['cpf'],6,3).'-'.substr($item['cpf'],9,2)) ?></td>
                    <td><?= htmlspecialchars($item['matricula']) ?></td>
                    <td><?= date('d/m/Y', strtotime($item['data_inicio'])) ?></td>
                    <td><?= $item['data_fim'] ? date('d/m/Y', strtotime($item['data_fim'])) : '<span style="color:#16a34a">ativo</span>' ?></td>
                    <td>
                        <?php if ($item['numero_declaracao']): ?>
                            <code style="font-size:12px;"><?= htmlspecialchars($item['numero_declaracao']) ?></code>
                        <?php else: ?>
                            <span style="color:#94a3b8; font-size:12px;">ainda não emitido</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($item['emitido_em'])): ?>
                            <?= date('d/m/Y H:i', strtotime($item['emitido_em'])) ?>
                        <?php else: ?>
                            <span style="color:#94a3b8; font-size:12px;">—</span>
                        <?php endif; ?>
                    </td>
                    <td class="acoes">
                        <a class="editar" href="painel.php?editar=<?= (int)$item['id'] ?>">editar</a>
                        <a class="excluir" href="excluir.php?id=<?= (int)$item['id'] ?>&csrf=<?= urlencode(csrfToken()) ?>"
                           onclick="return confirm('Excluir <?= htmlspecialchars(addslashes($item['nome'])) ?>? Isso remove o acesso dela(e) ao certificado.');">excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
    
</main>

<script>
    const inputInicio = document.getElementById('data_inicio');
    const inputFim = document.getElementById('data_fim');

    function atualizarMinFim() {
        inputFim.min = inputInicio.value;
    }

    inputInicio.addEventListener('change', atualizarMinFim);
    atualizarMinFim();

    // CPF: aceita só números (também ao colar) e no máximo 11 dígitos.
    // Ex.: colar "275.610.470-10" vira "27561047010".
    const inputCpf = document.getElementById('cpf');

    inputCpf.addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 11);
    });
</script>

</body>
</html>