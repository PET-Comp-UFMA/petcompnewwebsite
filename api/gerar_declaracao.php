<?php
require_once __DIR__ . '/conexao_e_helpers.php';
require_once __DIR__ . '/../vendor/autoload.php'; // dompdf — ver README

use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método não permitido.');
}

$input = json_decode(file_get_contents('php://input'), true) ?? $_POST;

$cpf       = validarCpf($input['cpf'] ?? '');
$matricula = trim($input['matricula'] ?? '');

if ($cpf === false || $matricula === '' || !preg_match('/^\d{5,20}$/', $matricula)) {
    http_response_code(400);
    exit('Dados inválidos.');
}

// Revalida tudo no servidor — nunca confia só no que o front checou.
$stmt = $mysqli->prepare(
    'SELECT * FROM petianos WHERE cpf = ? AND matricula = ? LIMIT 1'
);
$stmt->bind_param('ss', $cpf, $matricula);
$stmt->execute();
$petiano = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$petiano || empty($petiano['data_ingresso'])) {
    http_response_code(404);
    exit('Cadastro não encontrado ou incompleto.');
}

$inicio = new DateTime($petiano['data_ingresso']);
$fim    = !empty($petiano['data_saida']) ? new DateTime($petiano['data_saida']) : new DateTime();
$mesesNoPrograma = $inicio->diff($fim)->y * 12 + $inicio->diff($fim)->m;

if ($mesesNoPrograma < MESES_MINIMOS_ELEGIBILIDADE) {
    http_response_code(403);
    exit('Tempo mínimo no programa ainda não foi atingido.');
}

// ---- Reaproveita o número se esse petiano já tiver uma declaração
//      emitida para esse mesmo período de ingresso (evita gerar um
//      número novo toda vez que a mesma pessoa baixa de novo). ----
$periodoInicio = $inicio->format('Y-m-d');
$periodoFim    = $fim->format('Y-m-d');
$ip            = $_SERVER['REMOTE_ADDR'] ?? null;

$stmtExistente = $mysqli->prepare(
    'SELECT id, numero_declaracao FROM declaracoes_emitidas
     WHERE petiano_id = ? AND periodo_inicio = ?
     LIMIT 1'
);
$stmtExistente->bind_param('is', $petiano['id'], $periodoInicio);
$stmtExistente->execute();
$existente = $stmtExistente->get_result()->fetch_assoc();
$stmtExistente->close();

if ($existente) {
    // Já existe: reaproveita o mesmo número, só atualiza o período
    // (relevante pra quem ainda está ativo — periodo_fim vai até "hoje")
    $numeroDeclaracao = $existente['numero_declaracao'];

    $stmtAtualiza = $mysqli->prepare(
        'UPDATE declaracoes_emitidas SET periodo_fim = ?, ip_solicitante = ? WHERE id = ?'
    );
    $stmtAtualiza->bind_param('ssi', $periodoFim, $ip, $existente['id']);
    $stmtAtualiza->execute();
    $stmtAtualiza->close();
} else {
    // Primeira vez desse petiano: gera um número sequencial novo (ex: PET202600001)
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
        'INSERT INTO declaracoes_emitidas (numero_declaracao, petiano_id, periodo_inicio, periodo_fim, ip_solicitante)
         VALUES (?, ?, ?, ?, ?)'
    );
    $stmtLog->bind_param('sisss', $numeroDeclaracao, $petiano['id'], $periodoInicio, $periodoFim, $ip);
    $stmtLog->execute();
    $stmtLog->close();
}

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

ob_start();
$nome               = $petiano['nome_completo'];
$dataInicioExtenso  = $formatarExtenso($inicio);
$dataFimExtenso     = $formatarExtenso($fim);
$dataEmissaoExtenso = $dataEmissao->format('d') . ' de ' . $formatarExtenso($dataEmissao);
$tutorNome          = 'Luis Rivero';
$tutorCargo         = 'Tutor do Programa de Educação Tutorial de Ciência da Computação';
include __DIR__ . '/../templates/declaracao.php';
$html = ob_get_clean();

$options = new Options();
$options->set('isRemoteEnabled', false);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();

$dompdf->stream("declaracao_{$numeroDeclaracao}.pdf", ['Attachment' => true]);