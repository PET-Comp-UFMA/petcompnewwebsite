<?php
/**
 * IMPORTANTE: se seu projeto já tem um arquivo de conexão
 * (o que você mandou, com $mysqli = new mysqli(...)), APAGUE o bloco
 * de conexão abaixo e troque pelo require_once do seu arquivo real, ex:
 *
 *     require_once __DIR__ . '/../conexao.php';
 *
 * Deixei duplicado aqui só pra esse arquivo funcionar sozinho caso
 * vocês ainda não tenham centralizado isso.
 */

$hostname = "localhost";
$bd       = "petcom59_petcomp_db";
$usuario  = "root";
$senha    = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $bd);
$mysqli->set_charset('utf8mb4');

if ($mysqli->connect_errno) {
    http_response_code(500);
    error_log("Falha ao conectar ao banco: " . $mysqli->connect_error);
    die(json_encode(['ok' => false, 'erro' => 'Erro de conexão com o banco.']));
}

// Tempo mínimo (em meses) no programa pra poder emitir a declaração.
// Ajuste pra regra real do PETComp.
define('MESES_MINIMOS_ELEGIBILIDADE', 6);

/**
 * Valida CPF (formato + dígitos verificadores).
 * Retorna os 11 dígitos limpos, ou false se inválido.
 */
function validarCpf(string $cpf) {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    if (strlen($cpf) !== 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
        return false;
    }

    for ($t = 9; $t < 11; $t++) {
        $soma = 0;
        for ($i = 0; $i < $t; $i++) {
            $soma += (int)$cpf[$i] * (($t + 1) - $i);
        }
        $digito = ((10 * $soma) % 11) % 10;
        if ((int)$cpf[$t] !== $digito) {
            return false;
        }
    }

    return $cpf;
}
