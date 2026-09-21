<?php
require_once __DIR__ . '/conexao_e_helpers.php';
require_once __DIR__ . '/../vendor/autoload.php'; // dompdf

use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método não permitido.');
}

$input = json_decode(file_get_contents('php://input'), true) ?? $_POST;

$cpf       = validarCpf($input['cpf'] ?? '');
$matricula = trim($input['matricula'] ?? '');
$ppc       = $input['ppc'] ?? 'antigo'; // por enquanto só existe o PPC antigo

if ($cpf === false || $matricula === '' || !preg_match('/^\d{5,20}$/', $matricula)) {
    http_response_code(400);
    exit('Dados inválidos.');
}

// O PPC novo ainda não tem a regra definida. Recusado aqui também,
// não só escondendo o botão no front.
if ($ppc !== 'antigo') {
    http_response_code(501);
    exit('A declaração pelo PPC novo ainda não está disponível.');
}

// Revalida no servidor: existir na lista de liberação é o critério.
$stmt = $mysqli->prepare(
    'SELECT * FROM liberacoes_certificado WHERE cpf = ? AND matricula = ? LIMIT 1'
);
$stmt->bind_param('ss', $cpf, $matricula);
$stmt->execute();
$liberacao = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$liberacao) {
    http_response_code(404);
    exit('Não encontramos uma liberação para esse CPF e matrícula.');
}

$inicio = new DateTime($liberacao['data_inicio']);
$fim    = !empty($liberacao['data_fim']) ? new DateTime($liberacao['data_fim']) : new DateTime();

// ---- Reaproveita o número se já existir uma declaração pra esse
//      mesmo registro de liberação (evita gerar número novo toda
//      vez que a mesma pessoa baixa de novo). ----
$periodoInicio = $inicio->format('Y-m-d');
$periodoFim    = $fim->format('Y-m-d');
$ip            = $_SERVER['REMOTE_ADDR'] ?? null;

$stmtExistente = $mysqli->prepare(
    'SELECT id, numero_declaracao FROM declaracoes_emitidas WHERE liberacao_id = ? LIMIT 1'
);
$stmtExistente->bind_param('i', $liberacao['id']);
$stmtExistente->execute();
$existente = $stmtExistente->get_result()->fetch_assoc();
$stmtExistente->close();

if ($existente) {
    $numeroDeclaracao = $existente['numero_declaracao'];

    $stmtAtualiza = $mysqli->prepare(
        'UPDATE declaracoes_emitidas SET nome_aluno = ?, periodo_fim = ?, ip_solicitante = ? WHERE id = ?'
    );
    $stmtAtualiza->bind_param('sssi', $liberacao['nome'], $periodoFim, $ip, $existente['id']);
    $stmtAtualiza->execute();
    $stmtAtualiza->close();
} else {
    $ano = date('Y');
    $stmtSeq = $mysqli->prepare(
        "SELECT COUNT(*) AS total FROM declaracoes_emitidas WHERE numero_declaracao LIKE ?"
    );
    $prefixoBusca = "PET{$ano}%";
    $stmtSeq->bind_param('s', $prefixoBusca);
    $stmtSeq->execute();
    $seq = (int)$stmtSeq->get_result()->fetch_assoc()['total'] + 1;
    $stmtSeq->close();
    $numeroDeclaracao = sprintf('PET%s%05d', $ano, $seq);

    $stmtLog = $mysqli->prepare(
        'INSERT INTO declaracoes_emitidas (numero_declaracao, nome_aluno, liberacao_id, periodo_inicio, periodo_fim, ip_solicitante)
         VALUES (?, ?, ?, ?, ?, ?)'
    );
    $stmtLog->bind_param('ssisss', $numeroDeclaracao, $liberacao['nome'], $liberacao['id'], $periodoInicio, $periodoFim, $ip);
    $stmtLog->execute();
    $stmtLog->close();
}

// ---- Busca o tutor atual (o único registro em usuarios_admin) pra
//      assinar a declaração — se trocar de tutor, atualiza sozinho. ----
$tutor = $mysqli->query('SELECT nome FROM usuarios_admin ORDER BY id LIMIT 1')->fetch_assoc();
$tutorNome  = $tutor['nome'] ?? 'Tutor(a) não configurado(a)';
$tutorCargo = 'Tutor do Programa de Educação Tutorial de Ciência da Computação';

// ---- Formata os dados ----
$mesesPt = [1=>'janeiro',2=>'fevereiro',3=>'março',4=>'abril',5=>'maio',6=>'junho',
    7=>'julho',8=>'agosto',9=>'setembro',10=>'outubro',11=>'novembro',12=>'dezembro'];
$formatarExtenso = fn(DateTime $d) => $mesesPt[(int)$d->format('n')] . ' de ' . $d->format('Y');
$dataEmissao = new DateTime();

$cpfFormatado = substr($cpf,0,3).'.'.substr($cpf,3,3).'.'.substr($cpf,6,3).'-'.substr($cpf,9,2);

$logoBase64 = 'data:image/png;base64,' . base64_encode(
    file_get_contents(__DIR__ . '/../assets/images/logos/PETComp.png')
);
$assinaturaBase64 = 'data:image/png;base64,' . base64_encode(
    file_get_contents(__DIR__ . '/../assets/images/assinatura-tutor.png')
);

// Quantidade de meses entre entrada e saída (arredondado pra baixo —
// ex: 1 ano e 3 meses = "15 meses").
$mesesTotais = $inicio->diff($fim)->y * 12 + $inicio->diff($fim)->m;

ob_start();
$nome               = $liberacao['nome'];
$dataInicioExtenso  = $formatarExtenso($inicio);
$dataFimExtenso     = $formatarExtenso($fim);
$dataEmissaoExtenso = $dataEmissao->format('d') . ' de ' . $formatarExtenso($dataEmissao);
$cargaHorariaTotal  = null; // desligado por enquanto (ver conexao_e_helpers.php)
include __DIR__ . '/../templates/declaracao.php';
$html = ob_get_clean();

$options = new Options();
$options->set('isRemoteEnabled', false);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();

$dompdf->stream("declaracao_{$numeroDeclaracao}.pdf", ['Attachment' => true]);
